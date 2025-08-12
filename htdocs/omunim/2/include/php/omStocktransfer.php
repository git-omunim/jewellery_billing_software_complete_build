<?php
/*
 * **************************************************************************************
 * @Description: STOCK TRANSFER FROM ONE FIRM TO OTHER.
 * **************************************************************************************
 *
 * Created on OCT 07, 2019 11:24:58 AM 
 * **************************************************************************************
 * @FileName: omStocktransfer.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 * *****************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:03JUL17
 *  AUTHOR: SANTOSH
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 2.6.14
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
//include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpsbac.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId'];
?>
<div id="stockTransferMainDiv">
    <?php
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START TO CODE TO MODIFICATION FOR STOCK TRANSFER PANEL @AUTHOR:MADHUREE-15APRIL2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
    $sessionOwnerId = $_SESSION['sessionOwnerId'];
    $conn = $GLOBALS['conn'];
    $currentDateTime = $GLOBALS['currentDateTime'];
    $size = '100%';
    $font_size = '12px';
    $showStockTransfer = $_GET['divMainMiddlePanel'];
    $itemId = $_POST['itemId'];
    //
    //echo '$itemId == ' . $itemId . '<br />';
    //
    if ($panelName == '') {
        $panelName = $_GET['panelName'];
    }
    //
    if ($custId == '') {
        $custId = $_GET['custId'];
    }
    //
    if ($user_id == '') {
        $user_id = $_GET['user_id'];
    }
    //
    if ($user_uid == '') {
        $user_uid = $_GET['user_uid'];
    }
    //
    if ($user_id != NULL && $user_id != '') {
        parse_str(getTableValues("SELECT * FROM user where user_id = '$user_id'"));
    }

    if ($_SESSION['sessionProdName'] == 'OMRETL') {
        $stockIndicatorType = 'RetailStock';
        $stockLabel = 'STOCK';
    } else {
        $stockIndicatorType = 'imitation';
        $stockLabel = 'IMITATION';
    }

    $messDiv = $_GET['messDiv'];
    $panelName = $_GET['panelName'];
    $stockType = $_GET['stockType'];
    $listType = $_GET['listType'];


    if ($panelName == 'FineStock' && $_SESSION['sessionProdName'] == 'OMRETL')
        $panelName = 'Imitation';

    if ($panelName == 'FineStock' && $_SESSION['sessionOwnIndStr'][20] == 'N')
        $panelName = 'Imitation';


    if ($_SESSION['sessionOwnIndStr'][19] == 'Y') {
        $stockDelete = 'Y';
    } else {
        $stockDelete = 'N';
    }

    $itemprid = preg_replace('/[0-9]+/', '', $itemId);
    $itempostid = preg_replace('/[a-zA-Z]/', '', $itemId);

    //echo '$itemprid == ' . $itemprid . '<br />';
    //echo '$itempostid == ' . $itempostid . '<br />';
    
    $conditionStr = "sttr_item_pre_id='$itemprid' and sttr_item_id='$itempostid'";
    
    //echo '$conditionStr == ' . $conditionStr . '<br />';
    //
    ?>
    <table width="100%" border="0">
        <tr>
            <td>
                <div class="textLabelHeading">
                    <img src="<?php echo $documentRoot; ?>/images/transfer24.png" alt="">
                    STOCK TRANSFER PANEL
                </div>
            </td>
        </tr>
        <tr>
            <td class="paddingTopBott5" colspan="15" align="left">
        <div class="hrGrey"></div>
    </td>
        </tr>
    </table>

    <table align="center" border="0" cellspacing="0" cellpadding="2" width="50%" align="center">
        <tr>
            <td align="center" valign="middle" class="textBoxCurve2px margin2pxAll backFFFFFF">
                <input id="srchItemId" name="srchItemId" type="text"  placeholder="PRODUCT ID / BARCODE " 
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   searchItemForStockTransfer(document.getElementById('srchItemId').value);
                                   return false;
                               }"
                       autocomplete="off" spellcheck="false" class="textLabel16CalibriNormalGreyMiddle border-no" 
                       size="40" maxlength="64"/>
                &nbsp;
                
                <input id="srchItemPreId" name="srchItemPreId" type="hidden"/>
                <input id="srchItemPostId" name="srchItemPostId" type="hidden"/>

                <?php if ($CustomerAddedHome == 'CustomerAdded' || $panelName == 'FINE_JEWELLERY_SELL') { ?>
                    <img src="<?php echo $documentRoot; ?>/images/sell_Purchase16.png" width="0.01px" 
                         onload="document.getElementById('srchItemId').focus();"/>
                <?php } ?> 

            </td>
            <?php
            if ($panelName == 'orderPickStock') {
                $invoice = $preOrdInvNo . ';' . $postOrdInvNo;
            }
            ?>
            <td align="left" valign="middle">
                <!---Start to Changes button----->
                <div style="height: 38px">
                    <?php
                    $inputId = "srchItemButt";
                    $inputType = 'button';
                    $inputFieldValue = 'GO';
                    $inputIdButton = "srchItemButt";
                    $inputNameButton = 'srchItemButt';
                    $inputTitle = '';
                    //
                    // This is the main class for input flied
                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                    $inputStyle = "height:42px;width:60px;margin-top:-2px;margin-bottom:0;border-radius:0 5px 5px 0!important;margin-left:-8px;font-size:16px";
                    $inputLabel = 'GO'; // Display Label below the text box
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = '';
                    $inputPlaceHolder = '';
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    $inputOnChange = "";
                    $inputOnClickFun = 'javascript:searchItemForStockTransfer(document.getElementById("srchItemId").value);
                                       return false;';
                    $inputKeyUpFun = '';
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                    ?>
                </div>
                <!---End to Changes button----->
            </td>

            <td align="left" valign="middle"></td>
            <td align="left" valign="middle"></td>

        </tr>
    </table>
    <div id="stockPanelPurchaseList" style="margin-top: 1%;">
        <table width="100%" border="0">
            <tr>
            <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
            </tr>
        </table>
        <?php
        /******** Start Code To GET Firm Details ********* */
        if (isset($_GET['selFirmId'])) {
            $selFirmId = $_GET['selFirmId'];
        } else {
            //if not selected assign session firm @AUTHOR: SANDY10JUL13
            $selFirmId = $_SESSION['setFirmSession'];
        }
        if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
            $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
        } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
            $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
        }
        if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
            $resFirmCount = mysqli_query($conn, $qSelFirmCount);
            $strFrmId = '0';
            //Set String for Public Firms
            while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                $strFrmId = $strFrmId . ",";
                $strFrmId = $strFrmId . "$rowFirm[firm_id]";
            }
        } else {
            $strFrmId = $selFirmId;
        }
        //
        /****** End Code To GET Firm Details ********* */
        include 'omdatatablesUnset.php';
        
        if ($_SESSION['sessionProdName'] == 'OMRETL') {
            //Data Table Main Columns
            $dataTableColumnsFields = array(
            array('dt' => 'PROD ID'),
            array('dt' => 'METAL'),
            array('dt' => 'CATEG'),
            array('dt' => 'NAME'),
            array('dt' => 'QTY'),
            array('dt' => 'VAL'),
            array('dt' => 'E.FIRM'),
            array('dt' => 'T.FIRM')
            );
        } else {
            //Data Table Main Columns
            $dataTableColumnsFields = array(
            array('dt' => 'PROD ID'),
            array('dt' => 'METAL'),
            array('dt' => 'CATEG'),
            array('dt' => 'NAME'),
            array('dt' => 'QTY'),
            array('dt' => 'GS WT'),
            array('dt' => 'NT WT'),
            array('dt' => 'VAL'),
            array('dt' => 'E.FIRM'),
            array('dt' => 'T.FIRM')
            );
        }
        
        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
        
        // Table Parameters
        $_SESSION['tableName'] = 'stock_transaction'; // Table Name
        $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
        
        if ($_SESSION['sessionProdName'] == 'OMRETL') {
            // DB Table Columns Parameters 
            $dbColumnsArray = array(
            "CONCAT(sttr_item_pre_id,'',CAST(sttr_item_id AS UNSIGNED))",
            "sttr_metal_type",
            "sttr_item_category",
            "sttr_item_name",
            "if((sttr_final_quantity = '' OR sttr_final_quantity IS NULL),sttr_quantity,sttr_final_quantity)",    
            "sttr_valuation",
            "f.firm_name",
            "sttr_id"
            );
        } else {
            // DB Table Columns Parameters 
            $dbColumnsArray = array(
            "CONCAT(sttr_item_pre_id,'',CAST(sttr_item_id AS UNSIGNED))",
            "sttr_metal_type",
            "sttr_item_category",
            "sttr_item_name",
            "if((sttr_final_quantity = '' OR sttr_final_quantity IS NULL),sttr_quantity,sttr_final_quantity)",
            "ROUND(if((sttr_final_gs_weight = '' OR sttr_final_gs_weight IS NULL),sttr_gs_weight,sttr_final_gs_weight),2)",
            "ROUND(if((sttr_final_nt_weight = '' OR sttr_final_nt_weight IS NULL),sttr_nt_weight,sttr_final_nt_weight),2)",
            "sttr_valuation",
            "f.firm_name",
            "sttr_id"
            );
        }
        
        $_SESSION['dbColumnsArray'] = $dbColumnsArray;

        $_SESSION['sqlQueryColumns'] = "sttr_id,";

        // Start code to include all session
        $_SESSION['colorfulColumn'] = "";
        $_SESSION['colorfulColumnCheck'] = '';
        $_SESSION['colorfulColumnTitle'] = '';

        // On Click Function Parameters
        $_SESSION['onclickColumnImage'] = "";
        
        if ($panelName == 'Stock' || $panelName == 'FineStock') {
            $_SESSION['onclickColumn'] = "sttr_item_pre_id"; // On which column
        } else {
            $_SESSION['onclickColumn'] = "CONCAT(sttr_item_pre_id,COALESCE(sttr_item_id, ''))"; // On which column  
        }
        
        $_SESSION['onclickColumnId'] = "sttr_id";
        $_SESSION['onclickColumnValue'] = "sttr_id";
        $_SESSION['onclickColumnFunction'] = "showStockItemDetailsGeneralDiv";
        $_SESSION['onclickColumnFunctionPara1'] = "sttr_id";
        $_SESSION['onclickColumnFunctionPara2'] = "sttr_stock_type";
        $_SESSION['onclickColumnFunctionPara3'] = $panelName;
        $_SESSION['onclickColumnFunctionPara4'] = "";
        $_SESSION['onclickColumnFunctionPara5'] = "";
        $_SESSION['onclickColumnFunctionPara6'] = "";

        // On Print Function Parameters

        $_SESSION['onprintColumnImage'] = "tag16.png";
        $_SESSION['onprintColumn'] = "sttr_st_id"; // On which column
        $_SESSION['onprintColumnId'] = "sttr_id";
        $_SESSION['onprintColumnValue'] = "sttr_id";
        $_SESSION['onprintColumnFunction'] = "addImitationItemTag";
        $_SESSION['onprintColumnFunctionPara1'] = "sttr_st_id";
        $_SESSION['onprintColumnFunctionPara2'] = "sttr_id";
        $_SESSION['onprintColumnFunctionPara3'] = "ListPanel";
        $_SESSION['onprintColumnFunctionPara4'] = "$documentRoot";
        $_SESSION['onprintColumnFunctionPara5'] = "";
        $_SESSION['onprintColumnFunctionPara6'] = "";

        // Delete Function Parameters

        $_SESSION['deleteColumn'] = "sttr_id"; // On which column
        $_SESSION['deleteColumnId'] = "sttr_id";
        $_SESSION['deleteColumnValue'] = "sttr_id";
        $_SESSION['deleteColumnFunction'] = "deletePurchaseList";
        $_SESSION['deleteColumnFunctionPara1'] = $panelName; // Panel Name
        $_SESSION['deleteColumnFunctionPara2'] = "sttr_id";
        $_SESSION['deleteColumnFunctionPara3'] = "sttr_stock_type";
        $_SESSION['deleteColumnFunctionPara4'] = "";
        $_SESSION['deleteColumnFunctionPara5'] = "";
        $_SESSION['deleteColumnFunctionPara6'] = "";


        $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_indicator IN ('stock', '$stockIndicatorType') "
                                . "and sttr_stock_type IN ('retail') and sttr_status NOT IN ('DELETED','NotDelFromStock') "
                                . "and sttr_transaction_type IN ('EXISTING','PURONCASH','TAG','PURBYSUPP') "
                                . "and (sttr_final_quantity IS NULL || sttr_final_quantity NOT IN(0)) and sttr_quantity NOT IN (0) "
                                . "and $conditionStr";

        //echo 'tableWhere == ' . $_SESSION['tableWhere'] . '<br />';
        
        // Table Joins
        $_SESSION['tableJoin'] = " LEFT JOIN firm AS f ON sttr_firm_id = f.firm_id";

        // Data Table Main FiINNERle
        include 'omdatatables1.php';
        ?>
    </div>
    <table width="100%">
        <tr>
            <td>
                <div class="hrGrey"></div>
            </td>
        </tr>
    </table>
    <?php
    //
    include 'omstftransfer.php';
    //
    //include 'omStockFirmTransfer.php';
    //
    ?>
    <br><br><br>
    <table width="100%">
        <tr>
            <td>
                <div class="hrGrey"></div>
            </td>
        </tr>
    </table>
    <?php
    if ($showStockTransfer == "stockTransfer") {
        include 'omstmsg.php';
    }
    $transCount = noOfRowsCheck('sttr_id', 'stock_transaction', "sttr_item_code='$itemId' and sttr_stock_trans_history IS NOT NULL");
    if ($transCount > 0) {
        ?>
        <table align="center">
            <tr align="center">
                <td class="ff_tnr fs_18 brown" align="center">
                    Stock Transfer History :
                </td>
            </tr>
        </table>
        <br>

        <table align="center" border="1 px solid black" cellspacing="0" cellpadding="0" width="60%">
            <tr>
                <th width="15%" class="ff_calibri fs_14 brown fw_b" style="background-color: #F9C99A"><center>Date & Time</center></th>
            <th width="45%" class="ff_calibri fs_14 brown fw_b" style="background-color: #F9C99A"><center>Comments</center></th>
            </tr>

            <?php
            $qSelAllStTransHis = "SELECT * FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_item_code='$itemId' and sttr_stock_trans_history IS NOT NULL ORDER BY sttr_id desc";
            $resAllStTransHis = mysqli_query($conn, $qSelAllStTransHis);
            //echo $qSelAllStTransHis;
            $rowAllStTransHis = mysqli_fetch_array($resAllStTransHis, MYSQLI_ASSOC);
            $History = $rowAllStTransHis['sttr_stock_trans_history'];
            $ItemCode = $rowAllStTransHis['sttr_item_code'];
            $strTransHisTime = $rowAllStTransHis['sttr_trans_date'];
            $stCurrentFirm = $rowAllStTransHis['sttr_firm_id'];
            parse_str(getTableValues("SELECT firm_name from firm where firm_id='$stCurrentFirm'"));
            $StockFirmHistory = explode('#', $History);
            $stTransHist = explode('#', $strTransHisTime);
            //print_r($StockFirmHistory);
            $prevFirm = end($StockFirmHistory);
            $prevdate = end($stTransHist);
            $stTransFirmHist = array_reverse($StockFirmHistory);
            $stTransDateHist = array_reverse($stTransHist);
            ?>
            <tr>
                <td align="center" class="ff_calibri fs_14">
                    <?php echo $prevdate; ?>
                </td>
                <td align="center" class="ff_calibri fs_14">
                    <?php echo 'Item Code : ' . $ItemCode . '&nbsp;&nbsp;' . '( Previous Firm : ' . $prevFirm . '&nbsp;&nbsp;' . 'and Current Firm : ' . $firm_name . ' )'; ?>
                </td>
            </tr>
            <?php
            $firmHistarrayLength = count($stTransFirmHist);
            $dateHistarrayLength = count($stTransDateHist);
            //echo $firmHistarrayLength;
            $firmHist = 1;
            $dateHist = 1;
//        print_r($stTransFirmHist);
//        print_r($stTransDateHist);
            ?>
            <tr>
                <?php while ($firmHist < ($firmHistarrayLength - 1) && $dateHist < ($dateHistarrayLength - 1)) { ?>
                    <td align="center" class="ff_calibri fs_14">
                        <?php echo $stTransDateHist[$dateHist]; ?>
                    </td>
                    <td align="center" class="ff_calibri fs_14">
                        <?php echo 'Item Code : ' . $ItemCode . '&nbsp;&nbsp;' . '( Previous Firm : ' . $stTransFirmHist[$firmHist] . '&nbsp;&nbsp;' . 'and New Firm : ' . $stTransFirmHist[$firmHist - 1] . ' )'; ?>
                    </td>
                </tr>
                <?php
                $firmHist++;
                $dateHist++;
            }
        }
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END TO CODE TO MODIFICATION FOR STOCK TRANSFER PANEL @AUTHOR:MADHUREE-15APRIL2020
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        ?>
    </table>
    <br>
</div>