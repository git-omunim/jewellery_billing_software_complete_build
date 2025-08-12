<?php
/* * ******************************************************************************************
 * START CODE RAW METAL STOCK CONVERTED INTO FINE STOCK : AUTHOR @DARSHANA 14 FEB 2022
 * ******************************************************************************************
 * 
 * Created on 14 FEB 2022
 *
 * @FileName: omrwfinadstoc.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 2.7.33
 * @Copyright (c) 2020 www.softwaregen.com
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
//
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
?>
<div id="mainAddStockDiv">
    <?php
    $panelName = $_GET['panelName'];
    $invPanelName = $_GET['invPanel'];
    $utransInvId = $_GET['utransInvId'];
//    echo '$utransInvId=2='.$utransInvId.'<br>';
    $suppPurId = $_GET['utransUserId'];
    $utinId = $_GET['utinId'];
    $utansMetalType = $_GET['utansMetalType'];
    $userId = $suppPurId;
    $stockType = $_GET['stockType'];
    $stockDetPanel = $_GET['stockDetPanel'];
    
    $sttrId = $utransInvId;
    //
    //
    if ($transPanelDetailsDisplay == '' || $transPanelDetailsDisplay == NULL)
        $transPanelDetailsDisplay = $_GET['transPanelDetailsDisplay'];
    //
    //
    if ($transPanelDetailsDisplay == '' || $transPanelDetailsDisplay == NULL)
        $transPanelDetailsDisplay = $_REQUEST['transPanelDetailsDisplay'];
    //
    //
    //echo '$utransInvId = '.$utransInvId.'<br />';
    //echo '$utinId = '.$utinId.'<br />';
    //
    //
    $mainPanelNew = 'StockPanel';
    //
    //
    if ($stockType == '') {
        $selStockTypOption = callOmLayoutTable('StockTypOption', '', 'select');
        if ($selStockTypOption == '')
            callOmLayoutTable('StockTypOption', 'wholeSaleStock', 'insert');
        $stockType = $selStockTypOption;
    }
    //
    if ($panelName == 'importStockFromAddStockPanel') {
        $importClass = "greenFont";
        $retailClass = "grayFont";
        $wholeSaleClass = "grayFont";
    } else {
        if ($stockType == 'wholeSaleStock') {
            $wholeSaleClass = "greenFont";
            $retailClass = "grayFont";
            $importClass = "grayFont";
        } else {
            $wholeSaleClass = "grayFont";
            $retailClass = "greenFont";
            $importClass = "grayFont";
        }
    }
    //
    //
    $showDiv = $_GET['divSubPanel'];
    //
    //
    ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" class="portlet grey-crusta box">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <?php if ($panelName == 'importStockFromAddStockPanel') { ?>
                                <td class="portlet-title caption" >
                                    <div class="main_link_brown16" 
                                         style="margin-left: 10px;font-weight:bold;">
                                        IMPORT STOCK PANEL
                                    </div>
                                </td>
                        <?php } else { ?>
                        <?php if ($invPanelName != 'RawMoveToStock') { ?>
                            <td width="26px" style="text-align:center;vertical-align: middle;padding-top: 2px;">
                                <img src="<?php echo $documentRootBSlash; ?>/images/addGold20.png" alt="Add Stock" />
                            </td>
                            <td class="portlet-title caption" >
                                <div class="main_link_brown16">
                                    <?php if ($panelName == 'catalogueStock' || $panelName == 'updateCatalogueStock') { ?>
                                        ADD FINE CATALOGUE STOCK
                                    <?php } else { ?>
                                        <?php if ($stockType == "retailStock" || $stockType == "retail") { 
                                                    //
                                                    if ($transPanelDetailsDisplay == 'UpdateStockMismatchProductDetails' || 
                                                        $transPanelDetailsDisplay == 'StockMismatchStockPurityPanel') { ?>
                                                        UPDATE STOCK 
                                                    <?php } else { ?>
                                                        ADD JEWELLERY RETAIL STOCK - (OPENING STOCK)
                                                    <?php } ?>
                                        <?php } else { ?>
                                            ADD JEWELLERY WHOLESALE STOCK - (OPENING STOCK)
                                        <?php } ?>
                                    </div>
                                </td>
                            <?php } ?>
                        <?php } ?>
                        <?php } ?>  
                        <td align="center" valign="middle">
                            <div id="messDisplayDiv"></div>
                            <div <?php if ($panelName == 'importStockFromAddStockPanel' || $showDiv == 'DataImportedSuccessfully') { ?>
                                    class="analysis_div_rows main_link_green12"
                                <?php } else { ?>
                                    class="analysis_div_rows main_link_red_12"
                                <?php } ?> >
                                    <?php if ($showDiv == 'StockAlreadyExists') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Product Code Already Present, Please Enter Different ~ </div>
                                <?php } else if ($showDiv == 'InvAlreadyExists') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Invoice Already Present, Please Enter Different Invoice Number ~ </div>
                                <?php } else if ($showDiv == 'Please Enter Remaining GS WT') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Please Enter Remaining GS WT ~ </div>
                                <?php } else if ($showDiv == 'Please Enter Remaining QTY') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Please Enter Remaining QTY ~ </div>
                                <?php } else if ($showDiv == 'GreaterQTYExists') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ You Have Enter More QTY Than Your Stock, Please Enter Correct QTY ~ </div>
                                <?php } else if ($showDiv == 'GreaterGSWTExists') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ You Have Enter More GS WT Than Your Stock, Please Enter Correct GS WT ~ </div>
                                <?php } else if ($showDiv == 'StockImportedSuccessfully') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Stock Imported Successfully! ~ </div>
                                <?php } else if ($showDiv == 'DataImportedSuccessfully') { // FOR ALL TAG IMPORT MESSAGE DISPLAY @PRIYANKA-16DEC2021 ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Data Imported Successfully! ~ </div>                                
                                <?php } ?>  
                            </div>
                        </td>
                        <td align="right">
                            <div id="main_ajax_loading_div" style="visibility: hidden; background:none;">
                                <img src="<?php echo $documentRootBSlash; ?>/images/ajaxMainLoading.gif" />
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div id="stockPanelSubDiv">
        <?php
        //
        // Start Code for Import Data From CSV File to Mysql Database for TAG Entries @PRIYANKA-13DEC2021
//        if ($invPanelName == 'AddByInv') {
            //
            if ($utransInvId == '' || $utransInvId == NULL) {
                //
                $mainEntryId = $_GET['mainEntryId'];
                //
                if ($mainEntryId != '' && $mainEntryId != NULL) {
                    $utransInvId = $mainEntryId;
                }
                //
            }
            //
            //action="omAddJwelleryRetailStockImportFile.php"
            //
            ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                <tr>                                      
                    <td  valign="top">
                        <div class="main_link_brown16" align="left" style="font-weight:bold;">
                            IMPORT TAG STOCK                    
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="border-color-grey-b">
                        <table align="left" border="0" cellspacing="0" cellpadding="2" width="100%">
                            <tr>
                                <td align="left" class="printVisibilityHidden paddingTop4 textLabel14CalibriBrownBold">
                                    <form name="fileUpload" id="fileUpload" enctype="multipart/form-data" method="post"
                                          action="omTagStockImportFile.php">
                                        <input type="hidden" id="tag_st_id" name="tag_st_id" value="<?php echo $utransInvId; ?>"/>
                                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $userId; ?>"/>
                                        <input type="hidden" name="tagStockType" id="tagStockType" value="retail" />
                                        <table border="0" cellspacing="0" cellpadding="0" valign="top" >
                                            <tr>                                      
                                                <td align="right" valign="top">
                                                    <input type="file" name="CVSFile" id="CVSFile" required="required" />
                                                </td>
                                                <td align="right" valign="top">
                                                    <!---Start to Changes button----->
                                                    <div>
                                                        <?php
                                                        $inputId = "submit";
                                                        $inputType = 'submit';
                                                        $inputFieldValue = 'Submit';
                                                        $inputIdButton = "submit";
                                                        $inputNameButton = '';
                                                        $inputTitle = '';
                                                        //
                                                        // This is the main class for input flied
                                                        $inputFieldClass = 'btn ' . $om_btn_style;
                                                        $inputStyle = "background:#BED8FD;color: #0F118A;border: 1px solid #7ab0fe;border-radius: 5px !important;font-size: 15px;";
                                                        $inputLabel = 'Import'; // Display Label below the text box
                                                        //
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
//                                                      
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <?php
//        }
        // End Code for Import Data From CSV File to Mysql Database for TAG Entries @PRIYANKA-13DEC2021
        ?>
        <?php
        //
        $stockDetPanel = $_GET['stockDetPanel'];
        $itemPreId = $_GET['preId'];
        //
        if ($panelName == 'importStockFromAddStockPanel') {
            //
            include 'omImportStockAddStockPanel.php';
            //
        } else {
            //START CODE FOR FINE STOCK : AUTHOR @DARSHANA 14 FEB 2022
            include 'omadrwmtfnst.php';
        }
        //
        ?>
    </div>
</div>


