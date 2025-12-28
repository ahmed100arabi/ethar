<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">إدارة الحالات النشطة</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">متابعة وتعديل الحالات المنشورة حالياً على المنصة</p>
    </div>
    <div style="background: white; padding: 0.75rem 1.25rem; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 10px; height: 10px; background: var(--primary); border-radius: 50%;"></div>
        <span style="font-weight: 700; color: var(--dark);"><?= count($cases) ?> حالة نشطة</span>
    </div>
</div>

<?php if(session()->getFlashdata('message')):?>
    <div style="background: #dcfce7; color: #166534; padding: 1.25rem; border-radius: var(--radius-md); margin-bottom: 2rem; border: 1px solid #bbf7d0; display: flex; align-items: center; gap: 0.75rem; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif;?>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان الحالة</th>
                    <th>المستخدم</th>
                    <th>المبلغ المطلوب</th>
                    <th>المبلغ المجمّع</th>
                    <th>الحالة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($cases)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 5rem;">
                            <div style="background: #f8fafc; padding: 2rem; border-radius: 1.5rem; display: inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <p style="color: var(--gray); font-weight: 600;">لا توجد حالات نشطة حالياً</p>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($cases as $case): ?>
                    <tr>
                        <td style="color: var(--gray); font-weight: 700;">#<?= $case['id'] ?></td>
                        <td style="font-weight: 800; color: var(--dark);"><?= $case['title'] ?></td>
                        <td style="font-weight: 600; color: var(--gray);"><?= $case['user_name'] ?></td>
                        <td style="font-weight: 700; color: var(--dark);"><?= number_format($case['amount_required']) ?> د.ل</td>
                        <td style="font-weight: 800; color: var(--primary);"><?= number_format($case['amount_collected']) ?> د.ل</td>
                        <td>
                            <?php if ($case['status'] == 'approved'): ?>
                                <span class="badge badge-success">نشط</span>
                            <?php elseif ($case['status'] == 'pending'): ?>
                                <span class="badge badge-warning">قيد المراجعة</span>
                            <?php elseif ($case['status'] == 'completed'): ?>
                                <span class="badge badge-success" style="background: #dcfce7; color: #166534;">✓ مكتمل</span>
                            <?php else: ?>
                                <span class="badge badge-dark"><?= $case['status'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.75rem;">
                                <a href="/admin/edit-case/<?= $case['id'] ?>" class="btn-icon" title="تعديل" style="background: #f0f9ff; color: #0284c7; border: 1px solid #bae6fd;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </a>
                                <a href="/admin/cases/delete/<?= $case['id'] ?>" onclick="return confirm('هل أنت متأكد من حذف هذه الحالة؟')" class="btn-icon" title="حذف" style="background: #fff1f2; color: var(--accent); border: 1px solid #fecaca;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
