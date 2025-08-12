<?php /**
 * 
 * Created on Jul 4, 2011 12:34:51 PM
 *
 * @FileName: ormlmrgv.php
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

//changes in file @AUTHOR: SANDY03JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';

$mlId = $_POST['mlIdField'];
$loanId = $_POST['loanIdField'];
$prin = $_POST['addPrinAmt'];
$roi = $_POST['addRoi'];
$addCust = $_POST['addCustName'];
$addFirm = $_POST['addFirm'];
$girviNo = $_POST['addLoanNo'];
$day = $_POST['mlAddLnDOBDay'];
$month = $_POST['mlAddLnDOBMonth'];
$loanSerNo = $_POST['loanSerNo'];
$year = $_POST['mlAddLnDOBYear'];
$packetNo=$_POST['addPacketNo'];//get packet no. @Author:SHRI18MAY15
$otherInfo=$_POST['addOtherInfo'];//get other info @Author:SHRI18MAY15

$trDate = $day . ' ' . $month . ' ' . $year;
$ownerId = $_SESSION[sessionOwnerId];


$preMlSrNo = preg_replace("/[^a-zA-Z]+/", "", $loanSerNo);
$postMlSrNo = preg_replace("/[^0-9]+/", "", $loanSerNo);

$preSrNo = preg_replace("/[^a-zA-Z]+/", "", $girviNo);
$postSrNo = preg_replace("/[^0-9]+/", "", $girviNo);

$selGirviDet = "SELECT * FROM girvi WHERE girv_own_id='$_SESSION[sessionOwnerId]' and girv_pre_serial_num='$preSrNo' and girv_serial_num='$postSrNo'";
$resSelGirviDet = mysqli_query($conn,$selGirviDet);
$rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC);
$custId = $rowSelGirviDet['girv_cust_id'];
$girviId = $rowSelGirviDet['girv_id'];
$trFirmId = $rowSelGirviDet['girv_firm_id'];
$trFirmLnNo = $rowSelGirviDet['girv_firm_girvi_no'];
$roiTp = $rowSelGirviDet['girv_ROI_typ'];
$roiId = $rowSelGirviDet['girv_ROI_Id'];
$iroi = $rowSelGirviDet['girv_IROI'];
$mnthIntOpt = $rowSelGirviDet['girv_monthly_intopt'];
$compoundOpt = $rowSelGirviDet['girv_compounded_opt'];
$intOpt = $rowSelGirviDet['girv_int_opt'];

/* * ****************Start code to add sys log var @Author:PRIYA05JUL14*************** */
$sslg_trans_sub = 'MONEYL NEW LOAN TRANSFERRED';
$sysLogTransType = 'transLoan';
$sslg_firm_id = $addFirm;
$sysLogTransId = $loanSerNo;
$sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Loan Date: ' . $trDate . ', Amt: ' . formatInIndianStyle($prin);
include 'omslgapi.php';
$addSysLogInd = 'NO';
/* * ****************End code to add sys log var @Author:PRIYA05JUL14*********************** */

//get loan firm id
$selectQry = "SELECT ml_firm_id FROM ml_loan WHERE ml_own_id='$ownerId' and ml_id='$loanId'";
$resSelQry = mysqli_query($conn,$selectQry);
$row = mysqli_fetch_array($resSelQry, MYSQLI_ASSOC);
$firmId = $row['ml_firm_id'];


$qSelFirmGirviNo = "SELECT max(gtrans_firm_girvi_no) as firmGirviNo FROM girvi_transfer where gtrans_firm_id='$firmId' and gtrans_own_id='$ownerId'";
$resFirmGirviNo = mysqli_query($conn,$qSelFirmGirviNo);
$rowFirmGirviNo = mysqli_fetch_array($resFirmGirviNo, MYSQLI_ASSOC);
$girviTransFirmGirviNo = $rowFirmGirviNo['firmGirviNo'] + 1;

/* * **********Start code to select gtrans serial no @Author:PRIYA21JAN15******************** */
include 'olgtsrnm.php';
/* * **********End code to select gtrans serial no @Author:PRIYA21JAN15******************** */
//insert into girvi_transfer table
//change in query @AUTHOR: SANDY17DEC13
/* * *******Start code to add serail no @Author:PRIYA28JUN14**************** */
/* * *******Start code to change $postSrNo to $girviSerialNo @Author:PRIYA21JAN15**************** */
$insertQuery = "INSERT INTO girvi_transfer
    (gtrans_cust_id,gtrans_girvi_id,gtrans_own_id,gtrans_firm_id,gtrans_firm_type,gtrans_firm_girvi_no,gtrans_exist_firm_id,
		gtrans_prin_amt,gtrans_ROI,gtrans_IROI,gtrans_ROI_id,gtrans_ROI_typ,gtrans_pre_serial_num ,gtrans_serial_num,gtrans_int_opt,
                gtrans_monthly_intopt,gtrans_compounded_opt,gtrans_DOB,gtrans_upd_sts,gtrans_ent_dat,gtrans_prin_typ,gtrans_trans_loan_id,global_gt_pre_serial_num,global_gt_serial_num,gtrans_packet_num,gtrans_pay_oth_info)VALUES
                ('$custId','$girviId','$ownerId','','MoneyLender','$girviTransFirmGirviNo','$trFirmId','$prin','$roi','$iroi','$roiId','$roiTp','$girviPreSerialNo','$girviSerialNo','$intOpt',"
        . "'$mnthIntOpt', '$compoundOpt','$trDate','Transferred',$currentDateTime,'MainPrin','$loanId','$preMlSrNo','$postMlSrNo','$packetNo','$otherInfo')";//Add values packet no. and other info @Author:SHRI18MAY15
/* * *******End code to change $postSrNo to $girviSerialNo @Author:PRIYA21JAN15**************** */
if (!mysqli_query($conn,$insertQuery)) {
    die('Error: ' . mysqli_error($conn));
}
/* * *******End code to add serail no @Author:PRIYA28JUN14**************** */
//get details of money lender from supplier table
//-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
$selMlDet = "SELECT * FROM user WHERE user_owner_id='$ownerId' and user_id='$mlId' and user_category='Money Lender'";
$resSelMlDet = mysqli_query($conn,$selMlDet);
$row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
//$mlCode = $row['supp_unique_code'];
$mlCode = $row['user_id'];

//Start Code To Update Gtrans Id @AUTHOR: SANDY2DEC13
$qSelGTransId = "SELECT gtrans_id FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' order by gtrans_id desc LIMIT 0,1";
$resGTransId = mysqli_query($conn,$qSelGTransId);
$rowGTransId = mysqli_fetch_array($resGTransId, MYSQLI_ASSOC);
$girviTransGriviId = $rowGTransId['gtrans_id'];

//End Code To Update Gtrans Id @AUTHOR: SANDY2DEC13
//get details of money lender from supplier table
//$selMlDet = "SELECT supp_unique_code FROM omsupplier WHERE supp_owner_id='$ownerId' and supp_id='$mlId' and supp_type='Money Lender'";
//$resSelMlDet = mysqli_query($conn,$selMlDet);
//$row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
//$mlCode = $row['supp_unique_code'];
$mlCode = $row['user_id'];
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
//update girvi status in girvi table 
$query = "UPDATE girvi SET 
            girv_transfer_id='$girviTransGriviId',girv_transfer_ml_id='$mlCode',girv_trans_loan_id='$loanSerNo'
            WHERE girv_own_id='$_SESSION[sessionOwnerId]' and girv_id ='$girviId'";
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