<?php
/*
 * **************************************************************************************
 * @Description: REPAIR ORDER FILE @PRIYANKA-03APR2021
 * **************************************************************************************
 *
 * Created on APR 03, 2021 12:05 PM
 *
 * @FileName: omrwmomf.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.7.45
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-03APR2021
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.45
 * Version: 2.7.45
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<div class="supp_middle_body" id="supp_middle_body"> 
<?php
    //
    $userId = $_POST['userId'];
    //
    if ($userId == '' || $userId == NULL) {
        $userId = $_GET['userId'];
    }
    //
    if ($userId == '' || $userId == NULL) {
        $userId = $_REQUEST['custId'];
    }
    //
    //echo '$userId == ' . $userId;
    //
    if($suppId == '') 
       $suppId = $userId;
    //
    if ($mainPanel == '')
        $mainPanel = $_GET['mainPanel'];
    //
    if ($metType == '') {
        $metType = $_GET['metType'];
    }
    //
    //echo $metType;die;
    //
    $upPanelName = $_POST['upPanelName'];
    //
    if ($upPanelName == '') {
        $upPanelName = $_GET['upPanelName'];
    }
    //
    $suppPanelName = $_POST['panel'];
    //
    if ($suppPanelName == '') {
        $suppPanelName = $_GET['panel'];
    }
    //
    $panelName = $_POST['suppPanelName'];
    //
    if ($panelName == '') {
        $panelName = $_GET['suppPanelName'];
    }
    //
    if ($panelName == '') {
        //
        $panelName = $_POST['invPanel'];
        //
        if ($invPanel == '') {
            $invPanel = $_GET['invPanel'];
        }
    }
    //
    ?>
    <div class="main_middle_cust_list">
        <table border="0" cellspacing="0" cellpadding="2" class="spaceLeft5" width="100%">
            <tr>
            </tr>
        </table>
        <table>
            <tr>
                <td align="left" colspan="2">
                    <div id="admnDepositMoneyDiv" class="spaceLeft10">
                    </div>
                </td>
            </tr>
        </table>
        <table border="0" cellspacing="0" cellpadding="0" width="100%" class="border-top">
            <tr>
                <td align="left">
                    <div id="supplierCrystalPurchasePanel">
                        <?php
                            //
                            $transactionPanel = $_GET['transactionPanel'];
                            //
                            //echo '$transactionPanel == '.$transactionPanel;
                            //
                            if ($transactionPanel == '' || $transactionPanel == NULL) {
                                if ($metType == 'SELL')
                                    $transactionPanel = 'RawSell';
                                else
                                    $transactionPanel = 'RawPurchase';
                            }
                            //
                            include 'omrwiadv.php';
                            //
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>