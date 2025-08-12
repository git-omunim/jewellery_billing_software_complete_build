<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database @HEMA-11FEB2020
 * **********************************************************************************************************************************
 *
 * Created on 3 JAN 2020
 * 
 * @FileName: omSchemeImport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 * Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
//
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
//
$currentFileName = basename(__FILE__);
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
?>
<?php
$kittyOwnId = $_SESSION['sessionOwnerId']; 

/* START CODE TO GET FILE NAME AS KITTY NAME, @AUTHOR:HEMA-11FEB2020 */
$fileName = $_FILES['CVSFile']['name'];
$kittyScheme = basename($fileName, ".csv");

/* START CODE TO CHECK KITTY IS AVAILABLE OR NOT, @AUTHOR:HEMA-11FEB2020*/

$selkittySchemeDetailsQuery = "SELECT * From kitty WHERE kitty_scheme= '$kittyScheme' and kitty_upd_sts = 'Planned Scheme'";
$reskittySchemeDetails = mysqli_query($conn, $selkittySchemeDetailsQuery);
$numOfRows = mysqli_num_rows ($reskittySchemeDetails);
$rowkittySchemeDetails = mysqli_fetch_assoc($reskittySchemeDetails);
$selkittyFirmId = $rowkittySchemeDetails['kitty_firm_id'];

/* IF KITTY IS AVAILABLE, @AUTHOR:HEMA-11FEB2020 */

if($numOfRows >0){
    
/* START CODE TO GET FIRM ID, @AUTHOR:HEMA-11FEB2020 */
if (isset($_GET['selFirmId'])) {
    $kittyFirmId = $_GET['selFirmId'];
} else if($_SESSION['setFirmSession'] != null){
    //if not selected assign session firm
    $kittyFirmId = $_SESSION['setFirmSession'];
}else{
   $kittyFirmId = $selkittyFirmId;
}

//
$accName = 'Sundry Debtors';
parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' "
                       . "and acc_firm_id='$selFirmId' and acc_user_acc='$accName'"));
$user_acc_id = $acc_id;
//
// Input Field Name
$importFile = $_FILES['CVSFile']['tmp_name'];
// 
$readImportFile = fopen($importFile, "r");
//
//
while (($user = fgetcsv($readImportFile, 10000, ",")) !== false) {
    //
    $user_owner_id = $sessionOwnerId;
    $user_firm_id = $kitty_firm_id;
    //
    $user_type = $user[0];
    $user_category = $user[1];
    $user_pid = $user[2];
    $user_uid = $user[3];
    $user_fname = $user[4];
    $user_sex = $user[5];
    $user_city = $user[6];
    $user_village = $user[7];
    $user_tehsil = $user[8];
    $user_country = $user[9];
    $user_mobile = $user[10];
    $user_password = md5($user_mobile);
    $user_status = $user[11];
    $DOB = $user[12];
    // 
    if ($DOB != '' && $DOB != NULL) {
        $arr = explode('/', $DOB);
        $DOBDate = $arr[0].'-'.$arr[1].'-'.$arr[2];
        $user_DOB = date("d M Y", strtotime($DOBDate));
    } else {
        $user_DOB = NULL;
    }
    //
    $marriageDate = $user[13];
   //
    if ($marriageDate != '' && $marriageDate != NULL) {
        $arr2 = explode('/', $marriageDate);
        $AnniDate = $arr2[0].'-'.$arr2[1].'-'.$arr2[2];
        $user_marriage_any = date("d M Y", strtotime($AnniDate));
    } else {
        $user_marriage_any = NULL;
    }
    //
    $user_email = $user[14];
   //
    $kitty_frequency = $user[15];
    $kitty_period = $user[16];
    $kittyDOB = $user[17];
    //
      if ($kittyDOB != '' && $kittyDOB != NULL) {
            $arr = explode('/', $kittyDOB);
            $kittyDOBDate = $arr[0].'-'.$arr[1].'-'.$arr[2];
            $kittyDOB = date("d M Y", strtotime($kittyDOBDate));
      }else{
        $kittyDOB = strtoupper(date('d M Y'));  
      }
    //
     $kitty_csv_reference_no = $user[18];
     $kitty_token_num = $user[19];
     $kitty_metal_type = $user[20];
    //
    /* START CODE TO CHECK CUSTOMER IS ADDED OR NOT, @AUTHOR:HEMA-11FEB2020 */
    $selCustomerQuery = "SELECT * FROM user WHERE user_uid = '$user_uid'";
    $resCustomerSel = mysqli_query($conn, $selCustomerQuery);
    $rowCustomer = mysqli_fetch_assoc($resCustomerSel);
    $customerId = $rowCustomer['user_id'];
   
    if($customerId == NULL || $customerId == ''){
       
        /* START CODE TO ADD CUSTOMER IF NOT ADDED, @AUTHOR:HEMA-11FEB2020 */
     
        $addCustomer = "INSERT INTO user (user_owner_id, user_firm_id, user_type, user_category, user_pid, user_uid,	
	user_fname, user_sex, user_city, user_village,
        user_tehsil, user_country, user_mobile, user_since, user_status, 
        user_DOB, user_marriage_any, user_email, user_acc_id, user_login_id, user_password) 
	VALUES ('$user_owner_id', '$kittyFirmId', '$user_type', '$user_category', '$user_pid', '$user_uid',
	'$user_fname', '$user_sex', '$user_city', '$user_village',
        '$user_tehsil', '$user_country', '$user_mobile', '$currentDateTime', '$user_status',
        '$user_DOB', '$user_marriage_any', '$user_email', '$user_acc_id','$user_email','$user_password')";
    //
        if (!mysqli_query($conn, $addCustomer)) {
        die('Error: ' . mysqli_error($conn));
        }
       
        /* START CODE TO SELECT CUSTOMER ID FROM DATABASE, @AUTHOR:HEMA-11FEB2020 */
        $selCustomerQuery = "SELECT * FROM user WHERE user_uid = '$user_uid'";
        $resCustomerSel = mysqli_query($conn, $selCustomerQuery);
        $rowCustomer = mysqli_fetch_assoc($resCustomerSel);
        $customerId = $rowCustomer['user_id'];

  
    }if($customerId != NULL || $customerId != ''){
        
    /* START CODE  TO SELECT CUSTOMER  INFORMATION, @AUTHOR:HEMA-11FEB2020 */
    $selCustDetailsQuery = "SELECT * From user WHERE user_id= '$customerId'";
    $resCustDetails = mysqli_query($conn, $selCustDetailsQuery);
    $rowCustDetails = mysqli_fetch_assoc($resCustDetails);
    $kittyFname = $rowCustDetails['user_fname'];
    $kittyLname = $rowCustDetails['user_lname'];
    $kittyCustCity = $rowCustDetails['user_city'];
    $kittyAdd = $rowCustDetails['user_add'];
    $kittyFirmId = $rowCustDetails['user_firm_id'];
    $kittyCustMobileNo = $rowCustDetails['user_mobile'];
    $kittyCustAddress = $rowCustDetails['kitty_cust_address'];
    $kittyCustId =  $rowCustDetails['user_id'];
    
    
    
    /* START CODE TO CHECK CUSTOMER IS ALREADY ADDED INTO THET KITTY OR NOT, @AUTHOR:HEMA-11FEB2020 */
//    $selKittyCustIdQuery = "SELECT * From kitty WHERE kitty_uid= '$kittyScheme' and kitty_cust_id = '$kittyCustId'";
//    $resKittyCustIdQuery= mysqli_query($conn, $selKittyCustIdQuery);
//    $rowKittyCustIdQuery = mysqli_fetch_assoc($resKittyCustIdQuery);
//    $checkKittyCustId = $rowKittyCustIdQuery['kitty_cust_id'];
    
    /* START CODE TO CHECK KITTY REFFERENCE NUMBER FROM CSV FILE, @AUTHOR:HEMA-11FEB2020 */
    $flag = FALSE;
    $selKittyCSVIdQuery = "SELECT kitty_csv_reference_no From kitty WHERE kitty_cust_id= '$kittyCustId'";
    $resKittyCSVIdQuery= mysqli_query($conn, $selKittyCSVIdQuery);
    $rowCountKittyCSVId = mysqli_num_rows($resKittyCSVIdQuery);
    /* IF ONLY ONE RECORD FOUND */
    if($rowCountKittyCSVId < 1){
      $checkKittyCSVId = $rowKittyCSVIdQuery['kitty_csv_reference_no'];
    }else{
        /* MORE THEN ONE RECORD FOUND */
          while ($rowKittyCSVIdQuery = mysqli_fetch_array($resKittyCSVIdQuery, MYSQLI_ASSOC)) {
            $kittyCSVId = $rowKittyCSVIdQuery['kitty_csv_reference_no'];
          $kittyCSVIdArray = $kittyCSVIdArray.$kittyCSVId.'#';
          }
         
        
            $kittyCSVIdVal = explode("#",$kittyCSVIdArray);
            for($j=0; $j<count($kittyCSVIdVal); $j++){
                 if($kitty_csv_reference_no == $kittyCSVIdVal[$j]){
                     $flag = TRUE;
                 }
            }
    }
    
    /* START CODE TO ADD KITTY IF CUSTOMER IS NOT ADDED INTO THAT KITTY, @AUTHOR:HEMA-11FEB2020 */
    //if($checkKittyCSVId == null || $checkKittyCSVId == ''){
    if((($kitty_csv_reference_no != $checkKittyCSVId) || $checkKittyCSVId == null || $checkKittyCSVId == '') && $flag != TRUE){
    $kittyGroup = $rowkittySchemeDetails['kitty_group'];
    $kittyEMIAmt =  $rowkittySchemeDetails['kitty_EMI_amt'];
    $kittyEMITotAmt = $kittyEMIAmt * $rowkittySchemeDetails['kitty_EMI_occurrences'];
    $kittyBonusAmt = $rowkittySchemeDetails['kitty_bonus_amt'];
    $kittyMainPrinAmt = $kittyEMITotAmt + $kittyBonusAmt ;
    $kittyPrinAmt = $kittyMainPrinAmt;
    $kittyEMIOccurrences = $rowkittySchemeDetails['kitty_EMI_occurrences'];
 
    /* START CODE TO SELECT KITTY SERIAL NUM, @AUTHOR:HEMA-11FEB2020 */
    
    $selkittySchemeSerialNumQuery = "SELECT * From kitty WHERE kitty_scheme= '$kittyScheme' and kitty_EMI_amt= '$kittyEMIAmt' ORDER BY kitty_serial_num DESC";
    $reskittySchemeSerialNum= mysqli_query($conn, $selkittySchemeSerialNumQuery);
    $rowkittySchemeSerialNum = mysqli_fetch_assoc($reskittySchemeSerialNum);
    $kittySerialNum = $rowkittySchemeSerialNum['kitty_serial_num'] + 1;
    $kittyBarcode = $kittyScheme . '00A' . $kittyPreSerialNo . $kittySerialNum;
//    if($kittyDOB == null || $kittyDOB == ''){
//    $kittyDOB = strtoupper(date('d M Y'));
//    }
    $kittyMetalType = $kitty_metal_type;
    if($kittyMetalType == null){
    $kittyMetalType = 'CASH';
    }else{
        $kittyMetalType = $kitty_metal_type;
    }
    $kittyUpdSts = 'New';
    $kittyFinalSts = 'pending';
    if($kitty_frequency == NULL || $kitty_frequency == ' '){
         $kittyEMIDays = 1;
    }else{
        $kittyEMIDays = $kitty_frequency;
    }
    $kittyTokenNum= $kitty_token_num;
    if($kitty_period == null || $kitty_period == ' ' ){
    $kittySchemePrdTyp = 'MONTH';
    }else{
        $kittySchemePrdTyp = $kitty_period;
    }
   
       /* CODE TO CALCULATE END DATE, @AUTHOR:HEMA-11FEB2020 */

for ($emiNo = 1; $emiNo <= $kittyEMIDays; $emiNo++) {
    if ($emiNo == 1) {
        if ($kittySchemePrdTyp == 'DAY') {
            $kittyStartDate = $kittyDOB;
            $endDate = strtotime("+" . $kittyEMIOccurrences . " days", strtotime($kittyStartDate));
            $dueDate = om_strtoupper(date("d M Y", $endDate));
        } else {
            $kittyStartDate = $kittyDOB;
            $kittyEndDOB = strtotime("+" . $kittyEMIOccurrences . " months", strtotime($kittyDOB));
            $dueDate = strtoupper(date("d M Y", $kittyEndDOB));
        }
    } else {
        if ($kittySchemePrdTyp == 'DAY') {
            $kittyStartDate = $kittyDOB;
            $kittyEndDOB = strtotime("+" . $kittyEMIOccurrences . " days", strtotime($kittyDOB));
            $dueDate = strtoupper(date("d M Y", $kittyEndDOB));
        } else {
            $kittyStartDate = $kittyDOB;
            $kittyEndDOB = strtotime("+" . $kittyEMIOccurrences . " months", strtotime($kittyDOB));
            $dueDate = strtoupper(date("d M Y", $kittyEndDOB));
        }
    }
}

   
     $insertKittyQuery =  "INSERT INTO kitty (
		  kitty_cust_id, kitty_own_id, kitty_firm_id, kitty_cust_fname, kitty_cust_lname, kitty_cust_mobile_no, 
                  kitty_cust_city, kitty_cust_Address, kitty_main_prin_amt, kitty_prin_amt,
		  kitty_DOB, kitty_scheme, kitty_EMI_days, kitty_EMI_occurrences, kitty_scheme_prd_typ,
                  kitty_group, kitty_pre_serial_num, kitty_serial_num, kitty_token_num, kitty_barcode, kitty_staff_id,
		  kitty_dr_acc_id, kitty_cr_acc_id, kitty_pay_other_info, kitty_other_info, kitty_upd_sts,
                  kitty_comm, kitty_EMI_amt, kitty_EMI_tot_amt, kitty_bonus_amt, kitty_gift_item, kitty_end_DOB, 
                  kitty_metal_type, kitty_final_sts, kitty_frequency, kitty_period, kitty_csv_reference_no) 
		  VALUES ('$kittyCustId', '$kittyOwnId', '$kittyFirmId', '$kittyFname', '$kittyLname', '$kittyCustMobileNo',"
                    . "'$kittyCustCity', '$kittyCustAddress', '$kittyMainPrinAmt', '$kittyPrinAmt', "
                    . "'$kittyDOB', '$kittyScheme', '$kittyEMIDays', '$kittyEMIOccurrences', '$kittySchemePrdTyp', "
                    . "'$kittyGroup', '$kittyPreSerialNo', '$kittySerialNum', '$kittyTokenNum', '$kittyBarcode', '$kittyStaffId', "
                    . "'$kittyDrAccId', '$kittyCrAccId', '$kittyPayOtherInfo', '$kittyOtherInfo', 'New', "
                    . "'', '$kittyEMIAmt', '$kittyEMITotAmt', '$kittyBonusAmt', '$kittyGiftItem', '$dueDate', "
                    . "'$kittyMetalType', 'pending', '$kitty_frequency', '$kitty_period', '$kitty_csv_reference_no')";
//echo '$insertKittyQuery = '.$insertKittyQuery.'</br>';
  
    if (!mysqli_query($conn, $insertKittyQuery)) {
    die('Error: ' . mysqli_error($conn));
    }
    
            $queryKitty= "SELECT kitty_id FROM kitty where kitty_own_id='$kittyOwnId' order by kitty_id desc LIMIT 0,1";
            $resKitty = mysqli_query($conn, $queryKitty);
            $rowKitty = mysqli_fetch_assoc($resKitty);
            $kittyId = $rowKitty['kitty_id'];
            $kittyEMISatus = 'Due';
            $currentDateTime =  date("Y-m-d h:i:s", strtotime($kittyDOB));
//            if ($kittyBonusAmt > 0) {
                $kittyEMIOccurrences = ($kittyEMIOccurrences + 1);
//            }

            for ($emiNo = 1; $emiNo <= $kittyEMIOccurrences; $emiNo++) {
                //
                if ($emiNo == 1) {
                    if ($kittySchemePrdTyp == 'DAY') {
                        $kittyStartDate = $kittyDOB;
                        $endDate = strtotime("+" . $kittyEMIDays . " days", strtotime($kittyStartDate));
                        $dueDate = strtoupper(date("d M Y", $endDate));
                    } else {
                        $kittyStartDate = $kittyDOB;
                        $endDate = strtotime("+" . $kittyEMIDays . " months", strtotime($kittyStartDate));
                        $dueDate = strtoupper(date("d M Y", $endDate));
                    }
                }
                //
                if ($emiNo == $kittyEMIOccurrences) { // && $kittyBonusAmt > 0 STATUS = "BonusAmount" WHEN BONUS AMOUNT ENTERED @AUTHOR:SHRI30NOV19
                    $kittyEMISatus = 'BonusAmount';
                }
                
                //
                $queryItem = "INSERT INTO kitty_money_deposit"
                        . "(kitty_mondep_kitty_id, kitty_mondep_cust_id, kitty_mondep_own_id, kitty_mondep_firm_id, "
                        . "kitty_mondep_prin_amt, kitty_mondep_date, kitty_mondep_ent_dat, "
                        . "kitty_mondep_upd_sts, kitty_mondepd_dr_acc_id, kitty_mondepd_cr_acc_id, kitty_mondepd_dr_cash_acc_id, "
                        . "kitty_mondepd_loan_acc_id,"
                        . "kitty_mondep_EMI_no, kitty_mondep_EMI_start_DOB, kitty_mondep_EMI_end_DOB, kitty_mondep_EMI_status, "
                        . "kitty_mondep_EMI_paid_date, kitty_mondep_EMI_total_amt, kitty_mondepd_staff_id, "
                        . "kitty_mondepd_recipit_no, kitty_final_sts) VALUES "
                        . "('$kittyId', '$kittyCustId', '$kittyOwnId', '$kittyFirmId', '$kittyEMIAmt', '$kittyDOB', "
                        . "'$currentDateTime', '$kittyMonDepStatus', '$kittyPayAccId', '$kittyDrAccId', "
                        . "'', '', "
                        . "'$emiNo', '$kittyStartDate', '$dueDate', '$kittyEMISatus', '', '$kittyEMIAmt', '$kittyStaffId', "
                        . "'$newKittyRecipitNo', 'pending')";
                
                //
                if (!mysqli_query($conn, $queryItem)) {
                    die('Error: ' . mysqli_error($conn));
                }
                //
                if ($kittySchemePrdTyp == 'DAY') {
                    $kittyStartDate = $dueDate;
                    $endDate = strtotime("+" . $kittyEMIDays . " days", strtotime($kittyStartDate));
                    $dueDate = strtoupper(date("d M Y", $endDate));
                } else {
                    $kittyStartDate = $dueDate;
                    $endDate = strtotime("+" . $kittyEMIDays . " months", strtotime($kittyStartDate));
                    $dueDate = strtoupper(date("d M Y", $endDate));
                }
            }
    }
    }
    
}
}
?>

