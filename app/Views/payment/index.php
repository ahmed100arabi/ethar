<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديد مبلغ التبرع - إيثار</title>
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
            perspective: 1000px;
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
            from { opacity: 0; transform: translateY(30px) rotateX(-5deg); }
            to { opacity: 1; transform: translateY(0) rotateX(0); }
        }

        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.75rem;
            letter-spacing: -0.5px;
        }

        .case-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary-glow);
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .method-toggle {
            display: flex;
            background: #f1f5f9;
            padding: 0.4rem;
            border-radius: 1rem;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .method-btn {
            flex: 1;
            border: none;
            padding: 0.85rem;
            border-radius: 0.75rem;
            font-family: inherit;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition);
            z-index: 1;
            background: transparent;
            color: var(--gray);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .method-btn.active {
            background: var(--white);
            color: var(--primary);
            box-shadow: var(--shadow-sm);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 800;
            font-size: 0.9rem;
            color: var(--dark);
            margin-bottom: 0.75rem;
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

        .input {
            width: 100%;
            padding: 1rem 3rem 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 1rem;
            font-family: inherit;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark);
            transition: var(--transition);
            outline: none;
            background: var(--white);
            text-align: center;
        }

        .input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        .quick-amounts {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .amount-chip {
            background: var(--white);
            border: 2px solid #f1f5f9;
            padding: 0.75rem;
            border-radius: 0.75rem;
            font-weight: 800;
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
        }

        .amount-chip:hover {
            border-color: var(--primary-glow);
            color: var(--primary);
            background: var(--primary-glow);
        }

        .amount-chip.active {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
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
            margin-top: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.2);
        }

        .btn-submit:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .helper-text {
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 0.75rem;
            font-weight: 600;
            line-height: 1.5;
        }

        .fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.98); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>تحديد مبلغ التبرع</h1>
                <div class="case-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                    <?= $case['title'] ?>
                </div>
            </div>

            <div class="method-toggle">
                <button onclick="showManual()" id="btnManual" class="method-btn active">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                    دفع إلكتروني
                </button>
                <button onclick="showCard()" id="btnCard" class="method-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 9a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9Z"></path><path d="M2 9V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4"></path><path d="M12 12v6"></path><path d="M9 15h6"></path></svg>
                    كرت مسبق
                </button>
            </div>

            <!-- Manual Payment Form -->
            <form id="manualForm" action="/payment/process" method="POST" class="fade-in">
                <div class="form-group">
                    <label class="form-label">مبلغ التبرع (د.ل)</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                        <input type="number" name="amount" id="amountInput" class="input" placeholder="0.00" min="1" required autofocus>
                    </div>
                    <div class="quick-amounts">
                        <div class="amount-chip" onclick="setAmount(10, this)">10</div>
                        <div class="amount-chip" onclick="setAmount(50, this)">50</div>
                        <div class="amount-chip" onclick="setAmount(100, this)">100</div>
                    </div>
                </div>
                
                <div class="form-group" style="margin-top: 2rem;">
                    <label class="form-label">رقم الهاتف (اختياري)</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <input type="text" name="donor_phone" class="input" placeholder="09X XXXXXXX" style="font-size: 1.1rem; font-weight: 700;">
                    </div>
                    <p class="helper-text">سيتم عرض رقم هاتفك للمريض ليتمكن من التواصل معك وشكرك على مساهمتك.</p>
                </div>

                <button type="submit" class="btn-submit">
                    متابعة لعملية الدفع
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
            </form>

            <!-- Card Payment Form -->
            <form id="cardForm" action="/payment/redeem-card" method="POST" style="display: none;" class="fade-in">
                <input type="hidden" name="case_id" value="<?= $case['id'] ?>">
                <input type="hidden" name="email" value="<?= session('donation_data')['email'] ?? '' ?>">
                
                <div class="form-group">
                    <label class="form-label">رمز الكرت المسبق</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </div>
                        <input type="text" name="card_code" class="input" placeholder="XXXX-XXXX-XXXX" style="letter-spacing: 2px;" required>
                    </div>
                    <p class="helper-text">أدخل الرمز المكون من 12 خانة الموجود على كرت إيثار المسبق.</p>
                </div>
                
                <button type="submit" class="btn-submit">
                    استخدام الكرت الآن
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
            </form>
        </div>
    </div>

    <script>
        function setAmount(val, el) {
            document.getElementById('amountInput').value = val;
            document.querySelectorAll('.amount-chip').forEach(chip => chip.classList.remove('active'));
            el.classList.add('active');
        }

        function showManual() {
            document.getElementById('manualForm').style.display = 'block';
            document.getElementById('cardForm').style.display = 'none';
            document.getElementById('btnManual').classList.add('active');
            document.getElementById('btnCard').classList.remove('active');
        }

        function showCard() {
            document.getElementById('manualForm').style.display = 'none';
            document.getElementById('cardForm').style.display = 'block';
            document.getElementById('btnCard').classList.add('active');
            document.getElementById('btnManual').classList.remove('active');
        }
    </script>
</body>
</html>
