<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">إدارة المستخدمين</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">إدارة حسابات المستخدمين والمشرفين على المنصة</p>
    </div>
    <button onclick="document.getElementById('addAdminModal').style.display='block'" class="btn btn-primary" style="padding: 0.75rem 1.5rem; box-shadow: 0 4px 15px var(--primary-glow);">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        إضافة مشرف جديد
    </button>
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
                    <th>المستخدم</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>الدور</th>
                    <th>تاريخ التسجيل</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div class="avatar" style="background: <?= $user['role'] == 'admin' ? 'linear-gradient(135deg, var(--primary) 0%, #0d9488 100%)' : 'linear-gradient(135deg, #64748b 0%, #475569 100%)' ?>; color: white; font-weight: 800; width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <?= mb_substr($user['name'], 0, 1) ?>
                            </div>
                            <div style="font-weight: 800; color: var(--dark);"><?= $user['name'] ?></div>
                        </div>
                    </td>
                    <td style="color: var(--gray); font-weight: 600;"><?= $user['email'] ?></td>
                    <td style="color: var(--gray); font-weight: 600;"><?= $user['phone'] ?? '-' ?></td>
                    <td>
                        <?php if($user['role'] == 'admin'): ?>
                            <span class="badge" style="background: #e0f2fe; color: #0369a1;">مشرف النظام</span>
                        <?php else: ?>
                            <span class="badge badge-dark">مستخدم عادي</span>
                        <?php endif; ?>
                    </td>
                    <td style="color: var(--gray); font-weight: 600;"><?= date('Y/m/d', strtotime($user['created_at'])) ?></td>
                    <td>
                        <?php if($user['role'] != 'admin'): ?>
                            <a href="/admin/ban-user/<?= $user['id'] ?>" class="btn-icon" title="حظر المستخدم" onclick="return confirm('هل أنت متأكد من حظر هذا المستخدم؟')" style="background: #fff1f2; color: var(--accent); border: 1px solid #fecaca;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
                            </a>
                        <?php else: ?>
                            <span style="color: var(--gray); font-size: 0.8rem; font-style: italic;">لا توجد إجراءات</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Admin Modal -->
<div id="addAdminModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(8px); z-index: 1000;">
    <div style="background: white; width: 95%; max-width: 500px; margin: 5rem auto; padding: 2.5rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--dark);">إضافة مشرف جديد</h2>
            <button onclick="document.getElementById('addAdminModal').style.display='none'" style="background: #f1f5f9; border: none; width: 36px; height: 36px; border-radius: 50%; font-size: 1.25rem; cursor: pointer; display: flex; align-items: center; justify-content: center; color: var(--gray);">&times;</button>
        </div>
        
        <form action="/admin/users/store-admin" method="post">
            <div style="display: grid; gap: 1.5rem;">
                <div>
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.5rem;">الاسم الكامل</label>
                    <input type="text" name="name" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.5rem;">البريد الإلكتروني</label>
                    <input type="email" name="email" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.5rem;">كلمة المرور</label>
                    <input type="password" name="password" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.5rem;">تأكيد كلمة المرور</label>
                    <input type="password" name="confpassword" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" required>
                </div>
            </div>
            
            <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2.5rem;">
                <button type="button" onclick="document.getElementById('addAdminModal').style.display='none'" class="btn" style="background: #f1f5f9; color: #475569;">إلغاء</button>
                <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem;">تأكيد الإضافة</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
