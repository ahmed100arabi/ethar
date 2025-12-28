<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">إضافة حملة جديدة</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">إنشاء حملة توعوية أو صحية جديدة للمنصة</p>
    </div>
    <a href="/admin/campaigns" class="btn" style="background: white; color: var(--gray); border: 1px solid #e2e8f0;">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        العودة للقائمة
    </a>
</div>

<div class="card" style="max-width: 900px; margin: 0 auto;">
    <form action="/admin/campaigns/store" method="post" enctype="multipart/form-data">
        <div style="display: grid; gap: 2rem;">
            
            <div class="form-group">
                <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">عنوان الحملة</label>
                <input type="text" name="title" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" placeholder="مثال: حملة التوعية بمرض السكري" required>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div class="form-group">
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">تاريخ الحملة</label>
                    <input type="date" name="event_date" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" required>
                </div>
                <div class="form-group">
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">المكان</label>
                    <input type="text" name="location" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" placeholder="مثال: طرابلس - فندق المهاري" required>
                </div>
            </div>

            <div class="form-group">
                <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">صورة الحملة</label>
                <div id="dropZone" style="border: 2px dashed #e2e8f0; padding: 3rem; text-align: center; border-radius: var(--radius-lg); cursor: pointer; transition: var(--transition); background: #f8fafc;">
                    <div id="uploadPlaceholder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        <p style="color: var(--dark); font-weight: 700; margin-bottom: 0.5rem;">اسحب الصورة هنا أو اضغط للاختيار</p>
                        <p style="color: var(--gray); font-size: 0.9rem;">يدعم صيغ JPG, PNG (بحد أقصى 5 ميجابايت)</p>
                    </div>
                    <div id="imagePreview" style="display: none;">
                        <img id="previewImg" src="#" style="max-width: 100%; max-height: 300px; border-radius: var(--radius-md); box-shadow: var(--shadow-md);">
                        <p style="color: var(--primary); font-weight: 700; margin-top: 1rem;">اضغط لتغيير الصورة</p>
                    </div>
                    <input type="file" name="image" id="imageInput" accept="image/*" style="display: none;" required>
                </div>
            </div>

            <div class="form-group">
                <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">وصف الحملة بالتفصيل</label>
                <textarea name="description" rows="6" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition); resize: vertical;" placeholder="اشرح أهداف الحملة، الفئات المستهدفة، وأي تفاصيل أخرى مهمة..." required></textarea>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 1rem;">
                <a href="/admin/campaigns" class="btn" style="background: #f1f5f9; color: #475569;">إلغاء</a>
                <button type="submit" class="btn btn-primary" style="padding: 0.85rem 2.5rem; font-size: 1rem; box-shadow: 0 4px 15px var(--primary-glow);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    حفظ ونشر الحملة
                </button>
            </div>
        </div>
    </form>
</div>

<script>
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
            dropZone.style.borderColor = '#e2e8f0';
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
