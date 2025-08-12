<?php
/*
 * **************************************************************************************
 * @tutorial: UDHAAR CUSTOMER LIST
 * **************************************************************************************
 * 
 * Created on OCT 04, 2017 12:44:13 AM
 *
 * @FileName: omuucclt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2016 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2016 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:s
 *
 */
?>

<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<div id="udhharListDiv">
    <table border="0" cellspacing="0" cellpadding="1" width="100%">
        <tr>
            <td align="left" colspan="14">
                <table border="0" cellspacing="0" cellpadding="1" width="100%">
                    <tr>
                        <td valign="middle" align="left">
                            <div class="main_link_orange">UDHAAR CUSTOMER LIST
                                <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />  
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" valign="middle">
                <div id="messDisplayDiv"></div>
                <div class="analysis_div_rows main_link_red_12">
                    <?php if ($showDiv == 'Settled') { ?>
                        <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ This Transaction Is Settled, You Can Not Delete This Transaction ~ </div>
                    <?php } ?>

                </div>
            </td>
        </tr>
    </table>
    <?php
//
    if ($userId == '') {
        $userId = $_GET['userId'];
    }
    echo $userId;
//
    $utinType = $_GET['utinType'];
    if ($utinType == '') {
        $utinType = "OnPurchase";
    }
//
    ?>
    <?php
    /*     * *********** Start Code To GET Firm Details ********* */
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
include 'omdatatablesUnset.php';
//Data Table Main Columns
    $dataTableColumnsFields = array(
        array('dt' => 'NO'),
        array('dt' => 'TOT AMOUNT'),
        array('dt' => 'AMT LEFT'),
        array('dt' => 'GD(BAL)'),
        array('dt' => 'SL(BAL)'),
        array('dt' => 'CUST NAME'),
        array('dt' => 'FIRM NAME'),
        array('dt' => 'MOB NO'),
        array('dt' => 'CITY'),
        array('dt' => 'UDHAAR TYPE')
    );
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
//
// Table Parameters
    $_SESSION['tableName'] = 'user_transaction_invoice as a'; // Table Name
    $_SESSION['tableNamePK'] = 'a.utin_id'; // Primary Key
    //
    //
// DB Table Columns Parameters 
    $dbColumnsArray = array(
        "u.user_id",
        "ROUND(SUM(utin_total_amt),2)",
        "ROUND((SUM(utin_total_amt)-SUM(ifnull(utin_total_amt_deposit,0))),2)",
        "ROUND(SUM(ifnull(utin_gd_due_wt,0)),2)",
        "ROUND(SUM(ifnull(utin_sl_due_wt,0)),2)", // CONCAT FATHER NAME @RATNAKAR11JAN2018
        "CONCAT(u.user_fname,' ',substr(u.user_father_name,2),' ',u.user_lname)",
        "f.firm_name",
        "u.user_mobile",
        "u.user_city",
        "utin_type"
    );
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '1,2';
    $_SESSION['dtSortColumn'] = '2,1';
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtASCDESC'] = 'desc,desc';
//
// Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "a.utin_id,a.utin_user_id,u.user_id,";
//
////start code to include all session@auth:ATHU29may17
//
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
//
// On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "CONCAT(u.user_fname,' ',substr(u.user_father_name,2),' ',u.user_lname)"; // On which column
    $_SESSION['onclickColumnId'] = "a.utin_user_id";
    $_SESSION['onclickColumnValue'] = "a.utin_user_id";
    $_SESSION['onclickColumnFunction'] = "showCustUdhaarDetails";
    $_SESSION['onclickColumnFunctionPara1'] = "a.utin_id";
    $_SESSION['onclickColumnFunctionPara2'] = "u.user_id";
    $_SESSION['onclickColumnFunctionPara3'] = "";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";

// Delete Function Parameters
    $_SESSION['deleteColumn'] = "a.utin_id"; // On which column
    $_SESSION['deleteColumnId'] = "a.utin_id";
    $_SESSION['deleteColumnValue'] = "a.utin_id";
    $_SESSION['deleteColumnFunction'] = "deleteAllTransactionList";
    $_SESSION['deleteColumnFunctionPara1'] = "AllTransactionList"; // Panel Name
    $_SESSION['deleteColumnFunctionPara2'] = "a.utin_id";
    $_SESSION['deleteColumnFunctionPara3'] = "a.utin_transaction_type";
    $_SESSION['deleteColumnFunctionPara4'] = "a.utin_owner_id";
    $_SESSION['deleteColumnFunctionPara5'] = "a.utin_type";
    $_SESSION['deleteColumnFunctionPara6'] = "a.utin_user_id";
    //
// Where Clause Condition 
    $_SESSION['tableWhere'] = "a.utin_firm_id IN ($strFrmId) "
            . " and a.utin_type IN ('OnPurchase','udhaar') "
            . " and a.utin_transaction_type IN ('UDHAAR','OnPurchase')"
            . " and (a.utin_status NOT IN('Deleted','Paid')  and "
            . "(utin_amt_pay_chk NOT IN ('checked') or  utin_amt_pay_chk IS NULL )) group by u.user_id";
// Table Joins
    $_SESSION['tableJoin'] = " JOIN user AS u ON a.utin_user_id=u.user_id "
            . "JOIN firm AS f ON a.utin_firm_id=f.firm_id";

//    $_SESSION['tableJoin'] = " ";
// Data Table Main File
    include 'omdatatables.php';
    ?>

</div>


