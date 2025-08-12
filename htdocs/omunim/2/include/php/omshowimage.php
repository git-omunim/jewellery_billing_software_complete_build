<?php

/*
 * **************************************************************************************
 * @tutorial: Show Image
 * **************************************************************************************
 * 
 * Created on Mar 18, 2013 10:52:11 AM
 *
 * @FileName: omshowimage.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2017 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2017 SoftwareGen, Inc
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

//echo '<br/>$remoteMYSQL:' . $remoteMYSQL; // $remoteHostIPAdd
// Start Input Fields
// $imageId // Image Id
// End Input Fields
if ($imageId == NULL || $imageId == '') {
    $imageId = $_REQUEST['image_id'];
}
if ($imageId != NULL && $imageId != '') {
    $selectImageQuery = "SELECT image_user_id,image_snap_fname,image_user_type,image_snap_fszMB,image_snap_ftype,image_snap_fsize,image_get_by_file_name FROM image WHERE image_id='$imageId'";
    $resultImageQuery = mysqli_query($conn, $selectImageQuery);
    $rowImageQuery = mysqli_fetch_array($resultImageQuery, MYSQLI_ASSOC);
//    echo '$selectImageQuery'.$selectImageQuery.'</br>';
//    echo '$imageId'.$imageId;
    $imageFileName = $rowImageQuery['image_snap_fname'];
    $imageFileSize = $rowImageQuery['image_snap_fsize'];
    $imageFileType = $rowImageQuery['image_snap_ftype'];

    $imageUserType = $rowImageQuery['image_user_type'];
    $image_user_id = $rowImageQuery['image_user_id'];
    $image_get_by_file_name = $rowImageQuery['image_get_by_file_name'];
//    echo '$image_get_by_file_name :' . $image_get_by_file_name . '</br>';
//     echo '\n$imageUserType :' . $imageUserType . '</br>';

    if ((float) $imageFileSize > 0) {
        if ($_SESSION['sessionSoftHost'] == 'HOSTING') {
            $images_omunim = 'images_omunim';
        } else {
            $images_omunim = 'images.omunim';
        }
        if ($remoteMYSQL == 'Y' && $remoteHostIPAdd != '') {
            $dirPath = substr($_SERVER["DOCUMENT_ROOT"], 0, strrpos($_SERVER["DOCUMENT_ROOT"], '/'));
            if ($imageUserType == 'jewellerapp') {
                $dirName = $remoteHostIPAdd . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/';
            } else if ($imageUserType == 'ads') {
                $dirName = $remoteHostIPAdd . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/' . $imageUserType;
            } else if ($imageUserType != null && $imageUserType =='CUSTOMER') {
                $dirName = $remoteHostIPAdd . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/user';
            } else {
                $dirName = $remoteHostIPAdd . "/$images_omunim/" . $_SESSION['sessionOwnerId'];
            }
        } else if ($systemOnOrOff == 'ON') {
            $dirPath = substr($_SERVER["DOCUMENT_ROOT"], 0, strrpos($_SERVER["DOCUMENT_ROOT"], '/'));
            if ($imageUserType == 'jewellerapp') {
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/';
            } else if ($imageUserType == 'ads') {
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/' . $imageUserType;
            } else if ($imageUserType != null && $imageUserType =='CUSTOMER') {
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/user';
            } else {
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'];
            }
        } else {
            $dirPath = $_ENV["S2G_DB_PATH"] . 'images.omunim';
            //Check if the directory already exists.
            if (!is_dir($dirPath)) {
                //Directory does not exist, so lets create it.
                mkdir($dirPath, 0755);
            }
            //
            if ($imageUserType == 'jewellerapp') {
                $dirName = $dirPath . "\\" . $_SESSION['sessionOwnerId'] . '\\';
            } else if ($imageUserType == 'ads') {
                $dirName = $dirPath . "\\" . $_SESSION['sessionOwnerId'] . '\\' . $imageUserType;
            } else if ($imageUserType != null) {
                $dirName = $dirPath . '\\' . $_SESSION['sessionOwnerId'] . '\user';
            } else {
                //
                $dirName = $dirPath . '\\' . $_SESSION['sessionOwnerId'];
                // 
            }
        }
//        echo '$dirName :' . $dirName . '</br>';
//
//Check if the directory already exists.
        if (!is_dir($dirName) && $remoteHostIPAdd == '') {
            //Directory does not exist, so lets create it.
            mkdir($dirName, 0755);
        }
//
        // Get the extension name
        $path_parts = pathinfo($imageFileName);
        $fileExtension = $path_parts['extension'];

//        echo '<br/>$imageFileName: ' . $imageFileName;
//        echo '<br/>$fileExtension: ' . $fileExtension;
//        echo '<br/>$image_get_by_file_name: ' . $image_get_by_file_name;
        //
        if ($fileExtension == '' || $fileExtension == NULL)
            $fileExtension = 'jpg';
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // START CODE TO CHECK INDICATOR FOR SHOWING IMAGE BY IMAAG NAME INSTED OF ID @AUTHOR:MADHUREE-18AUGUST2020 //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        if ($image_get_by_file_name == 'Y') {
            if ($systemOnOrOff == 'ON') {

                $fileName = "$dirName/$imageFileName";
//                echo '<br/>$fileName1: ' . $fileName;
                if (file_exists($fileName)) {
                    $fileName = "$dirName/$imageFileName";
                } else if ($fileExtension != '') {
                    $fileName = "$dirName/$imageFileName.$fileExtension";
                } else {
                    $fileName = "$dirName/$imageFileName.jpg";
                }
            } else {
                $fileName = "$dirName" . "\\" . "$imageFileName";
                if (file_exists($fileName)) {
                    $fileName = "$dirName" . "\\" . "$imageFileName";
                } else {
                    $fileName = "$dirName" . "\\" . "$imageFileName.jpg";
                }
            }
        } else {
            if ($systemOnOrOff == 'ON') {
                $fileName = "$dirName/$imageId.$fileExtension";
//                echo '<br/>$fileName2: ' . $fileName;
                if (file_exists($fileName)) {
                    $fileName = "$dirName/$imageId.$fileExtension";
//                    echo '<br/>$fileName3: ' . $fileName;
                } else if ($fileExtension != '') {
                    $fileName = "$dirName/$imageId.$fileExtension";
                } else {
                    $fileName = "$dirName/$imageId.jpg";
//                    echo '<br/>$fileName4: ' . $fileName;
                }
            } else {
                $fileName = "$dirName" . "\\" . "$imageId.$fileExtension";
                if (file_exists($fileName)) {
                    $fileName = "$dirName" . "\\" . "$imageId.$fileExtension";
                } else {
                    $fileName = "$dirName" . "\\" . "$imageId.jpg";
                }
            }
        }
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END CODE TO CHECK INDICATOR FOR SHOWING IMAGE BY IMAAG NAME INSTED OF ID @AUTHOR:MADHUREE-18AUGUST2020 //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
//        echo '<br/>ImageFileType: ' . $imageFileType;
//        echo '<br/>FileName: ' . $fileName;
////        exit();
//
        if ($remoteMYSQL == 'Y' && $remoteHostIPAdd != '') {
            $imageContent = file_get_contents('http://' . $fileName);
        } else {
            $imageContent = file_get_contents($fileName);
        }
        //
        if ($noEcho != 'Y') {
            header("Content-type: $imageFileType");
            echo $imageContent;
        }
    } else {
        echo 'Image Size is Zero!';
    }
} else {
    echo 'No Image Present!';
}
?>
