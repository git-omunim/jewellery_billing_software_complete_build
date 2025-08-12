<?php
/*
 * **************************************************************************************
 * @tutorial: unvisited customer datatable modal
 * **************************************************************************************
 *
 * Created on Feb 02, 2021 10:32:36 AM
 *
 * @FileName: omunvisitcustremind.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
//include 'ommpemac.php';
?>
<div class="row reminder-table" id="reminder-table">
    <h4 style="font-size: 20px; text-transform: uppercase; text-align: left; margin-left: 15px; position: absolute;">Unvisited Customer</h4>

    <?php
    $panelName = $_REQUEST['unvisitCustPanelDiv'];

    if ($panelName == '3-months' || $panelName == '') {
        ?>
        <button onclick="unvisitCustRemind('3month')" class="btn" style="background-color: #428BCA; color: #FFFFFF; font-family: inherit; font-size: 13px; float: right; padding: 0px 5px; height: 22px; position: absolute; right: 378px">Send All</button>
        <?php
    } elseif ($panelName == '6-months') {
        ?>
        <button onclick="unvisitCustRemind('6month')" class="btn" style="background-color: #428BCA; color: #FFFFFF; font-family: inherit; font-size: 13px; float: right; padding: 0px 5px; height: 22px; position: absolute; right: 378px">Send All</button>
        <?php
    } elseif ($panelName == '9-months') {
        ?>
        <button onclick="unvisitCustRemind('9month')" class="btn" style="background-color: #428BCA; color: #FFFFFF; font-family: inherit; font-size: 13px; float: right; padding: 0px 5px; height: 22px; position: absolute; right: 378px">Send All</button>
        <?php
    } elseif ($panelName == '12-months') {
        ?>
        <button onclick="unvisitCustRemind('12month')" class="btn" style="background-color: #428BCA; color: #FFFFFF; font-family: inherit; font-size: 13px; float: right; padding: 0px 5px; height: 22px; position: absolute; right: 378px">Send All</button>
        <?php
    }
    ?>


    <SELECT id="unvisitCustSmsTemplate" name="unvisitCustSmsTemplate" class="custom-sms-dropdown bg-white" style="height: 22px; font-size: 13px; color: #000000; position: absolute; right: 180px"> 
        <OPTION  VALUE="NotSelected">SELECT SMS TEMPLATE</OPTION>
        <?php
        $qSelPerFirm = "SELECT smtp_sub FROM sms_templates where smtp_own_id='$_SESSION[sessionOwnerId]'";
        $resPerFirm = mysqli_query($conn, $qSelPerFirm);
        while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
            if ($rowPerFirm['smtp_sub'] == $setUnvisitCustSmsTemplate) {
                $setUnvisitCustTempSel = "selected";
            }
            echo "<OPTION  VALUE=" . "\"{$rowPerFirm['smtp_sub']}\"" . " class=" . "\"content-mess-blue\"" . " $setUnvisitCustTempSel>{$rowPerFirm['smtp_sub']}</OPTION>";
            $setUnvisitCustTempSel = "";
        }
        ?>
    </SELECT>
    <span style="font-size: 13px; color: #000000; position: absolute; right: 122px; margin-top: -5px">
        <?php
        $inputId = "submit";
        $inputType = 'submit';
        $inputFieldValue = 'Submit';
        $inputIdButton = "submit";
        $inputNameButton = '';
        $inputTitle = '';
        // This is the main class for input flied
        $inputFieldClass = 'btn ' . $om_btn_style;
        $inputStyle = " ";
        $inputLabel = 'Submit'; // Display Label below the text box
        //
        // This class is for Pencil Icon                                                            
        $inputIconClass = '';
        $inputPlaceHolder = '';
        $spanPlaceHolderClass = '';
        $spanPlaceHolder = '';
        $inputOnChange = "";
        $inputOnClickFun = 'setLayoutFieldInDb("unvisitCustSmsTemplate", document.getElementById("unvisitCustSmsTemplate").value);';
        $inputKeyUpFun = '';
        $inputDropDownCls = '';        // This is the main division class for drop down 
        $inputselDropDownCls = '';     // This is class for selection in drop down
        $inputMainClassButton = '';    // This is the main division for Button
        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
        ?>
    </span>

    <select name="months" onchange="getUnvisitCustDiv(this.value)" id="customer-dropdown" class="custom-dropdown bg-white" style="margin-right: 15px; height: 22px; font-size: 13px; color: #000; margin-bottom: 15px;">
        <option value="">SELECT MONTH</option>
        <option value="3-months" <?php
        if ($panelName == '3-months' || $panelName == '') {
            echo 'selected';
        }
        ?>>3 Months</option>
        <option value="6-months" <?php
        if ($panelName == '6-months') {
            echo 'selected';
        }
        ?>>6 Months</option>
        <option value="9-months" <?php
        if ($panelName == '9-months') {
            echo 'selected';
        }
        ?>>9 Months</option>
        <option value="12-months" <?php
        if ($panelName == '12-months') {
            echo 'selected';
        }
        ?>>1 Year</option>
    </select>
</div>    


<div id="userListDiv">
    <?php
    /*     * ******* Start Code To GET Firm Details ********* */

    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm
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
    /*     * ******* End Code To GET Firm Details ********* */
    include 'omdatatablesUnset.php';
    //Data Table Main Columns
    if ($panelName == '3-months' || $panelName == '') {
        $dataTableColumnsFields = array(
            array('dt' => 'CUSTOMER ID'),
            array('dt' => 'CUSTOMER NAME'),
            array('dt' => 'FIRM'),
            array('dt' => 'CITY'),
            array('dt' => 'LAST VISIT DATE'),
            array('dt' => 'SEND SMS'),
            array('dt' => 'SEND WHATSAPP'),
        );
    } else if ($panelName == '6-months') {
        $dataTableColumnsFields = array(
            array('dt' => 'CUSTOMER ID'),
            array('dt' => 'CUSTOMER NAME'),
            array('dt' => 'FIRM'),
            array('dt' => 'CITY'),
            array('dt' => 'LAST VISIT DATE'),
            array('dt' => 'SEND SMS'),
            array('dt' => 'SEND WHATSAPP'),
        );
    } else if ($panelName == '9-months') {
        $dataTableColumnsFields = array(
            array('dt' => 'CUSTOMER ID'),
            array('dt' => 'CUSTOMER NAME'),
            array('dt' => 'FIRM'),
            array('dt' => 'CITY'),
            array('dt' => 'LAST VISIT DATE'),
            array('dt' => 'SEND SMS'),
            array('dt' => 'SEND WHATSAPP'),
        );
    } else if ($panelName == '12-months') {
        $dataTableColumnsFields = array(
            array('dt' => 'CUSTOMER ID'),
            array('dt' => 'CUSTOMER NAME'),
            array('dt' => 'FIRM'),
            array('dt' => 'CITY'),
            array('dt' => 'LAST VISIT DATE'),
            array('dt' => 'SEND SMS'),
            array('dt' => 'SEND WHATSAPP'),
        );
    }

    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // Table Parameters
    $_SESSION['tableName'] = 'user_transaction_invoice'; // Table Name
    $_SESSION['tableNamePK'] = 'utin_id'; // Primary Key
    // DB Table Columns Parameters 
    if ($panelName == '3-months' || $panelName == '') {
        $dbColumnsArray = array(
            "CONCAT(u.user_pid,COALESCE(u.user_uid, ''))",
            "CONCAT(u.user_fname,' ',u.user_lname)",
            "f.firm_name",
            "u.user_city",
            "STR_TO_DATE(utin_date,'%d %b %Y')",
            "u.user_prod_key",
            "u.user_mobile",
        );
    } else if ($panelName == '6-months') {
        $dbColumnsArray = array(
            "CONCAT(u.user_pid,COALESCE(u.user_uid, ''))",
            "CONCAT(u.user_fname,' ',u.user_lname)",
            "f.firm_name",
            "u.user_city",
            "STR_TO_DATE(utin_date,'%d %b %Y')",
            "u.user_prod_key",
            "u.user_mobile",
        );
    } else if ($panelName == '9-months') {
        $dbColumnsArray = array(
            "CONCAT(u.user_pid,COALESCE(u.user_uid, ''))",
            "CONCAT(u.user_fname,' ',u.user_lname)",
            "f.firm_name",
            "u.user_city",
            "STR_TO_DATE(utin_date,'%d %b %Y')",
            "u.user_prod_key",
            "u.user_mobile",
        );
    } else if ($panelName == '12-months') {
        $dbColumnsArray = array(
            "CONCAT(u.user_pid,COALESCE(u.user_uid, ''))",
            "CONCAT(u.user_fname,' ',u.user_lname)",
            "f.firm_name",
            "u.user_city",
            "STR_TO_DATE(utin_date,'%d %b %Y')",
            "u.user_prod_key",
            "u.user_mobile",
        );
    }

    $_SESSION['dbColumnsArray'] = $dbColumnsArray;
    $_SESSION['onprintColumnImage'] = "sms16.png";
    $_SESSION['onprintColumn'] = "u.user_prod_key"; // On which column
    $_SESSION['onprintColumnId'] = "u.user_prod_key";
    $_SESSION['onprintColumnValue'] = "";
    $_SESSION['onprintColumnFunction'] = "unvisitCustIndi";
    $_SESSION['onprintColumnFunctionPara1'] = "utin_id";
    $_SESSION['onprintColumnFunctionPara2'] = "";
    $_SESSION['onprintColumnFunctionPara3'] = "";


    $_SESSION['sqlQueryColumns'] = "utin_id,";

    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = '';
    $_SESSION['exportOptions'] = "N";

    //start code to include all session
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';

    // On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "u.user_mobile"; // On which column
    $_SESSION['onclickColumnId'] = "u.user_mobile";
    $_SESSION['onclickColumnValue'] = "u.user_mobile";
    $_SESSION['onclickColumnFunction'] = "unvisitindiwa";
    $_SESSION['onclickColumnFunctionPara1'] = "utin_id";
    $_SESSION['onclickColumnFunctionPara2'] = "";
    $_SESSION['onclickColumnFunctionPara3'] = "";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
    //
    $_SESSION['popupFunctionLink'] = "";
    $_SESSION['popupColumn'] = "";
    $_SESSION['popupFunctionWidth'] = "";
    $_SESSION['popupFunctionHeight'] = "";
    $_SESSION['popupFunctionPara1'] = "";
    $_SESSION['popupFunctionPara2'] = "";
    $_SESSION['popupFunctionPara3'] = "";
    $_SESSION['popupFunctionPara4'] = "";
    $_SESSION['popupFunctionPara5'] = "";
    $_SESSION['popupFunctionPara6'] = "";
    //
    // Extra direct columns we need pass in SQL Query
    if ($panelName == '3-months' || $panelName == '') {
        $_SESSION['tableWhere'] = "UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < UNIX_TIMESTAMP(DATE(NOW()) - INTERVAL 3 MONTH)";
    } else if ($panelName == '6-months') {
        $_SESSION['tableWhere'] = "UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < UNIX_TIMESTAMP(DATE(NOW()) - INTERVAL 6 MONTH)";
    } else if ($panelName == '9-months') {
        $_SESSION['tableWhere'] = "UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < UNIX_TIMESTAMP(DATE(NOW()) - INTERVAL 9 MONTH)";
    } else if ($panelName == '12-months') {
        $_SESSION['tableWhere'] = "UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < UNIX_TIMESTAMP(DATE(NOW()) - INTERVAL 1 YEAR)";
    }

    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON utin_firm_id = f.firm_id "
            . "LEFT JOIN user AS u ON utin_user_id = u.user_id";

    // Data Table Main File
    include 'omdatatables.php';
    ?>
</div>
<div id="unvisitCust"></div>
