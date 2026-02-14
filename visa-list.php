<!DOCTYPE html>
<html lang="zxx">
<?php include ("includes/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $date = date('Y-m-d H:i:s');
            $fields = array(
        
                'email' => addslashes($email),
        
        
                'created_at' => addslashes($date),
        
            );
        
            $addQuery = "INSERT INTO `newsletter` (`" . implode('`,`', array_keys($fields)) . "`)"
                . " VALUES ('" . implode("','", array_values($fields)) . "')";
        
            $stmt1 = $db->query($addQuery);
            /* $stmt = $db->prepare("INSERT INTO `newsletter` (email) VALUES (:email)");
            $stmt->bindParam(':email', $email);
            $stmt->execute(); */
            $message = "Thank you for subscribing!";
        } catch (PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    } else {
        $message = "Invalid email address.";
    }
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
                    <h2 class="wptb-item--title ">Visa</h2>
                    <!-- <div class="wptb-breadcrumb-wrap">
                        <ul class="wptb-breadcrumb">
                            <li><a href="#">Home</a></li>

                            <li><span>Visa List</span></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Visa List -->
        <section>
            <div class="container">
                <div class="wptb-heading">
                    <div class="wptb-item--inner text-center">
                        <h6 class="wptb-item--subtitle">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path
                                        d="M14.9119 2.10726L0.787131 7.08487C0.559931 7.16487 0.509531 7.36087 0.779131 7.46806L3.81593 8.68486L5.61593 9.40566L14.4031 2.95286C14.5215 2.86646 14.6575 3.02886 14.5719 3.12166L8.27513 9.93207V9.93366L7.91353 10.3361L8.39273 10.5937L12.3783 12.7393C12.6111 12.8641 12.9127 12.7609 12.9799 12.4721L15.3047 2.45206C15.3679 2.17766 15.1863 2.01046 14.9119 2.10726ZM5.59993 13.7297C5.59993 13.9265 5.71113 13.9817 5.86473 13.8425C6.06553 13.6593 8.14473 11.7937 8.14473 11.7937L5.59993 10.4785V13.7297Z"
                                        fill="#E13833" />
                                </svg>
                            </span>
                            Visa List
                        </h6>
                        <h1 class="wptb-item--title"> <span>Committed to provide you <br>
                                the best visa services</span></h1>
                    </div>
                </div>


                <?php $visa_services = $db->query("SELECT * FROM `visa_list` WHERE `is_del` = 0 ORDER BY `sort_order` ASC")->fetchAll(); ?>
                <div class="swiper-container swiper-imagebox">
                    <!-- swiper slides -->
                    <div class="swiper-wrapper">
                        <?php foreach ($visa_services as $visa_service) { ?>

                            <div class="swiper-slide"
                                onclick="location.href='service_detailsinfo.php?id=<?php echo $visa_service['id'] ?>'"
                                style='cursor: pointer;'>
                                <div class="wptb-image-box3 wow fadeInLeft">
                                    <div class="wptb-item--inner">

                                        <div class="wptb-item--image">

                                            <img src="admin/upload/visa_list/<?php echo $visa_service['img'] ?>" alt="img">
                                            <div class="wptb-item--button"> <a class="btn--readmore"
                                                    href="service_detailsinfo.php?id=<?php echo $visa_service['id'] ?>">
                                                    <span class="btn-readmore--icon"> <i class="bi bi-arrow-right"></i>
                                                    </span> </a></div>

                                        </div>

                                        <div class="wptb-item--holder">
                                            <!-- <div class="wptb-item--icon">
                                            <img src="assets/img/services/icon-8.png" alt="icon">
                                        </div> -->
                                            <div class="wptb-item--wrap-content">
                                                <!-- <p class="wptb-item--description"> Service 1</p> -->
                                                <h4 class="wptb-item--title"><a
                                                        href="#"><?php echo $visa_service['title'] ?></a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php } ?>
                    </div>

                    <!-- pagination dots -->
                    <div class="wptb-swiper-dots">
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- !pagination dots -->
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <div class="wptb-newsletter bg-image" style="background-image: url('assets/img/background/bg-16.jpg');">
            <div class="container">
                <div class="wptb-item--inner">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h1 class="wptb-item--title wow fadeInLeft">Subscribe for Updates</h1>
                        </div>
                        <div class="col-md-6">
                            <form class="newsletter-form" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                        required>
                                </div>
                                <button type="submit" class="btn-readmore style-icon">
                                    <span class="btn-readmore--icon"> <i class="bi bi-send"></i> </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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