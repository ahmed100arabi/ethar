<?= $this->extend('patient/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h1 class="page-title">المتبرعين</h1>
</div>

<div style="display: grid; gap: 2rem; max-width: 1000px;">
    <?php foreach ($donors as $donor): ?>
    <div class="card" style="display: flex; gap: 2rem; align-items: start; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--primary);"></div>
        
        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary) 0%, #2dd4bf 100%); color: white; border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.5rem; flex-shrink: 0; box-shadow: 0 8px 16px var(--primary-glow);">
            <?= mb_substr($donor['donor_name'], 0, 1) ?>
        </div>
        
        <div style="flex: 1;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);"><?= $donor['donor_name'] ?></h3>
                <span style="color: var(--gray); font-size: 0.85rem; font-weight: 600; background: #f1f5f9; padding: 0.25rem 0.75rem; border-radius: 2rem;">
                    <?= date('Y/m/d', strtotime($donor['created_at'])) ?>
                </span>
            </div>
            
            <div style="margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem; color: var(--gray); font-size: 0.95rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                تبرع لحالة: <span style="color: var(--primary); font-weight: 700;"><?= $donor['request_title'] ?></span>
            </div>
            
            <?php if(!empty($donor['message'])): ?>
            <div style="background: #f8fafc; padding: 1.25rem; border-radius: var(--radius-md); margin-bottom: 1.5rem; border: 1px solid #f1f5f9; position: relative;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#e2e8f0" style="position: absolute; top: -10px; right: 20px;"><path d="M3 21c3 0 7-1 7-8V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v5c0 1.1.9 2 2 2h2c0 3-2.5 5-5 5v3zm12 0c3 0 7-1 7-8V5c0-1.1-.9-2-2-2h-3c-1.1 0-2 .9-2 2v5c0 1.1.9 2 2 2h2c0 3-2.5 5-5 5v3z"/></svg>
                <p style="font-style: italic; color: #475569; line-height: 1.6; font-size: 0.95rem;">"<?= $donor['message'] ?>"</p>
            </div>
            <?php endif; ?>
            
            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid #f1f5f9;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--gray); font-size: 0.9rem; font-weight: 600;">مبلغ التبرع:</span>
                    <span style="font-size: 1.25rem; font-weight: 800; color: var(--primary);"><?= number_format($donor['amount']) ?> <span style="font-size: 0.9rem;">د.ل</span></span>
                </div>
                <button class="btn btn-primary" style="padding: 0.5rem 1.25rem; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    إرسال شكر
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <?php if(empty($donors)): ?>
    <div style="text-align: center; padding: 5rem 2rem; background: white; border-radius: var(--radius-lg); border: 2px dashed #e2e8f0;">
        <div style="background: #f8fafc; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        </div>
        <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--dark); margin-bottom: 0.5rem;">لا يوجد متبرعون حالياً</h3>
        <p style="color: var(--gray); font-weight: 600;">بمجرد أن يتبرع شخص ما لحالاتك، سيظهر اسمه هنا.</p>
    </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
