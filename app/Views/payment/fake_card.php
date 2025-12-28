<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدفع ببطاقة الائتمان - إيثار</title>
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
            max-width: 500px;
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
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            padding: 2rem;
            border-radius: 1.25rem;
            margin-bottom: 2.5rem;
            color: var(--white);
            min-height: 220px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: var(--transition);
        }

        .card-preview::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .card-preview .chip {
            width: 50px;
            height: 40px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border-radius: 8px;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .card-preview .chip::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 60%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }

        .card-number-display {
            font-size: 1.5rem;
            letter-spacing: 0.15em;
            margin: 1rem 0;
            font-family: 'Courier New', monospace;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .card-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .detail-item .label {
            font-size: 0.65rem;
            text-transform: uppercase;
            opacity: 0.7;
            margin-bottom: 0.25rem;
            display: block;
            font-weight: 700;
        }

        .detail-item .value {
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 800;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.75rem;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 700;
            transition: var(--transition);
            outline: none;
            background: var(--white);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        .form-row {
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
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.2);
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
            font-size: 0.8rem;
            color: var(--gray);
            margin-top: 0.4rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--primary);"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                    الدفع بالبطاقة
                </h1>
            </div>

            <div class="amount-display">
                <span class="label">المبلغ المطلوب دفعه</span>
                <div class="amount"><?= number_format($amount) ?> <span style="font-size: 0.9rem; color: var(--gray);">د.ل</span></div>
            </div>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="error-alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="card-preview" id="cardPreview">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div class="chip"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.5;"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                </div>
                <div class="card-number-display" id="cardNumberDisplay">**** **** **** ****</div>
                <div class="card-details">
                    <div class="detail-item">
                        <span class="label">حامل البطاقة</span>
                        <div class="value" id="cardHolderDisplay">CARD HOLDER</div>
                    </div>
                    <div class="detail-item">
                        <span class="label">الصلاحية</span>
                        <div class="value" id="expiryDisplay">MM/YY</div>
                    </div>
                </div>
            </div>

            <form action="/payment/process-fake-card" method="POST">
                <div class="form-group">
                    <label>رقم البطاقة</label>
                    <input type="text" name="card_number" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19" required>
                    <div class="helper-text">أدخل الـ 16 رقماً المكتوبة على وجه البطاقة</div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>تاريخ الانتهاء</label>
                        <input type="text" name="expiry" id="expiry" class="form-control" placeholder="MM/YY" maxlength="5" required>
                    </div>
                    <div class="form-group">
                        <label>رمز الأمان (CVV)</label>
                        <input type="text" name="cvv" id="cvv" class="form-control" placeholder="123" maxlength="3" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>اسم حامل البطاقة</label>
                    <input type="text" name="card_holder" id="cardHolder" class="form-control" placeholder="AHMED ALI" style="text-transform: uppercase;">
                </div>

                <button type="submit" class="btn-submit">إتمام عملية الدفع</button>
            </form>

            <a href="/payment/select-method" class="back-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                العودة لاختيار طريقة الدفع
            </a>
        </div>
    </div>

    <script>
        const cardNumber = document.getElementById('cardNumber');
        const cardNumberDisplay = document.getElementById('cardNumberDisplay');
        const cardPreview = document.getElementById('cardPreview');
        
        cardNumber.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || '';
            e.target.value = formattedValue;
            
            if (value.length > 0) {
                let displayValue = value.padEnd(16, '*').match(/.{1,4}/g).join(' ');
                cardNumberDisplay.textContent = displayValue;
            } else {
                cardNumberDisplay.textContent = '**** **** **** ****';
            }

            // Simple card type detection (visual only)
            if (value.startsWith('4')) {
                cardPreview.style.background = 'linear-gradient(135deg, #1e40af 0%, #3b82f6 100%)';
            } else if (value.startsWith('5')) {
                cardPreview.style.background = 'linear-gradient(135deg, #7c2d12 0%, #ea580c 100%)';
            } else {
                cardPreview.style.background = 'linear-gradient(135deg, #1e293b 0%, #334155 100%)';
            }
        });

        const expiry = document.getElementById('expiry');
        const expiryDisplay = document.getElementById('expiryDisplay');
        
        expiry.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
            expiryDisplay.textContent = value || 'MM/YY';
        });

        const cvv = document.getElementById('cvv');
        cvv.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        const cardHolder = document.getElementById('cardHolder');
        const cardHolderDisplay = document.getElementById('cardHolderDisplay');
        
        cardHolder.addEventListener('input', function(e) {
            cardHolderDisplay.textContent = e.target.value.toUpperCase() || 'CARD HOLDER';
        });
    </script>
</body>
</html>
