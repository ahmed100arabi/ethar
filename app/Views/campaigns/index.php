<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حملات التوعية - إيثار</title>
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
            text-decoration: none;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary);
        }

        /* Header */
        .page-header {
            background: linear-gradient(135deg, #0f766e 0%, #0d9488 100%);
            color: white;
            padding: 6rem 1rem;
            text-align: center;
            border-radius: 0 0 3rem 3rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: -20%;
            right: -10%;
            width: 300px;
            height: 300px;
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
            max-width: 700px;
            margin: 0 auto;
        }

        /* Grid */
        .campaigns-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 2.5rem;
            margin-bottom: 5rem;
        }

        .card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-sm);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-glow);
        }

        .card-image {
            height: 240px;
            position: relative;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .card:hover .card-image img {
            transform: scale(1.1);
        }

        .card-badge {
            position: absolute;
            top: 1.25rem;
            right: 1.25rem;
            background: var(--glass);
            backdrop-filter: blur(8px);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--primary);
            box-shadow: var(--shadow-sm);
        }

        .card-body {
            padding: 2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .card-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray);
            font-size: 0.9rem;
            font-weight: 600;
        }

        .meta-item svg {
            color: var(--primary);
            opacity: 0.7;
        }

        .card-desc {
            color: var(--gray);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .btn-details {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            padding: 1rem;
            border-radius: 1rem;
            font-weight: 800;
            font-size: 1rem;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.2);
        }

        .btn-details:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
            background: var(--white);
            border-radius: var(--radius-lg);
            grid-column: 1 / -1;
            box-shadow: var(--shadow-sm);
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: var(--gray);
            margin-top: 1.5rem;
        }

        @media (max-width: 768px) {
            .page-title { font-size: 2.25rem; }
            .campaigns-grid { grid-template-columns: 1fr; }
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

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">حملات التوعية الصحية</h1>
            <p class="page-subtitle">نشر المعرفة، تعزيز الوعي، وبناء مجتمع صحي مثقف. انضم إلينا في رحلتنا لنشر الوعي الصحي في ليبيا.</p>
        </div>
    </div>

    <div class="container">
        <div class="campaigns-grid">
            <?php if(empty($campaigns)): ?>
                <div class="empty-state">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <h3>لا توجد حملات نشطة حالياً، ترقبونا قريباً</h3>
                </div>
            <?php else: ?>
                <?php foreach ($campaigns as $campaign): ?>
                <div class="card">
                    <div class="card-image">
                        <?php if(!empty($campaign['image'])): ?>
                            <img src="<?= $campaign['image'] ?>" alt="<?= $campaign['title'] ?>">
                        <?php else: ?>
                            <img src="https://placehold.co/600x400/e2e8f0/1e293b?text=Ethar+Campaign" alt="<?= $campaign['title'] ?>">
                        <?php endif; ?>
                        <div class="card-badge">حملة نشطة</div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?= $campaign['title'] ?></h3>
                        <div class="card-meta">
                            <div class="meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <?= date('Y-m-d', strtotime($campaign['event_date'])) ?>
                            </div>
                            <div class="meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <?= $campaign['location'] ?>
                            </div>
                        </div>
                        <p class="card-desc"><?= $campaign['description'] ?></p>
                        <a href="/campaigns/<?= $campaign['id'] ?>" class="btn-details">
                            عرض التفاصيل والتسجيل
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
