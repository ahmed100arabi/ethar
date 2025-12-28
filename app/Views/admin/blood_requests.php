<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">إدارة طلبات التبرع بالدم</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">مراجعة واعتماد طلبات التبرع بالدم العاجلة</p>
    </div>
    <div style="background: white; padding: 0.75rem 1.25rem; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 10px; height: 10px; background: var(--accent); border-radius: 50%;"></div>
        <span style="font-weight: 700; color: var(--dark);"><?= count($requests) ?> طلب إجمالي</span>
    </div>
</div>

<?php if(session()->getFlashdata('message')): ?>
    <div style="background: #dcfce7; color: #166534; padding: 1.25rem; border-radius: var(--radius-md); margin-bottom: 2rem; border: 1px solid #bbf7d0; display: flex; align-items: center; gap: 0.75rem; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>المريض</th>
                    <th>الفصيلة</th>
                    <th>المستشفى</th>
                    <th>المدينة</th>
                    <th>الاستعجال</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $req): ?>
                <tr>
                    <td style="font-weight: 800; color: var(--dark);"><?= $req['patient_name'] ?></td>
                    <td>
                        <span class="badge" style="background: #fee2e2; color: #991b1b; font-weight: 800;"><?= $req['blood_type'] ?></span>
                    </td>
                    <td style="font-weight: 600; color: var(--gray);"><?= $req['hospital'] ?></td>
                    <td style="font-weight: 600; color: var(--gray);"><?= $req['city'] ?></td>
                    <td>
                        <?php if($req['urgency'] == 'critical'): ?>
                            <span class="badge badge-danger">حالة حرجة</span>
                        <?php else: ?>
                            <span class="badge badge-dark">عادية</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($req['status'] == 'active'): ?>
                            <span class="badge badge-success">نشط</span>
                        <?php elseif($req['status'] == 'pending'): ?>
                            <span class="badge badge-warning">قيد المراجعة</span>
                        <?php elseif($req['status'] == 'rejected'): ?>
                            <span class="badge badge-danger">مرفوض</span>
                        <?php else: ?>
                            <span class="badge badge-dark"><?= $req['status'] ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="display: flex; gap: 0.75rem;">
                            <?php if($req['status'] == 'pending'): ?>
                                <a href="/admin/blood-requests/approve/<?= $req['id'] ?>" class="btn-icon" title="قبول" style="background: #dcfce7; color: #166534; border: 1px solid #bbf7d0;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </a>
                                <a href="/admin/blood-requests/reject/<?= $req['id'] ?>" class="btn-icon" title="رفض" style="background: #fff1f2; color: var(--accent); border: 1px solid #fecaca;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </a>
                            <?php endif; ?>
                            <a href="/admin/blood-requests/delete/<?= $req['id'] ?>" onclick="return confirm('هل أنت متأكد من حذف هذا الطلب؟')" class="btn-icon" title="حذف" style="background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($requests)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 5rem;">
                            <div style="background: #f8fafc; padding: 2rem; border-radius: 1.5rem; display: inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                                <p style="color: var(--gray); font-weight: 600;">لا توجد طلبات تبرع بالدم حالياً</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
