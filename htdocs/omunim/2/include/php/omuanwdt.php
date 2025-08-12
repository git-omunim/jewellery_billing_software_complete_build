<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: omuanwdt.php
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
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php'; //add file @Author:ANUJA18MAR16
?>
<div id="udhaarSubDiv">
    <?php
    //
    //print_r($_REQUEST);
    //
    $custId = $_POST['custId'];
    if ($custId == '') {
        $custId = $_GET['custId'];
    }
    //
    parse_str(getTableValues("SELECT user_acc_id FROM user WHERE user_id='$custId' and user_owner_id='$sessionOwnerId'"));
    //
    $invoiceNo = $_GET['invoiceNo'];
    $panelName = $_GET['panelName'];
    $udhaarId = $_GET['udhaarId'];
    //
    //echo "udhaarId==".$udhaarId;
    //echo '$custId='.$custId.'<br>';
    //echo '$invoiceNo='.$invoiceNo.'<br>';
    //echo '$panelName='.$panelName.'<br>';die;
    //echo '$utinId='.$utinId.'<br>';
    //
    /****************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
    parse_str(getTableValues("SELECT user_type FROM user WHERE user_id='$custId' and user_owner_id='$sessionOwnerId'"));
    if ($panelName == 'UpdateUdhaar' || $panelName == 'UdhaarList') {
        //
        //
        $udhaarId = $_GET['udhaarId'];
        //
        // echo "udharID==".$udhaarId;die;
        //
        parse_str(getTableValues("SELECT * FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' and utin_id = '$udhaarId'"));
        $firmId = $utin_firm_id;
        /***************START code to change $utin_DOB column to $utin_date column @Author:PRIYANKA-28JUN17********************* */
        $selDOBDay = substr($utin_date, 0, 2);
        $selDOBMnth = substr($utin_date, 3, -5);
        $todayMM = date("m", strtotime($selDOBMnth)) - 1;
        $selDOBYear = substr($utin_date, -4);
        /****************END code to change $utin_DOB column to $utin_date column @Author:PRIYANKA-28JUN17********************* */
        //
        $custId = $utin_user_id;
        //
        //start code to add end date in update @AUTH:ATHU14/1/17 
        $selendDOBDay = substr($utin_end_date, 0, 2);
        $selendDOBMnth = substr($utin_end_date, 3, -5);
        $todayendMM = date("m", strtotime($selendDOBMnth)) - 1;
        $selendDOBYear = substr($utin_end_date, -4);

        $ROI = $utin_udhaar_roi;
        $udhaarIntType = $utin_udhaar_int_type;
        $udhaarIntChk = $utin_udhaar_int_chk;

        $transType = "UDHAAR','OnPurchase";
        if ($_REQUEST['changeInv'] != '') {
            $payInvoiceNo = getInvoiceNum($utin_user_id, 'udhaar', $transType, $_REQUEST['changeInv']);
            $invArr = explode('*', $payInvoiceNo);
            $utin_pre_invoice_no = $invArr[0];
            $utin_invoice_no = $invArr[1];
        }

        /////end date
    } else {

        //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->               
        parse_str(getTableValues("SELECT user_firm_id FROM user WHERE user_id='$custId' and user_owner_id='$sessionOwnerId'"));
        $firmId = $user_firm_id;
        //---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->              
//        parse_str(getTableValues("SELECT utin_pre_invoice_no FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' and utin_firm_id='$user_firm_id' and utin_type IN('OnPurchase','udhaar') and utin_transaction_type IN ('UDHAAR','UDHAAR DEPOSIT') order by UNIX_TIMESTAMP(utin_since) desc LIMIT 0,1"));
//
//        if ($utin_pre_invoice_no == NULL || $utin_pre_invoice_no == '') {
//            $utin_pre_invoice_no = 'IUM'; //add new value @Author:ANUJA13MAR16
//            $qSelSerialNo = "SELECT MAX(CAST(utin_invoice_no AS UNSIGNED)) as udhaarSerialNo FROM user_transaction_invoice where (utin_pre_invoice_no is NULL OR utin_pre_invoice_no = '') and utin_owner_id='$sessionOwnerId'  GROUP BY utin_id ORDER BY utin_id DESC LIMIT 0,1"; //query changed @Author:PRIYA17FEB15
//            $resSerialNo = mysqli_query($conn, $qSelSerialNo);
//            $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//        } else {
//            $qSelSerialNo = "SELECT MAX(CAST(utin_invoice_no AS UNSIGNED)) as udhaarSerialNo FROM user_transaction_invoice where utin_owner_id='$sessionOwnerId' and utin_firm_id='$user_firm_id' and  utin_type IN('OnPurchase','udhaar') and utin_transaction_type IN ('UDHAAR','UDHAAR DEPOSIT')  GROUP BY utin_id ORDER BY utin_id DESC LIMIT 0,1";
//            $resSerialNo = mysqli_query($conn, $qSelSerialNo);
//            $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//        }
//
//        $utin_invoice_no $= $rowSerialNo['udhaarSerialNo'] + 1;
//
//        $qSelSerialNo = "SELECT utin_invoice_no FROM user_transaction_invoice where utin_invoice_no='$utin_invoice_no' and utin_pre_invoice_no='$utin_pre_invoice_no' and utin_owner_id='$sessionOwnerId'  GROUP BY utin_id ORDER BY utin_id DESC LIMIT 0,1";
//        $resSerialNo = mysqli_query($conn, $qSelSerialNo);
//        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//        $uSerialNo = $rowSerialNo['utin_invoice_no'];
//
//        if ($uSerialNo != '' || $uSerialNo != NULL) {
//            $qSelSerialNo = "SELECT MAX(CAST(utin_invoice_no AS UNSIGNED)) as udhaarSerialNo FROM user_transaction_invoice where utin_pre_invoice_no='$utin_pre_invoice_no' and utin_owner_id='$sessionOwnerId'";
//            $resSerialNo = mysqli_query($conn, $qSelSerialNo);
//            $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//            $utin_invoice_no = $rowSerialNo['udhaarSerialNo'] + 1;
//        }
        /*         * ***************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
        $selDOBDay = date(j);
        $todayMM = date(n) - 1;
        $selDOBYear = date(Y);
        $selDOBMnth = strtoupper(date(M));
        ////start code to add end date @AUTH:ATHU14/1/17 
        $selendDOBDay = date(j);
        $todayendMM = date(n) - 1;
        $selendDOBYear = date(Y);
        $transType = "UDHAAR','OnPurchase";
        ///END CODE
        if ($_REQUEST['changeInv'] != '') {
            $arrMonths = Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');

            $selDOBDay = $_REQUEST['DOBDay'];
            $todayMM = array_search($_REQUEST['DOBMonth'], $arrMonths);
            $selDOBYear = $_REQUEST['DOBYear'];
            ////start code to add end date @AUTH:ATHU14/1/17 
            $selendDOBDay = $_REQUEST['eDOBDay'];
            $todayendMM = array_search($_REQUEST['eDOBMonth'], $arrMonths);
            $selendDOBYear = $_REQUEST['eDOBYear'];


            $utin_total_amt = $_REQUEST['udhaarAmt'];
            $firmId = $_REQUEST['firmId'];
            $utin_dr_acc_id = $_REQUEST['accId'];
            $utin_other_info = $_REQUEST['PayOtherInfo'];
            $utin_transaction_type = $_REQUEST['udhaarType'];



            $payInvoiceNo = getInvoiceNum($userId, 'udhaar', $transType, $_REQUEST['changeInv']);
        } else
            $payInvoiceNo = getInvoiceNum($userId, 'udhaar', $transType);

        $invArr = explode('*', $payInvoiceNo);
        $utin_pre_invoice_no = $invArr[0];
        $utin_invoice_no = $invArr[1];
    }
    ?>

    <form name="add_udhaar_details" id="add_udhaar_details"
          enctype="multipart/form-data" method="post"
          action="include/php/omuadetl.php">    
        <table border="0" cellpadding="0" cellspacing="0" width="99%" align="center" style="background:#e9f7f5;border: 1px dashed #0079c2;padding: 0 5px;margin-top:5px;">
            <!--***************************Start code to change moneypanel home page Author:SANT28APR16********************************-->            
            <tr>
                <td align="left" valign="top" class="ff_calibri fs_16 orange"> 

                </td>
                <td></td>
                <td align="right" valign="top" class="textLabel12CalibriBrown" title="Click to close panel ! ">

                    <a style="cursor: pointer;position:absolute;margin-left:-20px;"  onclick="closeAdvMetalDiv1();">
                        <?php include 'omzaajcl.php'; ?>
                    </a>

                </td>
            </tr>
            <!--***************************End code to change moneypanel home page Author:SANT28APR16********************************-->
            <tr>
                <td align="center" valign="top" width="33%"> 
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="margin-right:5px;">
                        <tr>  
                            <td align="left" valign="top" class="textLabel12CalibriBrown">
                                <span class="fontRprt">UDHAAR AMOUNT</span>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            if ($panelName == 'UpdateUdhaar') {
                                ?>
                            <input type="hidden" id="udhaaramount" name="udhaaramount" value="<?php
                            if ($utin_total_amt_deposit > 0)
                                echo $utin_total_amt - $utin_total_amt_deposit;
                            else
                                echo '0';
                            ?>" />
                                   <?php
                               }
                               ?>
                        <td align="center" valign="middle" class="textBoxCurve2px margin2pxAll  textLabel24Calibri loanamt backFFFFFF" style="width:100%;height:34px">
                            <input id="udhaarMainAmount" name="udhaarMainAmount" type="text" class="bigPlacehoder"
                                   placeholder="UDHAAR AMOUNT" value="<?php if ($utin_total_amt <> 0) echo om_round($utin_total_amt); ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('DOBDay').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               return false;
                                           }"
                                   onchange="
                                           if (parseFloat(document.getElementById('udhaaramount').value) > parseFloat(this.value)) {
                                               alert('UDHAAR AMOUNT IS LESS TAHN UDHAAR DEPSOIT AMOUNT');
                                               return false;
                                           }"
                                   onkeypress="return valKeyPressedForNumNDot(event);"

                                   spellcheck="false" class="textFieldWOB20 height_30" size="16" maxlength="30" style="width:100%;border:0;font-weight:600;"/>
                            <input id="custId" name="custId" value="<?php echo $custId; ?>" type="hidden" /> 

                            <input id="panelName" name="panelName" value="<?php echo $panelName; ?>" type="hidden" /> 
                            <input id="udhaarId" name="udhaarId" value="<?php echo $udhaarId; ?>" type="hidden" /> 
                        </td>
            </tr>
            <tr align="center">
                <td>
                    <table align="center" valign="top" width="100%">
                        <tr>
                            <td align="left" valign="top" width="50%" class="textLabel12CalibriBrown">
                                <span class="fontRprt">START DATE</span>
                            </td>
                            <td align="left" valign="top" width="50%" class="textLabel12CalibriBrown">
                               <span class="fontRprt">END DATE</span>
                            </td>
                        </tr>
                    </table>
                </td>
               
            </tr>
            <tr>

                <td align="center" valign="middle" > 
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr> 
                            <td align="center" valign="middle"  class="textBoxCurve1px margin2pxAll backFFFFFF" width="45%">
                                <?php
                                //
                                // **********************************************************************************
                                // START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
                                // **********************************************************************************
                                //
                                $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
                                $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
                                $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
                                $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
                                //
                                // ********************************************************************************
                                // END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
                                // ********************************************************************************
                                //
                                if ($nepaliDateIndicator == 'YES') {
                                    $nepaliDatePanel = 'addUdharAdvancePanel';
                                    $selDayId = "DOBDay$udCounter";
                                    $selDayName = 'DOBDay';
                                    $selDayStyle = '';
                                    $selMonthId = "DOBMonth$udCounter";
                                    $selMonthName = 'DOBMonth';
                                    $selMonthStyle = '';
                                    $selYearId = "DOBYear$udCounter";
                                    $selYearName = 'DOBYear';
                                    $selYearStyle = '';
                                    $date_nepali = '';
                                    include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                } else {
                                    include 'omuustartdate.php';
                                }
                                ?>
                            </td>
                                <td align="center" valign="middle" width="45%" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                <?php
                                if ($nepaliDateIndicator == 'YES') {
                                    $nepaliDatePanel = 'addUdharAdvancePanel';
                                    $selDayId = "endDOBDay";
                                    $selDayName = 'endDOBDay';
                                    $selDayStyle = '';
                                    $selMonthId = "endDOBMonth";
                                    $selMonthName = 'endDOBMonth';
                                    $selMonthStyle = '';
                                    $selYearId = "endDOBYear";
                                    $selYearName = 'endDOBYear';
                                    $selYearStyle = '';
                                    $date_nepali = '';
                                    include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                } else {
                                    include 'omuuenddate.php';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
              
            </tr>


        </table>
        </td>
        <td align="center" valign="top" width="25%"> 
            <table border="0" cellpadding="2" cellspacing="0" width="100%" style="margin-left:5px;">
                <tr align="center">
                    <td align="left" valign="middle" class="textLabel12CalibriBrown" style="padding:5px 3px;">
                      <span class="fontRprt">FIRM NAME</span>
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                        <div id="selectFirmDiv" class="selectStyledBorderLess background_transparent">
                            <?php
                            $prevFieldId = 'DOBYear';
                            $nextFieldId = 'udhaarPreSerialNo';
                            $firmIdName = 'udhharFirmId';
                            $class = 'textLabel14CalibriReq';
                            $panel = 'AddNewUdhaar';
                            if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                $firmIdSelected = $_SESSION['setFirmSession'];
                            } else {
                                $firmIdSelected = $firmId;
                            }
                            include 'omffrafs.php';
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="middle" class="textLabel12CalibriBrown" style="padding:5px 3px;">
                        <span class="fontRprt">SERIAL NUMBER</span>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" colspan="2" class="textBoxCurve1px margin2pxAll textLabel14CalibriReq backFFFFFF">
                        <div id='udhaarSerialNoDiv'>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="100px">
                                        <input id="udhaarPreSerialNo" name="udhaarPreSerialNo" placeholder="SID"
                                               type="text" <?php if ($staffId && $array['addNewGirviAccessSerialNo'] != 'true') { ?>readonly="true"<?php }//give access depending on staff @AUTHOR: SANDY15AUG13                                                                                                                                                                                                                                                                                                                                                                     ?>
                                               value="<?php echo $utin_pre_invoice_no; ?>" 
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('udhaarSerialNo').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('udhharFirmId').focus();
                                                           return false;

                                                       }"
                                               onchange="getInvoice(document.getElementById('udhaarPreSerialNo').value, document.getElementById('udhaarSerialNo').value, '', '<?php echo $custId; ?>', '<?php echo $panelName; ?>', '<?php echo $udhaarId; ?>')
                                                               ;"
                                               spellcheck="false" class="border-no inputBox14CalibriReqCenter background_transparent" style="width:70px;height:35px;" size="3" maxlength="3"  />
                                        &nbsp;-&nbsp;
                                        <input id="udhaarSerialNo" name="udhaarSerialNo" placeholder="SNO"
                                               type="text" value="<?php echo $utin_invoice_no; ?>" <?php if ($staffId && $array['addNewGirviAccessSerialNo'] != 'true') { ?>readonly="true" <?php }//give access depending on staff @AUTHOR: SANDY15AUG13                                                                                                                                                                                                                                                                                                                                                                                                                                                               ?>
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('udhaarType').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('udhaarPreSerialNo').focus();
                                                           return false;

                                                       }"
                                               spellcheck="false" class="border-no textLabel14CalibriReq background_transparent" style="width:70px;height:35px" size="10" maxlength="10" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td align="center" valign="top" width="33%" > 
            <table border="0" cellpadding="2" cellspacing="0" width="100%" style="margin-left:10px;">
                <tr align="center">
                    <td align="left" valign="middle" class="textLabel12CalibriBrown" style="padding: 5px 3px;">
                        <span class="fontRprt">UDHAAR TYPE</span>
                    </td>
                    <td align="left" valign="middle" class="textLabel12CalibriBrown" style="padding: 5px 3px;">
                        <span class="fontRprt">EXECUTIVE</span>
                    </td>
                </tr>
                <tr>
                     <td align="center" valign="middle" style="width:100px"> 
                       <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr width="100%"> 
                                <td align="center" valign="middle" class="textBoxCurve1px margin2pxAll backFFFFFF" >
                                    <div id="interestTypeDiv" class="selectStyledBorderLess background_transparent">
                                        <select onchange="changeUdharCrAccount(document.getElementById('udhaarType').value, document.getElementById('udhharFirmId').value);
                                                    showAddUdhaarItemDiv(this, document.getElementById('addUdhaarItemDiv'));
                                                    return false;"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('udhaarPayAccId').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('udhaarSerialNo').focus();
                                                                return false;
                                                            }"
                                                    id="udhaarType" name="udhaarType" class="textLabel14CalibriReq" style="height:30px;width:100%">
                                                        <?php
                                                        if ($panelName == 'UpdateUdhaar' || $_REQUEST['changeInv'] != '') {
                                                            $udhType = array('Cash', 'OnPurchase');
                                                            for ($i = 0; $i <= 1; $i++)
                                                                if ($udhType[$i] == $utin_transaction_type)
                                                                    $optUdhaarTypeSel[$i] = 'selected';
                                                        } else {
                                                            $optUdhaarTypeSel[0] = 'selected';
                                                        }
                                                        ?>
                                                <option value="udhaar" <?php echo $optUdhaarTypeSel[0]; ?>>Cash</option>
                                                <option value="OnPurchase" <?php echo $optUdhaarTypeSel[1]; ?>>OnPurchase</option>
                                            </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                     </td>
                     <!-- start code to Adding Staff Details In Add Udhar Panel @Author:Vinod-28-06-2023 -->
                     <td align="center" valign="middle" style="width:100%"> 
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr width="100%"> 
                                <td align="center" valign="middle" class="textBoxCurve1px margin2pxAll backFFFFFF" >
                                    <div id="interestTypeDiv" class="selectStyledBorderLess background_transparent">
                                     <?php if ($staffId != '') { ?>
                                                                        <select id="custStaffLoginId" name="udharStaffId"               
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('addItemSALEMonth').focus();
                                                                                                    return false;
                                                                                                    } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('sttr_account_id').focus();
                                                                                                    return false;
                                                                                                    }"
                                                                                class="textLabel14CalibriReq form-control text-center content-mess-maron form-control-font13" style="height: 26px;width:100%;">
                                                                                <?php
                                                                                $qSelStaffLoginId = "SELECT user_id,user_login_id,user_fname FROM user where user_owner_id='$sessionOwnerId' and user_status NOT IN ('Deleted','INACTIVE') and user_type='STAFF' order by user_login_id asc";
                                                                                $resStaffLoginId = mysqli_query($conn, $qSelStaffLoginId);

                                                                                while ($rowStaffLoginId = mysqli_fetch_array($resStaffLoginId, MYSQLI_ASSOC)) {
                                                                                    $staffName = $rowStaffLoginId['user_fname'];
                                                                                    if ($rowStaffLoginId['user_id'] == $staffId) {
                                                                                        $staffLoginIdSelected = "selected";
                                                                                    }
                                                                                    echo "<OPTION  VALUE=" . "\"{$rowStaffLoginId['user_id']}\"" . " class=" . "\"content-mess-maron\"" . " $staffLoginIdSelected>{$staffName}</OPTION>";
                                                                                    $staffLoginIdSelected = "";
                                                                                }
                                                                                ?>
                                                                            <input type="hidden" id="custStaffLoginId" name="custStaffLoginId" value="<?php echo $staffLoginId; ?>"/>
                                                                        </select>
                                                                                <?php } else {
                                                                                    ?>
                                                                        <select id="custStaffLoginId" name="udharStaffId"                 
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('addItemSALEMonth').focus();
                                                                                                    return false;
                                                                                                    } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('sttr_account_id').focus();
                                                                                                    return false;
                                                                                                    }"
                                                                                class="textLabel14CalibriReq form-control content-mess-maron text-center form-control-font13" style="height: 30px;width:100%;">
                                                                            <OPTION  VALUE="NotSelected">STAFF</OPTION>
                                                                                <?php
                                                                                $qSelStaffLoginId = "SELECT user_id,user_login_id,user_fname FROM user where user_owner_id='$sessionOwnerId' and user_status NOT IN ('Deleted','INACTIVE') and user_type='STAFF' order by user_login_id asc";
                                                                                $resStaffLoginId = mysqli_query($conn, $qSelStaffLoginId);

                                                                                while ($rowStaffLoginId = mysqli_fetch_array($resStaffLoginId, MYSQLI_ASSOC)) {
                                                                                    $staffName = $rowStaffLoginId['user_fname'];
                                                                                    if ($rowStaffLoginId['user_id'] == $sttr_staff_id) {
                                                                                        $staffLoginIdSelected = "selected";
                                                                                    }
                                                                                    echo "<OPTION  VALUE=" . "\"{$rowStaffLoginId['user_id']}\"" . " class=" . "\"content-mess-maron\"" . " $staffLoginIdSelected>{$staffName}</OPTION>";
                                                                                    $staffLoginIdSelected = "";
                                                                                }
                                                                                ?>
                                                                        </select>
                                                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- End code to Adding Staff Details In Add Udhar Panel @Author:Vinod-28-06-2023 -->
                </tr>
                <tr>
                    <td align="left" valign="middle" class="textLabel12CalibriBrown" width="50%">
                       <span class="fontRprt">ROI</span>
                    </td>
                    <td align="left" valign="middle" class="textLabel12CalibriBrown" width="50%">
                       <span class="fontRprt">INTEREST OPTION</span>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" width="50%"> 
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" valign="middle" width="100%" class="textBoxCurve1px margin2pxAll backFFFFFF" style="position:relative">
                                    <div id="roiSelDiv">
                                        <INPUT id="selROIValue" type ="text" NAME="selROIValue" value="<?php echo $ROI; ?>" 
                                               onkeyup="searchROIForUdhaar('', document.getElementById('udhaInterestType').value, 'AddUdhaarEMI', event.keyCode,
                                                               '<?php echo $firmId; ?>');"
                                               onclick="this.value = '';
                                                       searchRoiForPanelBlank();"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           searchRoiForFocusPanelBlank('AddUdhaarEMI', event.keyCode);
                                                           document.getElementById('udhaInterestType').focus();
                                                       }"
                                               spellcheck = "false" placeholder="ROI"
                                               class="textLabel14CalibriBlackMiddle border-no background_transparent" style="height:35px;width:100%" size="3" maxlength = "15"/>
                                    </div>
                                    <div id = "roiListDivToAddROI" class ="itemListDivToAddStock"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td align="center" valign="middle" width="50%"> 
                        <table border="0" cellpadding="0" cellspacing="2" width="100%">
                            <tr>
                                <td align="center" valign="middle" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                    <div id="interestTypeDiv" class="selectStyledBorderLess background_transparent">
                                        <select
                                            id="udhaInterestType" name="udhaInterestType" class="textLabel14CalibriReq" style="height:30px;"
                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                        document.getElementById('selROIValue').focus();
                                                        return false;
                                                    } else if (event.keyCode == 8) {
                                                        document.getElementById('DOBYear').focus();
                                                        return false;
                                                    }">
                                                <?php
                                                if ($panelName == 'UpdateUdhaar') {
                                                    $interestType = array(Days, Monthly, Annually);
                                                    for ($i = 0; $i <= 2; $i++)
                                                        if ($interestType[$i] == $udhaarIntType)
                                                            $optionIntTypeSel[$i] = 'selected';
                                                } else {
                                                    $optionIntTypeSel[1] = 'selected';
                                                }
                                                ?>
                                            <option value="NotSelected">INTEREST TYPE</option>
                                            <option value="Days" <?php echo $optionIntTypeSel[0]; ?>>DAYS</option>
                                            <option value="Monthly" <?php echo $optionIntTypeSel[1]; ?>>MONTHLY</option>
                                            <option value="Annually" <?php echo $optionIntTypeSel[2]; ?>>ANNUALLY</option>
                                        </select>
                                    </div>
                                </td>
                                <td valign="middle" align="right" width="20px"> 
                                    <input type="checkbox" id="udhaarIntrestCheck" name="udhaarIntrestCheck" 
                                    <?php
                                    if ($udhaarIntChk == 'true')
                                        echo 'checked';
                                    ?>/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
<!--        <td align="center" valign="middle">
            <div id="ajaxLoadGetItemListDiv" style="visibility: hidden">
                <?php include 'omzaajld.php'; ?>
            </div>
        </td> -->
        </tr>
<!--        <tr>
            <td align="right" colspan="4" class="paddingTop3">
                <div class="hrGold"></div>
            </td>
        </tr>-->
        <tr align="left">
            <td align="left" colspan="4">
                <div id="addUdhaarItemDiv"></div>
            </td>
        </tr>
        <?php
// echo $panelName." : ".$utin_type;
        if ($panelName == 'UpdateUdhaar' && trim($utin_transaction_type) == 'OnPurchase') {
            ?>
            <tr>
                <td align="center" colspan="4" class="paddingTop3">
                    <?php
//                    echo "gvhj,bkdhnl;";
                    $qSelItemDet = "SELECT * FROM stock_transaction "
                            . "where sttr_owner_id = '$_SESSION[sessionOwnerId]'"
                            . " and sttr_utin_id= '$udhaarId' "
                            . "order by sttr_id asc";
//                    echo $qSelItemDet;
                    $resItemDet = mysqli_query($conn, $qSelItemDet);
                    $noOfItems = mysqli_num_rows($resItemDet);
                    $itemDivCount = 1;
                    if ($noOfItems == 0) {
                        include 'omuuiadv.php';
                        $itemDivCount++;
                    } else {
                        while ($rowItemDet = mysqli_fetch_array($resItemDet)) {
                            $udhaarItemId = $rowItemDet['sttr_id'];
                            $metalType = $rowItemDet['sttr_metal_type'];
                            $udhaarItmName = $rowItemDet['sttr_item_name'];
                            $udhaarItmPieces = $rowItemDet['sttr_quantity'];
                            $udhaarGrossWeight = $rowItemDet['sttr_gs_weight'];
                            $udhaarGrossWeightType = $rowItemDet['sttr_gs_weight_type'];
                            $udhaarVal = $rowItemDet['sttr_valuation'];
                            include 'omuuiadv.php';
                            $itemDivCount++;
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
        <input id="noOfUdhaarItems" name="noOfUdhaarItems" value="<?php echo $noOfItems; ?>"  type="hidden" /> 
        <?php if ($panelName != 'UpdateUdhaar') { ?>
            <tr id="hrVisible" style="visibility: hidden;">
                <td align="right" colspan="4" class="paddingTop3">
                    <?php
                    if ($itemDivCount == '') {
                        $itemDivCount = $_POST['udhaarItmCnt'];
                    }
                    if ($itemDivCount == '') {
                        $itemDivCount = $_GET['udhaarItmCnt'];
                    }
                    if ($itemDivCount == '') {
                        $itemDivCount = 1;
                    }
                    if ($udhaarItmPieces == '')
                        $udhaarItmPieces = 1;
                    ?>
                    <div id="udhaarItemDiv<?php echo $itemDivCount; ?>" name="udhaarItemDiv<?php echo $itemDivCount; ?>">
                        <table border="0" cellpadding="2" cellspacing="2" align="center" width="100%"  style="background:#fff;border:1px dashed #c1c1c1;border-bottom:0;">
                            <tr align="left">
                                <td align="left" class="h414">
                                    <div id="itemTypeDiv" class="selectStyled">
                                        <select id="udhaarItemType<?php echo $itemDivCount; ?>" name="udhaarItemType<?php echo $itemDivCount; ?>" 
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('itemName<?php echo $itemDivCount; ?>').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('udhaarType').focus();
                                                            return false;
                                                        }" 
                                                class="select_border_grey" style="width:100%;height:30px;" onchange="changeItemTunchOption(this, '<?php echo $itemDivCount; ?>');">
                                                    <?php
                                                    if ($panelName == 'UpdateUdhaar') {
                                                        $udhaarItemTyp = array(gold, silver, other);
                                                        for ($i = 0; $i <= 2; $i++)
                                                            if ($udhaarItemTyp[$i] == $metalType)
                                                                $optionItemTypSel[$i] = 'selected';
                                                    }
                                                    ?>
                                            <option value="gold" <?php echo $optionItemTypSel[0]; ?>>GOLD</option>
                                            <option value="silver" <?php echo $optionItemTypSel[1]; ?>>SILVER</option>
                                            <option value="other" <?php echo $optionItemTypSel[2]; ?>>OTHER</option>
                                            <?php $optionItemTypSel = ''; ?>
                                        </select>
                                    </div>
                                    <input id="udhaarItemId<?php echo $itemDivCount; ?>" name="udhaarItemId<?php echo $itemDivCount; ?>" type="hidden" value="<?php echo $udhaarItemId; ?>"/>
                                    <input id="udhaarItemDel<?php echo $itemDivCount; ?>" name="udhaarItemDel<?php echo $itemDivCount; ?>" type="hidden"/>
                                    <input id="udhaarItemVar<?php echo $itemDivCount; ?>" name="udhaarItemVar<?php echo $itemDivCount; ?>" type="hidden"/>
                                    <input id="udhaarItemDivCounter" name="udhaarItemDivCounter" value="<?php echo $itemDivCount; ?>" type="hidden" />
                                </td>
                                <td align="left" class="h414 padLeft10">
                                    <input id="itemName<?php echo $itemDivCount; ?>" name="itemName<?php echo $itemDivCount; ?>" type="text"
                                           placeholder="ITEM NAME / DETAILS" value="<?php echo $udhaarItmName; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                                       searchItemForPanelBlank(<?php echo $itemDivCount; ?>);
                                                       document.getElementById('udhaarItemPieces<?php echo $itemDivCount; ?>').focus();
                                                       return false;
                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                       searchItemForPanelBlank(<?php echo $itemDivCount; ?>);
                                                       document.getElementById('udhaarItemType<?php echo $itemDivCount; ?>').focus();
                                                       return false;
                                                   }"
                                           onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                                       searchItemNames(document.getElementById('itemName<?php echo $itemDivCount; ?>').value, document.getElementById('udhaarItemType<?php echo $itemDivCount; ?>').value, '<?php echo $itemDivCount; ?>', event.keyCode);
                                                   }" 
                                           onclick="searchItemForPanelBlank(<?php echo $itemDivCount; ?>);"
                                           autocomplete="on" spellcheck="false" class="input_border_grey textBoxCurve1px6rad" size="25" maxlength="800" style="width:100%;height:30px;"/>
                                    <div id="itemListDivToAddGirvi<?php echo $itemDivCount; ?>" class="itemListDivToAddGirvi<?php echo $itemDivCount; ?>"></div>
                                </td>
                                <td align="left" class="h414 padLeft10">
                                    <input id="udhaarItemPieces<?php echo $itemDivCount; ?>" name="udhaarItemPieces<?php echo $itemDivCount; ?>" 
                                           type="text" value="<?php echo $udhaarItmPieces; ?>"
                                           onfocus="if (this.value == '1') {
                                                       this.value = '';
                                                   }"
                                           onblur="if (this.value == '') {
                                                       this.value = '1';
                                                   }"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       document.getElementById('udhaarItemWeight<?php echo $itemDivCount; ?>').focus();
                                                       return false;
                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('itemName<?php echo $itemDivCount; ?>').focus();
                                                       return false;
                                                   }"
                                           spellcheck="false" class="textLabel14CalibriGreyMiddle textBoxCurve1px6rad" 
                                           size="2" maxlength="10" style="width:100%;height:30px;"/>
                                </td>
                                <td align="left" class="h414 padLeft10">
                                    <input id="udhaarItemWeight<?php echo $itemDivCount; ?>" name="udhaarItemWeight<?php echo $itemDivCount; ?>" 
                                           type="text"  value="<?php echo $udhaarGrossWeight; ?>"
                                           onfocus="if (this.value == 'GS Weight') {
                                                       this.value = '';
                                                   }"
                                           onblur="if (this.value == '') {
                                                       this.value = 'GS Weight';
                                                   }
                                                   if (this.value != '') {
                                                       document.getElementById('itemWeight<?php echo $itemDivCount; ?>').value = this.value;
                                                   }"
                                           placeholder="GS WT" 
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       document.getElementById('udhaarItemWeightType<?php echo $itemDivCount; ?>').focus();
                                                       return false;
                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('udhaarItemPieces<?php echo $itemDivCount; ?>').focus();
                                                       return false;
                                                   }"
                                           spellcheck="false" class="input_border_grey_center" size="7" maxlength="9" style="width:100%;height:30px;"/>
                                </td>
                                <td align="left">
                                    <div id="grossWeightTypeDiv" class="selectStyled">
                                        <select id="udhaarItemWeightType<?php echo $itemDivCount; ?>" name="udhaarItemWeightType<?php echo $itemDivCount; ?>" 
                                                onchange = "document.getElementById('weightType<?php echo $itemDivCount; ?>').value = this.value;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('udhaarItemVal<?php echo $itemDivCount; ?>').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('udhaarItemWeight<?php echo $itemDivCount; ?>').focus();
                                                            return false;
                                                        }" 
                                                class="select_border_grey" style="width:100%;height:30px;">
                                                    <?php
                                                    if ($panelName == 'UpdateUdhaar') {
                                                        $udhaarWtTyp = array(KG, GM, MG, CT);
                                                        for ($i = 0; $i <= 3; $i++)
                                                            if ($udhaarWtTyp[$i] == $udhaarGrossWeightType)
                                                                $optionUdhaarWtTypSel[$i] = 'selected';
                                                    } else {
                                                        $optionUdhaarWtTypSel[1] = 'selected';
                                                    }
                                                    ?>
                                            <option value="KG"<?php echo $optionUdhaarWtTypSel[0]; ?>>KG</option>
                                            <option value="GM"<?php echo $optionUdhaarWtTypSel[1]; ?>>GM</option>
                                            <option value="MG"<?php echo $optionUdhaarWtTypSel[2]; ?>>MG</option>
                                            <option value="CT"<?php echo $optionUdhaarWtTypSel[3]; ?>>CT</option>
                                            <?php $optionUdhaarWtTypSel = ''; ?>
                                        </select>
                                    </div>
                                </td>
                                <td align="left" class="h414 padLeft10">
                                    <input id="udhaarItemVal<?php echo $itemDivCount; ?>" name="udhaarItemVal<?php echo $itemDivCount; ?>" type="text" 
                                           placeholder="ITEM VALUATION" value="<?php echo $udhaarVal; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       document.getElementById('udhaarPayAccId').focus();
                                                       return false;
                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('udhaarItemWeightType<?php echo $itemDivCount; ?>').focus();
                                                       return false;
                                                   }"
                                           spellcheck="false" class="input_border_grey_center" size="12" maxlength="30" title="For other items valuation is mandatory!" style="width:100%;height:30px;"/>
                                </td>
                                <?php // if ($panelName != 'UpdateUdhaar' || ($panelName == 'UpdateUdhaar' && $noOfItems == $itemDivCount )) {     ?>
                                <td align="center" class="padLeft10">
                                    <a style="cursor: pointer;" onclick="if (document.getElementById('udhaarItemVar<?php echo $itemDivCount; ?>').value == '' || document.getElementById('udhaarItemVar<?php echo $itemDivCount; ?>').value == 'true')
                                                getMoreUdhaarItemDiv('<?php echo $itemDivCount + 1; ?>', 'UdhaarPanel')">
                                        <img src="<?php echo $documentRoot; ?>/images/img/add.png"  style="height:16px;" alt="Click Here To Add Crystal" class="marginTop5" <?php if ($itemDivCount > 1) { ?>onload="document.getElementById('udhaarItemType<?php echo $itemDivCount; ?>').focus();" <?php } ?>/>
                                    </a>
                                </td>
                                <?php
// }
//            if ($panelName != 'UpdateUdhaar') {
                                ?>
                                <td align="right"  width="20px">
                                    <?php if ($itemDivCount != 1 || $panelName == 'UpdateUdhaar') { ?>
                                        <a style="cursor: pointer;" onclick ="
                                        <?php if ($panelName == 'UpdateUdhaar') { ?>
                                                    closeSellCrystalFunc('<?php echo $itemDivCount; ?>', '<?php echo $panelName; ?>', '<?php echo $udhaarItemId; ?>', '<?php echo $udhaarId; ?>', '<?php echo $itprId; ?>', '<?php echo $wtId; ?>', '<?php echo $wtTypeId; ?>', '<?php echo $panelName; ?>');
                                        <?php } else { ?>
                                                    closeUdhaarItemDiv('<?php echo $itemDivCount; ?>', 'UdhaarPanel');
                                        <?php } ?>
                                           " >
                                            <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" alt="" class="marginTop5" style="height:18px"/>
                                        </a>
                                    <?php } ?>
                                </td>
                                <?php // }    ?>
                            </tr>
                        </table>
                    </div>
                    <div id = "addUdhaarItemDiv<?php echo $itemDivCount + 1; ?>"></div>
                    <!--<div class="hrGold"></div>-->
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4" align="center">
                <table border="0" cellpadding="2" cellspacing="0" align="center" width="100%" valign="top" class="paddingLeft40" style="background: #ffebee;border: 1px dashed #ff6d6d;">
                    <tr>
                        <td align="left" valign="top">
                            <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top" width="100%">
                                <tr>
                                    <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                       <span class="fontRprt">PAYMENT TYPE</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" width="33.33%">
                                        <div id="selAccountDiv">
                                            <table border="0" cellpadding="1" cellspacing="0" align="left" valign="top" width="100%">
                                                <!------Start code to change function @Author:PRIYA04APR14------------>
                                                <tr>
                                                    <td align="left" valign="top">
                                                        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%">
                                                            <tr>
                                                                <td align="right" class="ff_calibri fs_14 brown"><b>DR</b></td>
                                                                <td align="left" class="padLeft5">
                                                                    <div id="selAccountDiv" class="selectStyled textLabel14CalibriGrey" style="border:0;">
                                                                        <?php
                                                                        if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                                            $selFirmId = $_SESSION['setFirmSession'];
                                                                        } else {
                                                                            $selFirmId = $firmId;
                                                                        }
                                                                        $prevFieldId = 'udhaarType';
                                                                        $nextFieldId = 'udhaarDrAccId';
                                                                        $selAccountId = 'udhaarPayAccId';
                                                                        if ($panelName == 'UpdateUdhaar' || $_REQUEST['changeInv'] != '') {
                                                                            $selAccountName = "'Loans','Current Assets','Current Liabilities'";
                                                                            $accIdSelected = $utin_dr_acc_id;
                                                                        } else {
                                                                            $selAccountName = "'Loans','Current Assets','Current Liabilities'";
                                                                            $accNameSelected = 'Sundry Debtors';
                                                                               if($user_type == 'SUPPLIER')
                                                                                 {
                                                                                $accNameSelected = 'Sundry Creditors';
                                                                                //---------------------------------- End code for change data from customer table to user table Author@:SANT14JAN16---------------------------------------------------------------->                                                                              
                                                                                $accIdSelected = $utin_cr_acc_id;
                                                                                 }else{
                                                                                  $accNameSelected = 'Sundry Debtors';
                                                                                  $accIdSelected = $utin_cr_acc_id;   
                                                                                 }
                                                                        }
                                                                        $selAccountClass = 'textLabel14CalibriGrey';
                                                                        include 'omacsalt.php';
                                                                        ?>
                                                                    </div>  
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top">
                                                        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%">
                                                            <tr>
                                                                <td align="right" class="ff_calibri fs_14 brown"><b>CR</b></td>
                                                                <td align="left" class="padLeft5">
                                                                    <div id="selAccountDiv" class="selectStyled textLabel14CalibriGrey" style="border:0;">
                                                                        <?php
                                                                        if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                                            $selFirmId = $_SESSION['setFirmSession'];
                                                                        } else {
                                                                            $selFirmId = $firmId;
                                                                        }
                                                                        $nextFieldId = 'udhaarPayOtherInfo';
                                                                        $prevFieldId = 'udhaarPayAccId';
                                                                        $selAccountId = 'udhaarDrAccId';
                                                                        if ($panelName == 'UpdateUdhaar') {
                                                                            $selAccountName = "'Current Assets','Sales Accounts'";
                                                                            $accIdSelected = $utin_cr_acc_id;
                                                                        } else {
                                                                            $selAccountName = "'Current Assets','Sales Accounts'";
                                                                            $accNameSelected = 'Cash in Hand';
                                                                        }
                                                                        $selAccountClass = 'textLabel14CalibriGrey';
                                                                        include 'omacsalt.php';
                                                                        ?>
                                                                    </div>
                                                                </td> 
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td align="left" valign="top" width="33.33%">
                            <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top" class="paddingLeft20" width="100%">
                                <tr>
                                    <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                       <span class="fontRprt">PAYMENT OTHER INFORMATION &nbsp;</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" class="frm-r1"><textarea id="udhaarPayOtherInfo"  name="udhaarPayOtherInfo" 
                                                                              onkeydown="javascript:if (event.keyCode == 13) {
                                                                                          document.getElementById('udhaarOtherInfo').focus();
                                                                                          return false;
                                                                                      } else if (event.keyCode == 8 && this.value == '') {
                                                                                          document.getElementById('udhaarChequeNo').focus();
                                                                                          return false;
                                                                                      }"
                                                                              spellcheck="false" placeholder="PAYMENT OTHER INFORMATION"
                                                                              class="textarea" style="width:100%; height:65px;border:solid 1px #a3a3a3;box-shadow: none; "><?php echo $utin_paym_oth_info; ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td align="left" valign="top" width="33.33%">
                            <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top" class="paddingLeft20" width="100%">
                                <tr>
                                    <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                        <span class="fontRprt">OTHER INFORMATION &nbsp;</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" class="frm-r1"><textarea id="udhaarOtherInfo" 
                                                                              spellcheck="false" name="udhaarOtherInfo" placeholder="OTHER INFORMATION"
                                                                              onkeydown="javascript:if (event.keyCode == 13) {
                                                                                          document.getElementById('udhaarSubmit').focus();
                                                                                          return false;
                                                                                      } else if (event.keyCode == 8 && this.value == '') {
                                                                                          document.getElementById('udhaarPayOtherInfo').focus();
                                                                                          return false;

                                                                                      }"
                                                                              class="textarea" style="width:100%; height:65px;border:solid 1px #a3a3a3;box-shadow: none;"><?php echo $utin_other_info; ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--<tr><td>&nbsp;</td></tr>-->
        <tr>
            <td align="center" valign="top" colspan="4">
                <div id="addUdhaarSubButDiv">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center">
                                <?php
//$visibility = 'style="visibility:visible;"';
//if ($utin_transaction_type == 'OnPurchase')
//$visibility = 'style="visibility:visible;"';
                                ?>
                                <input type="button" value="<?php
                                if ($panelName == 'UpdateUdhaar') {
                                    echo 'QUICK UPDATE';
                                } else {
                                    echo 'QUICK SUBMIT';
                                }
                                ?>" id="directudhaarSubmit" name="directudhaarSubmit" <?php echo $visibility; ?>
                                       class="btn btn1 btn1Hover"  style="border-radius: 5px !important;margin: 10px auto;width: 120px;height: 30px;font-weight: bold;font-size: 15px;text-align: center;color:#006400;background-color:#B6F6B6;"
                                       maxlength="30" size="15"
                                       onclick=" //alert(document.getElementById('DOBDay').value); 
                                               // alert(document.getElementById('udhaaramount').value);
                                               var isvalid = addNewUdhaarDetails(document.getElementById('add_udhaar_details'));

                                               if (isvalid)
                                               {
                                                   if (document.getElementById('udhaaramount') == null) {
                                                       document.getElementById('add_udhaar_details').submit();
                                                   } else {
                                                       if ((parseFloat(document.getElementById('udhaaramount').value) <= parseFloat(document.getElementById('udhaarMainAmount').value))) {
                                                           document.getElementById('add_udhaar_details').submit();
                                                       } else {
                                                           alert('UDHAAR AMOUNT SHOULD BE GREATER THAN UDHAAR DEPSOIT AMOUNT');
                                                           return false;
                                                       }
                                                   }

                                               }"/>
                                &nbsp;&nbsp;

                                <input type="button" value="<?php
                                if ($panelName == 'UpdateUdhaar') {
                                    echo 'UPDATE PAYMENT OPTION';
                                } else {
                                    echo 'PAYMENT OPTION';
                                }
                                ?>"    id="udhaarSubmit" name="udhaarSubmit"
                                       class="btn btn1 btn1Hover" style="border-radius: 5px !important;border:1px solid  #BED8FD;margin: 10px auto;width: 122px;height: 30px;font-weight: bold;font-size: 15px;text-align: center;color: #000080;background-color: #BED8FD;"
                                       maxlength="30" size="15"
                                       onclick="//alert(document.getElementById('DOBDay').value); 
                                                //alert(document.getElementById('udhaaramount').value);
                                                
                                               var isvalid = addNewUdhaarDetails(document.getElementById('add_udhaar_details'));

                                               if (isvalid)
                                               {
                                                   if ((document.getElementById('udhaarType').value == 'OnPurchase') || 
                                                       (document.getElementById('udhaarType').value != 'OnPurchase')) {

                                                       if (document.getElementById('udhaaramount') == null) {
                                                           showAddUdhaarDepositMoneyPaymentDiv('<?php echo "$custId"; ?>', '', document.getElementById('udhaarMainAmount').value, '', document.getElementById('udhharFirmId').value, document.getElementById('udhaarPreSerialNo').value, document.getElementById('udhaarSerialNo').value, document.getElementById('DOBDay').value, document.getElementById('DOBMonth').value, document.getElementById('DOBYear').value, document.getElementById('endDOBDay').value, document.getElementById('endDOBMonth').value, document.getElementById('endDOBYear').value, document.getElementById('udhaarType').value, document.getElementById('udhaarOtherInfo').value, document.getElementById('udhaarPayAccId').value, '', '<?php echo $udhaarId; ?>');
                                                       } else {
                                                           if ((parseFloat(document.getElementById('udhaaramount').value) <= parseFloat(document.getElementById('udhaarMainAmount').value))) {
                                                               showAddUdhaarDepositMoneyPaymentDiv('<?php echo "$custId"; ?>', '', document.getElementById('udhaarMainAmount').value, '', document.getElementById('udhharFirmId').value, document.getElementById('udhaarPreSerialNo').value, document.getElementById('udhaarSerialNo').value, document.getElementById('DOBDay').value, document.getElementById('DOBMonth').value, document.getElementById('DOBYear').value, document.getElementById('endDOBDay').value, document.getElementById('endDOBMonth').value, document.getElementById('endDOBYear').value, document.getElementById('udhaarType').value, document.getElementById('udhaarOtherInfo').value, document.getElementById('udhaarPayAccId').value, '', '<?php echo $udhaarId; ?>');
                                                           } else {
                                                               alert('UDHAAR AMOUNT SHOULD BE GREATER THAN UDHAAR DEPSOIT AMOUNT');
                                                               return false;
                                                           }
                                                       }
                                                       
                                                   } else {
                                                   
                                                       if (document.getElementById('udhaaramount') == null) {
                                                           document.getElementById('add_udhaar_details').submit();
                                                       } else {
                                                           if ((parseFloat(document.getElementById('udhaaramount').value) <= parseFloat(document.getElementById('udhaarMainAmount').value))) {
                                                               document.getElementById('add_udhaar_details').submit();
                                                           } else {
                                                               alert('UDHAAR AMOUNT SHOULD BE GREATER THAN UDHAAR DEPSOIT AMOUNT');
                                                               return false;
                                                           }
                                                       }

                                                   }

                                               }"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>

        </tr>


        </table>
    </form>
</div>
<!--<hr color="#B8860B" />-->
<!------Start code to Add div and also add some code @Author:ANUJA15MAR16--------------->  
<table style="padding-left:25px">
    <tr align="right">
        <td align="right" colspan="14">

            <div id='udharPaymentPanel'>

            </div>
        </td>
    </tr>
</table>