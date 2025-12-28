<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">إدارة حملات التوعية</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">تنظيم ومتابعة الحملات الصحية والتوعوية للمجتمع</p>
    </div>
    <a href="/admin/campaigns/create" class="btn btn-primary" style="padding: 0.75rem 1.5rem; box-shadow: 0 4px 15px var(--primary-glow);">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        إضافة حملة جديدة
    </a>
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
                    <th>الصورة</th>
                    <th>عنوان الحملة</th>
                    <th>التاريخ</th>
                    <th>المكان</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campaigns as $camp): ?>
                <tr>
                    <td>
                        <?php if(!empty($camp['image'])): ?>
                            <img src="<?= $camp['image'] ?>" alt="Campaign" style="width: 60px; height: 60px; object-fit: cover; border-radius: 12px; border: 2px solid #f1f5f9; box-shadow: var(--shadow-sm);">
                        <?php else: ?>
                            <div style="width: 60px; height: 60px; background: #f8fafc; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #cbd5e1; border: 2px dashed #e2e8f0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td style="font-weight: 800; color: var(--dark);"><?= $camp['title'] ?></td>
                    <td style="color: var(--gray); font-weight: 700;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <?= $camp['event_date'] ?>
                        </div>
                    </td>
                    <td style="color: var(--gray); font-weight: 700;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <?= $camp['location'] ?>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; gap: 0.75rem;">
                            <a href="/admin/campaigns/edit/<?= $camp['id'] ?>" class="btn-icon" title="تعديل" style="background: #f0f9ff; color: #0284c7; border: 1px solid #bae6fd;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>
                            <a href="/admin/campaigns/delete/<?= $camp['id'] ?>" onclick="return confirm('هل أنت متأكد من حذف هذه الحملة؟')" class="btn-icon" title="حذف" style="background: #fff1f2; color: var(--accent); border: 1px solid #fecaca;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($campaigns)): ?>
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 5rem;">
                            <div style="background: #f8fafc; padding: 2rem; border-radius: 1.5rem; display: inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <p style="color: var(--gray); font-weight: 600;">لا توجد حملات منشورة حالياً</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
