<?php
/*
 * **************************************************************************************
 * @tutorial: OMREVO Main Header File
 * **************************************************************************************
 *
 * Created on Jan 26, 2013 11:54:58 AM
 *
 * @FileName: orpphmdv.php
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

require_once 'ommptbup.php';
?>
<!--Start code to access product version from product version table @AUTHOR: SANDY2AUG13 -->
<?php
$staffId = $_SESSION['sessionStaffId'];
$userName = om_strtoupper(substr($_SESSION['sessionUserName'], 0, 10));

$selectVersion = "SELECT prod_ver,prod_ver1,prod_ver2,prod_ver3 FROM prod_version WHERE prod_id='1'";
$resVersion = mysqli_query($conn, $selectVersion);
$row = mysqli_fetch_array($resVersion);
$prodVer1 = $rowProdVer['prod_ver1'];
$prodVer2 = $rowProdVer['prod_ver2'];
$prodVer3 = $rowProdVer['prod_ver3'];
$version = $prodVer1 . '.' . $prodVer2 . '.' . $prodVer3;
$prodName = 'OMREVO';
?>
<!--End code to access product version from product version table @AUTHOR: SANDY2AUG13 -->
<?php
require_once 'system/omssopin.php';
include_once 'ommcolor.php'; //file added @Author:PRIYA01APR14
?>
<!-- *************************** Start Header Div Code *************************** -->
<div class="om_header header_div" style="background:none;"><!----Change in div attributes @AUTHOR: SANDY26DEC13------>
    <div id="main_body"> 
        <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" valign="top">
            <tr>
                <td align="left" valign="middle" width="70px">
                    <div id="main_logo">
                        <a href="<?php echo $documentRootBSlash; ?>/omHomePage.php?divPanel=OwnerHome"  >
                            <img src="<?php echo $documentRoot; ?>/images/om64x60.png" alt="oMunim Logo" border="0" />
                        </a>
                    </div>
                </td>
                <td align="left" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" align="right" width="100%" valign="top">
                        <tr align="left">
                            <td colspan="2" valign="top">
                                <?php include 'ompphmtm.php'; ?>
                            </td>
                        </tr>
                        <tr valign="bottom">
                            <td colspan="2" valign="bottom">
                                <div class="main_menu">
                                    <table border="0" cellpadding="0" cellspacing="0" align="left" valign="bottom" 
                                           class="paddingLeft30"
                                           width="100%" height="100%">
                                        <tr valign="bottom">
                                            <!-------------Start code to add panel indiacator @Author:PRIYA16MAY14------------------>
                                            <td valign="bottom">
                                                <a class="menu_headings" onclick="navigationMainBigMiddleImage('OwnerHome', 'homePage24.png', 'ओमुनीम होम पेज! \nHome Page / Shortcut Key F1 ');
                                                        document.location.reload(true);
                                                        document.location.assign('orHomePage.php?divPanel=OwnerHome');"  
                                                   style="cursor: pointer;"><div id="OwnerHome"><img src="<?php echo $documentRoot; ?>/images/homePage24.png" alt="Home" title="ओमुनीम होम पेज! &#10;Home Page / Shortcut Key F1 " border="0"/></div></a>
                                            </td>
                                            <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y') { ?>
                                                <td>
                                                    <a class="menu_headings" onclick="navigationMainBigMiddleImage('GirviPanel', 'girviPanel26.png', 'संपूर्ण गिरवी पॅनल! \nGirvi Panel / Shortcut Key F2 ');"
                                                       style="cursor: pointer;"><div id="GirviPanel"><img src="<?php echo $documentRoot; ?>/images/girviPanel26.png" alt="Girvi Panel" title="संपूर्ण गिरवी पॅनल! &#10;Girvi Panel / Shortcut Key F2 " /></div></a>                                                       <!-- Modified By KHUSH05JAN13 -->
                                                </td>
                                            <?php } ?>
                                            <td>
                                                <a class="menu_headings" onclick="navigationMainBigMiddleImage('UdhaarPanel', 'udhaar26.png', 'उधार पॅनल! \nUdhaar Panel / Shortcut Key F3 ')"
                                                   style="cursor: pointer;"><div id="UdhaarPanel"><img src="<?php echo $documentRoot; ?>/images/udhaar26.png" alt="Udhaar Panel" title="उधार पॅनल! &#10;Udhaar Panel / Shortcut Key F3 " /></div></a>                                                             <!-- Modified By KHUSH05JAN13 -->
                                            </td>
                                            <?php if ($_SESSION['sessionOwnIndStr'][2] == 'Y') { ?>
                                                <td>
                                                    <a class="menu_headings" onclick="navigationMainBigMiddleImage('Analysis', 'analysis26.png', 'संपूर्ण विश्लेषण पॅनल! \nAnalysis Panel / Shortcut Key F4 ')"
                                                       style="cursor: pointer;"><div id="Analysis"><img src="<?php echo $documentRoot; ?>/images/analysis26.png" alt="Analysis" title="संपूर्ण विश्लेषण पॅनल! &#10;Analysis Panel / Shortcut Key F4 " /></div></a>
                                                </td>
                                            <?php } if ($_SESSION['sessionOwnIndStr'][3] == 'Y') { ?>
                                                <td>
                                                    <a class="menu_headings" onclick="navigationMainBigMiddleImage('DailyTransactions', 'transactions26.png', 'दैनिक लेनदेन पॅनल! \nDaily Transactions Panel / Shortcut Key F6')"
                                                       style="cursor: pointer;"><div id="DailyTransactions"><img src="<?php echo $documentRoot; ?>/images/transactions26.png" alt="Daily Transactions" title="दैनिक लेनदेन पॅनल! &#10;Daily Transactions Panel / Shortcut Key F6" /></div></a>                           <!-- Modified By KHUSH05JAN13 -->
                                                </td>
                                            <?php } if ($_SESSION['sessionOwnIndStr'][7] == 'Y'  || $_SESSION['sessionOwnIndStr'][7] == 'A') { ?>
                                                <td>
                                                    <a class="menu_headings" onclick="navigationMainBigMiddleImage('BarCodePrint', 'tag26.png', 'बारकोड टेग प्रिंट पॅनल! \nBarCode Tag Print Panel / Shortcut Key F7 ')"
                                                       style="cursor: pointer;"><div id="BarCodePrint"><img src="<?php echo $documentRoot; ?>/images/tag26.png" alt="BarCode Print Panel" title="बारकोड टेग प्रिंट पॅनल! &#10;BarCode Tag Print Panel / Shortcut Key F7 " /></div></a>              <!-- Modified By KHUSH04JAN13 -->
                                                </td>
                                            <?php } ?>
                                            <td>
                                                <a class="menu_headings" onclick="navigationMainBigMiddleImage('CustList', 'maleUser26.png', 'कस्टमर लिस्ट पॅनल! \nCustomer List Panel / Shortcut Key F8')"
                                                   style="cursor: pointer;"><div id="CustList"><img src="<?php echo $documentRoot; ?>/images/maleUser26.png" alt="User List" title="यूज़र लिस्ट पॅनल! &#10;User List Panel / Shortcut Key F8" /></div></a>                                                 <!-- Modified By KHUSH04JAN13 -->
                                            </td>
                                            <td>
                                                <a class="menu_headings" onclick="navigationMainBigMiddleImage('AddNewCustomer', 'adduser26.png', 'न्यू कस्टमर जोड़ना पॅनल! \nAdd New Customer Panel / Shortcut Key ALT+F1')"
                                                   style="cursor: pointer;"><div id="AddNewCustomer"><img src="<?php echo $documentRoot; ?>/images/adduser26.png" alt="Add New User" title="न्यू यूज़र जोड़ना पॅनल! &#10;Add New User Panel / Shortcut Key ALT+F1" /></div></a>                              <!-- Modified By KHUSH05JAN13 -->
                                            </td>
                                            <td>
                                                <a class="menu_headings" onclick="showBannerSearchPanel()"
                                                   style="cursor: pointer;"><img src="<?php echo $documentRoot; ?>/images/search26.png" alt="Search Panel" title="कस्टमर या गिरवी खोज पॅनल! &#10;Customer or Girvi Search Panel / Shortcut Key ALT+F2" /></a>
                                            </td>
                                            <!--Start Code To Add Staff Panel @Author:PRIYA22JUL13
                                            <td>
                                                <a class="menu_headings" onclick="navigationMainBigMiddleImage('StaffPanel', 'staff24.png', 'कर्मचारी या बिक्री कार्यपालक पॅनल! \nStaff or Sales Executive Panel / Shortcut Key Alt+F4')"
                                                   style="cursor: pointer;"><div id="StaffPanel"><img src="<?php echo $documentRoot; ?>/images/staff24.png" alt="Staff Panel" title="कर्मचारी या बिक्री कार्यपालक पॅनल! &#10;Staff or Sales Executive Panel / Shortcut Key Alt+F4" /></div></a>                            <!-- Modified By KHUSH05JAN13 
                                            </td>
                                            End Code To Add Staff PAnel @Author:PRIYA22JUL13-->
                                            <!--Start code to change file name @Author:PRIYA26FEB14-->
                                            <td>
                                                <a class="menu_headings" style="cursor: pointer;"
                                                   onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/olgccald.php',
                                                                   'popup', 'width=600,height=380,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no');
                                                           return false;">
                                                    <div id="Calculator"><img src="<?php echo $documentRoot; ?>/images/calculator24.png" alt="Calculator" title="गिरवी कॅल्क्युलेटर पॅनल! &#10;Girvi Calculator Panel / Shortcut Key ALT+F3" /></div>
                                                </a>
                                            </td>
                                            <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                                                <td valign="bottom">
                                                    <a class="menu_headings" onclick="navigationMainBigMiddleImage('ReminderPanel', 'bell.png', 'स्मरण सूची! \nReminder Panel')"  
                                                       style="cursor: pointer;"><div id="ReminderPanel"><img src="<?php echo $documentRoot; ?>/images/bell.png" alt="Reminder Panel" title="स्मरण सूची! &#10;Reminder Panel" border="0"/></div></a>
                                                </td>
                                            <?php } ?>
                                            <!--End code to change file name @Author:PRIYA26FEB14-->
                                            <!-------------End code to add panel indiacator @Author:PRIYA16MAY14------------------>
                                            <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                                                <td valign="bottom">
                                                    <a class="menu_headings" href="https://www.jewellersbook.com" target="_blank" 
                                                       style="cursor: pointer;"><div id="jewellersbook"><img src="<?php echo $documentRoot; ?>/images/jewellersbook-icon.png" alt="Jewellers Book Portal" title="Jewellers Book Portal" border="0"/></div></a>
                                                </td>
                                            <?php } ?>
                                            <td valign="bottom">
                                                <a class="menu_headings" onclick="navigationMainBigMiddleImage('SupportPanel', 'support-24.png', 'सहायता पॅनल! \nSupport Panel')"  
                                                   style="cursor: pointer;"><div id="SupportPanel"><img src="<?php echo $documentRoot; ?>/images/support-24.png" alt="Support Panel" title="सहायता पॅनल! &#10;Support Panel" border="0"/></div></a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!-- Start add div to show backupPanel @AUTHOR: SANDY12SEP13-->
        <div class="backupPanelDisplayDiv" id="logoutMessageDiv" style="visibility: hidden"></div>
        <!-- End add div to show backupPanel @AUTHOR: SANDY12SEP13-->
    </div>
</div>