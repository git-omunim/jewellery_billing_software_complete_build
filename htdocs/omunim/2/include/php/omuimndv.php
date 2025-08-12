<?php
/*
 * **************************************************************************************
 * @tutorial: Action Item Update Main Division
 * **************************************************************************************
 *
 * Created on 24 Dec, 2012 11:46:44 PM
 *
 * @FileName: omuimndv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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

require_once 'system/omssopin.php';
?>
<?php
$actionItemID = $_GET['action_id'];
$qSelectActionItem = "SELECT * FROM actionitem WHERE acit_id='$actionItemID'"; //To display data in this form
$resActionItem = mysqli_query($conn,$qSelectActionItem);
$rowActionItem = mysqli_fetch_array($resActionItem);
?>
<?php 
                if ($staffId == '' || ($staffId && $array['updateActionItemAccess'] == 'true') || $panelName != 'UpdateAcit'){ ?>
<table border="0" cellpadding="2" cellspacing="1" width="100%">
    <tr>
        <td>
            <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <tr>
                    <td align="center" colspan="5">
                        <div class="main_link_blue spaceLeft40" >Add New Important Work / Task</div>
                    </td>
                </tr>

                <tr>
                    <td align="left">
                        <div class="main_link_brown12">Task Description</div>
                    </td>
                    <td align="left">
                        <div class="main_link_brown12">Start Date</div>
                    </td>
                    <td align="left">
                        <div class="main_link_brown12">Target Date</div>
                    </td>
                    <td align="left">
                        <div class="main_link_brown12">Repeat</div>
                    </td>
                    <td align="left">
                        <div class="main_link_brown12">Firm</div>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <!-- START Action Item ID -->
                        <input id="action_id" name="action_id" value="<?php echo $actionItemID; ?>" type="hidden"/>
                        <!-- END Action Item ID  -->
                        <input id="upTaskDescrpn" name="upTaskDescrpn" value="<?php echo $rowActionItem['acit_subject']; ?>"
                               onkeydown="javascript: if(event.keyCode == 13){document.getElementById('upStartDOBDay').focus(); return false;}else if(event.keyCode == 8)"
                               type="text" spellcheck="false" class="lgn-txtfield14" size="30" maxlength="30" />
                    </td>
                    <td align="left">
                        <div class="main_link_brown">
                            <?php
                            $todayDay = date(j) - 1;
                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                            $optDay[$todayDay] = "selected";
                            ?> 
                            <select id="upStartDOBDay" name="upStartDOBDay" class="lgn-txtfield-arial" value="<?php echo $rowActionItem['acit_start_DOB']; ?>"
                                    onkeydown="javascript: if(event.keyCode == 13){document.getElementById('upStartDOBMonth').focus(); return false;}else if(event.keyCode == 8){document.getElementById('upTaskDescrpn').focus(); return false;}">
                                <option value="NotSelected">DAY</option>
                                <?php
                                for ($dd = 0; $dd <= 30; $dd++) {
                                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                }
                                ?>
                            </select> 

                            <!-- *************** Start Code for Month *************** -->
                            <?php
                            $todayMM = date(n) - 1;
                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                            $optMonth[$todayMM] = "selected";
                            ?> 
                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                            <select id="upStartDOBMonth" name="upStartDOBMonth" class="lgn-txtfield-arial" 
                                    onkeydown="javascript: if(event.keyCode == 13){document.getElementById('upStartDOBYear').focus(); return false;}else if(event.keyCode == 8){document.getElementById('upStartDOBDay').focus(); return false;}
                                        //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                                        var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                        gbMonth = document.getElementById('gbMonthId').value;
                                        if(gbMonth==1){
                                            if(event.keyCode){
                                                var sel=String.fromCharCode(event.keyCode);
                                                if(sel==0)
                                                {
                                                    this.value = arrMonths[9];
                                                }
                                                else if(sel==1)
                                                {
                                                    this.value = arrMonths[10];
                                                }
                                                else if(sel==2)
                                                {
                                                    this.value = arrMonths[11]; 
                                                }
                                                // this.value = arrMonths[10];
                                                document.getElementById('gbMonthId').value = 0;
                                            } }
                                        else if(event.keyCode){
                                            var sel=String.fromCharCode(event.keyCode)-1;
                                            this.value = arrMonths[sel];
                                            if(event.keyCode==49){
                                                document.getElementById('gbMonthId').value = 1;}
                                        } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13">
                                <option value="NotSelected">MONTH</option>
                                <?php           
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
$queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat'";
$engmonformat = mysqli_query($conn, $queryengmonformat);
$rowengmonformat = mysqli_fetch_array($engmonformat);
$englishMonthFormat = $rowengmonformat['omly_value'];
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
                                for ($mm = 0; $mm <= 11; $mm++) {                                   
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                    if ($englishMonthFormat == 'displayinnumber') {
                                        $billMonth = date('m', strtotime($arrMonths[$mm]));
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
                                    } else {
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                                    }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                            }
                                ?>
                            </select> 

                            <!-- *************** Start Code for Year *************** -->
                            <?php
                            $todayYear = date(Y);
                            $optYear[$todayYear] = "selected";
                            ?> 
                            <select id="upStartDOBYear" name="upStartDOBYear" class="lgn-txtfield-arial"
                                    onkeydown="javascript: if(event.keyCode == 13){document.getElementById('upEndDOBDay').focus(); return false;}else if(event.keyCode == 8){document.getElementById('upStartDOBMonth').focus(); return false;}">
                                <option value="NotSelected">YEAR</option>
                                <?php
                                for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                    echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                    <td align="left">
                        <div class="main_link_brown">
                            <?php
                            $todayDay = date(j) - 1;
                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                            $optDay[$todayDay] = "selected";
                            ?> 
                            <select id="upEndDOBDay" name="upEndDOBDay" class="lgn-txtfield-arial"
                                    onkeydown="javascript: if(event.keyCode == 13){document.getElementById('upEndDOBMonth').focus(); return false;}else if(event.keyCode == 8){document.getElementById('upStartDOBYear').focus(); return false;}">
                                <option value="NotSelected">Day</option>
                                <?php
                                for ($dd = 0; $dd <= 30; $dd++) {
                                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                }
                                ?>
                            </select> 

                            <!-- *************** Start Code for Month *************** -->
                            <?php
                            $todayMM = date(n) - 1;
                            $arrMonths = array(Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec); //change in month names upto 3 letter @AUTHOR: SANDY20AUG13
                            $optMonth[$todayMM] = "selected";
                            ?> 
                            <select id="upEndDOBMonth" name="upEndDOBMonth" class="lgn-txtfield-arial"
                                    onkeydown="javascript: if(event.keyCode == 13){document.getElementById('upEndDOBYear').focus(); return false;}else if(event.keyCode == 8){document.getElementById('upEndDOBDay').focus(); return false;}">
                                <option value="NotSelected">MONTH</option>
                                <?php 
                for ($mm = 0; $mm <= 11; $mm++) {
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                    if ($englishMonthFormat == 'displayinnumber') {
                                        $engMonth = date('m', strtotime($arrMonths[$mm]));
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$engMonth</option>";
                                    } else {
                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                    }                   
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                }
                                ?>
                            </select> 

                            <!-- *************** Start Code for Year *************** -->
                            <?php
                            $todayYear = date(Y);
                            $optYear[$todayYear] = "selected";
                            ?> 
                            <select id="upEndDOBYear" name="upEndDOBYear" class="lgn-txtfield-arial"
                                    onkeydown="javascript: if(event.keyCode == 13){document.getElementById('upTaskRepeat').focus(); return false;}else if(event.keyCode == 8){document.getElementById('upEndDOBMonth').focus(); return false;}">
                                <option value="NotSelected">Year</option>
                                <?php
                                for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                    echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                    <?php
                    $taskRepeatStr = $rowActionItem['acit_TaskRepeat'];

                    switch ($taskRepeatStr) {
                        case "Daily":
                            $optionCategoryl1 = "selected";
                            break;
                        case "Weekly":
                            $optionCategoryl2 = "selected";
                            break;
                        case "Monthly":
                            $optionCategoryl3 = "selected";
                            break;
                        case "Quarter":
                            $optionCategoryl4 = "selected";
                            break;
                        case "HalfYear":
                            $optionCategoryl5 = "selected";
                            break;
                        case "Annual":
                            $optionCategoryl6 = "selected";
                            break;
                        case "2Years":
                            $optionCategoryl7 = "selected";
                            break;
                    }
                    ?> 
                    <td align="left">
                        <select id="upTaskRepeat" name="upTaskRepeat" 
                                onkeydown="javascript: if(event.keyCode == 13){document.getElementById('actionItemFirmId').focus(); return false;}else if(event.keyCode == 8){document.getElementById('upEndDOBYear').focus(); return false;}"
                                class="lgn-txtfield12">
                            <option value="Daily" Selected<?php echo $optionCategoryl1; ?>>Daily</option>
                            <option value="Weekly"<?php echo $optionCategoryl2; ?>>Weekly</option>
                            <option value="Monthly"<?php echo $optionCategoryl3; ?>>Monthly</option>
                            <option value="Quarter"<?php echo $optionCategoryl4; ?>>Quarterly</option>
                            <option value="HalfYear"<?php echo $optionCategoryl5; ?>>Half Yearly</option>
                            <option value="Annual"<?php echo $optionCategoryl6; ?>>Annually</option>
                            <option value="2Years"<?php echo $optionCategoryl7; ?>>After 2 Years</option>
                        </select>
                    </td>
                    <td align="left"> 
                        <div id="selectFirmDiv">
                            <?php
                            $prevFieldId = 'upTaskRepeat';
                            $nextFieldId = 'upButton';
                            $nextReqFieldId = 'upButton';
                            $firmIdName = 'actionItemFirmId';
                            $firmIdSelected = $rowActionItem['acit_FirmId'];
                            //to assign default firm id @AUTHOR: SANDY9JUL13
                            if (!$firmIdSelected) {
                                $firmIdSelected = $_SESSION['setFirmSession'];
                            }
                            include 'omffrafs.php';
                            ?>
                        </div>
                    </td>
                </tr>
            </table> 
        </td>
    </tr>

    <tr>
        <td align="right">
            <div id="updateNewActionItemButDiv">
                <input type="submit" id="upButton"  value="Update" class="frm-btn-without-border"
                       onclick="javascript: updateNewActionItem('<?php echo $actionItemID; ?>');"
                       maxlength="30" size="15" />
            </div>
        </td>
    </tr>
    <tr>
        <td align="center">
            <hr color="#FD9A00" size="0.1px" />
        </td>
    </tr>
</table>
<?php } ?>