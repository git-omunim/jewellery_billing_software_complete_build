<?php
/*
 * **************************************************************************************
 * @tutorial: UPDATE ITEM CATEGORY AND ITEM NAME
 * **************************************************************************************
 * 
 * Created on Feb 10, 2020 5:47:48 PM
 *
 * @FileName: omUpdateCategoryItemNameList.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
require_once 'system/omssopin.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
if (isset($_SESSION['sessionStaffId'])) {
    $staffId = $_SESSION['sessionStaffId'];
    $query = "select acc_access from access where acc_own_id=$sessionOwnerId and acc_emp_id=$staffId and acc_check_id='stockSetupAccess';";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);
}
if ($row['acc_access'] == 'true' && $staffId || isset($_SESSION['sessionOwnerId']) && !$staffId) { ?>
    <div id="updateItemCategoryAndNameDiv">
        <div class="container-fluid" style="margin-top:10px;">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <table border="0" cellpading="0" cellspacing="0" width="100%">
                        <tr>
                            <td valign="middle">
                                <div class="main_link_green" align="left" ><b>UPDATE ITEM CATEGORY AND ITEM NAME PANEL</b></div>
                            </td>
                        </tr>
                    </table>
                    <form name="updateItemCategoryAndNameForm" id="updateItemCategoryAndNameForm" enctype="multipart/form-data" 
                          action="include/php/omUpdateCategoryItemNameData.php" onsubmit="return validateUpdateCategoryName();"
                          method="post">

                        <table border="0" cellpading="0" cellspacing="0" width="100%" class="textBoxCurve1px margin2pxAll backFFFFFF" valign="top" style="border:1px dashed;background:#f0f6ff;">
                            <tr>
                                <td width="50%" valign="top" class="border-color-grey-r">
                                    <table border="0" cellpading="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td colspan="3" align="center" style="padding:10px">
                                                <div class="heading_brown" style="color:#0f118a;">UPDATE CATEGORY</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding:10px"> 
                                                SELECT METAL TYPE
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  align="center" class="textCalibri14 bold brown" style="padding-top:5px">
                                                <select id="itemMetalType" name="itemMetalType" class="input_border_grey" style ="width:150px;height:30px;border-radius:5px!important;" >
                                                    <option  value="NONE">NONE</option>
                                                    <option  value="Gold">Gold</option>
                                                    <option  value="Silver">Silver</option>                                                    
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding:10px"> 
                                                SELECT CATEGORY
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  align="center" class="textCalibri14 bold brown" style="padding-top:5px">
                                                <select id="itemCategory" name="itemCategory" class="input_border_grey" style ="width:150px;height:30px;border-radius:5px!important;" >
                                                    <option  value="NONE">NONE</option>
                                                    <?php
                                                    $query = "SELECT DISTINCT sttr_item_category FROM stock_transaction where sttr_indicator='stock' AND sttr_owner_id='$_SESSION[sessionOwnerId]' order by sttr_item_category ";
                                                    $res = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                                        if ($row['sttr_item_category'] == $setECommHeaderMenuOption2) {
                                                            $setECommHeaderMenuOption2Sel = "selected";
                                                        }
                                                        echo "<OPTION  VALUE=" . "\"{$row['sttr_item_category']}\"" . " class=" . "\"content-mess-blue\"" . " $setECommHeaderMenuOption2Sel>{$row['sttr_item_category']}</OPTION>";
                                                        $setECommHeaderMenuOption2Sel = "";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding-top:15px"> 
                                                ENTER NEW CATEGORY
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="frm-r1" style="padding:10px">
                                                <input id="newItemCategory" name="newItemCategory" placeholder="ENTER CATEGORY"
                                                       value="<?php
                                                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM omecom where ecom_option = 'headerMenuInputOption1' AND ecom_theme = '$ecomTheme' AND ecom_own_id = '$custOwnerId'"));
                                                echo $row['ecom_value'];
                                                    ?>" accept="" type="text" spellcheck="false" class="input_border_red" size="20"
                                                       maxlength="50" style="width:150px;height:30px;border-radius:5px!important;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="frm-r1" style="padding:10px">
                                                <div style="text-align: center;">
                                                    <?php
                                                    $inputId = "updateCategoryButton";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'Submit';
                                                    $inputIdButton = "updateCategoryButton";
                                                    $inputNameButton = 'updateCategoryButton';
                                                    $inputTitle = '';
// This is the main class for input flied
                                                    $inputFieldClass = 'btn btn1 btn1Hover' . $om_btn_style;
                                                    $inputStyle = "padding-top:2px;width:80px;height:30px;border-radius:5px!important;font-size:14px;color:#0F118A;background:#BED8FD;border: 1px solid #bed8fd;font-weight:600;";
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
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%" valign="top">
                                    <table border="0" cellpading="0" cellspacing="0" width="100%"  >
                                        <tr>
                                            <td colspan="3" align="center" style="padding:10px">
                                                <div class="heading_brown" style="color:#0f118a;">UPDATE ITEM NAME</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding:10px"> 
                                                SELECT CATEGORY
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  align="center" class="textCalibri14 bold brown" style="padding:10px">
                                                <select id="selItemCategory" name="selItemCategory" onchange="getSelectedCategory();" class="input_border_grey" style ="width:150px;height:30px;border-radius:5px!important;" >
    <!--                                                    <option  value="<?php // echo $ecom_value;  ?>"><?php
//                                                        if ($ecom_value != null && $ecom_value != 'NotSelected') {
//                                                            echo $ecom_value;
//                                                        } else {
//                                                            echo 'NONE';
//                                                        }
                                                    ?>
                                                    </option>-->
                                                    <option  value="NONE">NONE</option>
                                                    <?php
                                                    $query = "SELECT sttr_item_category FROM stock_transaction where sttr_indicator='stock' AND sttr_owner_id='$_SESSION[sessionOwnerId]' group by sttr_item_category order by sttr_item_category ";
                                                    $res = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                                        if ($row['sttr_item_category'] == $setECommHeaderMenuOption2) {
                                                            $setECommHeaderMenuOption2Sel = "selected";
                                                        }
                                                        echo "<OPTION  VALUE=" . "\"{$row['sttr_item_category']}\"" . " class=" . "\"content-mess-blue\"" . " $setECommHeaderMenuOption2Sel>{$row['sttr_item_category']}</OPTION>";
                                                        $setECommHeaderMenuOption2Sel = "";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding-top:15px"> 
                                                SELECT ITEM NAME
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  align="center" class="textCalibri14 bold brown" style="padding:10px">
                                                <select id="selItemName" name="selItemName" class="input_border_grey" style ="width:150px;height:30px;border-radius:5px!important;" >
                                                    <option  value="NONE">SELECT ITEM NAME</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding-top:15px"> 
                                                ENTER NEW ITEM NAME
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="frm-r1" style="padding:10px">
                                                <input id="newitemName" name="newitemName" placeholder="ENTER NAME"
                                                       value="<?php
                                                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM omecom where ecom_option = 'headerMenuInputOption1' AND ecom_theme = '$ecomTheme' AND ecom_own_id = '$custOwnerId'"));
                                                //
                                                    ?>" accept="" type="text" spellcheck="false" class="input_border_red" size="20"
                                                       maxlength="50" style="width:150px;height:30px;border-radius:5px!important;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="frm-r1" style="padding:10px">
                                                <div style="text-align: center;">
                                                    <?php
                                                    $inputId = "updateItemNameButton";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'Submit';
                                                    $inputIdButton = "updateItemNameButton";
                                                    $inputNameButton = 'updateItemNameButton';
                                                    $inputTitle = '';
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn btn1 btn1Hover' . $om_btn_style;
                                                    $inputStyle = "padding-top:2px;width:80px;height:30px;border-radius:5px!important;font-size:14px;color:#0F118A;background:#BED8FD;border: 1px solid #bed8fd;font-weight:600;";
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
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                </td>
                            </tr>
                        </table>   
                    </form>     
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <form name="updateItemCategoryByItemNameForm" id="updateItemCategoryByItemNameForm" enctype="multipart/form-data" 
                          action="include/php/omUpdateItemCategoryByItemName.php" onsubmit="return validateUpdateCategoryName();"
                          method="post">
                        <table border="0" cellpading="0" cellspacing="0" width="100%">
                            <tr>
                                <td valign="middle">
                                    <div class="main_link_green" align="left" ><b>UPDATE ITEM CATEGORY BY ITEM NAME </b></div>
                                </td>
                            </tr>
                        </table>

                        <table border="0" cellpading="0" cellspacing="0" width="100%" class="textBoxCurve1px margin2pxAll backFFFFFF" valign="top" style="border:1px dashed;background:#f0f6ff;">
                            <tr>
                                <td width="50%" valign="top">
                                    <table border="0" cellpading="0" cellspacing="0" width="100%"  >
                                        <tr>
                                            <td colspan="3" align="center" style="padding:10px">
                                                <div class="heading_brown">UPDATE ITEM CATEGORY BY ITEM NAME</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding-top:10px"> 
                                                SELECT NAME
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  align="center" class="textCalibri14 bold brown" style="padding:10px">
                                                <select id="selItemNameToChange" name="selItemNameToChange" onchange="getSelectedItemName();" class="input_border_grey" style ="width:150px;height:30px;border-radius:5px!important;" >
                                                    <!--<option  value="NONE">NONE</option>-->
                                                    <?php
                                                    $query = "SELECT DISTINCT sttr_item_name FROM stock_transaction where sttr_indicator='stock' AND sttr_owner_id='$_SESSION[sessionOwnerId]'  order by sttr_item_name  ";
                                                    $res = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                                        if ($row['sttr_item_name'] == $setECommHeaderMenuOption2) {
                                                            $setECommHeaderMenuOption2Sel = "selected";
                                                        }
                                                        echo "<OPTION  VALUE=" . "\"{$row['sttr_item_name']}\"" . " class=" . "\"content-mess-blue\"" . " $setECommHeaderMenuOption2Sel>{$row['sttr_item_name']}</OPTION>";
                                                        $setECommHeaderMenuOption2Sel = "";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding-top:10px"> 
                                                SELECT ITEM CATEGORY
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  align="center" class="textCalibri14 bold brown" style="padding:10px">
                                                <select id="selItemCategoryToChange" name="selItemCategoryToChange" class="input_border_grey" style ="width:150px;height:30px;border-radius:5px!important;" >
                                                    <option  value="NONE">SELECT ITEM CATEGORY</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding-top:15px"> 
                                                ENTER NEW ITEM CATEGORY
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="frm-r1" style="padding:10px">
                                                <input id="newItemCategoryToChange" name="newItemCategoryToChange" placeholder="ENTER NEW CATEGORY"
                                                       class="input_border_red" value="" style="width:150px;height:30px;border-radius:5px!important;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="frm-r1" style="padding:10px">
                                                <div style="text-align: center;">
                                                    <?php
                                                    $inputId = "updateItemNameSubButton";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'Submit';
                                                    $inputIdButton = "updateItemNameSubButton";
                                                    $inputNameButton = 'updateItemNameSubButton';
                                                    $inputTitle = '';
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                                    $inputStyle = "padding-top:2px;width:80px;height:30px;border-radius:5px!important;font-size:14px;color:#0F118A;background:#BED8FD;border: 1px solid #bed8fd;";
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
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="row" style="margin-top:10px;" >
                <div class="col-lg-4 col-md-4 col-sm-4"></div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <form name="updateItemMkgForm" id="updateItemMkgForm" enctype="multipart/form-data" 
                          action="include/php/omupdatemkgbyitemcategory.php" onsubmit="return validateUpdateMkgFields();"
                          method="post">
                        <table border="0" cellpading="0" cellspacing="0" width="100%">
                            <tr>
                                <td valign="middle">
                                    <div class="main_link_green" align="left" ><b>UPDATE ITEMS MAKING CHARGES BY CATEGORY </b></div>
                                </td>
                            </tr>
                        </table>

                        <table border="0" cellpading="0" cellspacing="0" width="100%" class="textBoxCurve1px margin2pxAll backFFFFFF" valign="top" style="border:1px dashed;background:#f0f6ff;">
                            <tr>
                                <td width="50%" valign="top">
                                    <table border="0" cellpading="0" cellspacing="0" width="100%"  >
                                        <tr>
                                            <td colspan="3" align="center" style="padding:10px">
                                                <div class="heading_brown">UPDATE MKG CHARGES BY ITEM CATEGORY/ NAME</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding-top:10px"> 
                                                SELECT ITEM CATEGORY
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  align="center" class="textCalibri14 bold brown" style="padding:10px">
                                                <select id="selItemCategoryToChangeMkg" name="selItemCategoryToChangeMkg" class="input_border_grey" style ="width:150px;height:30px;border-radius:5px!important;text-align: center;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                              document.getElementById('selItemNameToChangeMkg').focus();
                                                              return false;
                                                          } else if (event.keyCode == 8 && this.value == '') {
                                                              document.getElementById('selItemNameToChangeMkg').focus();
                                                              return false;
                                                          }return false;"        
                                               >
                                                    <option value = '' selected="true">SELECT ITEM CATEGORY</option>
                                                    <?php
                                                     $query = "SELECT DISTINCT sttr_item_category FROM stock_transaction where sttr_indicator='stock' AND sttr_owner_id='$_SESSION[sessionOwnerId]'";
                                                    $res = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                                        echo "<OPTION  VALUE=" . "\"{$row['sttr_item_category']}\"" . " class=" . "\"content-mess-blue\"" . " $setECommHeaderMenuOption2Sel>{$row['sttr_item_category']}</OPTION>";
                                                        $setECommHeaderMenuOption2Sel = "";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td align="center" class="textCalibri14 bold brown" style="padding-top:10px"> 
                                            SELECT ITEM NAME
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  align="center" class="textCalibri14 bold brown" style="padding:10px">
                                            <select id="selItemNameToChangeMkg" name="selItemNameToChangeMkg" onchange="" class="input_border_grey" style ="width:150px;height:30px;border-radius:5px!important;text-align:center;" 
                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('new_sttr_making_charges').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('selItemCategoryToChangeMkg').focus();
                                                           return false;
                                                       }return false;"        
                                            >
                                                <option value = '' selected="true">SELECT ITEM NAME</option>
                                                <?php
                                                $query = "SELECT DISTINCT sttr_item_name FROM stock_transaction where sttr_indicator='stock' AND sttr_owner_id='$_SESSION[sessionOwnerId]'";
                                                $res = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                                    if ($row['sttr_item_name'] == $setECommHeaderMenuOption2) {
                                                        $setECommHeaderMenuOption2Sel = "selected";
                                                    }
                                                    echo "<OPTION  VALUE=" . "\"{$row['sttr_item_name']}\"" . " class=" . "\"content-mess-blue\"" . " $setECommHeaderMenuOption2Sel>{$row['sttr_item_name']}</OPTION>";
                                                    $setECommHeaderMenuOption2Sel = "";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                        <tr>
                                            <td align="center" class="textCalibri14 bold brown" style="padding-top:15px"> 
                                                ENTER NEW MKG CH
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="frm-r1" style="padding:10px">
                                                <input id="new_sttr_making_charges" name="new_sttr_making_charges" placeholder="MKG CH"
                                                       class="input_border_red" value="" style="width:70px;height:30px;border-radius:5px!important;text-align: center;"
                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                      document.getElementById('new_sttr_making_charges_type').focus();
                                                                      return false;
                                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                                      document.getElementById('selItemNameToChangeMkg').focus();
                                                                      return false;
                                                                  }"
                                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                       ondblclick ="if (event.keyCode != 8 && event.keyCode != 13) {
                                                                       getItemMkgChrgsByWt('itemMkgChrgsSelDiv', 'SellPanel', event.keyCode);
                                                                  }"
                                                     autocomplete='off'  /> 
                                                <input id='sttr_mkg_charges_by' name='sttr_mkg_charges_by' type="hidden" />
                                                <input id='firmSelected' name='firmSelected' type="hidden" value="<?php echo $_SESSION['setFirmSession'];?>" />
                                                <select id="new_sttr_making_charges_type" name="new_sttr_making_charges_type"
                                                        class="form-control text-center form-control-font13" style="width:50px;height:30px;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                    return false;
                                                }"
                                                >                                                    
                                                      <option value="PP">PP</option>
                                                      <option value="GM">GM</option>
                                                      <option value="MG">MG</option>                                                                
                                                      <option value="KG">KG</option>
                                                      <option value="per">%</option>
                                                      <option value="Fixed">FX</option>
                                                  </select>
                                                <div id="itemMkgChrgsSelDiv"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="frm-r1" style="padding:10px">
                                                <div style="text-align: center;">
                                                    <?php
                                                    $inputId = "updateItemMkgSubBtn";
                                                    $inputIdButton = "updateItemMkgSubBtn";
                                                    $inputNameButton = 'updateItemMkgSubBtn';
                                                    $inputTitle = '';
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'Submit';
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                                    $inputStyle = "padding-top:2px;width:80px;height:30px;border-radius:5px!important;font-size:14px;color:#0F118A;background:#BED8FD;border: 1px solid #bed8fd;";
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
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4"></div>
            </div>
        </div>
    </div>
<?php
}
// else {
//         echo "<h1 style='text-align:center;margin-top:25px;'><-------------You Don't Have Access To Setup Option !--------------->";
//        
// }
?>