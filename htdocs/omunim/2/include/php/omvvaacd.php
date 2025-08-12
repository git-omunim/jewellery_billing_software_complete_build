<?php
/*
 * Created on Apr 16, 2011 11:03:05 PM
 *
 * @FileName: omvvaacd.php
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
//Start Staff Access API @Author:PRIYA22JUL13
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @Author:PRIYA22JUL13
require_once 'system/omsgeagb.php';

$ownerId = $_SESSION[sessionOwnerId];
if ($ownerId != '' || $ownerId != NULL) {
    require_once 'system/omssopin.php';
} else {
    $ownerId = $dgGUId;
    if ($ownerId == '') {
        $ownerId = $_SESSION['sessiondgGUId'];
    }
}
$qselect = "select city_name from city where city_own_id='$ownerId' and city_selected='selected' order by city_name asc ";
$qurRes = mysqli_query($conn, $qselect);
while ($row = mysqli_fetch_array($qurRes, MYSQLI_ASSOC)) {
    $city_name = $row['city_name'];
}
?>

<table border="0" cellspacing="0" cellpadding="1" width="100%">
<!--    <tr>
        <td align="right" colspan="2">
            <hr color="#B8860B" />
        </td>
    </tr>-->
    <tr>
        <td colspan="2">
            <div id="addUpdateCityDiv">
                <!--Start Code To Add onload Func @Author:PRIYA24AUG13-->
                <!--Start Code To Add focus @Author:PRIYA29AUG13-->
                <img src="<?php echo $documentRoot; ?>/images/abx-t.png" alt="" height="2px" style="visibility:hidden;" onload="document.getElementById('cityName').focus();
                        initFormName('add_city', 'addCity');"/>
                <!--End Code To Add focus @Author:PRIYA29AUG13-->
                <!--End Code To Add onload Func @Author:PRIYA24AUG13-->
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="40%">
                            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                                <tr>
                                    <td>
                                        <div class="spaceLeft10 paddingTop2">
                                            <img src="<?php echo $documentRoot; ?>/images/orange16.png" alt="New City" />
                                        </div>
                                    </td>
                                    <td align="left">
                                        <div class="spaceLeft4">
                                            <div class="textLabel16CalibriNormalBrown" style="font-weight:600;
                                                 ">ADD NEW CITY/VILLAGE</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="60%" align="center" valign="bottom" >
                            <div class="analysis_div_rows"><?php
$showCityAddedDiv = $_GET['divMainMiddlePanel'];
if ($showCityAddedDiv == "CityAdded") {
    include 'omzaaamg.php';
} else if ($showCityAddedDiv == "CityUpdated") {
    include 'omzaaumg.php';
} else if ($showCityAddedDiv == "CityDeleted") {
    include 'omzaadmg.php';
} else if ($showCityAddedDiv == "CityAlreadyExist") {
    ?>
                                    <div id="ajax_upated_div"
                                         style="visibility: visible; background: none;" class="updateMess">
                                        <div class="spaceRight20">~ City Already Present, Please enter
                                            different City Name ~</div>
                                    </div>
                                    <?php
                                } else if ($showCityAddedDiv == "CityNotDeleted") {
                                    ?>
                                    <div id="ajax_upated_div"
                                         style="visibility: visible; background: none;" class="updateMess">
                                        <div class="spaceRight20">~ City Added by oMunim, User can not delete this city. ~</div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"  class="frm-r1" width="30%">
                            <div class="spaceLeftRight20Border">
                                <select id="itemTypeDiv" name="itemTypeDiv" style="width:60%;height:36px;margin:10px 0;border:1px solid #c1c1c1;border-radius:3px!important;"
                                <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                            style="margin-top: 20px;"
                                        <?php } else { ?>
                                            style=""
                                        <?php } ?>                                        
                                        onchange="addCityOrVillage(this.value);">
                                    <option value="City">City</option>
                                    <option value="Village">Village</option>
                                </select>
                                <!---Start of changes in form to remove input field heading and change in classes @AUTHOR: SANDY18NOV13---->
                                <form name="add_city" id="add_city"
                                      action="javascript:addCity(document.getElementById('add_city'),document.getElementById('cityVillageValue').value);"
                                      method="post">
                                    <table border="0" cellspacing="0" cellpadding="1" width="60%">
                                        <input type="hidden" id="cityVillageValue" name="cityVillageValue" value = "<?php echo $cityVillageValue; ?>"/>
                                        <tr>
                                            <td align="center" width="100%">
                                                <table border="0" cellpadding="2" cellspacing="0" class="paddingTop10" width="100%" style="border: 1px dashed #c1c1c1;background: #f4f4f4;padding: 5px 10px">
                                                    <tr align="left" valign="middle">
                                                        <td align="left" class="frm-r1"><input id="cityName" placeholder="City/Village Name"
                                                                                               name="cityName" spellcheck="false" type="text"
                                                                                               class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9"                                                                                                
                                                                                               <?php if ($_SESSION['sessionProdName'] == 'OMRETL') { ?>
                                                                                                   size="43"
                                                                                               <?php } else { ?>
                                                                                                   size="43"
                                                                                               <?php } ?>
                                                                                               maxlength="50" style="width:100%;height:30px;"/>
                                                            <div class="testfieldMess" style="color:#000;">(City/Village Name should be unique)</div>
                                                        </td>
                                                    </tr>
                                                    <!----------START CODE TO ADD OPTION TO ADD PIN CODE OPTION,@AUTHOR:HEMA-8AUG2020-------------->
                                                    <tr align="left" valign="middle">
                                                        <td align="left" class="frm-r1">
                                                            <table border="0" cellpadding="2" cellspacing="0" width="100%" style="padding:0px;">
                                                                <tr>
                                                                    <td width="50%">
                                                                        <input id="pinCode" placeholder="Pincode"
                                                                               name="pinCode" spellcheck="false" type="text"
                                                                               class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" 
                                                                               size="20" maxlength="6" style="width:100%;height:30px;"/>
                                                                    </td>
                                                                    <td width="50%">
                                                                        <table border="0" cellpadding="2" cellspacing="0" width="100%" style="padding:0px;">
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <input id="ecomDelivery" placeholder="Pin Code"
                                                                                           name="ecomDelivery" spellcheck="false" type="checkbox"
                                                                                           class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9"                                                                                                
                                                                                           maxlength="6" style="width:100%;height:30px;"/>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="testfieldMess" style="color:#000;">Ecommerce Delivery</span>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!----------END CODE TO ADD OPTION TO ADD PIN CODE OPTION,@AUTHOR:HEMA-8AUG2020-------------->
                                                    <!---------START CODE TO ADD OPTION TO ADD PRODUCT DELIVERY TIME AND ORDER DELIVERY TIME,@AUTHOR:HEMA-8AUG2020--------->
                                                    <tr align="left" valign="middle">
                                                        <td align="left" class="frm-r1">
                                                            <table border="0" cellpadding="2" cellspacing="0" width="100%" style="padding:0px;">
                                                                <tr>
                                                                    <td width="50%">
                                                                        <input id="deliveryTime" placeholder="Delivery Time"
                                                                               name="deliveryTime" spellcheck="false" type="text"
                                                                               class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" 
                                                                               size="18" style="width:100%;height:30px;"/>
                                                                    </td>
                                                                    <td width="50%">
                                                                        <input id="orderDeliveryTime" placeholder="Delivery Time for Order"
                                                                               name="orderDeliveryTime" spellcheck="false" type="text"
                                                                               class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" 
                                                                               size="18" style="width:100%;height:30px;"/>
                                                                    </td>
                                                                </tr>
                                                                <tr><td colspan="2"><div class="testfieldMess" style="color:#000;">Enter number of Days</div></td></tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!---------END CODE TO ADD OPTION TO ADD PRODUCT DELIVERY TIME AND ORDER DELIVERY TIME,@AUTHOR:HEMA-8AUG2020--------->
                                                    <tr align="left" valign="middle">
                                                        <td align="left" class="frm-r1"><textarea id="cityComments" placeholder="Comments"
                                                                                                  name="cityComments" class="textBoxCurve1px margin2pxAll textLabel12Calibri_non backF9F9F9" style="width:100%;height:60px;" rows="2" cols="40" /></textarea></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" cellpadding="2" cellspacing="0" align="center"
                                           width="100%">
                                        <tr>
                                            <td width="100%" align="center">
                                                <table border="0" cellpadding="1" cellspacing="1" align="center">
                                                    <tr>
                                                        <td>
                                                            <!---Start to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                            <div style="text-align: center;">
                                                                <?php
                                                                $inputId = " ";
                                                                $inputType = 'submit';
                                                                $inputFieldValue = 'Submit';
                                                                $inputIdButton = " ";
                                                                $inputNameButton = '';
                                                                $inputTitle = '';
                                                                // This is the main class for input flied
                                                                $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                                                $inputStyle = "background: #BED8FD;color: #000080;width:120px;height:30px;border-radius:3px!important;font-size:14px;";
                                                                $inputLabel = 'Submit'; // Display Label below the text box
                                                                // This class is for Pencil Icon                                                           
                                                                $inputIconClass = '';
                                                                $inputPlaceHolder = '';
                                                                $spanPlaceHolderClass = '';
                                                                $spanPlaceHolder = '';
                                                                $inputOnChange = "";
                                                                $inputOnClickFun = '';
                                                                $inputKeyUpFun = '';
                                                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                                                $inputMainClassButton = '';           // This is the main division for Button
                                                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                                ?>
                                                            </div>
<!--                                                            <input type="submit" value="Submit" class="frm-btn"
                                                       maxlength="30" size="15" />-->
                                                            <!---End to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                        </td>
                                                           <!--  <td><input type="submit" value="Reset" class="frm-btn"
                                                   onclick="navigation('')" maxlength="30"
                                                   size="15" /></td>-->
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <!---End of changes in file to remove input field heading and change in classes @AUTHOR: SANDY18NOV13---->
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><br />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div id="setDefaultCountryDiv">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="40%">
                            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                                <tr>
                                    <td>
                                        <div class="spaceLeft10 paddingTop2">
                                            <img src="<?php echo $documentRoot; ?>/images/orange16.png" alt="New State" />
                                        </div>
                                    </td>
                                    <td align="left">
                                        <div class="spaceLeft4">
                                            <div class="textLabel16CalibriNormalBrown" style="font-weight:600;">SET DEFAULT CITY</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="60%" align="right" valign="bottom">

                        </td>
                    </tr>
                    <tr>
                        <td class="frm-lbl hidden"> 
                            <div id="ajaxLoadSrchCustToAddGirviDiv" style="visibility: hidden">
                                <?php include 'omzaajld.php'; ?>
                            </div>
                        </td>
                        <td colspan="2" align="left">
                            <div class="spaceLeftRight20Border">
                                <form name="set_default_city" id="set_default_city"
                                      action="javascript:setDefaultCity(document.getElementById('set_default_city'));"
                                      method="post">
                                    <table border="0" cellspacing="3" cellpadding="3" align="center">
                                        <tr>

                                            <td align="left" class="frm-lbl" style="font-weight:600;">City Name:</td>
                                            <td align="left" class="frm-r1" width="150px">
                                                <input id="city" name="city"
                                                       type="text" spellcheck="false" class="input_border_red" placeholder="CITY" value="<?php echo $city_name;?>"
                                                       onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                                                   searchCityForPanel(document.getElementById('city').value, event.keyCode, 'addNewCustomer');
                                                               }" 
                                                       onclick="searchCityForPanelBlank('addNewCustomer');"
                                                       onblur="hideDiv(event.keyCode);"
                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                   searchCityForPanelBlank('addNewCustomer');
                                                                   document.getElementById('subButton').focus();
                                                                   return false;
                                                               } else if (event.keyCode == 9) {
                                                                   searchCityForPanelBlank('addNewCustomer');
                                                                   document.getElementById('pinCode').focus();
                                                                   return false;
                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                   searchCityForPanelBlank('addNewCustomer');
                                                                   document.getElementById('tehsil').focus();
                                                                   return false;
                                                               }"
                                                       autocomplete="off" size="10" maxlength="50" style="width: 100%;height:30px;border:1px solid #c1c1c1;" /> 
                                                <div id="cityListDivToAddNewCust" class="cityListDivToAddGirvi"></div>
                                            </td>
                                            <td>
                                                <!---Start to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                <div style="text-align: center;">
                                                    <?php
                                                    $inputId = " ";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'Submit';
                                                    $inputIdButton = "subButton";
                                                    $inputNameButton = '';
                                                    $inputTitle = '';
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                                    $inputStyle = "background: #BED8FD;color: #000080;width:90px;height:30px;border-radius:3px!important;font-size:14px;";
                                                    $inputLabel = 'Submit'; // Display Label below the text box
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = '';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
<!--                                                            <input type="submit" value="Submit" class="frm-btn"
                                                       maxlength="30" size="15" />-->
                                                <!---End to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><br />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                <tr>
                    <td>
                        <div class="spaceLeft10 paddingTop2">
                            <img src="<?php echo $documentRoot; ?>/images/orange16.png" alt="New City" />
                        </div>
                    </td>
                    <td align="left">
                        <div class="spaceLeft4">
                            <div class="textLabel16CalibriNormalBrown" style="font-weight:600;">EXISTING CITY/VILLAGE LIST</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" width="100%" valign="top">
            <div class="spaceLeftRight20Border">
                <table border="0" cellspacing="0" cellpadding="2" width="100%">
                    <tr valign="top">
                        <td align="center" valign="top" width="50%">
                            <div id="citiesListDiv"><?php include 'omvvctlt.php'; ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>

</table>

