<?php include_once ("includes/config.php");
$settings = $db->query("SELECT * FROM `settings`")->fetch();

$id = $_REQUEST['id'];
$subMenu = $db->query("SELECT * FROM `sub_menu` where `id`=$id")->fetch();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="Global Consular Service">
    <meta name="author" content="">

    <!-- Favicon and touch Icons -->
    <link href="admin/upload/logo/<?php echo $settings['logo_img'] ?>" rel="shortcut icon" type="image/png">
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

    <!-- Main Wrapper-->
    <main class="wrapper">
        <!-- Page Header -->
        <div class="wptb-page-heading" style="background-image: url('admin/upload/banner/<?php echo $subMenu['img'] ?>');">
		
		<div style="background:#000; position:absolute; top:0; width:100%; border:1px solid #FF0000; height:100%; opacity:0.5;"></div>
            <div class="container">
                <div class="wptb-item--inner">
                    <h4 class="wptb-item--title" style="color:#fff;"><?php echo $subMenu['bn_txt'] ?>
</br></h4>

                </div>
            </div>
        </div>

        <!-- Intro -->
        <section class="wptb-intro-one pb-0">
            <div class="container" style='padding-left:50px;padding-right:50px;'>


                <div style='text-align: justify;color:black;'><?php echo $subMenu['description'] ?>
                </br></div>

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