<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgnsfsta.php
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

require_once 'system/omssopin.php';
?>
<?php
$todayDate = date("d M Y");
?>
<!--START CODE TO CHNAGE FILE @Author:PRIYA06MAR14--->
<div id="girviPanelTrId" style="visibility:hidden"></div><!-----Add div required in print function @AUTHOR: SANDY15JAN14-----------> 
<div id="PurchaseAnaReport">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td>
                <div class="spaceLeft20 main_link_orange">
                    STOCK ANALYSIS
                </div>
            </td>
            <!-- Strat code to display date selection and firm selection in form @author: SANDY27JUN13  -->   
            <td align="right">
                <table border="0" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right" class="textBoxCurve1px margin1pxAll textLabel16CalibriNormal backFFFFFF">
                            <div><?php
                                $panelName = 'StockAnalysisPanel';
                                include 'omgndtes.php';
                                ?>
                            </div>
                        </td>
                        <td>
                            <input id="getReport" name="getReport" value="GO" class="frm-btn spaceLeft5" type="submit"
                                   onclick="showAnalysisReportByDate('<?php echo $panelName; ?>', document.getElementById('ReportBookFirmNametwo').value, document.getElementById('reportEntryMonthM').value, document.getElementById('reportEntryYYYYy').value);"/>
                        </td>
                        <td align="right">
                            <div id="selectMetalDiv" class="spaceRight10" >
                                <?php
                                $panelType = 'StockAnalysisPanel';
                                include 'omgnsfmet.php';
                                ?>
                            </div>
                        </td>
                        <td align="right" class="padLeft5 paddingRight7">
                            <div id="selectFirmDiv" class="spaceRight10" >
                                <?php
                                $firmIdSelected = $_SESSION['setFirmSession']; //to add header selected firm as a default firm @AUTHOR: SANDY8JUL13
                                $panelName = 'StockAnalysisPanel';
                                include 'omgnsfira.php';
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td> 
        </tr>
    </table>
</div>
<div id="girvAnaMonthStockGraphDiv">
    <?php include 'omgnsfstd.php'; ?>
</div>
<!--END CODE TO CHNAGE FILE @Author:PRIYA06MAR14--->