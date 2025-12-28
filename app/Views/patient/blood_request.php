<?= $this->extend('patient/layout') ?>

<?= $this->section('content') ?>

<style>
    .form-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 3rem;
        box-shadow: var(--shadow-sm);
        border: 1px solid #f1f5f9;
        max-width: 900px;
        margin: 0 auto;
        animation: fadeIn 0.6s ease-out;
    }

    .form-group {
        margin-bottom: 1.75rem;
    }

    .form-label {
        display: block;
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--gray);
        margin-bottom: 0.6rem;
    }

    .form-control {
        width: 100%;
        padding: 0.9rem 1.25rem;
        border: 2px solid #f1f5f9;
        border-radius: 0.85rem;
        font-family: inherit;
        font-size: 1rem;
        font-weight: 600;
        transition: var(--transition);
        outline: none;
        background: #f8fafc;
    }

    .form-control:focus {
        border-color: var(--accent);
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
    }

    .info-banner {
        background: rgba(239, 68, 68, 0.05);
        padding: 1.5rem;
        border-radius: 1rem;
        border-right: 4px solid var(--accent);
        margin-bottom: 2.5rem;
    }

    .info-banner-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--accent);
        font-weight: 800;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .info-banner-text {
        font-size: 0.9rem;
        color: #475569;
        line-height: 1.6;
        font-weight: 500;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--accent) 0%, #dc2626 100%);
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 1rem;
        font-weight: 800;
        font-size: 1.05rem;
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.2);
        border: none;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(239, 68, 68, 0.3);
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #475569;
        padding: 1rem 2rem;
        border-radius: 1rem;
        font-weight: 700;
        text-decoration: none;
        transition: var(--transition);
    }

    .btn-cancel:hover {
        background: #e2e8f0;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }

    @media (max-width: 768px) {
        .grid-2 { grid-template-columns: 1fr; }
        .form-card { padding: 2rem; }
    }
</style>

<div class="page-header">
    <h1 class="page-title">طلب تبرع بالدم</h1>
</div>

<div class="form-card">
    <div class="info-banner">
        <div class="info-banner-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="currentColor"/></svg>
            طلب دم عاجل
        </div>
        <p class="info-banner-text">يرجى تزويدنا بمعلومات دقيقة عن فصيلة الدم والمستشفى لضمان وصول المتبرعين في أسرع وقت ممكن لإنقاذ حياة المريض.</p>
    </div>

    <form action="/patient/create-blood-request" method="post">
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">اسم المريض</label>
                <input type="text" name="patient_name" class="form-control" placeholder="اسم المريض الثلاثي" required>
            </div>
            <div class="form-group">
                <label class="form-label">فصيلة الدم المطلوبة</label>
                <select name="blood_type" class="form-control" required>
                    <option value="">اختر الفصيلة</option>
                    <?php foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $type): ?>
                        <option value="<?= $type ?>"><?= $type ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">المستشفى</label>
                <input type="text" name="hospital" class="form-control" placeholder="مثال: مستشفى الجلاء" required>
            </div>
            <div class="form-group">
                <label class="form-label">المدينة</label>
                <select name="city" id="citySelect" class="form-control" required>
                    <option value="">اختر المدينة</option>
                    <option value="طرابلس">طرابلس</option>
                    <option value="بنغازي">بنغازي</option>
                    <option value="مصراتة">مصراتة</option>
                    <option value="سبها">سبها</option>
                    <option value="الزاوية">الزاوية</option>
                    <option value="أخرى">أخرى</option>
                </select>
            </div>
        </div>

        <div class="form-group" id="cityOtherGroup" style="display: none;">
            <label class="form-label">اسم المدينة الأخرى</label>
            <input type="text" name="city_other" class="form-control" placeholder="أدخل اسم المدينة">
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">درجة الاستعجال</label>
                <select name="urgency" class="form-control" required>
                    <option value="normal">عادية</option>
                    <option value="critical">حرجة جداً (طارئة)</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">رقم هاتف للتواصل</label>
                <input type="tel" name="phone" class="form-control" placeholder="09XXXXXXXX" required>
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 1.25rem; margin-top: 2.5rem; border-top: 2px solid #f1f5f9; padding-top: 2rem;">
            <a href="/patient/dashboard" class="btn-cancel">إلغاء</a>
            <button type="submit" class="btn-submit">
                نشر طلب الدم الآن
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            </button>
        </div>
    </form>
</div>

<script>
    const citySelect = document.getElementById('citySelect');
    const cityOtherGroup = document.getElementById('cityOtherGroup');
    
    citySelect.addEventListener('change', function() {
        cityOtherGroup.style.display = this.value === 'أخرى' ? 'block' : 'none';
        if (this.value === 'أخرى') {
            cityOtherGroup.querySelector('input').setAttribute('required', 'required');
        } else {
            cityOtherGroup.querySelector('input').removeAttribute('required');
        }
    });
</script>

<?= $this->endSection() ?>
