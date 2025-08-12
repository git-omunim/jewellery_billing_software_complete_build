<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'ommpfndv.php';

if ($request['user_type'] == "CUSTOMER") {
    if ($request['addCustDOBMonth'] == 'NotSelected' || $request['addCustDOBDay'] == 'NotSelected' || $request['addCustDOBYear'] == 'NotSelected') {
        $payAddDate = 'N/A';
    } else {
        $payAddDate = trim($request['addCustDOBDay'] . ' ' . $request['addCustDOBMonth'] . ' ' . $request['addCustDOBYear']);
    }
    $payAddDate = mysqli_real_escape_string($conn, stripslashes($payAddDate));
    $firmId = mysqli_real_escape_string($conn, stripslashes(trim($request['firmId'])));
    $payTotalAmtBal = mysqli_real_escape_string($conn, stripslashes(trim($request['custCashBalance'])));
    $payCashCRDR = mysqli_real_escape_string($conn, stripslashes(trim($request['custCashBalCrDr'])));
    $payGMetalDueWt = mysqli_real_escape_string($conn, stripslashes(trim($request['custGoldWeightBal'])));
    $payGMetalDueWtType = mysqli_real_escape_string($conn, stripslashes(trim($request['custGoldWeightType'])));
    $payGdCRDR = mysqli_real_escape_string($conn, stripslashes(trim($request['custGoldWeightCrDr'])));
    $paySMetalDueWt = mysqli_real_escape_string($conn, stripslashes(trim($request['custSilverWeightBal'])));
    $paySMetalDueWtType = mysqli_real_escape_string($conn, stripslashes(trim($request['custSilverWeightBalGM'])));
    $paySlCRDR = mysqli_real_escape_string($conn, stripslashes(trim($request['custSilverWeightBalCrDr'])));
    // variables for crystal : darshana 13 july 2021
    $payStMetalDueWt = mysqli_real_escape_string($conn, stripslashes(trim($request['custCrystalWeightBal'])));
    $payStMetalDueWtType = mysqli_real_escape_string($conn, stripslashes(trim($request['custCrystalWeightBalGM'])));
    $payStCRDR = mysqli_real_escape_string($conn, stripslashes(trim($request['custCrystalWeightBalCrDr'])));
} else if ($request['user_type'] == "SUPPLIER") {
    if ($request['addSuppDOBMonth'] == 'NotSelected' || $request['addSuppDOBDay'] == 'NotSelected' || $request['addSuppDOBYear'] == 'NotSelected') {
        $payAddDate = 'N/A';
    } else {
        $payAddDate = trim($request['addSuppDOBDay'] . ' ' . $request['addSuppDOBMonth'] . ' ' . $request['addSuppDOBYear']);
    }
    $payAddDate = mysqli_real_escape_string($conn, stripslashes($payAddDate));
    $firmId = mysqli_real_escape_string($conn, stripslashes(trim($request['firmId'])));
    $payTotalAmtBal = mysqli_real_escape_string($conn, stripslashes(trim($request['cashBalance'])));
    $payCashCRDR = mysqli_real_escape_string($conn, stripslashes(trim($request['suppCashBalCrDr'])));
    $payGMetalDueWt = mysqli_real_escape_string($conn, stripslashes(trim($request['suppGoldWeightBal'])));
    $payGMetalDueWtType = mysqli_real_escape_string($conn, stripslashes(trim($request['suppGoldWeightType'])));
    $payGdCRDR = mysqli_real_escape_string($conn, stripslashes(trim($request['suppGoldWeightCrDr'])));
    $paySMetalDueWt = mysqli_real_escape_string($conn, stripslashes(trim($request['suppSilverWeightBal'])));
    $paySMetalDueWtType = mysqli_real_escape_string($conn, stripslashes(trim($request['suppSilverWeightBalGM'])));
    $paySlCRDR = mysqli_real_escape_string($conn, stripslashes(trim($request['suppSilverWeightBalCrDr'])));
    //// variables for crystal : darshana 13 july 2021
    $payStMetalDueWt = mysqli_real_escape_string($conn, stripslashes(trim($request['suppCrystalWeightBal'])));
    $payStMetalDueWtType = mysqli_real_escape_string($conn, stripslashes(trim($request['suppCrystalWeightBalGM'])));
    $payStCRDR = mysqli_real_escape_string($conn, stripslashes(trim($request['suppCrystalWeightBalCrDr'])));
}
$utinType = 'opening';
if ($payCashCRDR == 'DR') {
    $payTotalAmtBal = 0 - $payTotalAmtBal;
}

// CONVERT OPENING METAL WEIGHT IN "GM"
$payGMetalDueWt = getTotalWeight($payGMetalDueWt, $payGMetalDueWtType, 'weight');
$payGMetalDueWtType = 'GM';
$paySMetalDueWt = getTotalWeight($paySMetalDueWt, $paySMetalDueWtType, 'weight');
$paySMetalDueWtType = 'GM';
$payStMetalDueWt = getTotalWeight($payStMetalDueWt, $payStMetalDueWtType, 'weight');
$payStMetalDueWtType = 'CT';

if ($payGdCRDR == 'DR') {
    $payGMetalDueWt = 0 - $payGMetalDueWt;
}
if ($paySlCRDR == 'DR') {
    $paySMetalDueWt = 0 - $paySMetalDueWt;
}
if ($payStCRDR == 'DR') {
    $payStMetalDueWt = 0 - $payStMetalDueWt;
}
//echo '$payTotalAmtBal:' . $payTotalAmtBal; exit();
?>