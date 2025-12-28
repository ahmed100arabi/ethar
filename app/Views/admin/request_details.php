<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">مراجعة تفاصيل الطلب</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">الطلب رقم #<?= $case['id'] ?> - مقدم من <?= $case['user_name'] ?></p>
    </div>
    <a href="/admin/requests" class="btn" style="background: white; color: var(--gray); border: 1px solid #e2e8f0;">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        العودة للقائمة
    </a>
</div>

<div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 2.5rem; align-items: start;">
    
    <!-- Case Details -->
    <div style="display: grid; gap: 2rem;">
        <div class="card">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
                <div style="background: var(--primary-glow); color: var(--primary); padding: 0.5rem; border-radius: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                </div>
                <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">معلومات الحالة الأساسية</h2>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <div>
                    <label style="display: block; font-size: 0.85rem; color: var(--gray); font-weight: 700; margin-bottom: 0.5rem;">عنوان الحالة</label>
                    <div style="font-size: 1.1rem; font-weight: 800; color: var(--dark);"><?= $case['title'] ?></div>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; color: var(--gray); font-weight: 700; margin-bottom: 0.5rem;">المستخدم مقدم الطلب</label>
                    <div style="font-size: 1.1rem; font-weight: 800; color: var(--dark);"><?= $case['user_name'] ?></div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <div>
                    <label style="display: block; font-size: 0.85rem; color: var(--gray); font-weight: 700; margin-bottom: 0.5rem;">التصنيف</label>
                    <div style="font-weight: 700; color: var(--dark); background: #f1f5f9; padding: 0.4rem 0.75rem; border-radius: 0.5rem; display: inline-block;"><?= $case['category'] ?></div>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; color: var(--gray); font-weight: 700; margin-bottom: 0.5rem;">المدينة</label>
                    <div style="font-weight: 700; color: var(--dark);"><?= $case['city'] ?></div>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; color: var(--gray); font-weight: 700; margin-bottom: 0.5rem;">المبلغ المطلوب</label>
                    <div style="font-size: 1.25rem; font-weight: 800; color: var(--primary);"><?= number_format($case['amount_required']) ?> <span style="font-size: 0.9rem;">د.ل</span></div>
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 0.85rem; color: var(--gray); font-weight: 700; margin-bottom: 0.5rem;">وصف الحالة</label>
                <div style="line-height: 1.8; color: #475569; background: #f8fafc; padding: 1.5rem; border-radius: 1rem; border: 1px solid #f1f5f9;">
                    <?= nl2br($case['description']) ?>
                </div>
            </div>
        </div>

        <div class="card">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
                <div style="background: rgba(245, 158, 11, 0.1); color: #f59e0b; padding: 0.5rem; border-radius: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                </div>
                <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">المرفقات والتقارير</h2>
            </div>

            <div style="position: relative; border-radius: 1rem; overflow: hidden; border: 1px solid #f1f5f9; box-shadow: var(--shadow-md);">
                <img id="caseImage" src="<?= $case['image'] ?>" alt="Case Image" style="width: 100%; display: block;">
                <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem;">
                    <button type="button" class="btn" onclick="openEditor()" style="width: 100%; background: rgba(15, 23, 42, 0.8); color: white; backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.2); padding: 0.85rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        تعديل الصورة (قص / تعتيم للخصوصية)
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Actions -->
    <div style="position: sticky; top: 2.5rem;">
        <div class="card" style="border: 1px solid var(--primary-glow); background: linear-gradient(to bottom, #ffffff, #f8fafc);">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">
                <div style="background: var(--primary); color: white; padding: 0.5rem; border-radius: 0.5rem; box-shadow: 0 4px 10px var(--primary-glow);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--dark);">اتخاذ قرار</h2>
            </div>

            <form action="/admin/approve/<?= $case['id'] ?>" method="post">
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">كنية المريض (للخصوصية)</label>
                    <input type="text" name="patient_nickname" value="<?= $case['patient_nickname'] ?? '' ?>" placeholder="مثلاً: أبو صالح" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; transition: var(--transition); outline: none;">
                    <p style="font-size: 0.8rem; color: var(--gray); margin-top: 0.5rem; font-weight: 600;">سيتم عرض هذا الاسم بدلاً من الاسم الحقيقي للعامة</p>
                </div>

                <div style="margin-bottom: 2rem; background: #fff1f2; padding: 1.25rem; border-radius: 1rem; border: 1px solid #fecaca;">
                    <label style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer;">
                        <input type="checkbox" name="is_critical" id="is_critical" value="1" <?= ($case['is_critical'] ?? false) ? 'checked' : '' ?> style="width: 1.25rem; height: 1.25rem; accent-color: var(--accent);">
                        <span style="font-weight: 800; color: #991b1b; font-size: 0.95rem;">تعيين كحالة حرجة (تظهر في المقدمة)</span>
                    </label>
                </div>

                <div style="display: grid; gap: 1rem;">
                    <button type="submit" class="btn btn-success" style="width: 100%; padding: 1rem; font-size: 1rem; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        اعتماد ونشر الحالة
                    </button>
                    <a href="/admin/reject/<?= $case['id'] ?>" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رفض هذا الطلب؟')" style="width: 100%; padding: 1rem; font-size: 1rem; background: white; color: var(--accent); border: 2px solid var(--accent);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        رفض الطلب نهائياً
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Image Editor Modal -->
<div id="editorModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.9); backdrop-filter: blur(8px); z-index: 2000; overflow-y: auto;">
    <div style="background: white; width: 95%; max-width: 1100px; margin: 2rem auto; padding: 2rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--dark);">تعديل الصورة للخصوصية</h3>
            <button onclick="closeEditor()" style="background: #f1f5f9; border: none; width: 40px; height: 40px; border-radius: 50%; font-size: 1.5rem; cursor: pointer; display: flex; align-items: center; justify-content: center; color: var(--gray);">&times;</button>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 300px; gap: 2rem; height: 600px;">
            <div style="background: #f1f5f9; border-radius: 1rem; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative; border: 2px solid #e2e8f0;">
                <canvas id="editorCanvas" style="max-width: 100%; max-height: 100%;"></canvas>
            </div>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div style="background: #f8fafc; padding: 1.5rem; border-radius: 1rem; border: 1px solid #f1f5f9;">
                    <h4 style="font-weight: 800; margin-bottom: 1rem; font-size: 0.9rem; color: var(--gray);">أدوات التعديل</h4>
                    <div style="display: grid; gap: 0.75rem;">
                        <button onclick="enableBlur()" class="btn" style="background: white; border: 1px solid #e2e8f0; color: var(--dark); width: 100%; justify-content: flex-start;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            أداة التعتيم (Blur)
                        </button>
                        <button onclick="enableCrop()" class="btn" style="background: white; border: 1px solid #e2e8f0; color: var(--dark); width: 100%; justify-content: flex-start;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2v14a2 2 0 0 0 2 2h14"></path><path d="M18 22V8a2 2 0 0 0-2-2H2"></path></svg>
                            أداة القص (Crop)
                        </button>
                        <button onclick="resetImage()" class="btn" style="background: #fff1f2; color: var(--accent); width: 100%; justify-content: flex-start;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path></svg>
                            إعادة تعيين الصورة
                        </button>
                    </div>
                </div>

                <div style="margin-top: auto; background: #f0fdf4; padding: 1.5rem; border-radius: 1rem; border: 1px solid #bbf7d0;">
                    <p style="font-size: 0.85rem; color: #166534; font-weight: 600; margin-bottom: 1rem; line-height: 1.5;">تأكد من إخفاء أي معلومات شخصية حساسة (الاسم الكامل، الرقم الوطني، إلخ) قبل الحفظ.</p>
                    <button onclick="saveImage()" class="btn btn-success" style="width: 100%; padding: 1rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        حفظ التعديلات النهائية
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let canvas = document.getElementById('editorCanvas');
    let ctx = canvas.getContext('2d');
    let img = new Image();
    let originalSrc = "<?= $case['image'] ?>";
    let currentMode = null;
    let isDrawing = false;
    let startX, startY;

    function openEditor() {
        document.getElementById('editorModal').style.display = 'block';
        img.src = document.getElementById('caseImage').src;
        img.onload = function() {
            const container = canvas.parentElement;
            const maxWidth = container.clientWidth - 40;
            const maxHeight = container.clientHeight - 40;
            
            let width = img.width;
            let height = img.height;
            
            if (width > maxWidth) {
                height *= maxWidth / width;
                width = maxWidth;
            }
            if (height > maxHeight) {
                width *= maxHeight / height;
                height = maxHeight;
            }
            
            canvas.width = width;
            canvas.height = height;
            ctx.drawImage(img, 0, 0, width, height);
        }
    }

    function closeEditor() {
        document.getElementById('editorModal').style.display = 'none';
    }

    function enableBlur() {
        currentMode = 'blur';
        canvas.style.cursor = 'crosshair';
    }

    function enableCrop() {
        currentMode = 'crop';
        canvas.style.cursor = 'crosshair';
    }

    function resetImage() {
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
    }

    canvas.addEventListener('mousedown', function(e) {
        if (!currentMode) return;
        isDrawing = true;
        const rect = canvas.getBoundingClientRect();
        startX = e.clientX - rect.left;
        startY = e.clientY - rect.top;
    });

    canvas.addEventListener('mouseup', function(e) {
        if (!isDrawing) return;
        isDrawing = false;
        const rect = canvas.getBoundingClientRect();
        const endX = e.clientX - rect.left;
        const endY = e.clientY - rect.top;
        const width = endX - startX;
        const height = endY - startY;

        if (currentMode === 'blur') {
            ctx.filter = 'blur(10px)';
            ctx.drawImage(canvas, startX, startY, width, height, startX, startY, width, height);
            ctx.filter = 'none';
        } else if (currentMode === 'crop') {
            let tempCanvas = document.createElement('canvas');
            tempCanvas.width = width;
            tempCanvas.height = height;
            let tempCtx = tempCanvas.getContext('2d');
            tempCtx.drawImage(canvas, startX, startY, width, height, 0, 0, width, height);
            
            canvas.width = width;
            canvas.height = height;
            ctx.drawImage(tempCanvas, 0, 0);
        }
    });

    function saveImage() {
        const dataURL = canvas.toDataURL('image/jpeg');
        
        fetch('/admin/cases/update-image/<?= $case['id'] ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ image: dataURL })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('caseImage').src = data.imagePath + '?t=' + new Date().getTime();
                closeEditor();
                alert('تم حفظ الصورة بنجاح');
            } else {
                alert('حدث خطأ أثناء الحفظ');
            }
        });
    }
</script>
<?= $this->endSection() ?>
