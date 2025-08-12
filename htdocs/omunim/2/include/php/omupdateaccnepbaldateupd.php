<?php

/*
 * **************************************************************************************
 * @tutorial: Update Account Opening Balance Date of firm for nepali date @Shreya 
 * **************************************************************************************
 * 
 * Created on 3 July 2024
 *
 * @FileName: omupdateaccnepbaldateupd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: 3/7/2024
 *  AUTHOR: Shreya 
 *  REASON:
 *
 */
?>
<?php

include 'system/omsachsc.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<?php
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    $selFirmId = $_SESSION['setFirmSession'];
}

if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm WHERE firm_type='Public' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id, firm_name, firm_type FROM firm WHERE firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr ORDER BY firm_since DESC";
}

if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $firmIds = array();
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $firmIds[] = $rowFirm['firm_id'];
    }
} else {
    $firmIds = explode(",", $selFirmId);
}
for ($i = 0; $i < count($firmIds); $i++) {
    $firmId = $firmIds[$i];
    $result = parse_str(getTableValues("SELECT acc_cash_balance_date FROM accounts WHERE acc_firm_id = '$firmId'"));
    $date_comp = explode(' ', $acc_cash_balance_date);
    $DD = $date_comp[0];
    $MM = $date_comp[1];
    $YY = $date_comp[2];
    $timestamp = strtotime($acc_cash_balance_date);
    $monthNumber = date('n', $timestamp);
    $DOBDate = $nepali_date->validate_en($YY, $monthNumber, $DD);

    if ($DOBDate == '1') { 
        $date_ne = $nepali_date->get_nepali_date($YY, $monthNumber, $DD);
        $acc_cash_balance_date = $date_ne['d'] . '-' . $date_ne['m'] . '-' . $date_ne['y'];
        $cashbalancedate = '1 04 ' . $date_ne['y'];
    $updatequery = "UPDATE accounts SET acc_cash_balance_date = '$cashbalancedate' WHERE acc_firm_id = '$firmId'";
    if (!mysqli_query($conn, $updatequery)) {
        die('Error: ' . mysqli_error($conn));
    }
    }
}
?>
