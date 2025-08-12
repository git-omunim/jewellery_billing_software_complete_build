<?php

/*
 * **************************************************************************************
 * @tutorial: Add New Loan in table
 * **************************************************************************************
 *
 * Created on 2 Dec, 2012 11:18:24 AM
 *
 * @FileName: ormladln.php
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

//change in file @AUTHOR: SANDY6FEB14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
require_once 'ommpincr.php';
?>
<?php

if ($_POST['mlAddLnDOBMonth'] == 'NotSelected' || $_POST['mlAddLnDOBDay'] == 'NotSelected' || $_POST['mlAddLnDOBYear'] == 'NotSelected') {
    $loanAddDob = 'N/A';
} else {
    $loanAddDob = $_POST['mlAddLnDOBDay'] . ' ' . $_POST['mlAddLnDOBMonth'] . ' ' . $_POST['mlAddLnDOBYear'];
}
$mlId = trim($_POST['mlId']);
$ownerId = $_SESSION['sessionOwnerId'];
$principle = trim($_POST['mlPrincipalAmount']);
$roi = trim($_POST['selROI']);
$preSerialNo = trim($_POST['mlPreSerialNumber']);
$serialNo = trim($_POST['mlSerialNumber']);
$loanSerialNum = $preSerialNo . $serialNo;
$firmId = trim($_POST['mlAddLnFirm']);
$firmLnNo = trim($_POST['mlAddLnFirmLnNumber']);
$mnyLendLnNo = trim($_POST['mlAddLnLenderLnNumber']);
$intType = trim($_POST['interestType']);
$loanType = trim($_POST['loanType']);
$ROI = trim($_POST['selTROI']); //change to get value from tr roi table @AUTHOR: SANDY02JAN14


$payAcntId = trim($_POST['loanPaySelAccountId']);
$chequeNo = trim($_POST['loanChequeNo']);
$payOthInfo = trim($_POST['loanPaymentOtherInfo']);
$othInfo = trim($_POST['loanOtherInfo']);
$crDrType = trim($_POST['crDrType']);
$mlLoanAccId = trim($_POST['mlLoanCrAccId']);

if ($crDrType == 'CR') {
    $mlDrAccId = $payAcntId;
    $mlCrAccId = $mlLoanAccId;
} else {
    $mlDrAccId = $mlLoanAccId;
    $mlCrAccId = $payAcntId;
}

$totalLoanTransferred = trim($_POST['totalLoanTransferred']);
$totalPrinTransferred = trim($_POST['totalPrinTransferred']);

//to add condition to avoid 0 principal amount entry @AUTHOR: SANDY08JAN14
if ($principle == '' || $principle == NULL || $principle == 0) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
//START OF CHANGE IN CODE TO GET TROI ID @AUTHOR: SANDY02JAN13

    $qSelectTROI = "SELECT troi_id,troi_value,tiroi_value,troi_default FROM troi where troi_type='$intType' and troi_value LIKE '$TROIValue%'";
    $resultTROI = mysqli_query($conn,$qSelectTROI);
    $totalTROI = mysqli_num_rows($resultTROI);
    if ($totalTROI == 0) {
        $qAddNewInt = "INSERT INTO troi(troi_own_id, troi_value, tiroi_value, troi_type, troi_since) 
                           VALUES('$_SESSION[sessionOwnerId]' , '$TROIValue' , '$TROIValue', '$intType' , $currentDateTime)";
        if (!mysqli_query($conn,$qAddNewInt)) {
            die('Error: ' . mysqli_error($conn));
        }
    }

    if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelTROI = "SELECT troi_id,troi_value,tiroi_value FROM troi where tiroi_value like '$ROI'"; //change in query @AUTHOR: SANDY15JAN14
    } else {
        $qSelTROI = "SELECT troi_id,troi_value,tiroi_value FROM troi where troi_value like '$ROI'"; //change in query @AUTHOR: SANDY15JAN14
    }
    $resROI = mysqli_query($conn,$qSelTROI);
    $rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
    $ROIId = $rowROI['troi_id'];
    $IROI = $rowROI['tiroi_value'];
//END OF CHANGE IN CODE TO GET TROI ID @AUTHOR: SANDY02JAN13
//get details of money lender from supplier table
  //-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                    
    $selMlDet = "SELECT * FROM user WHERE user_owner_id='$ownerId' and user_id='$mlId' and user_category='Money Lender'";
    $resSelMlDet = mysqli_query($conn,$selMlDet);
    $row = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
    $mlFname = $row['user_fname'];
    $mlLname = $row['user_lname'];
    $mlAdd = $row['user_add'];
    $mlcity = $row['user_city'];
    //$mlCode = $row['supp_unique_code'];
    $mlCode = $row['user_id'];
    $mlAccId = $row['user_acc_id'];
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
//Start check for account present in the firm accounts otherwise create new account @AUTHOR: SANDY20JAN14
    $chckMLAccNm = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$ownerId' and acc_id='$mlAccId'";
    $resChckMLAccNm = mysqli_query($conn,$chckMLAccNm);
    $rowAcntNameOfML = mysqli_fetch_array($resChckMLAccNm, MYSQLI_ASSOC);
    $acntNameOfML = $rowAcntNameOfML['acc_user_acc'];

    $chckAccountInFirm = "SELECT acc_id FROM accounts WHERE acc_own_id='$ownerId' and acc_user_acc='$acntNameOfML' and acc_firm_id='$firmId'";
    $resChckAccountInFirm = mysqli_query($conn,$chckAccountInFirm);

    if (mysqli_num_rows($resChckAccountInFirm) > 0) {
        $rowChckAccountInFirm = mysqli_fetch_array($resChckAccountInFirm);
        $mlAccId = $rowChckAccountInFirm['acc_id'];
    } else {
        //get account name from acc_id 
//        $getAcntName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$ownerId' and acc_id='$mlAccId'";
//        $resAcntName = mysqli_query($conn,$getAcntName);
//        $rowAcntName = mysqli_fetch_array($resAcntName, MYSQLI_ASSOC);
//        $acntName = $rowAcntName['acc_user_acc'];

        $query = "INSERT INTO accounts (
	acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id,acc_since) 
	VALUES ('$ownerId','Liabilities','Current Liabilities','Sundry Creditors','$acntNameOfML','User','$firmId',$currentDateTime)";

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        $getLastAcntId = "SELECT acc_id FROM accounts WHERE acc_own_id='$ownerId' order by acc_id desc LIMIT 0,1";
        $resLastAcntId = mysqli_query($conn,$getLastAcntId);
        $rowLastAcntId = mysqli_fetch_array($resLastAcntId, MYSQLI_ASSOC);
        $mlAccId = $rowLastAcntId['acc_id'];
    }
//End check for account present in the firm accounts otherwise create new account @AUTHOR: SANDY20JAN14
//Insert into ml_loan table
    $insertQuery = "INSERT INTO ml_loan(ml_lender_id,ml_own_id,ml_firm_id,ml_firm_mli_no,ml_cust_mli_num,
  ml_lender_fname,ml_lender_lname,ml_lender_city,ml_lender_Address,
  ml_main_prin_amt,ml_prin_amt,ml_ROI_Id, ml_ROI, ml_IROI, ml_ROI_typ,
  ml_DOB,ml_new_DOB,ml_DOR, ml_upd_sts,ml_type,ml_pre_serial_num,ml_serial_num,ml_packet_num,
  ml_ent_dat,ml_acc_id,ml_cheque_no,ml_pay_other_info,ml_comm,ml_ln_cr_dr,ml_cr_acc_id)
  VALUES('$mlId','$ownerId','$firmId','$firmLnNo','$mnyLendLnNo','$mlFname','$mlLname','$mlcity','$mlAdd','$principle','$principle','$ROIId','$ROI','$IROI','$intType',
  '$loanAddDob','$loanAddDob','','Active','$loanType','$preSerialNo','$serialNo','$packetNo',$currentDateTime,'$mlDrAccId','$chequeNo','$payOthInfo','$othInfo','$crDrType','$mlCrAccId')";
    if (!mysqli_query($conn,$insertQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
    /*     * ****************Start code to add sys log var @Author:PRIYA05JUL14*************** */
    $sslg_trans_sub = 'MONEYLENDER LOAN ADDED';
    $sysLogTransType = 'transLoan';
    $sslg_firm_id = $firmId;
    $sysLogTransId = $preSerialNo . $serialNo;
    $sslg_trans_comment = 'Loan Serial No: ' . $sysLogTransId . ', Loan Start Date: ' . $loanAddDob . ',Loan Amount: ' . formatInIndianStyle($principle);
    include 'omslgapi.php';
    $addSysLogInd = 'NO';
    /*     * ****************End code to add sys log var @Author:PRIYA05JUL14*********************** */

    $selectLastLnId = "SELECT ml_id FROM ml_loan WHERE ml_own_id='$ownerId' order by ml_ent_dat desc LIMIT 0,1";
    $resLastLnId = mysqli_query($conn,$selectLastLnId);
    $row = mysqli_fetch_array($resLastLnId);
    $mlLoanId = $row['ml_id'];

    while ($totalLoanTransferred != 0) {
        $status = trim($_POST["status$totalLoanTransferred"]);
        $trLnpreSerialNo = trim($_POST["mlLoanNo$totalLoanTransferred"]);
        if ($status != 'Deleted' && $trLnpreSerialNo != '') {
            $trLnPrinciple = trim($_POST["mlPrinAmt$totalLoanTransferred"]);
            $trLnroi = trim($_POST["mlRoi$totalLoanTransferred"]);
            $trLnpreSerialNo = trim($_POST["mlLoanNo$totalLoanTransferred"]);
            $trLnPreLnNo = preg_replace("/[^a-zA-Z]+/", "", $trLnpreSerialNo);
            $trLnPostLnNo = preg_replace("/[^0-9]+/", "", $trLnpreSerialNo);
            $loanTrDate = $_POST["mlAddLnDOBDay$totalLoanTransferred"] . ' ' . $_POST["mlAddLnDOBMonth$totalLoanTransferred"] . ' ' . $_POST["mlAddLnDOBYear$totalLoanTransferred"];
            $packetNo = trim($_POST["mlPacketNo$totalLoanTransferred"]); //field added @Author:SHRI16MAY15
            $otherInfo = trim($_POST["mlOtherInfo$totalLoanTransferred"]); //field added @Author:SHRI16MAY15


            $selGirviDet = "SELECT * FROM girvi WHERE girv_own_id='$ownerId' and girv_pre_serial_num='$trLnPreLnNo' and girv_serial_num='$trLnPostLnNo'";
            $resSelGirviDet = mysqli_query($conn,$selGirviDet);
            $rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC);
            $custId = $rowSelGirviDet['girv_cust_id'];
            $girviId = $rowSelGirviDet['girv_id'];
            $trFirmId = $rowSelGirviDet['girv_firm_id'];
//            echo '$trFirmId==' . $trFirmId;
            $trFirmLnNo = $rowSelGirviDet['girv_firm_girvi_no'];
            $roiTp = $rowSelGirviDet['girv_ROI_typ'];
            $mnthIntOpt = $rowSelGirviDet['girv_monthly_intopt'];
            $compoundOpt = $rowSelGirviDet['girv_compounded_opt'];
            $intOpt = $rowSelGirviDet['girv_int_opt'];
            $roiId = $rowSelGirviDet['girv_ROI_Id'];
            $iroi = $rowSelGirviDet['girv_IROI'];
            //get tr firm loan no
            $qSelFirmGirviNo = "SELECT max(gtrans_firm_girvi_no) as firmGirviNo FROM girvi_transfer where gtrans_firm_id='$trFirmId' and gtrans_own_id='$ownerId'";
            $resFirmGirviNo = mysqli_query($conn,$qSelFirmGirviNo);
            $rowFirmGirviNo = mysqli_fetch_array($resFirmGirviNo, MYSQLI_ASSOC);

            $girviTransFirmGirviNo = $rowFirmGirviNo['firmGirviNo'] + 1;

            /*             * **********Start code to select gtrans serial no @Author:PRIYA21JAN15******************** */
            $firmId = $trFirmId;
            include 'olgtsrnm.php';
            /*             * **********End code to select gtrans serial no @Author:PRIYA21JAN15******************** */
            //insert into girvi_transfer table
            //change in query @AUTHOR: SANDY10DEC13
            /*             * *********Start code to add gtans serial num @Author:PRIYA28JUN14********* */
            $insertQuery = "INSERT INTO girvi_transfer
    (gtrans_cust_id,gtrans_girvi_id,gtrans_own_id,gtrans_firm_id,gtrans_firm_type,gtrans_firm_girvi_no,gtrans_exist_firm_id,
		gtrans_prin_amt,gtrans_ROI,gtrans_IROI,gtrans_ROI_id,gtrans_ROI_typ,gtrans_pre_serial_num,gtrans_serial_num,
                gtrans_int_opt,gtrans_monthly_intopt,gtrans_compounded_opt,gtrans_DOB,gtrans_upd_sts,gtrans_ent_dat,gtrans_prin_typ,gtrans_trans_loan_id,
                gtrans_acc_id,gtrans_cr_acc_id,global_gt_pre_serial_num,global_gt_serial_num,gtrans_packet_num,gtrans_pay_oth_info)VALUES
                ('$custId','$girviId','$ownerId','','MoneyLender','$girviTransFirmGirviNo','$trFirmId',"
                    . "'$trLnPrinciple','$trLnroi','$iroi','$roiId','$roiTp','$girviPreSerialNo','$girviSerialNo',"
                    . "'$intOpt','$mnthIntOpt', '$compoundOpt','$loanTrDate','Transferred',$currentDateTime,'MainPrin','$mlLoanId ',"
                    . "'$mlDrAccId','$mlCrAccId','$preSerialNo','$serialNo','$packetNo','$otherInfo')";//add packet nno and other info @Author:SHRI16MAY15

            if (!mysqli_query($conn,$insertQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
            /*             * *********End code to add gtans serial num @Author:PRIYA28JUN14********* */
            //Start Code To Update Gtrans Id @AUTHOR: SANDY2DEC13
            $qSelGTransId = "SELECT gtrans_id FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' order by gtrans_ent_dat desc LIMIT 0,1";
            $resGTransId = mysqli_query($conn,$qSelGTransId);
            $rowGTransId = mysqli_fetch_array($resGTransId, MYSQLI_ASSOC);
            $girviTransGriviId = $rowGTransId['gtrans_id'];

            //update girvi table for transfer details
            $query = "UPDATE girvi SET 
            girv_transfer_id='$girviTransGriviId',girv_transfer_ml_id='$mlCode',girv_trans_loan_id='$loanSerialNum'
            WHERE girv_own_id='$_SESSION[sessionOwnerId]' and girv_id ='$girviId'";
            if (!mysqli_query($conn,$query)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        $totalLoanTransferred = $totalLoanTransferred - 1;
    }
    /*     * **Start to make entry of additional principal transferrred @AUTHOR: SANDY17DEC13**** */
    while ($totalPrinTransferred != 0) {
        $status = trim($_POST["prinStatus$totalPrinTransferred"]);
        $trPrinSerialNo = trim($_POST["principalId$totalPrinTransferred"]);
        if ($status != 'Deleted' && $trPrinSerialNo != '') {
            $trPrinPrinciple = trim($_POST["prinPrinAmt$totalPrinTransferred"]);
            $trPrinroi = trim($_POST["prinRoi$totalPrinTransferred"]);
            $trPrinPreNo = preg_replace("/[^a-zA-Z]+/", "", $trPrinSerialNo);
            $trPrinPostNo = preg_replace("/[^0-9]+/", "", $trPrinSerialNo);
            $prinTrDate = $_POST["prinTransDOBDay$totalPrinTransferred"] . ' ' . $_POST["prinTransDOBMonth$totalPrinTransferred"] . ' ' . $_POST["prinTransDOBYear$totalPrinTransferred"];


            //get principal details
            $selPrinDet = "SELECT * FROM girvi_principal WHERE girv_prin_own_id='$ownerId' and girv_prin_pre_id='$trPrinPreNo' and girv_prin_post_id='$trPrinPostNo'";
            $resSelPrinDet = mysqli_query($conn,$selPrinDet);
            $rowSelPrinDet = mysqli_fetch_array($resSelPrinDet, MYSQLI_ASSOC);
            $prinCustId = $rowSelPrinDet['girv_prin_cust_id'];
            $prinId = $rowSelPrinDet['girv_prin_id'];
            $prinFirmId = $rowSelPrinDet['girv_prin_firm_id'];
            $prinGirviId = $rowSelPrinDet['girv_prin_girv_id'];

            $getRoiType = "SELECT girv_ROI_typ FROM girvi WHERE girv_id IN(SELECT girv_prin_girv_id FROM girvi_principal WHERE girv_prin_pre_id='$trPrinPreNo' and girv_prin_post_id='$trPrinPostNo' and girv_prin_own_id='$_SESSION[sessionOwnerId]')";
            $resRoiType = mysqli_query($conn,$getRoiType);
            $row = mysqli_fetch_array($resRoiType, MYSQLI_ASSOC);
            $trPrinRoiType = $row['girv_ROI_typ'];

//get tr firm loan no
            $qSelFirmGirviNo = "SELECT max(gtrans_firm_girvi_no) as firmGirviNo FROM girvi_transfer where gtrans_firm_id='$prinFirmId ' and gtrans_own_id='$ownerId'";
            $resFirmGirviNo = mysqli_query($conn,$qSelFirmGirviNo);
            $rowFirmGirviNo = mysqli_fetch_array($resFirmGirviNo, MYSQLI_ASSOC);

            $girviTransFirmGirviNo = $rowFirmGirviNo['firmGirviNo'] + 1;

            //insert into girvi_transfer table change in query @AUTHOR: SANDY25DEC13
            /*             * *********Start code to add gtans serial num @Author:PRIYA28JUN14********* */
            $insertQuery = "INSERT INTO girvi_transfer(gtrans_cust_id,gtrans_girvi_id,gtrans_prin_id,gtrans_own_id,gtrans_firm_id,gtrans_firm_type ,gtrans_firm_girvi_no,gtrans_exist_firm_id,
		gtrans_prin_amt,gtrans_ROI,gtrans_ROI_typ,gtrans_pre_serial_num,gtrans_serial_num,gtrans_DOB,gtrans_upd_sts,gtrans_ent_dat,gtrans_prin_typ,gtrans_trans_loan_id,
                gtrans_acc_id,gtrans_cr_acc_id,global_gt_pre_serial_num,global_gt_serial_num)VALUES
                ('$prinCustId ','$prinGirviId','$prinId','$ownerId','$firmId','MoneyLender','$girviTransFirmGirviNo','$prinFirmId','$trPrinPrinciple','$trPrinroi',"
                    . "'$trPrinRoiType','$trPrinPreNo','$trPrinPostNo','$prinTrDate','Transferred',$currentDateTime,'AdditionalPrin','$mlLoanId',"
                    . "'$mlDrAccId','$mlCrAccId','$preSerialNo','$serialNo')";

            if (!mysqli_query($conn,$insertQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
            /*             * *********End code to add gtans serial num @Author:PRIYA28JUN14********* */
            //Code To Update Gtrans Id 
            $qSelGTransId = "SELECT gtrans_id FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' order by gtrans_ent_dat desc LIMIT 0,1";
            $resGTransId = mysqli_query($conn,$qSelGTransId);
            $rowGTransId = mysqli_fetch_array($resGTransId, MYSQLI_ASSOC);
            $girviTransGriviId = $rowGTransId['gtrans_id'];

            $query = "UPDATE girvi_principal SET 
            girv_prin_transfer_id='$girviTransGriviId',girv_prin_trans_loan_id='$loanSerialNum',girv_prin_trans_ml_id='$mlCode'
            WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_id ='$prinId'";
            if (!mysqli_query($conn,$query)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        $totalPrinTransferred = $totalPrinTransferred - 1;
    }

    // START CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-19MAR2019 
    parse_str(getTableValues("SELECT user_acc_id,user_type,user_fname,user_lname "
                           . "FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' "
                           . "and user_id='$mlId'"));
    //
    $userName = $user_fname . ' ' . $user_lname;
    //   
    //
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlDrAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $drAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
    $drAccId = $mlDrAccId;
    //
    $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlAccId'";
    $resAccName = mysqli_query($conn,$selAccName);
    $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
    $crAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
    $crAccId = $mlAccId;
    // END CODE FOR ADD MONEY LENDER NAME WITH ACCOUNTS ON TRIAL BALANCE @PRIYANKA-19MAR2019 
    //
    if ($crDrType == 'CR') {
        $jrnlOwnId = $ownerId;
        $jrnlJId = '';
        $jrnlUserId = $mlId;
        $jrnlUserType = 'MoneyLender';
        $jrnlTransType = 'LOAN'; //Where we hv to navigate
        $jrnlTransId = $mlLoanId; // Used to navigate
        $jrnlFirmId = $firmId;
        $jrnlTTDr = $principle;
        $jrnlDrAccId = $drAccId;
        $jrnlDrDesc = $drAccName;
        $jrnlTTCr = $principle;
        $jrnlCrAccId = $crAccId;
        $jrnlCrDesc = $crAccName;
        $jrnlDesc = 'New Loan Added';
        $jrnlOthInfo = '';
        $jrnlDOB = $loanAddDob;

        $apiType = 'insert';
        include 'ommpjrnl.php';

        //Start Code to Get Last Journal Id
        $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$_SESSION[sessionOwnerId]' order by jrnl_id desc LIMIT 0,1";
        $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
        $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
        $jrnlId = $rowJournalEntry['jrnl_id'];
        //End Code to Get Last Journal Id
        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlCrAccId'";
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crAccId = $mlCrAccId;
        $crAccName = $rowAccName['acc_user_acc'];

        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $ownerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $mlLoanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'DR';
        $jrtrDrAmt = $principle;
        $jrtrDrAccId = $drAccId;
        $jrtrDrDesc = $drAccName;
        $jrtrCrAmt = $principle;
        $jrtrCrAccId = $crAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $crAccName;
        $jrtrDesc = 'New Loan Added';
        $jrtrOthInfo = '';
        $jrtrDOB = $loanAddDob;

        $apiType = 'insert';
        include 'ommpjrtr.php';
        
    } else {
        
        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlDrAccId'";
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $crAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
        $crAccId = $mlDrAccId;

        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlAccId'";
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';
        $drAccId = $mlAccId;

        $jrnlOwnId = $ownerId;
        $jrnlJId = '';
        $jrnlUserId = $mlId;
        $jrnlUserType = 'MoneyLender';
        $jrnlTransId = $mlLoanId; // Used to navigate
        $jrnlTransType = 'LOAN'; //Where we hv to navigate
        $jrnlFirmId = $firmId;
        $jrnlTTDr = $principle;
        $jrnlDrAccId = $crAccId;
        $jrnlDrDesc = $crAccName;
        $jrnlTTCr = $principle;
        $jrnlCrAccId = $drAccId;
        $jrnlCrDesc = $drAccName;
        $jrnlDesc = 'New Loan Added';
        $jrnlOthInfo = '';
        $jrnlDOB = $loanAddDob;

        $apiType = 'insert';
        include 'ommpjrnl.php';

        //Start Code to Get Last Journal Id
        $qSelJournalEntry = "SELECT jrnl_id FROM journal where jrnl_own_id='$_SESSION[sessionOwnerId]' order by jrnl_id desc LIMIT 0,1";
        $resJournalEntry = mysqli_query($conn,$qSelJournalEntry);
        $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
        $jrnlId = $rowJournalEntry['jrnl_id'];
        //End Code to Get Last Journal Id

        $selAccName = "SELECT acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_id='$mlCrAccId'";
        $resAccName = mysqli_query($conn,$selAccName);
        $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
        $drAccId = $mlCrAccId;
        $drAccName = $rowAccName['acc_user_acc'] . ' (' . $userName . ')';

        $jrtrJId = '';
        $jrtrJrnlId = $jrnlId;
        $jrtrOwnId = $ownerId;
        $jrtrUserId = $mlId;
        $jrtrUserType = 'MoneyLender';
        $jrtrTransId = $mlLoanId;
        $jrtrTransType = 'LOAN';
        $jrtrFirmId = $firmId;
        $jrtrTransCRDR = 'CR';
        $jrtrDrAmt = $principle;
        $jrtrDrAccId = $crAccId; //Secured Loan
        $jrtrDrDesc = $crAccName;
        $jrtrCrAmt = $principle;
        $jrtrCrAccId = $drAccId; //Girvi Payment Account Id
        $jrtrCrDesc = $drAccName;
        $jrtrDesc = 'New Loan Added';
        $jrtrOthInfo = '';
        $jrtrDOB = $loanAddDob;

        $apiType = 'insert';
        include 'ommpjrtr.php';
    }
    
    //END CODE
    $query = "UPDATE ml_loan SET ml_jrnlid='$jrnlId'
              WHERE ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$mlLoanId'";

    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }


    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&loanId=' . $mlLoanId . '&newLoanAdded=YES');
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&loanId=' . $mlLoanId . '&newLoanAdded=YES');
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header('Location: ' . $documentRoot . '/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=MoneyLenderHome&mlId=' . $mlId . '&loanId=' . $mlLoanId . '&newLoanAdded=YES');
    }
}
?>
