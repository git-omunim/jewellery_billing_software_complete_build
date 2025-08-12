<?php
/*
 * **************************************************************************************
 * @tutorial: RAW METAL ISSUE FORM : AUTHOR @ DARSHANA 16 SEPT 2021
 * **************************************************************************************
 * 
 * Created on 16 SEPT 2021 , 10:30 am
 *
 * @FileName: omrwmetisue.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.37
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-05MAR2021
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<div id="rawMetalIssueAddDiv">
    <input type="hidden" id="preOrdInvNo" name="preOrdInvNo" value="<?php echo $_REQUEST['preOrdInvNo']; ?>" />
    <input type="hidden" id="preOrdInvNo" name="postOrdInvNo" value="<?php echo $_REQUEST['postOrdInvNo']; ?>" />
    <?php
    //include 'ommptbupd255omg.php';

    /*     * **Start code to call OmLayoutTable to set Crystal panel ***** */

    $selStockPurOption = callOmLayoutTable('StockPurOption', '', 'select');
    if ($selStockPurOption == '')
        callOmLayoutTable('StockPurOption', 'RawStock', 'insert');
    else
        callOmLayoutTable('StockPurOption', 'RawStock', 'update');
    /*     * **End code to call OmLayoutTable to set Crystal panel *********** */

    if ($metType == '') {
        $metType = $_POST['metType'];
    }

    if ($metType == '') {
        $metType = $_GET['metType'];
    }

    $msg = $_GET['msg'];
    $rwprId = $_GET['rwprId'];
    $sessionOwnerId = $_SESSION[sessionOwnerId];

    if ($simButton == '') {
        $simButton = $_GET['simButton'];
    }

    if ($simButton == '') {
        $simButton = $_POST['simButton'];
    }

    if ($userId == '' || $userId == NULL) {
        $userId = $_REQUEST['custId'];
    }

    if ($suppId == '' || $suppId == NULL) {
        $suppId = $_REQUEST['custId'];
    }

    if ($mainPanelDiv == '') {
        $mainPanelDiv = $_GET['mainPanel'];
    }

    if ($transactionPanel == '') {
        $transactionPanel = $_GET['transactionPanel'];
    }

    if ($panelDivName == '')
        $panelDivName = $_GET['panelDivName'];

    if ($CustomerAddedHome == '')
        $CustomerAddedHome = $_GET['divMainMiddlePanel'];

    if ($mainPanel == '')
        $mainPanel = $_GET['mainPanel'];

    if ($panelName == '')
        $panelName = $_GET['rawPanelName'];

    if ($panelName == '')
        $panelName = $mainPanel;

    if ($mainPanel == '')
        $mainPanel = $panelName;

    if ($rawPanelName == '')
        $rawPanelName = $_GET['rawPanelName'];

//        echo '$mainPanel='.$mainPanel.'<br>';
//        echo '$mainPanelDiv == '.$mainPanelDiv.'<br />';
//        echo '$rwprId == ' . $rwprId . '<br />';
//        echo '$userId == '.$userId.'<br />';
//        echo '$suppId == '.$suppId.'<br />';
//        echo '$rawPanelName == '.$rawPanelName.'<br />';
//        echo '$metType == '.$metType.'<br />';
//        echo '$transactionPanel == '.$transactionPanel.'<br />';

    if ($transactionPanel == '' && $metType == 'BUY') {
        $transactionPanel = 'RawPurchase';
    }

    if ($transactionPanel == '' && $metType == 'SELL') {
        $transactionPanel = 'RawSell';
    }

//        include 'ogadcsrmdt.php';
    include 'omadcsrmisdt.php';
    parse_str(getTableValues("SELECT user_fname FROM user WHERE user_owner_id='$sessionOwnerId' AND user_id ='$userId'"));


    if ($user_fname == '')
        $user_fname = $sttr_brand_id;

    if ($sttr_brand_id == '')
        $sttr_brand_id = $user_fname;

    if ($custId == '')
        $custId = $_GET['custId'];

//        $rawPanelName = $panelName;
//        echo '$rawPanelName='.$rawPanelName.'<br>';

    include 'ogiartdv.php';

    if ($metType == 'BUY') {
        $hindiLabel = ' / RECIEVED / जमा';
        $transactionType = 'PURBYSUPP';
    } else if ($metType == 'SELL') {
        $hindiLabel = ' / ISSUE / UDHAAR / लेना';
        $transactionType = 'sell';
    }

    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
        //
        $sttrId = $_GET['rwprId'];
        //
        $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                . "and sttr_sttr_id = '$sttrId' and sttr_status NOT IN ('DELETED') "
                . "and sttr_indicator = 'stockCrystal' order by sttr_id asc";
        //
        $resCryDet = mysqli_query($conn, $qSelCryDet);
        $noOfCry = mysqli_num_rows($resCryDet);
        //
        //echo '$qSelCryDet == '.$qSelCryDet.'<br />';
        //echo '$noOfCry == '.$noOfCry.'<br />';
    }
    //
    //
        // *************************************************************************************************************
    // START CODE FOR TAX AND GST SETTING ON FORMS @AUTHOR-PRIYANKA-09MAR2021
    // *************************************************************************************************************
    //
        $selTaxAndGstSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'TaxAndGstSetting'";
    $resTaxAndGstSetting = mysqli_query($conn, $selTaxAndGstSettingQuery);
    $rowTaxAndGstSetting = mysqli_fetch_array($resTaxAndGstSetting);
    $TaxAndGstSettingValue = $rowTaxAndGstSetting['omly_value'];
    //
    // *************************************************************************************************************
    // END CODE FOR TAX AND GST SETTING ON FORMS @AUTHOR-PRIYANKA-09MAR2021
    // *************************************************************************************************************
    //
        //
        // ***********************************************************************************************************************
    // START CODE FOR HSN OPTION IN FORMS SETTING YES / NO @AUTHOR-PRIYANKA-22MAR2021
    // ***********************************************************************************************************************
    $selHSNOptionInFormsQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'HSNOptionInForms'";
    $resHSNOptionInForms = mysqli_query($conn, $selHSNOptionInFormsQuery);
    $rowHSNOptionInForms = mysqli_fetch_array($resHSNOptionInForms);
    $HSNOptionInForms = $rowHSNOptionInForms['omly_value'];
    
    $queryratenortecutoption = "SELECT omly_value FROM omlayout WHERE omly_option = 'ratenortecutoption'";
    $resratenortecutoption = mysqli_query($conn, $queryratenortecutoption);
    $rowUratenortecutoption = mysqli_fetch_array($resratenortecutoption);
    $sttr_ratecut_norate_option = $rowUratenortecutoption['omly_value'];
// ***********************************************************************************************************************
    // END CODE FOR HSN OPTION IN FORMS SETTING YES / NO @AUTHOR-PRIYANKA-22MAR2021
    // ***********************************************************************************************************************
    //omrwmetisuead
    //ogrwmtad
    ?>

    <form name="add_raw_issue" id="add_raw_issue"
          enctype="multipart/form-data" method="post"
          action="include/php/omrwmetisuead.php"   
          onsubmit="return addRawStock();">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td>
                    <table align="left" border="0" cellspacing="0" cellpadding="2" width="100%">
                        <tr>
                           <td class="">
                                <table>
                                    <tr>
                                        <td width="26px">
                                            <img src="<?php echo $documentRoot; ?>/images/img/stock.png" alt="Add Stock" height="22px"/>
                                        </td>
                                        <td class="portlet-title caption">
                                            <div class="main_link_brown16">
                                                <b>ADD RAW METAL ISSUE</b>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <div id="slPrDiv" 
                         onload="calculateRawMetalIssue();">
                        <!-- Start Code to Define Hidden inputs -->  
                        <input type="hidden" id="sttr_ratecut_norate_option" name="sttr_ratecut_norate_option" value="<?php echo $sttr_ratecut_norate_option; ?>" />
                        <input type="hidden" id="addItemValuation" name="addItemValuation"  />
                        <input type="hidden" id="addItemCryFinVal" name="addItemCryFinVal"  />
                        <input type="hidden" id="addItemCryCount" name="addItemCryCount"  />
                        <input type="hidden" id="commonPanel" name="commonPanel" value="<?php echo $commonPanel; ?>" />
                        <input type="hidden" id="noOfCry" name="noOfCry" value="<?php echo $noOfCry; ?>"/>
                        <input type="hidden" id="globalPlusKeyId" name="globalPlusKeyId"/>
                        <input id="sttr_final_valuation_by" name="sttr_final_valuation_by" value="<?php echo $sttr_final_valuation_by; ?>" type="hidden"/>
                        <input type="hidden" id="addItemCryFinVal" name="addItemCryFinVal"/>
                        <input type="hidden" id="addItemCryCount" name="addItemCryCount"/>
                        <input type="hidden" id="noOfCry" name="noOfCry" value="<?php echo $noOfCry; ?>"/>
                        <input type="hidden" id="itemDivCnt" name="itemDivCnt"/>
                        <input type="hidden" id="itemTotalCrystalVal" name="itemTotalCrystalVal"/>	                                
                        <input type="hidden" id="itstId" name="itstId" value="<?php echo $itstId; ?>"/>
                        <input type="hidden" id="itstId" name="itstId" value="<?php echo $itstId; ?>" />
                        <input type="hidden" id="sttr_barcode_prefix" name="sttr_barcode_prefix" value="<?php echo $sttr_barcode_prefix; ?>" />
                        <input type="hidden" id="sttr_barcode" name="sttr_barcode" value="<?php echo $sttr_barcode; ?>" />                                
                        <?php
                        if ($rawPanelName != 'SellDetUpPanel' && $rawPanelName != 'SellPayUp' &&
                                $rawPanelName != 'EstimateUpdate' && $rawPanelName != 'EstimatePayUp') {
                            ?>
                            <input type="hidden" id="sttr_sttr_id" name="sttr_sttr_id" value="<?php echo $itstId; ?>" />
                            <input type="hidden" id="sttr_st_id" name="sttr_st_id" value="<?php echo $itstId; ?>" />
                        <?php } ?>
                        <?php // echo '$panelName='.$panelName;?>

                        <input type="hidden" id="sellTotCrystal" name="sellTotCrystal" value="<?php echo $noOfCry; ?>" />
                        <input type="hidden" id="slPrId" name="slPrId" value="<?php echo $slPrId; ?>"/>
                        <!--<input type="hidden" id="slPrItemPurity" name="slPrItemPurity" value="<?php echo $newItemTunch; ?>"/>-->
                        <input type="hidden" id="valueAdd" name="valueAdd"/>
                        <input type="hidden" id="stockQty" name="stockQty" value="<?php echo $itst_quantity; ?>"/>
                        <input type="hidden" id="purchaseGsWt" name="purchaseGsWt" value="<?php echo $itpr_gs_weight; ?>"/>
                        <input type="hidden" id="autoEntry" name="autoEntry" value="<?php echo $omly_value; ?>"/>
                        <input type="hidden" id="totalSellQty" name="totalSellQty" value="<?php echo $sellQty; ?>"/>
                        <input type="hidden" id="totalPurQty" name="totalPurQty" value="<?php echo $totalPurQty; ?>"/>
                        <input type="hidden" id="sttr_final_val_by" name="sttr_final_val_by" value="<?php echo $metalWtBy; ?>"/>
                        <input type="hidden" id="slPrItemWtBy" name="slPrItemWtBy" value="<?php echo $metalWtBy; ?>"/>
                        <input type="hidden" id="sttr_other_charges_by" name="sttr_other_charges_by" value="<?php echo $stsl_othr_chrg_by_type; ?>" />
                        <input type="hidden" id="addItemLabourChgsBy" name="addItemLabourChgsBy" value="<?php echo $sttr_mkg_charges_by; ?>" />
                        <input id="slPrItemValuation" name="slPrItemValuation" type="hidden" placeholder="Item Val" value="<?php echo $custFinalValWithOutTax; ?>"/>
                        <input type="hidden" id="slPrMetalTotValuation" name="slPrMetalTotValuation" value="" />
                        <input type="hidden" id="sttr_stone_valuation" name="sttr_stone_valuation"/>
                        <input id="slPrCrystalTotTax" name="slPrCrystalTotTax" type="hidden"/>
                        <input id="slPrItemCryTax" name="slPrItemCryTax" type="hidden"  value="<?php echo $itst_cry_tax_charges; ?>" /> 
                        <input id="slPrCrystalValuation" name="slPrCrystalValuation" type="hidden" placeholder="CRYSTAL VALUATION" /><!--Code add hidden field -->
                        <input type="hidden" id="invoiceRow" name="invoiceRow" value="<?php echo $rowInvPostId; ?>" />
                        <input type="hidden" id="upPanel" name="upPanel" value="RawMetalIssue"/>
                        <input type="hidden" id="custId" name="custId" value="<?php echo $custId; ?>" />
                        <input type="hidden" id="sttr_stock_type" name="sttr_stock_type" value="<?php echo $newStockType; ?>" />
                        <input type="hidden" id="sttr_cust_wastg_by" name="sttr_cust_wastg_by" value="<?php echo $sttr_cust_wastg_by; ?>"/>
                        <input type="hidden" id="sttr_hallmark_uid" name="sttr_hallmark_uid" value="<?php echo $sttr_hallmark_uid; ?>"/>
                        <input type="hidden" id="rawPanelName" name="rawPanelName" value="<?php echo $rawPanelName; ?>"/>
                        <input type="hidden" id="payButClickId" name="payButClickId" value="false"/>
                        <input type="hidden" id="rawMetalpanel" name="rawMetalpanel" value="RawMetalPanel" />

                        <?php // echo '$rwprId='.$rwprId;?>
                        <input type="hidden" id="rwprId" name="rwprId" value="<?php echo $rwprId; ?>"/>
                        <input type="hidden" id="sttrId" name="sttrId" value="<?php echo $rwprId; ?>"/>
                        <?php // echo '$metType=' . $metType;  ?>
                        <input type="hidden" id="metType" name="metType" value="<?php echo $metType; ?>"/>
                        <?php
                        if ($rawPanelName != 'Estimate' && $rawPanelName != 'EstimateUpdate' &&
                                $rawPanelName != 'EstimatePayUp') {
                            ?>
                            <input type="hidden" id="sttr_indicator" name="sttr_indicator" value="rawMetal" />
                            <?php if ($sttr_transaction_type == 'ESTIMATESELL') { ?>
                                <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="ESTIMATESELL" />
                            <?php } else { ?>
                                <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="sell" />
                            <?php } ?>
                        <?php } else { ?>

                            <input type="hidden" id="sttr_indicator" name="sttr_indicator" value="rawMetal" />
                            <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="ESTIMATE" />

                        <?php } ?>

                        <input type="hidden" id="redirectionPanelName" name="redirectionPanelName" value="RawMetalIssue" />
                        <input type="hidden" id="rawIsePanelName" name="rawIsePanelName" value="<?php echo $panelName; ?>" />
                        <input type="hidden" id="addPanel" name="addPanel" value="RawMetalIssue" />
                        <input type="hidden" id="sttr_panel_name" name="sttr_panel_name" value="rawMetalIssue" />

                        <input type="hidden" id="addItemMkgChgBy" name="addItemMkgChgBy" value="<?php echo $sttr_mkg_charges_by; ?>" />
                        <input type="hidden" id="sttr_mkg_charges_by" name="sttr_mkg_charges_by" value="<?php echo $sttr_mkg_charges_by; ?>" />

                        <input type="hidden" id="setAdditionalSellCustWastg" name="setAdditionalSellCustWastg" 
                               value="<?php echo $setAdditionalSellCustWastg; ?>"/>

                        <input type="hidden" id="sellMetalNCustWstgValuationBySpecifiedWt" name="sellMetalNCustWstgValuationBySpecifiedWt" 
                               value="<?php echo $itemNValAdByFNWTOption; ?>"/>

                        <input type="hidden" id="additionalSellCustWastageWt" name="additionalSellCustWastageWt" />
                        <?php if ($rawPanelName != 'RawPayUp' || $rawPanelName != 'RawDetUpPanel') { ?>
                            <input type="hidden" id="addRawMetalIssue" name="addRawMetalIssue" value="RawMetalIssue" />
                        <?php } ?>
                        <?php
//                                echo '$rawPanelName=' . $rawPanelName;
                        if ($rawPanelName == 'RawPayUp' || $rawPanelName == 'RawDetUpPanel') {
                            ?>
                            <input type="hidden" id="updateRawMetalIssue" name="updateRawMetalIssue" value="RawMetalIssueUp" />
                        <?php } ?>

                        <!--------------------------------------------------------------->
                        <!-- START CODE FOR HIDDEN DISCOUNT INPUTS @PRIYANKA-31OCT2020 -->
                        <!--------------------------------------------------------------->
                        <input type="hidden" id="finalProductValuation" name="finalProductValuation" 
                               value="<?php echo $finalProductValuation; ?>" />
                        <input type="hidden" id="disc_product_amount" name="disc_product_amount" 
                               value="<?php echo $disc_product_amount; ?>" />
                        <input type="hidden" id="disc_making_discount" name="disc_making_discount" 
                               value="<?php echo $disc_making_discount; ?>" />
                        <input type="hidden" id="disc_product_discount" name="disc_product_discount" 
                               value="<?php echo $disc_product_discount; ?>" />
                        <input type="hidden" id="disc_stone_discount" name="disc_stone_discount" 
                               value="<?php echo $disc_stone_discount; ?>"/>
                        <!--------------------------------------------------------------->
                        <!-- END CODE FOR HIDDEN DISCOUNT INPUTS @PRIYANKA-31OCT2020 ---->
                        <!--------------------------------------------------------------->

                        <?php
                        include 'omrwmetisuehdv.php';
                        include 'omrwmetisueaddv.php';
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
        <!-------------------------------------------------->
        <!---Start code to show Invoice after item add------>
        <!-------------------------------------------------->
        <tr>
            <td align="center" width="100%">
                <div id="addRawMetalIssueStockInvoice">
                    <?php
                    $invPanel = 'RawInvoice';
//                    echo 'hiiii';
                    include 'omrwmetisindv.php';
                    ?>
                </div>
            </td>
        </tr>
        <!-------------------------------------------------->
        <!---End code to show Invoice after item add------>
        <!-------------------------------------------------->
    </table>
    <!-------------------------------------------------->
    <!---End code to add item add and payment div------->
    <!-------------------------------------------------->
</div>