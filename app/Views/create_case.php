<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة حالة جديدة - إيثار</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0d9488;
            --primary-glow: rgba(13, 148, 136, 0.1);
            --secondary: #f59e0b;
            --dark: #0f172a;
            --gray: #64748b;
            --light: #f8fafc;
            --white: #ffffff;
            --glass: rgba(255, 255, 255, 0.9);
            --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.1);
            --radius-lg: 1.5rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: var(--dark);
        }

        .container {
            width: 100%;
            max-width: 800px;
        }

        .card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 3.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            animation: cardAppear 0.6s ease-out;
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .header p {
            color: var(--gray);
            font-weight: 600;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-label {
            display: block;
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--dark);
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
            background: var(--white);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        textarea.form-control {
            min-height: 140px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .file-upload-container {
            border: 2px dashed #cbd5e1;
            border-radius: 1rem;
            padding: 2.5rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.5);
            position: relative;
        }

        .file-upload-container:hover {
            border-color: var(--primary);
            background: var(--primary-glow);
        }

        .file-upload-container svg {
            color: var(--gray);
            margin-bottom: 1rem;
            transition: var(--transition);
        }

        .file-upload-container:hover svg {
            color: var(--primary);
            transform: translateY(-5px);
        }

        .file-upload-container p {
            font-weight: 700;
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .file-upload-container span {
            font-size: 0.85rem;
            color: #94a3b8;
        }

        .file-input {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 1.25rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 1.1rem;
            font-family: inherit;
            font-weight: 800;
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1.5rem;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(13, 148, 136, 0.3);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
            color: var(--gray);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .back-link:hover {
            color: var(--dark);
            transform: translateX(5px);
        }

        @media (max-width: 600px) {
            .row { grid-template-columns: 1fr; }
            .card { padding: 2rem; }
            .header h1 { font-size: 1.75rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    طلب مساعدة جديد
                </h1>
                <p>قم بتعبئة النموذج التالي وسيتم مراجعة طلبك من قبل فريقنا</p>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">عنوان الحالة</label>
                    <input type="text" class="form-control" placeholder="مثال: مساعدة في تكاليف عملية جراحية" required>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="form-label">المدينة</label>
                        <select class="form-control" required>
                            <option value="">اختر المدينة</option>
                            <?php foreach(['طرابلس', 'بنغازي', 'مصراتة', 'سبها', 'الزاوية'] as $city): ?>
                                <option value="<?= $city ?>"><?= $city ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">التصنيف</label>
                        <select class="form-control" required>
                            <option value="">اختر التصنيف</option>
                            <option value="طبية">حالة طبية عامة</option>
                            <option value="جراحية">عملية جراحية</option>
                            <option value="أدوية">توفير أدوية</option>
                            <option value="أجهزة">أجهزة طبية</option>
                            <option value="علاج طبيعي">علاج طبيعي</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">المبلغ المطلوب (د.ل)</label>
                    <input type="number" class="form-control" placeholder="0.00" min="0" step="0.01" required>
                </div>

                <div class="form-group">
                    <label class="form-label">وصف الحالة بالتفصيل</label>
                    <textarea class="form-control" placeholder="اشرح تفاصيل الحالة الصحية واحتياجاتها الضرورية..." required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">المرفقات الطبية (صور التقارير/الوصفات)</label>
                    <div class="file-upload-container">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                        <p>اضغط لرفع الملفات أو قم بسحبها هنا</p>
                        <span>يمكنك رفع صور التقارير الطبية (JPG, PNG, PDF)</span>
                        <input type="file" class="file-input" multiple>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    إرسال الطلب للمراجعة
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
            </form>

            <a href="/" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                العودة للرئيسية
            </a>
        </div>
    </div>
</body>
</html>
