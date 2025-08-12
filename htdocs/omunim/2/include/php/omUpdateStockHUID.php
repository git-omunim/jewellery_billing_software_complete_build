<?php
/*
 * **************************************************************************************
 * @Description: UPDATE HUID FILE @AUTHOR-PRIYANKA-15NOV2021
 * **************************************************************************************
 *
 * Created on NOV 15, 2021 13:43:43 PM
 *
 * @FileName: omUpdateStockHUID.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 2.7.96
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR-PRIYANKA-15NOV2021
 *  AUTHOR: @AUTHOR-PRIYANKA-15NOV2021
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.96 
 * Version: 2.7.96
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
?>
<div id="mainAddStockDiv">
    <?php
    //
    $panelName = $_GET['panelName'];
    $invPanelName = $_GET['invPanel'];
    //
    $utransInvId = $_GET['utransInvId'];;
    $stockType = $_GET['stockType'];
    //
    //echo '$panelName = '.$panelName.'<br />';
    //echo '$stockPanelName = '.$stockPanelName.'<br />';
    //echo '$invPanelName = '.$invPanelName.'<br />';
    //
    //echo '$utransInvId = '.$utransInvId.'<br />';
    //echo '$stockType = '.$stockType.'<br />';
    //
    if ($stockType == "wholesale") {
        $stockType = "wholeSaleStock";
    }
    //
    $mainPanelNew = 'StockPanel';
    //
    if ($stockType == '') {
        $selStockTypOption = callOmLayoutTable('StockTypOption', '', 'select');
        if ($selStockTypOption == '')
            callOmLayoutTable('StockTypOption', 'wholeSaleStock', 'insert');
        $stockType = $selStockTypOption;
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
                        <?php // class="analysis_div_rows main_link_red_12" ?>   
                        <td align="center" valign="middle">
                            <div id="messDisplayDiv"></div>
                            <div class="analysis_div_rows main_link_green12">
                                <?php if ($showDiv == 'StockImportedSuccessfully') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> 
                                        ~ Stock Imported Successfully! ~
                                    </div>
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
        $stockDetPanel = $_GET['stockDetPanel'];
        //
        $itemPreId = $_GET['preId'];
        //
        //if ($stockType == "wholeSaleStock") {
        //    include 'omUpdateWholeslaeStockHUID.php'; // UPDATE WHOLESALE STOCK HUID PANEL
        //} else {
            include 'omUpdateRetailStockHUID.php'; // UPDATE RETAIL STOCK HUID PANEL
        //}
        //
        ?>
    </div>
</div>