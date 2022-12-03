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
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo e(asset('assets/img/user.png')); ?>" class="user-img-radious-style">
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">Hello Reji</div>
                <a href="<?php echo e(route('profile')); ?>" class="dropdown-item has-icon">
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
            <li class="dropdown">
                <a href="<?php echo e(route('promo-codes')); ?>" class="nav-link">
                    <i data-feather="user-check"></i><span>Promo Code</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
<?php /**PATH C:\K\freelancer\Anish\_admin_project\resources\views/admin/layouts/nav_sidebar.blade.php ENDPATH**/ ?>