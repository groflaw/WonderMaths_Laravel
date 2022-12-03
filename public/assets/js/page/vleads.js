'use strict';

var leadsTable;

function initLeadsTable() {
    leadsTable = $('#tableLeads').DataTable({
        'ajax'        : {
            'url'     : basePath + '/leads/list',
            'type'    : 'GET',
            'dataSrc' : 'leads'
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
            'data'       : null,
            'title'      : 'Source',
            'render'     : function(data, type, row, meta) {
                var cellData = '';
                if (row.source == 1) {
                    cellData = 'Website';
                } else if (row.source == 2) {
                    cellData = 'Mobile App';
                } else if (row.source == 3) {
                    cellData = 'Google';
                } else if (row.source == 4) {
                    cellData = 'Facebook';
                } else if (row.source == 5) {
                    cellData = 'LinkedIn';
                } else if (row.source == 6) {
                    cellData = 'Twitter';
                }

                return cellData;
            }
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
            'data'       : 'created_at',
            'title'      : 'Received On',
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
                if (row.status == 1) {
                    cellData = 'Inactive';
                } else if (row.status == 2) {
                    cellData = 'Active';
                } else if (row.status == 3) {
                    cellData = 'Converted';
                }

                return cellData;
            }
        }],
        'order'     : [[ 1, 'asc' ]],
        'dom'       : 'Bfrtip',
        'buttons'   : [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
    });

    leadsTable.on('order.dt search.dt', function() {
        leadsTable
            .column(0, { search:'applied', order:'applied' })
            .nodes()
            .each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
}

$(document).ready(function() {
    initLeadsTable();
});
