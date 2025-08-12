<?php
/*
 * *************************************************************************************************
 * @Description: ADD RETAIL STOCK FROM FINE PURCHASE WHOLESALE ENTRY OF SUPPLIER @PRIYANKA-07FEB19
 * *************************************************************************************************
 *
 * Created on FEB 07, 2019 10:53:00 AM 
 * **************************************************************************************
 * @FileName: omWholesaleStockList.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.6.94
 * @version: OMUNIM 2.6.94
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-07FEB19
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software OMUNIM 2.6.94
 * Version: OMUNIM 2.6.94
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
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
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
$showDiv = $_GET['divSubPanel'];
//
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
    <tr>
        <td valign="top" align="left" width="32px" colspan="1" class="">
            <div class="analysis_div_rows">
                <img src="<?php echo $documentRoot; ?>/images/ring32.png" alt=""/>
            </div>
        </td>
        <td valign="middle" align="left" colspan="15" class="">
            <a class="links" onclick=""
               style="cursor: pointer;" title="WHOLESALE STOCK LIST!">
                <div class="textLabelHeading">
                    WHOLESALE STOCK LIST
                </div>
            </a>
        </td>
        <?php
        //
        // Start Code for Message Display @PRIYANKA-15DEC2021
        //
        ?>
        <td align="center" valign="middle" class="">
            <div id="messDisplayDiv"></div>
            <div <?php if ($panelName == 'wholesaleStockList') { ?>
                    class="analysis_div_rows main_link_green12"
                <?php } else { ?>
                    class="analysis_div_rows main_link_red_12"
                <?php } ?> >
                    <?php if ($showDiv == 'DataImportedSuccessfully') { ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Data Imported Successfully ~ </div>
                <?php } ?>  
            </div>
        </td>
        <?php
        //
        // End Code for Message Display @PRIYANKA-15DEC2021
        //
        ?>
        <td>
            <?php
            //
            // Start Code for Import Data From CSV File to Mysql Database for All TAG Entries @PRIYANKA-15DEC2021
            //
            ?>
        <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right" style="margin-right: 12px;">
                <tr>                                      
                    <td valign="top">
                        <div class="main_link_brown16" align="center" style="margin-left: 32%;font-weight:bold;">
                            IMPORT All TAG STOCK                    
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="border-color-grey-b">
                        <table align="right" border="0" cellspacing="0" cellpadding="2" width="100%">
                            <tr>
                                <td align="right" class="printVisibilityHidden paddingTop4 textLabel14CalibriBrownBold">
                                    <form name="fileUpload" id="fileUpload" enctype="multipart/form-data" method="post"
                                          action="include/php/omAllTagsImportFile.php">
                                        <table border="0" cellspacing="0" cellpadding="0" valign="top" >
                                            <tr>                                      
                                                <td align="right" valign="top">
                                                    <input type="file" name="CVSFile" id="CVSFile" required="required" />
                                                </td>
                                                <td align="right" valign="top">
                                                    <div>-->
            <?php
//                                                        $inputId = "submit";
//                                                        $inputType = 'submit';
//                                                        $inputFieldValue = 'Submit';
//                                                        $inputIdButton = "submit";
//                                                        $inputNameButton = '';
//                                                        $inputTitle = '';
//                                                        //
//                                                        // This is the main class for input flied
//                                                        $inputFieldClass = 'btn ' . $om_btn_style;
//                                                        $inputStyle = " ";
//                                                        $inputLabel = 'Import'; // Display Label below the text box
//                                                        //
//                                                        // This class is for Pencil Icon                                                           
//                                                        $inputIconClass = '';
//                                                        $inputPlaceHolder = '';
//                                                        $spanPlaceHolderClass = '';
//                                                        $spanPlaceHolder = '';
//                                                        $inputOnChange = "";
//                                                        $inputOnClickFun = '';
//                                                        $inputKeyUpFun = '';
//                                                        $inputDropDownCls = '';               // This is the main division class for drop down 
//                                                        $inputselDropDownCls = '';            // This is class for selection in drop down
//                                                        $inputMainClassButton = '';           // This is the main division for Button
//                                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
            ?>
            <!--</div>
        </td>
    </tr>
</table>
</form>
</td>
</tr>
</table>
</td>
</tr>
</table>-->
            <?php
            //
            // End Code for Import Data From CSV File to Mysql Database for All TAG Entries @PRIYANKA-15DEC2021
            //
            ?>
        </td>
    </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="99.6%" align="center" class="brdrgry-dashed">
<!--    <tr>
        <td align="center" class="itemAddPnLabels14 paddingTop7" colspan="18"></td>
    </tr>-->
<!--    <tr>
        <td align="center" class="itemAddPnLabels14" colspan="18">
            &nbsp;
        </td>
    </tr>-->
    <div id = "myModal" class = "modal"></div>
    <?php
    //
    if ($_SESSION['sessionProdName'] == 'OMRETL') {
        //
        $selItemDetails = "SELECT * FROM stock where st_owner_id = '$sessionOwnerId' "
                . "and st_firm_id IN ($strFrmId) "
                //. "and (st_quantity > 0 OR st_gs_weight > 0)"
                . "and st_stock_type = 'wholesale' "
                . "and st_metal_type IN ('imitation', 'IMITATION', 'Imitation', 'stock') "
                . "order by st_id asc";
        //
    } else {
        //
        $selItemDetails = "SELECT * FROM stock where st_owner_id = '$sessionOwnerId' "
                . "and (st_gs_weight > 0) and st_type NOT IN('rawMetal')"
                . "and st_firm_id IN ($strFrmId) and st_firm_id != '' and st_stock_type = 'wholesale' "
                . "and st_metal_type IN ('Gold', 'GOLD', 'gold', 'Silver', 'SILVER', 'silver', 'Platinum', 'platinum', 'PLATINUM') order by st_id asc";
        //
    }
    //
//    echo '$selItemDetails == ' . $selItemDetails;
    //
    $resItemDetails = mysqli_query($conn, $selItemDetails);
    //
    $totalCounter = mysqli_num_rows($resItemDetails);
    //
    if ($totalCounter == 0) {
        exit();
    }
    ?>
    <tr class="height28 goldBack">
        <td align="left" class="brwnCalibri13Font border-color-grey-rb " title="PROD CODE">
            <div class="spaceLeft5">
                PROD CODE
            </div>
        </td>

        <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="TYPE">
            <div class="spaceLeft5">
                <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                    STOCK TYPE
                <?php } else { ?>
                    METAL
                <?php } ?>
            </div>
        </td>

        <td align="left" class="brwnCalibri13Font border-color-grey-rb" title="ITEM DETAILS">
            <div class="spaceLeft5">CATEGORY/NAME</div>
        </td>

        <td align="center" style="width: 3%;" class="brwnCalibri13Font border-color-grey-rb" title="QUANTITY">
            QTY
        </td>

        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="WEIGHT">
            <div class="spaceRight5">                
                <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                    WT
                <?php } else { ?>
                    GS WT
                <?php } ?>
            </div>
        </td>

        <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="NET WEIGHT">
                <div class="spaceRight5">NT WT</div>
            </td>
            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TUNCH/PURITY">
                <div class="spaceRight5">PURITY</div>
            </td>        
            <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL FINE WEIGHT">
                <div class="spaceRight5">FFN WT</div>
            </td>
        <?php } ?>

        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="AMOUNT">
            <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                AMOUNT
            <?php } else { ?>
                VAL
            <?php } ?>            
        </td>

        <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
            <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="OTHER CHARGES">
                <div class="spaceRight5">
                    <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                        OTHER CHARGES
                    <?php } else { ?>
                        LB CHRG
                    <?php } ?>

                </div>
            </td>
        <?php } ?>

        <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
            <td align="center" class="brwnCalibri13Font border-color-grey-rb" title="ITEM VALUATION">
                <div class="spaceRight5">
                    CRY CHRG
                </div>
            </td>
        <?php } ?>

        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="TAX">
            <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                OTHER CHARGES
            <?php } else { ?>
                TAX + OTH CHRGS
            <?php } ?>              
        </td>

        <td align="right" class="brwnCalibri13Font border-color-grey-rb" title="FINAL AMOUNT">
            <div class="spaceRight5">
                <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                    FINAL AMOUNT
                <?php } else { ?>
                    FINAL VAL
                <?php } ?>                
            </div>
        </td>

        <td align="center" class="brwnCalibri13Font border-color-grey-b" title="ITEM DELETE">
            <!--DEL-->
        </td>
    </tr>
    <?php
    $totalGoldQty = 0;
    $totalSilverQty = 0;
    $totalValuation = 0;
    $totalFinalBalance = 0;
    $totalCryVal = 0;
    $totalFinalBalance = 0;
    $goldTotGrossWt = 0;
    $goldTotGrossWtType = 'GM';
    $goldTotNetWt = 0;
    $goldTotNetWtType = 'GM';
    $goldOthChagsWeightType = 'GM';
    $goldFinalWeightType = 'GM';
    $goldTotFFineWt = 0;
    $silverTotGrossWt = 0;
    $silverTotGrossWtType = 'GM';
    $silverOthChagsWeightType = 'GM';
    $silverFinalWeightType = 'GM';
    $silverTotNetWt = 0;
    $silverTotNetWtType = 'GM';
    $silverTotFFineWt = 0;
    $othChgsGdFnWtTyp = 'GM';
    $othChgsSlFnWtTyp = 'GM';
    $gdVal = 0;
    $srVal = 0;
    $totalSilverVal = 0;
    $totalGoldVal = 0;
    $totalGoldItems = 0;
    $totalSilverItems = 0;
    $totalOthGdChgs = 0;
    $totalOthSlChgs = 0;
    $othChgsGdFnWt = 0;
    $othChgsSlFnWt = 0;
    $rateWithTaxVal = 0;
    $totalMetalVal = 0;
    $silverFinalWeight = 0;
    $goldFinalWeight = 0;
    $totalGoldRate = 0;
    $totalSilverRate = 0;
    $goldItemCount = 0;
    $silverItemCount = 0;
    //=============================================================================================================
    //********* START CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************************//
    //=============================================================================================================
    $totalPlatinumQty = 0;
    $platinumTotGrossWt = 0;
    $platinumTotGrossWtType = 'GM';
    $platinumTotNetWt = 0;
    $platinumTotNetWtType = 'GM';
    $platinumOthChagsWeightType = 'GM';
    $platinumFinalWeightType = 'GM';
    $platinumTotFFineWt = 0;
    $ptVal = 0;
    $totalPlatinumVal = 0;
    $totalPlatinumItems = 0;
    $totalOthPtChgs = 0;
    $othChgsPtFnWt = 0;
    $platinumFinalWeight = 0;
    $totalPlatinumRate = 0;
    $platinumItemCount = 0;
    //=============================================================================================================
    //********************* END CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************//
    //=============================================================================================================
    while ($rowItemDetails = mysqli_fetch_array($resItemDetails)) {
        $utrId = $rowItemDetails['st_id'];
        $st_id = $rowItemDetails['st_id'];
        $firmId = $rowItemDetails['st_firm_id'];
        $itemValuation = $rowItemDetails['st_valuation'];

        if ($_SESSION['sessionProdName'] == 'OMRETL') {
            $itemMetalRate = $rowItemDetails['st_purchase_rate'];
        } else {
            $itemMetalRate = $rowItemDetails['st_metal_rate'];
        }

        $stockType = $rowItemDetails['st_item_category'];
        $totalValuation += $itemValuation;
        $totalFinalBalance += $rowItemDetails['st_final_valuation'];
        $totalAmnt = $totalFinalBalance;
        $metalType = $rowItemDetails['st_metal_type'];
        $grossWt = $rowItemDetails['st_gs_weight'];
        $grossWtTyp = $rowItemDetails['st_gs_weight_type'];
        $netWt = $rowItemDetails['st_nt_weight'];
        $netWtTyp = $rowItemDetails['st_nt_weight_type'];
        $resFFNW = $rowItemDetails['st_final_fine_weight'];
        $newItemTaxChrg = $rowItemDetails['st_tot_tax'];
        $valueAdded = 0; // SET VALUE ADDED FOR SUPPLIER PAYMENT PANEL @PRIYANKA-21MAR18
        // Added by PRIYANKA-24JAN18 => DATE ON PAYMENT PANEL
        $itemTotLabChgs = 0;
        if ($rowItemDetails['st_lab_charges'] != '') {
            if ($rowItemDetails['st_lab_charges_type'] == 'KG') {
                if ($rowItemDetails['st_nt_weight_type'] == 'KG')
                    $itemTotLabChgs = decimalVal($rowItemDetails['st_lab_charges'] * $resFFNW, 2);
                else if ($rowItemDetails['st_nt_weight_type'] == 'GM')
                    $itemTotLabChgs = decimalVal(($rowItemDetails['st_lab_charges'] / 1000) * $resFFNW
                            , 2);
                else
                    $itemTotLabChgs = decimalVal(($rowItemDetails['st_lab_charges'] / (1000 * 1000)) * $resFFNW, 2);
            } else if ($rowItemDetails['st_lab_charges_type'] == 'GM') {
                if ($rowItemDetails['st_nt_weight_type'] == 'KG')
                    $itemTotLabChgs = decimalVal($rowItemDetails['st_lab_charges'] * 1000 * $resFFNW, 2);
                else if ($rowItemDetails['st_nt_weight_type'] == 'GM')
                    $itemTotLabChgs = decimalVal($rowItemDetails['st_lab_charges'] * $resFFNW
                            , 2);
                else
                    $itemTotLabChgs = decimalVal(($rowItemDetails['st_lab_charges'] / 1000) * $resFFNW, 2);
            } else if ($rowItemDetails['st_lab_charges_type'] == 'MG') {
                if ($rowItemDetails['st_nt_weight_type'] == 'KG')
                    $itemTotLabChgs = decimalVal($rowItemDetails['st_lab_charges'] * 1000 * 1000 * $resFFNW, 2);
                else if ($rowItemDetails['st_nt_weight_type'] == 'GM')
                    $itemTotLabChgs = decimalVal($rowItemDetails['st_lab_charges'] * 1000 * $resFFNW, 2);
                else
                    $itemTotLabChgs = decimalVal($rowItemDetails['st_lab_charges'] * $resFFNW, 2);
            } else if ($rowItemDetails['st_lab_charges_type'] == 'PP') {
                $itemTotLabChgs = decimalVal($rowItemDetails['st_lab_charges'] * $rowItemDetails['st_quantity'], 2);
            }
        }
        $itemValuation = $itemValuation - $itemTotLabChgs;
        if ($firmIdSelected == '') {
            $firmIdSelected = $firmId;
        }
        if ($newItemTaxChrg == '' || $newItemTaxChrg == NULL) {
            $newItemTaxChrg = 0;
        }
        parse_str(getTableValues("SELECT met_rate_tax_check, met_rate_tax_percentage, met_rate_with_tax FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' AND met_rate_value = '$itemMetalRate' AND met_rate_metal_name = '$rowItemDetails[stpr_metal_type]'"));
        if ($met_rate_tax_check == 'true') {
            $rateWithTaxVal = $itemValuation * ($met_rate_tax_percentage / 100);
            $itemMetalRate = $met_rate_with_tax;
            $newItemTaxChrg -= $rateWithTaxVal;
        }

        if (($payPanelName != "ItemApprovalRec" && $payPanelName != "ItemApprovalRecUp") || (($payPanelName == "ItemApprovalRec" || $payPanelName == "ItemApprovalRecUp") && ($itemStatus == 'ApprovalDone' || $itemStatus == 'PaymentPending'))) {
            $totalTax += $newItemTaxChrg;
            $totalMetalVal = $rowItemDetails['stpr_valuation'] + $newItemTaxChrg;
            $finalMetalVal += $totalMetalVal;
            $totalCharges = $newItemTaxChrg + $itemTotLabChgs;



            if ($rowItemDetails['st_metal_type'] == 'Gold' || $rowItemDetails['st_metal_type'] == 'gold' || $rowItemDetails['st_metal_type'] == 'GOLD') {
                $goldTotGrossWt += getTotalWeight($rowItemDetails['st_gs_weight'], $rowItemDetails['st_gs_weight_type'], 'weight');
                $goldTotGrossWtType = 'GM';
                $goldTotNetWt += getTotalWeight($rowItemDetails['st_nt_weight'], $rowItemDetails['st_nt_weight_type'], 'weight');
                $goldTotNetWtType = 'GM';
                $goldTotFFineWt += getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight');
                $goldTotFFineWtType = 'GM';
                $gdRate = $rowItemDetails['st_metal_rate'];
                $gdVal = $rowItemDetails['st_valuation'];

                $totalGoldBalance += $rowItemDetails['st_valuation'];
                $totalGoldVal += $rowItemDetails['st_final_valuation'];
                $otherGoldCharges = $rowItemDetails['st_total_lab_charges'];
                $totalOthGdChgs += $otherGoldCharges;
                $goldQty += $rowItemDetails['st_quantity'];
                $goldRate = $gdRate;
                $goldCrystalAmount += $rowItemDetails['st_stone_valuation'];
                $goldPurchaseAvgRate1 += ($goldRate * getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
                $goldPurchaseAvgRate2 += getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight') / 10;
            }
            if ($rowItemDetails['st_metal_type'] == 'Silver' || $rowItemDetails['st_metal_type'] == 'silver' || $rowItemDetails['st_metal_type'] == 'SILVER') {


                $silverTotGrossWt += getTotalWeight($rowItemDetails['st_gs_weight'], $rowItemDetails['st_gs_weight_type'], 'weight');
                $silverTotGrossWtType = 'GM';
                $silverTotNetWt += getTotalWeight($rowItemDetails['st_nt_weight'], $rowItemDetails['st_nt_weight_type'], 'weight');
                $silverTotNetWtType = 'GM';
                $silverTotFFineWt += getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight');
                $silverTotFFineWtType = 'GM';
                $srRate = $rowItemDetails['st_metal_rate'];
                $srVal = $rowItemDetails['st_valuation'];


                $totalSilverBalance += $rowItemDetails['st_valuation'];
                $totalSilverVal += $rowItemDetails['st_final_valuation'];
                $otherSilverCharges = $rowItemDetails['st_total_lab_charges'];
                $totalOthSlChgs += $otherSilverCharges;
                $silverQty += $rowItemDetails['st_quantity'];
                $slprMetalRate = $rowSlPrItemDetails['st_metal_rate'];
                $silverRate = $srRate;
                $silverPurchaseAvgRate1 += ($silverRate * getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight')) / 100; // / (getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight') / 10)), 2);
                $silverPurchaseAvgRate2 += getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight') / 10;
            }
            //=============================================================================================================
            //********* START CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************************//
            //=============================================================================================================
            if ($rowItemDetails['st_metal_type'] == 'Platinum' || $rowItemDetails['st_metal_type'] == 'platinum' || $rowItemDetails['st_metal_type'] == 'PLATINUM') {
                $platinumTotGrossWt += getTotalWeight($rowItemDetails['st_gs_weight'], $rowItemDetails['st_gs_weight_type'], 'weight');
                $platinumTotGrossWtType = 'GM';
                $platinumTotNetWt += getTotalWeight($rowItemDetails['st_nt_weight'], $rowItemDetails['st_nt_weight_type'], 'weight');
                $platinumTotNetWtType = 'GM';
                $platinumTotFFineWt += getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight');
                $platinumTotFFineWtType = 'GM';
                $ptRate = $rowItemDetails['st_metal_rate'];
                $ptVal = $rowItemDetails['st_valuation'];

                $totalPlatinumBalance += $rowItemDetails['st_valuation'];
                $totalPlatinumVal += $rowItemDetails['st_final_valuation'];
                $otherPlatinumCharges = $rowItemDetails['st_total_lab_charges'];
                $totalOthPtChgs += $otherPlatinumCharges;
                $platinumQty += $rowItemDetails['st_quantity'];
                $platinumRate = $ptRate;
                $platinumCrystalAmount += $rowItemDetails['st_stone_valuation'];
                $platinumPurchaseAvgRate1 += ($platinumRate * getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight')) / 100; //) / ()), 2);
                $platinumPurchaseAvgRate2 += getTotalWeight($rowItemDetails['st_final_fine_weight'], $rowItemDetails['st_nt_weight_type'], 'weight') / 10;
            }
            //=============================================================================================================
            //********* END CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************************//
            //=============================================================================================================
        }
        if ($slprMetalRate == 0 || $slprMetalRate == '' || $slprMetalRate == NULL)
            $slprMetalRate = callMetalRateTable('select', 'LatestMetalRate', '', '', $rowItemDetails['st_metal_type']);

        if ($otherChgsBy == 'byWt' && $slprMetalRate != 0) {
            if ($rowItemDetails['st_metal_type'] == 'Gold' || $rowItemDetails['st_metal_type'] == 'gold' || $rowItemDetails['st_metal_type'] == 'GOLD') {
                $goldOthChagsWeight = decimalVal((($totalOthGdChgs) * 10) / $slprMetalRate, 3);
                $othChgsGdFnWt = $goldOthChagsWeight;
            }
            if ($rowItemDetails['st_metal_type'] == 'Silver' || $rowItemDetails['st_metal_type'] == 'silver' || $rowItemDetails['st_metal_type'] == 'SILVER') {
                $silverOthChagsWeight = decimalVal((($totalOthSlChgs) * 1000) / $slprMetalRate, 3);
                $othChgsSlFnWt = $silverOthChagsWeight;
            }
            //=============================================================================================================
            //********* START CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************************//
            //=============================================================================================================
            if ($rowItemDetails['st_metal_type'] == 'Platinum' || $rowItemDetails['st_metal_type'] == 'platinum' || $rowItemDetails['st_metal_type'] == 'PLATINUM') {
                $platinumOthChagsWeight = decimalVal((($totalOthPtChgs) * 10) / $slprMetalRate, 3);
                $othChgsPtFnWt = $platinumOthChagsWeight;
            }
            //=============================================================================================================
            //********* END CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************************//
            //=============================================================================================================

        }

        $totalLabOrMkgCharges += decimalVal($itemTotLabChgs, 2);
        $totalTaxAmount += $newItemTaxChrg;
        $goldFinalWeight = decimalVal(($goldOthChagsWeight + $goldTotFFineWt), 3);
        $silverFinalWeight = decimalVal(($silverOthChagsWeight + $silverTotFFineWt), 3);
        $platinumFinalWeight = decimalVal(($platinumOthChagsWeight + $platinumTotFFineWt), 3);
        $utin_crystal_amt = $totalCryCharg;
        $class = 'border-color-grey-rb';
        //
        if ($grossWt > 0 || $rowItemDetails['st_quantity'] > 0) {
            ?>
            <tr>
                <td align="left" class="blackCalibri13Font border-color-grey-rb  border-color-grey-left">
                    <div class="spaceLeft5">
                        <?php
                        echo $rowItemDetails['st_item_code'];
                        ?>
                    </div>
                </td>

                <td valign="middle" align="left" class="blackCalibri13Font <?php echo $class; ?>" title="METAL/RATE">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td valign="top">
                                <div class="spaceLeft5">
                                    <?php echo om_strtoupper($rowItemDetails['st_metal_type']) . '/' . $itemMetalRate; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

            <input type="hidden" id="openLotItemDetDiv" name="openLotItemDetDiv"/>
            <input type="hidden" id="globSuppItemCount" name="globSuppItemCount"/>
            <input type="hidden" id="subPanel" name="subPanel" value="SuppPurByInv"/>
            <input type="hidden" id="addPanelInfo" name="addPanelInfo" value = ''/>

            <td align="left" class="blackCalibri13Font border-color-grey-rb" title="PROD CODE/CAT/NAME">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <button type="button" class="btn" title="Click Here To Add Retail Items!"
                                    style="cursor: pointer;padding: 0.5px 0px;" 
                                    id="myBtn" 
                                    onclick="openAddStockPopUp('<?php echo $st_id; ?>', '<?php echo $documentRoot; ?>');">
                                        <?php if ($addStockPanel != 'addStock') { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/plus_items_24.png" 
                                         height="16px" width="16px" alt="Click Here To Add Retail Items!"/>
                                     <?php } else { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/plus_items_24.png" alt="Add Stock"  /> 
                                <?php } ?>
                            </button>
                        </td>
                        <td>
                            <div class="spaceLeft5"><?php if (preg_match("/^[a-zA-Z]$/", substr($rowItemDetails['st_item_category'], 0, 1))) { echo om_strtoupper($rowItemDetails['st_item_category'] . '/' . $rowItemDetails['st_item_name']);}else{ echo $rowItemDetails['st_item_category'] . '/' . $rowItemDetails['st_item_name']; } ?></div>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($rowItemDetails['st_quantity'] != '' && $rowItemDetails['st_quantity'] > 0)
                    echo $rowItemDetails['st_quantity'];
                else
                    echo '-';
                ?>
            </td>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5">
                    <?php
                    if ($grossWt > 0)
                        echo decimalVal($grossWt, 3) . ' ' . $grossWtTyp;
                    else
                        echo '-';
                    ?>
                </div>
            </td>

            <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                <td align="right" class="blackCalibri13Font border-color-grey-rb">
                    <div class="spaceRight5"><?php echo decimalVal($netWt, 3) . ' ' . $netWtTyp; ?></div>
                </td>
                <td align="right" class="blackCalibri13Font border-color-grey-rb" title="TUNCH + WASTAGE">
                    <div class="spaceRight5"><?php
                        if ($rowItemDetails['st_purity'] != '')
                            if ($rowItemDetails['st_wastage'] != '') {
                                echo $rowItemDetails['st_purity'] . ' + ' . $rowItemDetails['st_wastage'] . ' %';
                            } else {
                                echo $rowItemDetails['st_purity'] . ' %';
                            }
                        ?>
                    </div>
                </td>
                <td align="right" class="blackCalibri13Font border-color-grey-rb">
                    <div class="spaceRight5"><?php echo $resFFNW . ' ' . $netWtTyp; ?></div>
                </td>
            <?php } ?>

            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5">
                    <?php
                    if ($rowItemDetails['st_valuation'] > 0) {
                        echo formatInIndianStyle($rowItemDetails['st_valuation']);
                    } else {
                        if ($_SESSION['sessionProdName'] == 'OMRETL' && $rowItemDetails['st_valuation'] == 0) {
                            if ($rowItemDetails['st_quantity'] > 0) {
                                echo $rowItemDetails['st_purchase_rate'] * $rowItemDetails['st_quantity'];
                            } else {
                                echo $rowItemDetails['st_purchase_rate'] * ($rowItemDetails['st_gs_weight'] / 1000);
                            }
                        } else {
                            echo '-';
                        }
                    }
                    ?>
                </div>
            </td>

            <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                <td align="center" class="blackCalibri13Font border-color-grey-rb">
                    <?php
                    if ($rowItemDetails['st_lab_charges'] != '')
                        echo $rowItemDetails['st_lab_charges'] . ' /' . $rowItemDetails['st_lab_charges_type'];
                    else
                        echo '-';
                    ?>
                </td>


                <td align="center" class="blackCalibri13Font border-color-grey-rb">
                    <?php
                    if ($rowItemDetails['st_stone_valuation'] > 0)
                        echo $rowItemDetails['st_stone_valuation'];
                    else
                        echo '-';
                    ?>
                </td>
            <?php } ?>

                <!--<td align="center" class="blackCalibri13Font border-color-grey-rb">
            <?php
            if ($rowItemDetails['st_tot_tax'] > 0)
                echo $rowItemDetails['st_tot_tax'];
            else
                echo '-';
            ?>
                </td>-->

            <?php //if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <?php
                if ($rowItemDetails['st_total_lab_charges'] > 0)
                    echo $rowItemDetails['st_total_lab_charges'];
                else
                    echo '-';
                ?>
            </td>
            <?php //} ?>

            <td align="right" class="blackCalibri13Font border-color-grey-rb">
                <div class="spaceRight5">
                    <?php
                    if ($rowItemDetails['st_final_valuation'] > 0)
                        echo formatInIndianStyle($rowItemDetails['st_final_valuation']);
                    else
                        echo '-';
                    ?>
                </div>
            </td>

            <td align="center" class="blackCalibri13Font border-color-grey-b">
                <!--<a style="cursor: pointer;" onclick="
                                    deleteFineInvoiceAllEntry('<?php echo $st_id; ?>', 'deleteFinePurchaseAllEntry', '', '', '', '<?php echo $payPanelName; ?>');
                               ">
                                <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="marginTop5" />
                    </a>-->
            </td>
        </tr>
        <?php
    }
    $cout++;
}
if ($otherChgsBy == 'byWt') {
    $totOtherChags = 0;
    $totalLabOrMkgCharges = 0;
} else {
    $totOtherChags = decimalVal($totalOthGdChgs + $totalOthSlChgs, 2);
    $totAmount = $totOtherChags;
}


$utin_oth_chgs_amt = $totOtherChags;

if ($goldPurchaseAvgRate1 != 0 && $goldPurchaseAvgRate2 != 0) {
    $goldPurchaseAvgRate = om_round(($goldPurchaseAvgRate1 / $goldPurchaseAvgRate2) * 10, 2);
}
if ($silverPurchaseAvgRate1 != 0 && $silverPurchaseAvgRate2 != 0) {
    $silverPurchaseAvgRate = om_round(($silverPurchaseAvgRate1 / $silverPurchaseAvgRate2) * 10, 2);
}
//=============================================================================================================
//********************** START CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************//
//=============================================================================================================
if ($platinumPurchaseAvgRate1 != 0 && $platinumPurchaseAvgRate2 != 0) {
    $platinumPurchaseAvgRate = om_round(($platinumPurchaseAvgRate1 / $platinumPurchaseAvgRate2) * 10, 2);
}
//=============================================================================================================
//********************* END CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************//
//=============================================================================================================
$goldOthChagsWeight = $othChgsGdFnWt;
$goldOthChagsWeightType = $goldFinalWeightType;
$silverOthChagsWeight = $othChgsSlFnWt;
$silverOthChagsWeightType = $silverFinalWeightType;
//
$platinumOthChagsWeight = $othChgsPtFnWt;
$platinumOthChagsWeightType = $platinumFinalWeightType;
//
$invTotCrystalAmt = $totalCryCharg;
//include 'ogcmttwt.php';
$goldTotGrossWt = decimalVal($goldTotGrossWt, 3);
?>
<tr>
    <td colspan="3" valign="top">
        <table border="0" cellspacing="0" cellpadding="0" align="right" width="100%" class="spaceRight5">
            <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                <tr>
                    <td align="right" class="blackCalibri13Font"  valign="top">
                        TOTAL GOLD STOCK:
                    </td>
                </tr>
            <?php } ?>
            <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                <tr>
                    <td align="right" class="blackCalibri13Font"  valign="top">
                        TOTAL SILVER STOCK:
                    </td>
                </tr>
            <?php } ?>
            <!-- START CODE FOR ADDED FOR PLATINUM TOTAL STOCK @SIMRAN:20JUNE2023-->
                <?php if ($platinumTotFFineWt != '' && $platinumTotFFineWt != 0) { ?>
                <tr>
                    <td align="right" class="blackCalibri13Font"  valign="top">
                        TOTAL PLATINUM STOCK:
                    </td>
                </tr>
            <?php } ?>
              <!-- END CODE FOR ADDED FOR PLATINUM TOTAL STOCK @SIMRAN:20JUNE2023-->
        </table>
    </td>
    <td align="left" colspan="3" valign="top">
        <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
            <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                <tr>
                    <td align="center" class="blackCalibri13Font"  valign="top" width="30px">
                        <?php
                        if ($goldQty > 0)
                            echo $goldQty;
                        else
                            echo '0';
                        ?>
                    </td>
                    <td align="left" class="blackCalibri13Font" width="100px" valign="top">
                        <div class="spaceRight5" style="margin-left: 8px;">  
                            <?php
                            echo decimalVal($goldTotGrossWt, 3) . ' ' . $goldTotGrossWtType;
                            ?>
                        </div>
                    </td>
                    <td align="right" class="blackCalibri13Font" valign="top">
                        <div class="spaceRight5">  
                            <?php
                            //echo decimalVal($goldTotGrossWt, 3) . ' ' . $goldTotGrossWtType;
                            ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                <tr>
                    <td align="center" class="blackCalibri13Font"  valign="top">
                        <?php
                        if ($silverQty > 0)
                            echo $silverQty;
                        else
                            echo '0';
                        ?>
                    </td>
                    <td align="left" class="blackCalibri13Font" width="100px">
                        <div class="spaceRight5" style="margin-left: 8px;">  
                            <?php
                            echo decimalVal($silverTotGrossWt, 3) . ' ' . $silverTotGrossWtType;
                            ?>
                        </div>
                    </td>
                    <td align="right" class="blackCalibri13Font">
                        <div class="spaceRight5"> 
                           
                        </div>
                    </td>
                </tr>
            <?php } ?>
                <?php if ($platinumTotFFineWt != '' && $platinumTotFFineWt != 0) { ?>
                <tr>
                    <td align="center" class="blackCalibri13Font"  valign="top">
                        <?php
                        if ($platinumQty > 0)
                            echo $platinumQty;
                        else
                            echo '0';
                        ?>
                    </td>
                    <td align="left" class="blackCalibri13Font" width="100px">
                        <div class="spaceRight5" style="margin-left: 8px;">  
                            <?php
                            echo decimalVal($platinumTotGrossWt, 3) . ' ' . $platinumTotGrossWtType;
                            ?>
                        </div>
                    </td>
                    <td align="right" class="blackCalibri13Font">
                        <div class="spaceRight5"> 
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </td>
    <td align="left" colspan="2" valign="top">
        <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
            <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                <tr>
                    <td align="right" class="blackCalibri13Font" width="60px">

                    </td>
                    <td align="right" class="blackCalibri13Font" width="100px">
                        <div class="spaceRight5"> 
                            <?php
                            echo decimalVal($goldTotFFineWt, 3) . ' ' . $goldTotFFineWtType;
                            ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                <tr>
                    <td align="right" class="blackCalibri13Font" width="50px">

                    </td>
                    <td align="right" class="blackCalibri13Font" width="100px">
                        <div class="spaceRight5"> <?php
                            echo decimalVal($silverTotFFineWt, 3) . ' ' . $silverTotFFineWtType;
                            ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
                 <?php if ($platinumTotFFineWt != '' && $platinumTotFFineWt != 0) { ?>
                <tr>
                    <td align="right" class="blackCalibri13Font" width="50px">

                    </td>
                    <td align="right" class="blackCalibri13Font" width="100px">
                        <div class="spaceRight5"> <?php
                            echo decimalVal($platinumTotFFineWt, 3) . ' ' . $platinumTotFFineWtType;
                            ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </td>
    <?php
    $goldFinalWeight = decimalVal($goldFinalWeight, 3);
    $silverFinalWeight = decimalVal($silverFinalWeight, 3);
    $goldOthChagsWeight = convert($goldFinalWeightType, $goldOthChagsWeightType, $goldOthChagsWeight);
    $silverOthChagsWeight = convert($silverFinalWeightType, $silverOthChagsWeightType, $silverOthChagsWeight);
    $goldFinalVal = $totalGoldVal;
    $silverFinalVal = $totalSilverVal;
    $goldOthChagsWeightType = $goldFinalWeightType;
    $silverOthChagsWeightType = $silverFinalWeightType;
    $goldOthChagsWeight = decimalVal($goldOthChagsWeight, 3);
    $silverOthChagsWeight = decimalVal($silverOthChagsWeight, 3);
    $goldTotFFineWt = decimalVal($goldTotFFineWt, 3);
    $silverTotFFineWt = decimalVal($silverTotFFineWt, 3);
    //
    //=============================================================================================================
    //********* START CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************************//
    //=============================================================================================================
    $platinumFinalWeight = decimalVal($platinumFinalWeight, 3);
    $platinumOthChagsWeight = convert($platinumFinalWeightType, $platinumOthChagsWeightType, $platinumOthChagsWeight);
    $platinumFinalVal = $totalPlatinumVal;
    $platinumOthChagsWeightType = $platinumFinalWeightType;
    $platinumOthChagsWeight = decimalVal($platinumOthChagsWeight, 3);
    $platinumTotFFineWt = decimalVal($platinumTotFFineWt, 3);
    //
    //=============================================================================================================
    //********* END CODE FOR ADDED PLATINUM STOCK @SIMRAN:20JUNE2023*******************************************//
    //=============================================================================================================
    if ($totalCounter != 0) {
        ?>
        <td align="left" valign="top" colspan="2">
            <table border="0" cellspacing="0" cellpadding="0" align="left">
                <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                    <tr>
                        <td align="left" class="blackCalibri13Font">
                            <div class="spaceRight5 orange">  <?php
                                //echo decimalVal($goldFinalWeight, 3) . ' ' . $goldFinalWeightType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="left" class="blackCalibri13Font">
                            <div class="spaceRight5 orange"> <?php
                                // echo decimalVal($silverFinalWeight, 3) . ' ' . $silverFinalWeightType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($platinumTotFFineWt != '' && $platinumTotFFineWt != 0) { ?>
                    <tr>
                        <td align="left" class="blackCalibri13Font">
                            <div class="spaceRight5 orange"> <?php
                                // echo decimalVal($silverFinalWeight, 3) . ' ' . $silverFinalWeightType;
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <td align="left" colspan="4" valign="top">
            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                <?php if ($goldTotFFineWt != '' && $goldTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font">
                            <div class="spaceRight5" style="margin-right: 12%;"> <?php echo formatInIndianStyle($totalGoldVal); ?></div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($silverTotFFineWt != '' && $silverTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font">
                            <div class="spaceRight5" style="margin-right: 12%;">  <?php echo formatInIndianStyle($totalSilverVal); ?></div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($platinumTotFFineWt != '' && $platinumTotFFineWt != 0) { ?>
                    <tr>
                        <td align="right" class="blackCalibri13Font">
                            <div class="spaceRight5" style="margin-right: 12%;">  <?php echo formatInIndianStyle($totalSilverVal); ?></div>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="12"></td>
        <td colspan="3">
            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                <tr>
                    <td class="blackCalibri13FontBold">
                        <div class="spaceRight5" 
                        <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                 style="margin-left: -148px;"
                             <?php } else { ?>
                                 style="margin-left: -111px;"
                             <?php } ?>
                             > TOTAL VALUATION  : <?php echo formatInIndianStyle($totalFinalBalance); ?> </div>
                    </td>
                </tr>
            </table>
        </td>
        <td></td>
        <?php
    }
    $totFinGdWt = $goldTotFFineWt;
    $totFinSlWt = $silverTotFFineWt;
    $totFinPtWt = $platinumTotFFineWt;   // ADDED FOR PLATINUM STOCK @SIMRAN:19JUNE2023
    ?>
</tr>
</table>
