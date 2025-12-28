<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $campaign['title'] ?> - إيثار</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0d9488;
            --primary-glow: rgba(13, 148, 136, 0.1);
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
            max-width: 1100px;
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
            color: var(--primary);
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
        }

        .nav-link:hover { color: var(--primary); }

        /* Campaign Header */
        .campaign-hero {
            height: 400px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin: 2rem 0;
            position: relative;
            box-shadow: var(--shadow-lg);
        }

        .campaign-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .campaign-hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 50%;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.8), transparent);
        }

        .hero-content {
            position: absolute;
            bottom: 2.5rem;
            right: 2.5rem;
            left: 2.5rem;
            z-index: 10;
            color: white;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
            margin-bottom: 5rem;
        }

        .main-content {
            background: var(--white);
            padding: 3rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid #f1f5f9;
        }

        .meta-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--gray);
            font-weight: 700;
            font-size: 1rem;
        }

        .meta-item svg {
            color: var(--primary);
        }

        .description {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #334155;
            font-weight: 500;
        }

        /* Sidebar Card */
        .registration-card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            border: 1px solid #f1f5f9;
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .registration-card h3 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .form-control {
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

        .form-control:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        .btn-submit {
            width: 100%;
            padding: 1.1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 1rem;
            font-family: inherit;
            font-weight: 800;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.2);
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(13, 148, 136, 0.3);
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        @media (max-width: 900px) {
            .content-grid { grid-template-columns: 1fr; }
            .registration-card { position: static; }
            .hero-content h1 { font-size: 1.75rem; }
            .campaign-hero { height: 300px; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container navbar-content">
            <a href="/" class="logo">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="currentColor"/>
                </svg>
                <span>إيثار</span>
            </a>
            <div class="nav-links">
                <a href="<?= base_url('') ?>" class="nav-link">الرئيسية</a>
                <a href="<?= base_url('cases') ?>" class="nav-link">الحالات</a>
                <a href="<?= base_url('blood-donation') ?>" class="nav-link">تبرع بالدم</a>
                <a href="<?= base_url('campaigns') ?>" class="nav-link active">حملات التوعية</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="campaign-hero">
            <?php if(!empty($campaign['image'])): ?>
                <img src="<?= $campaign['image'] ?>" alt="<?= $campaign['title'] ?>">
            <?php else: ?>
                <img src="https://placehold.co/1200x600/e2e8f0/1e293b?text=Ethar+Campaign" alt="<?= $campaign['title'] ?>">
            <?php endif; ?>
            <div class="hero-content">
                <h1><?= $campaign['title'] ?></h1>
            </div>
        </div>

        <div class="content-grid">
            <div class="main-content">
                <div class="meta-bar">
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <?= date('Y-m-d H:i', strtotime($campaign['event_date'])) ?>
                    </div>
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <?= $campaign['location'] ?>
                    </div>
                </div>

                <div class="description">
                    <?= nl2br($campaign['description']) ?>
                </div>
            </div>

            <div class="sidebar">
                <div class="registration-card">
                    <h3>سجل حضورك الآن</h3>
                    
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <form action="/campaigns/register" method="POST">
                        <input type="hidden" name="campaign_id" value="<?= $campaign['id'] ?>">
                        
                        <div class="form-group">
                            <label class="form-label">الاسم الكامل</label>
                            <input type="text" name="name" class="form-control" required placeholder="أدخل اسمك الثلاثي">
                        </div>

                        <div class="form-group">
                            <label class="form-label">رقم الهاتف</label>
                            <input type="tel" name="phone" class="form-control" required placeholder="09X XXXXXXX">
                        </div>

                        <button type="submit" class="btn-submit">تأكيد الحضور</button>
                        <p style="font-size: 0.85rem; color: var(--gray); margin-top: 1.25rem; text-align: center; font-weight: 600;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-left: 4px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            التسجيل مجاني ومتاح للجميع
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
