<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Feb 29, 2020 10:09:46 PM
 *
 * @FileName:omsalaryslip.php
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
require_once 'system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
?>
<div id="salarydiv">
    <?php
          $staffId = $_REQUEST['staffId'];
          $componentname = $_REQUEST['compontename'];
          $inputfield = $_REQUEST['inputfield'];
          $panel = $_REQUEST['panel'];
          $operation = $_REQUEST['operation'];
          $Id = $_REQUEST['Id'];
          $Grspay = $_REQUEST['value'];
          $pervalue = $_REQUEST['pervalue'];
          $componenetamt = $_REQUEST['componentamt'];
          $omdata_id = $_REQUEST['omdata_id'];
       
//      START CODE UPDATE COMPNENT NAME   
          if ($operation == 'Addcomponent') {
            $componentupdateqeary = "UPDATE omdata SET omdata_option ='$Id' WHERE omdata_user_id = '$staffId' and omdata_id='$omdata_id' and omdata_panel='$panel' and omdata_option='$componentname' and omdata_input_field='$inputfield'";
         if (!mysqli_query($conn, $componentupdateqeary)) {
             die('Error: ' . mysqli_error($conn));
             }
          }
//      END CODE UPDATE COMPNENT NAME        
       

//      START CODE ADD COMPNENT 
            if ($operation == 'Add') {
         $compoaddqeary = "INSERT INTO omdata (omdata_own_id,omdata_user_id,omdata_panel,omdata_option,omdata_value,omdata_percentage,omdata_input_field) VALUES ('$ownerId','$staffId','$panel','$componentname','0','0','$inputfield')";
         if (!mysqli_query($conn, $compoaddqeary)) {
             die('Error: ' . mysqli_error($conn));
             }
          }
//      END CODE ADD COMPONET

//      START CODE DELETE COMPNET 
        if ($operation == 'Delete') {
            $compodeleteqeary = "DELETE FROM omdata WHERE omdata_user_id = '$staffId' and omdata_id ='$Id' and omdata_panel = '$panel' and omdata_option ='$componentname' and omdata_user_id = '$staffId'";
            if (!mysqli_query($conn, $compodeleteqeary)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
//      END CODE DELETE COMPONET 

//      START CODE TO UPDATE GROSS SALARY 
       if($Grspay != '' ){
      $Grspay = "UPDATE omdata SET omdata_value = '$Grspay' WHERE omdata_input_field = 'GROSS' and omdata_user_id = '$staffId'";
          if (!mysqli_query($conn, $Grspay)) {
        die('Error: ' . mysqli_error($conn));
    }
       }
//      END CODE TO UPDATE GROSS SALARY

//      START CODE TO CHECK GROSS SALARY 
     $Grossqueary = "SELECT omdata_value FROM omdata WHERE omdata_panel = 'SALARY' and omdata_input_field = 'GROSS' and omdata_user_id = '$staffId'";
     $result = mysqli_query($conn, $Grossqueary);
     $rowgrsamt = mysqli_fetch_assoc($result);
     $Grspay = $rowgrsamt['omdata_value'];
//      END CODE TO CHECK GROSS SALARY   
 
//      START CODE TO UPDATE PERCENTAGE VALUE     
    if($pervalue != '' ){
      $Perqueary = "UPDATE omdata SET omdata_percentage ='$pervalue' WHERE omdata_option = '$componentname' and omdata_user_id = '$staffId'";
          if (!mysqli_query($conn, $Perqueary)) {
        die('Error: ' . mysqli_error($conn));
    }
    }
//      END CODE TO UPDATE PERCENTAGE VALUE 
    
//      START CODE TO UPDATE AMOUNT     
    if($componenetamt != ''){   
    $omdata_percentage = (($componenetamt / $Grspay )*100);
    $Compamtqueary = "UPDATE omdata SET omdata_value ='$componenetamt',omdata_percentage = '$omdata_percentage' WHERE omdata_option = '$componentname' and omdata_user_id = '$staffId'"; 
           if (!mysqli_query($conn, $Compamtqueary)) {
        die('Error: ' . mysqli_error($conn));
    }
    }
//       END CODE TO UPDATE AMOUNT    
    ?>
     <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top" style="margin-top: 0px;">
         <tr style="">      
            <td valign="left" align="center" style="width: 300px;">
                <div class="caption" style="align:left">
                    <h1 style="margin-left: -300PX">
                        EMPLOYEE SALARY SETUP PANEL 
                    </h1>                
                </div>
            </td>
            <td style="width: 300px;"></td>   
        </tr>  
    </table>  
         <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top" style="margin-top: 10px;">
         <tr style="">      
            <td valign="right" align="right" style="width: 300px;">
                <div class="" style="font-size: 15px; font-color:#a8a823;">
                    <span style="margin-left: 0PX;  color : #a8a823;  font-weight: bold;">
                        EMPLOYEE GROSS SALARY : 
                    </span>   
                </div>
            </td>
            <td style="margin-left: 5px;">
                <table border="0" cellspacing="0" cellpadding="0" style="width: 150px; margin-left: 5px;">
                    <tr>
                        <td style="width: 0px;">
                            <div>
                                <input id="empgrosssalary" name="empgrosssalary" placeholder="" value="<?php echo $Grspay;?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                             document.getElementById('ComputerImage').focus();
                                               return false;
                                             } else if (event.keyCode == 8 && this.value == '') {
                                             document.getElementById('Accuntnum').focus();
                                            return false;
                                           }"
                                       type="text" spellcheck="false" class="input_border_grey"
                                       maxlength="50" style="text-transform:uppercase; width: 150px; color : #0d0c0c;"onchange="grospayment(this.value,'<?php echo $staffId;?>');"/>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>  
    </table>  
   <div class="container-fluid"> 
     <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top" style="margin-top: 10px;  ">
         <tr style="">      
            <td valign="left" align="center" style="width: 300px;">
                <div class="" style="font-size: 15px; font-color:#a8a823;">
                    <span style="float:left;  color : #31d642;  font-weight: bold;  margin-left: 10px;">
                        EARNING : 
                    </span>
                </div>
            </td>
             <td valign="left" align="center" style="width: 300px;">
                <div class="" style="font-size: 15px; font-color:#a8a823;">
                    <span style="float:left;  color : #e33c30;  font-weight: bold; margin-left: 10px;">
                        DEDECTION : 
                    </span>
                </div>
             </td>
        </tr>  
    </table>  
   </div>
    <div class="container-fluid">
        <table border="0" cellspacing="0" cellpadding="2" width="100%" valign="top">
            <tr>
                <!--////-->
                <td valign="top">
                    <table border="1" cellspacing="0" cellpadding="2" width="100%" valign="top">
                        <tr cellspacing="2" collspan="2" style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            <td>COMPONENT NAME</td>
                            <td>PERCENTAGE</td>
                            <td>AMOUNT</td>
                            <td>ADD MORE/DELETE</td>                 
                        </tr>
                      <?PHP
                        $Salaryqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId'and omdata_input_field ='EARNING' and omdata_month IS NULL  ORDER BY omdata_option";
                        $resSalary = mysqli_query($conn, $Salaryqueary);
                        while ($rowSalary = mysqli_fetch_array($resSalary)) {
                            $omdata_id = $rowSalary['omdata_id'];
                            $omdata_option = $rowSalary['omdata_option'];
                            $omdata_value = $rowSalary['omdata_value'];
                            $omdata_percentage = $rowSalary['omdata_percentage'];
                            ?>
                        <tr>
                               <td style="width: 200px;">
                                   <div>
                                           <input align="right" id="componentName" name="componentName" placeholder="" value="<?php echo $omdata_option; ?>"
                                                  onkeydown="javascript: if (event.keyCode == 13) {
                                                 document.getElementById('percentage').focus();
                                                   return false;
                                                 } else if (event.keyCode == 8 && this.value == '') {
                                                 document.getElementById('empgrosssalary').focus();
                                                return false;
                                               }"
                                                  type="text" spellcheck="false" class="input_border_grey"
                                                  maxlength="50" style="text-transform:uppercase; width: 200px; color: #20242b;" onblur="getaddcomponent('<?php echo $staffId; ?>',this.value,'<?php echo $omdata_option; ?>',<?php echo $omdata_id; ?>,'EARNING','SALARY','Addcomponent');"/>  
                                   </div>
                                </td>
                             <td style="width: 80px;" align="right">
                                <div>
                                <input align="right" id="percentage[]" name="percentage[]" placeholder="" value="<?php echo $omdata_percentage; ?> "
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                             document.getElementById('amount').focus();
                                               return false;
                                             } else if (event.keyCode == 8 && this.value == '') {
                                             document.getElementById('componentName').focus();
                                            return false;
                                           }"
                                           type="text" spellcheck="false" class="input_border_grey"
                                           maxlength="50" style="text-transform:uppercase; width: 80px;" onchange="pervalue(this.value,'<?php echo $omdata_option; ?>','<?php echo $staffId; ?>');"/>
                                </div>
                            </td>
                                <td style="width: 100px;">
                                <div>                               
                                    <?php 
                                    if($Grspay != ''){
                                     $omdata_value = (($Grspay / 100)*$omdata_percentage);
                                     $Totalearnig +=  $omdata_value;
                                     
                                       $Earningqueary = "UPDATE omdata SET omdata_value ='$Totalearnig' WHERE omdata_option = 'EARNING' and omdata_user_id = '$staffId' and omdata_input_field ='TOTALEARNING' and omdata_panel='SALARY'"; 
                                       if (!mysqli_query($conn, $Earningqueary)) {
                                       die('Error: ' . mysqli_error($conn));
                                       }
                      
                                      }
                                        $Compamtqueary = "UPDATE omdata SET omdata_value ='$omdata_value',omdata_percentage = '$omdata_percentage' WHERE omdata_option = '$omdata_option' and omdata_user_id = '$staffId'and omdata_panel='SALARY'"; 
                                       if (!mysqli_query($conn, $Compamtqueary)) {
                                       die('Error: ' . mysqli_error($conn));
                                       }
                                    ?>
                                <input id="amount" name="amount" placeholder="" value="<?php echo $omdata_value; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                             document.getElementById('ComputerImage').focus();
                                               return false;
                                             } else if (event.keyCode == 8 && this.value == '') {
                                             document.getElementById('Accuntnum').focus();
                                            return false;
                                           }"
                                           type="text" spellcheck="false" class="input_border_grey"
                                           maxlength="50" style="text-transform:uppercase; width: 100px;"onload="componentamt(this.value,'<?php echo $omdata_option; ?>');" onchange="componentamt(this.value,'<?php echo $omdata_option; ?>','<?php echo $staffId; ?>');" />
                                </div>
                            </td>
                            <td >
                                <span style="margin-left: 10px;">
                                        <a style="cursor: pointer;" 
                                       onclick="getaddcomponent('<?php echo $staffId; ?>','<?php echo $omdata_id; ?>','<?php echo $omdata_option; ?>','EARNING','SALARY','Add');">
                                        <img src="<?php echo $documentRootBSlash; ?>/images/update16.png" alt="Click Here To Add More Component" class="marginTop5"
                                             onload="<?php if ($panelName != 'updateusergroup') { ?>
                                               document.getElementById('LastDiscountPercent').focus();
                                             <?php } ?>"/>
                                        </a>
                                    </span>
                                    
                                    <span style="margin-left: 5px;">
                                        <a style="cursor: pointer;" 
                                       onclick ="getaddcomponent('<?php echo $staffId; ?>','<?php echo $omdata_id; ?>','<?php echo $omdata_option; ?>','EARNING','SALARY','Delete');">
                                        <img src="<?php echo $documentRootBSlash; ?>/images/delete16.png" alt="delete" class="marginTop5"/>
                                        </a>
                                    </span>                                   
                                </td>
                        </tr>
                       <?php } ?>
                        <tr>
                            <td colspan="2" align="right">
                                <span style="font-weight: bold; font-size: 15px; color : #0d0c0c; margin-left: 130px;">TOTAL EARNINGS :</span>
                            </td>
                            <td>
                                <span style="font-weight: bold; color : #0d0c0c; font-size: 18px;">
                                    <?php echo $Totalearnig; ?>
                                </span>
                            </td>
                            <td></td>
                        </tr>
                  </table>
                </td>
                <?php
                $Rowcountquery1 = "SELECT * FROM omdata where omdata_panel='SALARY' AND omdata_input_field = 'EARNING' AND omdata_user_id ='$staffId' and omdata_month IS NULL ";
                $resRowcountquery1 = mysqli_query($conn, $Rowcountquery1);
                $FirstRowCount = mysqli_num_rows($resRowcountquery1);
//                    echo '$FirstRowCount'.$FirstRowCount;

                $Rowcountquery1 = "SELECT * FROM omdata where omdata_panel='SALARY' AND omdata_input_field = 'DEDECTION' AND omdata_user_id ='$staffId' and omdata_month IS NULL ";
                $resRowcountquery1 = mysqli_query($conn, $Rowcountquery1);
                $SecondRowCount = mysqli_num_rows($resRowcountquery1);
//                    echo '$SecondRowCount'.$SecondRowCount;

                $totalcount = $FirstRowCount - $SecondRowCount;
//                    echo '$totalcount'.$totalcount;
                ?>
                <!--////-->
                <td valign="top">
                    <table border="1" cellspacing="0" cellpadding="2" width="100%" valign="top" style="padding-top: -2px;">
                        <tr cellspacing="2" collspan="2" style="font-weight: bold; font-size: 15px; color : #0d0c0c;">
                            <td>COMPONENT NAME</td>
                            <td>PERCENTAGE</td>
                            <td>AMOUNT</td>
                            <td>ADD MORE/DELETE</td>       
                        </tr>
                      <?PHP
                        $Salaryqueary = "SELECT * FROM omdata WHERE omdata_panel = 'SALARY' and omdata_user_id ='$staffId' and omdata_input_field ='DEDECTION' and omdata_month IS NULL ORDER BY omdata_option";
                        $resSalary = mysqli_query($conn, $Salaryqueary);
                        while ($rowSalary = mysqli_fetch_array($resSalary)) {
                            $omdata_id = $rowSalary['omdata_id'];
                            $omdata_option = $rowSalary['omdata_option'];
                            $omdata_value = $rowSalary['omdata_value'];
                            $omdata_percentage = $rowSalary['omdata_percentage'];
                            ?>
                        <tr>
                            <td style="width:200px;">
                                <div>
                                        <input align="right" id="amount" name="amount" placeholder="" value="<?php echo $omdata_option; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                     document.getElementById('ComputerImage').focus();
                                                       return false;
                                                     } else if (event.keyCode == 8 && this.value == '') {
                                                     document.getElementById('Accuntnum').focus();
                                                    return false;
                                                   }"
                                               type="text" spellcheck="false" class="input_border_grey"
                                               maxlength="50" style="text-transform:uppercase; width: 200px; color: #20242b;" onblur="getaddcomponent('<?php echo $staffId; ?>',this.value,'<?php echo $omdata_option; ?>',<?php echo $omdata_id; ?>,'DEDECTION','SALARY','Addcomponent');"/>
                                    </div>
                            </td>
                          <td style="width: 70px;">
                                <div>
                                <input id="percentage" name="percentage" placeholder="" value="<?php echo $omdata_percentage; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                             document.getElementById('ComputerImage').focus();
                                               return false;
                                             } else if (event.keyCode == 8 && this.value == '') {
                                             document.getElementById('Accuntnum').focus();
                                            return false;
                                           }"
                                           type="text" spellcheck="false" class="input_border_grey"
                                           maxlength="50" style="text-transform:uppercase; width: 80px;" onchange="pervalue(this.value,'<?php echo $omdata_option; ?>','<?php echo $staffId; ?>');"/>
                                </div>
                            </td>
                            <td style="width: 100px;">
                                <div>
                                      <?php 
                                    if($Grspay != ''){
                                    $omdata_value = (($Totalearnig / 100)*$omdata_percentage);                                   
                                    $totaldedection += $omdata_value;
                                    //
                                       $Deductionqueary = "UPDATE omdata SET omdata_value ='$totaldedection' WHERE omdata_option = 'DEDECTION' and omdata_user_id = '$staffId' and omdata_input_field ='TOTALDEDECTION' and omdata_panel='SALARY'"; 
                                       if (!mysqli_query($conn, $Deductionqueary)) {
                                       die('Error: ' . mysqli_error($conn));
                                       }
                                    
                                    
                                    }
                                       $Compamtqueary = "UPDATE omdata SET omdata_value ='$omdata_value',omdata_percentage = '$omdata_percentage' WHERE omdata_option = '$omdata_option' and omdata_user_id = '$staffId'"; 
                                       if (!mysqli_query($conn, $Compamtqueary)) {
                                       die('Error: ' . mysqli_error($conn));
                                       }
                                    ?>
                                    <input id="amount" name="amount" placeholder="" value="<?php echo $omdata_value; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                             document.getElementById('ComputerImage').focus();
                                               return false;
                                             } else if (event.keyCode == 8 && this.value == '') {
                                             document.getElementById('Accuntnum').focus();
                                            return false;
                                           }"
                                           type="text" spellcheck="false" class="input_border_grey"
                                           maxlength="50" style="text-transform:uppercase; width: 100px;" onchange="componentamt(this.value,'<?php echo $omdata_option; ?>','<?php echo $staffId; ?>');"/>
                                </div>
                            </td>
                            <td>
                                <span style="margin-left: 10px;">
                                    <a style="cursor: pointer;" 
                                           onclick="getaddcomponent('<?php echo $staffId; ?>','<?php echo $omdata_id; ?>','<?php echo $omdata_option; ?>','DEDECTION','SALARY','Add');">
                                            <img src="<?php echo $documentRootBSlash; ?>/images/update16.png" alt="Click Here To Add More Component" class="marginTop5"
                                                 onload="<?php if ($panelName != 'updateusergroup') { ?>
                                                                          document.getElementById('LastDiscountPercent').focus();
                                                 <?php } ?>"/>
                                        </a>
                                    </span>
                                    <span style="margin-left: 5px;">
                                        <a style="cursor: pointer;" 
                                               onclick ="getaddcomponent('<?php echo $staffId; ?>','<?php echo $omdata_id; ?>','<?php echo $omdata_option; ?>','DEDECTION','SALARY','Delete');">
                                                <img src="<?php echo $documentRootBSlash; ?>/images/delete16.png" alt="delete" class="marginTop5"/>
                                            </a>
                                    </span>
                                </td>
                        </tr>
             <?php } ?>
                      <?php for ($i = 0; $i < $totalcount; $i++) { ?>
                            <tr>
                                <td  style="font-weight: bold; font-size: 18px; height: 20px;">&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                            <tr>
                                <td colspan="2" align="right">
                                    <span style="font-weight: bold; font-size: 15px; color : #0d0c0c; margin-left: 130px;">TOTAL DEDECTION :</span>
                                </td>
                                <td>
                                    <span style="font-weight: bold; color : #0d0c0c; font-size: 18px;">
                                       <?php echo $totaldedection; ?>
                                    </span>
                                </td>
                                <td></td>
                            </tr>
                  </table>
                </td>
            </tr>           
        </table> 
                    
        <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top" style="margin-top: 10px;" align="right">
            <tr style="" align="right">  
                <td colspan="2" style="width: 400px;"></td>
                <td style="width: 400px;">
            <table border="1" cellspacing="0" cellpadding="0" width="100%" valign="top" style="margin-top: 10px;">
                <tr style="">      
                    <td valign="left" align="center" style="width: 300px;">
                        <div class="" style="font-size: 18px; font-color:#a8a823;">
                            <span style="margin-left: 0PX;  color : #736565;  font-weight: bold; float:Right;">
                                NET PAYABLE SALARY : 
                            </span>
                        </div>
                    </td>
                    <td style="width: 300px;">
                         <div class="" style="font-size: 10px; font-color:#0d0c0c;">
                             <?php                       
                                    $Netpayamt = $Totalearnig - $totaldedection; 
                                    //
                                      $Netamtqueary = "UPDATE omdata SET omdata_value ='$Netpayamt' WHERE omdata_option = 'NETAMT' and omdata_user_id = '$staffId' and omdata_input_field ='NETAMOUNT' and omdata_panel='SALARY'"; 
                                       if (!mysqli_query($conn, $Netamtqueary)) {
                                       die('Error: ' . mysqli_error($conn));
                                       }  
                                    ?>
                             <div style="color : #0d0c0c; ">
                                 <span style="font-size: 20px; font-weight: bold; margin-left: 2px;">
                                         <?php echo $Netpayamt;  ?>   
                                 </span>
                             </div>
                        </div>                       
                    </td>
                </tr>  
            </table>  
          </td>
        </tr>  
     </table> 
  </div>
</div>