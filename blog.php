<!DOCTYPE html>
<html lang="zxx">
<?php include ("includes/config.php");
if ($_REQUEST['cat_id'] == '') {
    $units = $db->query("SELECT * FROM `blogs` where `is_del`=0")->fetchAll();
} else {
    $cat_id = $_REQUEST['cat_id'];
    $units = $db->query("SELECT * FROM `blogs` WHERE `is_del` = 0 AND FIND_IN_SET($cat_id, `categories_id`)")->fetchAll();

}
?>

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="Global Consular Service">
    <meta name="author" content="">

    <!-- Favicon and touch Icons -->
    <link href="assets/img/logo_new.png" rel="shortcut icon" type="image/png">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="assets/img/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="assets/img/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="assets/img/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Page Title -->
    <title>Global Consular Service</title>

    <!-- Styles Include -->
    <link rel="stylesheet" href="assets/css/main.css">

</head>


<body>

    <?php include 'includes/header.php'; ?>

    <!-- Aside Info -->


    <!-- Main Wrapper-->
    <main class="wrapper">
        <!-- Page Header -->
        <div class="wptb-page-heading" style="background-image: url('assets/img/background/page-header-bg.jpg');">
            <div class="container">
                <div class="wptb-item--inner">
                    <h2 class="wptb-item--title ">Blogs</h2>

                </div>
            </div>
        </div>

        <!-- Blog Grid -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="row">

                            <?php foreach ($units as $unit) {
                                $maxLength = 80;
                                ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="wptb-blog-grid1 style2 wow fadeInLeft">
                                        <div class="wptb-item--inner">
                                            <div class="wptb-item--image">
                                                <a href="blog_details.php?id=<?php echo $unit['id'] ?>"
                                                    class="wptb-item-link"><img
                                                        src="admin/upload/blogs/<?php echo $unit['img']; ?>" alt="img"></a>
                                            </div>
                                            <div class="wptb-item--holder">
                                                <div class="wptb-item--meta">
                                                    <!-- <div class="wptb-item--date">October 19, 2023</div> -->
                                                    <!-- <div class="wptb-item-comment"><a href="#comments">0</a></div> -->
                                                </div>

                                                <h5 class="wptb-item--title"><a
                                                        href="blog_details.php?id=<?php echo $unit['id'] ?>">
                                                        <?php echo $unit['title']; ?></a></h5>
                                                <p class="wptb-item--description"> <?php
                                                if (strlen($unit['description']) > $maxLength) {
                                                    // If the text length exceeds the maximum length, truncate it
                                                    $shortDescription = substr($unit['description'], 0, $maxLength) . "...";
                                                    echo strip_tags($shortDescription);
                                                } else {
                                                    // If the text length is within the maximum length, use the original text
                                                    $shortDescription = $unit['description'];
                                                    echo strip_tags($shortDescription);
                                                }
                                                ?>
                                                </p>

                                                <div class="wptb-item--button">
                                                    <a class="btn--readmore"
                                                        href="blog_details.php?id=<?php echo $unit['id'] ?>">
                                                        <span class="btn-readmore--text"> Read More </span>
                                                        <span class="btn-readmore--icon"> <i class="bi bi-arrow-right"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            <?php } ?>


                        </div>


                    </div>

                    <!-- Sidebar  -->

                </div>
            </div>
        </section>

    </main>


    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>


    <!-- Core JS -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Framework -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- WOW Scroll Effect -->
    <script src="plugins/wow/wow.min.js"></script>

    <!-- Swiper Slider -->
    <script src="plugins/swiper/swiper-bundle.min.js"></script>

    <!-- Odometer Counter -->
    <script src="plugins/odometer/appear.js"></script>
    <script src="plugins/odometer/odometer.js"></script>

    <!-- Fancybox -->
    <script src="plugins/fancybox/jquery.fancybox.min.js"></script>

    <!-- Flatpickr -->
    <script src="plugins/flatpickr/flatpickr.min.js"></script>

    <!-- Nice Select -->
    <script src="plugins/nice-select/jquery.nice-select.min.js"></script>

    <!-- Theme Custom JS -->
    <script src="assets/js/theme.js"></script>
</body>

</html>