<?php
/*
 * **************************************************************************************
 * @tutorial: LOANS TALLY PANEL
 * **************************************************************************************
 *
 * Created on 6 SEP, 2013 11:46:44 PM
 *
 * @FileName: orgpgtly.php
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
//Start to check Staff Access @Author:SANDY12SEP13
$accFileName = $currentFileName;
include 'ommpemac.php';
//Start to check Staff Access @Author:SANDY12SEP13

include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
$serialNoEntered = $_GET['serialNo'];
$pageNum = $_GET['page'];
$panel = $_GET['panel'];
$preSerNo = preg_replace("/[^A-Za-z]+/", "", $serialNoEntered);
$postSerNo = preg_replace("/[^0-9]+/", "", $serialNoEntered);
?>
<?php
/* * ***********Start Code To Check Login Pass @Author:SANDY12SEP13********* */
$fromDate = isset($_POST['fromDate']) ? $_POST['fromDate'] : '';
$toDate = isset($_POST['toDate']) ? $_POST['toDate'] : '';
$fromDatee=date('Y-m-d');
$toDatee=date('Y-m-d');
if (!empty($fromDate)) {
    $fromDatee = $fromDate;
}
if (!empty($toDate)) {
    $toDatee = $toDate;
}
$fromDatew = isset($_GET['fromDatew']) ? $_GET['fromDatew'] : '';
$toDatew = isset($_GET['toDatew']) ? $_GET['toDatew'] : '';
if ($fromDatew != '' && $toDatew != '' && $fromDatew == $toDatew) {
    unset($fromDatew);
    unset($toDatew);
}
if (!empty($fromDatew)) {
    $fromDate=$fromDatew;
    $fromDatee=$fromDatew;
}
if (!empty($toDatew)) {
    $toDate=$toDatew;
    $toDatee=$toDatew;
}
?>
<?php
$dateFilterCondition = '';
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
/* * ***********End Code To Check Login Pass @Author:SANDY12SEP13********* */

//Start of initialization to implement paging
//assign default value to no of loans to be display
$rowPerPageInactiveLoan = 30; //change in default no of loan @AUTHOR: SANDY29DEC13
$rowPerPageInTallyLoan = 30;

//check no of girvi is set or not
if (isset($_GET['num'])) {
    $rowPerPageInactiveLoan = $_GET['num'];
    $rowPerPageInTallyLoan = $_GET['num'];
}
$checkNextRowsInactiveLoan = $rowPerPageInactiveLoan * 2;
$checkNextRowsInTallyLoan = $rowPerPageInTallyLoan * 2;

$pageNumInActiveLoanSide = 1;
$gCounterInactiveLoan = 0;

$pageNumInTallyLoanSide = 1;
$gCounterInTallyLoan = 0;

//to access page number and panel values
if (isset($_GET['page']) && $_GET['panel'] == 'ActiveGirvi') {
    $pageNumInActiveLoanSide = $_GET['page'];
    $gCounterInactiveLoan = ($pageNumInActiveLoanSide - 1) * $rowPerPageInactiveLoan;
} else if (isset($_GET['page']) && $_GET['panel'] == 'TallyGirvi') {
    $pageNumInTallyLoanSide = $_GET['page'];
    $gCounterInTallyLoan = ($pageNumInTallyLoanSide - 1) * $rowPerPageInTallyLoan;
}

$perOffsetInactiveLoan = ($pageNumInActiveLoanSide - 1) * $rowPerPageInactiveLoan;
$perOffsetInTallyLoan = ($pageNumInTallyLoanSide - 1) * $rowPerPageInTallyLoan;
//End of initialization to implement paging
//query to get reset date
$qSelectResetDate = "SELECT omin_value FROM omindicators WHERE omin_own_id='$_SESSION[sessionOwnerId]' and omin_option='resetgirvitally'";
$resResetDate = mysqli_query($conn, $qSelectResetDate);
$row = mysqli_fetch_array($resResetDate, MYSQLI_ASSOC);
$resetDate = $row['omin_value'];
$date = getdate($resetDate);

/* * **********Start code to change query @Author:PRIYA12JUL14************ */
/* * ****Start to change in queries to get only active loans @AUTHOR: SANDY06JAN14************ */
//total Non Tally loans 

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

$qSelTotalGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts NOT IN ('Released','Auctioned') and (girv_tally_date IS NULL OR girv_tally_date='$resetDate')";

if (!empty($fromDate) && !empty($toDate)) {
    $qSelTotalGirvi .= " AND STR_TO_DATE(girv_DOB, '%d %b %Y') BETWEEN STR_TO_DATE('$fromDate', '%Y-%m-%d') AND STR_TO_DATE('$toDate', '%Y-%m-%d')";
}
$resSelTotalGirvi = mysqli_query($conn, $qSelTotalGirvi);
$TotalLoans = mysqli_num_rows($resSelTotalGirvi);
while ($row = mysqli_fetch_array($resSelTotalGirvi, MYSQLI_ASSOC)) {
    if (($row['girv_pre_serial_num'] == $preSerNo) && ($row['girv_serial_num'] == $postSerNo)) {
        $searched = 'nontally';
    }
}

//Total Tallly Loans
$qSelTallyLoans = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts NOT IN ('Released','Auctioned') and (girv_tally_date IS NOT NULL AND girv_tally_date!='$resetDate') ";
if (!empty($fromDate) && !empty($toDate)) {
    $qSelTallyLoans .= " AND STR_TO_DATE(girv_DOB, '%d %b %Y') BETWEEN STR_TO_DATE('$fromDate', '%Y-%m-%d') AND STR_TO_DATE('$toDate', '%Y-%m-%d')";
}
$resSelTallyLoans = mysqli_query($conn, $qSelTallyLoans);
$totalTallyLoans = mysqli_num_rows($resSelTallyLoans);
while ($row = mysqli_fetch_array($resSelTallyLoans, MYSQLI_ASSOC)) {
    if (($row['girv_pre_serial_num'] == $preSerNo) && ($row['girv_serial_num'] == $postSerNo)) {
        $searched = 'tally';
    }
}
//query to access girvi to show in active loan side
$qSelectTotalNotTallyGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts NOT IN ('Released','Auctioned') and (girv_tally_date IS NULL OR girv_tally_date='$resetDate') ORDER BY girv_tally_date DESC LIMIT $perOffsetInactiveLoan,$checkNextRowsInactiveLoan";
$resTotalNotTallyGirvi = mysqli_query($conn, $qSelectTotalNotTallyGirvi);
$totalGirvi = mysqli_num_rows($resTotalNotTallyGirvi);

//change query to search particular girvi by serial number
if ($serialNoEntered != '' && $serialNoEntered != 'NULL' && $searched == 'nontally') {
    $qSelectAllNotTallyGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts NOT IN ('Released','Auctioned') and (girv_tally_date IS NULL OR girv_tally_date='$resetDate') and girv_pre_serial_num='$preSerNo' and girv_serial_num='$postSerNo'";
    $resAllNotTallyGirvi = mysqli_query($conn, $qSelectAllNotTallyGirvi);
    $total = mysqli_num_rows($resAllNotTallyGirvi);
} else {
    $qSelectAllNotTallyGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' AND girv_firm_id IN ($strFrmId) AND girv_upd_sts NOT IN ('Released','Auctioned') AND (girv_tally_date IS NULL OR girv_tally_date = '$resetDate')";
// Conditionally add date filter if both dates are set
if (!empty($fromDate) && !empty($toDate)) {
    $qSelectAllNotTallyGirvi .= " AND STR_TO_DATE(girv_DOB, '%d %b %Y') BETWEEN STR_TO_DATE('$fromDate', '%Y-%m-%d') AND STR_TO_DATE('$toDate', '%Y-%m-%d')";
}
// Append order and limit
$qSelectAllNotTallyGirvi .= "ORDER BY girv_tally_date DESC LIMIT $perOffsetInactiveLoan, $rowPerPageInactiveLoan";
$resAllNotTallyGirvi = mysqli_query($conn, $qSelectAllNotTallyGirvi);
$totalNextGirvi = mysqli_num_rows($resAllNotTallyGirvi);
}
/* * **********End code to change query @Author:PRIYA12JUL14************ */
//query to access girvi to show in tally loan side
$qSelectTotalTallyGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts NOT IN ('Released','Auctioned') and girv_tally_date IS NOT NULL AND girv_tally_date!='$resetDate' ORDER BY girv_tally_date DESC LIMIT $perOffsetInTallyLoan,$checkNextRowsInTallyLoan";
$resTotalTallyGirvi = mysqli_query($conn, $qSelectTotalTallyGirvi);
$totalTallyGirvi = mysqli_num_rows($resTotalTallyGirvi);

//change query to search particular girvi by serial number
if ($serialNoEntered != '' && $serialNoEntered != 'NULL' && $searched == 'tally') {
    $qSelectAllTallyGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts NOT IN ('Released','Auctioned') and girv_tally_date IS NOT NULL AND girv_tally_date!='$resetDate' and (girv_pre_serial_num='$preSerNo' OR girv_pre_serial_num IS NULL) and girv_serial_num='$postSerNo'";
if (!empty($fromDate) && !empty($toDate)) {
$qSelectAllTallyGirvi .= " AND STR_TO_DATE(girv_tally_date, '%d %b %Y') BETWEEN STR_TO_DATE('$fromDate', '%Y-%m-%d') AND STR_TO_DATE('$toDate', '%Y-%m-%d')";}
    $resAllTallyGirvi = mysqli_query($conn, $qSelectAllTallyGirvi);
    $total = mysqli_num_rows($resAllNotTallyGirvi);
//    echo $qSelectAllTallyGirvi;
} else {
    if (!empty($fromDate) && !empty($toDate)) {
    $qSelectAllTallyGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' AND girv_firm_id IN ($strFrmId) AND girv_upd_sts NOT IN ('Released','Auctioned') AND girv_tally_date IS NOT NULL AND girv_tally_date != '$resetDate' AND STR_TO_DATE(girv_DOB, '%d %b %Y') BETWEEN STR_TO_DATE('$fromDate', '%Y-%m-%d') AND STR_TO_DATE('$toDate', '%Y-%m-%d') ORDER BY girv_tally_date DESC  LIMIT $perOffsetInTallyLoan,$rowPerPageInTallyLoan";
    }
    else{
    $qSelectAllTallyGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts NOT IN ('Released','Auctioned') and girv_tally_date IS NOT NULL AND girv_tally_date!='$resetDate' ORDER BY girv_tally_date DESC  LIMIT $perOffsetInTallyLoan,$rowPerPageInTallyLoan";
    }
    $resAllTallyGirvi = mysqli_query($conn, $qSelectAllTallyGirvi);
    $totalTallyNextGirvi = mysqli_num_rows($resAllTallyGirvi);
//     echo $qSelectAllTallyGirvi;
}
/* * *******End to change in all queries to get only active loans @AUTHOR: SANDY06JAN14*********** */
if ($date != 'null' || $date != '') {
    $lastReset = $date['mday'] . '-' . om_strtoupper(substr($date['month'], 0, 3)) . '-' . $date['year'] . "\t\t" . $date['hours'] % 12 . ':' . $date['minutes'] . ':' . $date['seconds'];
} else {
    $lastReset = '';
}
?>
<div id="girviTallyPanelDiv" class="ShadowFrm" valign="top" style="padding:0px;">
    <div id="girviPanelTrId"></div>
    <table border="0" cellpading="0" cellspacing="1" width="100%" align="center">
        <tr>
            <td valign="middle" align="left" width="18px" >
                <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/active.png" alt="" onLoad="setScrollIdFun('girviPanelTrId')"/></div>
            </td>
            <td valign="middle">
                <div class="main_link_green" align="left"  width="28%"  ><b>LOAN TALLY PANEL</b></div>
            </td>
            <form method="POST" action="">
                        <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10" style="width: 150px;">
                            <?php
                                include 'datefortallyfrom.php';
                            ?>
                        </td>
                        <td valign="middle" align="center" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10" style="width: 150px;">
                            <?php
                                include 'datefortallyto.php';
                            ?>
                        </td>
                        <td>
                            <button type="submit" name="goBtn" style="padding: 5px 15px; font-weight: bold; margin-left: 10px; cursor: pointer;" onclick="check()">
                                GO
                            </button>
                        </td>
            </form>
            <td align="right" valign="middle"  width="5px" >
            </td>
               <td class="noPrint" align="right" valign="middle" width="30%" >
                <input  type ="text"  class="border-no textLabel14CalibriGreyMiddle background_transparent"
                        id="textareaMultibarcodeTags" 
          name="textareaMultibarcodeTags" 
          spellcheck="false"          
          placeholder="Enter Barcode Scan For Loan Tally" 
          onkeyup="
              var code = (event.keyCode ? event.keyCode : event.which);
              if (code == 13) {
                  addToGirviTally(this.value, '', 'NON TALLY', '<?php echo $rowPerPageInactiveLoan; ?>','MULTIPLE');
              }"style="border:1px solid #c1c1c1;height:35px;width:300px;"/>
            </td>                   
            <td class="noPrint" align="right" valign="middle" width="14%" >
                <input id="enterSerialNum" name="enterSerialNum"  type ="text"  class="border-no textLabel14CalibriGreyMiddle background_transparent"
                       placeholder="Enter Loan Serial No."onkeydown="if (event.keyCode == 13) {
                                   showEnteredGirvi(this.value, '<?php echo $rowPerPageInactiveLoan; ?>');
                               }" style="border:1px solid #c1c1c1;height:35px;"/>
            </td>
            <td align="left" valign="middle" width="70px">
                <div style="text-align:left;">
                    <?php
                    $inputId = "resetButt";
                    $inputType = 'submit';
                    $inputFieldValue = 'RESET';
                    $inputIdButton = "resetButt";
                    $inputNameButton = 'resetButt';
                    $inputTitle = 'LAST RESET:' . $lastReset;
                    // This is the main class for input flied
                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                    $inputStyle = "background: #fdd;color: #df0707;border: 1px solid #ffadad;padding:5px 14px;height:35px";
                    $inputLabel = 'RESET'; // Display Label below the text box
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = '';
                    $inputPlaceHolder = '';
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    $inputOnChange = "";
                    $inputOnClickFun = 'resetAllTallyLoans("' . $rowPerPageInactiveLoan . '");';
                    $inputKeyUpFun = '';
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                    ?>
                </div>
<!--                <input id="resetButt" name="resetButt"  type ="submit" value="&nbsp;&nbsp;&nbsp;RESET&nbsp;&nbsp;&nbsp;" title="LAST RESET:<?php echo $lastReset; ?>"
   onclick="resetAllTallyLoans('<?php echo $rowPerPageInactiveLoan; ?>');" class="frm-btn"/>-->
            </td>
            <td align="right" valign="middle" class="noPrint" width="50px">
                <input id="rowsPerPage" name="rowsPerPage" type="text" value="<?php echo $rowsPerPage; ?>" placeholder="No Of Loans" title="Enter number of girvi in List"
                       class="border-no textLabel14CalibriGreyMiddle background_transparent" size="10" maxlength="6"onkeyup="if (event.keyCode == 13 && document.getElementById('rowsPerPage').value != '') {
                                   numberOfRowsofGirvi(document.getElementById('rowsPerPage').value);
                                   document.getElementById('rowsPerPage').value = '';
                               }"
                       onkeypress="javascript:return valKeyPressedForNumber(event);"
                       onclick="this.value = ''" style="height:35px;border: 1px solid #c1c1c1;border-radius: 3px 0 0 3px !important;"/>
            </td>
            <td align="left" valign="middle" width="30px">
                <div id="girviListButton" style="width:40px;height:35px;text-align: center;background: #f59d05;margin-left: -4px;border-radius: 0 3px 3px 0;border: 1px solid #f8d206;">
                    <a style="cursor: pointer;line-height:35px;color: #fff;font-size: 12px"  onkeydown="if (event.keyCode == 13) {
                                if (document.getElementById('rowsPerPage').value != '') {
                                    numberOfRowsofGirvi(document.getElementById('rowsPerPage').value);
                                }
                            }" onclick="if (document.getElementById('rowsPerPage').value != '') {
                                        numberOfRowsofGirvi(document.getElementById('rowsPerPage').value);
                                    }" valign="middle">
                        <!--<img src="<?php echo $documentRootBSlash; ?>/images/submit16.png" title="Click Here to Display Number of girvi in this List" />-->
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </td>
        </tr>
        <!---Start to add code to show message if released loan is searched @AUTHOR: SANDY06JAN14---->
        <tr>
            <td colspan="6" align="right">
                <div id="msgDiv" class=main_link_red16>
                    <?php
                    if ($searched != 'tally' && $searched != 'nontally' && $serialNoEntered != '') {
                        echo '~This Loan is not Available~'; //change in msg @AUTHOR: SANDY08FEB14
                    }
                    ?>
                </div>
            </td>
        </tr>
        <!---End to add code to show message if released loan is searched @AUTHOR: SANDY06JAN14---->
        <!--to display reset date and time in specific format -->
    </table>

    <table border="0" cellpading="1" cellspacing="2" width="100%" >
        <tr>
            <td width="50%" valign="top" style="background: #fff3f5;border: 1px dashed #ff6d6d;padding: 5px;">
                <div id="activeLoan">
                    <table border="0" cellpading="0" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="3" align="center">
                                <div class="heading_brown">NON TALLY LOANS&nbsp;(<font face="arial"><?php echo $TotalLoans; ?></font>)</div>
                            </td>
                        </tr>
                        <?php
//initialize count to display loans in specified no of rows and colm
                        $count = 0;
                        while ($row = mysqli_fetch_array($resAllNotTallyGirvi, MYSQLI_ASSOC)) {
                            $preSerialNo = $row['girv_pre_serial_num'];
                            $postSerialNo = $row['girv_serial_num'];
                            $serialNo = $preSerialNo . $postSerialNo;
                            ?>
                            <?php if ($count % 3 == 0) { ?><tr><?php } ?>
                                <td align="center">
                                    <input type="submit" value="<?php echo $serialNo; ?>"
                                           id="girviSerialNum<?php echo $serialNo; ?>" name="girviSerialNum<?php echo $serialNo; ?>" 
                                           onclick="addToGirviTally('<?php echo $preSerialNo; ?>', '<?php echo $postSerialNo ?>', 'NON TALLY', '<?php echo $rowPerPageInactiveLoan; ?>');"
                                           class="srl_no_nontally_button" <?php if ($serialNoEntered == $serialNo) { ?> class="srl_no_buttonOnSelect"
                                               onkeydown="if (event.keyCode == 8) {
                                                                   document.getElementById('enterSerialNum').focus();
                                                               }"
                                           <?php } ?> 
                                           title="This is Non Tally Loan.To Tally It click on this Button"
                                           />
                                </td>

                                <?php
                                $count = $count + 1;
                                $gCounterInactiveLoan = $gCounterInactiveLoan + 1;
                            }
                            ?>
                        </tr>
                    </table>

                    <!--Start to implement paging --> 
                    <?php if ($totalNextGirvi > 0) {
                        ?>
                        <table border="0" cellpadding="0" cellspacing="0" align="right">
                            <tr>
                                <?php
                                if ($pageNumInActiveLoanSide > 1) {
                                    ?>
                                    <td align="right">
                                        <input type="submit" name="prev_girvi" id="prev_girvi" value="Previous Girvi" class="frm-btn"
                                               maxlength="30" size="15" 
                                               onclick="javascript:navigationToNextGirvi(<?php echo $pageNumInActiveLoanSide - 1; ?>, 'ActiveGirvi', '<?php echo $rowPerPageInactiveLoan; ?>');" 
                                               />
                                    </td>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($totalGirvi > $rowPerPageInactiveLoan) {
                                    ?>
                                    <td align="right">
                                        <input type="submit" name="next_girvi" id="next_girvi"  maxlength="30" size="15"
                                               value="Next Girvi" class="frm-btn"
                                               onclick="javascript:navigationToNextGirvi(<?php echo $pageNumInActiveLoanSide + 1; ?>, 'ActiveGirvi', '<?php echo $rowPerPageInactiveLoan; ?>');" 
                                               />
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                 
                      
                        <tr>
                        </table>
                    
                    <?php }
                    ?>
                    <!--End to implement paging --> 
                </div>
            </td>
            <td width="50%" valign="top" style="background:#efffef;color: #1a971a;border: 1px dashed #518f51;padding: 5px;">
                <div id="tallyLoan">
                    <table border="0" cellpading="0" cellspacing="0" width="100%"  >
                        <tr>
                            <td colspan="3" align="center">
                                <div class="heading_brown">TALLY LOANS&nbsp;(<font face="arial"><?php echo $totalTallyLoans; ?> </font>)</div>
                            </td>
                        </tr>
                        <?php
                        $count = 0;
                        while ($row = mysqli_fetch_array($resAllTallyGirvi, MYSQLI_ASSOC)) {
                            $preSerialNo = $row['girv_pre_serial_num'];
                            $postSerialNo = $row['girv_serial_num'];
                            $tallyDate = $row['girv_tally_date'];
                            $tallyDate = getdate($tallyDate);
                            $serialNo = $preSerialNo . $postSerialNo;
                            ?>

                            <?php if ($count % 3 == 0) { ?><tr><?php } ?>
                                <td align="center">
                                    <input type="submit" value="<?php echo $serialNo; ?>"
                                           id="girviSerialNum<?php echo $serialNo; ?>" name="girviSerialNum<?php echo $serialNo; ?>" 
                                           onclick="addToGirviTally('<?php echo $preSerialNo; ?>', '<?php echo $postSerialNo ?>', 'TALLY', '<?php echo $rowPerPageInactiveLoan; ?>');"
                                           class="srl_no_tally_button" <?php if ($serialNoEntered == $serialNo) { ?>style="background-color:#FFCC99"
                                               onkeydown="if (event.keyCode == 8) {
                                                                   document.getElementById('enterSerialNum').focus();
                                                               }" <?php } ?>
                                           title="TALLY ON: <?php echo $tallyDate['mday'] . '-' . $tallyDate['mon'] . '-' . $tallyDate['year'] . '\\' . $date['hours'] . '-' . $date['minutes'] . '-' . $date['seconds']; ?>"
                                           />
                                </td>
                                <?php
                                $count = $count + 1;
                                $gCounterInTallyLoan = $gCounterInTallyLoan + 1;
                            }
                            ?>
                        </tr>
                    </table>
                    <br>
                    <!--Start to implement paging -->
                    <?php if ($totalTallyNextGirvi > 0) {
                        ?>
                        <table border="0" cellpadding="0" cellspacing="0" align="right">
                            <tr>
                                <?php
                                if ($pageNumInTallyLoanSide > 1) {
                                    ?>
                                    <td align="right">
                                        <input type="submit" name="prev_girvi" id="prev_girvi" value="Previous Girvi" class="frm-btn"
                                               maxlength="30" size="15"  
                                               onclick="javascript:navigationToNextGirvi('<?php echo $pageNumInTallyLoanSide - 1; ?>', 'TallyGirvi', '<?php echo $rowPerPageInactiveLoan; ?>');" />
                                    </td>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($totalTallyGirvi > $rowPerPageInTallyLoan) {
                                    ?>
                                    <td align="right">
                                        <input type="submit" name="next_girvi1" id="next_girvi1" value="Next Girvi" class="frm-btn"
                                               maxlength="30" size="15" 
                                               onclick="javascript:navigationToNextGirvi('<?php echo $pageNumInTallyLoanSide + 1; ?>', 'TallyGirvi', '<?php echo $rowPerPageInactiveLoan; ?>');" />
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                        </table>
                    <?php }
                    ?>
                    <!--End to implement paging -->
                </div>
            </td>
        </tr>
    </table>
</div>
