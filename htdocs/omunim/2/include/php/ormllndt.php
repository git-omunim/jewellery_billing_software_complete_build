<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormllndt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//changes in file @AUTHOR: SANDY03JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpdpmsg.php'; //add msg file @AUTHOR: SANDY31JAN14

if ($mlId == '' || $loanId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
}
if ($loanId == '') {
    $serialNum = $_GET['loanSerNo'];
    $preSerNo = preg_replace("/[^a-zA-Z]+/", "", $serialNum);
    $serNo = preg_replace("/[^0-9]+/", "", $serialNum);
    $getLoanDetFromSerNo = "SELECT ml_id FROM ml_loan WHERE ml_pre_serial_num='$preSerNo' and ml_serial_num='$serNo' and ml_own_id='$_SESSION[sessionOwnerId]'";
    $resLoanDetFromSerNo = mysqli_query($conn,$getLoanDetFromSerNo);
    $rowLoanDetFromSerNo = mysqli_fetch_array($resLoanDetFromSerNo, MYSQLI_ASSOC);
    $loanId = $rowLoanDetFromSerNo['ml_id'];
}
$newLoanAdded = $_GET['newLoanAdded'];
?>
<div id="loanDetailsGlobalDiv">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <div class="spaceLeft10 paddingTop2">
                    <img src="<?php echo $documentRoot; ?>/images/orange16.png" width="16px" height="16px"/>
                </div>
            </td>
            <td align="left" width="80%">
                <div class="spaceLeft5">
                    <div class="main_link_orange_normal16"><b>ACTIVE LOAN DETAILS</b></div>
                </div>
            </td>
            <td align="right" width="20%" valign="middle">
                <?php
                $perRowsPerPage = 1;
                $checkNextRows = $perRowsPerPage * 2;
                $perPageNum = 1;
                if (isset($_GET['page'])) {
                    $perPageNum = $_GET['page'];
                }

                $perOffset = ($perPageNum - 1) * $perRowsPerPage;
                if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                    $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                    $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);

                    $strFrmId = '0';

                    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                        $strFrmId = $strFrmId . ",";
                        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
                    }

                    if ($newLoanAdded == 'YES') {
                        $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts!='Released' and ml_id='$loanId' and ml_firm_id IN ($strFrmId)";
                        $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                        $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                        $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts!='Released' and ml_id='$loanId' and ml_firm_id IN ($strFrmId)";
                        $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                        $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                    } else if ($loanId != '') {
                        $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$loanId' and ml_upd_sts != ' Released' and ml_firm_id IN ($strFrmId) LIMIT $perOffset, $checkNextRows";
                        $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                        $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                        $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$loanId' and ml_upd_sts!=' Released' and ml_firm_id IN ($strFrmId) order by STR_TO_DATE(ml_DOB,'%d %b %Y') desc LIMIT $perOffset, $perRowsPerPage";
                        $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                        $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                    } else {
                        $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts!='Released' and ml_firm_id IN ($strFrmId) LIMIT $perOffset, $checkNextRows";
                        $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                        $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                        $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts!='Released' and ml_firm_id IN ($strFrmId) order by STR_TO_DATE(ml_DOB,'%d %b %Y') desc LIMIT $perOffset, $perRowsPerPage";
                        $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                        $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                    }
                } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                    if ($newLoanAdded == 'YES') {
                        $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts!='Released' and ml_id='$loanId'";
                        $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                        $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                        $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_id='$loanId'";
                        $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                        $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                    } else if ($loanId != '') {
                        $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_upd_sts!=' Released'  and ml_id='$loanId' LIMIT $perOffset, $checkNextRows";
                        $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                        $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                        $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_upd_sts!=' Released' and ml_id='$loanId' order by STR_TO_DATE(ml_DOB,'%d %b %Y') desc LIMIT $perOffset, $perRowsPerPage";
                        $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                        $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                    } else {
                        $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'  and ml_upd_sts!='Released' and ml_lender_id='$mlId' LIMIT $perOffset, $checkNextRows";
                        $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                        $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                        $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_upd_sts!='Released' and ml_lender_id='$mlId' order by STR_TO_DATE(ml_DOB,'%d %b %Y') desc LIMIT $perOffset, $perRowsPerPage";
                        $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                        $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                    }
                }
                while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

                    $girviId = $rowAllGirvi['ml_id'];
                    $mlId = $rowAllGirvi['ml_lender_id'];
                    $loanId = $girviId;
                    $custId = $mlId;
                    $mainPrincAmount = $rowAllGirvi['ml_main_prin_amt'];
                    $princAmount = $rowAllGirvi['ml_prin_amt'];
                    $firmLoanNo = $rowAllGirvi['ml_firm_mli_no'];
                    $firm = $rowAllGirvi['ml_firm_id'];
                    $mlTrType = $rowAllGirvi['ml_ln_cr_dr'];
                    $selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$firm' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                    $resSelFirmName = mysqli_query($conn,$selFirmName);
                    $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                    $firmName = $rowSelFirmName['firm_name'];

                    $ROIId = $rowAllGirvi['ml_ROI_Id'];

                    //Start Code to check ROI Id is null or not
                    if ($ROIId == NULL || $ROIId == '' || $ROIId == 0) {
                        $ROI = $rowAllGirvi['ml_ROI'];

                        $qSelROI = "SELECT roi_id FROM roi where roi_value='$ROI'";
                        $resROI = mysqli_query($conn,$qSelROI);
                        $rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
                        $ROIId = $rowROI['roi_id'];

                        $qUpdGirvi = "UPDATE ml_loan SET ml_ROI_Id='$ROIId'
                                         WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

                        if (!mysqli_query($conn,$qUpdGirvi)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                    }
                    //End Code to check ROI Id is null or not

                    if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                        $ROI = $rowAllGirvi['ml_IROI'];
                    } else {
                        $ROI = $rowAllGirvi['ml_ROI'];
                    }
                    $ROIType = $rowAllGirvi['ml_ROI_typ'];
                    $girviDOB = $rowAllGirvi['ml_DOB']; //taken variable names from AS THAT OF ADD girvi as it requires for api
                    $girviDOB = om_strtoupper(date("d M Y", strtotime($girviDOB)));
                    $girviNewDOB = $rowAllGirvi['ml_new_DOB'];
                    $girviNewDOB = om_strtoupper(date("d M Y", strtotime($girviNewDOB)));
                    $girviIntOpt = $rowAllGirvi['ml_int_opt'];
                    $girviIntCompoundedOpt = $rowAllGirvi['ml_compounded_opt'];
                    $girviType = $rowAllGirvi['ml_type'];
                    $mlLnNo = $rowAllGirvi['ml_cust_mli_num'];
                    $preSerialNum = $rowAllGirvi['ml_pre_serial_num'];
                    $serialNum = $rowAllGirvi['ml_serial_num'];
                    $loanOtherInfo = $rowAllGirvi['ml_comm']; //@AUTHOR: SANDY31JAN14
                    $girviUpdSts = $rowAllGirvi['ml_upd_sts'];
                    $selInerestType = $rowAllGirvi['ml_ROI_typ'];
                    $girviDOR = $rowAllGirvi['ml_DOR']; //change in line @AUTHOR: SANDY25JAN14
                    //Start code to add new Girvi DOB
                    if ($girviNewDOB == '' || $girviNewDOB == NULL) {
                        $qUpdateGirvi = "UPDATE ml_loan SET ml_new_DOB='$girviDOB'
                                         WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

                        if (!mysqli_query($conn,$qUpdateGirvi)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                        $girviNewDOB = $girviDOB;
                    }
                    //End code to add new Girvi DOB

                    $gMonthIntOption = $rowAllGirvi['ml_monthly_intopt'];
                    $omPanelDiv = 'mlLoanInfo'; //set panel for roi files @AUTHOR: SANDY21NOV13
                    ?>
                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                        <tr>
                            <?php
                            if ($totalNextGirvi > 0) {
                                ?><?php
                                if ($perPageNum > 1) {
                                    ?>
                                    <td align="right" valign="bottom">
                                        <div class="spaceLeft10">
                                            <a style="cursor: pointer;" onclick="javascript:getPage('<?php echo $perPageNum - 1; ?>', '<?php echo $mlId; ?>', 'LOANINFO');">
                                                <img src="<?php echo $documentRoot; ?>/images/prev16.png" alt='PREVIOUS LOAN' title='PREVIOUS LOAN / GIRVI'
                                                     width="16px" height="16px"/> 
                                            </a>
                                        </div>
                                    </td>
                                <?php }
                                ?><?php
                                if ($totalGirvi > $perRowsPerPage) {
                                    ?>
                                    <td align="right" valign="bottom">
                                        <div class="spaceLeft10">
                                            <a style="cursor: pointer;" onclick="javascript:getPage('<?php echo $perPageNum + 1; ?>', '<?php echo $mlId; ?>', 'LOANINFO');">
                                                <img src="<?php echo $documentRoot; ?>/images/next16.png" alt='NEXT LOAN' title='NEXT LOAN / GIRVI'
                                                     width="16px" height="16px"/> 
                                            </a>
                                        </div>
                                    </td>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </tr>
                </table>
            </td> 
        </tr>
<!--        <tr>
            <td valign="top" align="left" colspan="3" class="border-top">
        </tr>-->
    </table>
    <?php if ($totalGirvi > 0) { ?>
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left" width="100%" colspan="2">
                    <?php include 'ormllndd.php'; ?>
                </td>
            </tr>
        </table>
    <?php } else { ?>
        <table border="0" cellpadding="2" cellspacing="0" align="left" width="100%">
            <tr>
                <td align="left">
                    <div class="spaceLeft40 brownMess14Arial">~ Loans are not available in database ~</div>
                </td>
            </tr>
        </table>
    <?php } ?>
    <?php if ($totalGirvi > 0 || $totalNextGirvi > 0) { ?>
        <table border="0" cellpadding="2" cellspacing="0" align="left" width="100%" style="background: #f5f5f5;border-top: 1px solid #d5d4d4;border-bottom: 1px solid #d5d4d4;margin-top: 5px;">
<!--            <tr>
                <td align="left" colspan="8"><hr color="#FD9A00" size="0.1px" /></td>
            </tr>-->
            <tr>
                <td align="left" width="400px">
                </td>
                <td>
                    <table border="0" cellpadding="2" cellspacing="0" align="center">
                        <tr>
                            <td align="center" class="noPrint">
                                <a style="cursor: pointer;" class="frm-btn iconbtn" 
                                   onclick="printGirviListPanel('loanDetailsMainDiv')">
                                    <img src="<?php echo $documentRoot; ?>/images/img/printer.png" alt='PRINT' title='PRINT'
                                         width="20px" height="20px" /> print
                                </a> 
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="0" cellpadding="2" cellspacing="0" align="center">
                        <tr>
                            <td align="center" width="35px">
                                <div id="loanDeleteButDiv">
                                    <a style="cursor: pointer;" class="frm-btn iconbtn" onclick="javascript:deleteLoanDetails(<?php echo "$girviId"; ?>,<?php echo "$mlId"; ?>);">
                                        <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" alt='DELETE LOAN' title='DELETE LOAN'
                                             width="20px" height="20px" /> delete loan
                                    </a> 
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="0" cellpadding="2" cellspacing="0" align="center">
                        <tr>
                            <td align="center" width="35px">
                                <div id="loanUpdateButDiv">
                                    <a style="cursor: pointer;" class="frm-btn iconbtn" onclick="javascript:updateLoanDetails(<?php echo "$mlId"; ?>,<?php echo "$loanId"; ?>);">
                                        <img src="<?php echo $documentRoot; ?>/images/img/update-btn.png" alt='UPDATE LOAN' title='UPDATE LOAN'
                                             width="20px" height="20px" /> update item
                                    </a> 
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="0" cellpadding="2" cellspacing="0" align="center">
                        <tr>
                            <td align="center" width="35px">
                                <div id="loanReleaseDetailsButDiv">
                                    <a style="cursor: pointer;" class="frm-btn iconbtn" onclick="javascript:releaseLoanDetails(<?php echo "$mlId"; ?>,<?php echo "$girviId"; ?>, '<?php echo $perPageNum; ?>');">
                                        <img src="<?php echo $documentRoot; ?>/images/img/release.png" alt='RELEASE LOAN' title='RELEASE LOAN'
                                             width="20px" height="20px" />Release loan 
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="right" valign="middle" width="60px">
                    <div id="ajaxLdGirviInfoBelowButtPanelDiv" style="visibility: hidden">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                </td> 
                <td width="150px">
                    <?php
                    if ($totalNextGirvi > 0) {
                        ?>
                        <table border="0" cellpadding="2" cellspacing="0" align="right">
                            <tr>
                                <?php
                                if ($perPageNum > 1) {
                                    ?>
                                    <td align="right" valign="bottom">
                                        <div class="spaceLeft10">
                                            <a style="cursor: pointer;" onclick="javascript:getPage('<?php echo $perPageNum - 1; ?>', '<?php echo $mlId; ?>', 'LOANINFO');">
                                                <img src="<?php echo $documentRoot; ?>/images/prev32.png" alt='PREVIOUS LOAN' title='PREVIOUS LOAN'
                                                     width="32px" height="32px"/> 
                                            </a>
                                        </div>
                                    </td>
                                    <?php
                                }
                                ?><?php
                                if ($totalGirvi > $perRowsPerPage) {
                                    ?>
                                    <td align="right" valign="bottom">
                                        <div class="spaceLeft10">
                                            <a style="cursor: pointer;" onclick="javascript:getPage('<?php echo $perPageNum + 1; ?>', '<?php echo $mlId; ?>', 'LOANINFO');">
                                                <img src="<?php echo $documentRoot; ?>/images/next32.png" alt='NEXT LOAN' title='NEXT LOAN'
                                                     width="32px" height="32px"/> 
                                            </a>
                                        </div>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                </td>
            </tr>
<!--            <tr>
                <td align="left" colspan="8"><hr color="#FD9A00" size="0.1px" /></td>
            </tr>-->
        </table>
    <?php } ?>
</div>