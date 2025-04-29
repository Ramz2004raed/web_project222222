<?php
session_start();
include '../config/db.php'; // تأكد من أن هذا الملف يحتوي على الاتصال بقاعدة البيانات

// التحقق من دور المستخدم
if ($_SESSION['user_role'] != 'editor') {
    header("Location: login.php"); // إعادة التوجيه إذا لم يكن المحرر
    exit();
}

// جلب الأخبار من قاعدة البيانات
$query = "SELECT * FROM news";
$result = mysqli_query($conn, $query);

// التعامل مع عمليات الموافقة والرفض والحذف
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'approve') {
        $update_query = "UPDATE news SET status='approved' WHERE id=$id";
        mysqli_query($conn, $update_query);
    } elseif ($action == 'deny') {
        $update_query = "UPDATE news SET status='denied' WHERE id=$id";
        mysqli_query($conn, $update_query);
    } elseif ($action == 'delete') {
        $delete_query = "DELETE FROM news WHERE id=$id";
        mysqli_query($conn, $delete_query);
    }

    // إعادة التوجيه بعد العملية
    header("Location: editor_dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الأخبار</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            overflow-x: hidden;
        }

        /* تصميم الشريط الجانبي */
        .sidebar {
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            position: fixed;
            width: 250px;
            top: 0;
            right: 0;
            padding-top: 30px;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.5rem;
        }

        .sidebar a {
            color: #f8f9fa;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 15px 20px;
            display: block;
            transition: background-color 0.3s ease, padding-right 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #3498db;
            padding-right: 25px;
        }

        /* تصميم المحتوى الرئيسي */
        .main-content {
            margin-right: 270px;
            padding: 40px 20px;
            min-height: 100vh;
            transition: margin-right 0.3s ease;
        }

        .main-content h1 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .main-content h3 {
            color: #2c3e50;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .table {
            background-color: white;
            margin-bottom: 0;
        }

        .table thead {
            background-color: #2c3e50;
            color: white;
        }

        .table th, .table td {
            text-align: center;
            padding: 15px;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
        }

        .badge {
            font-size: 0.9rem;
            padding: 8px 12px;
            border-radius: 20px;
        }

        .badge-approved {
            background-color: #28a745;
            color: white;
        }

        .badge-pending {
            background-color: #f39c12;
            color: white;
        }

        .badge-denied {
            background-color: #e74c3c;
            color: white;
        }

        .btn-custom {
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 0.85rem;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .btn-custom:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 0.85rem;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>لوحة تحكم المحرر</h4>
        <a href="editor_dashboard.php">لوحة تحكم المحرر</a>
        <a href="../Front_Page.php">تسجيل الخروج</a>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>إدارة الأخبار</h1>
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
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= htmlspecialchars($row['category']) ?></td>
                            <td><?= htmlspecialchars($row['publish_date']) ?></td>
                            <td>
                                <?php
                                if ($row['status'] == 'approved') {
                                    echo '<span class="badge badge-approved">موافق عليه</span>';
                                } elseif ($row['status'] == 'denied') {
                                    echo '<span class="badge badge-denied">مرفوض</span>';
                                } else {
                                    echo '<span class="badge badge-pending">معلق</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="editor_dashboard.php?action=approve&id=<?= $row['id'] ?>" class="btn btn-sm btn-custom">موافقة</a>
                                <a href="editor_dashboard.php?action=deny&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">رفض</a>
                                <a href="editor_dashboard.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
