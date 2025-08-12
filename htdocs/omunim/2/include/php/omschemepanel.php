<?php
/* * *************************************************************************************
 * @tutorial: MAIN SCHEME PANEL FILE @PRIYANKA-16JULY2019
 * **************************************************************************************
 *  
 * 
 * Created on 16 JULY, 2019 12:20:17 PM
 *
 * @FileName: omschemepanel.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
// MANDATORY FILES
if (!isset($_SESSION)) {
    session_start();
}
//
$currentFileName = basename(__FILE__);
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
?>
<?php
// Staff access array file @Author:SHRI30SEP19
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
//
$panelNameNav = $_REQUEST['panelNameNav'];
//START CODE FOR SCHEME PANEL LAYOUT BY ASHWINI PATIL
?>
<div id="mainMiddle" class="main_middle">
    <div class="main_middle_cust_list">

        <table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr>
                <td colspan="2" align="left">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td valign="top" align="left" colspan="9">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td valign="middle" align="left" width="20px">
                                            <div class="analysis_div_rows" id="userImg"><img src="<?php echo $documentRoot; ?>/images/scheme_icon_32.png" /></div>
                                        </td>
                                        <td valign="middle" align="left">
                                            <div class="textLabelHeading paddingRight5"> SCHEME PANEL</div>
                                        </td>

                                        <td valign="middle" align="center">
                                            <div id="ajaxLoadShowSearchUdhaarDiv" style="visibility: hidden" class="blackMess11">
                                                <?php include 'omzaajll.php'; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
            </tr>
<!--            <tr>
                <td align="center" colspan="2">
                    <hr color="#B8860B" />
                </td>
            </tr>-->
            <tr align="left">
                <td align="left" valign="middle" colspan="2">
                    <div id="searchUdhaarPanelDiv"></div>
                </td>
            </tr>
        </table>
        <div class="m-portlet__body" style="margin-top: 2px;margin-bottom: 2px;">
            <ul class="nav nav-pills nav-pills--warning nav-fill" role="tablist" style="height: 30px;background:#f9f7a2;border:0px solid #f9f0b5;box-shadow: 1px 2px 10px rgba(214, 213, 213, 0.3);">
                <?php
                if ($_SESSION['sessionOwnIndStr'][24] == 'Y' ||
                        $_SESSION['sessionOwnIndStr'][24] == 'B' ||
                        $_SESSION['sessionOwnIndStr'][24] == 'A') {
                    ?>
                    <?php if ($staffId == '' || ($staffId && $array['addSchemeAccess'] != 'false')) { 
                        $panelName1=$_REQUEST['panelNameNav'];
                        ?>
                        <li class="nav-item scheme dropdown <?php if($panelName1 == 'addNewScheme' || $_REQUEST['panelName'] == 'SchemePanel' ){echo 'active';} ?>"  onclick="showact('scheme',this.getAttribute('id'))" id="scheme01" style="text-align: center; width:30px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showSchemePanel('addNewScheme');">
                               ADD NEW SCHEME
                            </button>
                        </li>
                    <?php } ?>
                    <?php if ($staffId == '' || ($staffId && $array['SchemeSearchAccess'] == 'true')) { ?>
                        <li class="nav-item scheme dropdown <?php if($panelName1 == 'searchSchemeByBarcode'){echo 'active';} ?>"  onclick="showact('scheme',this.getAttribute('id'))" id="scheme02" style="text-align: center; width:20px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showSchemePanel('searchSchemeByBarcode');">
                                SEARCH SCHEME
                            </button>
                        </li>
                    <?php } ?>
                    <?php if ($staffId == '' || ($staffId && ($array['SchemeNonCollectionListAccess'] == 'true' || $array['SchemeCollectionListAccess'] == 'true'))) { ?>
                        <li class="nav-item scheme dropdown "  onclick="showact('sell',this.getAttribute('id'))" id="scheme03" style="text-align: center; width:0px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showSchemeReport();">
                                REPORT
                            </button>
                        </li>
                    <?php } ?>
                    <li class="nav-item scheme dropdown"  onclick="showact('scheme',this.getAttribute('id'))" id="scheme04" style="text-align: center; width:55px;">
                        <?php if ($staffId == '' || ($staffId && $array['SchemeListAccess'] == 'true')) { ?>
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllSchemesList();">
                                ALL SCHEME REPORT
                            </button>
                        <?php } else { ?>
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="">
                                SCHEME REPORTS
                            </button>   
                        <?php } ?>
                        <button type="button" class="nav-link-inline-block schemClr dropdown-toggle dropdown-toggle-split" style="font-size: 16px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                        <div class="dropdown-menu">
                            <?php if ($staffId == '' || ($staffId && $array['ClosedSchemeAccess'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="showSchemeCloseList();">CLOSED SCHEME REPORT</a>
                            <?php } ?>
                            <?php if ($staffId == '' || ($staffId && $array['CurrentSchemeAccess'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="showSchemeCurrentList();">CURRENT SCHEME REPORT</a>
                            <?php } ?>
<!-- Current Due Date Scheme Report added by Chetan@110923 --> 
                                <?php if ($staffId == '' || ($staffId && $array['CurrDueDateSchemeAccess'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="showCurrDueDateSchemeList();">DUE DATE SCHEME REPORT</a>
                            <?php } ?>
                                <?php if ($staffId == '' || ($staffId && $array['MaturityDateSchemeAccess'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="showMatDateSchemeList();">MATURITY DATE SCHEME REPORT</a>
                            <?php } ?>
                                <?php if ($staffId == '' || ($staffId && $array['MaturityDateSchemeAccess'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="showAllMatDateSchemeList();">ALL MATURITY DATE SCHEME REPORT</a>
                            <?php } ?>
                                <?php if ($staffId == '' || ($staffId && $array['ClosedSchemeAccess'] == 'true')) { ?>
                                <a class="dropdown-item" data-toggle="tab" onclick="showTodaySchemeCloseList();">TODAY CLOSING SCHEME LIST</a>
                            <?php } ?>        
                        </div>
                    </li>
                   <?php if ($staffId == '' || ($staffId && ($array['SchemeCollectionApprovalListAccess'] == 'true' || $array['SchemeCollectionApprovalListAccess'] == 'true'))) { ?>
                    <li class="nav-item scheme dropdown"  onclick="showact('scheme',this.getAttribute('id'))" id="scheme05" style="text-align: center; width:95px;">
                        <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                style="font-size: 16px;" onclick="showSchemeColleciotnListApproval();">
                            COLLECTION LIST - APPROVAL
                        </button>
                    </li>
                    <?php } ?>
                    <?php if ($staffId == "") { ?>
                        <li class="nav-item scheme dropdown"  onclick="showact('scheme',this.getAttribute('id'))" id="scheme06" style="text-align: center; width:95px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showSchemeColleciotnListComplete();">
                                COLLECTION LIST - COMPLETE
                            </button>
                        </li>
                    <?php } ?>
                    <?php if ($staffId == '') { ?>
                        <li class="nav-item scheme dropdown"  onclick="showact('scheme',this.getAttribute('id'))" id="scheme07" style="text-align: center; width:25px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="addUserGroup('<?php echo $firmId; ?>');">
                                SCHEME SETTING
                            </button>
                        </li>
                    <?php } ?>                        
                <?php } ?>
            </ul>
        </div>
<!--        <table width="100%">
            <tr>
                <td align="center" colspan="2">
                    <hr color="#B8860B" />
                </td>
            </tr>
        </table>-->
        <div id="schemeMainDiv">
            <?php
            if ($panelNameNav == 'addNewScheme') {
                include 'omaddnewscheme_104.php';
            } else if ($panelNameNav == 'addScheme') {
                include 'omktdetl.php';
            } else if ($panelNameNav == 'searchSchemeByBarcode') {
                include 'omsearchschemebybarcode.php';
            } else if ($panelNameNav == 'showSchemeList') {
                include 'omallschemelist.php';
            } else if ($panelNameNav == 'schemeList') {
                include 'omktslist.php';
            } else {
                include 'omaddnewscheme_104.php';
            }
            ?>  
        </div>
    </div>
</div>

<?PHP
// END CODE FOR SCHEME PANEL LAYOUT BY ASHWINI PATIL
?>
