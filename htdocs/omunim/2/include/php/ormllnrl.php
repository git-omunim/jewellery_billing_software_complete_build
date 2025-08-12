<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormllnrl.php
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
//NEW FILE TO SHOW RELEASED LOAN LIST @AUTHOR: SANDT18DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'ommpincr.php';

require_once 'system/omssopin.php';
?>
<?php
$addTotalPrincipal = 0;
$addTotalInterest = 0;
$addTotalAmount = 0;
$headerCounter = 0;
/* * **************Start code to add $sortKeyword @Author:PRIYA30MAY14********************* */
$mlId = $_GET['mlId'];
if (isset($_GET['sortKeyword'])) {
    $sortKeyword = $_GET['sortKeyword'];
}
$sortKeyword = stripslashes($sortKeyword);
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);
    $strFrmId = '0';
    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
    }
}
if ($sortKeyword != NULL) {
    $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts='Released' and ml_firm_id IN ($strFrmId) order by $sortKeyword asc";
} else {
    $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_upd_sts='Released' and ml_firm_id IN ($strFrmId) order by ml_ent_dat desc";
}
$resAllGirvi = mysqli_query($conn,$qSelAllGirvi);
$totalReleaseGirvi = mysqli_num_rows($resAllGirvi);
?>
<?php
if ($totalReleaseGirvi == 0 || $totalReleaseGirvi == NULL) {
    echo "<div class=main_link_red16>" . "RELEASED LOANS ARE NOT AVAILABLE" . "</div>"; //to show loans are not available message @AUTHOR: SANDY20JAN14
} else {
    ?>
    <table border="0" cellspacing="0" cellpadding="1" width="100%">
        <tr>
            <td colspan='4'>
                <table border="0" cellspacing="0" cellpadding="1" align="left">
                    <tr>
                        <td valign="middle" align="center" width="18px">
                            <div class="spaceLeftRight2"><img src="<?php echo $documentRootBSlash; ?>/images/red16.png" alt="" /></div>
                        </td>
                        <td valign="middle" align="left"
                            <div class="main_link_green"><b>RELEASED LOAN LIST</b></div>
                        </td>
                        <td align="left" valign="bottom" class="frm-lbl">
                            <div id="ajaxLoadGirviDetailsCustHomeDiv" style="visibility: hidden">
                                <img src="<?php echo $documentRootBSlash; ?>/images/ajaxLoad.gif" alt="" />
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
<table border="0" cellspacing="0" cellpadding="1" width="100%" style="border-radius:5px;border:1px dashed #c9c9c9;">
        <?php
        $addTotalPrincipal = 0;
        $addTotalInterest = 0;
        $discountAmt = 0;
        $addTotalAmount = 0;
        while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

            $girviId = $rowAllGirvi['ml_id'];
            $loanId = $girviId;
            $gFirmId = $rowAllGirvi['ml_firm_id'];
            $mainPrincAmount = $rowAllGirvi['ml_main_prin_amt'];
            $princAmount = $rowAllGirvi['ml_prin_amt'];

            if ($princAmount == '' || $princAmount == NULL) {
                $qUpdateGirvi = "UPDATE ml_loan SET ml_prin_amt='$mainPrincAmount'
                                         WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

                if (!mysqli_query($conn,$qUpdateGirvi)) {
                    die('Error: ' . mysqli_error($conn));
                }
                $princAmount = $mainPrincAmount;
            }

            $girviDOB = $rowAllGirvi['ml_DOB'];
            $girviNewDOB = $rowAllGirvi['ml_new_DOB'];
            $girviDOR = $rowAllGirvi['ml_DOR'];
            if($nepaliDateIndicator != 'YES'){
               $girviNewDOB = date("d M Y", strtotime($girviNewDOB)); 
                $girviDOR = date("d M Y", strtotime($girviDOR));
            }          
            $custId = $rowAllGirvi['ml_lender_id'];
            $mlId = $custId;
            $ROIType = $rowAllGirvi['ml_ROI_typ'];
            if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                $ROI = $rowAllGirvi['ml_IROI'];
            } else {
                $ROI = $rowAllGirvi['ml_ROI'];
            }
            $girviType = $rowAllGirvi['ml_type'];
            $gPreSerialNo = $rowAllGirvi['ml_pre_serial_num'];
            $gSerialNo = $rowAllGirvi['ml_serial_num'];
            $girviIntOpt = $rowAllGirvi['ml_int_opt'];
            $gMonthIntOption = $rowAllGirvi['ml_monthly_intopt'];
            $girviIntCompoundedOpt = $rowAllGirvi['ml_compounded_opt'];
            $ml_paid_int = $rowAllGirvi['ml_paid_int']; //var added @Author:PRIYA03APR14
            $ml_discount_amt = $rowAllGirvi['ml_discount_amt']; //var added @Author:PRIYA03APR14
            if ($girviNewDOB == '' || $girviNewDOB == NULL) {
                $qUpdateGirvi = "UPDATE ml_loan SET ml_new_DOB='$girviDOB'
                                         WHERE ml_id='$girviId' and ml_lender_id='$custId' and ml_own_id='$_SESSION[sessionOwnerId]'";

                if (!mysqli_query($conn,$qUpdateGirvi)) {
                    die('Error: ' . mysqli_error($conn));
                }
                $girviNewDOB = $girviDOB;
            }
            $qSelFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$gFirmId'";
            $resFirm = mysqli_query($conn,$qSelFirm);
            $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);

            $gFirmName = $rowFirm['firm_name'];


            $totalPrincipalAmount = 0;
            $totalFinalInterest = 0;
            $totalAmount = 0;
            $profitLoss = 0;

            //  include 'ommpgvip.php';

            $addTotalPrincipal += $mainPrincAmount;
            $addTotalInterest += $ml_paid_int;
            $discountAmt += $ml_discount_amt;
            $totalAmount = $mainPrincAmount + $ml_paid_int;
            $addTotalAmount += $totalAmount;

            //code to get total girvi transferred for this loan
            $selTrGirvi = "SELECT sum(gtrans_prin_amt) as total_tr_amt FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' "
                    . "and gtrans_trans_loan_id='$girviId' and gtrans_upd_sts != 'Released'"; //change in query @AUTHOR: SANDY08JAN14//Rel condition added @Author:PRIYA19MAY14
            $resTrGirvi = mysqli_query($conn,$selTrGirvi);
            $rowTrGirvi = mysqli_fetch_array($resTrGirvi, MYSQLI_ASSOC);
            $girviValuation = $rowTrGirvi['total_tr_amt'];
            $finalPrincAmount = $mainPrincAmount - $girviValuation + $totalFinalInterest;
            ?>
            <?php if ($headerCounter == 0) { ?>
                <tr style="background: #f2f2f2;height:28px;">
                    <td align = "center"  width="30px"><!--Change in class @AUTHOR: SANDY29DEC13--->
                        <div class = "heightPX20">
                            <table border = "0" cellspacing = "0" cellpadding = "0"  align = "center">
                                <tr>
                                    <td align="center">
                                        <div class="textLabel14CalibriBrownBold">S.No. &nbsp;</div>
                                    </td> 
                                    <td align="right">
                                        <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                                           onclick="sortGirviInMlHome('<?php echo $documentRoot; ?>', 'ml_pre_serial_num asc,ml_serial_num', '<?php echo $selFirmId; ?>', '<?php echo $custId; ?>', 'release');">
                                               <?php if ($sortKeyword == 'ml_pre_serial_num asc,ml_serial_num') { ?>
                                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                            <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                        </a>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td align="right" width="80px">
                        <div class="textLabel14CalibriBrownBold">PRINCIPAL</div>
                    </td>
                    <td align="right" width="80px">
                        <div class="textLabel14CalibriBrownBold">INTEREST</div>
                    </td>
                    <td align="right" width="80px">
                        <div class="textLabel14CalibriBrownBold">DISCOUNT</div>
                    </td>
                    <td align="right" width="90px">
                        <div class="textLabel14CalibriBrownBold">TOTAL</div>
                    </td>
                    <td align="right" width="90px">
                        <div class="textLabel14CalibriBrownBold">TR LOAN AMT</div>
                    </td>
                    <td width="90px" align="right">
                        <div class="textLabel14CalibriBrownBold">LEFT PRINCIPAL</div>
                    </td>
                    <td align="right"  width="50px">
                        <div class="textLabel14CalibriBrownBold" >FIRM</div>
                    </td>
                    <td align = "right"  width="70px"><!--Change in class @AUTHOR: SANDY29DEC13--->
                        <div class = "heightPX20" >
                            <table border = "0" cellspacing = "0" cellpadding = "0"  align = "right">
                                <tr>
                                    <td align="right" style="position:unset">
                                        <div class="textLabel14CalibriBrownBold">S.DATE &nbsp;</div>
                                    </td> 
                                    <td align="right">
                                        <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                                           onclick="sortGirviInMlHome('<?php echo $documentRoot; ?>', 'STR_TO_DATE(ml_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $custId; ?>', 'release');">
                                               <?php if ($sortKeyword == "STR_TO_DATE(ml_DOB,'%d %M %Y')") { ?>
                                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                            <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                        </a>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td align = "right"  width="70px" title="RELEASE DATE"><!--Change in class @AUTHOR: SANDY29DEC13--->
                        <div class = "heightPX20" style="padding-right: 10px;">
                            <table border = "0" cellspacing = "0" cellpadding = "0"  align = "right">
                                <tr>
                                    <td align="right">
                                        <div class="textLabel14CalibriBrownBold">REL.DATE &nbsp;</div>
                                    </td> 
                                    <td align="right">
                                        <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                                           onclick="sortGirviInMlHome('<?php echo $documentRoot; ?>', 'STR_TO_DATE(ml_DOR,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $custId; ?>', 'release');">
                                               <?php if ($sortKeyword == "STR_TO_DATE(ml_DOR,'%d %M %Y')") { ?>
                                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                            <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                        </a>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <?php
                $headerCounter++;
            }
            ?>
            <tr>
                <td align="center">
                    <!----ADD FUNCTION DOR DOUBLE CLICK @AUTHOR: SANDY30NOV13---->
                    <a title="Single Click To View Loan / Double Click To Select Loan"  style="cursor: pointer;" 
                       ondblclick="getRelLoanInfo('<?php echo $mlId; ?>', '<?php echo $loanId; ?>', 'MainReceipt')"
                       onclick="getLoanInfoPopUp('<?php echo $mlId; ?>', '<?php echo $loanId; ?>','ReleaseLoanDetail')"><?php echo $gPreSerialNo . $gSerialNo; ?></a>
                    <div id="display_loan_info_popup<?php echo $loanId; ?>" class="display-girvi-info-popup moneyL"></div>
                </td>
                <td align="right">
                    <div class="amount"><?php echo formatInIndianStyle($mainPrincAmount); ?></div>
                </td>
                <td align="right">
                    <div class="amount"><?php echo formatInIndianStyle($ml_paid_int); ?></div>
                </td>
                <td align="right">
                    <div class="amount"><?php echo formatInIndianStyle($ml_discount_amt); ?></div>
                </td>
                <td align="right">
                    <div class="amount"><?php echo formatInIndianStyle($totalAmount); ?></div>
                </td>
                <?php if ($girviType == 'secured') { ?>
                    <td align="right">
                        <div class="amount"><?php echo formatInIndianStyle($girviValuation); ?></div>
                    </td>
                <?php } else { ?>
                    <td align="right">
                        <div class="amount"><?php echo 'Unsecured'; ?></div>
                    </td>
                <?php } ?>
                <td align="right">
                    <div class="amount"><?php echo formatInIndianStyle($finalPrincAmount); ?></div>
                </td>
                <td align="right">
                    <h5><?php echo om_strtoupper($gFirmName); ?></h5>
                </td>
                <td align="right">
                    <h5><?php 
                     if($nepaliDateIndicator == 'YES'){
                         echo $girviNewDOB;
                     }else{
                    echo om_strtoupper(date('d  M  y', strtotime($girviNewDOB))); 
                     }?></h5>
                </td>
                <td align="right">
                    <h5  style="padding-right: 10px;"><?php 
                    if($nepaliDateIndicator == 'YES'){
                         echo $girviDOR;
                     }else{
                  echo om_strtoupper(date('d  M  y', strtotime($girviDOR)));
                     }
                     ?></h5>
                </td>
            </tr>
            <?php
            $gCounter++;
        }
        ?>
<!--        <tr>
            <td align="center" colspan="10">
                <hr color="#F1F1F1" size="0.1px" />
            </td>
        </tr>-->
        <tr class="totlBg">
            <td align="center">
                <div class="textLabel14CalibriBrownBold pdngall3">TOTAL - </div>
            </td>
            <td align="right">
                <div class="amount pdngall3"><b><?php echo formatInIndianStyle($addTotalPrincipal); ?></b></div>
            </td>
            <td align="right">
                <div class="amount pdngall3"><b><?php echo formatInIndianStyle($addTotalInterest); ?></b></div>
            </td>
            <td align="right">
                <div class="amount pdngall3"><b><?php echo formatInIndianStyle($discountAmt); ?></b></div>
            </td>
            <td align="right">
                <div class="amount_green pdngall3"><b><?php echo formatInIndianStyle($addTotalAmount); ?></b></div>
            </td>
            <td align="right">
                <div class="h7"></div>
            </td>
            <td align="right">
                <div class="h7"></div>
            </td>
            <td align="right" colspan="4">
                <div class="h7"></div>
            </td>      
        </tr>
<!--        <tr>
            <td align="center" colspan="10">
                <hr color="#F1F1F1" size="0.1px" />
            </td>
        </tr>-->
    </table>
    <?php
}
/* * **************End code to add $sortKeyword @Author:PRIYA30MAY14********************* */
//***************** End Code Active Girvi List ***************************
?>
<br/>

