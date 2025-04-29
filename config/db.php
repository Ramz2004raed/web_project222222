<?php
$servername = "localhost"; // أو استخدم IP السيرفر إن كنت تستخدم خادم بعيد
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة مرور قاعدة البيانات
$dbname = "project_part_tow_web"; // اسم قاعدة البيانات التي تحتوي على الأخبار

// إنشاء الاتصال
$conn = new mysqli( 'localhost', 'root','', 'project_part_tow_web');

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
