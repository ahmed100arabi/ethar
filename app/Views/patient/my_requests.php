<?= $this->extend('patient/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h1 class="page-title">طلباتي</h1>
</div>

<div class="card" style="margin-bottom: 3rem;">
    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem;">
        <div style="width: 4px; height: 24px; background: var(--primary); border-radius: 2px;"></div>
        <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">طلبات المساعدة الطبية</h2>
    </div>
    
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: separate; border-spacing: 0 0.75rem;">
            <thead>
                <tr style="text-align: right;">
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">رقم الطلب</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">العنوان</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">التاريخ</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">المبلغ المطلوب</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">تم جمع</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">الحالة</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $req): ?>
                <tr style="background: #f8fafc; transition: var(--transition);">
                    <td style="padding: 1.25rem 1rem; border-radius: 1rem 0 0 1rem; font-weight: 700; color: var(--gray);">#<?= $req['id'] ?></td>
                    <td style="padding: 1.25rem 1rem; font-weight: 700; color: var(--dark);">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <?php if ($req['status'] == 'completed'): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <?php endif; ?>
                            <?= $req['title'] ?>
                        </div>
                    </td>
                    <td style="padding: 1.25rem 1rem; color: var(--gray); font-weight: 500;"><?= date('Y/m/d', strtotime($req['created_at'])) ?></td>
                    <td style="padding: 1.25rem 1rem; font-weight: 700;"><?= number_format($req['amount_required']) ?> د.ل</td>
                    <td style="padding: 1.25rem 1rem; color: var(--primary); font-weight: 800;"><?= number_format($req['amount_collected']) ?> د.ل</td>
                    <td style="padding: 1.25rem 1rem;">
                        <?php if ($req['status'] == 'completed'): ?>
                            <span class="badge badge-success">مكتمل</span>
                        <?php elseif ($req['status'] == 'approved'): ?>
                            <span class="badge badge-success">نشط</span>
                        <?php elseif ($req['status'] == 'pending'): ?>
                            <span class="badge badge-warning">قيد المراجعة</span>
                        <?php else: ?>
                            <span class="badge" style="background: #e2e8f0; color: #475569;"><?= $req['status'] ?></span>
                        <?php endif; ?>
                    </td>
                    <td style="padding: 1.25rem 1rem; border-radius: 0 1rem 1rem 0;">
                        <a href="/case/<?= $req['id'] ?>" class="btn btn-primary" style="padding: 0.4rem 1rem; font-size: 0.85rem;">
                            التفاصيل
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($requests)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 4rem;">
                            <div style="background: #f8fafc; padding: 2rem; border-radius: 1.5rem; display: inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <p style="color: var(--gray); font-weight: 600;">لا توجد طلبات مساعدة طبية حتى الآن</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem;">
        <div style="width: 4px; height: 24px; background: var(--accent); border-radius: 2px;"></div>
        <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">طلبات التبرع بالدم</h2>
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: separate; border-spacing: 0 0.75rem;">
            <thead>
                <tr style="text-align: right;">
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">المريض</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">فصيلة الدم</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">المستشفى</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">المدينة</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">الاستعجال</th>
                    <th style="padding: 1rem; color: var(--gray); font-weight: 700; font-size: 0.9rem;">الحالة</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($bloodRequests)): ?>
                    <?php foreach ($bloodRequests as $req): ?>
                    <tr style="background: #f8fafc; transition: var(--transition);">
                        <td style="padding: 1.25rem 1rem; border-radius: 1rem 0 0 1rem; font-weight: 700; color: var(--dark);"><?= $req['patient_name'] ?></td>
                        <td style="padding: 1.25rem 1rem;">
                            <span style="background: #fee2e2; color: #991b1b; padding: 0.3rem 0.75rem; border-radius: 0.5rem; font-size: 0.9rem; font-weight: 800;"><?= $req['blood_type'] ?></span>
                        </td>
                        <td style="padding: 1.25rem 1rem; font-weight: 600; color: var(--gray);"><?= $req['hospital'] ?></td>
                        <td style="padding: 1.25rem 1rem; font-weight: 600; color: var(--gray);"><?= $req['city'] ?></td>
                        <td style="padding: 1.25rem 1rem;">
                            <?php if($req['urgency'] == 'critical'): ?>
                                <span class="badge badge-danger">حرجة جداً</span>
                            <?php else: ?>
                                <span class="badge" style="background: #f1f5f9; color: #64748b;">عادية</span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 1.25rem 1rem; border-radius: 0 1rem 1rem 0;">
                            <?php if ($req['status'] == 'active'): ?>
                                <span class="badge badge-success">نشط</span>
                            <?php elseif ($req['status'] == 'pending'): ?>
                                <span class="badge badge-warning">قيد المراجعة</span>
                            <?php elseif ($req['status'] == 'rejected'): ?>
                                <span class="badge badge-danger">مرفوض</span>
                            <?php else: ?>
                                <span class="badge" style="background: #e2e8f0; color: #475569;"><?= $req['status'] ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($bloodRequests)): ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 4rem;">
                                <div style="background: #f8fafc; padding: 2rem; border-radius: 1.5rem; display: inline-block;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                                    <p style="color: var(--gray); font-weight: 600;">لا توجد طلبات تبرع بالدم حالياً</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
