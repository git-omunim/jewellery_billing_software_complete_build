<?php
/*
 * **************************************************************************************
 * @Description:  Transferred & Released Unsettled Loan Details
 * **************************************************************************************
 *
 * Created on Aug 14, 2015 11:16:18 AM
 *
 * @FileName: orgptgml.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 1.0.0
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
require_once 'system/omssopin.php';
include_once 'ommpincr.php';

$selFirmId = $_SESSION['setFirmSession'];
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]'";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' order by firm_since desc";
}
$resFirmCount = mysqli_query($conn,$qSelFirmCount);
$strFrmId = '0';
while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
    $strFrmId = $strFrmId . ",";
    $strFrmId = $strFrmId . "$rowFirm[firm_id]";
}
//$strGFirmId = $_GET['firmId'];
$strGFirmId = $strFrmId;
if (($selFirmId != NULL && $selFirmId != '' && $selFirmId != 'NotSelected')) {
    $strFrmId = $selFirmId;
}
if ($_GET['selTFirmId'] != '') {
    $selTFirmId = $_GET['selTFirmId'];
    $selMlName = 'TR ML';
}
//start code @AUTHOR: SANDY28JAN14
if ($_GET['selMlName'] != '' && $_GET['selMlName'] != 'NotSelected' && $_GET['selMlName'] != 'TR ML') {
    $selMlName = $_GET['selMlName'];
    $selTFirmId = 'Selected';
}
//echo '$selMlName=='.$selMlName;
if ($selMlName != '' && $selMlName != NULL && $selMlName != 'TR ML') {
    if ($selFirmId != NULL || $selFirmId != '') {
        $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Transferred') and gtrans_exist_firm_id IN ($selFirmId) and  gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') and gtrans_act_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
    } else {
        $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Transferred') and gtrans_exist_firm_id IN ($strFrmId) and  gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') and gtrans_act_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
    }
} else {
    $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Transferred') and gtrans_exist_firm_id IN ($strGFirmId) and  gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan) and gtrans_act_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
}

//$qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_exist_firm_id IN ($strFrmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($strFrmId) and gtrans_upd_sts IN ('Transferred') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//echo $qSelAllGirvi;
$resAllGirvi = mysqli_query($conn,$qSelAllGirvi);
$totalGirviCheck = mysqli_num_rows($resAllGirvi);

$qSelAllSettledLoans = "SELECT * FROM trans_loan_settle_trans order by lstran_id desc LIMIT 0,1";
$resAllSettledLoans = mysqli_query($conn,$qSelAllSettledLoans);
$rowAllSettledLoans = mysqli_fetch_array($resAllSettledLoans, MYSQLI_ASSOC);
$lastSettledLoan = mysqli_num_rows($resAllSettledLoans);
?>
<table width="100%">
    <tr>
        <td align="center">
            <div class="minHeight400">
                <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%">
                    <tr>
                        <td align = "right" width="50%" class="itemAddPnLabels14">
                            &nbsp;
                        </td>
                        <td align = "center" width="50%" class="itemAddPnLabels14">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td valign = "bottom" align = "right" width="80%" class="itemAddPnLabels14 paddingLeft5">
                                        MONEY LENDER :
                                    </td> 
                                    <td align = "left" valign="top" width="20%" class="itemAddPnLabels14 paddingLeft5">
                                        <?php
                                        $firmIdSelected = $selTFirmId;
                                        $mlSelected = $selMlName;
                                        $panelName = 'mLender';
                                        $sortKeyword = addslashes($sortKeyword);
                                        include 'omfrmcd.php';
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="8" >&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="8" class="hrGrey"></td>
                    </tr>
                    <?php if ($lastSettledLoan > 0) { ?>
                        <tr>
                            <td align = "left" width="50%" class="itemAddPnLabels14">
                                PREVIOUS BAL :
                            </td>
                            <td align = "center" width="50%" class="itemAddPnLabels14">
                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td valign = "bottom" align = "right" width="30%" >

                                        </td> 
                                        <td align = "left" valign="top" width="20%" >

                                        </td>
                                        <td valign = "bottom" align = "right" width="30%" class="itemAddPnLabels14 paddingLeft5">
                                            <?php
                                            if ($rowAllSettledLoans['lstran_amt_left'] > 0) {
                                                $class = 'redFont';
                                                echo 'AMOUNT LEFT :';
                                            } else if ($rowAllSettledLoans['lstran_amt_left'] < 0) {
                                                $class = 'greenFont';
                                                echo 'AMOUNT DEP :';
                                            }
                                            ?>
                                        </td> 
                                        <td align = "left" valign="top" width="20%" class="itemAddPnLabels14 paddingLeft5 <?php echo $class; ?>">
                                            <?php
                                            echo abs($rowAllSettledLoans['lstran_amt_left']);
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="hrGrey" width="100%" colspan="8"></td>
                    </tr>
                    <tr>
                        <td align = "center" width="50%" class="itemAddPnLabels14 border-color-grey-rb paddingLeft5">
                            NEW TRANSFERRED LOAN
                        </td>
                        <td align = "center" width="50%" class="itemAddPnLabels14 border-color-grey-b paddingLeft5">
                            RELEASED LOAN
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align = "center" width="50%" class="border-color-grey-r paddingLeft5 paddingRight2">
                            <div class="minHeight400">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                    <?php if ($totalGirviCheck <= 0) { ?>
                                        <tr><td>
                                                <div class="spaceLeft100 paddingTop5"><div class="h7"> ~Transferred Girvi List is empty. ~ </div></div>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php
//                                        echo '$qSelAllGirvi=='.$qSelAllGirvi;
                                        $totTransPrin = 0;
                                        $totGTransAmt = 0;
                                        $counter = 0;
                                        $gCounter = 0;
                                        while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

                                            $gId = $rowAllGirvi['gtrans_id'];
                                            $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                            $gTransFirmType = $rowAllGirvi['gtrans_firm_type'];
                                            $custId = $rowAllGirvi['gtrans_cust_id'];
                                            $gFirmId = $rowAllGirvi['gtrans_firm_id'];
                                            $girviDOB = $rowAllGirvi['gtrans_DOB'];
                                            $gMainPrinAmt = $rowAllGirvi['gtrans_prin_amt'];
                                            $gMainInt = $rowAllGirvi['gtrans_paid_int'];
                                            $gTotalAmt = $rowAllGirvi['gtrans_paid_amt'];
                                            $girviDOR = $rowAllGirvi['gtrans_DOR'];
                                            $girviTransferLoanId = $rowAllGirvi['gtrans_trans_loan_id'];
                                            $globalGTransSerailNum = $rowAllGirvi['global_gt_serial_num'];

                                            if ($girviTransferLoanId != '') {
                                                $selAllTransGirvi = "SELECT ml_pre_serial_num,ml_serial_num FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]'";
                                                $resAllTransGirvi = mysqli_query($conn,$selAllTransGirvi);
                                                $rowAllTransGirvi = mysqli_fetch_array($resAllTransGirvi, MYSQLI_ASSOC);
                                                $gPreSerialNo = $rowAllTransGirvi['ml_pre_serial_num'];
                                                $gSerialNo = $rowAllTransGirvi['ml_serial_num'];
                                            } else {
                                                $gPreSerialNo = $rowAllGirvi['gtrans_pre_serial_num'];
                                                $gSerialNo = $rowAllGirvi['gtrans_serial_num'];
                                            }

                                            $girviTransStatus = $rowAllGirvi['gtrans_upd_sts'];
                                            $prinType = $rowAllGirvi['gtrans_prin_typ'];
                                            if ($prinType == 'MainPrin' || $prinType == null) {
                                                $prinType = 'PRN';
                                                $prinTitle = "Main Principle";
                                                $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                            } else {
                                                $prinType = 'APRN';
                                                $prinTitle = "Additional Principle";
                                                $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                            }
                                            $totTransPrin += $gMainPrinAmt;
                                            $totGTransAmt += $gTotalAmt;
                                            $qSelFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' and firm_id='$gFirmId'";
                                            $resFirm = mysqli_query($conn,$qSelFirm);
                                            $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                            $gFirmName = $rowFirm['firm_name'];
 //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                   
                                            $selFatherName = "SELECT user_father_name,user_fname,user_lname,user_city FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                                            $resFatherName = mysqli_query($conn,$selFatherName);
                                            $rowFatherName = mysqli_fetch_array($resFatherName, MYSQLI_ASSOC);
                                            $gCustName = $rowFatherName['user_fname'] . ' ' . $rowFatherName['user_lname'];
                                            $fatherName = $rowFatherName['user_father_name'];
                                            if ($fatherName[0] == 'S' || $fatherName[0] == 's') {
                                                $fatherName = 'W/o  ' . substr($fatherName, 1);
                                            } else {
                                                $fatherName = 'S/o  ' . substr($fatherName, 1);
                                            }
                                            $gCustCity = om_strtoupper($rowFatherName['user_city']);

                                            $qSelCustInfo = "SELECT girv_cust_fname,girv_cust_lname,girv_cust_city,girv_firm_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_id = '$gTransGirviId'";
                                            $resCustInfo = mysqli_query($conn,$qSelCustInfo);
                                            $rowCustInfo = mysqli_fetch_array($resCustInfo);
                                            $girviFirmId = $rowCustInfo['girv_firm_id'];

                                            $qSelFirm = "SELECT firm_name FROM firm where firm_id='$girviFirmId' and firm_own_id='$_SESSION[sessionOwnerId]'";
                                            $resFirm = mysqli_query($conn,$qSelFirm);
                                            $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                            $girviFirmName = $rowFirm['firm_name'];
                                            if ($gTransFirmType == 'MoneyLender') {
                                                $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                                $resMlCode = mysqli_query($conn,$selMlCode);
                                                $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                                            }
                                            if ($rowAllGirvi['gtrans_DOR'] != '')
                                                $releaseDate = date('d M y', strtotime($rowAllGirvi['gtrans_DOR']));

                                            $allGTransId = $allGTransId . ',' . $gId;
                                            ?>
                                            <?php if ($counter == 0) { ?>
                                            <tr align="right" class="om_header">
                                                <td align="left" width="60px" class ="itemAddPnLabels12 border-right-bottom"> 
                                                    S.NO.
                                                </td>
                                                <td align="right" width="420px" class ="itemAddPnLabels12 border-right-bottom">
                                                    PRIN. AMT. 
                                                </td>
                                                <td align="left" width="300px" class ="itemAddPnLabels12 border-right-bottom">
                                                    C. NAME
                                                </td>
                                                <td align="left" width="850px" class ="itemAddPnLabels12 border-right-bottom">
                                                    CITY
                                                </td>
                                                <td align="left" width="70px" class="itemAddPnLabels12 border-right-bottom">
                                                    TFIRM
                                                </td>
                                                <td align="right" width="650px" class ="itemAddPnLabels12 border-right-bottom">
                                                    S.DT
                                                </td>
                                                <td align="right" class="itemAddPnLabels12 border-right-bottom" width="620px">
                                                    R.DT
                                                </td>
                                                <?php if ($staffId && $array['delTransLoan'] == 'false') { ?>
                                                <?php } else { ?>
                                                    <td align="center" width="22px" class="noPrint itemAddPnLabels12 border-bottom">
                                                        UNREL
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } $counter++; ?>
                                        <tr>
                                            <td align="left" class="border-color-grey-rb paddingLeft5" width="60px">
                                                <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi / Double Click To Select Girvi"
                                                       ondblclick="<?php if ($upPanelName != 'updateSettledLoans') { ?>searchTransGirviByGirviId('<?php echo $custId; ?>', '<?php echo $gTransGirviId; ?>', 'mlLoanDetailsNavi');<?php } ?>"
                                                       onclick="<?php if ($upPanelName != 'updateSettledLoans') { ?>getGirviInfoPopUp(<?php echo $custId; ?>,<?php echo $gTransGirviId; ?>, '<?php echo $documentRootBSlash; ?>')<?php } ?>"
                                                       value="<?php echo $gPreSerialNo . $gSerialNo; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"/>
                                                <input type="hidden" name="girviId<?php echo $gCounter; ?>" id="girviId<?php echo $gCounter; ?>" value="<?php echo $gTransGirviId; ?>"/>
                                            </td>
                                        <div id="display_girvi_info_popup" class="girvi_info_popup_trans_list"></div><td align="right" class="border-color-grey-rb" width="400px">
                                            <div class="h5 spaceLeftRight2"><?php echo formatInIndianStyle($gMainPrinAmt); ?></div>
                                        </td>
                                        <td align="left" class="border-color-grey-rb" title="<?php echo $fatherName; ?>" width="700px">
                                            <div class="h5 spaceLeftRight2"><?php echo substr($gCustName, 0, 7); ?></div>
                                        </td>
                                        <td align="left" class ="border-color-grey-rb" title="<?php echo $gCustCity; ?>" width="750px">
                                            <div class="h5 spaceLeftRight2"><?php echo substr($gCustCity, 0, 14); ?></div>
                                        </td><?php if ($gTransFirmType == 'MoneyLender') { ?>
                                            <td align="left" class ="border-color-grey-rb" width="70px">
                                                <div class="h5 spaceLeftRight2"><?php echo $rowMlCode['user_unique_code']; ?></div>
                                            </td>
                                        <?php } else { ?>
                                            <td align="left" class ="border-color-grey-rb" width="70px">
                                                <div class="h5 spaceLeftRight2"><?php echo $gFirmName; ?></div>
                                            </td>
                                        <?php } ?>
                                        <td align="right" width="650px" class =" border-color-grey-rb" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                            <div class="h5 spaceLeftRight2"><?php echo om_strtoupper(date('d  M  y', strtotime($girviDOB))); ?></div>
                                        </td>
                                        <td align="right" width="620px" class=" border-color-grey-rb widthPX96" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                            <div class="h5 spaceLeftRight2">  <?php
                                                if ($girviDOB != '')
                                                    echo om_strtoupper(date('d  M  y', strtotime($girviDOB)));
                                                else
                                                    echo '-';
                                                ?></div>
                                        </td>
                                        <?php if ($staffId && $array['delTransLoan'] == 'false') { ?>
                                        <?php } else { ?>
                                            <td align="center" width="22px" class="border-color-grey-b paddingTop1 noPrint" valign="middle">
                                                 <div id="reactiveTransGirvi" width="70px">
                                                    <a style="cursor: pointer;" onclick ="unreleaseTransGirvi('<?php echo "$girviId"; ?>', '<?php echo "$custId"; ?>', '<?php echo $gId; ?>', '<?php echo $panelName; ?>');" >
                                                        <img src="<?php echo $documentRootBSlash; ?>/images/back16.png" alt="Unrelease Transferred Girvi Detail"  title="Unrelease Transferred Girvi Detail" class="marginTop5"/>
                                                    </a>
                                                </div>
<!--                                                <div id="transGirviDeleteButDiv">
                                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" width="13px" alt="" style="cursor: pointer;" 
                                                         onclick="javascript:unreleaseTransGirvi('<?php echo "$gId"; ?>', 'mLender', '<?php echo $gTransGirviId; ?>', '<?php echo $prinType; ?>', '<?php echo $upPanelName; ?>');" />
                                                </div>-->
                                            </td>
                                        <?php } ?>
                                        </tr>
                                        <?php
                                        $gCounter++;
                                    }
                                    ?>
                                    <tr align="right" class="om_header">
                                        <?php if ($totTransPrin != 0) { ?>

                                            <td align="left" class="h5 heightPX15 bold border-color-grey-rb paddingLeft5" >
                                                Total
                                            </td>
                                            <td align="right"  class="h5 heightPX15 bold border-color-grey-rb paddingLeft5" >
                                                <div class="spaceRight5"><?php echo formatInIndianStyle($totTransPrin); ?></div>
                                            </td>
                                            <td colspan="6" class="h5 heightPX15 bold border-color-grey-b">&nbsp;
                                            </td>

                                        <?php } ?>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td align = "left" valign="top" width="50%" class="paddingLeft5 paddingRight2">
                            <?php
                            if ($selMlName != '' && $selMlName != NULL && $selMlName != 'TR ML') {
                                if ($selFirmId != NULL || $selFirmId != '') {
                                    $qSelAllRelGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Released') and gtrans_exist_firm_id IN ($selFirmId) and  gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') and gtrans_rel_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
                                } else {
                                    $qSelAllRelGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Released') and gtrans_exist_firm_id IN ($strGFirmId) and  gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan WHERE ml_lender_fname='$selMlName') and gtrans_rel_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc ";
                                }
                            } else {
                                $qSelAllRelGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Released') and gtrans_exist_firm_id IN ($strGFirmId) and  gtrans_trans_loan_id IN(SELECT ml_id FROM ml_loan) and gtrans_rel_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc ";
                            }
//                            $qSelAllRelGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_exist_firm_id IN ($strFrmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($strGFirmId) and gtrans_upd_sts IN ('released') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
                            $resAllRelGirvi = mysqli_query($conn,$qSelAllRelGirvi);
                            $totalGirviCheck = mysqli_num_rows($resAllRelGirvi);
                            ?>
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                <?php if ($totalGirviCheck <= 0) { ?>
                                    <tr><td>
                                            <div class="spaceLeft100 paddingTop5"><div class="h7"> ~Released transferred Girvi List is empty. ~ </div></div>
                                        </td>
                                    <tr>
                                    <?php } ?>
                                    <?php
                                    $totTransRelPrin = 0;
                                    $totGTransRelInt = 0;
                                    $totGTransInt = 0;
                                    $totGTransAmt = 0;
                                    $counter = 0;
                                    $gRCounter = 0;
                                    while ($rowAllGirvi = mysqli_fetch_array($resAllRelGirvi, MYSQLI_ASSOC)) {

                                        $gId = $rowAllGirvi['gtrans_id'];
                                        $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                        $gTransFirmType = $rowAllGirvi['gtrans_firm_type'];
                                        $custId = $rowAllGirvi['gtrans_cust_id'];
                                        $gFirmId = $rowAllGirvi['gtrans_firm_id'];
                                        $girviDOB = $rowAllGirvi['gtrans_DOB'];
                                        $gMainPrinAmt = $rowAllGirvi['gtrans_prin_amt'];
                                        $gMainInt = $rowAllGirvi['gtrans_paid_int'];
                                        $gTotalAmt = $rowAllGirvi['gtrans_paid_amt'];
                                        $girviDOR = $rowAllGirvi['gtrans_DOR'];
                                        $girviTransferLoanId = $rowAllGirvi['gtrans_trans_loan_id'];
                                        $globalGTransSerailNum = $rowAllGirvi['global_gt_serial_num'];

                                        if ($girviTransferLoanId != '') {
                                            $selAllTransGirvi = "SELECT ml_pre_serial_num,ml_serial_num FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]'";
                                            $resAllTransGirvi = mysqli_query($conn,$selAllTransGirvi);
                                            $rowAllTransGirvi = mysqli_fetch_array($resAllTransGirvi, MYSQLI_ASSOC);
                                            $gPreSerialNo = $rowAllTransGirvi['ml_pre_serial_num'];
                                            $gSerialNo = $rowAllTransGirvi['ml_serial_num'];
                                        } else {
                                            $gPreSerialNo = $rowAllGirvi['gtrans_pre_serial_num'];
                                            $gSerialNo = $rowAllGirvi['gtrans_serial_num'];
                                        }

                                        $girviTransStatus = $rowAllGirvi['gtrans_upd_sts'];
                                        $prinType = $rowAllGirvi['gtrans_prin_typ'];
                                        if ($prinType == 'MainPrin' || $prinType == null) {
                                            $prinType = 'PRN';
                                            $prinTitle = "Main Principle";
                                            $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                        } else {
                                            $prinType = 'APRN';
                                            $prinTitle = "Additional Principle";
                                            $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                        }
                                        $totTransRelPrin += $gMainPrinAmt;
                                        $totGTransRelInt += $gMainInt;
                                        $totGTransRelAmt += $gTotalAmt;
                                        $qSelFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' and firm_id='$gFirmId'";
                                        $resFirm = mysqli_query($conn,$qSelFirm);
                                        $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                        $gFirmName = $rowFirm['firm_name'];
                                        $selFatherName = "SELECT user_father_name,user_fname,user_lname,user_city FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                                        $resFatherName = mysqli_query($conn,$selFatherName);
                                        $rowFatherName = mysqli_fetch_array($resFatherName, MYSQLI_ASSOC);
                                        $gCustName = $rowFatherName['user_fname'] . ' ' . $rowFatherName['user_lname'];
                                        $fatherName = $rowFatherName['user_father_name'];
                                        if ($fatherName[0] == 'S' || $fatherName[0] == 's') {
                                            $fatherName = 'W/o  ' . substr($fatherName, 1);
                                        } else {
                                            $fatherName = 'S/o  ' . substr($fatherName, 1);
                                        }
                                        $gCustCity = om_strtoupper($rowFatherName['user_city']);
//---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                        $qSelCustInfo = "SELECT girv_cust_fname,girv_cust_lname,girv_cust_city,girv_firm_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_id = '$gTransGirviId'";
                                        $resCustInfo = mysqli_query($conn,$qSelCustInfo);
                                        $rowCustInfo = mysqli_fetch_array($resCustInfo);
                                        $girviFirmId = $rowCustInfo['girv_firm_id'];

                                        $qSelFirm = "SELECT firm_name FROM firm where firm_id='$girviFirmId' and firm_own_id='$_SESSION[sessionOwnerId]'";
                                        $resFirm = mysqli_query($conn,$qSelFirm);
                                        $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                        $girviFirmName = $rowFirm['firm_name'];
                                        if ($gTransFirmType == 'MoneyLender') {
//---------------------------------- Start code for change data from customer table and supplier to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                    
                                            $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                            $resMlCode = mysqli_query($conn,$selMlCode);
                                            $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                                        }
                                        if ($rowAllGirvi['gtrans_DOR'] != '')
                                            $releaseDate = date('d M y', strtotime($rowAllGirvi['gtrans_DOR']));

                                        $allGTransId = $allGTransId . ',' . $gId;
                                        ?>
                                        <?php if ($counter == 0) { ?>
                                        <tr align="right" class="om_header">
                                            <td align="left" width="60px" class ="itemAddPnLabels12 border-right-bottom"> 
                                                S.NO.
                                            </td>
                                            <td align="right" width="100px" class ="itemAddPnLabels12 border-right-bottom">
                                                PRIN. AMT. 
                                            </td>
                                            <td align="right" width="300px" class ="itemAddPnLabels12 border-right-bottom">
                                                INT. AMT. 
                                            </td>
        <!--                                            <td align="right" width="80px" class ="itemAddPnLabels12 border-right-bottom">
                                                TOT. AMT. 
                                            </td>-->
                                            <td align="center" width="450px" class ="itemAddPnLabels12 border-right-bottom">
                                                C.NAME
                                            </td>
                                            <td align="left" width="150px" class ="itemAddPnLabels12 border-right-bottom">
                                                CITY
                                            </td>
                                            <td align="left" width="70px" class="itemAddPnLabels12 border-right-bottom">
                                                TFIRM
                                            </td>
                                            <td align="right" width="650px" class ="itemAddPnLabels12 border-right-bottom">
                                                <div class="spaceRight4"> S.DT</div>
                                            </td>
                                            <td align="right" class="itemAddPnLabels12 border-right-bottom" width="650px">
                                                <div class="spaceRight4"> R.DT</div>
                                            </td>
<!--                                            <td align="right" class="itemAddPnLabels12 border-bottom" width="22px">
                                                <div class="spaceRight4">DEL</div>
                                            </td>-->
                                        </tr>
                                    <?php } $counter++; ?>
                                    <tr>
                                        <td align="left" class="border-color-grey-rb" width="60px">
                                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi / Double Click To Select Girvi"
                                                   ondblclick="searchTransGirviByGirviId('<?php echo $custId; ?>', '<?php echo $gTransGirviId; ?>', 'mlLoanDetailsNavi');"
                                                   onclick="getGirviInfoPopUp(<?php echo $custId; ?>,<?php echo $gTransGirviId; ?>, '<?php echo $documentRootBSlash; ?>')"
                                                   value="<?php echo $gPreSerialNo . $gSerialNo; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"/><!--Class Changed @Author:PRIYA26AUG13-->
                                            <input type="hidden" name="girviId<?php echo $gRCounter; ?>" id="girviId<?php echo $gRCounter; ?>" value="<?php echo $gTransGirviId; ?>"/>
                                        </td>
                                    <div id="display_girvi_info_popup" class="girvi_info_popup_trans_list"></div>
                                    <td align="right" class="border-color-grey-rb" width="100px">
                                        <div class="h5 spaceRight4"><?php echo formatInIndianStyle($gMainPrinAmt); ?></div>
                                    </td>
                                    <td align="right" title="Total Interest Amount of This Page!" class="border-color-grey-rb" width="300px">
                                        <div class="h5 spaceRight4"><?php echo formatInIndianStyle($gMainInt); ?></div>
                                    </td>
    <!--                                    <td align="right" title="Total Amount of This Page!" class="border-color-grey-rb" width="80px">
                                        <div class="spaceRight4"><?php echo formatInIndianStyle($totGTransRelAmt); ?></div>
                                    </td>-->
                                    <td align="left" class="border-color-grey-rb" title="<?php echo $gCustName . ' ' . $fatherName; ?>" width="450px">
                                        <div class="h5 spaceRight4"><?php echo substr($gCustName, 0, 5); ?></div>
                                    </td>
                                    <td align="left" class ="border-color-grey-rb" title="<?php echo $gCustCity; ?>" width="150px">
                                        <div class="h5 spaceLeft4"><?php echo substr($gCustCity, 0, 5); ?></div>
                                    </td>
                                    <?php if ($gTransFirmType == 'MoneyLender') { ?>
                                        <td align="left" class ="border-right-bottom border-color-grey-rb" width="70px">
                                            <div class="h5 spaceLeft4"><?php echo $rowMlCode['user_unique_code']; ?></div>
<!--------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                   
                                        </td>
                                    <?php } else { ?>
                                        <td align="left" class ="border-right-bottom border-color-grey-rb" width="70px">
                                            <div class="h5 spaceLeft4"><?php echo $gFirmName; ?></div>
                                        </td>
                                    <?php } ?>
                                    <td align="right" width="750px" class ="border-right-bottom border-color-grey-rb" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                        <div class="h5 spaceRight4"><?php echo om_strtoupper(date('d  M  y', strtotime($girviDOB))); ?></div>
                                    </td>
                                    <td align="right" width="750px" class="border-right-bottom border-color-grey-rb" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                        <div class="h5 spaceRight4">  <?php
                                            if ($girviDOB != '')
                                                echo om_strtoupper(date('d  M  y', strtotime($girviDOB)));
                                            else
                                                echo '-';
                                            ?></div>
                                    </td>
                                    <?php if ($staffId && $array['delTransLoan'] == 'false') { ?>
                                    <?php } else { ?>
<!--                                        <td align="center" width="22px" class="border-color-grey-b paddingTop1 noPrint" valign="middle">
                                            <div id="transGirviDeleteButDiv">
                                                <img src="<?php echo $documentRoot; ?>/images/delete16.png" width="13px" alt="" style="cursor: pointer;"  title="click here to unsettle loan"
                                                     onclick="javascript:unreleaseTransGirvi('<?php echo "$gId"; ?>', '', '<?php echo $gTransGirviId; ?>', '<?php echo $prinType; ?>', '<?php echo $upPanelName; ?>');" />
                                            </div>
                                        </td>-->
                                    <?php } ?>

                        </tr>
                        <?php
                        $gRCounter++;
                    }
                    ?>
                    <tr class="om_header">
                        <?php if ($totTransRelPrin != 0) { ?>
                            <td align="left"  class="h5 heightPX15 bold border-color-grey-rb paddingLeft5" >
                                Total
                            </td>
                            <td align="right"  class="h5 heightPX15 bold border-color-grey-rb paddingLeft5" >
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totTransRelPrin); ?></div>
                            </td>
                            <td align="right"  class="h5 heightPX15 bold border-color-grey-rb paddingLeft5" >
                                <div class="spaceRight5"><?php echo formatInIndianStyle($totGTransRelInt); ?></div>
                            </td>
                            <td colspan="6" class="heightPX15 border-color-grey-b">&nbsp;
                            </td>
                        <?php } ?>
                    </tr>
                </table>
        </td>
    </tr>
    <?php
    if ($totTransPrin != 0 || $totTransRelPrin != 0) {
        $totTransRelAmt = $totTransRelPrin + $totGTransRelInt;
        $totTransAmt = $totTransPrin + $totGTransInt;
        $totBal = $totTransAmt - $totTransRelAmt;
    }
    ?>
</table>
</div>
</td>
</tr>


<tr>
    <td class="hrGrey"></td>
</tr>

<tr>
    <td>
        &nbsp;
    </td>
</tr>
<?php
if ($totTransPrin != 0 || $totTransRelPrin != 0 || $totGTransRelInt != 0) {
    if ($totBal > 0) {
        $class = "greenFont";
    } else {
        $class = "redFont";
    }
    ?>
    <tr>
        <?php include 'orgplsdtl.php'; ?>
    </tr>
    <tr>
        <td class="hrGrey"></td>
    </tr> 
<?php } if ($totBal != 0) { ?>
    <div id="loanSettleDiv">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <?php include 'orgplnstl.php'; ?>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="hrGrey"></td>
        </tr> 
    </div>
<?php } ?>
</table>