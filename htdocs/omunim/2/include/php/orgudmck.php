<?php /**
 * 
 * Created on Jul 13, 2011 10:23:08 AM
 *
 * @FileName: orgudmck.php
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

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php

require_once 'system/omssopin.php';

//Get all the data
$girviOwnerId = $_SESSION['sessionOwnerId'];
$custId = trim($_POST['custId']);
$girviId = trim($_POST['girviId']);
$girviDepositPrinAmount = trim($_POST['girviDepositPrinAmount']);
$girviDepositIntAmount = trim($_POST['girviDepositIntAmount']);
$totalPrincipalAmount = trim($_POST['totalPrincipalAmount']);
$totalInterestAmount = trim($_POST['totalInterestAmount']);
$DOBDay = trim($_POST['DOBDay']);
$DOBMonth = trim($_POST['DOBMonth']);
$DOBYear = trim($_POST['DOBYear']);

// Start To protect MySQL injection
$girviDepositAmount = stripslashes($girviDepositAmount);
$DOBDay = stripslashes($DOBDay);
$DOBMonth = stripslashes($DOBMonth);
$DOBYear = stripslashes($DOBYear);

$girviDepositAmount = mysqli_real_escape_string($conn,$girviDepositAmount);
$DOBDay = mysqli_real_escape_string($conn,$DOBDay);
$DOBMonth = mysqli_real_escape_string($conn,$DOBMonth);
$DOBYear = mysqli_real_escape_string($conn,$DOBYear);
// End To protect MySQL injection

$girviDepositDate = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;

$girviDepositMainAmount = $girviDepositAmount;

$qSelDepAmount = "SELECT sum(girv_mondep_amt) as totalDepositMon FROM girvi_money_deposit where girv_mondep_amt!='0' and girv_mondep_amt!='' and girv_mondep_girv_id='$girviId' and girv_mondep_cust_id='$custId' and girv_mondep_own_id='$_SESSION[sessionOwnerId]' and girv_mondep_upd_sts='Deposit'";
$resDepAmount = mysqli_query($conn,$qSelDepAmount);
$rowDeposit = mysqli_fetch_array($resDepAmount, MYSQLI_ASSOC);

$totalMainDepositMon = $rowDeposit['totalDepositMon'];

$totalDepositMon = $rowDeposit['totalDepositMon'];

$girviMonDepComm = "";

$girviComm = "";

$principalAmountComm = "";

$mainPrincipalAmountComm ="";

$girviDepositAmount += $totalDepositMon;

if ($custId != '' and $girviId != '' and $girviDepositAmount != '' and $DOBDay != '' and $DOBMonth != '' and $DOBYear != '' and
        $custId != NULL and $girviId != NULL and $girviDepositAmount != NULL and $DOBDay != NULL and $DOBMonth != NULL and $DOBYear != NULL) {


    if ($girviDepositAmount <= $totalInterestAmount) {

        $girviMonDepComm = $globalCurrency .' ' . $girviDepositMainAmount . ' Money deposited on date:' . $girviDepositDate . '.' . '<br />';
        $girviMonDepStatus = 'Deposit';
        $girviComm = $girviMonDepComm;
        
        include 'orgudpmn.php';
    } else if ($girviDepositAmount <= ($totalPrincipalAmount + $totalInterestAmount)) {

        include 'orgudmcl.php';

        if ($totalDepositMon == 0) {
            $girviMonDepComm = $globalCurrency .' ' . $girviDepositMainAmount . ' Money adjusted till date:' . $girviDepositDate . '.' . '<br />';
            $girviMonDepComm = $girviMonDepComm . '---------------------------------------------------------------------------------------------------------------------------------------<br />';
        } else {
            $girviMonDepComm = $globalCurrency .' ' . $girviDepositMainAmount . ' Money deposited on date:' . $girviDepositDate . '.' . '<br />';
            $girviMonDepComm = $girviMonDepComm . '---------------------------------------------------------------------------------------------------------------------------------------<br />';
            $tempTotalDepMon = $totalMainDepositMon + $girviDepositMainAmount;
            $girviMonDepComm = $girviMonDepComm . '<b>'. $globalCurrency.' ' . $tempTotalDepMon . '</b> Total Money has been deposited till date:' . $girviDepositDate . '.' . '<br />';
            $girviMonDepComm = $girviMonDepComm . '---------------------------------------------------------------------------------------------------------------------------------------<br /><br />';
        }

        $girviMonDepStatus = 'Adjust';

        $query = "UPDATE girvi_money_deposit SET
		girv_mondep_upd_sts='$girviMonDepStatus'
		WHERE girv_mondep_girv_id = '$girviId' and girv_mondep_cust_id = '$custId' and girv_mondep_own_id = '$girviOwnerId'";

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }
        
        $girviComm = $girviMonDepComm . $principalAmountComm . $mainPrincipalAmountComm;
        
        include 'orgudpmn.php';
    } else {
        echo "Error";
    }
}
?>
