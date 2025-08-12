<?php
/*
 * **************************************************************************************
 * @Description: STOCK TRANSFER REPORT ALL BUTTONS FILE @PRIYANKA-22JULY2022
 * **************************************************************************************
 *
 * Created on JULY 22, 2022 03:00:00 PM 
 * **************************************************************************************
 * @FileName: omStockTransferReportAllButtons.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.166
 * @version 2.7.166
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 * *****************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-22JULY2022
 *  AUTHOR: 
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.166
 * Version: 2.7.166
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpsbac.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId'];
//
$styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:20px;z-index:1;position:relative;";
//
?>
<table align="left" width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
        <td>
            <div class="textLabelHeading">
                <?php if ($headingNameForPanel == 'STOCK TRANSFER') { 
                    $styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:20px;z-index:1;position:relative;";
                ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                STOCK TRANSFER
                <?php                
                } else if ($headingNameForPanel == 'STOCK TRANSFER REPORT') { 
                    $styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:52px;z-index:1;position:relative;";
                ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                STOCK TRANSFER REPORT
                <?php                 
                } else if ($headingNameForPanel == 'STOCK TRANSFER HISTORY') { 
                    $styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:53px;z-index:1;position:relative;";
                ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                STOCK TRANSFER HISTORY
                <?php                
                } else if ($headingNameForPanel == 'STOCK TRANSFER LIST') { 
                    $styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:47px;z-index:1;position:relative;";
                ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                <span>STOCK TRANSFER LIST</span>
                <?php                 
                } else if ($headingNameForPanel == 'STOCK TRANSFER PENDING APPROVAL LIST') { 
                    $styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:82px;z-index:1;position:relative;";
                ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                <span>STOCK TRANSFER - PENDING APPROVAL LIST</span>
                <?php                 
                } else if ($headingNameForPanel == 'STOCK TRANSFER APPROVED LIST') { 
                    $styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:66px;z-index:1;position:relative;";
                ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                <span>STOCK TRANSFER - APPROVED LIST</span>
                <?php                
                } else if ($headingNameForPanel == 'STOCK TRANSFER RETURN LIST') { 
                    $styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:62px;z-index:1;position:relative;";
                ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                <span>STOCK TRANSFER - RETURN LIST</span>
               <?php } else if ($headingNameForPanel == 'STOCK TRANSFER VOUCHER LIST') { 
                    $styleButton = "border-radius: 4px !important; background-color: #ebedf2; width:62px;z-index:1;position:relative;";
                ?>
                <img src="<?php echo $documentRootBSlash; ?>/images/transfer24.png" alt="">
                <span>STOCK TRANSFER - VOUCHER LIST</span>
                <?php } ?>
            </div>
        </td> 
        <?php if ($headingNameForPanel == 'STOCK TRANSFER LIST') { ?>
        <td align="center" valign="middle">
            <div id="messDisplayDiv"></div>
            <div <?php if ($showDiv == 'StockTransferSuccessfully') { ?>
                    class="analysis_div_rows main_link_green12"
                <?php } else { ?>
                    class="analysis_div_rows main_link_red_12"
                <?php } ?> >
                    <?php if ($showDiv == 'StockTransferSuccessfully') { ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Stock Transfer Successfully ~ </div>
                <?php } ?>  
            </div>
        </td>
        <?php } ?> 
        <?php if ($headingNameForPanel == 'STOCK TRANSFER PENDING APPROVAL LIST') { ?>
        <td align="center" valign="middle">
            <div id="messDisplayDiv"></div>
            <div <?php if ($showDiv == 'StockApprovedSuccessfully' || $showDiv == 'StockReturnedSuccessfully') { ?>
                    class="analysis_div_rows main_link_green12"
                <?php } else { ?>
                    class="analysis_div_rows main_link_red_12"
                <?php } ?> >
                <?php if ($showDiv == 'StockApprovedSuccessfully') { ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Stock Approved Successfully ~ </div>
                <?php } ?>
                <?php if ($showDiv == 'StockReturnedSuccessfully') { ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Stock Returned Successfully ~ </div>
                <?php } ?> 
            </div>
        </td>
        <?php } ?>
        <?php if ($headingNameForPanel == 'STOCK TRANSFER APPROVED LIST') { ?>
        <td align="center" valign="middle">
            <div id="messDisplayDiv"></div>
            <div <?php if ($showDiv == 'StockAddedSuccessfully') { ?>
                    class="analysis_div_rows main_link_green12"
                <?php } else { ?>
                    class="analysis_div_rows main_link_red_12"
                <?php } ?> >
                    <?php if ($showDiv == 'StockApprovedDeletedSuccessfully') { ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Stock Deleted Successfully And Transferred To Pending Approval List Successfully ~ </div>
                <?php } ?>  
            </div>
        </td>
        <?php } ?>
        <?php if ($headingNameForPanel == 'STOCK TRANSFER RETURN LIST') { ?>
        <td align="center" valign="middle">
            <div id="messDisplayDiv"></div>
            <div <?php if ($showDiv == 'StockReturnedSuccessfully') { ?>
                    class="analysis_div_rows main_link_green12"
                <?php } else { ?>
                    class="analysis_div_rows main_link_red_12"
                <?php } ?> >
                    <?php if ($showDiv == 'StockReturnedSuccessfully') { ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Stock Returned Successfully ~ </div>
                <?php } ?>  
            </div>
        </td>
        <?php } ?>
         <!--START CODE STOCK TRANSFER IMPORT BUTTON @AUTHOR:DNYANESHWARI 21AUG2024-->
         <?php if ($headingNameForPanel != 'STOCK TRANSFER VOUCHER LIST') { ?>
        <td width="150px">
          <button type="button" id="buttondivshowhide" name="" onclick="showdivhide()" value="Submit" class="btn om_btn_style" style="width:100%;height:28px;font-size: 16px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600;text-transform: uppercase; ">
                    <span>TRANSFER STOCK</span>
                </button> 
        </td> 
         <?php } ?>
         <!--START CODE STOCK TRANSFER IMPORT BUTTON @AUTHOR:DNYANESHWARI 21AUG2024-->
        <td>
            <div class="m-portlet__body">
                <ul class="nav nav-pills nav-pills--warning nav-fill" role="tablist" style="height: 28px;">
                    <li class="nav-item dropdown" style="<?php echo $styleButton; ?>">
                        <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false" 
                                onclick="stockManagementByCounter('StockManagementByCounter');"
                                style="font-size: 16px;" >
                            STOCK TRANSFER
                        </button>
                        <button type="button" class="nav-link-inline-block dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                        <div class="dropdown-menu">
                            <?php
                            // 
                            // Stock Transfer (B or A)
                            if ($_SESSION['sessionOwnIndStr'][18] = 'A' || $_SESSION['sessionOwnIndStr'][18] = 'B') {
                                ?>                                            
                                <!--ADDED CODE FOR STOCK MANAGEMENT BY COUNTER @PRIYANKA-26JULY2022-->
                                <a class="dropdown-item" data-toggle="tab" onclick="stockManagementByCounter('StockManagementByCounter');">
                                    STOCK TRANSFER
                                </a>

                                <!-- START TO ADD CODE FOR STOCK TRANSFER LIST @PRIYANKA-26JULY2022 -->
                                <!--ADDED STAFF ACCESS FOR HIDE/SHOW STOCK TRANSFER LIST @SIMRAN:03JAN2023-->
                                <?php if ($staffId == '' || ($staffId && $array['stockReportAccessStTrans'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="stockTransferAllReportFunc('tagStockTransferList');">
                                    STOCK TRANSFER LIST
                                </a>
                                <?php } ?>
                                <!-- END TO ADD CODE FOR STOCK TRANSFER LIST @PRIYANKA-26JULY2022 -->

                                <!-- START TO ADD CODE FOR STOCK TRANSFER - APPROVAL PENDING LIST / APPROVED LIST @PRIYANKA-26JULY2022 -->
                                <!--ADDED STAFF ACCESS FOR HIDE/SHOW STOCK TRANSFER - PENDING APPROVAL LIST @SIMRAN:03JAN2023-->
                                 <?php if ($staffId == '' || ($staffId && $array['stockReportAccessStTrPendAppr'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="stockTransferAllReportFunc('tagStockApprovalPendingStockList');">
                                    STOCK TRANSFER - PENDING APPROVAL LIST
                                </a>
                                 <?php } ?>
                                <!--END CODE STAFF ACCESS FOR HODE/SHOW STOCK TRANSFER - PENDING APPROVAL LIST @SIMRAN:03JAN2023-->
                                <!--ADDED STAFF ACCESS FOR HIDE/SHOW STOCK TRANSFER - APPROVED LIST @SIMRAN:03JAN2023-->
                                <?php if ($staffId == '' || ($staffId && $array['stockReportAccessStTarAppr'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="stockTransferAllReportFunc('tagStockApprovedStockList');">
                                    STOCK TRANSFER - APPROVED LIST
                                </a>
                                <?php } ?>
                                
                                <!-- END TO ADD CODE FOR STOCK TRANSFER - APPROVAL PENDING LIST / APPROVED LIST @PRIYANKA-26JULY2022 -->

                                <!-- START TO ADD CODE FOR STOCK TRANSFER - RETURN LIST @PRIYANKA-26JULY2022 -->
                                 <!--ADDED STAFF ACCESS FOR STOCK TRANSFER - RETURN LIST @SIMRAN:03JAN2023-->
                                <?php if ($staffId == '' || ($staffId && $array['stockReportAccessStTrsRet'] == 'true')){ ?> 
                                <a class="dropdown-item" data-toggle="tab" onclick="stockTransferAllReportFunc('tagStockReturnStockList');">
                                    STOCK TRANSFER - RETURN LIST
                                </a>
                                <?php } ?>
                                <!-- END TO ADD CODE FOR STOCK TRANSFER - RETURN LIST @PRIYANKA-26JULY2022 -->
                                 <!--START CODE TO DISPLAY VOUCHER LIST @DNYANESHWARI 04SEPT2024-->
                                <a class="dropdown-item" data-toggle="tab" onclick="stockTransferAllReportFunc('stocktransmainvoucherlist');">
                                    STOCK TRANSFER - VOUCHER LIST
                                </a>
                               <!--START CODE TO DISPLAY VOUCHER LIST @DNYANESHWARI 04SEPT2024-->
                                <!-- START TO ADD CODE FOR STOCK TRANSFER REPORT @PRIYANKA-26JULY2022 -->
                                 <!--ADDED STAFF ACCESS FOR STOCK TRANSFER REPORT @SIMRAN:03JAN2023-->
                                <?php if ($staffId == '' || ($staffId && $array['stockReportAccessStTrRe'] == 'true')){ ?> 
                                <a class="dropdown-item" data-toggle="tab" onclick="stockTransferReportFunc('stockTransferReportPanel');">
                                    STOCK TRANSFER REPORT
                                </a>
                                <?php } ?>
                                <!-- END TO ADD CODE FOR STOCK TRANSFER REPORT @PRIYANKA-26JULY2022 -->

                                <!-- START TO ADD CODE FOR STOCK TRANSFER HISTORY @PRIYANKA-26JULY2022 -->
                                 <!--ADDED STAFF ACCESS FOR STOCK TRANSFER HISTORY @SIMRAN:03JAN2023-->
                                <?php if ($staffId == '' || ($staffId && $array['stockReportAccessStTrHis'] == 'true')){ ?> 
                                <a class="dropdown-item" data-toggle="tab" onclick="stockTransferHistoryFunc('stockTransferHistoryPanel');">
                                    STOCK TRANSFER HISTORY
                                </a>
                                <?php } ?>
                                <!-- END TO ADD CODE FOR STOCK TRANSFER HISTORY @PRIYANKA-26JULY2022 -->
                                <div class="dropdown-divider"></div>                                
                            <?php } ?>
                            <!--<a class="dropdown-item" data-toggle="tab" onclick="stockTransferPanel('STOCK TRANSFER');">STOCK TRANSFER</a>-->                            
                        </div>
                    </li>
                </ul>
            </div>   
        </td>                                         
<!--<td valign="middle" align="left" width="15%">
            <div id="stockTransferButtDiv"> 
                <?php
                //
                //* ************************************************************************************************
                //* START CODE FOR STOCK TRANSFER @PRIYANKA-02DEC2021
                //* ************************************************************************************************
                // 
                // // This is the main division class for input filed
                // 
//                $stockTransferPanelName = 'stockTransferPanel';
//                //
//                // Input Box Type and Ids
//                $inputType = 'submit';
//                $inputIdButton = 'stockTransferButt';
//                $inputNameButton = 'stockTransferButt';
//                //
//                //
//                // This is the main class for input flied
//                $inputFieldClass = 'btn btn-primary';
//                //
//                $inputStyle = 'height:22px;width:136px;font-weight:bold;font-size:12px;'
//                        . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                        . 'text-align:center; margin-left:27px; background-color: #FFC469; color: #AA6600;';
//                //
//                $inputLabel = 'STOCK TRANSFER'; // Display Label 
//                //
//                //
//                // This class is for Pencil Icon                                                           
//                $inputIconClass = 'fa fa-inr';
//                // 
//                // Place Holder inside input box
//                $inputPlaceHolder = 'STOCK TRANSFER';
//                //
//                // Place Holder in span outside input box
//                $spanPlaceHolderClass = '';
//                $spanPlaceHolder = '';
//                // 
//                // Event Options
//                //
//                // On Change Function
//                $inputOnChange = "";
//                $inputKeyUpFun = '';
//                //
//                //
//                //
//                $inputOnClickFun = 'stockManagementByCounter("StockManagementByCounter");';
//                //
//                $inputDropDownCls = '';               // This is the main division class for drop down 
//                $inputselDropDownCls = '';            // This is class for selection in drop down
//                $inputMainClassButton = '';           // This is the main division for Button
//                // 
//                //* **************************************************************************************
//                //* END CODE FOR STOCK TRANSFER @PRIYANKA-02DEC2021
//                //* **************************************************************************************
//                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                //
                //}
                ?>
            </div>
        </td>

        <td valign="middle" align="left" width="22%">
            <div id="stockTransferReportButtDiv"> 
                <?php
                //
                //* ************************************************************************************************
                //* START CODE FOR STOCK TRANSFER REPORT @PRIYANKA-02DEC2021
                //* ************************************************************************************************
                // 
                // // This is the main division class for input filed
                // 
//                $stockTransferPanelName = 'stockTransferReportPanel';
//                //
//                // Input Box Type and Ids
//                $inputType = 'submit';
//                $inputIdButton = 'stockTransferReportButt';
//                $inputNameButton = 'stockTransferReportButt';
//                //
//                //
//                // This is the main class for input flied
//                $inputFieldClass = 'btn btn-primary';
//                //
//                $inputStyle = 'height:22px;width:230px;font-weight:bold;font-size:12px;'
//                        . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                        . 'text-align:center; margin-left:6px; background-color: #6EE36E; color: #0C3C03;';
//                //
//                $inputLabel = 'STOCK TRANSFER REPORT'; // Display Label 
//                //
//                //
//                // This class is for Pencil Icon                                                           
//                $inputIconClass = 'fa fa-inr';
//                // 
//                // Place Holder inside input box
//                $inputPlaceHolder = 'STOCK TRANSFER REPORT';
//                //
//                // Place Holder in span outside input box
//                $spanPlaceHolderClass = '';
//                $spanPlaceHolder = '';
//                // 
//                // Event Options
//                //
//                // On Change Function
//                $inputOnChange = "";
//                $inputKeyUpFun = '';
//                //
//                //
//                $inputOnClickFun = 'stockTransferReportFunc("' . $stockTransferPanelName . '");';
//                //
//                $inputDropDownCls = '';               // This is the main division class for drop down 
//                $inputselDropDownCls = '';            // This is class for selection in drop down
//                $inputMainClassButton = '';           // This is the main division for Button
//                // 
//                //* **************************************************************************************
//                //* END CODE FOR STOCK TRANSFER REPORT @PRIYANKA-02DEC2021
//                //* **************************************************************************************
//                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                //
                //}
                ?>
            </div>
        </td>     

        <td valign="middle" align="left" width="15%">
            <div id="stockTransferHistoryButtDiv"> 
                <?php
                //
                //* ************************************************************************************************
                //* START CODE FOR STOCK TRANSFER HISTORY PANEL @PRIYANKA-02DEC2021
                //* ************************************************************************************************
                // 
                // // This is the main division class for input filed
                // 
//                $stockTransferHistoryPanelName = 'stockTransferHistoryPanel';
//                //
//                // Input Box Type and Ids
//                $inputType = 'submit';
//                $inputIdButton = 'stockTransferHistoryButt';
//                $inputNameButton = 'stockTransferHistoryButt';
//                //
//                //
//                // This is the main class for input flied
//                $inputFieldClass = 'btn btn-primary';
//                //
//                $inputStyle = 'height:22px;width:180px;font-weight:bold;font-size:12px;'
//                        . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                        . 'text-align:center;margin-left:8px; background-color: #ffc0cb;color:#dc143c;';
//                //
//                $inputLabel = 'STOCK TRANSFER HISTORY'; // Display Label 
//                //
//                //
//                // This class is for Pencil Icon                                                           
//                $inputIconClass = 'fa fa-inr';
//                // 
//                // Place Holder inside input box
//                $inputPlaceHolder = 'STOCK TRANSFER HISTORY';
//                //
//                // Place Holder in span outside input box
//                $spanPlaceHolderClass = '';
//                $spanPlaceHolder = '';
//                // 
//                // Event Options
//                //
//                // On Change Function
//                $inputOnChange = "";
//                $inputKeyUpFun = '';
//                //
//                //
//                $inputOnClickFun = 'stockTransferHistoryFunc("' . $stockTransferHistoryPanelName . '");';
//                //
//                $inputDropDownCls = '';               // This is the main division class for drop down 
//                $inputselDropDownCls = '';            // This is class for selection in drop down
//                $inputMainClassButton = '';           // This is the main division for Button
//                // 
//                //* **************************************************************************************
//                //* END CODE FOR STOCK TRANSFER HISTORY PANEL @PRIYANKA-02DEC2021
//                //* **************************************************************************************
//                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                //
                //}
                ?>
            </div>
        </td>
    </tr>
    <?php 
    //if ($headingNameForPanel != 'STOCK TRANSFER' && 
    //    $headingNameForPanel != 'STOCK TRANSFER REPORT' && 
    //    $headingNameForPanel != 'STOCK TRANSFER HISTORY') { 
    ?>
    <tr>
        <td>
            <div class="textLabelHeading"></div>
        </td>
        <td valign="middle" align="left" width="15%">
            <div id="stockTransferListButtDiv"> 
                <?php
                //
                //* ************************************************************************************************
                //* START CODE FOR STOCK TRANSFER LIST @PRIYANKA-22JULY2022
                //* ************************************************************************************************
                // 
                // // This is the main division class for input filed
                // 
                //
                // Input Box Type and Ids
//                $inputType = 'submit';
//                $inputIdButton = 'stockTransferListButt';
//                $inputNameButton = 'stockTransferListButt';
//                //
//                //
//                // This is the main class for input flied
//                $inputFieldClass = 'btn btn-primary';
//                //
//                $inputStyle = 'height:22px;width:136px;font-weight:bold;font-size:12px;'
//                        . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                        . 'text-align:center;color:#AA6600;margin-left:27px;background-color: #FFC469;';
//                //
//                $inputLabel = 'STOCK TRANSFER LIST'; // Display Label 
//                //
//                //
//                // This class is for Pencil Icon                                                           
//                $inputIconClass = 'fa fa-inr';
//                // 
//                // Place Holder inside input box
//                $inputPlaceHolder = 'STOCK TRANSFER LIST';
//                //
//                // Place Holder in span outside input box
//                $spanPlaceHolderClass = '';
//                $spanPlaceHolder = '';
//                // 
//                // Event Options
//                //
//                // On Change Function
//                $inputOnChange = "";
//                $inputKeyUpFun = '';
//                //
//                //
//                $inputOnClickFun = 'stockTransferAllReportFunc("tagStockTransferList");';
//                //
//                $inputDropDownCls = '';               // This is the main division class for drop down 
//                $inputselDropDownCls = '';            // This is class for selection in drop down
//                $inputMainClassButton = '';           // This is the main division for Button
//                // 
//                //* **************************************************************************************
//                //* END CODE FOR STOCK TRANSFER LIST @PRIYANKA-22JULY2022
//                //* **************************************************************************************
//                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                //
                //}
                ?>
            </div>
        </td>

        <td valign="middle" align="left" width="22%">
            <div id="stockTransferPendingApprovalListButtDiv"> 
                <?php
                //
                //* ************************************************************************************************
                //*START CODE FOR STOCK TRANSFER - PENDING APPROVAL LIST @PRIYANKA-22JULY2022
                //* ************************************************************************************************
                // 
                // // This is the main division class for input filed
                // 
                //
                // Input Box Type and Ids
//                $inputType = 'submit';
//                $inputIdButton = 'stockTransferPendingApprovalListButt';
//                $inputNameButton = 'stockTransferPendingApprovalListButt';
//                //
//                //
//                // This is the main class for input flied
//                $inputFieldClass = 'btn btn-primary';
//                //
//                $inputStyle = 'height:22px;width:230px;font-weight:bold;font-size:12px;'
//                        . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                        . 'text-align:center; margin-left:6px; background-color: #6EE36E; color: #0C3C03;';
//                //
//                $inputLabel = 'STOCK TRANSFER - PENDING APPROVAL LIST'; // Display Label 
//                //
//                //
//                // This class is for Pencil Icon                                                           
//                $inputIconClass = 'fa fa-inr';
//                // 
//                // Place Holder inside input box
//                $inputPlaceHolder = 'STOCK TRANSFER - PENDING APPROVAL LIST';
//                //
//                // Place Holder in span outside input box
//                $spanPlaceHolderClass = '';
//                $spanPlaceHolder = '';
//                // 
//                // Event Options
//                //
//                // On Change Function
//                $inputOnChange = "";
//                $inputKeyUpFun = '';
//                //
//                //
//                $inputOnClickFun = 'stockTransferAllReportFunc("tagStockApprovalPendingStockList");';
//                //
//                $inputDropDownCls = '';               // This is the main division class for drop down 
//                $inputselDropDownCls = '';            // This is class for selection in drop down
//                $inputMainClassButton = '';           // This is the main division for Button
//                // 
//                //* **************************************************************************************
//                //* END CODE FOR STOCK TRANSFER - PENDING APPROVAL LIST @PRIYANKA-22JULY2022
//                //* **************************************************************************************
//                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                //
                //}
                ?>
            </div>
        </td>

        <td valign="middle" align="left" width="18%">
            <div id="stockTransferApprovedListButtDiv"> 
                <?php
                //
                //* ************************************************************************************************
                //* START CODE FOR STOCK TRANSFER - APPROVED LIST @PRIYANKA-22JULY2022
                //* ************************************************************************************************
                // 
                // // This is the main division class for input filed
                // 
                //
                // Input Box Type and Ids
//                $inputType = 'submit';
//                $inputIdButton = 'stockTransferApprovedListButt';
//                $inputNameButton = 'stockTransferApprovedListButt';
//                //
//                //
//                // This is the main class for input flied
//                $inputFieldClass = 'btn btn-primary';
//                //
//                $inputStyle = 'height:22px;width:180px;font-weight:bold;font-size:12px;'
//                        . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                        . 'text-align:center; margin-left:8px; background-color: #ffc0cb;color:#dc143c;';
//                //
//                $inputLabel = 'STOCK TRANSFER - APPROVED LIST'; // Display Label 
//                //
//                //
//                // This class is for Pencil Icon                                                           
//                $inputIconClass = 'fa fa-inr';
//                // 
//                // Place Holder inside input box
//                $inputPlaceHolder = 'STOCK TRANSFER - APPROVED LIST';
//                //
//                // Place Holder in span outside input box
//                $spanPlaceHolderClass = '';
//                $spanPlaceHolder = '';
//                // 
//                // Event Options
//                //
//                // On Change Function
//                $inputOnChange = "";
//                $inputKeyUpFun = '';
//                //
//                //
//                $inputOnClickFun = 'stockTransferAllReportFunc("tagStockApprovedStockList");';
//                //
//                $inputDropDownCls = '';               // This is the main division class for drop down 
//                $inputselDropDownCls = '';            // This is class for selection in drop down
//                $inputMainClassButton = '';           // This is the main division for Button
//                // 
//                //* **************************************************************************************
//                //* END CODE FOR STOCK TRANSFER - APPROVED LIST @PRIYANKA-22JULY2022
//                //* **************************************************************************************
//                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                //
                //}
                ?>
            </div>
        </td>

        <td valign="middle" align="left" width="15%">
            <div id="stockTransferReturnListButtDiv"> 
                <?php
                //
                //* ************************************************************************************************
                //* START CODE FOR STOCK TRANSFER - RETURN LIST @PRIYANKA-22JULY2022
                //* ************************************************************************************************
                // 
                // // This is the main division class for input filed
                // 
                //
                // Input Box Type and Ids
//                $inputType = 'submit';
//                $inputIdButton = 'stockTransferReturnListButt';
//                $inputNameButton = 'stockTransferReturnListButt';
//                //
//                //
//                // This is the main class for input flied
//                $inputFieldClass = 'btn btn-primary';
//                //
//                $inputStyle = 'height:22px;width:170px;font-weight:bold;font-size:12px;'
//                        . 'padding-top:0px;margin-top:5px;margin-bottom:5px;border-radius: 5px !important;'
//                        . 'text-align:center;margin-right:6px; background-color: #89B2ED; color:#000080;';
//                //
//                $inputLabel = 'STOCK TRANSFER - RETURN LIST'; // Display Label 
//                //
//                //
//                // This class is for Pencil Icon                                                           
//                $inputIconClass = 'fa fa-inr';
//                // 
//                // Place Holder inside input box
//                $inputPlaceHolder = 'STOCK TRANSFER - RETURN LIST';
//                //
//                // Place Holder in span outside input box
//                $spanPlaceHolderClass = '';
//                $spanPlaceHolder = '';
//                // 
//                // Event Options
//                //
//                // On Change Function
//                $inputOnChange = "";
//                $inputKeyUpFun = '';
//                //
//                //
//                $inputOnClickFun = 'stockTransferAllReportFunc("tagStockReturnStockList");';
//                //
//                $inputDropDownCls = '';               // This is the main division class for drop down 
//                $inputselDropDownCls = '';            // This is class for selection in drop down
//                $inputMainClassButton = '';           // This is the main division for Button
//                // 
//                //* **************************************************************************************
//                //* END CODE FOR STOCK TRANSFER - RETURN LIST @PRIYANKA-22JULY2022
//                //* **************************************************************************************
//                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                //
                //}
                ?>
            </div>
        </td>-->
    </tr>
    <?php //} ?>
    <tr>
        <td colspan="8">
            <div class="hrGrey"></div>
        </td>
    </tr>
</table>