<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: orrellns.php
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
//change in file @AUTHOR: SANDY02JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpdpmsg.php'; //add msg file @AUTHOR: SANDY07FEB14

if ($mlId == '' || $loanId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
}
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
?>
<div id="relLoanDetailsGlobalDiv" class="main_middle">
    <div id="relLoanDetailsDiv" class="ShadowFrm">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left" width="30px">
                    <div class="spaceLeft10">
                        <img src="<?php echo $documentRoot; ?>/images/orange16.png" width="16px" height="16px"/>
                    </div>
                </td>
                <td align="left">
                    <div class="spaceLeft4">
                        <div class="main_link_orange_normal16" style="color:#DF264A"><b>RELEASED LOAN DETAILS&nbsp;</b></div>
                            <?php // echo $releaseLoanDetPanel; ?>
                    </div>
                    <div id="display_girvi_barcode_slip" class="display-girvi-barcode-slip"></div>
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
                        if ($loanId != '') {
                            $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'  and ml_id='$loanId' and ml_firm_id IN ($strFrmId) and ml_upd_sts='Released' LIMIT $perOffset, $checkNextRows";
                            $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                            $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                            $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'  and ml_upd_sts='Released' and ml_id='$loanId' and ml_firm_id IN ($strFrmId) order by STR_TO_DATE(ml_DOB,'%d %b %Y') desc LIMIT $perOffset, $perRowsPerPage";
                            $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                            $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                        } else {
                            $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts='Released' and ml_firm_id IN ($strFrmId) LIMIT $perOffset, $checkNextRows";
                            $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                            $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                            $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts='Released' and ml_firm_id IN ($strFrmId) order by STR_TO_DATE(ml_DOB,'%d %b %Y') desc LIMIT $perOffset, $perRowsPerPage";
                            $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                            $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                        }
                    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                        if ($loanId != '') {
                            $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$loanId' and ml_upd_sts='Released'";
                            $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                            $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                            $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]'  and ml_id='$loanId' and ml_upd_sts='Released'  order by STR_TO_DATE(ml_DOB,'%d %b %Y') desc LIMIT $perOffset, $perRowsPerPage";
                            $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                            $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                        } else {
                            $qSelTotalGirviCount = "SELECT ml_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_upd_sts='Released' and ml_lender_id='$mlId' LIMIT $perOffset, $checkNextRows";
                            $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTotalGirviCount);
                            $totalGirvi = mysqli_num_rows($resTotalGirviCount);

                            $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_upd_sts='Released' and ml_lender_id='$mlId' order by STR_TO_DATE(ml_DOB,'%d %b %Y') desc LIMIT $perOffset, $perRowsPerPage";
                            $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                            $totalNextGirvi = mysqli_num_rows($resAllGirvi);
                        }
                    }

                    while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

                        $girviId = $rowAllGirvi['ml_id'];
                        $loanId = $girviId;
                        $custId = $mlId;
                        $mainPrincAmount = $rowAllGirvi['ml_main_prin_amt'];
                        $princAmount = $rowAllGirvi['ml_prin_amt'];
                        $firmLoanNo = $rowAllGirvi['ml_firm_mli_no'];
                        $firm = $rowAllGirvi['ml_firm_id'];

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
                        $girviDOB = $rowAllGirvi['ml_DOB'];
                        $girviDOR = $rowAllGirvi['ml_DOR'];
                        $girviNewDOB = $rowAllGirvi['ml_new_DOB'];
                        if($nepaliDateIndicator == 'YES'){
                            $girviDOB = $girviDOB;
                            $girviNewDOB = $girviNewDOB;
                        }else{
                            $girviDOB = om_strtoupper(date("d M Y", strtotime($girviDOB)));
                            $girviNewDOB = om_strtoupper(date("d M Y", strtotime($girviNewDOB)));
                        }
                        $girviIntOpt = $rowAllGirvi['ml_int_opt'];
                        $girviIntCompoundedOpt = $rowAllGirvi['ml_compounded_opt'];
                        $girviType = $rowAllGirvi['ml_type'];
                        $mlLnNo = $rowAllGirvi['ml_cust_mli_num'];
                        $preSerialNum = $rowAllGirvi['ml_pre_serial_num'];
                        $serialNum = $rowAllGirvi['ml_serial_num'];
                        $girviOtherInfo = $rowAllGirvi['ml_comm'];
                        $girviUpdSts = $rowAllGirvi['ml_upd_sts'];
                        $selInerestType = $rowAllGirvi['ml_ROI_typ'];
                        $mlTrType = $rowAllGirvi['ml_ln_cr_dr']; //@AUTHOR: SANDY27DEC13
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
                        $omPanelDiv = 'ReleasedLoan'; //set panel for roi files @AUTHOR: SANDY21NOV13
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
                                                <a style="cursor: pointer;" onclick="javascript:getPage('<?php echo $perPageNum - 1; ?>','<?php echo $mlId; ?>','RELEASEDLOANINFO');">
                                                    <img src="<?php echo $documentRoot; ?>/images/img/next-right.png" alt='PREVIOUS LOAN' title='PREVIOUS LOAN / GIRVI'
                                                         width="16px" height="16px" style="transform: rotate(180deg);"/> 
                                                </a>
                                            </div>
                                        </td>
                                    <?php }
                                    ?><?php
                            if ($totalGirvi > $perRowsPerPage) {
                                        ?>
                                        <td align="right" valign="bottom">
                                            <div class="spaceRight10">
                                                <a style="cursor: pointer;margin-left:5px;" onclick="javascript:getPage('<?php echo $perPageNum + 1; ?>', '<?php echo $mlId; ?>','RELEASEDLOANINFO');">
                                                    <img src="<?php echo $documentRoot; ?>/images/img/next-right.png" alt='NEXT LOAN' title='NEXT LOAN / GIRVI'
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
<!--            <tr>
                <td valign="top" align="left" colspan="3" class="border-top">
            </tr>-->
        </table>
        <?php if ($totalGirvi > 0) { ?>
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left" width="100%" colspan="2">
                        <?php include 'orlnrldt.php'; ?>
                    </td>
                </tr>
            </table>
        <?php } else { ?>
            <table border="0" cellpadding="2" cellspacing="0" align="left" width="100%">
                <tr>
                    <td align="left">
                        <div class="spaceLeft40 brownMess14Arial">~ Loans are not available in database ~</div><!---tO ADD CLASS @AUTHOR: SANDY07FEB14--->
                    </td>
                </tr>
            </table>
        <?php } ?>
        <?php if ($totalGirvi > 0 || $totalNextGirvi > 0) { ?>
            <table border="0" cellpadding="2" cellspacing="0" align="left" width="100%" style="margin-top:25px;">
                <tr>
                    <td colspan="7" align="right">
                        <table border="0" cellpadding="2" cellspacing="0" align="center">
                            <tr>
                                <td align="center" width="35px">
                                    <div id="loanDeleteButDiv">
                                        <a style="cursor: pointer;" onclick="javascript:deleteLoanDetails(<?php echo "$girviId"; ?>,'<?php echo $mlId; ?>');"><!--Change in function @AUTHOR: SANDY27DEC13--->
                                            <img src="<?php echo $documentRoot; ?>/images/img/trash.png" alt='DELETE LOAN' title='DELETE LOAN'
                                                 width="20px" height="20px" />
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
                                                <a style="cursor: pointer;" onclick="javascript:getPage('<?php echo $perPageNum - 1; ?>','<?php echo $mlId; ?>','LOANINFO');">
                                                    <img src="<?php echo $documentRoot; ?>/images/img/next-right.png" alt='PREVIOUS LOAN' title='PREVIOUS LOAN'
                                                         width="20px" height="20px" style="transform:rotate(180deg);"/>
                                                   
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
                                                <a style="cursor: pointer;" onclick="javascript:getPage('<?php echo $perPageNum + 1; ?>','<?php echo $mlId; ?>','LOANINFO');">
                                                    <img src="<?php echo $documentRoot; ?>/images/img/next-right.png" alt='NEXT LOAN' title='NEXT LOAN'
                                                         width="20px" height="20px"/> 
                                                    
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
              
            </table>
        <?php } ?>
    </div>
</div>   


