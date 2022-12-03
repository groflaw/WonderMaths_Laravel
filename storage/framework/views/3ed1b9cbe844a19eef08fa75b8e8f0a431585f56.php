<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Magic Maths Tree</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.ico')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bundles/datatables/datatables.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')); ?>">
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
                        <li class="dropdown">
                            <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
                                <i data-feather="monitor"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown active">
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
                        <li class="dropdown">
                            <a href="<?php echo e(route('promo-codes')); ?>" class="nav-link">
                                <i data-feather="user-check"></i><span>Promo Code</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>

            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Leads</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="tableLeads"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Source</th>
                                                        <th>Name</th>
                                                        <th>Mobile No.</th>
                                                        <th>Email</th>
                                                        <th>Location</th>
                                                        <th>Received On</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <input type="hidden" id="basePath" value="<?php echo e(url('/')); ?>">
                <div class="footer-left">
                    <a href="http://magicmathstree.com">&copy; Magic Maths Tree</a></a>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>

    <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/page/vleads.js?v=01012021A')); ?>"></script>
</body>

</html>
<?php /**PATH C:\K\freelancer\Anish\mmt-web-admin_25072022\resources\views/admin/leads.blade.php ENDPATH**/ ?>