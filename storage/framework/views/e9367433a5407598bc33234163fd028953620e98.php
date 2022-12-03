<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Wonder Maths | Admin</title>

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
                            <div class="login-brand">Magic Maths Tree</div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Login</h4>
                                </div>

                                <div class="card-body">
                                    <form action="<?php echo e(url('login')); ?>" method="post" name="mmt-form-login" class="needs-validation" novalidate="">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group floating-addon">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <input type="email" id="email" name="email" class="form-control" 
                                                    tabindex="1" autocomplete="off" required autofocus>
                                            </div>
                                            <div class="invalid-feedback">Please fill in your email</div>
                                        </div>
                                        <div class="form-group floating-addon">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password</label>
                                                <div class="float-right">
                                                    <a href="<?php echo e(route('forgot-password')); ?>" class="text-small">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-key"></i>
                                                    </div>
                                                </div>
                                                <input type="password" id="password" name="password" class="form-control" 
                                                    tabindex="2" required>
                                            </div>
                                            <div class="invalid-feedback">Please fill in your password</div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="simple-footer">&copy;2020 Magic Maths Tree</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/page/vlogin.js?v=01012021A')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\K\freelancer\Anish\_admin_project\resources\views/auth/login.blade.php ENDPATH**/ ?>