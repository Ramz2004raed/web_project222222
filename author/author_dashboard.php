<?php
session_start();
include '../config/db.php'; // تأكد من صحة المسار

// تحقق من تسجيل الدخول
if ($_SESSION['user_role'] != 'author') {
    header("Location: login.php"); // إعادة التوجيه إذا لم يكن المحرر
    exit();
}

$author_id = $_SESSION['user_id'];

// استعلام لجلب الأخبار الخاصة بالمؤلف
$query = "SELECT news.*, category.name AS category_name 
          FROM news 
          INNER JOIN category ON news.category_id = category.id 
          WHERE author_id = ? 
          ORDER BY dateposted DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $author_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <!-- نفس رأس الصفحة كما زودتني -->
</head>


<style>
body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            overflow-x: hidden;
        }

        .sidebar {
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            padding-top: 30px;
            position: fixed;
            width: 250px;
            top: 0;
            right: 0;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
        }

        .sidebar h4 {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 15px 25px;
            display: block;
            transition: background-color 0.3s ease, padding-right 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #3498db;
            padding-right: 30px;
        }

        .main-content {
            margin-right: 270px;
            padding: 40px 20px;
            min-height: 100vh;
            transition: margin-right 0.3s ease;
        }

        .main-content h2 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            font-weight: 500;
            color: #2c3e50;
        }

        .form-control, .form-select {
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            border-radius: 5px;
            padding: 12px;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: scale(1.02);
        }

        .alert {
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-right: 220px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding-bottom: 20px;
            }

            .main-content {
                margin-right: 0;
                padding: 20px;
            }
        }
    </style>

<body>
    <!-- الشريط الجانبي -->
    <div class="sidebar">
        <h4 class="text-center text-white">لوحة التحكم</h4>
        <a href="author_dashboard.php">لوحة تحكم المؤلف</a>
        <a href="add_news.php">إضافة خبر جديد</a>
        <a href="../Front_Page.php">تسجيل الخروج</a>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="main-content">
        <div class="container">
            <h1>لوحة تحكم المؤلف</h1>

            <div class="d-flex justify-content-end mb-4">
                <a href="add_news.php" class="btn btn-success">إضافة خبر جديد</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>التصنيف</th>
                            <th>تاريخ النشر</th>
                            <th>الحالة</th>
                            <th>خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['title']) ?></td>
                                <td><?= htmlspecialchars($row['category_name']) ?></td>
                                <td><?= date("Y-m-d", strtotime($row['dateposted'])) ?></td>
                                <td>
                                    <?php if ($row['status'] == 'approved'): ?>
                                        <span class="badge bg-success">مقبول</span>
                                    <?php elseif ($row['status'] == 'pending'): ?>
                                        <span class="badge bg-warning">قيد الانتظار</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">مرفوض</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="edit_news.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">تعديل</a>
                                    <a href="delete_news.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟');">حذف</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
