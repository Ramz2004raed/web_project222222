<?php
// edit_user.php

session_start();
require_once '../config/db.php'; // تأكد من أن الاتصال بقاعدة البيانات يتم عبر هذا الملف

// تأكد أن المستخدم Admin فقط
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../Front_Page.php");
    exit();
}

// جلب بيانات المستخدم للتعديل
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    header("Location: manage_users.php");
    exit();
}

// تحديث بيانات المستخدم
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $role     = $_POST['role'];

    // إذا تم إدخال كلمة مرور جديدة
    $password = empty($_POST['password']) ? $user['password'] : password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE user SET name = ?, email = ?, password = ?, role = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $email, $password, $role, $userId);
    $stmt->execute();

    header("Location: manage_users.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل المستخدم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>تعديل المستخدم</h1>
        <form method="POST" action="edit_user.php?id=<?= $user['id'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور (اختياري)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">الدور</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="editor" <?= $user['role'] == 'editor' ? 'selected' : '' ?>>محرر</option>
                    <option value="author" <?= $user['role'] == 'author' ? 'selected' : '' ?>>كاتب</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">تحديث المستخدم</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
