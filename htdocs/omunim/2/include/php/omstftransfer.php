<?php
/*
 * **************************************************************************************
 * @tutorial: Stock Firm Transfer @AUTHOR:MADHUREE-24OCT19
 * **************************************************************************************
 *
 * Created on 24 OCT 2019
 *
 * @FileName: omstftransfer.php
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
include_once 'ommpfndv.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
$itemId = $_REQUEST['itemId'];
//
//strFrmId = $_REQUEST['strFrmId'];
//
//echo $strFrmId;
//
parse_str(getTableValues("SELECT sttr_firm_id, sttr_quantity, sttr_final_quantity FROM stock_transaction "
                . "where sttr_item_code='$itemId' "
                . "and sttr_transaction_type IN('EXISTING','PURONCASH','TAG','PURBYSUPP') "
                . "and sttr_owner_id='$_SESSION[sessionOwnerId]' "));
//
//echo $sttr_quantity;
//echo $sttr_final_quantity;
//
if (($sttr_quantity == 0 || $sttr_final_quantity == 0) && $sttr_final_quantity != '') {
    $sttr_firm_id = '';
}
?>
<style type="text/css">
    .firmListDivtoselectfirm {
        width:80px;
        height:20px;
        z-index: 1001;
        margin: 0px 0px 0px 0px;
        text-align: left;
        vertical-align: top;
        border: #A4A4A4 1px solid;
        background:#F9F9F9;
    }  
</style>
<table align="center" border="0" cellpadding="0" cellspacing="0">
    <tr align="center">
        <td align="center" valign="middle" class="textLabel12CalibriBrownBold15">
            FIRM TRANSFER
        </td>
    </tr>
    <tr height="10px"></tr>
    <tr>
        <td align="center" valign="middle" width="120px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
            <div id="" class="selectStyledBorderLess background_transparent">
                <SELECT class="firmListDivtoselectfirm" id="selectFirmDiv" name="selectFirmDiv" 
                        onkeydown="javascript:if (event.keyCode == 13) {
                                    document.getElementById('').focus();
                                    return false;
                                }
                                else if (event.keyCode == 8) {
                                    document.getElementById('').focus();
                                    return false;
                                }"
                        >
                    <OPTION VALUE="NotSelected">Firm Name</OPTION>                     
                    <?php
                    if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                        $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type IN ('Public','Personal') and firm_id NOT IN($sttr_firm_id) and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                        $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                        echo $qSelPerFirm;
                        while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
                            if ($gbLanguage == 'English')
                                $firmName = om_strtoupper($rowPerFirm['firm_name']);
                            else
                                $firmName = $rowPerFirm['firm_name'];
                            if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                                $firmSelected = "selected";
                            }

                            if ($rowPerFirm['firm_type'] == "Public") {
                                echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . " $firmSelected>$firmName</OPTION>";
                            } else {
                                echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . " $firmSelected>$firmName</OPTION>";
                            }
                            $firmSelected = "";
                        }
                    } else if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                        $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type='Public' and firm_id NOT IN($sttr_firm_id) and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                        $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                        echo $qSelPerFirm;
                        while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
                            if ($gbLanguage == 'English')
                                $firmName = om_strtoupper($rowPerFirm['firm_name']);
                            else
                                $firmName = $rowPerFirm['firm_name'];
                            if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                                $firmSelected = "selected";
                            }

                            if ($rowPerFirm['firm_type'] == "Public") {
                                echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . " $firmSelected>$firmName</OPTION>";
                            } else {
                                echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . " $firmSelected>$firmName</OPTION>";
                            }
                            $firmSelected = "";
                        }
                    }
                    ?>
                </SELECT>
            </div>
        </td>

        <?php
        $qSelPreFirmId = "SELECT * FROM stock_transaction where sttr_item_code='$itemId' ";
        $resPreFirmId = mysqli_query($conn, $qSelPreFirmId);
        $rowPreFirmId = mysqli_fetch_array($resPreFirmId, MYSQLI_ASSOC);
        $strFrmId = $rowPreFirmId ['sttr_firm_id'];
        $strTransHist = $rowPreFirmId ['sttr_stock_trans_history'];
        $strTransHistDate = $rowPreFirmId ['sttr_trans_date'];
        //echo $strFrmId;
        $qSelPreFirmName = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' and firm_id='$strFrmId'";
        //echo $qSelPreFirmName;
        $resPreFirmIdName = mysqli_query($conn, $qSelPreFirmName);
        $rowPreFirmIdName = mysqli_fetch_array($resPreFirmIdName, MYSQLI_ASSOC);
        $strFrmName = $rowPreFirmIdName ['firm_name'];
        $stTransDate = date("d/m/yy - h:i");
        $strTransHist = $strTransHist . '#' . $strFrmName;
        $strTransHistDate = $strTransHistDate . '#' . $stTransDate;
        ?>

        <td align="left">
            <div id="slPrSubButtDiv" style="margin-left:10px;">
                <input type="submit" class="textBoxCurve1px frm-btn spaceRight10" id="custSlPrSubButt" value="SUBMIT"
                       onclick="javascript:if (document.getElementById('selectFirmDiv').value == 'NotSelected') {
                                   alert('Please Select Firm To Transfer Stock !');
                                   document.getElementById('selectFirmDiv').focus();
                                   return false;
                               } else {
                                   stockFirmTransfer(document.getElementById('selectFirmDiv').value, '<?php echo $itemId; ?>', '<?php echo $strTransHist; ?>', '<?php echo $strFrmId; ?>', '<?php echo $strTransHistDate; ?>');
                                   return false;
                               }"/>
            </div>
        </td>

    </tr>
</table>
