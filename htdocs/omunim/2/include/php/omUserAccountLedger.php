<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 31 Mar, 2019 4:48:46 PM
 *
 * @FileName: omUserAccountLedger.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'conversions.php';
include_once 'ommpfndv.php';
//
?>
<!-- START CODE FOR ALL TRANSACTIONS REPORT @PRIYANKA-13FEB19 -->
<div id="AllTransactionsReportPrintDiv">
    <table border="0" cellspacing="0" cellpadding="0"> 
        <tr>
            <td valign="top">
                <a class="links" onclick=""
                   style="cursor: pointer;" title="ALL TRANSACTIONS REPORT!">
                    <div class="textLabelHeading" style="margin-bottom: 25px;">
                        ALL TRANSACTIONS REPORT
                    </div>
                </a>
            </td>
            <td align="right" width="78%">
                <table border="0" cellpadding="2" cellspacing="2" align="right">
                    <tr>
                        <td align="left">
                            <table>
                                <tr>
                                    <td class="textBoxCurve1px backFFFFFF">
                                        <div class="spaceLeft5">
                                            <?php include 'omacstdt.php'; ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="textLabel14Calibri">&nbsp;-&nbsp;</td>
                        <td align="left">
                            <table>
                                <tr>
                                    <td class="textBoxCurve1px backFFFFFF">
                                        <div class="spaceLeft5">
                                            <?php include 'omacendt.php'; ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="bottom" align="right">
                            <div id="accountDetailsSearchDiv">
                                <a style="cursor: pointer;" 
                                   onclick="javascript:searchAccountDetailsByDate('', '<?php echo $acntIdString; ?>', document.getElementById('accFirmName').value, document.getElementById('acntDtStartDayDD').value, document.getElementById('acntDtStartMonth').value, document.getElementById('acntDtStartYYYY').value, document.getElementById('acntDtEndDayDD').value, document.getElementById('acntDtEndMonth').value, document.getElementById('acntDtEndYYYY').value, 'ALL FIRM', '<?php echo $userAccount; ?>');">
                                    <img src="<?php echo $documentRoot; ?>/images/search24.png" alt='Search Account Details' title='Search Account Details'
                                         width="24px" height="24px" /> 
                                </a> 
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div class="hrGold"></div>
    <div class="transactionDetails p-10" style="margin-top: 10px;">
        <div class="card">
            <div class="card-body">
                <div class="transactionDetailsInnerView">
                    <table width="100%" style="border: solid 1px; ">
                        <tr>
                            <td width="44%" style="border-right: solid 1px #a4a4a4;">
                                <table>
                                    <tr>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <h4 style="font-weight: bold; ">CUSTOMER NAME</h4>
                                                    </td>
                                                    <td>  - </td>
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 style="font-weight: bold; ">ADDRESS</h4>
                                                    </td>
                                                    <td>  - </td>
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 style="font-weight: bold; ">MOBILE NO</h4>
                                                    </td>
                                                    <td>  - </td>
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 style="font-weight: bold; ">GST NO</h4>
                                                    </td>
                                                    <td>  - </td>
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 style="font-weight: bold; ">PAN NO</h4>
                                                    </td>
                                                    <td>  - </td>
                                                    <td> </td>
                                                </tr>
                                            </table> 
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="60%" align="cener">
                                <table align="center" valign="top" width="100%">
                                    <tr>
                                        <td align="center" valign="top">
                                            <h1 style="font-weight: bold; ">Statement ( Transacion Details )</h1>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td align="center" valign="top">
                                            <h4 style="font-weight: bold; ">ABC JEWLLERS</h4>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td align="center" valign="top">
                                            <h4 style="font-weight: bold; ">ADDRESS</h4>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td align="center" valign="top">
                                            <h4 style="font-weight: bold; ">MOBILE NO</h4>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td align="center" valign="top">
                                            <h4 style="font-weight: bold; ">GST NO</h4>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td with="100%" class="hrGold" colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="100%">
                                <table style=""  width="100%">
                                    <tr>
                                        <td width="100%" align="left" valign="top">
                                            <table width="100%" align="center" cellpadding="" cellspacing="" class="" style="border-collapse: collapse;">
                                                <tr rowspan="2">
                                                    <td align="center" class="blackMess14Arial" style="border: solid 1px ; background-color: #89b2ed;" width="3%">Tr. No</td>
                                                    <td align="center" class="blackMess14Arial" style="border: solid 1px; background-color: #89b2ed;" width="7%">Date</td>
                                                    <td align="center" class="blackMess14Arial" style="border: solid 1px; background-color: #89b2ed;" width="7%">Inv. No</td>
                                                    <td align="center" class="blackMess14Arial" style="border: solid 1px ; background-color: #89b2ed;" width="7%">Tr. type</td>
                                                    <td align="center" class="blackMess14Arial" style="border: solid 1px; background-color: #89b2ed;" width="16%">Tr. Details</td>
                                                    <td align="center" class="blackMess14Arial" colspan="2" width="12%"  style="border: solid 1px; background-color: #ffe370;">Gold</td>
                                                    <td align="center" class="blackMess14Arial" colspan="2" width="12%"  style="border: solid 1px; background-color: #e2e2e2;">Silver</td>
                                                    <td align="center" class="blackMess14Arial" colspan="2" width="12%"  style="border: solid 1px; background-color: #ffacbb;">Stone</td>
                                                    <td align="center" class="blackMess14Arial" colspan="2" width="12%"  style="border: solid 1px; background-color: #beefbe; ">Amount</td>
                                                    <td align="center" class="blackMess14Arial" width="12%"  style="border: solid 1px; background-color: #89b2ed;">Total Tran. Amt</td>
                                                </tr>
                                                <tr>
                                                    <td class="brownMess16Arial" colspan="5"  style="border: solid 1px ;"></td>
                                                    <td class="brownMess12Arial"  style="border: solid 1px; background-color: #eb9b9b7a;">DR(Balance)</td>
                                                    <td class="brownMess12Arial"  style="border: solid 1px ; background-color: #d0f7d0;">CR(Balance)</td>
                                                    <td class="brownMess12Arial"  style="border: solid 1px; background-color: #eb9b9b7a;">DR(Balance)</td>
                                                    <td class="brownMess12Arial"  style="border: solid 1px ; background-color: #d0f7d0;">CR(Balance)</td>
                                                    <td class="brownMess12Arial"  style="border: solid 1px; background-color: #eb9b9b7a;">DR(Balance)</td>
                                                    <td class="brownMess12Arial"  style="border: solid 1px ; background-color: #d0f7d0;">CR(Balance)</td>
                                                    <td class="brownMess12Arial"  style="border: solid 1px; background-color: #eb9b9b7a;">DR(Balance)</td>
                                                    <td class="brownMess12Arial"  style="border: solid 1px ; background-color: #d0f7d0;">CR(Balance)</td>
                                                    <td  style="border: solid 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="7%">1</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="7%">28 feb 2022</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="7%">IS 1</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px;" width="7%">SELL</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="12%">XYZ</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">1</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">2</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">3</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">4</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">5</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">6</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">7</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">8</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="12%">10000</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="7%">1</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="7%">28 feb 2022</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="7%">IS 1</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px;" width="7%">SELL</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="12%">XYZ</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">1</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">2</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">3</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">4</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">5</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">6</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">7</td>
                                                    <td align="center" class="brownMess12Arial"  style="border: solid 1px ;" width="6%">8</td>
                                                    <td align="center" class="brownMess12Arial" style="border: solid 1px ;" width="12%">10000</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" class="brownMess14Arial" style="border: solid 1px; background-color: #ffe370;" colspan="4">
                                                        Statement Form 18-feb-2022
                                                    </td>
                                                    <td align="center" class="brownMess14Arial" style="border: solid 1px; background-color: #89b2ed;" width="12%">TOTAL</td>
                                                    <td align="center" class="brownMess14Arial"  style="border: solid 1px; background-color: #f3cccc7a;" width="6%">1</td>
                                                    <td align="center" class="brownMess14Arial"  style="border: solid 1px; background-color: #e4ffe4;" width="6%">2</td>
                                                    <td align="center" class="brownMess14Arial"  style="border: solid 1px; background-color: #f3cccc7a;" width="6%">1</td>
                                                    <td align="center" class="brownMess14Arial"  style="border: solid 1px; background-color: #e4ffe4;" width="6%">2</td>
                                                    <td align="center" class="brownMess14Arial"  style="border: solid 1px; background-color: #f3cccc7a;" width="6%">1</td>
                                                    <td align="center" class="brownMess14Arial"  style="border: solid 1px; background-color: #e4ffe4;" width="6%">2</td>
                                                    <td align="center" class="brownMess14Arial"  style="border: solid 1px; background-color: #f3cccc7a;" width="6%">1</td>
                                                    <td align="center" class="brownMess14Arial"  style="border: solid 1px; background-color: #e4ffe4;" width="6%">2</td>
                                                    <td align="center" class="brownMess14Arial" style="border: solid 1px; background-color: #c6deff;" width="12%">10000</td>
                                                </tr>
                                                <tr>
                                                    <td class="brownMess16Arial" colspan="5"  style="border: solid 1px ;"></td>
                                                    <td colspan="2" align="center" class="brownMess14Arial" style="border: solid 1px; background-color: #ffe370;">1</td>
                                                    <td colspan="2" align="center" class="brownMess14Arial" style="border: solid 1px; background-color: #e2e2e2;">1</td>
                                                    <td colspan="2" align="center" class="brownMess14Arial" style="border: solid 1px; background-color: #ffacbb;">1</td>
                                                    <td colspan="2" align="center" class="brownMess14Arial" style="border: solid 1px; background-color: #beefbe;">1</td>
                                                    <td align="center"  style="border: solid 1px;" ></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
    <tr>
        <td>
            <br/>
        </td>
    </tr>
    <tr>
        <td>
            <br/>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="center" class="noPrint">
            <a style="cursor: pointer;" 
               onclick="printOmgoldPageDiv('AllTransactionsReportPrintDiv', '')">
                <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                     width="32px" height="32px" /> 
            </a> 
        </td>
    </tr>
</table>