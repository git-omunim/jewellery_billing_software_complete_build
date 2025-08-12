<?php
/* FILE TO SHOW GIRVI LIST BY ML NAME
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orglbyml.php
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

$grvMlName = $_POST['girviSearchByMlName'];

if ($grvMlName == '') {
    $grvMlName = $_GET['girviSearchByMlName'];
}
//GET ML CODE
//-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
$selMlCode = "SELECT user_unique_code FROM user WHERE user_fname='$grvMlName' and user_owner_id='$_SESSION[sessionOwnerId]'";
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
$resMlCode = mysqli_query($conn,$selMlCode);
$strMlCode = '0';
while ($rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC)) {
    $strMlCode = $strMlCode . ",";
    $strMlCode = $strMlCode . "$rowMlCode[supp_id]";
}
// how many rows to show per page
$rowsPerPage = 15;
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

if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);

    $strFrmId = '0';

    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
    }

    $qSelTotalGirviCount = "SELECT girv_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and  girv_firm_id IN ($strFrmId) and girv_transfer_ml_id IN ($strMlCode) LIMIT $perOffset, $checkNextRows";
    $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount);
    $totalGirvi = mysqli_num_rows($resTotalGirviCount);

    $qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_firm_id IN ($strFrmId) and girv_transfer_ml_id IN ($strMlCode) order by STR_TO_DATE(girv_DOB,'%d %b %Y') desc, girv_pre_serial_num desc, girv_serial_num desc LIMIT $perOffset, $rowsPerPage";
    $resAllGirvi = mysqli_query($conn,$qSelAllGirvi);
    $totalNextGirvi = mysqli_num_rows($resAllGirvi);
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

    $qSelTotalGirviCount = "SELECT girv_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]'  and girv_transfer_ml_id IN ($strMlCode) LIMIT $perOffset, $checkNextRows";
    $resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount);
    $totalGirvi = mysqli_num_rows($resTotalGirviCount);

    $qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and girv_transfer_ml_id IN ($strMlCode) order by STR_TO_DATE(girv_DOB,'%d %b %Y') desc, girv_pre_serial_num desc, girv_serial_num desc LIMIT $perOffset, $rowsPerPage";
    $resAllGirvi = mysqli_query($conn,$qSelAllGirvi);
    $totalNextGirvi = mysqli_num_rows($resAllGirvi);
}
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td>
            <table border="0" cellspacing="1" cellpadding="0">
                <tr>
                    <td valign="middle" align="left" width="26px">
                        <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/village.png" alt="" /></div>
                    </td>
                    <td valign="middle" align="left">
                        <div class="main_link_brown">Girvi List By Money Lender Name:</div>
                    </td>
                    <td align="left">
                        <div class="main_link_green"><?php echo $grvMlName; ?></div>
                    </td>
                    <td align="right" valign="bottom" class="frm-lbl">
                        <div class="spaceRight20">
                            <div id="ajaxLoadGirviDetailsDiv" style="visibility: hidden">
                                <?php include 'omzaajld.php'; ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="left">
            <table border="0" cellspacing="1" cellpadding="1" width="100%">
                <?php
                if ($totalGirvi <= 0) {
                    echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ Girvi List is empty. ~ </div></div>";
                } else {
                    ?>
                    <tr>
                        <td></td><td></td>
                        <td colspan="5">
                            <div id="display_girvi_info_popup" class="display-girvi-info-popup"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="10px">
                            <div class="h7">S. No.</div>
                        </td>
                        <td align="right"  width="50px">
                            <div class="h7">PRIN. AMT.</div>
                        </td>
                        <td align="right"  width="10px">
                            <div class="h7">&nbsp;</div>
                        </td>
                        <td align="left" width="100px">
                            <div class="h7">CUSTOMER NAME</div>
                        </td>
                        <td align="left" width="100px">
                            <div class="h7">CITY</div>
                        </td>
                        <td align="left"  width="100px">
                            <div class="h7">FIRM</div>
                        </td>
                        <td align="left"  width="100px">
                            <div class="h7">ML NAME</div>
                        </td> 
                        <td align="left" width="50px">
                            <div class="h7">GIRVI DATE</div>
                        </td>      
                    </tr>
                    <?php
                }
                while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

                    $gId = $rowAllGirvi['girv_id'];
                    $custId = $rowAllGirvi['girv_cust_id'];
                    $gFirmId = $rowAllGirvi['girv_firm_id'];
                    $gCustName = $rowAllGirvi['girv_cust_fname'] . ' ' . $rowAllGirvi['girv_cust_lname'];
                    $gCustCity = $rowAllGirvi['girv_cust_city'];
                    $gMainPrinAmt = $rowAllGirvi['girv_main_prin_amt'];
                    $gDOB = $rowAllGirvi['girv_DOB'];
                    $gPreSerialNo = $rowAllGirvi['girv_pre_serial_num'];
                    $gSerialNo = $rowAllGirvi['girv_serial_num'];

                    $qSelFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$gFirmId'";
                    $resFirm = mysqli_query($conn,$qSelFirm);
                    $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);

                    $gFirmName = $rowFirm['firm_name'];
                    ?>
                    <tr>
                        <td align="left">
                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi / Double Click To Select Girvi"
                                   ondblclick="searchGirviByGirviId(<?php echo $gId; ?>)"
                                   onclick="getGirviInfoPopUp(<?php echo $custId; ?>,<?php echo $gId; ?>)"
                                   value="<?php echo $gPreSerialNo . $gSerialNo; ?>" class="frm-btn-without-border" readonly="true"/>
                            <input type="hidden" name="girviId<?php echo $gCounter; ?>" id="girviId<?php echo $gCounter; ?>" value="<?php echo $gId; ?>"/>
                        </td>
                        <td align="right">
                            <div class="amount"><?php echo $gMainPrinAmt; ?></div>
                        </td>
                        <td align="right"  width="10px">
                            <div class="h7">&nbsp;</div>
                        </td>
                        <td align="left">
                            <h5><?php echo $gCustName; ?></h5>
                        </td>
                        <td align="left">
                            <h5><?php echo $gCustCity; ?></h5>
                        </td>
                        <td align="left">
                            <h5><?php echo $gFirmName; ?></h5>
                        </td>
                        <td align="left">
                            <h5><?php echo $grvMlName; ?></h5>
                        </td>
                        <td align="left">
                            <h5><?php echo date('d  M  y', strtotime($gDOB)); ?></h5>
                        </td>
                    </tr>
                    <?php
                    $gCounter++;
                }
                ?>
            </table>
            <div id="ajaxLoadNextGirviPanelList" style="visibility: hidden" align="right">
                <?php include 'omzaajld.php'; ?>
            </div>
            <?php
            if ($totalNextGirvi > 0) {
                ?>
                <div id="ajaxLoadNextGirviPanelListButt">
                    <table border="0" cellpadding="2" cellspacing="0" align="right">
                        <tr>
                            <?php
                            if ($pageNum > 1) {
                                ?>
                                <td align="right">
                                    <form name="prev_girvi" id="prev_girvi"
                                          action="javascript:navigationGirviPanel(<?php echo "$pageNum - 1"; ?>);"
                                          method="get"><input type="submit" value="Previous Girvi" class="frm-btn"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                            if ($totalGirvi > $rowsPerPage) {
                                ?>
                                <td align="right">
                                    <form name="next_girvi" id="next_girvi"
                                          action="javascript:navigationGirviPanel(<?php echo $pageNum + 1; ?>);"
                                          method="get"><input type="submit" value="Next Girvi" class="frm-btn"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </td>
    </tr>
</table>

