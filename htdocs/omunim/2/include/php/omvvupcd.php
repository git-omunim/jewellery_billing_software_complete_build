<?php
/*
 * Created on May 24, 2011 11:12:34 AM
 *
 * @FileName: omvvupcd.php
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
//Changes in file to hide labels and add new class for input fields @AUTHOR: SANDY16DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<div id ="cityDeliverydiv">
<?php
$fieldName = $_REQUEST['fieldName'];
$optionVal = $_REQUEST['optionVal'];
$deliveyInd = $_REQUEST['deliveyInd'];
$qSelectCity = "SELECT * FROM city where city_id='$_GET[cityId]'"; //To display data in this form
$resultCity = mysqli_query($conn, $qSelectCity);
$rowCity = mysqli_fetch_array($resultCity);
if($deliveyInd == 'update'){
    $optionVal = $_REQUEST['optionVal'];
}else{
    $optionVal = $rowCity['city_ecom_delivery'];
}
?>
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
                            <div class="textLabel16CalibriNormalBrown">UPDATE CITY</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td width="60%" align="right" valign="bottom">
            <div class="analysis_div_rows"><?php
                $showCityAddedDiv = $_GET['divMainMiddlePanel'];
                if ($showCityAddedDiv == "CityAdded") {
                    include 'omzaaamg.php';
                } else if ($showCityAddedDiv == "CityUpdated") {
                    include 'omzaaumg.php';
                } else if ($showCityAddedDiv == "CityAlreadyExist") {
                    ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;" class="updateMess"><div class="spaceRight20">~ City Already Present, Please enter different City Name ~</div></div>
                    <?php
                }
                ?></div>

        </td>
    </tr>
    <tr>
        <td colspan="2" align="left">
            <div id="addUpdateCityDiv" class="spaceLeftRight20Border">
                <form name="update_city" id="update_city"
                      action="javascript:updateDeleteCity(document.getElementById('update_city'));"
                      method="post">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td align="center">
                                <table border="0" cellpadding="2" cellspacing="0">
                                        <!---<tr align="left" valign="middle">
                                                <td align="left" class="frm-lbl">City Name:</td>
                                        </tr>--->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1"><input id="cityName" name="cityName" value="<?php echo $rowCity['city_name']; ?>"
                                                                               spellcheck="false" type="text" class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9"
                                                                               size="42" maxlength="50" /><input id="cityId" name="cityId"
                                                                               value="<?php echo $_GET[cityId]; ?>" type="hidden" /><div class="testfieldMess">(City Name should be unique)</div>
                                        </td>
                                    </tr>
                                    <!---<tr align="left" valign="middle">
                                            <td align="left" class="frm-lbl">Comments:</td>
                                    </tr>--->
                                    <!----------START CODE TO ADD OPTION TO ADD PIN CODE OPTION,@AUTHOR:HEMA-8AUG2020-------------->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1">
                                            <table border="0" cellpadding="2" cellspacing="0" width="100%" style="padding:0px;">
                                                <tr>
                                                    <td width="50%">
                                                        <input id="pinCode" placeholder="Pincode" value="<?php echo $rowCity['city_pincode']; ?>"
                                                               name="pinCode" spellcheck="false" type="text"
                                                               class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" 
                                                               size="20" maxlength="6" />
                                                    </td>
                                                    <td width="50%">
                                                        <table border="0" cellpadding="2" cellspacing="0" width="100%" style="padding:0px;">
                                                            <tr>
                                                                <td align="center">
                                                                    <input id="ecomDelivery" placeholder="Pin Code" value="<?php echo $optionVal; ?>" onchange="chngecomdeliverystatus()"
                                                                           name="ecomDelivery" spellcheck="false" type="checkbox"
                                                                           <?php
                                                                           if ($optionVal == 'on'){
                                                                               echo 'checked';
                                                                           }
                                                                           
                                                                           ?>
                                                                           class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9"                                                                                                
                                                                           maxlength="6" />
                                                                </td>
                                                                <td>
                                                                    <span class="testfieldMess">Ecommerce Delivery</span>
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
                                                        <input id="deliveryTime" placeholder="Delivery Time" value="<?php echo $rowCity['city_delivery_time']; ?>"
                                                               name="deliveryTime" spellcheck="false" type="text"
                                                               class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" 
                                                               size="18"/>
                                                    </td>
                                                    <td width="50%">
                                                        <input id="orderDeliveryTime" placeholder="Delivery Time for Order"
                                                               name="orderDeliveryTime" spellcheck="false" type="text" value="<?php echo $rowCity['city_order_delivery_time']; ?>"
                                                               class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" 
                                                               size="18"/>
                                                    </td>
                                                </tr>
                                                <tr><td colspan="2"><div class="testfieldMess">Enter number of Days</div></td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <!---------END CODE TO ADD OPTION TO ADD PRODUCT DELIVERY TIME AND ORDER DELIVERY TIME,@AUTHOR:HEMA-8AUG2020--------->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1"><textarea id="cityComments"   placeholder="Comments"
                                                                                  name="cityComments" class="textBoxCurve1px margin2pxAll textLabel12Calibri_non backF9F9F9" rows="2" cols="40"/><?php echo $rowCity['city_comm']; ?></textarea></td>
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
                                        <td><input type="submit" value="Update" class="frm-btn" id="Update" name="Update"
                                                   onclick="setButtId(this);" maxlength="30" size="15" /></td>
                                        <td><input type="submit" value="Delete" class="frm-btn" id="Delete" name="Delete"
                                                   onclick="setButtId(this);" maxlength="30" size="15" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </td>
    </tr>
</table>
</div>