<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Wonder Maths App">
        <meta name="keywords" content="Wonder Maths">
        <meta name="author" content="QLeap Business Solutions">

        <title>Wonder Maths | Demo Videos</title>

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('apple-touch-icon.png')); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon-32x32.png')); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon-16x16.png')); ?>">
        <link rel="manifest" href="<?php echo e(asset('site.webmanifest')); ?>">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bitter:wght@500;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css"
            integrity="sha256-RdH19s+RN0bEXdaXsajztxnALYs/Z43H/Cdm1U4ar24=" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/animate.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/style.css?v=12112021E')); ?>">

        <script src="https://kit.fontawesome.com/e6f9425942.js" crossorigin="anonymous"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZESYW70H8M"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-ZESYW70H8M');
        </script>
    </head>

    <body>
        <?php echo $__env->make('site.section-preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.section-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="section-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Demo Videos</h1>
                        <p>Animated tuition video classes help the student to learn easily.</p>
                    </div>
                </div>

                <?php echo $__env->make('site.section-page-header-bg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div id="section-4xi5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 text-center">
                        <div class="wrapper-demo-video">
                            <div class="video-content">
                                <img src="<?php echo e(asset('assets/site/images/img-demovideos-01.webp')); ?>" alt="img-sec-demovideos-thumb-1" class="img-fluid">
                                <a href="https://www.youtube.com/watch?v=b7lYCc1yuP4" class="video-link video-popup">
                                    <i class="fas fa-play"></i>
                                </a>
                                <div class="overlay"></div>
                            </div>
                            <h5>Divisibility</h5>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 text-center">
                        <div class="wrapper-demo-video">
                            <div class="video-content">
                                <img src="<?php echo e(asset('assets/site/images/img-demovideos-04.webp')); ?>" alt="img-sec-demovideos-thumb-4" class="img-fluid">
                                <a href="https://www.youtube.com/watch?v=NbMfRbd6ppA" class="video-link video-popup">
                                    <i class="fas fa-play"></i>
                                </a>
                                <div class="overlay"></div>
                            </div>
                            <h5>Linear Equations</h5>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 text-center">
                        <div class="wrapper-demo-video">
                            <div class="video-content">
                                <img src="<?php echo e(asset('assets/site/images/img-demovideos-03.webp')); ?>" alt="img-sec-demovideos-thumb-3" class="img-fluid">
                                <a href="https://www.youtube.com/watch?v=9u3Z3eixT2I" class="video-link video-popup">
                                    <i class="fas fa-play"></i>
                                </a>
                                <div class="overlay"></div>
                            </div>
                            <h5>Factorisation of Quadratic Polynomials</h5>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 text-center">
                        <div class="wrapper-demo-video">
                            <div class="video-content">
                                <img src="<?php echo e(asset('assets/site/images/img-demovideos-02.webp')); ?>" alt="img-sec-demovideos-thumb-2" class="img-fluid">
                                <a href="https://www.youtube.com/watch?v=6wwYyoHJ1CA" class="video-link video-popup">
                                    <i class="fas fa-play"></i>
                                </a>
                                <div class="overlay"></div>
                            </div>
                            <h5>Least Common Multiple</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('site.section-subscribe-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"
            integrity="sha256-P93G0oq6PBPWTP1IR8Mz/0jHHUpaWL0aBJTKauisG7Q=" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('assets/site/js/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/site/js/easy-waypoint-animate.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/site/js/scripts.js?v=12112021A')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\K\freelancer\Anish\mmt-web-admin_25072022\resources\views/site/demo-videos.blade.php ENDPATH**/ ?>