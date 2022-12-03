'use strict';

var salesRepsTable;
var addSalesRepForm;
var editSalesRepForm;
var deleteSalesRepForm;

function initSalesRepsTable() {
    salesRepsTable = $('#tableSalesReps').DataTable({
        'ajax'        : {
            'url'     : basePath + '/promo_codes/list',
            'type'    : 'GET',
            'dataSrc' : 'promocodes'
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
            'data'       : 'name',
            'title'      : 'Name',
            'className'  : 'text-center'
        }, {
            'data'       : 'discount',
            'title'      : 'Discount %',
            'className'  : 'text-center'
        }, {
            'data'       : 'role',
            'title'      : 'By Role',
            'render'     : function(data, type, row, meta) {
                var cellData = '';
                if (row.role == 1) {
                    cellData = '<div class="badge badge-danger">Sponser</div>';
                } else if (row.role == 2) {
                    cellData = '<div class="badge badge-success">Influencer</div>';
                } else {
                    cellData = '<div class="badge badge-success">Sales Company</div>';
                }

                return cellData;
            }
        }, {
            'data'       : null,
            'title'      : 'Actions',
            'orderable'  : false,
            'render'     : function(data, type, row, meta) {
                var cellData = '<button class="btn btn-primary btn-edit-salesrep" data-srid="' + row.id + '">Edit</button>';
                return cellData;
            }
        }],
        'order'       : [[ 1, 'asc' ]],
        'dom'         : 'Bfrtip',
        'buttons'     : [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
    });

    salesRepsTable.on('order.dt search.dt', function() {
        salesRepsTable
            .column(0, { search:'applied', order:'applied' })
            .nodes()
            .each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
}

function initForms() {
    addSalesRepForm = $('form[name="form-mmt-addsalesrep"]');
    editSalesRepForm = $('form[name="form-mmt-editsalesrep"]');
    deleteSalesRepForm = $('form[name="form-mmt-deletesalesrep"]');
}

function handleCancelBtnClick() {
    $('#btn-cancel-addsalesrep').click(function() {
        addSalesRepForm[0].reset();
        $('#addSalesRepModal').modal('hide');
    });

    $('#btn-cancel-editsalesrep').click(function() {
        editSalesRepForm[0].reset();
        $('#editSalesRepModal').modal('hide');
    });

    $('#btn-cancel-deletesalesrep').click(function() {
        deleteSalesRepForm[0].reset();
        $('#deleteSalesRepModal').modal('hide');
    });
}

function handleAddSalesRep() {
    addSalesRepForm.on('submit', function(e) {
        e.preventDefault();

        $('#addSalesRepModal .form-control').removeClass('is-invalid');
        $('#addSalesRepModal .help-page-error').html('');
        $('#addSalesRepModal .help-error').html('');
        $('#btn-add-salesrep').attr('disabled', 'disabled').text('SUBMITTING...');
        $('#btn-cancel-addsalesrep').attr('disabled', 'disabled');

        $('#add_name').val(capitalizeWords($('#add_name').val()));

        var requestData = {
            '_token'    : addSalesRepForm.find('input[name="_token"]').val(),
            'name'      : addSalesRepForm.find('input[name="add_name"]').val(),
            'discount' : addSalesRepForm.find('input[name="add_discount"]').val(),
            'byrole'     : addSalesRepForm.find('select[name="add_byrole"]').val(),
        };

        $.ajax({
            url      : addSalesRepForm.attr('action'),
            method   : addSalesRepForm.attr('method'),
            data     : requestData,
            dataType : 'json',
            success  : function(response) {
                $('#btn-add-salesrep').removeAttr('disabled').html('SUBMIT');
                $('#btn-cancel-addsalesrep').removeAttr('disabled');

                if (response.status) {
                    $('#addSalesRepModal').modal('hide');

                    addSalesRepForm[0].reset();
                    salesRepsTable.ajax.reload();

                    // showNotification('', response.message);
                } else {
                    let errors = response.message;
                    for (let key in errors) {
                        let errorDiv = $('#addSalesRepModal .invalid-feedback[data-error="' + key + '"]');
                        if (errorDiv.length) {
                            errorDiv.text(errors[key][0]);
                        }
                    }
                }
            },
            error       : function(e) {
                $('#btn-add-salesrep').removeAttr('disabled').html('SUBMIT');
                $('#btn-cancel-addsalesrep').removeAttr('disabled');

                let errors = e.response.message;
                for (let key in errors) {
                    let errorDiv = $('#addSalesRepModal .invalid-feedback[data-error="' + key + '"]');
                    if (errorDiv.length) {
                        errorDiv.text(errors[key][0]);
                    }
                }
            }
        });
    });
}

function handleEditSalesRepBtnClick() {
    salesRepsTable.on('click', '.btn-edit-salesrep', function(e) {
        e.preventDefault();

        var salesRepId = $(this).data('srid');
        var targetRow = $(this).closest('tr');
        var rowData = salesRepsTable.row(targetRow).data();

        $('#edit_salesrep_id').val(salesRepId);
        $('#edit_name').val(rowData.name);
        $('#edit_mobile_no').val(rowData.discount);
        $('#edit_email').val(rowData.role);
        $('#editSalesRepModal').modal('show');
    });
}

function handleDeleteSalesRepBtnClick() {
    salesRepsTable.on('click', '.btn-delete-salesrep', function(e) {
        e.preventDefault();

        var salesRepId = $(this).data('srid');
        var targetRow = $(this).closest('tr');
        var rowData = salesRepsTable.row(targetRow).data();

        $('#delete_salesrep_id').val(salesRepId);
        $('#deleteSalesRepModal').modal('show');
    });
}

function handleUpdateSalesRep() {
    editSalesRepForm.on('submit', function(e) {
        e.preventDefault();

        $('#editSalesRepModal .form-control').removeClass('is-invalid');
        $('#editSalesRepModal .help-page-error').html('');
        $('#editSalesRepModal .help-error').html('');
        $('#btn-edit-salesrep').attr('disabled', 'disabled').text('UPDATING...');
        $('#btn-cancel-editsalesrep').attr('disabled', 'disabled');

        $('#edit_name').val(capitalizeWords($('#edit_name').val()));

        var requestData = {
            '_token'    : editSalesRepForm.find('input[name="_token"]').val(),
            'id'        : editSalesRepForm.find('input[name="edit_salesrep_id"]').val(),
            'name'      : editSalesRepForm.find('input[name="edit_name"]').val(),
            'discount' : editSalesRepForm.find('input[name="edit_discount"]').val(),
            'byrole'     : editSalesRepForm.find('select[name="edit_byrole"]').val(),
        }
        $.ajax({
            url      : editSalesRepForm.attr('action'),
            method   : editSalesRepForm.attr('method'),
            data     : requestData,
            dataType : 'json',
            success  : function(response) {
                $('#btn-edit-salesrep').removeAttr('disabled').html('UPDATE');
                $('#btn-cancel-editsalesrep').removeAttr('disabled');

                if (response.status) {
                    $('#editSalesRepModal').modal('hide');

                    editSalesRepForm[0].reset();
                    salesRepsTable.ajax.reload();

                    // showNotification('', response.message);
                } else {
                    let errors = response.message;
                    for (let key in errors) {
                        let errorDiv = $('#editSalesRepModal .invalid-feedback[data-error="' + key + '"]');
                        if (errorDiv.length) {
                            errorDiv.text(errors[key][0]);
                        }
                    }
                }
            },
            error       : function(e) {
                $('#btn-edit-salesrep').removeAttr('disabled').html('UPDATE');
                $('#btn-cancel-editsalesrep').removeAttr('disabled');

                let errors = e.response.message;
                for (let key in errors) {
                    let errorDiv = $('#editSalesRepModal .invalid-feedback[data-error="' + key + '"]');
                    if (errorDiv.length) {
                        errorDiv.text(errors[key][0]);
                    }
                }
            }
        });
    });
}

function handleRemoveSalesRep() {
    deleteSalesRepForm.on('submit', function(e) {
        e.preventDefault();

        $('#deleteSalesRepModal .form-control').removeClass('is-invalid');
        $('#deleteSalesRepModal .help-page-error').html('');
        $('#deleteSalesRepModal .help-error').html('');
        $('#btn-delete-salesrep').attr('disabled', 'disabled').text('UPDATING...');
        $('#btn-cancel-deletesalesrep').attr('disabled', 'disabled');


        var requestData = {
            '_token'    : deleteSalesRepForm.find('input[name="_token"]').val(),
            'id'        : deleteSalesRepForm.find('input[name="delete_salesrep_id"]').val(),
        }
        $.ajax({
            url      : deleteSalesRepForm.attr('action'),
            method   : deleteSalesRepForm.attr('method'),
            data     : requestData,
            dataType : 'json',
            success  : function(response) {
                $('#btn-delete-salesrep').removeAttr('disabled').html('UPDATE');
                $('#btn-cancel-deletesalesrep').removeAttr('disabled');

                if (response.status) {
                    $('#deleteSalesRepModal').modal('hide');

                    deleteSalesRepForm[0].reset();
                    salesRepsTable.ajax.reload();

                    // showNotification('', response.message);
                } else {
                    let errors = response.message;
                    for (let key in errors) {
                        let errorDiv = $('#deleteSalesRepModal .invalid-feedback[data-error="' + key + '"]');
                        if (errorDiv.length) {
                            errorDiv.text(errors[key][0]);
                        }
                    }
                }
            },
            error       : function(e) {
                $('#btn-delete-salesrep').removeAttr('disabled').html('UPDATE');
                $('#btn-cancel-deletesalesrep').removeAttr('disabled');

                let errors = e.response.message;
                for (let key in errors) {
                    let errorDiv = $('#deleteSalesRepModal .invalid-feedback[data-error="' + key + '"]');
                    if (errorDiv.length) {
                        errorDiv.text(errors[key][0]);
                    }
                }
            }
        });
    });
}

$(document).ready(function() {
    initSalesRepsTable();
    initForms();
    handleCancelBtnClick();
    handleAddSalesRep();
    handleEditSalesRepBtnClick();
    handleUpdateSalesRep();
    handleDeleteSalesRepBtnClick();
    handleRemoveSalesRep();
});
