<?php
/*
 * **************************************************************************************
 * @tutorial:   Money Lender  List Division
 * **************************************************************************************
 *
 * Created on 13 nov, 2013 11:03:54 AM
 *
 * @FileName: ormllist.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
$accFileName = 'ormllist.php';
include 'ommpemac.php';
?>
<?php
require_once 'system/omssopin.php';
/* * ******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
if ($_SESSION['sessionOwnIndStr'][6] == 'Y') {
    ?>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr align="center">
            <td align="center" valign="top" class="border-right-cust-list" width="50%" style="border-right:0;">
                <form id="getSupplierDetails" name="getSupplierDetails" method="post"
                      action="javascript:getMoneyLenderDetails('MoneyLendersHome');">
                          <?php
                          // how many rows to show per page
                          $perRowsPerPage = 5;
                          $doubleLimit = $perRowsPerPage * 2;

                          // by default we show first page
                          $perPageNum = 1;

                          // if $_GET['page'] defined, use it as page number
                          if (isset($_GET['page'])) {
                              $perPageNum = $_GET['page'];
                          }

                          // counting the offset
                          $perOffset = ($perPageNum - 1) * $perRowsPerPage;
                          ?>
                    <table border="0" cellspacing="1" cellpadding="0" width="100%" valign="top" style="border: 1px solid #c1c1c1;border-right:4px solid #73b0ff;">
                        <?php
                        $staffId = $_SESSION['sessionStaffId'];
                        if ($staffId != '') {
                            parse_str(getTableValues("SELECT acc_panel FROM access WHERE acc_own_id='$sessionOwnerId' and acc_emp_id='$staffId' and acc_check_id='staffTransAccess'"));
                            if ($acc_panel == 'staffAllTrans') {
                                $userLoginString = '';
                            } else {
                                $userLoginString = " and user_staff_id= '$staffId'";
                            }
                        } else {
                            $userLoginString = '';
                        }
                        if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                            //*******Start code to change firm update in moneylender:Author:SANT22AUG16
                            if ($_SESSION['setFirmSession'] != '') {
                                $strFrmId = $_SESSION['setFirmSession'];
                            } else {
                                $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                                $resPubFirmCount = mysqli_query($conn, $qSelPubFirmCount);
                                $strFrmId = '0';
                                while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                                    $strFrmId = $strFrmId . ",";
                                    $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
                                }
                            }
                            //*******End code to change firm update in moneylender:Author:SANT22AUG16

                            $qSelPubSupplierCount = "SELECT user_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status !='Deleted' and user_category='Money Lender' and user_firm_id IN ($strFrmId) $userLoginString LIMIT $perOffset, $doubleLimit";
                            $resPubSupplierCount = mysqli_query($conn, $qSelPubSupplierCount);
                            $totalSupplier = mysqli_num_rows($resPubSupplierCount);

                            $qSelPubSupplier = "SELECT user_id,user_fname,user_lname,user_father_name,user_sex,user_city,user_mobile,user_since,user_priority,user_image_status FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status !='Deleted' and user_firm_id IN ($strFrmId) and user_category='Money Lender' $userLoginString order by user_since desc LIMIT $perOffset, $perRowsPerPage";
                            $resPubSupplier = mysqli_query($conn, $qSelPubSupplier);
                            $totalNextSupplier = mysqli_num_rows($resPubSupplier);
                            if ($totalSupplier <= 0) {
                                echo "<tr><td colspan=" . "2" . "><h5> ~ Money Lender not available in database ~ </h5></td></tr>"; //change in line @AUTHOR: SANDY21JAN14
                            }
                            while ($rowSupplier = mysqli_fetch_array($resPubSupplier, MYSQLI_ASSOC)) {
                                $userType = 'MoneyLender';
                                include 'ormlspll.php';
                            }
                        } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {

                            if ($_SESSION['setFirmSession'] != '') {                        //IF CONDITION ADDED @AUTHOR:SHRI12SEP19
                                $strFrmId = $_SESSION['setFirmSession'];
                            } else {
                                $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                                $resPubFirmCount = mysqli_query($conn, $qSelPubFirmCount) or die('Error: ' . mysqli_error($conn) . '<br/>Query:' . $qSelPubFirmCount);

                                $strFrmId = '0';

                                while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                                    $strFrmId = $strFrmId . ",";
                                    $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
                                }
                            }

                            $qSelPerSupplierCount = "SELECT user_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_category='Money Lender' and user_status !='Deleted' and user_firm_id IN ($strFrmId) $userLoginString LIMIT $perOffset, $doubleLimit";
                            $resPerSupplierCount = mysqli_query($conn, $qSelPerSupplierCount);
                            $totalSupplier = mysqli_num_rows($resPerSupplierCount);

                            //echo 'Test:' . $qSelPerSupplierCount;
                            $qSelPerSupplier = "SELECT user_id,user_fname,user_lname,user_father_name,user_sex,user_city,user_mobile,user_since,user_priority,user_image_status FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status !='Deleted' and user_category='Money Lender' and user_firm_id IN ($strFrmId) $userLoginString order by user_since desc LIMIT $perOffset, $perRowsPerPage";
                            $resPerSupplier = mysqli_query($conn, $qSelPerSupplier);
                            $totalNextSupplier = mysqli_num_rows($resPerSupplier);

                            if ($totalSupplier <= 0) {
                                echo "<tr><td colspan=" . "2" . "><h5> ~Money Lender not available in database ~ </h5></td></tr>"; //change in line @AUTHOR: SANDY21JAN14
                            }
                            while ($rowSupplier = mysqli_fetch_array($resPerSupplier, MYSQLI_ASSOC)) {
                                $userType = 'MoneyLender';
                                include 'ormlspll.php';
                            }
                        }
                        ?>
                    </table>
                </form>
            </td>
            <td align="center" valign="top" width="50%">
                <form id="getSupplierDetails" name="getSupplierDetails" method="post"
                      action="javascript:getMoneyLenderDetails('MoneyLendersHome');"> <!--JS Function added @AUTHOR:PRIYA14JAN13-->
                    <table border="0" cellspacing="1" cellpadding="0" width="100%" valign="top">
                        <?php
                        // Code for another division in page
                        $perRowsPerPage = 5;
                        $doubleLimit = $perRowsPerPage * 3;
                        $perOffset = ($perPageNum) * $perRowsPerPage;

                        if ($_SESSION['sessionIgenType'] == $globalOwnPass) { 
                            if ($_SESSION['setFirmSession'] != '') {                        //IF CONDITION ADDED @AUTHOR:SHRI12SEP19
                                $strFrmId = $_SESSION['setFirmSession'];
                            } else {
                                $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                                $resPubFirmCount = mysqli_query($conn, $qSelPubFirmCount);

                                $strFrmId = '0';

                                while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                                    $strFrmId = $strFrmId . ",";
                                    $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
                                }
                            }

                            $qSelPubSupplierCount = "SELECT user_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_category='Money Lender' and user_status !='Deleted' and user_firm_id IN ($strFrmId) LIMIT $perOffset, $doubleLimit";
                            $resPubSupplierCount = mysqli_query($conn, $qSelPubSupplierCount);
                            $totalSupplier = mysqli_num_rows($resPubSupplierCount);

                            $qSelPubSupplier = "SELECT user_id,user_fname,user_lname,user_father_name,user_sex,user_city,user_mobile,user_since,user_priority,user_image_status FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status !='Deleted' and user_category='Money Lender' and user_firm_id IN ($strFrmId) order by user_since desc LIMIT $perOffset, $perRowsPerPage";
                            $resPubSupplier = mysqli_query($conn, $qSelPubSupplier);
                            $totalNextSupplier = mysqli_num_rows($resPubSupplier);
                            if ($totalSupplier <= 0) {
                                echo "<tr><td colspan=" . "2" . "><h5></h5></td></tr>";
                            }
                            while ($rowSupplier = mysqli_fetch_array($resPubSupplier, MYSQLI_ASSOC)) {
                                $userType = 'MoneyLender';
                                include 'ormlspll.php';
                            }
                        } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                            if ($_SESSION['setFirmSession'] != '') {                        //IF CONDITION ADDED @AUTHOR:SHRI12SEP19
                                $strFrmId = $_SESSION['setFirmSession'];
                            } else {
                                $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                                $resPubFirmCount = mysqli_query($conn, $qSelPubFirmCount);

                                $strFrmId = '0';

                                while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                                    $strFrmId = $strFrmId . ",";
                                    $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
                                }
                            }

                            $qSelPerSupplierCount = "SELECT user_id FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_category='Money Lender' and user_status !='Deleted' and user_firm_id IN ($strFrmId) LIMIT $perOffset, $doubleLimit";
                            $resPerSupplierCount = mysqli_query($conn, $qSelPerSupplierCount);
                            $totalSupplier = mysqli_num_rows($resPerSupplierCount);

                            $qSelPerSupplier = "SELECT user_id,user_fname,user_lname,user_father_name,user_sex,user_city,user_mobile,user_since,user_priority,user_image_status FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_status !='Deleted' and user_category='Money Lender' and user_firm_id IN ($strFrmId) order by user_since desc LIMIT $perOffset, $perRowsPerPage";
                            $resPerSupplier = mysqli_query($conn, $qSelPerSupplier);
                            $totalNextSupplier = mysqli_num_rows($resPerSupplier);

                            if ($totalSupplier <= 0) {
                                echo "<tr><td colspan=" . "2" . "><h5></h5></td></tr>";
                            }
                            while ($rowSupplier = mysqli_fetch_array($resPerSupplier, MYSQLI_ASSOC)) {
                                $userType = 'MoneyLender';
                                include 'ormlspll.php';
                            }
                        }
                        ?>
                    </table>
                </form>
            </td>
        </tr>
        <!----Start of changes in navigation function to pass user value @AUTHOR: SANDY19NOV13------->
        <?php
        if ($totalNextSupplier > 0) {
            ?>
            <tr align="right">
                <td align="right" colspan="2">
                    <table border="0" cellpadding="2" cellspacing="0" align="right">
                        <tr>
                            <?php
                            if ($perPageNum > 1) {
                                ?>
                                <td align="right">
                                    <form name="prev_supp" id="prev_supp"
                                          action="javascript:navigationSupp('<?php echo $perPageNum - 1; ?>','<?php echo $user; ?>');"
                                          method="get"><input type="submit" value="Previous" class="frm-btn"
                                                        maxlength="30" size="15" /></form>
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                            if ($totalSupplier > $perRowsPerPage) {
                                ?>
                                <td align="right">
                                    <form name="next_supp" id="next_supp"
                                          action="javascript:navigationSupp('<?php echo $perPageNum + 1; ?>','<?php echo $user; ?>');"
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
        ?>
        <!----End of changes in navigation function to pass user value @AUTHOR: SANDY19NOV13------->
    </table>
<?php } ?>
<!-------------End code to add panel indiacator @Author:PRIYA17MAY14--------------->
