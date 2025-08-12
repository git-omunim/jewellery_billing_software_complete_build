<?php
/*
 * Created on 06-Feb-2011 6:23:13 PM
 *
 * @FileName: omsuppclag.php
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
//require_once '../../omGlobal.php';
?>
<?php
/* * ********Start code to change login id @Author:SANT05JAN16************** */
$fatherOrSpouseName = $rowSupplier['user_father_name'];
$checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
$labelFatherOrSpouse = "Father Name:";
$panelDivName = $_REQUEST['panelDivName'];
$chitSuppId = $_REQUEST['chitSuppId'];
$chitId = $_REQUEST['chitId'];
//echo '$chitCustId======'.$chitCustId;
//echo '$chitId======'.$chitId;
//
if ($checkFatherOrSpouse == 'S') {
    $labelFatherOrSpouse = "Spouse Name:";
}
//
if ($gbLanguage == 'English')
    $fatherOrSpouseName = om_ucfirst(substr($fatherOrSpouseName, 1));
else
    $fatherOrSpouseName = substr($fatherOrSpouseName, 1);
//
$suppId = $rowSupplier['user_id'];
//
if ($gbLanguage == 'English')
    $suppName = $rowSupplier['user_fname'] . ' ' . om_ucfirst($rowSupplier['user_lname']);
else
    $suppName = $rowSupplier['user_fname'] . ' ' . $rowSupplier['user_lname'];
//
$firmId = $rowSupplier['user_firm_id'];
$suppType = $rowSupplier['user_category'];
//
if ($gbLanguage == 'English')
    $suppVillage = om_ucfirst($rowSupplier['user_village']);
else
    $suppVillage = $rowSupplier['user_village'];
//
if ($gbLanguage == 'English')
    $suppCity = om_ucfirst($rowSupplier['user_city']);
else
    $suppCity = $rowSupplier['user_city'];
//
if ($gbLanguage == 'English')
    $suppState = om_ucfirst($rowSupplier['user_state']);
else
    $suppState = $rowSupplier['user_state'];
//
$suppMobNo = $rowSupplier['user_mobile']; //added @Author:PRIYA20FEB14
$suppAdd = $rowSupplier['user_add']; //added @Author:PRIYA19FEB14
$suppBlockStatus = $rowCustomer['user_block_status']; //added @Author:BAJRANG6FEB18
//echo '$custBlockStatus==='.$custBlockStatus;
$qSelFirm = "SELECT firm_name,firm_owner,firm_type FROM firm where firm_id='$firmId' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resFirm = mysqli_query($conn, $qSelFirm);
$rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
//
if ($gbLanguage == 'English')
    $firmName = om_strtoupper($rowFirm['firm_name']);
else
    $firmName = $rowFirm['firm_name'];
//
/* * ********Start code to select login id @Author:PRIYA17DEC14************** */
$suppStaffId = $rowSupplier['user_staff_id'];
//
//echo '$custStaffId == '.$custStaffId.'<br />';
//
$qSelectStaffLoginId = "SELECT user_login_id FROM user WHERE user_id='$suppStaffId'";
$resStaffLoginId = mysqli_query($conn, $qSelectStaffLoginId);
$rowStaffLoginId = mysqli_fetch_array($resStaffLoginId);
$staffLoginId = $rowStaffLoginId['user_login_id'];
//
//echo '$staffLoginId == '.$staffLoginId.'<br />';
//
/* * ********End code to select login id @Author:PRIYA17DEC14************** */
/* * ********End code to change login id @Author:SANT05JAN16************** */
?>
<?php if ($themeName == 'Universe') {
    ?>
    <tr>
        <td align="left">
            <table width="100%" border="0" cellspacing="1" cellpadding="0" class="noPrint"><!---To add noPrint class @AUTHOR: SANDY11DEC13----->
                <tr style="background:none;">
                    <?php
                    if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                        ?>
                        <td align="center" valign="middle" style="padding: 0px; border: none;">
                            <a href="#" style="font-size: 0.5rem;" name="$custSellPurchaseImage<?php echo $custSellPurchaseImage; ?>" id="custSellPurchaseImage<?php echo $custSellPurchaseImage++; ?>" 
                               value="" class="frm-btn-custSellPurchase" title='Click Here for Supplier Sell Purchase Panel!'
                               onclick="getCustomerDetailsWithSuppId('SellPurchase', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                       return false;">
                                <i class="icon-user" style="font-size: 0.9rem;"></i>
                            </a>
                        </td>   
                    <?php } ?>
                    <td align="center" valign="middle" style="padding: 0px; border: none;">
                        <a href="#" style="font-size: 0.5rem;" name="$custHomeImage<?php echo $custHomeImage; ?>" id="custHomeImage<?php echo $custHomeImage++; ?>" 
                           value="" class="frm-btn-custHome" title='Click Here for Supplier Home!'
                           onclick="getSupplierDetailsWithSuppId('CustHome', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                   return false;" >
                            <i class="icon-home" style="font-size: 0.9rem;"></i>
                        </a>
                    </td>
                    <td align="center" valign="middle" style="padding: 0px; border: none;">
                        <a href="#" style="font-size: 0.5rem;" name="$custUdhaarImage<?php echo $custUdhaarImage; ?>" id="custUdhaarImage<?php echo $custUdhaarImage++; ?>" 
                           value="" class="frm-btn-udhaar16" title='Click Here for Customer Udhaar Details!'
                           onclick="getSupplierDetailsWithSuppId('CustUdhaar', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                   return false;">
                            <i class="icon-tag" style="font-size: 0.9rem;"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
        <td align="left" style="text-align:center;">
            <span class="cust-btn-lnk">
                <?php
                if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                        $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                    ?>
                    <input type="submit" name="suppId" style="background:none; border: none;" id="<?php echo $suppId; ?>"
                           value="<?php echo $suppName; ?>" class="cust-btn-lnk" title='Click Here to Add New Girvi!'
                           onclick="getSupplierDetailsWithSuppId('CustHome', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                           return false;" />
                           <?php
                       } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                               $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                           echo $suppName;
                       } else {
                           ?>
                    <input type="submit" name="suppId" style="background:none; border: none;" id="<?php echo $suppId; ?>"
                           value="<?php echo $suppName; ?>" class="cust-btn-lnk" title='Click Here to Add New Girvi!'
                           onclick="getSupplierDetailsWithSuppId('CustHome', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                           return false;" />
                       <?php } ?>
            </span>
        </td>
        <td style="text-align: center;"><?php echo $fatherOrSpouseName; ?></td>
        <td style="text-align: center;"><?php echo $suppVillage . ' / ' . ' ' . $suppCity . ' / ' . ' ' . $suppState; ?></td>
        <td style="text-align: center;"><?php echo substr($suppAdd, 0, 15); ?></td>
        <td style="text-align: center;"><?php echo $suppMobNo; ?></td>
        <td style="text-align: center;"><?php echo $firmName; ?></td>
        <td style="text-align: center;"><?php
            if ($staffLoginId != '')
                echo $staffLoginId;
            else
                echo 'Admin';
            ?></td>
        <td style="text-align: center;"><?php echo $suppBlockStatus; ?></td>
    </tr>
<?php }else { ?>
    <tr>
        <td align="left">
            <table width="100%" border="0" cellspacing="1" cellpadding="0" class="noPrint"><!---To add noPrint class @AUTHOR: SANDY11DEC13----->
                <tr>
                    <?php
                    if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                        ?>
                        <?php if ($panelDivName != 'chitfundInfo') { ?>
                            <td align="center" valign="middle" >
                                <input type="submit" name="$custSellPurchaseImage<?php echo $custSellPurchaseImage; ?>" id="custSellPurchaseImage<?php echo $custSellPurchaseImage++; ?>" 
                                       value="" class="frm-btn-custSellPurchase" title='Click Here for Supplier Sell Purchase Panel!'
                                       onclick="getSupplierDetailsWithSuppId('SellPurchase', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                               return false;" />
                            </td>   
                        <?php } ?>
                    <?php } ?>
                    <?php if ($panelDivName != 'chitfundInfo') { ?>
                        <td align="center" valign="middle" >
                            <input type="submit" name="$custHomeImage<?php echo $custHomeImage; ?>" id="custHomeImage<?php echo $custHomeImage++; ?>" 
                                   value="" class="frm-btn-custHome" title='Click Here for Supplier Home!'
                                   onclick="getSupplierDetailsWithSuppId('CustHome', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                           return false;" />
                        </td>
                        <td align="center" valign="middle" >
                            <input type="submit" name="$custUdhaarImage<?php echo $custUdhaarImage; ?>" id="custUdhaarImage<?php echo $custUdhaarImage++; ?>" 
                                   value="" class="frm-btn-udhaar16" title='Click Here for Supplier Udhaar Details!'
                                   onclick="getSupplierDetailsWithSuppId('CustUdhaar', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                           return false;" />
                        </td>
                    <?php } if ($panelDivName != 'chitfundInfo') { ?>
                            <td align="center" valign="middle" >
                                <input type="submit" name="$custQuotationImage<?php echo $custQuotationImage; ?>" id="custQuotationImage<?php echo $custQuotationImage++; ?>" 
                                       value="" class="frm-btn-invoice16" title='Click Here for Supplier Quotation Panel!'
                                       onclick="getSupplierDetailsWithSuppId('CustQuotation', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                               return false;" />
                            </td>   
                        <?php }if ($panelDivName != 'chitfundInfo') { ?>
                            <td align="center" valign="middle" >
                                <input type="submit" name="$custApprovalImage<?php echo $custApprovalImage; ?>" id="custApprovalImage<?php echo $custApprovalImage++; ?>" 
                                       value="" class="frm-btn-release16" title='Click Here for Supplier Approval Panel!'
                                       onclick="getSupplierDetailsWithSuppId('ItemApproval', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                               return false;" />
                            </td>   
                        <?php } else {
                        ?>
                     <td align="center" valign="middle" >
                            <input type="submit" name="$custAddImage<?php echo $custAddImage; ?>" id="custAddImage<?php echo $custAddImage++; ?>" 
                                   value="" class="frm-btn-add16" title='Click Here Add Supplier!'
                                   onclick="getChitSupplierAdd('chitfundInfo', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>', '<?php echo $chitSuppId; ?>', '<?php echo $chitId; ?>');
                                           return false;" />
                        </td>
                   <?php }
                   ?>
    </tr>
    </table>
    </td>
    <td align="left">
        <span class="cust-btn-lnk">
            <?php
            if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                    $_SESSION['sessionProdVer'] == $globalKeyProdVer && $_SESSION['sessionProdName'] == 'OMRETL') {
                ?>
                <input type="submit" name="suppId" id="<?php echo $suppId; ?>"
                       value="<?php echo $suppName; ?>" class="cust-btn-lnk" title='Click Here to get Supplier Home!'
                       onclick="getSupplierDetailsWithSuppId('CustHome', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                               return false;" />
                       <?php
                   } else if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                           $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                       ?>
                <input type="submit" name="suppId" id="<?php echo $suppId; ?>"
                       value="<?php echo $suppName; ?>" class="cust-btn-lnk" title='Click Here to Add New Girvi!'
                       onclick="getSupplierDetailsWithSuppId('CustHome', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                           return false;" />
                       <?php
                   } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                           $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                       echo $suppName;
                   } else {
                       ?>
                <input type="submit" name="suppId" id="<?php echo $suppId; ?>"
                       value="<?php echo $suppName; ?>" class="cust-btn-lnk" title='Click Here to Add New Girvi!'
                       onclick="getSupplierDetailsWithSuppId('CustHome', '<?php echo $suppId; ?>', '<?php echo $firmId; ?>');
                                           return false;" />
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
                    <?php echo $suppVillage . ' / ' . $suppCity . ' / ' . $suppState; ?>
                </h5>
            </b>
        </span>
    </td>
    <!--Start code to add address @Author:PRIYA19FEB14--->
    <td align="left" title="<?php echo $suppAdd; ?>">
        <span class="gold">
            <b>
                <h5>
                    <?php echo substr($suppAdd, 0, 15); ?>
                </h5>
            </b>
        </span>
    </td>
    <!--End code to add address @Author:PRIYA19FEB14--->
    <td align="left">
        <span class="gold">
            <b>
                <h5>
                    <?php echo $suppMobNo; ?>
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
    <!-- Start Code For Customer Block Status Author@:BAJRANG20FEB2018-->
    <td align="left">
        <span class="gold">
            <b>
                <h5>
                    <?php
                    if ($suppBlockStatus == 'YES')
                        echo 'BLOCK';
                    else
                        echo '-';
                    ?>
                </h5>
            </b>
        </span>
    </td>
    <!-- End Code For Customer Block Status Author@:BAJRANG20FEB2018-->
    </tr>
<?php } ?>