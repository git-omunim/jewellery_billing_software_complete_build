<?php
/*
 * **************************************************************************************
 * @tutorial: Girvi Ledger 
 * **************************************************************************************
 * 
 * Created on NOV 08, 2016 11:59:25 AM
 *
 * @FileName: orbbblsh_1.php
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
include 'ommprspc.php';
require_once 'system/omssopin.php';
?>
<div id="girviLedgerDetails">
    <?php
    /*     * ******Start code to add panel indiacator @Author:SANT09NOV16************ */
    if ($_SESSION['sessionOwnIndStr'][9] == 'Y') {
        $getYear = $_GET['balanceSheetYear'];
        $getMonth = $_GET['balanceSheetMonth'];
        $selFirmId = $_GET['firmId'];
        if (!isset($selFirmId)) {
            $firmIdSelected = $_SESSION['setFirmSession'];
            $selFirmId = $firmIdSelected;
        } else {
            $firmIdSelected = $selFirmId;
        }
        if ($selFirmId == '' || $selFirmId == NULL) {
            $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='1'";
        } else {
            $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='$selFirmId'";
        }
        $resultFirm = mysqli_query($conn,$qSelectFirm);
        $rowFirm = mysqli_fetch_array($resultFirm);
        ?>
        <div id="balanceSheetHeaderDiv">
            <table  border="0" cellspacing="0" cellpadding="0" class="width_260mm" align="center"><!----Class changed @Author:PRIYA25JUN14------------>
                <tr>
                    <td colspan="2" align="left">
                        <table border="0" cellspacing="0" cellpadding="1" width="100%">      
                            <tr>
<!--                                <td valign="middle" align="left" width="10px">-Change in setScrollIdFun parameter ID @AUTHOR: SANDY10DEC13----
                                    <img src="<?php echo $documentRoot; ?>/images/girvi24.png" height="15px" alt="" onLoad="setScrollIdFun('headerTable')"/>Id changed @Author:PRIYA24OCT13 to add image and chanes in width of tables @AUTHOR: SANDY30JUL13 
                                </td>-->
<!--                                <td>
                                    <div class="itemAddPnLabels12">TRANSACTION LEDGER</div>
                                    <div class="main_link_brown16">USER TRANSACTION LEDGER (लेनदेन विवरण)</div>
                                </td>-->
                                <td valign="middle" align="center" width="100px">
                                    <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden" class="blackMess11">
                                        <?php include 'omzaajld.php'; ?>
                                    </div>
                                </td>
                                <td align="left" valign="middle">                                
                                </td>
                                <td align="center"  width="150px">
                                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                                        <tr>
                                            <td align="right">
                                                <!--                                                <div id="selectFirmDiv" class="spaceRight20" >
                                                <?php
                                                $firmPanelName = 'OMREVO';
                                                include 'ombbglfr.php';
                                                ?>
                                                                                                </div>-->
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right" valign="middle" class="noPrint">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
<!--                <tr>
                    <td align="center" colspan="6"class="paddingTop4 padBott4" >
                        <div class="hrGrey"></div>
                    </td>
                </tr>-->
            </table>
            <div id="balanceSheetDiv">
                <table class="width_196mm" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td colspan="5">
                            <table border="0" cellspacing="2" cellpadding="0" width="100%"  onclick="contentEditable = true">
                                <tr>

                                </tr>
                                <tr>

                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" width="100%" class="marginTop5">
                                <tr>
                                    <td align="left">
                                        <div id="balanceSheetSubDiv">
                                            <?php
                                            include 'orbbblsd_2.php';
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <br/>
                <tr>
                    <td align="center" class="noPrint">
                        <div id="ajaxLoadPrintBalanceSheetDiv" style="visibility: hidden">
                            <?php include 'omzaajld.php'; ?>
                        </div>
                        <a style="cursor: pointer;" class="noPrint"
                           onclick="printBalanceSheetDiv('balanceSheetDiv', document.getElementById('get_balance_sheet_form'), 'OMREVO')">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                                 width="32px" height="32px" />
                        </a>  
                    </td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <!--/*     * ******End code to add panel indiacator @Author:SANT09NOV16************ */-->