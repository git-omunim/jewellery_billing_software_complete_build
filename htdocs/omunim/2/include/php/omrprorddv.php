<?php
/*
 * **************************************************************************************
 * @tutorial: REPAIR ORDER MAIN DIVISION FILE @PRIYANKA-07APR2021
 * **************************************************************************************
 *
 * Created on 07 APR, 2021 10:54:00 PM
 *
 * @FileName: omrprorddv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.45
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-07APR2021
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
$sessionOwnerId = $_SESSION[sessionOwnerId];
?>
<div id="mainMiddle" class="main_middle">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" align="left">
                <table border="0" cellspacing="0" cellpadding="1" width="100%">
                    <tr>
                        <td valign="bottom" align="left" width="33px" >
                            <img src="<?php echo $documentRoot; ?>/images/repair32.png" alt="omgold jewellery home" onload="document.getElementById('custFirstNameForAddGirvi').focus();" />
                        </td>
                        <td valign="middle" align="left"
                            title="इस पॅनल की सहयता से आप नये कस्टमर को जोड़ सकते है या आप पुराने कस्टमर को खोज सकते है! &#10;This panel will help you to add new customer &amp; to search existing customer!">
                            <a class="links" style="cursor: pointer;"
                               onclick="navigationMainBigMiddle('NewOrder', 'New Order Booking')"><div id="NewOrder" class="textLabelHeading">REPAIR ORDER</div></a>
                        </td>
                        <td valign="middle" align="center">
                            <div id="ajaxLoadSrchCustToAddGirviDiv" style="visibility: hidden">
                                <?php include 'omzaajld.php'; ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
<!--        <tr>
            <td align="left" colspan="6" class="paddingTop2 padBott2">
                <div class="hrGold"></div>
            </td>
        </tr>-->
        <tr align="left">
            <td align="left" valign="top" colspan="2" style="background: #f1f8ff;border: 1px dashed #7b8ffa;border-right: 0;border-left: 0;padding: 5px 0px 5px 8px;">
                <?php $panelOmunimDivName = 'RepairOrder'; ?> 
                <?php include 'omcccsdv.php'; ?>
            </td>
        </tr>
<!--        <tr>
            <td align="left" colspan="6" class="paddingTop2 padBott2">
                <div class="hrGold"></div>
            </td>
        </tr>-->
        <tr>
            <td align="center" colspan="2" width="100%">
                <div id="custListForAddGirviDiv" class="search_cust_suggest">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div id="newOrderMainDiv">
                    <?php
                    // 
                    // REPAIR ORDER LIST @PRIYANKA-07APR2021
                    include 'omUniversalRepairPendingOrderList.php';
                    //
                    ?>
                </div>
            </td>
        </tr>
    </table>
</div>
