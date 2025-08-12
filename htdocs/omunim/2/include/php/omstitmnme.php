<?php
/*
 * **************************************************************************************
 * @tutorial: Stock Item list @AUTHOR: BAJRANG20JUN18
 * **************************************************************************************
 * 
 * Created on Jun 20, 2018 11:00:58 AM
 *
 * @FileName: omstitmnme.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//change in file @AUTHOR: SANDY29DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include 'conversions.php';
include_once 'ommpfndv.php';
?>
<div id="purchaseDetails" style="margin-left:5px;">
    <?php
    $searchBy = $_GET['searchBy'];
    if ($_SESSION['sessionOwnIndStr'][35] == 'Y' || $_SESSION['sessionOwnIndStr'][35] == 'A') {
        //
        $DOBDay = $_GET['DOBDay'];
        $DOBMonth = $_GET['DOBMonth'];
        $DOBYear = $_GET['DOBYear'];
        //
        if ($DOBYear == '' || $DOBYear == NULL) {
            $DOBDay = $_POST['DOBDay'];
            $DOBMonth = $_POST['DOBMonth'];
            $DOBYear = $_POST['DOBYear'];
        }
        //
        if ($DOBDay != '' || $DOBDay != NULL) {
            $startDate = $DOBDay . $DOBMonth . $DOBYear;
            $startDate = om_strtoupper(date("d M Y", strtotime($startDate)));
            //
            $todayDate = $startDate;
            $todayDateNum = strtotime($todayDate);
        } else {
            $todayDate = om_strtoupper(date(d) . ' ' . date(M) . ' ' . date(Y));
            $todayDateNum = strtotime($todayDate);
        }
        //
        ?>
        <?php
//        //
//        $panel = 'StockLedger';
//        //
//        //
//        //echo '$todayDate:' . $todayDateNum;
//        $sessionOwnerId = $_SESSION[sessionOwnerId];
//        //
//        //Start Code To Select FirmId
//        $selFirmId = $_GET['firmId'];
//        if (!isset($selFirmId)) {
//            $firmIdSelected = $_SESSION['setFirmSession'];
//            $selFirmId = $firmIdSelected;
//        } else {
//            $firmIdSelected = $selFirmId;
//        }
//        //End Code To Select FirmId
//        if ($selFirmId == '' || $selFirmId == NULL) {
//            $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='1'";
//        } else {
//            $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='$selFirmId'";
//        }
//        //To display data in this form
//        $resultFirm = mysqli_query($conn, $qSelectFirm);
//        $rowFirm = mysqli_fetch_array($resultFirm);
//        //
//        if ($selFirmId != NULL) {
//            $strFrmId = $selFirmId;
//        } else {
//            $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
//        }
//        //echo '$strFrmId:' . $strFrmId;
//        // Create a view for the datatable
//        //       
//        include 'ogbbstdtview.php';
//        //
//        //
        ?>
        <div id="purchaseReportSubDiv">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                <tr>
                    <td align="left">
                        <img src="<?php echo $documentRoot; ?>/images/sell_purchase24.png" alt=""  onLoad="setScrollIdFun('headerTable')"/>
                    </td>

                    <td class="padLeft5" valign="middle">
                        <div class="itemAddPnLabels12" style="margin-right: 150px;">STOCK LEDGER</div>
                    </td>
                    <td valign="middle" align="right" class="frm-lbl">

                    </td>
                    <td align="center" valign="middle" width="120px">
                        <table>
                            <tr>
                                <td class="textBoxCurve1px backFFFFFF">
                                    <?php
                                    //include 'ommptodaydate.php';
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td align="left" valign="middle">
                        <div style="margin-left:5px;">
                            <?php
//                            $inputId = "stockGoButt";
//                            $inputType = 'submit';
//                            $inputFieldValue = 'GO';
//                            $inputIdButton = "stockGoButt";
//                            $inputNameButton = 'stockGoButt';
//                            $inputTitle = '';
//                            // This is the main class for input flied
//                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
//                            $inputStyle = " ";
//                            $inputLabel = 'GO'; // Display Label below the text box
//                            // This class is for Pencil Icon                                                           
//                            $inputIconClass = '';
//                            $inputPlaceHolder = '';
//                            $spanPlaceHolderClass = '';
//                            $spanPlaceHolder = '';
//                            $inputOnChange = "";
//                            $inputOnClickFun = "javascript:getStockLedgerByDate(document.getElementById('DOBDay').value, 
//                                           document.getElementById('DOBMonth').value, document.getElementById('DOBYear').value);";
//                            $inputKeyUpFun = '';
//                            $inputDropDownCls = '';               // This is the main division class for drop down 
//                            $inputselDropDownCls = '';            // This is class for selection in drop down
//                            $inputMainClassButton = '';           // This is the main division for Button
//                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>
                        </div>
                    </td>

                    <td valign="middle" align="center">
                        <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden" class="blackMess11">
                            <?php include 'omzaajld.php'; ?>
                        </div>
                    </td>

                    <td align="right" valign="middle" class="">
                        <div style="margin-left:35%;">
                            <?php
                            $inputId = "stockbycat";
                            $inputType = 'button';
                            $inputFieldValue = 'STOCK LEDGER REPORT';
                            $inputIdButton = "stockbycat";
                            $inputNameButton = 'stockbycat';
                            $inputTitle = '';
                            // This is the main class for input flied
                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                            $inputStyle = " ";
                            $inputLabel = 'STOCK LEDGER REPORT'; // Display Label below the text box
//
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            $inputPlaceHolder = '';
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputOnChange = "";
                            $inputOnClickFun = 'stockbycat();';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>
                        </div>
                    </td>

                    <!-- START CODE TO ADD OPTION FOR STOCK SHORTFALL REPORT OPTION @AUTHOR:MADHUREE-29JUNE2020 -->
                    <td align="right" valign="middle">
                        <div style="margin-left:20%;">
                            <?php
                            $inputId = "stockShortFallReport";
                            $inputType = 'button';
                            $inputFieldValue = 'STOCK LEDGER REPORT WITH SHORTFALL';
                            $inputIdButton = "stockShortFallReport";
                            $inputNameButton = 'stockShortFallReport';
                            $inputTitle = '';
                            // This is the main class for input flied
                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                            $inputStyle = " ";
                            $inputLabel = 'STOCK LEDGER REPORT WITH SHORTFALL'; // Display Label below the text box
//
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            $inputPlaceHolder = '';
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputOnChange = "";
                            $inputOnClickFun = 'navigatationPanelByFileName("purchaseDetailsSubDiv", "omstockshfreport");';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>
                        </div>
                    </td>
                    <!-- END CODE TO ADD OPTION FOR STOCK SHORTFALL REPORT OPTION @AUTHOR:MADHUREE-29JUNE2020 -->

                    <!-- START CODE TO ADD OPTION FOR PRODUCT WISE STOCK SHORTFALL REPORT OPTION @AUTHOR:MADHUREE-03DEC2020 -->
                    <td align="right" valign="middle">
                        <div>
                            <?php
                            $inputId = "stockShortFallReport";
                            $inputType = 'button';
                            $inputFieldValue = 'STOCK SHORTFALL REPORT';
                            $inputIdButton = "stockShortFallReport";
                            $inputNameButton = 'stockShortFallReport';
                            $inputTitle = '';
                            // This is the main class for input flied
                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                            $inputStyle = " ";
                            $inputLabel = 'STOCK SHORTFALL REPORT'; // Display Label below the text box
//
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            $inputPlaceHolder = '';
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputOnChange = "";
                            $inputOnClickFun = 'navigatationPanelByFileName("purchaseDetailsSubDiv", "omstockprodshreport");';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>
                        </div>
                    </td>
                    <!-- END CODE TO ADD OPTION FOR PRODUCT WISE STOCK SHORTFALL REPORT OPTION @AUTHOR:MADHUREE-03DEC2020 -->

                                <!--                    <td align="right" valign="middle" style="">
                                    <div style="text-align:center;">
                    <?php
//                            $inputId = "stockbyprod";
//                            $inputType = 'button';
//                            $inputFieldValue = 'STOCK LEDGER BY PRODUCT';
//                            $inputIdButton = "stockbyprod";
//                            $inputNameButton = 'stockbyprod';
//                            $inputTitle = '';
//                            // This is the main class for input flied
//                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
//                            $inputStyle = " ";
//                            $inputLabel = 'STOCK LEDGER BY PRODUCT'; // Display Label below the text box
////
//                            // This class is for Pencil Icon                                                           
//                            $inputIconClass = '';
//                            $inputPlaceHolder = '';
//                            $spanPlaceHolderClass = '';
//                            $spanPlaceHolder = '';
//                            $inputOnChange = "";
//                            $inputOnClickFun = "stockbyprod();";
//                            $inputKeyUpFun = '';
//                            $inputDropDownCls = '';               // This is the main division class for drop down 
//                            $inputselDropDownCls = '';            // This is class for selection in drop down
//                            $inputMainClassButton = '';           // This is the main division for Button
//                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                    ?>
                                    </div>
                                </td>-->

                </tr>
                <tr>
                    <td align="center" colspan="9" class="paddingTop4 padBott4">
                        <div class="hrGrey"></div>
                    </td>
                </tr>
            </table>

            <div id="purchaseDetailsSubDiv">
                <table class="width_203mm paddingTop10" border="0" cellspacing="0" cellpadding="0" align="center">
                    <?php
//                    if (isset($_GET['selFirmId'])) {
//                        $selFirmId = $_GET['selFirmId'];
//                    } else {
//                        //if not selected assign session firm @AUTHOR: SANDY10JUL13
//                        $selFirmId = $_SESSION['setFirmSession'];
//                    }
//                    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
//                        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
//                    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
//                        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
//                    }
//                    if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
//                        $resFirmCount = mysqli_query($conn, $qSelFirmCount);
//                        $strFrmId = '0';
//                        //Set String for Public Firms
//                        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
//                            $strFrmId = $strFrmId . ",";
//                            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
//                        }
//                    } else {
//                        $strFrmId = $selFirmId;
//                    }
//                    //Data Table Main Columns
//                    include 'omdatatablesUnset.php';
//                    //
//                    $dataTableColumnsFields = array(
//                        array('dt' => 'FIRM'),
//                        array('dt' => 'METAL TYPE'),
//                        array('dt' => 'CATEGORY'),
//                        // hide column here because not display (prob name column) in stock leader by category :@author:sagarl(26jun-18)
//                        //array('dt' => 'PROD NAME'),
//                        array('dt' => 'OPEN'),
//                        array('dt' => 'IN'),
//                        array('dt' => 'OUT'),
//                        array('dt' => 'SELL'),
//                        array('dt' => 'CLOSING')
//                    );
//                    //
//                    $dataTableColumnsFieldsInside = array(
//                        array('dt' => 'QTY'),
//                        array('dt' => 'GT'),
//                        array('dt' => 'NT'),
//                    );
//                    //
//                    if ($_SESSION['sessionProdName'] == 'OMRETL')
//                        array_splice($dataTableColumnsFields, 8, 2);
//                    //
//                    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//                    $_SESSION['dataTableColumnsFieldsInside'] = $dataTableColumnsFieldsInside; // No Change
//                    //
//                    // Table Parameters
//                    $_SESSION['tableName'] = 'temp_view'; // Table Name
//                    $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
//                    // DB Table Columns Parameters 
//                    $dbColumnsArray = array(
//                        "firm_name",
//                        "sttr_metal_type",
//                        "sttr_item_category",
//                        // hide column here because not display (sttr_item_name column) in stock leader by category :@author:sagarl(26jun-18)      
//                        //"sttr_item_name",
//                        "open_qty",
//                        "open_gswt",
//                        "open_ntwt",
//                        "in_qty",
//                        "in_gswt",
//                        "in_ntwt",
//                        "out_qty",
//                        "out_gswt",
//                        "out_ntwt",
//                        "sell_qty",
//                        "sell_gswt",
//                        "sell_ntwt",
//                        "close_qty",
//                        "close_gswt",
//                        "close_ntwt"
//                    );
//                    //
//                    if ($_SESSION['sessionProdName'] == 'OMRETL')
//                        array_splice($dbColumnsArray, 8, 2);
//                    //    print_r($dbColumnsArray);
//                    //   echo count($dbColumnsArray)."=".count($dataTableColumnsFields);die;
//                    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
//                    $_SESSION['multipleColCounter'] = 3;
//
//                    if ($_SESSION['sessionProdName'] == 'OMRETL') {
//                        $_SESSION['dtSumColumn'] = '1,2,3';
//                    } else {
//                        $_SESSION['dtSumColumn'] = '';
//                    }
//                    $_SESSION['dtSortColumn'] = '1,2';
//                    $_SESSION['dtDeleteColumn'] = '';
//                    $_SESSION['dtASCDESC'] = 'desc,desc';
//                    //
//                    // Extra direct columns we need pass in SQL Query
//                    $_SESSION['sqlQueryColumns'] = "";
//                    //
//                    ////start code to include all session@auth:ATHU29may17
//                    //
//                    $_SESSION['colorfulColumn'] = "";
//                    $_SESSION['colorfulColumnCheck'] = '';
//                    $_SESSION['colorfulColumnTitle'] = '';
//                    //
//                    // On Click Function Parameters
//                    $_SESSION['onclickColumnImage'] = "";
//                    $_SESSION['onclickColumn'] = ""; // On which column
//                    $_SESSION['onclickColumnId'] = "";
//                    $_SESSION['onclickColumnValue'] = "";
//                    $_SESSION['onclickColumnFunction'] = "";
//                    $_SESSION['onclickColumnFunctionPara1'] = "";
//                    $_SESSION['onclickColumnFunctionPara2'] = "";
//                    $_SESSION['onclickColumnFunctionPara3'] = "";
//                    $_SESSION['onclickColumnFunctionPara4'] = "";
//                    $_SESSION['onclickColumnFunctionPara5'] = "";
//                    $_SESSION['onclickColumnFunctionPara6'] = "";
//                    // Delete Function Parameters
//                    $_SESSION['deleteColumn'] = ""; // On which column
//                    $_SESSION['deleteColumnId'] = "";
//                    $_SESSION['deleteColumnValue'] = "";
//                    $_SESSION['deleteColumnFunction'] = "";
//                    $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
//                    $_SESSION['deleteColumnFunctionPara2'] = "";
//                    $_SESSION['deleteColumnFunctionPara3'] = "";
//                    $_SESSION['deleteColumnFunctionPara4'] = "";
//                    $_SESSION['deleteColumnFunctionPara5'] = "";
//                    $_SESSION['deleteColumnFunctionPara6'] = "";
//                    //
//                    // Where Clause Condition 
//                    $_SESSION['tableWhere'] = "";
//                    // Table Joins
//                    $_SESSION['tableJoin'] = "";
//                    // Data Table Main File
//                    include 'omdatatables.php';
                    ?>
            </div>
            <?php
            if ($searchBy == 'category') {
                include 'omstockshfreport.php';
            } else {
                include 'omstockshfreport.php';
            }
            ?>
        </div>
    </div>
<?php } ?>