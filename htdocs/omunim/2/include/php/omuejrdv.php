<?php

/*
 * **************************************************************************************
 * @tutorial: Udhaar EMI jr div
 * **************************************************************************************
 * 
 * Created on Nov 17, 2014 9:09:33 AM
 *
 * @FileName: omuejrdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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

$qSelAllUdhaarDepMon = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_EMI_status = 'Paid' order by (udhadepo_EMI_no + udhadepo_id) asc";
$resAllUdhaarDepMon = mysqli_query($conn,$qSelAllUdhaarDepMon);
while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC)) {
$udhaarEMISatus = $rowUdhaarDepMon['udhadepo_EMI_status'];
$uDepId = $rowUdhaarDepMon['udhadepo_id'];
$custId = $rowUdhaarDepMon['udhadepo_cust_id'];
$firmId = $rowUdhaarDepMon['udhadepo_firm_id'];
$udhaarId = $rowUdhaarDepMon['udhadepo_udhaar_id'];
$emiAmt = $rowUdhaarDepMon['udhadepo_EMI_total_amt'];
$uEMIAmt = $rowUdhaarDepMon['udhadepo_EMI_amt'];
$uEMIIntAmt = $rowUdhaarDepMon['udhadepo_EMI_int_amt'];
$emiPaidDate = $rowUdhaarDepMon['udhadepo_EMI_paid_date'];
/* * **************Start to add code to update EMI Amount @Author:SHRI01AUG15************** */
$uTotEMIAmt = $uEMIAmt + $uEMIIntAmt;
if ($uTotEMIAmt != $emiAmt) {
$uEMIAmt = $emiAmt - $uEMIIntAmt;
}
/* * **************End to add code to update EMI Amount @Author:SHRI01AUG15************** */
$apiType = 'insert';
include 'omuemijr.php';
}
?>