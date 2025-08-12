<?php
/*
 * ***************************************************************************************
 * @tutorial: SEARCH SCHEME BY BARCODE FILE @PRIYANKA-16JULY2019
 * **************************************************************************************
 * 
 * Created on 16 JULY, 2019 13:00:20 PM
 *
 * @FileName: omsearchschemebybarcode.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMunim
 * @version 3.0.0
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
//Start Staff Access API 
$accFileName = $currentFileName;
include $_SESSION['documentRootIncludePhp'] . '/ommpemac.php';
//End Staff Access API 
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
?>
<div id="searchSchemeByBarcode">
    <div id="searchSchemeByBarcodeDisplayDiv" name="searchSchemeByBarcodeDisplayDiv">
        <table border="0" cellspacing="0" cellpadding="1" width="100%" style="vertical-align: top;">
            <tr>
                <td align="left" colspan="14">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td valign="middle" align="left">
                                <div class="main_link_orange textLabelHeading">
                                    <?php
                                    echo "SEARCH SCHEMES";
                                    ?>
                                    <input type="hidden" id="documentRootPath" name="documentRootPath" 
                                           value="<?php echo $documentRootBSlash; ?>" />  
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>    
<!--            <tr>
                <td align="right" colspan="2">
                    <hr color="#B8860B" />
                </td>
            </tr>-->
        </table>

        <div id="searchSchemeByBarcodeDiv" name="searchSchemeByBarcodeDiv">
            <table align="center" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td align="center" valign="middle" class="textBoxCurve2px margin2pxAll backFFFFFF">
                        <input id="searchSchemeMobileNo" name="searchSchemeMobileNo" type="text"   
                               placeholder="SEARCH BY MOBILE NO." 
                               onkeydown="javascript: if (event.keyCode == 13) {
//                                           searchSchemeByMobile(document.getElementById('searchSchemeByMobile').value);
                                           showCustomerSchemeDiv(document.getElementById('searchSchemeMobileNo').value);
                                           return false;
                                       }"
                               autocomplete="off" spellcheck="false" class="textLabel16CalibriNormalGreyMiddle border-no" 
                               size="30" maxlength="64" style="height:35px;"/>
                        &nbsp;
                        <input id="searchSchemeByMobile" name="searchSchemeByMobile" type="hidden"/>

                    </td>

                    <td align="left" valign="middle">
                        <!---Start to Changes button ----->
                        <div style="margin-left:-5px;">
                            <?php
                            $inputId = "goButton";
                            $inputType = 'button';
                            $inputFieldValue = 'GO';
                            $inputIdButton = "goButton";
                            $inputNameButton = 'goButton';
                            $inputTitle = '';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                            $inputStyle = " width: 50px;height: 42px;margin-top: -2px;margin-left: -3px;margin-bottom: 0;border-radius: 0 5px 5px 0 !important;font-size: 16px;";
                            $inputLabel = 'GO'; // Display Label below the text box
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            $inputPlaceHolder = '';
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputOnChange = "";
                            $inputOnClickFun = 'javascript:showCustomerSchemeDiv(document.getElementById("searchSchemeMobileNo").value);
                                                           return false;';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>
                        </div>
                        <!---End to Changes button ----->
                    </td>
                    <td align="left" valign="middle"></td>
                    <td align="center" valign="middle" class="textBoxCurve2px margin2pxAll backFFFFFF">
                        <input id="searchScheme" name="searchScheme" type="text"  
                               placeholder="SEARCH BY BARCODE NO." 
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           searchSchemeByBarcode(document.getElementById('searchScheme').value);
                                           showSchemeDiv(document.getElementById('searchSchemeBarcode').value);
                                           return false;
                                       }"
                               autocomplete="off" spellcheck="false" class="textLabel16CalibriNormalGreyMiddle border-no" 
                               size="40" maxlength="64" style="height:35px;"/>
                        &nbsp;

                        <input id="searchSchemeBarcode" name="searchSchemeBarcode" type="hidden"/>

                        <img src="<?php echo $documentRoot; ?>/images/sell_Purchase16.png" width="0.01px" 
                             onload="document.getElementById('searchSchemeByMobile').focus();"/>
                    </td>

                    <td align="left" valign="middle">
                        <!---Start to Changes button ----->
                        <div style="margin-left:-5px;">
                            <?php
                            $inputId = "goButton";
                            $inputType = 'button';
                            $inputFieldValue = 'GO';
                            $inputIdButton = "goButton";
                            $inputNameButton = 'goButton';
                            $inputTitle = '';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                            $inputStyle = "width: 50px;height: 42px;margin-top: -2px;margin-left: -3px;margin-bottom: 0;border-radius: 0 5px 5px 0 !important;font-size: 16px;";
                            $inputLabel = 'GO'; // Display Label below the text box
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            $inputPlaceHolder = '';
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputOnChange = "";
                            $inputOnClickFun = 'javascript:searchSchemeByBarcode(document.getElementById("searchScheme").value);
                                                           showSchemeDiv(document.getElementById("searchSchemeBarcode").value);
                                                           return false;';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>
                        </div>
                        <!---End to Changes button ----->
                    </td>

<!--                    <td align="left" valign="middle"></td>
                    <td align="left" valign="middle"></td>-->

                </tr>
            </table>
        </div>
        <div id="searchSchemeByBarcodeListDisplayDiv"> 
            <?php
            //
            //print_r($_REQUEST);
            //
            if ($schemeBarcode == NULL || $schemeBarcode == '') {
                $schemeBarcode = $_REQUEST['searchSchemeBarcode'];
            }
            //
            parse_str(getTableValues("SELECT * FROM kitty WHERE kitty_barcode = '$schemeBarcode' AND kitty_upd_sts IN ('New','Updated','Released')"));
            //
            //echo "SELECT * FROM kitty WHERE kitty_barcode = '$schemeBarcode' AND kitty_upd_sts IN ('New','Updated','Released')";
            //
            $kittyId = $kitty_id;
            $kittyCustId = $kitty_cust_id;
            $kittyScheme = $kitty_scheme;
            $kittyNoOfDays = $kitty_EMI_days;
            $kittyMainAmount = $kitty_main_prin_amt;
            $kittyDOB = $kitty_DOB;
            //
            $panelDivName = "kittyInfo";
            //
            if ($kitty_id != NULL && $kitty_id != '') {
                include $_SESSION['documentRootIncludePhp'] . 'omktpydtl.php';
            } else if (($kitty_id == NULL || $kitty_id == '') &&
                    $schemeBarcode != NULL && $schemeBarcode != '') {
                ?>
                <div class="fs_13 ff_calibri bold" style="color:red;">NO DATA FOUND! </div>
            <?php
            }
            //
            ?>
        </div>
    </div>
</div>
