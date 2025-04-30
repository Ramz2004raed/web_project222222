<?php
session_start();
include '../config/db.php';

// التحقق من صلاحية المستخدم
if (   $_SESSION['role'] == 'author') {
    header("Location: login.php");
    exit;
}

$author_id = $_SESSION['user_id'];



// جلب التصنيفات
$categories_result = $conn->query("SELECT id, name FROM category");

// عند إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category_id = $_POST['category_id'];
    $image_name = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($image_tmp, '../uploads/' . $image_name);
    }

    $stmt = $conn->prepare("INSERT INTO news (title, body, image, dateposted, category_id, author_id, status) VALUES (?, ?, ?, NOW(), ?, ?, 'pending')");
    $stmt->bind_param("sssii", $title, $body, $image_name, $category_id, $author_id);

    if ($stmt->execute()) {
        $success_message = "تمت إضافة الخبر بنجاح! بانتظار الموافقة.";
    } else {
        $error_message = "حدث خطأ: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة خبر جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
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
</head>
<body>

<div class="sidebar">
    <h4 class="text-center text-white">لوحة التحكم</h4>
    <a href="author_dashboard.php">لوحة تحكم المؤلف</a>
    <a href="add_news.php">إضافة خبر جديد</a>
    <a href="../Front_Page.php">تسجيل الخروج</a>
</div>

<div class="main-content">
    <div class="container">
        <h2>إضافة خبر جديد</h2>

        <?php if (isset($success_message)): ?>
            <div class="alert alert-success text-center"><?= $success_message ?></div>
        <?php elseif (isset($error_message)): ?>
            <div class="alert alert-danger text-center"><?= $error_message ?></div>
        <?php endif; ?>

        <div class="form-container">
            <form action="add_news.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">عنوان الخبر</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">محتوى الخبر</label>
                    <textarea name="body" class="form-control" rows="6" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">التصنيف</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- اختر التصنيف --</option>
                        <?php while($row = $categories_result->fetch_assoc()): ?>
                            <option value="<?= $row['id']; ?>"><?= htmlspecialchars($row['name']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">صورة الخبر</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">نشر الخبر</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
