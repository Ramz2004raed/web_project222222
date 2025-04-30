<?php
session_start();

// عرض الأخطاء للمساعدة في التصحيح
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// تأكد من تسجيل الدخول (اختياري، حسب نظامك)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php'; // تأكد من المسار الصحيح

if (isset($_GET['id'])) {
    $news_id = intval($_GET['id']); // تأمين المعرف ضد الحقن

    // تحقق مما إذا كان الخبر موجودًا أولًا
    $checkStmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
    $checkStmt->bind_param("i", $news_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // تنفيذ الحذف
        $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
        $stmt->bind_param("i", $news_id);
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: author_dashboard.php?deleted=1");
            exit();
        } else {
            echo "حدث خطأ أثناء محاولة الحذف: " . $stmt->error;
        }
    } else {
        echo "الخبر غير موجود.";
    }
} else {
    echo "معرف الخبر غير محدد.";
}
?>
