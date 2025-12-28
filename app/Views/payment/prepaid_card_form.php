<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كرت مسبق الدفع - إيثار</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-glow: rgba(37, 99, 235, 0.1);
            --secondary: #f59e0b;
            --accent: #ef4444;
            --dark: #0f172a;
            --gray: #64748b;
            --light: #f8fafc;
            --white: #ffffff;
            --glass: rgba(255, 255, 255, 0.9);
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
            --shadow-md: 0 10px 15px -3px rgba(0,0,0,0.1);
            --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.1);
            --radius-md: 1rem;
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
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: var(--dark);
        }

        .container {
            width: 100%;
            max-width: 480px;
        }

        .card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 2.5rem;
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
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .amount-display {
            background: var(--white);
            padding: 1.25rem;
            border-radius: var(--radius-md);
            text-align: center;
            margin-bottom: 2rem;
            border: 2px solid #f1f5f9;
        }

        .amount-display .label {
            font-size: 0.85rem;
            color: var(--gray);
            font-weight: 700;
            margin-bottom: 0.25rem;
            display: block;
        }

        .amount-display .amount {
            font-size: 1.75rem;
            font-weight: 900;
            color: var(--primary);
        }

        .card-preview {
            background: linear-gradient(135deg, var(--primary) 0%, #1d4ed8 100%);
            padding: 2rem;
            border-radius: 1.25rem;
            margin-bottom: 2.5rem;
            color: var(--white);
            text-align: center;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.2);
            position: relative;
            overflow: hidden;
        }

        .card-preview::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .card-preview .icon-box {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
            font-size: 2rem;
        }

        .card-preview .card-name {
            font-size: 0.9rem;
            font-weight: 700;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .card-preview .card-value {
            font-size: 1.5rem;
            font-weight: 900;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 800;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            pointer-events: none;
        }

        .form-control {
            width: 100%;
            padding: 1rem 3.5rem 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 1rem;
            font-family: inherit;
            font-size: 1.25rem;
            font-weight: 800;
            transition: var(--transition);
            outline: none;
            background: var(--white);
            letter-spacing: 2px;
            text-align: center;
        }

        .form-control:focus {
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
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-submit:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.3);
        }

        .back-btn {
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

        .back-btn:hover {
            color: var(--dark);
            transform: translateX(5px);
        }

        .error-alert {
            background: #fff1f2;
            border: 1px solid #fecaca;
            color: var(--accent);
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .helper-text {
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 0.75rem;
            font-weight: 600;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--primary);"><path d="M2 9a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9Z"></path><path d="M2 9V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4"></path><path d="M12 12v6"></path><path d="M9 15h6"></path></svg>
                    كرت مسبق الدفع
                </h1>
            </div>

            <div class="amount-display">
                <span class="label">المبلغ المطلوب سداده</span>
                <div class="amount"><?= number_format($amount) ?> <span style="font-size: 0.9rem; color: var(--gray);">د.ل</span></div>
            </div>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="error-alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="card-preview">
                <div class="icon-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
                <div class="card-name">كرت شحن إيثار</div>
                <div class="card-value">قيمة الكرت: <?= number_format($amount) ?> د.ل</div>
            </div>

            <form action="/payment/redeem-card" method="POST">
                <input type="hidden" name="case_id" value="<?= session()->get('donation_data')['case_id'] ?>">
                <input type="hidden" name="email" value="<?= session()->get('donation_data')['email'] ?>">
                
                <div class="form-group">
                    <label>كود الكرت</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        </div>
                        <input type="text" name="card_code" class="form-control" placeholder="XXXX-XXXX-XXXX" maxlength="14" required autofocus>
                    </div>
                    <p class="helper-text">أدخل الرمز المكون من 12 خانة المطبوع على الكرت</p>
                </div>

                <button type="submit" class="btn-submit">
                    تفعيل الكرت وإتمام التبرع
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
            </form>

            <a href="/payment/select-method" class="back-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                العودة لاختيار طريقة الدفع
            </a>
        </div>
    </div>
</body>
</html>
