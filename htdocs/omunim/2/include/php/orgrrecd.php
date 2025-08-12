<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgrrecd.php
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
$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';

$qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_upd_sts='ReleaseCart'"; //girv_cust_id='$custId' and 
$resAllGirvi = mysqli_query($conn,$qSelAllGirvi);
$totalGirvi = mysqli_num_rows($resAllGirvi);

$gCounter = 0;
$totalPrinAmt = 0;
$totalIntAmt = 0;
$totalAmt = 0;

if ($totalGirvi <= 0) {
    echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ Release Girvi Cart is empty. ~ </div></div>";
} else {
    ?>

    <div id="relGriviCartDiv">
        <table border="1" cellspacing="0" cellpadding="2" width="100%">
            <tr>
                <td align="left" width="10px">
                    <div class="h7">SN</div>
                </td>
                <td align="left" width="90px">
                    <div class="h7">CUSTOMER</div>
                </td>
                <td align="left" width="50px">
                    <div class="h7">CITY</div>
                </td>
                <td align="left"  width="50px">
                    <div class="h7">FIRM</div>
                </td>
                <td align="center" width="20px">
                    <div class="h7">GNO</div>
                </td>
                <td align="center"  width="70px">
                    <div class="h7">PRINCIPAL</div>
                </td>
                <td align="left" width="20px">
                    <div class="h7">ROI</div>
                </td>
                <td align="center" width="30px">
                    <div class="h7">INT</div>
                </td>
                <td align="center" width="100px">
                    <div class="h7">GIRVI DATE</div>
                </td>
                <td align="center" width="80px">
                    <div class="h7">REL DATE</div>
                </td>
                <td align="center"  width="100px">
                    <div class="h7">TIME</div>
                </td>
                <td align="center" width="70px">
                    <div class="h7">TOTAL</div>
                </td>
                <td align="center"  width="60px">
                    <div class="h7">AMT PAID</div>
                </td>
                <td align="center" width="60px">
                    <div class="h7">DISCOUNT</div>
                </td>
                <td align="center" width="15px">
                    <div class="h7">DEL</div>

                </td>
            </tr>
            <?php
        }
        while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

            $gId = $rowAllGirvi['girv_id'];
            $gFirmId = $rowAllGirvi['girv_firm_id'];
            $gFirmGirviNo = $rowAllGirvi['girv_firm_girvi_no'];
            $gCustName = $rowAllGirvi['girv_cust_fname'] . ' ' . $rowAllGirvi['girv_cust_lname'];
            $gCustCity = $rowAllGirvi['girv_cust_city'];
            $gMainPrinAmt = $rowAllGirvi['girv_main_prin_amt'];
            $gROI = $rowAllGirvi['girv_ROI'];
            $gROIType = $rowAllGirvi['girv_ROI_typ'];
            $gDOB = $rowAllGirvi['girv_DOB'];
            $gDOR = $rowAllGirvi['girv_DOR'];
            $gTotalTime = $rowAllGirvi['girv_total_time'];
            $gTotalAmt = $rowAllGirvi['girv_total_amt'];
            $gTotalInt = $rowAllGirvi['girv_total_int'];

            $totalPrinAmt += $gMainPrinAmt;
            $totalIntAmt += $gTotalInt;
            $totalAmt += $gTotalAmt;

            $qSelFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$gFirmId'";
            $resFirm = mysqli_query($conn,$qSelFirm);
            $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
            $gFirmName = $rowFirm['firm_name'];
            ?>
            <tr>
                <td align="left">
                    <input type="submit" name="sNo" id="sNo" value="<?php echo $gCounter + 1; ?>" class="frm-btn-without-border" readonly="true"/>
                    <input type="hidden" name="girviId<?php echo $gCounter; ?>" id="girviId<?php echo $gCounter; ?>" value="<?php echo $gId; ?>"/>
                </td>
                <td align="left">
                    <h5><?php echo $gCustName; ?></h5>
                </td>
                <td align="left">
                    <h5><?php echo $gCustCity; ?></h5>
                </td>
                <td align="left">
                    <h5><?php echo $gFirmName; ?></h5>
                </td>
                <td align="center">
                    <h5><?php echo $gFirmGirviNo; ?></h5>
                </td>
                <td align="right">
                    <h5><?php echo $gMainPrinAmt; ?></h5>
                </td>
                <td align="left">
                    <h5><?php echo $gROI; ?>&nbsp;<?php echo substr($gROIType, 0, 1); ?></h5>
                </td>
                <td align="right">
                    <h5><?php echo $gTotalInt; ?></h5>
                </td>
                <td align="center">
                    <h5><?php echo date('d-m-y', strtotime($gDOB)); ?></h5>
                </td>
                <td align="center">
                    <h5><?php echo date('d-m-y', strtotime($gDOR)); ?></h5>
                </td>
                <td align="center">
                    <h5><?php echo $gTotalTime; ?></h5>
                </td>
                <td align="right">
                    <div class="h5"><?php echo $gTotalAmt; ?></div>
                </td>
                <td align="center">
                    <input id="paidAmt<?php echo $gCounter; ?>" name="paidAmt<?php echo $gCounter; ?>" type="text" spellcheck="false" value="<?php echo $gTotalAmt; ?>"
                           onfocus="var paidAmt = this.value; this.value = ''; document.getElementById('totalDiscountAmt').value = parseInt(document.getElementById('totalDiscountAmt').value) - parseInt(document.getElementById('discountAmt<?php echo $gCounter; ?>').value); document.getElementById('totalPaidAmt').value = parseInt(document.getElementById('totalPaidAmt').value) - parseInt(paidAmt);"
                           onblur="var paidAmt = <?php echo $gTotalAmt; ?>; if (this.value ==''){this.value = parseInt(paidAmt) - document.getElementById('discountAmt<?php echo $gCounter; ?>').value;} document.getElementById('discountAmt<?php echo $gCounter; ?>').value = paidAmt - this.value; document.getElementById('totalPaidAmt').value = parseInt(document.getElementById('totalPaidAmt').value) + parseInt(this.value); document.getElementById('totalDiscountAmt').value = parseInt(document.getElementById('totalDiscountAmt').value) + parseInt(document.getElementById('discountAmt<?php echo $gCounter; ?>').value);"
                           class="lgn-field-with-bgcolor-12" size="8" maxlength="20" />
                </td>
                <td align="center">
                    <input id="discountAmt<?php echo $gCounter; ?>" name="discountAmt<?php echo $gCounter; ?>" type="text" spellcheck="false" value="0" readonly="true"
                           class="lgn-field-without-border-12" size="8" maxlength="20" />
                </td>
                <td align="center" width="15px">
                    <div id="del<?php echo $gId; ?>">
                        <a class="links" style="cursor: pointer;"
                           onclick="remGirviFrmRelCart('<?php echo $gId; ?>')"><img src="<?php echo $documentRoot; ?>/images/ajaxClose.png" /></a>
                    </div>
                </td>
            </tr>
        <?php $gCounter++; } if ($totalGirvi > 0) { ?>
            <tr>
                <td align="center" colspan="5">
                    <div class="h7">Total</div>
                    <input id="counter" name="counter" type="hidden" value="<?php echo $gCounter; ?>"/>
                </td>
                <td align="right">
                    <div class="h7"><?php echo $totalPrinAmt; ?></div>
                </td>
                <td align="right" colspan="2">
                    <div class="h7"><?php echo $totalIntAmt; ?></div>
                </td>
                <td align="right" colspan="4">
                    <div class="h7"><?php echo $totalAmt; ?></div>
                </td>
                <td align="center">
                    <div class="spaceRight4"><input id="totalPaidAmt" name="totalPaidAmt" type="text" spellcheck="false" value="<?php echo $totalAmt; ?>" readonly="true"
                                                    class="lgn-field-without-border-h7" size="8" maxlength="20" /></div>
                </td>
                <td align="center">
                    <div class="spaceRight4"><input id="totalDiscountAmt" name="totalDiscountAmt" type="text" spellcheck="false" value="0" readonly="true"
                                                    class="lgn-field-without-border-h7" size="8" maxlength="20" /></div>
                </td>
                <td align="center">
                    <div class="h7">&nbsp;</div>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>
<br />
<?php if ($totalGirvi > 0) { ?>
    <table border="0" cellpadding="2" cellspacing="0" align="center" width="100%">
        <tr>
            <td align="center">
                <div id="releasePrintButtDiv">
                    <table border="0" cellpadding="2" cellspacing="0" align="center">
                        <tr>
                            <td>
                                <input type="submit" id="release" value="Click Here For Release All" class="frm-btn" onclick="relNPrintReleaseCart('relGriviCartDiv',this.id)"/>
                            </td>
                            <td align="center">
                                <input type="submit" id="print" value="Click Here For Print" class="frm-btn" onclick="relNPrintReleaseCart('relGriviCartDiv',this.id)"/>

                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

<?php } ?>