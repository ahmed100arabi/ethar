<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div>
        <h1 class="page-title">تعديل بيانات الحالة</h1>
        <p style="color: var(--gray); font-weight: 600; margin-top: 0.25rem;">تحديث معلومات الحالة رقم #<?= $case['id'] ?></p>
    </div>
    <a href="/admin/cases" class="btn" style="background: white; color: var(--gray); border: 1px solid #e2e8f0;">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        العودة للقائمة
    </a>
</div>

<div class="card" style="max-width: 900px; margin: 0 auto;">
    <form action="/admin/update-case/<?= $case['id'] ?>" method="post">
        <div style="display: grid; gap: 2rem;">
            
            <div class="form-group">
                <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">عنوان الحالة</label>
                <input type="text" name="title" value="<?= $case['title'] ?>" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div class="form-group">
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">التصنيف</label>
                    <select name="category" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition); background: #f8fafc; cursor: pointer;" required>
                        <option value="طبية" <?= $case['category'] == 'طبية' ? 'selected' : '' ?>>طبية</option>
                        <option value="جراحية" <?= $case['category'] == 'جراحية' ? 'selected' : '' ?>>جراحية</option>
                        <option value="أدوية" <?= $case['category'] == 'أدوية' ? 'selected' : '' ?>>أدوية</option>
                        <option value="أجهزة" <?= $case['category'] == 'أجهزة' ? 'selected' : '' ?>>أجهزة طبية</option>
                        <option value="علاج طبيعي" <?= $case['category'] == 'علاج طبيعي' ? 'selected' : '' ?>>علاج طبيعي</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">المدينة</label>
                    <select name="city" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition); background: #f8fafc; cursor: pointer;" required>
                        <option value="طرابلس" <?= $case['city'] == 'طرابلس' ? 'selected' : '' ?>>طرابلس</option>
                        <option value="بنغازي" <?= $case['city'] == 'بنغازي' ? 'selected' : '' ?>>بنغازي</option>
                        <option value="مصراتة" <?= $case['city'] == 'مصراتة' ? 'selected' : '' ?>>مصراتة</option>
                        <option value="سبها" <?= $case['city'] == 'سبها' ? 'selected' : '' ?>>سبها</option>
                        <option value="الزاوية" <?= $case['city'] == 'الزاوية' ? 'selected' : '' ?>>الزاوية</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">وصف الحالة</label>
                <textarea name="description" rows="6" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition); resize: vertical;" required><?= $case['description'] ?></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div class="form-group">
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">المبلغ المطلوب (د.ل)</label>
                    <input type="number" name="amount_required" value="<?= $case['amount_required'] ?>" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition);" required>
                </div>
                <div class="form-group">
                    <label style="display: block; font-size: 0.9rem; color: var(--dark); font-weight: 800; margin-bottom: 0.75rem;">حالة الطلب</label>
                    <select name="status" style="width: 100%; padding: 0.85rem 1rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; font-family: inherit; outline: none; transition: var(--transition); background: #f8fafc; cursor: pointer;" required>
                        <option value="pending" <?= $case['status'] == 'pending' ? 'selected' : '' ?>>قيد المراجعة</option>
                        <option value="approved" <?= $case['status'] == 'approved' ? 'selected' : '' ?>>نشط (مقبول)</option>
                        <option value="completed" <?= $case['status'] == 'completed' ? 'selected' : '' ?>>مكتمل</option>
                        <option value="rejected" <?= $case['status'] == 'rejected' ? 'selected' : '' ?>>مرفوض</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 1rem;">
                <a href="/admin/cases" class="btn" style="background: #f1f5f9; color: #475569;">إلغاء</a>
                <button type="submit" class="btn btn-primary" style="padding: 0.85rem 2.5rem; font-size: 1rem; box-shadow: 0 4px 15px var(--primary-glow);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    حفظ التغييرات
                </button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
