<?php

/*
 * **************************************************************************************
 * @Description: ADD VIDEO OF PERTICULER ITEM FOR ONLINE OPTION AUTHOR:HEMA28NOV2019
 * **************************************************************************************
 *
 * Created on DECEMBER 02, 2019 12:02:43 AM
 *
 * @FileName: omUpldVedio.php
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
?>
<?php

$sttrId = $_REQUEST['sttrId'];
//echo '$sttrId =' . $sttrId . '</br>';
$video_name = $sttrId . '_V';
//echo '$video_name =' . $video_name . '</br>';
$query = "SELECT * FROM image where image_snap_fname = '$video_name'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);
$video_id = $row['image_id'];
//echo '$video_id = ' . $video_id . '</br>';
$maxsize = 10485760; //10MB BYTE IN BINARY
if ($video_id == '') {
    //  echo 'in if =' . $video_id . '</br>';
    $videoFilename = $_FILES["addItemSelectVideo"]["name"];
    $videoFiletype = $_FILES["addItemSelectVideo"]["type"];
    $videoFile_size = $_FILES["addItemSelectVideo"]["size"];

    $videoFilename = stripslashes($videoFilename);
    $videoFiletype = stripslashes($videoFiletype);
    $videoFile_size = stripslashes($videoFile_size);

    $videoFilename = mysqli_real_escape_string($conn, $videoFilename);
    $videoFiletype = mysqli_real_escape_string($conn, $videoFiletype);
    $videoFile_size = mysqli_real_escape_string($conn, $videoFile_size);

    //   echo '$videoFilename = ' . $videoFilename . '</br>';
    //   echo '$videoFiletype = ' . $videoFiletype . '</br>';
    //  echo '$videoFile_size = ' . $videoFile_size . '</br>';

    $query = "INSERT INTO image(image_owner_id,image_snap_fname,image_snap_ftype,image_snap_fsize,image_snap_fszMB,image_itpr_id)"
            . "VALUES('$_SESSION[sessionOwnerId]','$video_name','$videoFiletype','','$videoFile_size','$sttrId')";
    //   echo '$query = '.$query.'</br>';
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn) . ' Query:' . $query);
    }

    //   parse_str(getTableValues("SELECT image_id FROM image ORDER BY image_id DESC LIMIT 0,1"));
} else {
    //   echo 'in else';
    if ($video_id != '') {

        $videoFilename = $_FILES["addItemSelectVideo"]["name"];
        $videoFiletype = $_FILES["addItemSelectVideo"]["type"];
        $videoFile_size = $_FILES["addItemSelectVideo"]["size"];

        $videoFilename = stripslashes($videoFilename);
        $videoFiletype = stripslashes($videoFiletype);
        $videoFile_size = stripslashes($videoFile_size);

        $videoFilename = mysqli_real_escape_string($conn, $videoFilename);
        $videoFiletype = mysqli_real_escape_string($conn, $videoFiletype);
        $videoFile_size = mysqli_real_escape_string($conn, $videoFile_size);

        // echo '$videoFilename = ' . $videoFilename . '</br>';
        // echo '$videoFiletype = ' . $videoFiletype . '</br>';
        //  echo '$videoFile_size = ' . $videoFile_size . '</br>';

        $videoFileSize = $videoFile_size;
        //CODE TO UPLOAD IMAGE INTO FOLDER 
        if ((float) $videoFile_size > 0) {
            if ($_SESSION['sessionSoftHost'] == 'HOSTING') {
                $images_omunim = 'images_omunim';
            } else {
                $images_omunim = 'images.omunim';
            }
            if ($systemOnOrOff == 'ON') {
                $dirPath = substr($_SERVER["DOCUMENT_ROOT"], 0, strrpos($_SERVER["DOCUMENT_ROOT"], '/'));
                $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'];
            } else {
                $dirPath = $_ENV["S2G_DB_PATH"] . 'images.omunim';
                //Check if the directory already exists.
                if (!is_dir($dirPath)) {
                    //Directory does not exist, so lets create it.
                    mkdir($dirPath, 0777);
                }
                //
                $dirName = $dirPath . '\\' . $_SESSION['sessionOwnerId'];

                //
                // Check if the directory already exists.
                if (!is_dir($dirName)) {
                    //Directory does not exist, so lets create it.
                    mkdir($dirName, 0777);
                }
            }
            // Get the extension name
            $path_parts = pathinfo($videoFilename);
            $fileExtension = $path_parts['extension'];
            //
            if ($fileExtension == '' || $fileExtension == NULL)
                $fileExtension = 'mp4';
            //
            if ($systemOnOrOff == 'ON') {
                $fileName = "$dirName/$video_id.$fileExtension";
            } else {
                $fileName = "$dirName" . "\\" . "$video_id.$fileExtension";
            }
            // file_put_contents($fileName, $snapFile);
            //     echo '$fileName =' . $fileName . '</br>';
            if (($videoFileSize <= $maxsize) || ($videoFileSize > 0 )) {
                move_uploaded_file($_FILES['addItemSelectVideo']['tmp_name'], $fileName);
            }
        }

        if ($videoFileSize == 0) {
            //CODE IF IMAGE IS ALREADY PRESENT AND NOT SELECTED
            $query = "SELECT * FROM image where image_id = '$video_id'";
            $res = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($res);
            $videoFileSizeUpd = $row['image_snap_fsize'];
            $query = "UPDATE image SET image_snap_fsize = '$videoFileSizeUpd' WHERE image_id = '$video_id'";
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn) . ' Query:' . $query);
            }
        } else {
            $query = "UPDATE image SET image_owner_id = '$_SESSION[sessionOwnerId]', image_snap_fname = '$video_name',"
                    . "image_snap_ftype = '$videoFiletype', image_snap_fszMB = '$videoFile_size',"
                    . "image_itpr_id = '$sttrId' WHERE image_id = '$video_id'";
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn) . ' Query:' . $query);
            }

            //echo '$query == '.$query.'<br  />';die;
        }
    }
}




$videoFileSize = $videoFile_size;
//CODE TO UPLOAD IMAGE INTO FOLDER 
if ((float) $videoFile_size > 0) {
    if ($_SESSION['sessionSoftHost'] == 'HOSTING') {
        $images_omunim = 'images_omunim';
    } else {
        $images_omunim = 'images.omunim';
    }
    if ($systemOnOrOff == 'ON') {
        $dirPath = substr($_SERVER["DOCUMENT_ROOT"], 0, strrpos($_SERVER["DOCUMENT_ROOT"], '/'));
        $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'];
    } else {
        $dirPath = $_ENV["S2G_DB_PATH"] . 'images.omunim';
        //Check if the directory already exists.
        if (!is_dir($dirPath)) {
            //Directory does not exist, so lets create it.
            mkdir($dirPath, 0777);
        }
        //
        $dirName = $dirPath . '\\' . $_SESSION['sessionOwnerId'];

        //
        // Check if the directory already exists.
        if (!is_dir($dirName)) {
            //Directory does not exist, so lets create it.
            mkdir($dirName, 0777);
        }
    }
    // Get the extension name
    $path_parts = pathinfo($videoFilename);
    $fileExtension = $path_parts['extension'];
    //
    if ($fileExtension == '' || $fileExtension == NULL)
        $fileExtension = 'mp4';
    //
    if ($systemOnOrOff == 'ON') {
        $query = "SELECT * FROM image where image_snap_fname =  '$video_name'";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        $video_id = $row['image_id'];
        //    echo '@@';
        //   echo '$video_id = '.$video_id.'</br>';

        $fileName = "$dirName/$video_id.$fileExtension";
    } else {

        $query = "SELECT * FROM image where image_snap_fname =  '$video_name'";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        $video_id = $row['image_id'];
        //    echo '$video_name = '.$video_name.'</br>';
        //    echo '##';
        //    echo '$video_id = '.$video_id.'</br>';


        $fileName = "$dirName" . "\\" . "$video_id.$fileExtension";
    }
    // file_put_contents($fileName, $snapFile);
//    echo '$fileName =' . $fileName . '</br>';
    if (($videoFileSize <= $maxsize) || ($videoFileSize > 0 )) {
        move_uploaded_file($_FILES['addItemSelectVideo']['tmp_name'], $fileName);
    }
}
?>
<?php

if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=jewelleryPanel&subDivName=onlineOptionPanel&sttrId=$sttrId");
} else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/orHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'jewelleryPanel' . "&subDivName=" . 'onlineOptionPanel' . "&sttrId=" . $sttrId);
} else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/olHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'jewelleryPanel' . "&subDivName=" . 'onlineOptionPanel' . "&sttrId=" . $sttrId);
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/ogHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'jewelleryPanel' . "&subDivName=" . 'onlineOptionPanel' . "&sttrId=" . $sttrId);
} else {
    $showMess = 'Your session has expired. Please log in again!!!';
    //$showMess = 'Your product expired for update, Please renew your product or dongle!<br/>आपके उत्पाद को अपडेट करने की सीमा समाप्त हो गयी है, कृपया अपना उत्पाद या डोंगल रिन्यू कीजिए!';
    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
    //include 'omppsbdv.php';
    exit;
}
?>
