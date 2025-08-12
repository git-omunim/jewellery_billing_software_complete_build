<?php

/*
 * Created on 01-Aug-2011 10:56:17 PM
 *
 * @FileName: orgnttsg.php
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

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';
require_once 'ommpincr.php';
?>
<?php

$totalPersonalGirviPrincipal = 0;
$startDate = strtotime($girviDOR);

if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    if ($selFirmId != NULL) {
        $strFrmId = $selFirmId;
    } else {
        //Get Public Firms
        $qSelPubFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
        $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);
        $strFrmId = '0';
        //Set String for Public Firms
        while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
        }
    }
    //query to show Transferd Girvi of selected Day @AUTHOR: SANDY5AUG13
    $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_firm_id IN ($strFrmId) and gtrans_upd_sts IN ('Transferred') and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))='$startDate'";
    //query to show Total Transferd Girvi upto selected Day @AUTHOR: SANDY5AUG13
    $qSelectTotal = "SELECT SUM(gtrans_prin_amt) as total FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_firm_id IN ($strFrmId) and gtrans_upd_sts IN ('Transferred') and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))<='$startDate'";

    $qResult = mysqli_query($conn,$qSelect);
    $qResultTotal = mysqli_query($conn,$qSelectTotal);

    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
    $rowTotal = mysqli_fetch_array($qResultTotal, MYSQLI_ASSOC);

    $totalNewTransferedGirviPrincipal = $row['total_prin'];
    $totalTransferedGirviPrincipal = $rowTotal['total'];
     //to check panel and display values @AUTHOR: SANDY5AUG13 
    if ($panelName == 'TodaysTransferred') {
        echo formatInIndianStyle($totalNewTransferedGirviPrincipal);
    } else {
        echo formatInIndianStyle($totalTransferedGirviPrincipal);
    }
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    if ($selFirmId == '' || $selFirmId == NULL) {
           //query to show Transferd Girvi of selected Day @AUTHOR: SANDY5AUG13
        $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Transferred') and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))='$startDate'";
          //query to show Total Transferd Girvi upto selected Day @AUTHOR: SANDY5AUG13
        $qSelectTotal = "SELECT SUM(gtrans_prin_amt) as total FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts IN ('Transferred') and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))<='$startDate'";
    } else {
        $qSelect = "SELECT SUM(gtrans_prin_amt) as total_prin FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_firm_id IN ($selFirmId) and gtrans_upd_sts IN ('Transferred') and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))='$startDate'";
        $qSelectTotal = "SELECT SUM(gtrans_prin_amt) as total FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_firm_id IN ($selFirmId) and gtrans_upd_sts IN ('Transferred') and UNIX_TIMESTAMP(STR_TO_DATE(gtrans_DOB,'%d %b %Y'))<='$startDate'";
    }
    $qResult = mysqli_query($conn,$qSelect);
    $qResultTotal = mysqli_query($conn,$qSelectTotal);
    $row = mysqli_fetch_array($qResult, MYSQLI_ASSOC);
    $rowTotal = mysqli_fetch_array($qResultTotal, MYSQLI_ASSOC);
    $totalNewTransferedGirviPrincipal = $row['total_prin'];
    $totalTransferedGirviPrincipal = $rowTotal['total'];
     //to check panel and display values @AUTHOR: SANDY5AUG13 
    if ($panelName == 'TodaysTransferred') {
        echo formatInIndianStyle($totalNewTransferedGirviPrincipal);
    } else {
        echo formatInIndianStyle($totalTransferedGirviPrincipal);
    }
}
?>
