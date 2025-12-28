<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container" style="max-width: 600px; margin: 4rem auto;">
    <div class="card">
        <div class="card-body" style="padding: 2rem;">
            <h2 style="text-align: center; margin-bottom: 2rem;">التحقق من الكرت</h2>
            
            <div style="text-align: center; margin-bottom: 2rem;">
                <div style="background: #f0fdf4; color: #166534; padding: 1rem; border-radius: 0.5rem; display: inline-block;">
                    تم إرسال رمز التحقق إلى بريدك الإلكتروني
                </div>
            </div>

            <form action="/payment/confirm-card" method="post">
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem;">رمز التحقق (OTP)</label>
                    <input type="text" name="otp" 
                           maxlength="4" 
                           pattern="[0-9]{4}"
                           placeholder="XXXX"
                           style="width: 100%; padding: 1rem; font-size: 1.5rem; text-align: center; letter-spacing: 0.5rem; border: 2px solid #e2e8f0; border-radius: 0.5rem;"
                           required>
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="padding: 1rem;">
                    تأكيد الدفع
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
