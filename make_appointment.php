<!DOCTYPE html>
<html lang="zxx">
<?php include ("includes/config.php"); ?>

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
    <title>Global Consular Service </title>

    <!-- Styles Include -->
    <link rel="stylesheet" href="assets/css/main.css">

</head>


<body>

    <?php include 'includes/header.php';

    ?>
    <main class="wrapper">
        <section class="wptb-faq-one pd-top-more" style='background-color:#6d8dbb;'>
            <div class="container">
                <!-- FAQ's -->
                <div class="wptb-faq--inner">
                    <div class="wptb-heading">
                        <div class="row">
                            <div class='col-md-6'>
                                <h2 style='color:white;'>Write us what you
                                    want to Know</h2>
                            </div>
                            <div class='col-md-6'>
                                <form class="wptb-form" action="contact.php" method="post">
                                    <div class="wptb-form--inner">
                                        <div class="wptb-heading">
                                            <div class="wptb-item--inner text-center">
                                                <h2 class="wptb-item--title"> <span>Book An Appointment</span></h2>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <select name="country" class="form-control">
                                                        <option value="">Select Country</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Korea">Korea</option>
                                                        <option value="USA">United States</option>
                                                        <option value="UK">United Kingdon</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <select name="country" class="form-control">
                                                        <option value="">Select Service</option>
                                                        <option value="PTE Exam Preperation">PTE Exam Preperation
                                                        </option>
                                                        <option value="TOEFL Exam Preperation">TOEFL Exam
                                                            Preperation</option>
                                                        <option value="GRE Exam">GRE Exam</option>
                                                        <option value="IELTS">IELTS</option>
                                                        <option value="Student Visa">Student Visa Processing
                                                        </option>
                                                        <option value="Family Visa Processing">Family Visa
                                                            Processing</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Your Full Name*" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <input type="number" name="phone" class="form-control"
                                                        placeholder="Phone No">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <input type="text" name="date" class="flatpickr form-control"
                                                        placeholder="Select Date" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <input type="text" name="time" class="flatpickr-time form-control"
                                                        placeholder="Select Time">
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-12">
                                                <div class="wptb-item--button text-center">
                                                    <input class="btn" type="submit" value="Make Appointment"
                                                        name="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </section>
    </main>
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