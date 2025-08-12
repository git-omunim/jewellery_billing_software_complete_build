<?php
/*
 * **************************************************************************************
 * @Description:  Transferred & Released Unsettled Loan Details
 * **************************************************************************************
 *
 * Created on Aug 14, 2015 11:16:18 AM
 *
 * @FileName: orgptgstl.php
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
require_once 'ommpfndv.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();

if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]'";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' order by firm_since desc";
}
$resFirmCount = mysqli_query($conn, $qSelFirmCount);
$strFrmId = '0';
while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
    $strFrmId = $strFrmId . ",";
    $strFrmId = $strFrmId . "$rowFirm[firm_id]";
}
$strGFirmId = $strFrmId;
if (($selFirmId != NULL && $selFirmId != '' && $selFirmId != 'NotSelected')) {
    $strFrmId = $selFirmId;
}
//if ($_GET['selTFirmId'] != '') {
//    $selTFirmId = $_GET['selTFirmId'];
//    $selMlName = 'TR ML';
//}
//$qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Transferred') and gtrans_exist_firm_id IN ($strGFirmId) and gtrans_trans_loan_id IS NULL and gtrans_firm_id IN ($selTFirmId) and gtrans_setl_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
//echo '$upPanelName='.$upPanelName;
if ($upPanelName == 'updateSettledLoans') {
//    echo '$ltranId=='.$ltranId;
    parse_str(getTableValues("SELECT * FROM trans_loan_settle_trans WHERE lstran_own_id='$_SESSION[sessionOwnerId]' AND lstran_id='$ltranId'"));
    $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Transferred') and gtrans_act_sts IN ('SETTLED') AND gtrans_lstran_id='$ltranId' order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
} else {
    $qSelAllGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Transferred') and gtrans_act_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
    $qSelAllSettledLoans = "SELECT * FROM trans_loan_settle_trans order by lstran_id desc LIMIT 0,1";
    $resAllSettledLoans = mysqli_query($conn, $qSelAllSettledLoans);
    $rowAllSettledLoans = mysqli_fetch_array($resAllSettledLoans, MYSQLI_ASSOC);
    $lastSettledLoan = mysqli_num_rows($resAllSettledLoans);
}
//echo $qSelAllGirvi;
$resAllGirvi = mysqli_query($conn, $qSelAllGirvi);
$totalGirviCheck = mysqli_num_rows($resAllGirvi);
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
?>
<table width="100%">
    <tr>
        <td align="center">
            <div class="minHeight400">
                <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%">
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
                                            if ($rowAllSettledLoans['lstran_amt_left'] != 0)
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
                        <td align = "center" width="50%" class="itemAddPnLabels14 border-color-grey-rb">
                            NEW TRANSFERRED LOAN
                        </td>
                        <td align = "center" width="50%" class="itemAddPnLabels14 border-color-grey-b paddingLeft5">
                            TRANSFERRED RELEASED LOAN
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
                                        $totTransPrin = 0;
                                        $totGTransAmt = 0;
                                        $counter = 0;
                                        $gCounter = 0;
                                        while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

                                            $gId = $rowAllGirvi['gtrans_id'];
                                            $gTransGirviId = $rowAllGirvi['gtrans_girvi_id'];
                                            $gTransFirmType = $rowAllGirvi['gtrans_firm_type'];
                                            $custId = $rowAllGirvi['gtrans_cust_id'];
                                            $girviId = $rowAllGirvi['gtrans_girvi_id'];
                                            $gFirmId = $rowAllGirvi['gtrans_firm_id'];
                                            $girviDOB = $rowAllGirvi['gtrans_DOB'];
                                            $gMainPrinAmt = $rowAllGirvi['gtrans_prin_amt'];
                                            $gMainInt = $rowAllGirvi['gtrans_paid_int'];
                                            $gTotalAmt = $rowAllGirvi['gtrans_paid_amt'];
                                            $girviDOR = $rowAllGirvi['gtrans_DOR'];
                                            $girviTransferLoanId = $rowAllGirvi['gtrans_trans_loan_id'];
                                            $globalGTransSerailNum = $rowAllGirvi['global_gt_serial_num'];
                                            $girviSettleSts = $rowAllGirvi['gtrans_act_sts'];

                                            if ($girviTransferLoanId != '') {
                                                $selAllTransGirvi = "SELECT ml_pre_serial_num,ml_serial_num FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]'";
                                                $resAllTransGirvi = mysqli_query($conn, $selAllTransGirvi);
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
                                            $resFirm = mysqli_query($conn, $qSelFirm);
                                            $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                            $gFirmName = $rowFirm['firm_name'];
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                    
                                            $selFatherName = "SELECT user_father_name,user_fname,user_lname,user_city FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                                            $resFatherName = mysqli_query($conn, $selFatherName);
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
                                            $resCustInfo = mysqli_query($conn, $qSelCustInfo);
                                            $rowCustInfo = mysqli_fetch_array($resCustInfo);
                                            $girviFirmId = $rowCustInfo['girv_firm_id'];

                                            $qSelFirm = "SELECT firm_name FROM firm where firm_id='$girviFirmId' and firm_own_id='$_SESSION[sessionOwnerId]'";
                                            $resFirm = mysqli_query($conn, $qSelFirm);
                                            $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                            $girviFirmName = $rowFirm['firm_name'];
                                            if ($gTransFirmType == 'MoneyLender') {
                                                $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                                $resMlCode = mysqli_query($conn, $selMlCode);
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
                                                <td align="left" width="400px" class ="itemAddPnLabels12 border-right-bottom">
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
                                        <td align="left" class="border-color-grey-rb" title="<?php echo $gCustName . ' ' . $fatherName; ?>" width="700px">
                                            <div class="h5 spaceLeftRight2"><?php echo substr($gCustName, 0, 7); ?></div>
                                        </td>
                                        <td align="left" class ="border-color-grey-rb" title="<?php echo $gCustCity; ?>" width="750px">
                                            <div class="h5 spaceLeftRight2"><?php echo substr($gCustCity, 0, 7); ?></div>
                                        </td><?php if ($gTransFirmType == 'MoneyLender') { ?>
                                            <td align="left" class ="border-color-grey-rb" width="70px">
                                                <div class="h5 spaceLeftRight2"><?php echo $rowMlCode['user_unique_code']; ?></div>
                                                <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                       
                                            </td>
                                        <?php } else { ?>
                                            <td align="left" class ="border-color-grey-rb" width="70px">
                                                <div class="h5 spaceLeftRight2"><?php echo $gFirmName; ?></div>
                                            </td>
                                        <?php } ?>
                                        <td align="right" width="650px" class =" border-color-grey-rb" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                            <div class="h5 spaceLeftRight2"><?php
                                                if ($nepaliDateIndicator == 'YES') {
                                                    $day_en = substr($girviDOB, 0, 2);
                                                    $selMnth = substr($girviDOB, 3, -5);
                                                    $year_en = substr($girviDOB, -4);
                                                    if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
                                                        // Convert the month abbreviation to its numeric representation (zero-padded)
                                                        $selMnth = date('m', strtotime($selMnth));
                                                    }
                                                    $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
                                                    if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
                                                        $girviDOBArray = explode(' ', $girviDOB);
                                                        if (is_numeric($girviDOBArray[1])) {
                                                            $girviDOBMnth = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                        }
                                                        if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                            echo $girviDOBArray[0] . '-' . $girviDOBArray[1] . '-' . $girviDOBArray[2];
                                                        } else {
                                                            echo $girviDOBArray[0] . ' ' . $girviDOBMnth . ' ' . $girviDOBArray[2];
                                                        }
                                                    } else {
                                                        $date_ne = $nepali_date->get_nepali_date($year_en, $selMnth, $day_en);
                                                        if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                            echo $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                                                        } else {
                                                            echo $date_ne[d] . '-' . $date_ne[M] . '-' . $date_ne[y];
                                                        }
                                                    }
                                                } else {
                                                    echo om_strtoupper(date('d  M  y', strtotime($girviDOB)));
                                                }
                                                ?></div>
                                        </td>
                                        <td align="right" width="620px" class=" border-color-grey-rb widthPX96" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                            <div class="h5 spaceLeftRight2">  <?php
                                                if ($girviDOR != '') {
                                                    if ($nepaliDateIndicator == 'YES') {
                                                        $day_en = substr($girviDOR, 0, 2);
                                                        $selMnth = substr($girviDOR, 3, -5);
                                                        $year_en = substr($girviDOR, -4);
                                                        if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
                                                            // Convert the month abbreviation to its numeric representation (zero-padded)
                                                            $selMnth = date('m', strtotime($selMnth));
                                                        }
                                                        $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
                                                        if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
                                                            $girviDOBArray = explode(' ', $girviDOR);
                                                            if (is_numeric($girviDOBArray[1])) {
                                                                $girviDOBMnth = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                            }
                                                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                echo $girviDOBArray[0] . '-' . $girviDOBArray[1] . '-' . $girviDOBArray[2];
                                                            } else {
                                                                echo $girviDOBArray[0] . ' ' . $girviDOBMnth . ' ' . $girviDOBArray[2];
                                                            }
                                                        } else {
                                                            $date_ne = $nepali_date->get_nepali_date($year_en, $selMnth, $day_en);
                                                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                echo $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                                                            } else {
                                                                echo $date_ne[d] . '-' . $date_ne[M] . '-' . $date_ne[y];
                                                            }
                                                        }
                                                    } else {
                                                        echo om_strtoupper(date('d  M  y', strtotime($girviDOR)));
                                                    }
                                                } else {
                                                    echo '-';
                                                }
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
                                                                                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" width="13px" alt="" style="cursor: pointer;"  title="click here to unsettle loan"
                                                                                                         onclick="javascript:unreleaseTransGirvi('<?php echo "$gId"; ?>', '', '<?php echo $gTransGirviId; ?>', '<?php echo $prinType; ?>', '<?php echo $upPanelName; ?>');" />
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
                        <td align = "left" valign="top" width="50%" class="paddingLeft5">
                            <?php
                            if ($upPanelName == 'updateSettledLoans') {
                                $ltranId = $_GET['ltransId'];
                                $qSelAllRelGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_exist_firm_id IN ($strFrmId) and gtrans_firm_id IN ($strGFirmId) and gtrans_upd_sts IN ('released') and gtrans_rel_sts IN ('SETTLED') AND gtrans_lstran_id='$ltranId' order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
                            } else {
                                $qSelAllRelGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_exist_firm_id IN ($strFrmId) and gtrans_firm_id IN ($strGFirmId) and gtrans_upd_sts IN ('released') and gtrans_rel_sts IN ('UNSETTLED') order by STR_TO_DATE(gtrans_DOB,'%d %b %Y') desc, gtrans_serial_num desc";
                            }
                            $resAllRelGirvi = mysqli_query($conn, $qSelAllRelGirvi);
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
//                                        echo '$gFirmId:'.$gFirmId;
                                        $girviDOB = $rowAllGirvi['gtrans_DOB'];
                                        $gMainPrinAmt = $rowAllGirvi['gtrans_prin_amt'];
                                        $gMainInt = $rowAllGirvi['gtrans_paid_int'];
                                        $gTotalAmt = $rowAllGirvi['gtrans_paid_amt'];
                                        $girviDOR = $rowAllGirvi['gtrans_DOR'];
                                        $girviTransferLoanId = $rowAllGirvi['gtrans_trans_loan_id'];
                                        $globalGTransSerailNum = $rowAllGirvi['global_gt_serial_num'];

                                        if ($girviTransferLoanId != '') {
                                            $selAllTransGirvi = "SELECT ml_lender_id,ml_pre_serial_num,ml_serial_num FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]'";
                                            $resAllTransGirvi = mysqli_query($conn, $selAllTransGirvi);
                                            $rowAllTransGirvi = mysqli_fetch_array($resAllTransGirvi, MYSQLI_ASSOC);
                                            $gPreSerialNo = $rowAllTransGirvi['ml_pre_serial_num'];
                                            $gSerialNo = $rowAllTransGirvi['ml_serial_num'];
                                            $mlId = $rowAllTransGirvi['ml_lender_id'];
                                        } else {
                                            $gPreSerialNo = $rowAllGirvi['gtrans_pre_serial_num'];
                                            $gSerialNo = $rowAllGirvi['gtrans_serial_num'];
                                        }

                                        $girviTransStatus = $rowAllGirvi['gtrans_upd_sts'];
                                        $prinType = $rowAllGirvi['gtrans_prin_typ'];
                                        if ($prinType == 'MainPrin' || $prinType == null) {
                                            $prinType = 'PRN';
                                            $prinTitle = "Main Principle";
                                        } else {
                                            $prinType = 'APRN';
                                            $prinTitle = "Additional Principle";
                                        }

                                        $totTransRelPrin += $gMainPrinAmt;
                                        $totGTransRelInt += $gMainInt;
                                        $totGTransRelAmt += $gTotalAmt;
                                        $qSelFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' and firm_id='$gFirmId'";
                                        $resFirm = mysqli_query($conn, $qSelFirm);
                                        $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                        $gFirmName = $rowFirm['firm_name'];
                                        //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                               
                                        $selFatherName = "SELECT user_father_name,user_fname,user_lname,user_city FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                                        $resFatherName = mysqli_query($conn, $selFatherName);
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
                                        $resCustInfo = mysqli_query($conn, $qSelCustInfo);
                                        $rowCustInfo = mysqli_fetch_array($resCustInfo);
                                        $girviFirmId = $rowCustInfo['girv_firm_id'];

                                        $qSelFirm = "SELECT firm_name FROM firm where firm_id='$girviFirmId' and firm_own_id='$_SESSION[sessionOwnerId]'";
                                        $resFirm = mysqli_query($conn, $qSelFirm);
                                        $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                                        $girviFirmName = $rowFirm['firm_name'];
                                        if ($gTransFirmType == 'MoneyLender') {
                                            $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                            $resMlCode = mysqli_query($conn, $selMlCode);
                                            $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
//                                            $mlId = $rowMlCode['user_unique_code'];
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
                                            <td align="right" width="250px" class ="itemAddPnLabels12 border-right-bottom">
                                                INT. AMT. 
                                            </td>
                                            <td align="center" width="300px" class ="itemAddPnLabels12 border-right-bottom">
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
        <!--                                            <td align="right" class="itemAddPnLabels12 border-bottom noPrint" width="22px">
                                                <div class="spaceRight4">DEL</div>
                                            </td>-->
                                        </tr>
                                    <?php } $counter++; ?>
                                    <tr>
                                        <td align="left" class="border-color-grey-rb" width="60px">
                                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi / Double Click To Select Girvi"
                                                   ondblclick="<?php if ($upPanelName != 'updateSettledLoans') { ?>searchTransGirviByGirviId('<?php echo $custId; ?>', '<?php echo $gTransGirviId; ?>', 'mlLoanDetailsNavi');<?php } ?>"
                                                   onclick="<?php if ($upPanelName != 'updateSettledLoans') { ?>getGirviInfoPopUp(<?php echo $custId; ?>,<?php echo $gTransGirviId; ?>, '<?php echo $documentRootBSlash; ?>')<?php } ?>"
                                                   value="<?php echo $gPreSerialNo . $gSerialNo; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"/><!--Class Changed @Author:PRIYA26AUG13-->
                                            <input type="hidden" name="girviId<?php echo $gRCounter; ?>" id="girviId<?php echo $gRCounter; ?>" value="<?php echo $gTransGirviId; ?>"/>
                                        </td>
                                    <div id="display_girvi_info_popup" class="girvi_info_popup_trans_list"></div>
                                    <td align="right" class="border-color-grey-rb" width="100px">
                                        <div class="h5 spaceRight4"><?php echo formatInIndianStyle($gMainPrinAmt); ?></div>
                                    </td>
                                    <td align="right" title="Total Interest Amount of This Page!" class="border-color-grey-rb" width="150px">
                                        <div class="h5 spaceRight4"><?php echo formatInIndianStyle($gMainInt); ?></div>
                                    </td>
                                    <td align="left" class="border-color-grey-rb" title="<?php echo $gCustName . ' ' . $fatherName; ?>" width="300px">
                                        <div class="h5 spaceRight2"><?php echo substr($gCustName, 0, 6); ?></div>
                                    </td>
                                    <td align="left" class ="border-color-grey-rb" title="<?php echo $gCustCity; ?>" width="150px">
                                        <div class="h5 spaceLeft4"><?php echo substr($gCustCity, 0, 5); ?></div>
                                    </td>
                                    <?php if ($gTransFirmType == 'MoneyLender') { ?>
                                        <td align="left" class ="border-right-bottom border-color-grey-rb" width="70px">
                                            <div class="h5 spaceLeft4"><?php echo $rowMlCode['user_unique_code']; ?></div>
                                        </td>
                                        <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                               
                                    <?php } else { ?>
                                        <td align="left" class ="border-right-bottom border-color-grey-rb" width="70px">
                                            <div class="h5 spaceLeft4"><?php echo $gFirmName; ?></div>
                                        </td>
                                    <?php } ?>
                                    <td align="right" width="750px" class ="border-right-bottom border-color-grey-rb" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                        <div class="h5 spaceRight4"><?php echo om_strtoupper(date('d  M  y', strtotime($girviDOB))); ?></div>
                                    </td>
                                    <td align="right" width="750px" class="border-bottom border-color-grey-rb" <?php if ($releaseDate != '') { ?>title="RELEASE DATE : <?php echo om_strtoupper($releaseDate); ?>"<?php } ?>>
                                        <div class="h5 spaceRight4">  <?php
                                            if ($girviDOR != '')
                                                echo om_strtoupper(date('d  M  y', strtotime($girviDOR)));
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
    <td width="100%" colspan="8" class="hrGrey"></td>
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
        <td width="100%" colspan="8" class="hrGrey"></td>
    </tr> 
<?php } if ($totBal != 0 && $upPanelName != 'updateSettledLoans') { ?>
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
            <td width="100%" colspan="8" class="hrGrey"></td>
        </tr> 
    </div>
<?php } ?>
</table>