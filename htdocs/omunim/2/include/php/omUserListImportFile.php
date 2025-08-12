<?php
/*
 * **********************************************************************************************************************************
 * @tutorial:  Import Data From CSV File to Mysql Database for User List @PRIYANKA-08SEP21
 * **********************************************************************************************************************************
 *
 * Created on 08 SEP, 2021 03.40.00 PM
 * 
 * @FileName: omUserListImportFile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.80
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 * Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-08SEP21
 *  REASON:
 *
 */
?>
<?php
//
if (!isset($_SESSION)) {
    session_start();
}
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
$currentFileName = basename(__FILE__);
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
?>
<?php
//
//print_r($_REQUEST);
//die;
//
//print_r($_FILES['CVSFile']);
//die;
//
//echo 'Current PHP version: ' . phpversion();
//
//        
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}  
//
//
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm 
    $selFirmId = $_SESSION['setFirmSession'];
}
//
//echo '$selFirmId == ' . $selFirmId . '</br>';
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' "
                   . "$sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' "
                   . "$sessionFirmStr order by firm_since desc";
}
//
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
//
//echo '$selFirmId : ' . $selFirmId . '<br />';
//die;
//
//
if ($_REQUEST['MISoftwareFinancialYearSelected'] != '' && $_REQUEST['MISoftwareFinancialYearSelected'] != NULL) {
    //
    $financialYear = $_REQUEST['MISoftwareFinancialYearSelected'];
    //
    $setMISoftwareFinancialYearSelected = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' "
                                        . "AND omly_option = 'MISoftwareFinancialYearSelected'";
    //
    $resMISoftwareFinancialYearSelected = mysqli_query($conn, $setMISoftwareFinancialYearSelected);
    $numOfRowMISoftwareFinancialYearSelected = mysqli_num_rows($resMISoftwareFinancialYearSelected);
    //
    if ($numOfRowMISoftwareFinancialYearSelected == 0) {
        //
        $query = "INSERT INTO omlayout(omly_own_id, omly_option, omly_value) "
               . "VALUES ('$sessionOwnerId', 'MISoftwareFinancialYearSelected', '$financialYear');";
        //
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
    } else {
        //
        $query = "UPDATE omlayout SET omly_value = '$financialYear' "
               . "WHERE omly_own_id = '$sessionOwnerId' AND omly_option = 'MISoftwareFinancialYearSelected'";
        //
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
    }
    //
} else { ?>
    <div class="fs_13 ff_calibri bold" style="color:red;">Issue has been detected with Financial Year. Please select Financial Year! </div>
<?php 
die; 
}
//
//
//
// Start Code to Import Data From CSV File to Mysql Database for User List @PRIYANKA-08SEP21
//
$fileName = $_FILES['CVSFile']['name'];
//
// Input Field Name
$importFile = $_FILES['CVSFile']['tmp_name'];
// 
$readImportFile = fopen($importFile, "r");
//
//
$rowsCounter = 0;
//
//
while (($user = fgetcsv($readImportFile, 10000, ",")) !== false) {
        //
        //
        if ($rowsCounter == 0) {        
            //
            $columnCounter = count($user);
            //
            //
            //echo '$columnCounter == ' . $columnCounter . '<br />';
            //die;
            //
            //
            //Party Name	Address Ist	Address 2nd	Address 3rd	Location	
            //City	Mobile	Group	Total	Gold Fine	Sil.Fine	
            //Show In	Active	Bal. Date	Tran	Flag	Prefix	Cus.Type	
            //Print Name	Tin No	Pan No	Phone	
            //Date Of Birth	Anniversary.	
            //Deal	Login	Date Time	Vouher	Short Name	
            //Commision	Refer.By	Agent	Lab.On	Int %/Depriciation	
            //Cr.Days	Tag Min Lbr	Kitty No	Kitty Srno	
            //Department	Salary	Sal.code	Join Date	Leave Date	
            //Points	Sal Ins.	TCS	Category	
            //Other Chg.	Address4	
            //State	GSTIN	Uidno	UAN No	Deduction
            //
            //
            //$user[] = json_decode($json1,true);
            //$user[] = json_decode($json2,true);
            //$json_merge = json_encode($user);
            //
            //
            for ($i=0; $i<$columnCounter; $i++) {
                //
                //echo '$i == ' . $i. '<br />';
                //echo '$user == ' . $user[$i] . '<br />';
                //
                if ($user[$i] == 'Party Name' || $user[$i] == 'A/c Name') {              //ADDED A/C NAME @SIMRAN:13APR2023
                    $json1 = '{"columnName":"Party Name", "position":' . $i . ',' . '"tableColumnName":"user_fname"}';
                    $allData[] = json_decode($json1,true);
                }
                //
                //
                if ($user[$i] == 'Group') {
                    $json2 = '{"columnName":"Group", "position":' . $i . ',' . '"tableColumnName":"user_type"}';
                    $allData[] = json_decode($json2,true);
                }
                //
                //
                if ($user[$i] == 'Mobile') {
                    $json3 = '{"columnName":"Mobile", "position":' . $i . ',' . '"tableColumnName":"user_mobile"}';
                    $allData[] = json_decode($json3,true);
                }
                //
                //
                if ($user[$i] == 'Phone') {
                    $json4 = '{"columnName":"Phone", "position":' . $i . ',' . '"tableColumnName":"user_phone"}';
                    $allData[] = json_decode($json4,true);
                }
                //
                //
//                if ($user[$i] == 'Date Of Birth') {
//                    $json5 = '{"columnName":"Date Of Birth", "position":' . $i . ',' . '"tableColumnName":"user_fname"}';
//                    $allData[] = json_decode($json5,true);
//                }
//                //
//                //
//                if ($user[$i] == 'Anniversary.') {
//                    $json6 = '{"columnName":"Anniversary.", "position":' . $i . ',' . '"tableColumnName":"user_marriage_any"}';
//                    $allData[] = json_decode($json6,true);
//                }
//                //
//                //
                if ($user[$i] == 'Address Ist') {
                    $json7 = '{"columnName":"Address Ist", "position":' . $i . ',' . '"tableColumnName":"user_add"}';
                    $allData[] = json_decode($json7,true);
                }
                //
                //
                if ($user[$i] == 'Location') {
                    $json8 = '{"columnName":"Location", "position":' . $i . ',' . '"tableColumnName":"user_current_address"}';
                    $allData[] = json_decode($json8,true);
                }
                //
                //
                if ($user[$i] == 'City') {
                    $json5 = '{"columnName":"City", "position":' . $i . ',' . '"tableColumnName":"user_city"}';
                    $allData[] = json_decode($json5,true);
                }
                //
                //
                if ($user[$i] == 'State') {
                    $json6 = '{"columnName":"State", "position":' . $i . ',' . '"tableColumnName":"user_state"}';
                    $allData[] = json_decode($json6,true);
                }
                //
                //
                if ($user[$i] == 'Pan No') {
                    $json7 = '{"columnName":"Pan No", "position":' . $i . ',' . '"tableColumnName":"user_pan_it_no"}';
                    $allData[] = json_decode($json7,true);
                }
                //
                //
//                if ($user[$i] == 'Tin No') {
//                    $json12 = '{"columnName":"Tin No", "position":' . $i . ',' . '"tableColumnName":"user_sale_tax_no"}';
//                    $allData[] = json_decode($json12,true);
//                }
                //
                //
                if ($user[$i] == 'GSTIN') {
                    $json8 = '{"columnName":"GSTIN", "position":' . $i . ',' . '"tableColumnName":"user_cst_no"}';
                    $allData[] = json_decode($json8,true);
                }
                //
                //
//                if ($user[$i] == 'Refer.By') {
//                    $json14 = '{"columnName":"Refer.By", "position":' . $i . ',' . '"tableColumnName":"user_reference"}';
//                    $allData[] = json_decode($json14,true);
//                }
//                //
//                //
//                if ($user[$i] == 'Salary') {
//                    $json15 = '{"columnName":"Salary", "position":' . $i . ',' . '"tableColumnName":"user_monthly_income"}';
//                    $allData[] = json_decode($json15,true);
//                }
//                //
//                //
//                if ($user[$i] == 'Total') {
//                    $json16 = '{"columnName":"Total", "position":' . $i . ',' . '"tableColumnName":"user_cash_balance"}';
//                    $allData[] = json_decode($json16,true);
//                }
//                //
//                //
//                if ($user[$i] == 'Gold Fine') {
//                    $json17 = '{"columnName":"Gold Fine", "position":' . $i . ',' . '"tableColumnName":"user_gd_ffn_wt"}';
//                    $allData[] = json_decode($json17,true);
//                }
                //
                //
//                if ($user[$i] == 'Sil.Fine') {
//                    $json18 = '{"columnName":"Sil.Fine", "position":' . $i . ',' . '"tableColumnName":"user_sl_ffn_wt"}';
//                    $allData[] = json_decode($json18,true);
//                }
//                //
//                //
//                if ($user[$i] == 'Bal. Date') {
//                    $json19 = '{"columnName":"Bal. Date", "position":' . $i . ',' . '"tableColumnName":"Bal. Date"}';
//                    $allData[] = json_decode($json19,true);
//                }
                //
                // ADDED UIDNO @SIMRAN:13APR2023
                 if ($user[$i] == 'Uidno') {
                    $json9 = '{"columnName":"Uidno", "position":' . $i . ',' . '"tableColumnName":"Uidno"}';
                    $allData[] = json_decode($json9,true);
                }
                //
                // ADDED Cus.Type @SIMRAN:13APR2023
                 if ($user[$i] == 'Cus.Type') {
                    $json10 = '{"columnName":"Cus.Type", "position":' . $i . ',' . '"tableColumnName":"Cus.Type"}';
                    $allData[] = json_decode($json10,true);
                }        
              
                
            }
            //
            //
            $json_merge = json_encode($allData);
            //
            //
            $json_merge = ($allData);
            //
            //
            //print_r($json_merge);
            //echo '<pre>';
            //echo("<br/>");
            //die;
            //
            //
            //foreach ($json_merge as $headings)  {
                    //echo($headings['columnName'] . ", " . $headings['position']. ", " . $headings['tableColumnName']);
                    //echo("<br/>");
            //}
            //
            //
        }
        //
        //
        //die;
        //
        //
        if ($rowsCounter > 0) {
            //
            //
            foreach ($json_merge as $headings)  {
                //
                //echo($headings['columnName'] . ", " . $headings['position']. ", " . $headings['tableColumnName']);
                //echo("<br/>");
                //
                if ($headings['columnName'] == 'Party Name' || $headings['columnName'] == 'A/c Name') {               //ADDED A/C NAME @SIMRAN:13APR2023
                    $user_fname = $user[$headings['position']];
                }
                //
                //
                if ($headings['columnName'] == 'Group') {
                    $user_type = $user[$headings['position']];
                }
                //
                //
                if ($headings['columnName'] == 'Mobile') {
                    $user_mobile = $user[$headings['position']];
                }
                //
                //
                if ($headings['columnName'] == 'Phone') {
                    $user_phone = $user[$headings['position']];
                }
                //
                //
//                if ($headings['columnName'] == 'Date Of Birth') {
//                    $DOB = $user[$headings['position']];
//                }
//                //
//                //
//                if ($headings['columnName'] == 'Anniversary.') {
//                    $marriageDate = $user[$headings['position']];
//                }
//                //
//                //
                if ($headings['columnName'] == 'Address Ist') {
                    $user_add = $user[$headings['position']];
                }
                //
                //
                if ($headings['columnName'] == 'Location') {
                    $user_current_address = $user[$headings['position']];
                }
                //
                //
                if ($headings['columnName'] == 'City') {
                    $user_city = $user[$headings['position']];
                }
                //
                //
                if ($headings['columnName'] == 'State') {
                    $user_state = $user[$headings['position']];
                }
                //
                //
                if ($headings['columnName'] == 'Pan No') {
                   $user_pan_it_no = $user[$headings['position']];
                }
                //
                //
//                if ($headings['columnName'] == 'Tin No') {
//                    $user_sale_tax_no = $user[$headings['position']];
//                }
                //
                //
                if ($headings['columnName'] == 'GSTIN') {
                    $user_cst_no = $user[$headings['position']];
                }
                //
                //
//                if ($headings['columnName'] == 'Refer.By') {
//                    $user_reference = $user[$headings['position']];
//                }
//                //
//                //
//                if ($headings['columnName'] == 'Salary') {
//                    $user_monthly_income = $user[$headings['position']];
//                }
//                //
//                //
//                if ($headings['columnName'] == 'Total') {
//                    $user_cash_balance = $user[$headings['position']];
//                }
//                //
//                //
//                if ($headings['columnName'] == 'Gold Fine') {
//                    $user_gd_ffn_wt = $user[$headings['position']];
//                }
//                //
//                //
//                if ($headings['columnName'] == 'Sil.Fine') {
//                   $user_sl_ffn_wt = $user[$headings['position']];
//                }
//                //
//                //
//                if ($headings['columnName'] == 'Bal. Date') {
//                   $balanceDate = $user[$headings['position']];
//                }
                //
                // ADDED UIDNO @SIMRAN:13APR2023
                if ($headings['columnName'] == 'Uidno') {
                   $user_adhaar_card = $user[$headings['position']];
                }
                //
                //ADDED Cus.Type @SIMRAN:13APR2023
                if ($headings['columnName'] == 'Cus.Type') {
                   $user_ = $user[$headings['position']];
                }            
                
            }
            //
            //
//            echo 'user_fname == ' . $user_fname . ' || ' . 'user_type == ' . $user_type . ' || ' . 'user_mobile == ' . $user_mobile . ' || ' . 'user_city == ' . $user_city;
            //echo("<br/>");
            //die;
            //
            //
            $user_firm_id = $selFirmId;
            //
//            echo 'user_firm_id == ' . $user_firm_id;
            //echo("<br/>");
            //
            //
            if ($user_firm_id != '' && $user_firm_id != NULL) {
            // 
            //    
            if ($user_fname != '' && $user_fname != NULL && 
                $user_type != '' && $user_type != NULL) {
            // 
            //
            if ($user_type == 'SALESMAN') {
                //
                $user_type = 'STAFF';
                $acc_user_acc = 'Employee & Staff';
                $acc_pri_acc = 'Employee';
                $user_category = 'Executive'; 
                $user_priority = 'New Staff';
                $user_father_name = NULL;
                $user_shop_name = NULL;
                //
            }
            //
            //
            if ($user_type == 'UN REGISTERD DEALER' || $user_type == 'KARIGAR' || $user_type == 'SUPPLIER') {
                //
                if ($user_type == 'KARIGAR') {
                    $user_category = 'Karigar';   
                } else {
                    $user_category = 'Retailer';   
                }
                //
                if ($user_type == 'UN REGISTERD DEALER' || $user_type == 'KARIGAR') {
                    $user_type = 'SUPPLIER';
                }
                //
                $acc_user_acc = 'Sundry Creditors';
                $acc_pri_acc = 'Liabilities';
                //                
                $user_priority = "New Supplier";
                $user_father_name = NULL;
                $user_shop_name = $user_fname;
                //
            }
            // 
            // 
            $user_type = rtrim($user_type);
            if ($user_type == 'CUSTOMER') {
                //
                $acc_user_acc = 'Sundry Debtors';
                $acc_pri_acc = 'Assets';
                $user_category = 'Customer';  
                $user_priority = "New Customer";
                $user_father_name = "S";
                $user_shop_name = NULL;
                //
            }
            
             $user_type = rtrim($user_type);
            //             
            //
            if ($user_type == 'CUSTOMER' || $user_type == 'SUPPLIER' || $user_type == 'STAFF') { 
            //
            //           
            if ($user_type == 'STAFF') {
                $qLastCustDetails = "SELECT user_pid, user_uid FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                                  . "AND user_type = 'STAFF' order by user_pid desc LIMIT 0,1";
            } 
            else if ($user_type == 'SUPPLIER') {
                $qLastCustDetails = "SELECT user_pid, user_uid FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                                  . "AND user_type = 'SUPPLIER' order by user_pid desc LIMIT 0,1";
            } 
            else {
                $qLastCustDetails = "SELECT user_pid, user_uid FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                                  . "AND user_type = 'CUSTOMER' order by user_pid desc LIMIT 0,1";
            }
            //
            $resLastCustDetails = mysqli_query($conn, $qLastCustDetails);
            $rowLastCustDetails = mysqli_fetch_array($resLastCustDetails, MYSQLI_ASSOC);
            //
            $uPreCustId = NULL;
            $uPreCustId = $rowLastCustDetails['user_pid'];
            $ucustId = NULL;
            $ucustId = $rowLastCustDetails['user_uid'];
            //
            if ($ucustId == NULL || $ucustId == '') {
                $ucustId = '1';
            } else {
                $ucustId++;
            }
            //
            if ($uPreCustId == NULL || $uPreCustId == '') {
                if ($user_type == 'STAFF') {
                    $uPreCustId = 'ES';
                } else if ($user_type == 'SUPPLIER') {
                    $uPreCustId = 'W';
                } else {
                    $uPreCustId = 'C';
                }
            }
            //
            //
            $user_pid = $uPreCustId;
            $user_uid = $ucustId;
            //
            //
            //echo '$user_fname == '.$user_fname.'<br />';   
            //echo '$user_firm_id == '.$user_firm_id.'<br />';  
            //echo '$acc_pri_acc == '.$acc_pri_acc.'<br />';
            //echo '$acc_user_acc == '.$acc_user_acc.'<br />';
            //
            //
            // FOR USER ACCOUNT ID @PRIYANKA-08SEP21
            $qSelAcc = "SELECT acc_id FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' "
                     . "and acc_firm_id = '$user_firm_id' "
                     . "and acc_pri_acc = '$acc_pri_acc' and acc_user_acc = '$acc_user_acc'";
            //
            $resAcc = mysqli_query($conn, $qSelAcc);
            $accAvail = mysqli_num_rows($resAcc);
            //
            //echo '$accAvail == '.$accAvail.'<br /><br />';
            //
            if ($accAvail > 0) {
                //
                $rowAccId = mysqli_fetch_array($resAcc);
                $user_acc_id = $rowAccId['acc_id'];
                //
            }
            //     
            //echo '$user_fname == '.$user_fname.'<br />';   
            //echo '$user_type == '.$user_type.'<br />';    
            //echo '$user_acc_id == '.$user_acc_id.'<br /><br />';
            //    
            $user_owner_id = $sessionOwnerId;
            //        
            //  
            if ($balanceDate != '' && $balanceDate != NULL) {
                $user_balance_date = date("d M Y", strtotime($balanceDate));
            } else {
                $user_balance_date = date("d M Y");
            }
            //
            //echo '$user_balance_date == ' . $user_balance_date . '<br />';
            //
            $user_balance_date = strtoupper($user_balance_date);
            //
            $arrAddDate = explode(' ', $user_balance_date);
            //
            $balDay = $arrAddDate[0];
            $balMonth = strtoupper($arrAddDate[1]);
            $balYear = $arrAddDate[2];
            //
            //
            $user_comm_upd_date = '01 APR ' . $financialYear;    
            //
            //$user_comm_upd_date = '01 APR 2021';                                        
            //                                  
            // 
            //echo '$user_comm_upd_date == '.$user_comm_upd_date.'<br />';
            //                                                            
            //                                                                                                                                                                                
            //echo '$DOB == '.$DOB.'<br />';
            //
            if ($DOB != '' && $DOB != NULL) {
                $user_DOB = date("d M Y", strtotime($DOB));
            } else {
                $user_DOB = NULL;
            }
            //
            //echo '$user_DOB == '.$user_DOB.'<br />';
            //
            $user_DOB = strtoupper($user_DOB);
            //
            //
            //echo '$marriageDate == '.$marriageDate.'<br />';
            //
            if ($marriageDate != '' && $marriageDate != NULL) {
                $user_marriage_any = date("d M Y", strtotime($marriageDate));
            } else {
                $user_marriage_any = NULL;
            }
            //
            //echo '$user_marriage_any == '.$user_marriage_any.'<br /><hr>';
            //
            $user_marriage_any = strtoupper($user_marriage_any);
            //
            //
            $user_address = $user_add;
            //            
            $user_country = 'India';
            //
            $user_status = 'Active';
            //
            //
            $allUserMobile = NULL;
            $allUserMobile_1 = NULL;
            $allUserMobile_2 = NULL;
            $allUserMobile_3 = NULL;
            $allUserMobile_4 = NULL;
            //
            //
            //$allUserMobile = $user_mobile . '_';
            //
            //
            //echo '$allUserMobile == '.$allUserMobile.'<br /><hr>';
            //
            //
            $noOfRowsMobileNumber = NULL;
            $noOfRowsMobileNumber1 = NULL;
            $noOfRowsMobileNumber2 = NULL;
            $noOfRowsMobileNumber3 = NULL;
            $noOfRowsMobileNumber4 = NULL;            
            //
            //
            //
            //
            if($user_mobile != ''){
            $qSelMobileNumber = "SELECT * FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
                              . "AND user_mobile = '$user_mobile'"
                              . "ORDER BY user_id ASC ";
                            //. "AND user_firm_id = '$user_firm_id' ORDER BY user_id ASC";
            //
            //echo '$qSelMobileNumber == '.$qSelMobileNumber.'<br /><hr>';
            //
            $resMobileNumber = mysqli_query($conn, $qSelMobileNumber);
            $noOfRowsMobileNumber = mysqli_num_rows($resMobileNumber);
            }else{
                $noOfRowsMobileNumber = 0;
            }
            //
            //
            //echo '$noOfRowsMobileNumber == ' . $noOfRowsMobileNumber.'<br /><hr>';
            //
            //
            if ($noOfRowsMobileNumber == 0) {
//                //
//                //
//                //
//                //
//                //$noOfRowsMobileNumber = ($noOfRowsMobileNumber);
//                //
//                //echo '$noOfRowsMobileNumber == ' . $noOfRowsMobileNumber.'<br /><hr>';
//                //
//                $allUserMobile_1 = $user_mobile . '_1';
//                //
//                $qSelMobileNumber1 = "SELECT * FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
//                                   . "AND user_mobile = '$allUserMobile_1' "
//                                   . "ORDER BY user_id ASC ";
//                                 //. "AND user_firm_id = '$user_firm_id' ORDER BY user_id ASC";
//                //
//                //echo '$qSelMobileNumber1 == '.$qSelMobileNumber1.'<br /><hr>';
//                //
//                $resMobileNumber1 = mysqli_query($conn, $qSelMobileNumber1);
//                $noOfRowsMobileNumber1 = mysqli_num_rows($resMobileNumber1);
//                //
//                if ($noOfRowsMobileNumber1 > 0) {
//                    //
//                    //
//                    $allUserMobile_2 = $user_mobile . '_2';
//                    //
//                    $qSelMobileNumber2 = "SELECT * FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
//                                       . "AND user_mobile = '$allUserMobile_2' "
//                                       . "ORDER BY user_id ASC ";
//                                     //. "AND user_firm_id = '$user_firm_id' ORDER BY user_id ASC";
//                    //
//                    //echo '$qSelMobileNumber2 == '.$qSelMobileNumber2.'<br /><hr>';
//                    //
//                    $resMobileNumber2 = mysqli_query($conn, $qSelMobileNumber2);
//                    $noOfRowsMobileNumber2 = mysqli_num_rows($resMobileNumber2);
//                    //
//                    //
//                    if ($noOfRowsMobileNumber2 > 0) {
//                        //
//                        //
//                        $allUserMobile_3 = $user_mobile . '_3';
//                        //
//                        $qSelMobileNumber3 = "SELECT * FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
//                                           . "AND user_mobile = '$allUserMobile_3' "
//                                           . "ORDER BY user_id ASC ";
//                                         //. "AND user_firm_id = '$user_firm_id' ORDER BY user_id ASC";
//                        //
//                        //echo '$qSelMobileNumber3 == '.$qSelMobileNumber3.'<br /><hr>';
//                        //
//                        $resMobileNumber3 = mysqli_query($conn, $qSelMobileNumber3);
//                        $noOfRowsMobileNumber3 = mysqli_num_rows($resMobileNumber3);
//                        //
//                        //
//                        if ($noOfRowsMobileNumber3 > 0) {
//                            //
//                            //
//                            $allUserMobile_4 = $user_mobile . '_4';
//                            //
//                            $qSelMobileNumber4 = "SELECT * FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
//                                               . "AND user_mobile = '$allUserMobile_4' "
//                                               . "ORDER BY user_id ASC ";
//                                             //. "AND user_firm_id = '$user_firm_id' ORDER BY user_id ASC";
//                            //
//                            //echo '$qSelMobileNumber4 == '.$qSelMobileNumber4.'<br /><hr>';
//                            //
//                            $resMobileNumber4 = mysqli_query($conn, $qSelMobileNumber4);
//                            $noOfRowsMobileNumber4 = mysqli_num_rows($resMobileNumber4);
//                            //
//                            //
//                            if ($noOfRowsMobileNumber4 > 0) {
//                                //
//                                //
//                                $allUserMobile_5 = $user_mobile . '_5';
//                                //
//                                $qSelMobileNumber5 = "SELECT * FROM user WHERE user_owner_id = '$_SESSION[sessionOwnerId]' "
//                                                   . "AND user_mobile = '$allUserMobile_5' "
//                                                   . "ORDER BY user_id ASC ";
//                                                 //. "AND user_firm_id = '$user_firm_id' ORDER BY user_id ASC";
//                                //
//                                //echo '$qSelMobileNumber5 == '.$qSelMobileNumber5.'<br /><hr>';
//                                //
//                                $resMobileNumber5 = mysqli_query($conn, $qSelMobileNumber5);
//                                $noOfRowsMobileNumber5 = mysqli_num_rows($resMobileNumber5);
//                                //
//                                //
//                                if ($noOfRowsMobileNumber5 > 0) {
//                                    //
//                                    $user_mobile = $user_mobile . '_6';
//                                    //
//                                } else {
//                                    //
//                                    $user_mobile = $user_mobile . '_5';
//                                    //
//                                }
//                                //
//                            } else {
//                                //
//                                $user_mobile = $user_mobile . '_4';
//                                //
//                            }
//                            //
//                        } else {
//                            //
//                            $user_mobile = $user_mobile . '_3';
//                            //
//                        }
//                        //
//                    } else {
//                        //
//                        $user_mobile = $user_mobile . '_2';
//                        //
//                    }
//                    //
//                } else {
//                    //
//                    $user_mobile = $user_mobile . '_1';
//                    //
//                }
//            }
            //
            //
            //echo '$user_mobile == '.$user_mobile.'<br /><hr>';
            //echo '$rowsCounter == '.$rowsCounter.'<br /><hr>';
            //
            //
            if ($user_mobile == '' || $user_mobile == NULL) {
                $user_mobile = NULL;
            }
            //
            if ($user_phone == '' || $user_phone == NULL) {
                $user_phone = NULL;
            }
            //
            if ($user_DOB == '' || $user_DOB == NULL) {
                $user_DOB = NULL;
            }
            //
            if ($user_marriage_any == '' || $user_marriage_any == NULL) {
                $user_marriage_any = NULL;
            }
            //
            //
            if ($user_father_name == '' || $user_father_name == NULL) {
                $user_father_name = NULL;
            }
            //
            //
            if ($user_shop_name == '' || $user_shop_name == NULL) {
                $user_shop_name = NULL;
            }            
            //
            //
            $user_fname = stripslashes("$user_fname");
            //
            //
            if ($user_city == '.HARDOI') {
                $user_city = "HARDOI";
            }
            //
            //
            if ($user_state == 'Andaman & Nicobar Islands') {
                $user_state = "Andaman and Nicobar Islands";
            }
            //
            //
            parse_str(getTableValues("SELECT state_code FROM state WHERE state_name = '$user_state' "
                                   . "AND state_own_id = '$user_owner_id'"));
            //
            //echo '$state_code == ' . $state_code . '<br />';
            //
            $user_state_code = $state_code;
            //
            //
            if ($user_state_code == '' || $user_state_code == NULL) {
                $user_state_code = NULL;
            }
            //
            //
            if ($user_state == '' || $user_state == NULL) {
                $user_state_code = NULL;
            }
            //
            //
            if ($user_adhaar_card == '' || $user_adhaar_card == NULL) {
                $user_adhaar_card = NULL;
            }
            
            //
            //
            if ($user_cash_balance > 0) {
                $user_cash_bal_crdr = 'DR';
            } else {
                $user_cash_bal_crdr = 'CR';
            }
            //
            //
            $user_cash_balance = abs($user_cash_balance);
            //
            //
            if ($user_cash_balance == 0) {
                $user_cash_balance = '';
            }
            //
            //
            $user_lname = '';
            $user_mother_name = '';
            //
            //
            if ($user_mobile != '' && $user_mobile != NULL) {             
            //
            //
            $query = "INSERT INTO user (user_owner_id, user_firm_id, user_type, user_category, 
                                        user_pid, user_uid,	
                                        user_fname, user_lname, user_father_name, user_mother_name, user_shop_name, 
                                        user_current_address, user_add, 
                                        user_city, user_state, user_state_code, user_country, 
                                        user_pan_it_no, user_sale_tax_no, user_cst_no, 
                                        user_reference, user_monthly_income, 
                                        user_cash_balance, user_cash_bal_crdr, user_gd_ffn_wt, user_sl_ffn_wt,
                                        user_mobile, user_phone, user_status, user_since,
                                        user_DOB, user_marriage_any, user_acc_id, 
                                        user_priority, user_comm_upd_date,user_adhaar_card) 
                                VALUES ('$user_owner_id', '$user_firm_id', '$user_type', '$user_category', 
                                        '$user_pid', '$user_uid',
                                        '$user_fname', '$user_lname', '$user_father_name', '$user_mother_name', '$user_shop_name', 
                                        '$user_current_address', '$user_address', 
                                        '$user_city', '$user_state', '$user_state_code', '$user_country',
                                        '$user_pan_it_no', '$user_sale_tax_no', '$user_cst_no',
                                        '$user_reference', '$user_monthly_income', 
                                        '$user_cash_balance', '$user_cash_bal_crdr', '$user_gd_ffn_wt', '$user_sl_ffn_wt',   
                                        '$user_mobile', '$user_phone', '$user_status', $currentDateTime,
                                        '$user_DOB', '$user_marriage_any', '$user_acc_id', 
                                        '$user_priority', '$user_comm_upd_date','$user_adhaar_card')";
            //
            //
            } else {
            //
            //    
            $query = "INSERT INTO user (user_owner_id, user_firm_id, user_type, user_category, 
                                        user_pid, user_uid,	
                                        user_fname, user_lname, user_father_name, user_mother_name, user_shop_name, 
                                        user_current_address, user_add, 
                                        user_city, user_state, user_state_code, user_country, 
                                        user_pan_it_no, user_sale_tax_no, user_cst_no, 
                                        user_reference, user_monthly_income, 
                                        user_cash_balance, user_cash_bal_crdr, user_gd_ffn_wt, user_sl_ffn_wt,
                                        user_mobile, user_phone, user_status, user_since,
                                        user_DOB, user_marriage_any, user_acc_id, 
                                        user_priority, user_comm_upd_date,user_adhaar_card) 
                                VALUES ('$user_owner_id', '$user_firm_id', '$user_type', '$user_category', 
                                        '$user_pid', '$user_uid',
                                        '$user_fname', '$user_lname', '$user_father_name', '$user_mother_name', '$user_shop_name', 
                                        '$user_current_address', '$user_address', 
                                        '$user_city', '$user_state', '$user_state_code', '$user_country',
                                        '$user_pan_it_no', '$user_sale_tax_no', '$user_cst_no',
                                        '$user_reference', '$user_monthly_income', 
                                        '$user_cash_balance', '$user_cash_bal_crdr', '$user_gd_ffn_wt', '$user_sl_ffn_wt',   
                                         NULL, '$user_phone', '$user_status', $currentDateTime,
                                        '$user_DOB', '$user_marriage_any', '$user_acc_id', 
                                        '$user_priority', '$user_comm_upd_date','$user_adhaar_card')";  
            //
            //
            }
            //
            //
           // echo '$query == '.$query.'<br />';
            //die;
            //
            //
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
            //
            parse_str(getTableValues("SELECT user_id FROM user WHERE user_owner_id = '$user_owner_id' "
                                   . "AND user_pid = '$user_pid' AND user_uid = '$user_uid' ORDER BY user_id DESC LIMIT 0,1"));
            //
            //
            if ($user_cash_balance <> 0) {
                user_opening_balance($user_id, $user_firm_id, $user_acc_id, $user_cash_balance, $user_cash_bal_crdr, '', '', '', '', '', '', $user_comm_upd_date, '');
            }
            //
            //
            $showMess = 'User Data Imported Successfully!!!';
            //
            //
            }
            //
            //
            } else {
                //
                //
                //
                //
                $acc_firm_id = $selFirmId;
                //
                //
                if ($acc_firm_id != '' && $acc_firm_id != NULL) {
                //
                //
                //  
                if ($balanceDate != '' && $balanceDate != NULL) {
                    $acc_balance_date = date("d M Y", strtotime($balanceDate));
                } else {
                    $acc_balance_date = date("d M Y");
                }
                //
                //echo '$acc_balance_date == ' . $acc_balance_date . '<br />';
                //
                $acc_balance_date = strtoupper($acc_balance_date);
                //
                $arrAddDate = explode(' ', $acc_balance_date);
                //
                $balDay = $arrAddDate[0];
                $balMonth = strtoupper($arrAddDate[1]);
                $balYear = $arrAddDate[2];
                //
                //
                $acc_cash_balance_date = '01 APR ' . $financialYear;    
                //
                //$acc_cash_balance_date = '01 APR 2021';    
                //                                  
                // 
                //echo '$acc_cash_balance_date == ' . $acc_cash_balance_date . '<br />';
                //                                                            
                //
                // PURCHASE, SALE @PRIYANKA-08SEP21
                //
                if ($user_type == 'PURCHASE') {                    
                    $acc_pri_acc = 'Expenses';
                    $acc_pri_grp = 'Purchase Accounts';
                    $acc_main_acc = 'Purchase Accounts';
                    //
                    if ($user_fname == 'PURCHASE') {
                        $acc_user_acc = 'Purchase Accounts';
                    } else {
                        $acc_user_acc = $user_fname;
                    }                    
                }
                //
                if ($user_type == 'SALE') {                    
                    $acc_pri_acc = 'Income';
                    $acc_pri_grp = 'Sales Accounts';
                    $acc_main_acc = 'Sales Accounts';
                    //
                    if ($user_fname == 'SALE') {
                        $acc_user_acc = 'Sales Accounts';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                // EXPENSES (INDIRECT), INCOMES (INDIRECT), EXPENSES (DIRECT), INCOMES (DIRECT) @PRIYANKA-08SEP21
                //
                if ($user_type == 'EXPENSES (INDIRECT)') {                    
                    $acc_pri_acc = 'Expenses';
                    $acc_pri_grp = 'Indirect Expenses';
                    $acc_main_acc = 'Indirect Expenses';
                    //
                    if ($user_fname == 'EXPENSES (INDIRECT)') {
                        $acc_user_acc = 'Indirect Expenses';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'INCOMES (INDIRECT)') {                    
                    $acc_pri_acc = 'Income';
                    $acc_pri_grp = 'Indirect Incomes';
                    $acc_main_acc = 'Indirect Incomes';
                    //
                    if ($user_fname == 'INCOMES (INDIRECT)') {
                        $acc_user_acc = 'Indirect Incomes';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'EXPENSES (DIRECT)') {                    
                    $acc_pri_acc = 'Expenses';
                    $acc_pri_grp = 'Direct Expenses';
                    $acc_main_acc = 'Direct Expenses';
                    //
                    if ($user_fname == 'EXPENSES (DIRECT)') {
                        $acc_user_acc = 'Direct Expenses';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'INCOMES (DIRECT)') {                    
                    $acc_pri_acc = 'Income';
                    $acc_pri_grp = 'Direct Incomes';
                    $acc_main_acc = 'Direct Incomes';
                    //
                    if ($user_fname == 'INCOMES (DIRECT)') {
                        $acc_user_acc = 'Direct Incomes';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                // SUNDRY DEBTORS, SUNDRY CREDITORS @PRIYANKA-08SEP21
                //
                if ($user_type == 'SUNDRY DEBTORS') {                    
                    $acc_pri_acc = 'Assets';
                    $acc_pri_grp = 'Current Assets';
                    $acc_main_acc = 'Sundry Debtors';
                    //
                    if ($user_fname == 'SUNDRY DEBTORS') {
                        $acc_user_acc = 'Sundry Debtors';
                    } else {
                        //
                        if (($user_mobile == '' || $user_mobile == NULL) &&
                            ($user_address == '' || $user_address == NULL) && 
                            ($user_city == '' || $user_city == NULL) && 
                            ($user_country == '' || $user_country == NULL)) {
                             $acc_user_acc = $user_fname;
                        } else {
                             $acc_user_acc = '';
                        }
                    } 
                }
                //
                if ($user_type == 'SUNDRY CREDITORS') {                    
                    $acc_pri_acc = 'Liabilities';
                    $acc_pri_grp = 'Current Liabilities';
                    $acc_main_acc = 'Sundry Creditors';
                    //
                    if ($user_fname == 'SUNDRY CREDITORS') {
                        $acc_user_acc = 'Sundry Creditors';
                    } else {
                        //
                        if (($user_mobile == '' || $user_mobile == NULL) &&
                            ($user_address == '' || $user_address == NULL) && 
                            ($user_city == '' || $user_city == NULL) && 
                            ($user_country == '' || $user_country == NULL)) {
                             $acc_user_acc = $user_fname;
                        } else {
                             $acc_user_acc = '';
                        }
                    } 
                }
                //
                // DUTIES & TAXES, FIXED ASSETS, DEPOSITS (LIABILITIES) @PRIYANKA-08SEP21
                //
                if ($user_type == 'DUTIES & TAXES') {                    
                    $acc_pri_acc = 'Liabilities';
                    $acc_pri_grp = 'Current Liabilities';
                    $acc_main_acc = 'Duties & Taxes';
                    //
                    if ($user_fname == 'DUTIES & TAXES') {
                        $acc_user_acc = 'Duties & Taxes';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'FIXED ASSETS') {                    
                    $acc_pri_acc = 'Assets';
                    $acc_pri_grp = 'Fixed Assets';
                    $acc_main_acc = 'Fixed Assets';
                    //
                    if ($user_fname == 'FIXED ASSETS') {
                        $acc_user_acc = 'Fixed Assets';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'BANK' || $user_type == 'BANK OCC A/C') {                    
                    $acc_pri_acc = 'Assets';
                    $acc_pri_grp = 'Current Assets';
                    $acc_main_acc = 'Bank Account';
                    //
                    if ($user_fname == 'BANK') {
                        $acc_user_acc = 'Bank Account';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'PROFIT & LOSS') {                    
                    $acc_pri_acc = 'ProfitLoss';
                    $acc_pri_grp = 'Profit & Loss Acc';
                    $acc_main_acc = 'Profit & Loss Acc';
                    //
                    if ($user_fname == 'PROFIT & LOSS') {
                        $acc_user_acc = 'Profit & Loss Acc';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                // CURRENT ASSETS, LOANS & ADVANCES @PRIYANKA-08SEP21
                //
                if ($user_type == 'CURRENT ASSETS') {                    
                    $acc_pri_acc = 'Assets';
                    $acc_pri_grp = 'Current Assets';
                    $acc_main_acc = 'Current Assets';
                    //
                    if ($user_fname == 'CURRENT ASSETS') {
                        $acc_user_acc = 'Current Assets';
                    } else {
                        $acc_user_acc = $user_fname;
                    }
                }
                //
                if ($user_type == 'LOANS & ADVANCES') {                    
                    $acc_pri_acc = 'Assets';
                    $acc_pri_grp = 'Current Assets';
                    $acc_main_acc = 'Loans & Advances (Asset)';
                    //
                    if ($user_fname == 'LOANS & ADVANCES') {
                        $acc_user_acc = 'Loans & Advances (Asset)';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                // SECURED LOANS, UNSECURED LOANS @PRIYANKA-08SEP21
                //
                if ($user_type == 'SECURED LOANS') {                    
                    $acc_pri_acc = 'Liabilities';
                    $acc_pri_grp = 'Loans';
                    $acc_main_acc = 'Secured Loans';
                  
                    if ($user_fname == 'SECURED LOANS') {
                        $acc_user_acc = 'Secured Loans';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'UNSECURED LOANS') {                    
                    $acc_pri_acc = 'Liabilities';
                    $acc_pri_grp = 'Loans';
                    $acc_main_acc = 'Unsecured Loans';
                    //
                    if ($user_fname == 'UNSECURED LOANS') {
                        $acc_user_acc = 'Unsecured Loans';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                // STOCK IN HAND, CAPITAL, CASH, INVESTMENT @PRIYANKA-08SEP21
                //
                if ($user_type == 'STOCK IN HAND') {                    
                    $acc_pri_acc = 'Assets';
                    $acc_pri_grp = 'Current Assets';
                    $acc_main_acc = 'Stock in Hand';
                    //
                    if ($user_fname == 'STOCK IN HAND') {
                        $acc_user_acc = 'Stock in Hand';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'CAPITAL') {                    
                    $acc_pri_acc = 'Liabilities';
                    $acc_pri_grp = 'Capital Account';
                    $acc_main_acc = 'Capital Account';
                    //
                    if ($user_fname == 'CAPITAL') {
                        $acc_user_acc = 'Capital Account';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                if ($user_type == 'CASH') {                    
                    $acc_pri_acc = 'Assets';
                    $acc_pri_grp = 'Current Assets';
                    $acc_main_acc = 'Cash in Hand';
                    //
                    if ($user_fname == 'CASH') {
                        $acc_user_acc = 'Cash in Hand';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                // 
                if ($user_type == 'INVESTMENT') {                    
                    $acc_pri_acc = 'Assets';
                    $acc_pri_grp = 'Investments';
                    $acc_main_acc = 'Investments';
                    //
                    if ($user_fname == 'INVESTMENT') {
                        $acc_user_acc = 'Investments';
                    } else {
                        $acc_user_acc = $user_fname;
                    } 
                }
                //
                //
                $acc_cash_balance = $user_cash_balance;
                //
                if ($acc_cash_balance < 0) {
                    $acc_cash_balance_crdr = 'CR';
                } else {
                    $acc_cash_balance_crdr = 'DR';
                }
                //
                $acc_cash_balance = abs($user_cash_balance);
                //
                $qSelAcc = "SELECT * FROM accounts where acc_own_id = '$_SESSION[sessionOwnerId]' "
                         . "and acc_firm_id = '$acc_firm_id' "
                         . "and acc_user_acc = '$acc_user_acc'";
                //
                $resAcc = mysqli_query($conn, $qSelAcc);
                $accAvail = mysqli_num_rows($resAcc);
                //
                //
                if ($acc_firm_id != '' && $acc_firm_id != NULL && 
                    $acc_pri_acc != '' && $acc_pri_acc != NULL && 
                    $acc_main_acc != '' && $acc_main_acc != NULL && 
                    $acc_user_acc != '' && $acc_user_acc != NULL) {
                        //
                        if ($accAvail == 0) {
                            //
                            if ($user_type != 'RECEIVE' && $user_type != 'ISSUE' && 
                                $user_type != 'DEPOSITS (LIABILITIES)' && $user_type != 'ADVANCES & RECEIVABLES') {
                                //
                                $qInsertAccount = "INSERT INTO accounts (acc_own_id, acc_pri_acc, acc_pri_grp, acc_main_acc, acc_user_acc, acc_created_by, acc_firm_id, acc_cash_balance, acc_cash_balance_crdr, acc_cash_balance_date) "
                                                . "VALUES ('$_SESSION[sessionOwnerId]', '$acc_pri_acc', '$acc_pri_grp', '$acc_main_acc', '$acc_user_acc', 'User', '$acc_firm_id', '$acc_cash_balance', '$acc_cash_balance_crdr', '$acc_cash_balance_date')";
                                //
                                //echo '$qInsertAccount == ' . $qInsertAccount . '<br />';
                                //die;
                                //
                                if (!mysqli_query($conn, $qInsertAccount)) {
                                    die('Error: ' . mysqli_error($conn));
                                }
                            }
                        } 
                    }
                }
            }
        }
        //
        } else { ?>
            <div class="fs_13 ff_calibri bold" style="color:red;">Issue has been detected with Firm. Please select Firm! </div>
        <?php 
        die; }
    }
    //    
    $rowsCounter++;
    //   
    $user_mobile = NULL;
    $allUserMobile = NULL;
    $noOfRowsMobileNumber = NULL;
    //
}
//
//
//echo '$rowsCounter == ' . $rowsCounter . '<br />';
//
//
if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
     $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/omHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully');
} else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/orHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully');
} else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/olHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully');
} else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
    header("Location: $documentRoot/ogHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Settings' . "&subDivName=" . 'LayoutPanel' . "&navPanelName=" . 'OtheroptionPanel' . "&displayMessageDiv=" . 'DataImportedSuccessfully');
} else {
    $showMess = 'Your session has expired. Please log in again!!!';
    header('Location: ' . $documentRootBSlash . '/omLoginPage.php?showMess=' . $showMess);
    exit;
}
?>