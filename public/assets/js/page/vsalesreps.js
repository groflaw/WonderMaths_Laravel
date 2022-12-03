'use strict';

var salesRepsTable;
var addSalesRepForm;
var editSalesRepForm;

function initSalesRepsTable() {
    salesRepsTable = $('#tableSalesReps').DataTable({
        'ajax'        : {
            'url'     : basePath + '/salesreps/list',
            'type'    : 'GET',
            'dataSrc' : 'salesreps'
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
            'title'      : 'Name'
        }, {
            'data'       : 'mobile_no',
            'title'      : 'Mobile No',
            'className'  : 'text-center'
        }, {
            'data'       : 'email',
            'title'      : 'Email'
        }, {
            'data'       : 'location',
            'title'      : 'Location'
        }, {
            'data'       : null,
            'title'      : 'Sales',
            'className'  : 'text-center',
            'orderable'  : false,
            'render'     : function(data, type, row, meta) {
                return '0/0';
            }
        }, {
            'data'       : 'status',
            'title'      : 'Status',
            'render'     : function(data, type, row, meta) {
                var cellData = '';
                if (row.status == 0) {
                    cellData = '<div class="badge badge-danger">Inactive</div>';
                } else if (row.status == 1) {
                    cellData = '<div class="badge badge-success">Active</div>';
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
            'mobile_no' : addSalesRepForm.find('input[name="add_mobile_no"]').val(),
            'email'     : addSalesRepForm.find('input[name="add_email"]').val(),
            'location'  : addSalesRepForm.find('input[name="add_location"]').val()
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
        $('#edit_mobile_no').val(rowData.mobile_no);
        $('#edit_email').val(rowData.email);
        $('#edit_location').val(rowData.location);

        if (rowData.status == 0) {
            $('#edit_status2').prop('checked', true);
        } else if (rowData.status == 1) {
            $('#edit_status1').prop('checked', true);
        }

        $('#editSalesRepModal').modal('show');
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
            'mobile_no' : editSalesRepForm.find('input[name="edit_mobile_no"]').val(),
            'email'     : editSalesRepForm.find('input[name="edit_email"]').val(),
            'location'  : editSalesRepForm.find('input[name="edit_location"]').val(),
            'status'    : editSalesRepForm.find('input[name="edit_status"]:checked').val()
        };

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

$(document).ready(function() {
    initSalesRepsTable();
    initForms();
    handleCancelBtnClick();
    handleAddSalesRep();
    handleEditSalesRepBtnClick();
    handleUpdateSalesRep();
});
