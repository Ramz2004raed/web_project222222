



<!DOCTYPE html>

<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المؤلف</title>
    <!-- Bootstrap CSS -->
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

        /* تصميم زر إضافة خبر جديد */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: scale(1.05);
        }

        /* تصميم الجدول */
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .table {
            margin-bottom: 0;
            background-color: #fff;
        }

        .table thead {
            background-color: #2c3e50;
            color: #fff;
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 15px;
            text-align: center;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
        }

        /* تصميم البادج */
        .badge {
            font-size: 0.9rem;
            padding: 8px 12px;
            border-radius: 20px;
        }

        .badge.bg-success {
            background-color: #28a745 !important;
        }

        .badge.bg-warning {
            background-color: #f39c12 !important;
            color: #fff !important;
        }

        .badge.bg-danger {
            background-color: #e74c3c !important;
        }

        /* تصميم الأزرار */
        .btn-sm {
            border-radius: 5px;
            padding: 6px 15px;
            font-size: 0.85rem;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            transform: scale(1.05);
        }

    </style>
    <!-- إضافة خط Tajawal من Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</head>
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
                <a href="add-news.php" class="btn btn-success">إضافة خبر جديد</a>
            </div>

            <!-- جدول الأخبار -->
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>