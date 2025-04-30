<?php
session_start();
include '../config/db.php'; // الاتصال بقاعدة البيانات

// التحقق من دور المستخدم
if ($_SESSION['user_role'] != 'editor') {
    header("Location: login.php");
    exit();
}

// التعامل مع عمليات الموافقة والرفض والحذف أولاً
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];

    if ($action == 'published') {
        $update_query = "UPDATE news SET status='published' WHERE id=$id";
        mysqli_query($conn, $update_query);
    } elseif ($action == 'deny') {
        $update_query = "UPDATE news SET status='denied' WHERE id=$id";
        mysqli_query($conn, $update_query);
    } elseif ($action == 'delete') {
        $delete_query = "DELETE FROM news WHERE id=$id";
        mysqli_query($conn, $delete_query);
    }

    // إعادة التوجيه لتحديث الصفحة ومنع تكرار العملية عند إعادة التحميل
    header("Location: editor_dashboard.php");
    exit();
}

// جلب الأخبار بعد تنفيذ العمليات
$query = "SELECT * FROM news";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة الأخبار</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
        }
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
        }
        .sidebar a:hover {
            background-color: #3498db;
        }
        .main-content {
            margin-right: 270px;
            padding: 40px 20px;
        }
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        .table thead {
            background-color: #2c3e50;
            color: white;
        }
        .badge-published {
            background-color: #28a745;
        }
        .badge-pending {
            background-color: #f39c12;
        }
        .badge-denied {
            background-color: #e74c3c;
        }
        .btn-custom {
            background-color: #3498db;
            color: white;
        }
        .btn-custom:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>لوحة تحكم المحرر</h4>
    <a href="editor_dashboard.php">لوحة التحكم</a>
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
                        <td><?= htmlspecialchars($row['category_id']) ?></td>
                        <td><?= htmlspecialchars($row['dateposted']) ?></td>
                        <td>
                            <?php
                            if ($row['status'] == 'published') {
                                echo '<span class="badge badge-published">موافق عليه</span>';
                            } elseif ($row['status'] == 'denied') {
                                echo '<span class="badge badge-denied">مرفوض</span>';
                            } else {
                                echo '<span class="badge badge-pending">معلق</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="editor_dashboard.php?action=published&id=<?= $row['id'] ?>" class="btn btn-sm btn-custom">موافقة</a>
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
