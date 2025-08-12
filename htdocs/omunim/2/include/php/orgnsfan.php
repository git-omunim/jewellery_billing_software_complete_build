<?php
/*
 * Created on 06-Feb-2011 6:57:33 PM
 *
 * @FileName: orgnsfan.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  * @FileName: orgnsfan.php
  info@softwaregen.com
 * @ProjectName: oMunim
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
//Start Staff Access API @Author:PRIYA22JUL13
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @Author:PRIYA22JUL13

require_once 'system/omsgeagb.php';
include 'ommprspc.php';
?>
<?php
require_once 'system/omssopin.php';
/* * ******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
if ($_SESSION['sessionOwnIndStr'][2] == 'Y') {
    $sessionOwnerId = $_SESSION[sessionOwnerId];

    $reportEntryDate = $_POST['reportEntryDate'];
    $todayDate = date("d M Y", strtotime($reportEntryDate));

    if ($reportEntryDate == '' || $reportEntryDate == NULL) {
        $reportEntryDate = $_GET['reportEntryDate'];
        $todayDate = date("d M Y", strtotime($reportEntryDate));
    }

    if ($reportEntryDate == '' || $reportEntryDate == NULL) {
        $reportEntryDate = date("Y-m-d");
        $todayDate = date("d M Y", strtotime($reportEntryDate));
    }
    $selFirmId = NULL;
    if (isset($_GET['firmId'])) {
        $selFirmId = $_GET['firmId'];
    }
    ?>
    <!-- end code to access date for report analysis @AUTHOR: SANDY26JUN13 -->
    <div id="analysisPanelDiv">
        <table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr>
                <td colspan="2" align="left">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td valign="middle" align="left" width="34px">
                                <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/analysis32.png" alt="" /></div>
                            </td>
                            <td valign="middle" align="left">
                                <div id="Analysis"  class="textLabelHeading">ANALYSIS PANEL</div><!---to add class @AUTHOR: SANDY12DEC13---->
                            </td>
                            <td valign="middle" align="left">
                                <div class="analysis_div_rows">
                                    &nbsp;
                                </div>
                            </td>
                            <td align="right" valign="bottom">
                                <table border="0" cellspacing="4" cellpadding="0" align="right" >
                                    <tr>
                                        <!-- Start of code to add buttons in analysis panel @AUTHOR: SANDY2JUL13  -->
                                        <?php
                                        if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                                                $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                            ?>

                                            <td align="right" valign="bottom">
                                                <div style="text-align:center;">
                                                    <?php
                                                    $inputId = "StockPanelan";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'STOCK';
                                                    $inputIdButton = "StockPanelan";
                                                    $inputNameButton = 'StockPanelan';
                                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                                    $inputStyle = " ";
                                                    $inputLabel = 'STOCK'; // Display Label below the text box
//
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = 'showStockAnalysisReport()';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
            <!--                                            <input type="submit" value="STOCK"
                                                               id="StockPanelan" name="StockPanelan" 
                                                               onclick="showStockAnalysisReport()"
                                                               class="frm-btn" />-->
                                            </td>
                                            <td align="right" valign="bottom">
                                                <div style="text-align:center;">
                                                    <?php
                                                    $inputId = "purchaseAnalysisButt";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'PURCHASE';
                                                    $inputIdButton = "purchaseAnalysisButt";
                                                    $inputNameButton = 'purchaseAnalysisButt';
                                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                                    $inputStyle = " ";
                                                    $inputLabel = 'PURCHASE'; // Display Label below the text box
//
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = 'showPurchaseAnalysis();';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
            <!--                                            <input type="submit" value="PURCHASE"
                                                               id="purchaseAnalysisButt" name="purchaseAnalysisButt" 
                                                               onclick="showPurchaseAnalysis();"
                                                               class="frm-btn" />-->
                                            </td>
                                            <td align="right" valign="bottom">
                                                <div style="text-align:center;">
                                                    <?php
                                                    $inputId = "sellAnalysisButt";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'SELL';
                                                    $inputIdButton = "sellAnalysisButt";
                                                    $inputNameButton = 'sellAnalysisButt';
                                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                                    $inputStyle = " ";
                                                    $inputLabel = 'SELL'; // Display Label below the text box
//
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = 'showSellAnalysis();';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
            <!--                                            <input type="submit" value="SELL"
                                                               id="sellAnalysisButt" name="sellAnalysisButt" 
                                                               onclick="showSellAnalysis();"
                                                               class="frm-btn spaceRight10" />-->
                                            </td>
                                            <!--add max sell Author:GAUR2AUG16-->
                                            <td align="right" valign="bottom">
                                                <div style="text-align:center;">
                                                    <?php
                                                    $inputId = "maxSellAnalysisButt";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'MAX SELL';
                                                    $inputIdButton = "maxSellAnalysisButt";
                                                    $inputNameButton = 'maxSellAnalysisButt';
                                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                                    $inputStyle = " ";
                                                    $inputLabel = 'MAX SELL'; // Display Label below the text box
//
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = 'showMaxSellAnalysis();';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
            <!--                                            <input type="submit" value="MAX SELL"
                                                               id="maxSellAnalysisButt" name="maxSellAnalysisButt" 
                                                               onclick="showMaxSellAnalysis();"
                                                               class="frm-btn spaceRight10" />-->
                                            </td>
                                            <!--add max sell Author:GAUR2AUG16-->
                                            <td align="right" valign="bottom">
                                                <div style="text-align:center;">
                                                    <?php
                                                    $inputId = "InterestPanelan";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'INTEREST';
                                                    $inputIdButton = "InterestPanelan";
                                                    $inputNameButton = 'InterestPanelan';
                                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                                    $inputStyle = " ";
                                                    $inputLabel = 'INTEREST'; // Display Label below the text box
//
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = 'showInterestAnalysisReport()';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
            <!--                                            <input type="submit" value="INTEREST"
                                                               id="InterestPanelan" name="InterestPanelan" 
                                                               onclick="showInterestAnalysisReport()"
                                                               class="frm-btn" />-->
                                            </td>
                                            <td align="right" valign="bottom">
                                                <div style="text-align:center;">
                                                    <?php
                                                    $inputId = "GirviDetailsa";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'NEW LOANS';
                                                    $inputIdButton = "GirviDetailsa";
                                                    $inputNameButton = 'GirviDetailsa';
                                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                                    $inputStyle = " ";
                                                    $inputLabel = 'NEW LOANS'; // Display Label below the text box
//
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = 'showNewLoansAnalysisReport()';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
            <!--                                            <input type="submit" value="NEW LOANS"
                                                               id="GirviDetailsa" name="GerviDetailsa" 
                                                               onclick="showNewLoansAnalysisReport()"
                                                               class="frm-btn" />-->
                                            </td>
                                            <td align="right" valign="bottom">
                                                <div style="text-align:center;">
                                                    <?php
                                                    $inputId = "RelGirviDetailsa";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'RELEASE LOANS';
                                                    $inputIdButton = "RelGirviDetailsa";
                                                    $inputNameButton = 'RelGirviDetailsa';
                                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                                    $inputStyle = " ";
                                                    $inputLabel = 'RELEASE LOANS'; // Display Label below the text box
//
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = 'showNewReleasedLoansAnalysisReport()';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
            <!--                                            <input type="submit" value="RELEASE LOANS"
                                                               id="RelGirviDetailsa" name="RelGerviDetailsa" 
                                                               onclick="showNewReleasedLoansAnalysisReport()"
                                                               class="frm-btn spaceRight10" />-->
                                            </td> 
                                           <!--- <td align="right" valign="bottom">
                                                <input type="submit" value="UNSECURED LOANS"
                                                       id="UnsecuredLnDetails" name="UnsecuredLnDetails" 
                                                       onclick="showUnsecuredLoansAnalysisReport()"
                                                       class="frm-btn" />
                                            </td> --->
                                            <?php
                                        } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                                                $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                            ?>
                                            <td align="right" valign="bottom">
                                                <input type="submit" value="STOCK"
                                                       id="StockPanelan" name="StockPanelan" 
                                                       onclick="showStockAnalysisReport()"
                                                       class="frm-btn" />
                                            </td>
                                            <td align="right" valign="bottom">
                                                <input type="submit" value="PURCHASE"
                                                       id="purchaseAnalysisButt" name="purchaseAnalysisButt" 
                                                       onclick="showPurchaseAnalysis();"
                                                       class="frm-btn" />
                                            </td>
                                            <td align="right" valign="bottom">
                                                <input type="submit" value="SELL"
                                                       id="sellAnalysisButt" name="sellAnalysisButt" 
                                                       onclick="showSellAnalysis();"
                                                       class="frm-btn spaceRight10" />
                                            </td> 
                                            <!--add max sell Author:GAUR2AUG16-->
                                            <td align="right" valign="bottom">
                                                <input type="submit" value="MAX SELL"
                                                       id="maxSellAnalysisButt" name="maxSellAnalysisButt" 
                                                       onclick="showMaxSellAnalysis();"
                                                       class="frm-btn spaceRight10" />
                                            </td>
                                            <!--add max sell Author:GAUR2AUG16-->
                                          <!-- <td align="right" valign="bottom">
                                               <input type="submit" value="UNSECURED LOANS"
                                                      id="UnsecuredLnDetails" name="UnsecuredLnDetails" 
                                                      onclick="showUnsecuredLoansAnalysisReport()"
                                                      class="frm-btn" />
                                           </td> --->
                                            <?php
                                        } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
                                                $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                            ?>
                                            <td align="right" valign="bottom">
                                                <input type="submit" value="INTEREST"
                                                       id="InterestPanelan" name="InterestPanelan" 
                                                       onclick="showInterestAnalysisReport()"
                                                       class="frm-btn" />
                                            </td>
                                            <td align="right" valign="bottom">
                                                <input type="submit" value="NEW LOANS"
                                                       id="GirviDetailsa" name="GerviDetailsa" 
                                                       onclick="showNewLoansAnalysisReport()"
                                                       class="frm-btn" />
                                            </td>
                                            <td align="right" valign="bottom">
                                                <input type="submit" value="RELEASE LOANS"
                                                       id="RelGirviDetailsa" name="RelGerviDetailsa" 
                                                       onclick="showNewReleasedLoansAnalysisReport()"
                                                       class="frm-btn spaceRight10" />
                                            </td> 
                                           <!-- <td align="right" valign="bottom">
                                                <input type="submit" value="UNSECURED LOANS"
                                                       id="UnsecuredLnDetails" name="UnsecuredLnDetails" 
                                                       onclick="showUnsecuredLoansAnalysisReport()"
                                                       class="frm-btn" />
                                            </td> --->
                                        <?php } ?>
                                        <!-- End of code to add 3 buttons in analysis panel @AUTHOR: SANDY2JUL13  -->   
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <hr color="#B8860B" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="girviPanelAnalysisDiv">
                        <div id="girviPanelTrId" style="visibility:hidden"></div><!-----Add div required in print function @AUTHOR: SANDY7DEC13----------->                    <?php include 'omgnsfad.php'; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <hr color="#B8860B" />
                </td>
            </tr>

            <tr>
                <td colspan="2"><br />
                </td>
            </tr>
            <!-- start to add print button @AUTHOR: SANDY21AUG13 -->
            <tr>
                <td align="center" class="noPrint" >
                    <a style="cursor: pointer;" 
                       onclick="printGirviListPanel('girviPanelAnalysisDiv')">
                        <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                             width="32px" height="32px" /> 
                    </a> 
                </td>
            </tr>
            <!-- END to add print button @AUTHOR: SANDY21AUG13 -->
        </table>
    </div>
    <br />
<?php } ?>
<!-------------End code to add panel indiacator @Author:PRIYA16MAY14--------------->