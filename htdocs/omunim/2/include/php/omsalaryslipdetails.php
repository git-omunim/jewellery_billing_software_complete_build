<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Feb 29, 2020 10:09:46 PM
 *
 * @FileName: omsalaryslipdetails.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.o
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
$accFileName = $currentFileName;
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
?>
<div id="salaryslip">
    <?php
    $staffId = $_REQUEST['staffId'];   
    $Salaryqueary = "SELECT * FROM user WHERE user_id ='$staffId'";
    $resSalary = mysqli_query($conn, $Salaryqueary);
    while ($rowSalary = mysqli_fetch_array($resSalary)) {
        $user_fname = $rowSalary['user_fname'];
        $user_lname = $rowSalary['user_lname'];
        $user_id = $rowSalary['user_id'];
        $user_category = $rowSalary['user_category'];
        $user_id = $rowSalary['user_id'];
        $user_bank_details = $rowSalary['user_bank_acc_name'];
        $user_Band = $rowSalary['user_Band'];
        $user_Level = $rowSalary['user_Level'];
        $user_bank_Account_Num = $rowSalary['user_bank_acc_number'];
        $user_bank_Branch = $rowSalary['user_bank_Branch'];
        $user_bank_IFSC = $rowSalary['user_bank_ifsc_code'];       
//             echo '%%%'.$current_monthW;
        if($current_monthW == ''){
        $current_month = date("M");
        }  else {
            $current_month = $current_monthW;
        }
        
         if($current_yearw == ''){
                $current_year = date("Y");
        }  else {
            $current_year = $current_yearw;
        }
        
//        echo '@@'.$current_month;
    //
    $selLopFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'LOP' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
    $resLOP = mysqli_query($conn, $selLopFromDBQ);
    $rowLOP = mysqli_fetch_array($resLOP);
    $Lop = $rowLOP['omdata_value'];
    //
    $selPaybleDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'PAYABLE' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
    $resPayble = mysqli_query($conn, $selPaybleDayFromDBQ);
    $rowPay = mysqli_fetch_array($resPayble);
    $Payable = $rowPay['omdata_value'];
    //
    $selTotalWorkingDayFromDBQ = "SELECT * FROM omdata WHERE omdata_option = 'TOTAL_WORKING_DAY_IN_MONTH' and omdata_user_id = '$staffId' and omdata_year='$current_year' and omdata_month='$current_month'";
    $resWorkingDay = mysqli_query($conn, $selTotalWorkingDayFromDBQ);
    $rowWorkingDay = mysqli_fetch_array($resWorkingDay);
    $WorkingDay = $rowWorkingDay['omdata_value'];
    //
        
    $Staffqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId' and omdata_month='$current_month'and omdata_year='$current_year'";
    $resStaff = mysqli_query($conn, $Staffqueary);
    $row = mysqli_fetch_array($resStaff);
    $omdata_option = $row ['omdata_option'];
//        echo '$omdata_option'.$omdata_option;
        if($omdata_option != ''){
    ?>
    <table border="0" align="center">
        <tr>
            <td>
                <span style="text-align: center; font-weight: bold; font-size: 15px; color : #0d0c0c;">
                    SALARY SLIP OF THIS MONTH <span> <?php echo $current_month;?></span> <span><?php echo $current_year;  ?></span>
                </span>
            </td>
        </tr>
    </table>
        <div class="container-fluid">
            <table border="1" cellspacing="0" cellpadding="0" width="80%" valign="top" align="center">
                <tr>
                    <td width="50%">    
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            NAME :
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo om_strtoupper($user_fname . ' ' . $user_lname) ?>
                        </span>
                    </td>
                    <td colspan="2">
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            WORKING DAYS :
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $WorkingDay; ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            EMP CODE : 
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $user_id; ?>
                        </span>

                    </td>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            DAYS PAYABLE :
                        </span>
                         <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $Payable; ?>
                        </span>
                    </td>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            LOP :
                        </span>
                         <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $Lop; ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            DESIGNATION : 
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $user_category; ?>
                        </span>
                    </td>
                    <td colspan="2">
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            BANK NAME : 
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $user_bank_details; ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            BAND : 
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $user_Band; ?>
                        </span>
                    </td>
                    <td colspan="2">
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            ACCOUNT NO : 
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $user_bank_Account_Num; ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            LEVEL : 
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $user_Level; ?>
                        </span>
                    </td>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            BRANCH : 
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $user_bank_Branch; ?>
                        </span>
                    </td>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            IFSC CODE : 
                        </span>
                        <span style="font-size: 15px; color : #0d0c0c;">
                            <?php echo $user_bank_IFSC; ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">

                        </span>
                    </td>
                    <td colspan="2">
                        <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            TOTAL SAVING :
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <?php
     if ($staffId != '') { 
    $Rowcountquery1 = "SELECT * FROM omdata where omdata_panel='SALARY' AND omdata_input_field = 'EARNING' AND omdata_user_id ='$staffId'and omdata_month='$current_month'and omdata_year='$current_year'";
     }else{
         $Rowcountquery1 = "SELECT * FROM omdata where omdata_panel='SALARY' AND omdata_input_field = 'EARNING' AND omdata_user_id ='$staffId'and omdata_month='$current_month'and omdata_year='$current_year'and omdata_status='APPROVE'";
     }
    $resRowcountquery1 = mysqli_query($conn, $Rowcountquery1);
    $FirstRowCount = mysqli_num_rows($resRowcountquery1);
//                    echo '$FirstRowCount'.$FirstRowCount;
     if ($staffId != '') { 
    $Rowcountquery1 = "SELECT * FROM omdata where omdata_panel='SALARY' AND omdata_input_field = 'DEDECTION' AND omdata_user_id ='$staffId'and omdata_month='$current_month'and omdata_year='$current_year'";
     }else{
         $Rowcountquery1 = "SELECT * FROM omdata where omdata_panel='SALARY' AND omdata_input_field = 'DEDECTION' AND omdata_user_id ='$staffId'and omdata_month='$current_month'and omdata_year='$current_year'and omdata_status='APPROVE'";
     }
    $resRowcountquery1 = mysqli_query($conn, $Rowcountquery1);
    $SecondRowCount = mysqli_num_rows($resRowcountquery1);
//                    echo '$SecondRowCount'.$SecondRowCount;

    $totalcount = $FirstRowCount - $SecondRowCount;
//                    echo '$totalcount'.$totalcount;
    ?>
    <div class="container-fluid" style="margin-top: 10px;">
        <table border="0" cellspacing="0" cellpadding="0" width="80%" valign="top"align="center">
            <tr>
                <td width="50%">
                    <table border="1" cellspacing="0" cellpadding="0" width="100%" valign="top">
                        <tr>
                            <td colspan="2" align="center">
                                <span style="font-weight: bold; font-size: 15px; color:#11a0d9;">
                                    Earnings
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: bold; font-size: 15px; color:#11a0d9;">
                                    Description
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: bold; font-size: 15px; color:#11a0d9;">
                                    Amount
                                </span>
                            </td>
                        </tr>
                        <?php
                         if ($staffId != '') { 
                        $SalaryEarning = "SELECT * FROM omdata WHERE omdata_user_id ='$staffId' and omdata_panel='SALARY' and omdata_input_field ='EARNING'and omdata_month='$current_month'and omdata_year='$current_year'";
                         }else{
                             $SalaryEarning = "SELECT * FROM omdata WHERE omdata_user_id ='$staffId' and omdata_panel='SALARY' and omdata_input_field ='EARNING'and omdata_month='$current_month'and omdata_year='$current_year' and omdata_status='APPROVE'";
                         }
                        $resSalaryEarning = mysqli_query($conn, $SalaryEarning);
                        while ($rowSalaryEarning = mysqli_fetch_array($resSalaryEarning)) {
                            $omdata_optionEar = $rowSalaryEarning ['omdata_option'];
                            $omdata_valueEar = $rowSalaryEarning['omdata_value'];
                            ?>              
                            <tr>
                                <td>
                                    <span style="font-size: 15px; color : #0d0c0c;">
                                        <?php echo $omdata_optionEar; ?>
                                    </span>   
                                </td>
                                <td> 
                                    <span style="font-size: 15px; color : #0d0c0c;">
                                        <?php echo $omdata_valueEar; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                                    Total Earning
                                </span>
                            </td>
                            <td>
                                <?php
                                  if ($staffId != '') { 
                                   $Earingqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId'and omdata_input_field ='TOTALEARNING'and omdata_month='$current_month'and omdata_year='$current_year'";
                                  }else{
                                     $Earingqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId'and omdata_input_field ='TOTALEARNING'and omdata_month='$current_month'and omdata_year='$current_year' and omdata_status='APPROVE'"; 
                                  }
                                  $resEarning = mysqli_query($conn, $Earingqueary);
                                   $rowSalary = mysqli_fetch_array($resEarning);
                                   $Earning = $rowSalary['omdata_value'];
                                ?>
                                <span style="font-size: 15px; font-weight: bold; margin-left: 2px;color : #0d0c0c;">
                                    <?php echo $Earning; ?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="1" cellspacing="0" cellpadding="0" width="100%" valign="top">
                        <tr>
                            <td colspan="2" align="center">
                                <span style="font-weight: bold; font-size: 15px; color:#11a0d9;">
                                    Deduction
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: bold; font-size: 15px; color:#11a0d9;">
                                    Description
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: bold; font-size: 15px; color:#11a0d9;">
                                    Amount
                                </span>
                            </td>
                        </tr>
                        <?php
                        if ($staffId != '') { 
                        $SalaryDeduction = "SELECT * FROM omdata WHERE omdata_user_id ='$staffId' and omdata_panel='SALARY' and omdata_input_field ='DEDECTION'and omdata_month='$current_month'and omdata_year='$current_year'";
                        }else{
                            $SalaryDeduction = "SELECT * FROM omdata WHERE omdata_user_id ='$staffId' and omdata_panel='SALARY' and omdata_input_field ='DEDECTION'and omdata_month='$current_month'and omdata_year='$current_year'and omdata_status='APPROVE'";
                        }
                        $resSalaryDeduction = mysqli_query($conn, $SalaryDeduction);
                        while ($rowSalaryDeduction = mysqli_fetch_array($resSalaryDeduction)) {
                            $omdata_optionDed = $rowSalaryDeduction ['omdata_option'];
                            $omdata_valueDed = $rowSalaryDeduction['omdata_value'];
                            ?>
                            <tr>
                                <td>
                                    <span style="font-size: 15px; color : #0d0c0c;">
                                        <?php echo $omdata_optionDed; ?>
                                    </span>   
                                </td>
                                <td> 
                                    <span style="font-size: 15px; color : #0d0c0c;">
                                        <?php echo $omdata_valueDed; ?>
                                    </span>
                                </td>
                            </tr>    
                        <?php } ?>
                        <?php for ($i = 0; $i < $totalcount; $i++) { ?>
                            <tr>
                                <td>
                                    <span style="font-size: 15px; color : #0d0c0c;">
                                        &nbsp;
                                    </span>
                                </td>
                                <td></td>                    
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                                    Total Deduction
                                </span>
                            </td>
                            <td>
                                 <?php
                                   if ($staffId != '') { 
                                   $Deductionqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId' and omdata_input_field ='TOTALDEDECTION'and omdata_month='$current_month'and omdata_year='$current_year'";
                                   }else{
                                   $Deductionqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId' and omdata_input_field ='TOTALDEDECTION'and omdata_month='$current_month'and omdata_year='$current_year'and omdata_status='APPROVE'";
                                   }
                                   $resDeduction = mysqli_query($conn, $Deductionqueary);
                                   $rowSalary = mysqli_fetch_array($resDeduction);
                                   $Deduction = $rowSalary['omdata_value'];
                                ?>
                                <span style="font-size: 15px; font-weight: bold; margin-left: 2px;color : #0d0c0c;">
                                    <?php echo $Deduction; ?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>        
        </table>
        <div class="container-fluid">
            <table border="0" cellspacing="0" cellpadding="0" width="" valign="top" align="center" style="margin-top: 10px;">
                <tr>
                    <td width="270px">
                        <span style="font-size: 15px; color : #0d0c0c;">
                            &nbsp;
                        </span>
                    </td>
                    <td width="145px">
                         <span style="font-size: 15px; color : #0d0c0c;">
                            &nbsp;
                        </span>
                    </td>
                    <td colspan="0" width="0px">
                        <table border="1" cellspacing="0" cellpadding="0" width="" valign="top" align="right" style="margin-top: 10px;">
                            <tr>
                                <td colspan="0" width="250px">
                                    <span style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                                        Net Payment
                                    </span>
                                </td>
                                <td width="150px">
                                          <?php
                                          if ($staffId != '') { 
                                            $Netamtqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId' and omdata_input_field ='NETAMOUNT'and omdata_month='$current_month'and omdata_year='$current_year'";
                                          }else{
                                              $Netamtqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId' and omdata_input_field ='NETAMOUNT'and omdata_month='$current_month'and omdata_year='$current_year'and omdata_status='APPROVE'";
                                          }
                                          $resNetamt = mysqli_query($conn, $Netamtqueary);
                                            $rownet = mysqli_fetch_array($resNetamt);
                                            $Netamt = $rownet['omdata_value'];
                                            ?>
                                    <span style="font-size: 18px; font-weight: bold; margin-left: 2px;color : #0d0c0c;">
                                            <?php echo $Netamt; ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>                   
                </tr>
            </table>
        </div>
    </div>   
</div>  
    <?php } ?>