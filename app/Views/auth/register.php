<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حساب جديد - إيثار</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0f766e;
            --primary-glow: rgba(15, 118, 110, 0.15);
            --secondary: #f59e0b;
            --dark: #0f172a;
            --light: #f1f5f9;
            --white: #ffffff;
            --glass: rgba(255, 255, 255, 0.9);
            --radius: 1rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            background: radial-gradient(circle at top right, #134e4a, #0f172a);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 2rem 1.5rem;
            color: var(--dark);
        }

        .auth-card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            padding: 3rem;
            border-radius: var(--radius);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 500px;
            animation: fadeInUp 0.6s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary);
            font-size: 2rem;
            font-weight: 800;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .logo svg {
            color: var(--primary);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        label {
            display: block;
            margin-bottom: 0.6rem;
            color: var(--dark);
            font-weight: 700;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 0.85rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.75rem;
            font-family: inherit;
            font-size: 0.95rem;
            transition: var(--transition);
            outline: none;
            background: white;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary) 0%, #0d9488 100%);
            color: var(--white);
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
            box-shadow: 0 4px 15px var(--primary-glow);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--primary-glow);
        }

        .alert {
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .links {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.95rem;
            color: #64748b;
            font-weight: 500;
        }

        a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            transition: var(--transition);
        }

        a:hover {
            text-decoration: underline;
        }

        .back-home {
            position: absolute;
            top: 2rem;
            right: 2rem;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            opacity: 0.8;
            transition: var(--transition);
        }

        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .form-group.full-width {
                grid-column: span 1;
            }
            .auth-card {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <a href="/" class="back-home">
        <span>العودة للرئيسية</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    </a>

    <div class="auth-card">
        <div class="logo">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="currentColor"/>
            </svg>
            إنشاء حساب جديد
        </div>
        
        <?php if(isset($validation)):?>
            <div class="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>

        <form action="/register" method="post">
            <div class="form-grid">
                <div class="form-group full-width">
                    <label for="name">الاسم الكامل</label>
                    <input type="text" name="name" id="name" value="<?= set_value('name') ?>" placeholder="أدخل اسمك الكامل" required>
                </div>
                <div class="form-group">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" name="email" id="email" value="<?= set_value('email') ?>" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="phone">رقم الهاتف</label>
                    <input type="text" name="phone" id="phone" value="<?= set_value('phone') ?>" placeholder="09XXXXXXXX" required>
                </div>
                <div class="form-group">
                    <label for="password">كلمة المرور</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" required>
                </div>
                <div class="form-group">
                    <label for="confpassword">تأكيد كلمة المرور</label>
                    <input type="password" name="confpassword" id="confpassword" placeholder="••••••••" required>
                </div>
            </div>
            <button type="submit">إنشاء الحساب الآن</button>
        </form>

        <div class="links">
            لديك حساب بالفعل؟ <a href="/login">سجل الدخول من هنا</a>
        </div>
    </div>
</body>
</html>

