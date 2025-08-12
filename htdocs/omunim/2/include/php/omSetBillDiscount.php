<?php
/*
 * *************************************************************************************************
 * @Description: DISCOUNT MANAGEMENT SYSTEM @AUTHOR-PRIYANKA-28OCT2020
 * *************************************************************************************************
 *
 * Created on OCT 17, 2020 03:33:00 PM 
 * *************************************************************************************************
 * @FileName: omSetBillDiscount.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.21
 * @version: OMUNIM 2.7.21
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-28OCT2020
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
//
// Panel Name @AUTHOR-PRIYANKA-28OCT2020
$panelName = $_REQUEST['panelName'];
//
// Discount Panel Name @AUTHOR-PRIYANKA-28OCT2020
$discountPanelName = $_REQUEST['discountPanelName'];
//
//
if ($_REQUEST['discountSubPanel'] != '' && $_REQUEST['discountSubPanel'] != NULL) {
    //
    if ($_REQUEST['discountSubPanel'] == 'setBillDiscount') {
        $discountPanelName = "billDiscountPanel";
    }
}
//
//
// ***********************************************************************************************************************
// START CODE TO CHECK BILL DISCOUNT ON / OFF OPTIONS ALREADY SET OR NOT @AUTHOR-PRIYANKA-03DEC2020
// ***********************************************************************************************************************
$selQuery = "SELECT * FROM omlayout WHERE omly_own_id = '$_SESSION[sessionOwnerId]' "
          . "AND omly_option = 'BillDiscountOnOff'";
//
$resQuery = mysqli_query($conn, $selQuery);
$noOfRows = mysqli_num_rows($resQuery);
//
if ($noOfRows == 0) {
    //
    // TO SET DEFAULT BILL DISCOUNT ON / OFF OPTIONS @AUTHOR-PRIYANKA-03DEC2020
    $query = "INSERT INTO omlayout (omly_own_id, omly_option, omly_value)
                            VALUES ('$_SESSION[sessionOwnerId]', 'BillDiscountOnOff', 'OFF')";
    //
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
// ***********************************************************************************************************************
// END CODE TO CHECK BILL DISCOUNT ON / OFF OPTIONS ALREADY SET OR NOT @AUTHOR-PRIYANKA-03DEC2020
// ***********************************************************************************************************************
// 
// 
// ***********************************************************************************************************************
// START CODE FOR BILL DISCOUNT ON / OFF SETTING @AUTHOR-PRIYANKA-03DEC2020
// ***********************************************************************************************************************
$selBillDiscOnOffSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'BillDiscountOnOff'";
$resBillDiscOnOffSetting = mysqli_query($conn, $selBillDiscOnOffSettingQuery);
$rowBillDiscOnOffSetting = mysqli_fetch_array($resBillDiscOnOffSetting);
$BillDiscountOnOff = $rowBillDiscOnOffSetting['omly_value'];
// ***********************************************************************************************************************
// END CODE FOR BILL DISCOUNT ON / OFF SETTING @AUTHOR-PRIYANKA-03DEC2020
// ***********************************************************************************************************************
//
//
//
// SESSION FIRM @AUTHOR-PRIYANKA-28OCT2020
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
// **************************************************************************************************************************
// START CODE TO CHECK BILL DISCOUNT ENTRIES PRESENT OR NOT @PRIYANKA-29OCT2020
// **************************************************************************************************************************
$selQuery = "SELECT * FROM discount WHERE disc_owner_id = '$sessionOwnerId' AND disc_panel_name = 'BillDiscountPanel'";
//
$resQuery = mysqli_query($conn, $selQuery);
$noOfRows = mysqli_num_rows($resQuery);
//
if ($noOfRows == 0) {
    //
    //echo 'setFirmSession == ' . $_SESSION['setFirmSession'] . '<br />';
    //
    if ($_SESSION['setFirmSession'] != '' && $_SESSION['setFirmSession'] != NULL) {
        if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
            $selFirmId = $_SESSION['setFirmSession'];
        }
    }
    //
    if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
        if ($_REQUEST['selFirmId'] != '' && $_REQUEST['selFirmId'] != NULL) {
            $selFirmId = $_REQUEST['selFirmId'];
        }
    }
    //
    //echo '$selFirmId @== ' . $selFirmId . '<br />';
    //
    if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
        parse_str(getTableValues("SELECT firm_id FROM firm WHERE firm_own_id = '$_SESSION[sessionOwnerId]' "
                               . "$sessionFirmStr ORDER BY firm_id ASC"));
        $selFirmId = $firm_id;
    }
    //
    //echo '$selFirmId @@== ' . $selFirmId . '<br />';
    //
    // TO SET DEFAULT BILL DISCOUNT ENTRY @PRIYANKA-29OCT2020
    $query = "INSERT INTO discount (disc_owner_id, disc_firm_id, disc_panel_name, disc_active, disc_status)
                            VALUES ('$_SESSION[sessionOwnerId]', '$selFirmId', 'BillDiscountPanel', 'unchecked', 'New')";
    //
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
// **************************************************************************************************************************
// END CODE TO CHECK BILL DISCOUNT ENTRIES PRESENT OR NOT @PRIYANKA-29OCT2020
// **************************************************************************************************************************
//
?>
<div id="mainBillDiscountDiv">
    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
        <tr>
            <td valign="top" align="left" width="32px" colspan="1">
                <div class="analysis_div_rows">
                    <img src="<?php echo $documentRoot; ?>/images/ring32.png" alt="RING IMG"/>
                </div>
            </td>
            <td valign="top" align="left" colspan="1" style="width: 23%;">
                <a class="links" onclick="" style="cursor: pointer;" title="DISCOUNT PANEL!">
                    <div class="textLabelHeading spaceLeft5">
                        DISCOUNT PANEL
                    </div>
                </a>
            </td>
            <td align="center" valign="middle">
                <div id="messDisplayDiv"></div>
                <div class="analysis_div_rows main_link_red_12">
                    <?php if ($showDiv == 'BillDiscountAlreadyExists') { ?>
                        <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Bill Discount Already Present ~ </div>
                    <?php } ?>  
                </div>
            </td>
            <td align="right">
                <div id="main_ajax_loading_div" style="visibility: hidden; background:none;">
                    <img src="<?php echo $documentRootBSlash; ?>/images/ajaxMainLoading.gif" />
                </div>
            </td>
            <td valign="top" align="left" colspan="1">
                <a class="links" onclick="" style="cursor: pointer;">
                    <div class="textLabelHeading spaceLeft5">
                    </div>
                </a>
            </td>
            
            <td valign="middle" align="center" style="width: 25%;" >            
                <span style="margin-right: 10px;font-size: 14px; font-weight: bold;">&nbsp;BILL DISCOUNT</span>
                <input type="RADIO" id="BillDiscountOnOff" name="BillDiscountOnOff" 
                       value="ON" onchange="setLayoutFieldInDb('BillDiscountOnOff', this.value);"
                       <?php
                       if ($BillDiscountOnOff == 'ON')
                           echo 'checked';
                       else
                           echo '';
                       ?> />
                <span class="textLabel14CalibriBlue" style="margin-right: 10px;">&nbsp;ON</span>            
                <input type="RADIO" id="BillDiscountOnOff" name="BillDiscountOnOff" 
                       value="OFF" onchange="setLayoutFieldInDb('BillDiscountOnOff', this.value);"
                       <?php
                       if ($BillDiscountOnOff == 'OFF')
                           echo 'checked';
                       else
                           echo '';
                       ?> />
                <span class="textLabel14CalibriBlue">&nbsp;OFF</span>
            </td>
            
            <td colspan="12" valign="middle" align="center" style="width: 25%;"
                class="textBoxCurve1px margin2pxAll backFFFFFF">
                <SELECT style="width:100%; text-align:center;" onchange="getDiscountPanel('<?php echo $panelName; ?>', this.value)" 
                        class="form-control-select-borderless" 
                        id="discountPanelShow" name="discountPanelShow"
                        style="color: #00B0F0;text-align: center;"    >
                            <?php
                            $panelValues = array(productDiscountPanel, billDiscountPanel);
                            foreach ($panelValues as $key => $panels) {
                                if ($panels == $discountPanelName) {
                                    $panelValues[$key] = "selected";
                                }
                            }
                            ?>
                    <option style="color: #800000" value="productDiscountPanel" <?php echo $panelValues[0]; ?>>
                        PRODUCT DISCOUNT
                    </option>
                    <option style="color: #800000" value="billDiscountPanel" <?php echo $panelValues[1]; ?>>
                        BILL DISCOUNT
                    </option>
                </SELECT>
            </td>
        </tr>
    </table>   

    <div id="subBillDiscountDiv">
        <form name="add_item" id="add_item"
              enctype="multipart/form-data" method="post"
              action="<?php echo $documentRootBSlash; ?>/include/php/omBillDiscountAd.php">
            <div id="prodBillDiscountFormDiv"> 
                <?php
                //
                // UPDATE PANEL NAME @PRIYANKA-23-OCT-2020
                if ($UpdatePanelName == '' || $UpdatePanelName == NULL) {
                    $UpdatePanelName = $_REQUEST['UpdatePanelName'];
                }
                //
                //  @PRIYANKA-27-OCT-2020
                if ($noOfBillDiscount == '' || $noOfBillDiscount == NULL) {
                    $noOfBillDiscount = $_REQUEST['noOfBillDiscount'];
                }
                //
                //  
                //
                $selBillDiscDetails = "SELECT * FROM discount WHERE "
                                    . "disc_owner_id = '$sessionOwnerId' AND disc_panel_name = 'BillDiscountPanel' "
                                    . "ORDER BY disc_id DESC";
                //
                //echo '$selBillDiscDetails == ' . $selBillDiscDetails;
                //
                $resBillDiscDetails = mysqli_query($conn, $selBillDiscDetails);
                $noOfBillDiscount = mysqli_num_rows($resBillDiscDetails);
                //
                //
                if ($noOfBillDiscount == '' || $noOfBillDiscount == NULL || $noOfBillDiscount == 0) {
                    $noOfBillDiscount = 1;
                }
                //
                // BILL DISCOUNT COUNT @AUTHOR-PRIYANKA-28OCT2020
                if ($billDiscountCount == '' || $billDiscountCount == NULL) {
                    $billDiscountCount = $noOfBillDiscount;
                }
                //
                //
                //print_r($resBillDiscDetails);
                //  
                //
                ?>
                <table border="0" cellspacing="1" cellpadding="2" width="100%" align="left" style="border:1px solid #c1c1c1;margin-top:5px;">
                <?php 
                //
                $counter = 1;
                $count = 1;
                //
                while (($rowBillDiscDetails = mysqli_fetch_array($resBillDiscDetails))) {
                    //
                    //
                    // START DATE CODE @AUTHOR-PRIYANKA-28OCT2020
                    $selDOBDay = date(j);
                    $selDOBMnth = strtoupper(date(M));
                    $todayMM = date(n) - 1;
                    $selDOBYear = date(Y);
                    //
                    // END DATE CODE @AUTHOR-PRIYANKA-28OCT2020
                    $selEDOBDay = date(j);
                    $selEDOBMnth = strtoupper(date(M));
                    $todayEMM = date(n) - 1;
                    $selEDOBYear = date(Y);
                    //
                    //                    
                    if ($counter == 1) { ?>
                    <tr style="background-color: #FFE34F;">    
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="CHECK">
                            <div class="spaceLeft5"></div>
                        </td>
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="FIRM">
                            <div class="spaceLeft5">FIRM</div>
                        </td>
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="MIN BILL AMOUNT">
                            <div class="spaceLeft5">MIN.AMT</div>
                        </td>
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="MAX BILL AMOUNT">
                            <div class="spaceLeft5">MAX.AMT</div>
                        </td>
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="MAKING DISCOUNT">
                            <div class="spaceLeft5">MKG</div>
                        </td>
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="STONE DISCOUNT">
                            <div class="spaceLeft5">STONE</div>
                        </td>
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="TOTAL BILL AMOUNT DISCOUNT">
                            <div class="spaceLeft5">BILL</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font font-size-15px" title="START DATE">
                            <div class="spaceLeft5">START DATE</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font font-size-15px" title="END DATE">
                            <div class="spaceLeft5">END DATE</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font font-size-15px" title="PRODUCT CHECK">
                            <div class="spaceLeft5">PROD CHECK</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font font-size-15px" title="DISCOUNT CHECK">
                            <div class="spaceLeft5">DISC CHECK</div>
                        </td>
                        <td align="center" class="brwnCalibri13Font font-size-15px" title="DISCOUNT ADJUST">
                            <div class="spaceLeft5">DISC ADJUST</div>
                        </td>
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="ADD">
                            <div class="spaceLeft5"></div>
                        </td>
                        <td align="left" class="brwnCalibri13Font font-size-15px" title="DELETE">
                            <div class="spaceLeft5"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="16" align="left">
                            <div class="hrGrey"></div>
                        </td>
                    </tr>                       
                    <?php                     
                    } 
                    $counter = 2; 
                    //
                    //
                    parse_str(getTableValues("SELECT * FROM firm WHERE firm_id = '$rowBillDiscDetails[disc_firm_id]' and "
                                           . "firm_own_id = '$sessionOwnerId'"));
                    //
                    //
                    $disc_firm_id = $rowBillDiscDetails['disc_firm_id'];
                    //
                    $disc_start_date = $rowBillDiscDetails['disc_start_date'];
                    //
                    //echo '$disc_start_date == ' . $disc_start_date . '<br />';
                    //
                    if ($disc_start_date != '' && $disc_start_date != NULL) {
                        //
                        // START DATE CODE @AUTHOR-PRIYANKA-21OCT2020
                        $selDOBDay = substr($disc_start_date, 0, 2);
                        $selDOBMnth = substr($disc_start_date, 3, -5);
                        $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                        $selDOBYear = substr($disc_start_date, -4);
                    } 
                    //
                    //
                    $disc_end_date = $rowBillDiscDetails['disc_end_date'];
                    //
                    //echo '$disc_end_date == ' . $disc_end_date . '<br />';
                    //
                    if ($disc_end_date != '' && $disc_end_date != NULL) {
                        //
                        // END DATE CODE @AUTHOR-PRIYANKA-21OCT2020
                        $selEDOBDay = substr($disc_end_date, 0, 2);
                        $selEDOBMnth = substr($disc_end_date, 3, -5);
                        $todayEMM = date("m", strtotime($selEDOBMnth)) - 1;
                        $selEDOBYear = substr($disc_end_date, -4);
                    }
                    //
                    //
                    $disc_total_bill_amount_min = $rowBillDiscDetails['disc_total_bill_amount_min'];
                    //
                    $disc_total_bill_amount_max = $rowBillDiscDetails['disc_total_bill_amount_max'];
                    //
                    $disc_product_amount = $rowBillDiscDetails['disc_product_amount'];
                    //
                    $disc_making_discount = $rowBillDiscDetails['disc_making_discount'];
                    //
                    $disc_stone_discount = $rowBillDiscDetails['disc_stone_discount'];
                    //
                    $disc_total_bill_amount_discount = $rowBillDiscDetails['disc_total_bill_amount_discount'];
                    //
                    $disc_active = $rowBillDiscDetails['disc_active'];
                    //
                    //echo '$disc_active == ' . $disc_active . '<br />';
                    //
                    $disc_product_check = $rowBillDiscDetails['disc_product_check'];
                    //
                    $disc_discount_check = $rowBillDiscDetails['disc_discount_check'];
                    //
                    $disc_discount_adjust = $rowBillDiscDetails['disc_discount_adjust'];
                    //
                    //
                    ?>                    
                    <tr id="billDiscountRow<?php echo $count; ?>"> 
                        <input type="hidden" id="panelName" name="panelName" value="<?php echo $panelName; ?>"/>
                        <input type="hidden" id="disc_id<?php echo $count; ?>" name="disc_id<?php echo $count; ?>" 
                               value="<?php echo $rowBillDiscDetails['disc_id']; ?>"/>
                        <input type="hidden" id="disc_panel_name<?php echo $count; ?>" name="disc_panel_name<?php echo $count; ?>" 
                               value="<?php echo "BillDiscountPanel"; ?>"/>
                        <input type="hidden" id="noOfBillDiscount" name="noOfBillDiscount" value="<?php echo $noOfBillDiscount; ?>"/>
                        <input type="hidden" id="billDiscountCount" name="billDiscountCount" value="<?php echo $billDiscountCount; ?>"/>                            
                        <input type="hidden" id="disc_status<?php echo $count; ?>" name="disc_status<?php echo $count; ?>"/>
                        
                        <td align="left" class="blackCalibri13Font spaceLeft5" 
                                title="CHECK">
                                <div class="spaceLeft5">
                                    <input type="checkbox" class="checkbox" 
                                           id="disc_discount_checked<?php echo $count; ?>" 
                                           name="disc_discount_checked<?php echo $count; ?>" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('disc_discount_checked<?php echo $count; ?>').value = 'unchecked';
                                                   } else {
                                                       document.getElementById('disc_discount_checked<?php echo $count; ?>').value = 'checked';
                                                   }"
                                           onchange="" 
                                           title="CHECK" 
                                           <?php
                                           echo $disc_active;
                                           echo " " . $disc_active . " ";
                                           ?> >
                                </div>
                            </td>

                            <td align="left" class="blackCalibri13Font spaceLeft5" 
                                title="FIRM">                               
                                <div id="addStockItemFirmDiv">
                                    <?php
                                    //
                                    $nextFieldId = 'disc_total_bill_amount_max' . $count;
                                    $prevFieldId = '';
                                    //
                                    $firmIdDivClass = 'form-control-req-height20';
                                    $FirmStyle = 'height: 25px;';
                                    //
                                    $firmIdSelected = $disc_firm_id;
                                    //
                                    $firmInputId = "disc_firm_id" . $count;
                                    //
                                    if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                        $firmIdSelected = $_SESSION['setFirmSession'];
                                    }
                                    //
                                    if (!$firmIdSelected) {
                                         $firmIdSelected = $_SESSION['setFirmSession'];
                                    }
                                    //
                                    if ($staffId && $array['addStockAccessFirm'] != 'true') {
                                        $accAccess = 'NO';
                                    }
                                    //
                                    include 'omDiscountFirm.php';
                                    //
                                    ?>
                                </div>
                            </td>

                        <td align="left" class="blackCalibri13Font spaceLeft5" 
                            title="MIN BILL AMOUNT">
                            <div class="spaceLeft5">
                                <input id="disc_total_bill_amount_min<?php echo $count; ?>" 
                                       name="disc_total_bill_amount_min<?php echo $count; ?>" 
                                       type="text" placeholder="MIN AMOUNT" 
                                       value="<?php echo $disc_total_bill_amount_min; ?>"
                                       onblur=""
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('disc_total_bill_amount_max<?php echo $count; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8) {
                                                   document.getElementById('firmId<?php echo $count; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                                       onclick="this.value = '';"
                                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                                       size="2" maxlength="10" style="width: 115% ! important;height: 25px;" />
                            </div>
                        </td>

                        <td align="left" class="blackCalibri13Font spaceLeft5" 
                            title="MAX BILL AMOUNT">
                            <div class="spaceLeft5">
                                <input id="disc_total_bill_amount_max<?php echo $count; ?>" 
                                       name="disc_total_bill_amount_max<?php echo $count; ?>" 
                                       type="text" placeholder="MAX AMOUNT" 
                                       value="<?php echo $disc_total_bill_amount_max; ?>"
                                       onblur=""
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('disc_making_discount<?php echo $count; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8) {
                                                   document.getElementById('disc_total_bill_amount_min<?php echo $count; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                                       onclick="this.value = '';"
                                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                                       size="2" maxlength="10" style="width: 115% ! important;height: 25px;" />
                            </div>
                        </td>    

                        <td align="left" class="blackCalibri13Font spaceLeft5" 
                            title="MAKING DISCOUNT">
                            <div class="spaceLeft5">
                                <input id="disc_making_discount<?php echo $count; ?>" 
                                       name="disc_making_discount<?php echo $count; ?>" 
                                       type="text" placeholder="M. DISC" 
                                       value="<?php echo $disc_making_discount; ?>"
                                       onblur=""
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('disc_stone_discount<?php echo $count; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8) {
                                                   document.getElementById('disc_total_bill_amount_max<?php echo $count; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                                       onclick="this.value = '';"
                                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                                       size="2" maxlength="10" style="width: 115% ! important;height: 25px;" />
                            </div>
                        </td>

                        <td align="left" class="blackCalibri13Font spaceLeft5" 
                            title="STONE DISCOUNT">
                            <div class="spaceLeft5">
                                <input id="disc_stone_discount<?php echo $count; ?>" 
                                       name="disc_stone_discount<?php echo $count; ?>" 
                                       type="text" placeholder="S. DISC" 
                                       value="<?php echo $disc_stone_discount; ?>"
                                       onblur=""
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('disc_total_bill_amount_discount<?php echo $count; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8) {
                                                   document.getElementById('disc_making_discount<?php echo $count; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                                       onclick="this.value = '';"
                                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                                       size="2" maxlength="10" style="width: 115% ! important;height: 25px;" />
                            </div>
                        </td>

                        <td align="left" class="blackCalibri13Font spaceLeft5" 
                            title="TOTAL BILL AMOUNT DISCOUNT">
                            <div class="spaceLeft5">
                                <input id="disc_total_bill_amount_discount<?php echo $count; ?>" 
                                       name="disc_total_bill_amount_discount<?php echo $count; ?>" 
                                       type="text" placeholder="BILL.DISC" 
                                       value="<?php echo $disc_total_bill_amount_discount; ?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8) {
                                                   document.getElementById('disc_stone_discount<?php echo $count; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                                       onclick="this.value = '';"
                                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                                       size="2" maxlength="10" style="width: 134% ! important;height: 25px;" />
                            </div>
                        </td>    

                        <td align="center" class="blackCalibri13Font spaceLeft5" 
                            title="START DATE">
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="115%">
                                <tr>
                                    <td align="center" class="margin1pxAll">
                                        <!-- Start Date Code for DAY @AUTHOR-PRIYANKA-28OCT2020 -->
                                        <?php
                                        $todayDay = $selDOBDay - 1;

                                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

                                        $optDay[$todayDay] = "selected";
                                        ?> 
                                        <select id="discountDOBDay<?php echo $count; ?>" 
                                                name="discountDOBDay<?php echo $count; ?>" 
                                                title="DAY" style="width: 25%; height: 25px;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('discountDOBMonth<?php echo $count; ?>').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('disc_total_bill_amount_discount<?php echo $count; ?>').focus();
                                                            return false;
                                                        }"
                                                class="select-control-req-height20">
                                            <option value="NotSelected">DAY</option>
                                            <?php
                                            for ($dd = 0; $dd <= 30; $dd++) {
                                                 $selected_day = ($arrDays[$dd] == $selDOBDay) ? 'selected="selected"' : '';
                                                 echo "<option value=\"$arrDays[$dd]\" $selected_day>$arrDays[$dd]</option>";
                                            }
                                            ?>
                                        </select> 
                                        <!-- Start Date Code for MONTH @AUTHOR-PRIYANKA-28OCT2020 -->
                                        <?php
                                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                                        $optMonth[$todayMM] = "selected";
                                        ?> 
                                        <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> 
                                        <select id="discountDOBMonth<?php echo $count; ?>" 
                                                name="discountDOBMonth<?php echo $count; ?>" 
                                                title="MONTH" style="width: 30%; height: 25px;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('discountDOBYear<?php echo $count; ?>').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                                                            return false;
                                                        }
                                                        //START CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-28OCT2020
                                                        var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                        gbMonth = document.getElementById('gbMonthId').value;
                                                        if (gbMonth == 1) {
                                                            if (event.keyCode) {
                                                                var sel = String.fromCharCode(event.keyCode);
                                                                if (sel == 0)
                                                                {
                                                                    this.value = arrMonths[9];
                                                                } else if (sel == 1)
                                                                {
                                                                    this.value = arrMonths[10];
                                                                } else if (sel == 2)
                                                                {
                                                                    this.value = arrMonths[11];
                                                                }
                                                                document.getElementById('gbMonthId').value = 0;
                                                            }
                                                        } else if (event.keyCode) {
                                                            var sel = String.fromCharCode(event.keyCode) - 1;
                                                            this.value = arrMonths[sel];
                                                            if (event.keyCode == 49) {
                                                                document.getElementById('gbMonthId').value = 1;
                                                            }
                                                        } //END CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-28OCT2020"
                                                class="select-control-req-height20">
                                            <option value="NotSelected">MON</option>
                                            <?php
                                            for ($mm = 0; $mm <= 11; $mm++) {
                                                 $selected_month = ($arrMonths[$mm] == $selDOBMnth) ? 'selected="selected"' : '';
                                                 echo "<option value=\"$arrMonths[$mm]\" $selected_month>$arrMonths[$mm]</option>";
                                            }
                                            ?>
                                        </select> 
                                        <!-- Start Date Code for YEAR @AUTHOR-PRIYANKA-28OCT2020-->
                                        <?php
                                        $todayYear = date(Y) + 10;
                                        $optYear[$selDOBYear] = "selected";
                                        ?> 
                                        <select id="discountDOBYear<?php echo $count; ?>" 
                                                name="discountDOBYear<?php echo $count; ?>" 
                                                title="YEAR" style="width: 35%; height: 25px;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('discountEDOBDay<?php echo $count; ?>').focus();

                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('discountDOBMonth<?php echo $count; ?>').focus();
                                                            return false;
                                                        }"
                                                class="select-control-req-height20">
                                            <option value="NotSelected">YEAR</option>
                                            <?php
                                            for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                 $selected_year = ($yy == $selDOBYear) ? 'selected="selected"' : '';
                                                 echo "<option value=\"$yy\" $selected_year>$yy</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </td>    

                        <td align="center" class="blackCalibri13Font spaceLeft5" 
                            title="END DATE">
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="115%">
                                <tr>
                                    <td align="center" class="margin1pxAll">
                                        <!-- End Date Code for DAY @AUTHOR-PRIYANKA-28OCT2020 -->
                                        <?php
                                        $todayDay = $selEDOBDay - 1;

                                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

                                        $optDay[$todayDay] = "selected";
                                        ?> 
                                        <select id="discountEDOBDay<?php echo $count; ?>" name="discountEDOBDay<?php echo $count; ?>" 
                                                title="DAY" style="width: 25%; height: 25px;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('discountEDOBMonth<?php echo $count; ?>').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('discountDOBYear<?php echo $count; ?>').focus();
                                                            return false;
                                                        }"
                                                class="select-control-req-height20">
                                            <option value="NotSelected">DAY</option>
                                            <?php
                                            for ($dd = 0; $dd <= 30; $dd++) {
                                                 $selected_day = ($arrDays[$dd] == $selEDOBDay) ? 'selected="selected"' : '';
                                                 echo "<option value=\"$arrDays[$dd]\" $selected_day>$arrDays[$dd]</option>";
                                            }
                                            ?>
                                        </select> 
                                        <!-- End Date Code for MONTH @AUTHOR-PRIYANKA-28OCT2020 -->
                                        <?php
                                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                                        $optMonth[$todayEMM] = "selected";
                                        ?> 
                                        <input  id="gbEMonthId" name="gbEMonthId" type="hidden" value="0" /> 
                                        <select id="discountEDOBMonth<?php echo $count; ?>" 
                                                name="discountEDOBMonth<?php echo $count; ?>" 
                                                title="MONTH" style="width: 30%; height: 25px;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('discountEDOBYear<?php echo $count; ?>').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('discountEDOBDay<?php echo $count; ?>').focus();
                                                            return false;
                                                        }
                                                        //START CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-28OCT2020
                                                        var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                        gbMonth = document.getElementById('gbEMonthId').value;
                                                        if (gbMonth == 1) {
                                                            if (event.keyCode) {
                                                                var sel = String.fromCharCode(event.keyCode);
                                                                if (sel == 0)
                                                                {
                                                                    this.value = arrMonths[9];
                                                                } else if (sel == 1)
                                                                {
                                                                    this.value = arrMonths[10];
                                                                } else if (sel == 2)
                                                                {
                                                                    this.value = arrMonths[11];
                                                                }
                                                                document.getElementById('gbEMonthId').value = 0;
                                                            }
                                                        } else if (event.keyCode) {
                                                            var sel = String.fromCharCode(event.keyCode) - 1;
                                                            this.value = arrMonths[sel];
                                                            if (event.keyCode == 49) {
                                                                document.getElementById('gbEMonthId').value = 1;
                                                            }
                                                        } //END CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-28OCT2020"
                                                class="select-control-req-height20">
                                            <option value="NotSelected">MON</option>
                                            <?php
                                            for ($mm = 0; $mm <= 11; $mm++) {
                                                 $selected_month = ($arrMonths[$mm] == $selEDOBMnth) ? 'selected="selected"' : '';
                                                 echo "<option value=\"$arrMonths[$mm]\" $selected_month>$arrMonths[$mm]</option>";
                                            }
                                            ?>
                                        </select> 
                                        <!-- End Date Code for YEAR @AUTHOR-PRIYANKA-28OCT2020-->
                                        <?php
                                        $todayYear = date(Y) + 10;
                                        $optYear[$selEDOBYear] = "selected";
                                        ?> 
                                        <select id="discountEDOBYear<?php echo $count; ?>" 
                                                name="discountEDOBYear<?php echo $count; ?>" 
                                                title="YEAR" style="width: 35%; height: 25px;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('disc_product_check<?php echo $count; ?>').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('discountEDOBMonth<?php echo $count; ?>').focus();
                                                            return false;
                                                        }"
                                                class="select-control-req-height20">
                                            <option value="NotSelected">YEAR</option>
                                            <?php
                                            for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                 $selected_year = ($yy == $selEDOBYear) ? 'selected="selected"' : '';
                                                 echo "<option value=\"$yy\" $selected_year>$yy</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </td>  

                        <td align="left" class="blackCalibri13Font spaceLeft5" 
                            title="PRODUCT CHECK">
                            <div class="spaceLeft5">
                                <select id="disc_product_check<?php echo $count; ?>" 
                                            name="disc_product_check<?php echo $count; ?>" 
                                            style="text-align: left; width: 100% ! important;height: 25px;"
                                            onkeydown="javascript:if (event.keyCode == 13) {
                                        document.getElementById('disc_discount_check<?php echo $count; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('discountEDOBYear<?php echo $count; ?>').focus();
                                        return false;
                                    }"
                                            class="form-control-height20 placeholderClass">
                                                <?php
                                                if ($disc_product_check != '' && $disc_product_check != NULL) {
                                                    $discProdCheck = array('AllProducts', 'SameProdType');
                                                    for ($i = 0; $i <= 1; $i++)
                                                        if ($discProdCheck[$i] == $disc_product_check)
                                                            $discProdCheckSel[$i] = 'selected';
                                                } else {
                                                    $discProdCheckSel[0] = 'selected';
                                                }
                                                ?>
                                        <option value="AllProducts"<?php echo $discProdCheckSel[0]; ?>>All Products</option>
                                        <!--<option value="SameProdType"<?php echo $discProdCheckSel[1]; ?>>Same Prod Type</option>-->
                                        <?php $discProdCheckSel = ""; ?>
                                    </select>
                            </div>
                        </td>

                        <td align="left" class="blackCalibri13Font spaceLeft5" 
                            title="DISCOUNT CHECK">
                            <div class="spaceLeft5">
                                <select id="disc_discount_check<?php echo $count; ?>" 
                                            name="disc_discount_check<?php echo $count; ?>" 
                                            style="text-align: left; width: 103% ! important;height: 25px;"
                                            onkeydown="javascript:if (event.keyCode == 13) {
                                        document.getElementById('disc_discount_adjust<?php echo $count; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('disc_product_check<?php echo $count; ?>').focus();
                                        return false;
                                    }"
                                            class="form-control-height20 placeholderClass">
                                                <?php
                                                if ($disc_discount_check != '' && $disc_discount_check != NULL) {
                                                    $discCheck = array('AllProducts', 'DiscOnAllProd', 'DiscOnWoDisc', 'WithoutDiscount');
                                                    for ($i = 0; $i <= 3; $i++)
                                                        if ($discCheck[$i] == $disc_discount_check)
                                                            $discCheckSel[$i] = 'selected';
                                                } else {
                                                    $discCheckSel[0] = 'selected';
                                                }
                                                ?>
                                        <option value="AllProducts"<?php echo $discCheckSel[0]; ?>>All Products</option>
                                        <!--<option value="DiscOnAllProd"<?php echo $discCheckSel[1]; ?>>Disc On+All Prod</option>
                                        <option value="DiscOnWoDisc"<?php echo $discCheckSel[2]; ?>>Disc On+W/o Disc</option>
                                        <option value="WithoutDiscount"<?php echo $discCheckSel[3]; ?>>Without Discount</option>-->
                                        <?php $discCheckSel = ""; ?>
                                    </select>
                            </div>
                        </td>

                        <td align="right" class="blackCalibri13Font spaceLeft5" 
                                title="DISCOUNT ADJUST">
                                <div class="spaceLeft5">
                                    <select id="disc_discount_adjust<?php echo $count; ?>" 
                                            name="disc_discount_adjust<?php echo $count; ?>" 
                                            style="text-align: left; width: 100% ! important;height: 25px;"
                                            onkeydown="javascript:if (event.keyCode == 13) {
                                        document.getElementById('disc_discount_adjust<?php echo $count; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('disc_discount_check<?php echo $count; ?>').focus();
                                        return false;
                                    }"
                                            class="form-control-height20 placeholderClass">
                                                <?php
                                                if ($disc_discount_adjust != '' && $disc_discount_adjust != NULL) {
                                                    $discAdjustType = array('InBill', 'LoyalityPoints');
                                                    for ($i = 0; $i <= 1; $i++)
                                                        if ($discAdjustType[$i] == $disc_discount_adjust)
                                                            $discAdjustTypeSel[$i] = 'selected';
                                                } else {
                                                    $discAdjustTypeSel[0] = 'selected';
                                                }
                                                ?>
                                        <option value="InBill"<?php echo $discAdjustTypeSel[0]; ?>>In Bill</option>
                                        <option value="LoyalityPoints"<?php echo $discAdjustTypeSel[1]; ?>>Loyality Points</option>
                                        <?php $discAdjustTypeSel = ""; ?>
                                    </select>
                                </div>
                            </td>


                        <td align="center" class="blackCalibri13Font spaceLeft5" title="ADD">
                            <div class="spaceLeft5">
                                <a style="cursor: pointer;" 
                                   onclick="addNewBillDiscountDiv('<?php echo $rowBillDiscDetails[disc_id]; ?>', document.getElementById('noOfBillDiscount').value, '<?php echo $documentRoot; ?>', '<?php echo $panelName; ?>', '<?php echo $discountPanelName; ?>', '<?php echo $commonPanel; ?>');">
                                    <img src="<?php echo $documentRoot; ?>/images/update16.png" alt="ADD" 
                                         class="marginTop5" />
                                </a>
                            </div>
                        </td>

                        <td align="center" class="blackCalibri13Font spaceLeft5" title="DELETE">
                            <div class="spaceLeft5">
                                <a style="cursor: pointer;" 
                                   onclick="deleteBillDiscountFromTable('<?php echo $rowBillDiscDetails[disc_id]; ?>', '<?php echo $count; ?>', '<?php echo $panelName; ?>', '<?php echo $discountPanelName; ?>', '<?php echo $documentRoot; ?>');">
                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="DEL" 
                                         class="marginTop5" />
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                    $count++;
                    } 
                    ?>
                    <tr>
                        <td colspan="16">
                            <?php 
                            //echo '$count == ' . $count . '<br />';
                            //echo '$noOfBillDiscount == ' . $noOfBillDiscount . '<br />'; 
                            ?>
                            <div id="addNewBillDiscountDiv<?php echo $noOfBillDiscount + 1; ?>"></div>                       
                        </td>
                    </tr>
                </table>
            </div>

            <table align="left" border="0" cellspacing="2" cellpadding="2" width="100%">   
                <tr>
                    <td colspan="16" align="center">
                        <div>
                            <?php
                            $inputId = "discountSubmitBtn";
                            $inputType = 'submit';
                            $inputFieldValue = 'Submit';
                            $inputIdButton = "discountSubmitBtn";
                            $inputNameButton = 'discountSubmitBtn';
                            $inputTitle = '';
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn1 btnHover ' . $om_btn_style;
                            $inputStyle = "width:120px;height:30px;color:#0821a4;background: #b0d1f4;border-radius:5px!important;font-size:15px;";
                            $inputLabel = 'Submit'; // Display Label below the text box
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            $inputPlaceHolder = '';
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputOnChange = "";
                            $inputOnClickFun = '';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>    
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="16">
                        <div id="billDiscountHelpDiv"></div>                       
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>