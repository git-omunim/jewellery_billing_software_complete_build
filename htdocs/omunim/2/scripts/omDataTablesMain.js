// call datatable function on image load which is present in orgpglpd.php file
function dataTablesDis(divId, dataTableCounter, sumColumn, deleteColumn, dtPrintTitle, dtASCDESC, dtSortColumn, dtSortColumnName, dtcolor, exportOptions) {
    //sumColumn = parseInt(sumColumn);
//    alert($_SESSION['color']);
//alert(dtPrintTitle);
    var documentRootPath = document.getElementById('documentRootPath').value;
    var sortColumnArry = dtSortColumn.split(",");
    var sortColumnNameArry = dtSortColumnName.split(",");
    var columnArray = sumColumn.split(",");

    divId = '#' + divId;

    if (dtPrintTitle == null || dtPrintTitle == '')
        dtPrintTitle = '_Report';

    if (dtSortColumn == null || dtSortColumn == '') {
        sortColumnArry[0] = '0';
        sortColumnArry[1] = '0';
        sortColumnArry[2] = '0';
    }

    if (dtSortColumnName == null || dtSortColumnName == '') {
        sortColumnNameArry[0] = '0';
        sortColumnNameArry[1] = '0';
        sortColumnNameArry[2] = '0';
    }

    if (dtASCDESC == null || dtASCDESC == '') {
        dtASCDESC[0] = 'desc';
        dtASCDESC[1] = 'desc';
        dtASCDESC[2] = 'desc';
    } else {
        dtASCDESC = dtASCDESC.split(",");
    }

//    var sumColumnStr = '';
//    for (var i = 0; i < columnArray.length; i++) {
//        sumColumnStr += 'parseInt(columnArray[' + i + ']),';
//    }
//    sumColumnStr = sumColumnStr.substring(0, sumColumnStr.length - 1);
    //alert(sumColumnStr);
    if (exportOptions == 'ALLN') {
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
                "url": documentRootPath + "/include/php/omdatatablesserver.php?dataTableCounter=" + dataTableCounter,
            },
            "lengthMenu": [[10000], ["ROWS", 10, 20, 30, 40, 50, 100, "All"]],
            dom: 'rt',
            columnDefs: [
                {className: "dt-right", "targets": [parseInt(columnArray[0]), parseInt(columnArray[1]), parseInt(columnArray[2]), parseInt(columnArray[3]), parseInt(columnArray[4]), parseInt(columnArray[5])]},
                {className: "dt-right", "targets": [parseInt(deleteColumn)]},
                {targets: [0, 1, 2], visible: true}],
            "order": [[sortColumnArry[0], dtASCDESC[0]], [sortColumnArry[1], dtASCDESC[1]]],
            "orderColName": [[sortColumnNameArry[0], dtASCDESC[0]], [sortColumnNameArry[1], dtASCDESC[1]], [sortColumnNameArry[2], dtASCDESC[2]]],
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
                    var footerIndex = columnArray[i];
                    for (var actColIndex = 0; actColIndex < columnArray[i]; actColIndex++) {
                        if (table.column(actColIndex).visible() === false)
                            footerIndex--;
                    }
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
                        $(divId + ' tfoot tr > td').eq(parseInt(footerIndex) + 2).html(total);
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
                        $(divId + ' tfoot tr > td').eq(parseInt(footerIndex)).html(total);
                    }
                }
                //$(api.column(2).footer()).html('<input type="text" style="width:100%;" placeholder="Total: ' + total + '" />');
            }
            // rowReorder: {
            //     selector: 'td:nth-child(2)'
            // },

        }); //close data Table
    } else if (exportOptions == 'N') {
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
                "url": documentRootPath + "/include/php/omdatatablesserver.php?dataTableCounter=" + dataTableCounter,
            },
            "lengthMenu": [[16, 10, 20, 30, 40, 50, 100, -1], ["ROWS", 10, 20, 30, 40, 50, 100, "All"]],
            columnDefs: [
                {className: "dt-right", "targets": [parseInt(columnArray[0]), parseInt(columnArray[1]), parseInt(columnArray[2]), parseInt(columnArray[3]), parseInt(columnArray[4]), parseInt(columnArray[5])]},
                {className: "dt-right", "targets": [parseInt(deleteColumn)]},
                {targets: [0, 1, 2], visible: true}],
            "order": [[sortColumnArry[0], dtASCDESC[0]], [sortColumnArry[1], dtASCDESC[1]]],
            "orderColName": [[sortColumnNameArry[0], dtASCDESC[0]], [sortColumnNameArry[1], dtASCDESC[1]], [sortColumnNameArry[2], dtASCDESC[2]]],
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
                    var footerIndex = columnArray[i];
                    for (var actColIndex = 0; actColIndex < columnArray[i]; actColIndex++) {
                        if (table.column(actColIndex).visible() === false)
                            footerIndex--;
                    }
                    //
                    total = api
                            .column(columnArray[i])
                            .data()
                            .reduce(function (a, b) {
                                if (b == '' || b == null)
                                    b = 0;
                                return (parseFloat(a) + parseFloat(b)).toFixed(3);
                            }, 0);

                    // Total over this page
                    pageTotal = api
                            .column(columnArray[i], {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                if (b == '' || b == null)
                                    b = 0;
                                return (parseFloat(a) + parseFloat(b)).toFixed(3);
                            }, 0);

                    //$('#example tr:last').after('<tr><td colspan=8>Hi</td></tr>');
                    // Update footer

                    if (Number.isInteger(total)) {
                        if (total <= 0) {
                            total = '<span style="color:green" >' + Math.abs(total) + '.00</span>';
                        } else {
                            total = '<span style="color:red" >' + total + '.00</span>';
                        }
                        $(divId + ' tfoot tr > td').eq(parseInt(footerIndex) + 2).html(total);
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
                        $(divId + ' tfoot tr > td').eq(parseInt(footerIndex) + 2).html(total);
                    }
                }
                //$(api.column(2).footer()).html('<input type="text" style="width:100%;" placeholder="Total: ' + total + '" />');
            }
            // rowReorder: {
            //     selector: 'td:nth-child(2)'
            // },

        }); //close data Table 
    } else {
        //alert(documentRootPath);
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
                "url": documentRootPath + "/include/php/omdatatablesserver.php?dataTableCounter=" + dataTableCounter,
            },
            "lengthMenu": [[16, 10, 20, 30, 40, 50, 100, -1], ["ROWS", 10, 20, 30, 40, 50, 100, "All"]],
            dom: 'lBfrtip',
            buttons: [
                'copy',
                {
                    extend: 'csv',
                    text: 'Csv',
                    title: 'Csv' + dtPrintTitle,
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'current'
                        }
                    },
                    footer: true
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    title: 'Excel' + dtPrintTitle,
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'current'
                        }
                    },
                    footer: true
                },
                {
    text: 'JSON',
    action: function (e, dt, node, config) {
        // Function to extract text content from HTML
        function extractText(html) {
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;
            return tempDiv.innerText || tempDiv.textContent || ''; // Extract text
        }

        // Get the column headers from the DataTable (only visible columns)
        var visibleColumns = dt.columns({filter: 'applied'}).header().toArray().map(function (header) {
            return header.textContent || header.innerText;
        });

        // Get the data from the DataTable (only the data that is currently displayed)
        var rawData = dt.rows({ filter: 'applied', page: 'current' }).nodes().toArray();

        // Map each row to an object with column headers as keys, extracting text content
        var cleanedData = rawData.map(function (row) {
            var rowData = {};
            $(row).find('td').each(function (index, cell) {
                var cellHtml = cell.innerHTML;
                // Check if the column is visible
                var columnIdx = dt.cell(cell).index().column;
                if (dt.column(columnIdx).visible()) {
                    // Use extractText to get only the plain text
                    rowData[visibleColumns[columnIdx]] = extractText(cellHtml);
                }
            });
            return rowData;
        });

        // Convert cleaned data to JSON format
        var jsonData = JSON.stringify(cleanedData, null, 2); // Pretty-print with 2-space indent

        // Create a blob with the JSON data
        var blob = new Blob([jsonData], { type: 'application/json' });

        // Create a link element for downloading
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'data.json';

        // Append the link to the body and trigger a click
        document.body.appendChild(a);
        a.click();

        // Clean up
        document.body.removeChild(a);
        URL.revokeObjectURL(url); // Optional: release memory
    }
}
,
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'TABLOID',
                    text: 'Pdf',
                    title: 'Jewellery' + dtPrintTitle,
                    customize: function (doc) {
                        //find paths of all images, already in base64 format
                        var arr2 = $('.img-fluid').map(function () {
                            return this.src;
                        }).get();

                        for (var i = 0, c = 1; i < arr2.length; i++, c++) {
                            doc.content[1].table.body[c][6] = {
                                image: arr2[i],
                                width: 60
                            };
                        }
                    },
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'current'
                        }
                    },
                    footer: true
                },
                {
                    extend: 'print',
                    title: 'Print' + dtPrintTitle,
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'current'
                        }
                    },
                    footer: true
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
                {className: "dt-right", "targets": [parseInt(columnArray[0]), parseInt(columnArray[1]), parseInt(columnArray[2]), parseInt(columnArray[3]), parseInt(columnArray[4]), parseInt(columnArray[5]), parseInt(columnArray[6]), parseInt(columnArray[7]), parseInt(columnArray[8]), parseInt(columnArray[9]), parseInt(columnArray[10]), parseInt(columnArray[11]), parseInt(columnArray[12]), parseInt(columnArray[13])]},
                {className: "dt-right", "targets": [parseInt(deleteColumn)]},
                {targets: [0, 1, 2], visible: true}],
            "order": [[sortColumnArry[0], dtASCDESC[0]], [sortColumnArry[1], dtASCDESC[1]]],
            "orderColName": [[sortColumnNameArry[0], dtASCDESC[0]], [sortColumnNameArry[1], dtASCDESC[1]], [sortColumnNameArry[2], dtASCDESC[2]]],
            select: true,
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                //alert(columnArray.length);
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                            i.replace(/[^0-9\.]+/g, "") * 1 :
                            typeof i === 'number' ?
                            i : 0;
                };

                //alert('int:' + intVal + ' i:' + i);
                for (var i = 0; i < columnArray.length; i++) {
                    // Total over all pages
                    var footerIndex = columnArray[i];
                    for (var actColIndex = 0; actColIndex < columnArray[i]; actColIndex++) {
                        if (table.column(actColIndex).visible() === false)
                            footerIndex--;
                    }
                    total = api
                            .column(columnArray[i])
                            .data()
                            .reduce(function (a, b) {
                                //if (i == 0)
                                //alert('a:' + a + ' i:' + i + ' columnArray:' + columnArray[i]);
                                if (b == '' || b == null)
                                    b = 0;
                                return (parseFloat(a) + parseFloat(b)).toFixed(3);
                            }, 0);

                    // Total over this page
                    pageTotal = api
                            .column(columnArray[i], {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                if (b == '' || b == null)
                                    b = 0;
                                return (parseFloat(a) + parseFloat(b)).toFixed(3);
                            }, 0);

                    //$('#example tr:last').after('<tr><td colspan=8>Hi</td></tr>');
                    // Update footer

                    if (Number.isInteger(total)) {
                        if (total <= 0) {
                            total = '<span style="color:green" >' + Math.abs(total) + '.00</span>';
                        } else {
                            total = '<span style="color:red" >' + total + '.00</span>';
                        }
                        $(divId + ' tfoot tr > td').eq(parseInt(footerIndex)).html(total);
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
                        } else if (total == 'NaN') {
                            total = '';
                        }
                        $(divId + ' tfoot tr > td').eq(parseInt(footerIndex)).html(total);
                    }
                    //$(divId + ' tfoot tr:eq(3) th').html(total);
                    //$(api.column(i).footer(3)).html(total);
                }
            }
            // rowReorder: {
            //     selector: 'td:nth-child(2)'
            // },

        }); //close data Table
    }
    // Setup - add a text input to each footer cell
    //$(divId + ' thead tr').clone(true).appendTo(divId + ' thead');

    $(divId + ' thead tr:eq(0) th').each(function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" style="width:100%;" placeholder="Search ' + title + '" />');

        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table.column(i).search(this.value).draw();
            }
        });
    });
}