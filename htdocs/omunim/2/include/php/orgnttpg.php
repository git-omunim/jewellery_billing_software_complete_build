<?php

/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: orgnttpg.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';
require_once 'ommpincr.php';
?>
<?php

$totalPersonalGirviPrincipal = 0;

if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    
    //Get Public Firms with Self Owner Type
    $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_owner='Self' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);

    $strFrmId = '0';
    
    //Set String for Public Firms
    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
    }
    
    //Get Total Principal Amount from Girvi Table
    $qSelect = "SELECT SUM(girv_prin_amt) as total_prin FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts IN ('New','Updated','ReleaseCart')";
    $qResult = mysqli_query($conn,$qSelect);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

    $totalPersonalGirviPrincipal = $row['total_prin'];

    //Get Total Principal Amount from Additional Pricipal Table
    $qSelect = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_firm_id IN ($strFrmId) and girv_prin_upd_sts IN ('New','Updated','ReleaseCart')";
    $qResult = mysqli_query($conn,$qSelect);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

    $totalPersonalGirviPrincipal += $row['total_prin'];

    echo formatInIndianStyle($totalPersonalGirviPrincipal);
    
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    
    //Get All Firms with Self Owner Type
    $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_owner='Self' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);

    $strFrmId = '0';
    
    //Set String for Public Firms
    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
    }
    
    //Get Total Principal Amount from Girvi Table
    $qSelect = "SELECT SUM(girv_prin_amt) as total_prin FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_upd_sts IN ('New','Updated','ReleaseCart')";
    $qResult = mysqli_query($conn,$qSelect);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

    $totalPersonalGirviPrincipal = $row['total_prin'];

    //Get Total Principal Amount from Additional Pricipal Table
    $qSelect = "SELECT SUM(girv_prin_prin_amt) as total_prin FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_firm_id IN ($strFrmId) and girv_prin_upd_sts IN ('New','Updated','ReleaseCart')";
    $qResult = mysqli_query($conn,$qSelect);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);

    $totalPersonalGirviPrincipal += $row['total_prin'];

    echo formatInIndianStyle($totalPersonalGirviPrincipal);
}
?>