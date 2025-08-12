<?php

/*
 * ********************************************************************************************
 * @tutorial: UPDATE SIMILAR PRODUCT ID INTO CURRENT PRODUCT FILE @AUTHOR:MADHUREE-10AUGUST2022
 * ********************************************************************************************
 *
 * Created on 10 AUGUST, 2022 01:48:00 PM
 * 
 * @FileName: omupdatesimprod.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.166
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 * Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: 
 *  REASON: 
 */
?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

//
$updateType = $_REQUEST['updateType'];
//
if ($updateType == 'productSetting') {
    //
    $sttr_id = trim($_REQUEST['sttr_id']);
    $min_size = trim($_REQUEST['min_size']);
    $max_size = trim($_REQUEST['max_size']);
    $size_type = trim($_REQUEST['size_type']);
    $min_weight = trim($_REQUEST['min_weight']);
    $max_weight = trim($_REQUEST['max_weight']);
    //
    $qUpdateStock = "UPDATE stock_transaction SET sttr_min_size='$min_size',sttr_max_size='$max_size',sttr_size_type='$size_type',"
            . " sttr_min_weight='$min_weight',sttr_max_weight='$max_weight' WHERE sttr_id='$sttr_id'";
    //
    if (!mysqli_query($conn, $qUpdateStock)) {
        die('Error: ' . mysqli_error($conn) . ' Query:' . $qUpdateStock);
    }
    //
} else {
    //
    $similar_prod_id = trim($_REQUEST['similar_prod_id']);
    $sttr_id = trim($_REQUEST['sttr_id']);
    $operation = trim($_REQUEST['operation']);
    //
    if ($operation == 'removeSimilarProduct') {
        //
        if ($sttr_id != '' && $similar_prod_id != '') {
            //
            parse_str(getTableValues("SELECT sttr_similar_prod_id FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_id = '$sttr_id'"));
            //
            if (strpos($sttr_similar_prod_id, $similar_prod_id) !== false) {
                $similar_prod_sttr_id = str_replace($similar_prod_id . '#', '', $sttr_similar_prod_id);
            } else {
                $similar_prod_sttr_id = $sttr_similar_prod_id;
            }
            //
            $qUpdateStock = "UPDATE stock_transaction SET sttr_similar_prod_id='$similar_prod_sttr_id' WHERE sttr_id='$sttr_id'";
            //
            if (!mysqli_query($conn, $qUpdateStock)) {
                die('Error: ' . mysqli_error($conn) . ' Query:' . $qUpdateStock);
            }
            //
        }
        //
        if ($similar_prod_id != '' && $sttr_id != '') {
            //
            parse_str(getTableValues("SELECT sttr_similar_prod_id FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_id = '$similar_prod_id'"));
            //
            if (strpos($sttr_similar_prod_id, $sttr_id) !== false) {
                $similar_prod_sttr_id = str_replace($sttr_id . '#', '', $sttr_similar_prod_id);
            } else {
                $similar_prod_sttr_id = $sttr_similar_prod_id;
            }
            //
            $qUpdateStock = "UPDATE stock_transaction SET sttr_similar_prod_id='$similar_prod_sttr_id' WHERE sttr_id='$similar_prod_id'";
            //
            if (!mysqli_query($conn, $qUpdateStock)) {
                die('Error: ' . mysqli_error($conn) . ' Query:' . $qUpdateStock);
            }
            //
        }
        //
    } else {
        //
        if ($sttr_id != '' && $similar_prod_id != '') {
            //
            parse_str(getTableValues("SELECT sttr_similar_prod_id FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_id = '$sttr_id'"));
            //
            if ($sttr_similar_prod_id != '') {
                $similar_prod_sttr_id = $sttr_similar_prod_id . $similar_prod_id . '#';
            } else {
                $similar_prod_sttr_id = $similar_prod_id . '#';
            }
            //
            $qUpdateStock = "UPDATE stock_transaction SET sttr_similar_prod_id='$similar_prod_sttr_id' WHERE sttr_id='$sttr_id'";
            //
            if (!mysqli_query($conn, $qUpdateStock)) {
                die('Error: ' . mysqli_error($conn) . ' Query:' . $qUpdateStock);
            }
            //
        }
        //
        if ($similar_prod_id != '' && $sttr_id != '') {
            //
            parse_str(getTableValues("SELECT sttr_similar_prod_id FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_id = '$similar_prod_id'"));
            //
            if ($sttr_similar_prod_id != '') {
                $similar_prod_sttr_id = $sttr_similar_prod_id . $sttr_id . '#';
            } else {
                $similar_prod_sttr_id = $sttr_id . '#';
            }
            //
            $qUpdateStock = "UPDATE stock_transaction SET sttr_similar_prod_id='$similar_prod_sttr_id' WHERE sttr_id='$similar_prod_id'";
            //
            if (!mysqli_query($conn, $qUpdateStock)) {
                die('Error: ' . mysqli_error($conn) . ' Query:' . $qUpdateStock);
            }
            //
        }
        //
    }
    //
    $sttr_similar_prod_id = '';
    parse_str(getTableValues("SELECT sttr_similar_prod_id FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' AND sttr_id = '$sttr_id'"));
    //
    $sttr_similar_prod_id = urlencode($sttr_similar_prod_id);
    header("Location: $documentRoot/include/php/omsimilarprod.php?sttrId=$sttr_id&sttr_similar_prod_id=$sttr_similar_prod_id");
    //
}
?>