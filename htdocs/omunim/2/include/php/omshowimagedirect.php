<?php

/*
 * **************************************************************************************
 * @tutorial: Show Image
 * **************************************************************************************
 * 
 * Created on Mar 18, 2013 10:52:11 AM
 *
 * @FileName: omshowimagedirect.php
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
if (!isset($_SESSION)) {
    session_start();
}
include $_SERVER['DOCUMENT_ROOT'] . '/2/include/php/system/omppbldNo.php';
//
define("GB_OWNER_ID", $_SESSION['sessionOwnProdId']);
define("GB_DB_LOGIN_ID", $_SESSION['sessionUserId']);
define("GB_DB_SERVER", $_SESSION['sessionUserDBHost']);
define("GB_DB_USER_NAME", $_SESSION['sessionUserDBId']);
define("GB_DB_PASSWORD", $_SESSION['sessionUserDBPass']);
define("GB_DB_NAME", $_SESSION['sessionUserDBName']);
define("GB_DB_PORT", $_SESSION['sessionUserDBPort']);

$systemOnOrOff = $_SESSION['sessionSytemOnOff'];

//
$conn = new mysqli(GB_DB_SERVER, GB_DB_USER_NAME, GB_DB_PASSWORD, GB_DB_NAME, GB_DB_PORT);
if ($conn->connect_error) {
    die("Error in connecting with mysql : " . $conn->connect_error);
}
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

    if ((float) $imageFileSize > 0) {
        if ($_SESSION['sessionSoftHost'] == 'HOSTING') {
            $images_omunim = 'images_omunim';
        } else {
            $images_omunim = 'images.omunim';
        }
//        $readWritefile = fopen("ompprdwr.php", "a");
//        fwrite($readWritefile, '   $remoteMYSQL:' . $remoteMYSQL);
//        fwrite($readWritefile, '   $remoteHostIPAdd:' . $remoteHostIPAdd);
//        fwrite($readWritefile, '   $systemOnOrOff:' . $systemOnOrOff);
//        fclose($readWritefile);

        if ($remoteMYSQL == 'Y' && $remoteHostIPAdd != '') {
            $dirPath = substr($_SERVER["DOCUMENT_ROOT"], 0, strrpos($_SERVER["DOCUMENT_ROOT"], '/'));
            if ($imageUserType == 'ads') {
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/' . $imageUserType;
            } else if ($imageUserType != null) {
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/user';
            } else {
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'];
            }
        } else 
            if ($systemOnOrOff == 'ON') {
            $dirPath = substr($_SERVER["DOCUMENT_ROOT"], 0, strrpos($_SERVER["DOCUMENT_ROOT"], '/'));
            if ($imageUserType == 'ads') {
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'] . '/' . $imageUserType;
            } else if ($imageUserType != null) {
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
            if ($imageUserType == 'ads') {
                $dirName = $dirPath . "\\" . $_SESSION['sessionOwnerId'] . '\\' . $imageUserType;
            } else if ($imageUserType != null) {
                $dirName = $dirPath . '\\' . $_SESSION['sessionOwnerId'] . '\user';
            } else {
                //
                $dirName = $dirPath . '\\' . $_SESSION['sessionOwnerId'];
                // 
            }
        }
        //echo '$dirName :' . $dirName . '</br>';
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
//                echo '<br/>ImageFileType0: ' . $imageFileType;
                $fileName = "$dirName/$imageFileName";
                if (file_exists($fileName)) {
                    $fileName = "$dirName/$imageFileName";
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
//                echo '<br/>ImageFileType: ' . $imageFileType;
                $fileName = "$dirName/$imageId.$fileExtension";
//                echo '<br/>FileName: ' . $fileName;
                if (file_exists($fileName)) {
                    $fileName = "$dirName/$imageId.$fileExtension";
                } else if (file_exists("$dirName/$imageId.jpeg")) {
                    $fileName = "$dirName/$imageId.jpeg";
                } else if (file_exists("$dirName/$imageId.jpg")) {
                    $fileName = "$dirName/$imageId.jpg";
                } else if (file_exists("$dirName/$imageId.png")) {
                    $fileName = "$dirName/$imageId.png";
                } else if (file_exists("$dirName/$imageId.bmp")) {
                    $fileName = "$dirName/$imageId.bmp";
                } else if (file_exists("$dirName/$imageId.gif")) {
                    $fileName = "$dirName/$imageId.gif";
                } else {
                    $fileName = "$dirName/$imageId.jpg";
                }
//                echo '<br/>FileName0: ' . $fileName;
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
        
        
//        exit();
//
        if ($remoteMYSQL == 'Y' && $remoteHostIPAdd != '') {
            $imageContent = file_get_contents($fileName); //'http://' . 
        } else {
            $imageContent = file_get_contents($fileName);
        }
        //
        if ($noEcho != 'Y') {
            header("Content-type: $imageFileType");
            echo $imageContent;
        }
//        $readWritefile = fopen("ompprdwr.php", "a");
//        fwrite($readWritefile, '   $fileName:' . $fileName);
//        fclose($readWritefile);
    } else {
        echo 'Image Size is Zero!';
    }
} else {
    //
    $fileName = $_SERVER['DOCUMENT_ROOT'] . '/2/images/no-image-165.png';
    $imageContent = file_get_contents($fileName);
}
?>