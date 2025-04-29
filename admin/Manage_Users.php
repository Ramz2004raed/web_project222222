<?php
// manage_users.php

session_start();
require_once '../config/db.php'; // تأكد من أن الاتصال بقاعدة البيانات يتم عبر هذا الملف

// تأكد أن المستخدم Admin فقط
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../Front_Page.php");
    exit();
}

// حذف المستخدم
if (isset($_GET['delete'])) {
    $userId = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    header("Location: manage_users.php");
    exit();
}

// إضافة مستخدم جديد
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // تشفير كلمة المرور
    $role     = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO user (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);
    $stmt->execute();
    header("Location: manage_users.php");
    exit();
}

// جلب كل المستخدمين
$sql = "SELECT * FROM user"; // تأكد من أن اسم الجدول هو 'user' وليس 'users'
$result = $conn->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC); // استخدم mysqli_fetch_all هنا بدلاً من fetchAll()
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة المستخدمين</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .main-content h1 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 30px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-bottom: 25px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            font-size: 1.1rem;
            font-weight: bold;
            border-bottom: none;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .card-text {
            color: #6c757d;
            margin-bottom: 15px;
        }
        .btn {
            border-radius: 5px;
            padding: 8px 20px;
            font-size: 0.9rem;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }
        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center text-white">لوحة التحكم</h4>
        <a href="admin_dashboard.php">الصفحة الرئيسية</a>
        <a href="manage_users.php">إدارة المستخدمين</a>
        <a href="../Front_Page.php">تسجيل الخروج</a>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>إدارة المستخدمين</h1>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">إضافة مستخدم جديد</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>الدور</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= $user['role'] === 'admin' ? 'مدير' : ($user['role'] === 'editor' ? 'محرر' : 'كاتب') ?></td>
                            <td>
                                <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-warning">تعديل</a>
                                <a href="manage_users.php?delete=<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف المستخدم؟')">حذف</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- نموذج إضافة مستخدم -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="manage_users.php">
                    <input type="hidden" name="add_user" value="1">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">إضافة مستخدم جديد</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">الدور</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="">-- اختر الدور --</option>
                                <option value="editor">محرر</option>
                                <option value="author">كاتب</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">إضافة المستخدم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
