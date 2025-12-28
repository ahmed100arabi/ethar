<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">التقارير والإحصائيات</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">نظرة شاملة على أداء المنصة والنشاطات الحالية</p>
    </div>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="card" style="padding: 1.5rem; margin-bottom: 0; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--primary);"></div>
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
            <div style="background: var(--primary-glow); color: var(--primary); padding: 0.75rem; border-radius: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
            </div>
            <div style="font-weight: 800; color: var(--gray); font-size: 0.9rem;">إجمالي التبرعات</div>
        </div>
        <div style="font-size: 1.75rem; font-weight: 800; color: var(--dark);"><?= number_format($total_donations) ?> <span style="font-size: 1rem; color: var(--gray);">د.ل</span></div>
    </div>

    <div class="card" style="padding: 1.5rem; margin-bottom: 0; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--secondary);"></div>
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
            <div style="background: rgba(245, 158, 11, 0.1); color: var(--secondary); padding: 0.75rem; border-radius: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
            </div>
            <div style="font-weight: 800; color: var(--gray); font-size: 0.9rem;">الحالات النشطة</div>
        </div>
        <div style="font-size: 1.75rem; font-weight: 800; color: var(--dark);"><?= $active_cases ?> <span style="font-size: 1rem; color: var(--gray);">حالة</span></div>
    </div>

    <div class="card" style="padding: 1.5rem; margin-bottom: 0; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--dark);"></div>
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
            <div style="background: #f1f5f9; color: var(--dark); padding: 0.75rem; border-radius: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            </div>
            <div style="font-weight: 800; color: var(--gray); font-size: 0.9rem;">إجمالي المستخدمين</div>
        </div>
        <div style="font-size: 1.75rem; font-weight: 800; color: var(--dark);"><?= $total_users ?> <span style="font-size: 1rem; color: var(--gray);">مسجل</span></div>
    </div>

    <div class="card" style="padding: 1.5rem; margin-bottom: 0; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--accent);"></div>
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
            <div style="background: #fff1f2; color: var(--accent); padding: 0.75rem; border-radius: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </div>
            <div style="font-weight: 800; color: var(--gray); font-size: 0.9rem;">طلبات معلقة</div>
        </div>
        <div style="font-size: 1.75rem; font-weight: 800; color: var(--dark);"><?= $pending_requests ?> <span style="font-size: 1rem; color: var(--gray);">طلب</span></div>
    </div>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 2rem;">
    
    <!-- Blood Donors Report -->
    <div class="card">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
            <div style="background: #fff1f2; color: var(--accent); padding: 0.5rem; border-radius: 0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
            <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">المسجلين للتبرع بالدم</h2>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>المتبرع</th>
                        <th>رقم الهاتف</th>
                        <th>للمريض</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blood_donors as $donor): ?>
                    <tr>
                        <td style="font-weight: 800; color: var(--dark);"><?= $donor['name'] ?></td>
                        <td style="color: var(--gray); font-weight: 600;"><?= $donor['phone'] ?></td>
                        <td>
                            <div style="font-weight: 700; color: var(--dark);"><?= $donor['patient_name'] ?></div>
                            <div style="font-size: 0.8rem; color: var(--accent); font-weight: 800;"><?= $donor['blood_type'] ?></div>
                        </td>
                        <td style="color: var(--gray); font-weight: 600;"><?= date('Y/m/d', strtotime($donor['created_at'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($blood_donors)): ?>
                        <tr><td colspan="4" style="text-align: center; padding: 3rem; color: var(--gray);">لا يوجد متبرعين مسجلين حالياً</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Campaign Registrants Report -->
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="background: var(--primary-glow); color: var(--primary); padding: 0.5rem; border-radius: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">المسجلين في الحملات</h2>
            </div>
            
            <form action="" method="get" style="display: flex; gap: 0.5rem;">
                <select name="campaign_id" style="padding: 0.5rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; font-family: inherit; font-size: 0.85rem; outline: none; background: #f8fafc; font-weight: 600;">
                    <option value="">كل الحملات</option>
                    <?php if(isset($campaigns_list)): ?>
                        <?php foreach($campaigns_list as $camp): ?>
                            <option value="<?= $camp['id'] ?>" <?= (isset($_GET['campaign_id']) && $_GET['campaign_id'] == $camp['id']) ? 'selected' : '' ?>>
                                <?= $camp['title'] ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <button type="submit" class="btn btn-primary" style="padding: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                </button>
            </form>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>الحملة</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($campaign_registrants as $reg): ?>
                    <tr>
                        <td style="font-weight: 800; color: var(--dark);"><?= $reg['name'] ?></td>
                        <td style="color: var(--gray); font-weight: 600;"><?= $reg['phone'] ?></td>
                        <td style="font-weight: 700; color: var(--primary);"><?= $reg['campaign_title'] ?></td>
                        <td style="color: var(--gray); font-weight: 600;"><?= date('Y/m/d', strtotime($reg['created_at'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($campaign_registrants)): ?>
                        <tr><td colspan="4" style="text-align: center; padding: 3rem; color: var(--gray);">لا يوجد مسجلين في هذه الحملة حالياً</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
