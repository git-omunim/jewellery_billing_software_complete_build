<?php
/*
 * **************************************************************************************
 * @tutorial: udhaar emi list
 * **************************************************************************************
 * 
 * Created on Nov 14, 2014 3:37:27 PM
 *
 * @FileName: omuemilt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
?>
<?php
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
?>
<!--<div id="udhharListDiv">
    <?php
    $selFirmId = NULL;
    $sortKeyword = NULL;
    $searchColumn = NULL;
    $searchValue = NULL;
    $searchKeyword = NULL;
    $columName = NULL;
    $searchColumnStr = NULL;

    if (isset($_GET['searchKeyword'])) {
        $searchKeyword = $_GET['searchKeyword'];
    }
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        $selFirmId = $_SESSION['setFirmSession'];
    }
    if (isset($_GET['sortKeyword'])) {
        $sortKeyword = $_GET['sortKeyword'];
    }
    if (isset($_GET['searchColumn'])) {
        $searchColumn = $_GET['searchColumn'];
    }
    if (isset($_GET['searchValue'])) {
        $searchValue = $_GET['searchValue'];
    }
    $searchColumnName = $searchColumn;
    $searchColumnValue = $searchValue;

    $sortKeyword = stripslashes($sortKeyword);
    $searchColumn = stripslashes($searchColumn);

    $sortKeywordValue = $sortKeyword;
    $sortKeywordValue = stripslashes($sortKeywordValue);
    /*     * *****End Code To Add $sortKeywordValue @Author:PRIYA24AUG13********* */
    /*     * *************Start Code To Update No Of Rows @Author:PRIYA16JUL13******************* */
    $updateRows = $_GET['updateRows'];
    if ($updateRows == 'updateRows') {
        $rowsPerPage = $_GET['rowsPerPage'];
        $ominValue = $rowsPerPage;
        $ominOption = 'indigvpnrw';
        include 'ommpindc.php';
    }
    $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indigvpnrw'";
    $resGNoOfRows = mysqli_query($conn,$qSelGNoOfRows);
    $rowGNoOfRows = mysqli_fetch_array($resGNoOfRows, MYSQLI_ASSOC);
    $rowsPerPage = $rowGNoOfRows['omin_value'];
    if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
        $rowsPerPage = 15;
    }
    $checkNextRows = $rowsPerPage * 2;
    // by default we show first page
    $pageNum = 1;
    $gCounter = 0;
    // if $_GET['page'] defined, use it as page number
    if (isset($_GET['page'])) {
        $pageNum = $_GET['page'];
        $gCounter = ($pageNum - 1) * $rowsPerPage;
    }
    // counting the offset
    $perOffset = ($pageNum - 1) * $rowsPerPage;
    $isAtrate = strpos($searchColumn, '@');

    if ($isAtrate == true) {
        $searchColumn = explode("@", $searchColumn);
        $searchColumn1 = $searchColumn[0];
        $searchColumn2 = $searchColumn[1];
        $searchColumn3 = $searchColumn[2];
        //Start Code to Get Pre and Post Girvi Serial Number

        if ($searchColumn1 == 'udhaar_cust_fname') {
            $isSpace = strpos($searchValue, ' ');
            if ($isSpace == true) {
                $searchValue = explode(" ", $searchValue);
                $searchValue1 = $searchValue[0];
                $searchValue2 = $searchValue[1];
                $searchColumnStr = " and $searchColumn1 LIKE '$searchValue1%' and $searchColumn2 LIKE '$searchValue2%' ";
            } else {
                $searchColumnStr = " and ($searchColumn1 LIKE '$searchValue%' or $searchColumn2 LIKE '$searchValue%') ";
            }
        }
        if ($searchColumn1 == "DAY(STR_TO_DATE(udhadepo_EMI_start_DOB,'%d %M %y'))" || $searchColumn1 == "DAY(STR_TO_DATE(udhadepo_EMI_end_DOB,'%d %M %y'))") {
            $isDot = strpos($searchValue, '.');
            if ($isDot == true) {
                $searchValue = explode(".", $searchValue);
                $searchValue1 = $searchValue[0];
                $searchValue2 = $searchValue[1];
                $searchValue3 = $searchValue[2];
                if ($searchValue3 == '') {
                    $searchColumnStr = " and $searchColumn2='$searchValue1' and $searchColumn3 = '$searchValue2' ";
                } else if ($searchValue1 != '' && $searchValue2 != '' && $searchValue3 != '') {
                    $searchColumnStr = " and $searchColumn1='$searchValue1' and $searchColumn2='$searchValue2' and $searchColumn3 = '$searchValue3' ";
                }
            } else {
                $searchColumnStr = " and $searchColumn3='$searchValue' ";
            }
        }
    } else if ($searchColumn == 'udhadepo_EMI_status') {
        if ($searchValue == "")
            $searchColumnStr = " and $searchColumn IN ('Due','Paid') ";
        else
            $searchColumnStr = " and $searchColumn = '$searchValue' ";
    } else {
        if ($searchColumn != NULL)
            $searchColumnStr = " and $searchColumn LIKE '$searchValue%' ";
    }
    if ($searchColumn == 'udhadepo_EMI_amt' || $searchColumn == 'udhadepo_EMI_int_amt' || $searchColumn == 'udhadepo_EMI_total_amt') {
        $prinStartRange = stristr($searchValue, '-', TRUE);
        $endRange = stristr($searchValue, '-');
        $prinEndRange = substr($endRange, 1);
        if ($prinStartRange != '' && $prinEndRange != '') {
            $searchColumnStr = " and $searchColumn >= '$prinStartRange' and $searchColumn <= '$prinEndRange'";
        } else {
            $searchColumnStr = " and $searchColumn = '$searchValue' ";
        }
    }
    $rowsPanel = $_GET['updateRows'];
    if ($rowsPanel == 'UdhaarUpdateRowsEMIList') {
        $rowsPerPage = $_GET['rowsPerPage'];
        $ominValue = $rowsPerPage;
        $ominOption = 'indiuemipnrw';
        include 'ommpindc.php';
    }
    $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indiuemipnrw'";
    $resGNoOfRows = mysqli_query($conn,$qSelGNoOfRows);
    $rowGNoOfRows = mysqli_fetch_array($resGNoOfRows, MYSQLI_ASSOC);
    $rowsPerPage = $rowGNoOfRows['omin_value'];
    if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
        $rowsPerPage = 15;
    }
    $checkNextRows = $rowsPerPage * 2;
    $pageNum = 1;
    $gCounter = 0;
// if $_GET['page'] defined, use it as page number
    if (isset($_GET['page'])) {
        $pageNum = $_GET['page'];
        $gCounter = ($pageNum - 1) * $rowsPerPage;
    }
// counting the offset
    $perOffset = ($pageNum - 1) * $rowsPerPage;
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    if ($selFirmId != NULL) {
        $strFrmId = $selFirmId;
    } else {
        $resFirmCount = mysqli_query($conn,$qSelFirmCount);
        $strFrmId = '0';
        //Set String for Public Firms
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    }
//    echo '$rowsPerPage=='.$rowsPerPage.'<br />$perOffset=='.$perOffset;
    $timePeriod = $_GET['timePeriod'];
    if ($timePeriod != '') {
        $todayDate = date('d M Y');
        $todayDat = strtotime("+" . $timePeriod . " days", strtotime($todayDate));
        $dueDate = om_strtoupper(date("d M Y", $todayDat));

        if ($sortKeyword != NULL) {
            if ($sortKeyword == 'udhadepo_EMI_amt' || $sortKeyword == 'udhadepo_EMI_int_amt') {
                $qSelTotalUdhaarDepCount = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_end_DOB = '$dueDate' and udhadepo_EMI_status != 'NULL' order by convert($sortKeyword, decimal) asc";
                $qSelAllUdhaarDep = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_end_DOB = '$dueDate' and udhadepo_EMI_status != 'NULL' order by convert($sortKeyword, decimal) asc LIMIT $perOffset, $rowsPerPage";
            } else {
                $qSelTotalUdhaarDepCount = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_end_DOB = '$dueDate' and udhadepo_EMI_status != 'NULL' order by $sortKeyword asc";
                $qSelAllUdhaarDep = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_end_DOB = '$dueDate' and udhadepo_EMI_status != 'NULL' order by $sortKeyword asc LIMIT $perOffset, $rowsPerPage";
            }
        } else if ($searchColumnStr != NULL) {
            $qSelTotalUdhaarDepCount = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_end_DOB = '$dueDate' and udhadepo_EMI_status != 'NULL' order by udhadepo_ent_dat asc";
            $qSelAllUdhaarDep = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_end_DOB = '$dueDate' and udhadepo_EMI_status != 'NULL' order by udhadepo_ent_dat asc LIMIT $perOffset, $rowsPerPage";
        } else {
            $qSelTotalUdhaarDepCount = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' and udhadepo_EMI_end_DOB = '$dueDate' order by udhadepo_ent_dat asc";
            $qSelAllUdhaarDep = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' and udhadepo_EMI_end_DOB = '$dueDate' order by udhadepo_ent_dat asc LIMIT $perOffset, $rowsPerPage";
        }
    } else {
        if ($sortKeyword != NULL) {
            if ($sortKeyword == 'udhadepo_EMI_amt' || $sortKeyword == 'udhadepo_EMI_int_amt' || $sortKeyword == 'udhadepo_EMI_total_amt') {
                $qSelTotalUdhaarDepCount = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' order by convert($sortKeyword, decimal) asc,udhadepo_ent_dat asc";
                $qSelAllUdhaarDep = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' order by convert($sortKeyword, decimal) asc,udhadepo_ent_dat asc LIMIT $perOffset, $rowsPerPage";
            } else {
                $qSelTotalUdhaarDepCount = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' order by $sortKeyword asc,udhadepo_ent_dat asc";
                $qSelAllUdhaarDep = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' order by $sortKeyword asc,udhadepo_ent_dat asc LIMIT $perOffset, $rowsPerPage";
            }
        } else if ($searchColumnStr != NULL) {
            $qSelTotalUdhaarDepCount = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' order by udhadepo_ent_dat asc";
            $qSelAllUdhaarDep = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' order by udhadepo_ent_dat asc LIMIT $perOffset, $rowsPerPage";
        } else {
            $qSelTotalUdhaarDepCount = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' order by udhadepo_ent_dat asc";
            $qSelAllUdhaarDep = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_firm_id IN ($strFrmId) and udhadepo_EMI_status != 'NULL' order by udhadepo_ent_dat asc LIMIT $perOffset, $rowsPerPage";
        }
    }
    $resTotalUdhaarDepCount = mysqli_query($conn,$qSelTotalUdhaarDepCount);
    $totalUdhaarDep = mysqli_num_rows($resTotalUdhaarDepCount);

    $resAllUdhaarDep = mysqli_query($conn,$qSelAllUdhaarDep);
    $totalNextUdhaarDep = mysqli_num_rows($resAllUdhaarDep);
    $sortKeyword = addslashes($sortKeyword);
    
//        echo '$totalUdhaarDep='.$totalUdhaarDep;
    ?>
    <div id="udhaarSubDetailsDiv">
        <div id="girviPanelTrId"></div>---Add div for print function @OMMODTAG SHRI_12AUG15-
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td valign="top">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td width="155px">
                                <div class="spaceLeft10 ff_tnr fs_14 fw_b">
                                    UDHAAR EMI LIST
                                </div>
                            </td>
                            <td align="left" valign="middle">(
                                <input id="advMoneyRows" name="advMoneyRows" type="text" value="<?php echo $rowsPerPage; ?>" title="Enter number of rows To See In List"
                                       size="4" maxlength="4" class="inputFieldWithotBorder orange"
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('advMoneyRows').value != '') {
                                                   showNumberOfRowsInUdhaar('<?php echo $documentRoot; ?>', document.getElementById('advMoneyRows').value, '1', 'UdhaarUpdateRowsEMIList', 'udhharListDiv', '<?php echo $timePeriod; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');
                                               }"
                                       onblur="if (document.getElementById('advMoneyRows').value != '') {
                                                   showNumberOfRowsInUdhaar('<?php echo $documentRoot; ?>', document.getElementById('advMoneyRows').value, '1', 'UdhaarUpdateRowsEMIList', 'udhharListDiv', '<?php echo $timePeriod; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');
                                               }"
                                       onclick="this.placeholder = 'ROWS';
                                               this.value = '';"
                                       onkeypress="javascript:return valKeyPressedForNumber(event);"/>
                                )
                            </td>
                            <td valign="middle" align="right"  class="noPrint">
                                <div>
                                    <h4>Enter No. of Days: </h4>
                                </div>
                            </td>
                            <td width="70px" class="paddingLeft5">
                                <input id="udEMIDuePeriod" type="text" class="inputBox14CalibriGreyMiddle" maxlength="5"
                                       size="5" spellcheck="false" value="<?php echo $timePeriod; ?>"
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('udEMIDuePeriod').value != '') {
                                                   searchUdhaarEMIByPeriod(this.value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');
                                                   document.getElementById('udEMIDuePeriod').value = '';
                                               }"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php
            if ($totalNextUdhaarDep <= 0) {
                ?>
                <tr>
                    <td valign="middle" align="center" class="ff_calibri fs_13 fw_b brown">
                        <?php if ($searchColumn != NULL) { ?>NO RECORED FOUND<?php } else { ?> ~ LIST IS EMPTY ~ <?php } ?>
                    </td>
                </tr>
                <?php if ($searchColumn != NULL) { ?>
                    <tr>
                        <td valign="middle" align="center" width="58px" height="50px" title="System Logs Panel">
                            <a onclick="showAllUdhaarDetailsDiv('udhaarEmiList');"
                               style="cursor: pointer;">
                                <div id="SystemLog">
                                    <img src="<?php echo $documentRoot; ?>/images/back32.png" alt="Udhaar Deposit Panel" 
                                         title="Udhaar Deposit Panel"/>
                                </div>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td colspan="3"><br />
                </td>
            </tr>
            <tr>
                <td colspan="3" align="left">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                        <?php
                        if ($totalUdhaarDep <= 0) {
                            //  echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ List is empty. ~ </div></div>";
                        } else {
                            ?>
                            <tr>
                                <td align="left"  class="h7 border-right-bottom" width="80px">Change in width @AUTHOR: SANDY29DEC13--
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tr>
                                            <td align="left">
                                                S.N.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="left" class="h7 border-right-bottom" width="120px">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tr>
                                            <td align="right">
                                                <input id="udharAmt" type="text" name="udharAmt" placeholder="UDHAAR AMT"
                                                       value="<?php
                                                       if ($searchColumnName == 'udhadepo_EMI_amt')
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'UDHAAR AMT';
                                                       ?>" 
                                                       onclick="this.value = '';"
                                                       onblur="javascript:if (document.getElementById('udharAmt').value != '<?php
                                                       if ($searchColumnName == 'udhadepo_EMI_amt')
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'UDHAAR AMT';
                                                       ?>') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_amt', document.getElementById('udharAmt').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   } else {
                                                                       document.getElementById('udharAmt').value = '';
                                                                   }"
                                                       onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"         
                                                       onkeyup="if (event.keyCode == 13 && document.getElementById('udharAmt').value != '') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_amt', document.getElementById('udharAmt').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   }"
                                                       size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                                            </td>
                                            <td align="right">
                                                <a style="cursor: pointer;" title="Click To View Udhaar By Amount"
                                                   onclick="sortUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_amt', '<?php echo $selFirmId; ?>', 'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');">
                                                       <?php if ($sortKeyword == 'udhadepo_EMI_amt') { ?>
                                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right"  class="h7 border-right-bottom" width="89px">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tr>
                                            <td align="right">
                                                <input id="udharInt" type="text" name="udharInt" placeholder="INTEREST"
                                                       value="<?php
                                                       if ($searchColumnName == 'udhadepo_EMI_int_amt')
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'INTEREST';
                                                       ?>" 
                                                       onclick="this.value = '';"
                                                       onblur="javascript:if (document.getElementById('udharInt').value != '<?php
                                                       if ($searchColumnName == 'udhadepo_EMI_int_amt')
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'INTEREST';
                                                       ?>') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_int_amt', document.getElementById('udharInt').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   } else {
                                                                       document.getElementById('udharInt').value = '';
                                                                   }"
                                                       onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"         
                                                       onkeyup="if (event.keyCode == 13 && document.getElementById('udharInt').value != '') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_int_amt', document.getElementById('udharInt').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   }"
                                                       size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                                            </td>
                                            <td align="right">
                                                <a style="cursor: pointer;" title="Click To View Udhaar By Interest"
                                                   onclick="sortUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_int_amt', '<?php echo $selFirmId; ?>', 'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');">
                                                       <?php if ($sortKeyword == 'udhadepo_EMI_int_amt') { ?>
                                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right"  class="h7 border-right-bottom" width="95px">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tr>
                                            <td align="right">
                                                <input id="udharTotAmt" type="text" name="udharTotAmt" placeholder="TOTAL AMT"
                                                       value="<?php
                                                       if ($searchColumnName == 'udhadepo_EMI_total_amt')
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'TOTAL AMT';
                                                       ?>" 
                                                       onclick="this.value = '';"
                                                       onblur="javascript:if (document.getElementById('udharTotAmt').value != '<?php
                                                       if ($searchColumnName == 'udhadepo_EMI_total_amt')
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'TOTAL AMT';
                                                       ?>') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_total_amt', document.getElementById('udharTotAmt').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   } else {
                                                                       document.getElementById('udharTotAmt').value = '';
                                                                   }"
                                                       onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"         
                                                       onkeyup="if (event.keyCode == 13 && document.getElementById('udharTotAmt').value != '') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_total_amt', document.getElementById('udharTotAmt').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   }"
                                                       size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                                            </td>
                                            <td align="right">
                                                <a style="cursor: pointer;" title="Click To View Udhaar By Total Amount"
                                                   onclick="sortUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_total_amt', '<?php echo $selFirmId; ?>', 'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');">
                                                       <?php if ($sortKeyword == 'udhadepo_EMI_total_amt') { ?>
                                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="left"  class="h7 border-right-bottom" width="132px">
                                    <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">CUST NAME</div>
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                     <tr>
                                         <td align="left">
                                             <input id="name" type="text" name="name" placeholder="CUST NAME"
                                                    value="<?php
//                                                       if ($searchColumnName == 'udhaar_cust_fname@udhaar_cust_lname')
//                                                           echo $searchColumnValue;
//                                                       else
//                                                           echo 'CUST NAME';
                                    ?>"
                                                    onclick="this.value = '';"
                                                    onblur="javascript:if (document.getElementById('name').value != '') {
                                                                searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhaar_cust_fname@udhaar_cust_lname', document.getElementById('name').value, '<?php echo $selFirmId; ?>',
                                                                        'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                            } else {
                                                                document.getElementById('name').value = '<?php
//                                                       if ($searchColumnName == 'udhaar_cust_fname@udhaar_cust_lname')
//                                                           echo $searchColumnValue;
//                                                       else
//                                                           echo 'CUST NAME';
                                    ?>';
                                                            }"
                                                    onkeyup="if (event.keyCode == 13 && document.getElementById('name').value != '') {
                                                                searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhaar_cust_fname@udhaar_cust_lname', document.getElementById('name').value, '<?php echo $selFirmId; ?>',
                                                                        'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                            }"
                                                    size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                         </td>
                                         <td align="right">
                                             <a style="cursor: pointer;" title="Click To View Udhaar By Customer Name"
                                                onclick="sortUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhaar_cust_fname', '<?php echo $selFirmId; ?>', 'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');">
                                    <?php if ($sortKeyword == 'udhaar_cust_fname') { ?>
                                                                                                                                     <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                             </a>
                                         </td>
                                     </tr>
                                 </table>
                                </td>
                                <td align="center"  class="border-right-bottom" width="80px">
                                    <div class="lgn-txtfield-without-borderAndBackground13-Arial">MOB NO</div>
                                </td>
                                <td align="left"  class="h7 border-right-bottom" width="110px">
                                    <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">CITY</div>
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                      <tr>
                                          <td align="left">
                                              <input id="city" type="text" name="city" placeholder="CITY"
                                                     value="<?php
//                                                       if ($searchColumnName == 'udhaar_cust_city')
//                                                           echo $searchColumnValue;
//                                                       else
//                                                           echo 'CITY';
                                    ?>" 
                                                     onclick="this.value = '';"
                                                     onblur="javascript:if (document.getElementById('city').value != '') {
                                                                 searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhaar_cust_city', document.getElementById('city').value, '<?php echo $selFirmId; ?>',
                                                                         'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                             } else {
                                                                 document.getElementById('city').value = '<?php
//                                                       if ($searchColumnName == 'udhaar_cust_city')
//                                                           echo $searchColumnValue;
//                                                       else
//                                                           echo 'CITY';
                                    ?>';
                                                             }"
                                                     onkeyup="if (event.keyCode == 13 && document.getElementById('city').value != '') {
                                                                 searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhaar_cust_city', document.getElementById('city').value, '<?php echo $selFirmId; ?>',
                                                                         'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                             }"
                                                     size="6" maxlength="30"class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                          </td>
                                          <td align="right">
                                              <a style="cursor: pointer;" title="Click To View Girvi By Customer City"
                                                 onclick="sortUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhaar_cust_city', '<?php echo $selFirmId; ?>', 'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');">
                                    <?php if ($sortKeyword == 'udhaar_cust_city') { ?>
                                                                                                                                      <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                              </a>
                                          </td>
                                      </tr>
                                  </table>
                                </td>
                                <td align="right"  class="h7 border-right-bottom" width="91px">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tr>
                                            <td align="right" title="DD.MM.YY">
                                                <input id="sDate" type="text" name="sDate" placeholder="DD.MM.YY"
                                                       value="<?php
                                                       if ($searchColumnName == "DAY(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %Y\'),\'%y\')")
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'S. DATE';
                                                       ?>" 
                                                       onclick="this.value = '';"
                                                       onblur="javascript:if (document.getElementById('sDate').value != '') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('sDate').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   } else {
                                                                       document.getElementById('sDate').value = '<?php
                                                       if ($searchColumnName == "DAY(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %Y\'),\'%y\')")
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'S. DATE';
                                                       ?>';
                                                                   }"
                                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                        
                                                       onkeyup="if (event.keyCode == 13 && document.getElementById('sDate').value != '') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('sDate').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   }"
                                                       size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                                            </td>
                                            <td align="right">
                                                <a style="cursor: pointer;" title="Click To View Udhaar By Udhaar Date"
                                                   onclick="sortUdhaarEMIList('<?php echo $documentRoot; ?>', 'STR_TO_DATE(udhadepo_EMI_start_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', 'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');">
                                                       <?php if ($sortKeywordValue == "STR_TO_DATE(udhadepo_EMI_start_DOB,'%d %M %Y')") { ?>
                                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right"  class="h7 border-right-bottom" width="80px">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tr>
                                            <td align="right" title="DD.MM.YY">
                                                <input id="dueDate" type="text" name="dueDate" placeholder="DD.MM.YY"
                                                       value="<?php
                                                       if ($searchColumnName == "DAY(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %Y\'),\'%y\')")
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'DUE DATE';
                                                       ?>" 
                                                       onclick="this.value = '';"
                                                       onblur="javascript:if (document.getElementById('dueDate').value != '') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('dueDate').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   } else {
                                                                       document.getElementById('dueDate').value = '<?php
                                                       if ($searchColumnName == "DAY(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %Y\'),\'%y\')")
                                                           echo $searchColumnValue;
                                                       else
                                                           echo 'DUE DATE';
                                                       ?>';
                                                                   }"
                                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                        
                                                       onkeyup="if (event.keyCode == 13 && document.getElementById('dueDate').value != '') {
                                                                       searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('dueDate').value, '<?php echo $selFirmId; ?>',
                                                                               'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');
                                                                   }"
                                                       size="6" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                                            </td>
                                            <td align="right">
                                                <a style="cursor: pointer;" title="Click To View Udhaar By Udhaar Date"
                                                   onclick="sortUdhaarEMIList('<?php echo $documentRoot; ?>', 'STR_TO_DATE(udhadepo_EMI_end_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', 'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');">
                                                       <?php if ($sortKeywordValue == "STR_TO_DATE(udhadepo_EMI_end_DOB,'%d %M %Y')") { ?>
                                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right" class="h7 border-right-bottom" width="50px">
                                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                                        <tr>
                                            <td align="right" title="STATUS">
                                                <SELECT class="lgn-txtfield-without-borderAndBackground13-Arial-right" id="uEMIStatus" name="uEMIStatus"
                                                        onchange="searchUdhaarEMIList('<?php echo $documentRoot; ?>', 'udhadepo_EMI_status', document.getElementById('uEMIStatus').value, '<?php echo $selFirmId; ?>',
                                                                'udhharListDiv', 'UdhaarEMIList', '<?php echo $timePeriod; ?>');">
                                                    <?php
                                                    $statusTyp = array(Due, Paid);
                                                    for ($j = 0; $j <= 1; $j++)
                                                        if ($statusTyp[$j] == $searchValue)
                                                            $optionStatusTypSel[$j] = 'selected';
                                                    ?>
                                                    <OPTION  VALUE="">STATUS</OPTION>
                                                    <OPTION  VALUE="Due" <?php echo $optionStatusTypSel[0]; ?>>DUE</OPTION>
                                                    <OPTION  VALUE="Paid" <?php echo $optionStatusTypSel[1]; ?>>PAID</OPTION>
                                                </SELECT>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right"  width="70px" class="h7 border-bottom">
                                    <div class="h7 spaceRight5">TYPE</div>
                                </td>
                            </tr>
                            <?php
                        }
                        while ($rowAllUdhaarDep = mysqli_fetch_array($resAllUdhaarDep, MYSQLI_ASSOC)) {

                            $udhaarDepId = $rowAllUdhaarDep['udhadepo_id'];
                            $udhaarId = $rowAllUdhaarDep['udhadepo_udhaar_id'];
                            $custId = $rowAllUdhaarDep['udhadepo_cust_id'];
                            $udhaarDepAmt = $rowAllUdhaarDep['udhadepo_amt'];
                            $uDepDOB = $rowAllUdhaarDep['udhadepo_DOB'];
                            $uDepJrnlId = $rowAllUdhaarDep['udhadepo_jrnl_id'];
                            $emiStartDate = $rowAllUdhaarDep['udhadepo_EMI_start_DOB'];
                            $dueDate = $rowAllUdhaarDep['udhadepo_EMI_end_DOB'];
                            $totalEMIAmt = $rowAllUdhaarDep['udhadepo_EMI_total_amt'];
                            $udEMIAmt = $rowAllUdhaarDep['udhadepo_EMI_amt'];
                            $intAmt = $rowAllUdhaarDep['udhadepo_EMI_int_amt'];
                            $emiStatus = $rowAllUdhaarDep['udhadepo_EMI_status'];

                            $qSelAllUdhaar = "SELECT udhaar_cust_fname,udhaar_cust_lname,udhaar_cust_city,udhaar_type FROM udhaar where udhaar_id='$udhaarId'";
                            $resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar);
                            $rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC);

                            $uCustName = $rowAllUdhaar['udhaar_cust_fname'] . ' ' . $rowAllUdhaarDep['udhaar_cust_lname'];
                            $uCustCity = $rowAllUdhaar['udhaar_cust_city'];
                            $udhaarType = $rowAllUdhaar['udhaar_type'];
                            ?>
                            <tr>
                                <td align="left" class="border-color-grey-rb" width="80px">
                                    <input type="submit" name="sNo" id="sNo" value="<?php echo $gCounter + 1; ?>" 
                                           onclick="getCustomerDetailsWithCustId('CustUdhaar', '<?php echo $custId; ?>', '<?php echo $firmId; ?>');"
                                           class="frm-btn-lnk-arial-Normal" readonly="true" title="Click Here To Select Udhaar Details!" /> 
                                    <input type="hidden" name="udhaarId<?php echo $gCounter; ?>" id="udhaarId<?php echo $gCounter; ?>" value="<?php echo $udhaarId; ?>"/>
                                </td>
                                <td align="right" class="border-color-grey-rb" width="120px">
                                    <div class="h5-no-pad spaceRight5"><?php echo formatInIndianStyle($udEMIAmt); ?></div>
                                </td>
                                <td align="right" class="border-color-grey-rb" width="94px">
                                    <div class="h5 spaceRight5"><?php echo formatInIndianStyle($intAmt); ?></div>
                                </td>
                                <td align="right" class="border-color-grey-rb" width="89px">
                                    <div class="h5 spaceRight5"><?php echo formatInIndianStyle($totalEMIAmt); ?></div>
                                </td>
                                <td align="left" class="border-color-grey-rb" title="<?php echo $fatherName; ?>" width="132px">
                                    <div class="h5 spaceLeft5"><?php echo substr($uCustName, 0, 20); ?></div>
                                </td>
                                <td align="center"  class="border-color-grey-rb" width="80px">
                                    <div class="h5">
                                        <?php
                                        if ($custMobNo != '' || $custMobNo != NULL)
                                            echo $custMobNo;
                                        else
                                            echo '-';
                                        ?>
                                    </div>
                                </td>
                                <td align="left" class="border-color-grey-rb" title="<?php echo $uCustCity; ?>" width="110px">
                                    <div class="h5 spaceLeft5"><?php echo substr($uCustCity, 0, 10); ?></div>
                                </td>
                                <td align="right" class="border-color-grey-rb" width="91px">
                                    <div class="h5 spaceRight5"><?php echo om_strtoupper(date('d  M  y', strtotime($emiStartDate))); ?></div>
                                </td>
                                <td align="right" class="border-color-grey-rb" width="91px">
                                    <div class="h5 spaceRight5"><?php echo om_strtoupper(date('d  M  y', strtotime($dueDate))); ?></div>
                                </td>
                                <td align="right" class="border-color-grey-rb" width="50px">
                                    <div class="h5 spaceRight5"><?php echo $emiStatus; ?></div>
                                </td>
                                <td align="right" class="border-color-grey-b" width="50px">
                                    <div class="h5 spaceRight5"><?php echo $udhaarType; ?></div>
                                </td>
                            </tr>
                            <?php
                            $gCounter++;
                        }
                        ?>
                    </table>
                    <div id="ajaxLoadNextAllDepUdhaarPanelList" style="visibility: hidden" align="right">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                    <?php
                    if ($totalUdhaarDep > 0) {
                        $noOfPagesAsLink = ceil($totalUdhaarDep / $rowsPerPage);
                        if ($pageNum > $noOfPagesAsLink || $pageNum < 0) {
                            echo "<h1> ~ This Page is not available. ~ </h1>";
                        } else {
                            ?>
                            <table cellpadding="2" cellspacing="2" border="0" align="right">
                                <tr>
                                    <td align="right">
                                        <?php if (($pageNum - 1) != '0') { ?>
                                            <input type="submit" id="prvPageButt" name="prvPageButt" value="PREV" class="pageNoButton"
                                                   onclick="javascript:pagingInUdhaarEMIPanel('<?php echo $pageNum - 1; ?>', 'UdhaarEMIList', '<?php echo $timePeriod; ?>', '<?php echo $rowsPerPage; ?>',
                                                                               '<?php echo $noOfPagesAsLink; ?>', '<?php echo $panel; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');" />
                                               <?php } ?>
                                    </td>
                                    <?php
                                    if ($pageNum == 1 || $pageNum < 10) {
                                        for ($i = 1; $i <= 10; $i++) {
                                            if (($noOfPagesAsLink >= $i) && ($noOfPagesAsLink != 1)) {
                                                ?>
                                                <td align="right">
                                                    <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" <?php if (($i == 1) && ($pageNum == 1)) { ?>class="currentPageNoButton" <?php } else { ?>class="pageNoButton" <?php } ?>
                                                           value="<?php echo $i ?>"
                                                           onclick="javascript:pagingInUdhaarEMIPanel(this.value, 'UdhaarEMIList', '<?php echo $timePeriod; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>',
                                                                                               '<?php echo $panel; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');"/>
                                                </td>
                                                <?php
                                            }
                                        }
                                    } else {
                                        for ($i = 1; $i <= 10; $i++) {
                                            ?>
                                            <td align="right">
                                                <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                                       onclick="javascript:pagingInUdhaarEMIPanel(this.value, 'UdhaarEMIList', '<?php echo $timePeriod; ?>', '<?php echo $rowsPerPage; ?>',
                                                                                       '<?php echo $noOfPagesAsLink; ?>', '<?php echo $panel; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');"/>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <td align="right">
                                        <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                                            <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                                                   onclick="javascript:pagingInUdhaarEMIPanel('<?php echo $pageNum + 1; ?>', 'UdhaarEMIList', '<?php echo $timePeriod; ?>',
                                                                               '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '<?php echo $panel; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');"
                                                   />
                                               <?php } ?>
                                    </td>

                                    <?php if ($noOfPagesAsLink > 1) { ?>
                                        <td align="right" class="paddingLeft15">
                                            <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGENO" class="pageNoButton" size="5"
                                                   onblur="if (this.value !== '') {
                                                                           javascript:pagingInUdhaarEMIPanel(this.value, 'UdhaarEMIList', '<?php echo $timePeriod; ?>', '<?php echo $rowsPerPage; ?>',
                                                                                   '<?php echo $noOfPagesAsLink; ?>', '<?php echo $panel; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');
                                                                       }"
                                                   onkeypress="if (event.keyCode == '13') {
                                                                           if (this.value !== '') {
                                                                               javascript:pagingInUdhaarEMIPanel(this.value, 'UdhaarEMIList', '<?php echo $timePeriod; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>',
                                                                                       '<?php echo $panel; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>');
                                                                           }
                                                                       }"
                                                   onclick="this.value = '';"/>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>-->