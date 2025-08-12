<?php

/*
 * 
 * TO SHOW firm loan number when firm changes @AUTHOR: SANDY15NOV13
 * 
 * 
 * Created on Mar 16, 2011 1:06:38 PM
 *
 * @FileName: orfrlnno.php
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
//change in code @AUTHOR: SANDY28NOV13
require_once 'system/omssopin.php';

$panel = $_GET['panel'];
$code = $_GET['code'];
if ($panel == 'CheckMlCode') {
 //-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                     
    $selCode = "SELECT * FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' AND user_unique_code='$code'";
  //-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                    
    $resSelCode = mysqli_query($conn,$selCode);
    $numOfRows = mysqli_num_rows($resSelCode);
    if ($numOfRows > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
} else {
    $firmId = $_GET['firmId'];
//query to get money lender firm loan no
    $qSelMlLoanNo = "SELECT count(ml_id) as mlFirmLoanNo FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id='$firmId'";
    $resMlLoanNo = mysqli_query($conn,$qSelMlLoanNo);
    $rowMlLoanNo = mysqli_fetch_array($resMlLoanNo, MYSQLI_ASSOC);
    $currentFirmLoanNo = $rowMlLoanNo['mlFirmLoanNo'] + 1;
    echo $currentFirmLoanNo;
}
?>