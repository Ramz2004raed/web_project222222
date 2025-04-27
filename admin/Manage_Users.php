<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المستخدمين</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* إعدادات عامة للصفحة */
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
            text-align: center;
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

        /* تصميم زر إضافة مستخدم */
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

        /* تصميم الأزرار */
        .btn {
            border-radius: 5px;
            padding: 8px 20px;
            font-size: 0.9rem;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
        }

        .btn-warning:hover {
            background-color: #e08e0b;
            border-color: #e08e0b;
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

        /* تصميم النموذج المنبثق */
        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #2c3e50;
            color: #fff;
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.2rem;
        }

        .modal-body {
            padding: 20px;
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

        .modal-footer .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .modal-footer .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: scale(1.05);
        }

        /* استجابة التصميم */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-right: 220px;
            }

            .table th, .table td {
                font-size: 0.9rem;
                padding: 10px;
            }

            .btn {
                padding: 6px 15px;
                font-size: 0.85rem;
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

            .main-content h1 {
                font-size: 1.8rem;
            }

            .table th, .table td {
                font-size: 0.8rem;
                padding: 8px;
            }

            .btn {
                padding: 5px 10px;
                font-size: 0.75rem;
            }

            .modal-title {
                font-size: 1rem;
            }

            .form-control, .form-select {
                font-size: 0.9rem;
                padding: 8px;
            }
        }
    </style>
    <!-- إضافة خط Tajawal من Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- الشريط الجانبي -->
    <div class="sidebar">
        <h4 class="text-center text-white">لوحة التحكم</h4>
        <a href="admin_dashboard.php">الصفحة الرئيسية</a>
        <a href="manage_users.php">إدارة المستخدمين</a>
        <a href="..\Front_Page.php">تسجيل الخروج</a>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="main-content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>إدارة المستخدمين</h1>
                <!-- زر فتح النموذج المنبثق -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    إضافة مستخدم جديد
                </button>
            </div>

            <!-- جدول المستخدمين -->
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
                        <tr>
                            <td>أحمد محمد</td>
                            <td>ahmed@example.com</td>
                            <td>محرر</td>
                            <td>
                                <a href="edit_user.php?id=1" class="btn btn-warning">تعديل</a>
                                <a href="delete_user.php?id=1" class="btn btn-danger">حذف</a>
                            </td>
                        </tr>
                        <tr>
                            <td>سارة خالد</td>
                            <td>sara@example.com</td>
                            <td>كاتب</td>
                            <td>
                                <a href="edit_user.php?id=2" class="btn btn-warning">تعديل</a>
                                <a href="delete_user.php?id=2" class="btn btn-danger">حذف</a>
                            </td>
                        </tr>
                        <!-- إضافة المزيد من المستخدمين هنا -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- النموذج المنبثق لإضافة مستخدم جديد -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">إضافة مستخدم جديد</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_user.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">الدور</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="">-- اختر الدور --</option>
                                <option value="editor">محرر</option>
                                <option value="author">كاتب</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">إضافة المستخدم</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>