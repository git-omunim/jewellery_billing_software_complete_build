<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Feb 29, 2020 10:09:46 PM
 *
 * @FileName:omsalary.php
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
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
?>
<div id="salaryslip">
<?php
$current_month = $_REQUEST['mon'];
$current_yearw = $_REQUEST['year'];
$staffId = $_REQUEST['staffId'];
$Approve = $_REQUEST['APPROVE'];

//      START CODE UPDATE COMPNENT NAME   
          if ($Approve == 'APPROVE') {
            $staffapproveupdateqeary = "UPDATE omdata SET omdata_status ='$Approve' WHERE omdata_user_id = '$staffId' and omdata_panel='SALARY'";
         if (!mysqli_query($conn, $staffapproveupdateqeary)) {
             die('Error: ' . mysqli_error($conn));
             }
              echo '<script>alert("SALARY SLIP APPROVE SUCCESSFULLY")</script>';
          }
//      END CODE UPDATE COMPNENT NAME 
?>
    <div class="container-fluid" style="margin-left: 105px;">
        <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
            <tr> 
                <td>
                    <?php include 'omsalarydate.php'; ?>
                </td>
            </tr>
        </table>
    </div>
   <?php include 'omsalaryslipdetails.php'; ?>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top" style="margin-top: 10px;" align="center">
                <tr>
                    <td align="center">
                        <button type="submit" id="Approve" name="" value="APPROVE" onclick="Approvestaff('<?php echo $staffId; ?>','APPROVE');" class="btn btn-info" style="height:25px;width:120px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:white;">
                         APPROVE    </button>
                    </td>
                    <td  align="center">
                        <button type="submit" id="salarydetails" name="" value="SUBMIT" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ompdf.php?staffId=<?php echo "$staffId"; ?>');return false" class="btn btn-success" style="height:25px;width:120px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:white;">
                            SALARY SLIP   </button>
                    </td>
<!--                    <td>
                        <button type="submit" id="Export" name="" value="EXPORT TO SALARY SLIP" onclick="window.open('<?php // echo $documentRootBSlash; ?>/include/php/ompdfsend.php?staffId=<?php echo "$staffId"; ?>');return false" class="btn" style="height:25px;width:130px;font-weight:bold;font-size:14px;padding-top:0px;margin-top: 5px;margin-bottom: 5px;text-align:center;color:white;background-color: #f0ad4e;border-color: #eea236;">
                EXPORT   </button>
                    </td>-->
                </tr>
   </table>
</div>   
    
 