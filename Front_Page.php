
<!-- تمت الاستعانة بال ai ومواقع اخبارية اخرى في عمل المشروع  -->

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
                        <a class="nav-link" href="************">اقتصاد</a>
                    </li>
                    <li class="nav">
                        <a class="nav-link" href="************">رياضة</a>
                    </li>
                    <li class="nav">
                        <a class="nav-link" href="*************">صحة</a>
                    </li>
                

                    <li class="nav" >
                        <a class="nav-link"  href="admin/admin_dashboard.php">Admin</a>
                    </li>
                    <li class="nav">
                        <a class="nav-link" href="author/author_dashboard.php">Author</a>
                    </li>
                    <li class="nav">
                        <a class="nav-link" href="editor/editor_dashboard.php">Editor</a>
                    </li>





                </ul>
                


            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="top-news mb-5">
            <h2 class="section-title">أهم الأخبار</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="main-news-card">
                        <img src="https://www.historicalmaterialism.org/wp-content/uploads/2024/05/F231007YM31.jpg" alt="الخبر الرئيسي" class="img-fluid">
                        <div class="news-content">
                            <h3>
                                البرغوثي: اضطرار اسرائيل لقبول وقف اطلاق النار يمثل انتصارا لفلسطين
                            </h3>
                            <p>قال النائب الدكتور مصطفى البرغوثي الامين العام لحركة المبادرة الوطنية الفلسطينية ان اضطرار اسرائيل للقبول بوقف اطلاق النار يمثل....</p>
                            <a href="details.php" class="btn btn-primary">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="secondary-news">
                        <div class="news-card mb-4">
                            <img src="https://images.skynewsarabia.com/images/v9/2023/10/25/1664843/1100/619/1-1664843.jpg " alt="خبر">
                            <div class="news-content">
                                <h5>
                                    حماس: جهود الوسطاء متواصلة لتنفيذ مراحل اتفاق غزة
                                </h5>
                                <p class="news-excerpt">قال الناطق باسم حركة حماس حازم قاسم، يوم الخميس، إن جهود الوسطاء مستمرة من أجل...</p>
                                <a href="details.html" class="btn btn-primary btn-sm">المزيد</a>
                            </div>
                        </div>
                        <div class="news-card mb-4">
                            <img src="https://images.skynewsarabia.com/images/v1/2025/03/13/1783576/2000/1125/1-1783576.jpg" alt="خبر">
                            <div class="news-content">
                                <h5>
                                    سوريا.. أبرز مواد الإعلان الدستوري وملامح المرحلة الانتقالية
                                </h5>
                                <p class="news-excerpt">وقّع الرئيس السوري في المرحلة الانتقالية أحمد الشرع، الخميس، مسودة الإعلان الدستوري، مشيدا بما وصفه...</p>
                                <a href="details.html" class="btn btn-primary btn-sm">المزيد</a>
                            </div>
                        </div>
                        <div class="news-card">
                            <img src="https://images.skynewsarabia.com/images/v2/2019/12/29/1308797/1600/720/1-1308797.jpg" alt="خبر">
                            <div class="news-content">
                                <h5>بين المقايضة والسياسة.. كيف يغير ترامب قواعد اللعبة؟</h5>
                                <p class="news-excerpt">في خطوة أثارت جدلاً واسعاً، قرر الرئيس الأميركي دونالد ترامب وقف...</p>
                                <a href="details.html" class="btn btn-primary btn-sm">المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="category-section">
            <h2>سياسة</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="main-news-card">
                        <img src="https://images.skynewsarabia.com/images/v3/2025/01/14/1768983/1100/619/1-1768983.jpg" class="card-img-top" alt="...">
                        <div class="news-content">
                            <h5 class="card-title">
                                نتنياهو: غدا سيكون يوما صعبا لإسرائيل
                            </h5>
                            <p class="card-text">ذكر مكتب رئيس الوزراء الإسرائيلي بنيامين نتنياهو، الأربعاء،أن إسرائيل ... </p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/03/13/1783558/2000/1125/1-1783558.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                بوتين يعلن "تأييد" مقترح وقف إطلاق النار مع أوكرانيا
                            </h5>
                            <p class="card-text">قال الرئيس الروسي فلاديمير بوتين، الخميس، إنه "يؤيد" وقفا مؤقتا لإطلاق النار في ...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v2/2024/11/07/1753229/2000/1125/1-1753229.JPG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                السيسي يؤكد على أهمية بدء عملية سياسية شاملة في سوريا
                            </h5>
                            <p class="card-text">أكد الرئيس المصري عبد الفتاح السيسي، الثلاثاء، ضرورة الحفاظ على وحدة سوريا وسلامة اراضيها....</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v3/2018/08/21/1175563/1100/619/1-1175563.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">الكرملين يحدد هدف لقاء ترامب وبوتين.. وسبب اختيار السعودية</h5>
                            <p class="card-text">أكد الكرملين أن المحادثات الروسية الأميركية، الثلاثاء، في الرياض هدفها هو الاستعادة...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2024/11/12/1754340/2000/1125/1-1754340.JPG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                قبل إقرار اتفاق لبنان.. إسرائيل تلوح بـ"سياسة عدم التسامح"
                            </h5>
                            <p class="card-text">قال وزير الدفاع الإسرائيلي يسرائيل كاتس لمبعوثة الأمم المتحدة في لبنان، الثلاثاء، إن أي خرق...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="category-section">
            <h2>اقتصاد</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="main-news-card">
                        <img src="https://images.skynewsarabia.com/images/v2/2024/08/13/1735225/1600/720/1-1735225.jpg" class="card-img-top" alt="...">
                        <div class="news-content">
                            <h5 class="card-title">
                                ترودو يتهم ترامب بالسعي لتدمير الاقتصاد الكندي
                            </h5>
                            <p class="card-text">وصف رئيس الوزراء الكندي جاستن ترودو الرسوم الجمركية التي فرضها الرئيس الأميركي دونالد ترامب على  ...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/03/06/1781873/1100/619/1-1781873.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                واشنطن تفتح خزائنها لإسرائيل: ملتزمون بـ"أمنها الاقتصادي"
                            </h5>
                            <p class="card-text">
                                أعلن وزير الخزانة الأميركي سكوت بيسنت التزام الولايات المتحدة بـ..."
                            </p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/03/05/1781565/1600/720/1-1781565.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                ترامب يهدد كندا بمزيد من التصعيد في الحرب التجارية
                            </h5>
                            <p class="card-text">هدد الرئيس الأميركي دونالد ترامب كندا بمزيد من التصعيد في الحرب التجارية، بعد فرض...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2022/09/05/1552672/1600/720/1-1552672.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                نمو اقتصاد منطقة اليورو يتجاوز التوقعات في 2024
                            </h5>
                            <p class="card-text">نما اقتصاد منطقة اليورو بأكثر من التقديرات الأولية في نهاية....</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2024/03/14/1699756/1600/720/1-1699756.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                وكالة الطاقة تتوقع فائضا في سوق النفط العالمية في 2025
                            </h5>
                            <p class="card-text">قالت وكالة الطاقة الدولية في تقريرها الشهري عن سوق النفط الصادر، الخميس، إن...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="category-section">
            <h2>رياضة</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="main-news-card">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/03/13/1783481/1100/619/1-1783481.jpg" class="card-img-top" alt="...">
                        <div class="news-content">
                            <h5 class="card-title">
                                الريال يسعى للصدارة.. وبرشلونة في مواجهة ثأرية أمام أتلتيكو
                            </h5>
                            <p class="card-text">يستعد فريق ريال مدريد لخوض مواجهة قوية أمام فياريال مساء السبت...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/03/13/1783372/1100/619/1-1783372.JPG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                أرسنال يتأهل لربع نهائي أبطال أوروبا على حساب أيندهوفن
                            </h5>
                            <p class="card-text">اكتفى أرسنال الإنجليزي بالتعادل مع ضيفه أيندهوفن الهولندي 2-2 الأربعاء على ملعب...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/03/12/1783304/1100/619/1-1783304.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                بعد انسحاب الأهلي.. بلاغ من بيراميدز بسبب "توجيه الدوري"
                            </h5>
                            <p class="card-text">أعلن نادي بيراميدز، الأربعاء، تقدمه ببلاغ رسمي للنائب العام المصري وشكوى...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/03/13/1783361/1100/619/1-1783361.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                دورتموند يواجه برشلونة بدور الثمانية لأبطال أوروبا
                            </h5>
                            <p class="card-text">واصل بوروسيا دورتموند الألماني مسيرته في بطولة دوري أبطال أوروبا لكرة القدم، عقب...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/03/13/1783486/1100/619/1-1783486.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                بايرن يسعى لتعزيز الصدارة قبل التوقف الدولي
                            </h5>
                            <p class="card-text">يحول نادي بايرن ميونخ تركيزه مجددا إلى الدوري الألماني (البوندسليغا) بعد نجاحه ...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="category-section">
            <h2>صحة</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="main-news-card">
                        <img src="https://images.skynewsarabia.com/images/v1/2024/04/28/1709488/1100/619/1-1709488.jpg" class="card-img-top" alt="...">
                        <div class="news-content">
                            <h5 class="card-title">
                                فضيحة تضرب مياه بيرييه المعدنية لتلوثها ببكتيريا "الفضلات"
                            </h5>
                            <p class="card-text">أمرت الحكومة الفرنسية شركة بيرييه للمياه المعدنية بتدمير مليوني زجاجة...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2025/02/04/1774398/1100/619/1-1774398.JPG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                منظمة الصحة تبدأ تجربة لقاح ضد "الإيبولا" في دولة إفريقية
                            </h5>
                            <p class="card-text">بدأت السلطات الأوغندية يوم الإثنين، تجربة سريرية جديدة لنشر لقاح ضد سلالة...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2024/12/24/1764174/1100/619/1-1764174.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                دولة إفريقية تفعّل حالة الطوارئ بسبب مرض فيروسي
                            </h5>
                            <p class="card-text">أعلن مركز مكافحة الأمراض في نيجيريا يوم الإثنين إطلاق مركز للاستجابة للطوارئ بعد...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2024/10/25/1750225/1100/619/1-1750225.JPG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                إفريقيا.. أكثر من 2700 إصابة محتملة بجدري القردة في أسبوع
                            </h5>
                            <p class="card-text">أعلنت مراكز مكافحة الأمراض والوقاية منها في إفريقيا، يوم الخميس، تسجيل...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.skynewsarabia.com/images/v1/2024/11/17/1755567/1100/619/1-1755567.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                الولايات المتحدة تسجل أول إصابة بسلالة فرعية من جدري القردة
                            </h5>
                            <p class="card-text">أكدت المراكز الأميركية للسيطرة على الأمراض والوقاية منها يوم السبت أول إصابة بالسلالة الفرعية...</p>
                            <a href="#" class="btn btn-primary">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>