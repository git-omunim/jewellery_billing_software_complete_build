<?php

/*
 * **************************************************************************************
 * @Description: USER IMAGE INSERTION FILE @Author:HEMA-26-05-20
 * **************************************************************************************
 *
 * Created on MAY 25, 2020 12:02:43 AM
 *
 * @FileName: omusrdocinsrt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 * Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 * MODIFICATION DATE:07-APR-2023
 * AUTHOR:Vinod Tambe
 * REASON: Uploading Staff Document
 *
 */
?>
<?php

//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

$lastOwnerId = $_SESSION['sessionOwnerId'];

    $query = "INSERT INTO image(image_owner_id,image_user_id,image_user_type,image_snap_fname,image_snap_ftype,image_snap_fsize,image_snap_fszMB,image_itpr_id)"
            . "VALUES('$_SESSION[sessionOwnerId]','$user_id','$user1_type','$documentFileName','$filetype','$documentFileSize','$file_size_in_MB','$user_id')";
  if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn) . ' Query:' . $query);
    }  
    $imgQuery="SELECT * from image where image_user_id = '$user_id' order by image_id DESC limit 0,1";
 $resImgDoc = mysqli_query($conn, $imgQuery);
                $rowLast = mysqli_fetch_array($resImgDoc, MYSQLI_ASSOC);
                $image_id = $rowLast['image_id'];
// Start Code to save image into folder
$imageFileSize = $documentFileSize;
//
if ((float) $imageFileSize > 0) {
    if ($_SESSION['sessionSoftHost'] == 'HOSTING') {
        $images_omunim = 'images_omunim';
    } else {
        $images_omunim = 'images.omunim';
    }
    if ($systemOnOrOff == 'ON') {
        $dirPath = substr($_SERVER["DOCUMENT_ROOT"], 0, strrpos($_SERVER["DOCUMENT_ROOT"], '/'));
        $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'];
        //
        if (!is_dir($dirName)) {
            //Directory does not exist, so lets create it.
            mkdir($dirName, 0777);
        }
    } else {
        $dirPath = $_ENV["S2G_DB_PATH"] . 'images.omunim';

        //Check if the directory already exists.
        if (!is_dir($dirPath)) {
            //Directory does not exist, so lets create it.
            mkdir($dirPath, 0777);
        }
        $dirName = $dirPath . '\\' . $_SESSION['sessionOwnerId'];
    }
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // START CODE TO MODIFY CODE FOR AUTOCREATE THE IMAGE DIRECTORY IF NOT EXIST @AUTHOR:MADHUREE-12AUGUST2020 //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    $mainDirName = $dirName . '/user/Staff Document';
    if (!is_dir($mainDirName)) {
            //Directory does not exist, so lets create it.
            mkdir($mainDirName, 0755);
        }
    
    // Check if the directory already exists.
    //
    if ($systemOnOrOff == 'ON') {
        $userDirName = $dirName . '/user/Staff Document/'.$user_id;
        //
        if (!is_dir($userDirName)) {
            //Directory does not exist, so lets create it.
            mkdir($userDirName, 0777);
        }
    } else {
        if (!is_dir($dirName)) {
            //Directory does not exist, so lets create it.
            mkdir($dirName, 0755);
        }
        $userDirName = $dirName . '\\' . 'user\\Staff Document\\'.$user_id;
        //echo '<br/>$userDirName == ' . $userDirName . '<br  />';
        // Check if the directory already exists.
        if (!is_dir($userDirName)) {
            //Directory does not exist, so lets create it.
            mkdir($userDirName, 0755);
        }
    }
//    echo '<br/>$userDirName == ' . $userDirName . '<br  />';
    // Get the extension name
    $filename = $AdharFrontFile;
    $path_parts = pathinfo($filename);
    $fileExtension = $path_parts['extension'];
    //
    if ($fileExtension == '' || $fileExtension == NULL)
        $fileExtension = 'jpg';

    //
    if ($systemOnOrOff == 'ON') {
        $fileName = "$userDirName/$image_id.$fileExtension";
    } else {
        $fileName = "$userDirName" . "\\" . "$image_id.$fileExtension";
    }
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // END CODE TO MODIFY CODE FOR AUTOCREATE THE IMAGE DIRECTORY IF NOT EXIST @AUTHOR:MADHUREE-12AUGUST2020 //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
//    echo '<br/>$fileName == ' . $fileName . '<br  />';
//    die;
    //echo 'fileName'.$fileName.'<br>';
    //echo 'snapStaffFile'.$snapStaffFile;
    file_put_contents($fileName, $snapStaffFile);
    
    //move_uploaded_file($snapStaffFile, $fileName);
}
/* START CODE TO UPADTE USER IMAGE STATUS AFTER INSERTING USER IMAGE,@AUTHOR:HEMA-2JUN2020 */
$hisimgQuery="SELECT user_pan_adhr_img_id FROM user where user_id = '$user_id' AND user_owner_id = '$_SESSION[sessionOwnerId]'";
$resImgRec = mysqli_query($conn, $hisimgQuery);
                $rowImgHis= mysqli_fetch_array($resImgRec, MYSQLI_ASSOC);
                $image_id_His = $rowImgHis['user_pan_adhr_img_id'];
                $preimage_id =$image_id.'#';
                $image_id_New_His=$image_id_His.$preimage_id;

$qUpdateImgStatus = "UPDATE user SET user_pan_adhr_img_id='$image_id_New_His' WHERE user_id = '$user_id' AND user_owner_id = '$_SESSION[sessionOwnerId]'";
if (!mysqli_query($conn, $qUpdateImgStatus)) {
    die('Error: ' . mysqli_error($conn) . ' Query:' . $qUpdateImgStatus);
} 
/* END CODE TO UPADTE USER IMAGE STATUS AFTER INSERTING USER IMAGE,@AUTHOR:HEMA-2JUN2020 */
?>
