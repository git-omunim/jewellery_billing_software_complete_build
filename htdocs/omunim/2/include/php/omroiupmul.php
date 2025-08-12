<?php
/*
 * Created on JULY 22 2022, 7:45PM
 *
 * @FileName: omroiupmul.php
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
require_once 'ommpincr.php';
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';
//START CODE FOR  CHANGE ALL ACTIVE LOAN  RIO: AUTHOR : GANGADHAR 22 JULY 2022
$custId = trim($_GET['custId']);
$updateallloanROI =$_GET['updateallloanROI'];

$allLoanIds = $_GET['allLoanIds'];

if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    
$qUpdateGirviROI = "UPDATE girvi SET
		girv_IROI='$updateallloanROI'
		WHERE girv_cust_id='$custId' and girv_upd_sts ='NEW'";

                    if (!mysqli_query($conn, $qUpdateGirviROI)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                    include 'omcdcshm.php';
}else{
$qUpdateGirviROI = "UPDATE girvi SET
		girv_ROI='$updateallloanROI'
		WHERE girv_cust_id='$custId' and girv_upd_sts ='NEW'";

                    if (!mysqli_query($conn, $qUpdateGirviROI)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                     include 'omcdcshm.php';
}
//END CODE FOR  CHANGE ALL ACTIVE LOAN  RIO: AUTHOR : GANGADHAR 22 JULY 2022
?>
