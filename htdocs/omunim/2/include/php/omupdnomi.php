<?php

/*
 * Created on May 25, 2016 12:44:37 PM
 *
 * @FileName: omupdnomi.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
?>
<?php
require_once 'system/omssopin.php';
$custId = $_POST['custId'];
$mainCustId = $_POST['mainCustId'];
//****************************Start code to change Nominee insertion in customer Author:@SANT27MAY16*****************
$custOwnerId = $_SESSION['sessionOwnerId'];
$custType = trim($_POST['customerType']);                                       //PRIYA23
$custPCustId = om_strtoupper(trim($_POST['pCustId']));  // om_strtoupper Added @Author:PRIYA17AUG13                                    
$custUCustId = trim($_POST['uCustId']);                                        //PRIYA23
$custAccount = trim($_POST['accountId']);

$custPreId = substr($custPCustId, 0, 1);
if ($custPreId != 'C') {
    $custPCustId = 'C' . $custPCustId;
}
$custFirstName = trim($_POST['firstName']);
$custLastName = trim($_POST['lastName']);
$custFatherOrSpouseName = trim($_POST['fatherOrSpouseNameIndicator']) . trim($_POST['fatherOrSpouseName']);                //PRIYA27
$custMotherName = trim($_POST['motherName']);                                //PRIYA27
$custFirmId = trim($_POST['firmId']);
if ($_POST['DOBMonth'] == 'NotSelected' || $_POST['DOBDay'] == 'NotSelected' || $_POST['DOBYear'] == 'NotSelected') {
    $DOB = 'N/A';
} else {
    $DOB = $_POST['DOBMonth'] . ' ' . $_POST['DOBDay'] . ' ' . $_POST['DOBYear'];
}
$count = $_POST[count];
$custQualification = $_POST[qualification];
$custSex = $_POST['gender'];
$custAddress = trim($_POST['address1']);
$custCity = trim($_POST['city']);
$custPin = trim($_POST['pinCode']);                                         //PRIYA19
$custState = trim($_POST['state']);
$custCountry = $_POST['country'];
$custPhoneNo = $_POST[phoneNo];
$custMobileNo = $_POST[mobileNo];
$custEmailId = trim($_POST['emailId']);
$custReference = trim($_POST['reference']);
$custPriority = 'New Customer';
$custStatus = 'Active';
$custLoyalPoints = '0';
$custOtherInfo = trim($_POST['custOtherInfo']);     // PRIYA18 Other Info Added
$custImageLoadOption = trim($_POST['custImageLoadOption']);
$custStaffLoginId = trim($_POST['custStaffLoginId']);
$custInterest = trim($_POST['custInterest']);
$custComments = mysqli_real_escape_string($conn,stripslashes(trim($_POST['custComments'])));
$custMedia = mysqli_real_escape_string($conn,stripslashes(trim($_POST['custMedia'])));
$custCommentId = mysqli_real_escape_string($conn,stripslashes(trim($_POST['custCommId'])));
$checkMoreImage = mysqli_real_escape_string($conn,stripslashes(trim($_POST['checkMoreImage'])));
$checkOtherDocs = mysqli_real_escape_string($conn,stripslashes(trim($_POST['checkOtherDocs'])));
$custImageDesc = mysqli_real_escape_string($conn,stripslashes(trim($_POST['custImageDesc'])));
$custShopName = mysqli_real_escape_string($conn,stripslashes(trim($_POST['custShopName']))); //added @Author:PRIYA09APR15

if ($custImageLoadOption != 'Webcam') {
    $mainFilename = $_FILES['selectPhoto']['name'];
    $mainFileType = $_FILES['selectPhoto']['type'];
    $mainFileSize = $_FILES['selectPhoto']['size'];
} else {
    $mainFilename = trim($_POST['fileName']);
    $mainFileType = 'image/jpeg';
    $mainFileSize = '1';
}
$custType = stripslashes($custType);
$custPCustId = stripslashes($custPCustId);
$custUCustId = stripslashes($custUCustId);
$custAccount = stripslashes($custAccount);
$custFirstName = stripslashes($custFirstName);
$custLastName = stripslashes($custLastName);
$custFatherOrSpouseName = stripslashes($custFatherOrSpouseName);
$custMotherName = stripslashes($custMotherName);
$custFirmId = stripslashes($custFirmId);
$DOB = stripslashes($DOB);
$custQualification = stripslashes($custQualification);
$custSex = stripslashes($custSex);
$custAddress = stripslashes($custAddress);
$custCity = stripslashes($custCity);
$custPin = stripslashes($custPin);
$custState = stripslashes($custState);
$custCountry = stripslashes($custCountry);
$custPhoneNo = stripslashes($custPhoneNo);
$custMobileNo = stripslashes($custMobileNo);
$custEmailId = stripslashes($custEmailId);
$custReference = stripslashes($custReference);
$custPriority = stripslashes($custPriority);
$custStatus = stripslashes($custStatus);
$custLoyalPoints = stripslashes($custLoyalPoints);
$custOtherInfo = stripslashes($custOtherInfo);
$custStaffLoginId = stripslashes($custStaffLoginId);
$custInterest = stripslashes($custInterest);
$mainFilename = stripslashes($mainFilename);
$mainFileType = stripslashes($mainFileType);
$mainFileSize = stripslashes($mainFileSize);


$custType = mysqli_real_escape_string($conn,$custType);
$custPCustId = mysqli_real_escape_string($conn,$custPCustId);
$custUCustId = mysqli_real_escape_string($conn,$custUCustId);
$custAccount = mysqli_real_escape_string($conn,$custAccount);
$custFirstName = mysqli_real_escape_string($conn,$custFirstName);
$custLastName = mysqli_real_escape_string($conn,$custLastName);
$custFatherOrSpouseName = mysqli_real_escape_string($conn,$custFatherOrSpouseName);
$custMotherName = mysqli_real_escape_string($conn,$custMotherName);
$custFirmId = mysqli_real_escape_string($conn,$custFirmId);
$DOB = mysqli_real_escape_string($conn,$DOB);
$custQualification = mysqli_real_escape_string($conn,$custQualification);
$custSex = mysqli_real_escape_string($conn,$custSex);
$custAddress = mysqli_real_escape_string($conn,$custAddress);
$custCity = mysqli_real_escape_string($conn,$custCity);
$custPin = mysqli_real_escape_string($conn,$custPin);
$custState = mysqli_real_escape_string($conn,$custState);
$custCountry = mysqli_real_escape_string($conn,$custCountry);
$custPhoneNo = mysqli_real_escape_string($conn,$custPhoneNo);
$custMobileNo = mysqli_real_escape_string($conn,$custMobileNo);
$custEmailId = mysqli_real_escape_string($conn,$custEmailId);
$custReference = mysqli_real_escape_string($conn,$custReference);
$custPriority = mysqli_real_escape_string($conn,$custPriority);
$custStatus = mysqli_real_escape_string($conn,$custStatus);
$custLoyalPoints = mysqli_real_escape_string($conn,$custLoyalPoints);
$custOtherInfo = mysqli_real_escape_string($conn,$custOtherInfo);
$custStaffLoginId = mysqli_real_escape_string($conn,$custStaffLoginId);
$custInterest = mysqli_real_escape_string($conn,$custInterest);
$mainFilename = mysqli_real_escape_string($conn,$mainFilename);
$mainFileType = mysqli_real_escape_string($conn,$mainFileType);
$mainFileSize = mysqli_real_escape_string($conn,$mainFileSize);
function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

if ($mainFilename == '' || $mainFilename == NULL || $mainFileSize == 0 || $mainFileSize == NULL) {
    $main_file_size_in_MB = 0;
    $mainSnapFile = NULL;
    $mainSnapThumb = NULL;
} else {
    if ($custImageLoadOption != 'Webcam') {
        $main_file_size_in_MB = $mainFileSize / (1024 * 1024);
        $mainSnapFile = addslashes(fread(fopen($_FILES['selectPhoto']['tmp_name'], "r"), filesize($_FILES['selectPhoto']['tmp_name'])));
        $uploadedfile = $_FILES['selectPhoto']['tmp_name'];
    } else {
        $mainSnapFile = addslashes(fread(fopen($mainFilename, "r"), filesize($mainFilename)));
        $main_file_size_in_MB = filesize($mainFilename) / (1024 * 1024);
        $uploadedfile = $mainFilename;
    }
    $filename = $mainFilename;
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
    $mainSnapThumb = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($mainSnapThumb, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    ob_start(); // Start capturing stdout.
    imagejpeg($mainSnapThumb, NULL, 100); // As though output to browser.
    $mainSnapThumb = ob_get_contents(); // the raw jpeg image data.
    ob_end_clean(); // Dump the stdout so it does not screw other output.
    $mainSnapThumb = addslashes($mainSnapThumb);
//include 'omcccmim.php';
}
for ($i = 1; $i <= 5; $i++) {
    $custImageLoadOpt = trim($_POST['custImageLoadOption' . $i]);
    $imageCount = trim($_POST['image' . $i]);
    $imageDesc = trim($_POST['custImageDesc' . $i]);
    if ($custImageLoadOpt != 'Webcam') {
        $filename = $_FILES['selectPhoto' . $i]['name'];
        $filetype = $_FILES['selectPhoto' . $i]['type'];
        $file_size = $_FILES['selectPhoto' . $i]['size'];
    } else {
        $filename = trim($_POST['fileName' . $i]);
        $filetype = 'image/jpeg';
        $file_size = '1';
    }
    if ($custImageLoadOpt != '') {
        if ($filename == '') {
            if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panel=UpdateCust&updateMess=moreImageSize&custId=$custId");
            } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panel=UpdateCust&updateMess=moreImageSize&custId=$custId");
            } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header("Location: " . $documentRoot . "/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panel=UpdateCust&updateMess=moreImageSize&custId=$custId");
            } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header("Location: " . $documentRoot . "/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panel=UpdateCust&updateMess=moreImageSize&custId=$custId");
            }
        } else {
            $filename = mysqli_real_escape_string($conn,stripslashes($filename));
            $filetype = mysqli_real_escape_string($conn,stripslashes($filetype));
            $file_size = mysqli_real_escape_string($conn,stripslashes($file_size));
            if ($filename == '' || $filename == NULL || $file_size == 0 || $file_size == NULL) {
                $file_size_in_MB = 0;
                $snapFile = NULL;
                $snapThumb = NULL;
            } else {
                if ($custImageLoadOpt != 'Webcam') {
                    $file_size_in_MB = $file_size / (1024 * 1024);
                    $snapFile = addslashes(fread(fopen($_FILES['selectPhoto' . $i]['tmp_name'], "r"), filesize($_FILES['selectPhoto' . $i]['tmp_name'])));
                    $uploadedfile = $_FILES['selectPhoto' . $i]['tmp_name'];
                } else {
                    $snapFile = addslashes(fread(fopen($filename, "r"), filesize($filename)));
                    $file_size_in_MB = filesize($filename) / (1024 * 1024);
                    $uploadedfile = $filename;
                }
                include 'omcccmim.php';
                $snapFile = NULL;
                $snapThumb = NULL;
                $filename = '';
                $filetype = 'image/jpeg';
                $file_size = '1';
            }
        }
    }
}
if ($checkOtherDocs == 'true') {
    for ($i = 6; $i <= 10; $i++) {
        $custImageLoadOpt = trim($_POST['custImageLoadOption' . $i]);
        
    $imageCount = trim($_POST['image' . $i]);
    $imageDesc1 = trim($_POST['custImageDesc' . $i]);
        if ($custImageLoadOpt != 'Webcam') {
            $filename = $_FILES['selectPhoto' . $i]['name'];
            $filetype = $_FILES['selectPhoto' . $i]['type'];
            $file_size = $_FILES['selectPhoto' . $i]['size'];
        }
        //$imageDesc1 = trim($_POST['custImageDesc' . $i]);
        $filename = mysqli_real_escape_string($conn,stripslashes($filename));
        $filetype = mysqli_real_escape_string($conn,stripslashes($filetype));
        $file_size = mysqli_real_escape_string($conn,stripslashes($file_size));
        if ($filename == '' || $filename == NULL || $file_size == 0 || $file_size == NULL) {
         
        
           } else {
            if ($filetype == 'image/jpeg' || $filetype == 'image/jpg' || $filetype == 'image/png' || $filetype == 'image/gif') {
                if ($custImageLoadOpt != 'Webcam') {
                    $file_size_in_MB = $file_size / (1024 * 1024);
                    $snapFile = addslashes(fread(fopen($_FILES['selectPhoto' . $i]['tmp_name'], "r"), filesize($_FILES['selectPhoto' . $i]['tmp_name'])));
                    $uploadedfile = $_FILES['selectPhoto' . $i]['tmp_name'];
                } else {
                    $snapFile = addslashes(fread(fopen($filename, "r"), filesize($filename)));
                    $file_size_in_MB = filesize($filename) / (1024 * 1024);
                    $uploadedfile = $filename;
                }
                include 'omcccmim.php';
            } else {
                $snapFile = addslashes(fread(fopen($_FILES['selectPhoto' . $i]['tmp_name'], "r"), filesize($_FILES['selectPhoto' . $i]['tmp_name'])));
                $file_size_in_MB = $file_size / (1024 * 1024);
            }
 
            $snapFile = NULL;
            $snapThumb = NULL;
            $filename = '';
            $filetype = 'image/jpeg';
            $file_size = '1';
        }
    }
}
$qSelCity = "SELECT city_name FROM city where city_own_id='$custOwnerId' and city_name='$custCity'";
$resCity = mysqli_query($conn,$qSelCity);
$cityAvailableCount = mysqli_num_rows($resCity);
if ($cityAvailableCount <= 0) {
    $queryCity = "INSERT INTO city (
		city_own_id, city_name,
		city_upd_sts, city_ent_dat) 
		VALUES (
		'$custOwnerId','$custCity',
		'Customer',$currentDateTime)";
    if (!mysqli_query($conn,$queryCity)) {
        die('Error: ' . mysqli_error($conn));
    }
}
if ($mainFileSize != 0) {
    $query = "UPDATE image SET
		image_user = '$mainSnapFile',image_snap_desc = '$custImageDesc',image_snap_thumb = '$mainSnapThumb',image_snap_fname = '$mainFilename', 
		image_snap_ftype = '$mainFileType',image_snap_fsize = '$mainFileSize',image_snap_fszMB = '$main_file_size_in_MB'
		WHERE image_user_id = '$custId' and image_user_type='CUSTOMER'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    $query = "UPDATE image SET image_snap_desc = '$custImageDesc' WHERE image_user_id = '$custId' and image_user_type='CUSTOMER'";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
    $query = "UPDATE user SET
		user_fname = '$custFirstName', user_lname = '$custLastName', user_father_name = '$custFatherOrSpouseName',user_mother_name='$custMotherName',
		user_DOB = '$DOB', user_sex = '$custSex',  user_qualification = '$custQualification', 
		user_add = '$custAddress',  user_city = '$custCity', user_pincode = '$custPin',
		user_state = '$custState', user_country = '$custCountry',
		user_phone = '$custPhoneNo', user_mobile = '$custMobileNo', 
                user_email = '$custEmailId', user_reference = '$custReference',user_priority = '$custPriority', user_status = '$custStatus', user_loyal_points = '$custLoyalPoints',user_other_info='$custOtherInfo',user_staff_id ='$custStaffLoginId' ,user_interest ='$custInterest',    
		user_shop_name = '$custShopName'
		WHERE user_owner_id = '$custOwnerId' and user_id = '$custId'";
//  ****************
if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
if ($custComments != '') {
    if ($custCommentId != '') {
        $query = "UPDATE cust_comments SET
                cust_owner_id = '$custOwnerId',cust_id = '$custId',
		cust_comm_sub='$custComments',cust_comm_desc = '$custComments',cust_comm_media= '$custMedia',
		cust_comm_since = $currentDateTime"
                . "where cust_owner_id = '$custOwnerId' and cust_comm_id = '$custCommentId'";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
    } else {
        $query = "INSERT INTO cust_comments (
		cust_owner_id, cust_id,
		cust_comm_sub, cust_comm_desc, cust_comm_media,
		cust_comm_since) 
		VALUES (
		'$custOwnerId','$custId',
		'$custComments','$custComments','$custMedia',
		$currentDateTime)";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
}
   $qLastCustDetails = "SELECT user_id,user_image_status,user_since FROM user where user_owner_id='$custOwnerId' and user_fname='$custFirstName' and user_lname='$custLastName' order by user_id desc LIMIT 0,1";
      $resLastCustDetails = mysqli_query($conn,$qLastCustDetails);
                $rowLastCustDetails = mysqli_fetch_array($resLastCustDetails, MYSQLI_ASSOC);
                $userimagestatus=$rowLastCustDetails['user_image_status'];
               
   if ($mainFileSize != 0) {
        if ($userimagestatus == 'NO') {
            $uType='CUSTOMER';
            $query = "INSERT INTO image(image_user_id,image_user_type,image_user,image_snap_thumb,image_snap_fname,image_snap_ftype,image_snap_fsize,image_snap_fszMB,image_snap_desc,image_count,image_owner_id) 
	VALUES ('$custId','CUSTOMER','$mainSnapFile','$mainSnapThumb','$mainFilename','$mainFileType','$mainFileSize','$main_file_size_in_MB','$custImageDesc','0','$custOwnerId')";
 
            if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }     
            $query = "UPDATE user SET user_image_status='YES'
		WHERE user_owner_id = '$custOwnerId' and user_id = '$custId' and user_type='CUSTOMER'";
             if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }
        } else {
            $query = "UPDATE image SET image_user='$mainSnapFile',image_snap_thumb='$mainSnapThumb',image_snap_fname='$mainFilename',image_snap_ftype='$mainFileType',image_snap_fsize='$mainFileSize',image_snap_fszMB='$main_file_size_in_MB',image_snap_desc='$custImageDesc',image_count='1' WHERE image_user_id = '$custId' and image_user_type='CUSTOMER'";
               }
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }

    }
$sslg_trans_sub = 'NOMINEE UPDATED';
$sslg_trans_comment = $custFirstName . ' ' . substr($custFatherOrSpouseName, 1) . ' ' . $custLastName . ' CUSTOMER UPDATED';
$sslg_firm_id = $custFirmId;
$custId = $custId;
include 'omslgapi.php';
$select = "SELECT girv_id FROM girvi where girv_own_id = '$custOwnerId' and girv_cust_id = '$custId'";
$result = mysqli_query($conn,$select);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $girviId = $row['girv_id'];
    $query = "UPDATE girvi SET 
            girv_cust_fname = '$custFirstName',girv_cust_lname= '$custLastName',girv_cust_city= '$custCity'
            WHERE girv_own_id= '$custOwnerId' and girv_id = '$girviId'";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
$select = "SELECT udhaar_id FROM udhaar where udhaar_own_id = '$custOwnerId' and udhaar_cust_id = '$custId'";
$result = mysqli_query($conn,$select);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $udhaarId = $row['udhaar_id'];
    $query = "UPDATE udhaar SET 
            udhaar_cust_fname = '$custFirstName',udhaar_cust_lname= '$custLastName',udhaar_cust_city= '$custCity'
            WHERE udhaar_own_id= '$custOwnerId' and udhaar_id = '$udhaarId'";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
 parse_str(getTableValues("SELECT user_nominee_cust_id FROM user WHERE user_owner_id='$custOwnerId' and user_fname='$custFirstName' and user_id = '$custId'"));
           if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custPanelOption=CustNomineeInfo&custId=$mainCustId");
            } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custPanelOption=CustNomineeInfo&custId=$mainCustId");
            } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header("Location: " . $documentRoot . "/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custPanelOption=CustNomineeInfo&custId=$mainCustId");
            } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                header("Location: " . $documentRoot . "/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&custPanelOption=CustNomineeInfo&custId=$mainCustId");
            }
            //****************************End code to change Nominee insertion in customer Author:@SANT27MAY16*****************
?>          