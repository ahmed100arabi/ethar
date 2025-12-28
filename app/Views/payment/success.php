<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شكراً لك - إيثار</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #10b981;
            --primary-glow: rgba(16, 185, 129, 0.1);
            --secondary: #f59e0b;
            --accent: #ef4444;
            --dark: #0f172a;
            --gray: #64748b;
            --light: #f8fafc;
            --white: #ffffff;
            --glass: rgba(255, 255, 255, 0.9);
            --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.1);
            --radius-lg: 2rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: var(--dark);
            overflow: hidden;
        }

        .container {
            width: 100%;
            max-width: 450px;
            position: relative;
        }

        .card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 3.5rem 2.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: cardCelebrate 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes cardCelebrate {
            0% { opacity: 0; transform: scale(0.5) translateY(50px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: #dcfce7;
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            position: relative;
            animation: iconPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s both;
        }

        @keyframes iconPop {
            0% { transform: scale(0); }
            100% { transform: scale(1); }
        }

        .success-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid var(--primary);
            animation: ripple 1.5s infinite;
        }

        @keyframes ripple {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
            animation: fadeIn 0.6s ease-out 0.6s both;
        }

        p {
            color: var(--gray);
            font-size: 1.1rem;
            font-weight: 600;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            animation: fadeIn 0.6s ease-out 0.7s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            background: var(--primary);
            color: var(--white);
            text-decoration: none;
            padding: 1.1rem 2.5rem;
            border-radius: 1.25rem;
            font-weight: 800;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
            width: 100%;
            animation: fadeIn 0.6s ease-out 0.8s both;
        }

        .btn-home:hover {
            background: #059669;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(16, 185, 129, 0.3);
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: var(--primary);
            top: -20px;
            border-radius: 2px;
            animation: confettiFall 3s linear infinite;
        }

        @keyframes confettiFall {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(720deg); opacity: 0; }
        }

        .share-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #f1f5f9;
            animation: fadeIn 0.6s ease-out 0.9s both;
        }

        .share-text {
            font-size: 0.9rem;
            color: var(--gray);
            font-weight: 700;
            margin-bottom: 1rem;
            display: block;
        }

        .share-btns {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .share-btn {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            transition: var(--transition);
        }

        .share-btn:hover {
            background: var(--primary-glow);
            color: var(--primary);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Confetti Elements -->
    <script>
        for (let i = 0; i < 30; i++) {
            const confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.left = Math.random() * 100 + 'vw';
            confetti.style.animationDelay = Math.random() * 3 + 's';
            confetti.style.backgroundColor = ['#10b981', '#f59e0b', '#3b82f6', '#ef4444'][Math.floor(Math.random() * 4)];
            document.body.appendChild(confetti);
        }
    </script>

    <div class="container">
        <div class="card">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </div>
            
            <h2>شكراً لمساهمتك!</h2>
            <p>تم استلام تبرعك بنجاح. جزاك الله خيراً وجعله في ميزان حسناتك، مساهمتك ستصنع فرقاً كبيراً.</p>
            
            <a href="/" class="btn-home">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                العودة للرئيسية
            </a>

            <div class="share-section">
                <span class="share-text">شارك الخير مع أصدقائك</span>
                <div class="share-btns">
                    <div class="share-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </div>
                    <div class="share-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path></svg>
                    </div>
                    <div class="share-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
