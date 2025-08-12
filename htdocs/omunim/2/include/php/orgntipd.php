<?php

/*
 * **************************************************************************************
 * @tutorial: Calculate Total per day Interest Earn
 * **************************************************************************************
 * 
 * Created on May 1, 2012 5:28:28 PM
 *
 * @FileName: orgntipd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
require_once 'ommpincr.php';
?>
<?php

require_once 'system/omssopin.php';
?>
<?php
$startDate = $girviDOR;
$startDate = strtotime($startDate);

if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
//$qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resPubFirmCount = mysqli_query($conn,$qSelFirmCount);
if ($selFirmId != NULL) {
    $strFrmId = $selFirmId;
} else {
    $strFrmId = '0';

//Set String for Public Firms

    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
    }
}


$qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId)";
$resAllGirvi = mysqli_query($conn,$qSelAllGirvi);

$totalPerDayIntAmount = 0;

while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

    $girviId = $rowAllGirvi['girv_id'];
    $custId = $rowAllGirvi['girv_cust_id'];
    $princAmount = $rowAllGirvi['girv_main_prin_amt'];
    $newPrincAmount = $rowAllGirvi['girv_prin_amt'];
    $girviMainDOB = $rowAllGirvi['girv_DOB'];
    $gMonthIntOption = 'DD';

    if ($girviDOR == '' or $girviDOR == NULL) {
        $girviDOR = date('d-M-Y');
    }
    $girviDOB = $girviDOR;
    $girviNewDOB = $girviDOB;

    $girviMainDOBStrToTime = strtotime($girviMainDOB);
    $ROIType = $rowAllGirvi['girv_ROI_typ'];
    if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $ROI = $rowAllGirvi['girv_IROI'];
    } else {
        $ROI = $rowAllGirvi['girv_ROI'];
    }
    $girviType = $rowAllGirvi['girv_type'];
    $gMonthIntOption = 'DD';

    $girviDORStrToTime = strtotime($girviDOR);

    if ($girviMainDOBStrToTime <= $girviDORStrToTime) {
        include 'ommpgvip.php';
    }
    $totalPerDayIntAmount += $totalFinalPerDayIntCalculate;
}

echo formatInIndianStyle($totalPerDayIntAmount);
?>    