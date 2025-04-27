
// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>

<?php
session_start();
include('config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على بيانات النموذج
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category_id = $_POST['category_id'];
    $author_id = $_SESSION['user_id'];  // الحصول على ID المؤلف من الجلسة
    $status = 'pending';  // الخبر يكون "معلق" في البداية
    $dateposted = date('Y-m-d H:i:s');

    // إضافة الخبر إلى قاعدة البيانات
    $sql = "INSERT INTO news (title, body, category_id, author_id, status, dateposted) 
            VALUES ('$title', '$body', '$category_id', '$author_id', '$status', '$dateposted')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة الخبر بنجاح!";
    } else {
        echo "خطأ في إضافة الخبر: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة خبر</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>إضافة خبر جديد</h1>
        <form method="POST" action="add_news.php">
            <div class="mb-3">
                <label for="title" class="form-label">العنوان</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">التفاصيل</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">التصنيف</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="1">سياسة</option>
                    <option value="2">اقتصاد</option>
                    <option value="3">رياضة</option>
                    <option value="4">صحة</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">إضافة الخبر</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
