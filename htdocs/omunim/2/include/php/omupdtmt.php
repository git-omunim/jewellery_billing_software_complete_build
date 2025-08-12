<?php

/*
 * Created on Jun 15, 2011 11:28:29 AM
 *
 * @FileName: omupdtmt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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

//changes in file @AUTHOR: SANDY15DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';

$ownerId = $_SESSION['sessionOwnerId'];
$rawMetalName = om_ucfirst(trim($_POST['addRawMetalName']));
$rawMetalCategory = om_ucfirst(trim($_POST['addRawMetalCategory']));
$rawMetalMetal = trim($_POST['metalType']);
$rawMetalComments = trim($_POST['rawMetalComments']);
$rawMetalId = trim($_POST['rawMetalId']);
$rawMetalComments = trim($_POST['itemNameComments']);
$updateAction = trim($_POST['updateAction']);
$rawMetalImageLoadOption = trim($_POST['rawMetalImageLoadOption']);

if ($updateAction == 'Update') {
    if ($rawMetalImageLoadOption == 'IMG') {
        $filename = $_FILES['rMSelectPhotoIMG']['name'];
        $filetype = $_FILES['rMSelectPhotoIMG']['type'];
        $file_size = $_FILES['rMSelectPhotoIMG']['size'];
    } else if ($rawMetalImageLoadOption != 'WEB') {
        $filename = $_FILES['rMSelectPhoto']['name'];
        $filetype = $_FILES['rMSelectPhoto']['type'];
        $file_size = $_FILES['rMSelectPhoto']['size'];
    } else {
        $filename = trim($_POST['fileName']);
        $filetype = 'image/jpeg';
        $file_size = '1';
    }
// Start To protect MySQL injection
    $rawMetalName = stripslashes($rawMetalName);
    $rawMetalCategory = stripslashes($rawMetalCategory);
    $rawMetalMetal = stripslashes($rawMetalMetal);
    $rawMetalComments = stripslashes($rawMetalComments);
    $filename = stripslashes($filename);
    $filetype = stripslashes($filetype);
    $file_size = stripslashes($file_size);

    $rawMetalName = mysqli_real_escape_string($conn,$rawMetalName);
    $rawMetalCategory = mysqli_real_escape_string($conn,$rawMetalCategory);
    $rawMetalMetal = mysqli_real_escape_string($conn,$rawMetalMetal);
    $rawMetalComments = mysqli_real_escape_string($conn,$rawMetalComments);
    $filename = mysqli_real_escape_string($conn,$filename);
    $filetype = mysqli_real_escape_string($conn,$filetype);
    $file_size = mysqli_real_escape_string($conn,$file_size);
// End To protect MySQL injection

    if ($filename == '' || $filename == NULL || $file_size == 0 || $file_size == NULL) {
        $file_size_in_MB = 0;
        $snapFile = NULL;
        $snapThumb = NULL;
    } else {
        if ($rawMetalImageLoadOption == 'IMG') {
            $file_size_in_MB = $file_size / (1024 * 1024);
            $snapFile = addslashes(fread(fopen($_FILES['rMSelectPhotoIMG']['tmp_name'], "r"), filesize($_FILES['rMSelectPhotoIMG']['tmp_name'])));
            $uploadedfile = $_FILES['rMSelectPhotoIMG']['tmp_name'];
        } else if ($rawMetalImageLoadOption != 'WEB') {
            $file_size_in_MB = $file_size / (1024 * 1024);
            $snapFile = addslashes(fread(fopen($_FILES['rMSelectPhoto']['tmp_name'], "r"), filesize($_FILES['rMSelectPhoto']['tmp_name'])));
            $uploadedfile = $_FILES['rMSelectPhoto']['tmp_name'];
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
        $newwidth = 256;
        $newheight = ($height / $width) * $newwidth;
        $snapThumb = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($snapThumb, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        ob_start(); // Start capturing stdout.
        imagejpeg($snapThumb, NULL, 100); // As though output to browser.
        $snapThumb = ob_get_contents(); // the raw jpeg image data.
        ob_end_clean(); // Dump the stdout so it does not screw other output.
        $snapThumb = addslashes($snapThumb);
    }

    $qSelItemName = "SELECT raw_metal_name FROM raw_metals where raw_metal_name='$rawMetalName' and raw_metal_type='$rawMetalMetal' and raw_metal_own_id='$ownerId'";
    $resItemName = mysqli_query($conn,$qSelItemName);

    $query = "UPDATE raw_metals SET
		raw_metal_name='$rawMetalName',
                raw_metal_cat= '$rawMetalCategory',
		raw_metal_type='$rawMetalMetal',
                raw_metal_snap='$snapFile',
              raw_metal_snap_thumb='$snapThumb',raw_metal_snap_fname='$filename',raw_metal_snap_ftype='$filetype',raw_metal_snap_fsize='$file_size',raw_metal_snap_fszMB='$file_size_in_MB'
		WHERE raw_metal_own_id = '$ownerId' and raw_metal_id = '$rawMetalId'";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    $sslg_trans_sub = 'RAW METAL UPDATED';
    $sslg_trans_comment = $rawMetalMetal . ' - ' . $rawMetalName . ' RAW METAL UPDATED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
} else {
    /*     * *******Start code to add sys_log api @Author:PRIYA10APR14******************** */
    parse_str(getTableValues("SELECT raw_metal_type,raw_metal_name FROM raw_metals where raw_metal_own_id='$_SESSION[sessionOwnerId]' and raw_metal_id=$rawMetalId"));
    $sslg_trans_sub = 'RAW METAL DELETED';
    $sslg_trans_comment = $raw_metal_type . ' - ' . $raw_metal_name . ' RAW METAL DELETED';
    include 'omslgapi.php';
    /*     * *******End code to add sys_log api @Author:PRIYA10APR14******************** */
    $qSelItemName = "SELECT raw_metal_name FROM raw_metals where raw_metal_id='$rawMetalId' and raw_metal_own_id='$ownerId'";
    $resItemName = mysqli_query($conn,$qSelItemName);
    if ($rowItemName = mysqli_fetch_array($resItemName, MYSQLI_ASSOC)) {
        $query = "DELETE FROM raw_metals WHERE raw_metal_id='$rawMetalId' and raw_metal_own_id='$ownerId'";
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
}
//sTART Code to navigate to correct page @AUTHOR: SANDY15DEC13
if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddRawMetal');
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddRawMetal');
} else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddRawMetal');
} else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header('Location: ' . $documentRoot . '/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=Settings&subDivName=AddRawMetal');
}
//End Code to navigate to correct page @AUTHOR: SANDY15DEC13

require_once 'omssclin.php';
?>
