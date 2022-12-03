'use strict';

var customersTable;
var editCustomerForm;

function initFormatters() {
    new Cleave('.purchase-code', {
        blocks    : [4, 4, 4, 4],
        delimiter : '-',
        uppercase : true
    });
}

function initCustomersTable() {
    customersTable = $('#tableCustomers').DataTable({
        'ajax'       : {
            'url'     : basePath + '/customers/list',
            'type'    : 'GET',
            'dataSrc' : 'customers'
        },
        'responsive' : true,
        'columns'    : [{
            'data'       : null,
            'title'      : 'No.',
            'width'      : '4%',
            'className'  : 'text-center',
            'orderable'  : false,
            'searchable' : false
        }, {
            'data'      : 'lead_id',
            'title'     : 'Lead ID',
            'className' : 'text-center',
            'render'    : function(data, type, row, meta) {
                var cellData = '';
                if (row.status != null) {
                    cellData = row.lead_id;
                } else {
                    cellData = '-';
                }

                return cellData;
            }
        }, {
            'data'      : 'product_code',
            'title'     : 'Product Code',
            'render'     : function(data, type, row, meta) {
                var cellData = 
                    data.substring(0, 4) + '-' + 
                    data.substring(4, 8) + '-' + 
                    data.substring(8, 12) + '-' + 
                    data.substring(12,16);
                return cellData;
            }
        }, {
            'data'      : 'name',
            'title'     : 'Name'
        }, {
            'data'      : 'mobile_no',
            'title'     : 'Mobile No.',
            'className' : 'text-center'
        }, {
            'data'      : 'email',
            'title'     : 'Email'
        }, {
            'data'      : 'status',
            'title'     : 'Status',
            'render'    : function(data, type, row, meta) {
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
                var cellData = '<button class="btn btn-primary btn-edit-customer" data-cid="' + row.id + '">Edit</button>';
                return cellData;
            }
        }],
        'order'      : [[ 1, 'asc' ]],
        'dom'        : 'Bfrtip',
        'buttons'    : [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
    });

    customersTable.on('order.dt search.dt', function() {
        customersTable
            .column(0, { search:'applied', order:'applied' })
            .nodes()
            .each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
}

function initForms() {
    editCustomerForm = $('form[name="form-mmt-editcustomer"]');
}

function handleCancelBtnClick() {
    $('#btn-cancel-editcustomer').click(function() {
        editCustomerForm[0].reset();
        $('#editCustomerModal').modal('hide');
    });
}

function handleEditCustomerBtnClick() {
    customersTable.on('click', '.btn-edit-customer', function(e) {
        e.preventDefault();

        var customerId = $(this).data('cid');
        var targetRow = $(this).closest('tr');
        var rowData = customersTable.row(targetRow).data();

        $('#edit_customer_id').val(customerId);
        $('#edit_lead_id').val(rowData.lead_id);
        $('#edit_pcode').val(rowData.product_code_id);
        $('#edit_name').val(rowData.name);
        $('#edit_mobile_no').val(rowData.mobile_no);
        $('#edit_email').val(rowData.email);

        $('#editCustomerModal').modal('show');
    });
}

function handleUpdateCustomer() {
    editCustomerForm.on('submit', function(e) {
        e.preventDefault();

        $('#editCustomerModal .form-control').removeClass('is-invalid');
        $('#editCustomerModal .help-page-error').html('');
        $('#editCustomerModal .help-error').html('');
        $('#btn-edit-customer').attr('disabled', 'disabled').text('UPDATING...');
        $('#btn-cancel-editcustomer').attr('disabled', 'disabled');

        var requestData = {
            '_token'       : editCustomerForm.find('input[name="_token"]').val(),
            'id'           : editCustomerForm.find('input[name="edit_customer_id"]').val(),
            'product_code' : editCustomerForm.find('select[name="edit_pcode"]').val()
        };

        $.ajax({
            url      : editCustomerForm.attr('action'),
            method   : editCustomerForm.attr('method'),
            data     : requestData,
            dataType : 'json',
            success  : function(response) {
                $('#btn-edit-customer').removeAttr('disabled').html('UPDATE');
                $('#btn-cancel-editcustomer').removeAttr('disabled');

                if (response.status) {
                    $('#editCustomerModal').modal('hide');

                    editCustomerForm[0].reset();
                    customersTable.ajax.reload();

                    // showNotification('', response.message);
                } else {
                    let errors = response.errors;
                    for (let key in errors) {
                        let errorDiv = $('#editCustomerModal .help-error[data-error="' + key + '"]');
                        if (errorDiv.length) {
                            errorDiv.prev('.form-control').addClass('is-invalid');
                            errorDiv.html('<i class="icon icon-warning"></i> ' + errors[key][0]);
                        }
                    }
                }
            },
            error    : function(e) {
                $('#btn-edit-customer').removeAttr('disabled').html('UPDATE');
                $('#btn-cancel-editcustomer').removeAttr('disabled');
            }
        });
    });
}

$(document).ready(function() {
    initCustomersTable();
    initForms();
    handleCancelBtnClick();
    handleEditCustomerBtnClick();
    handleUpdateCustomer();
});
