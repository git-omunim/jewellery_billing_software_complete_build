<?php
/*
 * Created on 09 MAY,2019 4:57:33 PM
 *
 * @FileName: orgpgvpnint.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId: 
 * @ProjectName: oMunim
 * @version 2.6.100
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
include 'ommprspc.php';
if ($_SESSION['sessionOwnIndStr'][1] == 'Y') {
    ?>
<div id="mainMiddle" class="main_middle">
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="top" align="left" width="32px">
                <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/girviPanel32.png" alt="" /></div>
            </td>
            <td valign="middle" align="left">
                <div id="GirviPanel" class="textLabelHeading">LOAN PANEL</div>
            </td>
            <td align="right" valign="bottom">
                <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden" class="blackMess11">
                    <?php include 'omzaajld.php'; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <hr color="#B8860B" />
            </td>
        </tr>
        <tr>
            <td colspan="3" align="left">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="left" valign="bottom">
                            <table>
                                <tr>
                                    <td align="right" valign="bottom">
                                        <div style="text-align:center;">
                                            <?php
                                            $inputId = "buttGirviTallyList";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'ITEM DET';
                                            $inputIdButton = "buttGirviTallyList";
                                            $inputNameButton = 'buttGirviTallyList';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                            $inputStyle = " ";
                                            $inputLabel = 'ITEM DET'; // Display Label below the text box
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = 'showCustGirviITMListPanelInt()';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';               // This is the main division class for drop down 
                                            $inputselDropDownCls = '';            // This is class for selection in drop down
                                            $inputMainClassButton = '';           // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" valign="bottom">
                                        <form id="frmLoansList" name="frmLoansList" method="post" action="javascript:showLoansListPanelInt();">
                                        <div style="text-align:center;">
                                            <?php
                                            $inputId = "buttLoansList";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'ACTIVE';
                                            $inputIdButton = "buttLoansList";
                                            $inputNameButton = 'buttLoansList';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                            $inputStyle = " ";
                                            $inputLabel = 'ACTIVE'; // Display Label below the text box
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnClickFun = '';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';               // This is the main division class for drop down 
                                            $inputselDropDownCls = '';            // This is class for selection in drop down
                                            $inputMainClassButton = '';           // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
                                        </div>
                                        </form>
                                    </td>
<!--                                    <td align="right" valign="bottom">
                                        <div style="text-align:center;">-->
                                            <?php
//                                            $inputId = "buttTransGirviList";
//                                            $inputType = 'submit';
//                                            $inputFieldValue = 'UN-RELEASED TRANS';
//                                            $inputIdButton = "buttTransGirviList";
//                                            $inputNameButton = 'buttTransGirviList';
//                                            $inputTitle = '';
//                                            // This is the main class for input flied
//                                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
//                                            $inputStyle = " ";
//                                            $inputLabel = 'UN-RELEASED TRANS'; // Display Label below the text box
//                                            // This class is for Pencil Icon                                                           
//                                            $inputIconClass = '';
//                                            $inputPlaceHolder = '';
//                                            $spanPlaceHolderClass = '';
//                                            $spanPlaceHolder = '';
//                                            $inputOnChange = "";
//                                            $inputOnClickFun = "showTransGirviListPanelInt('UnRelTransLoanList');";
//                                            $inputKeyUpFun = '';
//                                            $inputDropDownCls = '';               // This is the main division class for drop down 
//                                            $inputselDropDownCls = '';            // This is class for selection in drop down
//                                            $inputMainClassButton = '';           // This is the main division for Button
//                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
<!--                                        </div>
                                    </td>-->
                                    <td align="right" valign="bottom" title="Time Period Expired Loans">
                                        <form id="frmTPExpiredGirviList" name="frmTPExpiredGirviList"
                                            method="post" action="javascript:showTPExpiredGirviListPanelInt();">
                                        <div style="text-align:center;">
                                            <?php
                                            $inputId = "buttTPExpiredGirviList";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'TIME PR EXP';
                                            $inputIdButton = "buttTPExpiredGirviList";
                                            $inputNameButton = 'buttTPExpiredGirviList';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                            $inputStyle = " ";
                                            $inputLabel = 'TIME PR EXP'; // Display Label below the text box
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = '';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = ''; 
                                            $inputselDropDownCls = '';    
                                            $inputMainClassButton = '';  
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
                                        </div>
                                        </form>
                                    </td>
<!--                                    <td align="right" valign="bottom" title="Months Old Loans">
                                        <form id="frmExpiredGirviList" name="frmExpiredGirviList"
                                            method="post" action="javascript:showExpiredGirviListPanelInt();">
                                        <div style="text-align:center;">-->
                                            <?php
//                                            $inputId = "buttExpiredGirviList";
//                                            $inputType = 'submit';
//                                            $inputFieldValue = 'OLD EXP';
//                                            $inputIdButton = "buttExpiredGirviList";
//                                            $inputNameButton = 'buttExpiredGirviList';
//                                            $inputTitle = '';
//                                            // This is the main class for input flied
//                                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
//                                            $inputStyle = " ";
//                                            $inputLabel = 'OLD EXP'; // Display Label below the text box
//                                            // This class is for Pencil Icon                                                           
//                                            $inputIconClass = '';
//                                            $inputPlaceHolder = '';
//                                            $spanPlaceHolderClass = '';
//                                            $spanPlaceHolder = '';
//                                            $inputOnChange = "";
//                                            $inputOnClickFun = '';
//                                            $inputKeyUpFun = '';
//                                            $inputDropDownCls = '';               // This is the main division class for drop down 
//                                            $inputselDropDownCls = '';            // This is class for selection in drop down
//                                            $inputMainClassButton = '';           // This is the main division for Button
//                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
<!--                                        </div>
                                        </form>
                                    </td>-->
                                    <td align="right" valign="bottom">
                                        <form id="frmReleasedGirviList" name="frmReleasedGirviList"
                                           method="post" action="javascript:showReleasedGirviListPanelInt();">
                                        <div style="text-align:center;">
                                            <?php
                                            $inputId = "buttReleasedGirviList";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'RELEASED';
                                            $inputIdButton = "buttReleasedGirviList";
                                            $inputNameButton = 'buttReleasedGirviList';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                            $inputStyle = " ";
                                            $inputLabel = 'RELEASED'; // Display Label below the text box
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = '';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';               // This is the main division class for drop down 
                                            $inputselDropDownCls = '';            // This is class for selection in drop down
                                            $inputMainClassButton = '';           // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
                                        </div>
                                        </form>
                                    </td>
                                    <?php if ($_SESSION['sessionOwnIndStr'][28] == 'Y' || $_SESSION['sessionOwnIndStr'][28] == 'A' || $_SESSION['sessionOwnIndStr'][28] == 'B') { ?>
                                    <td align="right" valign="bottom">
                                        <form id="frmLossGirviList" name="frmLossGirviList"
                                                  method="post" action="javascript:showLossGirviListPanelInt();">
                                        <div style="text-align:center;">
                                            <?php
                                            $inputId = "buttLossGirviList";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'LOSSED';
                                            $inputIdButton = "buttLossGirviList";
                                            $inputNameButton = 'buttLossGirviList';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                            $inputStyle = " ";
                                            $inputLabel = 'LOSSED'; // Display Label below the text box
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = '';      
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';               // This is the main division class for drop down 
                                            $inputselDropDownCls = '';            // This is class for selection in drop down
                                            $inputMainClassButton = '';           // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
                                        </div>
                                        </form>
                                    </td>
                                    <?php }?>
                                <td align="right" valign="bottom">
                                    <div style="text-align:center;">
                                        <?php
                                        $inputId = "buttReleasedStatus";
                                        $inputType = 'submit';
                                        $inputFieldValue = 'LOAN STS.';
                                        $inputIdButton = "buttReleasedStatus";
                                        $inputNameButton = 'buttReleasedStatus';
                                        $inputTitle = '';
                                        // This is the main class for input flied
                                        $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                        $inputStyle = " ";
                                        $inputLabel = 'LOAN STS.'; // Display Label below the text box
                                        // This class is for Pencil Icon                                                           
                                        $inputIconClass = '';
                                        $inputPlaceHolder = '';
                                        $spanPlaceHolderClass = '';
                                        $spanPlaceHolder = '';
                                        $inputOnChange = "";
                                        $inputOnClickFun = 'showCustGirvirelStsInt("")';
                                        $inputKeyUpFun = '';
                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                        $inputMainClassButton = '';           // This is the main division for Button
                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                        ?>
                                    </div>
                                </td
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr align="left">
            <td align="left" valign="middle" colspan="3">
                <div id="searchGirviPanelDiv"></div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <hr color="#B8860B" />
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div id="girviListPanelDiv" class="girviListDivSize"> <!---to add class for division @AUTHOR: SANDY6NOV13---->
                    <?php include 'orgpglpdint.php'; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3"><br/></td>
        </tr>
        <tr>
            <td align="center" colspan="3" class="noPrint">
                <a style="cursor: pointer;" onclick="printGirviListPanel('girviListPanelDiv')">
                    <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print' class="printButtonPosition" width="32px" height="32px" /> 
                </a> 
            </td>
        </tr>
    </table>
    <br />
</div>
<?php } ?>
