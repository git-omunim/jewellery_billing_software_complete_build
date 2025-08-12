<?php /**
 * 
 * Created on Jul 4, 2011 12:34:51 PM
 *
 * @FileName: oradmrpr.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
 */ ?>
<?php

//change in file @AUTHOR: SANDY04JAN14

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';

$mlId = $_POST['mlIdField'];
$loanId = $_POST['loanNoField'];
$loanSerNoField = $_POST['loanSerNoField'];
$prin = $_POST['prinAmt'];
$roi = $_POST['prinRoi'];
$addCust = $_POST['prinCustName'];
$addFirm = $_POST['prinFirm'];
$principalNo = $_POST['addPrinNo'];
$day = $_POST['prinTransDOBDay'];
$month = $_POST['prinTransDOBMonth'];
$year = $_POST['prinTransDOBYear'];
$prinPacket = $_POST['prinPacket'];//Add packet no @Author:ANUJA30JUL15
$trDate = $day . ' ' . $month . ' ' . $year;
$ownerId = $_SESSION[sessionOwnerId];

$preMlSrNo = preg_replace("/[^a-zA-Z]+/", "", $loanSerNoField);
$postMlSrNo = preg_replace("/[^0-9]+/", "", $loanSerNoField);

$preSrNo = preg_replace("/[^a-zA-Z]+/", "", $principalNo);
$postSrNo = preg_replace("/[^0-9]+/", "", $principalNo);

$selGirviDet = "SELECT * FROM girvi_principal WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_pre_id='$preSrNo' and girv_prin_post_id='$postSrNo'";
$resSelGirviDet = mysqli_query($conn,$selGirviDet);
$rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC);
$custId = $rowSelGirviDet['girv_prin_cust_id'];
$prinId = $rowSelGirviDet['girv_prin_id'];
$girviId = $rowSelGirviDet['girv_prin_girv_id'];
$trFirmId = $rowSelGirviDet['girv_prin_firm_id'];
//$trFirmLnNo = $rowSelGirviDet['girv_firm_girvi_no'];
$roi = $rowSelGirviDet['girv_prin_prin_roi'];

/* * ****************Start code to add sys log var @Author:PRIYA05JUL14*************** */
$sslg_trans_sub = 'MONEYL ADD PRIN TRANSFERRED';
$sysLogTransType = 'transLoan';
$sslg_firm_id = $addFirm;
$sysLogTransId = $loanSerNoField;
$sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Loan Prin Id: ' . $preSrNo . $postSrNo . ', Loan Date: ' . $trDate . ', Amt: ' . formatInIndianStyle($prin);
include 'omslgapi.php';
$addSysLogInd = 'NO';
/* * ****************End code to add sys log var @Author:PRIYA05JUL14*********************** */

//get loan firm id
$selectQry = "SELECT ml_firm_id FROM ml_loan WHERE ml_own_id='$ownerId' and ml_id='$loanId'";
$resSelQry = mysqli_query($conn,$selectQry);
$row = mysqli_fetch_array($resSelQry, MYSQLI_ASSOC);
$firmId = $row['ml_firm_id'];

$getRoiType = "SELECT girv_ROI_typ FROM girvi WHERE girv_id IN(SELECT girv_prin_girv_id FROM girvi_principal WHERE girv_prin_pre_id='$preSrNo' and girv_prin_post_id='$postSrNo')"; //change in query @AUTHOR: SANDY10JAN14
$resRoiType = mysqli_query($conn,$getRoiType);
$row = mysqli_fetch_array($resRoiType, MYSQLI_ASSOC);
$trPrinRoiType = $row['girv_ROI_typ'];

$qSelFirmGirviNo = "SELECT max(gtrans_firm_girvi_no) as firmGirviNo FROM girvi_transfer where gtrans_firm_id='$firmId' and gtrans_own_id='$ownerId'";
$resFirmGirviNo = mysqli_query($conn,$qSelFirmGirviNo);
$rowFirmGirviNo = mysqli_fetch_array($resFirmGirviNo, MYSQLI_ASSOC);
$girviTransFirmGirviNo = $rowFirmGirviNo['firmGirviNo'] + 1;

/* * **********Start code to select gtrans serial no @Author:PRIYA21JAN15******************** */
include 'olgtsrnm.php';
/* * **********End code to select gtrans serial no @Author:PRIYA21JAN15******************** */
//insert into girvi_transfer table
/* * *******Start code to add serail no @Author:PRIYA28JUN14**************** */
$insertQuery = "INSERT INTO girvi_transfer
    (gtrans_cust_id,gtrans_girvi_id,gtrans_prin_id,gtrans_own_id,gtrans_firm_id,gtrans_firm_type,gtrans_firm_girvi_no,gtrans_exist_firm_id,
		gtrans_prin_amt,gtrans_ROI,gtrans_ROI_typ,gtrans_pre_serial_num,gtrans_serial_num, gtrans_packet_num,gtrans_DOB,gtrans_upd_sts,gtrans_ent_dat,gtrans_prin_typ,
                gtrans_trans_loan_id,global_gt_pre_serial_num,global_gt_serial_num)VALUES
                ('$custId','$girviId','$prinId','$ownerId','','MoneyLender','$girviTransFirmGirviNo','$trFirmId','$prin','$roi','$trPrinRoiType','$girviPreSerialNo','$girviSerialNo','$prinPacket',"
        . "'$trDate','Transferred',$currentDateTime,'AdditionalPrin','$loanId','$preMlSrNo','$postMlSrNo')";

if (!mysqli_query($conn,$insertQuery)) {
    die('Error: ' . mysqli_error($conn));
}
/* * *******End code to add serail no @Author:PRIYA28JUN14**************** */
//Start Code To Update Gtrans Id 
$qSelGTransId = "SELECT gtrans_id FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' order by gtrans_id desc LIMIT 0,1";
$resGTransId = mysqli_query($conn,$qSelGTransId);
$rowGTransId = mysqli_fetch_array($resGTransId, MYSQLI_ASSOC);
$girviTransGriviId = $rowGTransId['gtrans_id'];

//End Code To Update Gtrans Id 
//get details of money lender from supplier table
//-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
$selMlDet = "SELECT user_id FROM user WHERE user_owner_id='$ownerId' and user_id='$mlId' and user_category='Money Lender'";
$resSelMlDet = mysqli_query($conn,$selMlDet);
$row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
$mlLenderCode = $row['user_id'];

//get details of money lender from supplier table
$selMlDet = "SELECT * FROM user WHERE user_owner_id='$ownerId' and user_id='$mlId' and user_category='Money Lender'";
$resSelMlDet = mysqli_query($conn,$selMlDet);
$row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
$mlCode = $row['user_unique_code'];
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
//update girvi status in girvi table //change in query to insert serial number in trans_loan_id field @AUTHOR: SANDY04JAN14
/* * **********Start code to update girvi table @Author:PRIYA21JAN15******************** */
$query = "UPDATE girvi SET 
            girv_transfer_id='$girviTransGriviId',girv_transfer_ml_id='$mlLenderCode',girv_trans_loan_id='$loanSerNo'
            WHERE girv_own_id='$_SESSION[sessionOwnerId]' and girv_id ='$girviId'";
if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
/* * **********End code to update girvi table @Author:PRIYA21JAN15******************** */
$query = "UPDATE girvi_principal SET 
            girv_prin_transfer_id='$girviTransGriviId',girv_prin_trans_loan_id='$loanSerNoField',girv_prin_trans_ml_id='$mlCode'
            WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_id ='$prinId'";
if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
//UPDATE ML LOAN TYPE @AUTHOR: SANDY31JAN14
$updateMlLoanType = "UPDATE ml_loan SET ml_type='secured' WHERE ml_own_id='$ownerId' and ml_id='$loanId'";
if (!mysqli_query($conn,$updateMlLoanType)) {
    die('Error: ' . mysqli_error($conn));
}
header("Location: $documentRoot/include/php/ormlupln.php?mlId=$mlId&loanId=$loanId");
?>