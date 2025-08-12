<?php
/* Release Loan Panel @AUTHOR: SANDY27NOV13
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormlnrel.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpdpmsg.php'; //add msg file @AUTHOR: SANDY31JAN14
?>
<?php
//CHNAGE IN FILE @AUTHOR: SANDY31JAN14

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
//For navigation FROM TRANS GIRVI RELEASE PANEL @AUTHOR: SANDY22JAN14
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
?>
<div class="ShadowFrm">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left" width="18px">
                <div class="spaceLeft10 paddingTop2">
                    <img src="<?php echo $documentRoot; ?>/images/orange16.png" width="16px" height="16px">
                </div>
            </td>
            <td align="left">
                <div>
                    <div class="textLabel16CalibriNormalYellow" style="color: #DF264A;"><b> &nbsp;RELEASE LOAN PANEL</b></div><!--USE MSG VARIABLE @AUTHOR: SANDY31JAN14--->
                </div>
            </td>
        </tr>
<!--        <tr>
            <td valign="top" align="left" class="border-top" colspan="2">
        </tr>-->
    </table>
    <?php
    $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$loanId'";
    $resAllGirvi = mysqli_query($conn,$qSelAllGirvi);
    $rowAllGirvi = mysqli_fetch_array($resAllGirvi);
    $girviId = $rowAllGirvi['ml_id'];
    $loanId = $girviId;
    $mlId = $rowAllGirvi['ml_lender_id'];
    //$custId = $mlId;
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
    $girviJrnlId = $rowAllGirvi['ml_jrnlid']; //@AUTHOR: SANDY15JAN14
    $girviDOB = $rowAllGirvi['ml_DOB'];
    $girviDOR = $rowAllGirvi['ml_DOR']; //@AUTHOR: SANDY22JAN14
    $girviNewDOB = $rowAllGirvi['ml_new_DOB'];
    if ($nepaliDateIndicator == 'YES') {
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
    $loanOtherInfo = $rowAllGirvi['ml_comm'];
    $girviUpdSts = $rowAllGirvi['ml_upd_sts'];
    $selInerestType = $rowAllGirvi['ml_ROI_typ'];
    $mlTrType = $rowAllGirvi['ml_ln_cr_dr']; //@AUTHOR: SANDY27DEC13
    $omPanelDiv = 'mlLoanInfoToRelease'; //set panel @AUTHOR: SANDY28DEC13
    $gMonthIntOption = $rowAllGirvi['ml_monthly_intopt']; //@AUTHOR: SANDY21JAN14
    //Start code to add new Girvi DOB
    if ($girviNewDOB == '' || $girviNewDOB == NULL) {
        $qUpdateGirvi = "UPDATE ml_loan SET ml_new_DOB='$girviDOB'
                                         WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

        if (!mysqli_query($conn,$qUpdateGirvi)) {
            die('Error: ' . mysqli_error($conn));
        }
        $girviNewDOB = $girviDOB;
    }
    $grvRelPayDetails = 'TRUE';
    include 'orlnrldt.php';
    ?>
</div>
