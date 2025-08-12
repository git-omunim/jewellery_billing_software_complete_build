<?php
/*
 * **************************************************************************************
 * @tutorial: SCHEME APPROVE STATUS CHANGING POPUP FILE @AUTHOR: HEMA25FEB2020
 * **************************************************************************************
 * 
 * Created on Feb 25, 2020 12:54:56 PM
 *
 * @FileName: omSchemeApproveStatusPopupFrame.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
$kittyMondepId = $_GET['kittyMondepId'];
$kittyCustId = $_GET['kittyCustId'];
$delStatus = $_GET['delStatus'];

if ($kittyMondepId == '') {
    $kittyMondepId = $_GET['kittyMondepId'];
}
if ($kittyCustId == '') {
    $kittyCustId = $_GET['kittyCustId'];
}
if ($delStatus == '') {
    $delStatus = $_GET['delStatus'];
}
//echo '$kittymondepId : '.$kittyMondepId;
//echo '$kittyCustId : '.$kittyCustId;
//echo '$delStatus : '.$delStatus;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emNavigation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emAddOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emUpdateOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emOwnerLogin.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogAddFunctions_1_6_1.js"></script>
    </head>
    <body>
        <div class="grey-back">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 10px;">
                <tr>
                    <td valign="top" align="left" width="32px" colspan="">
                        <div class="analysis_div_rows">
                            <img src="<?php echo $documentRoot; ?>/images/delivery_pending_24.png" alt=""/>
                        </div>
                    </td>
                    <td valign="top" align="" colspan="" >
                        <a class="links" onclick=""
                           style="cursor: pointer;" title="">
                            <div class="textLabelHeading">
                               SCHEME APPROVE STATUS
                            </div>
                        </a>
                    </td>
                    <td><div id="itemDelStatuschangediv"></div></td>
                </tr>
            </table>
            <!-- Code Start inside Box -->
            <div id="itemDelStatuschangediv">
                <table class="border-color-grey" border="0" cellspacing="2" cellpadding="2" width="100%" style="margin-top: 30px;">
                    <?php
                    $qSelProductDetails = "SELECT * FROM kitty_money_deposit where kitty_mondep_id='$kittyMondepId' and kitty_mondep_own_id='$_SESSION[sessionOwnerId]'";
                    $resProductDetails = mysqli_query($conn, $qSelProductDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelProductDetails);
                    $rowProductDetails = mysqli_fetch_array($resProductDetails, MYSQLI_ASSOC);
                    $kitty_mondep_kitty_id = $rowProductDetails['kitty_mondep_kitty_id'];
                    $kitty_mondep_EMI_status = $rowProductDetails['kitty_mondep_EMI_status'];
                    parse_str(getTableValues("SELECT kitty_serial_num,kitty_token_num FROM kitty WHERE kitty_id=$kitty_mondep_kitty_id"));
                    $kitty_mondep_firm_id = $rowProductDetails['kitty_mondep_firm_id'];
                    parse_str(getTableValues("SELECT firm_name FROM firm WHERE firm_id='$kitty_mondep_firm_id'"));
                    $kitty_mondep_cust_id = $rowProductDetails['kitty_mondep_cust_id'];
                    parse_str(getTableValues("SELECT user_fname,user_lname FROM user WHERE user_id='$kitty_mondep_cust_id'"));
                    $kitty_mondepd_recipit_no = $rowProductDetails['kitty_mondepd_recipit_no'];
                    $kitty_mondep_EMI_no = $rowProductDetails['kitty_mondep_EMI_no'];
                    $kitty_mondep_EMI_total_amt = $rowProductDetails['kitty_mondep_EMI_total_amt'];
                    $kitty_mondep_EMI_paid_date = $rowProductDetails['kitty_mondep_EMI_paid_date'];
                    $kitty_approve_status = $rowProductDetails['kitty_approve_status'];
                    ?>
                    <tr>
                        <td align="center" class="fs_13 bold brown" title="SR NO.">
                            <div class="fs_14 bold brown">SR NO.</div>
                        </td>
                        <td align="center" class="fs_13 bold brown" title="TOKEN NO.">
                            <div class="fs_14 bold brown">TOKEN NO.</div>
                        </td>
                        <td align="center" class="ff_calibri fs_14 brown" title="FIRM NAME">
                            <div class="fs_14 bold brown">FIRM NAME</div>
                        </td>
                        <td align="center" class="ff_calibri fs_14 brown" title="CUST NAME">
                            <div class="fs_14 bold brown">CUST NAME</div>
                        </td>
                        <td align="center" class="ff_calibri fs_14 brown" title="RECPT NO.">
                            <div class="fs_14 bold brown">RECPT NO.</div>
                        </td>
                        <td align="center" class="ff_calibri fs_14 brown" title="INT NO.">
                            <div class="fs_14 bold brown">INT NO.</div>
                        </td>
                        <td align="center" class="ff_calibri fs_14 brown" title="AMOUNT">
                            <div class="fs_14 bold brown">AMOUNT</div>
                        </td>
                          <td align="center" class="ff_calibri fs_14 brown" title="PAID DATE">
                            <div class="fs_14 bold brown">PAID DATE</div>
                        </td>
                        <td align="center" class="ff_calibri fs_14 brown" title="APPROVE STATUS">
                            <div class="fs_14 bold brown">APPROVE STATUS</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="ITEM CODE">
                            <div class="spaceLeft5"><?php echo $kitty_serial_num; ?></div>
                        </td>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="ITEM NAME">
                            <div class="spaceRight5"><?php echo $kitty_token_num; ?></div>
                        </td>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="DATE">
                            <div class="spaceLeft5"><?php echo $firm_name; ?></div>
                        </td>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="CUST NAME">
                            <div class="spaceRight5"><?php echo strtoupper($user_fname) . '&nbsp;&nbsp;' . strtoupper($user_lname); ?></div>
                        </td>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="ITEM QTY">
                            <div class="spaceRight5"><?php echo $kitty_mondepd_recipit_no; ?></div>
                        </td>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="WEIGHT">
                            <div class="spaceRight5"><?php echo $kitty_mondep_EMI_no; ?></div>
                        </td>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="AMOUNT">
                            <div class="spaceRight5"><?php echo $kitty_mondep_EMI_total_amt; ?></div>
                        </td>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="AMOUNT">
                            <div class="spaceRight5"><?php echo $kitty_mondep_EMI_paid_date; ?></div>
                        </td>
                        <td style="overflow: hidden;border-top: 1px solid silver" align="center" class="brwnCalibri13Font" title="AMOUNT">
                            <div class="spaceRight5"><?php echo $kitty_approve_status; ?></div>
                            <input type="hidden" id="documentRootPath" name="documentRootPath" class="select_border_grey" value="<?php echo $documentRootBSlash;?>">
                            <input type="button" id="ApproveBtn" name="ApproveBtn" value="APPROVE"  onclick="changeSchemeApproveStatus('<?php echo $kittyMondepId; ?>', 'APPROVE');" />  
                        </td
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
