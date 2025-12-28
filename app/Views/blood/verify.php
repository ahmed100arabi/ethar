<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التحقق من الرمز - تبرع بالدم</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #e11d48;
            --primary-glow: rgba(225, 29, 72, 0.1);
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
            max-width: 450px;
        }

        .card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 3rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: cardAppear 0.6s ease-out;
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: #fff1f2;
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2.5rem;
            border: 2px solid var(--primary-glow);
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.75rem;
        }

        .description {
            color: var(--gray);
            font-weight: 600;
            line-height: 1.6;
            margin-bottom: 2.5rem;
        }

        .otp-alert {
            background: #fff7ed;
            color: #c2410c;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-align: right;
        }

        .error-alert {
            background: #fff1f2;
            border: 1px solid #fecaca;
            color: var(--primary);
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .otp-input {
            width: 100%;
            padding: 1.25rem;
            border: 2px solid #f1f5f9;
            border-radius: 1rem;
            font-size: 2rem;
            text-align: center;
            letter-spacing: 0.75em;
            font-family: 'Courier New', monospace;
            font-weight: 800;
            color: var(--primary);
            transition: var(--transition);
            outline: none;
            background: var(--white);
        }

        .otp-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-glow);
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
            box-shadow: 0 8px 20px rgba(225, 29, 72, 0.2);
        }

        .btn-submit:hover {
            background: #be123c;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(225, 29, 72, 0.3);
        }

        .back-link {
            display: block;
            margin-top: 1.5rem;
            color: var(--gray);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .back-link:hover {
            color: var(--dark);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="icon-box">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
            
            <h1>تأكيد التبرع</h1>
            <p class="description">أدخل رمز التحقق المكون من 4 أرقام المرسل إلى هاتفك لإتمام العملية</p>

            <?php if(session()->getFlashdata('otp_sent')): ?>
                <div class="otp-alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <?= session()->getFlashdata('otp_sent') ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="error-alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="/blood-donation/confirm" method="POST">
                <div class="form-group">
                    <input type="text" name="otp" class="otp-input" maxlength="4" pattern="\d{4}" placeholder="****" required autofocus>
                </div>

                <button type="submit" class="btn-submit">تأكيد التبرع الآن</button>
            </form>

            <a href="/blood-donation" class="back-link">← إلغاء والعودة</a>
        </div>
    </div>

    <script>
        const otpInput = document.querySelector('.otp-input');
        otpInput.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
            if (e.target.value.length === 4) {
                e.target.form.submit();
            }
        });
    </script>
</body>
</html>
