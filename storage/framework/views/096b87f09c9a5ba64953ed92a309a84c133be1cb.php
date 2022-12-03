<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Magic Maths Tree</title>

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.ico')); ?>">

        <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
    </head>

    <body>
        <div class="loader"></div>

        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Reset Password</h4>
                                </div>

                                <div class="card-body">
                                    <p class="text-muted">Enter Your New Password</p>

                                    <form action="<?php echo e(url('rpassword')); ?>" method="post">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input id="password" type="password" class="form-control pwstrength" 
                                                data-indicator="pwindicator" name="password" tabindex="1" required>
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm">Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" 
                                                name="confirm-password" tabindex="2" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\K\freelancer\Anish\mmt-web-admin_25072022\resources\views/auth/resetpassword.blade.php ENDPATH**/ ?>