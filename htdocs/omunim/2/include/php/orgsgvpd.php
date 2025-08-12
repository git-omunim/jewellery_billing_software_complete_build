<?php /**
 * 
 * Created on Jul 10, 2011 7:33:17 PM
 *
 * @FileName: orgsgvpd.php
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
$currentFileName = basename(__FILE__);
//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
//Change in layout of display @AUTHOR: SANDY08FEB14
?>
<table border="0" cellspacing="1" cellpadding="0" width="100%" align="center">
    <tr>
        <td valign="middle" align="center">
            <table border="0" cellspacing="2" cellpadding="0" width="100%" align="center">
                <tr>
                    <td valign="middle" width="26px">
                        <div class="spaceLeft200"><img src="<?php echo $documentRoot; ?>/images/calender.png" alt="" /></div>
                    </td>
                    <td valign="middle" align="left">
                        <div class="text_14_brown spaceLeft10">
                            Search By Date
                        </div>
                    </td>
                    <td valign="bottom" align="right">
                        <div id="ajaxCloseSearchGirviButt" style="visibility: visible" class="ajaxClose">
                            <a style="cursor: pointer;" onclick="closeSearchGirviPanelDiv()">
                                <?php include 'omzaajcl.php'; ?>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="center">
            <form name="search_girvi_panel" id="search_girvi_panel" 
                  action="javascript:searchGirviByDate(document.getElementById('search_girvi_panel'));" method="post">
                <table border="0" cellspacing="0" cellpadding="2">
                    <tr>
                        <td valign="middle"  align="left" width="250px">
                            <div class="spaceLeft80 tnr_nr_12_red">
                                Select Date: 
                            </div>
                        </td>
                        <td valign="middle" align="left" width="250px">
                            <table>
                                <tr>
                                    <td class="textBoxCurve1px">
                                        <?php include 'omdadsed.php'; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="middle"  width="50px">
                            <div id="girviByDateSearchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="left">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                <tr>
                    <td valign="middle" width="26px">
                        <div class="spaceLeft200"><img src="<?php echo $documentRoot; ?>/images/udhaar24.png" alt="" /></div>
                    </td>
                    <td valign="middle">
                        <div class="text_14_brown spaceLeft10">
                            Search By Amount
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="center">
            <table border="0" cellspacing="0" cellpadding="1" align="center">
                <tr>
                    <td align="right">
                        <form name="srch_girvi_fixedAmt" id="srch_girvi_fixedAmt" 
                              action="javascript:searchGirviByFixedAmount(document.getElementById('srch_girvi_fixedAmt'));" method="post">
                            <table border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                    <td valign="middle" align="left" width="250px">
                                        <div class="spaceLeft80 tnr_nr_12_red">
                                            Enter Amount:
                                        </div>
                                    </td>
                                    <td valign="middle"  align="left" width="250px">
                                        <table>
                                            <tr>
                                                <td class="textBoxCurve1px spaceLeft10" width="200px">
                                                    <h5>
                                                        <input id="grvFixedAmt" type="text"
                                                               class="border-no textLabel12CalibriGrey" value="Enter Girvi Principal Amount" maxlength="50"
                                                               onfocus="if(this.value == 'Enter Girvi Principal Amount'){this.value = '';}"
                                                               onblur="if (this.value ==''){this.value = 'Enter Girvi Principal Amount';}"
                                                               size="30" spellcheck="false" />
                                                    </h5>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td valign="middle"  width="50px">
                                        <div id="girviByFixedAmtSrchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <form name="srch_girvi_amtRange" id="srch_girvi_amtRange" 
                              action="javascript:searchGirviByAmountRange(document.getElementById('srch_girvi_amtRange'));" method="post">
                            <table border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                    <td valign="middle" align="left"  width="250px">
                                        <div class="spaceLeft80 tnr_nr_12_red">
                                            Select Amount Range:
                                        </div>
                                    </td>
                                    <td valign="middle"  align="left" width="250px">
                                        <table>
                                            <tr>
                                                <td  width="200px">
                                                    <div class="selectStyled">
                                                        <h5><select id="grvAmtRange" name="grvAmtRange" class="border-no textLabel12CalibriGrey">
                                                                <option value="NotSelected">~ &nbsp;Principal Amount Range&nbsp; ~</option>
                                                                <option value="1000"><?php echo $globalCurrency.' '; ?> 1 to <?php echo $globalCurrency.' '; ?> 1,000</option>    
                                                                <option value="5000"><?php echo $globalCurrency.' '; ?> 1,001 to <?php echo $globalCurrency.' '; ?> 5,000</option>    
                                                                <option value="10000"><?php echo $globalCurrency.' '; ?> 5,001 to <?php echo $globalCurrency.' '; ?> 10,000</option>    
                                                                <option value="20000"><?php echo $globalCurrency.' '; ?> 10,001 to <?php echo $globalCurrency.' '; ?> 20,000</option>    
                                                                <option value="30000"><?php echo $globalCurrency.' '; ?> 20,001 to <?php echo $globalCurrency.' '; ?> 30,000</option>    
                                                                <option value="40000"><?php echo $globalCurrency.' '; ?> 30,001 to <?php echo $globalCurrency.' '; ?> 40,000</option>    
                                                                <option value="50000"><?php echo $globalCurrency.' '; ?> 40,001 to <?php echo $globalCurrency.' '; ?> 50,000</option>    
                                                                <option value="60000"><?php echo $globalCurrency.' '; ?> 50,001 to <?php echo $globalCurrency.' '; ?> 60,000</option>    
                                                                <option value="70000"><?php echo $globalCurrency.' '; ?> 60,001 to <?php echo $globalCurrency.' '; ?> 70,000</option>    
                                                                <option value="80000"><?php echo $globalCurrency.' '; ?> 70,001 to <?php echo $globalCurrency.' '; ?> 80,000</option>    
                                                                <option value="90000"><?php echo $globalCurrency.' '; ?> 80,001 to <?php echo $globalCurrency.' '; ?> 90,000</option>    
                                                                <option value="100000"><?php echo $globalCurrency.' '; ?> 90,001 to <?php echo $globalCurrency.' '; ?> 1,00,000</option>    
                                                                <option value="150000"><?php echo $globalCurrency.' '; ?> 1,00,001 to <?php echo $globalCurrency.' '; ?> 1,50,000</option>    
                                                                <option value="200000"><?php echo $globalCurrency.' '; ?> 1,50,001 to <?php echo $globalCurrency.' '; ?> 2,00,000</option>    
                                                                <option value="Infinite"><?php echo $globalCurrency.' '; ?> 2,00,001 to <?php echo $globalCurrency.' '; ?> Infinite</option>    
                                                            </select> 
                                                        </h5>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td valign="middle"  width="50px">
                                        <div id="girviByAmtRangeSrchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr> 
                <tr>
                    <td align="right">
                        <form name="srch_girvi_customAmtRange" id="srch_girvi_customAmtRange" 
                              action="javascript:searchGirviByCustomAmountRange(document.getElementById('srch_girvi_customAmtRange'));" method="post">
                            <table border="0" cellspacing="0" cellpadding="2">
                                <tr>
                                    <td valign="middle" align="left"  width="250px">
                                        <div class="spaceLeft80 tnr_nr_12_red">
                                            Enter Amount Range:
                                        </div>
                                    </td>
                                    <td valign="middle"  align="left" width="250px">
                                        <h5>
                                            <table>
                                                <tr>
                                                    <td class="textBoxCurve1px">
                                                        <input id="grvCustomAmtStartRange" type="text"
                                                               class="border-no textLabel12CalibriGrey" value="Start Range" maxlength="50"
                                                               onfocus="if(this.value == 'Start Range'){this.value = '';}"
                                                               onblur="if (this.value ==''){this.value = 'Start Range';}"
                                                               size="10" spellcheck="false" />
                                                    </td>
                                                    <td> TO</td>
                                                    <td class="textBoxCurve1px">
                                                        <input id="grvCustomAmtEndRange" type="text"
                                                               class="border-no textLabel12CalibriGrey" value="End Range" maxlength="50"
                                                               onfocus="if(this.value == 'End Range'){this.value = '';}"
                                                               onblur="if (this.value ==''){this.value = 'End Range';}"
                                                               size="11" spellcheck="false" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </h5>
                                    </td>
                                    <td valign="middle"  width="50px">
                                        <div id="girviByCustomAmtRangeSrchButt"><input type="submit" value="Search" class="frm-btn" /></div>
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
        <td valign="middle" align="left">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                <tr>
                    <td valign="middle" width="26px">
                        <div class="spaceLeft200"><img src="<?php echo $documentRoot; ?>/images/village.png" alt="" /></div>
                    </td>
                    <td valign="middle">
                        <div class="text_14_brown spaceLeft10">
                            Search By City / Village
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="center">
            <form name="search_girvi_by_city" id="search_girvi_by_city" 
                  action="javascript:searchGirviByCity(document.getElementById('search_girvi_by_city'));" method="post">
                <table border="0" cellspacing="0" cellpadding="2">
                    <tr>
                        <td valign="middle"  width="250px" align="left">
                            <div class="spaceLeft80 tnr_nr_12_red">
                                Select City:
                            </div>
                        </td>
                        <td valign="middle"  align="left" width="250px">
                            <table>
                                <tr>
                                    <td  align="left" width="200px">
                                        <div class="selectStyled">
                                            <h5>
                                                <SELECT  id="searchGirviCity" name="searchGirviCity" class="border-no textLabel12CalibriGrey">
                                                    <OPTION  VALUE="NotSelected">~&nbsp;&nbsp;&nbsp;&nbsp;Select Girvi City / Village &nbsp;&nbsp;&nbsp;&nbsp;~</OPTION>
                                                    <?php include 'omvvgtcc.php'; ?>
                                                </SELECT>
                                            </h5>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="middle"  width="50px">
                            <div id="girviByCitySearchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <!---Start to add code to search girvi by ml  name @AUTHOR: SANDY27JAN14------------
    <tr>
        <td valign="middle" align="left">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                <tr>
                    <td valign="middle" width="26px">
                        <div class="spaceLeft200"><img src="<?php echo $documentRoot; ?>/images/supplier26.png" alt="" /></div>
                    </td>
                    <td valign="middle">
                        <div class="text_14_brown spaceLeft10">
                            Search Transferred Girvi By MoneyLender Name
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="center">
            <form name="search_girvi_by_ml_name" id="search_girvi_by_ml_name" 
                  action="javascript:searchGirviByMlName(document.getElementById('search_girvi_by_ml_name'));" method="post">
                <table border="0" cellspacing="0" cellpadding="2" width="550px">
                    <tr>
                        <td valign="middle" width="250px" align="left">
                            <div class="spaceLeft80 tnr_nr_12_red">
                                Select MoneyLender Name:
                            </div>
                        </td>
                        <td valign="middle" width="250px" align="left">
                            <table>
                                <tr>
                                    <td  width="200px">
                                        <div class="selectStyled">
                                            <h5>
                                                <SELECT class="border-no textLabel12CalibriGrey" id="searchGirviByMlName" name="searchGirviByMlName" >
                                                    <OPTION  VALUE="NotSelected">~&nbsp;&nbsp;&nbsp;&nbsp;Select Money Lender Name&nbsp;&nbsp;&nbsp;&nbsp;~</OPTION>
    <?php
 //***************************************************** Start code to change data from supplier to user table Auther@:SANT12JAN16**************************************************************************
    $selMlNames = "SELECT user_fname FROM user WHERE user_category='Money Lender' and user_owner_id='$_SESSION[sessionOwnerId]'";
    $resMlNames = mysqli_query($conn,$selMlNames);
    while ($rowMlNames = mysqli_fetch_array($resMlNames, MYSQLI_ASSOC)) {
        ?>
                                                            <OPTION  VALUE="<?php echo $rowMlNames['user_fname']; ?>"><?php echo $rowMlNames['user_fname']; ?></OPTION>
    <?php
     //***************************************************** End code to change data from supplier to user table Auther@:SANT12JAN16**************************************************************************
   } ?>
                                                </SELECT>
                                            </h5>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="middle" width="50px">
                            <div id="girviByMlNameSearchButt"><input type="submit" value="Search" class="frm-btn" /></div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    --End to add code to search girvi by ml  name @AUTHOR: SANDY27JAN14 comment by @AUTHOR: SANDY07FEB14------------->
</table>
