<?php /**
 * 
 * Created on Jul 10, 2011 7:33:17 PM
 *
 * @FileName: omuspndv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
 */ ?>
<?php
//to change layout of display @AUTHOR: SANDY08FEB14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<table border="0" cellspacing="1" cellpadding="1" width="100%">
    <tr>
        <td valign="middle">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td valign="middle" width="26px">
                        <div class="spaceLeft100"><img src="<?php echo $documentRoot; ?>/images/calender.png" alt="" /></div>
                    </td>
                    <td valign="middle">
                        <div class="spaceLeft10 green_14_font">
                            Search By Date:
                        </div>
                    </td>
                    <td valign="bottom" align="right">
                        <div id="ajaxCloseSearchUdhaarButt" style="visibility: visible" class="ajaxClose">
                            <a style="cursor: pointer;" onclick="closeSearchUdhaarPanelDiv()">
                                <?php include 'omzaajcl.php'; ?>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="middle">
            <form name="search_udhaar_panel" id="search_udhaar_panel" 
                  action="javascript:searchUdhaarByDate(document.getElementById('search_udhaar_panel'));" method="post">
                <table border="0" cellspacing="0" cellpadding="2">
                    <tr>
                        <td valign="middle" width="350px" align="left">
                            <div class="spaceLeft200 green_12_font">
                                Select Date:
                            </div>
                        </td>
                        <td valign="middle" width="250px">
                            <table border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                    <td width="190px" class="textBoxCurve1px">
                                        <?php include 'omdadsed.php'; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="middle">
                            <div id="udhaarByDateSearchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td valign="middle">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td valign="middle" width="26px">
                        <div class="spaceLeft100"><img src="<?php echo $documentRoot; ?>/images/udhaar24.png" alt="" /></div>
                    </td>
                    <td valign="middle">
                        <div class="spaceLeft10 green_14_font">
                            Search By Amount
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="middle">
            <table border="0" cellspacing="0" cellpadding="1">
                <tr>
                    <td align="right">
                        <form name="srch_udhaar_fixedAmt" id="srch_udhaar_fixedAmt" 
                              action="javascript:searchUdhaarByFixedAmount(document.getElementById('srch_udhaar_fixedAmt'));" method="post">
                            <table border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                    <td valign="middle" width="350px" align="left">
                                        <div class="spaceLeft200 green_12_font">
                                            Enter Amount:
                                        </div>
                                    </td>
                                    <td valign="middle" align="left" width="250px">
                                        <h5><table>
                                                <tr>
                                                    <td class="textBoxCurve1px">
                                                        <input id="udhaarFixedAmt" type="text"
                                                               class="border-no textLabel12CalibriGrey" value="Enter Udhaar Amount" maxlength="50"
                                                               onfocus="if(this.value == 'Enter Udhaar Amount'){this.value = '';}"
                                                               onblur="if (this.value ==''){this.value = 'Enter Udhaar Amount';}"
                                                               size="32" spellcheck="false" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </h5>
                                    </td>
                                    <td valign="middle">
                                        <div id="udhaarByFixedAmtSrchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <form name="srch_udhaar_amtRange" id="srch_udhaar_amtRange" 
                              action="javascript:searchUdhaarByAmountRange(document.getElementById('srch_udhaar_amtRange'));" method="post">
                            <table border="0" cellspacing="0" cellpadding="2"> 
                                <tr>
                                    <td valign="middle" width="350px"  align="left">
                                        <div class="spaceLeft200 green_12_font">
                                            Select Amount Range:
                                        </div>
                                    </td>
                                    <td valign="middle" align="left" width="250px">
                                        <table>
                                            <tr>
                                                <td  width="200px">
                                                    <div class="selectStyled">
                                                        <h5><select id="udhaarAmtRange" name="udhaarAmtRange" class="lgn-txtfield">
                                                                <option value="NotSelected">~ Udhaar Amount Range ~</option>
                                                                <option value="1000"><?php echo $globalCurrency; ?> 1 to <?php echo $globalCurrency; ?> 1,000</option>    
                                                                <option value="5000"><?php echo $globalCurrency; ?> 1,001 to <?php echo $globalCurrency; ?> 5,000</option>    
                                                                <option value="10000"><?php echo $globalCurrency; ?> 5,001 to <?php echo $globalCurrency; ?> 10,000</option>    
                                                                <option value="20000"><?php echo $globalCurrency; ?> 10,001 to <?php echo $globalCurrency; ?> 20,000</option>    
                                                                <option value="30000"><?php echo $globalCurrency; ?> 20,001 to <?php echo $globalCurrency; ?> 30,000</option>    
                                                                <option value="40000"><?php echo $globalCurrency; ?> 30,001 to <?php echo $globalCurrency; ?> 40,000</option>    
                                                                <option value="50000"><?php echo $globalCurrency; ?> 40,001 to <?php echo $globalCurrency; ?> 50,000</option>    
                                                                <option value="60000"><?php echo $globalCurrency; ?> 50,001 to <?php echo $globalCurrency; ?> 60,000</option>    
                                                                <option value="70000"><?php echo $globalCurrency; ?> 60,001 to <?php echo $globalCurrency; ?> 70,000</option>    
                                                                <option value="80000"><?php echo $globalCurrency; ?> 70,001 to <?php echo $globalCurrency; ?> 80,000</option>    
                                                                <option value="90000"><?php echo $globalCurrency; ?> 80,001 to <?php echo $globalCurrency; ?> 90,000</option>    
                                                                <option value="100000"><?php echo $globalCurrency; ?> 90,001 to <?php echo $globalCurrency; ?> 1,00,000</option>    
                                                                <option value="150000"><?php echo $globalCurrency; ?> 1,00,001 to <?php echo $globalCurrency; ?> 1,50,000</option>    
                                                                <option value="200000"><?php echo $globalCurrency; ?> 1,50,001 to <?php echo $globalCurrency; ?> 2,00,000</option>    
                                                                <option value="Infinite"><?php echo $globalCurrency; ?> 2,00,001 to <?php echo $globalCurrency; ?> Infinite</option>    
                                                            </select> 
                                                        </h5>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td valign="middle">
                                        <div id="udhaarByAmtRangeSrchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr> 
                <tr>
                    <td align="left">
                        <form name="srch_udhaar_customAmtRange" id="srch_udhaar_customAmtRange" 
                              action="javascript:searchUdhaarByCustomAmountRange(document.getElementById('srch_udhaar_customAmtRange'));" method="post">
                            <table border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                    <td valign="middle" width="350px"  align="left">
                                        <div class="spaceLeft200 green_12_font">
                                            Enter Amount Range:
                                        </div>
                                    </td>
                                    <td valign="middle" align="left" width="250px">
                                        <h5>
                                            <table>
                                                <tr>
                                                    <td class="textBoxCurve1px"><input id="udhaarCustomAmtStartRange" type="text"
                                                                                       class="border-no textLabel12CalibriGrey" value="Start Range" maxlength="50"
                                                                                       onfocus="if(this.value == 'Start Range'){this.value = '';}"
                                                                                       onblur="if (this.value ==''){this.value = 'Start Range';}"
                                                                                       size="10" spellcheck="false" /></td>
                                                    <td> TO</td>
                                                    <td class="textBoxCurve1px"><input id="udhaarCustomAmtEndRange" type="text"
                                                                                       class="border-no textLabel12CalibriGrey"value="End Range" maxlength="50"
                                                                                       onfocus="if(this.value == 'End Range'){this.value = '';}"
                                                                                       onblur="if (this.value ==''){this.value = 'End Range';}"
                                                                                       size="11" spellcheck="false" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </h5>
                                    </td>
                                    <td valign="middle">
                                        <div id="udhaarByCustomAmtRangeSrchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr> 
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table border="0" cellspacing="0" cellpadding="1">
                <tr>
                    <td valign="middle" width="26px">
                        <div class="spaceLeft100"><img src="<?php echo $documentRoot; ?>/images/village.png" alt="" /></div>
                    </td>
                    <td valign="middle">
                        <div class="spaceLeft10 green_14_font">
                            Search By City / Village:
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="left">
            <form name="search_udhaar_by_city" id="search_udhaar_by_city" 
                  action="javascript:searchUdhaarByCity(document.getElementById('search_udhaar_by_city'));" method="post">
                <table border="0" cellspacing="0" cellpadding="2">
                    <tr>
                        <td valign="middle" width="350px"  align="left">
                            <div class="spaceLeft200 green_12_font">
                                Select City / Village:
                            </div>
                        </td>
                        <td valign="middle" align="left" width="250px" >
                            <h5>
                                <table>
                                    <tr>
                                        <td width="200px">
                                            <div class="selectStyled">
                                                <SELECT class="lgn-txtfield" id="searchUdhaarCity" name="searchUdhaarCity" >
                                                    <OPTION  VALUE="NotSelected">~&nbsp;&nbsp;&nbsp;&nbsp;Select Udhaar City / Village &nbsp;&nbsp;&nbsp;&nbsp;~</OPTION>
                                                    <?php include 'omvvgtcc.php'; ?>
                                                </SELECT>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </h5>
                        </td>
                        <td valign="middle">
                            <div id="udhaarByCitySearchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                        </td>
                    </tr>
                </table>
            </form>
    </tr>
    <tr>
        <td align="center">
            <hr color="#B8860B" />
        </td>
    </tr>
</table>
