// call datatable function on image load which is present in orgpglpd.php file
function dataTablesDis(divId, dataTableCounter, sumColumn, deleteColumn, dtPrintTitle, dtASCDESC, dtSortColumn, dtcolor, exportOptions) {
    //sumColumn = parseInt(sumColumn);
//    alert($_SESSION['color']);
//alert(exportOptions);
    var sortColumnArry = dtSortColumn.split(",");
    var columnArray = sumColumn.split(",");

    divId = '#' + divId;

    if (dtSortColumn == null || dtSortColumn == '') {
        sortColumnArry[0] = '0';
        sortColumnArry[1] = '0';
    }

    if (dtASCDESC == null || dtASCDESC == '') {
        dtASCDESC[0] = 'desc';
        dtASCDESC[1] = 'desc';
    } else {
        dtASCDESC = dtASCDESC.split(",");
    }

//    var sumColumnStr = '';
//    for (var i = 0; i < columnArray.length; i++) {
//        sumColumnStr += 'parseInt(columnArray[' + i + ']),';
//    }
//    sumColumnStr = sumColumnStr.substring(0, sumColumnStr.length - 1);
    //alert(sumColumnStr);
    if (exportOptions != 'N') {
        var table = $(divId).DataTable({
            rowCallback: function (row, data, index) {
                if ((data[4] < 0) && dtcolor == 'color') {
                    $(row).find('td:eq(4)').css('color', 'GREEN');
                }
                if ((data[7] < 0) && dtcolor == 'color') {
                    $(row).find('td:eq(7)').css('color', 'GREEN');
                }
                if ((data[4] > 0 && data[4] != '') && dtcolor == 'color') {
                    $(row).find('td:eq(4)').css('color', 'RED');
                }
                if ((data[7] > 0 && data[7] != '') && dtcolor == 'color') {
                    $(row).find('td:eq(7)').css('color', 'RED');
                }
//    
            },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "include/php/omdatatablesserver.php?dataTableCounter=" + dataTableCounter,
            },
            "lengthMenu": [[16, 10, 20, 30, 40, 50, 100, -1], ["ROWS", 10, 20, 30, 40, 50, 100, "All"]],
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf',
                {
                    extend: 'print',
                    title: dtPrintTitle,
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'colvis',
                    postfixButtons: ['colvisRestore']
                },
                {
                    extend: 'print',
                    text: 'Print selected',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            selected: true,
                        }
                    }
                }
            ],
            columnDefs: [
                {className: "dt-right", "targets": [parseInt(columnArray[0]), parseInt(columnArray[1]), parseInt(columnArray[2]), parseInt(columnArray[3]), parseInt(columnArray[4]), parseInt(columnArray[5])]},
                {className: "dt-right", "targets": [parseInt(deleteColumn)]},
                {targets: [0, 1, 2], visible: true}],
            "order": [[sortColumnArry[0], dtASCDESC[0]], [sortColumnArry[1], dtASCDESC[1]]],
            select: true,
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                            i.replace(/[^0-9\.]+/g, "") * 1 :
                            typeof i === 'number' ?
                            i : 0;
                };


                for (var i = 0; i < columnArray.length; i++) {
                    // Total over all pages
                    total = api
                            .column(columnArray[i])
                            .data()
                            .reduce(function (a, b) {
                                if (b == '' || b == null)
                                    b = 0;
                                return (parseFloat(a) + parseFloat(b)).toFixed(2);
                            }, 0);

                    // Total over this page
                    pageTotal = api
                            .column(columnArray[i], {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                if (b == '' || b == null)
                                    b = 0;
                                return (parseFloat(a) + parseFloat(b)).toFixed(2);
                            }, 0);

                    //$('#example tr:last').after('<tr><td colspan=8>Hi</td></tr>');
                    // Update footer

                    if (Number.isInteger(total)) {
                        if (total <= 0) {
                            total = '<span style="color:green" >' + Math.abs(total) + '.00</span>';
                        } else {
                            total = '<span style="color:red" >' + total + '.00</span>';
                        }
                        $(divId + ' tfoot tr > td').eq(parseInt(columnArray[i]) + 2).html(total);
                    } else {
                        if (total <= 0 && total != 'NaN') {
                            total = total.substring(1);
                            if (total.indexOf(".") > 0)
                                total = '<span style="color:green" >' + total + '</span>';
                            else
                                total = '<span style="color:green" >' + Math.abs(total) + '.00</span>';
                        } else if (total != 'NaN') {
                            if (total.indexOf(".") > 0)
                                total = '<span style="color:red" >' + total + '</span>';
                            else
                                total = '<span style="color:red" >' + Math.abs(total) + '.00</span>';
                        }
                        $(divId + ' tfoot tr > td').eq(parseInt(columnArray[i]) + 2).html(total);
                    }
                }
                //$(api.column(2).footer()).html('<input type="text" style="width:100%;" placeholder="Total: ' + total + '" />');
            }
            // rowReorder: {
            //     selector: 'td:nth-child(2)'
            // },

        }); //close data Table
    } else {
        var table = $(divId).DataTable({
            rowCallback: function (row, data, index) {
                if ((data[4] < 0) && dtcolor == 'color') {
                    $(row).find('td:eq(4)').css('color', 'GREEN');
                }
                if ((data[7] < 0) && dtcolor == 'color') {
                    $(row).find('td:eq(7)').css('color', 'GREEN');
                }
                if ((data[4] > 0 && data[4] != '') && dtcolor == 'color') {
                    $(row).find('td:eq(4)').css('color', 'RED');
                }
                if ((data[7] > 0 && data[7] != '') && dtcolor == 'color') {
                    $(row).find('td:eq(7)').css('color', 'RED');
                }
//    
            },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "include/php/omdatatablesserver.php?dataTableCounter=" + dataTableCounter,
            },
            "lengthMenu": [[16, 10, 20, 30, 40, 50, 100, -1], ["ROWS", 10, 20, 30, 40, 50, 100, "All"]],
            columnDefs: [
                {className: "dt-right", "targets": [parseInt(columnArray[0]), parseInt(columnArray[1]), parseInt(columnArray[2]), parseInt(columnArray[3]), parseInt(columnArray[4]), parseInt(columnArray[5])]},
                {className: "dt-right", "targets": [parseInt(deleteColumn)]},
                {targets: [0, 1, 2], visible: true}],
            "order": [[sortColumnArry[0], dtASCDESC[0]], [sortColumnArry[1], dtASCDESC[1]]],
            select: true,
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                            i.replace(/[^0-9\.]+/g, "") * 1 :
                            typeof i === 'number' ?
                            i : 0;
                };


                for (var i = 0; i < columnArray.length; i++) {
                    // Total over all pages
                    total = api
                            .column(columnArray[i])
                            .data()
                            .reduce(function (a, b) {
                                if (b == '' || b == null)
                                    b = 0;
                                return (parseFloat(a) + parseFloat(b)).toFixed(2);
                            }, 0);

                    // Total over this page
                    pageTotal = api
                            .column(columnArray[i], {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                if (b == '' || b == null)
                                    b = 0;
                                return (parseFloat(a) + parseFloat(b)).toFixed(2);
                            }, 0);

                    //$('#example tr:last').after('<tr><td colspan=8>Hi</td></tr>');
                    // Update footer

                    if (Number.isInteger(total)) {
                        if (total <= 0) {
                            total = '<span style="color:green" >' + Math.abs(total) + '.00</span>';
                        } else {
                            total = '<span style="color:red" >' + total + '.00</span>';
                        }
                        $(divId + ' tfoot tr > td').eq(parseInt(columnArray[i]) + 2).html(total);
                    } else {
                        if (total <= 0 && total != 'NaN') {
                            total = total.substring(1);
                            if (total.indexOf(".") > 0)
                                total = '<span style="color:green" >' + total + '</span>';
                            else
                                total = '<span style="color:green" >' + Math.abs(total) + '.00</span>';
                        } else if (total != 'NaN') {
                            if (total.indexOf(".") > 0)
                                total = '<span style="color:red" >' + total + '</span>';
                            else
                                total = '<span style="color:red" >' + Math.abs(total) + '.00</span>';
                        }
                        $(divId + ' tfoot tr > td').eq(parseInt(columnArray[i]) + 2).html(total);
                    }
                }
                //$(api.column(2).footer()).html('<input type="text" style="width:100%;" placeholder="Total: ' + total + '" />');
            }
            // rowReorder: {
            //     selector: 'td:nth-child(2)'
            // },

        }); //close data Table 
    }
    // Setup - add a text input to each footer cell
    $(divId + ' tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" style="width:100%;" placeholder="Search ' + title + '" />');
    });
    // Apply the search
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value)
                        .draw();
            }
        });
    });
}