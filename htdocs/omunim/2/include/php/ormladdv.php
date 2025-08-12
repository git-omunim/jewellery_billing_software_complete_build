<?php
/*
 * **************************************************************************************
 * @tutorial: Add New Money Lender Division
 * **************************************************************************************
 *
 * Created on 2 Dec, 2012 11:13:16 AM
 *
 * @FileName: ormladdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 *  DATE: 02 Dec 2012
 *  PRPGRAMMER: PRIYANKA KADAM
 *  REASON: TO ADD NEW PROGRAM FOR SUPPLIER
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
$staffId = $_SESSION['sessionStaffId']; //@AUTHOR: SANDY16JAN14 */
include 'ommpsbac.php'; //@AUTHOR: SANDY16JAN14 */
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
require_once 'ommpfndv.php';
include_once 'ommpfunc.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date()
?>
<?php
if ($_SESSION['sessionOwnIndStr'][6] == 'Y') {
    $user = $_GET['user'];
    if (isset($_GET['panel'])) {
        $panel = $_GET['panel'];
        $mlId = $_GET['mlId'];
    }
    if ($user == "" || $user == null) {
        $user = 'moneyLender';
    }
    //
    $sessionOwnerId = $_SESSION['sessionOwnerId'];
    //
    $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
    $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
    $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
    $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

    $selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
    $resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
    $rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
    $nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];
    // *****************************************Start code to change gold and silver balance Author@:SANT11APR16***********************************
    //$qLastSuppDetails = "SELECT supp_pre_def_id , MAX(supp_user_def_id) as max_supp_userdef_id FROM omsupplier where supp_owner_id='$sessionOwnerId' order by supp_id desc LIMIT 0,1";
    $qLastSuppDetails = "SELECT user_pid , user_uid FROM user where user_owner_id='$sessionOwnerId' and user_type='MONEYLENDER' order by user_id desc LIMIT 0,1";
    $resLastSuppDetails = mysqli_query($conn, $qLastSuppDetails);
    $rowLastSuppDetails = mysqli_fetch_array($resLastSuppDetails);
    $newSuppPreDefId = NULL;
    $newSuppUserDefId = NULL;
    $newSuppPreDefId = $rowLastSuppDetails['user_pid'];
    $newSuppUserDefId = $rowLastSuppDetails['user_uid'];
    if ($newSuppPreDefId == '' || $newSuppPreDefId == NULL) {
        $newSuppPreDefId = 'W'; //Id Changed @Author:PRIYA17AUG13
    }
    if ($newSuppUserDefId == NULL || $newSuppUserDefId == '') {
        $newSuppUserDefId = '1';
    } else {
        $newSuppUserDefId++;
    }
    if ($panel == 'Update') {
        $selDetOfMl = "SELECT * FROM user WHERE user_owner_id='$sessionOwnerId' and user_id='$mlId'";
        $resSelMlDet = mysqli_query($conn, $selDetOfMl);
        $rowSupp = mysqli_fetch_array($resSelMlDet, MYSQLI_ASSOC);
        $newSuppPreDefId = $rowSupp['user_pid'];
        $newSuppUserDefId = $rowSupp['user_uid'];

        $fatherOrSpouseName = $rowSupp['user_father_name'];
        $checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
        if ($checkFatherOrSpouse == 'F')
            $labelFatherOrSpouse = "S/o";
        else if ($checkFatherOrSpouse == 'D')
            $labelFatherOrSpouse = "D/o";
        else if ($checkFatherOrSpouse == 'C')
            $labelFatherOrSpouse = "C/o";
        else if ($checkFatherOrSpouse == 'S')
            $labelFatherOrSpouse = "W/o";

//        echo '$labelFatherOrSpouse:'.$labelFatherOrSpouse;
        if ($custImageStatus != 'NO') {
            $qSelPerFirm = "SELECT * FROM image where image_user_id='$mlId'";
            $resPerFirm = mysqli_query($conn, $qSelPerFirm);
            $rowPerabcFirm1 = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);

            $imageId = $rowPerabcFirm1['image_id'];
//       
        }
        //
        $city_name = $rowSupp['user_city'];
    }
    $qLastCustDetails2 = "SELECT user_sex FROM user WHERE user_type='MONEYLENDER' ORDER BY user_id DESC LIMIT 0,1";
    $resLastCustDetails2 = mysqli_query($conn, $qLastCustDetails2);
    $rowLastCustDetails2 = mysqli_fetch_array($resLastCustDetails2, MYSQLI_ASSOC);
    $user_sex = $rowLastCustDetails2['user_sex'];
    //
    $queryshowuserPrefix = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'userprefixset'";
    $quryuserPrefix = mysqli_query($conn, $queryshowuserPrefix);
    $queouserPrefix = mysqli_fetch_array($quryuserPrefix);
    $userPrefix = $queouserPrefix['omly_value'];
    //
    ?>
    <!--Start code to change align @Author:PRIYA24FEB14-->
    <div id="mainMiddle" class="main_middle">
        <!-- *************************** Start Add New Supplier Div Code *************************** -->
        <div class="main_middle_supp_list" style="border-top:1px solid #ffb0b0;background:#ffefef;padding: 10px 5px;">
            <!---**************Start code to change customer add file name @Author: BAPU29DEC15**************-->
            <form name="add_new_supplier" id="add_new_supplier"
                  enctype="multipart/form-data" method="post"
                  action="include/php/omadusr.php"
                  onsubmit="return addNewMoneyLender(document.getElementById('add_new_supplier'));">
                <!---**************End code to change customer add file name @Author: BAPU29DEC15**************-->
                <!---**************change layout money lender form @Author RANI14JUNE2023**************-->
                <table width="100%" align="center" border="0" cellspacing="6" cellpadding="1" valign="top">
                    <tr>
                        <td align="center" width="61%" valign="top">
                            <table width="100%" align="center" class="addFrmsec" style="background: #fff;border-radius: 5px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;padding: 5px;">
                                <tr>
                                    <td colspan="4">
                                        <div class="brown formHead">
                                            PERSONAL INFORMATION
                                        </div>
                                    </td> 
                                </tr>

                                <tr>
                                    <td colspan="8" style="background: #f5f5f5;padding: 5px 0;border: 1px dashed #909090;">
                                        <table width="100%" align="center" >
                                            <tr>
                                                <td align="left" valign="middle" width="14%">
                                                    <input type="hidden" name="user_type" id="user_type" value="MONEYLENDER"><!--added by @OMMODTAG SANT26DEC15-->
                                                    <div class="selectStyled floatLeft" style="width:100%;">
                                                        <?php if ($staffId && $array['addSupplierAccessSupTyp'] != 'true') { //give access depending on staff @AUTHOR: SANDY15AUG13            ?>
                                                            <select disabled="disabled" id="supplierType" name="supplierType"  value="<?php echo $rowSupp['user_category']; ?>"
                                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                                document.getElementById('suppIdNum').focus();
                                                                                return false;
                                                                                } else if (event.keyCode == 8) {
                                                                                return false;
                                                                                }"
                                                                    class="textLabel14CalibriReq" style="width:100%;height:35px;">
                                                                <option value="Money Lender">Money Lender</option>
                                                            </select><input  id="supplierType" name="supplierType" type="hidden" value="Retailer"/><!-- //if disabled pass default value @AUTHOR: SANDY15AUG13  -->
                                                        <?php } else { ?>
                                                            <select  id="supplierType" name="supplierType" value="<?php echo $rowSupp['user_category']; ?>"
                                                                     onkeydown="javascript: if (event.keyCode == 13) {
                                                                                 document.getElementById('suppPreIdNum').focus();
                                                                                 return false;
                                                                                 } else if (event.keyCode == 8) {
                                                                                 return false;
                                                                                 }"
                                                                     class="textLabel14CalibriReq" style="width:100%;height:35px;">
                                                                <option value="Money Lender">Money Lender</option>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td width="14%">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="left" width="20%">
                                                                <input type="hidden" id="mlId" name="mlId" value="<?php echo $mlId; ?>" />
                                                                <input id="suppPreIdNum" name="suppPreIdNum" value="<?php echo $newSuppPreDefId; ?>" <?php if ($staffId && $array['addSupplierAccessSupId'] != 'true') { ?>readonly="true"<?php }//give access depending on staff @AUTHOR: SANDY15AUG13                                                                                                                                             ?>
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('suppIdNum').focus();
                                                                               return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                               document.getElementById('supplierType').focus();
                                                                               return false;
                                                                               }"
                                                                       placeholder=" W" 
                                                                       onfocus="this.font = 'Arial';"
                                                                       onblur="if (this.value == '') {
                                                                               this.font = 'Georgia';
                                                                               }"
                                                                       onkeypress="javascript:return valKeyPressedForChar(event);"  
                                                                       type="text" spellcheck="false" class="input_border_red marginBtm" size="8"
                                                                       maxlength="10" style="width:100%;height:35px;"/>
                                                                <!--End Code To Change ID @Author:PRIYA17AUG13-->
                                                            </td>
                                                            <td align="right" width="60%">
                                                                &minus;
                                                                <input id="suppIdNum" name="suppIdNum" value="<?php echo $newSuppUserDefId; ?>"<?php if ($staffId && $array['addSupplierAccessSupId'] != 'true') { ?>readonly="true"<?php }//give access depending on staff @AUTHOR: SANDY15AUG13                                                                                                                                             ?>
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('firmId').focus();
                                                                               return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                               document.getElementById('supplierType').focus();
                                                                               return false;
                                                                               }"
                                                                       placeholder="Supp Id"
                                                                       onfocus="this.font = 'Arial';"
                                                                       onblur="if (this.value == '') {
                                                                               this.font = 'Georgia';
                                                                               }"
                                                                       onkeypress="javascript:return valKeyPressedForNumber(event);" 
                                                                       type="text" spellcheck="false" class="input_border_red marginBtm"  size="11" style="width:90%;height:35px;"
                                                                       maxlength="15" />
                                                                <!--End Code To Add Validation Funcs @Author:PRIYA18AUG13-->
                                                            </td>
                                                        </tr> 
                                                    </table>
                                                </td>
                                                <td align="left" width="14%" valign="top">
                                                    <div id="selectFirmDiv" class="selectStyled floatLeft " style="width:100%;height:35px;">
                                                        <?php
                                                        $prevFieldId = 'suppIdNum';
                                                        $nextFieldId = 'accMainAccountId';
                                                        $nextReqFieldId = 'accMainAccountId';
                                                        $firmIdDivClass = 'textLabel14CalibriReq';
                                                        $panelName = 'AddNewMl'; //@AUTHOR: SANDY20JAN14
                                                        //to assign default firm id @AUTHOR: SANDY9JUL13
                                                        if (!$firmIdSelected) {
                                                            $firmIdSelected = $_SESSION['setFirmSession'];
                                                        }
                                                        if ($panel == 'Update') {
                                                            $firmIdSelected = $rowSupp['user_firm_id'];
                                                        }
                                                        if ($staffId && $array['addSupplierAccessFirm'] != 'true') {//To Give Access to staff @AUTHOR: SANDY16AUG13
                                                            $accAccess = 'NO';
                                                        }
                                                        include 'omffrasp.php';
                                                        ?>
                                                    </div>               
                                                </td>
                                                <td align="left" width="14%" valign="top">
                                                    <div id="selAccountDiv" class="selectStyled floatLeft " style="width:100%;height:35px;">
                                                        <?php
                                                        $prevFieldId = 'firmId';
                                                        $nextFieldId = 'suppShopName';
                                                        $nextReqFieldId = 'firstName';
                                                        $accIdSelected = '';

                                                        $allAccountDivClass = 'textLabel14CalibriReq';   //@ADD CLASS NAME @AUTHOR:PRIYA31
                                                        $allAccountDivId = 'accMainAccountId';                  //PRIYA27
                                                        if ($staffId && $array['addSupplierAccess'] != 'true') {//To Give Access to staff @AUTHOR: SANDY16AUG13
                                                            $accAccess = 'NO';
                                                        }
                                                        //START CHANGE @AUTHOR: SANDY19JAN14
                                                        if ($panel == 'Update') {
                                                            $accIdSelected = $rowSupp['user_acc_id'];
                                                        } else {
                                                            $accNameSelected = 'Sundry Creditors';
                                                        }
                                                        //END CHANGE @AUTHOR: SANDY19JAN14
                                                        include 'omacpalt.php';
                                                        ?>
                                                    </div>

                                                </td>
                                            </tr>

                                            <!--//////////////////22222222222///////////////-->
                                            <tr>
                            <!--                            <td align="left" valign="top" width="15%">
                        
                                                    <input id="firstName" name="firstName" placeholder=" FIRST NAME" value="<?php //echo $rowSupp['user_fname'];           ?>"
                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('lastName').focus();
                                                                           return false;
                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                           document.getElementById('staffIntPass').focus();
                                                                           return false;
                                                                       }"
                                                           type="text" spellcheck="false" class="input_border_red marginBtm" size="18"
                                                           maxlength="50" style="width: 100%;" />
                                                </td>-->
                                                <?php if ($panel == 'Update') { ?>
                                                    <td>
                                                        <?php
                                                        $user_prefix = $rowCust['user_prefix_name'];
//                       
                                                        ?> 
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                            <tr>
                                                                <?php
                                                                if ($userPrefix != 'NO') {
                                                                    ?>
                                                                    <td align="left" valign="top">
                                                                        <div id="Prefixname" class="selectStyled" style="width: 100%;height:35px;">
                                                                            <select id="supp_prefix_name" name="supp_prefix_name" 
                                                                                    onkeydown="javascript:if (event.keyCode == 13) {
                                                                                                    document.getElementById('firstName').focus();
                                                                                                    return false;
                                                                                                    } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('firstName').focus();
                                                                                                    return false;
                                                                                                    }"
                                                                                    class="textLabel14CalibriReq" style="height:35px;"
                                                                                    onchange="getCareOfNameLabel(this.value, 'AddCust', document.getElementById('prefix').value);">
                                                                                        <?php
                                                                                        if ($user_prefix != NULL || $user_prefix != '') {
                                                                                            $prefix = array('Mr.', 'Mrs.', 'Ms.');
                                                                                            for ($i = 0; $i <= 2; $i++) {
                                                                                                if ($prefix[$i] == $user_prefix) {
                                                                                                    $userPre[$i] = 'selected';
                                                                                                }
                                                                                            }
                                                                                        } else {
                                                                                            $userPre[0] = 'selected';
                                                                                        }
                                                                                        ?>
                                                                                <option value="Mr." <?php echo $userPre[0]; ?>>Mr.</option>
                                                                                <option value="Mrs." <?php echo $userPre[1]; ?>>Mrs.</option>
                                                                                <option value="Ms." <?php echo $userPre[2]; ?>>Ms.</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                <?php } else { ?>
                                                                <input type="hidden" id="user_prefix_name" name="user_prefix_name" value="">
                                                            <?php } ?>
                                                            <td >
                                                                <input id="firstName" name="firstName" placeholder=" FIRST NAME" value="<?php echo $rowSupp['user_fname']; ?>"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                                   document.getElementById('lastName').focus();
                                                                                   return false;
                                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                                   document.getElementById('staffIntPass').focus();
                                                                                   return false;
                                                                                   }"
                                                                       type="text" spellcheck="false" class="input_border_red marginBtm" size="18"
                                                                       maxlength="50" style="width: 100%;height:35px;" />
                                                            </td>
                                                </tr> 
                                            </table>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                <tr>
                                                    <?php
                                                    if ($userPrefix != 'NO') {
                                                        ?>
                                                        <td align="left" valign="top">
                                                            <div id="Prefixname" class="selectStyled" style="width: 100%;height:35px;">
                                                                <select id="supp_prefix_name" name="supp_prefix_name" 
                                                                        onkeydown="javascript:if (event.keyCode == 13) {
                                                                                        document.getElementById('firstName').focus();
                                                                                        return false;
                                                                                        } else if (event.keyCode == 8) {
                                                                                        document.getElementById('firstName').focus();
                                                                                        return false;
                                                                                        }"
                                                                        class="textLabel14CalibriReq" style="height:35px;"
                                                                        onchange="getCareOfNameLabel(this.value, 'AddCust', document.getElementById('prefix').value);">
                                                                    <option value="Mr." selected>Mr.</option>
                                                                    <option value="Mrs.">Mrs.</option>
                                                                    <option value="Ms." <?php if ($user_sex == 'F') { ?> selected <?php } ?> >Ms.</option>

                                                                </select>
                                                            </div>
                                                        </td>
                                                    <?php } else { ?>
                                                    <input type="hidden" id="user_prefix_name" name="user_prefix_name" value="">
                                                <?php } ?>
                                                <td >
                                                    <input id="firstName" name="firstName" placeholder=" FIRST NAME" value="<?php echo $rowSupp['user_fname']; ?>"
                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                       document.getElementById('lastName').focus();
                                                                       return false;
                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('staffIntPass').focus();
                                                                       return false;
                                                                       }"
                                                           type="text" spellcheck="false" class="input_border_red marginBtm" size="18"
                                                           maxlength="50" style="width: 100%;height:35px;" />
                                                </td>
                                    </tr> 
                                </table>
                            </td>
                        <?php } ?>
                        <td align="left" >
                            <input id="lastName" name="lastName" placeholder=" LAST NAME" value="<?php echo $rowSupp['user_lname']; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                           document.getElementById('fatherOrSpouseName').focus();
                                           return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('firstName').focus();
                                           return false;
                                           }"
                                   spellcheck="false" type="text"
                                   class="input_border_grey marginBtm" size="18" maxlength="30" style="width: 100%;height:35px;"/>
                        </td>
                        <?php
                        $fatherOrSpouseName = $rowSupp['user_father_name'];
                        $checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
                        //                                            $labelFatherOrSpouse = "Father Name:";
                        //                                            $getFunctionFatherOrSpouse = "getSpouseNameLabel()";
                        //                                            if ($checkFatherOrSpouse == 'S') {
                        //                                                $labelFatherOrSpouse = "Spouse Name:";
                        //                                                $getFunctionFatherOrSpouse = "getFatherNameLabel()";
                        //                                            }
                        $fatherOrSpouseName = substr($fatherOrSpouseName, 1);
                        ?>
                        <td >
                            <table width="100%" border="0" cellspacing="2" cellpadding="0">
                                <tr>
                                    <td align="left" valign="top">
                                        <div id="fatherOrSpouseNameDiv" class="selectStyled" style="width:100%;height:35px;">
                                            <select id="fatherOrSpouseNameLabel" name="fatherOrSpouseNameLabel" value="<?php echo $fatherOrSpouseName; ?>"
                                                    onkeydown="javascript:if (event.keyCode == 13) {
                                                            document.getElementById('fatherOrSpouseName').focus();
                                                            return false;
                                                            } else if (event.keyCode == 8) {
                                                            document.getElementById('lastName').focus();
                                                            return false;
                                                            }"
                                                    class="textLabel14CalibriReq" style="height:35px;"
                                                    onchange="getCareOfNameLabel(this.value, 'AddML', document.getElementById('fatherOrSpouseName').value);">
                                                <option value="S/o" selected>S/o</option>
                                                <option value="D/o">D/o</option>
                                                <option value="W/o">W/o</option>
                                                <option value="C/o">C/o</option>
                                            </select>
                                            <input id="fatherOrSpouseNameIndicator" name="fatherOrSpouseNameIndicator" 
                                                   type="hidden" value="S" />
            <!--                                                            <input id="fatherOrSpouseNameLabel" name="fatherOrSpouseNameLabel" 
                                                   spellcheck="false" type="submit" 
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                               getSpouseNameLabel(this.value);
                                                               return false;
                                                           } else if (event.keyCode == 8) {
                                                               document.getElementById('lastName').focus();
                                                               return false;
                                                           }"
                                                   onclick="javascript: getSpouseNameLabel(this.value);
                                                           return false;"
                                                   value="S/O:" class="frm-lbl-lnk-orange" />
                                            <input id="fatherOrSpouseNameIndicator" name="fatherOrSpouseNameIndicator" 
                                                   type="hidden" value="F" />-->
                                        </div>
                                    </td>
                                    <td>
                                        <div id="careOfDiv">
                                            <input id="fatherOrSpouseName" name="fatherOrSpouseName" value="<?php echo $fatherOrSpouseName; ?>" 
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('city').focus();
                                                           return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('fatherOrSpouseNameLabel').focus();
                                                           return false;
                                                           }"
                                                   spellcheck="false" type="text" placeholder="FATHER NAME"
                                                   class="input_border_red marginBtm" size="18" maxlength="50" style="width: 100%;height:35px;"/>
                                        </div>
                                        <!--End Code To Add Validation Funcs @Author:PRIYA18AUG13-->
                                    </td>
                                </tr> 
                            </table>
                        </td>
                        <td align="left" >
                            <input id="motherName" name="motherName" placeholder=" MOTHER NAME" value="<?php echo $rowSupp['user_mother_name']; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                           document.getElementById('office_address').focus();
                                           return false;
                                           } else if (event.keyCode == 8) {
                                           document.getElementById('fatherOrSpouseName').focus();
                                           return false;
                                           }"
                                   spellcheck="false" type="text"
                                   class="input_border_grey marginBtm" size="18" maxlength="50" style="width: 100%;height:35px;" />
                        </td>
                    </tr>
                    <!--//////////////////333333333333///////////////-->
                    <?php if ($panel == 'Update') { ?>
                        <tr>
                            <?php
                            $custSexStr = $rowSupp['user_sex'];
                            switch ($custSexStr) {
                                case "M":
                                    $optionSexM = "CHECKED";
                                    break;
                                case "F":
                                    $optionSexF = "CHECKED";
                                    break;
                            }
                            ?> 
                            <td align="left" valign="middle" >
                                <div id="sexToAddGirviDiv" class="ff_calibri fs_14 fw_b brown">
                                    <INPUT id="gender" TYPE="RADIO" NAME="gender"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       document.getElementById('DOBDay').focus();
                                                       return false;
                                                       } else if (event.keyCode == 8) {
                                                       document.getElementById('caste').focus();
                                                       return false;
                                                       }"
                                           class="border_none" VALUE="M" <?php echo $optionSexM; ?> /> Male
                                    &nbsp; 
                                    <INPUT id="gender" TYPE="RADIO"
                                           class="border_none" NAME="gender" 
                                           VALUE="F" <?php echo $optionSexF; ?>/> Female
                                </div>
                            </td>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size:13px;color:#000;">DATE OF BIRTH:</div>
                                        </td>
                                    </tr> 
                                    <tr>

                                        <td align="left" valign="top" class="textBoxCurve1px backFFFFFF">
                                            <?php
                                            // echo $rowCust['user_DOB'];
                                            /*                                             * *******Start code to select date @Author:PRIYA30APR14************ */
                                            
                                         if ($nepaliDateIndicator == 'YES') { ?>
                                        <?php
                                        $tableAlignStyle = 'center';
                                        $selDayId = $selDayName = 'DOBDay';
                                        $selDayStyle = 'width:30px;height:30px;border:none;color: #A4A4A4;';
                                        $selMonthId = $selMonthName = 'DOBMonth';
                                        $selMonthStyle = 'width:45px;height:30px;border:none;color: #A4A4A4;';
                                        $selYearId = $selYearName = 'DOBYear';
                                        $selYearStyle = 'width:40px;height:30px;border:none;color: #A4A4A4;';
                                        $datenepali = $rowSupp['user_DOB'];
                                        $date_ne = explode(' ', $datenepali);
                                         $dd = $date_ne[0];
                                         $mm = $date_ne[1];
                                         $yy = $date_ne[2];
                                         if($_REQUEST['panelName'] == 'moneyLender'){
                                            $date_nepali = ''; 
                                         }else{
                                         $date_nepali = $dd.'-'.$mm.'-'.$yy;
                                         }
                                         
                                        include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                    } else {
                                            if ($rowSupp['user_DOB'] == '') {
                                                $rowSupp['user_DOB'] = (date(d)) . ' ' . date(M) . ' ' . date(Y);
                                            }
                                            /*                                             * *******End code to select date @Author:PRIYA30APR14************ */
                                            $selDOBMnth = substr($rowSupp['user_DOB'], 0, -8);
                                            $selDOBDay = substr($rowSupp['user_DOB'], -8, -5);
                                            $selDOBYear = substr($rowSupp['user_DOB'], -4);
                                            ?>

                                            <?php include 'omdacust.php'; 
                                    } ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size:13px;color:#000;">SPOUSE NAME:</div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td  valign="bottom">
                                            <input id="spouseName" name="spouseName" placeholder="SPOUSE NAME" value="<?php echo $rowSupp['user_spouse_name']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('SpouseDobDay').focus();
                                                   return false;
                                                   } else if (event.keyCode == 8) {
                                                   document.getElementById('maritalStatus').focus();
                                                   return false;
                                                   }"
                                                   spellcheck="false" type="text"
                                                   class="input_border_grey marginBtm" size="18" maxlength="50" style="width: 100%;height:35px;" />
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size: 13px;color: #000;">SPOUSE DOB:</div>
                                        </td>

                                    </tr> 
                                    <tr>
                                        <td align="left" valign="top" class="textBoxCurve1px backFFFFFF">
                                            <?php
                                            // echo $rowCust['user_DOB'];
                                            /**                                             * ******Start code to select date @Author:PRIYA30APR14************ */
                                            
                                        if ($nepaliDateIndicator == 'YES') { ?>
                                        <?php
                                        $tableAlignStyle = 'center';
                                        $selDayId = $selDayName = 'SpouseDobDay';
                                        $selDayStyle = 'width:30px;height:30px;border:none;color: #A4A4A4;';
                                        $selMonthId = $selMonthName = 'SpouseDobMonth';
                                        $selMonthStyle = 'width:45px;height:30px;border:none;color: #A4A4A4;';
                                        $selYearId = $selYearName = 'SpouseDobYear';
                                        $selYearStyle = 'width:40px;height:30px;border:none;color: #A4A4A4;';
                                        $datenepali = $rowSupp['user_spouse_dob'];
                                         $date_ne = explode(' ', $datenepali);
                                         $dd = $date_ne[0];
                                         $mm = $date_ne[1];
                                         $yy = $date_ne[2];
                                         if($_REQUEST['panelName'] == 'moneyLender'){
                                            $date_nepali = ''; 
                                         }else{
                                         $date_nepali = $dd.'-'.$mm.'-'.$yy;
                                         }
                                         
                                        include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                    } else {
                                            if ($rowSupp['user_spouse_dob'] == '') {
                                                $rowSupp['user_spouse_dob'] = (date(d)) . ' ' . date(M) . ' ' . date(Y);
                                            }
                                            // Start to code for showing spouse date on update panel -@AUTHOR:MADHUREE-19SEP19                                                                            * *******End code to select date @Author:PRIYA30APR14************ */
                                            $selspouseDOBMnth = substr($rowSupp['user_spouse_dob'], 0, -8);
                                            $selspouseDOBDay = substr($rowSupp['user_spouse_dob'], -8, -5);
                                            $selspouseDOBYear = substr($rowSupp['user_spouse_dob'], -4);
                                            // End to code for showing spouse date on update panel -@AUTHOR:MADHUREE-19SEP19
                                            include 'omcustspdob.php';
                                    } 
                                            ?>
                                        </td> 

                                    </tr> 
                                </table>
                            </td>
                        </tr>
                        <!--////////////////-->

                        <!--////////////////////44444444444444444444444444////////////////-->
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size:13px;color:#000;">CASTE:</div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td align="left" valign="bottom" >
                                            <input id="caste" name="caste" placeholder="CASTE" value="<?php echo $rowSupp['user_caste']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('qualification').focus();
                                                   return false;
                                                   } else if (event.keyCode == 8) {
                                                   document.getElementById('wardNumber').focus();
                                                   return false;
                                                   }"
                                                   spellcheck="false" type="text"
                                                   class="input_border_grey" size="18" maxlength="50" style="width: 100%;height:35px;" />
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td valign="bottom">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size: 13px;color: #000;">MAX. QUALIFICATION:</div>
                                        </td>

                                    </tr> 
                                    <tr>
                                        <td align="left" valign="top" >
                                            <div class="selectStyled floatLeft">
                                                <select id="qualification"
                                                        name="qualification" 
                                                        value="<?php echo $rowSupp['user_qualification']; ?>"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('maritalStatus').focus();
                                                                    return false;
                                                                    } else if (event.keyCode == 8) {
                                                                    document.getElementById('DOBYear').focus();
                                                                    return false;
                                                                    }"
                                                        class="select_border_grey" style="width: 100%;height:35px;">
                                                    <option value="NotSelected">Qualification</option>
                                                    <option value="SSC or 10th">SSC or 10th</option>
                                                    <option value="HSC or 12th">HSC or 12th</option>
                                                    <option value="Graduate">Graduate</option>
                                                    <option value="Post Graduate">Post Graduate</option>
                                                    <option value="B.E./B.Tech.">B.E./B.Tech.</option>
                                                    <option value="MBBS/BSMS">MBBS/BSMS</option>
                                                    <option value="M.S./M.D.">M.S./M.D.</option>
                                                    <option value="Dr./PHD">Dr./PHD</option>
                                                    <option value="Other...">Other...</option>
                                                </select>
                                            </div>

                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size:13px;color:#000;">MARITAL STATUS:</div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td  valign="bottom">
                                            <input id="maritalStatus" name="maritalStatus" placeholder="MARITAL STATUS" value="<?php echo $rowSupp['user_marital_status']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('AnniDay').focus();
                                                   return false;
                                                   } else if (event.keyCode == 8) {
                                                   document.getElementById('qualification').focus();
                                                   return false;
                                                   }"
                                                   spellcheck="false" type="text"
                                                   class="input_border_grey marginBtm" size="18" maxlength="50" style="width: 100%;height:35px;"/> 
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td width="15%" valign="bottom">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size: 13px;color: #000;">ANNIVERSARY DATE:</div>
                                        </td>

                                    </tr> 
                                    <tr>

                                        <td align="left" valign="top" class="input_border_grey marginBtm">
                                            <?php
                                            // echo $rowCust['user_DOB'];
                                            /*                                             * *******Start code to select date @Author:PRIYA30APR14************ */
                                            
                                                if ($nepaliDateIndicator == 'YES') {
                                        ?>
                                        <?php
                                        $tableAlignStyle = 'center';
                                        $selDayId = $selDayName = 'AnniDay';
                                        $selDayStyle = 'width:30px;height:30px;border:none;color: #A4A4A4;';
                                        $selMonthId = $selMonthName = 'AnniMonth';
                                        $selMonthStyle = 'width:45px;height:30px;border:none;color: #A4A4A4;';
                                        $selYearId = $selYearName = 'AnniYear';
                                        $selYearStyle = 'width:40px;height:30px;border:none;color: #A4A4A4;';
                                          $datenepali = $rowSupp['user_marriage_any'];
                                         $date_ne = explode(' ', $datenepali);
                                         $dd = $date_ne[0];
                                         $mm = $date_ne[1];
                                         $yy = $date_ne[2];
                                         if($_REQUEST['panelName'] == 'moneyLender'){
                                            $date_nepali = ''; 
                                         }else{
                                         $date_nepali = $dd.'-'.$mm.'-'.$yy;
                                         }
                                        include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                    } else {
                                            if ($rowSupp['user_marriage_any'] == '') {
                                                $rowSupp['user_marriage_any'] = (date(d)) . ' ' . date(M) . ' ' . date(Y);
                                            }
                                            // Start to code for showing anniversary date on update panel -@AUTHOR:MADHUREE-19SEP19    
                                            /*                                             * *******End code to select date @Author:PRIYA30APR14************ */
                                            $selanniDOBMnth = substr($rowSupp['user_marriage_any'], 0, -8);
                                            $selanniDOBDay = substr($rowSupp['user_marriage_any'], -8, -5);
                                            $selanniDOBYear = substr($rowSupp['user_marriage_any'], -4);
                                            // End to code for showing anniversary date on update panel -@AUTHOR:MADHUREE-19SEP19 
                                            include 'omcustanni.php';
                                    } 
                                            ?>

                                        </td>
                                    </tr>
                                </table>
                            </td>

                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td align="left" valign="middle" >
                                <div id="sexToAddGirviDiv" class="ff_calibri fs_14 fw_b brown">
                                    <INPUT id="gender" TYPE="RADIO" NAME="gender"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       document.getElementById('DOBDay').focus();
                                                       return false;
                                                       } else if (event.keyCode == 8) {
                                                       document.getElementById('caste').focus();
                                                       return false;
                                                       }"
                                           class="border_none" VALUE="M" CHECKED /> Male
                                    &nbsp; 
                                    <INPUT id="gender" TYPE="RADIO"
                                           class="border_none" NAME="gender" 
                                           VALUE="F" /> Female
                                </div>
                            </td>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="color: #000;font-size: 13px;">DATE OF BIRTH:</div>
                                        </td>

                                    </tr> 
                                    <tr>

                                        <td align="left" valign="top" class="textBoxCurve1px backFFFFFF">
                                            <?php
                                          if ($nepaliDateIndicator == 'YES') { ?>
                                        <?php
                                        $tableAlignStyle = 'center';
                                        $selDayId = $selDayName = 'DOBDay';
                                        $selDayStyle = 'width:30px;height:30px;border:none;color: #A4A4A4;';
                                        $selMonthId = $selMonthName = 'DOBMonth';
                                        $selMonthStyle = 'width:45px;height:30px;border:none;color: #A4A4A4;';
                                        $selYearId = $selYearName = 'DOBYear';
                                        $selYearStyle = 'width:40px;height:30px;border:none;color: #A4A4A4;';
                                        $datenepali = $rowSupp['user_DOB'];
                                        $date_ne = explode(' ', $datenepali);
                                         $dd = $date_ne[0];
                                         $mm = $date_ne[1];
                                         $yy = $date_ne[2];
                                         if($_REQUEST['panelName'] == 'moneyLender'){
                                            $date_nepali = ''; 
                                         }else{
                                         $date_nepali = $dd.'-'.$mm.'-'.$yy;
                                         }
                                         
                                        include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                    } else {
                                            include 'omdacust.php';
                                    } ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="color: #000;font-size: 13px;">SPOUSE NAME:</div>
                                        </td>

                                    </tr> 
                                    <tr>
                                        <td  valign="bottom">
                                            <input id="spouseName" name="spouseName" placeholder="SPOUSE NAME" value="<?php echo $rowSupp['user_spouse_name']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('SpouseDobDay').focus();
                                                   return false;
                                                   } else if (event.keyCode == 8) {
                                                   document.getElementById('maritalStatus').focus();
                                                   return false;
                                                   }"
                                                   spellcheck="false" type="text"
                                                   class="input_border_grey marginBtm" size="18" maxlength="50" style="width: 100%;height:35px;" />
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="color: #000;font-size: 13px;">SPOUSE DOB:</div>
                                        </td>

                                    </tr> 
                                    <tr>

                                        <td align="left" valign="top" class="textBoxCurve1px backFFFFFF">
                                            <?php 
                                          if ($nepaliDateIndicator == 'YES') { ?>
                                        <?php
                                        $tableAlignStyle = 'center';
                                        $selDayId = $selDayName = 'DOBDay';
                                        $selDayStyle = 'width:30px;height:30px;border:none;color: #A4A4A4;';
                                        $selMonthId = $selMonthName = 'DOBMonth';
                                        $selMonthStyle = 'width:45px;height:30px;border:none;color: #A4A4A4;';
                                        $selYearId = $selYearName = 'DOBYear';
                                        $selYearStyle = 'width:40px;height:30px;border:none;color: #A4A4A4;';
                                        $datenepali = $rowSupp['user_spouse_dob'];
                                        $date_ne = explode(' ', $datenepali);
                                         $dd = $date_ne[0];
                                         $mm = $date_ne[1];
                                         $yy = $date_ne[2];
                                         if($_REQUEST['panelName'] == 'moneyLender'){
                                            $date_nepali = ''; 
                                         }else{
                                         $date_nepali = $dd.'-'.$mm.'-'.$yy;
                                         }
                                         
                                        include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                    } else {
                                            include 'omcustspdob.php'; 
                                    } ?>
                                        </td> 

                                    </tr> 
                                </table>
                            </td>
                        </tr>
                        <!--////////////////////44444444444444444444444444////////////////-->
                        <tr>
                            <td valign="bottom">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size: 13px;color: #000;">CASTE:</div>
                                        </td>

                                    </tr> 
                                    <tr>
                                        <td align="left" valign="bottom" >
                                            <input id="caste" name="caste" placeholder="CASTE" value="<?php echo $rowSupp['user_caste']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('qualification').focus();
                                                   return false;
                                                   } else if (event.keyCode == 8) {
                                                   document.getElementById('wardNumber').focus();
                                                   return false;
                                                   }"
                                                   spellcheck="false" type="text"
                                                   class="input_border_grey" size="18" maxlength="50" style="width: 100%;height:35px;" />
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td valign="bottom">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="color: #000;font-size: 13px;">MAX. QUALIFICATION:</div>
                                        </td>

                                    </tr> 
                                    <tr>
                                        <td align="left" valign="top" >
                                            <div class="selectStyled floatLeft" style="width:100%">
                                                <select id="qualification"
                                                        name="qualification" 
                                                        value="<?php echo $rowSupp['user_qualification']; ?>"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('maritalStatus').focus();
                                                                    return false;
                                                                    } else if (event.keyCode == 8) {
                                                                    document.getElementById('DOBYear').focus();
                                                                    return false;
                                                                    }"
                                                        class="select_border_grey" style="width: 100%;height:35px">
                                                    <option value="NotSelected">Qualification</option>
                                                    <option value="SSC or 10th">SSC or 10th</option>
                                                    <option value="HSC or 12th">HSC or 12th</option>
                                                    <option value="Graduate">Graduate</option>
                                                    <option value="Post Graduate">Post Graduate</option>
                                                    <option value="B.E./B.Tech.">B.E./B.Tech.</option>
                                                    <option value="MBBS/BSMS">MBBS/BSMS</option>
                                                    <option value="M.S./M.D.">M.S./M.D.</option>
                                                    <option value="Dr./PHD">Dr./PHD</option>
                                                    <option value="Other...">Other...</option>
                                                </select>
                                            </div>

                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="bottom">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="font-size: 13px;color: #000;">MARITAL STATUS:</div>
                                        </td>

                                    </tr> 
                                    <tr>
                                        <td  valign="bottom">
                                            <input id="maritalStatus" name="maritalStatus" placeholder="MARITAL STATUS" value="<?php echo $rowSupp['user_marital_status']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('AnniDay').focus();
                                                   return false;
                                                   } else if (event.keyCode == 8) {
                                                   document.getElementById('qualification').focus();
                                                   return false;
                                                   }"
                                                   spellcheck="false" type="text"
                                                   class="input_border_grey " size="18" maxlength="50" style="width: 100%;height:35px;"/> 
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td  valign="bottom">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" >
                                            <div class="ff_calibri fs_10 grey_dark fw_b" style="color: #000;font-size: 13px;">ANNIVERSARY DATE:</div>
                                        </td>

                                    </tr> 
                                    <tr>

                                        <td align="left" valign="top" class="input_border_grey marginBtm">
                                            <?php 
                                          if ($nepaliDateIndicator == 'YES') {
                                        ?>
                                        <?php
                                        $tableAlignStyle = 'center';
                                        $selDayId = $selDayName = 'AnniDay';
                                        $selDayStyle = 'width:30px;height:30px;border:none;color: #A4A4A4;';
                                        $selMonthId = $selMonthName = 'AnniMonth';
                                        $selMonthStyle = 'width:45px;height:30px;border:none;color: #A4A4A4;';
                                        $selYearId = $selYearName = 'AnniYear';
                                        $selYearStyle = 'width:40px;height:30px;border:none;color: #A4A4A4;';
                                          $datenepali = $rowSupp['user_marriage_any'];
                                         $date_ne = explode(' ', $datenepali);
                                         $dd = $date_ne[0];
                                         $mm = $date_ne[1];
                                         $yy = $date_ne[2];
                                         if($_REQUEST['panelName'] == 'moneyLender'){
                                            $date_nepali = ''; 
                                         }else{
                                         $date_nepali = $dd.'-'.$mm.'-'.$yy;
                                         }
                                        include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                    } else {
                                            include 'omcustanni.php'; 
                                    } ?>

                                        </td>
                                    </tr>
                                </table>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
                </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <div style="margin:4px 0 0"></div>
                    </td>
                </tr>

                <tr>
                    <td colspan="8">
                        <table width="100%" align="center" style="background: #eff6ff;padding: 5px 0;border: 1px dashed #075ad6;">
                            <tr>
                                <td colspan="4" >
                                    <div class="brown">
                                        <b style="font-size:14px;"> PAN NUMBER / BANK DETAILS</b>
                                    </div>
                                </td> 
                            </tr>

                            <tr>
                                <td align="left" >
                                    <input id="suppPANNO" name="suppPANNO" placeholder=" PAN NO" value="<?php echo $rowSupp['user_pan_it_no']; ?>"
                                           type="text"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('suppCSTNo').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('AnniYear').focus();
                                       return false;
                                       }"
                                           spellcheck="false" class="input_border_grey marginBtm" size="18"
                                           maxlength="50" style="width: 100%;height:35px;" />
                                </td>
                                <td >
                                    <input id="suppCSTNo" name="suppCSTNo" placeholder="GSTIN" value="<?php echo $rowSupp['user_cst_no']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('suppSalesTaxNo').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('custSalesTaxNo').focus();
                                       return false;
                                       }"
                                           type="text" spellcheck="false" class="input_border_grey marginBtm" size="18"
                                           maxlength="50" style="width: 100%;height:35px;" />
                                </td>
                                <td >
                                    <input id="suppSalesTaxNo" name="suppSalesTaxNo" placeholder=" TAX NO" value="<?php echo $rowSupp['user_sale_tax_no']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('suppAdharCardNumber').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('custPANNO').focus();
                                       return false;
                                       }"
                                           type="text" spellcheck="false" class="input_border_grey marginBtm" size="18"
                                           maxlength="50" style="width: 100%;height:35px;" />
                                </td>
                                <td >
                                    <input id="suppAdharCardNumber" name="suppAdharCardNumber" spellcheck="false" placeholder=" ADHAAR CARD NUMBER" value="<?php echo $rowSupp['user_adhaar_card']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('curr_address').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('custCSTNo').focus();
                                       return false;
                                       }"
                                           class="input_border_grey marginBtm" size="18" maxlength="50" style="width: 100%;height:35px;" />
                                </td>



                            </tr>
                            <!--//////////////////////////////////6666666666//////////////////-->
                            <tr>
                                <td align="left" >
                                    <input id="user_bank_details" name="user_bank_details" placeholder=" BANK NAME" value="<?php echo $rowSupp['user_bank_details']; ?>"
                                           type="text"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('user_bank_acc_name').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('AnniYear').focus();
                                       return false;
                                       }"
                                           spellcheck="false" class="input_border_grey marginBtm" size="18"
                                           maxlength="50" style="width: 100%;height:35px;" />
                                </td>
                                <td>
                                    <input id="user_bank_acc_name" name="user_bank_acc_name" placeholder="BANK ACC NAME" value="<?php echo $rowSupp['user_bank_acc_name']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('user_bank_acc_number').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('custSalesTaxNo').focus();
                                       return false;
                                       }"
                                           type="text" spellcheck="false" class="input_border_grey marginBtm" size="18"
                                           maxlength="50" style="width: 100%;height:35px;" />
                                </td>
                                <td >
                                    <input id="user_bank_acc_number" name="user_bank_acc_number" placeholder=" BANK ACC NO" value="<?php echo $rowSupp['user_bank_acc_number']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('user_bank_ifsc_code').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('custPANNO').focus();
                                       return false;
                                       }"
                                           type="text" spellcheck="false" class="input_border_grey marginBtm" size="18"
                                           maxlength="50" style="width: 100%;height:35px;" />
                                </td>
                                <td >
                                    <input id="user_bank_ifsc_code" name="user_bank_ifsc_code" spellcheck="false" placeholder=" BANK IFSC CODE" value="<?php echo $rowSupp['user_bank_ifsc_code']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('occupationName').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('custCSTNo').focus();
                                       return false;
                                       }"
                                           class="input_border_grey marginBtm" size="18" maxlength="50" style="width: 100%;height:35px;" />
                                </td>

                            </tr>
                            <!--//////////7777777777777777777777//////////////////-->
                            <tr>
                                <td align="left" >
                                    <input id="occupationName" name="occupationName" 
                                           spellcheck="false" placeholder="OCCUPATION" value="<?php echo $rowSupp['user_occupation']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('nomineeName').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('user_bank_details').focus();
                                       return false;
                                       }"
                                           class="input_border_grey marginBtm" size="18" style="width: 100%;height:35px;" />
                                </td>
                                <td align="left" >
                                    <input id="nomineeName" name="nomineeName" 
                                           spellcheck="false" placeholder=" NOMINIEE NAME" value="<?php echo $rowSupp['user_nominee_name']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('relationwithNominee').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('user_bank_details').focus();
                                       return false;
                                       }"
                                           class="input_border_grey marginBtm" size="18" style="width: 100%;height:35px;" />
                                </td>
                                <td >
                                    <input id="relationwithNominee" name="relationwithNominee" 
                                           spellcheck="false" placeholder=" NOMINIEE RELATION" value="<?php echo $rowSupp['user_rel_with_nominee']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('village').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('custCSTNo').focus();
                                       return false;
                                       }"
                                           class="input_border_grey marginBtm" size="20" style="width: 100%;height:35px;" />
                                </td>


                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <div style="margin:4px 0 0"></div>
                    </td>
                </tr>   
                <tr>
                    <td colspan="8">
                        <table width="100%" align="center" style="background: #ffeefa;padding: 5px 0;border: 1px dashed #c72b99;">
                            <tr>

                                <?php
                                $ownerId = $_SESSION['sessionOwnerId'];
                                if ($ownerId != '' || $ownerId != NULL) {
                                    require_once 'system/omssopin.php';
                                } else {
                                    $ownerId = $dgGUId;
                                    if ($ownerId == '') {
                                        $ownerId = $_SESSION['sessiondgGUId'];
                                    }
                                }
                                if ($panel != 'Update') {
                                    //Village name dropdown list show.
                                    $vilselect = "SELECT distinct(village_name) as village_name FROM city where city_own_id='$ownerId' and village_name is not null order by village_name asc";
                                    $villRes = mysqli_query($conn, $vilselect);
                                    while ($row = mysqli_fetch_array($villRes, MYSQLI_ASSOC)) {
                                        $village_name = $row['village_name'];
                                    }
                                } else {
                                    $village_name = $rowSupp['user_village'];
                                }
                                //
                                if ($panel != 'Update') {
                                    //Tehsil name dropdown list show.
                                    $tehsilselect = "select distinct(user_tehsil) as user_tehsil from user where user_owner_id='$ownerId' and user_tehsil is not null order by user_tehsil asc";
                                    $tehRes = mysqli_query($conn, $tehsilselect);
                                    while ($row = mysqli_fetch_array($tehRes, MYSQLI_ASSOC)) {
                                        $tehsil_name = $row['user_tehsil'];
                                    }
                                } else {
                                    $tehsil_name = $rowSupp['user_tehsil'];
                                }
                                ?>
                                <td colspan="4" >
                                    <div class="brown">
                                        <b style="font-size:14px;"> LOGIN DETAILS / EMPLOYMENT DETAILS</b>
                                    </div>
                                </td> 
                            </tr>
                            <tr>
                                <td align="left" >
                                    <input id="staffDesignation" name="staffDesignation" 
                                           spellcheck="false" placeholder="DESIGNATION" value="<?php echo $rowSupp['user_staff_designation']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('suppLoginId').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('user_bank_details').focus();
                                       return false;
                                       }"
                                           class="input_border_grey marginBtm"  size="18" style="width: 100%;height:35px;" />
                                </td>
                                <td >
                                    <input id="suppLoginId" name="suppLoginId" placeholder=" LOGIN ID" value="<?php echo $rowSupp['user_prod_login_id']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('userPassword').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementByI('custProdKey').focus();
                                       return false;
                                       }"
                                           spellcheck="false" type="text" class="input_border_grey marginBtm" size="18" autocomplete="new-password"
                                           maxlength="50" style="width: 100%;height:35px;" onblur="checkvalue('', '', this.value, '<?php echo $mlId; ?>')"/>
                                </td>
                                <td >
                                    <input id="userPassword" name="userPassword" placeholder=" PASSWORD" value="<?php echo $rowSupp['user_password']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('userMasterPassword').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('firstName').focus();
                                       return false;
                                       }"
                                           spellcheck="false" type="password" autocomplete="new-password"
                                           class="input_border_grey marginBtm" size="18" maxlength="30" style="width: 100%;height:35px;" />
                                </td>
                                <td >
                                    <input id="userMasterPassword" name="userMasterPassword" placeholder=" MASTER PASSWORD" value="<?php echo $rowSupp['user_ipassword']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('tehsil').focus();
                                       return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('firstName').focus();
                                       return false;
                                       }"
                                           spellcheck="false" type="password" autocomplete="new-password"
                                           class="input_border_grey marginBtm" size="18" maxlength="30" style="width: 100%;height:35px;"/>
                                </td>


            <!--                        <td align="left">

            </td>-->



                            </tr>
                            <!--//////////////////////////////////6666666666//////////////////-->
                            <tr>
                <!--                        <td >
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                                    <td align="left" >
                                                <div class="ff_calibri fs_10 grey_dark fw_b">INTERVIEW DATE:</div>
                                            </td>
                                        </tr> 
                                        <tr>
                                                    <td align="left" valign="top" class="textBoxCurve1px backFFFFFF">
                                <?php // include 'omcustint.php';      ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>-->
                <!--                        <td >
                                            <input id="totalExperiance" name="totalExperiance" 
                                           spellcheck="false" placeholder=" TOTAL EXP" value="<?php echo $rowSupp['user_total_experiance']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('currentSalary').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('currentSalary').focus();
                                                           return false;
                                                       }"
                                           class="input_border_grey marginBtm" size="18" style="width: 100%;" />
                                </td>-->
                <!--                        <td >
                                            <input id="currentSalary" name="currentSalary" 
                                           spellcheck="false" placeholder=" CURRENT SALARY" value="<?php echo $rowSupp['user_current_salary']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('expectedSalary').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('custCSTNo').focus();
                                                           return false;
                                                       }"
                                           class="input_border_grey marginBtm" size="18" style="width: 100%;"/>
                                </td>-->
                <!--                        <td width="15%">
                                            <input id="expectedSalary" name="expectedSalary" placeholder=" EXPECTED SALARY" value="<?php echo $rowSupp['user_expected_salary']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('city').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('custProdKey').focus();
                                                           return false;
                                                       }"
                                           spellcheck="false" type="text" class="input_border_grey marginBtm" size="18"
                                           maxlength="50" style="width: 100%;" />
                                </td>-->

                            </tr>
                            <!--//////////////////////////////////888888//////////////////-->
                            <tr>
                <!--                        <td >
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                                    <td align="left" >
                                                <div class="ff_calibri fs_10 grey_dark fw_b">DATE OF JOINING:</div>
                                            </td>
                                        </tr> 
                                        <tr>
                                                    <td align="left" valign="top" class="textBoxCurve1px backFFFFFF">
                                <?php // include 'omcustdoj.php';      ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>-->
                <!--                        <td >
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                                    <td align="left" >
                                                <div class="ff_calibri fs_10 grey_dark fw_b">DATE OF LEAVING:</div>
                                            </td>
                                        </tr> 
                                        <tr>
                                                    <td align="left" valign="top" class="textBoxCurve1px backFFFFFF">
                                <?php // include 'omcustdol.php';      ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>-->
                <!--                        <td >
                                            <input id="team" name="team" 
                                           spellcheck="false" placeholder=" TEAM" value="<?php echo $rowSupp['user_team']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('manager').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('user_bank_details').focus();
                                                           return false;
                                                       }"
                                           class="textarea" size="18" style="width: 100%;" />
                                </td>-->
                <!--                        <td >
                                            <input id="manager" name="manager" placeholder=" MANAGER" value="<?php echo $rowSupp['user_manager']; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('state').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('custProdKey').focus();
                                                           return false;
                                                       }"
                                           spellcheck="false" type="text" class="input_border_grey marginBtm" size="18"
                                           maxlength="50" style="width: 100%;" />
                                </td>-->
                <!--                        <td align="left" >
                                    <div class="selectStyled floatLeft" style="width:100%">
                                        <SELECT class="select_border_red marginBtm" id="state" name="state" style="width: 100%;height:35px" 
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('country').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('pinCode').focus();
                                                            return false;
                                                        }">
                                            <OPTION  VALUE="NotSelected">Select State</OPTION>
                                <?php
                                $state = $rowSupp['user_state'];
                                include 'omvsgtsn.php';
                                ?>
                                        </SELECT>
                                    </div>
                                </td>-->
                <!--                        <td align="left">
                                    <div  >
                                        <SELECT class="select_border_red marginBtm" id="country" name="country" style="width: 100%;height:35px" value="<?php echo $rowSupp['user_type']; ?>"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('proLoginId').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('state').focus();
                                                            return false;
                                                        }">
                                            <OPTION VALUE="NotSelected">Select Country</OPTION>
                                <?php
                                $country = $rowSupp['user_country'];
                                include 'omvcgtco.php';
                                ?>
            
                                        </SELECT>
                                    </div>
                                </td>-->


                            </tr>

                            <!--//////////////////////////////////999999999//////////////////-->
                            <?php if ($panel == 'Update') { ?>
                                <tr>

                <!--                            <td align="left" valign="top" >
                    <input id="proLoginId" name="proLoginId" placeholder=" PROD LOGIN ID" value="<?php echo $rowSupp['user_type']; ?>"
                           onkeydown="javascript: if (event.keyCode == 13) {
                                           document.getElementById('custProdKey').focus();
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('custProdKey').focus();
                                           return false;
                                       }"
                           spellcheck="false" type="text" class="input_border_grey marginBtm" size="18"
                           maxlength="50" style="width: 100%;" />
                </td>-->
                <!--                            <td>
                    <input id="custProdKey" name="custProdKey" placeholder=" PRODUCT KEY" value="<?php echo $rowSupp['user_prod_key']; ?>"
                           onkeydown="javascript: if (event.keyCode == 13) {
                                           document.getElementById('phoneNo').focus();
                                           return false;
                                       } else if (event.keyCode == 8 && this.value == '') {
                                           document.getElementById('custMonthlyIncome').focus();
                                           return false;
                                       }"
                           spellcheck="false" type="text" class="input_border_grey marginBtm" size="18"
                           maxlength="50" style="width: 100%;"/>
                </td>-->
                <!--                            <td  align="left">

                </td>-->
                <!--                            <td align="left">

                </td>-->
                                    <td align="left" valign="top">
                                        <input id="phoneNo" name="phoneNo" placeholder=" PHONE NO."  type="text" value="<?php echo $rowSupp['user_phone']; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('suppMobileNo').focus();
                                               return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('country').focus();
                                               return false;
                                               }"
                                               spellcheck="false" class="input_border_grey marginBtm" size="12"
                                               maxlength="12" style="width: 100%;height:35px;" />
                                    </td>
                                    <td align="left" valign="top">
                                        <input id="suppMobileNo" name="suppMobileNo" placeholder=" MOBILE NO." value="<?php echo $rowSupp['user_mobile']; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('suppEmailId').focus();
                                               return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('phoneNo').focus();
                                               return false;
                                               }"
                                               type="text" spellcheck="false" class="input_border_grey marginBtm" size="10"
                                               maxlength="12" style="width: 100%;height:35px" onblur="checkvalue(this.value, '', '', '<?php echo $mlId; ?>')"/>
                                    </td>
                                    <td align="left" >
                                        <input id="suppEmailId" name="suppEmailId" placeholder=" EMAIL ID" value="<?php echo $rowSupp['user_email']; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('mobNo1').focus();
                                               return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('mobileNo').focus();
                                               return false;
                                               }"
                                               spellcheck="false" type="text"
                                               class="input_border_grey marginBtm" size="10" maxlength="90" style="width: 100%;height:35px;" onblur="checkvalue('', this.value, '', '<?php echo $mlId; ?>')" />
                                    </td>
                                    <td align="left">
                                        <input id="mobNo1" name="mobNo1" placeholder="  MOBILE NO.1" type="text" value="<?php echo $rowSupp['user_mobile1']; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('suppReference').focus();
                                               return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('mobileNo').focus();
                                               return false;
                                               }"
                                               spellcheck="false" class="input_border_grey marginBtm" size="12"
                                               maxlength="12" style="width: 100%;height:35px;" />
                                    </td>

                                </tr>
                                <tr>
                                    <?php if ($panel == 'Update') { ?>

                                        <td align="left">
                                            <input id="suppReference" name="suppReference" placeholder=" REFERENCE" value="<?php echo $rowSupp['user_reference']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                       document.getElementById('mobNo2').focus();
                                                       return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('emailId').focus();
                                                       return false;
                                                       }"
                                                   spellcheck="false" type="text" class="input_border_grey marginBtm" size="15"
                                                   maxlength="90" style="width: 100%;height:35px;"  />
                                        </td>
                                        <td align="left">
                                            <input id="mobNo2" name="mobNo2" placeholder="  MOBILE NO.2" value="<?php echo $rowSupp['user_mobile2']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                       document.getElementById('suppOtherInfo').focus();
                                                       return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('mobNo1').focus();
                                                       return false;
                                                       }"
                                                   type="text" spellcheck="false" class="input_border_grey marginBtm" size="15"
                                                   maxlength="12" style="width: 100%;height:35px;"  />
                                        </td>
                                        <td align="left" valign="top">
                                            <textarea id="suppOtherInfo" spellcheck="false" placeholder=" OTHER INFORMATION" value=""
                                                      onkeydown="javascript: if (event.keyCode == 13) {
                                                          document.getElementById('Update').focus();
                                                          return false;
                                                          } else if (event.keyCode == 8 && this.value == '') {
                                                          document.getElementById('').focus();
                                                          return false;
                                                          }"
                                                      name="suppOtherInfo" class="textarea width330" style="height:35px;  width:100%;"><?php echo $rowSupp['user_other_info']; ?></textarea>
                                        </td>
                                        <td  valign="top">   
                                            <div style="text-align:center;">
                                                <?php
                                                $inputId = 'captureButt';
                                                $inputType = 'button';
                                                $inputIdButton = 'captureButt';
                                                $inputNameButton = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                // This is the main class for input flied
                                                $inputFieldClass = 'btn btn-info';
                                                $inputStyle = 'height:36px;width:100%;font-weight:bold;font-size:16px;padding-top:0px;text-align:center;color:#0a0c87;border:1px solid #8db9f8;background-color: #dceaff;';
                                                $inputLabel = 'FINGER SCAN'; // Display Label below the text box
//
                                                // This class is for Pencil Icon                                                           
                                                $inputIconClass = '';
                                                $inputPlaceHolder = '';
                                                $spanPlaceHolderClass = '';
                                                $spanPlaceHolder = '';
                                                $inputOnChange = "";
                                                $inputOnClickFun = 'performAction(this.id,"' . $custId . '");';
                                                $inputKeyUpFun = '';
                                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                                $inputMainClassButton = '';           // This is the main division for Button
                                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                ?>
                                            </div>
                        <!--                        <input type="button" value="FINGER SCAN" class="frm-btn" id="captureButt" maxlength="30" size="15" onclick="performAction(this.id, '<?php echo $custId; ?>');" style="height: 30px;"/>
                                            <input type="button" value="NOMINEES" class="frm-btn" id="captureButt" maxlength="30" size="15" onclick="showNomineeDiv('<?php echo $custId; ?>', 'addCustNomineeDiv', 'ajaxCloseAddCustNominee');" style="height: 30px;"/>-->

                                        </td>

                                    <?php } ?>
                                </tr>
                            <?php } else { ?>

                                <tr>
                                    <td align="left">
                                        <input id="phoneNo" name="phoneNo" placeholder=" PHONE NO." type="text" value="" onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('suppMobileNo').focus();
                                        return false;
                                        } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                        document.getElementById('country').focus();
                                        return false;
                                        }" spellcheck="false" class="input_border_grey marginBtm" size="12" maxlength="12" style="width: 100%;height:35px;">
                                    </td>
                                    <td align="left">
                                        <input id="suppMobileNo" name="suppMobileNo" placeholder=" MOBILE NO." value="" onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('suppEmailId').focus();
                                        return false;
                                        } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                        document.getElementById('phoneNo').focus();
                                        return false;
                                        }" type="text" spellcheck="false" class="input_border_grey marginBtm" size="10" maxlength="12" style="width: 100%;height:35px" onblur="checkvalue(this.value, '', '', '')">
                                    </td>
                                    <td align="left">
                                        <input id="suppEmailId" name="suppEmailId" placeholder=" EMAIL ID" value="" onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('mobNo1').focus();
                                        return false;
                                        } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                        document.getElementById('mobileNo').focus();
                                        return false;
                                        }" spellcheck="false" type="text" class="input_border_grey marginBtm" size="10" maxlength="90" style="width: 100%;height:35px" onblur="checkvalue('', this.value, '', '')">
                                    </td>
                                    <td align="left">
                                        <input id="mobNo1" name="mobNo1" placeholder="  MOBILE NO.1" type="text" value="" onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('suppReference').focus();
                                        return false;
                                        } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                        document.getElementById('mobileNo').focus();
                                        return false;
                                        }" spellcheck="false" class="input_border_grey marginBtm" size="12" maxlength="12" style="width: 100%;height:35px">
                                    </td>

                                </tr>

                                <tr>

                                    <td align="left">
                                        <input id="suppReference" name="suppReference" placeholder=" REFERENCE" value="" onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('mobNo2').focus();
                                        return false;
                                        } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                        document.getElementById('emailId').focus();
                                        return false;
                                        }" spellcheck="false" type="text" class="input_border_grey marginBtm" size="15" maxlength="90" style="width: 100%;height:35px">
                                    </td>
                                    <td align="left">
                                        <input id="mobNo2" name="mobNo2" placeholder=" MOBILE NO.2" value="" onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('suppOtherInfo').focus();
                                        return false;
                                        } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                        document.getElementById('mobNo1').focus();
                                        return false;
                                        }" type="text" spellcheck="false" class="input_border_grey marginBtm" size="15" maxlength="12" style="width: 100%;height:35px;">
                                    </td>

                                    <td colspan="2" valign="middle" align="left">
                                        <textarea id="suppOtherInfo" spellcheck="false" placeholder=" OTHER INFORMATION" value="" onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('subButton').focus();
                                        return false;
                                        } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                        document.getElementById('').focus();
                                        return false;
                                        }" name="suppOtherInfo" class="textarea width330" style="height:35px;  width:100%;"></textarea>
                                    </td>
                                </tr>
                                    <!--<tr>-->
                    <!--                            <td align="left" valign="top" >
                                                    <input id="proLoginId" name="proLoginId" placeholder=" PROD LOGIN ID" value="<?php echo $rowSupp['user_type']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                   document.getElementById('custProdKey').focus();
                                                                   return false;
                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                   document.getElementById('custProdKey').focus();
                                                                   return false;
                                                               }"
                                                   spellcheck="false" type="text" class="input_border_grey marginBtm" size="18"
                                                   maxlength="50" style="width: 100%;" />
                                        </td>-->
                    <!--                            <td>
                                                    <input id="custProdKey" name="custProdKey" placeholder=" PRODUCT KEY" value="<?php echo $rowSupp['user_prod_key']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                   document.getElementById('phoneNo').focus();
                                                                   return false;
                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                   document.getElementById('custMonthlyIncome').focus();
                                                                   return false;
                                                               }"
                                                   spellcheck="false" type="text" class="input_border_grey marginBtm" size="18"
                                                   maxlength="50" style="width: 100%;"/>
                                        </td>-->
                    <!--                            <td  align="left">
            
                                        </td>
                                        <td align="left">
            
                                        </td>
                                        <td align="left">
                                            <input id="phoneNo" name="phoneNo" placeholder=" PHONE NO."  type="text" value="<?php echo $rowSupp['user_phone']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                               document.getElementById('suppMobileNo').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('country').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="input_border_grey marginBtm" size="12"
                                                   maxlength="12" style="width: 100%;" />
                                        </td>-->
                    <!--                            <td align="left" >
                                            <input id="suppMobileNo" name="suppMobileNo" placeholder=" MOBILE NO." value="<?php echo $rowSupp['user_mobile']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                               document.getElementById('suppEmailId').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('phoneNo').focus();
                                                               return false;
                                                           }"
                                                   type="text" spellcheck="false" class="input_border_grey marginBtm" size="10"
                                                   maxlength="12" style="width: 100%;" onblur="checkvalue(this.value, '', '', '<?php echo $mlId; ?>')"/>
                                        </td>
                                        <td colspan="2">
            
                                        </td>
            
                                    </tr>-->
                            <?php } ?>
                            <!--//////////////////////////////////1010101010//////////////////-->
                            <?php if ($panel == 'Update') { ?>
                                <tr>
                                    <td align="left"  colspan="5" valign="top" rowspan="4">
                                        <table cellspacing="0" cellpadding="0" border="0" valign="top" width="100%">
                                            <tr>
                                            <div class="brown ">
                                                <b style="font-size:14px;">USER SIGNATURE</b>
                                            </div>
                                            <td valign="top">
                                                <!--<div id="savedata">-->
                                                <?php
                                                $custSign = $rowCust['user_sign_snap_fname'];
                                                include 'omcdsign.php';
                                                ?>
                                            </td>
                                </tr>

                                <tr align="left" >
                                    <td align="left" valign="middle" colspan="3">
                                        <div id="addCustMoreImageDiv"></div>
                                    </td>
                                </tr>

                                <tr align="left" >
                                    <td align="left" valign="middle" colspan="3">
                                        <div id="addCustOtherDocDiv"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td  align="left" >

                        </td>
                    </tr>
                <?php } else { ?>
        <!--                        <tr>
                        <td  valign="top" align="left" >

                        </td>

                        <td  align="left" >

                        </td>
                        <td  align="left" >

                        </td>
                        <td  align="left" >

                        </td>

                        <td align="left" >
                            <input id="suppEmailId" name="suppEmailId" placeholder=" EMAIL ID" value="<?php echo $rowSupp['user_email']; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('mobNo1').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('mobileNo').focus();
                                               return false;
                                           }"
                                   spellcheck="false" type="text"
                                   class="input_border_grey marginBtm" size="10" maxlength="90" style="width: 100%;" onblur="checkvalue('', this.value, '', '<?php echo $mlId; ?>')" />
                        </td>
                        <td align="left">
                            <input id="mobNo1" name="mobNo1" placeholder="  MOBILE NO.1" type="text" value="<?php echo $rowSupp['user_mobile1']; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('suppReference').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('mobileNo').focus();
                                               return false;
                                           }"
                                   spellcheck="false" class="input_border_grey marginBtm" size="12"
                                   maxlength="12" style="width: 100%;" />
                        </td>

                        <td  align="left" >

                        </td>


                    </tr>-->
                <?php } ?>
                <!--//////////////////////////////////1111111111111//////////////////-->
                <!--<tr>-->

        <!--                            <td  valign="top" align="left" >

                            </td>

                            <td  align="left" >

                            </td>
                            <td  align="left" >

                            </td>
                            <td  align="left" >

                            </td>
                            <td align="left" >
                                <input id="suppReference" name="suppReference" placeholder=" REFERENCE" value="<?php echo $rowSupp['user_reference']; ?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('mobNo2').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('emailId').focus();
                                                   return false;
                                               }"
                                       spellcheck="false" type="text" class="input_border_grey marginBtm" size="15"
                                       maxlength="90" style="width: 100%;"  />
                            </td>-->
        <!--                            <td align="left">
                                <input id="mobNo2" name="mobNo2" placeholder=" MOBILE NO.2" value="<?php echo $rowSupp['user_mobile2']; ?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('suppOtherInfo').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('mobNo1').focus();
                                                   return false;
                                               }"
                                       type="text" spellcheck="false" class="input_border_grey marginBtm" size="15"
                                       maxlength="12" style="width: 100%;"  />
                            </td>-->
                <?php // }  ?>


                <!--</tr>-->
                <!--/////////////////////////////////121212//////////////////-->
                <tr>
                    <?php // if ($panel == 'Update') {  ?>
                                                    <!--<td align="left"  colspan="3" valign="top">-->
                                <!--                        <table cellspacing="0" cellpadding="0" border="0" valign="top">
                                                    <tr>
                                                        <td valign="top">
                                                            <div id="savedata">
                    <?php
//        $custSign = $rowCust['user_sign_snap_fname'];
//        include 'omcdsign.php';
                    ?>
                                                        </td>
                                                    </tr>

                                                    <tr align="left" >
                                                        <td align="left" valign="middle" colspan="3">
                                                            <div id="addCustMoreImageDiv"></div>
                                                        </td>
                                                    </tr>

                                                    <tr align="left" >
                                                        <td align="left" valign="middle" colspan="3">
                                                            <div id="addCustOtherDocDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>-->
                    <!--</td>-->

        <!--                        <td  align="left" >

                                </td>
                    -->

                    <?php // } else {  ?>
                <!--                            <td  align="left" >

                                            </td>
                                            <td  align="left" >

                                            </td>
                                            <td  align="left" >

                                            </td>

                                            <td  align="left" >

                                            </td>
                                            <td align="left" valign="middle" colspan="2">
                                                <textarea id="suppOtherInfo" spellcheck="false" placeholder=" OTHER INFORMATION" value=""
                                                          onkeydown="javascript: if (event.keyCode == 13) {
                                                                      document.getElementById('subButton').focus();
                                                                      return false;
                                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                                      document.getElementById('').focus();
                                                                      return false;
                                                                  }"
                                                          name="suppOtherInfo" class="textarea width330" style="height: 62px;  width:100%;"><?php echo $rowSupp['user_other_info']; ?></textarea>
                                            </td>-->
                    <?php // }  ?>

                </tr>
                </table>
                </td>
                </tr>
                </table>
                </td>
                <td align="center" width="45%" valign="top" style="background: #fff;border-radius: 5px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;padding: 5px;">
                    <table width="100%" align="center" class="addFrmsec">
                        <tr>
                            <td colspan="4">
                                <div class="brown formHead">
                                    ADDRESS INFORMATION
                                </div>
                            </td> 
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" align="center" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" valign="middle" >
                                            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <input id="suppShopName" name="suppShopName" placeholder="SHOP NAME/BUSINESS NAME" value="<?php echo $rowSupp['user_shop_name']; ?>"
                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                       document.getElementById('firstName').focus();
                                                                       return false;
                                                                       } else if (event.keyCode == 9 && this.value == '') {
                                                                       document.getElementById('firstName').focus();
                                                                       return false;
                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('custAdharCardNumber').focus();
                                                                       return false;
                                                                       }"
                                                               spellcheck="false" type="text" class="input_border_grey marginBtm" size="15"
                                                               maxlength="50" style="width: 100%;height:35px;" />
                                                    </td>
                                                    <td align="right">
                                                        <input id="suppUniqueCode" name="suppUniqueCode" placeholder=" ML-ID" value="<?php echo $rowSupp['user_unique_code']; ?>"
                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                       document.getElementById('firstName').focus();
                                                                       return false;
                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('suppShopName').focus();
                                                                       return false;
                                                                       }"
                                                               type="text" spellcheck="false" class="input_border_red marginBtm" size="8" onblur="checkvalue('', '', '', '', this.value)"
                                                               maxlength="8" style="width:100%;height:35px;"/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>                     
                                    </tr>
                                </table> 
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="middle">
                                <textarea id="address1" spellcheck="false" placeholder=" PERMANTENT/HOME TOWN ADDRESS" value=""
                                          onkeydown="javascript: if (event.keyCode == 13) {
                                                  document.getElementById('suppPANNO').focus();
                                                  return false;
                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                  document.getElementById('custMedia').focus();
                                                  return false;
                                                  }"
                                          name="address1" class="textarea width330" style="height: 62px; width:100%;"><?php echo $rowSupp['user_add']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="middle">
                                <textarea id="office_address" spellcheck="false" placeholder=" OFFICE /SHOP ADDRESS" 
                                          onkeydown="javascript: if (event.keyCode == 13) {
                                                  document.getElementById('gender').focus();
                                                  return false;
                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                  document.getElementById('custMedia').focus();
                                                  return false;
                                                  }"
                                          name="office_address" class="textarea width330" style="height: 62px; width:100%;"><?php echo $rowSupp['user_official_address']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <textarea id="curr_address" spellcheck="false" placeholder=" CURRENT ADDRESS" 
                                          onkeydown="javascript: if (event.keyCode == 13) {
                                                  document.getElementById('user_bank_details').focus();
                                                  return false;
                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                  document.getElementById('custMedia').focus();
                                                  return false;
                                                  }"
                                          name="curr_address" class="textarea width330" style="height: 72px;  width:100%;"><?php echo $rowSupp['user_current_address']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" align="center" cellspacing="1" cellpadding="0">
                                    <tr>
                                        <td align="left" width="50%">
                                            <input id="village" name="village" title="village" value="<?php //echo $village_name;    ?>"
                                                   type="text" spellcheck="false" class="input_border_grey marginBtm" placeholder=" VILLAGE"
                                                   onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                                           searchVillageForPanel(document.getElementById('village').value, event.keyCode, 'addNewCustomer');
                                                           }" 
                                                   onclick="searchVillageForPanelBlank('addNewCustomer');"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                           searchVillageForPanelBlank('addNewCustomer');
                                                           document.getElementById('wardNumber').focus();
                                                           return false;
                                                           } else if (event.keyCode == 9) {
                                                           searchVillageForPanelBlank('addNewCustomer');
                                                           document.getElementById('wardNumber').focus();
                                                           return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                           searchVillageForPanelBlank('addNewCustomer');
                                                           document.getElementById('address1').focus();
                                                           return false;
                                                           }"
                                                   autocomplete="off" size="10" maxlength="50" style="width: 100%;height:35px;" /> 
                                            <div id="villageListDivToAddNewCust" class="cityListDivToAddGirvi"></div>
                                        </td>
                                        <td align="left" width="50%">
                                            <input id="wardNumber" name="wardNumber" placeholder="WARD NUMBER" value="<?php echo $rowSupp['user_ward_no']; ?>"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('tehsil').focus();
                                                           return false;
                                                           } else if (event.keyCode == 8 && event.keyCode == '') {
                                                           document.getElementById('village').focus();
                                                           return false;
                                                           }"
                                                   spellcheck="false" type="text"
                                                   class="input_border_grey marginBtm" size="10" maxlength="50"  style="width: 100%;height:35px;" />
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input id="tehsil" name="tehsil" title="यहा�? कस�?टमर के ग�?राम या शहर का नाम �?ंटर करे!" value="<?php //echo $tehsil_name;    ?>"
                                                   type="text" spellcheck="false" class="input_border_grey marginBtm" placeholder=" TEHSIL"
                                                   onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                                           searchTehsilForPanel(document.getElementById('tehsil').value, event.keyCode, 'addNewCustomer'); }" 
                                                   onclick="searchTehsilForPanelBlank('addNewCustomer');"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                           searchTehsilForPanelBlank('addNewCustomer');
                                                           document.getElementById('city').focus();
                                                           return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                           searchTehsilForPanelBlank('addNewCustomer');
                                                           document.getElementById('wardNumber').focus();
                                                           return false;
                                                           }"
                                                   autocomplete="off" size="10" maxlength="50" style="width: 100%;height:35px;" /> 
                                            <div id="tehsilListDivToAddNewCust" class="cityListDivToAddGirvi"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table width="100%" align="center" cellspacing="1" cellpadding="0">
                                                <tr>
                                                    <?php
                                                    $ownerId = $_SESSION['sessionOwnerId'];
                                                    if ($ownerId != '' || $ownerId != NULL) {
                                                        require_once 'system/omssopin.php';
                                                    } else {
                                                        $ownerId = $dgGUId;
                                                        if ($ownerId == '') {
                                                            $ownerId = $_SESSION['sessiondgGUId'];
                                                        }
                                                    }
                                                    //
                                                    if ($panel != 'Update') {
                                                        $qselect = "select city_name from city where city_own_id='$ownerId' and city_selected='selected' order by city_name asc ";
                                                        $qurRes = mysqli_query($conn, $qselect);
                                                        $row = mysqli_fetch_array($qurRes, MYSQLI_ASSOC);
                                                        $city_name = $row['city_name'];
                                                    }
                                                    ?>
                                                    <td align="left" width="50%">
                                                        <input id="city" name="city" title="यहा�? कस�?टमर के ग�?राम या शहर का नाम �?ंटर करे!"
                                                               type="text" spellcheck="false" class="input_border_red marginBtm" placeholder="CITY" value="<?php echo $city_name; ?>"
                                                               onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                                                       searchCityForPanel(document.getElementById('city').value, event.keyCode, 'addNewCustomer');
                                                                       }" 
                                                               onclick="searchCityForPanelBlank('addNewCustomer');"
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
                                                               autocomplete="off" size="13" maxlength="50"  style="width:100%;height:35px;position:realtive"/> 
                                                        <div id="cityListDivToAddNewCust" class="cityListDivToAddGirvi" style="position:relative"></div>
                                                    </td>
                                                    <td align="left" width="50%">
                                                        <input id="pinCode" name="pinCode" placeholder=" PIN CODE" value="<?php echo $rowSupp['user_pincode']; ?>"
                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                       document.getElementById('DOJDay').focus();
                                                                       return false;
                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                       document.getElementById('city').focus();
                                                                       return false;
                                                                       }"
                                                               spellcheck="false" type="text" class="input_border_grey marginBtm" size="9"
                                                               maxlength="50"   style="width:100%;height:35px;"/>
                                                    </td>


                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table width="100%" align="center" cellspacing="1" cellpadding="0">
                                                <tr>
                                                    <td align="left" width="50%">
                                                        <div class="selectStyled floatLeft" style="width:100%">
                                                            <SELECT class="select_border_red marginBtm" id="state" name="state" style="width: 100%;height:35px;box-shadow:none;" 
                                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('country').focus();
                                                                            return false;
                                                                            } else if (event.keyCode == 8) {
                                                                            document.getElementById('pinCode').focus();
                                                                            return false;
                                                                            }">
                                                                <OPTION  VALUE="NotSelected">Select State</OPTION>
                                                                <?php
                                                                $state = $rowSupp['user_state'];
                                                                include 'omvsgtsn.php';
                                                                ?>
                                                            </SELECT>
                                                        </div>
                                                    </td>
                                                    <td align="left" width="50%">
                                                        <div class="selectStyled floatLeft" style="width:100%">
                                                            <SELECT class="select_border_red marginBtm" id="country" name="country" style="width: 100%;height:35px;box-shadow:none;" value="<?php echo $rowSupp['user_type']; ?>"
                                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('proLoginId').focus();
                                                                            return false;
                                                                            } else if (event.keyCode == 8) {
                                                                            document.getElementById('state').focus();
                                                                            return false;
                                                                            }">
                                                                <OPTION VALUE="NotSelected">Select Country</OPTION>
                                                                <?php
                                                                $country = $rowSupp['user_country'];
                                                                include 'omvcgtco.php';
                                                                ?>

                                                            </SELECT>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </td>


                <td align="center" width="10%" valign="top" style="background: #fff;border-radius: 5px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;padding: 5px;">
                    <table width="100%" align="center" class="addFrmsec">
                        <tr>
                            <td colspan="4">
                                <div class="brown formHead">
                                    MONEY LENDER IMAGE
                                </div>
                            </td> 
                        </tr>
                        <tr>
                            <?php if ($panel == 'Update') { ?>
                                <td   width="100%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" colspan="0">
                                                <input type="hidden" id="webcam_file" name="webcam_file" class="image-tag">
                                                <input type="text" id="fileName" name="fileName" value="<?php echo $image_snap_fname; ?>"
                                                       class="lgn-txtfield-without-borderAndBackground" readonly="readonly" />
                                                <input type="hidden" id="imageLoadOption" name="imageLoadOption" />
                                                <input type="hidden" id="compressedImage" name="compressedImage" />
                                                <input type="hidden" id="compressedImageThumb" name="compressedImageThumb" />
                                                <input type="hidden" id="compressedImageSize" name="compressedImageSize" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="0" class="paddingTop3">
                                                <!--                                            <div id="file_input_div">
                                                                                                <div class="file_input_div" style="height:100px;width: 150px;" align="center">
                                                <?php if ($imageId != null || $imageId != '') { ?> 
                                                                                                                                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo $imageId; ?>"  style="height:100px;width: 150px;" >
                                                <?php } else { ?>
                                                                                                                                             <input type="button" class="file_input_button" style="height:100px;" />
                                                                                                                                          <input type="file" id="selectPhoto"
                                                                                                                                                   style="cursor: pointer;" name="selectPhoto"
                                                                                                                                                   class="file_input_hidden"
                                                                                                                                                   onchange="javascript: document.getElementById('fileName').value = this.value" />
                                                <?php } ?>
                                                                                                </div>
                                                                                             </div>-->
                                                <div id="file_input_div">
                                                    <div class="file_input_div" style="height:128px;width: 128px;" align="center">

                                                        <input type="button" value="" alt="COM" id="ComputerButt" class="file_input_button"  style="height:128px;"
                                                               onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';" onsubmit="return false;" />

                                                        <input type="file" id="addItemSelectPhoto"
                                                               style="cursor: pointer;" name="addItemSelectPhoto"
                                                               class="file_input_hidden"
                                                               onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';"
                                                               onchange="loadImageFileCompress();" 
                                                               onsubmit="return false;" />

                                                    </div>
                                                </div>
                                                <!--                                            <div id="webcam_input_div" align="center" ></div>-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="0">
                                                <input id="suppImageDesc" name="suppImageDesc" placeholder="IMAGE DESCRIPTION " 
                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                   document.getElementById('subButton').focus();
                                                                   return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                   document.getElementById('custStaffLoginId').focus();
                                                                   return false;
                                                                   }"
                                                       spellcheck="false" type="hidden" class="input_border_grey marginBtm" size="30"
                                                       maxlength="50" style="width: 150px;height:35px;"/>
                                            </td>
                                        </tr>
            <!--                                    <tr>
                                            <td align="left" colspan="0" class="paddingTop3">
                                                <table width="100%">
                                                    <tr>
                                                                <td align="left" style="width: 70px;">
                                                            
                                                        </td>
                                                        <td align="center" style="width: 70px;">
                                                            <input type="submit" value="Webcam" class="frm-btn" id="WebcamImage" maxlength="50" size="5" onclick="chngCustImgLoadOpt(this.value, '', '', 'Customer', 'selectPhoto', 'imageLoadOption', 'fileName');
                                                                            return false;" style="width: 125px;"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>-->

                                        <!--START CODE FOR ADD WEBCAM @AUTHOR SIMRAN3SEPT2021-->
                                        <tr>
                                            <td align="left" colspan="0" class="paddingTop3">
                                                <table width="100%">
                                                    <tr>
                                                        <td align="center">
                                                            <button type="submit" id="WebcamImage" onclick="getWebcamImageDiv('', 'file_input_div', 'Webcam');
                                                                        return false;" class="btn btn-primary" 
                                                                    style="height:35px;width:130px;font-weight:bold;font-size:14px;margin-bottom:5px;border-radius: 5px !important;text-align:center;color:#000080;background-color: #89B2ED;">
                                                                <span>WEBCAM</span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <!--END CODE FOR ADD WEBCAM @AUTHOR SIMRAN3SEPT2021-->
                                    </table>   
                                </td> 

                            <?php } else { ?>

                                <td colspan="2" rowspan="8" width="20%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" colspan="0">
                                                <input type="hidden" id="webcam_file" name="webcam_file" class="image-tag">
                                                <input type="text" id="fileName" name="fileName" value="<?php echo $image_snap_fname; ?>"
                                                       class="lgn-txtfield-without-borderAndBackground" readonly="readonly" />
                                                <input type="hidden" id="imageLoadOption" name="imageLoadOption" />
                                                <input type="hidden" id="compressedImage" name="compressedImage" />
                                                <input type="hidden" id="compressedImageThumb" name="compressedImageThumb" />
                                                <input type="hidden" id="compressedImageSize" name="compressedImageSize" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="0" class="paddingTop3">
                                                <div id="file_input_div">
                                                    <div class="file_input_div" style="height:128px;width: 128px;" align="center">

                                                        <input type="button" value="" alt="COM" id="ComputerButt" class="file_input_button"  style="height:128px;"
                                                               onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';" onsubmit="return false;" />

                                                        <input type="file" id="addItemSelectPhoto"
                                                               style="cursor: pointer;" name="addItemSelectPhoto"
                                                               class="file_input_hidden"
                                                               onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';"
                                                               onchange="loadImageFileCompress();" 
                                                               onsubmit="return false;" />

                                                    </div>
                                                </div>
                                                <!--                                            <div id="webcam_input_div" align="center" ></div>-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="0">
                                                <input id="suppImageDesc" name="suppImageDesc" placeholder="IMAGE DESCRIPTION " 
                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                   document.getElementById('subButton').focus();
                                                                   return false;
                                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                                   document.getElementById('custStaffLoginId').focus();
                                                                   return false;
                                                                   }"
                                                       spellcheck="false" type="hidden" class="input_border_grey marginBtm" size="30"
                                                       maxlength="50" style="width: 150px;height:35px;"/>
                                            </td>
                                        </tr>


                                        <!--START CODE FOR ADD WEBCAM @AUTHOR SIMRAN3SEPT2021-->
                                        <tr>
                                            <td align="left" colspan="0" class="paddingTop3">
                                                <table width="100%">
                                                    <tr>
                                                        <td align="center">
                                                            <button type="submit" id="WebcamImage" onclick="getWebcamImageDiv('', 'file_input_div', 'Webcam');
                                                                        return false;" class="btn btn-primary" 
                                                                    style="height:35px;width:130px;font-weight:bold;font-size:14px;margin-bottom:5px;border-radius: 5px !important;text-align:center;color:#000080;background-color: #89B2ED;">
                                                                <span>WEBCAM</span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--END CODE FOR ADD WEBCAM @AUTHOR SIMRAN3SEPT2021-->
                                    </table>   
                                </td> 
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php if ($panel == 'Update') { ?>
                                <td style='height:30mm; width: 48mm;' class='backF9F9F9'>
                                    <?php callUploadCustImage($custId, $documentRootBSlash, '12', 'image_snap_fname', 'custImageDesc12', 'image_snap_desc', 'selectPhoto12', 'custImageLoadOption12', 'image_user', 'image_snap_thumb', 'image_snap_ftype', 'MoreImages', 'image_count'); ?> 
                                    <div align="middle"><b style="font-size:14px;">ADHAAR BACK SIDE</b></div>
                                </td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php if ($panel == 'Update') { ?>
                                <td style='height:50px; width: 50px;' class='backF9F9F9' >
                                    <?php callUploadCustImage($custId, $documentRootBSlash, '11', 'image_snap_fname', 'custImageDesc11', 'image_snap_desc', 'selectPhoto11', 'custImageLoadOption11', 'image_user', 'image_snap_thumb', 'image_snap_ftype', 'MoreImages', 'image_count'); ?> 
                                    <div align="middle"><b style="font-size:14px;">ADHAAR FRONT SIDE</b></div>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php if ($panel == 'Update') { ?>
                            <td style='height:30mm; width: 48mm;' class='backF9F9F9' rowspan="2">
                                <?php callUploadCustImage($custId, $documentRootBSlash, '13', 'image_snap_fname', 'custImageDesc13', 'image_snap_desc', 'selectPhoto13', 'custImageLoadOption13', 'image_user', 'image_snap_thumb', 'image_snap_ftype', 'MoreImages', 'image_count'); ?> 
                                <div align="middle"><b style="font-size:14px;">PAN CARD</b></div>
                            </td>
                        <?php } ?>

                    </table>
                </td>
                </tr>
                </table>





                <table border="0" cellpadding="2" cellspacing="0" align="center"
                       width="100%">
                    <tr>
                        <td width="100%" align="center">
                            <div id="addSuppSubButDiv">
                                <table border="0" cellpadding="1" cellspacing="1" align="center" width="100%">
                                    <tr>
                                        <td>
                                            <?php
                                            //***************************************************End code to change for  moneylender images Author@:SANT16JAN16********************************************                                          
                                            // Start Code to Check Demo Mode
                                            $qSelSuppCount = "SELECT user_id FROM user";
                                            $resSuppCount = mysqli_query($conn, $qSelSuppCount);
                                            $totalSupp = mysqli_num_rows($resSuppCount);

                                            if (($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) && $totalSupp >= 10) {
                                                ?> 
                                                <div class="main_link_red_12">In Demo, You can not add more than one money lender. To add more money lender, please purchase the product!</div>
                                                <?php
                                            } else if ($_SESSION['sessionDongleStatus'] != NULL &&
                                                    ((($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) && $totalSupp < 10) ||
                                                    ($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO && $_SESSION['sessionDongleStatus'] == $gbDongleRegStatus))) {
                                                // End Code to Check Demo Mode    
                                                ?>
                                                <div style="text-align:center;">
                                                    <?php
                                                    $inputId = 'subButton';
                                                    $inputType = 'submit';
                                                    $inputIdButton = 'subButton';
                                                    $inputNameButton = 'subButton"';

                                                    if ($panel == 'Update') {
                                                        $inputFieldValue = 'Update';
                                                    } else {
                                                        $inputFieldValue = 'Submit';
                                                    }

                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn btnSubmit btn1 btn1Hover ' . $om_btn_style;
                                                    $inputStyle = 'width:200px;background:#ea5a0b';

                                                    if ($panel == 'Update') {
                                                        $inputLabel = 'UPDATE MONEY LANDER'; // Display Label below the text box
                                                    } else {
                                                        $inputLabel = 'ADD MONEY LANDER'; // Display Label below the text box
                                                    }

                                                    //
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = 'setAction(this.value);';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';

                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!--*****************************************End code to change gold and silver balance Author@:SANT11APR16*********************************** -->
    </div>
    <!--End code to change align @Author:PRIYA24FEB14-->
<?php } ?>
<!-------------End code to add panel indiacator @Author:PRIYA17MAY14--------------->
