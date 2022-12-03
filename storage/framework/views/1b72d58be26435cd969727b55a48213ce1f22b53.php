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
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
</head>

<body>
    <div class="loader"></div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i></a></li>
                    </ul>
                </div>

                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo e(asset('assets/img/user.png')); ?>" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello Reji</div>
                            <a href="#" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile</a>
                            <a href="#" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <form action="<?php echo e(url('logout')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <button type="submit" class="dropdown-item has-icon text-danger logout-link">
                                    <i class="fas fa-sign-out-alt"></i> Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?php echo e(route('dashboard')); ?>">
                            <img alt="image" src="<?php echo e(asset('assets/img/logo.png')); ?>" class="header-logo">
                            <span class="logo-name">Magic Maths Tree</span>
                        </a>
                    </div>

                    <ul class="sidebar-menu">
                        <li class="dropdown active">
                            <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
                                <i data-feather="monitor"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo e(route('leads')); ?>" class="nav-link">
                                <i data-feather="anchor"></i><span>Leads</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo e(route('customers')); ?>" class="nav-link">
                                <i data-feather="user-check"></i><span>Customers</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo e(route('product-codes')); ?>" class="nav-link">
                                <i data-feather="grid"></i><span>Product Codes</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo e(route('sales-reps')); ?>" class="nav-link">
                                <i data-feather="user-check"></i><span>Sales Representatives</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>

            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Sales Reps</h5>
                                                    <h2 class="mb-3 font-18">258</h2>
                                                    <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="<?php echo e(asset('assets/img/banner/1.png')); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Leads</h5>
                                                    <h2 class="mb-3 font-18">2,546</h2>
                                                    <p class="mb-0"><span class="col-green">18%</span> Increase</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="<?php echo e(asset('assets/img/banner/3.png')); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Customers</h5>
                                                    <h2 class="mb-3 font-18">1,287</h2>
                                                    <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="<?php echo e(asset('assets/img/banner/2.png')); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Revenue</h5>
                                                    <h2 class="mb-3 font-18">INR 48,697</h2>
                                                    <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="<?php echo e(asset('assets/img/banner/4.png')); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Revenue Chart (2019 - 2020)</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div id="chart1"></div>

                                            <div class="row mb-0">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30">
                                                            <i data-feather="arrow-up-circle" class="col-green"></i>
                                                            <h5 class="m-b-0">INR 675</h5>
                                                            <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30">
                                                            <i data-feather="arrow-down-circle"
                                                                class="col-orange"></i>
                                                            <h5 class="m-b-0">INR 1,587</h5>
                                                            <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30">
                                                            <i data-feather="arrow-up-circle" class="col-green"></i>
                                                            <h5 class="mb-0 m-b-0">INR 45,965</h5>
                                                            <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="row mt-5">
                                                <div class="col-7 col-xl-7 mb-3">Total Expense</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">INR 6,287</span>
                                                    <sup class="col-green">+09%</sup>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">Total Income</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">INR 20,857</span>
                                                    <sup class="text-danger">-18%</sup>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">Total Leads</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">8,052</span>
                                                    <sup class="col-green">+16%</sup>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">Total Customers</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">8,257</span>
                                                    <sup class="col-green">+09%</sup>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">New Customers</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">684</span>
                                                    <sup class="col-green">+22%</sup>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visitor/Lead Source</h4>
                                </div>

                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">1,000</div>
                                        <div class="font-weight-bold">Direct</div>
                                        <div class="progress" data-height="5">
                                            <div class="progress-bar l-bg-purple" role="progressbar" data-width="80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">2,675</div>
                                        <div class="font-weight-bold">Google</div>
                                        <div class="progress" data-height="5">
                                            <div class="progress-bar l-bg-purple" role="progressbar" data-width="80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">1,753</div>
                                        <div class="font-weight-bold">Facebook</div>
                                        <div class="progress" data-height="5">
                                            <div class="progress-bar l-bg-green" role="progressbar" data-width="67%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">1,254</div>
                                        <div class="font-weight-bold">Bing</div>
                                        <div class="progress" data-height="5">
                                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="58%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">984</div>
                                        <div class="font-weight-bold">Yahoo</div>
                                        <div class="progress" data-height="5">
                                            <div class="progress-bar l-bg-yellow" role="progressbar" data-width="36%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">563</div>
                                        <div class="font-weight-bold">Instagram</div>
                                        <div class="progress" data-height="5">
                                            <div class="progress-bar bg-cyan" role="progressbar" data-width="28%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">345</div>
                                        <div class="font-weight-bold">Twitter</div>
                                        <div class="progress" data-height="5">
                                            <div class="progress-bar bg-light-blue" role="progressbar"
                                                data-width="20%" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    <a href="http://magicmathstree.com">&copy; Magic Maths Tree</a></a>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>

    <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/page/vdashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\K\freelancer\Anish\mmt-web-admin_25072022\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>