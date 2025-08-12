<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 22DEC2023
 *
 * @FileName: omspnewItemReturnRight.php
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
//echo '$invoicePanel=='.$invoicePanel.'<br>';
//
if ($invoicePanel == 'sellInvLayA5') {

    $divIdClass = 'bodyClass';
    $rateTableWidth = '100%';
    $tableClass = 'sellInvA5-main-table';
    $imageClass = 'a5-logo-image';
    $colspan = '8';
    $itemIdWidth = '40px';
    $itemDescWidth = '55px';
    $gsWtWidth = '55px';
    $ntWtWidth = '55px';
    $rateWidth = '40px';
    $valWidth = '65px';
    $labourWidth = '50px';
    $amtWidth = '86px';
    $balanceTopBorder = '';
    $itemNameSubstr = '6';
    $balanceInWordsFs = 'fs_14';
    $firmHeader = 'fs_22';
    $firmLongName = 'fs_20';
    $firmDesc = 'fs_16';
    $firmAddress = 'fs_14';
    $addressSubStr = '45';
    $fontSize = 'fs_13';
    $textAreaWidth = '400px';
    $wd = 600;
    $totalWidth = '60px';
    $rawPurityTitle = 'PR';
    $rawRateTitle = 'RT';
    $goldShort = 'GD';
    $silverShort = 'SR';
    $rawTitle = 'RAW';
    $custAddress = '300px';
    $finalamtwidth = '50%';
} else {
    $divIdClass = 'A4-size';
    $tableClass = 'A4-Inv-Table';
    $colspan = '14';
    $imageClass = 'form8-logo-image';
    $balanceTopBorder = '';
    $itemNameSubstr = '6';
    $balanceInWordsFs = 'fs_14';
    $firmHeader = 'fs_22';
    $firmLongName = 'fs_20';
    $firmDesc = 'fs_16';
    $firmAddress = 'fs_14';
    $addressSubStr = '45';
    $fontSize = 'fs_13';
    $textAreaWidth = '790px';
    $wd = 860;
    $totalWidth = '90px';
    $rawPurityTitle = 'PURITY';
    $rawRateTitle = 'RATE';
    $goldShort = 'GOLD';
    $silverShort = 'SILVER';
    $rawTitle = 'RAW';
    $custAddress = '300px';
    $finalamtwidth = '50%';
}
//
//$fieldName = 'topMargin';
//parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$topMargin = $topMargin_content;
$bottomMargin = $bottomMargin_content;
//$label_field_content = '';
//$fieldName = 'leftMargin';
//parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$leftMargin = $leftMargin_content;

//$fieldName = 'formBorderSize';
//$label_field_content = '';
//parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$formBorder = explode("#", $formBorderSize_content);
$formBorderSize = $formBorder[0];
$formBorderColor = $formBorder[1];

//$fieldName = 'formWidth';
//$label_field_content = '';
//parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$formWidth = $formWidth_content;
//$showSecPagePrint = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'showSecPagePrint'";
//$resShowSecPagePrint = mysqli_query($conn, $showSecPagePrint);
//$rowShowSecPagePrint = mysqli_fetch_array($resShowSecPagePrint);
$showSecPagePrint = $getLayoutDetails['showSecPagePrint'];
//
//$showHeaderBorderQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'showHeaderBorder'";
//$resShowHeaderBorder = mysqli_query($conn, $showHeaderBorderQuery);
//$rowResShowHeaderBorder = mysqli_fetch_array($resShowHeaderBorder);
$showHeaderBorder = $getLayoutDetails['showHeaderBorder'];
//
if($formWidth == '' || $formWidth == NULL){
    $formWidth= '200';
}else{
    $formWidth = $formWidth;
}
?>
<?php if ($showSecPagePrint == 'YES') { ?>
<style>
 @page {
     margin-top: <?php echo $topMargin; ?>mm;
     margin-bottom: <?php echo $bottomMargin; ?>mm;
     margin-left: <?php echo $leftMargin; ?>mm;
}
</style>
<table id="<?php echo $tableClass; ?>" class="invoicecenter"
       style="width:<?php echo $formWidth . 'mm';?>; border: <?php echo $formBorderSize; ?>px solid #<?php echo $formBorderColor; ?>; ">
<?php } else { ?>
      <table id="<?php echo $tableClass; ?>" class="invoicecenter"
       style="width:<?php echo $formWidth . 'mm';?>;margin-top: <?php echo $topMargin ?>mm; margin-left: <?php echo $leftMargin; ?>mm; border: <?php echo $formBorderSize; ?>px solid #<?php echo $formBorderColor; ?>;">
<?php } ?>
            <?php
            if ($showHeaderBorder == 'YES' || $showHeaderBorder == '' || $showHeaderBorder == 'NULL') {
                include 'omspinvItemReturnheader.php';
            }
            include 'omspinvnewItemReturnheader.php';
            ?>
            <?php
            include 'omspNewItemReturnPrdDet.php';
            ?>
        </table>