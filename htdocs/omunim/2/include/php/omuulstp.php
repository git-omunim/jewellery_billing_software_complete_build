<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: omuulstp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
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
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
require_once 'ommpincr.php';
include_once 'ommpfndv.php';
?>
<div id="udhharListDiv">
    <?php
    /*     * ******************************************************************************************* */
    /*                START CODE To Show Udhar Metal And Cash on Udhar Panel:Author:SANT25MAY17           */
    /*     * ******************************************************************************************* */
    $sortKeyword = NULL;
    $searchColumn = NULL;
    $searchValue = NULL;
    $searchKeyword = NULL;
    $columName = NULL;
    $searchColumnStr = NULL;

    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        $selFirmId = $_SESSION['setFirmSession'];
    }
    if (isset($_GET['searchKeyword'])) {
        $searchKeyword = $_GET['searchKeyword'];
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
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    if ($selFirmId != NULL) {
        $strFrmId = $selFirmId;
    } else {
        $resFirmCount = mysqli_query($conn, $qSelFirmCount);

        $strFrmId = '0';

        //Set String for Public Firms
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    }
    $updateRows = $_GET['updateRows'];
    if ($updateRows == 'updateRows') {
        $rowsPerPage = $_GET['rowsPerPage'];
        $ominValue = $rowsPerPage;
        $ominOption = 'indigvpnrw';
        include 'ommpindc.php';
    }
    $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indiudpnrw'";
    $resGNoOfRows = mysqli_query($conn, $qSelGNoOfRows);
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

    $searchColumnName = $searchColumn;
    $searchColumnValue = $searchValue;

    $sortKeyword = stripslashes($sortKeyword);
    $searchColumn = stripslashes($searchColumn);

    $sortKeywordValue = $sortKeyword;
    $sortKeywordValue = stripslashes($sortKeywordValue);

    $isAtrate = strpos($searchColumn, '@');

    if ($isAtrate == true) {
        $searchColumn = explode("@", $searchColumn);
        $searchColumn1 = $searchColumn[0];
        $searchColumn2 = $searchColumn[1];
        $searchColumn3 = $searchColumn[2];
        //Start Code to Get Pre and Post Girvi Serial Number
        if ($searchColumn1 == 'utin_pre_invoice_no') {
            $grvSerialNoStr = $searchValue;
            $grvSerialNoStrLen = strlen($searchValue);
            for ($count = 0; $count <= $grvSerialNoStrLen; $count++) {
                if (is_numeric($grvSerialNoStr)) {
                    break;
                }
                $grvSerialNoStr = substr($grvSerialNoStr, 1);
            }

            $grvPreSerialNo = substr($searchValue, 0, $count);
            $grvSerialNo = $grvSerialNoStr;
            $searchColumnStr = " and $searchColumn1 = '$grvPreSerialNo' and $searchColumn2 = '$grvSerialNo' ";
        }

        if ($searchColumn1 == "DAY(STR_TO_DATE(utin_date,'%d %M %y'))") {
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
            $dateStr = " order by STR_TO_DATE(utin_date,'%d %b %Y') asc ";
        }
    } else {
        if ($searchColumn != NULL)
            $searchColumnStr = " and $searchColumn LIKE '$searchValue%' ";
    }
    if ($searchColumn == 'utin_cash_balance') {

        $prinStartRange = stristr($searchValue, '-', TRUE);
        $endRange = stristr($searchValue, '-');
        $prinEndRange = substr($endRange, 1);
        if ($prinStartRange != '' && $prinEndRange != '') {
            $searchColumnStr = " and $searchColumn >= '$prinStartRange' and $searchColumn <= '$prinEndRange'";
        } else {
            $searchColumnStr = " and $searchColumn = '$searchValue' ";
        }
    }
    if ($sortKeyword != NULL) {
        $resTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' and utin_firm_id IN ($strFrmId)";
        $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' and utin_firm_id IN ($strFrmId) order by $sortKeyword asc, STR_TO_DATE(utin_date, '%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
    } else if ($searchColumnStr != NULL) {
        if ($dateStr != '' || $dateStr != NULL) {
            $selDateStr = $dateStr;
        } else {
            $selDateStr = " order by STR_TO_DATE(utin_date, '%d %b %Y') desc ";
        }
        $resTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' $searchColumnStr and utin_firm_id IN ($strFrmId)";
        $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' $searchColumnStr and utin_firm_id IN ($strFrmId) $selDateStr, utin_invoice_no desc LIMIT $perOffset, $rowsPerPage";
    } else {
        $resTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' and utin_firm_id IN ($strFrmId)";
        $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' and utin_firm_id IN ($strFrmId) order by STR_TO_DATE(utin_date, '%d %b %Y') desc, utin_invoice_no desc LIMIT $perOffset, $rowsPerPage";
    }

    $resTotalUdhaarCount = mysqli_query($conn, $resTotalUdhaarCount) or die(mysqli_error($conn));
    $totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);
    $resAllUdhaar = mysqli_query($conn, $qSelAllUdhaar) or die(mysqli_error($conn));
    $totalNextUdhaar = mysqli_num_rows($resAllUdhaar);
    ?>
    <div id="girviPanelTrId"></div>
    <div id="udhaarPanelTrId">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">

            <tr>
                <td colspan="3" align="left">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                        <?php
                        if ($totalUdhaar <= 0) {
                            echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ Udhaar List is empty. ~ </div></div>";
                        } else {
                            ?>
                            <tr class="om_header">
                                <td align = "left" class ="widthPX85">
                                    <div class = "border-right-bottom heightPX20">
                                        <table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
                                            <tr>
                                                <td align = "left">
                                                    <input id="sNo" type="text" name="sNo" placeholder="S.NO."
                                                           value = "<?php
                                                           if ($searchColumnName == 'utin_pre_invoice_no@utin_invoice_no')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'S.NO.';
                                                           ?>"
                                                           onclick = "javascript:this.value = '';"
                                                           onblur = "javascript:
                                                                           if (document.getElementById('sNo').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_pre_invoice_no@utin_invoice_no',
                                                                               document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');
                                                                   } else {
                                                                       document.getElementById('sNo').value = '<?php
                                                           if ($searchColumnValue == 'utin_pre_invoice_no@utin_invoice_no')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'S.NO';
                                                           ?>';
                                                                   }"
                                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('sNo').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_pre_invoice_no@utin_invoice_no',
                                                                               document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');
                                                                   }"
                                                           size = "3" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" />
                                                </td>
                                                <td align = "right">
                                                    <a style = "cursor: pointer;" title = "Click To View Udhaar By Serial Number"
                                                       onclick = "sortUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_pre_invoice_no asc,utin_invoice_no', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');">
                                                           <?php if ($sortKeyword == 'utin_pre_invoice_no asc,utin_invoice_no') {
                                                               ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td align="right" class="widthPX165">
                                    <div class = "border-right-bottom heightPX20">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="right">
                                                    <input id="udhaarAmt" type="text" name="udhaarAmt" placeholder="UDHAAR AMT."
                                                           value="<?php
                                                           if ($searchColumnName == 'utin_cash_balance')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'UDHAAR AMT.';
                                                           ?>" 
                                                           onclick="this.value = '';"
                                                           onblur="javascript:if (document.getElementById('udhaarAmt').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_cash_balance',
                                                                               document.getElementById('udhaarAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');
                                                                   } else {
                                                                       document.getElementById('udhaarAmt').value = '<?php
                                                           if ($searchColumnName == 'utin_cash_balance')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'UDHAAR AMT.';
                                                           ?>';
                                                                   }"
                                                           onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"       
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('udhaarAmt').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_cash_balance',
                                                                               document.getElementById('udhaarAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');
                                                                   }"
                                                           size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial" />
                                                </td>
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Principal Amount"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_cash_balance', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');">
                                                           <?php if ($sortKeyword == 'utin_cash_balance') { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td align="left" class="widthPX186">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">AMOUNT LEFT</div>
                                    </div>
                                </td>
                                <td align="left" class="widthPX186">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">GD METAL</div>
                                    </div>
                                </td>
                                <td align="left" class="widthPX186">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">SL METAL</div>
                                    </div>
                                </td>
                                <td align="left" class="widthPX186">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">NAME</div>
                                    </div>
                                </td>

                                <td align="left" class="widthPX90">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">MOB.</div>
                                    </div>
                                </td>
                                <td align="left" class="widthPX90">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">CITY</div>
                                    </div>
                                </td>
                                <td align="left" class="widthPX183">
                                    <div class = "border-right-bottom heightPX20">
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td align="left">
                                                    <input id="udhaarType" type="text" name="udhaarType" placeholder="UDHAAR TYPE"
                                                           value="<?php
                                                           if ($searchColumnName == 'utin_type')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'UDHAAR TYPE';
                                                           ?>" 
                                                           onclick="this.value = '';"
                                                           onblur="javascript:if (document.getElementById('udhaarType').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_type',
                                                                               document.getElementById('udhaarType').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');
                                                                   } else {
                                                                       document.getElementById('udhaarType').value = '<?php
                                                           if ($searchColumnName == 'utin_type')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'UDHAAR TYPE';
                                                           ?>';
                                                                   }"
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('udhaarType').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_type', document.getElementById('udhaarType').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');
                                                                   }"
                                                           size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                                </td>
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Customer City"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_type', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', 'otherList');">
                                                           <?php if ($sortKeyword == 'utin_type') { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td align="left" class="widthPX90">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft2">USER TYPE</div>
                                    </div>
                                </td>
                                <td align="right" class="widthPX86">
                                    <div class = "border-right-bottom heightPX20">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="right">
                                                    <input id="Date" type="text" name="Date" placeholder="DD.MM.YY" 
                                                           value="<?php
                                                           if ($searchColumnName == "DAY(STR_TO_DATE(utin_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_date,\'%d %M %Y\'),\'%y\')")
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'DATE';
                                                           ?>" 
                                                           onclick="this.value = '';"
                                                           onblur="javascript:if (document.getElementById('Date').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(utin_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_date,\'%d %M %Y\'),\'%y\')', document.getElementById('Date').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');
                                                                   } else {
                                                                       document.getElementById('Date').value = '<?php
                                                           if ($searchColumnName == "DAY(STR_TO_DATE(utin_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_date,\'%d %M %Y\'),\'%y\')")
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'DATE';
                                                           ?>';
                                                                   }"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"                          
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('Date').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(utin_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_date,\'%d %M %Y\'),\'%y\')', document.getElementById('Date').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList');
                                                                   }"
                                                           size="7" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                                </td>
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Udhaar Date"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(utin_date,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', 'otherList')">
                                                           <?php if ($sortKeywordValue == "STR_TO_DATE(utin_date,'%d %M %Y')") { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>

                                <td align="left" class="widthPX90">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft2">SIGN</div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        $totalSumUdhaar = 0;
                        $totalSumLeftUdhaar = 0;
                        $goldTotDueWt = 0;
                        $goldTotDueWtType = 'GM';
                        $silverTotDueWt = 0;
                        $silverTotDueWtType = 'GM';
                        while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {

                            $udhaarId = $rowAllUdhaar['utin_id'];
                            $udhaarPreSerialNo = $rowAllUdhaar['utin_pre_invoice_no'];
                            $udhaarSerialNo = $rowAllUdhaar['utin_invoice_no'];
                            $custId = $rowAllUdhaar['utin_user_id'];
                            $firmId = $rowAllUdhaar['utin_firm_id'];
                            $udhaarAmt = $rowAllUdhaar['utin_cash_balance'];
                            $cashPaidCheck = $rowAllUdhaar['utin_amt_pay_chk'];

                            if ($cashPaidCheck == 'checked') {
                                $udhaarAmt = 0;
                            }

                            $udhaarType = $rowAllUdhaar['utin_type'];
                            $uDOB = $rowAllUdhaar['utin_date'];
                            $udhaarPreSerialNum = $rowAllUdhaar['utin_pre_invoice_no'];
                            $udhaarSerialNum = $rowAllUdhaar['utin_invoice_no'];
                            $udhaarGoldMetal = $rowAllUdhaar['utin_gd_due_wt'];
                            $udhaarGoldMetalType = $rowAllUdhaar['utin_gd_due_wt_typ'];
                            $goldPaidCheck = $rowAllUdhaar['utin_gd_pay_chk'];

                            if ($goldPaidCheck == 'checked') {
                                $udhaarGoldMetal = 0;
                                $udhaarGoldMetalType = 'GM';
                            }


                            $udhaarSilverMetal = $rowAllUdhaar['utin_sl_due_wt'];
                            $udhaarSilverMetalType = $rowAllUdhaar['utin_sl_due_wt_typ'];
                            $silverPaidCheck = $rowAllUdhaar['utin_sl_pay_chk'];

                            if ($silverPaidCheck == 'checked') {
                                $udhaarSilverMetal = 0;
                                $udhaarSilverMetalType = 'GM';
                            }

                            $goldTotDueWt += getTotalWeight($udhaarGoldMetal, $udhaarGoldMetalType, 'weight');
                            $goldTotDueWtType = 'GM';
                            $silverTotDueWt += getTotalWeight($udhaarSilverMetal, $udhaarSilverMetalType, 'weight');
                            $silverTotDueWtType = 'GM';

                            $selFatherName = "SELECT user_city,user_fname,user_lname,user_type,user_mobile FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                            $resFatherName = mysqli_query($conn, $selFatherName);
                            $rowFatherName = mysqli_fetch_array($resFatherName, MYSQLI_ASSOC);
                            $uCustName = $rowFatherName['user_fname'] . ' ' . $rowFatherName['user_lname'];
                            $uCustCity = $rowFatherName['user_city'];
                            $userType = $rowFatherName['user_type'];
                            $uCustMobile = $rowFatherName['user_mobile'];
                            if ($udhaarAmt > 0 || ($udhaarGoldMetal != '' && $udhaarGoldMetal != 0) || ($udhaarSilverMetal != '' && $udhaarSilverMetal != 0)) {
                                $qSelAllUdhaarDepMon = "SELECT SUM(udhadepo_amt) as total_udhaar_dep FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_upd_sts!='EMI' and udhadepo_cust_id='$custId' and udhadepo_udhaar_id='$udhaarId' and (udhadepo_EMI_status  IN ('Paid') or udhadepo_EMI_status IS NULL)";
                                $resAllUdhaarDepMon = mysqli_query($conn, $qSelAllUdhaarDepMon) or die('Error: ' . mysqli_error($conn));
                                $rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC);

                                $udhaarAmtLeft = $udhaarAmt - $rowUdhaarDepMon['total_udhaar_dep'];
                                $totalSumUdhaar += $udhaarAmt;
                                $totalSumLeftUdhaar += $udhaarAmtLeft;
                                ?>
                                <tr>
                                    <td align="left" class="h5 border-color-grey-rb bold">
                                        <input type="submit" name="sNo" id="sNo" value="<?php echo $udhaarPreSerialNo . '' . $udhaarSerialNo; ?>" 
                                        <?php if ($udhaarGoldMetal == 0 && $udhaarSilverMetal == 0) { ?>
                                                   onclick="getCustomerDetailsWithCustId('CustUdhaar', '<?php echo $custId; ?>', '<?php echo $firmId; ?>');"
                                               <?php } else { ?>
                                                   onclick="getUdharCustomerDetails('CustHome', '<?php echo $custId; ?>');"
                                               <?php } ?>
                                               class="frm-btn-without-border" readonly="true" title="Click Here To Select Udhaar Details!" /> 
                                        <input type="hidden" name="udhaarId<?php echo $gCounter; ?>" id="udhaarId<?php echo $gCounter; ?>" value="<?php echo $udhaarId; ?>"/>
                                    </td>
                                    <td align="right" class="h5 border-color-grey-rb">
                                        <div class="fs_13 paddingRight5">
                                            <?php echo formatInIndianStyle($udhaarAmt); ?>
                                        </div>
                                    </td>
                                    <td align="right" class="h5 border-color-grey-rb">
                                        <div class="fs_13 red paddingRight5"> <?php echo formatInIndianStyle($udhaarAmtLeft); ?>   </div>
                                    </td>
                                    <td align="right" class="h5 border-color-grey-rb">
                                        <div class="fs_13 red paddingRight5"> <?php echo $udhaarGoldMetal . ' ' . $udhaarGoldMetalType; ?>   </div>
                                    </td>
                                    <td align="right" class="h5 border-color-grey-rb">
                                        <div class="fs_13 red paddingRight5"> <?php echo $udhaarSilverMetal . ' ' . $udhaarSilverMetalType; ?>   </div>
                                    </td>
                                    <td align="left" title="<?php echo $uCustName; ?>" class="h5 border-color-grey-rb bold">
                                        <h5 class="paddingLeft5"><?php echo substr($uCustName, 0, 34); ?></h5>
                                    </td>
                                    <td align="center" title="<?php echo $uCustMobile; ?>" class="h5 border-color-grey-rb bold">
                                        <h5><?php echo om_strtoupper(substr($uCustMobile, 0, 12)); ?></h5>
                                    </td>
                                    <td align="left" title="<?php echo $uCustCity; ?>" class="h5 border-color-grey-rb bold">
                                        <h5 class="paddingLeft5"><?php echo substr($uCustCity, 0, 23); ?></h5>
                                    </td>
                                    <td align="left" class="h5 border-color-grey-rb bold">
                                        <h5 class="paddingLeft5"><?php echo $udhaarType; ?></h5>
                                    </td>
                                    <td align="left" class="h5 border-color-grey-rb bold">
                                        <h5 class="paddingLeft5"><?php echo $userType; ?></h5>
                                    </td>
                                    <td align="left" class="h5 border-color-grey-rb bold">
                                        <h5 class="paddingLeft5"><?php echo date('d  M  y', strtotime($uDOB)); ?></h5>
                                    </td>
                                    <td align="left" class="h5 border-color-grey-rb bold">
                                        <?php
                                        $Custoquery = "SELECT * from user where user_id='$custId'";
                                        $resCustDetails = mysqli_query($conn, $Custoquery);
                                        $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
                                        $custmorSignName = $rowCustDetails['user_sign_snap_fname'];
                                        if ($custmorSignName != '') {
                                            ?>

                                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omccsnim.php?cust_id=<?php echo "$custId"; ?>" 
                                                 width="50px" height="24px" border="0" alt = "image" />
                                             <?php } ?>

                                    </td>
                                </tr>
                                <?php
                                $gCounter++;
                            }
                        }
                        if ($goldTotDueWt >= 1000) {
                            $goldTotDueWt = convertWeight($goldTotDueWt);
                            $goldTotDueWtType = 'KG';
                        }
                        if ($silverTotDueWt >= 1000) {
                            $silverTotDueWt = convertWeight($silverTotDueWt);
                            $silverTotDueWtType = 'KG';
                        }
                        if ($totalUdhaar > 0) {
                            ?>
                            <tr class="om_header">
                                <td align="center" class="h5 border-color-grey-rb heightPX15 bold">
                                    <div class="h7">TOTAL</div>
                                </td>
                                <td align="right"  class="h5 border-color-grey-rb heightPX15 bold">
                                    <div class="h7 paddingRight5"><?php echo $totalSumUdhaar; ?></div>
                                </td>
                                <td align="right" class="h5 border-color-grey-rb heightPX15 bold">
                                    <div class="h7 paddingRight5"><?php echo $totalSumLeftUdhaar; ?></div>
                                </td>
                                <td align="right" class="h5 border-color-grey-rb heightPX15 bold">
                                    <div class="h7 paddingRight5"><?php echo number_format($goldTotDueWt, 3) . ' ' . $goldTotDueWtType; ?></div>
                                </td>
                                <td align="right" class="h5 border-color-grey-rb heightPX15 bold">
                                    <div class="h7 paddingRight5"><?php echo number_format($silverTotDueWt, 3) . ' ' . $silverTotDueWtType; ?></div>
                                </td>
                                <td colspan="6" class="h5 border-color-grey-b heightPX15 bold">
                                    &nbsp;
                                </td>
                                <!--                                start code @AUTH:ATHU14/1/15-->
                                <td colspan="6" class="h5 border-color-grey-b heightPX15 bold">
                                    &nbsp;
                                </td>
                                <!--                                END CODE-->
                            </tr>
                        <?php } ?>
                    </table>
                    <?php
                    if ($totalUdhaar > 0) {
                        $noOfPagesAsLink = ceil($totalUdhaar / $rowsPerPage);
                        if ($pageNum > $noOfPagesAsLink || $pageNum < 0) {
                            echo "<h1> ~ This Page is not available. ~ </h1>";
                        } else {
                            ?>
                            <table cellpadding="2" cellspacing="2" border="0" align="right">
                                <tr>
                                    <td align="right">
                                        <?php if (($pageNum - 1) != '0') { ?>
                                            <input type="submit" id="prvPageButt" name="prvPageButt" value="PREV" class="pageNoButton"
                                                   onclick="javascript:pagingInUdhaarPanel('<?php echo $pageNum - 1; ?>', 'UdhaarList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');" />
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
                                                           onclick="javascript:pagingInUdhaarPanel(this.value, 'UdhaarList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"/>
                                                </td>
                                                <?php
                                            }
                                        }
                                    } else {
                                        for ($i = 1; $i <= 10; $i++) {
                                            ?>
                                            <td align="right">
                                                <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                                       onclick="javascript:pagingInUdhaarPanel(this.value, 'UdhaarList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"/>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <td align="right">
                                        <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                                            <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                                                   onclick="javascript:pagingInUdhaarPanel('<?php echo $pageNum + 1; ?>', 'UdhaarList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"
                                                   />
                                               <?php } ?>
                                    </td>

                                    <?php if ($noOfPagesAsLink > 1) { ?>
                                        <td align="right" class="paddingLeft15">
                                            <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGENO" class="pageNoButton" size="5"
                                                   onblur="if (this.value !== '') {
                                                               javascript:pagingInUdhaarPanel(this.value, 'UdhaarList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');
                                                           }"
                                                   onkeypress="if (event.keyCode == '13') {
                                                               if (this.value !== '') {
                                                                   javascript:pagingInUdhaarPanel(this.value, 'UdhaarList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');
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
                    /*                     * ******************************************************************************************* */
                    /*                END CODE To Show Udhar Metal And Cash on Udhar Panel:Author:SANT25MAY17           */
                    /*                     * ******************************************************************************************* */
                    ?>
                </td>
            </tr>
        </table>
    </div>