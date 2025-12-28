<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التحقق من الرقم - إيثار</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'IBM Plex Sans Arabic', sans-serif; background: #f8fafc; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); width: 100%; max-width: 400px; text-align: center; }
        .btn { background: #0d9488; color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 0.5rem; width: 100%; font-size: 1rem; cursor: pointer; font-weight: 600; margin-top: 1rem; }
        .input { width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-size: 1.5rem; text-align: center; margin-top: 1rem; letter-spacing: 0.5rem; box-sizing: border-box;}
        h2 { color: #1e293b; margin-bottom: 0.5rem; }
        p { color: #64748b; margin-bottom: 1.5rem; }
        .error { color: #ef4444; background: #fee2e2; padding: 0.5rem; border-radius: 0.5rem; margin-bottom: 1rem; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="card">
        <h2>تأكيد التبرع</h2>
        <p>تم إرسال رمز التحقق (سيظهر في نافذة منبثقة)</p>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/payment/confirm" method="POST">
            <input type="text" name="otp" class="input" placeholder="XXXX" maxlength="4" required autofocus>
            <button type="submit" class="btn">تأكيد ودفع</button>
        </form>
        
        <div style="margin-top: 1rem; font-size: 0.9rem; color: #94a3b8;">
            لم يصلك الرمز؟ <a href="#" style="color: #0d9488;">إعادة إرسال</a>
        </div>
        
        <!-- Hint for demo -->
        <?php if(session()->getFlashdata('otp_message')): ?>
            <script>
                window.onload = function() {
                    alert("<?= session()->getFlashdata('otp_message') ?>");
                }
            </script>
        <?php endif; ?>
    </div>
</body>
</html>
