<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Wonder Maths App">
        <meta name="keywords" content="Wonder Maths">
        <meta name="author" content="QLeap Business Solutions">

        <title>Wonder Maths | Contact Us</title>

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
                        <h1>Contact</h1>
                        <p>Lets start something great together. Get in touch with our team today!</p>
                    </div>
                </div>

                <?php echo $__env->make('site.section-page-header-bg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div id="section-n6my">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-5 mb-30 ez-animate" data-animation="fadeInLeft">
                        <h3>Get in touch</h3>
                        <div class="mt-50">
                            <h4>Phone</h4>
                            <p>Due to COVID 19, our full team is working remotely. Please email us or request a callback</p>
                        </div>
                        <div class="mt-50">
                            <h4>Email</h4>
                            <p><a href="mailto:info@wondermaths.in">info@wondermaths.in</a></p>
                        </div>
                        <div class="mt-50">
                            <h4>Main Office</h4>
                            <p>709, Strata, Walworth Road, London, SE 16Eg</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 ez-animate" data-animation="fadeInRight">
                        <div class="wrapper-contactus-form">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6">
                                        <label for="firstName">First name</label>
                                        <div class="input-group flex-nowrap align-items-center">
                                            <span class="input-group-text" id="igt-first-name">
                                                <i class="far fa-address-card"></i>
                                            </span>
                                            <input type="text" class="form-control" name="firstName" id="firstName" 
                                                placeholder="Type name" required 
                                                aria-label="First name" aria-describedby="igt-first-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6">
                                        <label for="lastName">Last name</label>
                                        <div class="input-group flex-nowrap align-items-center">
                                            <span class="input-group-text" id="igt-last-name">
                                                <i class="far fa-address-card"></i>
                                            </span>
                                            <input type="text" class="form-control" name="lastName" id="lastName" 
                                                placeholder="Type name" required 
                                                aria-label="Username" aria-describedby="igt-first-name">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6">
                                        <label for="email">Email</label>
                                        <div class="input-group flex-nowrap align-items-center">
                                            <span class="input-group-text" id="igt-email">
                                                <i class="far fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control" name="email" id="email" 
                                                placeholder="Type email" required 
                                                aria-label="Email" aria-describedby="igt-email">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6">
                                        <label for="phoneNumber">Phone Number</label>
                                        <div class="input-group flex-nowrap align-items-center">
                                            <span class="input-group-text" id="igt-phone-number">
                                                <i class="fas fa-phone-square-alt"></i>
                                            </span>
                                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" 
                                                placeholder="Type phone number" required 
                                                aria-label="Phone Number" aria-describedby="igt-phone-number">
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="message">Message</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text input-group-textarea">
                                                <i class="fas fa-envelope-open-text"></i>
                                            </span>
                                            <textarea class="form-control" name="message" id="message" 
                                                placeholder="Type message" required aria-label="Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn-send">SEND</button>
                                    </div>
                                </div>
                            </form>
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
        <script src="<?php echo e(asset('assets/site/js/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/site/js/easy-waypoint-animate.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/site/js/scripts.js?v=12112021A')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\K\freelancer\Anish\mmt-web-admin_25072022\resources\views/site/contact-us.blade.php ENDPATH**/ ?>