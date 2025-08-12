<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: omuuexll.php
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
?>
<!--------------Start code to change file to add list header search and sort options @Author:SHRI26FEB15.------>
<!--------------Start code to change file to add list header search and sort options @Author:SHRI25FEB15.------>
<div id="udhharListDiv">
    <?php
    //$selFirmId = NULL;
    $sortKeyword = NULL;
    $searchColumn = NULL;
    $searchValue = NULL;
    $searchKeyword = NULL;
    $columName = NULL;
    $searchColumnStr = NULL;
    $todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
    $todayDate = strtotime($todayDate);

    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm @AUTHOR: SANDY10JUL13
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

    //Start Code To Select Firm Id 
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
    $updateRows = $_GET['updateRows'];
    if ($updateRows == 'updateRows') {
        $rowsPerPage = $_GET['rowsPerPage'];
        $ominValue = $rowsPerPage;
        $ominOption = 'indigvpnrw';
        include 'ommpindc.php';
    }
    $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indiudpnrw'";
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
        //End Code to Get Pre and Post Girvi Serial Number
    } else {
        if ($searchColumn != NULL)
            $searchColumnStr = " and $searchColumn LIKE '$searchValue%' ";
    }
    //start to code for searching due date@AUTH:ATHU18/01/17
    if ($searchColumn1 == "DAY(STR_TO_DATE(utin_due_date,'%d %M %y'))") {
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
            $dateStr = " order by STR_TO_DATE(utin_due_date,'%d %b %Y') asc ";
        }
    //End CODE
    if ($searchColumn == 'utin_total_amt') {

        $prinStartRange = stristr($searchValue, '-', TRUE);
        $endRange = stristr($searchValue, '-');
        $prinEndRange = substr($endRange, 1);
        if ($prinStartRange != '' && $prinEndRange != '') {
            $searchColumnStr = " and $searchColumn >= '$prinStartRange' and $searchColumn <= '$prinEndRange'";
        } else {
            $searchColumnStr = " and $searchColumn = '$searchValue' ";
        }
    }
    /*****************Start code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-21JUN17************************/
    if ($sortKeyword != NULL) {
        $resTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' and utin_status IN ('New', 'Updated') and UNIX_TIMESTAMP(STR_TO_DATE(utin_due_date,'%d %b %Y'))<='$todayDate' and utin_firm_id IN ($strFrmId)";
        $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' and utin_status IN ('New', 'Updated') and UNIX_TIMESTAMP(STR_TO_DATE(utin_due_date,'%d %b %Y'))<='$todayDate' and utin_firm_id IN ($strFrmId) order by $sortKeyword asc, STR_TO_DATE(utin_date, '%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
    } else if ($searchColumnStr != NULL) {
        if ($dateStr != '' || $dateStr != NULL) {
            $selDateStr = $dateStr;
        } else {
            $selDateStr = " order by STR_TO_DATE(utin_date, '%d %b %Y') desc ";
            $selDateStr = " order by STR_TO_DATE(utin_due_date, '%d %b %Y') desc ";
        }
        $resTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' $searchColumnStr and utin_status IN ('New', 'Updated') and UNIX_TIMESTAMP(STR_TO_DATE(utin_due_date,'%d %b %Y'))<='$todayDate' and utin_firm_id IN ($strFrmId)";
        //$qSelAllGirvi = "SELECT * FROM udhaar where udhaar_own_id = '$_SESSION[sessionOwnerId]' $searchColumnStr and udhaar_upd_sts IN ('New', 'Updated') and udhaar_firm_id IN ($strFrmId) order by STR_TO_DATE(udhaar_DOB, '%d %b %Y') desc, udhaar_serial_num desc LIMIT $perOffset, $rowsPerPage";
        $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' $searchColumnStr and utin_status IN ('New', 'Updated') and UNIX_TIMESTAMP(STR_TO_DATE(utin_due_date,'%d %b %Y'))<='$todayDate' and utin_firm_id IN ($strFrmId) $selDateStr, utin_invoice_no desc LIMIT $perOffset, $rowsPerPage";
    } else {
        $resTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' and utin_status IN ('New', 'Updated') and UNIX_TIMESTAMP(STR_TO_DATE(utin_due_date,'%d %b %Y'))<='$todayDate' and utin_firm_id IN ($strFrmId)";
        $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id = '$_SESSION[sessionOwnerId]' and utin_status IN ('New', 'Updated') and UNIX_TIMESTAMP(STR_TO_DATE(utin_due_date,'%d %b %Y'))<='$todayDate' and utin_firm_id IN ($strFrmId) order by STR_TO_DATE(utin_date, '%d %b %Y') desc, utin_invoice_no desc LIMIT $perOffset, $rowsPerPage";
    }
    /*****************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-21JUN17************************/
    $resTotalUdhaarCount = mysqli_query($conn,$resTotalUdhaarCount) or die(mysqli_error($conn));
    $totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);
    $resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar) or die(mysqli_error($conn));
    $totalNextUdhaar = mysqli_num_rows($resAllUdhaar);

    ?>
    <div id="girviPanelTrId"></div><!-----Add div for print function @AUTHOR: SANDY13DEC13--->
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
<!--                        Start code to add panel Name Expired Cust List@AUTH:ATHU17JAN17-->
                            <tr class="om_header">
                                <td align = "left" class ="widthPX85"><!--Change in class @AUTHOR: SANDY29DEC13--->
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
                                                                               document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
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
                                                                               document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   }"
                                                           size = "3" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" />
                                                </td>
                                                <td align = "right">
                                                    <a style = "cursor: pointer;" title = "Click To View Udhaar By Serial Number"
                                                       onclick = "sortUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_pre_invoice_no asc,utin_invoice_no', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');">
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
                                                           if ($searchColumnName == 'utin_total_amt')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'UDHAAR AMT.';
                                                           ?>" 
                                                           onclick="this.value = '';"
                                                           onblur="javascript:if (document.getElementById('udhaarAmt').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_total_amt',
                                                                               document.getElementById('udhaarAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   } else {
                                                                       document.getElementById('udhaarAmt').value = '<?php
                                                           if ($searchColumnName == 'utin_total_amt')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'UDHAAR AMT.';
                                                           ?>';
                                                                   }"
                                                           onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"       
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('udhaarAmt').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_total_amt',
                                                                               document.getElementById('udhaarAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   }"
                                                           size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial" />
                                                </td>
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Principal Amount"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_total_amt', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');">
                                                           <?php if ($sortKeyword == 'utin_total_amt') { ?>
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
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td align="left">
                                                    <input id="name" type="text" name="name" placeholder="CUSTOMER NAME" 
                                                           value="<?php
                                                           if ($searchColumnName == 'udhaar_cust_fname@udhaar_cust_lname')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'CUSTOMER NAME';
                                                           ?>"
                                                           onclick="this.value = '';"
                                                           onblur="javascript:if (document.getElementById('name').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'udhaar_cust_fname@udhaar_cust_lname',
                                                                               document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   } else {
                                                                       document.getElementById('name').value = '<?php
                                                           if ($searchColumnName == 'udhaar_cust_fname@udhaar_cust_lname')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'CUSTOMER NAME';
                                                           ?>';
                                                                   }"
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('name').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'udhaar_cust_fname@udhaar_cust_lname',
                                                                               document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   }"
                                                           size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                                </td>
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Customer Name"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'udhaar_cust_fname ', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>','ExpiredCustList');">
                                                           <?php if ($sortKeyword == 'udhaar_cust_fname ') { ?>
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
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft2">MOB NO</div>
                                    </div>
                                </td>
                                <td align="left" class="widthPX183">
                                    <div class = "border-right-bottom heightPX20">
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td align="left">
                                                    <input id="city" type="text" name="city" placeholder="CITY"
                                                           value="<?php
                                                           if ($searchColumnName == 'udhaar_cust_city')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'CITY';
                                                           ?>" 
                                                           onclick="this.value = '';"
                                                           onblur="javascript:if (document.getElementById('city').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'udhaar_cust_city',
                                                                               document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   } else {
                                                                       document.getElementById('city').value = '<?php
                                                           if ($searchColumnName == 'udhaar_cust_city')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'CITY';
                                                           ?>';
                                                                   }"
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('city').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'udhaar_cust_city', document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   }"
                                                           size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                                </td>
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Customer City"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'udhaar_cust_city', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>','ExpiredCustList');">
                                                           <?php if ($sortKeyword == 'udhaar_cust_city') { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
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
                                                                               document.getElementById('udhaarType').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   } else {
                                                                       document.getElementById('udhaarType').value = '<?php
                                                           if ($searchColumnName == 'utin_type')
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'UDHAAR TYPE';
                                                           ?>';
                                                                   }"
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('udhaarType').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_type', document.getElementById('udhaarType').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   }"
                                                           size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                                </td>
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Customer City"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'utin_type', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>','ExpiredCustList');">
                                                           <?php if ($sortKeyword == 'utin_type') { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
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
                                                               echo 'S.DATE';
                                                           ?>" 
                                                           onclick="this.value = '';"
                                                           onblur="javascript:if (document.getElementById('Date').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(utin_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_date,\'%d %M %Y\'),\'%y\')', document.getElementById('Date').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   } else {
                                                                       document.getElementById('Date').value = '<?php
                                                           if ($searchColumnName == "DAY(STR_TO_DATE(utin_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_date,\'%d %M %Y\'),\'%y\')")
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'S.DATE';
                                                           ?>';
                                                                   }"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"                          
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('Date').value != '') {
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(utin_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_date,\'%d %M %Y\'),\'%y\')', document.getElementById('Date').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   }"
                                                           size="7" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                                </td>
                                               
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Udhaar Date"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(utin_date,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList')">
                                                           <?php if ($sortKeywordValue == "STR_TO_DATE(utin_date,'%d %M %Y')") { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td align="right" class="widthPX86">
                                    <div class = "border-right-bottom heightPX20">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                
                                                <td align="right">
                                                    <input id="dueDate" type="text" name="dueDate" placeholder="DD.MM.YY" 
                                                           value="<?php
                                                           if ($searchColumnName == "DAY(STR_TO_DATE(utin_due_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_due_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_due_date,\'%d %M %Y\'),\'%y\')")
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'E.DATE';
                                                           ?>" 
                                                           onclick="this.value = '';"
                                                           onblur="javascript:if (document.getElementById('dueDate').value != '') {
                   

                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(utin_due_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_due_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_due_date,\'%d %M %Y\'),\'%y\')', document.getElementById('dueDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   } else {
                                                                       document.getElementById('dueDate').value = '<?php
                                                           if ($searchColumnName == "DAY(STR_TO_DATE(utin_due_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_due_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_due_date,\'%d %M %Y\'),\'%y\')")
                                                               echo $searchColumnValue;
                                                           else
                                                               echo 'E.DATE';
                                                           ?>';
                                                                   }"
                                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"                          
                                                           onkeyup="if (event.keyCode == 13 && document.getElementById('dueDate').value != '') {
                                                                          
                                                                       searchUdhaarPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(utin_due_date,\'%d %M %y\'))@MONTH(STR_TO_DATE(utin_due_date,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(utin_due_date,\'%d %M %Y\'),\'%y\')', document.getElementById('dueDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList');
                                                                   }"
                                                           size="7" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                                                </td>
                                                <td align="right">
                                                    <a style="cursor: pointer;" title="Click To View Udhaar By Udhaar Date"
                                                       onclick="sortUdhaarPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(utin_due_date,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','ExpiredCustList')">
                                                           <?php if ($sortKeywordValue == "STR_TO_DATE(utin_due_date,'%d %M %Y')") { ?>
                                                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
<!--                                start code to add customer sign @Auth:ATHU14/1/17 also changed spaceLeft2 -->
                                <td align="left" class="widthPX86">
                                    <div class = "border-right-bottom heightPX20">
                                        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft2">CUST SIGN</div>
                                    </div>
                                </td>
<!--                                End Code-->
                                <td align="center" class="widthPX86"> <div class = "border-bottom heightPX20" style="font-weight: bold;color: rgb(128, 0, 0);">DEL</div></td>
                            </tr>
                            <?php
                        }
                        $totalSumUdhaar = 0;
                        $totalSumLeftUdhaar = 0;
                        while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {
                            /*****************Start code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-21JUN17************************/
                            $udhaarId = $rowAllUdhaar['utin_id'];
                            $udhaarPreSerialNo = $rowAllUdhaar['utin_pre_invoice_no'];
                            $udhaarSerialNo = $rowAllUdhaar['utin_invoice_no'];
                            $custId = $rowAllUdhaar['utin_user_id'];
                            $firmId = $rowAllUdhaar['utin_firm_id'];
                            $udhaarAmt = $rowAllUdhaar['utin_total_amt'];
                            $udhaarType = $rowAllUdhaar['utin_type'];
                            $uDOB = $rowAllUdhaar['utin_date'];
                            $dueDOB = $rowAllUdhaar['utin_due_date'];
                            $udhaarPreSerialNum = $rowAllUdhaar['utin_pre_invoice_no'];
                            /*****************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-21JUN17************************/
                            $udhaarSerialNum = $rowAllUdhaar['utin_invoice_no'];
                            //****************************Start to GET CUSTOMER NAMES FROM CUSTOMER TABLE @AUTHOR: SANT12JAN16*****************************************************************************************
                            $selFatherName = "SELECT user_city,user_fname,user_lname,user_mobile FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                            $resFatherName = mysqli_query($conn,$selFatherName);
                            $rowFatherName = mysqli_fetch_array($resFatherName, MYSQLI_ASSOC);
                            $uCustName = $rowFatherName['user_fname'] . ' ' . $rowFatherName['user_lname'];
                            $uCustCity = $rowFatherName['user_city'];
                            $uCustMobile = $rowFatherName['user_mobile']; /////changed for display mobile no @AUTH:ATHU17Jan17
                            //****************************Start to GET CUSTOMER NAMES FROM CUSTOMER TABLE @AUTHOR: SANT12JAN16*****************************************************************************************
                            // Start code for to display to add amount11 left into List @AUTHOR:LINA11JUN13
                            //
                            /*****************START code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-28JUN17************************/
                            $qSelAllUdhaarDepMon = "SELECT SUM(utin_cash_amt_rec + utin_pay_cheque_amt + (utin_pay_card_amt + utin_pay_trans_chrg) + (utin_online_pay_amt - utin_pay_comm_paid) + utin_discount_amt) as total_udhaar_dep FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_status!='EMI' and utin_type = 'udhaar' and  utin_transaction_type = 'UDHAAR DEPOSIT' and utin_user_id='$custId' and utin_utin_id='$udhaarId' and (utin_EMI_status  IN ('Paid') or utin_EMI_status IS NULL)"; //change code to add sum of int amnt and NULL condition added @Author:SHRI29MAY15
                            $resAllUdhaarDepMon = mysqli_query($conn,$qSelAllUdhaarDepMon) or die('Error: ' . mysqli_error($conn));
                            $rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC);
                            //
                            $udhaarAmtLeft = $udhaarAmt - $rowUdhaarDepMon['total_udhaar_dep'];
                            $totalSumUdhaar += $udhaarAmt;
                            $totalSumLeftUdhaar += $udhaarAmtLeft;
                            /*****************END code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-28JUN17************************/
                            //
                            // End code for to display to add amount11 left into List @AUTHOR:LINA11JUN13
                            ?>
                            <tr>
                                <!------Start code to change code @Author:PRIYA04APR15-------------------->
                                <td align="left" class="h5 border-color-grey-rb bold">
                                    <input type="submit" name="sNo" id="sNo" value="<?php echo $udhaarPreSerialNo . '' . $udhaarSerialNo; ?>" 
                                           onclick="getCustomerDetailsWithCustId('CustUdhaar', '<?php echo $custId; ?>', '<?php echo $firmId; ?>');"
                                           class="frm-btn-without-border" readonly="true" title="Click Here To Select Udhaar Details!" /> 
                                    <input type="hidden" name="udhaarId<?php echo $gCounter; ?>" id="udhaarId<?php echo $gCounter; ?>" value="<?php echo $udhaarId; ?>"/>
                                </td>
                                <td align="right" class="h5 border-color-grey-rb">
                                    <div class="fs_13 paddingRight5"><?php echo formatInIndianStyle($udhaarAmt); ?></div>
                                </td>
                                <!-- start code for to display to add amount left into List @AUTHOR:LINA11JUN13  -->
                                <td align="right" class="h5 border-color-grey-rb">
                                    <div class="fs_13 red paddingRight5"> <?php echo formatInIndianStyle($udhaarAmtLeft); ?>   </div>
                                </td>
                                <!-- start code for to display to add amount left into List @AUTHOR:LINA11JUN13  -->
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
                                    <h5 class="paddingLeft5"><?php echo date('d  M  y', strtotime($uDOB)); ?></h5>
                                </td>
                                <td align="left" class="h5 border-color-grey-rb bold">
                                    <h5 class="paddingLeft5"><?php echo date('d  M  y', strtotime($dueDOB)); ?></h5>
                                </td>
<!--                                start code to add customer sign @AUTH:ATHU14/1/17-->
                                 <td align="left" class="h5 border-color-grey-rb bold">
                                  <?php
                                  
                                  $Custoquery = "SELECT * from user where user_id='$custId'";
                                  $resCustDetails = mysqli_query($conn,$Custoquery);
                                  $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
                                  $custmorSignName = $rowCustDetails['user_sign_snap_fname'];
                                      if ($custmorSignName != '') {
                                          ?>
                
                 <img src="<?php echo $documentRootBSlash; ?>/include/php/omccsnim.php?cust_id=<?php echo "$custId"; ?>" 
                             width="50px" height="24px" border="0" alt = "image" />
           <?php } ?>
                               
                                   </td>
<!--                                   END CODE-->
                                <td align="center" class="h5 border-color-grey-b">
                                    <a style="cursor: pointer;"  class="noPrint border-color-grey-b" onclick="deleteCustUdhaarDetailsFromUdhaarPanel(<?php echo $custId; ?>, <?php echo $udhaarId; ?>,
                                                    'DeleteFromUdhaarPanel', '<?php echo $pageNum; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>', '<?php echo $uDOB; ?>', '<?php echo $udhaarAmt; ?>');">
                                        <div id="udhaarDeleteFromUdhaarPanelButt<?php echo "$udhaarId"; ?>"><!----Class to not print while printing @AUTHOR: SANDY10DEC13--->
                                            <?php include 'omzaajcl.php'; ?>
                                        </div>
                                    </a>
                                </td>
                                <!------End code to change code @Author:PRIYA04APR15-------------------->
                            </tr>
                            <?php
                            $gCounter++;
                        }
                        if ($totalUdhaar > 0) {
                            ?>
                            <tr class="om_header">
                                <td align="center" class="h5 border-color-grey-rb heightPX15 bold">
                                    <div class="h7">TOTAL</div>
                                </td>
                                <td align="right"  class="h5 border-color-grey-rb heightPX15 bold">
                                    <div class="h7"><?php echo $totalSumUdhaar; ?></div>
                                </td>
                                <td align="right" class="h5 border-color-grey-rb heightPX15 bold">
                                    <div class="h7"><?php echo $totalSumLeftUdhaar; ?></div>
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
                                                   onclick="javascript:pagingInUdhaarPanel('<?php echo $pageNum - 1; ?>', 'ExpiredCustList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');" />
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
                                                           onclick="javascript:pagingInUdhaarPanel(this.value, 'ExpiredCustList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"/>
                                                </td>
                                                <?php
                                            }
                                        }
                                    } else {
                                        for ($i = 1; $i <= 10; $i++) {
                                            ?>
                                            <td align="right">
                                                <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                                       onclick="javascript:pagingInUdhaarPanel(this.value, 'ExpiredCustList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"/>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <td align="right">
                                        <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                                            <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                                                   onclick="javascript:pagingInUdhaarPanel('<?php echo $pageNum + 1; ?>', 'ExpiredCustList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"
                                                   />
                                               <?php } ?>
                                    </td>

                                    <?php if ($noOfPagesAsLink > 1) { ?>
                                        <td align="right" class="paddingLeft15">
                                            <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGENO" class="pageNoButton" size="5"
                                                   onblur="if (this.value !== '') {
                                                               javascript:pagingInUdhaarPanel(this.value, 'ExpiredCustList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');
                                                           }"
                                                   onkeypress="if (event.keyCode == '13') {
                                                               if (this.value !== '') {
                                                                   javascript:pagingInUdhaarPanel(this.value, 'ExpiredCustList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');
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
    <!--------------End code to change file to add list header search and sort options @Author:SHRI25FEB15.------>
    <!--------------Start code to change file to add list header search and sort options @Author:SHRI26FEB15.------>