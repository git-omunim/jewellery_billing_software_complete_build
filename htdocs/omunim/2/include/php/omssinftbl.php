<?php
/*
 * **************************************************************************************
 * @tutorial: USER INFO FILE 
 * **************************************************************************************
 * @FileName: omccinftbl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.82
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
//
$messDiv = $_GET['messDiv'];
$panelName = $_GET['panelName'];
$userType = $_GET['userType'];
$transPanelName = $_GET['transPanelName']; // TRANSACTION PANEL NAME @AUTHOR:PRIYANKA-09MAR2022
//
//
// ADDED CODE FOR LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
if ($transPanelName == 'RefreshAllUserLoyaltyPoints') {
    // **************************************************************************************
    // START TO ADD CODE FOR UPDATE LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
    // **************************************************************************************
    include 'omUserUpdateClosingLoyaltyPoints.php';
    // **************************************************************************************
    // END TO ADD CODE FOR UPDATE LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
    // **************************************************************************************
}
//
//
?>
<div id="userListDiv">
    <!-- START TO ADD CODE FOR LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022 -->
    <table align="right" border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td>
                <div class="main_link_brown16">
                    <b> <?php if ($panelName == 'user' && $userType == 'customer') { ?>
                        ALL CUSTOMER LIST
                    <?php } else if ($panelName == 'user' && $userType == 'staff') { ?> <!--Adding code to show all staff list @Author:Vinod11March2023-->
                        ALL STAFF LIST
                    <?php } else if ($panelName == 'user' && $userType == 'activeStaff') { ?>
                        ALL ACTIVE STAFF LIST
                    <?php } ?> </b>
                </div>
            </td>                        
            <td align="center" valign="middle">
                <div id="messDisplayDiv"></div>
                <div <?php if ($transPanelName == 'RefreshAllUserLoyaltyPoints') { ?>
                        class="analysis_div_rows main_link_green12"
                    <?php } else { ?>
                        class="analysis_div_rows main_link_red_12"
                    <?php } ?> >
                        <?php if ($displayMsg == 'SuccessfullyUpdated') { ?>
                        <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Loyalty Points Updated Successfully ~ </div>
                    <?php } ?>
                </div>
            </td>
            <?php if ($panelName == 'user' && ($userType == 'customer' || $userType == 'staff' || $userType == 'activeStaff')) { ?>          <!--Adding code to show all staff list @Author:Vinod11March2023-->
                <td align="right">
                    <div style="margin-left:5px;">
                        <?php
                        // **************************************************************************************
                        // START TO ADD CODE FOR UPDATE LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
                        // **************************************************************************************
                        $inputId = "refreshButton";
                        $inputType = 'submit';
                        $inputFieldValue = 'UPDATE LOYALTY POINTS';
                        $inputIdButton = "refreshButton";
                        $inputNameButton = 'refreshButton';
                        //
                        $inputTitle = 'UPDATE LOYALTY POINTS';
                        //
                        // This is the main class for input flied
                        $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                        $inputStyle = " ";
                        //
                        $inputLabel = 'UPDATE LOYALTY POINTS'; // Display Label below the text box
                        //
                        // This class is for Pencil Icon                                                           
                        $inputIconClass = '';
                        $inputPlaceHolder = '';
                        $spanPlaceHolderClass = '';
                        $spanPlaceHolder = '';
                        $inputOnChange = "";
                        $inputOnClickFun = 'refreshUserLoyaltyPoints("user", "customer", "RefreshAllUserLoyaltyPoints");';
                        $inputKeyUpFun = '';
                        $inputDropDownCls = '';               // This is the main division class for drop down 
                        $inputselDropDownCls = '';            // This is class for selection in drop down
                        $inputMainClassButton = '';           // This is the main division for Button
                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                        //
                        // **************************************************************************************
                        // END TO ADD CODE FOR UPDATE LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
                        // **************************************************************************************
                        ?>
                    </div>
                </td>
            <?php } ?>
        </tr>
    </table>
<!--    <table align="center" width="100%">  
        <tr>
            <td>-->
          
    <!-- END TO ADD CODE FOR LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022 -->
    <?php
    /*     * ****** Start Code To GET Firm Details ********* */
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm
        $selFirmId = $_SESSION['setFirmSession'];
    }
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
    }
    if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
        $resFirmCount = mysqli_query($conn, $qSelFirmCount);
        $strFrmId = '0';
        //Set String for Public Firms
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    } else {
        $strFrmId = $selFirmId;
    }
    /*     * ****** End Code To GET Firm Details ********* */
    //
    //
    include 'omdatatablesUnset.php';
    //
    //
    // Data Table Main Columns
    if ($panelName == 'user' && ($userType == 'customer' || $userType == 'staff' || $userType == 'activeStaff' || $userType == 'activeStaff')) {   //Adding code to show all staff list @Author:Vinod11March2023
        //
        $dataTableColumnsFields = array(
            array('dt' => 'FIRM NAME'),
            array('dt' => 'BIO GATE ID'),
            array('dt' => 'EMP ID'),
            array('dt' => 'EMP CODE'),
            array('dt' => 'EMP NAME'),
           // array('dt' => 'S/o  W/o  C/o'),
//            array('dt' => 'OCCUPATION'),
            array('dt' => 'DESIGNATION'),
            array('dt' => 'OFFICIAL NO.'),
            array('dt' => 'MOBILE NO.'),
            array('dt' => 'EMAIL'),
            array('dt' => 'WA'),
            array('dt' => 'DOB'),
            array('dt' => 'ADHAAR NO'),
            array('dt' => 'PAN NO'),
            array('dt' => 'DATE OF JOINING'),
            array('dt' => 'DATE OF LEAVING'),
//            array('dt' => 'ACTIVE/INACTIVE'),
            array('dt' => 'PROD LOGIN ID'),
//            array('dt' => 'BIO GATE ID'),
            array('dt' => 'LOGIN ID'),
            array('dt' => 'BANK NAME'),
            array('dt' => 'BANK ACC NAME'),
            array('dt' => 'BANK ACC NO'),
            array('dt' => 'BANK IFSC CODE'),
             array('dt' => 'ACTIVE/INACTIVE'),
//            array('dt' => 'MOBILE NO'),
//            array('dt' => 'WHATSAPP'),
//            array('dt' => 'CITY'),
//            array('dt' => 'EMP CODE'),
//            array('dt' => 'DOB'),
//            array('dt' => 'ANNIVERSARY'),
//            array('dt' => 'COMMENT'),
//            array('dt' => 'PERMANENT ADD'),
                //array('dt' => 'OFFICE ADD'),
                //array('dt' => 'CURRENT ADD'),
                //array('dt' => 'GSTIN NO'), //ADDED FOR USER GSTIN NO @AUTHOR:SIMRAN-28OCT2022
//            array('dt' => 'EMAIL'), //ADDED FOR USER EMAIL @AUTHOR:SIMRAN-28OCT2022
//            array('dt' => 'PAN NO'),
//            array('dt' => 'ADHAAR'),
                // array('dt' => 'FIRM'),
//            array('dt' => 'LOYALTY PTS'), // ADDED FOR LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022    
//        
        );
    } else if ($panelName == 'user' && $userType == 'supplier') {
        //
        $dataTableColumnsFields = array(
            array('dt' => 'SUPP FNAME'),
            array('dt' => 'SUPP LNAME'),
            array('dt' => 'DOB'),
            array('dt' => 'COMMENT'),
            array('dt' => 'ADDRESS'),
            array('dt' => 'CITY'),
            array('dt' => 'MOBILE NO'),
            array('dt' => 'MEMBERSHIP'),
            array('dt' => 'GSTIN NO'),
            array('dt' => 'ADHAAR'),
            array('dt' => 'FIRM'),
            array('dt' => 'LOYALTY PTS'),
            array('dt' => 'OCCUPATION'),
        );
    }
    //
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    //
    // Table Parameters
    $_SESSION['tableName'] = 'user'; // Table Name
    $_SESSION['tableNamePK'] = 'user_id'; // Primary Key
    //
    //
    // DB Table Columns Parameters 
    if ($panelName == 'user' && ($userType == 'customer' || $userType == 'staff' || $userType == 'activeStaff')) {  //Adding code to show all staff list @Author:Vinod11March2023
        //
        $dbColumnsArray = array(
            "f.firm_name",
            "user_bio_gate_id",
            "IF(user_staff_name IS NULL,user_staff_id,user_staff_name)",
            "CONCAT(user_pid,COALESCE(user_uid, ''))",
            "CONCAT(user_fname,' ',user_lname)",
            //"SUBSTR(user_father_name,2)",
            "user_category",
            "user_phone",
            "user_mobile",
            "user_email",
            "user_ward_no",
            "user_DOB",
            "user_adhaar_card",
            "user_pan_it_no",
            "user_date_of_joining",
            "user_date_of_leaving",
//            "user_status",
            "user_prod_login_id",
//            "user_bio_gate_id",
            "user_login_id",
            "user_bank_details",
            "user_bank_acc_name",
            "user_bank_acc_number",
            "user_bank_ifsc_code",
            "user_status",
//            "user_mobile",
//            "user_ward_no",
//            "user_city",
                // "IF(user_staff_name IS NULL,user_staff_id,user_staff_name)",
//            "user_DOB",
//            "user_marriage_any",
//            "user_last_comment",
//            "user_add",
                //"user_official_address",
                //"user_current_address",
                //"user_cst_no",
                //"user_email",
//            "user_pan_it_no",
//            "user_adhaar_card",
                // "f.firm_name",
//            "user_lty_no",
//            "user_occupation",
        );
    } else if ($panelName == 'user' && $userType == 'supplier') {
        //
        $dbColumnsArray = array(
            "user_fname",
            "user_lname",
            "user_DOB",
            "user_last_comment",
            "user_add",
            "user_city",
            "user_mobile",
            "user_membership",
            "user_cst_no",
            "user_adhaar_card",
            "f.firm_name",
            "user_lty_no",
            "user_occupation"
        );
    }
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;
    $_SESSION['onprintColumnImage'] = "whatsapp_grey16.png";
    $_SESSION['onprintColumn'] = "user_ward_no"; // On which column
    $_SESSION['onprintColumnId'] = "user_ward_no";
    $_SESSION['onprintColumnValue'] = "";
    $_SESSION['onprintColumnFunction'] = "whatsappPopup";
    $_SESSION['onprintColumnFunctionPara1'] = "user_mobile";
    $_SESSION['onprintColumnFunctionPara2'] = "";
    $_SESSION['onprintColumnFunctionPara3'] = "";
    //
    $_SESSION['sqlQueryColumns'] = "user_id,";
    //
    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = '';
    //
    //
    // Start code to include all session
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
    //
    //
    // On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "user_last_comment"; // On which column
    $_SESSION['onclickColumnId'] = "user_last_comment";
    $_SESSION['onclickColumnValue'] = "user_last_comment";
    $_SESSION['onclickColumnFunction'] = "getUserCommentPanel";
    $_SESSION['onclickColumnFunctionPara1'] = "user_id";
    $_SESSION['onclickColumnFunctionPara2'] = "";
    $_SESSION['onclickColumnFunctionPara3'] = "";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
    $_SESSION['popupFunctionPara7'] = "";
    //
    //
    // On Click Function 2 Parameters @AUTHOR-MADHUREE-12JULY2021
    $_SESSION['onclickColumnImageTwo' . $dataTableCounter] = "";
    $_SESSION['onclickColumnTwo' . $dataTableCounter] = "CONCAT(user_fname,' ',user_lname)"; // On which column
    $_SESSION['onclickColumnIdTwo' . $dataTableCounter] = "user_id";
    $_SESSION['onclickColumnValueTwo' . $dataTableCounter] = "user_id";
    $_SESSION['onclickColumnFunctionTwo' . $dataTableCounter] = "navigateToCustHome";
    $_SESSION['onclickColumnFunctionTwoPara1' . $dataTableCounter] = "user_id";
    $_SESSION['onclickColumnFunctionTwoPara2' . $dataTableCounter] = "";
    $_SESSION['onclickColumnFunctionTwoPara3' . $dataTableCounter] = "";
    $_SESSION['onclickColumnFunctionTwoPara4' . $dataTableCounter] = "";
    $_SESSION['onclickColumnFunctionTwoPara5' . $dataTableCounter] = "";
    $_SESSION['onclickColumnFunctionTwoPara6' . $dataTableCounter] = "";
    $_SESSION['onclickColumnFunctionTwoPara7' . $dataTableCounter] = "";
    //
    //
    // Extra direct columns we need pass in SQL Query
    if (($panelName == 'user' && $userType == 'customer')) {
        $_SESSION['tableWhere'] = "user_firm_id IN ($strFrmId) and user_type IN ('CUSTOMER') ";
    } else if (($panelName == 'user' && $userType == 'supplier')) {
        $_SESSION['tableWhere'] = "user_firm_id IN ($strFrmId) and user_type IN ('SUPPLIER') ";
    } else if (($panelName == 'user' && $userType == 'staff')) {   //Adding code to show all staff list @Author:Vinod11March2023
        $_SESSION['tableWhere'] = "user_firm_id IN ($strFrmId) and user_type IN ('STAFF') ";
    } else if (($panelName == 'user' && $userType == 'activeStaff')) {   //Adding code to show all staff list @Author:Vinod11March2023
        $_SESSION['tableWhere'] = "user_firm_id IN ($strFrmId) and user_type IN ('STAFF') and user_status='Active'";
    }
    //
    //
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON user_firm_id = f.firm_id";
    //
    //
    // Data Table Main File
    include 'omdatatables.php';
    ?>
</div>
      
<!--            </td>
        </tr>
    </table>-->

