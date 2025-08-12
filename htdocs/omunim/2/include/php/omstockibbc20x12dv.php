<?php
/*
 * **************************************************************************************
 * @tutorial:
 * **************************************************************************************
 * 
 * Created on Feb 9, 2018
 *
 * @FileName: omstockibbc20x12dv.php
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

<?php $oneMmToPxValue=3.7795275591; ?>

<table border="0"  class="bgcolor-label barcode_background_color_<?php echo $color; ?>">
 <?php
 parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption1' and omin_panel='$panelName'"));
// $omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);echo"<br>";
 //$omy_pos += (($slipHeight*$oneMmToPxValue)*($row-1));
?>
<div class="<?php
if ($checkfirstrow == 1) {
    echo element;
}
?> block84LText10" id="mulBcOption1" style="position:absolute;border:0px solid;font-size: <?php echo $fontSize1; ?>;cursor:pointer;width:auto;
     left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">

    <?php
    callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
    ?>
</div>
<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption2' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>

<div id="mulBcOption2" class=" <?php
if ($checkfirstrow == 1) {
    echo element;
}
?> block84LText10 paddingLeft2  " style=" position:absolute;border:0px solid;font-size: <?php echo $fontSize2; ?>;
     cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
     <?php //echo $bcItemPreId;  ?><?php //echo $bcItemPostId;  ?> 
     <?php
     callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
     ?>
</div>
<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcBarcode' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div id="mulBcBarcode" class="<?php
if ($checkfirstrow == 1) {
    echo element;
}
?> block84LText10"  style="position:absolute;float:left;font-size:<?php echo $barcodeSize; ?>;border:0px solid;
     cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">




    <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=TAIL&bar_id=<?php echo $bcItemPrefixId . $bcItemId; ?>" alt="Barcode" height="<?php echo $barcodeSize; ?>px" />
</div>
<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption3' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div id="mulBcOption3" class=" <?php
if ($checkfirstrow == 1) {
echo element;
}
?> block84LText9  paddingRight2 paddingLeft2"  style="position:absolute;float:right;font-size: <?php echo $fontSize3; ?>;border:0px solid;
 cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">
 <?php //echo $bcItemName;  ?>
 <?php
 callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
 ?>
</div>
    <?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption4' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div id="mulBcOption4" class=" <?php
if ($checkfirstrow == 1) {
    echo element;
}
?> block84LText10" style="position:absolute;float:left;font-size: <?php echo $fontSize4; ?>;border:0px solid;width:auto;
     cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">

    <?php //echo $bcItemWt;   ?><?php //echo ' ' . $bcItemWtType;   ?> 
    <?php
    callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
    ?>

</div>
<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption5' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div  id="mulBcOption5" class=" <?php
if ($checkfirstrow == 1) {
    echo element;
}
?> block84LText10" style="position:absolute;float:right;font-size: <?php echo $fontSize5; ?>;border:0px solid;width:auto;
      cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">

    <?php //echo $bcItemWt;  ?><?php //echo ' ' . $bcItemWtType;  ?> 
    <?php
    callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
    ?>

</div>
<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption6' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div id="mulBcOption6" class=" <?php
if ($checkfirstrow == 1) {
    echo element;
}
?> block84LText10 "  style="position:absolute;float:left;font-size: <?php echo $fontSize6; ?>;border:0px solid;
     cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">

    <?php //echo $bcItemNtWt;  ?><?php //echo ' ' . $bcItemNtWtType;  ?> 
    <?php
    callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
    ?>

</div>
<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption7' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div id="mulBcOption7" class=" <?php
if ($checkfirstrow == 1) {
echo element;
}
?> block84LText10"  style="position:absolute;float:right;font-size: <?php echo $fontSize7; ?>;border:0px solid;
 cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">

<?php //echo $bcItemNtWt;  ?><?php //echo ' ' . $bcItemNtWtType;  ?> 
<?php
callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
?>

</div>
<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption8' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div id="mulBcOption8" class=" <?php
if ($checkfirstrow == 1) {
echo element;
}
?> block84LText10"  style="position:absolute;float:right;font-size: <?php echo $fontSize8; ?>;border:0px solid;
cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">

<?php //echo $bcItemNtWt;   ?><?php //echo ' ' . $bcItemNtWtType;   ?> 
<?php
callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
?>

</div>
<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption9' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div id="mulBcOption9" class=" <?php
if ($checkfirstrow == 1) {
echo element;
}
?> block84LText10"  style="position:absolute;float:right;font-size: <?php echo $fontSize9; ?>;border:0px solid;
cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">

<?php //echo $bcItemNtWt;   ?><?php //echo ' ' . $bcItemNtWtType;   ?> 
<?php
callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
?>

</div>

<?php
parse_str(getTableValues("SELECT omin_value,omx_pos,omy_pos FROM omindicators where omin_option = 'mulBcOption10' and omin_panel='$panelName'"));
//$omx_pos += ($slipWidth*$oneMmToPxValue)*($col-1);
//$omy_pos += ($slipHeight*$oneMmToPxValue)*($row-1);
?>
<div id="mulBcOption10" class=" <?php
if ($checkfirstrow == 1) {
    echo element;
}
?> block84LText10"  style="position:absolute;float:right;font-size: <?php echo $fontSize10; ?>;border:0px solid;
     cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;">

    <?php //echo $bcItemNtWt;    ?><?php //echo ' ' . $bcItemNtWtType;    ?> 
    <?php
    callImiSwitchCaseMu($omin_value, $bcmetaltype, $captionvalue1, $bcItemPreId, $bcItemPostId, $bcItemName, $bcItemWt, $bcItemWtType, $bcItemNtWt, $bcItemNtWtType, $bcItemMkChrg, $bcItemMkChrgType, $cryValuation, $firmNameLabel, $bcItemCryNtWt, $bcItemCryNtWtType, $bcItemCustPri, $fatherOrSpouseName, $custMobile, $girviGoldItems, $girviSilverItems, $girviOtherItems, $girviOtherInfo, $tunch, $barCodeText, $bcItemPktWt, $bcItemPktWtType, $bcItemCustCode, $bcItemCustCodeNum, $bcItemDate, $bcItemModelNo, $bcItemSize, $imgId, $newItemColor, $itemshape, $documentRootBSlash, $bcItemCrystal, $bcItemPrefixId, $bcItemId, $valadd, $valaddwt, $itemfnwt, $itemFFNWT, $valaddamt, $bcItemQty, $Finalprice, $UintPrice);
    ?>

                </div>
</table><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

