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
                                        <h4>Product Codes</h4>
                                        <div class="card-header-action">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#addProductCodesModal">Add</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="tableProductCodes"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Product Code</th>
                                                        <th>Sales Rep.</th>
                                                        <th>Valid From-To</th>
                                                        <th>Created On</th>
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

                <div class="modal fade" id="addProductCodesModal" tabindex="-1" role="dialog" data-backdrop="static"
                    data-keyboard="false" aria-labelledby="addProductCodesModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('add-product-codes')); ?>" method="post" id="form-mmt-addpcodes"
                                name="form-mmt-addpcodes">
                                <?php echo csrf_field(); ?>

                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductCodesModalTitle">Add Product Codes</h5>
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
                                        <label for="add_code_count">Code Count</label>
                                        <input type="text" class="form-control" name="add_code_count"
                                            id="add_code_count">
                                        <div class="help-error" data-error="code_count"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="add_sales_rep" class="d-block">Sales Representative</label>
                                        <select class="form-control select2" style="width:100%" name="add_sales_rep"
                                            id="add_sales_rep">
                                            <option value="0">Select Sales Rep</option>

                                            <?php $__currentLoopData = $salesReps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesRep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($salesRep->id); ?>"><?php echo e($salesRep->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="help-error" data-error="sales_rep"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="d-block mt-3 mb-2">Validity</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="add_validity1" name="add_validity"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="add_validity1">Limited</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="add_validity2" name="add_validity"
                                                class="custom-control-input" value="0" checked>
                                            <label class="custom-control-label" for="add_validity2">Unlimited</label>
                                        </div>
                                        <div class="help-error" data-error="validity"></div>
                                    </div>
                                    <div class="form-group mb-2 d-none" id="fg-add-valid-from">
                                        <label for="add_valid_from">Valid From</label>
                                        <input type="text" class="form-control datepicker" name="add_valid_from"
                                            id="add_valid_from">
                                        <div class="help-error" data-error="valid_from"></div>
                                    </div>
                                    <div class="form-group mb-4 d-none" id="fg-add-valid-to">
                                        <label for="add_valid_to">Valid To</label>
                                        <input type="text" class="form-control datepicker" name="add_valid_to"
                                            id="add_valid_to">
                                        <div class="help-error" data-error="valid_to"></div>
                                    </div>
                                </div>

                                <div class="modal-footer d-flex justify-content-center bg-whitesmoke">
                                    <button type="button" class="btn btn-light waves-effect"
                                        id="btn-cancel-addpcodes">CANCEL</button>
                                    <button type="submit" class="btn btn-primary m-l-15 waves-effect"
                                        id="btn-add-pcodes">GENERATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="genProductCodesModal" tabindex="-1" role="dialog"
                    data-backdrop="static" data-keyboard="false" aria-labelledby="genProductCodesModalTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="genProductCodesModalTitle">Generated Product Codes</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <p>Successfully generated <span id="generatedProductCodesCount"></span> Product Code(s)
                                </p>
                                <ul id="generatedProductCodes"></ul>
                            </div>

                            <div class="modal-footer d-flex justify-content-center bg-whitesmoke">
                                <button type="button" class="btn btn-primary waves-effect"
                                    data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editProductCodeModal" tabindex="-1" role="dialog"
                    data-backdrop="static" data-keyboard="false" aria-labelledby="editProductCodeModalTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('edit-product-code')); ?>" method="put" id="form-mmt-editpcode"
                                name="form-mmt-editpcode">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" id="edit_pcode_id" name="edit_pcode_id" value="">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProductCodeModalTitle">Edit Product Code</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group mb-2">
                                        <label for="edit_pcode">Product Code</label>
                                        <input type="text" class="form-control purchase-code" name="edit_pcode"
                                            id="edit_pcode" disabled>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="edit_sales_rep" class="d-block">Sales Representative</label>
                                        <select class="form-control select2" style="width:100%" name="edit_sales_rep"
                                            id="edit_sales_rep">
                                            <option value="0">Select Sales Rep</option>

                                            <?php $__currentLoopData = $salesReps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesRep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($salesRep->id); ?>"><?php echo e($salesRep->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="help-error" data-error="sales_rep"></div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="d-block mt-3 mb-2">Validity</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="edit_validity1" name="edit_validity"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="edit_validity1">Limited</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="edit_validity2" name="edit_validity"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="edit_validity2">Unlimited</label>
                                        </div>
                                        <div class="help-error" data-error="validity"></div>
                                    </div>
                                    <div class="form-group mb-2 d-none" id="fg-edit-valid-from">
                                        <label for="edit_valid_from">Valid From</label>
                                        <input type="text" class="form-control datepicker" name="edit_valid_from"
                                            id="edit_valid_from">
                                        <div class="help-error" data-error="valid_from"></div>
                                    </div>
                                    <div class="form-group mb-2 d-none" id="fg-edit-valid-to">
                                        <label for="edit_valid_to">Valid To</label>
                                        <input type="text" class="form-control datepicker" name="edit_valid_to"
                                            id="edit_valid_to">
                                        <div class="help-error" data-error="valid_to"></div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="d-block mt-3 mb-2">Status</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="edit_status1" name="edit_status"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="edit_status1">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="edit_status2" name="edit_status"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="edit_status2">Inactive</label>
                                        </div>
                                        <div class="help-error" data-error="status"></div>
                                    </div>
                                </div>

                                <div class="modal-footer d-flex justify-content-center bg-whitesmoke">
                                    <button type="button" class="btn btn-light waves-effect"
                                        id="btn-cancel-editpcode">CANCEL</button>
                                    <button type="submit" class="btn btn-primary m-l-15 waves-effect"
                                        id="btn-edit-pcode">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/cleave-js/dist/cleave.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/datatables/export-tables/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bundles/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/page/vproductcodes.js?v=04012021A')); ?>"></script>
</body>

</html>
<?php /**PATH C:\K\freelancer\Anish\_admin_project\resources\views/admin/productcodes.blade.php ENDPATH**/ ?>