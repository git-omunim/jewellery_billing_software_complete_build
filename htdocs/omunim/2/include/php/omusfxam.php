<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: omusfxam.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
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
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';

//Udhaar Fixed Amount
$udhaarFixedAmt = $_POST['udhaarFixedAmt'];

if ($udhaarFixedAmt == '') {
    $udhaarFixedAmt = $_GET['udhaarFixedAmt'];
}

// how many rows to show per page
$rowsPerPage = 15;
$checkNextRows = $rowsPerPage * 2;

// by default we show first page
$pageNum = 1;
$gCounter = 0;

// if $_GET['page'] defined, use it as page number
if (isset($_GET['page'])) {
    $pageNum = $_GET['page'];
    $gCounter = ($pageNum - 1) * $rowsPerPage;
}

// counting the offset
$perOffset = ($pageNum - 1) * $rowsPerPage;
 /*****************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-23JUN17**********************/
$qSelTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_total_amt='$udhaarFixedAmt' and utin_type = 'udhaar' and utin_status IN ('New','Updated') LIMIT $perOffset, $checkNextRows";
$resTotalUdhaarCount = mysqli_query($conn,$qSelTotalUdhaarCount);
$totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);
//
$qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_total_amt='$udhaarFixedAmt' and utin_type = 'udhaar' and utin_status IN ('New','Updated') order by utin_since desc LIMIT $perOffset, $rowsPerPage";
$resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar);
$totalNextUdhaar = mysqli_num_rows($resAllUdhaar);
/*****************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-23JUN17**********************/
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td>
            <table border="0" cellspacing="1" cellpadding="1">
                <tr>
                    <td>
                        <div class="spaceLeft20">
                            <h1>Udhaar List By Amount:</h1>
                        </div>
                    </td>
                    <td align="left">
                        <div class="h1BlackColor"><?php echo $udhaarFixedAmt; ?></div>
                    </td>
                    <td align="right" valign="bottom" class="frm-lbl">
                        <div class="spaceRight20"></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td><br />
        </td>
    </tr>
    <tr>
        <td align="left">
            <table border="0" cellspacing="1" cellpadding="2" width="100%">
                <?php
                if ($totalUdhaar <= 0) {
                    echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ Udhaar List is empty. ~ </div></div>";
                } else {
                    ?>
                    <tr>
                        <td align="left" width="7px">
                            <div class="h7">SN</div>
                        </td>
                        <td align="right"  width="75px">
                            <div class="h7">UDHAAR AMT</div>
                        </td>
                        <td align="right"  width="10px">
                            <div class="h7">&nbsp;</div>
                        </td>
                        <td align="left" width="100px">
                            <div class="h7">CUSTOMER NAME</div>
                        </td>
                        <td align="left" width="50px">
                            <div class="h7">CITY</div>
                        </td>
                        <td align="left" width="50px">
                            <div class="h7">DATE</div>
                        </td>      
                    </tr>
                    <?php
                }
                while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {
                    /*****************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-23JUN17**********************/
                    $udhaarId = $rowAllUdhaar['utin_id'];
                    $udhaarAmt = $rowAllUdhaar['utin_total_amt'];
                    $uDOB = $rowAllUdhaar['utin_date'];
                    $custId = $rowAllUdhaar['utin_user_id']; //custId added @Author:PRIYA19MAR15
                    /*****************START code to add user table for user details @Author:PRIYANKA-23JUN17********************************************/
                    $selCustDetails = "SELECT user_city,user_fname,user_lname,user_mobile FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                    $resCustDetails = mysqli_query($conn, $selCustDetails);
                    $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
                    $uCustName = $rowCustDetails['user_fname'] . ' ' . $rowCustDetails['user_lname'];
                    $uCustCity = $rowCustDetails['user_city'];
                    $uCustMobile = $rowCustDetails['user_mobile'];
                    /*****************END code to add user table for user details @Author:PRIYANKA-23JUN17**********************************************/
                    /*****************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-23JUN17************************/
                    ?>
                    <tr>
                        <td align="left">
                            <!--------Start code to add onclick function  @Author:PRIYA19MAR15----------------->
                            <input type="submit" name="sNo" id="sNo" value="<?php echo $gCounter + 1; ?>" class="frm-btn-without-border" readonly="true"
                                   onclick="getCustomerDetailsWithCustId('CustUdhaar', '<?php echo $custId; ?>', '<?php echo $firmId; ?>');"/>
                            <!--------End code to add onclick function @Author:PRIYA19MAR15----------------->
                            <input type="hidden" name="udhaarId<?php echo $gCounter; ?>" id="udhaarId<?php echo $gCounter; ?>" value="<?php echo $udhaarId; ?>"/>
                        </td>
                        <td align="right">
                            <div class="amount"><?php echo $udhaarAmt; ?></div>
                        </td>
                        <td align="right"  width="10px">
                            <div class="h7">&nbsp;</div>
                        </td>
                        <td align="left">
                            <h5><?php echo $uCustName; ?></h5>
                        </td>
                        <td align="left">
                            <h5><?php echo $uCustCity; ?></h5>
                        </td>
                        <td align="left">
                            <h5><?php echo date('d  M  y', strtotime($uDOB)); ?></h5>
                        </td>
                    </tr>
                    <?php
                    $gCounter++;
                }
                ?>
            </table>
            <div id="ajaxLoadNextUdhaarPanelList" style="visibility: hidden" align="right">
            <?php include 'omzaajld.php'; ?>
            </div>
            <?php
            if ($totalNextUdhaar > 0) {
                ?>
                <div id="ajaxLoadNextUdhaarPanelListButt">
                    <table border="0" cellpadding="2" cellspacing="0" align="right">
                        <tr>
                            <?php
                            if ($pageNum > 1) {
                                ?>
                                <td align="right">
                                    <form name="prev_udhaar" id="prev_udhaar"
                                          action="javascript:navigationUdhaarPanel(<?php echo "$pageNum - 1"; ?>);"
                                          method="get"><input type="submit" value="Previous Udhaar" class="frm-btn"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                            if ($totalUdhaar > $rowsPerPage) {
                                ?>
                                <td align="right">
                                    <form name="next_udhaar" id="next_udhaar"
                                          action="javascript:navigationUdhaarPanel(<?php echo $pageNum + 1; ?>);"
                                          method="get"><input type="submit" value="Next Udhaar" class="frm-btn"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
        </td>
    </tr>
</table>
