<?php

/*
 * **************************************************************************************
 * @Description: USER IMAGE INSERTION FILE @Author:HEMA-26-05-20
 * **************************************************************************************
 *
 * Created on MAY 25, 2020 12:02:43 AM
 *
 * @FileName: omusrimginsrt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 * Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 * MODIFICATION DATE:
 * AUTHOR:
 * REASON:
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
//
if ($image_user_id == '') {

    $query = "INSERT INTO image(image_owner_id,image_user_id,image_user_type,image_snap_fname,image_snap_ftype,image_snap_fsize,image_snap_fszMB,image_itpr_id)"
            . "VALUES('$_SESSION[sessionOwnerId]','$user_id','$user1_type','$filename','$filetype','$file_size','$file_size_in_MB','$user_id')";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn) . ' Query:' . $query);
    }
         parse_str(getTableValues("SELECT image_id,image_user_id,image_user_type FROM image WHERE image_user_id = '$user_id' and image_count is null"));
} else {

    if ($image_id != '') {

        $query = "UPDATE image SET image_owner_id = '$_SESSION[sessionOwnerId]',image_user_type='$user1_type', image_snap_fname = '$filename',"
                . "image_snap_ftype = '$filetype', image_snap_fsize = '$file_size', image_snap_fszMB = '$file_size_in_MB',"
                . "image_itpr_id = '' WHERE image_id = '$image_id' and image_user_id = '$image_user_id'";

        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn) . ' Query:' . $query);
        }
        $user_id = $image_user_id;
    }
}
// Start Code to save image into folder
$imageFileSize = $file_size;
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
    //
    // Check if the directory already exists.
    //
    if ($systemOnOrOff == 'ON') {
        $userDirName = $dirName . '/user';
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
        $userDirName = $dirName . '\\' . 'user';
        //echo '<br/>$userDirName == ' . $userDirName . '<br  />';
        // Check if the directory already exists.
        if (!is_dir($userDirName)) {
            //Directory does not exist, so lets create it.
            mkdir($userDirName, 0755);
        }
    }
//    echo '<br/>$userDirName == ' . $userDirName . '<br  />';
    // Get the extension name
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
    file_put_contents($fileName, $snapFile);
    //move_uploaded_file($_FILES['selectPhoto']['tmp_name'], $fileName);
}
/* START CODE TO UPADTE USER IMAGE STATUS AFTER INSERTING USER IMAGE,@AUTHOR:HEMA-2JUN2020 */
$qUpdateImgStatus = "UPDATE user SET user_image_status = 'YES',user_image_id='$image_id' WHERE user_id = '$user_id' AND user_owner_id = '$_SESSION[sessionOwnerId]'";
if (!mysqli_query($conn, $qUpdateImgStatus)) {
    die('Error: ' . mysqli_error($conn) . ' Query:' . $qUpdateImgStatus);
}
/* END CODE TO UPADTE USER IMAGE STATUS AFTER INSERTING USER IMAGE,@AUTHOR:HEMA-2JUN2020 */
?>
