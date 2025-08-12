<?php
/*
 * Created on 24-Dec-2019 2:46:13 PM
 *
 * @FileName: omSchemeuser_row.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
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
/* * ********Start code to @Author:SWAPNIL24DEC19************** */
$fatherOrSpouseName = $rowCustomer['user_father_name'];
$checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
$labelFatherOrSpouse = "Father Name:";
$panelDivName = $_REQUEST['panelDivName'];
$chitSuppId = $_REQUEST['chitSuppId'];
$chitId = $_REQUEST['chitId'];

if ($checkFatherOrSpouse == 'S') {
    $labelFatherOrSpouse = "Spouse Name:";
}
//
if ($gbLanguage == 'English')
    $fatherOrSpouseName = om_ucfirst(substr($fatherOrSpouseName, 1));
else
    $fatherOrSpouseName = substr($fatherOrSpouseName, 1);
//
$custId = $rowCustomer['user_id'];
//
if ($gbLanguage == 'English')
    $custName = $rowCustomer['user_fname'] . ' ' . om_ucfirst($rowCustomer['user_lname']);
else
    $custName = $rowCustomer['user_fname'] . ' ' . $rowCustomer['user_lname'];
//
$firmId = $rowCustomer['user_firm_id'];
$custType = $rowCustomer['user_category'];
//
if ($gbLanguage == 'English')
    $custVillage = om_ucfirst($rowCustomer['user_village']);
else
    $custVillage = $rowCustomer['user_village'];
//
if ($gbLanguage == 'English')
    $custCity = om_ucfirst($rowCustomer['user_city']);
else
    $custCity = $rowCustomer['user_city'];
//
if ($gbLanguage == 'English')
    $custState = om_ucfirst($rowCustomer['user_state']);
else
    $custState = $rowCustomer['user_state'];
//
$custMobNo = $rowCustomer['user_mobile'];

$custBlockStatus = $rowCustomer['user_block_status'];

$qSelFirm = "SELECT firm_name,firm_owner,firm_type FROM firm where firm_id='$firmId' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resFirm = mysqli_query($conn, $qSelFirm);
$rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
//
if ($gbLanguage == 'English')
    $firmName = om_strtoupper($rowFirm['firm_name']);
else
    $firmName = $rowFirm['firm_name'];
//

$custStaffId = $rowCustomer['user_staff_id'];
//
//
$qSelectStaffLoginId = "SELECT user_login_id FROM user WHERE user_id='$custStaffId'";
$resStaffLoginId = mysqli_query($conn, $qSelectStaffLoginId);
$rowStaffLoginId = mysqli_fetch_array($resStaffLoginId);
$staffLoginId = $rowStaffLoginId['user_login_id'];
//
//
?>
<?php if ($themeName == 'Universe') {
    ?>

<?php } else { ?>
    <tr>
        <td align="left">
            <span class="cust-btn-lnk">
                <?php
                if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO ||
                        $_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                    ?>
                    <input type="submit" name="custId" id="<?php echo $custId; ?>"
                           value="<?php echo $custName; ?>" class="cust-btn-lnk" title='Click Here to view Details!'
                           onclick="getCustomerDetailsForScheme('CustHome', '<?php echo $custId; ?>', '<?php echo $firmId; ?>');
                                           return false;" />
                           <?php
                       } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                               $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                           echo $custName;
                       } else {
                           ?>

                <?php } ?>
            </span>
        </td>
        <td align="left">
            <span class="gold">
                <b>
                    <h5>
                        <?php echo $fatherOrSpouseName; ?>
                    </h5>
                </b>
            </span>
        </td>
        <td align="left">
            <span class="gold">
                <b>
                    <h5>
                        <?php echo $custVillage . ' / ' . $custCity . ' / ' . $custState; ?>
                    </h5>
                </b>
            </span>
        </td>

        <td align="left">
            <span class="gold">
                <b>
                    <h5>
                        <?php echo $custMobNo; ?>
                    </h5>
                </b>
            </span>
        </td>
        <td align="left">
            <span class="gold">
                <b>
                    <h5>
                        <?php echo $firmName; ?>
                    </h5>
                </b>
            </span>
        </td>
        <td align="left">
            <span class="gold">
                <b>
                    <h5>
                        <?php
                        if ($staffLoginId != '')
                            echo $staffLoginId;
                        else
                            echo 'Admin';
                        ?>
                    </h5>
                </b>
            </span>
        </td>

        <td align="left">
            <span class="gold">
                <b>
                    <h5>
                        <?php
                        if ($custBlockStatus == 'YES')
                            echo 'BLOCK';
                        else
                            echo '-';
                        ?>
                    </h5>
                </b>
            </span>
        </td>

    </tr>
<?php } ?>