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

    .section-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-title svg {
        color: var(--primary);
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
        border-color: var(--primary);
        background: var(--white);
        box-shadow: 0 0 0 4px var(--primary-glow);
    }

    textarea.form-control {
        min-height: 140px;
        resize: vertical;
    }

    .info-banner {
        background: var(--primary-glow);
        padding: 1.5rem;
        border-radius: 1rem;
        border-right: 4px solid var(--primary);
        margin-bottom: 2.5rem;
    }

    .info-banner-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--primary);
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

    .upload-zone {
        border: 2px dashed #cbd5e1;
        border-radius: 1.25rem;
        padding: 3rem;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        background: #f8fafc;
        position: relative;
    }

    .upload-zone:hover {
        border-color: var(--primary);
        background: var(--primary-glow);
    }

    .upload-zone svg {
        color: var(--gray);
        margin-bottom: 1rem;
        transition: var(--transition);
    }

    .upload-zone:hover svg {
        color: var(--primary);
        transform: translateY(-5px);
    }

    .upload-zone p {
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .upload-zone span {
        font-size: 0.85rem;
        color: var(--gray);
    }

    .preview-container {
        display: none;
        margin-top: 1rem;
    }

    .preview-img {
        max-width: 100%;
        max-height: 300px;
        border-radius: 1rem;
        box-shadow: var(--shadow-md);
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary) 0%, #0d9488 100%);
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 1rem;
        font-weight: 800;
        font-size: 1.05rem;
        box-shadow: 0 8px 20px var(--primary-glow);
        border: none;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px var(--primary-glow);
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
    <h1 class="page-title">طلب مساعدة جديد</h1>
</div>

<div class="form-card">
    <div class="info-banner">
        <div class="info-banner-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
            معلومات الخصوصية
        </div>
        <p class="info-banner-text">يمكنك استخدام "كنية" بدلاً من اسمك الحقيقي ليظهر للمتبرعين، وذلك للحفاظ على خصوصيتك وسرية بياناتك الشخصية.</p>
    </div>

    <form action="/patient/create-request" method="post" enctype="multipart/form-data">
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">عنوان الطلب</label>
                <input type="text" name="title" class="form-control" placeholder="مثال: مساعدة في عملية جراحية طارئة" required>
            </div>
            <div class="form-group">
                <label class="form-label">الكنية (اختياري)</label>
                <input type="text" name="patient_nickname" class="form-control" placeholder="مثال: أبو محمد">
                <p style="font-size: 0.8rem; color: var(--gray); margin-top: 0.5rem; font-weight: 600;">سيتم توليد كنية تلقائية إذا تركت الحقل فارغاً</p>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">نوع المساعدة</label>
                <select name="category" class="form-control" required>
                    <option value="">اختر النوع المناسب</option>
                    <option value="طبية">فحوصات طبية</option>
                    <option value="جراحية">عملية جراحية</option>
                    <option value="أدوية">توفير أدوية</option>
                    <option value="أجهزة">أجهزة طبية</option>
                    <option value="علاج طبيعي">علاج طبيعي / غسيل كلى</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">المبلغ المطلوب (د.ل)</label>
                <input type="number" name="amount" class="form-control" placeholder="0.00" step="0.01" required>
            </div>
        </div>

        <div class="grid-2">
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
            <div class="form-group" id="cityOtherGroup" style="display: none;">
                <label class="form-label">اسم المدينة الأخرى</label>
                <input type="text" name="city_other" class="form-control" placeholder="أدخل اسم المدينة">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">وصف الحالة بالتفصيل</label>
            <textarea name="description" class="form-control" placeholder="اشرح تفاصيل الحالة الصحية واحتياجاتها بدقة لمساعدة المتبرعين على فهم الحالة..." required></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">صورة الحالة أو التقارير الطبية</label>
            <div class="upload-zone" id="dropZone">
                <div id="uploadPlaceholder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                    <p>اسحب الصورة هنا أو اضغط للاختيار</p>
                    <span>يدعم صيغ JPG, PNG (بحد أقصى 5 ميجابايت)</span>
                </div>
                <div class="preview-container" id="imagePreview">
                    <img id="previewImg" src="#" class="preview-img">
                    <p style="color: var(--primary); font-weight: 800; margin-top: 1rem;">اضغط لتغيير الصورة</p>
                </div>
                <input type="file" name="image" id="imageInput" accept="image/*" style="display: none;" required>
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 1.25rem; margin-top: 2.5rem; border-top: 2px solid #f1f5f9; padding-top: 2rem;">
            <a href="/patient/dashboard" class="btn-cancel">إلغاء</a>
            <button type="submit" class="btn-submit">
                إرسال الطلب للمراجعة
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            </button>
        </div>
    </form>
</div>

<script>
    // City Toggle
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

    // Image Upload & Preview
    const dropZone = document.getElementById('dropZone');
    const imageInput = document.getElementById('imageInput');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    dropZone.addEventListener('click', () => imageInput.click());

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                uploadPlaceholder.style.display = 'none';
                imagePreview.style.display = 'block';
                dropZone.style.borderColor = 'var(--primary)';
                dropZone.style.background = 'var(--primary-glow)';
            }
            reader.readAsDataURL(file);
        }
    });

    // Drag and Drop
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = 'var(--primary)';
        dropZone.style.background = 'var(--primary-glow)';
    });

    dropZone.addEventListener('dragleave', () => {
        if (!imageInput.files.length) {
            dropZone.style.borderColor = '#cbd5e1';
            dropZone.style.background = '#f8fafc';
        }
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            imageInput.files = e.dataTransfer.files;
            const event = new Event('change');
            imageInput.dispatchEvent(event);
        }
    });
</script>

<?= $this->endSection() ?>
