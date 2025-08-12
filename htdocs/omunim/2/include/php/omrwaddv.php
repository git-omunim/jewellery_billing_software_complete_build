<?php
/*
 * **************************************************************************************
 * @tutorial: ASSIGN OREDER SUB DIV @PRIYANKA-02JUNE2021
 * **************************************************************************************
 * 
 * Created on JUNE 02, 2021 03:30:52 PM
 *
 * @FileName: omrwaddv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.53
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: 02 JUNE 2021
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
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<div id="itemAssignMetal" style="float: left;width:100%">
    <?php
// Add Code for Update Crystal Functionality @Author:PRIYANKA-14MAR19
    if ($commonPanel = 'SuppPurByItem') {
        //
        $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                . "and sttr_sttr_id = '$sttrId' and sttr_status NOT IN ('DELETED') "
                . "and sttr_indicator = 'stockCrystal' order by sttr_id asc";
        //
        $resCryDet = mysqli_query($conn, $qSelCryDet);
        $noOfCry = mysqli_num_rows($resCryDet);
        //
        //echo '$qSelCryDet == '.$qSelCryDet.'<br />';
        //echo '$noOfCry == '.$noOfCry.'<br />';
    //
    }
    //
    //echo '$qSelCryDet == '.$qSelCryDet.'<br />';
    //echo '$noOfCry == '.$noOfCry.'<br />';
    //
    $query = "SELECT omly_value FROM omlayout WHERE omly_option = 'InvNoByMetal'";
    $resQuery = mysqli_query($conn, $query);
    $rowEntries = mysqli_fetch_array($resQuery);
    $InvNoByMetal = $rowEntries['omly_value'];
    //
    // Get Metal Type 
    if ($_GET['assignMetalType'] != '' && $_GET['assignMetalType'] != NULL) {
        //        
        if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') {
            //
            $sttr_metal_type = $_GET['assignMetalType'];
            //
            //
            if ($sttr_metal_type == 'gold' || $sttr_metal_type == 'Gold' || $sttr_metal_type == 'GOLD') {
                $sttr_item_category = 'RawGold';
                $sttr_item_name = 'RAW GOLD';
                $sttr_gs_weight_type = 'GM';
                $sttr_nt_weight_type = 'GM';
                $sttr_pkt_weight_type = 'GM';
                $sttr_product_type = 'Gold';
                $sttr_indicator = 'rawMetal';
                $sttr_type = 'rawMetal';
            }
            //
            //
            if ($sttr_metal_type == 'silver' || $sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER') {
                $sttr_item_category = 'RawSilver';
                $sttr_item_name = 'RAW SILVER';
                $sttr_gs_weight_type = 'GM';
                $sttr_nt_weight_type = 'GM';
                $sttr_pkt_weight_type = 'GM';
                $sttr_product_type = 'Silver';
                $sttr_indicator = 'rawMetal';
                $sttr_type = 'rawMetal';
            }
            //
            //
            if ($sttr_metal_type == 'crystal' || $sttr_metal_type == 'Crystal' || $sttr_metal_type == 'CRYSTAL') {
                $sttr_metal_rate = 0;
                $sttr_item_category = 'StockStone';
                $sttr_item_name = 'STOCK STONE';
                $sttr_gs_weight_type = 'CT';
                $sttr_nt_weight_type = 'CT';
                $sttr_pkt_weight_type = 'CT';
                $sttr_product_type = 'crystal';
                $sttr_indicator = 'crystal';
                $sttr_type = 'crystal';
                $sttr_gs_weight = '0';
                $sttr_nt_weight = '0';
                $sttr_purity = '0';
                $sttr_final_purity = '0';
                $sttr_fine_weight = '0';
                $sttr_final_fine_weight = '0';
            }
            //
            //
            if ($sttr_metal_type == 'alloy' || $sttr_metal_type == 'Alloy' || $sttr_metal_type == 'ALLOY') {
                $sttr_item_category = 'RawAlloy';
                $sttr_item_name = 'RAW ALLOY';
                $sttr_gs_weight_type = 'GM';
                $sttr_nt_weight_type = 'GM';
                $sttr_pkt_weight_type = 'GM';
                $sttr_product_type = 'Alloy';
                $sttr_indicator = 'rawMetal';
                $sttr_type = 'rawMetal';
                $sttr_gs_weight = '0';
                $sttr_nt_weight = '0';
                $sttr_purity = '0';
                $sttr_final_purity = '0';
                $sttr_fine_weight = '0';
                $sttr_final_fine_weight = '0';
            }
            //
            //
            if ($sttr_metal_type == 'other' || $sttr_metal_type == 'Other' || $sttr_metal_type == 'OTHER') {
                $sttr_item_category = '';
                $sttr_item_name = '';
                $sttr_gs_weight_type = 'GM';
                $sttr_nt_weight_type = 'GM';
                $sttr_pkt_weight_type = 'GM';
                $sttr_product_type = 'Other';
                $sttr_indicator = 'rawMetal';
                $sttr_type = 'rawMetal';
                $sttr_gs_weight = '0';
                $sttr_nt_weight = '0';
                $sttr_purity = '0';
                $sttr_final_purity = '0';
                $sttr_fine_weight = '0';
                $sttr_final_fine_weight = '0';
            }
        }
    }
    //
    ?>
    <table border="0" cellspacing="0" cellpadding="0" align="center" width="99.6%" style="border:1px solid #c1c1c1;margin-top:10px;">
        <tr>
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr style="background-color:#FFE34F">
                        <td colspan="2" align="center" class="textLabel14CalibriBrownBold">
                            <div class="text-center font-dark">
                                <strong>
                                    METAL DETAILS
                                </strong>
                            </div>
                        </td>
                        <?php if ($sttr_metal_type == 'crystal') { ?>
                            <td align="center" class="textLabel14CalibriBrownBold" colspan="2">
                                <div class="text-center font-dark">
                                    <strong>
                                        SHAPE/SIZE
                                    </strong>
                                </div>
                            </td>
                            <td align="center" class="textLabel14CalibriBrownBold padLeft5" colspan="2">
                                <div class="text-center font-dark">
                                    <strong>
                                        CLARITY/COLOR
                                    </strong>
                                </div>
                            </td>
                        <?php } ?>
                        <td align="center" class="textLabel14CalibriBrownBold" >
                            <div class="text-center font-dark">
                                <strong>
                                    QTY
                                </strong>
                            </div>
                        </td>
                        <td align="center" class="textLabel14CalibriBrownBold" colspan="2">
                            <div class="text-center font-dark">
                                <strong>
                                    WEIGHTS
                                </strong>
                            </div>

                        </td>
                        <?php if ($sttr_metal_type != 'crystal') { ?>
                            <td align="center" class="textLabel14CalibriBrownBold">
                                <div class="text-center font-dark">
                                    <strong>
                                        PURITY 
                                    </strong>
                                </div>

                            </td>
                            <td align="center" class="textLabel14CalibriBrownBold">
                                <div class="text-center font-dark">
                                    <strong>
                                        WSTG
                                    </strong>
                                </div>
                            </td>
                        <?php } ?>
                        <td align="center" class="textLabel14CalibriBrownBold">
                            <div class="text-center font-dark">
                                <strong>
                                    VALUATION
                                </strong>
                            </div>
                        </td>                    
                        <?php if ($TaxAndGstSettingValue == 'GST') { ?> 
                            <td align="center" class="textLabel14CalibriBrownBold" colspan="2">
                                <div class="text-center font-dark">
                                    <strong>
                                        CGST
                                    </strong>
                                </div>
                            </td>
                            <td align="center" class="textLabel14CalibriBrownBold" colspan="2">
                                <div class="text-center font-dark">
                                    <strong>
                                        SGST 
                                    </strong>
                                </div>
                            </td>
                            <td align="center" class="textLabel14CalibriBrownBold" colspan="2">
                                <div class="text-center font-dark">
                                    <strong>
                                        IGST
                                    </strong>
                                </div>
                            </td>
                        <?php } else { ?>
                            <td align="center" class="textLabel14CalibriBrownBold">
                                <div class="text-center font-dark">
                                    <strong>
                                        TOT LAB CHRGS 
                                    </strong>
                                </div>
                            </td>
                            <td align="center" class="textLabel14CalibriBrownBold" colspan="2">
                                <div class="text-center font-dark">
                                    <strong>
                                        TAX % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp; TOT TAX
                                    </strong>
                                </div>

                            </td>
                        <?php } ?> 

                    </tr>

                    <tr>
                        <td align="center" title="METAL TYPE" width="120px">
                            <div id="itemTypeDiv">
                                <select id="sttr_metal_type" name="sttr_metal_type" 
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('sttr_item_category').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                        <?php if ($mainPanelDiv == 'Supplier' || $mainPanelDiv == 'Customer') { ?>
                                                        document.getElementById('sttr_account_id').focus();
                                        <?php } else { ?>
                                                        document.getElementById('sttr_brand_id').focus();
                                        <?php } ?>
                                                    return false;
                                                }"
                                        onchange="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('sttr_item_category').focus();
                                                }

                                                document.getElementById('sttr_metal_type').value = this.value;

                                                changeItemTunchOption(this, 'addRawStock', '', '<?php echo $metType; ?>', '<?php echo $userId; ?>');

                                        <?php if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') { ?>
                                                    //if (this.value == 'crystal') { 
                                                    getAssignMetalType(this.value, '<?php echo $userId; ?>');
                                                    //}
                                        <?php } ?>

                                        <?php if ($InvNoByMetal == 'true') { ?>
                                                    getInvoiceNoByMetal(this.value, '<?php echo $sttr_pre_invoice_no; ?>', '<?php echo $sttr_invoice_no; ?>', '<?php echo $firmId; ?>', '<?php echo $transactionType; ?>');
                                        <?php } ?>

                                        <?php if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') { ?>
                                                    if (document.getElementById('sttr_metal_type').value == 'Gold' ||
                                                            document.getElementById('sttr_metal_type').value == 'GOLD' ||
                                                            document.getElementById('sttr_metal_type').value == 'gold' ||
                                                            this.value == 'Gold') {
                                                        document.getElementById('sttr_item_category').value = 'RawGold';
                                                        document.getElementById('sttr_item_name').value = 'RAW GOLD';
                                                        document.getElementById('sttr_gs_weight_type').value = 'GM';
                                                        document.getElementById('sttr_nt_weight_type').value = 'GM';
                                                        document.getElementById('sttr_pkt_weight_type').value = 'GM';
                                                        document.getElementById('sttr_product_type').value = 'Gold';
                                                        document.getElementById('sttr_indicator').value = 'rawMetal';
                                                        document.getElementById('sttr_type').value = 'rawMetal';
                                                    } else if (document.getElementById('sttr_metal_type').value == 'Silver' ||
                                                            document.getElementById('sttr_metal_type').value == 'SILVER' ||
                                                            document.getElementById('sttr_metal_type').value == 'silver' ||
                                                            this.value == 'Silver') {
                                                        document.getElementById('sttr_item_category').value = 'RawSilver';
                                                        document.getElementById('sttr_item_name').value = 'RAW SILVER';
                                                        document.getElementById('sttr_gs_weight_type').value = 'GM';
                                                        document.getElementById('sttr_nt_weight_type').value = 'GM';
                                                        document.getElementById('sttr_pkt_weight_type').value = 'GM';
                                                        document.getElementById('sttr_product_type').value = 'Silver';
                                                        document.getElementById('sttr_indicator').value = 'rawMetal';
                                                        document.getElementById('sttr_type').value = 'rawMetal';
                                                    } else if (document.getElementById('sttr_metal_type').value == 'crystal' ||
                                                            document.getElementById('sttr_metal_type').value == 'CRYSTAL' ||
                                                            document.getElementById('sttr_metal_type').value == 'Crystal' ||
                                                            this.value == 'crystal') {
                                                        document.getElementById('sttr_item_category').value = 'StockStone';
                                                        document.getElementById('sttr_item_name').value = 'STOCK STONE';
                                                        document.getElementById('sttr_gs_weight_type').value = 'CT';
                                                        document.getElementById('sttr_nt_weight_type').value = 'CT';
                                                        document.getElementById('sttr_pkt_weight_type').value = 'CT';
                                                        document.getElementById('sttr_lab_charges_type').value = 'PP';
                                                        document.getElementById('sttr_product_type').value = 'crystal';
                                                        document.getElementById('sttr_indicator').value = 'crystal';
                                                        document.getElementById('sttr_type').value = 'crystal';
                                                        document.getElementById('sttr_gs_weight').value = '0';
                                                        document.getElementById('sttr_nt_weight').value = '0';
                                                        document.getElementById('sttr_purity').value = '0';
                                                        document.getElementById('sttr_final_purity').value = '0';
                                                        document.getElementById('sttr_fine_weight').value = '0';
                                                        document.getElementById('sttr_final_fine_weight').value = '0';
                                                    } else if (document.getElementById('sttr_metal_type').value == 'Alloy') {
                                                        document.getElementById('sttr_item_category').value = 'RawAlloy';
                                                        document.getElementById('sttr_item_name').value = 'RAW ALLOY';
                                                        document.getElementById('sttr_gs_weight_type').value = 'GM';
                                                        document.getElementById('sttr_nt_weight_type').value = 'GM';
                                                        document.getElementById('sttr_pkt_weight_type').value = 'GM';
                                                        document.getElementById('sttr_product_type').value = 'Alloy';
                                                        document.getElementById('sttr_indicator').value = 'rawMetal';
                                                        document.getElementById('sttr_type').value = 'rawMetal';
                                                        document.getElementById('sttr_purity').value = '0';
                                                        document.getElementById('sttr_final_purity').value = '0';
                                                        document.getElementById('sttr_fine_weight').value = '0';
                                                        document.getElementById('sttr_final_fine_weight').value = '0';
                                                    } else if (document.getElementById('sttr_metal_type').value == 'Other') {
                                                        document.getElementById('sttr_item_category').value = '';
                                                        document.getElementById('sttr_item_category').value = '';
                                                        document.getElementById('sttr_gs_weight_type').value = 'GM';
                                                        document.getElementById('sttr_nt_weight_type').value = 'GM';
                                                        document.getElementById('sttr_pkt_weight_type').value = 'GM';
                                                        document.getElementById('sttr_product_type').value = 'Other';
                                                        document.getElementById('sttr_indicator').value = 'rawMetal';
                                                        document.getElementById('sttr_type').value = 'rawMetal';
                                                        document.getElementById('sttr_purity').value = '0';
                                                        document.getElementById('sttr_final_purity').value = '0';
                                                        document.getElementById('sttr_fine_weight').value = '0';
                                                        document.getElementById('sttr_final_fine_weight').value = '0';
                                                    }
                                        <?php } ?>
                                                return false;"


                                        class="form-control text-center font-dark input-focus">
                                            <?php
                                            if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' ||
                                                    $rawPanelName == 'SimilarItem' || $rawPanelName == 'AddRawStock') {
                                                $metalType = array(Gold, Silver, crystal, Alloy, Other);
                                                for ($i = 0; $i <= 4; $i++)
                                                    if ($metalType[$i] == $sttr_metal_type)
                                                        $optionMetalSel[$i] = 'selected';
                                            }
                                            ?>
                                    <option value="Gold" <?php echo $optionMetalSel[0]; ?>>GOLD</option>
                                    <option value="Silver" <?php echo $optionMetalSel[1]; ?>>SILVER</option>
                                    <option value="crystal" <?php echo $optionMetalSel[2]; ?>>STONE</option>
                                    <option value="Alloy" <?php echo $optionMetalSel[3]; ?>>ALLOY</option>
                                    <option value="Other" <?php echo $optionMetalSel[4]; ?>>OTHER</option>
                                </select>
                            </div>
                            <div id="SelectMetalDiv"></div>
                        </td>

                        <td align="left" title="RATE" width="100px" class="padLeft3">

                            <?php //echo '$sttr_stock_type == ' . $sttr_stock_type . '<br />'; ?>

                            <?php if ($sttr_metal_type == 'crystal' || $_GET['assignMetalType'] == 'crystal') { ?>
                                <input type="hidden" id="sttr_indicator" name="sttr_indicator" value="crystal" />
                                <input type="hidden" id="sttr_type" name="sttr_type" value="crystal"/>
                                <input type="hidden" id="sttr_product_type" name="sttr_product_type" value="crystal"/>

                                <?php if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') { ?>
                                    <input type="hidden" id="sttr_stock_type" name="sttr_stock_type" value = "retail" />
                                <?php } else { ?>
                                    <input type="hidden" id="sttr_stock_type" name="sttr_stock_type" value = "<?php echo $sttr_stock_type; ?>" />
                                <?php } ?>

                            <?php } else { ?>
                                <input type="hidden" id="sttr_indicator" name="sttr_indicator" value="rawMetal" />
                                <input type="hidden" id="sttr_type" name="sttr_type" value="rawMetal"/>
                                <input type="hidden" id="sttr_product_type" name="sttr_product_type" value="rawMetal"/>
                                <input type="hidden" id="sttr_stock_type" name="sttr_stock_type" value = "retail" />
                            <?php } ?>

                            <div id="metalRateDiv">
                                <input id="sttr_metal_rate" name="sttr_metal_rate" type="text" placeholder="Metal Rate" 
                                       value="<?php echo $sttr_metal_rate; ?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_item_category').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_metal_type').focus();
                                                   return false;
                                               }"
                                       onblur="if (this.value == '')
                                                   this.value = '<?php echo $sttr_metal_rate; ?>';
                                       <?php if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') { ?>
                                                   if (document.getElementById('sttr_metal_type').value == 'crystal') {
                                                       document.getElementById('sttr_product_type').value = 'crystal';
                                                       document.getElementById('sttr_indicator').value = 'crystal';
                                                       document.getElementById('sttr_type').value = 'crystal';
                                                   }
                                       <?php } ?>
                                               if (document.getElementById('sttr_nt_weight').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }"     
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"   
                                       autocomplete="off" spellcheck="false" style="width:100px;"
                                       class="form-control text-center font-dark input-focus" size="10" maxlength="15" />
                            </div>
                        </td>
                        <?php if ($sttr_metal_type == 'crystal') { ?>
                            <td align="left" title="CRYSTAL SHAPE" colspan="2">
                                <input id="sttr_shape" name="sttr_shape" type="text"  placeholder="SHAPE" value="<?php echo $sttr_shape; ?>"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                       document.getElementById('sttr_size').focus();
                                                       document.getElementById('sttr_size').value = '';
                                                       return false;
                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('sttr_item_name').focus();
                                                       return false;
                                                   }"
                                       onblur="if (this.value == '')
                                                       this.value = '<?php echo $sttr_shape; ?>'"
                                       onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                                       getCrystalType(document.getElementById('sttr_shape').value, 'cryShapeDiv', 'sttr_shape', event.keyCode, '<?php echo $mainPanel; ?>');

                                                   }"
                                       autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="1" maxlength="10"  />
                                <div id="cryShapeDiv" class="itemListDivToAddStock placeholderClass"></div>
                            </td>
                            <td class="padLeft5" align="left" title="CRYSTAL CLARITY" colspan="2">
                                <input id="sttr_clarity" name="sttr_clarity" type="text"  placeholder="CLARITY" value="<?php echo $sttr_clarity; ?>"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                       document.getElementById('sttr_color').focus();
                                                       document.getElementById('sttr_color').value = '';
                                                       return false;
                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('sttr_size').focus();
                                                       return false;
                                                   }"
                                       onblur="if (this.value == '')
                                                       this.value = '<?php echo $sttr_clarity; ?>'"
                                       autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="1" maxlength="10"  />
                            </td>
                        <?php } ?>
                        <td align="left" title="ITEM QUANTITY" class="padLeft3" width="60px">
                            <input id="sttr_quantity" name="sttr_quantity" type="text" 
                                   value="<?php
                                   if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' ||
                                           $rawPanelName == 'SimilarItem' || $rawPanelName == 'AddRawStock') {
                                       echo $sttr_quantity;
                                   } else {
                                       if ($sttr_quantity == '')
                                           echo '1';
                                   }
                                   ?>" 
                                   placeholder="QTY"   
                                   onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   <?php if ($HSNOptionInForms == 'NO') { ?>
                                                   document.getElementById('sttr_gs_weight').focus();
                                   <?php } else { ?>
                                                   document.getElementById('sttr_hsn_no').focus();
                                   <?php } ?>
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('sttr_item_name').focus();
                                               document.getElementById('sttr_item_name').value = '';
                                               return false;
                                           }"   
                                   spellcheck="false" class="form-control text-center font-dark input-focus" size="1" maxlength="10" />
                        </td>

                        <td align="left" class="padLeft3" colspan="2">
                            <table <?php if ($TaxAndGstSettingValue == 'TAX') { ?>
                                    width="106%"
                                <?php } ?> >
                                <tr>
                                    <td width="150px">
                                        <input id="sttr_gs_weight" name="sttr_gs_weight" 
                                               type="text" placeholder="GS WT" 
                                               <?php if ($listPanel != 'MeltingTransList') { ?> value="<?php echo $sttr_gs_weight; ?>" <?php } ?>
                                               <?php
                                               /* ------------------------------------------------------------------------------------------------------- */
                                               /* Start Code to Get Weight from Weighing Scale
                                                 /* ------------------------------------------------------------------------------------------------------- */
                                               $selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_option = 'checkWSComPort'";
                                               $resFormsLayoutDet = mysqli_query($conn, $selFormsLayoutDet);
                                               $rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
                                               $checkWSComPortVal = $rowFormsLayoutDet['omly_value'];
                                               ?>
                                               <?php if ($_SESSION['sessionOwnIndStr'][16] == 'Y' && $checkWSComPortVal == 'true') { ?>
                                                   onfocus="getWeightFromWeighingScale('sttr_gs_weight', 'sttr_nt_weight');"
                                                   onclick="getWeightFromWeighingScale('sttr_gs_weight', 'sttr_nt_weight');"
                                                   <?php
                                               }
                                               /* ------------------------------------------------------------------------------------------------------- */
                                               /* End Code to Get Weight from Weighing Scale
                                                 /* ------------------------------------------------------------------------------------------------------- */
                                               ?>    
                                               onblur="if (this.value == '') {
                                                           this.value = '<?php echo $sttr_gs_weight; ?>';
                                                       } else if (this.value != '' && this.value != null) {
                                                           document.getElementById('sttr_pkt_weight').value = 0.00;
                                                           document.getElementById('sttr_nt_weight').value = this.value;
                                                           document.getElementById('netWeight').value = this.value;
                                                       }
                                                       calRawMetalFinVal();
                                                       return false;"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('sttr_gs_weight_type').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                               <?php if ($HSNOptionInForms == 'NO') { ?>
                                                               document.getElementById('sttr_quantity').focus();
                                               <?php } else { ?>
                                                               document.getElementById('sttr_hsn_no').focus();
                                               <?php } ?>
                                                           return false;
                                                       }"
                                               onclick="this.value = '';"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                               autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="8" maxlength="20"  title="GROSS WEIGHT"/>
                                    </td>
                                    <?php
                                    //
                                    //echo 'sttr_gs_weight_type == ' . $sttr_gs_weight_type . '</br>';
                                    //
                                    if ($sttr_gs_weight_type == '') {
                                        $sttr_gs_weight_type = 'GM';
                                    }
                                    //
                                    $sttr_pkt_weight_type = $sttr_gs_weight_type;
                                    $sttr_nt_weight_type = $sttr_gs_weight_type;
                                    //
                                    ?>
                                    <td align="left" width="80px">
                                        <select id="sttr_gs_weight_type" name="sttr_gs_weight_type" 
                                                title="GROSS WEIGHT TYPE" style="width: 115%;"
                                                onchange ="document.getElementById('sttr_nt_weight_type').value = this.value;
                                                        document.getElementById('sttr_pkt_weight_type').value = this.value;
                                                        document.getElementById('sttr_nt_weight_type').value = this.value;

                                                        if ((document.getElementById('sttr_gs_weight').value) != '') {
                                                            calRawMetalFinVal();
                                                            return false;
                                                        }"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('sttr_pkt_weight').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('sttr_gs_weight').focus();
                                                            document.getElementById('sttr_gs_weight').value = '';
                                                            return false;
                                                        }"
                                                class="form-control text-center font-dark input-focus">
                                                    <?php
                                                    if ($sttr_gs_weight_type != '' && $sttr_gs_weight_type != NULL) {
                                                        $itemGsWtType = array(KG, GM, MG, CT);
                                                        for ($i = 0; $i <= 3; $i++) {
                                                            if ($itemGsWtType[$i] == $sttr_gs_weight_type)
                                                                $optionGSWTypeSel[$i] = 'selected';
                                                        }
                                                    } else {
                                                        $optionGSWTypeSel[1] = 'selected';
                                                    }
                                                    ?>
                                            <option value="KG" <?php echo $optionGSWTypeSel[0]; ?>>KG</option>
                                            <option value="GM" <?php echo $optionGSWTypeSel[1]; ?>>GM</option>
                                            <option value="MG" <?php echo $optionGSWTypeSel[2]; ?>>MG</option>
                                            <option value="CT" <?php echo $optionGSWTypeSel[3]; ?>>CT</option>
                                        </select>
                                    </td>

                                </tr>
                            </table>
                        </td>

                        <?php if ($sttr_metal_type == 'crystal') { ?>

                        <input type="hidden" id="sttr_purity" name="sttr_purity" value="0"  />
                        <input type="hidden" id="addRawStockWastageChnged" name="addRawStockWastageChnged" value="0" />
                        <input type="hidden" id="sttr_wastage" name="sttr_wastage" value="0" />
                        <input type="hidden" id="addItemFinalTunchChanged" name="addItemFinalTunchChanged" value="0" />
                        <input type="hidden" id="sttr_final_purity" name="sttr_final_purity" value="0"  />

                    <?php } else { ?>
                        <td align = "left" title="TUNCH/PURITY"                         
                            style="width: 150px;"
                            class="padLeft5" >
                            <div id = "itemTunchDiv">
                                <?php
                                $tunchDivId = 'sttr_purity';
                                $nextFieldId = 'sttr_wastage';
                                $prevFieldId = 'sttr_nt_weight_type';
                                $netWeightFieldId = 'sttr_nt_weight';
                                $fineWeightFieldId = 'sttr_fine_weight';
                                $finalFineWeightFieldId = 'sttr_final_fine_weight';
                                $tunchDivClass = 'form-control text-center font-dark input-focus';
                                $metalType = $sttr_metal_type;
                                $itstItemTunch = $sttr_purity;
                                $itemDivCount = 'addRawStock';
                                $TunchValue = $sttr_purity;
                                include 'ogiatndv.php';
                                ?>
                            </div>
                        </td>
                        <?php
                        if ($sttr_wastage == '') {
                            $sttr_wastage = 0;
                        }
                        ?>
                        <td width="230px">
                            <table border="0" cellspacing="0" cellpadding="0" 
                            <?php if ($TaxAndGstSettingValue == 'TAX') { ?>
                                       width="100%"
                                   <?php } ?>
                                   >
                                <tr>
                                    <td align="left" title="WASTAGE" class="padLeft5" width="120px">
                                        <input id="addRawStockWastageChnged" name="addRawStockWastageChnged" type="hidden" value="<?php echo $sttr_wastage; ?>" />
                                        <input id="sttr_wastage" name="sttr_wastage" type="text" placeholder="WASTAGE" value="<?php echo $sttr_wastage; ?>"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                               if (this.value != '') {
                                                                   document.getElementById('addRawStockWastageChnged').value = this.value;
                                                               }
                                                               document.getElementById('sttr_lab_charges').focus();
                                                               document.getElementById('sttr_lab_charges').value = ''
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('sttr_purity').focus();
                                                               //document.getElementById('sttr_purity').value = ''
                                                               return false;
                                                           }"
                                               onblur="javascript:
                                                                   if (this.value == '') {
                                                               this.value = document.getElementById('addRawStockWastageChnged').value;
                                                           }
                                                           if (document.getElementById('sttr_purity').value != 'NotSelected') {
                                                               if (document.getElementById('sttr_wastage').value == '') {
                                                                   document.getElementById('sttr_wastage').value = 0;
                                                               }
                                                               document.getElementById('sttr_final_purity').value = (parseFloat(this.value) + parseFloat(document.getElementById('sttr_purity').value));
                                                               calRawMetalFinVal();
                                                           }"
                                               onclick="document.getElementById('sttr_wastage').value = this.value;
                                                           this.value = '';"
                                               spellcheck="false" class="form-control text-center font-dark input-focus" size="5" maxlength="20"  />
                                    </td>
                                    <td align="left" title="FINAL TUNCH" class="padLeft5" width="120px;">
                                        <input type="hidden" id="addItemFinalTunchChanged" name="addItemFinalTunchChanged" value="<?php echo $sttr_final_purity; ?>" />
                                        <input id="sttr_final_purity" name="sttr_final_purity" type="text" placeholder="FN PR%" title="FINAL TUNCH"
                                               readonly="true" value = "<?php echo $sttr_final_purity; ?>"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                               spellcheck="false" class="form-control text-center font-dark input-focus" size="5" maxlength="15" />

                                    </td>
                                </tr>
                            </table>
                        </td>
                    <?php } ?>
                    <td align="left" class="padLeft3" title="TOTAL OF WEIGHT AND METAL RATE" width="90px">
                        <input id="sttr_valuation" name="sttr_valuation" <?php if ($listPanel != 'MeltingTransList') { ?> value="<?php echo $sttr_valuation; ?>" <?php } ?> type="text" placeholder="VALUATION" 
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           document.getElementById('sttr_tax').focus();
                                           document.getElementById('sttr_tax').value = '';
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {

                                           document.getElementById('sttr_purity').focus();
                                           document.getElementById('sttr_purity').value = '';
                                           return false;
                                       }"
                               onblur="javascript: if (document.getElementById('sttr_gs_weight').value != '') {
                                           calRawMetalFinVal();
                                           return false;
                                       }"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"                    
                               spellcheck="false" class="form-control text-center font-dark input-focus" size="12" maxlength="30" />
                    </td>



                    <?php if ($TaxAndGstSettingValue == 'TAX') { ?>

                        <td align="center" title="TOTAL OF LABOUR CHARGES" class="paddingLeft5">
                            <input id="sttr_total_lab_charges" name="sttr_total_lab_charges" 
                                   value="<?php echo $sttr_total_lab_charges; ?>" 
                                   type="text" placeholder="TOT LAB"                                
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('sttr_tax').focus();
                                                   calRawMetalFinVal();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_lab_charges_type').focus();
                                                   return false;
                                               }"
                                   onblur="javascript: if (document.getElementById('sttr_gs_weight').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }" 
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                   spellcheck="false" class="form-control text-center font-dark input-focus" size="8" maxlength="30"  />
                        </td>

                        <td align="left" class="padLeft5" title="TAX %">
                            <input id="sttr_tax" name="sttr_tax" type="text" placeholder="TAX %" 
                                   value="<?php echo $sttr_tax; ?>" <?php if ($staffId && $array['addRawStockAccessVtax'] != 'true') { ?>readonly="true"<?php } ?>
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('sttr_tot_tax').focus();
                                                   calRawMetalFinVal();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_lab_charges_type').focus();
                                                   return false;
                                               }"
                                   onblur="if (this.value == '') {
                                                   this.value = '<?php echo $sttr_tax; ?>';
                                               }
                                               javascript: calRawMetalFinVal();
                                               return false;"    
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                
                                   title="ITEM TAX" spellcheck="false" class="form-control text-center font-dark input-focus" size="2" maxlength="15" />
                        </td>
                        <td align="left" class="padLeft5" title=" TOTAL TAX">
                            <input id="sttr_tot_tax" name="sttr_tot_tax" type="text" 
                                   value="<?php echo $sttr_tot_tax; ?>" placeholder="TOTAL TAX " 
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_final_valuation').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_tax').focus();
                                                   document.getElementById('sttr_tax').value = '';
                                                   return false;
                                               }"
                                   onblur="javascript: if (document.getElementById('sttr_gs_weight').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }" 
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"                    
                                   spellcheck="false" class="form-control text-center font-dark input-focus" size="5" maxlength="15" /><!--description: START CODE TO Add customerStatement @Author: DISH08OCT16 i changed size 7 to 5-->

                        </td>

                        <input type="hidden" id="sttr_tot_price_cgst_per" name="sttr_tot_price_cgst_per"/>
                        <input type="hidden" id="sttr_tot_price_cgst_chrg" name="sttr_tot_price_cgst_chrg"/>
                        <input type="hidden" id="sttr_tot_price_sgst_per" name="sttr_tot_price_sgst_per"/>
                        <input type="hidden" id="sttr_tot_price_sgst_chrg" name="sttr_tot_price_sgst_chrg"/>
                        <input type="hidden" id="sttr_tot_price_igst_per" name="sttr_tot_price_igst_per"/>
                        <input type="hidden" id="sttr_tot_price_igst_chrg" name="sttr_tot_price_igst_chrg"/>

                    <?php } ?>
                    <?php if ($TaxAndGstSettingValue == 'GST') { ?>   
                        <td align="left" width="60px" class="padLeft3">
                            <input id = "sttr_tot_price_cgst_per" name = "sttr_tot_price_cgst_per" type="text" placeholder="CGST %" 
                                   title = "CGST %" autocomplete="off" spellcheck="false" 
                                   value="<?php echo $sttr_tot_price_cgst_per; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_tot_price_cgst_chrg').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_lab_charges_type').focus();
                                                   return false;
                                               }"
                                   onclick="this.value = '';"
                                   onblur="javascript: if (document.getElementById('sttr_valuation').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                   class="form-control text-center font-dark input-focus" size="12" maxlength="20" />
                        </td>
                        <td align="left" width="60px"  class="padLeft3">
                            <input id = "sttr_tot_price_cgst_chrg" name = "sttr_tot_price_cgst_chrg" type="text" 
                                   placeholder="CGST AMT" title = "CGST AMT" autocomplete="off" spellcheck="false" 
                                   value="<?php echo $sttr_tot_price_cgst_chrg; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_tot_price_sgst_per').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_tot_price_cgst_per').focus();
                                                   document.getElementById('sttr_tot_price_cgst_per').value = '';
                                                   return false;
                                               }"
                                   onclick="this.value = '';"
                                   onblur="javascript: if (document.getElementById('sttr_valuation').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                   class="form-control text-center font-dark input-focus" size="16" maxlength="20" />
                        </td>
                        <td align="left" width="60px"  class="padLeft3">
                            <input id = "sttr_tot_price_sgst_per" name = "sttr_tot_price_sgst_per" type="text" 
                                   placeholder="SGST %" title = "SGST %" autocomplete="off" 
                                   value="<?php echo $sttr_tot_price_sgst_per; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_tot_price_sgst_chrg').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_tot_price_cgst_chrg').focus();
                                                   document.getElementById('sttr_tot_price_cgst_chrg').value = '';
                                                   return false;
                                               }"
                                   onclick="this.value = '';"
                                   onblur="javascript: if (document.getElementById('sttr_valuation').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                   spellcheck="false" class="form-control text-center font-dark input-focus" size="12" maxlength="20" />
                        </td>
                        <td align="left" width="60px"  class="padLeft3">
                            <input id = "sttr_tot_price_sgst_chrg" name = "sttr_tot_price_sgst_chrg" type="text" 
                                   placeholder="SGST AMT" title = "SGST AMT" autocomplete="off" spellcheck="false" 
                                   value="<?php echo $sttr_tot_price_sgst_chrg; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_tot_price_igst_per').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_tot_price_sgst_per').focus();
                                                   document.getElementById('sttr_tot_price_sgst_per').value = '';
                                                   return false;
                                               }"
                                   onclick="this.value = '';"
                                   onblur="javascript: if (document.getElementById('sttr_valuation').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                   class="form-control text-center font-dark input-focus" size="14" maxlength="20" />
                        </td>
                        <td align="left" width="60px"  class="padLeft3">
                            <input id = "sttr_tot_price_igst_per" name = "sttr_tot_price_igst_per" type="text" 
                                   placeholder="IGST %" title = "IGST %" autocomplete="off" spellcheck="false" 
                                   value="<?php echo $sttr_tot_price_igst_per; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_tot_price_igst_chrg').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_tot_price_sgst_chrg').focus();
                                                   document.getElementById('sttr_tot_price_sgst_chrg').value = '';
                                                   return false;
                                               }"
                                   onclick="this.value = '';"
                                   onblur="javascript: if (document.getElementById('sttr_valuation').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                   class="form-control text-center font-dark input-focus" size="12" maxlength="20" />
                        </td>
                        <td align="left" width="60px"  class="padLeft3">
                            <input id = "sttr_tot_price_igst_chrg" name = "sttr_tot_price_igst_chrg" type="text" placeholder="IGST AMT" title = "IGST AMT" autocomplete="off" 
                                   spellcheck="false" class="form-control text-center font-dark input-focus" 
                                   value="<?php echo $sttr_tot_price_igst_chrg; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_tot_tax').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_tot_price_igst_per').focus();
                                                   document.getElementById('sttr_tot_price_igst_per').value = '';
                                                   return false;
                                               }"
                                   onclick="this.value = '';"
                                   onblur="javascript: if (document.getElementById('sttr_valuation').value != '') {
                                                   calRawMetalFinVal();
                                                   return false;
                                               }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                   size="16" maxlength="20" />
                        </td>

                        <input type="hidden" id="sttr_tax" name="sttr_tax"/>
                    <?php } ?>
        </tr>
        <?php
        //
        if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') {
            //
            if ($sttr_item_category == '' || $sttr_item_category == NULL) {
                $sttr_item_category = 'RawGold';
            }
            //
            if ($sttr_item_name == '' || $sttr_item_name == NULL) {
                $sttr_item_name = 'RAW GOLD';            
            }
            //
        }
        //
        ?>
        <tr>
            <td align="center" title="CATEGORY" width="120px">
                <div id="itemTypeDescDiv">
                    <?php
                    //
                    //* **************************************************************************************
                    //* Start Code for Category Google Suggestion @PRIYANKA-14JUNE21
                    //* **************************************************************************************
                    // // This is the main division class for input filed
                    //
                    // Input Box Type and Ids
                    $inputType = 'text';
                    $inputId = 'sttr_item_category';
                    $inputName = 'sttr_item_category';
                    $inputFieldNextId = 'sttr_item_name';
                    $inputFieldPrevId = 'sttr_metal_type';
                    //
                    $inputFieldValue = $sttr_item_category;
                    //
                    //$requiredField = 'Y';
                    //
                            // This is the main class for input flied
                    $inputFieldClass = 'form-control text-center font-dark input-focus';
                    //
                    if ($inputStyle === '' || $inputStyle === NULL) {
                        $inputStyle = '';
                    }
                    //
                    $inputLabel = ''; // Display Label below the text box
                    // 
                    $inputTitle = 'CATEGORY';
                    //
                    // This class is for Pencil Icon                                                           
                    $inputIconClass = '';
                    // 
                    // Place Holder inside input box
                    //
                    $inputPlaceHolder = 'CATEGORY';
                    //
                    $inputLabelDivText = '';
                    //
                    // Place Holder in span outside input box
                    $spanPlaceHolderClass = '';
                    $spanPlaceHolder = '';
                    // 
                    // $isAlphaOnly = 'Y';
                    //
                            // Event Options
                    //
                            // On Change Function
                    $inputGoogleSuggDivId = $inputId . '_google_div' . $prodMergedCount;
                    $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                    $selectDropdownClass = 'googleSuggestionDivClass';
                    $inputOnBlurFun = 'document.getElementById("sttr_item_name").value = ""; '
                            . 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '"); ';
                    //
                    //
                            $inputKeyUpFun = " if (document.getElementById('sttr_metal_type').value == 'Gold') { "
                            . " var googleWhereCondColumns = 'AND (sttr_metal_type=\'' + 'Gold' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'Gold' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'GOLD' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'gold' + '\'' + ' ) AND ' + 'sttr_indicator=\'' + document.getElementById('sttr_indicator').value + '\''; "
                            . " } else if (document.getElementById('sttr_metal_type').value == 'Silver') { "
                            . " var googleWhereCondColumns = 'AND (sttr_metal_type=\'' + 'Silver' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'Silver' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'SILVER' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'silver' + '\'' + ' ) AND ' + 'sttr_indicator=\'' + document.getElementById('sttr_indicator').value + '\''; "
                            . " } else if (document.getElementById('sttr_metal_type').value == 'crystal') { "
                            . " var googleWhereCondColumns = 'AND (sttr_metal_type=\'' + 'crystal' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'Crystal' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'CRYSTAL' + '\'' + ' OR ' + 'sttr_product_type=\'' + 'crystal' + '\'' + ' ) AND ' + 'sttr_indicator=\'' + document.getElementById('sttr_indicator').value + '\''; "
                            . " } "
                            . " googleSuggestionDropdown('stock_transaction', 'sttr_item_category', this.value, googleWhereCondColumns, '$inputId', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId');";
                    //
                    $inputKeyDownFun = '';
                    $inputOnDoubleClickFun = 'this.value = "";';
                    $inputOnChange = '';
                    $inputOnInput = '';
                    $inputOnClickFun = '';
                    $inputDropDownCls = '';               // This is the main division class for drop down 
                    $inputselDropDownCls = '';            // This is class for selection in drop down
                    $inputMainClassButton = '';           // This is the main division for Button
                    // 
                    // 
                    //* **************************************************************************************
                    //* End Code for Category Google Suggestion @PRIYANKA-14JUNE21
                    //* **************************************************************************************
                    include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                    //
                    ?>                            
                </div>
            </td>
            <!--Name-->
            <td align="left" title="NAME" class="padLeft3">                
                <?php
                //
                //* **************************************************************************************
                //* Start Code for Name Google Suggestion @PRIYANKA-14JUNE21
                //* **************************************************************************************
                // // This is the main division class for input filed
                //
                // Input Box Type and Ids
                $inputType = 'text';
                $inputId = 'sttr_item_name';
                $inputName = 'sttr_item_name';
                $inputFieldNextId = 'sttr_quantity';
                $inputFieldPrevId = 'sttr_item_category';
                //
                $inputFieldValue = $sttr_item_name;
                //
                //$requiredField = 'Y';
                //
                // This is the main class for input flied
                $inputFieldClass = 'form-control text-center font-dark input-focus';
                //
                if ($inputStyle === '' || $inputStyle === NULL) {
                    $inputStyle = 'width:100px;';
                }
                //
                $inputLabel = ''; // Display Label below the text box
                // 
                $inputTitle = 'NAME';
                //
                // This class is for Pencil Icon                                                           
                $inputIconClass = '';
                // 
                // Place Holder inside input box
                //
                $inputPlaceHolder = 'NAME';
                //
                $inputLabelDivText = '';
                //
                // Place Holder in span outside input box
                $spanPlaceHolderClass = '';
                $spanPlaceHolder = '';
                // 
                // $isAlphaOnly = 'Y';
                //
                // Event Options
                //
                // On Change Function
                $inputGoogleSuggDivId = $inputId . '_google_div' . $prodMergedCount;
                $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                $selectDropdownClass = 'googleSuggestionDivClass';
                $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '"); '
                        . 'getStoneStockType(document.getElementById("sttr_item_category").value, document.getElementById("sttr_item_name").value, document.getElementById("sttr_metal_type").value, document.getElementById("firmId").value); '
                        . 'return false; ';
                //
                $inputKeyUpFun = "var googleWhereCondColumns = 'AND sttr_item_category=\'' + document.getElementById('sttr_item_category').value + '\'' + ' AND ( ' + 'sttr_product_type=\'' + document.getElementById('sttr_metal_type').value + '\'' + ' OR ' + 'sttr_metal_type=\'' + document.getElementById('sttr_metal_type').value + '\'' + ' ) AND ' + 'sttr_indicator=\'' + document.getElementById('sttr_indicator').value + '\''; "
                        . " googleSuggestionDropdown('stock_transaction', 'sttr_item_name', this.value, googleWhereCondColumns, '$inputId', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId');";
                //
                $inputKeyDownFun = '';
                $inputOnDoubleClickFun = 'this.value = "";';
                $inputOnChange = '';
                $inputOnInput = '';
                $inputOnClickFun = '';
                $inputDropDownCls = '';               // This is the main division class for drop down 
                $inputselDropDownCls = '';            // This is class for selection in drop down
                $inputMainClassButton = '';           // This is the main division for Button
                // 
                // 
                //* **************************************************************************************
                //* End Code for Name Google Suggestion @PRIYANKA-14JUNE21
                //* **************************************************************************************
                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                //
                ?>                        
            </td>

            <?php if ($sttr_metal_type == 'crystal') { ?>
                <td align="left" title="CRYSTAL SIZE" colspan="2">
                    <input id="sttr_size" name="sttr_size" type="text"  placeholder="SIZE" value="<?php echo $sttr_size; ?>"
                           onkeydown="javascript:if (event.keyCode == 13) {
                                           document.getElementById('sttr_clarity').focus();
                                           document.getElementById('sttr_clarity').value = '';
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('sttr_shape').focus();
                                           return false;
                                       }"
                           onblur="if (this.value == '')
                                           this.value = '<?php echo $sttr_size; ?>'"
                           autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="1" maxlength="10"  />
                </td>
                <td align="left" title="CRYSTAL COLOR" class="padLeft5" colspan="2">
                    <input id="sttr_color" name="sttr_color" type="text" placeholder="COLOR" value="<?php echo $sttr_color; ?>"
                           onkeydown="javascript:if (event.keyCode == 13) {
                                           document.getElementById('sttr_other_info').focus();
                                           document.getElementById('sttr_other_info').value = '';
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('sttr_clarity').focus();
                                           return false;
                                       }"
                           onblur="if (this.value == '')
                                           this.value = '<?php echo $sttr_color; ?>'"
                           onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                           getCrystalType(document.getElementById('sttr_color').value, 'cryColorDiv', 'sttr_color', event.keyCode, '<?php echo $mainPanel; ?>');
                                       }"
                           onclick="this.value = '';
                                       crystalPanelBlank('cryColorSelectDiv');"
                           autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="1" maxlength="10"  />
                    <div id="cryColorDiv" class="itemListDivToAddStock placeholderClass"></div>
                </td>
            <?php } ?>
            <?php if ($HSNOptionInForms != 'NO') { ?>
                <td align="left" title="ITEM HSN NUMBER" class="paddingLeft2"  width="60px">
                    <input id="sttr_hsn_no" name="sttr_hsn_no" type="text" placeholder="HSN" 
                           value="<?php echo $sttr_hsn_no; ?>"
                           onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                           document.getElementById('sttr_gs_weight').focus();
                                           document.getElementById('sttr_gs_weight').value = '';
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('sttr_quantity').focus();
                                           document.getElementById('sttr_quantity').value = '';
                                           return false;
                                       }"
                           onclick="this.value = '';"
                           onblur="if (this.value == '') {
                                           this.value = '<?php echo $itst_item_size; ?>';
                                       }"
                           autocomplete="off" spellcheck="false" 
                           class="form-control text-center font-dark input-focus" size="8" maxlength="15" />
                </td>
            <?php } else { ?>
                <td></td>    
            <?php } ?>

            <td align="left" class="padLeft3" width="80px">
                <!--START Code to LESS WT -->
                <input id="sttr_pkt_weight" name="sttr_pkt_weight" type="text" placeholder="LESS WT" value="<?php echo $sttr_pkt_weight; ?>"

                       <?php
                       /* ------------------------------------------------------------------------------------------------------- */
                       /* Start Code to Get Weight from Weighing Scale
                         /* ------------------------------------------------------------------------------------------------------- */
                       $selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_option = 'checkWSComPort'";
                       $resFormsLayoutDet = mysqli_query($conn, $selFormsLayoutDet);
                       $rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
                       $checkWSComPortVal = $rowFormsLayoutDet['omly_value'];
                       ?>
                       <?php if ($_SESSION['sessionOwnIndStr'][16] == 'Y' && $checkWSComPortVal == 'true') { ?>
                           onfocus="getWeightFromWeighingScale('sttr_pkt_weight', 'sttr_nt_weight');"
                           onclick="getWeightFromWeighingScale('sttr_pkt_weight', 'sttr_nt_weight');"
                           <?php
                       }
                       /* ------------------------------------------------------------------------------------------------------- */
                       /* End Code to Get Weight from Weighing Scale
                         /* ------------------------------------------------------------------------------------------------------- */
                       ?>    
                       ondblclick="document.getElementById('packetWt').style.visibility = 'visible';
                               document.getElementById('pktQty1').focus();
                               document.getElementById('close').style.visibility = 'visible';" 
                       onblur="javascript: if (this.value == '') {
                                   this.value = '<?php echo $sttr_pkt_weight; ?>';
                               } else if (this.value != '' && this.value != null) {
                                   document.getElementById('sttr_pkt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
                                   document.getElementById('sttr_nt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
                               }
                               changeNetWeightByPktWt();
                               calRawMetalFinVal();
                               return false;"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('sttr_purity').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_pkt_weight').focus();
                                   return false;
                               }"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"   
                       autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="5" maxlength="20" title="LESS WEIGHT"/>

                <input type="hidden" id="sttr_pkt_weight_type" name="sttr_pkt_weight_type" 
                       value="<?php echo $sttr_pkt_weight_type; ?>" 
                       title="PACKET WEIGHT TYPE"/>
                <!--END Code to LESS WT  @Author:SWAPNIL-21JUL20-->

            </td>
            <td align="right" class="padLeft3" width="80px">
                <!-- Add Code for Crystal Less Weight Functionality @Author:PRIYANKA-14MAR19 -->
                <input type="hidden" id="totNetWeight" name="totNetWeight" value="<?php echo $sttr_nt_weight; ?>" />
                <input type="hidden" id="netWeight" name="netWeight" value="<?php echo $sttr_nt_weight; ?>" />
                <input id="sttr_nt_weight" name="sttr_nt_weight" type="text" placeholder="NT WT" 
                       <?php if ($listPanel != 'MeltingTransList') { ?> value="<?php echo $sttr_nt_weight; ?>" <?php } ?>
                       <?php
                       /* ------------------------------------------------------------------------------------------------------- */
                       /* Start Code to Get Weight from Weighing Scale
                         /* ------------------------------------------------------------------------------------------------------- */
                       ?>
                       <?php if ($_SESSION['sessionOwnIndStr'][16] == 'Y' && $checkWSComPortVal == 'true') { ?>
                           onfocus="getWeightFromWeighingScale('sttr_gs_weight', 'sttr_nt_weight');"
                           onclick="getWeightFromWeighingScale('sttr_gs_weight', 'sttr_nt_weight');"
                           <?php
                       }
                       /* ------------------------------------------------------------------------------------------------------- */
                       /* End Code to Get Weight from Weighing Scale
                         /* ------------------------------------------------------------------------------------------------------- */
                       ?>   
                       onblur="if (this.value == '') {
                                   this.value = '<?php echo $sttr_nt_weight; ?>';
                               }
                               calRawMetalFinVal();
                               return false;"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('sttr_nt_weight_type').focus();
                                   //document.getElementById('sttr_nt_weight_type').value = '';
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_gs_weight_type').focus();
                                   //document.getElementById('sttr_gs_weight_type').value = '';
                                   return false;
                               }"
                       onclick="this.value = '';"        
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="5" maxlength="20" title="NET WEIGHT"/>

                <input type="hidden" id="sttr_nt_weight_type" name="sttr_nt_weight_type" title="NET WEIGHT TYPE"
                       value="<?php echo $sttr_nt_weight_type; ?>" 
                       onblur="document.getElementById('sttr_nt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;"
                       />



            </td>

            <?php if ($sttr_metal_type == 'crystal') { ?>
            <input type="hidden" id="sttr_fine_weight" name="sttr_fine_weight" value="0" />
            <input type="hidden" id="sttr_final_fine_weight" name="sttr_final_fine_weight" value="0" />
        <?php } else { ?>
            <td colspan="2" class="padLeft3">
                <table width="100%">
                    <tr>
                        <td align="left" title="FINE WEIGHT" >
                            <input id="sttr_fine_weight" name="sttr_fine_weight" type="text" placeholder="FN WT" <?php if ($listPanel != 'MeltingTransList') { ?> value="<?php echo $sttr_fine_weight; ?>" <?php } ?>
                                   onkeypress="javascript:return valKeyPressedForNum
                                   NDot(event);"  readonly="true"
                                   spellcheck="false" class="form-control text-center font-dark input-focus" size="7" maxlength="20" 

                                   onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('sttr_valuation').focus();
                                       document.getElementById('sttr_valuation').value = '';
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('sttr_purity').focus();
                                       document.getElementById('sttr_purity').value = '';
                                       return false;
                                   }"
                                   />
                        </td>
                        <td align="left" title="FFN WEIGHT" class="padLeft3">
                            <input id="sttr_final_fine_weight" name="sttr_final_fine_weight" type="text" placeholder="FFN WT" value="<?php echo $sttr_final_fine_weight; ?>"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"  readonly="true"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('sttr_valuation').focus();
                                       document.getElementById('sttr_valuation').value = '';
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('sttr_purity').focus();
                                       document.getElementById('sttr_purity').value = '';
                                       return false;
                                   }"
                                   spellcheck="false" class="form-control text-center font-dark input-focus" 
                                   size="5" maxlength="20" 
                                   <?php if ($TaxAndGstSettingValue == 'GST') { ?>  
                                       style="width:98%;" 
                                   <?php } else { ?>
                                       style="width:100%;"
                                   <?php } ?>  
                                   />
                        </td>
                    </tr>
                </table>
            </td>

        <?php } ?>

        <td colspan="2" align="left" <?php if ($TaxAndGstSettingValue == 'TAX') { ?> class="padLeft5" <?php } ?>>
            <table border="0" cellpadding="0" cellsapcing="0" width="100%"
            <?php if ($TaxAndGstSettingValue == 'TAX') { ?>
                       width="100%"
                   <?php } ?>
                   >
                <tr>
                    <td align="right" title="LABOUR CHARGES"  class="padLeft3" width="90px">
                        <input type="hidden" id="addItemLabChargesChanged" name="addItemLabChargesChanged" value="<?php echo $sttr_lab_charges; ?>" />
                        <input id="sttr_lab_charges" name="sttr_lab_charges" type="text" placeholder="LB CHRG" value="<?php echo $sttr_lab_charges; ?>"
                               title="Double click to calculate labour charges by fine,gross or net weight!"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           clearDivision('itemLabChrgsSelDiv');
                                           document.getElementById('sttr_lab_charges_type').focus();
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           clearDivision('itemLabChrgsSelDiv');
                                           document.getElementById('sttr_wastage').focus();
                                           document.getElementById('sttr_wastage').value = '';
                                           return false;
                                       }"
                               onblur="javascript:
                                               if (this.value == '') {
                                           this.value = document.getElementById('addItemLabChargesChanged').value;
                                       }
                                       if (document.getElementById('sttr_gs_weight').value != '') {
                                           calRawMetalFinVal();
                                           return false;
                                       }"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="10" maxlength="10" title="LABOUR CHARGES"/>
                        <div id="itemLabChrgsSelDiv" style="margin-left:-45px"></div>
                    </td>
                    <td align="left" style="padding-right:3px;" <?php if ($TaxAndGstSettingValue == 'TAX') { ?>style="width: 2%;"<?php } ?>> 
                        <select id="sttr_lab_charges_type" name="sttr_lab_charges_type" 
                                onkeydown="javascript: if (event.keyCode == 13) {
                                <?php if ($TaxAndGstSettingValue == 'GST') { ?>
                                                document.getElementById('sttr_tot_price_cgst_per').focus();
                                <?php } else { ?>
                                                document.getElementById('sttr_total_lab_charges').focus();
                                <?php } ?>
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('sttr_lab_charges').focus();
                                            document.getElementById('sttr_lab_charges').value = '';
                                            return false;
                                        }"
                                onchange="javascript: if (document.getElementById('sttr_lab_charges').value != '') {
                                            calRawMetalFinVal();
                                            return false;
                                        }"
                                class="form-control text-center font-dark input-focus" title="LABOUR CHARGES TYPE">
                                    <?php
                                    if ($simItem == 'SimilarItem' || $panelSimilarDiv == 'SimilarItem' || $UpPanel == 'UpPanel') {
                                        $itemLabChType = array(KG, GM, MG, PP, CT);
                                        for ($i = 0; $i <= 4; $i++)
                                            if ($itemLabChType[$i] == $sttr_lab_charges_type)
                                                $optionLbChTypeSel[$i] = 'selected';
                                    }else {
                                        $optionLbChTypeSel[3] = 'selected';
                                    }
                                    ?>
                            <option value="KG" <?php echo $optionLbChTypeSel[0]; ?>>KG</option>
                            <option value="GM" <?php echo $optionLbChTypeSel[1]; ?>>GM</option>
                            <option value="MG" <?php echo $optionLbChTypeSel[2]; ?>>MG</option>
                            <option value="PP" <?php echo $optionLbChTypeSel[3]; ?>>PP</option>
                            <option value="CT" <?php echo $optionLbChTypeSel[4]; ?>>CT</option>
                        </select>
                    </td>
                </tr>
            </table>
        </td>

        <?php if ($TaxAndGstSettingValue == 'GST') { ?>                                        
            <td align="center" title="TOT OF LB CH" class="padLeft7">
                <input id="sttr_total_lab_charges" name="sttr_total_lab_charges" 
                       value="<?php echo $sttr_total_lab_charges; ?>" 
                       type="text" placeholder="TOT LAB"                                
                       onkeydown="javascript:if (event.keyCode == 13) {
                                       document.getElementById('sttr_tot_tax').focus();
                                       calRawMetalFinVal();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('sttr_lab_charges_type').focus();
                                       return false;
                                   }"
                       onblur="javascript: if (document.getElementById('sttr_gs_weight').value != '') {
                                       calRawMetalFinVal();
                                       return false;
                                   }" 
                       style="width: 140%; margin-left: -6px;"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                       spellcheck="false" class="form-control text-center font-dark input-focus" size="6" maxlength="20"  />
            </td>

            <td align="left" class="padLeft7" title=" TOTAL TAX" >
                <input id="sttr_tot_tax" name="sttr_tot_tax" type="text" 
                       value="<?php echo $sttr_tot_tax; ?>" placeholder="TOTAL TAX " 
                       onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('sttr_final_valuation').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('sttr_tot_price_igst_chrg').focus();
                                       return false;
                                   }"
                       onblur="javascript: if (document.getElementById('sttr_gs_weight').value != '') {
                                       calRawMetalFinVal();
                                       return false;
                                   }" 
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                    
                       spellcheck="false" 
                       style="margin-left: 12px; width: 64px;"
                       class="form-control text-center font-dark input-focus" size="5" maxlength="15" /><!--description: START CODE TO Add customerStatement @Author: DISH08OCT16 i changed size 7 to 5-->

            </td>
        <?php } ?> 


        <td align="left" colspan="3" title="FINAL VALUATION"class="padLeft5" >
            <input id="sttr_final_valuation" name="sttr_final_valuation" 
                   type="text" placeholder="FINAL VALUATION" value="<?php echo $sttr_final_valuation; ?>"
                   onkeydown="javascript:if (event.keyCode == 13) {
                               document.getElementById('addRawStockSubButt').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('sttr_tot_tax').focus();
                               return false;
                           }" 
                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"   
                   spellcheck="false" class="form-control text-center font-dark input-focus" 
                   size="5" maxlength="20" 
                   <?php if ($TaxAndGstSettingValue == 'GST') { ?>      
                       style="width:100%;"
                   <?php } else { ?>      
                       style="width:100%;"
                   <?php } ?>      
                   />
        </td>                       
        <?php
        //
        $commonPanel = 'assignOrderPanel';
        //
        ?>                     
        <!-- Add Code for Crystal Functionality @Author:PRIYANKA-14MAR19 -->
        <!--<td colspan="3">
            <a style="cursor: pointer;" 
               onclick ="resetStockCrystalFunc();
                       getStockCrystalDivFunc('', 'crystalAddDiv', '<?php echo $commonPanel; ?>', '<?php echo $documentRootBSlash; ?>');
                       return false;">
                <table border="0" cellspacing="2" cellpadding="0" width="100%" align="left">
                    <tr>    
                        <td> 
                            <img src="<?php echo $documentRootBSlash; ?>/images/diamond-icon16.png" alt="" 
                                 style="padding-top: 5px;margin-left: 10px;"
                                 onload="
        <?php if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') { ?>
                                                                                                     calRawMetalFinVal();
                                                                                                     calcRawMetalCrystalVal();
                                                                                                     return false;
        <?php } else if ($NavPanelName == "AssignRepairOrderPanel") { ?>
                                                                                                     document.getElementById('sttr_metal_type').focus();
                                                                                                     return false;
        <?php } else { ?>
                                                                                                     document.getElementById('sttr_item_name').focus();
                                                                                                     return false;
        <?php } ?>
                                 "/>
                        </td>
                        <td>
                            STONE
                        </td>                       
                    </tr>
                </table>
            </a>
        </td>-->
        </tr>
    </table>
</td>
</tr>



<tr>       
    <td align="left" colspan="6" class="paddingTop4 padBott4">
        <!--<div class="hrGold"></div>-->
    </td>

</tr>

<!-- Add Code for Crystal Update Functionality @Author:PRIYANKA-14MAR19 -->
<!--<tr>
    <td>
        <div id="crystalAddDiv">
<?php
if ($noOfCry > 0) {
    //include 'omrwcrydv.php';
}
?>
        </div>
    </td>
</tr>-->

<tr>       
    <td align="left" colspan="6" class="paddingTop4 padBott4">
        <!--<div class="hrGold"></div>-->
    </td>

</tr>

<tr>
    <td align="center" colspan="16">
        <table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr>
                <?php
                $qSelItemCount = "SELECT sttr_id FROM stock_transaction where sttr_item_category IN ('RawGold', 'RawSilver','OldGold','OldSilver')";
                $resItemCount = mysqli_query($conn, $qSelItemCount);
                $totalItem = mysqli_num_rows($resItemCount);
                if (($_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $totalItem >= 5) {
                    ?>
                    <td align="center">   
                        <div class = "main_link_red_12">In Demo, You can not add more than five items. To add more items, please purchase the product!</div>
                    </td>                                                   
                    <?php
                } else if ($_SESSION['sessionDongleStatus'] != NULL &&
                        ((($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $totalItem < 5) ||
                        (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD) && $_SESSION['sessionDongleStatus'] == $gbDongleRegStatus))) {
                    ?>
                    <!--add similar button div -->
                    <td align="right" width="50%">
                        <div id="addRawStockSimButtDiv" title="Shortcut Key(+ key) !">
                            <?php if ($rawPanelName == 'SimilarItem' && $simButton == 'similirItem') { ?>
                                <input type="hidden" id="panelSimilarDiv" name="panelSimilarDiv" value="SimilarItem" />
                            <?php } else { ?>
                                <input type="hidden" id="panelSimilarDiv" name="panelSimilarDiv" value="NoSimilarItem" />
                            <?php } ?>
                            <?php if (($UpPanel == 'AddPanel' || $rawPanelName == 'SimilarItem') && $simButton == 'similirItem') { ?>
                                <input type="submit" value="SIMILAR ITEM" class="<?php
                                if ($UpdateItemPanel == 'UpdateItem') {
                                    echo 'btn btn1 btn1Hover';
                                } else {
                                    echo 'btn btn-info';
                                }
                                ?>" id="addItemSimButt" 
                                       onclick="javascript
                                                       :document.getElementById('panelSimilarDiv').value = 'SimilarItem';"
                                       maxlength="30" size="10"  style = "height:30px;width:120px;border-radius:5px!important;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:#006400;background:#D8F6D8;"/>
                                   <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="paddingTopBott10" colspan="10">
                        <div class="hrGrey"></div>
                    </td>
                </tr>
                <tr>
                    <!--add similar button div -->
                    <td align="center" width="100%">
                        <div id="addRawStockSubButtDiv">
                            <input type="submit" value="<?php
                            if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' || $listPanelUp == 'MeltingTransListUp' || $listPanel == 'MeltingTransListUp' || $listMetalPanel == 'MeltingTransListUp')
                                echo 'UPDATE ITEM';
                            else
                                echo 'SUBMIT';
                            ?>" 
                                   class="btn btn1 btn1Hover" id="addRawStockSubButt" 
                                   maxlength="30" size="20" style="height:30px;width:150px;border-radius:5px!important;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:#006400;background:#D8F6D8;" 
                                   />
                        </div>  
                    </td>
                    <td align="right" valign="middle">
                        <div id="messDisplayDiv" class="analysis_div_rows">
                            <?php
                            $showMess = $_GET['messDiv'];
                            if ($showMess == "itemDeleted") {
                                echo "<div class=" . "fs_12 fs_calibri" . ">~ Deleted Successfully ~ </div>";
                            }
                            ?>
                        </div>
                    </td>
                <?php } ?>
            </tr>
<!--            <tr>
                <td align="left" class="paddingTopBott10" colspan="10">
                    <div class="hrGrey"></div>
                </td>
            </tr>-->
        </table>
    </td>
</tr>
</table> 
</div>
<div id="getStoneStockTypeDiv"></div>