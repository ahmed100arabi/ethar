<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">إدارة الكروت المسبقة الدفع</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">توليد وإدارة كروت التبرع المسبقة لمساعدة الحالات</p>
    </div>
    <button onclick="document.getElementById('createCardModal').style.display='block'" class="btn btn-primary" style="padding: 0.75rem 1.5rem; box-shadow: 0 4px 15px var(--primary-glow);">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        إنشاء كروت جديدة
    </button>
</div>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>رمز الكرت</th>
                    <th>القيمة</th>
                    <th>الحالة</th>
                    <th>استخدم في</th>
                    <th>تاريخ الاستخدام</th>
                    <th>تاريخ الانتهاء</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cards as $card): ?>
                <tr>
                    <td>
                        <code style="background: #f1f5f9; padding: 0.4rem 0.75rem; border-radius: 0.5rem; font-family: 'Courier New', Courier, monospace; font-weight: 800; color: var(--primary); border: 1px solid #e2e8f0; letter-spacing: 1px;"><?= $card['card_code'] ?></code>
                    </td>
                    <td style="font-weight: 800; color: var(--dark);"><?= number_format($card['card_value']) ?> <span style="font-size: 0.8rem; color: var(--gray);">د.ل</span></td>
                    <td>
                        <?php
                            $badgeClass = match($card['status']) {
                                'active' => 'badge-success',
                                'used' => 'badge-dark',
                                'expired' => 'badge-danger',
                                default => 'badge-dark'
                            };
                            $statusLabel = match($card['status']) {
                                'active' => 'نشط / متاح',
                                'used' => 'تم الاستخدام',
                                'expired' => 'منتهي الصلاحية',
                                default => $card['status']
                            };
                        ?>
                        <span class="badge <?= $badgeClass ?>">
                            <?= $statusLabel ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($card['used_by_case_id']): ?>
                            <a href="/case/<?= $card['used_by_case_id'] ?>" target="_blank" style="color: var(--primary); font-weight: 700; text-decoration: none; display: flex; align-items: center; gap: 0.4rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                حالة #<?= $card['used_by_case_id'] ?>
                            </a>
                        <?php else: ?>
                            <span style="color: #cbd5e1;">-</span>
                        <?php endif; ?>
                    </td>
                    <td style="color: var(--gray); font-weight: 600; font-size: 0.85rem;">
                        <?= $card['used_at'] ? date('Y/m/d H:i', strtotime($card['used_at'])) : '-' ?>
                    </td>
                    <td style="color: var(--gray); font-weight: 600; font-size: 0.85rem;">
                        <?= $card['expires_at'] ? date('Y/m/d', strtotime($card['expires_at'])) : '<span style="color: #94a3b8;">بدون انتهاء</span>' ?>
                    </td>
                    <td>
                        <?php if ($card['status'] === 'active'): ?>
                            <a href="/admin/prepaid-cards/delete/<?= $card['id'] ?>" 
                               onclick="return confirm('هل أنت متأكد من حذف هذا الكرت؟')"
                               class="btn-icon" title="حذف" style="background: #fff1f2; color: var(--accent); border: 1px solid #fecaca;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </a>
                        <?php else: ?>
                            <span style="color: #cbd5e1; font-size: 0.8rem;">-</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($cards)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 5rem;">
                            <div style="background: #f8fafc; padding: 2rem; border-radius: 1.5rem; display: inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                                <p style="color: var(--gray); font-weight: 600;">لا توجد كروت مسبقة الدفع حالياً</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Create Card Modal -->
<div id="createCardModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(8px); z-index: 1000;">
    <div style="background: white; width: 95%; max-width: 500px; margin: 8rem auto; padding: 2.5rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--dark);">إنشاء كرت جديد</h2>
            <button onclick="document.getElementById('createCardModal').style.display='none'" style="background: #f1f5f9; border: none; width: 36px; height: 36px; border-radius: 50%; font-size: 1.25rem; cursor: pointer; display: flex; align-items: center; justify-content: center; color: var(--gray);">&times;</button>
        </div>
        
        <form action="/admin/prepaid-cards/create" method="post">
            <div style="display: grid; gap: 1.5rem;">
                <div>
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.5rem;">قيمة الكرت (د.ل)</label>
                    <input type="number" name="value" step="0.01" placeholder="0.00" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" required>
                </div>
                
                <div>
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.5rem;">تاريخ الانتهاء (اختياري)</label>
                    <input type="date" name="expires_at" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);">
                    <p style="font-size: 0.8rem; color: var(--gray); margin-top: 0.5rem; font-weight: 600;">اتركه فارغاً إذا كنت لا تريد تحديد تاريخ انتهاء</p>
                </div>
            </div>
            
            <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2.5rem;">
                <button type="button" onclick="document.getElementById('createCardModal').style.display='none'" class="btn" style="background: #f1f5f9; color: #475569;">إلغاء</button>
                <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem;">توليد الكرت</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
