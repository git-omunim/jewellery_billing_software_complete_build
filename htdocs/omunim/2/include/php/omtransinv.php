<?php
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
//
$transaction_pre_vch_id = $_GET['slPrPreInvoiceNo'];
$transaction_post_vch_id = $_GET['slPrInvoiceNo'];
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

$selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
$rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
$nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];
//
$selexpenseInvoice = "SELECT omly_value FROM omlayout WHERE omly_option = 'expenseInvLay'";
$resexpenseInvoice = mysqli_query($conn, $selexpenseInvoice);
$rowexpenseInvoice = mysqli_fetch_array($resexpenseInvoice);
$expenseInvoice = $rowexpenseInvoice['omly_value'];
if ($expenseInvoice == 'expenseInvLayA4' || $expenseInvoice == '') {
    $width = 793;
    $fontSize = '14px';
}
if ($expenseInvoice == 'expenseInvLayA5') {
    $width = 559;
    $fontSize = '13px';
}
if ($expenseInvoice == 'expenseInvLayA6') {
    $width = 396;
    $fontSize = '12px';
}
if ($expenseInvoice == 'expenseInvLay80mm') {
    $width = 302;
    $fontSize = '11px';
}
//
$qSelTransSub = "SELECT * FROM transaction WHERE transaction_own_id='$_SESSION[sessionOwnerId]' AND transaction_pre_vch_id='$transaction_pre_vch_id' "
        . "AND transaction_post_vch_id='$transaction_post_vch_id'";
$resTransSub = mysqli_query($conn, $qSelTransSub);
$rowTransSub = mysqli_fetch_array($resTransSub, MYSQLI_ASSOC);
//
$transaction_id = $rowTransSub['transaction_id'];
$transaction_panel = $rowTransSub['transaction_panel'];
$transaction_pre_vch_no = $rowTransSub['transaction_pre_vch_id'];
$transaction_post_vch_no = $rowTransSub['transaction_post_vch_id'];
$transaction_supp_vch_id = $rowTransSub['transaction_supp_vch_id'];
$transaction_date = $rowTransSub['transaction_DOB'];
$transaction_subject = $rowTransSub['transaction_sub'];
$transaction_category = $rowTransSub['transaction_cat'];
$transaction_user_id = $rowTransSub['transaction_user_id'];
$transaction_amt = $rowTransSub['transaction_amt'];
//
parse_str(getTableValues("SELECT user_fname,user_lname,user_prefix_name,user_father_name,user_add,user_official_address,user_current_address,user_mobile,user_phone,user_cst_no FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$transaction_user_id'"));
//
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Online Munim &mdash; Girvi Software, Jewellery Software, Jewellery &amp; Money Lending Accounting Software...</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <style>
            .expenseInvoice{
                font-family: calibri;
                font-size: <?php echo $fontSize; ?> !important;
            }
        </style>
    </head>
    <body>
        <div class="expenseInvoice" style="height: auto;">
            <table align="center" valign="middle" style="width: <?php echo $width; ?>px; height:auto;border:1px black solid;">
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td align="left">
                                    <table>
                                        <tr>
                                            <td align="left" style="font-weight: bold;">
                                                PARTY NAME
                                            </td>
                                            <td style="font-weight: bold;"> &nbsp;: </td>
                                            <td style="font-weight: bold;">
                                                <?php
                                                if ($user_fname != '') {
                                                    echo strtoupper($user_prefix_name) . ' ' . strtoupper($user_fname) . ' ' . strtoupper(substr($user_father_name, 1)) . ' ' . strtoupper($user_lname);
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td> 
                                        </tr>                                
                                    </table>
                                </td>
                                <td align="right">
                                    <table>
                                        <tr>
                                            <td align="right" style="font-weight: bold;">
                                                <?php if ($width < 310) { ?>
                                                    V NO
                                                <?php } else { ?>
                                                    VOUCHER NO
                                                <?php } ?>
                                            </td>
                                            <td style="font-weight: bold;">&nbsp;: </td>
                                            <td style="font-weight: bold;">
                                                <?php
                                                echo $transaction_pre_vch_no . '' . $transaction_post_vch_no;
                                                ?>
                                            </td> 
                                        </tr>                                
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td align="left">
                                    <table>
                                        <tr>
                                            <td align="left" style="font-weight: bold;">
                                                ADDRESS
                                            </td>
                                            <td style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td>
                                                <?php
                                                if ($user_add != '') {
                                                    echo strtoupper($user_add);
                                                } else if ($user_current_address != '') {
                                                    echo strtoupper($user_current_address);
                                                } else if ($user_official_address != '') {
                                                    echo strtoupper($user_official_address);
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td> 
                                        </tr>                                
                                    </table>
                                </td>
                                <td align="right">
                                    <table>
                                        <tr>
                                            <td align="right" style="font-weight: bold;">
                                                    P. V. NO
                                            </td>
                                            <td style="font-weight: bold;"> 
                                                <?php if ($width < 310) { ?>

                                                <?php } else { ?>
                                                    :
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php echo $transaction_supp_vch_id; ?>
                                            </td> 
                                        </tr>                                
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td align="left">
                                    <table>
                                        <tr>
                                            <td align="left" style="font-weight: bold;">
                                                MOBILE NO
                                            </td>
                                            <td style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;: </td>
                                            <td>
                                                <?php
                                                if ($user_mobile != '') {
                                                    echo strtoupper($user_mobile);
                                                } else if ($user_phone != '') {
                                                    echo $user_phone;
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td> 
                                        </tr>                                
                                    </table>
                                </td>
                                <td align="right">
                                    <table>
                                        <tr>
                                            <td align="right" style="font-weight: bold;">
                                                <?php if ($width < 310) { ?>

                                                <?php } else { ?>
                                                    DATE
                                                <?php } ?>
                                            </td>
                                            <td style="font-weight: bold;"> 
                                                <?php if ($width < 310) { ?>

                                                <?php } else { ?>
                                                    :
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($nepaliDateIndicator == 'YES'){
                                                    $date_comp = explode(' ',$transaction_date);
                                                    $day = $date_comp[0];
//                                                    $month = $date_comp[1];
//                                                    $month = date('f',$transaction_date);
                                                    $timestamp = strtotime($transaction_date);
                                                    // Get the month number from the timestamp
                                                    $monthNumber = date('m', $timestamp);
                                                    $year = $date_comp[2];
                                                    
                                                    $date_ne = $nepali_date->get_nepali_date($year,$monthNumber,$day);
                                                    echo $date_ne[d].' '.$date_ne[m].' '.$date_ne[y];
                                                 
                                                }else{
                                                echo $transaction_date; 
                                                } ?>
                                            </td> 
                                        </tr>                                
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td align="left">
                                    <table>
                                        <tr>
                                            <td align="left" style="font-weight: bold;">
                                                GSTIN NO
                                            </td>
                                            <td style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>
                                            <td>
                                                <?php
                                                if ($user_cst_no != '') {
                                                    echo $user_cst_no;
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td> 
                                        </tr>                                
                                    </table>
                                </td>
                                <td align="right">
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        <table class="table" style="width: 100%;border-top:1px solid #c1c1c1;padding-top:5px;">
                            <tr>
                                <td align="center">
                                    <div style="font-weight:600;font-size: 16px;text-transform: uppercase;">Expence Reciept</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        <table class="table" cellspacing="0" cellpadding="1" style="width: 100%;margin-top:5px;border-bottom:1px solid #c1c1c1;">
                            <tr style="background:#dedede;">
                                <td style="font-weight: bold;">
                                    <?php if ($width < 310) { ?>
                                        NO
                                    <?php } else { ?>
                                        SR NO
                                    <?php } ?>
                                </td>
                                <td style="font-weight: bold;">
                                    PARTICULAR
                                </td>
<!--                                <td style="font-weight: bold;">
                                    CATEGORY
                                </td>-->
                                <td align="right" style="font-weight: bold;">
                                    <?php if ($width < 310) { ?>
                                        PRICE
                                    <?php } else { ?>
                                        UNIT PRICE
                                    <?php } ?>
                                </td>
                                <td align="right" style="font-weight: bold;">
                                    AMOUNT
                                </td>
                            </tr>
<!--                            <tr>
                                <td colspan="4"><div style="color: #CACACA;background-color: #CACACA;height: 2px;"></div></td>
                            </tr>-->
                            <?php
                            if ($transaction_panel == 'NEW_TRANS_PANEL') {
                                $qSelSubTrans = "SELECT * FROM transaction WHERE transaction_own_id='$_SESSION[sessionOwnerId]' AND transaction_trans_id='$transaction_id' ORDER BY transaction_id ASC";
                                $resSelSubTrans = mysqli_query($conn, $qSelSubTrans);
                                $count = 1;
                                while ($rowSelSubTrans = mysqli_fetch_array($resSelSubTrans, MYSQLI_ASSOC)) {
                                    $trans_cr_amt = $rowSelSubTrans['transaction_cr_amt'];
                                    $trans_dr_amt = $rowSelSubTrans['transaction_dr_amt'];
                                    $trans_cr_acc_id = $rowSelSubTrans['transaction_from_cr_acc_id'];
                                    $acc_user_acc = '';
                                    parse_str(getTableValues("SELECT acc_user_acc FROM accounts WHERE acc_id='$trans_cr_acc_id'"));
                                    $trans_cr_acc_name = $acc_user_acc;
                                    $trans_dr_acc_id = $rowSelSubTrans['transaction_to_dr_acc_id'];
                                    $acc_user_acc = '';
                                    parse_str(getTableValues("SELECT acc_user_acc FROM accounts WHERE acc_id='$trans_dr_acc_id'"));
                                    $trans_dr_acc_name = $acc_user_acc;
                                    if ($count == 1) {
                                        ?>
                                        <tr>
                                            <td style="font-weight: bold;">
                                                1.
                                            </td>
                                            <td>
                                                <?php echo strtoupper($transaction_subject); ?>
                                            </td>
            <!--                                            <td>
                                            <?php // echo strtoupper($transaction_category); ?>
                                            </td>-->
                                            <td align="right" valign="right">
                                                <?php
                                                if ($trans_dr_amt < $trans_cr_amt) {
                                                    echo $trans_dr_amt;
                                                } else {
                                                    echo $trans_cr_amt;
                                                }
                                                ?>
                                            </td>
                                            <td align="right" valign="right">
                                                <?php
                                                if ($trans_dr_amt < $trans_cr_amt) {
                                                    echo $trans_dr_amt;
                                                } else {
                                                    echo $trans_cr_amt;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <tr>
                                            <td style="font-weight: bold;">

                                            </td>
                                            <td>
                                                <?php
                                                if ($trans_dr_amt != '') {
                                                    echo strtoupper($trans_dr_acc_name);
                                                } else {
                                                    echo strtoupper($trans_cr_acc_name);
                                                }
                                                ?>
                                            </td>
            <!--                                            <td>
                                            <?php // echo '-'; ?>
                                            </td>-->
                                            <td align="right" valign="right">
                                                <?php
                                                if ($trans_dr_amt != '') {
                                                    echo $trans_dr_amt;
                                                } else {
                                                    echo $trans_cr_amt;
                                                }
                                                ?>
                                            </td>
                                            <td align="right" valign="right">
                                                <?php
                                                if ($trans_dr_amt != '') {
                                                    echo $trans_dr_amt;
                                                } else {
                                                    echo $trans_cr_amt;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $count++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td style="font-weight: bold;">
                                        1.
                                    </td>
                                    <td>
                                        <?php echo strtoupper($transaction_subject); ?>
                                    </td>
    <!--                                    <td>
                                    <?php // echo strtoupper($transaction_category); ?>
                                    </td>-->
                                    <td align="right" valign="right">
                                        <?php
                                        echo $transaction_amt;
                                        ?>
                                    </td>
                                    <td align="right" valign="right">
                                        <?php
                                        echo $transaction_amt;
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="margin-top: 100px; width: 100%">

                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" >
                            <tr>
                                <td align="left" style="font-weight: bold" <?php if ($width > 400) { ?>width="70%"<?php } else { ?>width="50%"<?php } ?>>
                                </td>
                                <td align="right" style="border-top:1px solid black;" <?php if ($width > 400) { ?>width="30%"<?php } else { ?>width="50%"<?php } ?>>
                                    <div class="greenFont paddingRight2">
                                        <b>FINAL AMOUNT : </b>
                                        <?php
                                        echo formatInIndianStyle($transaction_amt);
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" colspan="2" style="border-top:1px solid black;border-bottom:1px solid black;" width="100%">
                                    <div class="greenFont paddingRight2">
                                        <b>PAYABLE AMOUNT : </b>
                                        <?php
                                        echo "$globalCurrency" . ' ' . ucwords(numToWords((abs($transaction_amt)))) . ' Only/-';
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td align="left" width="50%">
                                    <div class="paddingRight2" style="margin-top:25px;">
                                        <b>CUSTOMER SIGNATORY</b>
                                    </div>
                                </td>
                                <td align="right" width="50%">
                                    <div class="paddingRight2" style="margin-top:25px;">
                                        <b>AUTHORIZED SIGNATORY</b>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" style="margin-top:15px;">
                <tr>
                    <td class="noPrint" align="center">
                        <a style="cursor: pointer;" onclick="window.print();">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt="Print" title="Print" width="30px" height="30px"> 
                        </a> 
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
