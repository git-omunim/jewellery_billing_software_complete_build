<?php /**
 * 
 * Created on Jul 4, 2011 12:34:51 PM
 *
 * @FileName: orgrrddd.php
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
 */ ?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';

//change in query @AUTHOR: SANDY26DEC13
$qSelGirviRelDetails = "SELECT ml_paid_amt,ml_paid_int,ml_discount_amt FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_lender_id='$mlId' and ml_id='$girviId'";
$resGirviRelDetails = mysqli_query($conn,$qSelGirviRelDetails) or die("Error: " . mysqli_error($conn) . " with query " . $qSelGirviRelDetails);

$rowGirviRelDetails = mysqli_fetch_array($resGirviRelDetails, MYSQLI_ASSOC);


$girvPaidAmt = $rowGirviRelDetails['ml_paid_amt'];
$girvPaidInt = $rowGirviRelDetails['ml_paid_int'];
$girvDiscountAmt = $rowGirviRelDetails['ml_discount_amt'];
?>

<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
    <tr>
        <td align="center">
            <div class="hrGold"></div>
        </td>
    </tr>
    <tr align="center">
        <td align="center" width="100%">
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                <tr align="center">
                    <td align="center" width="33%">
                        <table border="0" cellpadding="0" cellspacing="0" align="center">
                            <tr align="left">
                                <td align="right" valign="middle">
                                    <h4>Amount Paid:&nbsp;</h4>
                                </td>
                                <td align="left" class="girvi_head_black_left" valign="middle">
                                    <?php echo $girvPaidAmt; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td align="center" width="33%">
                        <table border="0" cellpadding="0" cellspacing="0" align="center">
                            <tr align="left">
                                <td align="left" valign="middle">
                                    <h4>Interest Paid:&nbsp;</h4>
                                </td>
                                <td align="left" class="girvi_head_black_left" valign="middle">
                                    <?php echo $girvPaidInt; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td align="center" width="33%">
                        <table border="0" cellpadding="0" cellspacing="0" align="center">
                            <tr align="left">
                                <td align="left" valign="middle">
                                    <h4>Discount:&nbsp;</h4>
                                </td>
                                <td align="left" class="girvi_head_black_left" valign="middle">
                                    <?php echo $girvDiscountAmt; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>