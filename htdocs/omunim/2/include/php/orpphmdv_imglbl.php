<?php
/*
 * **************************************************************************************
 * @tutorial: NEW HEADER DESIGN FILE @AUTHOR:MADHUREE-25APRIL2020
 * **************************************************************************************
 * 
 * Created on APRIL 25, 2020 2:49:55 PM
 *
 * @FileName: orpphmdv_imglbl.php
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
<?php
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
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
<?php
require_once 'system/omssopin.php';
include_once 'ommcolor.php';
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $headerTextClass = 'nav-link-inline-block-blue';
    $headerOptionColor = "color: #000080";
    //
    $selectHerader = "SELECT omly_value FROM omlayout WHERE omly_option = 'HEADERTHEMES'";
    $queryHerader = mysqli_query($conn, $selectHerader);
    $resultHeader = mysqli_fetch_array($queryHerader);
    $selectHeadTheme = $resultHeader['omly_value'];
    //
    if ($selectHeadTheme != '' || $selectHeadTheme == NULL) {
        $headerBgColor = '#' . $selectHeadTheme;
    } else {
        $headerBgColor = '#eaeaea';
    }
} else {
    $headerTextClass = 'nav-link-inline-block-brown';
    $headerOptionColor = "color: #935116;";
    //
    $selectMasterHerader = "SELECT omly_value FROM omlayout WHERE omly_option = 'MASTERHEADERTHEMES'";
    $queryMasterHeader = mysqli_query($conn, $selectMasterHerader);
    $resMasterHeader = mysqli_fetch_array($queryMasterHeader);
    $selectMasterHeadTheme = $resMasterHeader['omly_value'];
    //
    if ($selectMasterHeadTheme != '' || $selectMasterHeadTheme == NULL) {
        $headerBgColor = '#' . $selectMasterHeadTheme;
    } else {
        $headerBgColor = '#eaeaea';
    }
}
//
?>
<!-- *************************** Start Header Div Code *************************** -->
<div class=" header_div" style="background: <?php echo $headerBgColor; ?>">
    <div id="main_body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!--<div class="table-responsive">-->
                    <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" valign="top">
                        <tr>
                            <td align="left" valign="top" width="50px">
                                <div id="main_logo"  width="50px" valign="top" style="">
                                    <a href="<?php echo $documentRootBSlash; ?>/omHomePage.php?divPanel=OwnerHome" width="50px" valign="top">
                                        <img src="<?php echo $documentRoot; ?>/images/OnlineMunim_Logo.png" alt="oMunim Logo" border="0"  width="70px" style="margin-bottom: 5px;"/>
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
                                        <?php
                                        //
                                        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                                        // START CODE FOR OMUNIM NEW HEADER DESIGN WITH DROPDOWN AND PANEL LINKS @AUTHOR:MADHUREE-23APRIL2020
                                        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                                        //
                                        ?>
                                        <td colspan="2" valign="bottom" style="padding-top: 14px;">
                                            <div class="m-portlet__body">
                                                <ul class="nav nav-pills nav-pills--warning nav-fill" role="tablist" >
                                                    <?php if ($staffId == '' || ($staffId && $array['headerHomePageAccess'] == 'true')) { ?>
                                                        <li class="nav-item home1 dropdown Home-menu active" onclick="showact('home1', this.getAttribute('id'))" id="Home">
                                                            <button type="button" class="<?php echo $headerTextClass; ?>" aria-haspopup="true" aria-expanded="false"
                                                                    onclick="navigationHomePageFromHeader('OwnerHome');">
                                                                <img src="<?php echo $documentRoot; ?>/images/img/home.png" alt="Home" title="ओमुनीम होम पेज! &#10;Home Page / Shortcut Key F1 " border="0"/> HOME
                                                            </button>
                                                            <button type="button" class="<?php echo $headerTextClass; ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                            <div class="dropdown-menu ">
                                                                <table style="width:140px;margin-bottom:5px;border-bottom: 1px dashed #cdcdcd;" border="0">
                                                                    <tr> 
                                                                        <td align="center" style="width:25px;">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/goldRate.png" alt="Home"  border="0" style="height:15px;"/>
                                                                        </td>
                                                                        <td align="left" style="width:120px;">
                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="changeHomePage('Y');">TODAY'S RATE </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table style="width:140px;margin-bottom:5px;border-bottom: 1px dashed #cdcdcd;" border="0">
                                                                    <tr>
                                                                        <td align="center" style="width:25px;">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/easyFill.png" alt="Home"  border="0" style="height:15px;"/>   
                                                                        </td>
                                                                        <td align="left" style="width:120px;">
                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="changeHomePage('L');;">EASY FILL</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table style="width:140px;margin-bottom:5px;border-bottom: 1px dashed #cdcdcd;" border="0">
                                                                    <tr>
                                                                        <td align="center" style="width:25px;">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/classicFrm.png" alt="Home"  border="0" style="height:15px;"/>   
                                                                        </td>
                                                                        <td align="left" style="width:120px;">
                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="changeHomePage('S');;">CLASSIC ENTRY</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table style="width:140px;margin-bottom:5px;border-bottom: 1px dashed #cdcdcd;" border="0">
                                                                    <tr>
                                                                        <td align="center" style="width:25px;">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/defaultFrm.png" alt="Home"  border="0" style="height:15px;"/>  
                                                                        </td>
                                                                        <td align="left" style="width:120px;">
                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="changeHomePage('D');;">DEFAULT</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table style="width:140px;margin-bottom:5px;border-bottom: 1px dashed #cdcdcd;" border="0">
                                                                    <tr>
                                                                        <td align="center" style="width:25px;">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/defaultFrm.png" alt="Home"  border="0" style="height:15px;"/>  
                                                                        </td>
                                                                        <td align="left" style="width:120px;">
                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="changeHomePage('B');">DASHBOARD</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </li>
                                                    <?php } if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'B' || $_SESSION['sessionOwnIndStr'][1] == 'A') { ?>
                                                        <?php if ($staffId == '' || ($staffId && $array['loanPanel'] == 'true')) { ?>
                                                            <li class="nav-item home1 dropdown Home-menu" onclick="showact('home1', this.getAttribute('id'))" id="Loan">
                                                                <button type="button" class="<?php echo $headerTextClass; ?>" aria-haspopup="true" aria-expanded="false"
                                                                        onclick="navigatationPanelByFileName('mainBigMiddle', 'omppsbdv', 'GirviPanel', '', '', '', '', '', '');">
                                                                    <div id="GirviPanel" style="display: inline;"><img src="<?php echo $documentRoot; ?>/images/img/loan-item.png" alt="Loan" title = "संपूर्ण गिरवी पॅनल! &#10;Girvi Panel / Shortcut Key Alt+F5" border="0"/> LOAN</div>
                                                                </button>
                                                                <button type="button" class="<?php echo $headerTextClass; ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                                <div class="dropdown-menu">
                                                                    <table style="width:300px;" border="0">
                                                                        <tr>
                                                                            <td width="50%" align="center" valign="center">
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>

                                                                                        <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A' || $_SESSION['sessionOwnIndStr'][1] == 'B') { ?>
                                                                                            <td align="left" style="width:30px">
                                                                                                <img src="<?php echo $documentRoot; ?>/images/img/loan-item.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                            </td>
                                                                                            <td align="left" style="width:160px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'orgpgvpn', 'ActiveGirviPanel');">ACTIVE LOANS</a>
                                                                                            </td>
                                                                                        <?php } ?>
                                                                                        <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A' || $_SESSION['sessionOwnIndStr'][1] == 'B') { ?>
                                                                                            <td align="left" style="width:30px">
                                                                                                <img src="<?php echo $documentRoot; ?>/images/img/release.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                            </td>
                                                                                            <td align="left" style="width:160px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'orgpgvpn', 'ReleasedGirviPanel');">RELEASED LOANS</a>
                                                                                            </td>
                                                                                        <?php } ?>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>

                                                                        </tr>
                                                                    </table>
                                                                    <table style="width:300px;" border="0">
                                                                        <tr>
                                                                            <td width="50%" align="center" valign="center">
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="left" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/img/auction.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                        </td>
                                                                                        <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') { ?>
                                                                                            <td align="left" style="width:160px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'orgpgvpn', 'AuctionedGirviPanel');">AUCTIONED LOANS</a>
                                                                                            </td>
                                                                                        <?php } ?> 
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td width="50%" align="center" valign="center">
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="left" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/img/loan-loss.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                        </td>
                                                                                        <?php
                                                                                        if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A' || $_SESSION['sessionOwnIndStr'][1] == 'B') {
                                                                                            if ($_SESSION['sessionOwnIndStr'][28] == 'Y' || $_SESSION['sessionOwnIndStr'][28] == 'A' || $_SESSION['sessionOwnIndStr'][28] == 'B' || $_SESSION['sessionOwnIndStr'][28] == 'S') {
                                                                                                ?>
                                                                                                <td align="left" style="width:160px;">
                                                                                                    <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'orgpgvpn', 'LossedGirviPanel');">LOANS IN LOSS</a>
                                                                                                </td>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>


                                                                        </tr>
                                                                    </table>
                                                                    <table style="width:300px;" border="0">
                                                                        <tr>
                                                                            <td width="50%" align="center" valign="center">
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="left" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/active.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                        </td>
                                                                                        <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') { ?>
                                                                                            <td align="left" style="width:160px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'orgpgvpn', 'TransferedGirviPanel');">TRANS LOANS</a>
                                                                                            </td>
                                                                                        <?php } ?>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td width="50%" align="center" valign="center">
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="left" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/img/loan-item.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                        </td>
                                                                                        <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') { ?>
                                                                                            <td align="left" style="width:160px;" border="1">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'orgpgvpn', 'TallyGirviPanel');">TALLY LOANS</a>
                                                                                            </td>
                                                                                        <?php } ?>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>     
                                                                        </tr>
                                                                    </table>
                                                                    <table style="width:300px;" border="0">
                                                                        <tr>
                                                                            <td width="50%" align="center" valign="center">
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="left" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/settings-3-16.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                        </td>
                                                                                        <?php
                                                                                        if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') {
                                                                                            if ($_SESSION['sessionOwnIndStr'][26] == 'Y' || $_SESSION['sessionOwnIndStr'][26] == 'A') {
                                                                                                ?>
                                                                                                <td align="left" style="width:160px;">
                                                                                                    <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'orgpgvpn', 'FinanceGirviPanel');">FINANCE EMI</a>
                                                                                                </td>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td width="50%" align="center" valign="center">
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="left" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/img/setting01.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                        </td>       
                                                                                        <?php if ($_SESSION['sessionOwnIndStr'][28] == 'A' || $_SESSION['sessionOwnIndStr'][28] == 'S' || $_SESSION['sessionOwnIndStr'][28] == 'Y') { ?>
                                                                                            <td align="left" style="width:110px;" border="1">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'orgpgvpn', 'SetupGirviPanel');">SETUP</a>
                                                                                            </td>
                                                                                        <?php } ?>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>   
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                    <?php } if ($staffId == '' || ($staffId && $array['udhaarPanelAccess'] == 'true')) { ?>
                                                        <li class="nav-item home1 dropdown Home-menu" onclick="showact('home1', this.getAttribute('id'))" id="crdr">
                                                            <button type="button" class="<?php echo $headerTextClass; ?>" aria-haspopup="true" aria-expanded="false"
                                                                    onclick="navigatationPanelByFileName('mainBigMiddle', 'omppsbdv', 'UdhaarPanel', '');">
                                                                <div id="UdhaarPanel" style="display: inline;"><img src="<?php echo $documentRoot; ?>/images/img/cr-dr.png" alt="Udhaar" title="उधार पॅनल! &#10;Udhaar Panel / Shortcut Key Alt+F6" border="0"/> CR/DR</div>
                                                            </button>
                                                            <button type="button" class="<?php echo $headerTextClass; ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                            <div class="dropdown-menu">
                                                                <table style="width:160px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;">
                                                                    <tr>
                                                                        <td align="center" style="width:30px">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/money.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                        </td>
                                                                        <?php if ($_SESSION['sessionOwnIndStr'][25] == 'Y' || $_SESSION['sessionOwnIndStr'][25] == 'A' || $_SESSION['sessionOwnIndStr'][25] == 'B') { ?>
                                                                            <td align="left" style="width:140px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omuupnal', 'activeUdhaarList');">ACTIVE UDHAAR</a>
                                                                            </td>
                                                                        <?php } ?>
                                                                        <?php if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                                                                            <td align="left" style="width:140px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omuupnal', 'allUdhaarList');">ALL UDHAAR</a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </table>
                                                                <table style="width:160px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;">
                                                                    <tr>
                                                                        <td align="center" style="width:30px">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/deposit-udhar.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                        </td>
                                                                        <?php if ($_SESSION['sessionOwnIndStr'][25] == 'Y' || $_SESSION['sessionOwnIndStr'][25] == 'A' || $_SESSION['sessionOwnIndStr'][25] == 'S') { ?>
                                                                            <td align="left" style="width:140px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omuupnal', 'UdhaarDepositList');">UDHAAR DEPOSIT</a>
                                                                            </td>
                                                                        <?php } ?>
                                                                        <?php if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                                                                            <td align="left" style="width:140px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omuupnal', 'UdhaarList');">UDHAAR & DEPOSIT</a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </table>
                                                                <table style="width:160px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;">
                                                                    <tr>
                                                                        <td align="center" style="width:30px">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/deposit-udhar.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                        </td>
                                                                        <?php if ($_SESSION['sessionOwnIndStr'][25] == 'Y' || $_SESSION['sessionOwnIndStr'][25] == 'A' || $_SESSION['sessionOwnIndStr'][25] == 'B') { ?>
                                                                            <td align="left" style="width:140px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omuupnal', 'advanceMoney');">ADVANCE MONEY</a>
                                                                            </td>
                                                                        <?php } ?>
                                                                        <?php if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                                                                            <td align="left" style="width:140px;" border="1">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omuupnal', 'AllAdvanceMoney');">ALL ADV. MONEY</a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </table>
                                                                <table style="width:160px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;">
                                                                    <tr>

                                                                        <?php if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                                                                            <td align="left" style="width:140px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omuupnal', 'AdvanceReturn');">ADV. RETURN</a>
                                                                            </td>
                                                                        <?php } ?>
                                                                        <?php if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                                                                            <td align="left" style="width:140px;" border="1">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omuupnal', 'Advance');">ADV. MONEY-RETURN</a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </li>
                                                    <?php } if ($_SESSION['sessionOwnIndStr'][3] == 'Y' || $_SESSION['sessionOwnIndStr'][3] == 'A' || $_SESSION['sessionOwnIndStr'][3] == 'B') { ?>
                                                        <?php if ($staffId == '' || ($staffId && $array['transPanelAccess'] == 'true')) { ?>
                                                            <li class="nav-item home1 dropdown Home-menu" onclick="showact('home1', this.getAttribute('id'))" id="Expense">
                                                                <button type="button" class="<?php echo $headerTextClass; ?>" aria-haspopup="true" aria-expanded="false"
                                                                        onclick="navigatationPanelByFileName('mainBigMiddle', 'omtatrnd', 'DailyTransactions', '', '', '', '', '', '');">
                                                                    <div id="DailyTransactions" style="display: inline;"><img src="<?php echo $documentRoot; ?>/images/img/expense.png" alt="Transcation" title="दैनिक लेनदेन पॅनल! &#10;Daily Transactions Panel / Shortcut Key Alt+F7" border="0"/> EXPENSE</div>
                                                                </button>
                                                            </li>
                                                        <?php } ?>
                                                    <?php } if ($_SESSION['sessionOwnIndStr'][7] == 'Y' || $_SESSION['sessionOwnIndStr'][7] == 'A' || $_SESSION['sessionOwnIndStr'][7] == 'B' || $_SESSION['sessionOwnIndStr'][7] == 'A') { ?>
                                                        <?php if ($staffId == '' || ($staffId && $array['barcodePanelAccess'] == 'true')) { ?>
                                                            <li class="nav-item home1 dropdown  Home-menu" onclick="showact('home1', this.getAttribute('id'))" id="Tag">
                                                                <button type="button" class="<?php echo $headerTextClass; ?>" aria-haspopup="true" aria-expanded="false"
                                                                        onclick="navigatationPanelByFileName('mainBigMiddle', 'ombcbcpp', 'Items55x13LoanBarCodePanel');">
                                                                    <div id="BarCodePrint" style="display: inline;"><img src="<?php echo $documentRoot; ?>/images/img/tag.png" alt="Home" title="बारकोड टेग प्रिंट पॅनल! &#10;BarCode Tag Print Panel / Shortcut Key F7 " border="0"/> TAG</div>
                                                                </button>
                                                                <button type="button" class="<?php echo $headerTextClass; ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                                <div class="dropdown-menu">
                                                                    <?php if ($_SESSION['sessionOwnIndStr'][7] == 'Y' || $_SESSION['sessionOwnIndStr'][7] == 'A') { ?>
                                                                        <table style="width:140px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                            <tr>
                                                                                <td align="center" style="width:30px">
                                                                                    <img src="<?php echo $documentRoot; ?>/images/img/barcode-scan.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                </td> 
                                                                                <td align="left" style="width:100px;">
                                                                                    <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'ombcbcpp', 'Items55x13LoanBarCodePanel');">TAIL LOAN</a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php } else if ($_SESSION['sessionOwnIndStr'][7] == 'A') { ?>
                                                                        <table style="width:140px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                            <tr>
                                                                                <td align="center" style="width:30px">
                                                                                    <img src="<?php echo $documentRoot; ?>/images/img/barcode-scan.png" alt="Home"  border="0" style="height:17px;"/>   
                                                                                </td> 
                                                                                <td align="left" style="width:90px;">
                                                                                    <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'ombcbcpp', 'GirviBarCodePanel');">24L LOAN</a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table style="width:140px;" border="0">
                                                                            <tr>
                                                                                <td align="left" style="width:20px;"></td>
                                                                                <td align="left" style="width:100px;">
                                                                                    <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'ombcbcpp', 'BarCodePrintHelp');">HELP</a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php } ?>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                    <?php } if ($staffId == '' || ($staffId && $array['headerCustomerListAccess'] == 'true')) { ?>
                                                        <li class="nav-item home1 dropdown  Home-menu" onclick="showact('home1', this.getAttribute('id'))" id="userList">
                                                            <button type="button" class="<?php echo $headerTextClass; ?>" aria-haspopup="true" aria-expanded="false"
                                                                    onclick="navigatationPanelByFileName('mainBigMiddle', 'omcccldv', 'CustList');">
                                                                <div id="CustList" style="display: inline;"><img src="<?php echo $documentRoot; ?>/images/maleUser16.png" alt="Add User" title="यूज़र लिस्ट पॅनल! &#10;User List Panel / Shortcut Key F8" border="0"/> USER LIST</div>
                                                            </button>
                                                            <button type="button" class="<?php echo $headerTextClass; ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                            <div class="dropdown-menu">
                                                                <table style="width:350px;" border="0">
                                                                    <tr>
                                                                        <td align="center" width="50%" valign="top">
                                                                            <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                <tr> 
                                                                                    <td align="center" style="width:30px;">
                                                                                        <img src="<?php echo $documentRoot; ?>/images/img/user.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                    </td>
                                                                                    <td align="left" style="width:120px;">
                                                                                        <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="showUserList('customer');">CUSTOMER LIST</a>
                                                                                    </td>
                                                                                    <?php
                                                                                    if ($staffId == '' || ($staffId && $array['leadListAccess'] != 'false')) {
                                                                                        if ($_SESSION['sessionOwnIndStr'][42] == 'Y' || $_SESSION['sessionOwnIndStr'][42] == 'A') {
                                                                                            ?>
                                                                                            <td align="left" style="width:120px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="showUserList('leads');">VISITOR LIST</a>
                                                                                            </td>
                                                                                        <?php } ?>
                                                                                    <?php } ?>
                                                                                </tr>
                                                                            </table>
                                                                            <table>
                                                                                <tr>

                                                                                    <?php
                                                                                    if ($staffId == '' || ($staffId && $array['supplierListAccess'] != 'false')) {
                                                                                        if ($_SESSION['sessionOwnIndStr'][4] == 'Y' || $_SESSION['sessionOwnIndStr'][4] == 'A' || $_SESSION['sessionOwnIndStr'][4] == 'B') {
                                                                                            ?>
                                                                                            <td align="center" style="width:30px;">
                                                                                                <img src="<?php echo $documentRoot; ?>/images/maleUser32.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                            </td>
                                                                                            <td align="left" style="width:120px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="showUserList('supplier');">SUPPLIER LIST</a>
                                                                                            </td>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>

                                                                                </tr>
                                                                            </table>
                                                                            <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                <tr>

                                                                                    <?php
                                                                                    if ($staffId == '' || ($staffId && $array['supplierListAccess'] != 'false')) {
                                                                                        if ($_SESSION['sessionOwnIndStr'][4] == 'Y' || $_SESSION['sessionOwnIndStr'][4] == 'A' || $_SESSION['sessionOwnIndStr'][4] == 'B') {
                                                                                            ?>
                                                                                            <td align="left" style="width:120px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="showUserList('supplier');">SUPPLIER LIST</a>
                                                                                            </td>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($staffId == '' || ($staffId && $array['empListAccess'] != 'false')) {
                                                                                        if ($_SESSION['sessionOwnIndStr'][5] != 'N' || $_SESSION['sessionOwnIndStr'][5] > 0) {
                                                                                            ?>
                                                                                            <td align="center" style="width:30px;">
                                                                                                <img src="<?php echo $documentRoot; ?>/images/adduser32.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                            </td>
                                                                                            <td align="left" style="width:120px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="showUserList('staff');">STAFF LIST</a>
                                                                                            </td>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </tr>
                                                                            </table>
                                                                            <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                <tr>

                                                                                    <?php
                                                                                    if ($staffId == '' || ($staffId && $array['supplierListAccess'] != 'false')) {
                                                                                        if (($_SESSION['sessionOwnIndStr'][4] == 'Y' || $_SESSION['sessionOwnIndStr'][4] == 'A' || $_SESSION['sessionOwnIndStr'][4] == 'B') && $_SESSION['sessionProdName'] != 'OMRETL') {
                                                                                            ?>
                                                                                            <td align="center" style="width:30px;">
                                                                                                <img src="<?php echo $documentRoot; ?>/images/supplier32.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                            </td>
                                                                                            <td align="left" style="width:120px;">
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="showUserList('karigar');">KARIGAR KIST</a>
                                                                                            </td>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($staffId == '' || ($staffId && $array['moneyLenderListAccess'] == 'true')) {
                                                                                        if ($_SESSION['sessionOwnIndStr'][6] == 'Y' || $_SESSION['sessionOwnIndStr'][6] == 'A' || $_SESSION['sessionOwnIndStr'][6] == 'B') {
                                                                                            ?>
                                                                                            <td align="center" style="width:30px;">
                                                                                                <img src="<?php echo $documentRoot; ?>/images/supplier32.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                            </td>
                                                                                            <td align="left" style="width:120px;" >
                                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="showUserList('moneyLender');">MONEY LENDER LIST</a>
                                                                                            </td>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </tr>
                                                                            </table>
                                                                            <table>
                                                                                <tr>
                        <!--                                                             <td align="center" style="width:30px;">
                                                                                                    <img src="<?php echo $documentRoot; ?>/images/img/user.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                                </td>-->
                                                                                    <?php if ($_SESSION['sessionOwnIndStr'][24] == 'S' || $_SESSION['sessionOwnIndStr'][24] == 'A') { ?>
                                                                                        <td align="left" style="width:120px;">
                                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="showChitFundList('chitfund');">CHIT FUND LIST</a>
                                                                                        </td>
                                                                                    <?php } ?>
                                                                                    <td align="left" style="width:120px;" >
                                                                                    </td>
                                                                                </tr>
                                                                            </table>       
                                                                        </td>
                                                                    <?php } if ($staffId == '' || ($staffId && $array['headerAddCustomerAccess'] == 'true')) { ?>
                                                                        <td align="center" width="50%" valign="top">                                                                
                                                                            <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                <tr>
                                                                                    <td align="center" style="width:30px;">
                                                                                        <img src="<?php echo $documentRoot; ?>/images/img/add-user.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                    </td>
                                                                                    <td align="left" style="width:120px;">
                                                                                        <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'AddNewCustomer', '', '', '', '', '', '');">ADD CUSTOMER</a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <?php if ($_SESSION['sessionOwnIndStr'][4] == 'Y' || $_SESSION['sessionOwnIndStr'][4] == 'A' || $_SESSION['sessionOwnIndStr'][4] == 'B') { ?>
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="center" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/supplierAdd32.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                        </td>
                                                                                        <td align="left" style="width:120px;">
                                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'supplier', '', '', '', '', '', '');">ADD SUPPLIER</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            <?php } if ($_SESSION['sessionOwnIndStr'][5] != 'N' || $_SESSION['sessionOwnIndStr'][5] > 0) { ?>
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="center" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/adduser32.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                        </td>
                                                                                        <td align="left" style="width:120px;">
                                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'staff', '', '', '', '', '', '');">ADD STAFF</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            <?php } if ($_SESSION['sessionOwnIndStr'][6] == 'Y' || $_SESSION['sessionOwnIndStr'][6] == 'A' || $_SESSION['sessionOwnIndStr'][6] == 'B') { ?>
                                                                                <table style="width:100%;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                                    <tr>
                                                                                        <td align="center" style="width:30px;">
                                                                                            <img src="<?php echo $documentRoot; ?>/images/supplier32.png" alt="Home"  border="0" style="height:17px;"/>
                                                                                        </td>
                                                                                        <td align="left" style="width:120px;">
                                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'moneyLender', '', '', '', '', '', '');">ADD MONEY LENDER</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            <?php } ?>

                                                                        </td>
                                                                    <?php } ?>         
                                                            </table>

                                                        </div>
                                                    </li>
                                                    <?php // } if ($staffId == '' || ($staffId && $array['headerAddCustomerAccess'] == 'true')) { ?>
                                                    <!--                                            <li class="nav-item home1 dropdown  Home-menu" >
                                                                                                    <button type="button" class="<?php echo $headerTextClass; ?>" aria-haspopup="true" aria-expanded="false"
                                                                                                            onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'AddNewCustomer', '', '', '', '', '', '');">
                                                                                                        <div id="AddNewCustomer" style="display: inline;"><img src="<?php echo $documentRoot; ?>/images/adduser16.png" alt="User List" title="न्यू यूज़र जोड़ना पॅनल! &#10;Add New User Panel / Shortcut Key Alt+F1" border="0"/> ADD USER</div>
                                                                                                    </button>
                                                                                                    <button type="button" class="<?php echo $headerTextClass; ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                                                                    <div class="dropdown-menu">
                                                    
                                                                                                        <table style="width:140px;" border="0">
                                                                                                            <tr>
                                                                                                                <td align="left" style="width:20px;"></td>
                                                                                                                <td align="left" style="width:120px;">
                                                                                                                    <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'AddNewCustomer', '', '', '', '', '', '');">ADD CUSTOMER</a>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                    <?php // if ($_SESSION['sessionOwnIndStr'][4] == 'Y' || $_SESSION['sessionOwnIndStr'][4] == 'A' || $_SESSION['sessionOwnIndStr'][4] == 'B') { ?>
                                                                                                            <table style="width:140px;" border="0">
                                                                                                                <tr>
                                                                                                                    <td align="left" style="width:20px;"></td>
                                                                                                                    <td align="left" style="width:120px;">
                                                                                                                        <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'supplier', '', '', '', '', '', '');">ADD SUPPLIER</a>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                    <?php // } if ($_SESSION['sessionOwnIndStr'][5] != 'N' || $_SESSION['sessionOwnIndStr'][5] > 0) { ?>
                                                                                                            <table style="width:140px;" border="0">
                                                                                                                <tr>
                                                                                                                    <td align="left" style="width:20px;"></td>
                                                                                                                    <td align="left" style="width:120px;">
                                                                                                                        <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'staff', '', '', '', '', '', '');">ADD STAFF</a>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                    <?php // } if ($_SESSION['sessionOwnIndStr'][6] == 'Y' || $_SESSION['sessionOwnIndStr'][6] == 'A' || $_SESSION['sessionOwnIndStr'][6] == 'B') { ?>
                                                                                                            <table style="width:140px;" border="0">
                                                                                                                <tr>
                                                                                                                    <td align="left" style="width:20px;"></td>
                                                                                                                    <td align="left" style="width:120px;">
                                                                                                                        <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcaadcd', 'moneyLender', '', '', '', '', '', '');">ADD MONEY LENDER</a>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                    <?php // } ?>
                                                                                                    </div>
                                                                                                </li>-->
                                                    <?php // } ?>
                                                    <li class="nav-item home1 dropdown  Home-menu" onclick="showact('home1', this.getAttribute('id'))" id="Support">
                                                        <button type="button" class="<?php echo $headerTextClass; ?>" aria-haspopup="true" aria-expanded="false"
                                                                onclick="<?php if ($staffId == '') { ?>navigatationPanelByFileName('mainBigMiddle', 'omsupportpanel', 'SupportPanel', '', '', '', '', '', '');<?php } ?>">
                                                            <img src="<?php echo $documentRoot; ?>/images/img/more.png" alt="More Panel" title="ओमुनीम होम पेज! &#10;Home Page / Shortcut Key F1 " border="0"/>  MORE
                                                        </button>
                                                        <button type="button" class="<?php echo $headerTextClass; ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                        <div class="dropdown-menu">
                                                            <?php if ($_SESSION['sessionOwnIndStr'][2] == 'Y' || $_SESSION['sessionOwnIndStr'][2] == 'A' || $_SESSION['sessionOwnIndStr'][2] == 'B') { ?>
                                                                <?php if ($staffId == '' || ($staffId && $array['headerAnalysisPanelAccess'] == 'true')) { ?>
                                                                    <table style="width:140px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                        <tr>
                                                                            <td align="center" style="width:30px;">
                                                                                <img src="<?php echo $documentRoot; ?>/images/img/logs01.png" alt="Home"  border="0" style="height:17px;"/>
                                                                            </td> 
                                                                            <td align="left" style="width:120px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omgnsfan', 'Analysis');">ANALYSIS PANEL</a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <?php if ($_SESSION['sessionProdName'] != 'OMRETL' && ($_SESSION['sessionOwnIndStr'][29] == 'Y' || $_SESSION['sessionOwnIndStr'][29] == 'A')) { ?>
                                                                <?php if ($staffId == '' || ($staffId && $array['headerRemainderPanelAccess'] == 'true')) { ?>
                                                                    <table style="width:140px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                        <tr>
                                                                            <td align="center" style="width:30px;">
                                                                                <img src="<?php echo $documentRoot; ?>/images/img/research.png" alt="Home"  border="0" style="height:17px;"/>
                                                                            </td> 
                                                                            <td align="left" style="width:120px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'ommpntfcn', 'ReminderPanel');">REMINDER PANEL</a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                                                                <?php if ($staffId == '' || ($staffId && $array['headerGirviCalculatorAccess'] == 'true')) { ?>
                                                                    <table style="width:140px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                        <tr>
                                                                            <td align="center" style="width:30px;">
                                                                                <img src="<?php echo $documentRoot; ?>/images/img/side-calculator1.png"" alt="Home"  border="0" style="height:17px;"/>
                                                                            </td> 
                                                                            <td align="left" style="width:120px;">
                                                                                <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab"  onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/olgccald.php',
                                                                                                'popup', 'width=600,height=380,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no');
                                                                                        return false;">GIRVI CALC</a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <?php if ($staffId == '') { ?>
                                                                <table style="width:140px;border-bottom: 1px dashed #cdcdcd;margin-bottom:5px;" border="0">
                                                                    <tr>
                                                                        <td align="center" style="width:30px;">
                                                                            <img src="<?php echo $documentRoot; ?>/images/img/search-scheme.png" alt="Home"  border="0" style="height:17px;"/>
                                                                        </td> 
                                                                        <td align="left" style="width:120px;">
                                                                            <a style="<?php echo $headerOptionColor; ?>" data-toggle="tab" onclick="navigatationPanelByFileName('mainBigMiddle', 'omsupportpanel', 'SupportPanel', '', '', '', '', '', '');">SUPPORT PANEL</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            <?php } ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <?php
                                        //
                                        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                                        // END CODE FOR OMUNIM NEW HEADER DESIGN WITH DROPDOWN AND PANEL LINKS @AUTHOR:MADHUREE-23APRIL2020
                                        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                                        //
                                        ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!--</div>-->    
                </div>
            </div>
        </div>
        <div class="backupPanelDisplayDiv" id="logoutMessageDiv" style="visibility: hidden"></div>
    </div>
</div>
<!-- *************************** End Header Div Code *************************** -->
