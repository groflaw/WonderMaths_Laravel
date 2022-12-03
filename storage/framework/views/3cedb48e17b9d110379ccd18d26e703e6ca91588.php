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
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css?v=02012021A')); ?>">
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
                        <li class="dropdown active">
                            <a href="<?php echo e(route('promo-codes')); ?>" class="nav-link">
                                <i data-feather="user-check"></i><span>Promo Code</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo e(route('promo-codes')); ?>" class="nav-link">
                                <i data-feather="user-check"></i><span>Topics</span>
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
                                        <h4>Promo Codes</h4>
                                        <div class="card-header-action">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#addSalesRepModal">Add</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="tableSalesReps"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Name</th>
                                                        <th>Discount %</th>
                                                        <th>By Role</th>
                                                        <th>Actions</th>
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

                <div class="modal fade" id="addSalesRepModal" tabindex="-1" role="dialog" data-backdrop="static"
                    data-keyboard="false" aria-labelledby="addSalesRepModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('add-promo-code')); ?>" method="post" id="form-mmt-addsalesrep"
                                name="form-mmt-addsalesrep">
                                <?php echo csrf_field(); ?>

                                <div class="modal-header">
                                    <h5 class="modal-title" id="addSalesRepModalTitle">Add Promo Code</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="help-page-error"></div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="add_name">Name</label>
                                        <input type="text" class="form-control" maxlength="30" name="add_name"
                                            id="add_name">
                                        <div class="invalid-feedback" data-error="name"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="add_mobile_no">Discount %</label>
                                        <input type="text" class="form-control" maxlength="10"
                                            name="add_discount" id="add_mobile_no">
                                        <div class="invalid-feedback" data-error="mobile_no"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="add_email">By Role</label>
                                        <select class="form-control" name="add_byrole" id="add_email">
                                            <option value="1">Sponser</option>
                                            <option value="2">Influencer</option>
                                            <option value="3">Sales Company</option>
                                        </select>
                                        <div class="invalid-feedback" data-error="email"></div>
                                    </div>
                                </div>

                                <div class="modal-footer d-flex justify-content-center bg-whitesmoke">
                                    <button type="button" class="btn btn-light waves-effect"
                                        id="btn-cancel-addsalesrep">CANCEL</button>
                                    <button type="submit" class="btn btn-primary m-l-15 waves-effect"
                                        id="btn-add-salesrep">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editSalesRepModal" tabindex="-1" role="dialog" data-backdrop="static"
                    data-keyboard="false" aria-labelledby="editSalesRepModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('edit-promo-code')); ?>" method="put" id="form-mmt-editsalesrep"
                                name="form-mmt-editsalesrep">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" id="edit_salesrep_id" name="edit_salesrep_id" value="">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="editSalesRepModalTitle">Edit Promo Code</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="help-page-error"></div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="edit_name">Name</label>
                                        <input type="text" class="form-control" maxlength="30" name="edit_name"
                                            id="edit_name">
                                        <div class="invalid-feedback" data-error="name"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="edit_mobile_no">Discount %</label>
                                        <input type="text" class="form-control" maxlength="10"
                                            name="edit_discount" id="edit_mobile_no">
                                        <div class="invalid-feedback" data-error="mobile_no"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="edit_email">By Role</label>
                                        <select class="form-control" name="edit_byrole" id="edit_email">
                                            <option value="1">Sponser</option>
                                            <option value="2">Influencer</option>
                                            <option value="3">Sales Company</option>
                                        </select>
                                        <div class="invalid-feedback" data-error="email"></div>
                                    </div>
                                </div>

                                <div class="modal-footer d-flex justify-content-center bg-whitesmoke">
                                    <button type="button" class="btn btn-light waves-effect"
                                        id="btn-cancel-editsalesrep">CANCEL</button>
                                    <button type="submit" class="btn btn-primary m-l-15 waves-effect"
                                        id="btn-edit-salesrep">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
                <div class="modal fade" id="deleteSalesRepModal" tabindex="-1" role="dialog"
                    data-backdrop="static" data-keyboard="false" aria-labelledby="deleteSalesRepModalTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('delete-promo-code')); ?>" method="put"
                                id="form-mmt-deletesalesrep" name="form-mmt-deletesalesrep">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" id="delete_salesrep_id" name="delete_salesrep_id"
                                    value="">

                                <div class="modal-footer d-flex justify-content-center bg-whitesmoke">
                                    <button type="button" class="btn btn-light waves-effect"
                                        id="btn-cancel-deletesalesrep">CANCEL</button>
                                    <button type="submit" class="btn btn-primary m-l-15 waves-effect"
                                        id="btn-delete-salesrep">DELETE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


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
    <script src="<?php echo e(asset('assets/js/page/vpromocodes.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\K\freelancer\Anish\_admin_project\resources\views/admin/promo_codes.blade.php ENDPATH**/ ?>