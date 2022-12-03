'use strict';

var productCodesTable;
var addProductCodesForm;
var editProductCodeForm;

function initFormatters() {
    new Cleave('.purchase-code', {
        blocks    : [4, 4, 4, 4],
        delimiter : '-',
        uppercase : true
    });
}

function initProductCodesTable() {
    productCodesTable = $('#tableProductCodes').DataTable({
        'ajax'        : {
            'url'     : basePath + '/productcodes/list',
            'type'    : 'GET',
            'dataSrc' : 'pcodes'
        },
        'responsive'  : true,
        'columns'     : [{
            'data'       : null,
            'title'      : 'No.',
            'width'      : '4%',
            'className'  : 'text-center',
            'orderable'  : false,
            'searchable' : false
        }, {
            'data'       : 'product_code',
            'title'      : 'Product Code',
            'render'     : function(data, type, row, meta) {
                var cellData = 
                    data.substring(0, 4) + '-' + 
                    data.substring(4, 8) + '-' + 
                    data.substring(8, 12) + '-' + 
                    data.substring(12,16);
                return cellData;
            }
        }, {
            'data'       : 'sales_rep.name',
            'title'      : 'Sales Rep.'
        }, {
            'data'       : null,
            'title'      : 'Valid From-To',
            'orderable'  : false,
            'className'  : 'text-center',
            'render'     : function(data, type, row, meta) {
                var cellData = '';
                if (row.validity == 0) {
                    cellData += 'No Validity';
                } else if (row.validity == 1) {
                    cellData += row.valid_from + ' - ' + row.valid_to;
                }
                return cellData;
            }
        }, {
            'data'       : 'created_at',
            'title'      : 'Created On',
            'className'  : 'text-center',
            'render'     : function(data, type, row, meta) {
                var part1 = row.created_at.split('T');
                var part2 = part1[1].split('.');
                return part1[0] + ' ' + part2[0];
            }
        }, {
            'data'       : 'status',
            'title'      : 'Status',
            'render'     : function(data, type, row, meta) {
                var cellData = '';
                if (row.status == 0) {
                    cellData = 'Inactive';
                } else if (row.status == 1) {
                    cellData = 'Active';
                }

                return cellData;
            }
        }, {
            'data'       : null,
            'title'      : 'Actions',
            'orderable'  : false,
            'render'     : function(data, type, row, meta) {
                var cellData = '<button class="btn btn-primary btn-edit-pcode" data-pcid="' + row.id + '">Edit</button>';
                return cellData;
            }
        }],
        'order'       : [[ 1, 'asc' ]],
        'dom'         : 'Bfrtip',
        'buttons'     : [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
    });

    productCodesTable.on('order.dt search.dt', function() {
        productCodesTable
            .column(0, { search:'applied', order:'applied' })
            .nodes()
            .each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
}

function initForms() {
    addProductCodesForm = $('form[name="form-mmt-addpcodes"]');
    editProductCodeForm = $('form[name="form-mmt-editpcode"]');
}

function handleValidityRadioChange() {
    $('input[name="add_validity"]').change(function() {
        var cval = $(this).val();
        if (cval == '0') {
            $('#add_valid_from').val('');
            $('#add_valid_to').val('');
            $('#fg-add-valid-from').addClass('d-none');
            $('#fg-add-valid-to').addClass('d-none');
        } else if (cval == '1') {
            $('#fg-add-valid-from').removeClass('d-none');
            $('#fg-add-valid-to').removeClass('d-none');
        }
    });

    $('input[name="edit_validity"]').change(function() {
        var cval = $(this).val();
        if (cval == '0') {
            $('#edit_valid_from').val('');
            $('#edit_valid_to').val('');
            $('#fg-edit-valid-from').addClass('d-none');
            $('#fg-edit-valid-to').addClass('d-none');
        } else if (cval == '1') {
            $('#fg-edit-valid-from').removeClass('d-none');
            $('#fg-edit-valid-to').removeClass('d-none');
        }
    });
}

function handleCancelBtnClick() {
    $('#btn-cancel-addpcodes').click(function() {
        addProductCodesForm[0].reset();
        $('#addProductCodesModal').modal('hide');
    });

    $('#btn-cancel-editpcode').click(function() {
        editProductCodeForm[0].reset();
        $('#editProductCodeModal').modal('hide');
    });
}

function handleAddProductCodes() {
    addProductCodesForm.on('submit', function(e) {
        e.preventDefault();

        $('#addProductCodesModal .form-control').removeClass('is-invalid');
        $('#addProductCodesModal .help-page-error').html('');
        $('#addProductCodesModal .help-error').html('');
        $('#btn-add-pcodes').attr('disabled', 'disabled').text('GENERATING...');
        $('#btn-cancel-addpcodes').attr('disabled', 'disabled');

        var requestData = {
            '_token'     : addProductCodesForm.find('input[name="_token"]').val(),
            'code_count' : addProductCodesForm.find('input[name="add_code_count"]').val(),
            'sales_rep'  : addProductCodesForm.find('select[name="add_sales_rep"]').val(),
            'validity'   : addProductCodesForm.find('input[name="add_validity"]:checked').val(),
            'valid_from' : addProductCodesForm.find('input[name="add_valid_from"]').val(),
            'valid_to'   : addProductCodesForm.find('input[name="add_valid_to"]').val()
        };

        $.ajax({
            url      : addProductCodesForm.attr('action'),
            method   : addProductCodesForm.attr('method'),
            data     : requestData,
            dataType : 'json',
            success  : function(response) {
                $('#btn-add-pcodes').removeAttr('disabled').html('GENERATE');
                $('#btn-cancel-addpcodes').removeAttr('disabled');

                if (response.status) {
                    var codesMarkup = '';
                    var codes = response.codes;
                    codes.forEach(function(code) {
                        var formattedCode = 
                            code.substring(0, 4) + '-' + 
                            code.substring(4, 8) + '-' + 
                            code.substring(8, 12) + '-' + 
                            code.substring(12,16);
                        codesMarkup += '<li>' + formattedCode + '</li>';
                    });

                    $('#generatedProductCodesCount').text(codes.length);
                    $('#generatedProductCodes').html(codesMarkup);
                    $('#addProductCodesModal').modal('hide');
                    $('#genProductCodesModal').modal('show');

                    addProductCodesForm[0].reset();
                    $('#fg-add-valid-from').addClass('d-none');
                    $('#fg-add-valid-to').addClass('d-none');

                    productCodesTable.ajax.reload();

                    // showNotification('', response.message);
                } else {
                    let errors = response.message;
                    for (let key in errors) {
                        let errorDiv = $('#addProductCodesModal .help-error[data-error="' + key + '"]');
                        if (errorDiv.length) {
                            errorDiv.prev('.form-control').addClass('is-invalid');
                            errorDiv.html('<i class="icon icon-warning"></i> ' + errors[key][0]);
                        }
                    }
                }
            },
            error    : function(e) {
                $('#btn-add-pcodes').removeAttr('disabled').html('GENERATE');
                $('#btn-cancel-addpcodes').removeAttr('disabled');
            }
        });
    });
}

function handleEditProductCodeBtnClick() {
    productCodesTable.on('click', '.btn-edit-pcode', function(e) {
        e.preventDefault();

        var productCodeId = $(this).data('pcid');
        var targetRow = $(this).closest('tr');
        var rowData = productCodesTable.row(targetRow).data();

        $('#edit_pcode_id').val(productCodeId);
        $('#edit_pcode').val(rowData.product_code);
        $('#edit_sales_rep').val(rowData.sales_rep.id);

        if (rowData.validity == 0) {
            $('#edit_validity2').prop('checked', true);
            $('#fg-edit-valid-from').addClass('d-none');
            $('#fg-edit-valid-to').addClass('d-none');
        } else if (rowData.validity == 1) {
            $('#edit_validity1').prop('checked', true);
            $('#edit_valid_from').val(rowData.valid_from);
            $('#edit_valid_to').val(rowData.valid_to);
            $('#fg-edit-valid-from').removeClass('d-none');
            $('#fg-edit-valid-to').removeClass('d-none');
        }

        if (rowData.status == 0) {
            $('#edit_status2').prop('checked', true);
        } else if (rowData.status == 1) {
            $('#edit_status1').prop('checked', true);
        }

        initFormatters();

        $('#editProductCodeModal').modal('show');
    });
}

function handleUpdateProductCode() {
    editProductCodeForm.on('submit', function(e) {
        e.preventDefault();

        $('#editProductCodeModal .form-control').removeClass('is-invalid');
        $('#editProductCodeModal .help-page-error').html('');
        $('#editProductCodeModal .help-error').html('');
        $('#btn-edit-pcode').attr('disabled', 'disabled').text('UPDATING...');
        $('#btn-cancel-editpcode').attr('disabled', 'disabled');

        var requestData = {
            '_token'     : editProductCodeForm.find('input[name="_token"]').val(),
            'id'         : editProductCodeForm.find('input[name="edit_pcode_id"]').val(),
            'sales_rep'  : editProductCodeForm.find('select[name="edit_sales_rep"]').val(),
            'validity'   : editProductCodeForm.find('input[name="edit_validity"]:checked').val(),
            'valid_from' : editProductCodeForm.find('input[name="edit_valid_from"]').val(),
            'valid_to'   : editProductCodeForm.find('input[name="edit_valid_to"]').val(),
            'status'     : editProductCodeForm.find('input[name="edit_status"]:checked').val()
        };

        $.ajax({
            url      : editProductCodeForm.attr('action'),
            method   : editProductCodeForm.attr('method'),
            data     : requestData,
            dataType : 'json',
            success  : function(response) {
                $('#btn-edit-pcode').removeAttr('disabled').html('UPDATE');
                $('#btn-cancel-editpcode').removeAttr('disabled');

                if (response.status) {
                    $('#editProductCodeModal').modal('hide');

                    editProductCodeForm[0].reset();
                    $('#fg-edit-valid-from').addClass('d-none');
                    $('#fg-edit-valid-to').addClass('d-none');

                    productCodesTable.ajax.reload();

                    // showNotification('', response.message);
                } else {
                    let errors = response.errors;
                    for (let key in errors) {
                        let errorDiv = $('#editProductCodeModal .help-error[data-error="' + key + '"]');
                        if (errorDiv.length) {
                            errorDiv.prev('.form-control').addClass('is-invalid');
                            errorDiv.html('<i class="icon icon-warning"></i> ' + errors[key][0]);
                        }
                    }
                }
            },
            error    : function(e) {
                $('#btn-edit-pcode').removeAttr('disabled').html('UPDATE');
                $('#btn-cancel-editpcode').removeAttr('disabled');
            }
        });
    });
}

$(document).ready(function() {
    initProductCodesTable();
    initForms();
    handleValidityRadioChange();
    handleCancelBtnClick();
    handleAddProductCodes();
    handleEditProductCodeBtnClick();
    handleUpdateProductCode();
});
