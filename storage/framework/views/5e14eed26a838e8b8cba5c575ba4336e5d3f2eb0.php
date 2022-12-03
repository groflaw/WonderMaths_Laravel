<!DOCTYPE html>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <div class="loader"></div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?php echo $__env->make('admin.layouts.nav_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Customers</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="tableCustomers"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Lead ID</th>
                                                        <th>Product Code</th>
                                                        <th>Name</th>
                                                        <th>Mobile No.</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
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

                <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" data-backdrop="static"
                    data-keyboard="false" aria-labelledby="editCustomerModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('edit-customer')); ?>" method="put" id="form-mmt-editcustomer"
                                name="form-mmt-editcustomer">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" id="edit_customer_id" name="edit_customer_id" value="">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCustomerModalTitle">Edit Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group mb-2">
                                        <label for="edit_lead_id">Lead ID</label>
                                        <input type="text" class="form-control" name="edit_lead_id" id="edit_lead_id"
                                            disabled>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="edit_pcode" class="d-block">Product Code</label>
                                        <select class="form-control select2" style="width:100%" name="edit_pcode"
                                            id="edit_pcode">
                                            <option value="0">Select Product Code</option>

                                            <?php $__currentLoopData = $productCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($productCode->id); ?>">
                                                    <?php echo e($productCode->product_code); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="help-error" data-error="product_code"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="edit_name">Name</label>
                                        <input type="text" class="form-control" name="edit_name" id="edit_name"
                                            disabled>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="edit_mobile_no">Mobile No.</label>
                                        <input type="text" class="form-control" name="edit_mobile_no"
                                            id="edit_mobile_no" disabled>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="edit_email">Email</label>
                                        <input type="text" class="form-control" name="edit_email" id="edit_email"
                                            disabled>
                                    </div>
                                </div>

                                <div class="modal-footer d-flex justify-content-center bg-whitesmoke">
                                    <button type="button" class="btn btn-light waves-effect"
                                        id="btn-cancel-editcustomer">CANCEL</button>
                                    <button type="submit" class="btn btn-primary m-l-15 waves-effect"
                                        id="btn-edit-customer">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\K\freelancer\Anish\mmt-web-admin_25072022\resources\views/admin/customers.blade.php ENDPATH**/ ?>