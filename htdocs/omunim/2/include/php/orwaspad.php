<?php

/*
 * **************************************************************************************
 * @tutorial: Add New Money Lender
 * **************************************************************************************
 *
 * Created on 2 Dec, 2012 11:13:52 AM
 *
 * @FileName: ogwaspad.php
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

//Changes in file @AUTHOR: SANDY14JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
?>
<?php

// Start Code to Check Demo Mode
//-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
$qSelSuppCount = "SELECT user_id FROM user where user_status !='Deleted'"; //supp_status added @Author:PRIYA02JUL13
$resSuppCount = mysqli_query($conn,$qSelSuppCount);
$totalSupp = mysqli_num_rows($resSuppCount);

if ($_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO && $totalSupp >= 1) {
    $message = "In Demo, You can not add more than one supplier!";
    header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=False&message=' . $message);
} else if ($_SESSION['sessionDongleStatus'] != NULL &&
        (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO && $totalSupp < 1) ||
        ($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO && $_SESSION['sessionDongleStatus'] == $gbDongleRegStatus))) {
// End Code to Check Demo Mode    
//$panelDivName = trim($_POST['panelDivName']);
    $suppOwnerId = $_SESSION['sessionOwnerId'];
    $suppImageLoadOption = trim($_POST['suppImageLoadOption']);
    $suppType = trim($_POST['supplierType']);
    //Start Code To Check Supp Pre Id @Author:PRIYA17AUG13
    $suppPreIdNum = om_strtoupper(trim($_POST['suppPreIdNum']));
    $suppPreId = substr($suppPreIdNum, 0, 1);
    if ($suppPreId != 'W') {
        $suppPreIdNum = 'W' . $suppPreIdNum;
    }
    //End Code To Check Supp Pre Id @Author:PRIYA17AUG13
    $suppIdNum = trim($_POST['suppIdNum']);
    $mlId = trim($_POST['mlId']);
    $suppAccount = trim($_POST['accMainAccountId']);                   //PRIYA23
    $suppShopName = trim($_POST['suppShopName']);
    $suppFirstName = trim($_POST['firstName']);
    $suppLastName = trim($_POST['lastName']);
    $suppFatherOrSpouseName = trim($_POST['fatherOrSpouseNameIndicator']) . trim($_POST['fatherOrSpouseName']);         //PRIYA27
    $suppFirmId = trim($_POST['firmId']);

//If Supplier does not enter the DOB
    if ($_POST['DOBMonth'] == 'NotSelected' || $_POST['DOBDay'] == 'NotSelected' || $_POST['DOBYear'] == 'NotSelected') {
        $suppDOB = 'N/A';
    } else {
        $suppDOB = $_POST['DOBMonth'] . ' ' . $_POST['DOBDay'] . ' ' . $_POST['DOBYear'];
    }

//Start code for opening balance of supplier or money lender @AUTHOR: SANDY13NOV13
    //If Supplier does not enter the DOB
    if ($_POST['addSuppDOBMonth'] == 'NotSelected' || $_POST['addSuppDOBDay'] == 'NotSelected' || $_POST['addSuppDOBYear'] == 'NotSelected') {
        $openingBalDt = 'N/A';
    } else {
        $openingBalDt = $_POST['addSuppDOBMonth'] . ' ' . $_POST['addSuppDOBDay'] . ' ' . $_POST['addSuppDOBYear'];
    }
    //End code for opening balance of supplier or money lender @AUTHOR: SANDY13NOV13
    $suppPANNO = trim($_POST['suppPANNO']);
    $suppTAXNO = trim($_POST['suppSalesTaxNo']);
    $suppCSTNO = trim($_POST['suppCSTNo']);
    $suppQualification = $_POST[qualification];
    $suppSex = $_POST[sex];
    $suppAddress = trim($_POST['suppaddress1']);
    $suppCity = trim($_POST['city']);
    $suppPin = trim($_POST['pinCode']);
    $suppState = trim($_POST['state']);
    $suppCountry = $_POST[country];
    $suppPhoneNo = $_POST[phoneNo];
    $suppMobileNo = $_POST[suppMobileNo];
    $suppEmailId = trim($_POST['suppEmailId']);
    $suppReference = trim($_POST['suppReference']);
    $suppCashBal = trim($_POST['cashBalance']);
    $suppCashBalCrDr = trim($_POST['suppCashBalCrDr']);
    $suppGoldWeightBal = trim($_POST['suppGoldWeightBal']);
    $suppGoldWeightGM = trim($_POST['suppGoldWeightType']);
    $suppGoldWeightCrDr = trim($_POST['suppGoldWeightCrDr']);
    $suppSilverWeightBal = trim($_POST['suppSilverWeightBal']);
    $suppSilverWeightBalGM = trim($_POST['suppSilverWeightBalGM']);
    $suppSilverWeightBalCrDr = trim($_POST['suppSilverWeightBalCrDr']);
    $action = trim($_POST['subButton']);
    $suppPriority = 'New Supplier';
    $suppStatus = 'Active';
    $suppLoyalPoints = '0';
    $suppUniqueCode = trim($_POST['suppUniqueCode']); //@AUTHOR: SANDY28NOV13
    $suppOtherInfo = trim($_POST['suppOtherInfo']);

    if ($suppImageLoadOption != 'Webcam') {
        $filename = $_FILES['selectPhoto']['name'];
        $filetype = $_FILES['selectPhoto']['type'];
        $file_size = $_FILES['selectPhoto']['size'];
    } else {
        $filename = trim($_POST['fileName']);
        $filetype = 'image/jpeg';
        $file_size = '1';
    }


// Start To protect MySQL injection
    $suppType = stripslashes($suppType);
    $suppPreIdNum = stripslashes($suppPreIdNum);
    $suppIdNum = stripslashes($suppIdNum);
    $suppAccount = stripslashes($suppAccount);
    $suppShopName = stripslashes($suppShopName);
    $suppFirstName = stripslashes($suppFirstName);
    $suppLastName = stripslashes($suppLastName);
    $suppFatherOrSpouseName = stripslashes($suppFatherOrSpouseName);
    $suppFirmId = stripslashes($suppFirmId);
    $suppDOB = stripslashes($suppDOB);
    $suppQualification = stripslashes($suppQualification);
    $suppPANNO = stripslashes($suppPANNO);
    $suppTAXNO = stripslashes($suppTAXNO);
    $suppCSTNO = stripslashes($suppCSTNO);
    $suppSex = stripslashes($suppSex);
    $suppAddress = stripslashes($suppAddress);
    $suppCity = stripslashes($suppCity);
    $suppPin = stripslashes($suppPin);
    $suppState = stripslashes($suppState);
    $suppCountry = stripslashes($suppCountry);
    $suppPhoneNo = stripslashes($suppPhoneNo);
    $suppMobileNo = stripslashes($suppMobileNo);
    $suppEmailId = stripslashes($suppEmailId);
    $suppReference = stripslashes($suppReference);
    $suppPriority = stripslashes($suppPriority);
    $suppStatus = stripslashes($suppStatus);
    $suppLoyalPoints = stripslashes($suppLoyalPoints);
    $suppOtherInfo = stripslashes($suppOtherInfo);
    $suppCashBal = stripslashes($suppCashBal);
    $suppCashBalCrDr = stripslashes($suppCashBalCrDr);
    $suppGoldWeightBal = stripslashes($suppGoldWeightBal);
    $suppGoldWeightGM = stripslashes($suppGoldWeightGM);
    $suppGoldWeightCrDr = stripslashes($suppGoldWeightCrDr);
    $suppSilverWeightBal = stripslashes($suppSilverWeightBal);
    $suppSilverWeightBalGM = stripslashes($suppSilverWeightBalGM);
    $suppSilverWeightBalCrDr = stripslashes($suppSilverWeightBalCrDr);
    $suppUniqueCode = stripslashes($suppUniqueCode);
    $filename = stripslashes($filename);
    $filetype = stripslashes($filetype);
    $file_size = stripslashes($file_size);
    $snapThumb = stripslashes($file_size);


    $suppType = mysqli_real_escape_string($conn,$suppType);
    $suppPreIdNum = mysqli_real_escape_string($conn,$suppPreIdNum);
    $suppIdNum = mysqli_real_escape_string($conn,$suppIdNum);
    $suppAccount = mysqli_real_escape_string($conn,$suppAccount);
    $suppShopName = mysqli_real_escape_string($conn,$suppShopName);
    $suppFirstName = mysqli_real_escape_string($conn,$suppFirstName);
    $suppLastName = mysqli_real_escape_string($conn,$suppLastName);
    $suppFatherOrSpouseName = mysqli_real_escape_string($conn,$suppFatherOrSpouseName);
    $suppFirmId = mysqli_real_escape_string($conn,$suppFirmId);
    $suppDOB = mysqli_real_escape_string($conn,$suppDOB);
    $suppQualification = mysqli_real_escape_string($conn,$suppQualification);
    $suppPANNO = mysqli_real_escape_string($conn,$suppPANNO);
    $suppTAXNO = mysqli_real_escape_string($conn,$suppTAXNO);
    $suppCSTNO = mysqli_real_escape_string($conn,$suppCSTNO);
    $suppSex = mysqli_real_escape_string($conn,$suppSex);
    $suppAddress = mysqli_real_escape_string($conn,$suppAddress);
    $suppCity = mysqli_real_escape_string($conn,$suppCity);
    $suppPin = mysqli_real_escape_string($conn,$suppPin);
    $suppState = mysqli_real_escape_string($conn,$suppState);
    $suppCountry = mysqli_real_escape_string($conn,$suppCountry);
    $suppPhoneNo = mysqli_real_escape_string($conn,$suppPhoneNo);
    $suppMobileNo = mysqli_real_escape_string($conn,$suppMobileNo);
    $suppEmailId = mysqli_real_escape_string($conn,$suppEmailId);
    $suppReference = mysqli_real_escape_string($conn,$suppReference);
    $suppPriority = mysqli_real_escape_string($conn,$suppPriority);
    $suppStatus = mysqli_real_escape_string($conn,$suppStatus);
    $suppLoyalPoints = mysqli_real_escape_string($conn,$suppLoyalPoints);
    $suppOtherInfo = mysqli_real_escape_string($conn,$suppOtherInfo);
    $suppCashBal = mysqli_real_escape_string($conn,$suppCashBal);
    $suppCashBalCrDr = mysqli_real_escape_string($conn,$suppCashBalCrDr);
    $suppGoldWeightBal = mysqli_real_escape_string($conn,$suppGoldWeightBal);
    $suppGoldWeightGM = mysqli_real_escape_string($conn,$suppGoldWeightGM);
    $suppGoldWeightCrDr = mysqli_real_escape_string($conn,$suppGoldWeightCrDr);
    $suppSilverWeightBal = mysqli_real_escape_string($conn,$suppSilverWeightBal);
    $suppSilverWeightBalGM = mysqli_real_escape_string($conn,$suppSilverWeightBalGM);
    $suppSilverWeightBalCrDr = mysqli_real_escape_string($conn,$suppSilverWeightBalCrDr);
    $suppUniqueCode = mysqli_real_escape_string($conn,$suppUniqueCode);
    $filename = mysqli_real_escape_string($conn,$filename);
    $filetype = mysqli_real_escape_string($conn,$filetype);
    $file_size = mysqli_real_escape_string($conn,$file_size);
    $snapThumb = mysqli_real_escape_string($conn,$file_size);
// End To protect MySQL injection
//CHECK FOR UNIQUE ID 
    $selCode = "SELECT * FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' AND user_unique_code='$suppUniqueCode'";
    $resSelCode = mysqli_query($conn,$selCode);
    $numOfRows = mysqli_num_rows($resSelCode);

    if ($numOfRows > 0 && $action == 'Submit') {
        echo 'Ml Id already exist ! Please enter unique id!!';
        exit(0);
    } else if ($suppOwnerId == '' or $suppOwnerId == NULL or $suppType == '' or $suppType == NULL or
            $suppAccount == '' or $suppAccount == NULL or $suppIdNum == '' or $suppIdNum == NULL or
            $suppFirstName == '' or $suppFirstName == NULL or $suppCity == '' or $suppCity == NULL or
            $suppState == '' or $suppState == NULL or $suppCountry == '' or $suppCountry == NULL or
            $suppFirmId == '' or $suppFirmId == NULL) {
        header("Location: " . $documentRoot . "/include/php/ommperrp.php");
    } else {
        if ($filename == '' || $filename == NULL || $file_size == 0 || $file_size == NULL) {

            $file_size_in_MB = 0;
            $snapFile = NULL;
            $snapThumb = NULL;
        } else {

            if ($suppImageLoadOption != 'Webcam') {
                $file_size_in_MB = $file_size / (1024 * 1024);
                $snapFile = addslashes(fread(fopen($_FILES['selectPhoto']['tmp_name'], "r"), filesize($_FILES['selectPhoto']['tmp_name'])));
                $uploadedfile = $_FILES['selectPhoto']['tmp_name'];
            } else {
                $snapFile = addslashes(fread(fopen($filename, "r"), filesize($filename)));
                $file_size_in_MB = filesize($filename) / (1024 * 1024);
                $uploadedfile = $filename;
            }

            //Start Code to generate Thumb


            function getExtension($str) {

                $i = strrpos($str, ".");
                if (!$i) {
                    return "";
                }
                $l = strlen($str) - $i;
                $ext = substr($str, $i + 1, $l);
                return $ext;
            }

            $extension = getExtension($filename);
            $extension = strtolower($extension);

            if ($extension == "jpg" || $extension == "jpeg") {
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($extension == "png") {
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }

            list($width, $height) = getimagesize($uploadedfile);

            $newwidth = 128;
            $newheight = ($height / $width) * $newwidth;
            $snapThumb = imagecreatetruecolor($newwidth, $newheight);

            imagecopyresampled($snapThumb, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

            ob_start(); // Start capturing stdout.
            imagejpeg($snapThumb, NULL, 100); // As though output to browser.
            $snapThumb = ob_get_contents(); // the raw jpeg image data.
            ob_end_clean(); // Dump the stdout so it does not screw other output.

            $snapThumb = addslashes($snapThumb);
        }

        $qSelCity = "SELECT city_name FROM city where city_own_id='$suppOwnerId' and city_name='$suppCity'";
        $resCity = mysqli_query($conn,$qSelCity);
        $cityAvailableCount = mysqli_num_rows($resCity);
        if ($cityAvailableCount <= 0) {
            $queryCity = "INSERT INTO city (
		city_own_id, city_name,
		city_upd_sts, city_ent_dat) 
		VALUES (
		'$suppOwnerId','$suppCity',
		'Supplier',$currentDateTime)";

            if (!mysqli_query($conn,$queryCity)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //IF PANEL IS UPDATE EXECUTE UPDTATE QUERY @AUTHOR: SANDY18DEC13
        if ($action == 'Update') {
            //change in code @AUTHOR: SANDY08FEB14
 //-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                             
            if ($snapFile == NULL || $snapFile == '' || $file_size == '0') {
                                  $upQuery = "UPDATE user SET 
	user_owner_id='$suppOwnerId',user_pid = '$suppPreIdNum',user_uid='$suppIdNum',user_acc_id='$suppAccount',user_firm_id= '$suppFirmId',user_shop_name='$suppShopName',user_category='$suppType',	
	user_unique_code='$suppUniqueCode',user_fname='$suppFirstName',user_lname='$suppLastName',user_father_name='$suppFatherOrSpouseName', 	
	user_DOB='$suppDOB',user_sex='$suppSex',user_qualification='$suppQualification',
	user_add='$suppAddress',user_city='$suppCity',user_pincode='$suppPin', 	
	user_state='$suppState',user_country='$suppCountry', 	
	user_phone='$suppPhoneNo',user_mobile='$suppMobileNo',user_email='$suppEmailId',
        user_pan_it_no='$suppPANNO', user_sale_tax_no='$suppTAXNO',user_cst_no='$suppCSTNO',user_comm_upd_date='$openingBalDt',
        user_cash_balance='$suppCashBal',user_gd_gs_wt='$suppCashBalCrDr',user_gd_gs_wt_type='$suppGoldWeightBal',
        user_gd_nt_wt='$suppGoldWeightGM',user_gd_nt_wt_type='$suppGoldWeightCrDr',user_gd_fn_wt='$suppSilverWeightBal',
        user_gd_fn_wt_type='$suppSilverWeightBalGM',user_gd_ffn_wt='$suppSilverWeightBalCrDr',
	user_reference='$suppReference',		
	user_priority='$suppPriority',user_status='$suppStatus',user_loyal_points='$suppLoyalPoints',	
	user_other_info='$suppOtherInfo'
	WHERE user_owner_id = '$suppOwnerId' and user_id = '$mlId'";
                    if (!mysqli_query($conn,$upQuery)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                } else {
                    $upQuery = "UPDATE user SET 
	user_owner_id='$suppOwnerId',user_pid = '$suppPreIdNum',user_uid='$suppIdNum',user_acc_id='$suppAccount',user_firm_id= '$suppFirmId',user_shop_name='$suppShopName',user_category='$suppType',	
	user_unique_code='$suppUniqueCode',user_fname='$suppFirstName',user_lname='$suppLastName',user_father_name='$suppFatherOrSpouseName', 	
	user_DOB='$suppDOB',user_sex='$suppSex',user_qualification='$suppQualification',
	user_add='$suppAddress',user_city='$suppCity',user_pincode='$suppPin', 	
	user_state='$suppState',user_country='$suppCountry', 	
	user_phone='$suppPhoneNo',user_mobile='$suppMobileNo',user_email='$suppEmailId',
        user_pan_it_no='$suppPANNO', user_sale_tax_no='$suppTAXNO',user_cst_no='$suppCSTNO',user_comm_upd_date='$openingBalDt',
        user_cash_balance='$suppCashBal',user_gd_gs_wt='$suppCashBalCrDr',user_gd_gs_wt_type='$suppGoldWeightBal',
        user_gd_nt_wt='$suppGoldWeightGM',user_gd_nt_wt_type='$suppGoldWeightCrDr',user_gd_fn_wt='$suppSilverWeightBal',
        user_gd_fn_wt_type='$suppSilverWeightBalGM',user_gd_ffn_wt='$suppSilverWeightBalCrDr',
	user_reference='$suppReference',		
	user_priority='$suppPriority',user_status='$suppStatus',user_loyal_points='$suppLoyalPoints',	
		
	user_other_info='$suppOtherInfo'
	WHERE user_owner_id = '$suppOwnerId' and user_id = '$mlId'";
                    if (!mysqli_query($conn,$upQuery)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
                /*                 * *******Start code to add sys_log api @Author:SANT04JAN16******************** */
                $sslg_trans_sub = 'MONEYLENDER UPDATED';
                $sslg_trans_comment = $suppFirstName . ' ' . substr($suppFatherOrSpouseName, 1) . ' ' . $suppLastName . ' MONEYLENDER UPDATED';
                $sslg_firm_id = $suppFirmId;
                $custId = $mlId;
                include 'omslgapi.php';
                /*                 * *******$sslg_trans_subEnd code to add sys_log api @Author:SANT04JAN16******************** */

                /*                 * *******Start code to add code to update udhaar cust details in table @Author:PRIYA05NOV14********* */
                $select = "SELECT ml_id FROM ml_loan where ml_own_id = '$suppOwnerId' and ml_lender_id = '$mlId'";
                $result = mysqli_query($conn,$select);
                $rows = mysqli_num_rows($result);
                if ($rows > 0) {
                    $updQuery = "UPDATE ml_loan SET ml_lender_fname= '$suppFirstName', ml_lender_lname = '$suppLastName',"
                            . "ml_lender_Address = '$suppAddress',ml_lender_city = '$suppCity'"
                            . "WHERE ml_own_id = '$suppOwnerId' and ml_lender_id = '$mlId'";
                    if (!mysqli_query($conn,$updQuery)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
                /*                 * *******End code to add code to update udhaar cust details in table @Author:PRIYA05NOV14********* */
            } else if ($action == 'Delete') {
                include 'ormldelt.php';
                exit(0);
            } else {
//change in query to add supp_unique_code field and its value @AUTHOR: SANT04JAN16 
                $query = "INSERT INTO user(
	user_owner_id,user_firm_id,user_type,user_category,user_pid,user_uid,
	user_fname,user_lname,user_father_name, 	
	user_DOB,user_sex,user_qualification,
	user_add,user_city,user_pincode, 	
	user_state,user_country, 	
	user_phone,user_mobile,user_email,
        user_since,user_reference, 		
	user_priority,user_status,user_loyal_points,	
	user_other_info,user_shop_name,
        user_pan_it_no, user_sale_tax_no,user_cst_no,user_unique_code,user_acc_id,
        user_comm_upd_date,user_cash_balance,
        user_gd_gs_wt, user_gd_gs_wt_type,user_gd_nt_wt,user_gd_nt_wt_type,user_gd_fn_wt,user_gd_fn_wt_type,user_gd_ffn_wt,user_image_status)
	VALUES (
	'$suppOwnerId','$suppFirmId','$user1_type','$suppType','$suppPreIdNum','$suppIdNum',
	'$suppFirstName','$suppLastName','$suppFatherOrSpouseName',
	'$suppDOB','$suppSex', '$suppQualification',
	'$suppAddress','$suppCity','$suppPin',
	'$suppState','$suppCountry',
	'$suppPhoneNo','$suppMobileNo','$suppEmailId',$currentDateTime,'$suppReference',
	'$suppPriority','$suppStatus','$suppLoyalPoints',
	'$suppOtherInfo','$suppShopName','$suppPANNO',
        '$suppTAXNO','$suppCSTNO','$suppUniqueCode','$suppAccount',' $openingBalDt','$suppCashBal','$suppCashBalCrDr',
        '$suppGoldWeightBal','$suppGoldWeightGM','$suppGoldWeightCrDr','$suppSilverWeightBal',
        '$suppSilverWeightBalGM','$suppSilverWeightBalCrDr','$user_image_status')";

                if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }
//         * *******Start code to add image status in user table @Author:SANT28JAN16******************** */
            parse_str(getTableValues("SELECT user_id,user_image_status FROM user WHERE user_owner_id='$suppOwnerId' and user_fname='$suppFirstName'"));
          
//    $qLastCustDetails = "SELECT user_id,user_image_status,user_since FROM user where user_owner_id='$suppOwnerId' and user_fname='$suppFirstName' order by user_id desc LIMIT 0,1";
//                /*                 * *******End Code To Change $custOwnerId  @Author:SANT4JAN16******* */
//                $resLastCustDetails = mysqli_query($conn,$qLastCustDetails);
//                $rowLastCustDetails = mysqli_fetch_array($resLastCustDetails, MYSQLI_ASSOC);
//
//                $uPreCustId = NULL;
//                $uPreCustId = $rowLastCustDetails['user_id'];
//                $usr_img_status = $rowLastCustDetails['user_image_status'];
                 if ($file_size != 0) {
                     if($user_image_status=='NO')
                     {
             $query = "INSERT INTO image(image_user_type,image_user_id,image_user,image_snap_thumb,image_snap_fname,image_snap_ftype,image_snap_fsize,image_snap_fszMB,image_owner_id) 
	VALUES ('$user1_type','$user_id','$snapFile','$snapThumb','$filename','$filetype','$file_size','$file_size_in_MB','$suppOwnerId')";
            // echo $query;
                if (!mysqli_query($conn,$query)) {
                die('Error: ' . mysqli_error($conn));
            }
//                $qLastCustDetails = "SELECT user_id,user_image_status FROM user where user_owner_id='$suppOwnerId' order by user_id desc LIMIT 0,1";
//                $resLastCustDetails = mysqli_query($conn,$qLastCustDetails);
//                $rowLastCustDetails = mysqli_fetch_array($resLastCustDetails, MYSQLI_ASSOC);
//                $uPreCustId = $rowLastCustDetails['user_id'];
                    $query = "UPDATE user SET user_image_status='YES'
		WHERE user_owner_id = '$suppOwnerId' and user_id = '$user_id'";
                if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }
                 }
                 }
 //         * *******End code to add image status in user table @Author:SANT28JAN16******************** */               
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
                /*                 * *******Start code to add sys_log api @Author:SANT04JAN16******************** */
            /*             * *******Start code to add sys_log api @Author:PRIYA09APR14******************** */
            $sslg_trans_sub = 'MONEYLENDER ADDED';
            $sslg_trans_comment = $suppFirstName . ' ' . substr($suppFatherOrSpouseName, 1) . ' ' . $suppLastName . ' MONEYLENDER ADDED';
            $sslg_firm_id = $suppFirmId;
            $custId = $mlId;
            include 'omslgapi.php';
            /*             * *******End code to add sys_log api @Author:PRIYA09APR14******************** */
        }

        if ($suppImageLoadOption == 'Webcam') {
            unlink($filename);
        }

        $suppId = mysqli_insert_id($conn);


        if ($action == 'Update') {
            if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&panelOption=' . 'Update');
            } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&panelOption=' . 'Update');
            } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&panelOption=' . 'Update');
            }
        } else {
            if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustList&user=moneyLender&action=moneyLenderAdded');
            } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustList&user=moneyLender&action=moneyLenderAdded');
            } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustList&user=moneyLender&action=moneyLenderAdded');
            }
        }
    }
}
?>
