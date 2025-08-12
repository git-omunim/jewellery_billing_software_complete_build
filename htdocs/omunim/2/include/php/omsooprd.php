<?php

/*
 * **************************************************************************************
 * @tutorial: Forms Layout ad File 
 * **************************************************************************************
 * 
 * Created on Jun 24, 2013 6:31:51 PM
 *
 * @FileName: omsopad.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
?>
<?php

$fieldName = $_GET['fieldName'];
$value = $_GET['value'];
$sessionOwnerId = $_SESSION['sessionOwnerId'];

$selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = '$fieldName'";
$resFormsLayoutDet = mysqli_query($conn,$selFormsLayoutDet);
$rowFormsLayoutDet = mysqli_num_rows($resFormsLayoutDet);
 
if ($rowFormsLayoutDet == 0) {
   $query = "INSERT INTO omlayout(
		omly_own_id,omly_option,omly_value)
                VALUES(
		'$sessionOwnerId','$fieldName','$value')";
//  echo $query;
   if (!mysqli_query($conn,$query)) {
      die('Error: ' . mysqli_error($conn));
   }
   /*    * *******Start code to add sys_log api************* */
   $sslg_trans_sub = om_ucfirst($fieldName) . ' OPTION CHANGED';
   $sslg_trans_comment = om_ucfirst($fieldName) . ' - ' . $value . ' OPTION CHANGED';
   include 'omslgapi.php';
   /*    * *******End code to add sys_log api *********** */
} else {
   $query = "UPDATE omlayout SET
     omly_value = '$value'
    WHERE omly_own_id = '$sessionOwnerId' and omly_option = '$fieldName'";
//     echo $query;
   if (!mysqli_query($conn,$query)) {
      die('Error: ' . mysqli_error($conn));
   }
   /*    * *******Start code to add sys_log api *********** */
   $sslg_trans_sub = om_ucfirst($fieldName) . ' OPTION UPDATED';
   $sslg_trans_comment = om_ucfirst($fieldName) . ' - ' . $value . ' OPTION UPDATED';
   include 'omslgapi.php';
   /*    * *******End code to add sys_log api ***************** */
}

//echo '$fieldName'.$fieldName;
//echo '$value'.$value;

/* * *******START TO ADD CODE TO NAVIGATE CORRECTLY  ******************** */
//echo 'Session:'.$_SESSION['sessionProdOMUNIM'];exit();
if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
   header("Location: $documentRoot/omHomePage.php?divPanel=OwnerHome");
//    header("Location: $documentRoot/omHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel');
        } else {
   $showMess = 'Your session has expired. Please log in again!!';
   //$showMess = 'Your product expired for update, Please renew your product or dongle!<br/>आपके उत्पाद को अपडेट करने की सीमा समाप्त हो गयी है, कृपया अपना उत्पाद या डोंगल रिन्यू कीजिए!';
   header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
   //include 'omppsbdv.php';
   exit;
}
/* * *******End TO ADD CODE TO NAVIGATE CORRECTLY ******************* */
?>