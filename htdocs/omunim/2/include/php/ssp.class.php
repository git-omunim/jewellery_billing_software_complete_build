<?php

/*
 * Helper functions for building a DataTables server-side processing SQL query
 *
 * The static functions in this class are just helper functions to help build
 * the SQL used in the DataTables demo server-side processing scripts. These
 * functions obviously do not represent all that can be done with server-side
 * processing, they are intentionally simple to show how it works. More complex
 * server-side processing operations will likely require a custom script.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

// REMOVE THIS BLOCK - used for DataTables test environment only!
//$file = $_SERVER['DOCUMENT_ROOT'].'/datatables/mysql.php';
//if ( is_file( $file ) ) {
//	include( $file );
//}
//
//
class SSP {

    /**
     * Create the data output array for the DataTables rows
     *
     *  @param  array $columns Column information array
     *  @param  array $data    Data from the SQL get
     *  @return array          Formatted data in a row based format
     */
    static function data_output($columns, $data) {
        $out = array();

        for ($i = 0, $ien = count($data); $i < $ien; $i++) {
            $row = array();

            for ($j = 0, $jen = count($columns); $j < $jen; $j++) {
                $column = $columns[$j];

                // Is there a formatter?
                if (isset($column['formatter'])) {
                    $row[$column['dt']] = $column['formatter']($data[$i][$column['db']], $data[$i]);
                } else {
                    $row[$column['dt']] = $data[$i][$columns[$j]['db']];
                }
//                $readWritefile = fopen("ompprdwr.php", "a");
//                fwrite($readWritefile, "\n\n" . $row[$column['dt']]);
//                fclose($readWritefile);
            }

            $out[] = $row;
        }

        return $out;
    }

    /**
     * Database connection
     *
     * Obtain an PHP PDO connection from a connection details array
     *
     *  @param  array $conn SQL connection details. The array should have
     *    the following properties
     *     * host - host name
     *     * db   - database name
     *     * user - user name
     *     * pass - user password
     *  @return resource PDO connection
     */
    static function db($conn) {
        if (is_array($conn)) {
            return self::sql_connect($conn);
        }

        return $conn;
    }

    /**
     * Paging
     *
     * Construct the LIMIT clause for server-side processing SQL query
     *
     *  @param  array $request Data sent to server by DataTables
     *  @param  array $columns Column information array
     *  @return string SQL limit clause
     */
    static function limit($request, $columns) {
        $limit = '';

        if (isset($request['start']) && $request['length'] != -1) {
            $limit = "LIMIT " . intval($request['start']) . ", " . intval($request['length']);
        }

        return $limit;
    }

    /**
     * Ordering
     *
     * Construct the ORDER BY clause for server-side processing SQL query
     *
     *  @param  array $request Data sent to server by DataTables
     *  @param  array $columns Column information array
     *  @return string SQL order by clause
     */
    static function order($request, $columns, $primaryKey) {
        $order = '';
        $orderNullCheck = 'Y';
        //
        // 
//        $readWritefile = fopen("ompprdwr.php", "a");
//        fwrite($readWritefile, "\n count:" . count($request['order']) . "\n order:" . print_r($request, TRUE));
//        fclose($readWritefile);
        if (count($request['orderColName']) > 0 && count($request['order']) != 1) {
            //
            $orderColNameArr = explode(',', $request['orderColName']);
            $orderColNameASCDESCArr = explode(',', $request['orderColNameASCDESC']);
            //
            for ($i = 0; $i < count($orderColNameArr); $i++) {

                $dir = $orderColNameASCDESCArr[$i] === 'asc' ?
                        'ASC' :
                        'DESC';

                $orderBy[] = '`' . $orderColNameArr[$i] . '` ' . $dir;
                $orderNullCheck = 'N';
            }

            $order = 'ORDER BY ' . implode(', ', $orderBy);
            //
//            $readWritefile = fopen("ompprdwr.php", "a");
//            fwrite($readWritefile, "\n order:" . $order . "\n order:" . print_r($request, TRUE));
//            fclose($readWritefile);
        } else {
            if (isset($request['order']) && count($request['order'])) {
                $orderBy = array();
                $dtColumns = self::pluck($columns, 'dt');

                for ($i = 0, $ien = count($request['order']); $i < $ien; $i++) {
                    // Convert the column index into the column data property
                    $columnIdx = intval($request['order'][$i]['column']);
                    $requestColumn = $request['columns'][$columnIdx];
                    //
                    $columnIdx = array_search($requestColumn['data'], $dtColumns);
                    $column = $columns[$columnIdx];
                    //    
                    if ($requestColumn['orderable'] == 'true' && $columnIdx != 0) {
                        $dir = $request['order'][$i]['dir'] === 'asc' ?
                                'ASC' :
                                'DESC';

                        $orderBy[] = '`' . $column['db'] . '` ' . $dir;
                        $orderNullCheck = 'N';
                        //
                    } else if ($orderNullCheck == 'Y') {
                        $dir = $request['order'][$i]['dir'] === 'asc' ?
                                'ASC' :
                                'DESC';
                        $orderBy[] .= $primaryKey . ' ' . $dir . ' ';
                        break;
                    }
                }

                $order = 'ORDER BY ' . implode(', ', $orderBy);
            }
        }

        return $order;
    }

    /**
     * Searching / Filtering
     *
     * Construct the WHERE clause for server-side processing SQL query.
     *
     * NOTE this does not match the built-in DataTables filtering which does it
     * word by word on any field. It's possible to do here performance on large
     * databases would be very poor
     *
     *  @param  array $request Data sent to server by DataTables
     *  @param  array $columns Column information array
     *  @param  array $bindings Array of values for PDO bindings, used in the
     *    sql_exec() function
     *  @return string SQL where clause
     */
    static function filter($request, $columns, &$bindings) {
        $globalSearch = array();
        $columnSearch = array();
        $dtColumns = self::pluck($columns, 'dt');

        if (isset($request['search']) && $request['search']['value'] != '') {
            $str = $request['search']['value'];

            for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
                $requestColumn = $request['columns'][$i];
                $columnIdx = array_search($requestColumn['data'], $dtColumns);
                $column = $columns[$columnIdx];

                if ($requestColumn['searchable'] == 'true') {
                    $binding = self::bind($bindings, '%' . $str . '%', PDO::PARAM_STR);
                    //
//                    $readWritefile = fopen("ompprdwr.php", "a");
//                    fwrite($readWritefile, "\n str0:" . $str);
//                    fclose($readWritefile);
                    //
                    if (strpos($str, ',') !== false) {
                        $srchStr = str_replace(",", "|^", $str);
                        $globalSearch[] = $column['db'] . " REGEXP '" . $srchStr . "'";
                    } else {
                        $globalSearch[] = $column['db'] . " LIKE " . $binding;
                    }
                }
            }
        }

        // Individual column filtering
        if (isset($request['columns'])) {
            for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
                $requestColumn = $request['columns'][$i];
                $columnIdx = array_search($requestColumn['data'], $dtColumns);
                $column = $columns[$columnIdx];

                $str = $requestColumn['search']['value'];

//                $readWritefile = fopen("ompprdwr.php", "a");
//                fwrite($readWritefile, "\n" . $requestColumn);
//                fclose($readWritefile);
//        
//                foreach ($str as $key => $value) {
//                    $columnName = $value['db'];
//                    if (stripos($columnName, '|')) {
//                        $value['db'] = $columnName . " as \"" . $columnName . "\"";
//                        $columnsForMysql[$key]['db'] = $value['db'];
//                        $columnSearch[] = $column['db'] . " > " . $binding;
//                    }
//                }

                if ($requestColumn['searchable'] == 'true' &&
                        $str != '') {
                    if (stripos($str, '|')) {
                        $strStart = substr($str, 0, stripos($str, '|'));
                        $endStart = substr($str, stripos($str, '|') + 1);
                        //
                        $binding = self::bind($bindings, $strStart, PDO::PARAM_STR);
                        $columnSearch[] = $column['db'] . ">=" . $binding;
                        //
                        if ($endStart != null && $endStart != '') {
                            $binding = self::bind($bindings, $endStart, PDO::PARAM_STR);
                            $columnSearch[] = $column['db'] . "<=" . $binding;
                        }
                        //
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\n" . $endStart);
//                        fclose($readWritefile);
                    } else {
                        $searchColumn = $column['db'];
                        //
                        if (strpos($column['db'], 'FORMAT(SUM(') !== false) {
                            $searchColumn = str_replace('FORMAT(SUM(', '', $searchColumn);
                            $searchColumn = str_replace('),3)', '', $searchColumn);
                        }
                        //
                        $binding = self::bind($bindings, $str . '%', PDO::PARAM_STR);
                        //
                        if (strpos($searchColumn, 'SUM') !== false) {
                            //
                            if (strpos($str, ',') !== false) {
                                $srchStr = str_replace(",", "|^", $str);
                                $columnSearch[] = '\'' . $searchColumn . '\'' . " REGEXP '" . $srchStr . "'";
                            } else {
                                $columnSearch[] = '\'' . $searchColumn . '\'' . " LIKE " . $binding;
                            }
                        } else {
//                            
//                            $readWritefile = fopen("ompprdwr.php", "a");
//                            fwrite($readWritefile, "\n str12:" . $binding);
//                            fclose($readWritefile);
//                            
                            if (strpos($str, ',') !== false) {
                                $srchStr = str_replace(",", "|^", $str);
                                $columnSearch[] = $searchColumn . " REGEXP '" . $srchStr . "'";
                            } else {
                                $columnSearch[] = $searchColumn . " LIKE " . $binding;
                            }
                        }
                    }
                }
            }
        }

        // Combine the filters into a single string
        $where = '';

        if (count($globalSearch)) {
            $where = '(' . implode(' OR ', $globalSearch) . ')';
        }

        if (count($columnSearch)) {
            $where = $where === '' ?
                    implode(' AND ', $columnSearch) :
                    $where . ' AND ' . implode(' AND ', $columnSearch);
        }

//        $readWritefile = fopen("ompprdwr.php", "a");
//        fwrite($readWritefile, "\n where" . $where);
//        fclose($readWritefile);

        if ($where !== '') {
//            if (strpos($innerJoinCondition, 'HAVING') != FALSE) {
//                $where = ' AND ' . $where;
//            } else {
            $where = 'WHERE ' . $where;
//            }
        }

//        $readWritefile = fopen("ompprdwr.php", "a");
//        fwrite($readWritefile, "\n" . $where);
//        fclose($readWritefile);
        return $where;
    }

    /**
     * Perform the SQL queries needed for an server-side processing requested,
     * utilising the helper functions of this class, limit(), order() and
     * filter() among others. The returned array is ready to be encoded as JSON
     * in response to an SSP request, or can be modified if needed before
     * sending back to the client.
     *
     *  @param  array $request Data sent to server by DataTables
     *  @param  array|PDO $conn PDO connection resource or connection parameters array
     *  @param  string $table SQL table to query
     *  @param  string $primaryKey Primary key of the table
     *  @param  array $columns Column information array
     *  @return array          Server-side processing response array
     */
    static function simple($request, $conn, $table, $primaryKey, $columns, $whereCondition = '', $innerJoinCondition = '', $groupByCondition = '', $hrefLink = '', $hrefLinkColumnName = '', $hrefLinkColumnNamePara = '', $hrefLinkColumnNamePara2 = '', $sqlQueryColumns = '', $colorfulColumn = '', $colorfulColumnCheck = '', $colorfulColumnTitle = '', $colorfulColumn1 = '', $colorfulColumnCheck1 = '', $colorfulColumnTitle1 = '', $colorfulColumn2 = '', $colorfulColumnCheck2 = '', $colorfulColumnTitle2 = '', $colorfulColumn3 = '', $colorfulColumnCheck3 = '', $colorfulColumnTitle3 = '', $colorfulColumnCheck3Value = '', $colorfulColumnCheck3Value1 = '', $colorfulColumnCheck3Value2 = '', $colorfulColumn4 = '', $colorfulColumn41 = '', $colorfulColumn42 = '', $colorfulColumn43 = '', $colorfulColumnCheck4 = '', $colorfulColumnTitle4 = '', $colorfulColumnCheck4Value = '', $colorfulColumnCheck4Value1 = '', $colorfulColumnCheck4Value2 = '', $onclickColumnFuncImage = '', $onclickColumnFunc = '', $onclickColumnIdFunc = '', $onclickColumnValueFunc = '', $onclickColumnFunctionFunc = '', $onclickColumnFunctionPara1Func = '', $onclickColumnFunctionPara2Func = '', $onclickColumnFunctionPara3Func = '', $onclickColumnFunctionPara4Func = '', $onclickColumnFunctionPara5Func = '', $onclickColumnFunctionPara6Func = '', $onclickColumnFunctionPara7Func = '', $onclickColumnFunctionPara8Func = '', $onclickColumnFunctionPara9Func = '', $onclickColumnFunctionPara10Func = '', $onclickColumnFunctionPara11Func = '', $onclickColumnFunctionPara12Func = '', $onclickColumnFunctionPara13Func = '', $onclickColumnFuncImageTwo = '', $onclickColumnFuncTwo = '', $onclickColumnIdFuncTwo = '', $onclickColumnValueFuncTwo = '', $onclickColumnFunctionTwoFunc = '', $onclickColumnFunctionTwoPara1Func = '', $onclickColumnFunctionTwoPara2Func = '', $onclickColumnFunctionTwoPara3Func = '', $onclickColumnFunctionTwoPara4Func = '', $onclickColumnFunctionTwoPara5Func = '', $onclickColumnFunctionTwoPara6Func = '', $onclickColumnFunctionTwoPara7Func = '', $onclickColumnFunctionTwoPara8Func = '', $onclickColumnFunctionTwoPara9Func = '', $onclickColumnFunctionTwoPara10Func = '', $onclickColumnFunctionTwoPara11Func = '', $onclickColumnFunctionTwoPara12Func = '', $onclickColumnFunctionTwoPara13Func = '', $onclickColumnFuncImageThr = '', $onclickColumnFuncThr = '', $onclickColumnIdFuncThr = '', $onclickColumnValueFuncThr = '', $onclickColumnFunctionThrFunc = '', $onclickColumnFunctionThrPara1Func = '', $onclickColumnFunctionThrPara2Func = '', $onclickColumnFunctionThrPara3Func = '', $onclickColumnFunctionThrPara4Func = '', $onclickColumnFunctionThrPara5Func = '', $onclickColumnFunctionThrPara6Func = '', $onclickColumnFunctionThrPara7Func = '', $onclickColumnFunctionThrPara8Func = '', $onclickColumnFunctionThrPara9Func = '', $onclickColumnFunctionThrPara10Func = '', $onclickColumnFunctionThrPara11Func = '', $onclickColumnFunctionThrPara12Func = '', $onclickColumnFunctionThrPara13Func = '', $onclickColumnFuncImageFour = '', $onclickColumnFuncFour = '', $onclickColumnIdFuncFour = '', $onclickColumnValueFuncFour = '', $onclickColumnFunctionFourFunc = '', $onclickColumnFunctionFourPara1Func = '', $onclickColumnFunctionFourPara2Func = '', $onclickColumnFunctionFourPara3Func = '', $onclickColumnFunctionFourPara4Func = '', $onclickColumnFunctionFourPara5Func = '', $onclickColumnFunctionFourPara6Func = '', $onclickColumnFunctionFourPara7Func = '', $onclickColumnFunctionFourPara8Func = '', $onclickColumnFunctionFourPara9Func = '', $onclickColumnFunctionFourPara10Func = '', $onclickColumnFunctionFourPara11Func = '', $onclickColumnFunctionFourPara12Func = '', $onclickColumnFunctionFourPara13Func = '', $onprintColumnFuncImage = '', $onprintColumnFunc = '', $onprintColumnIdFunc = '', $onprintColumnValueFunc = '', $onprintColumnFunctionFunc = '', $onprintColumnFunctionPara1Func = '', $onprintColumnFunctionPara2Func = '', $onprintColumnFunctionPara3Func = '', $onprintColumnFunctionPara4Func = '', $onprintColumnFunctionPara5Func = '', $onprintColumnFunctionPara6Func = '', $deleteColumnFunc = '', $deleteColumnIdFunc = '', $deleteColumnValueFunc = '', $deleteColumnFunctionFunc = '', $deleteColumnFunctionPara1Func = '', $deleteColumnFunctionPara2Func = '', $deleteColumnFunctionPara3Func = '', $deleteColumnFunctionPara4Func = '', $deleteColumnFunctionPara5Func = '', $deleteColumnFunctionPara6Func = '', $deleteColumnFunctionPara7Func = '', $deleteColumnFunctionPara8Func = '', $deleteColumnFunctionPara9Func = '', $popupFunctionLink = '', $popupColumnFunc = '', $popupFunctionWidth = '', $popupFunctionHeight = '', $popupFunctionPara1 = '', $popupFunctionPara2 = '', $popupFunctionPara3 = '', $popupFunctionPara4 = '', $popupFunctionPara5 = '', $popupFunctionPara6 = '', $popupFunctionPara7 = '', $popupFunctionPara8 = '', $documentRootBSlash = '', $mainPanelName = '') {

        $bindings = array();
        $db = self::db($conn);

        if ($sqlQueryColumns != '') {
            //
            $sqlQueryColumnsRtrim = rtrim($sqlQueryColumns, ",");
            $sqlQueryColumnsArray = explode(',', $sqlQueryColumnsRtrim);

            $sqlQueryColumnsMultiArr = array();
            $countColumns = count($columns);
            foreach ($sqlQueryColumnsArray as $arr) {
                if (trim($arr) != '') {
                    $arr = 'db-' . $arr;
                    $chunk = explode('-', $arr);
                    $sqlQueryColumnsMultiArr[$countColumns][$chunk[0]] = $chunk[1];

                    $arr2 = 'dt-' . $countColumns;
                    $chunk2 = explode('-', $arr2);
                    $sqlQueryColumnsMultiArr[$countColumns][$chunk2[0]] = $chunk2[1];

                    $countColumns++;
                }
            }
            //
            $columnsForMysql = array_merge($columns, $sqlQueryColumnsMultiArr);
            //
//            $readWritefile = fopen("ompprdwr.php", "a");
//            fwrite($readWritefile, "\n columnsForMysql: " . $sqlQueryColumns . '  =   ' . print_r($columnsForMysql, TRUE));
//            fclose($readWritefile);
            //
        } else {
            $columnsForMysql = $columns;
        }
//        
//        $columnNameCounter = 1;
        foreach ($columnsForMysql as $key => $value) {
            $columnName = $value['db'];
            if (stripos($columnName, ' as ')) {
                //$value['db'] = $columnName . " as \"" . $columnName . "\"";
                $columnsForMysql[$key]['db'] = $value['db'];
            } else {
//                if (stripos($columnName, 'SELECT')) {
//                    $value['db'] = $columnName;
//                    $columnsForMysql[$key]['db'] = $value['db'];
//                    $columnNameCounter++;
//                }
//                else 
                if (stripos($columnName, '.')) {
                    $value['db'] = $columnName . " as \"" . $columnName . "\"";
                    $columnsForMysql[$key]['db'] = $value['db'];
                }
            }
        }
        // Build the SQL query string from the request
        $limit = self::limit($request, $columns);
        $order = self::order($request, $columns, $primaryKey);
        $where = self::filter($request, $columns, $bindings);
        //
        //
        //    
        if ($whereCondition) {
            if ($where) {
                $where .= ' AND ' . $whereCondition;
            } else {
                $where .= 'WHERE ' . $whereCondition;
            }
        }
        //
        $innerJoinCondition = trim($innerJoinCondition);
        $where = trim($where);
        $groupByCondition = trim($groupByCondition);
        $order = trim($order);
        $limit = trim($limit);
        //
        $sqlQuery = "SELECT $sqlQueryColumns" . implode(", ", self::pluck($columnsForMysql, 'db')) .
                " FROM (select @sno:=0) s_no,$table " .
                " $innerJoinCondition " .
                " $where " .
                " $groupByCondition " .
                " $order " .
                " $limit";
        //
        //
//        $readWritefile = fopen("ompprdwr.php", "a");
//        fwrite($readWritefile, "\n" . $sqlQuery);
//        fclose($readWritefile);
        //
        //
        //$readWritefile = fopen("ompprdwr.php", "a");
        //fwrite($readWritefile, "\n" . $mainPanelName);
        //fclose($readWritefile);
        //
        // Main query to actually get the data
        //
        try {
            $data = self::sql_exec($db, $bindings, $sqlQuery);

            if ($onclickColumnFunc != NULL || $deleteColumnFunc != NULL || $onprintColumnFunc != NULL) {
//                echo '$deleteColumnFunctionPara2Func='.$deleteColumnFunctionPara2Func;
//                exit();
                //
                foreach ($data as $key => $value) {
                    //
                    if ($value[$colorfulColumnCheck] == 'checked') {
                        $strike = 'strike_line';
                    } else {
                        $strike = '';
                    }
                    //
                    if ($hrefLink != NULL) {
                        $hrefLink .= '&' . "$hrefLinkColumnNamePara=$value[$hrefLinkColumnNamePara]" . '&' . "$hrefLinkColumnNamePara2=$value[$hrefLinkColumnNamePara2]";
                        $data[$key][$hrefLinkColumnName] = "<a" .
                                " href='$hrefLink' target='_blank' "
                                . " class='amount_orange_12'>" .
                                $value[$hrefLinkColumnName] . "</a>";
                    }
                    //
                    //
                    if ($colorfulColumn != NULL) {
                        if ($value[$colorfulColumnCheck] == 12 || $value[$colorfulColumn] < 0) {
                            $data[$key][$colorfulColumn] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_green_12 right $strike'>" .
                                    $value[$colorfulColumn] . "</div>";
                        } else if ($value[$colorfulColumnCheck] == 11) {
                            $data[$key][$colorfulColumn] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_orange_12 right $strike'>" .
                                    $value[$colorfulColumn] . "</div>";
                        } else if ($value[$colorfulColumnCheck] == 10 || $value[$colorfulColumn] > 0 || $value[$colorfulColumnCheck] == 'OUT') {
                            $data[$key][$colorfulColumn] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_red_12 right $strike'>" .
                                    $value[$colorfulColumn] . "</div>";
                        } else {
                            $data[$key][$colorfulColumn] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_12 right $strike'>" .
                                    $value[$colorfulColumn] . "</div>";
                        }
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\n" . $value[$colorfulColumnCheck]);
//                        fclose($readWritefile);
                    }
                    //
                    //
                    //
                    if ($value[$colorfulColumnCheck1] == 'checked') {
                        $strike1 = 'strike_line';
                    } else {
                        $strike1 = '';
                    }
                    //
                    if ($colorfulColumn1 != NULL) {
                        if ($value[$colorfulColumnCheck1] == 12 || $value[$colorfulColumn1] < 0) {
                            $data[$key][$colorfulColumn1] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_green_12 right $strike1'>" .
                                    substr($value[$colorfulColumn1], 1) . "</div>";
                        } else if ($value[$colorfulColumnCheck1] == 11) {
                            $data[$key][$colorfulColumn1] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_orange_12 right $strike1'>" .
                                    $value[$colorfulColumn1] . "</div>";
                        } else if ($value[$colorfulColumnCheck1] == 10 || $value[$colorfulColumn1] > 0 || $value[$colorfulColumnCheck1] == 'OUT') {
                            $data[$key][$colorfulColumn1] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_red_12 right $strike1'>" .
                                    $value[$colorfulColumn1] . "</div>";
                        } else {
                            $data[$key][$colorfulColumn1] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_12 right $strike1'>" .
                                    $value[$colorfulColumn1] . "</div>";
                        }
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\n" . $value[$colorfulColumn1]);
//                        fclose($readWritefile);
                    }
                    //
                    //
                    //
                    if ($value[$colorfulColumnCheck2] == 'checked') {
                        $strike2 = 'strike_line';
                    } else {
                        $strike2 = '';
                    }
                    //
                    if ($colorfulColumn2 != NULL) {
                        if ($value[$colorfulColumnCheck2] == 12 || $value[$colorfulColumn2] < 0) {
                            $data[$key][$colorfulColumn2] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_green_12 right $strike2'>" .
                                    substr($value[$colorfulColumn2], 1) . "</div>";
                        } else if ($value[$colorfulColumnCheck2] == 11) {
                            $data[$key][$colorfulColumn2] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_orange_12 right $strike2'>" .
                                    $value[$colorfulColumn2] . "</div>";
                        } else if ($value[$colorfulColumnCheck2] == 10 || $value[$colorfulColumn2] > 0 || $value[$colorfulColumnCheck2] == 'OUT') {
                            $data[$key][$colorfulColumn2] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_red_12 right $strike2'>" .
                                    $value[$colorfulColumn2] . "</div>";
                        } else {
                            $data[$key][$colorfulColumn2] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_12 right $strike2'>" .
                                    $value[$colorfulColumn2] . "</div>";
                        }
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\n" . $value[$colorfulColumnCheck]);
//                        fclose($readWritefile);
                    }

                    if ($colorfulColumn3 != NULL) {
                        if ($value[$colorfulColumnCheck3] == $colorfulColumnCheck3Value) {
                            $data[$key][$colorfulColumn3] = "<div" .
                                    " title='GROSS WT'  "
                                    . "class='amount_green_12 right'>" .
                                    $value[$colorfulColumn3] . "</div>";
                        } else if ($value[$colorfulColumnCheck3] == $colorfulColumnCheck3Value1) {
                            $data[$key][$colorfulColumn3] = "<div" .
                                    " title='NET WT'  "
                                    . "class='amount_orange_12 right'>" .
                                    $value[$colorfulColumn3] . "</div>";
                        } else if ($value[$colorfulColumnCheck3] == $colorfulColumnCheck3Value2) {
                            $data[$key][$colorfulColumn3] = "<div" .
                                    " title='FFINE WT'  "
                                    . "class='amount_blue_12 right'>" .
                                    $value[$colorfulColumn3] . "</div>";
                        } else if ($value[$colorfulColumnCheck3] == 12 || $value[$colorfulColumn3] < 0) {
                            $data[$key][$colorfulColumn3] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_green_12 right $strike2'>" .
                                    substr($value[$colorfulColumn3], 1) . "</div>";
                        } else if ($value[$colorfulColumnCheck3] == 11) {
                            $data[$key][$colorfulColumn3] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_orange_12 right $strike2'>" .
                                    $value[$colorfulColumn3] . "</div>";
                        } else if ($value[$colorfulColumnCheck3] == 10 || $value[$colorfulColumn3] > 0 || $value[$colorfulColumnCheck3] == 'OUT') {
                            $data[$key][$colorfulColumn3] = "<div" .
                                    " title='Single Click To View Popup / Double Click To Select Account'  "
                                    . "class='amount_red_12 right $strike2'>" .
                                    $value[$colorfulColumn3] . "</div>";
                        } else {
                            $data[$key][$colorfulColumn3] = "<div" .
                                    " title='$value[$colorfulColumnTitle3]'  "
                                    . "class='amount_12 right'>" .
                                    $value[$colorfulColumn3] . "</div>";
                        }
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\n" . $value[$colorfulColumnCheck3]);
//                        fclose($readWritefile);
                    }
                    if ($colorfulColumn4 != NULL && $colorfulColumnCheck4 != 'Y') {
                        if ($value[$colorfulColumnCheck4] == $colorfulColumnCheck4Value2) {
                            $data[$key][$colorfulColumn42] = "<div" .
                                    " title='Final Valuation By FFine WT'  "
                                    . "class='amount_blue_12 left'>" .
                                    $value[$colorfulColumn42] . "</div>";
                            $data[$key][$colorfulColumn43] = "<div" .
                                    " title='Final Valuation By FFine WT'  "
                                    . "class='amount_blue_12 left'>" .
                                    $value[$colorfulColumn43] . "</div>";
                        } else if ($value[$colorfulColumnCheck4] == $colorfulColumnCheck4Value1) {
                            $data[$key][$colorfulColumn41] = "<div" .
                                    " title='Final Valuation By NET WT'  "
                                    . "class='amount_orange_12 left'>" .
                                    $value[$colorfulColumn41] . "</div>";
                            $data[$key][$colorfulColumn43] = "<div" .
                                    " title='Final Valuation By NET WT'  "
                                    . "class='amount_orange_12 left'>" .
                                    $value[$colorfulColumn43] . "</div>";
                        } else if ($value[$colorfulColumnCheck4] == $colorfulColumnCheck4Value) {
                            $data[$key][$colorfulColumn4] = "<div" .
                                    " title='Final Valuation By GROSS WT'  "
                                    . "class='amount_green_12 left'>" .
                                    $value[$colorfulColumn4] . "</div>";
                            $data[$key][$colorfulColumn43] = "<div" .
                                    " title='Final Valuation By GROSS WT'  "
                                    . "class='amount_green_12 left'>" .
                                    $value[$colorfulColumn43] . "</div>";
                        } else {
                            $data[$key][$colorfulColumn4] = "<div" .
                                    " title='$value[$colorfulColumnTitle4]'  "
                                    . "class='amount_12 left'>" .
                                    $value[$colorfulColumn4] . "</div>";
                        }
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\n" . $value[$colorfulColumnCheck3]);
//                        fclose($readWritefile);
                    }
                    //
                    if ($colorfulColumnCheck4 == 'Y') {
                        if ($value[$colorfulColumn4] > 0) {
                            $data[$key][$colorfulColumn4] = "<div" .
                                    "class='amount_green_12 right'>" .
                                    $value[$colorfulColumn4] . "</div>";
                        } else if ($value[$colorfulColumn4] < 0) {
                            $data[$key][$colorfulColumn4] = "<div" .
                                    "class='amount_red_12 right'>" .
                                    $value[$colorfulColumn4] . "</div>";
                        }
                        if ($value[$colorfulColumn41] > 0) {
                            $data[$key][$colorfulColumn41] = "<div" .
                                    "class='amount_green_12 right'>" .
                                    $value[$colorfulColumn41] . "</div>";
                        } else if ($value[$colorfulColumn41] < 0) {
                            $data[$key][$colorfulColumn41] = "<div" .
                                    "class='amount_red_12 right'>" .
                                    $value[$colorfulColumn41] . "</div>";
                        }
                        if ($value[$colorfulColumn42] > 0) {
                            $data[$key][$colorfulColumn42] = "<div" .
                                    "class='amount_green_12 right'>" .
                                    $value[$colorfulColumn42] . "</div>";
                        } else if ($value[$colorfulColumn42] < 0) {
                            $data[$key][$colorfulColumn42] = "<div" .
                                    "class='amount_red_12 right'>" .
                                    $value[$colorfulColumn42] . "</div>";
                        }
                        if ($value[$colorfulColumn43] > 0) {
                            $data[$key][$colorfulColumn43] = "<div" .
                                    "class='amount_green_12 right'>" .
                                    $value[$colorfulColumn43] . "</div>";
                        } else if ($value[$colorfulColumn43] < 0) {
                            $data[$key][$colorfulColumn43] = "<div" .
                                    "class='amount_red_12 right'>" .
                                    $value[$colorfulColumn43] . "</div>";
                        }

//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\n" . $value[$colorfulColumnCheck3]);
//                        fclose($readWritefile);
                    }
                    //
                    //
                    if ($mainPanelName == 'StockLedgerPanel') {
                        $onclickFunctionClass = "frm-btn-lnk-arial-Normal-stock-ledger";
                        $onclickFunctionClassRight = "frm-btn-lnk-arial-Normal-stock-ledger-right";
                    } else {
                        $onclickFunctionClass = "frm-btn-lnk-arial-Normal";
                        $onclickFunctionClassRight = "frm-btn-lnk-arial-Normal-right";
                    }
                    //
                    //
                    if ($onclickColumnFunc != NULL) {
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\nClick:" . $onclickColumnFuncImage);
//                        fclose($readWritefile);
                        $divOnclickString = '';
                        if ($onclickColumnFuncImage != '')
                            $divOnclickString = '<img src="' . $documentRootBSlash . '/images/' . $onclickColumnFuncImage . '" />';
                        else
                            $divOnclickString = $value[$onclickColumnFunc];
                        //
                        if ($onclickColumnFunctionPara13Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "', '" . $value[$onclickColumnFunctionPara6Func] . "', '" . $value[$onclickColumnFunctionPara7Func] . "', '" . $value[$onclickColumnFunctionPara8Func] . "', '" . $value[$onclickColumnFunctionPara9Func] . "', '" . $onclickColumnFunctionPara10Func . "', '" . $onclickColumnFunctionPara11Func . "', '" . $onclickColumnFunctionPara12Func . "', '" . $onclickColumnFunctionPara13Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara12Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "', '" . $value[$onclickColumnFunctionPara6Func] . "', '" . $value[$onclickColumnFunctionPara7Func] . "', '" . $value[$onclickColumnFunctionPara8Func] . "', '" . $value[$onclickColumnFunctionPara9Func] . "', '" . $onclickColumnFunctionPara10Func . "', '" . $onclickColumnFunctionPara11Func . "', '" . $onclickColumnFunctionPara12Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara11Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "', '" . $value[$onclickColumnFunctionPara6Func] . "', '" . $value[$onclickColumnFunctionPara7Func] . "', '" . $value[$onclickColumnFunctionPara8Func] . "', '" . $value[$onclickColumnFunctionPara9Func] . "', '" . $onclickColumnFunctionPara10Func . "', '" . $onclickColumnFunctionPara11Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara10Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "', '" . $value[$onclickColumnFunctionPara6Func] . "', '" . $value[$onclickColumnFunctionPara7Func] . "', '" . $value[$onclickColumnFunctionPara8Func] . "', '" . $value[$onclickColumnFunctionPara9Func] . "', '" . $onclickColumnFunctionPara10Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara9Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "', '" . $value[$onclickColumnFunctionPara6Func] . "', '" . $value[$onclickColumnFunctionPara7Func] . "', '" . $value[$onclickColumnFunctionPara8Func] . "', '" . $value[$onclickColumnFunctionPara9Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara8Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "', '" . $value[$onclickColumnFunctionPara6Func] . "', '" . $value[$onclickColumnFunctionPara7Func] . "', '" . $value[$onclickColumnFunctionPara8Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara7Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "', '" . $value[$onclickColumnFunctionPara6Func] . "', '" . $value[$onclickColumnFunctionPara7Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara6Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "', '" . $value[$onclickColumnFunctionPara6Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara5Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "', '" . $value[$onclickColumnFunctionPara5Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara4Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "', '" . $onclickColumnFunctionPara4Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionPara3Func != NULL) {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "', '" . $onclickColumnFunctionPara3Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        } else {
                            $data[$key][$onclickColumnFunc] = "<div name='" . $value[$onclickColumnIdFunc] .
                                    "' id='" . $value[$onclickColumnValueFunc] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFunc . "('" . $value[$onclickColumnFunctionPara1Func] . "', '" . $value[$onclickColumnFunctionPara2Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFunc] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFunc] . "' class='display-entry-info-popup'>" . "</div>";
                        }
                    }
                    //
                    //
                    //
                    if ($onclickColumnFuncTwo != NULL) {
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\nClick:" . $onclickColumnFuncImage);
//                        fclose($readWritefile);
                        $divOnclickString = '';
                        if ($onclickColumnFuncImageTwo != '')
                            $divOnclickString = '<img src="' . $documentRootBSlash . '/images/' . $onclickColumnFuncImageTwo . '" />';
                        else
                            $divOnclickString = $value[$onclickColumnFuncTwo];
                        //
                        if ($onclickColumnFunctionTwoPara13Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "', '" . $value[$onclickColumnFunctionTwoPara6Func] . "', '" . $value[$onclickColumnFunctionTwoPara7Func] . "', '" . $value[$onclickColumnFunctionTwoPara8Func] . "', '" . $value[$onclickColumnFunctionTwoPara9Func] . "', '" . $onclickColumnFunctionTwoPara10Func . "', '" . $onclickColumnFunctionTwoPara11Func . "', '" . $onclickColumnFunctionTwoPara12Func . "', '" . $onclickColumnFunctionTwoPara13Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara12Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "', '" . $value[$onclickColumnFunctionTwoPara6Func] . "', '" . $value[$onclickColumnFunctionTwoPara7Func] . "', '" . $value[$onclickColumnFunctionTwoPara8Func] . "', '" . $value[$onclickColumnFunctionTwoPara9Func] . "', '" . $onclickColumnFunctionTwoPara10Func . "', '" . $onclickColumnFunctionTwoPara11Func . "', '" . $onclickColumnFunctionTwoPara12Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara11Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "', '" . $value[$onclickColumnFunctionTwoPara6Func] . "', '" . $value[$onclickColumnFunctionTwoPara7Func] . "', '" . $value[$onclickColumnFunctionTwoPara8Func] . "', '" . $value[$onclickColumnFunctionTwoPara9Func] . "', '" . $onclickColumnFunctionTwoPara10Func . "', '" . $onclickColumnFunctionTwoPara11Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara10Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "', '" . $value[$onclickColumnFunctionTwoPara6Func] . "', '" . $value[$onclickColumnFunctionTwoPara7Func] . "', '" . $value[$onclickColumnFunctionTwoPara8Func] . "', '" . $value[$onclickColumnFunctionTwoPara9Func] . "', '" . $onclickColumnFunctionTwoPara10Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara9Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "', '" . $value[$onclickColumnFunctionTwoPara6Func] . "', '" . $value[$onclickColumnFunctionTwoPara7Func] . "', '" . $value[$onclickColumnFunctionTwoPara8Func] . "', '" . $value[$onclickColumnFunctionTwoPara9Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara8Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "', '" . $value[$onclickColumnFunctionTwoPara6Func] . "', '" . $value[$onclickColumnFunctionTwoPara7Func] . "', '" . $value[$onclickColumnFunctionTwoPara8Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara7Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "', '" . $value[$onclickColumnFunctionTwoPara6Func] . "', '" . $value[$onclickColumnFunctionTwoPara7Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwoTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwoTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara6Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "', '" . $value[$onclickColumnFunctionTwoPara6Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara5Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "', '" . $value[$onclickColumnFunctionTwoPara5Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara4Func != NULL) {
                            $data[$key][] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "', '" . $onclickColumnFunctionTwoPara4Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionTwoPara3Func != NULL) {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "', '" . $onclickColumnFunctionTwoPara3Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        } else {
                            $data[$key][$onclickColumnFuncTwo] = "<div name='" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='" . $value[$onclickColumnValueFuncTwo] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionTwoFunc . "('" . $value[$onclickColumnFunctionTwoPara1Func] . "', '" . $value[$onclickColumnFunctionTwoPara2Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncTwo] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncTwo] . "' class='display-entry-info-popup'>" . "</div>";
                        }
                    }
                    //
                    //
                    //
                    //
                    if ($onclickColumnFuncThr != NULL) {
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\nClick:" . $onclickColumnFuncImage);
//                        fclose($readWritefile);
                        $divOnclickString = '';
                        if ($onclickColumnFuncImageThr != '')
                            $divOnclickString = '<img src="' . $documentRootBSlash . '/images/' . $onclickColumnFuncImageThr . '" />';
                        else
                            $divOnclickString = $value[$onclickColumnFuncThr];
                        //
                        if ($onclickColumnFunctionThrPara13Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "', '" . $value[$onclickColumnFunctionThrPara6Func] . "', '" . $value[$onclickColumnFunctionThrPara7Func] . "', '" . $value[$onclickColumnFunctionThrPara8Func] . "', '" . $value[$onclickColumnFunctionThrPara9Func] . "', '" . $onclickColumnFunctionThrPara10Func . "', '" . $onclickColumnFunctionThrPara11Func . "', '" . $onclickColumnFunctionThrPara12Func . "', '" . $onclickColumnFunctionThrPara13Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara12Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "', '" . $value[$onclickColumnFunctionThrPara6Func] . "', '" . $value[$onclickColumnFunctionThrPara7Func] . "', '" . $value[$onclickColumnFunctionThrPara8Func] . "', '" . $value[$onclickColumnFunctionThrPara9Func] . "', '" . $onclickColumnFunctionThrPara10Func . "', '" . $onclickColumnFunctionThrPara11Func . "', '" . $onclickColumnFunctionThrPara12Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara11Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "', '" . $value[$onclickColumnFunctionThrPara6Func] . "', '" . $value[$onclickColumnFunctionThrPara7Func] . "', '" . $value[$onclickColumnFunctionThrPara8Func] . "', '" . $value[$onclickColumnFunctionThrPara9Func] . "', '" . $onclickColumnFunctionThrPara10Func . "', '" . $onclickColumnFunctionThrPara11Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara10Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "', '" . $value[$onclickColumnFunctionThrPara6Func] . "', '" . $value[$onclickColumnFunctionThrPara7Func] . "', '" . $value[$onclickColumnFunctionThrPara8Func] . "', '" . $value[$onclickColumnFunctionThrPara9Func] . "', '" . $onclickColumnFunctionThrPara10Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara9Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "', '" . $value[$onclickColumnFunctionThrPara6Func] . "', '" . $value[$onclickColumnFunctionThrPara7Func] . "', '" . $value[$onclickColumnFunctionThrPara8Func] . "', '" . $value[$onclickColumnFunctionThrPara9Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara8Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "', '" . $value[$onclickColumnFunctionThrPara6Func] . "', '" . $value[$onclickColumnFunctionThrPara7Func] . "', '" . $value[$onclickColumnFunctionThrPara8Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara7Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "', '" . $value[$onclickColumnFunctionThrPara6Func] . "', '" . $value[$onclickColumnFunctionThrPara7Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThrThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThrThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara6Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "', '" . $value[$onclickColumnFunctionThrPara6Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara5Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "', '" . $value[$onclickColumnFunctionThrPara5Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara4Func != NULL) {
                            $data[$key][] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "', '" . $onclickColumnFunctionThrPara4Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionThrPara3Func != NULL) {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "', '" . $onclickColumnFunctionThrPara3Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        } else {
                            $data[$key][$onclickColumnFuncThr] = "<div name='" . $value[$onclickColumnIdFuncThr] .
                                    "' id='" . $value[$onclickColumnValueFuncThr] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionThrFunc . "('" . $value[$onclickColumnFunctionThrPara1Func] . "', '" . $value[$onclickColumnFunctionThrPara2Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncThr] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncThr] . "' class='display-entry-info-popup'>" . "</div>";
                        }
                    }
                    //
                    //
                    //
                    //
                    if ($onclickColumnFuncFour != NULL) {
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, "\nClick:" . $onclickColumnFuncImage);
//                        fclose($readWritefile);
                        $divOnclickString = '';
                        if ($onclickColumnFuncImageFour != '')
                            $divOnclickString = '<img src="' . $documentRootBSlash . '/images/' . $onclickColumnFuncImageFour . '" />';
                        else
                            $divOnclickString = $value[$onclickColumnFuncFour];
                        //
                        if ($onclickColumnFunctionFourPara13Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "', '" . $value[$onclickColumnFunctionFourPara6Func] . "', '" . $value[$onclickColumnFunctionFourPara7Func] . "', '" . $value[$onclickColumnFunctionFourPara8Func] . "', '" . $value[$onclickColumnFunctionFourPara9Func] . "', '" . $onclickColumnFunctionFourPara10Func . "', '" . $onclickColumnFunctionFourPara11Func . "', '" . $onclickColumnFunctionFourPara12Func . "', '" . $onclickColumnFunctionFourPara13Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara12Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "', '" . $value[$onclickColumnFunctionFourPara6Func] . "', '" . $value[$onclickColumnFunctionFourPara7Func] . "', '" . $value[$onclickColumnFunctionFourPara8Func] . "', '" . $value[$onclickColumnFunctionFourPara9Func] . "', '" . $onclickColumnFunctionFourPara10Func . "', '" . $onclickColumnFunctionFourPara11Func . "', '" . $onclickColumnFunctionFourPara12Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara11Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "', '" . $value[$onclickColumnFunctionFourPara6Func] . "', '" . $value[$onclickColumnFunctionFourPara7Func] . "', '" . $value[$onclickColumnFunctionFourPara8Func] . "', '" . $value[$onclickColumnFunctionFourPara9Func] . "', '" . $onclickColumnFunctionFourPara10Func . "', '" . $onclickColumnFunctionFourPara11Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara10Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "', '" . $value[$onclickColumnFunctionFourPara6Func] . "', '" . $value[$onclickColumnFunctionFourPara7Func] . "', '" . $value[$onclickColumnFunctionFourPara8Func] . "', '" . $value[$onclickColumnFunctionFourPara9Func] . "', '" . $onclickColumnFunctionFourPara10Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara9Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "', '" . $value[$onclickColumnFunctionFourPara6Func] . "', '" . $value[$onclickColumnFunctionFourPara7Func] . "', '" . $value[$onclickColumnFunctionFourPara8Func] . "', '" . $value[$onclickColumnFunctionFourPara9Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara8Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "', '" . $value[$onclickColumnFunctionFourPara6Func] . "', '" . $value[$onclickColumnFunctionFourPara7Func] . "', '" . $value[$onclickColumnFunctionFourPara8Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara7Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "', '" . $value[$onclickColumnFunctionFourPara6Func] . "', '" . $value[$onclickColumnFunctionFourPara7Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFourFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFourFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara6Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "', '" . $value[$onclickColumnFunctionFourPara6Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara5Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "', '" . $value[$onclickColumnFunctionFourPara5Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara4Func != NULL) {
                            $data[$key][] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "', '" . $onclickColumnFunctionFourPara4Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else if ($onclickColumnFunctionFourPara3Func != NULL) {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "', '" . $onclickColumnFunctionFourPara3Func . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        } else {
                            $data[$key][$onclickColumnFuncFour] = "<div name='" . $value[$onclickColumnIdFuncFour] .
                                    "' id='" . $value[$onclickColumnValueFuncFour] . "' title='Click Here To View Account Details' "
                                    . ' onclick="' . $onclickColumnFunctionFourFunc . "('" . $value[$onclickColumnFunctionFourPara1Func] . "', '" . $value[$onclickColumnFunctionFourPara2Func] . "');" . '"'
                                    . "class='" . $onclickFunctionClass . "'>" .
                                    $divOnclickString . "</div>" . "<div name='info-popup-" . $value[$onclickColumnIdFuncFour] .
                                    "' id='info-popup-" . $value[$onclickColumnValueFuncFour] . "' class='display-entry-info-popup'>" . "</div>";
                        }
                    }
                    //
//                    $readWritefile = fopen("ompprdwr.php", "a");
//                    fwrite($readWritefile, "\nPrint:" . $onprintColumnFunc);
//                    fclose($readWritefile);
                    $printOption = 'N';
                    if ($onprintColumnFunc != NULL) {
                        if ($onprintColumnFuncImage != '') {
                            if ($onprintColumnFunctionPara3Func == 'plusIcon') {
                                $divOnprintString = '<i class="fa fa-plus-square" style="font-size:14px;margin-top: 2px;color: #00A000;cursor: pointer;" />';
                                if ($value[$onprintColumnIdFunc] == $onprintColumnValueFunc)
                                    $printOption = 'Y';
                                else
                                    $printOption = 'N';
                            } else {
                                $divOnprintString = '<img src="' . $documentRootBSlash . '/images/' . $onprintColumnFuncImage . '" />';
                                $printOption = 'Y';
                            }
                        } else {
                            $divOnprintString = $value[$onprintColumnFunc];
                        }
                        //
                        $divOnprintColumnValue = $value[$onprintColumnFunc];
                        //
                        if ($printOption == 'Y') {
                            if ($onprintColumnFunctionPara6Func != NULL) {
                                if ($onprintColumnFunctionFunc == 'tagApprovalPendingAddStock') {
                                    $data[$key][$onprintColumnFunc] = "<div class='" . $onclickFunctionClass . "'>$divOnprintColumnValue</div><div name='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] .
                                            "' id='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] . "' title='Single Click To View Popup / Double Click To Select Account' "
                                            . ' onclick="' . $onprintColumnFunctionFunc . "('" . $value[$onprintColumnFunctionPara1Func] . "', '" . $value[$onprintColumnFunctionPara2Func] . "', '" . $onprintColumnFunctionPara3Func . "', '" . $onprintColumnFunctionPara4Func . "', '" . $value[$onprintColumnFunctionPara5Func] . "', '" . $value[$onprintColumnFunctionPara6Func] . "');" . '"'
                                            . "class='" . $onclickFunctionClassRight . "'>" .
                                            $divOnprintString . "</div><input type='checkbox' Style='right: 15%;top: 10px;position: absolute;' class='approval' value='$value[$onprintColumnFunctionPara1Func]|$value[$onprintColumnFunctionPara2Func]|$onprintColumnFunctionPara3Func|$onprintColumnFunctionPara4Func|$value[$onprintColumnFunctionPara5Func]|$value[$onprintColumnFunctionPara6Func]' />";
                                } else {
                                    $data[$key][$onprintColumnFunc] = "<div class='" . $onclickFunctionClass . "'>$divOnprintColumnValue</div><div name='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] .
                                            "' id='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] . "' title='Single Click To View Popup / Double Click To Select Account' "
                                            . ' onclick="' . $onprintColumnFunctionFunc . "('" . $value[$onprintColumnFunctionPara1Func] . "', '" . $value[$onprintColumnFunctionPara2Func] . "', '" . $onprintColumnFunctionPara3Func . "', '" . $onprintColumnFunctionPara4Func . "', '" . $value[$onprintColumnFunctionPara5Func] . "', '" . $value[$onprintColumnFunctionPara6Func] . "');" . '"'
                                            . "class='" . $onclickFunctionClassRight . "'>" .
                                            $divOnprintString . "</div>";
                                }
                            } else if ($onprintColumnFunctionPara5Func != NULL) {
                                $data[$key][$onprintColumnFunc] = "<div class='" . $onclickFunctionClass . "'>$divOnprintColumnValue</div><div name='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] .
                                        "' id='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] . "' title='Single Click To View Popup / Double Click To Select Account' "
                                        . ' onclick="' . $onprintColumnFunctionFunc . "('" . $value[$onprintColumnFunctionPara1Func] . "', '" . $value[$onprintColumnFunctionPara2Func] . "', '" . $onprintColumnFunctionPara3Func . "', '" . $onprintColumnFunctionPara4Func . "', '" . $value[$onprintColumnFunctionPara5Func] . "');" . '"'
                                        . "class='" . $onclickFunctionClassRight . "'>" .
                                        $divOnprintString . "</div>";
                            } else if ($onprintColumnFunctionPara4Func != NULL) {
                                $data[$key][$onprintColumnFunc] = "<div class='" . $onclickFunctionClass . "'>$divOnprintColumnValue</div><div name='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] .
                                        "' id='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] . "' title='Single Click To View Popup / Double Click To Select Account' "
                                        . ' onclick="' . $onprintColumnFunctionFunc . "('" . $value[$onprintColumnFunctionPara1Func] . "', '" . $value[$onprintColumnFunctionPara2Func] . "', '" . $onprintColumnFunctionPara3Func . "', '" . $onprintColumnFunctionPara4Func . "');" . '"'
                                        . "class='" . $onclickFunctionClassRight . "'>" .
                                        $divOnprintString . "</div>";
                            } else if ($onprintColumnFunctionPara3Func != NULL) {
                                $data[$key][$onprintColumnFunc] = "<div class='" . $onclickFunctionClass . "'>$divOnprintColumnValue</div><div name='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] .
                                        "' id='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] . "' title='Single Click To View Popup / Double Click To Select Account' "
                                        . ' onclick="' . $onprintColumnFunctionFunc . "('" . $value[$onprintColumnFunctionPara1Func] . "', '" . $value[$onprintColumnFunctionPara2Func] . "', '" . $onprintColumnFunctionPara3Func . "');" . '"'
                                        . "class='" . $onclickFunctionClassRight . "'>" .
                                        $divOnprintString . "</div>";
                            } else {
                                $data[$key][$onprintColumnFunc] = "<div class='" . $onclickFunctionClass . "'>$divOnprintColumnValue</div><div name='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] .
                                        "' id='itemTagDiv" . $value[$onprintColumnFunctionPara1Func] . "' title='Single Click To View Popup / Double Click To Select Account' "
                                        . ' onclick="' . $onprintColumnFunctionFunc . "('" . $value[$onprintColumnFunctionPara1Func] . "', '" . $value[$onprintColumnFunctionPara2Func] . "');" . '"'
                                        . "class='" . $onclickFunctionClassRight . "'>" .
                                        $divOnprintString . "</div>";
                            }
                        }
                    }
//                    $readWritefile = fopen("ompprdwr.php", "a");
//                    fwrite($readWritefile, "\nPrint:" . $value[$onprintColumnIdFunc] . ' Value:' . $onprintColumnValueFunc);
//                    fclose($readWritefile);
                    //
                    //
                    if ($deleteColumnFunc != NULL) {
                        if ($deleteColumnFunctionPara6Func != NULL) {
                            $data[$key][$deleteColumnFunc] = "<input name='" . $value[$deleteColumnIdFunc] . "' value='" . $value[$deleteColumnIdFunc] .
                                    "' id='deleteDiv" . $key . "' type='hidden'"
                                    . " class='" . $onclickFunctionClassRight . "' />" .
                                    '<img src="' . $documentRootBSlash . '/images/delete16.png"'
                                    . ' onclick="' . $deleteColumnFunctionFunc . "('"
                                    . $deleteColumnFunctionPara1Func . "', '"
                                    . $value[$deleteColumnFunctionPara2Func]
                                    . "', '" . $value[$deleteColumnFunctionPara3Func]
                                    . "', '" . $deleteColumnFunctionPara4Func
                                    . "', '" . $deleteColumnFunctionPara5Func
                                    . "', '" . $deleteColumnFunctionPara6Func
                                    . "');" . '"' . " style='vertical-align: bottom;' />"
                                    . "&nbsp;&nbsp;<input type='checkbox' class='delCheck' value='$value[$deleteColumnIdFunc]' />";
                        } else if ($deleteColumnFunctionPara5Func != NULL) {
                            $data[$key][$deleteColumnFunc] = "<input name='" . $value[$deleteColumnIdFunc] . "' value='" . $value[$deleteColumnIdFunc] .
                                    "' id='deleteDiv" . $key . "' type='hidden'"
                                    . " class='" . $onclickFunctionClassRight . "' />";
                            if ($deleteColumnFunctionPara1Func == 'delete_with_all_values')
                                $data[$key][$deleteColumnFunc] .= '<img src="' . $documentRootBSlash . '/images/delete16.png"'
                                        . ' onclick="' . $deleteColumnFunctionFunc . "('" . $deleteColumnFunctionPara1Func . "', '" . $value[$deleteColumnFunctionPara2Func] . "', '" . $value[$deleteColumnFunctionPara3Func] . "', '" . $value[$deleteColumnFunctionPara4Func] . "', '" . $deleteColumnFunctionPara5Func . "');" . '"' . " style='vertical-align: bottom;' />"
                                        . "&nbsp;&nbsp;<input type='checkbox' class='delCheck' value='$value[$deleteColumnIdFunc]' />";
                            else
                                $data[$key][$deleteColumnFunc] .= '<img src="' . $documentRootBSlash . '/images/delete16.png"'
                                        . ' onclick="' . $deleteColumnFunctionFunc . "('" . $deleteColumnFunctionPara1Func . "', '" . $value[$deleteColumnFunctionPara2Func] . "', '" . $value[$deleteColumnFunctionPara3Func] . "', '" . $deleteColumnFunctionPara4Func . "', '" . $deleteColumnFunctionPara5Func . "');" . '"' . " style='vertical-align: bottom;' />"
                                        . "&nbsp;&nbsp;<input type='checkbox' class='delCheck' value='$value[$deleteColumnIdFunc]' />";
                        } else if ($deleteColumnFunctionPara4Func != NULL) {
                            $data[$key][$deleteColumnFunc] = "<input name='" . $value[$deleteColumnIdFunc] . "' value='" . $value[$deleteColumnIdFunc] .
                                    "' id='deleteDiv" . $key . "' type='hidden'"
                                    . " class='" . $onclickFunctionClassRight . "' />" .
                                    '<img src="' . $documentRootBSlash . '/images/delete16.png"'
                                    . ' onclick="' . $deleteColumnFunctionFunc . "('" . $deleteColumnFunctionPara1Func . "', '" . $value[$deleteColumnFunctionPara2Func] . "', '" . $value[$deleteColumnFunctionPara3Func] . "', '" . $value[$deleteColumnFunctionPara4Func] . "');" . '"' . " style='vertical-align: bottom;' />"
                                    . "&nbsp;&nbsp;<input type='checkbox' class='delCheck' value='$value[$deleteColumnIdFunc]'  />";
                        } else if ($deleteColumnFunctionPara3Func != NULL) {
                            $data[$key][$deleteColumnFunc] = "<input name='" . $value[$deleteColumnIdFunc] . "' value='" . $value[$deleteColumnIdFunc] .
                                    "' id='deleteDiv" . $key . "' type='hidden'"
                                    . " class='" . $onclickFunctionClassRight . "' />" .
                                    '<img src="' . $documentRootBSlash . '/images/delete16.png"'
                                    . ' onclick="' . $deleteColumnFunctionFunc . "('" . $deleteColumnFunctionPara1Func . "', '" . $value[$deleteColumnFunctionPara2Func] . "', '" . $value[$deleteColumnFunctionPara3Func] . "');" . '"' . " style='vertical-align: bottom;' />"
                                    . "&nbsp;&nbsp;<input type='checkbox' class='delCheck' value='$value[$deleteColumnIdFunc]'  />";
                        } else {
                            $data[$key][$deleteColumnFunc] = "<input name='" . $value[$deleteColumnIdFunc] . "' value='" . $value[$deleteColumnIdFunc] .
                                    "' id='deleteDiv" . $key . "' type='hidden'"
                                    . " class='" . $onclickFunctionClassRight . "' />" .
                                    '<img src="' . $documentRootBSlash . '/images/delete16.png"'
                                    . ' onclick="' . $deleteColumnFunctionFunc . "('" . $deleteColumnFunctionPara1Func . "', '" . $value[$deleteColumnFunctionPara2Func] . "');" . '"' . " style='vertical-align: bottom;' />"
                                    . "&nbsp;&nbsp;<input type='checkbox' class='delCheck' value='$value[$deleteColumnIdFunc]'  />";
                        }
                    }
                    //POPUP Function
                    if ($popupFunctionLink != NULL) {
                        $data[$key][$popupColumnFunc] = "<a style='cursor: pointer;'"
                                . ' onclick="' . "window.open('$documentRootBSlash/include/php/$popupFunctionLink?userId=$value[$popupFunctionPara1]&utinId=$value[$popupFunctionPara7]&firmId=$value[$popupFunctionPara8]&slPrPreInvoiceNo=$value[$popupFunctionPara2]&slPrInvoiceNo=$value[$popupFunctionPara3]&slprinSubPanel=$value[$popupFunctionPara4]&invoiceDate=$value[$popupFunctionPara5]&invoicePanel=$popupFunctionPara6'," .
                                "'popup','width=$popupFunctionWidth,height=$popupFunctionHeight," .
                                "scrollbars=yes,resizable=yes,toolbar=no,directories=no," .
                                "location=no,menubar=no,status=no," .
                                "left=0,top=0');" . 'return false"' . " >$value[$popupColumnFunc]</a>";
                    }
                    //
//                    $readWritefile = fopen("ompprdwr.php", "a");
//                    fwrite($readWritefile, 'value : ' . $value['sttr_image_id']);
//                    fclose($readWritefile);
                    //
                    if (preg_match("/^[a-zA-Z]$/", substr($value['sttr_item_name'], 0, 1))) {
                        $data[$key]['sttr_item_name'] = ucwords($value['sttr_item_name']);
                    } else {
                        $data[$key]['sttr_item_name'] = $value['sttr_item_name'];
                    }
//                    $data[$key]['sttr_item_name'] = ucwords($value['sttr_item_name']);
                    //if ($value['sttr_image_id'] != '') {
                    $newItemSnapId = $value['sttr_image_id'];
                    $imageId = $newItemSnapId;
                    $noEcho = 'Y';

                    $file = $_SERVER['DOCUMENT_ROOT'] . '/2/include/php/omshowimagedirect.php';

                    if (is_file($file)) {
                        //
//                            $readWritefile = fopen("ompprdwr.php", "a");
//                            fwrite($readWritefile, '   file:' . $file);
//                            fclose($readWritefile);
                        //
                        include( $file );
                    }
                    //include 'ogsprsim.php';
                    $noEcho = '';
                    $data[$key]['sttr.sttr_image_id'] = $data[$key]['sttr_image_id'] = '<img src="data:image/jpeg;base64,' . base64_encode($imageContent) . '"'
                            . ' onclick="' . 'openJewelleryPanelPopUpFunction' . "('" . $value['sttr_sttrin_id'] . "', '" . $value['sttr_id'] . "');" . '"' .
                            " class='img-fluid' style='vertical-align: bottom;width:48px;height:48px;cursor: pointer;' />";
                    //
//                        $readWritefile = fopen("ompprdwr.php", "a");
//                        fwrite($readWritefile, '\n' . $data[$key]['sttr_image_id']);
//                        fclose($readWritefile);
                    //}
                }
                if ($deleteColumnFunc != NULL) {
                    $data[$key][$deleteColumnFunc] .= "<input type='hidden' id='counter' value='" . $key . "' />";
                }
            }
//            $sqlSumQuery = "SELECT sum(girv_prin_amt) as girv_prin_amt from (" . $sqlQuery . ") as subquery";
//            $dataSum = self::sql_exec($db, $bindings, $sqlSumQuery);
//            //$data .= $dataSum;
            //
        } catch (Exception $e) {
            self::fatal("An error occurred: " . $e->getMessage());
        }
//        echo "<pre>";
//        print_r($data);die;
        if (strpos($where, 'GROUP BY '))
            $whereForCount = substr($where, 0, strpos($where, 'GROUP BY '));
        else
            $whereForCount = $where;
        // Data set length after filtering
        $resFilterLength = self::sql_exec($db, $bindings, "SELECT COUNT($primaryKey)
			 FROM   $table
                         $innerJoinCondition
			 $whereForCount"
        );
        $recordsFiltered = $resFilterLength[0][0];

//        $recordsFilteredSQL = "SELECT COUNT($primaryKey)
//        		 FROM   $table
//                         $innerJoinCondition
//        		 $whereForCount";
        //
        // Total data set length
        $resTotalLength = self::sql_exec($db, "SELECT COUNT($primaryKey)
			 FROM   $table"
        );
        $recordsTotal = $resTotalLength[0][0];
//
//        $readWritefile = fopen("ompprdwr.php", "a");
//        fwrite($readWritefile, '  Filter:' . $recordsFiltered . '  Total:' . $recordsTotal . '   SQL:' . $recordsFilteredSQL);
//        fclose($readWritefile);
        /*
         * Output
         */
        return array(
            "draw" => isset($request['draw']) ?
            intval($request['draw']) :
            0,
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            "data" => self::data_output($columns, $data)
        );
    }

    /**
     * The difference between this method and the `simple` one, is that you can
     * apply additional `where` conditions to the SQL queries. These can be in
     * one of two forms:
     *
     * * 'Result condition' - This is applied to the result set, but not the
     *   overall paging information query - i.e. it will not effect the number
     *   of records that a user sees they can have access to. This should be
     *   used when you want apply a filtering condition that the user has sent.
     * * 'All condition' - This is applied to all queries that are made and
     *   reduces the number of records that the user can access. This should be
     *   used in conditions where you don't want the user to ever have access to
     *   particular records (for example, restricting by a login id).
     *
     *  @param  array $request Data sent to server by DataTables
     *  @param  array|PDO $conn PDO connection resource or connection parameters array
     *  @param  string $table SQL table to query
     *  @param  string $primaryKey Primary key of the table
     *  @param  array $columns Column information array
     *  @param  string $whereResult WHERE condition to apply to the result set
     *  @param  string $whereAll WHERE condition to apply to all queries
     *  @return array          Server-side processing response array
     */
    static function complex($request, $conn, $table, $primaryKey, $columns, $whereResult = null, $whereAll = null) {
        $bindings = array();
        $db = self::db($conn);
        $localWhereResult = array();
        $localWhereAll = array();
        $whereAllSql = '';

        // Build the SQL query string from the request
        $limit = self::limit($request, $columns);
        $order = self::order($request, $columns);
        $where = self::filter($request, $columns, $bindings);

        $whereResult = self::_flatten($whereResult);
        $whereAll = self::_flatten($whereAll);

        if ($whereResult) {
            $where = $where ?
                    $where . ' AND ' . $whereResult :
                    'WHERE ' . $whereResult;
        }

        if ($whereAll) {
            $where = $where ?
                    $where . ' AND ' . $whereAll :
                    'WHERE ' . $whereAll;

            $whereAllSql = 'WHERE ' . $whereAll;
        }

        // Main query to actually get the data
        $data = self::sql_exec($db, $bindings, "SELECT `" . implode("`, `", self::pluck($columns, 'db')) . "`
			 FROM $table
			 $where
			 $order
			 $limit"
        );

        // Data set length after filtering
        $resFilterLength = self::sql_exec($db, $bindings, "SELECT COUNT(`{$primaryKey}`)
			 FROM   $table
			 $where"
        );
        $recordsFiltered = $resFilterLength[0][0];

        // Total data set length
        $resTotalLength = self::sql_exec($db, $bindings, "SELECT COUNT(`{$primaryKey}`)
			 FROM   $table " .
                $whereAllSql
        );
        $recordsTotal = $resTotalLength[0][0];

        /*
         * Output
         */
        return array(
            "draw" => isset($request['draw']) ?
            intval($request['draw']) :
            0,
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            "data" => self::data_output($columns, $data)
        );
    }

    /**
     * Connect to the database
     *
     * @param  array $sql_details SQL server connection details array, with the
     *   properties:
     *     * host - host name
     *     * db   - database name
     *     * user - user name
     *     * pass - user password
     * @return resource Database connection handle
     */
    static function sql_connect($sql_details) {
        //echo "mysql:host={$sql_details['host']};port={$sql_details['port']};dbname={$sql_details['db']}";            exit();
        try {
            $db = @new PDO(
                            "mysql:host={$sql_details['host']};port={$sql_details['port']};dbname={$sql_details['db']}", $sql_details['user'], $sql_details['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                    );
            $db->exec("set names utf8");
        } catch (PDOException $e) {
            self::fatal(
                    "An error occurred while connecting to the database. " .
                    "The error reported by the server was: " . $e->getMessage()
            );
        }

        return $db;
    }

    /**
     * Execute an SQL query on the database
     *
     * @param  resource $db  Database handler
     * @param  array    $bindings Array of PDO binding values from bind() to be
     *   used for safely escaping strings. Note that this can be given as the
     *   SQL query string if no bindings are required.
     * @param  string   $sql SQL query to execute.
     * @return array         Result from the query (all rows)
     */
    static function sql_exec($db, $bindings, $sql = null) {
        // Argument shifting
        if ($sql === null) {
            $sql = $bindings;
        }

        $stmt = $db->prepare($sql);
        //echo $sql;
        // Bind parameters
        if (is_array($bindings)) {
            for ($i = 0, $ien = count($bindings); $i < $ien; $i++) {
                $binding = $bindings[$i];
                $stmt->bindValue($binding['key'], $binding['val'], $binding['type']);

//                $readWritefile = fopen("ompprdwr.php", "a");
//                fwrite($readWritefile, "\n" . $binding['key'] . ' - ' . $binding['val'] . ' - ' . $binding['type']);
//                fclose($readWritefile);
            }
        }
//        $readWritefile = fopen("ompprdwr.php", "a");
//        fwrite($readWritefile, "\n" . $stmt->fullQuery);
//        fclose($readWritefile);
        // Execute
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            self::fatal("An SQL error occurred: " . $e->getMessage());
        }

        // Return all
        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }

    /*     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Internal methods
     */

    /**
     * Throw a fatal error.
     *
     * This writes out an error message in a JSON string which DataTables will
     * see and show to the user in the browser.
     *
     * @param  string $msg Message to send to the client
     */
    static function fatal($msg) {
        echo json_encode(array(
            "error" => $msg
        ));

        exit(0);
    }

    /**
     * Create a PDO binding key which can be used for escaping variables safely
     * when executing a query with sql_exec()
     *
     * @param  array &$a    Array of bindings
     * @param  *      $val  Value to bind
     * @param  int    $type PDO field type
     * @return string       Bound key to be used in the SQL where this parameter
     *   would be used.
     */
    static function bind(&$a, $val, $type) {
        $key = ':binding_' . count($a);

        $a[] = array(
            'key' => $key,
            'val' => $val,
            'type' => $type
        );

        return $key;
    }

    /**
     * Pull a particular property from each assoc. array in a numeric array, 
     * returning and array of the property values from each item.
     *
     *  @param  array  $a    Array to get data from
     *  @param  string $prop Property to read
     *  @return array        Array of property values
     */
    static function pluck($a, $prop) {
        $out = array();

        for ($i = 0, $len = count($a); $i < $len; $i++) {
            $out[] = $a[$i][$prop];
        }

        return $out;
    }

    /**
     * Return a string from an array or a string
     *
     * @param  array|string $a Array to join
     * @param  string $join Glue for the concatenation
     * @return string Joined string
     */
    static function _flatten($a, $join = ' AND ') {
        if (!$a) {
            return '';
        } else if ($a && is_array($a)) {
            return implode($join, $a);
        }
        return $a;
    }
}

?>