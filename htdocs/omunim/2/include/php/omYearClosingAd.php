<?php
/*
 * **************************************************************************************
 * @tutorial: YEAR CLOSING FUNCTIONALITY ON TRIAL BALANCE @PRIYANKA-18DEC2020
 * **************************************************************************************
 * 
 * Created on DEC 18, 2020 04:55:00 PM
 *
 * @FileName: omYearClosingAd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-18DEC2020
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
//
//
//echo '<pre>';
//print_r($_REQUEST);
//die;
//
//
// MAIN YEAR CLOSING JSON ARRAY @PRIYANKA-18DEC2020
$mainYearClosingArr = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['encodedMainYearClosingArr'])));
//
//
//echo '<pre>';
//print_r($mainYearClosingArr);
//
//
// TO REMOVE '\' FROM JSON ARRAY @PRIYANKA-18DEC2020
$mainYearClosingArr = str_replace('\"', '"', $mainYearClosingArr);
//
//
//echo '<pre>';
//print_r($mainYearClosingArr);
//
//
// DECODE JSON ARRAY @PRIYANKA-18DEC2020
$decodedMainYearClosingArr = json_decode($mainYearClosingArr, TRUE);
//
//echo '<pre>';
//print_r($decodedMainYearClosingArr);
//
//
// CURRENT DATE TIME @PRIYANKA-18DEC2020
$currentDateTime = 'NOW()';
//
//
// LOOP THROUGH ARRAY @PRIYANKA-18DEC2020
for($i = 0; $i < count($decodedMainYearClosingArr); $i++) {
    //
    //
    $totalEntries = 0;
    //
    //
    //echo ($decodedMainYearClosingArr[$i]['firmId']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['ownerId']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['startYear']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['closeYear']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['jrmn_acc_id']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['jrmn_tt_dr']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['jrmn_tt_cr']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['jrmn_op_bal']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['jrmn_op_bal_type']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['jrmn_cl_bal']) . "<br/>";
    //echo ($decodedMainYearClosingArr[$i]['jrmn_cl_bal_type']) . "<br/>";
    //
    //
    //$decodedMainYearClosingArr[$i]['jrmn_op_bal'] = '10,000'; FOR TESTING PURPOSE @PRIYANKA-07JUNE2021
    //
    //
    $jrmn_tt_dr = str_replace(',','',$decodedMainYearClosingArr[$i]['jrmn_tt_dr']); // DR AMOUNT @PRIYANKA-07JUNE2021
    $jrmn_tt_cr = str_replace(',','',$decodedMainYearClosingArr[$i]['jrmn_tt_cr']); // CR AMOUNT @PRIYANKA-07JUNE2021     
    $jrmn_op_bal = str_replace(',','',$decodedMainYearClosingArr[$i]['jrmn_op_bal']); // OPENING BAL @PRIYANKA-07JUNE2021     
    $jrmn_cl_bal = str_replace(',','',$decodedMainYearClosingArr[$i]['jrmn_cl_bal']); // CLOSING BAL @PRIYANKA-07JUNE2021
    //
    //
    //echo '$jrmn_op_bal == ' . $jrmn_op_bal . "<br/>";
    //
    //
    $jrmn_own_id = $decodedMainYearClosingArr[$i]['ownerId']; // OWNER ID @PRIYANKA-18DEC2020
    $jrmn_firm_id = $decodedMainYearClosingArr[$i]['firmId']; // FIRM ID @PRIYANKA-18DEC2020
    $jrmn_acc_id = $decodedMainYearClosingArr[$i]['jrmn_acc_id']; // ACC ID @PRIYANKA-18DEC2020
    //
    //$jrmn_tt_dr = $decodedMainYearClosingArr[$i]['jrmn_tt_dr']; // DR AMOUNT @PRIYANKA-18DEC2020
    //$jrmn_tt_cr = $decodedMainYearClosingArr[$i]['jrmn_tt_cr']; // CR AMOUNT @PRIYANKA-18DEC2020       
    //$jrmn_op_bal = $decodedMainYearClosingArr[$i]['jrmn_op_bal']; // OPENING BAL @PRIYANKA-18DEC2020          
    //$jrmn_cl_bal = $decodedMainYearClosingArr[$i]['jrmn_cl_bal']; // CLOSING BAL @PRIYANKA-18DEC2020  
    //
    $jrmn_op_bal_type = $decodedMainYearClosingArr[$i]['jrmn_op_bal_type']; // OPENING BAL TYPE @PRIYANKA-18DEC2020 
    $jrmn_cl_bal_type = $decodedMainYearClosingArr[$i]['jrmn_cl_bal_type']; // CLOSING BAL TYPE @PRIYANKA-18DEC2020        
    $jrmn_start_yr = $decodedMainYearClosingArr[$i]['startYear']; // START YEAR @PRIYANKA-18DEC2020   
    $jrmn_end_yr = $decodedMainYearClosingArr[$i]['closeYear']; // CLOSE YEAR @PRIYANKA-18DEC2020   
    //
    //
    // TO CHECK ENTRY IS PRESENT OR NOT IN journal_main TABLE @PRIYANKA-18DEC2020
    $selEntryDetails = "SELECT * FROM journal_main WHERE jrmn_own_id = '$jrmn_own_id' "
                     . "AND jrmn_firm_id = '$jrmn_firm_id' "
                     . "AND jrmn_acc_id = '$jrmn_acc_id' "
                     . "AND jrmn_start_yr = '$jrmn_start_yr' "
                     . "AND jrmn_end_yr = '$jrmn_end_yr'";
    //
    //echo '$selEntryDetails == ' . $selEntryDetails . '<br /><br />';
    //
    $resEntryDetails = mysqli_query($conn, $selEntryDetails);
    $totalEntries = mysqli_num_rows($resEntryDetails); // NO. OF ENTRIES @PRIYANKA-18DEC2020
    //   
    //
    //echo '$totalEntries == ' . $totalEntries . '<br /><br />';
    //   
    //   
    if ($totalEntries == 0) {    
        //
        // INSERT OPERATION @PRIYANKA-18DEC2020
        $queryJournalMainInsert = "INSERT INTO journal_main (
		                   jrmn_own_id, jrmn_firm_id, jrmn_acc_id,
                                   jrmn_tt_dr, jrmn_tt_cr,
                                   jrmn_op_bal, jrmn_op_bal_type, 
                                   jrmn_cl_bal, jrmn_cl_bal_type,
                                   jrmn_start_yr, jrmn_end_yr, jrmn_since) 
		                   VALUES (
		                  '$jrmn_own_id', '$jrmn_firm_id', '$jrmn_acc_id', 
                                  '$jrmn_tt_dr', '$jrmn_tt_cr', 
                                  '$jrmn_op_bal', '$jrmn_op_bal_type', 
                                  '$jrmn_cl_bal', '$jrmn_cl_bal_type', 
                                  '$jrmn_start_yr', '$jrmn_end_yr', 
                                   $currentDateTime)";
        //
        //echo '$queryJournalMainInsert == ' . $queryJournalMainInsert . '<br/><br />';
        //
        if (!mysqli_query($conn, $queryJournalMainInsert)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        //
    } else {
        //
        // UPDATE OPERATION @PRIYANKA-18DEC2020
        $queryJournalMainUpdate = "UPDATE journal_main SET
		                  jrmn_tt_dr = '$jrmn_tt_dr',
                                  jrmn_tt_cr = '$jrmn_tt_cr',
                                  jrmn_op_bal = '$jrmn_op_bal',
                                  jrmn_op_bal_type = '$jrmn_op_bal_type',
                                  jrmn_cl_bal = '$jrmn_cl_bal',
                                  jrmn_cl_bal_type = '$jrmn_cl_bal_type',
                                  jrmn_since = $currentDateTime 
                                  WHERE jrmn_own_id = '$jrmn_own_id' 
                                  AND jrmn_firm_id = '$jrmn_firm_id' 
                                  AND jrmn_acc_id = '$jrmn_acc_id' 
                                  AND jrmn_start_yr = '$jrmn_start_yr' 
                                  AND jrmn_end_yr = '$jrmn_end_yr'";
        //
        //echo '$queryJournalMainUpdate == ' . $queryJournalMainUpdate . '<br/><br />';
        //
        if (!mysqli_query($conn, $queryJournalMainUpdate)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        //
    }
    //
    //
}
//
//
// MESSAGE DISPLAY @PRIYANKA-18DEC2020
if ($_REQUEST['yearClosingMessageDisplay'] == 'YES') {
    $messageDisplay = 'Step 2 - Go to "Accounts" -> "Account Balance" panel, re-check the accounts and proceed for year closing process.';
}
//
//
//
?>