<?php
/*
 * Created on Jun 04, 2016 10:03:10 AM
 *
 * @FileName: omuemidet.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
require_once 'ommpincr.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';

if ($custId == '') {
    $custId = $_POST['custId'];
    $firmId = $_POST['firmId'];
}
if ($custId == '') {
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
}
$panelDetails = $_GET['panelName'];
$showDiv = $_GET['divMainMiddlePanel'];
?>
<table border="0" cellspacing="2" cellpadding="2" width="100%">

    <tr>
        <td align="left" width="100%">
            <div class="spaceLeft20 ff_calibri fs_14 fw_b">
                UDHAAR EMI DETAILS
            </div>
        </td>
        <td align="right" valign="bottom">
            <input type="submit" value="PAID UDHAAR EMI DETAILS"
                   id="buttPaidUdhaarDetails" name="buttPaidUdhaarDetails" 
                   onclick="showPaidUdhaarDetailsDiv('<?php echo $custId; ?>', '<?php echo $firmId; ?>');"
                   class="frm-btn" style="width:180px;color: #000080;background: #BED8FD;border: 1px solid #5299FF;border-radius: 5px!important;font-size:14px;"/>
        </td>
    </tr>
    <tr>
        <td align="left" colspan="6" class="paddingTop4 padBott4">
            <div class="hrGold"></div>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <div id="custUdhaarDetailsDiv">
                <?php
                $udCounter = 1;
                if ($showDiv == "Deleted" || $showDiv == "Paid") {
                    include 'omuucpud.php';
                } else {
//                    $qSelTotalUdhaarCount = "SELECT udhaar_id FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_cust_id='$custId' and udhaar_upd_sts IN ('New','Updated')";
//                    $resTotalUdhaarCount = mysqli_query($conn,$qSelTotalUdhaarCount);
//                    $totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);
//
//                    $qSelAllUdhaar = "SELECT * FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_cust_id='$custId' and udhaar_upd_sts IN ('New','Updated') order by udhaar_ent_dat desc";
//                    $resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar);
//                    $totalNextUdhaar = mysqli_num_rows($resAllUdhaar);
//
//                    if ($totalUdhaar <= 0) {
//                        echo "<div class=" . "spaceLeft40" . "><h4> ~ Udhaar Details not available ~ </h4></div>";
//                    }
//                    if ($totalNextUdhaar <= 0) {
//                        echo "<div class=" . "spaceLeft40" . "><h4> ~ No More Udhaar Details are available. Go to previous Udhaar Details. ~ </h4></div>";
//                    }
//                    $udhaarDiv = 1;
//                    $totalUdhaarAmt = 0;
//                    $totalUdhaarTotalDepAmount = 0;
//
//                    while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {
//                        $udhaarId = $rowAllUdhaar['udhaar_id'];
//                        $udhaarAmount = $rowAllUdhaar['udhaar_amt'];
//                        $udhaarCustId = $rowAllUdhaar['udhaar_cust_id'];
//                        $udhaarType = $rowAllUdhaar['udhaar_type'];
//                        $udhaarDOB = $rowAllUdhaar['udhaar_DOB'];
//                        $udhaarHistory = $rowAllUdhaar['udhaar_history'];
//                        $udhaarComm = $rowAllUdhaar['udhaar_comm'];
//                        $udhaarUpdStatus = $rowAllUdhaar['udhaar_upd_sts'];
//                        $udhaarOtherInfo = $rowAllUdhaar['udhaar_other_info'];
//                        $udhaarJrnlId = $rowAllUdhaar['udhaar_jrnl_id']; //Udhaar Jrnl Id Added @Author:PRIYA18AUG13 
//                        $firmId = $rowAllUdhaar['udhaar_firm_id'];
//                        $udhaarPreSerialNum = $rowAllUdhaar['udhaar_pre_serial_num'];
//                        $udhaarSerialNum = $rowAllUdhaar['udhaar_serial_num'];
//                        $udhaarROI = $rowAllUdhaar['udhaar_ROI'];
//                        $udhaarEMIDays = $rowAllUdhaar['udhaar_EMI_days'];
//                        $udhaarEMIOccur = $rowAllUdhaar['udhaar_EMI_occurrences'];
//                        $udhaarEMIStatus = $rowAllUdhaar['udhaar_EMI_status'];
//                        $udhaarGdWt = $rowAllUdhaar['udhaar_gd_weight'];
//                        $udhaarGdWtTyp = $rowAllUdhaar['udhaar_gd_weight_type'];
//                        $udhaarSrWt = $rowAllUdhaar['udhaar_sr_weight'];
//                        $udhaarSrWtTyp = $rowAllUdhaar['udhaar_sr_weight_type'];
//                        $udhaarAmt = $rowAllUdhaar['udhaar_prin_amt'];
//                        $udhaEMIOpt = $rowAllUdhaar['udhaar_EMI_opt'];
//                        /*                         * *******Start code to get om layout value of Udhaar option @OMMODTAG SHRI_02SEP15**************** */
//                        if ($udhaEMIOpt == '' || $udhaEMIOpt == NULL) {
//                            $selUdhaEMIOpt = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaEMIOpt'";
//                            $resUdhaEMIOpt = mysqli_query($conn,$selUdhaEMIOpt);
//                            $rowUdhaEMIOpt = mysqli_fetch_array($resUdhaEMIOpt);
//                            $udhaEMIOpt = $rowUdhaEMIOpt['omly_value'];
//                        }
//                        /*                         * *******End code to get om layout value of Udhaar option @OMMODTAG SHRI_02SEP15**************** */
//
//                        if ($udhaarEMIDays != '' || $udhaarEMIDays != NULL) {
//                            if ($udhaEMIOpt == 'divideOrAdjustAmt') {
//                                include 'omuemdtla.php';
//                            } else {
//                                include 'omuemdtl.php';
//                            }
//                            $totalUdhaarAmt += $emiTotalAmt;
//                        }
//                        $udCounter++;
//                    }
                }
                ?>
            </div>
        </td>
    </tr>

    <?php if ($udhaarUpdStatus != 'Deleted' && $totalUdhaar > 0) { ?>
        <tr>
            <td align="left" valign="top" colspan="4" class="paddingLeft20"> 
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 brown">
                            TOTAL UDHAAR : <span class="ff_calibri fs_14 darkblueFont"><?php echo formatInIndianStyle($totalUdhaarAmt); ?></span>
                        </td>
                        <!--START CODE TO ELABORATE TOTAL DEPOSIT @Author:SHE20OCT15-->
                        <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 brown">
                            TOTAL DEPOSIT : TOTAL DEPOSIT AMT + TOTAL DISCOUNT : <span class="ff_calibri fs_14 darkblueFont"><?php echo formatInIndianStyle($totalUdhaarTotalDepAmount); ?></span>
                        </td>
                        <!--END CODE TO ELABORATE TOTAL DEPOSIT @Author:SHE20OCT15-->
                        <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 brown">
                            TOTAL REMAIN :<span class="ff_calibri fs_14 darkblueFont"><?php echo formatInIndianStyle($totalUdhaarAmt - $totalUdhaarTotalDepAmount); ?></span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    <?php } ?>
</table>
<hr color="#B8860B" />

