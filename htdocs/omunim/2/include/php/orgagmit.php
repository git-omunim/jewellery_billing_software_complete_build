<?php

/*
 * Created on Mar 19, 2011 5:40:38 PM
 *
 * @FileName: orgagmit.php
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
?>
<?php

$custId = $_POST['custId'];
$firmId = $_POST['firmId'];

if ($custId == '') {
    $custId = $_GET['custId'];
}
?>
<?php

// how many rows to show per page
$perRowsPerPage = 1;

// by default we show first page
$perPageNum = 1;

// if $_GET['page'] defined, use it as page number
if (isset($_GET['page'])) {
    $perPageNum = $_GET['page'];
}

// counting the offset
$perOffset = ($perPageNum - 1) * $perRowsPerPage;

$qSelTotalGirviCount = "SELECT girv_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_cust_id='$custId'";
$resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount);
$totalGirvi = mysqli_num_rows($resTotalGirviCount);

$qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_cust_id='$custId' order by girv_ent_dat desc LIMIT $perOffset, $perRowsPerPage";
$resAllGirvi = mysqli_query($conn,$qSelAllGirvi);
$totalNextGirvi = mysqli_num_rows($resAllGirvi);

if ($totalGirvi <= 0) {
    echo "<div class=" . "spaceLeft40" . "><h4> ~ Girvi not available in database ~ </h4></div>";
}
if ($totalNextGirvi <= 0) {
    echo "<div class=" . "spaceLeft40" . "><h4> ~ No More Girvi's are available. Go to previous Girvi. ~ </h4></div>";
}
while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

    $mainPrincAmount = $rowAllGirvi['girv_main_prin_amt'];
    $princAmount = $rowAllGirvi['girv_prin_amt'];
    $ROIId = $rowAllGirvi['girv_ROI_Id'];
    //Start Code to check ROI Id is null or not
    if ($ROIId == NULL || $ROIId == '') {
        $ROI = $rowAllGirvi['girv_ROI'];

        $qSelROI = "SELECT roi_id FROM roi where roi_value='$ROI'";
        $resROI = mysqli_query($conn,$qSelROI);
        $rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
        $ROIId = $rowROI['roi_id'];

        $qUpdGirvi = "UPDATE girvi SET girv_ROI_Id='$ROIId'
                                         WHERE girv_id='$girviId' and girv_cust_id='$custId' and girv_own_id='$_SESSION[sessionOwnerId]'";

        if (!mysqli_query($conn,$qUpdGirvi)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    //End Code to check ROI Id is null or not
    if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $ROI = $rowAllGirvi['girv_IROI'];

        //$qSelROI = "SELECT roi_id FROM roi where iroi_value='$ROI'";
        //$resROI = mysqli_query($conn,$qSelROI);
        //$rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
        //$ROIId = $rowROI['roi_id'];
    } else {
        $ROI = $rowAllGirvi['girv_ROI'];

        //$qSelROI = "SELECT roi_id FROM roi where roi_value='$ROI'";
        //$resROI = mysqli_query($conn,$qSelROI);
        //$rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
        //$ROIId = $rowROI['roi_id'];
    }
    $ROIType = $rowAllGirvi['girv_ROI_typ'];
    $girviDOB = $rowAllGirvi['girv_DOB'];
    $girviId = $rowAllGirvi['girv_id'];
    $girviType = $rowAllGirvi['girv_type'];

    include 'orgagmid.php';
}
?>
