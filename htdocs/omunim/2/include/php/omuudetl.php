<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: omuudetl.php
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
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
//Start Staff Access API @Author:PRIYA22JUL13
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @Author:PRIYA22JUL13
//include_once 'ommpincr.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
if ($custId == '') {
    $custId = $_POST['custId'];
    $firmId = $_POST['firmId'];
}
if ($custId == '') {
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
}
$panelDetails = $_GET['panelName'];
$showDiv = $_GET['divMainMiddlePanel'];
$showDivPanel = $_GET['showDivPanel'];
$showDivNew = $_GET['udhaarDivMainMiddlePanel'];
//
//echo '$showDivPanel == '.$showDivPanel;;
//
?>
<div>
    <table border="0" cellspacing="2" cellpadding="2" width="100%" class="ShadowFrm">
        <tr>
            <td align="left" width="100%">
                <table border="0" cellspacing="2" cellpadding="2" width="70%" align="left">
                    <!---------Start code to add new code for udhaar btns @AUTHOR:ANUJA08JAN16  ------->
                    <!------start code to Add div and also some change in td @Author:ANUJA01MAR16--------------->
                    <!---------Start code to add new code for close button @AUTHOR:SANT22APR16  ------->   
                    <!--*************************Start code to change moneypanel home page Author:SANT9MAY16********************************-->
                    <tr>
<!--                        <td align="left" width="10%">
                            <div id="ajaxLoadAddNewUdhaar" style="visibility: hidden" class="blackMess11"> 
                        <?php include 'omzaajld.php'; ?>
                            </div>
                        </td>-->

                        <td align="left" width="14%">
                            <div class="ff_calibri fs_14">
                                <a style="cursor: pointer;"  onclick="showAddNewUdhaarDetDiv('<?php echo $custId; ?>', 'UdhaarList');">
                                    <div class="frm-btn" style="font-size:14px;height:35px;line-height:28px;"> <b>UDHAAR DETAILS</b></div>
                                </a>
                            </div>
                        </td>
                        <td align="left" width="18%">
                            <div  class="ff_calibri fs_14">
                                <a style="cursor: pointer;"  onclick="showAddNewUdhaarDetDiv('<?php echo $custId; ?>', 'udhaarWithEMIList');">
                                    <div class="frm-btn" style="font-size:14px;height:35px;line-height:28px;"><b> UDHAAR EMI DETAILS</b></div>
                                </a>
                            </div>
                        </td>
                        <!-- start Change deposit money to Advance money @Author:RATNAKAR06JAN2018 -->
                        <td align="left" width="22%">
                            <div  class="ff_calibri fs_14">
                                <a style="cursor: pointer;"  onclick="getAdvanceMoneyDetDiv('<?php echo $custId; ?>', 'AdvMoney');">
                                    <div class="frm-btn" style="font-size:14px;height:35px;line-height:28px;"> <b>ADVANCE MONEY DETAILS</b></div>
                                </a>
                            </div>
                        </td>
                        <!-- END Change deposit money to Advance money @Author:RATNAKAR06JAN2018 -->
<!--                        <td align="left" width="25%">
                            <div  class="ff_calibri fs_14">
                                <a style="cursor: pointer;"  onclick="getAdvanceMetalDiv('<?php echo $custId; ?>', 'AdvMetalList');">
                                    <div > DEPOSIT METAL DETAILS
                                    </div>
                                </a>
                            </div>
                        </td>-->
                        <td align="left" width="12%">
                            <input type="submit" value="ADD UDHAAR"
                                   id="buttAddUdhaarDetails" name="buttPaidUdhaarDetails" 
                                   onclick="showAddNewUdhaarDiv('<?php echo $custId; ?>', 'AddUdhaar');"
                                   class="frm-btn" style="font-size:14px;width:100%;height:35px;line-height:28px;"/>
                        </td>
                        <td align="left" width="14%">
                            <input type="submit" value="ADVANCE MONEY"
                                   id="buttAddMoneyDetails" name="buttPaidUdhaarDetails" 
                                   onclick="getAdvanceMoneyDiv('<?php echo $custId; ?>', 'AddMoney');"
                                   class="frm-btn" style="font-size:14px;height:35px;line-height:28px;"/>

                        </td>
                       
                       
<!--                        <td align="right">
                            <input type="submit" value="ADD EMI"
                                   id="buttAddEmiDetails" name="buttPaidUdhaarDetails" 
                                   onclick="showAddNewUdhaarDiv('<?php echo $custId; ?>', 'udhaarWithEMI');"
                                   class="frm-btn" />

                        </td>-->

                        <!-- start Change deposit money to Advance money @Author:RATNAKAR06JAN2018 -->
                       
                         <td align="left" width="10%">
                            <div id="ajaxLoadAddNewUdhaar" style="visibility: hidden" class="blackMess11"> 
                                <?php include 'omzaajld.php'; ?>
                            </div>
                        </td>
                        <!-- End Change deposit money to Advance money @Author:RATNAKAR06JAN2018 -->
<!--                        <td align="right">
                            <input type="submit" value="ADD METAL"
                                   id="buttAddMetalDetails" name="buttPaidUdhaarDetails" 
                                   onclick="getAdvanceMetalDiv('<?php echo $custId; ?>', 'AdvMetal');"
                                   class="frm-btn" />
                        </td>-->
                    </tr>
                    <tr>
                        <td colspan="2" width="30%">
                            <div id="udhaarMaindiv">
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
<!--        <tr>
            <td>
                &nbsp;
            </td>
        </tr>-->
    </table>
</div>
    <!------End code to Add div and also some change in td @Author:ANUJA01MAR16--------------->
    <!------Start code to Add div and also add some code @Author:ANUJA15MAR16--------------->    
    <div id="addNewUdhaarDiv">
        <?php
        if ($showDivPanel == 'AdvMoney' || $showDivPanel == 'AdvanceMoney')
            include 'omamndtdv.php';
        else if ($showDivPanel == 'AdvMetal')
            include 'omamtdtdv.php';
        else if ($showDivPanel == 'UdhaarEMI')
            include 'omuemidet.php';
        else if ($panelDetails == 'UdhaarList')
            include 'omuandwt.php';
        else
            include 'omuudet.php';
        ?>

    </div>
