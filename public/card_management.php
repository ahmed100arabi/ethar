<?php
/*
 * Access: localhost:8080/card_management.php
 */

define('DB_PATH', __DIR__ . '/../writable/database/fake_cards.db');

// Connect to SQLite database
try {
    // Create writable/database directory if it doesn't exist
    $dbDir = dirname(DB_PATH);
    if (!file_exists($dbDir)) {
        mkdir($dbDir, 0755, true);
    }
    
    $pdo = new PDO("sqlite:" . DB_PATH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS fake_cards (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        card_number TEXT NOT NULL UNIQUE,
        expiry TEXT NOT NULL,
        cvv TEXT NOT NULL,
        balance REAL DEFAULT 0,
        card_holder TEXT,
        status TEXT DEFAULT 'active',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    
} catch(PDOException $e) {
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}

// Handle actions
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    try {
        if ($action === 'add') {
            $stmt = $pdo->prepare("INSERT INTO fake_cards (card_number, expiry, cvv, balance, card_holder, status, created_at) VALUES (?, ?, ?, ?, ?, ?, datetime('now'))");
            $stmt->execute([
                $_POST['card_number'],
                $_POST['expiry'],
                $_POST['cvv'],
                $_POST['balance'],
                $_POST['card_holder'],
                $_POST['status']
            ]);
            $message = "تم إضافة البطاقة بنجاح!";
            
        } elseif ($action === 'edit') {
            $stmt = $pdo->prepare("UPDATE fake_cards SET card_number = ?, expiry = ?, cvv = ?, balance = ?, card_holder = ?, status = ?, updated_at = datetime('now') WHERE id = ?");
            $stmt->execute([
                $_POST['card_number'],
                $_POST['expiry'],
                $_POST['cvv'],
                $_POST['balance'],
                $_POST['card_holder'],
                $_POST['status'],
                $_POST['id']
            ]);
            $message = "تم تحديث البطاقة بنجاح!";
            
        } elseif ($action === 'delete') {
            $stmt = $pdo->prepare("DELETE FROM fake_cards WHERE id = ?");
            $stmt->execute([$_POST['id']]);
            $message = "تم حذف البطاقة بنجاح!";
        }
    } catch(PDOException $e) {
        $error = "خطأ: " . $e->getMessage();
    }
}

// Fetch all cards
$stmt = $pdo->query("SELECT * FROM fake_cards ORDER BY created_at DESC");
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch card for editing
$editCard = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM fake_cards WHERE id = ?");
    $stmt->execute([$_GET['edit']]);
    $editCard = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة البطاقات -  Cards Management</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .header h1 {
            color: #667eea;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #64748b;
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .card h2 {
            color: #1e293b;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #475569;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.5rem;
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: inherit;
            font-size: 1rem;
        }

        .btn-primary {
            background: #667eea;
            color: white;
            width: 100%;
        }

        .btn-primary:hover {
            background: #5568d3;
            transform: translateY(-2px);
        }

        .btn-success {
            background: #10b981;
            color: white;
        }

        .btn-success:hover {
            background: #059669;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 1rem;
            text-align: right;
            font-weight: 600;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
        }

        tr:hover {
            background: #f8fafc;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-blocked {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #64748b;
            font-size: 0.9rem;
        }

        .card-preview {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1.5rem;
            border-radius: 1rem;
            color: white;
            margin-bottom: 1.5rem;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-number-preview {
            font-size: 1.5rem;
            letter-spacing: 0.1em;
            font-family: 'Courier New', monospace;
            margin: 1rem 0;
        }

        .card-details-preview {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1> إدارة البطاقات </h1>
            <p>نظام إدارة البطاقات الائتمانية للاختبار -  Cards Management System</p>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- Statistics -->
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number"><?= count($cards) ?></div>
                <div class="stat-label">إجمالي البطاقات</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= count(array_filter($cards, fn($c) => $c['status'] === 'active')) ?></div>
                <div class="stat-label">البطاقات النشطة</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= number_format(array_sum(array_column($cards, 'balance'))) ?> د.ل</div>
                <div class="stat-label">إجمالي الأرصدة</div>
            </div>
        </div>

        <div class="grid">
            <!-- Add/Edit Form -->
            <div class="card">
                <h2><?= $editCard ? '✏️ تعديل البطاقة' : '➕ إضافة بطاقة جديدة' ?></h2>
                
                <?php if ($editCard): ?>
                    <div class="card-preview">
                        <div style="font-size: 0.9rem; opacity: 0.9;">بطاقة ائتمان وهمية</div>
                        <div class="card-number-preview"><?= htmlspecialchars($editCard['card_number']) ?></div>
                        <div class="card-details-preview">
                            <div><?= htmlspecialchars($editCard['card_holder']) ?></div>
                            <div><?= htmlspecialchars($editCard['expiry']) ?></div>
                        </div>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <input type="hidden" name="action" value="<?= $editCard ? 'edit' : 'add' ?>">
                    <?php if ($editCard): ?>
                        <input type="hidden" name="id" value="<?= $editCard['id'] ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label>رقم البطاقة (16 رقم)</label>
                        <input type="text" name="card_number" class="form-control" maxlength="16" pattern="\d{16}" 
                               value="<?= $editCard['card_number'] ?? '' ?>" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>تاريخ الانتهاء (MM/YY)</label>
                            <input type="text" name="expiry" class="form-control" maxlength="5" pattern="\d{2}/\d{2}" 
                                   placeholder="12/25" value="<?= $editCard['expiry'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>CVV (3 أرقام)</label>
                            <input type="text" name="cvv" class="form-control" maxlength="3" pattern="\d{3}" 
                                   value="<?= $editCard['cvv'] ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>الرصيد (د.ل)</label>
                        <input type="number" name="balance" class="form-control" step="0.01" min="0" 
                               value="<?= $editCard['balance'] ?? '1000' ?>" required>
                    </div>

                    <div class="form-group">
                        <label>اسم حامل البطاقة</label>
                        <input type="text" name="card_holder" class="form-control" 
                               value="<?= $editCard['card_holder'] ?? '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label>الحالة</label>
                        <select name="status" class="form-control" required>
                            <option value="active" <?= ($editCard['status'] ?? '') === 'active' ? 'selected' : '' ?>>نشطة</option>
                            <option value="blocked" <?= ($editCard['status'] ?? '') === 'blocked' ? 'selected' : '' ?>>محظورة</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <?= $editCard ? '💾 حفظ التعديلات' : '➕ إضافة البطاقة' ?>
                    </button>

                    <?php if ($editCard): ?>
                        <a href="card_management.php" class="btn btn-warning" style="margin-top: 0.5rem; display: inline-block; text-align: center; text-decoration: none;">
                            ✖️ إلغاء التعديل
                        </a>
                    <?php endif; ?>
                </form>
            </div>

            <!-- Cards List -->
            <div class="card">
                <h2>📋 قائمة البطاقات</h2>
                <div style="overflow-x: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>رقم البطاقة</th>
                                <th>انتهاء</th>
                                <th>CVV</th>
                                <th>الرصيد</th>
                                <th>الحامل</th>
                                <th>الحالة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($cards)): ?>
                                <tr>
                                    <td colspan="8" style="text-align: center; color: #64748b; padding: 2rem;">
                                        لا توجد بطاقات. أضف بطاقة جديدة للبدء.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($cards as $card): ?>
                                    <tr>
                                        <td><?= $card['id'] ?></td>
                                        <td style="font-family: 'Courier New', monospace;"><?= htmlspecialchars($card['card_number']) ?></td>
                                        <td><?= htmlspecialchars($card['expiry']) ?></td>
                                        <td><?= htmlspecialchars($card['cvv']) ?></td>
                                        <td style="font-weight: 600; color: #10b981;"><?= number_format($card['balance'], 2) ?> د.ل</td>
                                        <td><?= htmlspecialchars($card['card_holder']) ?></td>
                                        <td>
                                            <span class="status-badge status-<?= $card['status'] ?>">
                                                <?= $card['status'] === 'active' ? '✓ نشطة' : '✖ محظورة' ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a href="?edit=<?= $card['id'] ?>" class="btn btn-warning btn-sm">✏️ تعديل</a>
                                                <form method="POST" style="display: inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذه البطاقة?');">
                                                    <input type="hidden" name="action" value="delete">
                                                    <input type="hidden" name="id" value="<?= $card['id'] ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ حذف</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-format card number input
        document.querySelector('input[name="card_number"]')?.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '').slice(0, 16);
        });

        // Auto-format expiry date
        document.querySelector('input[name="expiry"]')?.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4);
            }
            e.target.value = value;
        });

        // Auto-format CVV
        document.querySelector('input[name="cvv"]')?.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '').slice(0, 3);
        });
    </script>
</body>
</html>
