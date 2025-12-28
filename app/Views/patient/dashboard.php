<?= $this->extend('patient/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h1 class="page-title">لوحة التحكم</h1>
    <a href="/patient/create-request" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        طلب مساعدة جديد
    </a>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
    <!-- Active Requests -->
    <div class="card" style="display: flex; align-items: center; gap: 1.5rem; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -10px; left: -10px; width: 60px; height: 60px; background: var(--primary-glow); border-radius: 50%;"></div>
        <div style="background: linear-gradient(135deg, var(--primary) 0%, #0d9488 100%); color: white; padding: 1.25rem; border-radius: 1rem; box-shadow: 0 8px 16px var(--primary-glow); z-index: 1;">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        </div>
        <div>
            <div style="font-size: 1rem; color: var(--gray); font-weight: 600; margin-bottom: 0.25rem;">الطلبات النشطة</div>
            <div style="font-size: 2rem; font-weight: 800; color: var(--dark);"><?= $stats['active_requests'] ?></div>
        </div>
    </div>

    <!-- Pending Requests -->
    <div class="card" style="display: flex; align-items: center; gap: 1.5rem; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -10px; left: -10px; width: 60px; height: 60px; background: rgba(245, 158, 11, 0.1); border-radius: 50%;"></div>
        <div style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; padding: 1.25rem; border-radius: 1rem; box-shadow: 0 8px 16px rgba(245, 158, 11, 0.2); z-index: 1;">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
        <div>
            <div style="font-size: 1rem; color: var(--gray); font-weight: 600; margin-bottom: 0.25rem;">قيد المراجعة</div>
            <div style="font-size: 2rem; font-weight: 800; color: var(--dark);"><?= $stats['pending_requests'] ?></div>
        </div>
    </div>

    <!-- Total Donations -->
    <div class="card" style="display: flex; align-items: center; gap: 1.5rem; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -10px; left: -10px; width: 60px; height: 60px; background: rgba(16, 185, 129, 0.1); border-radius: 50%;"></div>
        <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 1.25rem; border-radius: 1rem; box-shadow: 0 8px 16px rgba(16, 185, 129, 0.2); z-index: 1;">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
        </div>
        <div>
            <div style="font-size: 1rem; color: var(--gray); font-weight: 600; margin-bottom: 0.25rem;">التبرعات المستلمة</div>
            <div style="font-size: 2rem; font-weight: 800; color: var(--dark);"><?= number_format($stats['total_donations']) ?> <span style="font-size: 1rem; font-weight: 600;">د.ل</span></div>
        </div>
    </div>
</div>

<div class="card" style="background: linear-gradient(to left, #f8fafc, #ffffff); border-right: 4px solid var(--primary);">
    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
        <div style="background: var(--primary-glow); color: var(--primary); padding: 0.75rem; border-radius: 0.75rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
        </div>
        <h3 style="font-size: 1.25rem; font-weight: 800;">إرشادات هامة للمرضى</h3>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
        <div style="background: white; padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid #f1f5f9;">
            <div style="color: var(--primary); font-weight: 800; margin-bottom: 0.5rem;">01. دقة البيانات</div>
            <p style="font-size: 0.9rem; color: var(--gray); line-height: 1.6;">يرجى التأكد من صحة البيانات والتقارير الطبية المرفقة لضمان سرعة المراجعة.</p>
        </div>
        <div style="background: white; padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid #f1f5f9;">
            <div style="color: var(--primary); font-weight: 800; margin-bottom: 0.5rem;">02. مراجعة الطلب</div>
            <p style="font-size: 0.9rem; color: var(--gray); line-height: 1.6;">سيتم مراجعة طلبك من قبل المشرفين قبل نشره للعامة للتأكد من استيفاء الشروط.</p>
        </div>
        <div style="background: white; padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid #f1f5f9;">
            <div style="color: var(--primary); font-weight: 800; margin-bottom: 0.5rem;">03. المتابعة</div>
            <p style="font-size: 0.9rem; color: var(--gray); line-height: 1.6;">يمكنك متابعة حالة طلبك والتبرعات المستلمة لحظة بلحظة من صفحة "طلباتي".</p>
        </div>
        <div style="background: white; padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid #f1f5f9;">
            <div style="color: var(--primary); font-weight: 800; margin-bottom: 0.5rem;">04. الدعم</div>
            <p style="font-size: 0.9rem; color: var(--gray); line-height: 1.6;">في حال واجهت أي مشكلة، فريق الدعم الفني متواجد لمساعدتك في أي وقت.</p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
