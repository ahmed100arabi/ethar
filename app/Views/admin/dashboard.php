<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">لوحة التحكم</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">مرحباً بك في لوحة إدارة منصة إيثار</p>
    </div>
    <div style="background: white; padding: 0.75rem 1.25rem; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 10px; height: 10px; background: #10b981; border-radius: 50%;"></div>
        <span style="font-weight: 700; color: var(--dark);">النظام يعمل بشكل جيد</span>
    </div>
</div>

<!-- Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
    <div class="card" style="padding: 1.5rem; margin-bottom: 0; position: relative; overflow: hidden; animation: fadeIn 0.5s ease-out;">
        <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--primary);"></div>
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
            <div style="background: var(--primary-glow); color: var(--primary); padding: 0.75rem; border-radius: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
            </div>
            <div style="font-weight: 800; color: var(--gray); font-size: 0.9rem;">إجمالي التبرعات</div>
        </div>
        <div style="font-size: 1.75rem; font-weight: 800; color: var(--dark);"><?= number_format($total_donations) ?> <span style="font-size: 1rem; color: var(--gray);">د.ل</span></div>
    </div>

    <div class="card" style="padding: 1.5rem; margin-bottom: 0; position: relative; overflow: hidden; animation: fadeIn 0.5s ease-out 0.1s; animation-fill-mode: both;">
        <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--secondary);"></div>
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
            <div style="background: rgba(245, 158, 11, 0.1); color: var(--secondary); padding: 0.75rem; border-radius: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
            </div>
            <div style="font-weight: 800; color: var(--gray); font-size: 0.9rem;">الحالات النشطة</div>
        </div>
        <div style="font-size: 1.75rem; font-weight: 800; color: var(--dark);"><?= $active_cases ?> <span style="font-size: 1rem; color: var(--gray);">حالة</span></div>
    </div>

    <div class="card" style="padding: 1.5rem; margin-bottom: 0; position: relative; overflow: hidden; animation: fadeIn 0.5s ease-out 0.2s; animation-fill-mode: both;">
        <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--dark);"></div>
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
            <div style="background: #f1f5f9; color: var(--dark); padding: 0.75rem; border-radius: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            </div>
            <div style="font-weight: 800; color: var(--gray); font-size: 0.9rem;">إجمالي المستخدمين</div>
        </div>
        <div style="font-size: 1.75rem; font-weight: 800; color: var(--dark);"><?= $total_users ?> <span style="font-size: 1rem; color: var(--gray);">مسجل</span></div>
    </div>

    <div class="card" style="padding: 1.5rem; margin-bottom: 0; position: relative; overflow: hidden; animation: fadeIn 0.5s ease-out 0.3s; animation-fill-mode: both;">
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

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
    
    <!-- Recent Donations -->
    <div class="card" style="animation: slideUp 0.6s ease-out;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="background: var(--primary-glow); color: var(--primary); padding: 0.5rem; border-radius: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
                <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">آخر التبرعات</h2>
            </div>
            <a href="/admin/reports" style="color: var(--primary); font-weight: 700; font-size: 0.85rem; text-decoration: none;">عرض الكل</a>
        </div>

        <div style="display: grid; gap: 1rem;">
            <?php foreach($recent_donations as $donation): ?>
                <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: #f8fafc; border-radius: 1rem; border: 1px solid #f1f5f9; transition: var(--transition);" onmouseover="this.style.transform='translateX(-5px)'; this.style.borderColor='var(--primary-glow)'" onmouseout="this.style.transform='none'; this.style.borderColor='#f1f5f9'">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="background: white; color: var(--primary); width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; box-shadow: var(--shadow-sm);">
                            <?= mb_substr($donation['donor_name'] ?? 'م', 0, 1) ?>
                        </div>
                        <div>
                            <div style="font-weight: 800; color: var(--dark); font-size: 0.95rem;"><?= $donation['donor_name'] ?? 'متبرع فاعل خير' ?></div>
                            <div style="font-size: 0.8rem; color: var(--gray); font-weight: 600;"><?= $donation['case_title'] ?></div>
                        </div>
                    </div>
                    <div style="text-align: left;">
                        <div style="font-weight: 800; color: var(--primary); font-size: 1.1rem;">+<?= number_format($donation['amount']) ?> <span style="font-size: 0.75rem;">د.ل</span></div>
                        <div style="font-size: 0.75rem; color: var(--gray); font-weight: 600;"><?= date('H:i', strtotime($donation['created_at'])) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if(empty($recent_donations)): ?>
                <p style="text-align: center; color: var(--gray); padding: 2rem;">لا توجد تبرعات حديثة</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Requests -->
    <div class="card" style="animation: slideUp 0.6s ease-out 0.1s; animation-fill-mode: both;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="background: #fff1f2; color: var(--accent); padding: 0.5rem; border-radius: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                </div>
                <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">طلبات جديدة</h2>
            </div>
            <a href="/admin/requests" style="color: var(--accent); font-weight: 700; font-size: 0.85rem; text-decoration: none;">مراجعة الكل</a>
        </div>

        <div style="display: grid; gap: 1rem;">
            <?php foreach($recent_requests as $request): ?>
                <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: #f8fafc; border-radius: 1rem; border: 1px solid #f1f5f9; transition: var(--transition);" onmouseover="this.style.transform='translateX(-5px)'; this.style.borderColor='#fecaca'" onmouseout="this.style.transform='none'; this.style.borderColor='#f1f5f9'">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="background: white; color: var(--accent); width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; box-shadow: var(--shadow-sm);">
                            <?= mb_substr($request['title'], 0, 1) ?>
                        </div>
                        <div>
                            <div style="font-weight: 800; color: var(--dark); font-size: 0.95rem;"><?= $request['title'] ?></div>
                            <div style="font-size: 0.8rem; color: var(--gray); font-weight: 600;"><?= $request['category'] ?> • <?= $request['city'] ?></div>
                        </div>
                    </div>
                    <a href="/admin/requests/<?= $request['id'] ?>" class="btn-icon" style="background: white; color: var(--dark); border: 1px solid #e2e8f0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </a>
                </div>
            <?php endforeach; ?>
            <?php if(empty($recent_requests)): ?>
                <p style="text-align: center; color: var(--gray); padding: 2rem;">لا توجد طلبات جديدة حالياً</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<?= $this->endSection() ?>
