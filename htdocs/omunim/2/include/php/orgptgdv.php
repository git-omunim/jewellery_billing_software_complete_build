<?php
/*
 * **************************************************************************************
 * @tutorial: Transfer Unsettled Transaction Main Div
 * **************************************************************************************
 * 
 * Created on Dec 30, 2013 3:43:06 PM
 *
 * @FileName: orgptgdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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
$accFileName = $currentFileName;
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
?>
<?php
$panelName = $_GET['panelName'];
$upPanelName = $_GET['upPanelName'];
$ltranId = $_GET['ltransId'];
if ($ltranId == '' || $ltranId == NULL) {
    $ltranId = $_POST['ltransId'];
}
//echo '$ltranId='.$ltranId;
?>
<?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y') { ?>
    <div id="girviPanelTrId"></div>
    <div id="girviTransMainDiv">
        <div id="girviTransPanelDiv" class="main_middle_common">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" class="border-color-grey-b">
                        <table align="left" border="0" cellspacing="0" cellpadding="2" width="100%">
                            <tr>
                                <td align="right" valign="middle">
                                    <div id="messDisplayDiv">
                                    </div>
                                </td>
                                <td align="right" class="printVisibilityHidden">
                                    <!--<div style="text-align:center;">-->
                                        <?php
                                        $inputId = "tFirmTrans";
                                        $inputType = 'submit';
                                        $inputFieldValue = 'TFIRM';
                                        $inputIdButton = "tFirmTrans";
                                        $inputNameButton = '';
                                        $inputTitle = '';
                                        // This is the main class for input flied
                                        $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                        $inputStyle = " ";
                                        $inputLabel = 'TFIRM'; // Display Label below the text box
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        $inputPlaceHolder = '';
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        $inputOnChange = "";
                                        $inputOnClickFun = 'showTFirmTrans();';
                                        $inputKeyUpFun = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        ?>
                                    <!--</div>-->
<!--                                    <input type="submit" value="TFIRM" class="frm-btn" id="tFirmTrans" 
                                           size="15" maxlength="30" onclick="showTFirmTrans();" />-->
                                    <!--<div style="text-align:center;">-->
                                        <?php
                                        $inputId = "mLenderTrans";
                                        $inputType = 'submit';
                                        $inputFieldValue = 'MONEY LENDER';
                                        $inputIdButton = "mLenderTrans";
                                        $inputNameButton = '';
                                        $inputTitle = '';
                                        // This is the main class for input flied
                                        $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                        $inputStyle = " ";
                                        $inputLabel = 'MONEY LENDER'; // Display Label below the text box
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        $inputPlaceHolder = '';
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        $inputOnChange = "";
                                        $inputOnClickFun = 'showMLenderTrans();';
                                        $inputKeyUpFun = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        ?>
                                    <!--</div>-->
<!--                                    <input type="submit" value="MONEY LENDER" class="frm-btn" id="mLenderTrans" 
                                           size="15" maxlength="30" onclick="showMLenderTrans();" />-->
                                    <!--<div style="text-align:center;">-->
                                        <?php
                                        $inputId = "allTrans";
                                        $inputType = 'submit';
                                        $inputFieldValue = 'ALL TRANSACTIONS';
                                        $inputIdButton = "allTrans";
                                        $inputNameButton = '';
                                        $inputTitle = '';
                                        // This is the main class for input flied
                                        $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                        $inputStyle = " ";
                                        $inputLabel = 'ALL TRANSACTIONS'; // Display Label below the text box
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        $inputPlaceHolder = '';
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        $inputOnChange = "";
                                        $inputOnClickFun = 'showAllTransaction();';
                                        $inputKeyUpFun = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        ?>
                                    <!--</div>-->
<!--                                    <input type="submit" value="ALL TRANSACTIONS" class="frm-btn" id="allTrans" 
                                           size="15" maxlength="30" onclick="showAllTransaction();" />-->
                                    <!--<div style="text-align:center;">-->
                                        <?php
                                        $inputId = "allTrans";
                                        $inputType = 'submit';
                                        $inputFieldValue = 'LOAN LOG';
                                        $inputIdButton = "allTrans";
                                        $inputNameButton = '';
                                        $inputTitle = '';
                                        // This is the main class for input flied
                                        $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                        $inputStyle = " ";
                                        $inputLabel = 'LOAN LOG'; // Display Label below the text box
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        $inputPlaceHolder = '';
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        $inputOnChange = "";
                                        $inputOnClickFun = 'showAllSysLog();';
                                        $inputKeyUpFun = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        ?>
                                    <!--</div>-->
<!--                                    <input type="submit" value="LOAN LOG" class="frm-btn" id="allTrans" 
                                           size="15" maxlength="30" onclick="showAllSysLog();" />-->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div id="girviTransPanelSubDiv" class="main_middle_common">
            <?php
            if ($panelName == 'tFirm') {
                include 'orgptgfrm.php';
            } else if ($panelName == 'mLender') {
                include 'orgptgml.php';
            } else {
                include 'orgptgstl.php';
            }
            ?>
        </div>
    </div>
<?php } ?>