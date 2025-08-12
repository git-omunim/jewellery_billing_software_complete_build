<?php
/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on 20 Jun, 2013 11:26:25 AM
 *
 * @FileName: omstock55x13sbdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
if ($tunch == '') {
    $tunch = $bcItemTunch;
}//echo '$panel:' . $panel;
//
?> 
<?php if ($panel == "label") {
    ?>
    <div id="glassbox" style="position: relative; border:0px solid #000;">
    <?php } ?>
    <div id="block81x13Div<?php echo $counter; ?>" class="table55L" style="border:0px solid #000;">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <?php if ($panel != 'label') { ?>
                        <div id="block40x5Div" class="block40x5Div bgcolor-label">
                            <div class="noPrint">
                                <?php echo $counter; ?>
                            </div>
                        </div>
                    <?php } ?>
                </td>
                <td>
                    <?php
                    if ($panel == "Items55x13BarCodePanel") {
                        //echo "aaaa".$suppliername;
                        ?>
                        <div id="glassbox" style="position: relative; border:0px solid;">
                        <?php } ?>
                        <table border="0" cellspacing="0" cellpadding="0" class="block55x13Div bgcolor-label">
                            <tr>
                                <td>
                                    <div class="barCodeTopMargin">
                                        <?php
                                        if ($bismark != 'NULL' && $bismark != '' && $bismark != 'FALSE') {
                                            parse_str(getTableValues("SELECT omx_pos,omy_pos FROM omindicators where omin_option = 'BisMark' and omin_panel='$panel'"));
                                            ?>

                                            <div  style="cursor:pointer;
                                                  width:auto;
                                                  left:<?php echo $omx_pos . px; ?>;
                                                  top:<?php echo $omy_pos . px; ?>;
                                                  position:absolute;" 
                                                  id="BisMark"
                                                  class="element floatRightBIS paddingTop4 padBottom0 marginBottom0 paddingRight5 alignText alignChangeTail">
                                                <img src="<?php echo $documentRoot; ?>/images/BIS18x12.png" alt="" />
                                            </div>
                                        <?php } ?>
                                        <!---------------------------Start change in code @Author:ANUJA27JUN15----------------------------------------------> 
                                        <?php
                                        parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption1' and omin_panel='$panel'"));
                                        //$OPTION1 = $omin_value; 
                                        $OPTION1_X = $omx_pos;
                                        $OPTION1_Y = $omy_pos;
                                        ?>
                                        <div class=" block84LText9 element" id="tailBcOption1" onClick="this.contentEditable = 'true';"
                                             style="font-size: <?php echo $fontSize1; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                 <?php
                                                 $OPTION1 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                                 ?>
                                        </div>

                                        <?php
                                        parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption2' and omin_panel='$panel'"));
                                        //
                                        $OPTION2_X = $omx_pos;
                                        $OPTION2_Y = $omy_pos;
                                        ?>
                                        <div class="block84LText9 element" id="tailBcOption2" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize2; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                            <?php
                                            $OPTION2 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue2, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption3' and omin_panel='$panel'")); //echo 'OM:'.$omin_value;
                                            $OPTION3_X = $omx_pos;
                                            $OPTION3_Y = $omy_pos;
                                            ?>
                                            <div class="block84LText9 element" id="tailBcOption3" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize3; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                <?php
                                                $OPTION3 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue3, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                                ?>
                                            </div>
                                            <?php
                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption4' and omin_panel='$panel'"));
                                            $OPTION4_X = $omx_pos;
                                            $OPTION4_Y = $omy_pos;
                                            ?>
                                            <?php /* <div class="block84LText9 paddingRight2 floatRightTail marTopMin4 alignText alignChangeTail" style="font-size: <?php echo $fontSize4; ?>;border:0px solid;"> */ ?>
                                            <div class=" block84LText9 alignChangeTail block84LText9 element" onClick="this.contentEditable = 'true';" id="tailBcOption4" style="font-size: <?php echo $fontSize4; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                <?php
                                                $OPTION4 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue4, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                                ?>
                                            </div>
                                        </div>
                                        <div>
                                            <?php
                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption5'and omin_panel='$panel'"));
                                            $OPTION5_X = $omx_pos;
                                            $OPTION5_Y = $omy_pos;
                                            ?>
                                            <div class="block84LText9 element" id="tailBcOption5" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize5; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                <?php
                                                $OPTION5 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue5, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                                ?>
                                            </div>
                                            <?php
                                            parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption6'and omin_panel='$panel'"));
                                            $OPTION6_X = $omx_pos;
                                            $OPTION6_Y = $omy_pos;
                                            ?>
                                            <div class="block84LText9 element" id="tailBcOption6" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize6; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                                <?php
                                                $OPTION6 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue6, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption7'and omin_panel='$panel'"));
                                    $OPTION7_X = $omx_pos;
                                    $OPTION7_Y = $omy_pos;
                                    ?>
                                    <div class="block84LText9 element" id="tailBcOption7" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize7; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                        <?php
                                        $OPTION7 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue7, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                        ?>
                                    </div>
                                    <!---------  Start Code to add CONDITION in tail ONLY PRINT $tunch for PURITY options @Author: GAUR01JUNE16 -------->
                                    <?php
                                    parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption8'and omin_panel='$panel'"));
                                    $OPTION8_X = $omx_pos;
                                    $OPTION8_Y = $omy_pos;
                                    ?>
                                    <div class="block84LText9 element" id="tailBcOption8" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize8; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                        <?php
                                        $OPTION8 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue8, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                        if (strpos($OPTION8, '|') !== false) {
                                            $OPTION8Arr = explode("|", $OPTION8);
                                        }
                                        for ($arri = 0; $arri < count($OPTION8Arr) - 1; $arri++) {
                                            if ($arri == 0)
                                                $OPTION8_Var = "OPTION8";
                                            else
                                                $OPTION8_Var = "OPTIONS" . "$arri";
                                            $$OPTION8_Var = $OPTION8Arr[$arri];
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <?php
                                        parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption9'and omin_panel='$panel'"));
                                        $OPTION9_X = $omx_pos;
                                        $OPTION9_Y = $omy_pos;
                                        ?>
                                        <div class="block84LText9 element" id="tailBcOption9" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize9; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                            <?php
                                            $OPTION9 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue9, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                            ?>
                                        </div>
                                    </div>
                                    <div>
                                        <?php
                                        parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption10'and omin_panel='$panel'"));
                                        $OPTION10_X = $omx_pos;
                                        $OPTION10_Y = $omy_pos;
                                        ?>
                                        <div class="block84LText9 element" id="tailBcOption10" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize9; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                            <?php
                                            $OPTION10 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue10, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                            if (strpos($OPTION10, '|') !== false) {
                                                $OPTION10Arr = explode("|", $OPTION10);
                                            }
                                            for ($arri = 0; $arri < count($OPTION10Arr) - 1; $arri++) {
                                                if ($arri == 0)
                                                    $OPTION10_Var = "OPTION10";
                                                else
                                                    $OPTION10_Var = "OPTION_A" . "$arri";
                                                $$OPTION10_Var = $OPTION10Arr[$arri];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!--START CODE FOR ADD OPTION11 @AUTHOR SIMRAN-20JUNE2022-->
                                    <div>
                                        <?php
                                        parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption11'and omin_panel='$panel'"));
                                        $OPTION11_X = $omx_pos;
                                        $OPTION11_Y = $omy_pos;
                                        ?>
                                        <div class="block84LText9 element" id="tailBcOption11" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize8; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                            <?php
                                            $OPTION11 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue11, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                            if (strpos($OPTION11, '|') !== false) {
                                                $OPTION11Arr = explode("|", $OPTION11);
                                            }
                                            for ($arri = 0; $arri < count($OPTION11Arr) - 1; $arri++) {
                                                if ($arri == 0)
                                                    $OPTION11_Var = "OPTION11";
                                                else
                                                    $OPTION11_Var = "OPTION_B" . "$arri";
                                                $$OPTION11_Var = $OPTION11Arr[$arri];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!--END CODE FOR ADD OPTION11 @AUTHOR SIMRAN-20JUNE2022-->
                                    <div>
                                        <?php
                                        parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailBcOption12'and omin_panel='$panel'"));
                                        $OPTION12_X = $omx_pos;
                                        $OPTION12_Y = $omy_pos;
                                        ?>
                                        <div class="block84LText9 element" id="tailBcOption12" onClick="this.contentEditable = 'true';" style="font-size: <?php echo $fontSize12; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                            <?php
                                            $OPTION12 = calltailSwitchbcCaseTail($omin_value, $bcmetaltype, $captionvalue12, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemLessWt, $bcItemLessWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice, $Suppliername, $UPriceWithTax, $FPriceWithTax, $itemMfgDate, $bcItemPriceCode, $totalLabNOthCharges, $bcItemCategory, $bcHallmarkUId, $bcItemPurRate, $bcItemPurRateType, $bcItemSellRate, $bcItemSellRateType, $otherChrg, $otherChrgType, $bcPurityCt, $stTotWt, $stType, $itemAddYear, $diaTotQty, $diaTotWt, $stTotAmt, $itemMetalRate, $counterName, $prodRFIDNo, $unitPriceByTwo, $unitPriceCode,$diaTotWtInGm,$priceCodeArr, $showUnit,$netWtAndVaWt, $bcUnitQTY, $itemfinalvaluation, $finalAmt,$stocDealPric,$stockFrnPric,$ItemPktWtAdd,$ItemPktWtLess);
                                            ?>
                                        </div>
                                    </div>
                                    <!---------END Code to add CONDITION in tail ONLY PRINT $tunch for PURITY options @Author: GAUR01JUNE16-------->
                                    <!-----------------------start code to add barcode size Author: GAUR09SEP16---------------------------->
                                    <?php parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'tailbcBarcode'and omin_panel='$panel'")); ?>
                                    <div class="block84LText9 element" id="tailbcBarcode" style="font-size: <?php echo $fontSize8; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                        <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=TAIL&bar_id=<?php
                                        $barCodeContent = $bcItemPrefixId . $bcItemId;
                                        echo $barCodeContent;
                                        ?>" alt="Barcode" height="<?php echo $barcodeSize; ?>px" /><br>
                                    </div>
                                    <?php parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'rfidNo'and omin_panel='$panel'")); ?>
                                    <div class="block84LText9 element" id="tailbcBarcode" style="font-size: <?php echo $fontSize8; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
                                        <?php
                                        $rfidContent = $prodRFIDNo;
//                                        echo $rfidContent;
                                        ?>
                                    </div>
                                    <?php
                                    //parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option ='BarCodeNumber'and omin_panel='$panel'"));
                                    ?>
                                    <div id="BarCodeNumber" class="element" style="width:auto;cursor:pointer;border:0px solid;position:absolute;font-size:<?php echo $fontSize11; ?>;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;"> 
                                        <?php
                                        //calltailSwitchbcCaseTail($omin_value, $captionvalue11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $bcItemPrefixId, $bcItemId);
                                        ?>
                                    </div>
                                    <!-----------------------start code to add barcode size Author: GAUR09SEP16---------------------------->
                                </td>
                            </tr>
                        </table>
                        <?php if ($panel == "Items55x13BarCodePanel") { ?></div><?php } ?>
                </td>
            </tr>
        </table>
    </div>
    <?php if ($panel == "label") { ?></div><?php } ?>
<?php
// Inputs
parse_str(getTableValues("SELECT omly_value "
                . "FROM omlayout where omly_own_id='$sessionOwnerId' and omly_option='hostPrinter'"));
$hostPrinter = stripslashes($omly_value); // "\\LREARTHI7\ZDesignerGC420"; \LREARTHI7\ZDesignerGC420 store in db with single slash
$speedPrinter = 4;
$darknessPrint = 15;
$labelSize = array('96', '024');
$referencePoint = array(96, 0);
if ($bismark != 'NULL' && $bismark != '' && $bismark != 'FALSE')
    $bisOption = 'Y';
else
    $bisOption = 'N';
/**
  // START CODE TO SET FIXED PRICE INDICATOR FOR GETTING SPECIFIC PRN FILE @AUTHOR:MADHUREE-20MAY2021
 */
if ($sttr_fixed_price_status == 'TRUE') {
    $fixedPriceOption = 'Y';
} else {
    $fixedPriceOption = 'N';
}
/**
  // END CODE TO SET FIXED PRICE INDICATOR FOR GETTING SPECIFIC PRN FILE @AUTHOR:MADHUREE-20MAY2021
 */
//echo '$bisOption:' . $bisOption;
// $prnPrintOption = 'directPRNPrint';
// $OPTION1, $OPTION2, $OPTION3, $OPTION4, $OPTION5, $OPTION6, $OPTION7, $OPTION8, $OPTION9, $OPTION10, $OPTION11, $OPTION12, $barCodeContent, $bcItemQty
//
include 'omPrnPrint.php';
?>