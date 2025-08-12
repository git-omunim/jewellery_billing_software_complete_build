<?php
/*
 * Created on 03-Feb-2011 11:04:05 PM
 *
 * @FileName: omrlcslt.php
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
?>
<?php
$message = $_GET['message'];
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr align="center">
 <!--//**************Start code to delete customer redirection Author:@SANT16MAY16*******************-->        
          <td align="center" valign="bottom">
                                <div class="ff_calibri fs_14 greenFont" id="messDisplay">
                                    <?php
                                 include 'omzaajll.php';
                                    ?>
                                </div>
     </td>
 <!--//**************End code to delete customer redirection Author:@SANT16MAY16*******************-->      
     </tr>
    <tr>
        <td align="right" class="spaceRight15">
            <div id="messDispDiv" style="visibility: visible; background:none;" class="addedUpdatedMess">
                <?php echo $message; ?>
            </div>
        </td>
    </tr>
 <td align="center" class="border-right-cust-list" valign="top">
        <?php
        // how many rows to show per page
        $perRowsPerPage = 5;
        $doubleLimit = $perRowsPerPage * 2;

//************************Start code to change deleted customer details show Properly Author:SANT20APR16********************
        $perPageNum = 0;

        // if $_GET['page'] defined, use it as page number
        if (isset($_GET['page'])) {
            $perPageNum = $_GET['page'];
        }

        // counting the offset
        $perOffset = ($perPageNum*2)  * $perRowsPerPage;
        ?>
        <table border="0" cellspacing="1" cellpadding="0" width="100%" valign="top">
            <?php
            if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);

                $strFrmId = '0';

                while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                    $strFrmId = $strFrmId . ",";
                    $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
                }
//-----Start to add delete  button for customer @AUTHOR: SANT11JAN16 -----********************************************************************************
                $qSelPubCustomerCount = "SELECT user_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status='Released' and user_firm_id IN ($strFrmId) LIMIT $perOffset, $doubleLimit";
                $resPubCustomerCount = mysqli_query($conn,$qSelPubCustomerCount);
                $totalCustomer = mysqli_num_rows($resPubCustomerCount);

                $qSelPubCustomer = "SELECT user_id,user_fname,user_lname,user_father_name,user_sex,user_city,user_mobile,user_since,user_priority FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status='Released' and user_firm_id IN ($strFrmId) order by user_id desc LIMIT $perOffset, $perRowsPerPage";
                $resPubCustomer = mysqli_query($conn,$qSelPubCustomer);
                $totalNextCustomer1 = mysqli_num_rows($resPubCustomer);

                if ($totalCustomer <= 0) {
                    echo "<tr><td colspan=" . "2" . "><h5> ~ Customers not available in database ~ </h5></td></tr>";
                }
                
                while ($rowCustomer = mysqli_fetch_array($resPubCustomer, MYSQLI_ASSOC)) {
                   
                    include 'omrlcsdt.php';
                }
            } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

                $qSelPerCustomerCount = "SELECT user_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status='Released' LIMIT $perOffset, $doubleLimit";
                $resPerCustomerCount = mysqli_query($conn,$qSelPerCustomerCount);
                $totalCustomer = mysqli_num_rows($resPerCustomerCount);

                $qSelPerCustomer = "SELECT user_id,user_fname,user_lname,user_father_name,user_sex,user_city,user_mobile,user_since,user_priority FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status='Released' order by user_id desc LIMIT $perOffset, $perRowsPerPage";
                $resPerCustomer = mysqli_query($conn,$qSelPerCustomer);
                $totalNextCustomer1 = mysqli_num_rows($resPerCustomer);

                if ($totalCustomer <= 0) {
                    echo "<tr><td colspan=" . "2" . "><h5> ~ Customers not available in database ~ </h5></td></tr>";
                }
               
                while ($rowCustomer = mysqli_fetch_array($resPerCustomer, MYSQLI_ASSOC)) {
                
                    include 'omrlcsdt.php';
                }
            }
            ?>
        </table>
    </td>
    <td align="center" valign="top">
        <table border="0" cellspacing="1" cellpadding="0" width="100%" valign="top">
            <?php
// Code for another division in page
            $perRowsPerPage = 5;
            $doubleLimit = $perRowsPerPage * 3;
            $perOffset = (($perPageNum*2)+1) * $perRowsPerPage;


            if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);

                $strFrmId = '0';

                while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                    $strFrmId = $strFrmId . ",";
                    $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
                }

                $qSelPubCustomerCount = "SELECT user_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status='Released' and user_firm_id IN ($strFrmId) LIMIT $perOffset, $doubleLimit";
                $resPubCustomerCount = mysqli_query($conn,$qSelPubCustomerCount);
                $totalCustomer = mysqli_num_rows($resPubCustomerCount);

                $qSelPubCustomer = "SELECT user_id,user_fname,user_lname,user_father_name,user_sex,user_city,user_mobile,user_since,user_priority FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status='Released' and user_firm_id IN ($strFrmId) order by user_since desc LIMIT $perOffset, $perRowsPerPage";
                $resPubCustomer = mysqli_query($conn,$qSelPubCustomer);
                $totalNextCustomer2 = mysqli_num_rows($resPubCustomer);

                if ($totalCustomer <= 0) {
                    echo "<tr><td colspan=" . "2" . "><h5></h5></td></tr>";
                }
                
                while ($rowCustomer = mysqli_fetch_array($resPubCustomer, MYSQLI_ASSOC)) {
                    include 'omrlcsdt.php';
                }
            } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

                $qSelPerCustomerCount = "SELECT user_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status='Released' LIMIT $perOffset, $doubleLimit";
                $resPerCustomerCount = mysqli_query($conn,$qSelPerCustomerCount);
                $totalCustomer = mysqli_num_rows($resPerCustomerCount);

                $qSelPerCustomer = "SELECT user_id,user_fname,user_lname,user_father_name,user_sex,user_city,user_mobile,user_since,user_priority FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status='Released' order by user_since desc LIMIT $perOffset, $perRowsPerPage";
                $resPerCustomer = mysqli_query($conn,$qSelPerCustomer);
                $totalNextCustomer2 = mysqli_num_rows($resPerCustomer);

                if ($totalCustomer <= 0) {
                    echo "<tr><td colspan=" . "2" . "><h5></h5></td></tr>";
                }//Message ~ Customers not available in database ~ removed @Author:PRIYA12AUG13
               
                while ($rowCustomer = mysqli_fetch_array($resPerCustomer, MYSQLI_ASSOC)) {
                    include 'omrlcsdt.php';
                }
            }
            //-----End to add delete  button for customer @AUTHOR: SANT11JAN16 -----********************************************************************************
            ?>
        </table>
<!--************************Start code to change deleted customer details show Properly Author:SANT20APR16******************** -->
    </td>
</tr>
<?php
// Start Code to Check Demo Mode
if (($_SESSION['sessionDongleStatus'] == $gbDongleDemoStatus)) {
    $totalNextCustomer = 0;
    echo '<tr><td><br/></td></tr>';
} else
//CHANGE IN CONDITION FOR OMLOAN @AUTHOR: SANDY22NOV13
if ((($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) || ($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO)) &&
        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
// End Code to Check Demo Mode
   
    if ($totalNextCustomer1 > 0 || $totalNextCustomer2 > 0) {
        ?>
        <tr align="right">
            <td align="right" colspan="2">
                <table border="0" cellpadding="2" cellspacing="0" align="right">
                    <tr>
                        <?php
                        if ($perPageNum > 0) {
                            ?>
                            <td align="right">
                                <form name="prev_cust" id="prev_cust"
                                      action="javascript:navigationInRelesedCustList('<?php echo $perPageNum - 1; ?>');"
                                      method="get"><input type="submit" value="Previous" class="frm-btn"
                                                    maxlength="30" size="15" /></form>
                            </td>
                            <?php
                        }
                        ?>
                        <?php
                        if ($totalCustomer > $perRowsPerPage) {
                            ?>
                            <td align="right">
                                <form name="next_cust" id="next_cust"
                                      action="javascript:navigationInRelesedCustList('<?php echo $perPageNum + 1; ?>');"
                                      method="get"><input type="submit" value="Next" class="frm-btn"
                                                    maxlength="30" size="15" /></form>
                            </td>
                            <?php
                        }
                        ?>
                    </tr>
                </table>
            </td>
        </tr>
        <?php
    }
}
?>
</table>

