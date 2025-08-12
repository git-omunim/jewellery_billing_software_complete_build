<?php

/*
 * **************************************************************************************
 * @tutorial: Show Video
 * **************************************************************************************
 * 
 * Created on Mar 18, 2013 10:52:11 AM
 *
 * @FileName: omShowVideo.php
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

//echo 'aa = '.$videoId.'<br/>';
// Start Input Fields
// $imageId // Image Id
// End Input Fields
if ($videoId != NULL && $videoId != '') {
    $selectVideoQuery = "SELECT * FROM image WHERE image_id='$videoId'";
    //echo $selectVideoQuery.'<br/>';
    $resultVideoQuery = mysqli_query($conn, $selectVideoQuery);
    $rowVideoQuery = mysqli_fetch_array($resultVideoQuery, MYSQLI_ASSOC);

    $videoFileName = $rowVideoQuery['image_snap_fname'];
    $videoFileSize = $rowVideoQuery['image_snap_fszMB'];
    $videoFileType = $rowVideoQuery['image_snap_ftype'];

    // echo '$videoFileSize = '.$videoFileSize.'<br/>';
    if ((float) $videoFileSize > 0) {
        if ($_SESSION['sessionSoftHost'] == 'HOSTING') {
            $images_omunim = 'images_omunim';
        } else {
            $images_omunim = 'images.omunim';
        }
        if ($systemOnOrOff == 'ON') {
            $dirPath = substr($_SERVER["DOCUMENT_ROOT"], 0, strrpos($_SERVER["DOCUMENT_ROOT"], '/'));
            $dirName = $dirPath . "/$images_omunim/" . $_SESSION['sessionOwnerId'];
            /// echo 'inif $dirName = '.$dirName.'</br>';
        } else {
            $dirPath = $_ENV["S2G_DB_PATH"] . 'images.omunim';
            //Check if the directory already exists.
            if (!is_dir($dirPath)) {
                //Directory does not exist, so lets create it.
                mkdir($dirPath, 0755);
            }
            //
            $dirName = $dirPath . '\\' . $_SESSION['sessionOwnerId'];
            //  echo 'inelse $dirName = '.$dirName.'</br>';
        }
//
//Check if the directory already exists.
        if (!is_dir($dirName)) {
            //Directory does not exist, so lets create it.
            mkdir($dirName, 0755);
        }
//
//echo '$videoFileName = '.$videoFileName.'</br>';
        // Get the extension name
        $path_parts = pathinfo($videoFileName);
        $fileExtension = $path_parts['extension'];
        //
        if ($fileExtension == '' || $fileExtension == NULL)
            $fileExtension = 'mp4';
        //
        if ($systemOnOrOff == 'ON') {
            $fileName = "$dirName/$videoId.$fileExtension";
            //    echo 'inif2 $dirName = '.$dirName.'</br>';
        } else {
            $fileName = "$dirName" . "\\" . "$videoId.$fileExtension";
            //    echo 'inelse2 $dirName = '.$dirName.'</br>';
        }
        //
        //   echo '<br/>videoFileType: '.$videoFileType;
        //  echo '<br/>FileName: '.$fileName;exit();
//
        header("content-type: $videoFileType");
        echo file_get_contents($fileName);
    } else {
        echo 'video Size is Zero!';
    }
} else {
    echo 'No video Present!';
}
?>
