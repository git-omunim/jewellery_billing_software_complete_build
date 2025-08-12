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
<div id="sellDetailsSubDiv">
    <?php
    $todayDate = date('d-m-Y');
    $todayDateNum = strtotime($todayDate);
    if ($custId == '') {
        $custId = $_REQUEST['custId'];
    }
    if ($panelName == '') {
        $panelName = $_REQUEST['panelName'];
    }
    if ($staffTeam == '') {
        $staffTeam = $_REQUEST['staffTeam'];
    }
    ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
        <tr>
            <td width="85%" align="left">
                <h1>
                    <?php
                    if ($panelName != 'allStaffWorkReport' && $custId != '') {
                        echo 'STAFF WORK REPORT';
                    } else {
                        echo 'ALL STAFF WORK REPORT';
                    }
                    ?>
                </h1>
            </td>
            <?php if ($panelName == 'allStaffWorkReport') { ?>
                <td width="15%" align="right">
                    <div class="selectStyled floatLeft" style="width:170px;border:0">
                        <select id="StaffTeam" name="StaffTeam" 
                                onchange="showWorkReportByTeam(this.value, '', 'allStaffWorkReport');"
                                class="input_border_red"  autocomplete="off" maxlength="30" style="width:170px;background: #DCEAFF;color: #0F118A;border: 1px solid #7ab0fe!important;height: 30px;font-size: 14px;font-weight: 600;border-radius: 5px !important;padding: 3px 10px;">
                            <option value="NotSelected">STAFF TEAM</option>  
                            <?php
                            $qSelStaffTeam = "SELECT DISTINCT user_team FROM user where user_type = 'STAFF' AND user_status='Active' AND (user_team != '' AND user_team IS NOT NULL)";
                            $resStaffTeam = mysqli_query($conn, $qSelStaffTeam);
                            while ($rowStaffTeam = mysqli_fetch_array($resStaffTeam, MYSQLI_ASSOC)) {
                                if ($rowStaffTeam['user_team'] == $staffTeam) {
                                    $staffTeamSelected = "selected";
                                } else {
                                    $staffTeamSelected = "";
                                }
                                echo "<OPTION VALUE=" . "\"{$rowStaffTeam['user_team']}\"" . " class=" . "\"content-mess-blue\" $staffTeamSelected>{$rowStaffTeam['user_team']}</OPTION>";
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
<!--        <tr>
            <td colspan="2" >
                <div class="hrGrey"style="margin-bottom: 2%;margin-top: 1%;"></div>
            </td>
        </tr>-->
    </table>
    <?php
//Data Table Main Columns
    include 'omdatatablesUnset.php';
//
    $dataTableColumnsFields = array(
        array('dt' => 'DATE'),
        array('dt' => 'STAFF'),
        array('dt' => 'TOTAL CALLS'),
        array('dt' => 'WRONG/INV NO'),
        array('dt' => 'CALL NOT REC'),
        array('dt' => 'INTERESTED'),
        array('dt' => 'VERY INT'),
        array('dt' => 'NOT INT'),
        array('dt' => 'POSTPONED'),
        array('dt' => 'DEMO ARR'),
        array('dt' => 'DEMO DONE'),
        array('dt' => 'DEMO INSTALL'),
        array('dt' => 'CONVERTED'),
    );
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields;
//
    $_SESSION['tableName'] = 'attendance'; // Table Name
    $_SESSION['tableNamePK'] = 'attend_id'; // Primary Key
//
    $dbColumnsArray = array(
        "attend_date",
        "attend_staff_name",
        "attend_staff_total_calls",
        "attend_staff_WRNUM_calls",
        "attend_staff_NOTREC_calls",
        "attend_staff_INT_calls",
        "attend_staff_VINT_calls",
        "attend_staff_NINT_calls",
        "attend_staff_POST_calls",
        "attend_staff_demo_arrange",
        "attend_staff_demo_done",
        "attend_staff_demo_install",
        "attend_staff_cust_con",
    );
//
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '2,3,4,5,6,7,8,9,10,11,12';
    $_SESSION['dtSortColumn'] = '0,1';
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtASCDESC'] = 'desc,desc';

// Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "attend_id,attend_staff_id,";
//
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
//
// On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = ""; // On which column
    $_SESSION['onclickColumnId'] = "";
    $_SESSION['onclickColumnValue'] = "";
    $_SESSION['onclickColumnFunction'] = "";
    $_SESSION['onclickColumnFunctionPara1'] = "";
    $_SESSION['onclickColumnFunctionPara2'] = "";
    $_SESSION['onclickColumnFunctionPara3'] = "";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
//
// Where Clause Condition 
    if ($staffTeam != '' && $staffTeam != NULL && $staffTeam != 'NotSelected') {
        $_SESSION['tableWhere'] = " u.user_team='$staffTeam'";
    } else {
        if ($panelName != 'allStaffWorkReport' && $custId != '') {
            $_SESSION['tableWhere'] = "UNIX_TIMESTAMP(STR_TO_DATE(attend_date,'%d-%m-%Y'))<='$todayDateNum' AND attend_staff_id='$custId'";
        } else {
            $_SESSION['tableWhere'] = "UNIX_TIMESTAMP(STR_TO_DATE(attend_date,'%d-%m-%Y'))<='$todayDateNum'";
        }
    }
//    echo '$_SESSION[tableWhere] : ' . $_SESSION['tableWhere'] . '<br>';
// Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN user AS u ON attend_staff_id = u.user_id";
// Data Table Main File
    include 'omdatatables.php';
    ?>
</div>