<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختر طريقة الدفع - إيثار</title>
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
            max-width: 520px;
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
            margin-bottom: 2.5rem;
        }

        .header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .header p {
            color: var(--gray);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .amount-display {
            background: var(--white);
            padding: 1.5rem;
            border-radius: var(--radius-md);
            text-align: center;
            margin-bottom: 2.5rem;
            border: 2px solid #f1f5f9;
            box-shadow: var(--shadow-sm);
        }

        .amount-display .label {
            font-size: 0.85rem;
            color: var(--gray);
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: block;
        }

        .amount-display .amount {
            font-size: 2.25rem;
            font-weight: 900;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .amount-display .currency {
            font-size: 1rem;
            color: var(--gray);
            font-weight: 700;
        }

        .payment-methods {
            display: grid;
            gap: 1.25rem;
        }

        .payment-option {
            background: var(--white);
            border: 2px solid #f1f5f9;
            border-radius: 1.25rem;
            padding: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .payment-option:hover {
            border-color: var(--primary);
            background: var(--primary-glow);
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .payment-option .icon-box {
            width: 64px;
            height: 64px;
            background: #f8fafc;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            transition: var(--transition);
            flex-shrink: 0;
        }

        .payment-option:hover .icon-box {
            background: var(--white);
            transform: scale(1.1) rotate(-5deg);
        }

        .payment-option .content {
            flex: 1;
        }

        .payment-option .title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.25rem;
            display: block;
        }

        .payment-option .description {
            color: var(--gray);
            font-size: 0.85rem;
            font-weight: 600;
        }

        .payment-option .arrow {
            color: #cbd5e1;
            transition: var(--transition);
        }

        .payment-option:hover .arrow {
            color: var(--primary);
            transform: translateX(-5px);
        }

        .back-btn {
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

        .back-btn:hover {
            color: var(--dark);
            transform: translateX(5px);
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .payment-methods > *:nth-child(1) { animation: slideIn 0.4s ease-out 0.1s both; }
        .payment-methods > *:nth-child(2) { animation: slideIn 0.4s ease-out 0.2s both; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>اختر طريقة الدفع</h1>
                <p>اختر الطريقة المناسبة لإتمام عملية التبرع</p>
            </div>

            <div class="amount-display">
                <span class="label">إجمالي مبلغ التبرع</span>
                <div class="amount">
                    <?= number_format($amount) ?>
                    <span class="currency">د.ل</span>
                </div>
            </div>

            <div class="payment-methods">
                <a href="/payment/fake-card" class="payment-option">
                    <div class="icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--primary);"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                    </div>
                    <div class="content">
                        <span class="title">الدفع الإلكتروني</span>
                        <span class="description">ادفع باستخدام بطاقة الائتمان الخاصة بك</span>
                    </div>
                    <div class="arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </div>
                </a>

                <a href="/payment/prepaid-card-form" class="payment-option">
                    <div class="icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--secondary);"><path d="M2 9a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9Z"></path><path d="M2 9V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4"></path><path d="M12 12v6"></path><path d="M9 15h6"></path></svg>
                    </div>
                    <div class="content">
                        <span class="title">كرت مسبق الدفع</span>
                        <span class="description">استخدم كود كرت شحن إيثار (القيمة: <?= number_format($amount) ?> د.ل)</span>
                    </div>
                    <div class="arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </div>
                </a>
            </div>

            <a href="/payment/amount" class="back-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                العودة لتعديل المبلغ
            </a>
        </div>
    </div>
</body>
</html>
