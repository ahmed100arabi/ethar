<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب تبرع بالدم - إيثار</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #e11d48;
            --primary-glow: rgba(225, 29, 72, 0.1);
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
            background: linear-gradient(135deg, #fff1f2 0%, #ffe4e6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: var(--dark);
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 3rem;
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
            margin-bottom: 2.5rem;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .header p {
            color: var(--gray);
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 2px solid #f1f5f9;
            border-radius: 0.75rem;
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

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .btn-submit {
            width: 100%;
            padding: 1.1rem;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 1rem;
            font-family: inherit;
            font-weight: 800;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
            box-shadow: 0 8px 20px rgba(225, 29, 72, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-submit:hover {
            background: #be123c;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(225, 29, 72, 0.3);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            color: var(--gray);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .back-link:hover {
            color: var(--dark);
            transform: translateX(5px);
        }

        .alert-error {
            background: #fff1f2;
            border: 1px solid #fecaca;
            color: #e11d48;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
        }

        @media (max-width: 600px) {
            .row { grid-template-columns: 1fr; }
            .card { padding: 2rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    طلب تبرع بالدم
                </h1>
                <p>أدخل بيانات الحالة ليتم نشرها في بنك الدم</p>
            </div>

            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert-error">
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <p>• <?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="/blood-donation/create" method="POST">
                <div class="form-group">
                    <label class="form-label">اسم المريض</label>
                    <input type="text" name="patient_name" class="form-control" value="<?= old('patient_name') ?>" placeholder="أدخل اسم المريض أو اللقب" required autofocus>
                </div>
                
                <div class="row">
                    <div class="form-group">
                        <label class="form-label">فصيلة الدم</label>
                        <select name="blood_type" class="form-control" required>
                            <option value="">اختر الفصيلة</option>
                            <?php foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $type): ?>
                                <option value="<?= $type ?>" <?= old('blood_type') == $type ? 'selected' : '' ?>><?= $type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">المدينة</label>
                        <select name="city" class="form-control" required>
                            <option value="">اختر المدينة</option>
                            <?php foreach(['طرابلس', 'بنغازي', 'مصراتة', 'سبها', 'الزاوية'] as $city): ?>
                                <option value="<?= $city ?>" <?= old('city') == $city ? 'selected' : '' ?>><?= $city ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">المستشفى / المركز الطبي</label>
                    <input type="text" name="hospital" class="form-control" value="<?= old('hospital') ?>" placeholder="اسم المستشفى ومكانه" required>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="form-label">درجة الاستعجال</label>
                        <select name="urgency" class="form-control" required>
                            <option value="normal" <?= old('urgency') == 'normal' ? 'selected' : '' ?>>عادية</option>
                            <option value="critical" <?= old('urgency') == 'critical' ? 'selected' : '' ?>>حرجة جداً (مستعجل)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">رقم الهاتف للتواصل</label>
                        <input type="tel" name="phone" class="form-control" value="<?= old('phone') ?>" placeholder="09X XXXXXXX" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    إرسال طلب التبرع
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
            </form>

            <a href="/blood-donation" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                العودة لبنك الدم
            </a>
        </div>
    </div>
</body>
</html>
