<?php
/*
 * **************************************************************************************
 * @tutorial: All Udhaar Deposit List 
 * **************************************************************************************
 *
 * Created on 25 Jul, 2012 2:18:17 PM
 *
 * @FileName: omuualdp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
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
?>
<?php
require_once 'system/omssopin.php';
// how many rows to show per page
//$rowsPerPage = 15;
if ($rowsPerPage == '') {
    $rowsPerPage = $_GET['rowsPerPage'];
}
$checkNextRows = $rowsPerPage * 2;
//
// by default we show first page
$pageNum = 1;
$gCounter = 0;
//
// if $_GET['page'] defined, use it as page number
if (isset($_GET['page'])) {
    $pageNum = $_GET['page'];
    $gCounter = ($pageNum - 1) * $rowsPerPage;
}
//
// counting the offset
$perOffset = ($pageNum - 1) * $rowsPerPage;
//Start Code To Select Firm Id @AUTHOR:PRIYA22JUNE13
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
if ($selFirmId != NULL) {
    $strFrmId = $selFirmId;
} else {
    $resFirmCount = mysqli_query($conn,$qSelFirmCount);

    $strFrmId = '0';

    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
}
//End Code To Select Firm Id @AUTHOR:PRIYA22JUNE13
/*****************START code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-28JUN17************************/
$qSelTotalUdhaarDepCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_type = 'udhaar' and utin_transaction_type = 'UDHAAR DEPOSIT' and utin_utin_id = '$udhaarId' and utin_firm_id IN ($strFrmId) LIMIT $perOffset, $checkNextRows";
$resTotalUdhaarDepCount = mysqli_query($conn,$qSelTotalUdhaarDepCount);
$totalUdhaarDep = mysqli_num_rows($resTotalUdhaarDepCount);
//
$qSelAllUdhaarDep = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_status!='EMI' and utin_type = 'udhaar' and utin_transaction_type = 'UDHAAR DEPOSIT' and utin_firm_id IN ($strFrmId) order by utin_since asc LIMIT $perOffset, $rowsPerPage";
$resAllUdhaarDep = mysqli_query($conn,$qSelAllUdhaarDep);
$totalNextUdhaarDep = mysqli_num_rows($resAllUdhaarDep);
/*****************END code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-28JUN17************************/
?>
<div id="girviPanelTrId"></div><!-----Add div for print function @AUTHOR: SANDY13DEC13--->
<div id="allUdhaarDepositListDiv"><!-----Add div for print function @AUTHOR: SHE19OCT15--->
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td>
            <div class="spaceLeft20">
                <h1><span class="blue">All Udhaar Deposit List</span></h1>
            </div>
        </td>
        <td align="center">
            <h2>&nbsp;</h2>
        </td>
        <td align="right" valign="bottom" class="frm-lbl">
            <div class="spaceRight20"></div>
        </td>
    </tr>
    <tr>
        <td colspan="3"><br />
        </td>
    </tr>
    <tr>
        <td colspan="3" align="left">
            <table border="0" cellspacing="1" cellpadding="2" width="100%">
                <?php
                if ($totalUdhaarDep <= 0) {
                    echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ Udhaar List is empty. ~ </div></div>";
                } else {
                    ?>
                    <tr>
                        <td align="left" width="7px">
                            <div class="h7">SN</div>
                        </td>
                        <td align="right"  width="75px">
                            <div class="h7">DEPOSIT AMT</div>
                        </td>
                        <td align="right"  width="10px">
                            <div class="h7">&nbsp;</div>
                        </td>
                        <td align="left" width="100px">
                            <div class="h7">CUSTOMER NAME</div>
                        </td>
                        <td align="left" width="50px">
                            <div class="h7">CITY</div>
                        </td>
                        <td align="left"  width="75px">
                            <div class="h7">UDHAAR TYPE</div>
                        </td>
                        <td align="left" width="50px">
                            <div class="h7">DATE</div>
                        </td> 
                        <td align="center" width="10px">
                            <div class="h7">DEL</div>
                        </td>
                    </tr>
                    <?php
                }
                while ($rowAllUdhaarDep = mysqli_fetch_array($resAllUdhaarDep, MYSQLI_ASSOC)) {
                    //
                    /*****************START code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-28JUN17************************/
                    $udhaarDepId = $rowAllUdhaarDep['utin_id'];
                    $udhaarId = $rowAllUdhaarDep['utin_utin_id'];
                    $custId = $rowAllUdhaarDep['utin_user_id'];
                    /*****************START code to add user_transaction_invoice column table @Author:PRIYANKA-30JUN17************************/
                    $udhaarDepCashAmt = $rowAllUdhaarDep['utin_cash_amt_rec'];
                    $udhaarDepChequeAmt = $rowAllUdhaarDep['utin_pay_cheque_amt'];
                    $udhaarDepCardAmt = $rowAllUdhaarDep['utin_pay_card_amt'];
                    $udhaarDepTransChargs = $rowAllUdhaarDep['utin_pay_trans_chrg'];
                    $udhaarDepOnlinePayAmt = $rowAllUdhaarDep['utin_online_pay_amt'];
                    $udhaarDepPayCommPaidAmt = $rowAllUdhaarDep['utin_pay_comm_paid'];
                    $udhaarDepAmt = $udhaarDepCashAmt + $udhaarDepChequeAmt + ($udhaarDepCardAmt + $udhaarDepTransChargs) + ($udhaarDepOnlinePayAmt - $udhaarDepPayCommPaidAmt);
                    /*****************END code to add user_transaction_invoice column table @Author:PRIYANKA-30JUN17************************/
                    $uDepDOB = $rowAllUdhaarDep['utin_date'];
                    $uDepJrnlId = $rowAllUdhaarDep['utin_jrnl_id']; //$uDepJrnlId Added @Author:PRIYA18AUG13
                    /*****************END code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-28JUN17************************/
                    //
                    /*****************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-23JUN17************************/
                    $qSelAllUdhaar1 = "SELECT utin_user_id, utin_type FROM user_transaction_invoice where utin_id='$udhaarId' and utin_type = 'udhaar'";
                    $resAllUdhaar1 = mysqli_query($conn,$qSelAllUdhaar1);
                    $rowAllUdhaar1 = mysqli_fetch_array($resAllUdhaar1, MYSQLI_ASSOC);
                    $newCustId = $rowAllUdhaar1['utin_user_id'];
                    //
                    $qSelAllUdhaar = "SELECT user_fname,user_lname,user_city FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$newCustId'";
                    $resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar);
                    $rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC);
                    //
                    $uCustName = $rowAllUdhaar['user_fname'] . ' ' . $rowAllUdhaar['user_lname'];
                    $uCustCity = $rowAllUdhaar['user_city'];
                    $udhaarType = $rowAllUdhaar1['utin_type'];
                    /*****************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-23JUN17************************/
                    //
                    ?>
                    <tr>
                        <td align="center">
                            <h5><?php echo $gCounter + 1; ?></h5>
                            <input type="hidden" name="sNo" id="sNo" value="<?php echo $gCounter + 1; ?>" class="frm-btn-without-border" readonly="true"/>
                            <input type="hidden" name="udhaarId<?php echo $gCounter; ?>" id="udhaarId<?php echo $gCounter; ?>" value="<?php echo $udhaarDepId; ?>"/>
                        </td>
                        <td align="right">
                            <div class="amount"><?php echo $udhaarDepAmt; ?></div>
                        </td>
                        <td align="right"  width="10px">
                            <div class="h7">&nbsp;</div>
                        </td>
                        <td align="left" title="<?php echo $uCustName; ?>">
                            <h5><?php echo substr($uCustName,0,35); ?></h5>
                        </td>
                        <td align="left" title="<?php echo $uCustCity; ?>">
                            <h5><?php echo substr($uCustCity,0,24); ?></h5>
                        </td>
                        <td align="left">
                            <h5><?php echo $udhaarType; ?></h5>
                        </td>
                        <td align="left">
                            <h5><?php echo date('d  M  y', strtotime($uDepDOB)); ?></h5>
                        </td>
                        <!--Start Code To Add $udhaarJrnlId @Author:PRIYA18AUG13-->
                        <td align="center">
                            <a style="cursor: pointer;" onclick="deleteCustUdhaarDepDetailsFromUdhaarPanel(<?php echo $custId; ?>,<?php echo $udhaarDepId; ?>, 'DeleteFromUdhaarAllDetails',<?php echo "$uDepJrnlId"; ?>)">
                                <div id="udhaarDeleteFromUdhaarDepPanelButt<?php echo "$udhaarDepId"; ?>">
                                    <?php include 'omzaajcl.php'; ?>
                                </div>
                            </a>
                        </td>
                        <!--End Code To Add $udhaarJrnlId @Author:PRIYA18AUG13-->
                    </tr>
                    <?php
                    $gCounter++;
                }
                ?>
            </table>
                 <!-----------Start to add print button @AUTHOR: SHE19OCT15---------------->
<!--         <table width="100%" align="center">
            <tr>
               <td align="center" class="noPrint">
                  <a style="cursor: pointer;" 
                     onclick="printGirviListPanel('allUdhaarDepositListDiv');">
                     <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='PRINT' title='PRINT'
                          width="32px" height="32px" /> 
                  </a> 
               </td>
            </tr>
         </table>-->
             <!-----------End to add print button @AUTHOR: SHE19OCT15---------------->
            <div id="ajaxLoadNextAllDepUdhaarPanelList" style="visibility: hidden" align="right">
                <?php include 'omzaajld.php'; ?>
            </div>
            <?php
            if ($totalNextUdhaarDep > 0) {
                ?>
                <div id="ajaxLoadNextAllDepUdhaarPanelListButt">
                    <table border="0" cellpadding="2" cellspacing="0" align="right">
                        <tr>
                            <?php
                            if ($pageNum > 1) {
                                ?>
                                <td align="right">
                                    <form name="prev_udhaar" id="prev_udhaar"
                                          action="javascript:navigationAllDepUdhaarPanel(<?php echo "$pageNum - 1"; ?>,'<?php echo $rowsPerPage; ?>','<?php echo $panel; ?>');"
                                          method="get"><input type="submit" value="Previous Udhaar" class="frm-btn"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                            if ($totalUdhaarDep > $rowsPerPage) {
                                ?>
                                <td align="right">
                                    <form name="next_udhaar" id="next_udhaar"
                                          action="javascript:navigationAllDepUdhaarPanel(<?php echo $pageNum + 1; ?>,'<?php echo $rowsPerPage; ?>','<?php echo $panel; ?>');"
                                          method="get"><input type="submit" value="Next Udhaar" class="frm-btn"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </td>
    </tr>
</table>
</div>
