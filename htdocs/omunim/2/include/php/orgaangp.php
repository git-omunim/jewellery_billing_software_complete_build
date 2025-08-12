<?php
/*
 * Created on 06-Feb-2011 6:57:33 PM
 *
 * @FileName: orgaangp.php
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
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
?>
<div id="mainMiddle" class="main_middle" >
    <div class="main_middle_cust_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="2" align="left">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td valign="middle" align="left" width="50px">
                                <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/addGirvi48.png" alt="Add Girvi" /></div>
                            </td>
                            <td valign="middle" align="left" width="125px" title="इस पॅनल की सहायता से आप नये कस�?टमर को जोड़ सकते है या आप प�?राने कस�?टमर को खोज सकते है">
                                <a class="links" style="cursor: pointer;"
                                   onclick="navigationMainMiddle('AddNewGirvi','Add New Girvi')"><h1><div id="AddNewGirvi">Add New Girvi</div></h1></a>
                            </td>
                            <td valign="middle" align="left">
                                <div class="spaceLeft40">
                                    <table border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                            <td valign="middle" align="left">
                                                <span class="main_link_blue_Arial">Step 1: </span>
                                                <span class="main_link_green12">Search Existing Customer 'Or' Enter New Customer Details</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" align="left">
                                                <span class="main_link_blue_Arial">Step 2: </span>
                                                <span class="main_link_green12">Select Customer 'Or' Add Customer to Add New Girvi</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <hr color="#B8860B" />
                </td>
            </tr>
            <tr>
                <td valign="middle" colspan="2" align="center">
                    <div id="ajaxLoadSrchCustToAddGirviDiv" style="visibility: hidden">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                </td>
            </tr>
            <tr align="left">
                <td align="left" valign="middle" colspan="2">
                    <form name="direct_add_cust" id="direct_add_cust"
                          action="javascript:directAddCust(document.getElementById('direct_add_cust'));"
                          method="post">
                        <div id="enterCustDetailsDiv">
                            <table border="0" cellspacing="2" cellpadding="1" width="100%">
                                <tr align="center">
                                    <td align="center" class="frm-lbl" >
                                        <font color="red">*</font>First Name:
                                    </td>
                                    <td align="center" class="frm-lbl">
                                        Last Name:
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center" >
                                        <input id="custFirstNameForAddGirvi" name="custFirstNameForAddGirvi" title="यहा�? कस�?टमर का प�?रथम नाम �?ंटर करे!"
                                               type="text" spellcheck="false" class="lgn-txtfield14" 
                                               onkeyup="if(event.keyCode != 112 && event.keyCode != 113 && event.keyCode != 114 && event.keyCode != 115 && event.keyCode != 119 && event.keyCode != 120 && event.keyCode != 123 && event.keyCode != 40){ searchCustToAddGirvi(document.getElementById('custFirstNameForAddGirvi').value,document.getElementById('custLastNameForAddGirvi').value,document.getElementById('custFatherNameForAddGirvi').value,document.getElementById('custCityForAddGirvi').value);} if(event.keyCode == 40){document.getElementById('custHomeImage1').focus();}" 
                                               autocomplete="off" size="30" maxlength="30" />
                                    </td>
                                    <td align="center" >
                                        <input id="custLastNameForAddGirvi" name="custLastNameForAddGirvi" title="यहा�? कस�?टमर का अंतिम नाम �?ंटर करे!"
                                               type="text" spellcheck="false" class="lgn-txtfield14"
                                               onkeyup="if(event.keyCode != 112 && event.keyCode != 113 && event.keyCode != 115 && event.keyCode != 119 && event.keyCode != 120 && event.keyCode != 123 && event.keyCode != 40){ searchCustToAddGirvi(document.getElementById('custFirstNameForAddGirvi').value,document.getElementById('custLastNameForAddGirvi').value,document.getElementById('custFatherNameForAddGirvi').value,document.getElementById('custCityForAddGirvi').value);} if(event.keyCode == 40){document.getElementById('custHomeImage1').focus();}" 
                                               autocomplete="off" size="30" maxlength="30" />
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center" class="frm-lbl" >
                                        <div id="fatherOrSpouseNameDiv">
                                            <font color="red">*</font>
                                            <input id="fatherOrSpouseNameLabel" name="fatherOrSpouseNameLabel" title="यहा�? कस�?टमर के पति या पत�?नी का नाम �?ंटर करने के लि�? क�?लिक करे!"
                                                   spellcheck="false" type="submit" onclick="getSpouseNameLabel(this.value);"
                                                   value="Father Name:" class="frm-lbl-lnk-orange" />
                                            <input id="fatherOrSpouseNameIndicator" name="fatherOrSpouseNameIndicator" 
                                                   type="hidden" value="F" />
                                        </div>
                                    </td>
                                    <td align="center" class="frm-lbl">
                                        <font color="red">*</font>City / Village:
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center">
                                        <input id="custFatherNameForAddGirvi" name="custFatherNameForAddGirvi" title="यहा�? कस�?टमर के पिता का नाम �?ंटर करे!"
                                               type="text" spellcheck="false" class="lgn-txtfield14" 
                                               onkeyup="if(event.keyCode != 112 && event.keyCode != 113 && event.keyCode != 115 && event.keyCode != 119 && event.keyCode != 120 && event.keyCode != 123 && event.keyCode != 40){ searchCustToAddGirvi(document.getElementById('custFirstNameForAddGirvi').value,document.getElementById('custLastNameForAddGirvi').value,document.getElementById('custFatherNameForAddGirvi').value,document.getElementById('custCityForAddGirvi').value);} if(event.keyCode == 40){document.getElementById('custHomeImage1').focus();}" 
                                               autocomplete="off" size="30" maxlength="30" />
                                    </td>
                                    <td align="center">
                                        <input id="custCityForAddGirvi" name="custCityForAddGirvi" title="यहा�? कस�?टमर के ग�?राम या शहर का नाम �?ंटर करे!"
                                               type="text" spellcheck="false" class="lgn-txtfield14" 
                                               onkeyup="if(event.keyCode != 9 && event.keyCode != 13) { searchCityForPanel(document.getElementById('custCityForAddGirvi').value,event.keyCode,'directAddCust');}" 
                                               onclick="searchCityForPanelBlank('directAddCust');"
                                               autocomplete="off" size="30" maxlength="30" /> 
                                        <div id="cityListDivToAddGirvi" class="cityListDivToAddGirvi"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <br />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right">
                                        <table border="0" cellspacing="2" cellpadding="0" width="100%" align="right">
                                            <tr>
                                                <td align="right" class="frm-r1">
                                                    <div id="sexToAddGirviDiv" class="frm-lbl">
                                                        <INPUT id="sex" TYPE="RADIO" NAME="sex"
                                                               class="lgn-field-without-order" VALUE="M" CHECKED /> Male
                                                        &nbsp; <INPUT id="sex" TYPE="RADIO"
                                                                      class="lgn-field-without-order" NAME="sex" VALUE="F" /> Female
                                                    </div>
                                                </td>
                                                <td align="right"><input id="mobileNoToAddGirvi" name="mobileNoToAddGirvi" value="Enter Mobile Number"
                                                                         type="text" spellcheck="false" class="lgn-txtfield" size="30"
                                                                         onfocus="if(this.value == 'Enter Mobile Number'){this.value = '';}"
                                                                         onblur="if (this.value ==''){this.value = 'Enter Mobile Number';}"
                                                                         maxlength="15" />
                                                </td>
                                                <td>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </td>
                                                <td align="right" valign="middle">
                                                    <div id="selectFirmDiv" class="frm-lbl">
                                                        <?php
                                                        //to assign default firm id @AUTHOR: SANDY9JUL13
                                                        if (!$firmIdSelected) {
                                                            $firmIdSelected = $_SESSION['setFirmSession'];
                                                        }
                                                        include 'omffrafs.php';
                                                        ?>
                                                    </div>
                                                </td>
                                                <td align="right" valign="middle">
                                                    <div id="directAddCustButton">
                                                        <input type="submit" value="Add Customer" class="frm-btn" />
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <hr color="#FD9A00" size="0.1px" />
                </td>
            </tr>
            <tr>
                <td valign="bottom" align="center" colspan="2">
                    <div id="ajaxLoadShowSearchGirviDiv" style="visibility: hidden" class="blackMess11">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" width="100%">
                    <div id="custListForAddGirviDiv" class="search_cust_suggest">
                        <div id="oMunimIntroAdsDiv" class="search_cust_suggest">
                            <img src="<?php echo $documentRoot; ?>/images/oMunimIntro1.gif" alt="Welcome to oMunim Girvi Software" />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <hr color="#B8860B" />
                </td>
            </tr>

            <tr>
                <td colspan="2"><br />
                </td>
            </tr>
        </table>
    </div>
</div>