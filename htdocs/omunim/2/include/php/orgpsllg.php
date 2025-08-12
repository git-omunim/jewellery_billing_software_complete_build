<?php
/*
 * **************************************************************************************
 * @tutorial: loan log
 * **************************************************************************************
 * 
 * Created on Mar 2, 2015 10:56:15 AM
 *
 * @FileName: ollonlog.php
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<div id="systemLogPanelDiv" class="minHeight400">
    <?php
    $selFirmId = NULL;
    $sortKeyword = NULL;
    $searchColumn = NULL;
    $searchValue = NULL;
    $searchKeyword = NULL;
    $columName = NULL;
    $searchColumnStr = NULL;
    $counter = 1;
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
    if ($startDate == '') {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
    }
    if ($startDate == '' || $startDate == NULL) {
        $startDate = '1' . ' ' . date(M) . ' ' . date(Y);
        $startDate = date("d M Y", strtotime($startDate));
    }
    if ($endDate == '' || $endDate == NULL) {
        $endDate = date("Y-m-d");
        $endDate = date("d M Y", strtotime($endDate));
    }
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm @AUTHOR: SANDY10JUL13
        $selFirmId = $_SESSION['setFirmSession'];
    }

    $updateRows = $_GET['panel'];
    if ($updateRows == 'LoanLogList') {
        $rowsPerPage = $_GET['rowsPerPage'];
        $ominValue = $rowsPerPage;
        $ominOption = 'indisslgno';
        include 'ommpindc.php';
    }
    $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indisslgno'";
    $resGNoOfRows = mysqli_query($conn,$qSelGNoOfRows);
    $rowGNoOfRows = mysqli_fetch_array($resGNoOfRows, MYSQLI_ASSOC);
    $rowsPerPage = $rowGNoOfRows['omin_value'];
    if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
        $rowsPerPage = 15;
    }
    $checkNextRows = $rowsPerPage * 2;
    $pageNum = 1;
    if (isset($_GET['page'])) {
        $pageNum = $_GET['page'];
    }
// counting the offset
    $perOffset = ($pageNum - 1) * $rowsPerPage;

    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    if ($selFirmId != NULL) {
        $strFrmId = $selFirmId;
        parse_str(getTableValues("SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$strFrmId'"));
        $strFrmName = " '$firm_name' ";
    } else {
        $resFirmCount = mysqli_query($conn,$qSelFirmCount);
        $strFrmId = '0';
        $strFrmName = '0';
        //Set String for Public Firms
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
            $strFrmName = $strFrmName . ",";
            $strFrmName = $strFrmName . " '$rowFirm[firm_name]' ";
        }
    }
    $sDate = strtotime($startDate);
    $eDate = strtotime($endDate);

    $qSelSysLog = "SELECT * FROM sys_log WHERE sslg_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(sslg_ent_date,'%Y-%m-%d'))>='$sDate' and "
            . "UNIX_TIMESTAMP(STR_TO_DATE(sslg_ent_date,'%Y-%m-%d'))<='$eDate' and sslg_firm_name IN ($strFrmName) and sslg_trans_type IN ('loanSettle')"
            . "order by sslg_id desc LIMIT $perOffset, $rowsPerPage";  //Condition added to check serial number with system log trans id to display particular loan log @Author:SHRI16JUN15
    $qSelSysLogCount = "SELECT * FROM sys_log WHERE sslg_main_id='$grvId' and sslg_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(sslg_ent_date,'%Y-%m-%d'))>='$sDate' and "
            . "UNIX_TIMESTAMP(STR_TO_DATE(sslg_ent_date,'%Y-%m-%d'))<='$eDate' and sslg_firm_name IN ($strFrmName) and sslg_trans_type IN ('loanSettle') order by sslg_id desc"; //Condition added to check serial number with system log trans id to display particular loan log @Author:SHRI16JUN15
    // //End code to change query @Author:SHRI17JUN15//
//    echo $qSelSysLog;
    $resSysLog = mysqli_query($conn,$qSelSysLog);
    $totalNextSysLogCount = mysqli_num_rows($resSysLog);
    $resSysLogCount = mysqli_query($conn,$qSelSysLogCount);
    $totalSysLogCount = mysqli_num_rows($resSysLogCount);
    ?>
    <table border = "0" cellspacing = "0" cellpadding = "0" width = "100%" class="main_middle">
        <tr>
            <td align = "left" colspan="5">
                <table border = "0" cellspacing = "0" cellpadding = "1" width = "100%">
                    <tr>
                        <td valign = "middle" align = "left" width = "30px">
                            <div class="analysis_div_rows"><img src = "images/logs24.png" alt = "System Log" /></div>
                        </td>
                        <td valign = "middle" align = "left">
                            <div class = "analysis_div_rows">
                                <a class = "links" style = "cursor: pointer;"><div class="textLabelHeading">LOAN LOGS</div></a>
                            </div>
                        </td>
                        <td align="left"  class="paddingLeft30">
                            <table border="0" cellspacing="0" cellpadding="0" valign="middle">
                                <tr>
                                    <td align="left" valign="middle"  class="textBoxCurve1px backFFFFFF margin2pxAll padLeft5" style="width:170px;">
                                        <?php include 'omdaglfr.php'; ?>
                                    </td>
                                    <td valign="middle" align="center" class="frm-lbl">
                                        &nbsp;&nbsp;-&nbsp;
                                    </td>
                                    <td align="left" valign="middle"  class="textBoxCurve1px backFFFFFF margin2pxAll padLeft5" style="width:170px;">
                                        <?php include 'omdaglto.php'; ?>
                                    </td>
                                    <td align="left" valign="middle" class="noPrint">
                                        <input id="goButt" name="goButt" type="submit" value="GO" class="frm-btn" 
                                               onclick="getDateInSettledLoanLogPanel('<?php echo $documentRoot; ?>', document.getElementById('girviLedDelFrmDay').value, document.getElementById('girviLedDelFrmMonth').value, document.getElementById('girviLedDelFrmYear').value,
                                                               document.getElementById('girviLedDelToDay').value, document.getElementById('girviLedDelToMonth').value, document.getElementById('girviLedDelToYear').value,
                                                               '', '<?php echo $pageNum; ?>', 'LoanLogList', document.getElementById('rowsPerPage').value,
                                                               '', '', '', '');"/>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                        <td align="right" valign="top" class="noPrint textBoxCurve1px backFFFFFF" width="50px">
                            <input id="rowsPerPage" name="rowsPerPage" type="text" value="<?php echo $rowsPerPage; ?>" placeholder="No Of Rows" title="Enter number of rows in List"
                                   class="border-no textLabel14CalibriGreyMiddle background_transparent" size="10" maxlength="6" 
                                   onkeyup="if (event.keyCode == 13 && document.getElementById('rowsPerPage').value != '') {
                                               searchSystemLogPanel('<?php echo $sysLogTransId; ?>','<?php echo $documentRoot; ?>', '<?php echo $startDate; ?>', '<?php echo $endDate; ?>', '<?php echo $selFirmId; ?>', document.getElementById('rowsPerPage').value, '1', 'LoanLogList');
                                               document.getElementById('rowsPerPage').value = '';
                                           }"
                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                   onclick="this.value = ''"/>
                        </td>
                        <td align="right" valign="middle" width="17px" class="noPrint">
                            <div id="CustomerListButton">
                                <a style="cursor: pointer;" onclick="javascript: searchSystemLogPanel('<?php echo $sysLogTransId; ?>','<?php echo $documentRoot; ?>', '<?php echo $startDate; ?>', '<?php echo $endDate; ?>', '<?php echo $selFirmId; ?>', document.getElementById('rowsPerPage').value, '1', 'LoanLogList');">
                                    <img src="<?php echo $documentRootBSlash; ?>/images/submit16.png"  title="Click Here to Display Number of rows in this List" />
                                </a>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="5">
                <hr color="#B8860B" />
            </td>
        </tr>
        <?php
        if ($totalNextSysLogCount <= 0) {
            ?>
            <tr>
                <td valign="middle" align="center" class="ff_calibri fs_13 fw_b brown">
                    ~ LIST IS EMPTY ~ 
                </td>
            </tr>
            <?php
        }
        while ($rowSysLog = mysqli_fetch_array($resSysLog)) {
            $loanTransCommArr = explode(',', $rowSysLog['sslg_trans_comment']);
            $loanTransIdStr = $loanTransCommArr[0];
            $lTranIdArr = explode(':', $loanTransIdStr);
            $ltranId = trim($lTranIdArr[1]);
            if ($counter == 1) {
                ?>
                <tr>
                    <td align = "center" class="ff_calibri fs_13 fw_b brown border-color-grey-rb" width="60px">
                        <div class="spaceLeft5">S NO.</div>
                    </td>
                    <td align = "center" class="ff_calibri fs_13 fw_b brown border-color-grey-rb" width="130px">
                        <div class="spaceLeft5">DATE
                        </div>
                    </td>
                    <td align = "left" class="ff_calibri fs_13 fw_b brown border-color-grey-rb" width="60px">
                        <div class="spaceLeft5">LOGIN ID
                        </div>
                    </td>
                    <td align = "left" class="ff_calibri fs_13 fw_b brown border-color-grey-rb" width="190px">
                        <div class="spaceLeft5">SUBJECT
                        </div>
                    </td>
                    <td align = "left" class="ff_calibri fs_13 fw_b brown border-color-grey-rb">
                        <div class="spaceLeft5">DESCRIPTION
                        </div>
                    </td>
                </tr>
                <?php
            }
            $sysLogId = $rowSysLog['sslg_id'];
            $date_arr = explode(" ", $rowSysLog['sslg_ent_date']);
            $date = $date_arr[0];
            $time = $date_arr[1];
            
//            echo '$ltranId=='.$ltranId;
            ?>
            <tr>
                <td align="left" class="ff_calibri fs_13 border-color-grey-rb">
                    <div class="spaceLeft5"><?php echo $counter; ?></div>
                </td>
                <td align="left" class="ff_calibri fs_13 border-color-grey-rb">
                    <div class="spaceLeft5" style="cursor: pointer" onclick="javascript:updateSettledLoans('<?php echo $ltranId; ?>');"><?php echo om_strtoupper(date('d M Y', strtotime($date))) . ' ' . $time; ?></div>
                </td>
                <td align="left" class="ff_calibri fs_13 border-color-grey-rb">
                    <div class="spaceLeft5"><?php echo om_strtoupper($rowSysLog['sslg_own_login_id']); ?></div>
                </td>
                <td align="left" class="ff_calibri fs_13 border-color-grey-rb">
                    <div class="spaceLeft5"><?php echo $rowSysLog['sslg_trans_sub']; ?></div>
                </td>
                <td align="left" class="ff_calibri fs_13 border-color-grey-rb">
                    <div class="spaceLeft5"><?php echo $rowSysLog['sslg_trans_comment']; ?></div>
                </td>
            </tr>
            <?php
            $counter++;
        }
        ?>
        <tr>
            <td align = "left">
                &nbsp;
            </td>
        </tr>
    </table>
    <div id="ajaxLoadNextItemList" style="visibility: hidden" align="right">
        <?php include 'omzaajld.php'; ?>
    </div>
    <?php
    if ($totalSysLogCount > 0) {
        $noOfPagesAsLink = ceil($totalSysLogCount / $rowsPerPage);
        if ($pageNum > $noOfPagesAsLink || $pageNum < 0) {
            echo "<h1> ~ This Page is not available. ~ </h1>";
        } else {
            ?>
            <table cellpadding="2" cellspacing="2" border="0" align="right">
                <tr>
                    <td align="right">
                        <?php if (($pageNum - 1) != '0') { ?>
                            <input type="submit" id="prvPageButt" name="prvPageButt" value="PREV" class="pageNoButton"
                                   onclick="javascript:showPageInPanel('<?php echo $documentRoot; ?>', '<?php echo $pageNum - 1; ?>', 'LoanLogList', '<?php echo $rowsPerPage; ?>', '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $startDate; ?>', '<?php echo $endDate; ?>', '<?php echo $noOfPagesAsLink; ?>');" />
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
                                           onclick="javascript:showPageInPanel('<?php echo $documentRoot; ?>', this.value, 'LoanLogList', '<?php echo $rowsPerPage; ?>', '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $startDate; ?>', '<?php echo $endDate; ?>', '<?php echo $noOfPagesAsLink; ?>');"/>
                                </td>
                                <?php
                            }
                        }
                    } else {
                        for ($i = 1; $i <= 10; $i++) {
                            ?>
                            <td align="right">
                                <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                       onclick="javascript:showPageInPanel('<?php echo $documentRoot; ?>', this.value, 'LoanLogList', '<?php echo $rowsPerPage; ?>', '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $startDate; ?>', '<?php echo $endDate; ?>', '<?php echo $noOfPagesAsLink; ?>');"/>
                            </td>
                            <?php
                        }
                    }
                    ?>
                    <td align="right">
                        <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                            <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                                   onclick="javascript:showPageInPanel('<?php echo $documentRoot; ?>', '<?php echo $pageNum + 1; ?>', 'LoanLogList', '<?php echo $rowsPerPage; ?>', '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $startDate; ?>', '<?php echo $endDate; ?>', '<?php echo $noOfPagesAsLink; ?>');"
                                   />
                               <?php } ?>
                    </td>
                    <?php if ($noOfPagesAsLink > 1) { ?>
                        <td align="right" class="paddingLeft15">
                            <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGENO" class="pageNoButton" size="5"
                                   onblur="if (this.value !== '') {
                                               javascript:showPageInPanel('<?php echo $documentRoot; ?>', this.value, 'LoanLogList', '<?php echo $rowsPerPage; ?>', '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $startDate; ?>', '<?php echo $endDate; ?>', '<?php echo $noOfPagesAsLink; ?>');
                                           }"
                                   onkeypress="if (event.keyCode == '13') {
                                               if (this.value !== '') {
                                                   javascript:showPageInPanel('<?php echo $documentRoot; ?>', this.value, 'LoanLogList', '<?php echo $rowsPerPage; ?>', '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $startDate; ?>', '<?php echo $endDate; ?>', '<?php echo $noOfPagesAsLink; ?>');
                                               }
                                           }"
                                   onclick="this.value = '';"
                                   />
                        </td>
                    <?php } ?>
                </tr>
            </table>
            <?php
        }
    }
    ?>
</div>