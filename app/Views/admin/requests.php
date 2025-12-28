<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">طلبات الحالات الجديدة</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">مراجعة واعتماد طلبات المساعدة الطبية الجديدة</p>
    </div>
    <div style="background: white; padding: 0.75rem 1.25rem; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 10px; height: 10px; background: var(--success); border-radius: 50%;"></div>
        <span style="font-weight: 700; color: var(--dark);"><?= date('Y-m-d') ?></span>
    </div>
</div>

<?php if(session()->getFlashdata('message')):?>
    <div style="background: #dcfce7; color: #166534; padding: 1.25rem; border-radius: var(--radius-md); margin-bottom: 2rem; border: 1px solid #bbf7d0; display: flex; align-items: center; gap: 0.75rem; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif;?>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
    <div class="card" style="padding: 1.5rem; margin-bottom: 0; display: flex; align-items: center; gap: 1.25rem;">
        <div style="background: #fff7ed; color: #ea580c; padding: 1rem; border-radius: 1rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
        <div>
            <div style="font-size: 0.85rem; color: var(--gray); font-weight: 700; margin-bottom: 0.25rem;">بانتظار المراجعة</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: var(--dark);"><?= count($requests) ?> طلب</div>
        </div>
    </div>
    <!-- More stats could be added here if passed from controller -->
</div>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>المستخدم</th>
                    <th>عنوان الحالة</th>
                    <th>المدينة</th>
                    <th>المبلغ المطلوب</th>
                    <th>تاريخ الطلب</th>
                    <th>الحالة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($requests)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 5rem;">
                            <div style="background: #f8fafc; padding: 2rem; border-radius: 1.5rem; display: inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <p style="color: var(--gray); font-weight: 600;">لا توجد طلبات جديدة حالياً</p>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($requests as $req): ?>
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <div class="avatar" style="background: linear-gradient(135deg, var(--primary) 0%, #2dd4bf 100%); color: white; font-weight: 800; width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <?= mb_substr($req['user_name'], 0, 1) ?>
                                </div>
                                <div>
                                    <div style="font-weight: 800; color: var(--dark);"><?= $req['user_name'] ?></div>
                                    <div style="font-size: 0.8rem; color: var(--gray); font-weight: 600;">ID: #<?= $req['user_id_num'] ?></div>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight: 700; color: var(--dark);"><?= $req['title'] ?></td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--gray);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <?= $req['city'] ?>
                            </div>
                        </td>
                        <td style="font-weight: 800; color: var(--primary);"><?= number_format($req['amount_required']) ?> د.ل</td>
                        <td style="color: var(--gray); font-weight: 600;"><?= date('Y/m/d', strtotime($req['created_at'])) ?></td>
                        <td><span class="badge badge-warning">قيد المراجعة</span></td>
                        <td>
                            <a href="/admin/requests/<?= $req['id'] ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.85rem; gap: 0.4rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                مراجعة الطلب
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
