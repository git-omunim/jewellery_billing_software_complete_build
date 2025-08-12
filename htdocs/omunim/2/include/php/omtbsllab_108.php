<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 3 Jan, 2020 2:47:05 PM
 *
 * @FileName: omtbsllab_108.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
require_once 'system/omssopin.php';

$qSel = "SELECT label_field_name FROM labels where label_own_id='$_SESSION[sessionOwnerId]' and label_field_name = 'otherInfo'";
$res = mysqli_query($conn, $qSel);
$row = mysqli_num_rows($res);
$labelType = 'SellPurchase';
if ($row == 0) {
    $qInsert = "INSERT INTO LABELS
            (label_own_id, label_type, label_field_name, label_field_content,label_field_font_size,label_field_font_color,label_field_check) VALUES
            ('$_SESSION[sessionOwnerId]','$labelType','otherInfo','','14','black','true'),
            ('$_SESSION[sessionOwnerId]','$labelType','otherInfoLb','OTHER INFO','14','black','true'),
            ('$_SESSION[sessionOwnerId]','$labelType','totalAmtBeforeDisc','','14','black','true'),
            ('$_SESSION[sessionOwnerId]','$labelType','totalAmtBeforeDiscLb','TOT AMT BEFORE DISC','14','black','true'),
            ('$_SESSION[sessionOwnerId]','$labelType','totalDiscount','','14','black','true'),
            ('$_SESSION[sessionOwnerId]','$labelType','totalDiscountLb','TOTAL DISC AMT','14','black','true')";
    if (!mysqli_query($conn, $qInsert)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>