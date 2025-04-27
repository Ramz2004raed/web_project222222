

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة خبر جديد</title>
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

        .main-content h2 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        /* تصميم النموذج */
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

        /* تصميم زر النشر */
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

        /* تصميم التنبيهات */
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

        /* استجابة التصميم */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-right: 220px;
            }

            .form-label {
                font-size: 0.95rem;
            }

            .form-control, .form-select {
                font-size: 0.95rem;
                padding: 8px;
            }

            .btn-primary {
                padding: 10px;
                font-size: 0.95rem;
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

            .form-container {
                padding: 20px;
            }

            .form-label {
                font-size: 0.9rem;
            }

            .form-control, .form-select {
                font-size: 0.9rem;
                padding: 6px;
            }

            .btn-primary {
                padding: 8px;
                font-size: 0.9rem;
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
        <a href="author_dashboard.php">لوحة تحكم المؤلف</a>
        <a href="add-news.php">إضافة خبر جديد</a>
        <a href="../Front_Page.php">تسجيل الخروج</a>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="main-content">
        <div class="container">
            <h2>إضافة خبر جديد</h2>

            <div class="form-container">
                <form action="add-news.php" method="POST" enctype="multipart/form-data">
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>