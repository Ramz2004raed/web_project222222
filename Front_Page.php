<?php
    require_once 'config/db.php';

    // استعلام لجلب الأخبار
    $sql = "SELECT * FROM news WHERE status = 'approved' ORDER BY dateposted DESC";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية - أخبار</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: white;
        }

        .navbar {
            padding: 10px 20px;
        }

        .navbar .nav-link {
            color: white;
        }

        .news-card img {
            width: 100%;
            height: 150px;
        }

        .news-card {
            margin-bottom: 20px;
        }

        .category-section {
            margin-top: 30px;
        }

        .category-section h2 {
            background-color: blue;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .top-news {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .main-news-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">أخبار العالم</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav">
                        <a class="nav-link " href="Front_Page.php">الرئيسية</a>
                    </li>
                    <li class="nav">
                        <a class="nav-link" href="category.php">سياسة</a>
                    </li>
                    <li class="nav">
                        <a class="nav-link" href="economy.php">اقتصاد</a>
                    </li>
                    <li class="nav">
                        <a class="nav-link" href="sports.php">رياضة</a>
                    </li>
                    <li class="nav">
                        <a class="nav-link" href="health.php">صحة</a>
                    </li>
                </ul>

                <a href="login.php" class="btn btn-light ms-2">تسجيل الدخول</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="top-news mb-5">
            <h2 class="section-title">أهم الأخبار</h2>
            <div class="row">
                <?php 
                // عرض الأخبار الرئيسية
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row['category_id'] == 1) {
                ?>
                <div class="col-md-8">
                    <div class="main-news-card">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid">
                        <div class="news-content">
                            <h3><?php echo $row['title']; ?></h3>
                            <p><?php echo substr($row['body'], 0, 150) . '...'; ?></p>
                            <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">المزيد</a>
                        </div>
                    </div>
                </div>
                <?php 
                        }
                    }
                }
                ?>
            </div>
        </div>

        <!-- قسم "سياسة" -->
        <div class="category-section">
            <h2>سياسة</h2>
            <div class="row">
                <?php
                $sql_policy = "SELECT * FROM news WHERE category_id = 1 AND status = 'approved' ORDER BY dateposted DESC LIMIT 4";
                $result_policy = $conn->query($sql_policy);

                if ($result_policy->num_rows > 0) {
                    while($row = $result_policy->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text"><?php echo substr($row['body'], 0, 100) . '...'; ?></p>
                            <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>

        <!-- قسم "اقتصاد" -->
        <div class="category-section">
            <h2>اقتصاد</h2>
            <div class="row">
                <?php
                $sql_economy = "SELECT * FROM news WHERE category_id = 2 AND status = 'approved' ORDER BY dateposted DESC LIMIT 4";
                $result_economy = $conn->query($sql_economy);

                if ($result_economy->num_rows > 0) {
                    while($row = $result_economy->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text"><?php echo substr($row['body'], 0, 100) . '...'; ?></p>
                            <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>

        <!-- قسم "رياضة" -->
        <div class="category-section">
            <h2>رياضة</h2>
            <div class="row">
                <?php
                $sql_sports = "SELECT * FROM news WHERE category_id = 3 AND status = 'approved' ORDER BY dateposted DESC LIMIT 4";
                $result_sports = $conn->query($sql_sports);

                if ($result_sports->num_rows > 0) {
                    while($row = $result_sports->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text"><?php echo substr($row['body'], 0, 100) . '...'; ?></p>
                            <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>

        <!-- قسم "صحة" -->
        <div class="category-section">
            <h2>صحة</h2>
            <div class="row">
                <?php
                $sql_health = "SELECT * FROM news WHERE category_id = 4 AND status = 'approved' ORDER BY dateposted DESC LIMIT 4";
                $result_health = $conn->query($sql_health);

                if ($result_health->num_rows > 0) {
                    while($row = $result_health->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text"><?php echo substr($row['body'], 0, 100) . '...'; ?></p>
                            <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
