<?php
/*
 * **************************************************************************************
 * @tutorial: STAFF COMPLETE WORK REPORT FILE @AUTHOR:MADHUREE-20JUNE2020
 * **************************************************************************************
 * 
 * Created on JUNE 20, 2020 01:20:58 PM
 *
 * @FileName: omstaffworkreport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:10 JAN 17
 *  AUTHOR:BAJRANG
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO INCLUDE FILE FOR GENERATING STAFF WORK REPORT WHEN CLICK ON STAFF WORK REPORT BUTTON @AUTHOR:MADHUREE-20JUNE2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //

include 'omgenstworkreport.php';

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO INCLUDE FILE FOR GENERATING STAFF WORK REPORT WHEN CLICK ON STAFF WORK REPORT BUTTON @AUTHOR:MADHUREE-20JUNE2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
?>
<div id="SummeryWorkReportDiv">
    <?php
    if ($custId == '') {
        $custId = $_REQUEST['custId'];
    }
    if ($panelName == '') {
        $panelName = $_REQUEST['panelName'];
    }
    if ($staffId == '') {
        $staffId = $_REQUEST['staffId'];
    }
    ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
        <tr>
            <td width="85%" align="left">
                <h1>
                    <?php
                    if ($panelName != 'allStaffWorkReport' && $custId != '') {
                        echo 'STAFF WORK REPORT SUMMARY';
                    } else {
                        echo 'ALL STAFF WORK REPORT SUMMARY';
                    }
                    ?>
                </h1>
            </td>
            <?php if ($panelName == 'allStaffWorkReport') { ?>
                <td width="15%" align="right">
                    <div class="selectStyled floatLeft" style="width:170px;border:0">
                        <select id="StaffName" name="StaffName" 
                                onchange="showWorkReportByTeam('', this.value, 'allStaffWorkReport');"
                                class="input_border_red"  autocomplete="off" maxlength="30" style="width:170px;background: #DCEAFF;color: #0F118A;border: 1px solid #7ab0fe!important;height: 30px;font-size: 14px;font-weight: 600;border-radius: 5px !important;width: max-content;padding: 3px 10px;">
                            <option value="NotSelected">STAFF NAME</option>  
                            <?php
                            $qSelStaffTeam = "SELECT DISTINCT user_id,user_fname FROM user where user_type = 'STAFF' AND user_status='Active'";
                            $resStaffTeam = mysqli_query($conn, $qSelStaffTeam);
                            while ($rowStaffTeam = mysqli_fetch_array($resStaffTeam, MYSQLI_ASSOC)) {
                                if ($rowStaffTeam['user_id'] == $staffId) {
                                    $staffTeamSelected = "selected";
                                } else {
                                    $staffTeamSelected = "";
                                }
                                echo "<OPTION VALUE=" . "\"{$rowStaffTeam['user_id']}\"" . " class=" . "\"content-mess-blue\" $staffTeamSelected>{$rowStaffTeam['user_fname']}</OPTION>";
                            }
                            ?>
                        </select>
                    </div>
                </td>
            <?php } else { ?>
                <td width="15%">

                </td>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="2" >
                <div class="hrGrey"style="margin-bottom: 2%;margin-top: 1%;"></div>
            </td>
        </tr>
    </table>
    <?php if ($panelName != 'allStaffWorkReport' && $custId != '') { ?>

    <?php } else if ($staffId != '' && $staffId != NULL && $staffId != 'NotSelected') { ?>
        
    <?php } ?>
</div>