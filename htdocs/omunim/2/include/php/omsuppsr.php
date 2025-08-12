<?php
/*
 * **************************************************************************************
 * @tutorial: File to search and add new supplier division @MADHUREE-31AUG2019
 * **************************************************************************************
 *
 * Created on 31 AUG, 2019
 *
 * @FileName: omsuppsr.php
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
<div id="enterSuppDetailsDiv" title="इस पॅनल की सहायता से आप नये सपलायर को जोड़ अथवा खोज सकते है! &#10;From this panel you can add new supplier or search existing suppliers.">
    <table border="0" cellspacing="1" cellpadding="4" width="100%" style="background: #f1f8ff;border-right: 0;border-left: 0;padding: 5px 0px 5px 8px;border: 1px dashed #7b8ffa;">
        <tr align="left">
            <td align="left" width="25%">
                <div class="spaceLeft10"> 
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input id="suppFirstNameForAddGirvi" name="suppFirstNameForAddGirvi" title="यहाँ सपलायर का प्रथम नाम एंटर करे!"
                               type="text" spellcheck="false" class="form-control" placeholder="Supplier First Name"
                               onkeyup="if (event.keyCode != 112 && event.keyCode != 113 &&
                                               event.keyCode != 114 && event.keyCode != 115 &&
                                               event.keyCode != 117 && event.keyCode != 118 &&
                                               event.keyCode != 119 && event.keyCode != 120 &&
                                               event.keyCode != 121 && event.keyCode != 123 &&
                                               event.keyCode != 40 && event.keyCode != 18
                                               ) {
                                           searchSuppToAddGirvi(document.getElementById('suppFirstNameForAddGirvi').value,
                                                   document.getElementById('suppLastNameForAddGirvi').value,
                                                   document.getElementById('suppFatherNameForAddGirvi').value,
                                                   document.getElementById('suppCityForAddGirvi').value,
                                                   document.getElementById('mobileNoToAddGirvi').value,
                                                   document.getElementById('girviFirmId').value);
                                       }
                                       if (event.keyCode == 40) {
                                           document.getElementById('suppHomeImage1').focus();
                                       }" 
                               onkeydown="javascript:if (event.keyCode == 13) {
                                           document.getElementById('suppLastNameForAddGirvi').focus();
                                           return false;
                                       }
                                       else if (event.keyCode == 8 && this.value == '') {
                                           return false;
                                       }"
                               autocomplete="off" maxlength="30" />
                    </div>
                </div>                                    
            </td>
            <td align="left" width="25%">
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input id="suppLastNameForAddGirvi" name="suppLastNameForAddGirvi" title="यहाँ सपलायर का सरनेम नाम एंटर करे!"
                           type="text" spellcheck="false" class="form-control" placeholder="Supplier Last Name"
                           onkeyup="if (event.keyCode != 112 && event.keyCode != 113 &&
                                           event.keyCode != 114 && event.keyCode != 115 &&
                                           event.keyCode != 117 && event.keyCode != 118 &&
                                           event.keyCode != 119 && event.keyCode != 120 &&
                                           event.keyCode != 121 && event.keyCode != 123 &&
                                           event.keyCode != 40 && event.keyCode != 18
                                           ) {
                                       searchSuppToAddGirvi(document.getElementById('suppFirstNameForAddGirvi').value,
                                               document.getElementById('suppLastNameForAddGirvi').value,
                                               document.getElementById('suppFatherNameForAddGirvi').value,
                                               document.getElementById('suppCityForAddGirvi').value,
                                               document.getElementById('mobileNoToAddGirvi').value,
                                               document.getElementById('girviFirmId').value);
                                   }
                                   if (event.keyCode == 40) {
                                       document.getElementById('suppHomeImage1').focus();
                                   }" 
                           onkeydown="javascript:if (event.keyCode == 13) {
                                       document.getElementById('fatherOrSpouseNameLabel').focus();
                                       return false;
                                   }
                                   else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('suppFirstNameForAddGirvi').focus();
                                       return false;
                                   }"
                           autocomplete="off" maxlength="30" />
                </div>  
            </td>
<!--            <td align="left" width="5%">
                
            </td>-->
            <td align="left" width="25%">
                <table width="100%">
                    <tr>
                        <td width="15%">
                          <div id="fatherOrSpouseNameDiv" style="width:50px;">
                    <select id="fatherOrSpouseNameLabel" name="fatherOrSpouseNameLabel" 
                            onkeydown="javascript:if (event.keyCode == 13) {
                                        document.getElementById('suppFatherNameForAddGirvi').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('suppLastNameForAddGirvi').focus();
                                        return false;
                                    }"
                            class="form-control-select" style="width:100%;height:30px;border:1px solid #c1c1c1;"
                            onchange="getCareOfNameLabel(this.value, 'SuppHome', document.getElementById('suppFatherNameForAddGirvi').value);">
                        <option value="S/o">S/o</option>
                        <option value="D/o">D/o</option>
                        <option value="W/o">W/o</option>
                        <option value="C/o">C/o</option>
                    </select>
                    <input id="fatherOrSpouseNameIndicator" name="fatherOrSpouseNameIndicator" 
                           type="hidden" value="S" />

                    <input id="fatherOrSpouseNameIndicator" name="fatherOrSpouseNameIndicator" 
                           type="hidden" value="W" />
                </div>
              </td>
             <td width="85%">
                <div id="careOfDiv">
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input id="suppFatherNameForAddGirvi" name="suppFatherNameForAddGirvi" title="यहाँ सपलायर के पिता का नाम एंटर करे!"
                               type="text" spellcheck="false" class="form-control" placeholder="Supplier Father Name"
                               onkeyup="if (event.keyCode != 112 && event.keyCode != 113 &&
                                               event.keyCode != 114 && event.keyCode != 115 &&
                                               event.keyCode != 117 && event.keyCode != 118 &&
                                               event.keyCode != 119 && event.keyCode != 120 &&
                                               event.keyCode != 121 && event.keyCode != 123 &&
                                               event.keyCode != 40 && event.keyCode != 18
                                               ) {
                                           searchSuppToAddGirvi(document.getElementById('suppFirstNameForAddGirvi').value,
                                                   document.getElementById('suppLastNameForAddGirvi').value,
                                                   document.getElementById('suppFatherNameForAddGirvi').value,
                                                   document.getElementById('suppCityForAddGirvi').value,
                                                   document.getElementById('mobileNoToAddGirvi').value,
                                                   document.getElementById('girviFirmId').value);
                                       }
                                       if (event.keyCode == 40) {
                                           document.getElementById('suppHomeImage1').focus();
                                       }" 
                               onkeydown="javascript:if (event.keyCode == 13) {
                                           document.getElementById('suppCityForAddGirvi').focus();
                                           return false;
                                       }
                                       else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('fatherOrSpouseNameLabel').focus();
                                           return false;
                                       }"
                               autocomplete="off" maxlength="30" style="width:100%;height:30px"/>
                    </div>
                </div>
                        </td>
                         </tr>
                </table>
            </td>
            <td align="left" width="25%">
                <div id="sexToAddGirviDiv" class="frm-lbl">
                    <INPUT id="gender" TYPE="RADIO" NAME="gender"
                           class="lgn-field-without-order" VALUE="M" CHECKED /> Male
                    &nbsp; <INPUT id="gender" TYPE="RADIO" NAME="gender"
                                  class="lgn-field-without-order" VALUE="F" /> Female
                </div>
            </td>
        </tr>
        <tr>
            <td align="left" width="25%">
                <div class="spaceLeft10">
                    <div class="input-icon">
                        <i class="fa fa-home"></i>
                        <!--Start Code To Add keyCode 9 @Author:PRIYA29AUG13-->
                        <input id="suppCityForAddGirvi" name="suppCityForAddGirvi" title="यहाँ सपलायर के ग्राम या शहर का नाम एंटर करे!"
                               type="text" spellcheck="false" class="form-control" placeholder="Supplier Village / City / State"
                               onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) ||
                                               (event.keyCode == 13 && this.value == '')) {
                                           searchCityForPanel(document.getElementById('suppCityForAddGirvi').value, event.keyCode, 'directAddSupp');
                                       }" 
                               onclick="if (this.value != '') {
                                           searchCityForPanelBlank('directAddSupp');
                                           if (event.keyCode != 112 && event.keyCode != 113 &&
                                                   event.keyCode != 114 && event.keyCode != 115 &&
                                                   event.keyCode != 117 && event.keyCode != 118 &&
                                                   event.keyCode != 119 && event.keyCode != 120 &&
                                                   event.keyCode != 121 && event.keyCode != 123 &&
                                                   event.keyCode != 40 && event.keyCode != 18) {
                                               searchSuppToAddGirvi(document.getElementById('suppFirstNameForAddGirvi').value,
                                                       document.getElementById('suppLastNameForAddGirvi').value,
                                                       document.getElementById('suppFatherNameForAddGirvi').value,
                                                       document.getElementById('suppCityForAddGirvi').value,
                                                       document.getElementById('mobileNoToAddGirvi').value,
                                                       document.getElementById('girviFirmId').value);
                                           }
                                           if (event.keyCode == 40) {
                                               document.getElementById('suppHomeImage1').focus();
                                           }
                                       }"
                               onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                           searchCityForPanelBlank('blank');
                                           document.getElementById('mobileNoToAddGirvi').focus();
                                           return false;
                                       }
                                       else if (event.keyCode == 8 && this.value == '') {
                                           searchCityForPanelBlank('blank');
                                           document.getElementById('suppFatherNameForAddGirvi').focus();
                                           return false;
                                       }"
                               autocomplete="off" maxlength="30" /> 
                    </div>
                    <!--End Code To Add keyCode 9 @Author:MADHUREE-31AUG19-->
                    <div id="cityListDivToAddGirvi" class="cityListDivToAddGirvi"></div>
                </div>
            </td>
            <td align="left">
                <div class="input-icon">
                    <i class="fa fa-phone"></i>
                    <input id="mobileNoToAddGirvi" name="mobileNoToAddGirvi" placeholder="Supplier Mobile Number"
                           type="text" spellcheck="false" class="form-control"
                           onblur="javascript:if (document.getElementById('suppFirstNameForAddGirvi').value == '') {
                                       document.getElementById('suppFirstNameForAddGirvi').value = this.value;
                                   }"
                           onkeyup="if (event.keyCode != 112 && event.keyCode != 113 &&
                                           event.keyCode != 114 && event.keyCode != 115 &&
                                           event.keyCode != 117 && event.keyCode != 118 &&
                                           event.keyCode != 119 && event.keyCode != 120 &&
                                           event.keyCode != 121 && event.keyCode != 123 &&
                                           event.keyCode != 40 && event.keyCode != 18
                                           ) {
                                       searchSuppToAddGirvi(document.getElementById('suppFirstNameForAddGirvi').value,
                                               document.getElementById('suppLastNameForAddGirvi').value,
                                               document.getElementById('suppFatherNameForAddGirvi').value,
                                               document.getElementById('suppCityForAddGirvi').value,
                                               document.getElementById('mobileNoToAddGirvi').value,
                                               document.getElementById('girviFirmId').value);
                                   }
                                   if (event.keyCode == 40) {
                                       document.getElementById('suppHomeImage1').focus();
                                   }" 
                           onkeydown="javascript:if (event.keyCode == 13) {
                                       document.getElementById('girviFirmId').focus();
                                       return false;
                                   }
                                   else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('suppCityForAddGirvi').focus();
                                       return false;
                                   }"
                           maxlength="15" />
                </div>
            </td>
            <td align="left" width="25%">
                
                            <div id="selectFirmDiv">
                                <?php
                                $firmIdName = 'girviFirmId';
                                // echo '$firmIdName'.$firmIdName;
                                if ($panelOmunimDivName == 'SellPurchase') {
                                    $nextFieldId = 'directAddCustButtAndSellPurchase';
                                    $nextReqFieldId = 'directAddCustButtAndSellPurchase';
                                } else if ($panelOmunimDivName == 'NewOrder') {
                                    $nextFieldId = 'directAddCustButtAndNewOrder';
                                    $nextReqFieldId = 'directAddCustButtAndNewOrder';
                                } else if ($panelOmunimDivName == 'ItemRepair') {
                                    $nextFieldId = 'directAddCustButtAndItemRepair';
                                    $nextReqFieldId = 'directAddCustButtAndItemRepair';
                                } else {
                                    //Start Code To Add Condition For (event.keyCode == 13) @AUTHOR:MADHUREE-31AUG19
                                    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
                                            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                        if ($_SESSION['sessionOwnIndStr'][32] == 'Y') {
                                            $nextFieldId = 'directAddCustButtAndXRF';
                                            $nextReqFieldId = 'directAddCustButtAndXRF';
                                        } else {
                                            $nextFieldId = 'directAddCustButtAndSellPurchase';
                                            $nextReqFieldId = 'directAddCustButtAndSellPurchase';
                                        }
                                    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                                            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                        if ($_SESSION['sessionOwnIndStr'][32] == 'Y') {
                                            $nextFieldId = 'directAddCustButtAndXRF';
                                            $nextReqFieldId = 'directAddCustButtAndXRF';
                                        } else {
                                            $nextFieldId = 'directAddCustButtAndSellPurchase';
                                            $nextReqFieldId = 'directAddCustButtAndSellPurchase';
                                        }
                                    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
                                            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                        $nextFieldId = 'directAddCustButtAndGirvi';
                                    } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
                                            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
                                        $nextFieldId = 'directAddCustButtAndGirvi';
                                    }
                                }//End Code To Add Condition For (event.keyCode == 13) @AUTHOR:PRIYA22MAR13
                                $prevFieldId = 'mobileNoToAddGirvi';
                                if (!$firmIdSelected) {
                                    $firmIdSelected = $_SESSION['setFirmSession'];
                                }
                                $class = 'form-control-select';
                                include 'omhpfirm.php';
                                ?>
                            </div>
                        
            </td>

            <!-- START CODE To ADD CONDITIONS @AUTHOR:PRIYA15FEB13-->
            
            <!-- END CODE To ADD CONDITIONS @AUTHOR:PRIYA15FEB13-->
        </tr>
    </table>
</div>