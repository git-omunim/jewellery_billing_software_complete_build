<?php

/*
 * **************************************************************************************
 * @tutorial: Labels
 * **************************************************************************************
 * 
 * Created on Dec 22, 2016
 *
 * @FileName: omtbplab.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

if ($ownerId == '') {
    $ownerId = $dgGUId;
}
if ($ownerId == '') {
    $ownerId = $_SESSION['sessionOwnerId'];
}
if ($ownerId == '') {
    $ownerId = $_SESSION['sessiondgGUId'];
}

$qMetalPurDetailse = "SELECT label_field_name FROM labels WHERE label_type = 'MetalPurchase'";
$resMetalPurDetailse = mysqli_query($conn,$qMetalPurDetailse) or die(mysqli_error($conn));
$totalPurCounter = mysqli_num_rows($resMetalPurDetailse);
$rowMetalPurDetails = mysqli_fetch_array($resMetalPurDetailse);
if ($totalPurCounter <= 0) {

    $labelType = 'MetalPurchase';
    $query = "INSERT INTO labels(    
           label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check)
           VALUES
           ('$ownerId', '$labelType', 'firmPurFormHeader', '', '22', 'blue', 'true'),"
            . "('$ownerId', '$labelType', 'firmPurLongName', '', '20', 'brightBlue', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurDesc', '', '16', 'blue', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurRegNoLabel', 'FIRM REGISTRATION NUMBER', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurRegNo', '', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurAddress', '', '16', 'lightBlue', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurPhone', 'PHONE', '14', 'lightBlue', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurEmail', 'EMAIL', '14', 'lightBlue', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurLeftLogoCheck', '', '', '', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurRightLogoCheck', '', '', '', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurTinLb', 'TIN', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurTin', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurPanLb', 'PAN', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'firmPurPan', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'userPurNameLb', 'NAME', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'userPurName', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'userPurAddressLb', 'ADDRESS', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'userPurAddress', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'userPurContactLb', 'PHONE', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'userPurContact', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'invPurNoTitleLb', 'INVOICE NO', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'invPurNoTitle', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'datePurTitleLb', 'DATE', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'datePurTitle', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'invPurTitle', 'CASH INVOICE', '14', 'blue', 'true'), "
            . "('$ownerId', '$labelType', 'itemPurIdLb', 'IT ID', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'designPurLb', 'DESIGN', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'itemPurDescLb', 'DESC', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'itemPurGsWtLb', 'GS WT', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'itemPurNtWtLb', 'NT WT', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'valPurAddedLb', 'VA WT', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'metalPurRateLb', 'RATE', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'labourPurLb', 'LABOUR', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'valPurLb', 'VAL', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'taxPurLb', 'TAX', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'valPurAddedAmtLb', 'VAL ADD', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'amtPurLb', 'AMOUNT', '14', 'white', 'true'), "
            . "('$ownerId', '$labelType', 'itemPurId', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'designPur', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'itemPurDesc', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'itemPurGsWt', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'itemPurNtWt', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'valPurAdded', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'metalPurRate', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'labourPur', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'valPur', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'taxPur', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'valPurAddedAmt', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'amtPur', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'totalPurLb', 'TOTAL', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'totalPur', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'metalPurRecLb', 'METAL RECEIVED', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'metalPurRec', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'cashPurPaidLb', 'CASH PAID', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'cashPurPaid', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'discPurLb', 'DISCOUNT', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'discPur', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'totalPurBalLb', 'TOTAL BAL', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'totalPurBal', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'finPurBalLb', 'TOTAL', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'finPurBal', '', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'tncPurLb', 'Terms and Conditions', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'tncPur', 'All disputes are subject to the jurisdiction of the competent courts in Delhi.', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'authPurSignLb', 'Authorized Signatory', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'footerPur', 'Thank You For Your Business!', '14', 'black', 'true'), "
            . "('$ownerId', '$labelType', 'slPrPurValueAddedOp', 'byAmount', '', '', 'true'), "
            . "('$ownerId', '$labelType', 'udhaarPurEMI', '', '14', 'black', 'true'), "  //added @Author:SHRI10JUN15
            . "('$ownerId', '$labelType', 'udhaarPurEMILb', 'TOT UDHAAR EMI AMT', '14', 'black', 'true'), " //added @Author:SHRI10JUN15
            . "('$ownerId', '$labelType', 'rawMetalPurWt', 'METAL', '14', 'black', 'true'), "//added @Author:SHRI07AUG15 ,modified @Author:SHRI30JAN17
            . "('$ownerId', '$labelType', 'rawPurMetalTnch', 'TUNCH', '14', 'black', 'true'), "//added @Author:SHRI07AUG15
            . "('$ownerId', '$labelType', 'rawPurMetalFnWt', 'FN WT', '14', 'black', 'true'), "//added @Author:SHRI07AUG15
            . "('$ownerId', '$labelType', 'rawPurMetalRt', 'RATE', '14', 'black', 'true')";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    //To check new columns added into table or not 
//include 'ommptbauprdwrfl.php';
}
?>