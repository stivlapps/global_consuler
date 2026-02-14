<!DOCTYPE html>
<html lang="zxx">
<?php
include ("includes/config.php");
$units = $db->query("SELECT * FROM `blogs` where `id`=" . $_REQUEST['id'])->fetch();

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
                    <h2 class="wptb-item--title ">Blog Details</h2>

                </div>
            </div>
        </div>

        <!-- Details Content -->
        <section class="blog-details">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-md-7">
                        <div class="blog-details-inner">
                            <div class="post-content">
                                <figure class="block-gallery mb-0">
                                    <ul class="blocks-gallery-grid">
                                        <li class="blocks-gallery-item mb-0 me-0">
                                            <figure>
                                                <a href="#"><img src="admin/upload/blogs/<?php echo $units['img']; ?>"
                                                        alt="img" class="block-image"></a>
                                            </figure>
                                        </li>
                                    </ul>
                                </figure>

                                <div class="post-header">
                                    <!-- <div class="post-date">January 11, 2023</div> -->
                                    <h2 class="post-title"><?php echo $units['title']; ?></h2>
                                </div>
                                <div class='mb-3'>

                                    <div style='text-align: justify;color:black'> <?php echo $units['description']; ?>
                                    </div>

                                </div>



                            </div>
                        </div>

                    </div>

                    <!-- Sidebar  -->
                    <div class="col-lg-4 col-md-5 mt-5 mt-md-0 ps-md-5">

                        <div class="sidebar">


                            <!-- end widget -->


                            <!-- end widget -->

                            <!-- end widget -->

                            <div class="widget widget_block">
                                <div class="wp-block-group__inner-container">
                                    <h2 class="widget-title">Categories</h2>
                                    <ul class="wp-block-categories-list wp-block-categories">
                                        <?php
                                        $categories = $db->query("SELECT * FROM `blog_categories` where `is_del`=0 ")->fetchAll();

                                        foreach ($categories as $category) {
                                            $id = $category['id'];

                                            $blogs_number = $db->query("SELECT *  FROM `blogs` where `is_del`=0 AND FIND_IN_SET($id, `categories_id`)")->rowCount();
                                            ?>
                                            <li class="cat-item"><a
                                                    href="blog.php?cat_id=<?php echo $id ?>"><?php echo $category['name'] ?></a>
                                                (<?php echo $blogs_number ?>)
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- end widget -->


                            <!-- end widget -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Details Content -->

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