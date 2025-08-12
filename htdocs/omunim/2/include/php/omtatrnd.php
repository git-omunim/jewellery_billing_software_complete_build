<?php
/**
 * 
 * Created on Jul 26, 2011 11:57:06 AM
 *
 * @FileName: omtatrnd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
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

require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
/* * ******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
if ($_SESSION['sessionOwnIndStr'][3] == 'Y' || $_SESSION['sessionOwnIndStr'][3] == 'A' || $_SESSION['sessionOwnIndStr'][3] == 'B') {
    $sessionOwnerId = $_SESSION[sessionOwnerId];
//Start Code To Check Transaction Table Status
//    $sql = 'DESC transaction;';
//
//    mysqli_query($conn, $sql);
//
//    if (mysqli_errno($conn) == 1146) {
//        include 'tables/omtbtran.php';
//    }
//End Code To Check Transaction Table Status
    //
    $custId = $_REQUEST['custId'];
    //
    $selFirmId = NULL;
    if (isset($_GET['firmId'])) {
        $selFirmId = $_GET['firmId'];
    } else if (isset($_POST['firmId'])) {
        $selFirmId = $_POST['firmId'];
    }
    if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
        //if not selected assign session firm @AUTHOR: SANDY10JUL13
        $selFirmId = $_SESSION['setFirmSession'];
    }
//    echo '$selFirmId:' . $_SESSION['setFirmSession'];
    if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
        parse_str(getTableValues("SELECT firm_id FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_id asc"));
        $selFirmId = $firm_id;
    }


    $qSelPreVoucherNo = "SELECT transaction_pre_vch_id FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_firm_id='$selFirmId' order by UNIX_TIMESTAMP(transaction_ent_dat) desc LIMIT 0,1";
    $resPreVoucherNo = mysqli_query($conn, $qSelPreVoucherNo) or die(mysqli_error($conn));
    $rowPreVoucherNo = mysqli_fetch_array($resPreVoucherNo);

    $newTransPreVoucherNo = $rowPreVoucherNo['transaction_pre_vch_id'];

    /* Start code to display prevoucherId containing first letter of firm @AUTHOR:SANDY19JUL13 */
    $qselfname = "SELECT firm_name FROM firm where firm_id=' $selFirmId'";
    $rselfname = mysqli_query($conn, $qselfname);
    $rowselfname = mysqli_fetch_array($rselfname);
    $firm = $rowselfname['firm_name'];
    $firm = om_ucfirst($firm);
    $frm = substr($firm, 0, 1);


    /* End code to display prevoucherId containing first letter of firm @AUTHOR:SANDY19JUL13 */
//echo '$frm' .  $selFirmId;
    if ($newTransPreVoucherNo == NULL || $newTransPreVoucherNo == '') {
        if ($selFirmId) {
            $newTransPreVoucherNo = 'V' . $frm;  //to append first letter of firm name @AUTHOR: SANDY19JUL13 
        } else {
            $newTransPreVoucherNo = 'V';   //When all firm selected append * @AUTHOR: SANDY19JUL13
        }
        /* $qSelVoucherNo = "SELECT max(transaction_post_vch_id) as transVoucherId FROM transaction where transaction_own_id='$sessionOwnerId' and  transaction_firm_id=$selFirmId'";
          $resVoucherNo = mysqli_query($conn,$qSelVoucherNo);
          $rowVoucherNo = mysqli_fetch_array($resVoucherNo, MYSQLI_ASSOC); */
    } else {
        $qSelVoucherNo = "SELECT max(transaction_post_vch_id) as transVoucherId FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_firm_id='$selFirmId'";
        $resVoucherNo = mysqli_query($conn, $qSelVoucherNo);
        $rowVoucherNo = mysqli_fetch_array($resVoucherNo, MYSQLI_ASSOC);
    }
    $newTransPostVoucherNo = $rowVoucherNo['transVoucherId'] + 1;
    //
    //onload="document.getElementById('transFirmId').focus();"
    ?>
    <div id="mainMiddle">
        <table border="0" cellspacing="0" cellpadding="1" width="99.6%" align="center">
            <tr>
                <td align="left">
                    <table align="center" border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td valign="middle" align="left" width="34px">
                                <div class="analysis_div_rows">
                                    <?php if ($selFirmId == NULL) { ?> 
                                        <img src = "images/transactions32.png" onload = "document.getElementById('transToMainAcc').focus();"
                                             alt = "Daily Transactions" />
                                         <?php } else {
                                             ?>
                                        <img src="<?php echo $documentRoot; ?>/images/transactions32.png" onload = "document.getElementById('transFirmId').focus();"
                                             alt="Daily Transactions" />
                                         <?php } ?>
                                </div>
                            </td>
                            <td valign="middle" align="left" width="250px">
                                <div id="transactionPanel_div" class="analysis_div_rows textLabelHeading"> <!---change in class @AUTHOR: SANDY4DEC13--->
                                    TRANSACTION PANEL<!---CHANGE IN FONT @AUTHOR: SANDY30DEC13--->
                                </div>
                                <div id="paymentTransaction_div" class="analysis_div_rows textLabelHeading" style="display: none;"> <!---change in class @AUTHOR: SANDY4DEC13--->
                                    PAYMENT TRANSACTIONS<!---CHANGE IN FONT @AUTHOR: SANDY30DEC13--->
                                </div>
                            </td>
                            <!-------------------------------Add Buttons to switch in transaction payment panel--------------------------------->
                            <!---------------------------------------Modified By Harshad-------------------------------------------------------->
                            <td valign="middle" align="right" width="250px">
                                <div id="messDisplayDiv"></div>
                                <div id="mainMiddleNew">
                                    <?php
                                    $showTransactionAddedDiv = $_REQUEST['divMainMiddlePanel'];
                                    $addedTransactionPanel = $_REQUEST['addedTransactionPanel'];
                                    if ($showTransactionAddedDiv == "TransactionAdded") {
                                        include 'omzaaamg.php';
                                    } else if ($showTransactionAddedDiv == "TransactionUpdated") {
                                        include 'omzaaumg.php';
                                    } else if ($showTransactionAddedDiv == "TransactionDeleted") {
                                        include 'omzaadmg.php';
                                    } else if ($showTransactionAddedDiv != "TransactionPayment" && $showTransactionAddedDiv != 'TRANS_PAYMENT' &&
                                            $showTransactionAddedDiv != "DailyTransactions") {
                                        echo '<div class=main_link_red>' . $showTransactionAddedDiv . '</div>';
                                    }
                                    ?>
                                </div>
                            </td>
                            <td valign="middle" align="right">
                                <!---Start to Changes button @AUTHOR: DIKSHA27SEPT2018----->
                                <div style=" ">
                                    <?php
                                    $inputId = " ";
                                    $inputType = 'button';
                                    $inputFieldValue = 'ONE-ONE TRANSACTION';
                                    $inputIdButton = " ";
                                    $inputNameButton = ' ';
                                    $inputTitle = '';
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                    $inputStyle = " ";
                                    $inputLabel = 'ONE-ONE TRANSACTION'; // Display Label below the text box
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $inputOnClickFun = 'transactionPanel("' . $custId . '")';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>


                                    <?php
                                    $inputId = " ";
                                    $inputType = 'button';
                                    $inputFieldValue = 'MANY-MANY TRANSACTION';
                                    $inputIdButton = " ";
                                    $inputNameButton = ' ';
                                    $inputTitle = '';
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                    $inputStyle = " ";
                                    $inputLabel = 'MANY-MANY TRANSACTION'; // Display Label below the text box
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $inputOnClickFun = 'transactionPanelMany("' . $custId . '")';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
                                <!--<button class="frm-btn" onclick="transactionPanel()">TRANSACTION PANEL</button>-->
                                <!---End to Changes button @AUTHOR: DIKSHA27SEPT2018----->
                            </td>
                            <!-----------------------------------End// Modified By Harshad-------------------------------------------------------->
                             <td align="right" valign="middle" width="4%">
                                        <div id = "myModalExpenseHelp" class = "modal" style="display: none;"></div>
                                        <div id="addItemHelpButtDiv" title="Shortcut Key(Ctrl + Enter) !" style="padding-left:2px;padding-right:2px;position:relative;width:95px;margin-right:10px">
                                            <img src="<?php echo $documentRootBSlash; ?>/images/img/youtube.png" alt="" class="marginTop5" style="position: absolute;height: 16px;top:2px;left:9px"> 
                                            <div style="text-align:center;display:inline;">
                                                <button type="button" id="addItemSubButt" name="" value="HELP"  onclick="OpenHelpExpensepanel();" class="btn btn1 btn1Hover greyom_btn_style_nav" style="width:95px;height:30px;font-weight:bold;font-size:14px;text-align:center;color:#444;background:#e3e3e3;border-radius:5px!important;border: 1px solid #b0b0b0;">
                                                   <span>HELP </span>
                                                </button>
                                            </div>
                                        </div>
                                     </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <?php
                                $panelDivName = $_GET['panelDivName'];
                                //echo "panelDivName ==".$panelDivName;

                                if ($showTransactionAddedDiv == "DailyTransactions" && $panelDivName == "changeTransactionPanel") {
                                    include 'omDailyTransPayment.php';
                                }
                                //To show ERROR MSG @AUTHOR: SANDY27JAN14
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
<!--            <tr>
                <td align="right">
                    <hr color="#B8860B" />
                </td>
            </tr>-->
            <tr>
                <td align="center" valign="top">
                    <div id="mainTransactionDiv">
                        <?php
                        $selquery = "SELECT transaction_panel FROM transaction WHERE transaction_pre_vch_id IS NOT NULL AND transaction_post_vch_id IS NOT NULL ORDER BY transaction_id DESC LIMIT 0,1";
                        $querySelect = mysqli_query($conn, $selquery);
                        $noOfRows = mysqli_num_rows($querySelect);
                        $resQuery = mysqli_fetch_array($querySelect, MYSQLI_ASSOC);
                        $transaction_panel = $resQuery['transaction_panel'];
                        //
                        $transUpPanel = $_GET['transUpPanel'];
                        //
                        if ($showTransactionAddedDiv == 'TransactionPayment') {
                            include 'omtransactionPanel.php';
                        } else if ($showTransactionAddedDiv == 'DailyTransactions' && $panelDivName != "TRANS_PAYMENT") {
                            include 'omDailyTransPayment.php';
                        } else if ($showTransactionAddedDiv == "DailyTransactions" && $panelDivName == "TRANS_PAYMENT") {
                            include 'omGstTransList.php';
                        } else if ($showTransactionAddedDiv == "TransactionUpdated" && $transUpPanel == 'oldTransaction') {
                            include 'omtatrndsb.php';
                        } else {
                            if ($transaction_panel == 'NEW_TRANS_PANEL' || $addedTransactionPanel == 'NEW_TRANS_PANEL' || $noOfRows <= 0) {
                                include 'omtatrndsb_new.php';
                            } else {
                                include 'omtatrndsb.php';
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
<?php } ?>
<!-------------End code to add panel indiacator @Author:PRIYA16MAY14--------------->