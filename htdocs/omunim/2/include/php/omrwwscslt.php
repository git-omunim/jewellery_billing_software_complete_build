<?php
/*
 * **************************************************************************************
 * @Description: ASSIGNED ORDERS LIST @PRIYANKA-05JUNE2021
 * **************************************************************************************
 *
 * Created on June 05, 2021 05:44:21 PM
 *
 * @FileName: omrwwscslt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-05JUNE2021
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 3.0.0
 * Version: 3.0.0
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
<div class="supp_middle_body" id="SuppMetalItemListDiv"> 
    <?php
    //
    //print_r($_REQUEST);
    //
    $userId = $_POST['userId'];
    //
    if ($userId == '' || $userId == NULL) {
        $userId = $_GET['userId'];
    }
    //
    if ($userId == '' || $userId == NULL) {
        $userId = $_GET['custId'];
    }
    //
    $transType = $_POST['transType'];
    //
    if ($transType == '') {
        $transType = $_GET['transType'];
    }
    //
    if ($transType == '') {
        $transType = $_GET['transactionType'];
    }
    //
    if ($transType == '') {
        $transType = $_GET['type'];
    }
    //
    if($_GET['metType']!='')
       $transType=$_GET['metType'];
    //
    if ($mainPanel == '') {
        $mainPanel = $_GET['mainPanel'];
    }
    //
    if ($divName == '') {
        $divName = $_GET['divName'];
    }
    //
    if ($mainPanel == 'Supplier') { 
        $divName = 'supp_middle_body';
    }
    //
    //echo '$mainPanel == '.$mainPanel.'<br />';
    //
    $sessionOwnerId = $_SESSION[sessionOwnerId];
    //
    ?>
    <div class="main_middle_cust_list">
        <table border="0" cellspacing="0" cellpadding="2" class="spaceLeft5" width="100%">
            <tr>
                <td align="left" colspan="17">
                    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td align="center" width="100%">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
                                    <tr>
                                        <td valign="middle" align="left">
                                            <div class="ff_calibri fs_16 main_link_brown" style="margin-left: -3px;">
                                                ORDER'S IN PROGRESS LIST
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td align="right" valign="middle">
                                <div id="messDisplayDiv"></div>
                            </td>
                        </tr>
                    </table>
                </td>                
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
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left">
                    <div id="supplierCrystalPurchasePanel">
                        <?php
                        include 'omrwwscsllt.php';
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>