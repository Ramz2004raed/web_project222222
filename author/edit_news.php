<?php
session_start();
include '../config/db.php';

if ($_SESSION['user_role'] != 'author') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "لا يوجد معرف خبر لتعديله.";
    exit();
}

$news_id = intval($_GET['id']);
$author_id = $_SESSION['user_id'];
$message = "";

// جلب بيانات الخبر للتحرير
$query = "SELECT * FROM news WHERE id = ? AND author_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $news_id, $author_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    echo "الخبر غير موجود أو ليس لديك صلاحية لتعديله.";
    exit();
}

$news = $result->fetch_assoc();

// جلب التصنيفات
$cat_result = $conn->query("SELECT * FROM category");

// التحديث عند إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category_id = $_POST['category_id'];

    $update_query = "UPDATE news SET title = ?, body = ?, category_id = ? WHERE id = ? AND author_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssiii", $title, $body, $category_id, $news_id, $author_id);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>تم تحديث الخبر بنجاح.</div>";
        // تحديث المتغيرات بعد الحفظ
        $news['title'] = $title;
        $news['body'] = $body;
        $news['category_id'] = $category_id;
    } else {
        $message = "<div class='alert alert-danger'>حدث خطأ أثناء التحديث.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل الخبر</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <style>
        <?php include 'author_dashboard_style.css'; // نفس التنسيقات السابقة ?>
    </style>
</head>

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
<body>
    <div class="sidebar">
        <h4 class="text-center text-white">لوحة التحكم</h4>
        <a href="author_dashboard.php">لوحة تحكم المؤلف</a>
        <a href="add_news.php">إضافة خبر جديد</a>
        <a href="../Front_Page.php">تسجيل الخروج</a>
    </div>

    <div class="main-content">
        <div class="container">
            <h2 class="mb-4">تعديل الخبر</h2>
            <?= $message ?>
            <form method="POST" class="form-container">
                <div class="mb-3">
                    <label for="title" class="form-label">عنوان الخبر</label>
                    <input type="text" id="title" name="title" class="form-control" required value="<?= htmlspecialchars($news['title']) ?>">
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">التصنيف</label>
                    <select id="category_id" name="category_id" class="form-select" required>
                        <?php while ($cat = $cat_result->fetch_assoc()): ?>
                            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $news['category_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['name']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">نص الخبر</label>
                    <textarea id="body" name="body" class="form-control" rows="6" required><?= htmlspecialchars($news['body']) ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                <a href="author_dashboard.php" class="btn btn-secondary">إلغاء</a>
            </form>
        </div>
    </div>
</body>
</html>
