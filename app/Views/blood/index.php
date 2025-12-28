<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بنك الدم الإلكتروني - إيثار</title>
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
            background-color: #f1f5f9;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Navbar */
        .navbar {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0d9488;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--gray);
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary);
        }

        /* Header */
        .page-header {
            background: linear-gradient(135deg, #be123c 0%, #e11d48 100%);
            color: white;
            padding: 5rem 1rem;
            text-align: center;
            border-radius: 0 0 3rem 3rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .page-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            letter-spacing: -1px;
        }

        .page-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            font-weight: 500;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Filters */
        .filters-card {
            background: var(--white);
            padding: 2rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            margin-top: -4rem;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .filters-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) auto;
            gap: 1.25rem;
            align-items: end;
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group label {
            display: block;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .form-select, .form-input {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 2px solid #f1f5f9;
            border-radius: 0.75rem;
            font-family: inherit;
            font-weight: 600;
            outline: none;
            transition: var(--transition);
            background: #f8fafc;
        }

        .form-select:focus, .form-input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        .btn-filter {
            background: var(--dark);
            color: white;
            padding: 0.85rem 2.5rem;
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-filter:hover {
            background: #000;
            transform: translateY(-2px);
        }

        /* Grid */
        .requests-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 2rem;
            margin: 4rem 0;
        }

        .card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 2rem;
            position: relative;
            transition: var(--transition);
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-glow);
        }

        .card.critical {
            border: 2px solid var(--primary);
        }

        .blood-type-badge {
            width: 64px;
            height: 64px;
            background: #fff1f2;
            color: var(--primary);
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            border: 2px solid var(--primary-glow);
        }

        .urgency-badge {
            position: absolute;
            top: 2rem;
            left: 2rem;
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .urgency-critical {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .urgency-normal {
            background: #f1f5f9;
            color: var(--gray);
        }

        .patient-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--gray);
            margin-bottom: 0.75rem;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .info-item svg {
            color: var(--primary);
            opacity: 0.7;
        }

        .actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.85rem;
            border-radius: 0.75rem;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            transition: var(--transition);
            font-family: inherit;
            cursor: pointer;
            border: none;
        }

        .btn-call {
            background: #f1f5f9;
            color: var(--dark);
        }

        .btn-call:hover {
            background: #e2e8f0;
        }

        .btn-donate {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.2);
        }

        .btn-donate:hover {
            background: #be123c;
            transform: translateY(-2px);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .modal.active { display: flex; }

        .modal-content {
            background: var(--white);
            padding: 2.5rem;
            border-radius: var(--radius-lg);
            width: 100%;
            max-width: 450px;
            box-shadow: var(--shadow-lg);
            animation: modalPop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes modalPop {
            from { transform: scale(0.9) translateY(20px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }

        .modal-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .modal-header h3 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .modal-header p {
            color: var(--gray);
            font-weight: 600;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: var(--white);
            border-radius: var(--radius-lg);
            grid-column: 1 / -1;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: var(--gray);
            margin-top: 1.5rem;
        }

        @media (max-width: 768px) {
            .page-title { font-size: 2.25rem; }
            .filters-form { grid-template-columns: 1fr; }
            .btn-filter { width: 100%; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container navbar-content">
            <a href="/" class="logo">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="#0d9488"/>
                </svg>
                <span>إيثار</span>
            </a>
            <div class="nav-links">
                <a href="<?= base_url('') ?>" class="nav-link">الرئيسية</a>
                <a href="<?= base_url('cases') ?>" class="nav-link">الحالات</a>
                <a href="<?= base_url('blood-donation') ?>" class="nav-link active">تبرع بالدم</a>
                <a href="<?= base_url('campaigns') ?>" class="nav-link">حملات التوعية</a>
            </div>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">بنك الدم الإلكتروني</h1>
            <p class="page-subtitle">ساهم في إنقاذ حياة.. قطرة دم واحدة قد تكون الأمل الأخير لشخص ما</p>
        </div>
    </div>

    <div class="container">
        <div class="filters-card">
            <form action="/blood-donation" method="GET" class="filters-form">
                <div class="form-group">
                    <label>فصيلة الدم</label>
                    <select name="blood_type" class="form-select">
                        <option value="">كل الفصائل</option>
                        <?php foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $type): ?>
                            <option value="<?= $type ?>" <?= service('request')->getGet('blood_type') == $type ? 'selected' : '' ?>><?= $type ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>المدينة</label>
                    <select name="city" class="form-select" id="citySelect">
                        <option value="">كل المدن</option>
                        <?php foreach(['طرابلس', 'بنغازي', 'مصراتة', 'سبها', 'الزاوية', 'أخرى'] as $city): ?>
                            <option value="<?= $city ?>" <?= service('request')->getGet('city') == $city ? 'selected' : '' ?>><?= $city ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" id="cityOtherGroup" style="display: none;">
                    <label>اسم المدينة</label>
                    <input type="text" name="city_other" placeholder="أدخل اسم المدينة" value="<?= service('request')->getGet('city_other') ?>" class="form-input">
                </div>
                <div class="form-group">
                    <label>الحالة</label>
                    <select name="urgency" class="form-select">
                        <option value="">كل الحالات</option>
                        <option value="critical" <?= service('request')->getGet('urgency') == 'critical' ? 'selected' : '' ?>>حرجة جداً</option>
                        <option value="normal" <?= service('request')->getGet('urgency') == 'normal' ? 'selected' : '' ?>>عادية</option>
                    </select>
                </div>
                <button type="submit" class="btn-filter">
                    بحث وتصفية
                </button>
            </form>
        </div>

        <?php if(session()->getFlashdata('success')): ?>
            <div style="background: #dcfce7; color: #166534; padding: 1.25rem; border-radius: 1rem; margin-top: 2rem; font-weight: 700; display: flex; align-items: center; gap: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="requests-grid">
            <?php if(empty($requests)): ?>
                <div class="empty-state">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    <h3>لا توجد طلبات تبرع تطابق بحثك حالياً</h3>
                </div>
            <?php else: ?>
                <?php foreach ($requests as $req): ?>
                <div class="card <?= $req['urgency'] == 'critical' ? 'critical' : '' ?>">
                    <div class="blood-type-badge"><?= $req['blood_type'] ?></div>
                    
                    <?php if($req['urgency'] == 'critical'): ?>
                        <span class="urgency-badge urgency-critical">حالة حرجة</span>
                    <?php else: ?>
                        <span class="urgency-badge urgency-normal">حالة عادية</span>
                    <?php endif; ?>

                    <h3 class="patient-name"><?= $req['patient_name'] ?></h3>
                    
                    <div class="info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <?= $req['hospital'] ?>
                    </div>
                    <div class="info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <?= $req['city'] ?>
                    </div>
                    <div class="info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        منذ <?= time_ago($req['created_at']) ?>
                    </div>

                    <div class="actions">
                        <a href="tel:<?= $req['phone'] ?>" class="btn btn-call">اتصال</a>
                        <button onclick="openModal(<?= $req['id'] ?>)" class="btn btn-donate">تبرع الآن</button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Donation Modal -->
    <div id="donateModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>تسجيل تبرع جديد</h3>
                <p>أدخل بياناتك ليتمكن المريض من التواصل معك</p>
            </div>
            
            <form action="/blood-donation/donate" method="POST">
                <input type="hidden" name="request_id" id="modalRequestId">
                <div class="form-group" style="margin-bottom: 1.25rem;">
                    <label>الاسم الكامل</label>
                    <input type="text" name="name" class="form-input" placeholder="أدخل اسمك الثلاثي" required>
                </div>
                <div class="form-group" style="margin-bottom: 2rem;">
                    <label>رقم الهاتف</label>
                    <input type="tel" name="phone" class="form-input" placeholder="09X XXXXXXX" required>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <button type="submit" class="btn btn-donate">تأكيد التبرع</button>
                    <button type="button" onclick="closeModal()" class="btn btn-call">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const citySelect = document.getElementById('citySelect');
        const cityOtherGroup = document.getElementById('cityOtherGroup');
        
        citySelect.addEventListener('change', function() {
            cityOtherGroup.style.display = this.value === 'أخرى' ? 'block' : 'none';
        });

        if(citySelect.value === 'أخرى') cityOtherGroup.style.display = 'block';

        function openModal(id) {
            document.getElementById('modalRequestId').value = id;
            document.getElementById('donateModal').classList.add('active');
        }
        function closeModal() {
            document.getElementById('donateModal').classList.remove('active');
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('donateModal')) {
                closeModal();
            }
        }
    </script>

</body>
</html>

<?php
function time_ago($timestamp) {
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes      = round($seconds / 60 );
    $hours           = round($seconds / 3600);
    $days          = round($seconds / 86400);
    $weeks          = round($seconds / 604800);
    $months          = round($seconds / 2629440);
    $years          = round($seconds / 31553280);
    
    if($seconds <= 60) return "الآن";
    else if($minutes <=60) return $minutes==1 ? "دقيقة واحدة" : "$minutes دقائق";
    else if($hours <=24) return $hours==1 ? "ساعة واحدة" : "$hours ساعات";
    else if($days <= 7) return $days==1 ? "أمس" : "$days أيام";
    else if($weeks <= 4.3) return $weeks==1 ? "أسبوع واحد" : "$weeks أسابيع";
    else return date('Y-m-d', $time_ago);
}
?>
