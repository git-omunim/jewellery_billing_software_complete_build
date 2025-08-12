<!-- START CODE TO DISPLAY UDHAAR/ADVANCE/USER/ORDER DETAILS ON HOME PAGE @AUTHOUR:MADHUREE-01JULY20201 -->
<?php
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
//
$showTopFiveDetailsquery = "SELECT omly_value FROM omlayout o WHERE omly_option = 'showTopFiveDetails'";
$showTopFiveDetailsquery_run = mysqli_query($conn, $showTopFiveDetailsquery)or die("Error: " . mysqli_error($conn) . " with query " . $showTopFiveDetailsquery);
$showTopFiveDetailsresult = mysqli_fetch_array($showTopFiveDetailsquery_run);
$showTopFiveDetails = $showTopFiveDetailsresult['omly_value'];
//
//<!--START CODE FOR ADD STAFF ACCESS FOR SHOW/HIDE TOP 5 CUSTOMER HOME PAGE DETAILS @SIMRAN:3JAN2023-->
if ($staffId == '' || ($staffId && $array['homePageTopFiveDetailsAccess'] == 'true')) {
if ($showTopFiveDetails == 'NO') {
    $style = "none";
} else {
    $style = "";
}

//
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    // if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    // Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
?>
<?php
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-02-12-2022************************
////**********************************************************************************************************************************
$queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat' order by omly_id desc LIMIT 0,1";
$engmonformat = mysqli_query($conn, $queryengmonformat);
$rowengmonformat = mysqli_fetch_array($engmonformat);
$englishMonthFormat = $rowengmonformat['omly_value'];
//echo '$englishMonthFormat:' . $englishMonthFormat;
//
if ($englishMonthFormat == '') {
    $query = "INSERT INTO omlayout(omly_own_id, omly_option, omly_value) VALUES ('$sessionOwnerId', 'englishMonthformat', 'displayinword');";
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-02-12-2022************************
////**********************************************************************************************************************************
//************************************************************************************************************************************
//***********************START CODE TO GET NEPALI  DATE INDICATOR VALUE@RENUKA SHARMA-02-12-2022************************
////**********************************************************************************************************************************
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
$selNepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resNepaliDateMonthFormat = mysqli_query($conn, $selNepaliDateMonthFormat);
$rowNepaliDateMonthFormat = mysqli_fetch_array($resNepaliDateMonthFormat);
$nepaliDateMonthFormat = $rowNepaliDateMonthFormat['omly_value'];
//

?>
<tr>
    <td width="100%" style="font-size: 16px; font-weight: bold; color: #fff;">
        <?php
        if (($_SESSION['sessionProdName'] != 'OMRETL') && (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer)) {
            ?>
            <table width="100%" style="display:<?php echo $style ?>">
                <tr>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Udhaar Details
                            </div>
                            <div class="card-body" id="topFiveDetails">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopUdhaar = "SELECT * FROM user_transaction_invoice AS u LEFT JOIN user AS t ON u.utin_user_id=user_id "
                                                . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) "
                                                . "WHERE u.utin_owner_id='$_SESSION[sessionOwnerId]' AND (((c.utin_cash_balance>0)"
                                                . "and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) "
                                                . "and (c.utin_cash_balance>0))) and (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') "
                                                . "and (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) and u.utin_firm_id IN ($strFrmId) ORDER BY CAST(u.utin_cash_balance as unsigned) DESC LIMIT 0,5";
                                        $resTopUdhaar = mysqli_query($conn, $qTopUdhaar);
                                        $noOfTopUdhaar = mysqli_num_rows($resTopUdhaar);
                                        if ($noOfTopUdhaar > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="37%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                                <th width="17%" style="border-bottom:1px solid #feb937;text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $udharCounter = 1;
                                            $totalInterestAmt = 0;
                                            while (($rowTopUdhaar = mysqli_fetch_array($resTopUdhaar, MYSQLI_ASSOC)) ||
                                            $udharCounter <= 5) {
                                                //
                                                if ($rowTopUdhaar['utin_id'] != '') {
                                                    //
                                                    $invno = $rowTopUdhaar['utin_pre_invoice_no'] . $rowTopUdhaar['utin_invoice_no'];
                                                    //
                                                    //echo 'utin_id == ' . $rowTopUdhaar['utin_id'] . '<br />';
                                                    //
                                                    //$udhaarAmt = $rowTopUdhaar['utin_total_amt'];
                                                    //
                                                    //$udhaarAmt = $rowTopUdhaar['utin_cash_balance'];
                                                    //
                                                    //echo '$udhaarAmt == ' . $udhaarAmt . '<br />';
                                                    //
                                                    if ($udhaarDepAmount == NULL || $udhaarDepAmount == '')
                                                        $udhaarDepAmount = $rowTopUdhaar['utin_cash_amt_rec'] + $rowTopUdhaar['utin_pay_cheque_amt'] + ($rowTopUdhaar['utin_pay_card_amt'] + $rowTopUdhaar['utin_pay_trans_chrg']) + ($rowTopUdhaar['utin_online_pay_amt'] - $rowTopUdhaar['utin_pay_comm_paid']);
                                                    //
                                                    //echo '$udhaarDepAmount == ' . $udhaarDepAmount . '<br />';
                                                    //
                                                    $utin_utin_id = $rowTopUdhaar['utin_id'];
                                                    //
                                                    parse_str(getTableValues("SELECT SUM(utin_udhaar_int_amt) AS udhaar_int_amt FROM user_transaction_invoice "
                                                                    . "WHERE utin_utin_id = '$utin_utin_id'"));
                                                    //
                                                    parse_str(getTableValues("SELECT utin_date AS udhaarDepDOB FROM user_transaction_invoice "
                                                                    . "WHERE utin_utin_id = '$utin_utin_id' "
                                                                    . "ORDER BY utin_id ASC LIMIT 0,1"));
                                                    //
                                                    //echo 'utin_date == ' . $rowTopUdhaar['utin_date'] . '<br />';
                                                    //echo '$udhaarDepDOB == ' . $udhaarDepDOB . '<br />';
                                                    //
                                                    if ($udhaarDepDOB == null || $udhaarDepDOB == '') {
                                                        $girviNewDOB = $rowTopUdhaar['utin_date'];
                                                    } else {
                                                        $girviNewDOB = $udhaarDepDOB;
                                                    }
                                                    //
                                                    //
                                                    //echo '$girviNewDOB == ' . $girviNewDOB . '<br />';
                                                    //
                                                    //
                                                    //echo '$utin_udhaar_int_amt 1== ' . $utin_udhaar_int_amt . '<br />';
                                                    //
                                                    //$udhaarIntAmount = $rowTopUdhaar['utin_udhaar_int_amt']; 
                                                    //
                                                    //
                                                    //if ($udhaarDepAmount > 0) {
                                                    $udhaarAmt = $rowTopUdhaar['utin_cash_balance'];
                                                    $udhaarIntAmount = $udhaar_int_amt;
                                                    $udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //} else {
                                                    //    $udhaarAmt = $rowTopUdhaar['utin_total_amt'];
                                                    //    $udhaarIntAmount = $rowTopUdhaar['utin_udhaar_int_amt']; 
                                                    //    $udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //}
                                                    //
                                                    //
                                                    //$udhaarIntAmount = $udhaar_int_amt; 
                                                    //
                                                    //echo '$udhaarIntAmount == ' . $udhaarIntAmount . '<br />';
                                                    //
                                                    //$udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //
                                                    $udhaarAmtLeft = $udhaarAmt;
                                                    //
                                                    //echo '$udhaarAmtLeft == ' . $udhaarAmtLeft . '<br />';
                                                    //
                                                    //$udhaarDepDOB = $rowTopUdhaar['utin_date'];
                                                    //
                                                    $udhaarIntChk = $rowTopUdhaar['utin_udhaar_int_chk'];
                                                    //       
                                                    //echo '$udhaarIntChk == ' . $udhaarIntChk . '<br />';
                                                    //
                                                    if ($udhaarIntChk == 'true') {
                                                        $ROI = $rowTopUdhaar['utin_udhaar_roi']; // UDHAAR ROI
                                                        $princAmount = $udhaarAmtLeft;
                                                        $ROIType = $rowTopUdhaar['utin_udhaar_int_type']; // UDHAAR ROI TYPE
                                                        //
                                                        //$girviNewDOB = $udhaarDepDOB; 
                                                        //
                                                        //$IROI = $ROI;
                                                        //
                                                        // ADDED CODE FOR INTEREST CAL BY DAYS @PRIYANKA-20JULY2022
                                                        if ($rowTopUdhaar['utin_udhaar_int_type'] == 'Days') {
                                                            //
                                                            $IROI = $ROI;
                                                            $ROIType = 'Monthly';
                                                            $gMonthIntOption = 'DD';
                                                            $_POST['gMonthIntOption'] = 'DD';
                                                            //
                                                        }
                                                        //
                                                        if ($rowTopUdhaar['utin_udhaar_int_type'] == 'Monthly') {
                                                            //
                                                            $IROI = $ROI;
                                                            $ROIType = 'Monthly';
                                                            $gMonthIntOption = 'FM';
                                                            $_POST['gMonthIntOption'] = 'FM';
                                                            //
                                                        }
                                                        //
                                                        //echo '<br/><br/>$ROIType !@@!: ' . $ROIType;
                                                        //echo '<br/><br/>$gMonthIntOption !@@!: ' . $gMonthIntOption;
                                                        //echo '<br/><br/>';
                                                        //
                                                        include 'ommpgvip.php';
                                                        //
                                                    }
                                                    //
                                                    //echo '$totalFinalInterest == ' . $totalFinalInterest . '<br />';
                                                    //echo '$udhaarIntAmount == ' . $udhaarIntAmount . '<br />';
                                                    //
                                                    if ($udhaarIntChk == 'true') {

                                                        if (($totalFinalInterest - $udhaarIntAmount) > 0) {
                                                            $totalInterestAmt = ($totalFinalInterest - $udhaarIntAmount);
                                                        } else {
                                                            $totalInterestAmt = ($totalFinalInterest);
                                                        }

                                                        //$totalInterestAmt = ($totalFinalInterest - $udhaarIntAmount);
                                                    } else {
                                                        $totalInterestAmt = 0;
                                                    }
                                                    //
                                                    //echo '$totalInterestAmt == ' . $totalInterestAmt . '<br />';
                                                    //
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="showCustUdhaarDetails('<?php echo $rowTopUdhaar['utin_id'] ?>', '<?php echo $rowTopUdhaar['utin_user_id'] ?>');">
                                                                    <?php
                                                                    echo $invno;
                                                                    ?> 
                                                                </a>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopUdhaar['utin_other_lang_date'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopUdhaar['utin_other_lang_date'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopUdhaar['utin_other_lang_date']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopUdhaar['utin_date']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopUdhaar['utin_date'])));
                                                                    }
//****************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022************************************************
//****************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                    if(preg_match("/^[a-zA-Z]$/", substr($rowTopUdhaar['user_fname'], 0, 1)) && preg_match("/^[a-zA-Z]$/", substr($rowTopUdhaar['user_lname'], 0, 1))){
                                                                       $userName = om_strtoupper($rowTopUdhaar['user_fname']) . ' ' . om_strtoupper($rowTopUdhaar['user_lname']);
                                                                    } else {
                                                                        $userName = $rowTopUdhaar['user_fname'] . ' ' . $rowTopUdhaar['user_lname'];
                                                                    }
                                                                
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($userName, 0, 50);
                                                                } else {
                                                                    echo substr($userName, 0, 48);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopUdhaar['user_mobile'] != '') {
                                                                    echo $rowTopUdhaar['user_mobile'];
                                                                } else if ($rowTopUdhaar['user_phone'] != '') {
                                                                    echo $rowTopUdhaar['user_phone'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-right: 5px;color: red;">
                                                                <?php
                                                                echo number_format(($rowTopUdhaar['utin_cash_balance'] + $totalInterestAmt), 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-right: 5px;color: red;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $udharCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top: 1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;border-bottom: 1px dashed #efb653">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717; font-size: 19px;background:#faf3e7;border-bottom: 1px dashed #efb653;">
                                <i class="fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Advance Details
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopAdvance = "SELECT * FROM user_transaction_invoice AS u LEFT JOIN user AS t ON u.utin_user_id=t.user_id "
                                                . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) "
                                                . "WHERE u.utin_owner_id='$_SESSION[sessionOwnerId]' and u.utin_firm_id IN ($strFrmId) AND ((c.utin_cash_balance<0) and "
                                                . "(u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','RECEIPT'))) OR ((u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))"
                                                . " and (c.utin_cash_balance<0)) and u.utin_status NOT IN ('deleted','Deleted','DELETED') "
                                                . "and (u.utin_status NOT IN ('Paid') or u.utin_status IS NULL) ORDER BY CAST(ABS(u.utin_cash_balance) as unsigned) DESC LIMIT 0,5";
                                        $resTopAdvance = mysqli_query($conn, $qTopAdvance);
                                        $noOfTopAdvance = mysqli_num_rows($resTopAdvance);
                                        if ($noOfTopAdvance > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="37%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                                <th width="17%" style="border-bottom:1px solid #feb937;text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $advCounter = 1;
                                            while (($rowTopAdvance = mysqli_fetch_array($resTopAdvance, MYSQLI_ASSOC)) || $advCounter <= 5) {
                                                if ($rowTopAdvance['utin_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="showCustadvMoneyDetails('<?php echo $rowTopAdvance['utin_id'] ?>', '<?php echo $rowTopAdvance['utin_user_id'] ?>', '');">
                                                                    <?php
                                                                    echo $rowTopAdvance['utin_pre_invoice_no'] . $rowTopAdvance['utin_invoice_no'];
                                                                    ?> 
                                                                </a>


                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopAdvance['utin_other_lang_date'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopAdvance['utin_other_lang_date'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopAdvance['utin_other_lang_date']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopAdvance['utin_date']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopAdvance['utin_date'])));
                                                                    }
//****************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022************************************************
//****************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>

                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if(preg_match("/^[a-zA-Z]$/", substr($rowTopAdvance['user_fname'], 0, 1)) && preg_match("/^[a-zA-Z]$/", substr($rowTopAdvance['user_lname'], 0, 1))){
                                                                       $userName = om_strtoupper($rowTopAdvance['user_fname']) . ' ' . om_strtoupper($rowTopAdvance['user_lname']);
                                                                    } else {
                                                                        $userName = $rowTopAdvance['user_fname'] . ' ' . $rowTopAdvance['user_lname'];
                                                                    }
//                                                                $userName = om_strtoupper($rowTopAdvance['user_fname']) . ' ' . om_strtoupper($rowTopAdvance['user_lname']);
                                                                  
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($userName, 0, 50);
                                                                } else {
                                                                    echo substr($userName, 0, 48);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopAdvance['user_mobile'] != '') {
                                                                    echo $rowTopAdvance['user_mobile'];
                                                                } else if ($rowTopAdvance['user_phone'] != '') {
                                                                    echo $rowTopAdvance['user_phone'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo number_format(abs($rowTopAdvance['utin_cash_balance']), 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $advCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);padding: 5px;">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717; font-size: 19px;background:#faf3e7;border-bottom: 1px dashed #efb653;">
                                <i class="fa fa-user" style="color:#E56717;"></i> &nbsp; Top 5 Customers  
                                <span style="float: right;font-weight: normal;font-size: 14px;color: black;margin-top: 8px;font-weight: 600;">
                                    (Transaction Wise)
                                </span>
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0" border="0">
                                        <?php
                                        $todayDOBMonth = om_strtoupper(date(M));
                                        //
                                        $currentFinancialDay = '01';
                                        $currentFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $currentFinancialYear = date(Y) - 1;
                                        } else {
                                            $currentFinancialYear = date(Y);
                                        }
                                        //
                                        $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
                                        //
                                        $nextFinancialDay = '01';
                                        $nextFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $nextFinancialYear = date(Y);
                                        } else {
                                            $nextFinancialYear = date(Y) + 1;
                                        }
                                        //
                                        $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
                                        //
                                        $currentFinancialYearDateStr = strtotime($currentFinancialYearDate);
                                        $nextFinancialYearDateStr = strtotime($nextFinancialYearDate);

                                        $utin_date_str = " AND $currentFinancialYearDateStr <= UNIX_TIMESTAMP(STR_TO_DATE(u.utin_date,'%d %b %Y')) "
                                                . " AND UNIX_TIMESTAMP(STR_TO_DATE(u.utin_date,'%d %b %Y')) < $nextFinancialYearDateStr ";
                                        //
                                        $qTopCustomers = "SELECT SUM(utin_cash_balance),user_father_name,utin_user_id,user_fname,user_lname,user_mobile,user_mobile1,user_phone,user_city"
                                                . " FROM user_transaction_invoice AS u INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_type='CUSTOMER' WHERE u.utin_owner_id='$_SESSION[sessionOwnerId]' "
                                                . "AND u.utin_firm_id IN ($strFrmId) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED') OR u.utin_status IS NULL) AND u.utin_type NOT IN ('OnPurchase') $utin_date_str"
                                                . "GROUP BY utin_user_id ORDER BY SUM(u.utin_cash_balance) DESC LIMIT 0,5";
                                        $resTopCustomers = mysqli_query($conn, $qTopCustomers);
                                        $noOfTopCustomers = mysqli_num_rows($resTopCustomers);
                                        if ($noOfTopCustomers > 0) {
                                            ?>
                                            <tr>
                                                <th width="35%" align="left" style="border-bottom: 1px solid #feb937">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="25%" align="left" style="border-bottom:1px solid #feb937">
                                                    <span style="padding-left: 5px;">
                                                        MIDDLE NAME
                                                    </span>
                                                </th>
                                                <th width="22%" align="left" style="border-bottom:1px solid #feb937">
                                                    <span style="padding-left: 5px;">
                                                        CITY
                                                    </span>
                                                </th>
                                                <th width="20%" align="right" style="border-bottom: 1px solid #feb937;text-align: right;">
                                                    <span style="padding-right: 5px;text-align: right;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $custCounter = 1;
                                            while (($rowTopCustomers = mysqli_fetch_array($resTopCustomers, MYSQLI_ASSOC)) || $custCounter <= 5) {
                                                if ($rowTopCustomers['utin_user_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') { ?>
                                                                    <a style="cursor: pointer;color:blue;font-size:14px;;" onclick="userAllOrderListNavFunc('1667', '<?php echo $rowTopCustomers['utin_user_id'] ?>', 'custAllTrans');">
                                                                        <?php
                                                                    if(preg_match("/^[a-zA-Z]$/", substr($rowTopCustomers['user_fname'], 0, 1)) && preg_match("/^[a-zA-Z]$/", substr($rowTopCustomers['user_lname'], 0, 1))){
                                                                       echo substr(om_strtoupper($rowTopCustomers['user_fname']) . ' ' . om_strtoupper($rowTopCustomers['user_lname']), 0, 50);;
                                                                    } else {
                                                                        echo  $rowTopCustomers['user_fname'] . ' ' . $rowTopCustomers['user_lname'];
                                                                    }
                                                                    
//                                                                        echo substr(om_strtoupper($rowTopCustomers['user_fname']) . ' ' . om_strtoupper($rowTopCustomers['user_lname']), 0, 21); ?>
                                                                    </a>    
                                                                    <?php
                                                                } else {
                                                                    echo substr(om_strtoupper($rowTopCustomers['user_fname']) . ' ' . om_strtoupper($rowTopCustomers['user_lname']), 0, 50);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $middleNameLabel = substr(om_strtoupper($rowTopCustomers['user_father_name']), 0, 2);
                                                                if (substr(om_strtoupper($rowTopCustomers['user_father_name']), 1, 13) != '') {
                                                                    if ($middleNameLabel == 'S') {
                                                                        echo 'S/o : ';
                                                                    } if ($middleNameLabel == 'D') {
                                                                        echo 'D/o : ';
                                                                    } else if ($middleNameLabel == 'W') {
                                                                        echo 'W/o : ';
                                                                    } else if ($middleNameLabel == 'C') {
                                                                        echo 'C/o : ';
                                                                    } else if ($middleNameLabel == 'M') {
                                                                        echo 'M/o : ';
                                                                    }
                                                                    //
                                                                    if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                        echo substr(om_strtoupper($rowTopCustomers['user_father_name']), 1, 13);
                                                                    } else {
                                                                        echo substr(om_strtoupper($rowTopCustomers['user_father_name']), 1, 30);
                                                                    }
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    //echo substr(om_strtoupper($rowTopCustomers['user_city']), 0, 13);
                                                                    if (preg_match("/^[a-zA-Z]$/", substr(om_strtoupper($rowTopCustomers['user_city']), 0, 13))) {
                                                                echo substr(om_strtoupper($rowTopCustomers['user_city']), 0, 13);
                                                                '</b>';
                                                            } else {
                                                                echo $rowTopCustomers['user_city'];
                                                            }
                                                             
                                                                } else {
                                                                    //echo substr(om_strtoupper($rowTopCustomers['user_city']), 0, 30);
                                                                    if (preg_match("/^[a-zA-Z]$/", substr(om_strtoupper($rowTopCustomers['user_city']), 0, 30))) {
                                                                echo substr(om_strtoupper($rowTopCustomers['user_city']), 0, 30);
                                                                '</b>';
                                                            } else {
                                                                echo $rowTopCustomers['user_city'];
                                                            }
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="padding-right: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopCustomers['user_mobile'] != '') {
                                                                    echo $rowTopCustomers['user_mobile'];
                                                                } else if ($rowTopCustomers['user_phone'] != '') {
                                                                    echo $rowTopCustomers['user_phone'];
                                                                } else if ($rowTopCustomers['user_mobile1'] != '') {
                                                                    echo $rowTopCustomers['user_mobile1'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="padding-right: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $custCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717; font-size: 19px;background:#faf3e7;border-bottom: 1px dashed #feb937;">
                                <i class="fa fa-user" style="color:#E56717;"></i> &nbsp; Top 5 Customers
                                <span style="float: right;font-weight: normal;font-size: 14px;color: black;margin-top: 8px;font-weight: 600;">
                                    (Loan Wise)
                                </span>
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $todayDOBMonth = om_strtoupper(date(M));
                                        //
                                        $currentFinancialDay = '01';
                                        $currentFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $currentFinancialYear = date(Y) - 1;
                                        } else {
                                            $currentFinancialYear = date(Y);
                                        }
                                        //
                                        $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
                                        //
                                        $nextFinancialDay = '01';
                                        $nextFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $nextFinancialYear = date(Y);
                                        } else {
                                            $nextFinancialYear = date(Y) + 1;
                                        }
                                        //
                                        $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
                                        //
                                        $currentFinancialYearDateStr = strtotime($currentFinancialYearDate);
                                        $nextFinancialYearDateStr = strtotime($nextFinancialYearDate);

                                        $utin_date_str = " $currentFinancialYearDateStr <= UNIX_TIMESTAMP(STR_TO_DATE(g.girv_DOB,'%d %b %Y')) "
                                                . " AND UNIX_TIMESTAMP(STR_TO_DATE(g.girv_DOB,'%d %b %Y')) < $nextFinancialYearDateStr ";
                                        //
                                        $qTopCustomersByLoan = "SELECT SUM(girv_prin_amt),user_father_name,girv_cust_id,user_fname,user_lname,user_mobile,user_mobile1,user_phone,user_city"
                                                . " FROM girvi AS g INNER JOIN user AS u ON g.girv_cust_id=u.user_id WHERE $utin_date_str and girv_firm_id IN ($strFrmId) GROUP BY girv_cust_id ORDER BY SUM(girv_prin_amt) DESC LIMIT 0,5";
                                        $resTopCustomersByLoan = mysqli_query($conn, $qTopCustomersByLoan);
                                        $noOfTopCustomersByLoan = mysqli_num_rows($resTopCustomersByLoan);
                                        if ($noOfTopCustomersByLoan > 0) {
                                            ?>
                                            <tr>
                                                <th width="35%" align="left" style="border-bottom:1px solid #feb937;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="25%" align="left" style="border-bottom:1px solid #feb937;">
                                                    <span style="padding-left: 5px;">
                                                        MIDDLE NAME
                                                    </span>
                                                </th>
                                                <th width="20%" align="left" style="border-bottom:1px solid #feb937;">
                                                    <span style="padding-left: 5px;">
                                                        CITY
                                                    </span>
                                                </th>
                                                <th width="20%" align="right" style="border-bottom:1px solid #feb937;;text-align: right;">
                                                    <span style="padding-right: 5px;text-align: right;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $custByLoanCounter = 1;
                                            while (($rowTopCustomersByLoan = mysqli_fetch_array($resTopCustomersByLoan, MYSQLI_ASSOC)) || $custByLoanCounter <= 5) {
                                                if ($rowTopCustomersByLoan['girv_cust_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    ?>   <a style="cursor: pointer;color:blue;font-size:14px;;" onclick="navigatationPanelByFileName('mainBigMiddle', 'omcdccdd', 'CustHome', '', '', '', '', '', '<?php echo $rowTopCustomersByLoan['girv_cust_id'] ?>');">
                                                                    <?php 
                                                                   if(preg_match("/^[a-zA-Z]$/", substr($rowTopCustomersByLoan['user_fname'], 0, 1)) && preg_match("/^[a-zA-Z]$/", substr($rowTopCustomersByLoan['user_lname'], 0, 1))){
                                                                       echo substr(om_strtoupper($rowTopCustomersByLoan['user_fname']) . ' ' . om_strtoupper($rowTopCustomersByLoan['user_lname']), 0, 50);;
                                                                    } else {
                                                                        echo  $rowTopCustomersByLoan['user_fname'] . ' ' . $rowTopCustomersByLoan['user_lname'];
                                                                    }
                                                                    
//                                                                    echo substr(om_strtoupper($rowTopCustomersByLoan['user_fname']) . ' ' . om_strtoupper($rowTopCustomersByLoan['user_lname']), 0, 24); ?>
                                                                    </a>  
                                                                    <?php
                                                                } else {
                                                                    echo substr(om_strtoupper($rowTopCustomersByLoan['user_fname']) . ' ' . om_strtoupper($rowTopCustomersByLoan['user_lname']), 0, 50);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $middleNameLabel = substr(om_strtoupper($rowTopCustomersByLoan['user_father_name']), 0, 2);
                                                                if (substr(om_strtoupper($rowTopCustomersByLoan['user_father_name']), 1, 13) != '') {
                                                                    if ($middleNameLabel == 'S') {
                                                                        echo 'S/o : ';
                                                                    } if ($middleNameLabel == 'D') {
                                                                        echo 'D/o : ';
                                                                    } else if ($middleNameLabel == 'W') {
                                                                        echo 'W/o : ';
                                                                    } else if ($middleNameLabel == 'C') {
                                                                        echo 'C/o : ';
                                                                    } else if ($middleNameLabel == 'M') {
                                                                        echo 'M/o : ';
                                                                    }
                                                                    //
                                                                    if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                        echo substr(om_strtoupper($rowTopCustomersByLoan['user_father_name']), 1, 13);
                                                                    } else {
                                                                        echo substr(om_strtoupper($rowTopCustomersByLoan['user_father_name']), 1, 30);
                                                                    }
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    //echo substr(om_strtoupper($rowTopCustomersByLoan['user_city']), 0, 14);
                                                             $user_city=$rowTopCustomersByLoan['user_city'];
                                                             if (preg_match("/^[a-zA-Z]$/", substr($user_city, 0, 14))) {
                                                                echo om_strtoupper(substr($user_city, 1));
                                                                '</b>';
                                                            } else {
                                                                echo $user_city;
                                                            }
        
                                                                } else {
                                                                    //echo substr(om_strtoupper($rowTopCustomersByLoan['user_city']), 0, 30);
                                                                    $user_city=$rowTopCustomersByLoan['user_city'];
                                                             if (preg_match("/^[a-zA-Z]$/", substr($user_city, 0, 30))) {
                                                                echo om_strtoupper(substr($user_city, 1));
                                                                '</b>';
                                                            } else {
                                                                echo $user_city;
                                                            }
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-right: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopCustomersByLoan['user_mobile'] != '') {
                                                                    echo $rowTopCustomersByLoan['user_mobile'];
                                                                } else if ($rowTopCustomersByLoan['user_phone'] != '') {
                                                                    echo $rowTopCustomersByLoan['user_phone'];
                                                                } else if ($rowTopCustomersByLoan['user_mobile1'] != '') {
                                                                    echo $rowTopCustomersByLoan['user_mobile1'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-right: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $custByLoanCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius: 5px !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;border-top: 1px dashed #efb653;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-list" style="color:#E56717;"></i> &nbsp; Top 5 Orders
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopOrder = "SELECT * FROM stock_transaction AS s INNER JOIN user AS t ON s.sttr_user_id=user_id "
                                                . "WHERE s.sttr_owner_id='$_SESSION[sessionOwnerId]' AND s.sttr_transaction_type = 'newOrder' "
                                                . "AND s.sttr_status IN('PaymentDone') and sttr_firm_id IN ($strFrmId) ORDER BY s.sttr_final_valuation DESC LIMIT 0,5";
                                        $resTopOrder = mysqli_query($conn, $qTopOrder);
                                        $noOfTopOrder = mysqli_num_rows($resTopOrder);
                                        if ($noOfTopOrder > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="37%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom:1px solid #feb937;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                                <th width="17%" style="border-bottom:1px solid #feb937;text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $orderCounter = 1;
                                            while (($rowTopOrder = mysqli_fetch_array($resTopOrder, MYSQLI_ASSOC)) || $orderCounter <= 5) {
                                                if ($rowTopOrder['sttr_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="userAllOrderListNavFunc('<?php echo $rowTopOrder['sttr_id'] ?>', '<?php echo $rowTopOrder['user_id'] ?>', 'newOrderPendingList', '', '', '', '');">
                                                                    <?php
                                                                    echo $rowTopOrder['sttr_pre_invoice_no'] . $rowTopOrder['sttr_invoice_no'];
                                                                    ?> 
                                                                </a>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px">
                                                            <span style="font-weight: normal;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopOrder['sttr_add_date'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopOrder['sttr_add_date'];
                                                                } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopOrder['sttr_other_lang_add_date']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopOrder['sttr_add_date']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopOrder['sttr_add_date'])));
                                                                    }
//****************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022************************************************
//****************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $userName = om_strtoupper($rowTopOrder['user_fname']) . ' ' . om_strtoupper($rowTopOrder['user_lname']);
                                                                if (preg_match("/^[a-zA-Z]$/", om_strtoupper($rowTopOrder['user_fname']) . ' ' . om_strtoupper($rowTopOrder['user_lname']))) {
                                                                echo om_strtoupper($rowTopOrder['user_fname']) . ' ' . om_strtoupper($rowTopOrder['user_lname']);
                                                                
                                                            } else {
                                                                echo $rowTopOrder['user_fname'] . ' ' . $rowTopOrder['user_lname'];
                                                            }
                                                                
//                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
//                                                                    echo substr($userName, 0, 23);
//                                                                } else {
//                                                                    echo substr($userName, 0, 48);
//                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopOrder['user_mobile'] != '') {
                                                                    echo $rowTopOrder['user_mobile'];
                                                                } else if ($rowTopOrder['user_phone'] != '') {
                                                                    echo $rowTopOrder['user_phone'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-right: 5px;color: red;">
                                                                <?php
                                                                echo substr(number_format($rowTopOrder['sttr_final_valuation'], 2), 0, 10);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $orderCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;border-top: 1px dashed #efb653;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717; font-size: 19px;background:#faf3e7;border-bottom: 1px dashed #efb653;">
                                <i class="fa fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Expenses
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopExpense = "SELECT * FROM transaction WHERE transaction_upd_sts IN ('New','Updated') and transaction_pre_vch_firm_id IN ($strFrmId) and transaction_trans_id IS NULL ORDER BY CAST(transaction_amt as unsigned) DESC LIMIT 0,5";
                                        $resTopExpense = mysqli_query($conn, $qTopExpense);
                                        $noOfTopExpense = mysqli_num_rows($resTopExpense);
                                        if ($noOfTopExpense > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom:1px solid #feb937;;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom:1px solid #feb937;;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="36%" style="border-bottom:1px solid #feb937;;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        TRANSACTION SUBJECT
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom:1px solid #feb937;;text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        CATEGORY
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom:1px solid #feb937;;text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $expenseCounter = 1;
                                            while (($rowTopExpense = mysqli_fetch_array($resTopExpense, MYSQLI_ASSOC)) || $expenseCounter <= 5) {
                                                if ($rowTopExpense['transaction_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="navigatationPanelByFileName('mainBigMiddle', 'omtatrnd', 'DailyTransactions', '', '', '', '', '', '<?php echo $rowTopExpense['transaction_user_id'] ?>');">
                                                                    <?php
                                                                    echo $rowTopExpense['transaction_pre_vch_id'] . $rowTopExpense['transaction_post_vch_id'];
                                                                    ?>
                                                                </a>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="font-weight: normal;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopExpense['transaction_other_lang_DOB'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopExpense['transaction_other_lang_DOB'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopExpense['transaction_other_lang_DOB']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopExpense['transaction_DOB']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopExpense['transaction_DOB'])));
                                                                    }
//***************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022***********************************************
//***************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="36%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $subject = om_strtoupper($rowTopExpense['transaction_sub']);
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($subject, 0, 24);
                                                                } else {
                                                                    echo substr($subject, 0, 50);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo om_strtoupper($rowTopExpense['transaction_cat']);
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-right: 5px;color: #0000FF;">
                                                                <?php
                                                                echo number_format($rowTopExpense['transaction_amt'], 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="36%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);padding:5px;">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $expenseCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <?php
        } else if (($_SESSION['sessionProdName'] != 'OMRETL') && ((($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer) ||
                (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer))) {
            ?>
            <table width="100%" style="display:<?php echo $style ?>">
                <tr>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius: 5px !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Udhaar Details
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopUdhaar = "SELECT * FROM user_transaction_invoice AS u LEFT JOIN user AS t ON u.utin_user_id=user_id "
                                                . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) "
                                                . "WHERE u.utin_owner_id='$_SESSION[sessionOwnerId]' and u.utin_firm_id IN ($strFrmId) AND (((c.utin_cash_balance>0)"
                                                . "and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT'))"
                                                . " and (c.utin_cash_balance>0))) and (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') "
                                                . "and (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY CAST(u.utin_cash_balance as unsigned) DESC LIMIT 0,5";
                                        $resTopUdhaar = mysqli_query($conn, $qTopUdhaar);
                                        $noOfTopUdhaar = mysqli_num_rows($resTopUdhaar);
                                        if ($noOfTopUdhaar > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="37%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                                <th width="17%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $udharCounter = 1;
                                            $totalInterestAmt = 0;
                                            while (($rowTopUdhaar = mysqli_fetch_array($resTopUdhaar, MYSQLI_ASSOC)) || $udharCounter <= 5) {
                                                if ($rowTopUdhaar['utin_id'] != '') {
                                                    //
                                                    //echo 'utin_id == ' . $rowTopUdhaar['utin_id'] . '<br />';
                                                    //
                                                    //$udhaarAmt = $rowTopUdhaar['utin_total_amt'];
                                                    //
                                                    //$udhaarAmt = $rowTopUdhaar['utin_cash_balance'];
                                                    //
                                                    //echo '$udhaarAmt == ' . $udhaarAmt . '<br />';
                                                    //
                                                    if ($udhaarDepAmount == NULL || $udhaarDepAmount == '')
                                                        $udhaarDepAmount = $rowTopUdhaar['utin_cash_amt_rec'] + $rowTopUdhaar['utin_pay_cheque_amt'] + ($rowTopUdhaar['utin_pay_card_amt'] + $rowTopUdhaar['utin_pay_trans_chrg']) + ($rowTopUdhaar['utin_online_pay_amt'] - $rowTopUdhaar['utin_pay_comm_paid']);
                                                    //
                                                    //echo '$udhaarDepAmount == ' . $udhaarDepAmount . '<br />';
                                                    //
                                                    $utin_utin_id = $rowTopUdhaar['utin_id'];
                                                    //
                                                    parse_str(getTableValues("SELECT SUM(utin_udhaar_int_amt) AS udhaar_int_amt FROM user_transaction_invoice "
                                                                    . "WHERE utin_utin_id = '$utin_utin_id'"));
                                                    //
                                                    parse_str(getTableValues("SELECT utin_date AS udhaarDepDOB FROM user_transaction_invoice "
                                                                    . "WHERE utin_utin_id = '$utin_utin_id' "
                                                                    . "ORDER BY utin_id ASC LIMIT 0,1"));
                                                    //
                                                    //echo 'utin_date == ' . $rowTopUdhaar['utin_date'] . '<br />';
                                                    //echo '$udhaarDepDOB == ' . $udhaarDepDOB . '<br />';
                                                    //
                                                    if ($udhaarDepDOB == null || $udhaarDepDOB == '') {
                                                        $girviNewDOB = $rowTopUdhaar['utin_date'];
                                                    } else {
                                                        $girviNewDOB = $udhaarDepDOB;
                                                    }
                                                    //
                                                    //
                                                    //echo '$girviNewDOB == ' . $girviNewDOB . '<br />';
                                                    //
                                                    //
                                                    //echo '$utin_udhaar_int_amt 1== ' . $utin_udhaar_int_amt . '<br />';
                                                    //
                                                    //$udhaarIntAmount = $rowTopUdhaar['utin_udhaar_int_amt']; 
                                                    //
                                                    //
                                                    //if ($udhaarDepAmount > 0) {
                                                    $udhaarAmt = $rowTopUdhaar['utin_cash_balance'];
                                                    $udhaarIntAmount = $udhaar_int_amt;
                                                    $udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //} else {
                                                    //    $udhaarAmt = $rowTopUdhaar['utin_total_amt'];
                                                    //    $udhaarIntAmount = $rowTopUdhaar['utin_udhaar_int_amt']; 
                                                    //    $udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //}
                                                    //
                                                    //
                                                    //$udhaarIntAmount = $udhaar_int_amt; 
                                                    //
                                                    //echo '$udhaarIntAmount == ' . $udhaarIntAmount . '<br />';
                                                    //
                                                    //$udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //
                                                    $udhaarAmtLeft = $udhaarAmt;
                                                    //
                                                    //echo '$udhaarAmtLeft == ' . $udhaarAmtLeft . '<br />';
                                                    //
                                                    //$udhaarDepDOB = $rowTopUdhaar['utin_date'];
                                                    //
                                                    $udhaarIntChk = $rowTopUdhaar['utin_udhaar_int_chk'];
                                                    //       
                                                    //echo '$udhaarIntChk == ' . $udhaarIntChk . '<br />';
                                                    //
                                                    if ($udhaarIntChk == 'true') {
                                                        $ROI = $rowTopUdhaar['utin_udhaar_roi']; // UDHAAR ROI
                                                        $princAmount = $udhaarAmtLeft;
                                                        $ROIType = $rowTopUdhaar['utin_udhaar_int_type']; // UDHAAR ROI TYPE
                                                        //
                                                        //$girviNewDOB = $udhaarDepDOB; 
                                                        //
                                                        //$IROI = $ROI;
                                                        //
                                                        // ADDED CODE FOR INTEREST CAL BY DAYS @PRIYANKA-20JULY2022
                                                        if ($rowTopUdhaar['utin_udhaar_int_type'] == 'Days') {
                                                            //
                                                            $IROI = $ROI;
                                                            $ROIType = 'Monthly';
                                                            $gMonthIntOption = 'DD';
                                                            $_POST['gMonthIntOption'] = 'DD';
                                                            //
                                                        }
                                                        //
                                                        if ($rowTopUdhaar['utin_udhaar_int_type'] == 'Monthly') {
                                                            //
                                                            $IROI = $ROI;
                                                            $ROIType = 'Monthly';
                                                            $gMonthIntOption = 'FM';
                                                            $_POST['gMonthIntOption'] = 'FM';
                                                            //
                                                        }
                                                        //
                                                        //echo '<br/><br/>$ROIType !@@!: ' . $ROIType;
                                                        //echo '<br/><br/>$gMonthIntOption !@@!: ' . $gMonthIntOption;
                                                        //echo '<br/><br/>';
                                                        //
                                                        include 'ommpgvip.php';
                                                        //
                                                    }
                                                    //
                                                    //echo '$totalFinalInterest == ' . $totalFinalInterest . '<br />';
                                                    //echo '$udhaarIntAmount == ' . $udhaarIntAmount . '<br />';
                                                    //
                                                    if ($udhaarIntChk == 'true') {

                                                        if (($totalFinalInterest - $udhaarIntAmount) > 0) {
                                                            $totalInterestAmt = ($totalFinalInterest - $udhaarIntAmount);
                                                        } else {
                                                            $totalInterestAmt = ($totalFinalInterest);
                                                        }

                                                        //$totalInterestAmt = ($totalFinalInterest - $udhaarIntAmount);
                                                    } else {
                                                        $totalInterestAmt = 0;
                                                    }
                                                    //
                                                    //echo '$totalInterestAmt == ' . $totalInterestAmt . '<br />';
                                                    //
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">

                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="showCustUdhaarDetails('<?php echo $rowTopUdhaar['utin_id'] ?>', '<?php echo $rowTopUdhaar['utin_user_id'] ?>');">
                                                                    <?php
                                                                    echo $invno;
                                                                    ?> 
                                                                </a>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopUdhaar['utin_other_lang_date'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopUdhaar['utin_other_lang_date'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopUdhaar['utin_other_lang_date']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopUdhaar['utin_date']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopUdhaar['utin_date'])));
                                                                    }
//***************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022***********************************************
//***************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $userName = om_strtoupper($rowTopUdhaar['user_fname']) . ' ' . om_strtoupper($rowTopUdhaar['user_lname']);
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($userName, 0, 23);
                                                                } else {
                                                                    echo substr($userName, 0, 48);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopUdhaar['user_mobile'] != '') {
                                                                    echo $rowTopUdhaar['user_mobile'];
                                                                } else if ($rowTopUdhaar['user_phone'] != '') {
                                                                    echo $rowTopUdhaar['user_phone'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: red;">
                                                                <?php
                                                                echo number_format(($rowTopUdhaar['utin_cash_balance'] + $totalInterestAmt), 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: red;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $udharCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Advance Details
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopAdvance = "SELECT * FROM user_transaction_invoice AS u LEFT JOIN user AS t ON u.utin_user_id=t.user_id "
                                                . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) "
                                                . "WHERE u.utin_owner_id='$_SESSION[sessionOwnerId]' and u.utin_firm_id IN ($strFrmId) AND ((c.utin_cash_balance<0) and "
                                                . "(u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','RECEIPT'))) OR ((u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))"
                                                . " and (c.utin_cash_balance<0)) and u.utin_status NOT IN ('deleted','Deleted','DELETED') "
                                                . "and (u.utin_status NOT IN ('Paid') or u.utin_status IS NULL) ORDER BY CAST(ABS(u.utin_cash_balance) as unsigned) DESC LIMIT 0,5";
                                        $resTopAdvance = mysqli_query($conn, $qTopAdvance);
                                        $noOfTopAdvance = mysqli_num_rows($resTopAdvance);
                                        if ($noOfTopAdvance > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="37%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                                <th width="17%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $advCounter = 1;
                                            while (($rowTopAdvance = mysqli_fetch_array($resTopAdvance, MYSQLI_ASSOC)) || $advCounter <= 5) {
                                                if ($rowTopAdvance['utin_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="showCustadvMoneyDetails('<?php echo $rowTopAdvance['utin_id'] ?>', '<?php echo $rowTopAdvance['utin_user_id'] ?>', '');">
                                                                    <?php
                                                                    echo $rowTopAdvance['utin_pre_invoice_no'] . $rowTopAdvance['utin_invoice_no'];
                                                                    ?> 
                                                                </a>


                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopAdvance['utin_other_lang_date'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopAdvance['utin_other_lang_date'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopAdvance['utin_other_lang_date']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopAdvance['utin_date']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopAdvance['utin_date'])));
                                                                    }
//***************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022***********************************************
//***************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>

                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $userName = om_strtoupper($rowTopAdvance['user_fname']) . ' ' . om_strtoupper($rowTopAdvance['user_lname']);
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($userName, 0, 23);
                                                                } else {
                                                                    echo substr($userName, 0, 48);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopAdvance['user_mobile'] != '') {
                                                                    echo $rowTopAdvance['user_mobile'];
                                                                } else if ($rowTopAdvance['user_phone'] != '') {
                                                                    echo $rowTopAdvance['user_phone'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo number_format(abs($rowTopAdvance['utin_cash_balance']), 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $advCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius: 5px !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-user" style="color:#E56717;"></i> &nbsp; Top 5 Customers
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $todayDOBMonth = om_strtoupper(date(M));
                                        //
                                        $currentFinancialDay = '01';
                                        $currentFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $currentFinancialYear = date(Y) - 1;
                                        } else {
                                            $currentFinancialYear = date(Y);
                                        }
                                        //
                                        $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
                                        //
                                        $nextFinancialDay = '01';
                                        $nextFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $nextFinancialYear = date(Y);
                                        } else {
                                            $nextFinancialYear = date(Y) + 1;
                                        }
                                        //
                                        $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
                                        //
                                        $currentFinancialYearDateStr = strtotime($currentFinancialYearDate);
                                        $nextFinancialYearDateStr = strtotime($nextFinancialYearDate);

                                        $utin_date_str = " $currentFinancialYearDateStr <= UNIX_TIMESTAMP(STR_TO_DATE(g.girv_DOB,'%d %b %Y')) "
                                                . " AND UNIX_TIMESTAMP(STR_TO_DATE(g.girv_DOB,'%d %b %Y')) < $nextFinancialYearDateStr ";
                                        //
                                        $qTopCustomersByLoan = "SELECT SUM(girv_prin_amt),user_father_name,girv_cust_id,user_fname,user_lname,user_mobile,user_mobile1,user_phone,user_city"
                                                . " FROM girvi AS g INNER JOIN user AS u ON g.girv_cust_id=u.user_id WHERE $utin_date_str and girv_firm_id IN ($strFrmId) GROUP BY girv_cust_id ORDER BY SUM(girv_prin_amt) DESC LIMIT 0,5";
                                        $resTopCustomersByLoan = mysqli_query($conn, $qTopCustomersByLoan);
                                        $noOfTopCustomersByLoan = mysqli_num_rows($resTopCustomersByLoan);
                                        if ($noOfTopCustomersByLoan > 0) {
                                            ?>
                                            <tr>
                                                <th width="40%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="30%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        MIDDLE NAME
                                                    </span>
                                                </th>
                                                <th width="20%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        CITY
                                                    </span>
                                                </th>
                                                <th width="16%" align="right" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $custByLoanCounter = 1;
                                            while (($rowTopCustomersByLoan = mysqli_fetch_array($resTopCustomersByLoan, MYSQLI_ASSOC)) || $custByLoanCounter <= 5) {
                                                if ($rowTopCustomersByLoan['girv_cust_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <td width="40%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr(om_strtoupper($rowTopCustomersByLoan['user_fname']) . ' ' . om_strtoupper($rowTopCustomersByLoan['user_lname']), 0, 24);
                                                                } else {
                                                                    echo substr(om_strtoupper($rowTopCustomersByLoan['user_fname']) . ' ' . om_strtoupper($rowTopCustomersByLoan['user_lname']), 0, 50);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="30%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $middleNameLabel = substr(om_strtoupper($rowTopCustomersByLoan['user_father_name']), 0, 2);
                                                                if (substr(om_strtoupper($rowTopCustomersByLoan['user_father_name']), 1, 13) != '') {
                                                                    if ($middleNameLabel == 'S') {
                                                                        echo 'S/o : ';
                                                                    } if ($middleNameLabel == 'D') {
                                                                        echo 'D/o : ';
                                                                    } else if ($middleNameLabel == 'W') {
                                                                        echo 'W/o : ';
                                                                    } else if ($middleNameLabel == 'C') {
                                                                        echo 'C/o : ';
                                                                    } else if ($middleNameLabel == 'M') {
                                                                        echo 'M/o : ';
                                                                    }
                                                                    //
                                                                    if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                        echo substr(om_strtoupper($rowTopCustomersByLoan['user_father_name']), 1, 13);
                                                                    } else {
                                                                        echo substr(om_strtoupper($rowTopCustomersByLoan['user_father_name']), 1, 30);
                                                                    }
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="20%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr(om_strtoupper($rowTopCustomersByLoan['user_city']), 0, 14);
                                                                } else {
                                                                    echo substr(om_strtoupper($rowTopCustomersByLoan['user_city']), 0, 30);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="10%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopCustomersByLoan['user_mobile'] != '') {
                                                                    echo $rowTopCustomersByLoan['user_mobile'];
                                                                } else if ($rowTopCustomersByLoan['user_phone'] != '') {
                                                                    echo $rowTopCustomersByLoan['user_phone'];
                                                                } else if ($rowTopCustomersByLoan['user_mobile1'] != '') {
                                                                    echo $rowTopCustomersByLoan['user_mobile1'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="40%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="30%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="20%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="10%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $custByLoanCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Expenses
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopExpense = "SELECT * FROM transaction WHERE transaction_upd_sts IN ('New','Updated') and transaction_pre_vch_firm_id IN ($strFrmId) and transaction_trans_id IS NULL ORDER BY CAST(transaction_amt as unsigned) DESC LIMIT 0,5";
                                        $resTopExpense = mysqli_query($conn, $qTopExpense);
                                        $noOfTopExpense = mysqli_num_rows($resTopExpense);
                                        if ($noOfTopExpense > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="36%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        TRANSACTION SUBJECT
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        CATEGORY
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $expenseCounter = 1;
                                            while (($rowTopExpense = mysqli_fetch_array($resTopExpense, MYSQLI_ASSOC)) || $expenseCounter <= 5) {
                                                if ($rowTopExpense['transaction_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo $rowTopExpense['transaction_pre_vch_id'] . $rowTopExpense['transaction_post_vch_id'];
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopExpense['transaction_other_lang_DOB'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopExpense['transaction_other_lang_DOB'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopExpense['transaction_other_lang_DOB']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopExpense['transaction_DOB']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopExpense['transaction_DOB'])));
                                                                    }
//***************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022***********************************************
//***************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="36%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $subject = om_strtoupper($rowTopExpense['transaction_sub']);
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($subject, 0, 25);
                                                                } else {
                                                                    echo substr($subject, 0, 50);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo om_strtoupper($rowTopExpense['transaction_cat']);
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: #0000FF;">
                                                                <?php
                                                                echo number_format($rowTopExpense['transaction_amt'], 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="36%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $expenseCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <?php
        } else if (($_SESSION['sessionProdName'] != 'OMRETL') && (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $_SESSION['sessionProdVer'] == $globalKeyProdVer)) {
            ?>
            <table width="100%" style="display:<?php echo $style ?>">
                <tr>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Udhaar Details
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopUdhaar = "SELECT * FROM user_transaction_invoice AS u LEFT JOIN user AS t ON u.utin_user_id=user_id "
                                                . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) "
                                                . "WHERE u.utin_owner_id='$_SESSION[sessionOwnerId]' and u.utin_firm_id IN ($strFrmId) AND (((c.utin_cash_balance>0)"
                                                . "and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT'))"
                                                . " and (c.utin_cash_balance>0))) and (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') "
                                                . "and (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY CAST(u.utin_cash_balance as unsigned) DESC LIMIT 0,5";
                                        $resTopUdhaar = mysqli_query($conn, $qTopUdhaar);
                                        $noOfTopUdhaar = mysqli_num_rows($resTopUdhaar);
                                        if ($noOfTopUdhaar > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="37%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                                <th width="17%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $udharCounter = 1;
                                            $totalInterestAmt = 0;
                                            while (($rowTopUdhaar = mysqli_fetch_array($resTopUdhaar, MYSQLI_ASSOC)) || $udharCounter <= 5) {
                                                if ($rowTopUdhaar['utin_id'] != '') {
                                                    //
                                                    //echo 'utin_id == ' . $rowTopUdhaar['utin_id'] . '<br />';
                                                    //
                                                    //$udhaarAmt = $rowTopUdhaar['utin_total_amt'];
                                                    //
                                                    //$udhaarAmt = $rowTopUdhaar['utin_cash_balance'];
                                                    //
                                                    //echo '$udhaarAmt == ' . $udhaarAmt . '<br />';
                                                    //
                                                    if ($udhaarDepAmount == NULL || $udhaarDepAmount == '')
                                                        $udhaarDepAmount = $rowTopUdhaar['utin_cash_amt_rec'] + $rowTopUdhaar['utin_pay_cheque_amt'] + ($rowTopUdhaar['utin_pay_card_amt'] + $rowTopUdhaar['utin_pay_trans_chrg']) + ($rowTopUdhaar['utin_online_pay_amt'] - $rowTopUdhaar['utin_pay_comm_paid']);
                                                    //
                                                    //echo '$udhaarDepAmount == ' . $udhaarDepAmount . '<br />';
                                                    //
                                                    $utin_utin_id = $rowTopUdhaar['utin_id'];
                                                    //
                                                    parse_str(getTableValues("SELECT SUM(utin_udhaar_int_amt) AS udhaar_int_amt FROM user_transaction_invoice "
                                                                    . "WHERE utin_utin_id = '$utin_utin_id'"));
                                                    //
                                                    parse_str(getTableValues("SELECT utin_date AS udhaarDepDOB FROM user_transaction_invoice "
                                                                    . "WHERE utin_utin_id = '$utin_utin_id' "
                                                                    . "ORDER BY utin_id ASC LIMIT 0,1"));
                                                    //
                                                    //echo 'utin_date == ' . $rowTopUdhaar['utin_date'] . '<br />';
                                                    //echo '$udhaarDepDOB == ' . $udhaarDepDOB . '<br />';
                                                    //
                                                    if ($udhaarDepDOB == null || $udhaarDepDOB == '') {
                                                        $girviNewDOB = $rowTopUdhaar['utin_date'];
                                                    } else {
                                                        $girviNewDOB = $udhaarDepDOB;
                                                    }
                                                    //
                                                    //
                                                    //echo '$girviNewDOB == ' . $girviNewDOB . '<br />';
                                                    //
                                                    //
                                                    //echo '$utin_udhaar_int_amt 1== ' . $utin_udhaar_int_amt . '<br />';
                                                    //
                                                    //$udhaarIntAmount = $rowTopUdhaar['utin_udhaar_int_amt']; 
                                                    //
                                                    //
                                                    //if ($udhaarDepAmount > 0) {
                                                    $udhaarAmt = $rowTopUdhaar['utin_cash_balance'];
                                                    $udhaarIntAmount = $udhaar_int_amt;
                                                    $udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //} else {
                                                    //    $udhaarAmt = $rowTopUdhaar['utin_total_amt'];
                                                    //    $udhaarIntAmount = $rowTopUdhaar['utin_udhaar_int_amt']; 
                                                    //    $udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //}
                                                    //
                                                    //
                                                    //$udhaarIntAmount = $udhaar_int_amt; 
                                                    //
                                                    //echo '$udhaarIntAmount == ' . $udhaarIntAmount . '<br />';
                                                    //
                                                    //$udhaarAmtLeft = $udhaarAmt - $udhaarIntAmount;
                                                    //
                                                    $udhaarAmtLeft = $udhaarAmt;
                                                    //
                                                    //echo '$udhaarAmt == ' . $udhaarAmt . '<br />';
                                                    //echo '$udhaarAmtLeft == ' . $udhaarAmtLeft . '<br />';
                                                    //
                                                    //$udhaarDepDOB = $rowTopUdhaar['utin_date'];
                                                    //
                                                    $udhaarIntChk = $rowTopUdhaar['utin_udhaar_int_chk'];
                                                    //       
                                                    //echo '$udhaarIntChk == ' . $udhaarIntChk . '<br />';
                                                    //
                                                    if ($udhaarIntChk == 'true') {
                                                        $ROI = $rowTopUdhaar['utin_udhaar_roi']; // UDHAAR ROI
                                                        $princAmount = $udhaarAmtLeft;
                                                        $ROIType = $rowTopUdhaar['utin_udhaar_int_type']; // UDHAAR ROI TYPE
                                                        //
                                                        //$girviNewDOB = $udhaarDepDOB; 
                                                        //
                                                        //$IROI = $ROI;
                                                        //
                                                        // ADDED CODE FOR INTEREST CAL BY DAYS @PRIYANKA-20JULY2022
                                                        if ($rowTopUdhaar['utin_udhaar_int_type'] == 'Days') {
                                                            //
                                                            $IROI = $ROI;
                                                            $ROIType = 'Monthly';
                                                            $gMonthIntOption = 'DD';
                                                            $_POST['gMonthIntOption'] = 'DD';
                                                            //
                                                        }
                                                        //
                                                        if ($rowTopUdhaar['utin_udhaar_int_type'] == 'Monthly') {
                                                            //
                                                            $IROI = $ROI;
                                                            $ROIType = 'Monthly';
                                                            $gMonthIntOption = 'FM';
                                                            $_POST['gMonthIntOption'] = 'FM';
                                                            //
                                                        }
                                                        //
                                                        //echo '<br/><br/>$ROIType !@@!: ' . $ROIType;
                                                        //echo '<br/><br/>$gMonthIntOption !@@!: ' . $gMonthIntOption;
                                                        //echo '<br/><br/>';
                                                        //
                                                        include 'ommpgvip.php';
                                                        //
                                                    }
                                                    //
                                                    //echo '$totalFinalInterest == ' . $totalFinalInterest . '<br />';
                                                    //echo '$udhaarIntAmount == ' . $udhaarIntAmount . '<br />';
                                                    //
                                                    if ($udhaarIntChk == 'true') {

                                                        if (($totalFinalInterest - $udhaarIntAmount) > 0) {
                                                            $totalInterestAmt = ($totalFinalInterest - $udhaarIntAmount);
                                                        } else {
                                                            $totalInterestAmt = ($totalFinalInterest);
                                                        }

                                                        //$totalInterestAmt = ($totalFinalInterest - $udhaarIntAmount);
                                                    } else {
                                                        $totalInterestAmt = 0;
                                                    }
                                                    //
                                                    //echo '$totalInterestAmt == ' . $totalInterestAmt . '<br />';
                                                    //
                                                    ?>
                                                    <!--**********************************************************************************-->
                                                    <!--ADDED CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                    <!--**********************************************************************************-->       
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="showCustUdhaarDetails('<?php echo $rowTopUdhaar['utin_id'] ?>', '<?php echo $rowTopUdhaar['utin_user_id'] ?>');">
                                                                    <?php
                                                                    echo $rowTopUdhaar['utin_pre_invoice_no'] . $rowTopUdhaar['utin_invoice_no'];
                                                                    ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopUdhaar['utin_other_lang_date'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopUdhaar['utin_other_lang_date'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopUdhaar['utin_other_lang_date']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopUdhaar['utin_date']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopUdhaar['utin_date'])));
                                                                    }
//***************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022***********************************************
//***************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $userName = om_strtoupper($rowTopUdhaar['user_fname']) . ' ' . om_strtoupper($rowTopUdhaar['user_lname']);
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($userName, 0, 23);
                                                                } else {
                                                                    echo substr($userName, 0, 48);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopUdhaar['user_mobile'] != '') {
                                                                    echo $rowTopUdhaar['user_mobile'];
                                                                } else if ($rowTopUdhaar['user_phone'] != '') {
                                                                    echo $rowTopUdhaar['user_phone'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: red;">
                                                                <?php
                                                                echo number_format(($rowTopUdhaar['utin_cash_balance'] + $totalInterestAmt), 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <!--**********************************************************************************-->
                                                    <!--END CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                    <!--**********************************************************************************-->  
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: red;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $udharCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Advance Details
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopAdvance = "SELECT * FROM user_transaction_invoice AS u LEFT JOIN user AS t ON u.utin_user_id=t.user_id "
                                                . "LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) "
                                                . "WHERE u.utin_owner_id='$_SESSION[sessionOwnerId]' and u.utin_firm_id IN ($strFrmId) AND ((c.utin_cash_balance<0) and "
                                                . "(u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','RECEIPT'))) OR ((u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))"
                                                . " and (c.utin_cash_balance<0)) and u.utin_status NOT IN ('deleted','Deleted','DELETED') "
                                                . "and (u.utin_status NOT IN ('Paid') or u.utin_status IS NULL) ORDER BY CAST(ABS(u.utin_cash_balance) as unsigned) DESC LIMIT 0,5";
                                        $resTopAdvance = mysqli_query($conn, $qTopAdvance);
                                        $noOfTopAdvance = mysqli_num_rows($resTopAdvance);
                                        if ($noOfTopAdvance > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="37%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                                <th width="17%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $advCounter = 1;
                                            while (($rowTopAdvance = mysqli_fetch_array($resTopAdvance, MYSQLI_ASSOC)) || $advCounter <= 5) {
                                                if ($rowTopAdvance['utin_id'] != '') {
                                                    ?>

                                                    <tr>
                                                        <!--**********************************************************************************-->
                                                        <!--ADDED CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="showCustadvMoneyDetails('<?php echo $rowTopAdvance['utin_id'] ?>', '<?php echo $rowTopAdvance['utin_user_id'] ?>', '');">
                                                                    <?php
                                                                    echo $rowTopAdvance['utin_pre_invoice_no'] . $rowTopAdvance['utin_invoice_no'];
                                                                    ?>
                                                            </span>
                                                        </td>
                                                        <!--**********************************************************************************-->
                                                        <!--END CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo $rowTopAdvance['utin_date'];
                                                                ?>
                                                            </span>
                                                        </td>

                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $userName = om_strtoupper($rowTopAdvance['user_fname']) . ' ' . om_strtoupper($rowTopAdvance['user_lname']);
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($userName, 0, 23);
                                                                } else {
                                                                    echo substr($userName, 0, 48);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopAdvance['user_mobile'] != '') {
                                                                    echo $rowTopAdvance['user_mobile'];
                                                                } else if ($rowTopAdvance['user_phone'] != '') {
                                                                    echo $rowTopAdvance['user_phone'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo number_format(abs($rowTopAdvance['utin_cash_balance']), 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $advCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius: 5px !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-user" style="color:#E56717;"></i> &nbsp; Top 5 Customers
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $todayDOBMonth = om_strtoupper(date(M));
                                        //
                                        $currentFinancialDay = '01';
                                        $currentFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $currentFinancialYear = date(Y) - 1;
                                        } else {
                                            $currentFinancialYear = date(Y);
                                        }
                                        //
                                        $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
                                        //
                                        $nextFinancialDay = '01';
                                        $nextFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $nextFinancialYear = date(Y);
                                        } else {
                                            $nextFinancialYear = date(Y) + 1;
                                        }
                                        //
                                        $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
                                        //
                                        $currentFinancialYearDateStr = strtotime($currentFinancialYearDate);
                                        $nextFinancialYearDateStr = strtotime($nextFinancialYearDate);

                                        $utin_date_str = " AND $currentFinancialYearDateStr <= UNIX_TIMESTAMP(STR_TO_DATE(u.utin_date,'%d %b %Y')) "
                                                . " AND UNIX_TIMESTAMP(STR_TO_DATE(u.utin_date,'%d %b %Y')) < $nextFinancialYearDateStr ";
                                        //
                                        $qTopCustomers = "SELECT SUM(utin_cash_balance),user_father_name,utin_user_id,user_fname,user_lname,user_mobile,user_mobile1,user_phone,user_city"
                                                . " FROM user_transaction_invoice AS u INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_type='CUSTOMER' WHERE u.utin_owner_id='$_SESSION[sessionOwnerId]' "
                                                . "and u.utin_firm_id IN ($strFrmId) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED') OR u.utin_status IS NULL) AND u.utin_type NOT IN ('OnPurchase') $utin_date_str"
                                                . "GROUP BY utin_user_id ORDER BY SUM(u.utin_cash_balance) DESC LIMIT 0,5";
                                        $resTopCustomers = mysqli_query($conn, $qTopCustomers);
                                        $noOfTopCustomers = mysqli_num_rows($resTopCustomers);
                                        if ($noOfTopCustomers > 0) {
                                            ?>
                                            <tr>
                                                <th width="40%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="30%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        MIDDLE NAME
                                                    </span>
                                                </th>
                                                <th width="20%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        CITY
                                                    </span>
                                                </th>
                                                <th width="16%" align="right" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $custCounter = 1;
                                            while (($rowTopCustomers = mysqli_fetch_array($resTopCustomers, MYSQLI_ASSOC)) || $custCounter <= 5) {
                                                if ($rowTopCustomers['utin_user_id'] != '') {
                                                    ?>                         
                                                    <tr>
                                                        <!--**********************************************************************************-->
                                                        <!--ADDED CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="40%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') { ?>
                                                                    <a style="cursor: pointer;color:blue;font-size:14px;;" onclick="userAllOrderListNavFunc('1667', '<?php echo $rowTopCustomers['utin_user_id'] ?>', 'custAllTrans');">
                                                                        <?php echo substr(om_strtoupper($rowTopCustomers['user_fname']) . ' ' . om_strtoupper($rowTopCustomers['user_lname']), 0, 21); ?>
                                                                    </a>    
                                                                    <?php
                                                                } else {
                                                                    echo substr(om_strtoupper($rowTopCustomers['user_fname']) . ' ' . om_strtoupper($rowTopCustomers['user_lname']), 0, 50);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <!--**********************************************************************************-->
                                                        <!--END CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="30%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $middleNameLabel = substr(om_strtoupper($rowTopCustomers['user_father_name']), 0, 2);
                                                                if (substr(om_strtoupper($rowTopCustomers['user_father_name']), 1, 13) != '') {
                                                                    if ($middleNameLabel == 'S') {
                                                                        echo 'S/o : ';
                                                                    } if ($middleNameLabel == 'D') {
                                                                        echo 'D/o : ';
                                                                    } else if ($middleNameLabel == 'W') {
                                                                        echo 'W/o : ';
                                                                    } else if ($middleNameLabel == 'C') {
                                                                        echo 'C/o : ';
                                                                    } else if ($middleNameLabel == 'M') {
                                                                        echo 'M/o : ';
                                                                    }
                                                                    //
                                                                    if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                        echo substr(om_strtoupper($rowTopCustomers['user_father_name']), 1, 13);
                                                                    } else {
                                                                        echo substr(om_strtoupper($rowTopCustomers['user_father_name']), 1, 30);
                                                                    }
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="20%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr(om_strtoupper($rowTopCustomers['user_city']), 0, 14);
                                                                } else {
                                                                    echo substr(om_strtoupper($rowTopCustomers['user_city']), 0, 30);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="10%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopCustomers['user_mobile'] != '') {
                                                                    echo $rowTopCustomers['user_mobile'];
                                                                } else if ($rowTopCustomers['user_phone'] != '') {
                                                                    echo $rowTopCustomers['user_phone'];
                                                                } else if ($rowTopCustomers['user_mobile1'] != '') {
                                                                    echo $rowTopCustomers['user_mobile1'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="40%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="30%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="20%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="10%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $custCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-user" style="color:#E56717;"></i> &nbsp; Top 5 Scheme Customers
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $todayDOBMonth = om_strtoupper(date(M));
                                        //
                                        $currentFinancialDay = '01';
                                        $currentFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $currentFinancialYear = date(Y) - 1;
                                        } else {
                                            $currentFinancialYear = date(Y);
                                        }
                                        //
                                        $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
                                        //
                                        $nextFinancialDay = '01';
                                        $nextFinancialMonth = 'APR';
                                        //
                                        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR' || $todayDOBMonth == 'Jan' || $todayDOBMonth == 'Feb' || $todayDOBMonth == 'Mar') {
                                            $nextFinancialYear = date(Y);
                                        } else {
                                            $nextFinancialYear = date(Y) + 1;
                                        }
                                        //
                                        $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
                                        //
                                        $currentFinancialYearDateStr = strtotime($currentFinancialYearDate);
                                        $nextFinancialYearDateStr = strtotime($nextFinancialYearDate);

                                        $utin_date_str = " AND $currentFinancialYearDateStr <= UNIX_TIMESTAMP(STR_TO_DATE(k.kitty_DOB,'%d %b %Y')) "
                                                . " AND UNIX_TIMESTAMP(STR_TO_DATE(k.kitty_DOB,'%d %b %Y')) < $nextFinancialYearDateStr ";
                                        //
                                        $qTopCustomersByScheme = "SELECT kitty_cust_id,user_fname,user_lname,user_mobile FROM kitty AS k INNER JOIN user AS u ON k.kitty_cust_id=u.user_id "
                                                . "WHERE k.kitty_final_sts IN ('pending') AND k.kitty_firm_id IN ($strFrmId) AND k.kitty_upd_sts!='Released' $utin_date_str GROUP BY kitty_cust_id ORDER BY SUM(kitty_EMI_tot_amt) DESC LIMIT 0,5";
                                        $resTopCustomersByScheme = mysqli_query($conn, $qTopCustomersByScheme);
                                        $noOfTopCustomersByScheme = mysqli_num_rows($resTopCustomersByScheme);
                                        if ($noOfTopCustomersByScheme > 0) {
                                            ?>
                                            <tr>
                                                <th width="40%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="30%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        LATEST SCHEME
                                                    </span>
                                                </th>
                                                <th width="15%" align="left" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        ACTIVE
                                                    </span>
                                                </th>
                                                <th width="16%" align="right" style="border-bottom: 2px solid rgba(0,0,0,.125);">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $custBySchemeCounter = 1;
                                            while (($rowTopCustomersByScheme = mysqli_fetch_array($resTopCustomersByScheme, MYSQLI_ASSOC)) || $custBySchemeCounter <= 5) {
                                                if ($rowTopCustomersByScheme['kitty_cust_id'] != '') {
                                                    $activeSchemeCount = noOfRowsCheck('kitty_id', 'kitty', "kitty_final_sts IN ('pending') AND kitty_upd_sts!='Released' AND kitty_cust_id='$rowTopCustomersByScheme[kitty_cust_id]'");
                                                    $latestScheme = '';
                                                    parse_str(getTableValues("SELECT kitty_barcode,kitty_id,kitty_firm_id FROM kitty WHERE kitty_final_sts IN ('pending') AND kitty_upd_sts!='Released' AND kitty_cust_id='$rowTopCustomersByScheme[kitty_cust_id]' ORDER BY kitty_id DESC LIMIT 0,1"));
                                                    $latestScheme = $kitty_barcode;
                                                    $kittyId = $kitty_id;
                                                    $kittyFirmId = $kitty_firm_id;
                                                    ?>
                                                    <tr>
                                                        <!--**********************************************************************************-->
                                                        <!--ADDED CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="40%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="showKittyUserDetails('<?php echo $rowTopCustomersByScheme['kitty_cust_id']; ?>', '<?php echo $kittyId; ?>', '<?php echo $kittyFirmId; ?>');">
                                                                    <?php
                                                                    if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                        echo substr(om_strtoupper($rowTopCustomersByScheme['user_fname']) . ' ' . om_strtoupper($rowTopCustomersByScheme['user_lname']), 0, 24);
                                                                    } else {
                                                                        echo substr(om_strtoupper($rowTopCustomersByScheme['user_fname']) . ' ' . om_strtoupper($rowTopCustomersByScheme['user_lname']), 0, 50);
                                                                    }
                                                                    ?>
                                                                </a>
                                                            </span>
                                                        </td>
                                                        <!--**********************************************************************************-->
                                                        <!--END CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="30%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo $latestScheme;
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="15%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo $activeSchemeCount;
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="15%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopCustomersByScheme['user_mobile'] != '') {
                                                                    echo $rowTopCustomersByScheme['user_mobile'];
                                                                } else if ($rowTopCustomersByScheme['user_phone'] != '') {
                                                                    echo $rowTopCustomersByScheme['user_phone'];
                                                                } else if ($rowTopCustomersByScheme['user_mobile1'] != '') {
                                                                    echo $rowTopCustomersByScheme['user_mobile1'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="40%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="30%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="15%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="15%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $custBySchemeCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa-list" style="color:#E56717;"></i> &nbsp; Top 5 Orders
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopOrder = "SELECT * FROM stock_transaction AS s INNER JOIN user AS t ON s.sttr_user_id=user_id "
                                                . "WHERE s.sttr_owner_id='$_SESSION[sessionOwnerId]' AND s.sttr_transaction_type = 'newOrder' "
                                                . "AND s.sttr_status IN('PaymentDone') ORDER BY s.sttr_final_valuation DESC LIMIT 0,5";
                                        $resTopOrder = mysqli_query($conn, $qTopOrder);
                                        $noOfTopOrder = mysqli_num_rows($resTopOrder);
                                        if ($noOfTopOrder > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="37%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        USER NAME
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        MOBILE NO
                                                    </span>
                                                </th>
                                                <th width="17%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $orderCounter = 1;
                                            while (($rowTopOrder = mysqli_fetch_array($resTopOrder, MYSQLI_ASSOC)) || $orderCounter <= 5) {
                                                if ($rowTopOrder['sttr_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <!--**********************************************************************************-->
                                                        <!--ADDED CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="userAllOrderListNavFunc('<?php echo $rowTopOrder['sttr_id'] ?>', '<?php echo $rowTopOrder['user_id'] ?>', 'newOrderPendingList', '', '', '', '');">
                                                                    <?php
                                                                    echo $rowTopOrder['sttr_pre_invoice_no'] . $rowTopOrder['sttr_invoice_no'];
                                                                    ?> 
                                                                </a>
                                                            </span>
                                                        </td>
                                                        <!--**********************************************************************************-->
                                                        <!--END CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopOrder['sttr_other_lang_add_date'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopOrder['sttr_other_lang_add_date'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopOrder['sttr_other_lang_add_date']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopOrder['sttr_add_date']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopOrder['sttr_add_date'])));
                                                                    }
//***************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022***********************************************
//***************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $userName = om_strtoupper($rowTopOrder['user_fname']) . ' ' . om_strtoupper($rowTopOrder['user_lname']);
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($userName, 0, 23);
                                                                } else {
                                                                    echo substr($userName, 0, 48);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                if ($rowTopOrder['user_mobile'] != '') {
                                                                    echo $rowTopOrder['user_mobile'];
                                                                } else if ($rowTopOrder['user_phone'] != '') {
                                                                    echo $rowTopOrder['user_phone'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: red;">
                                                                <?php
                                                                echo substr(number_format($rowTopOrder['sttr_final_valuation'], 2), 0, 10);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="37%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="17%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $orderCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td width="50%" align="center" valign="top">
                        <div class="card" style="border-radius:3px !important;border-top:1px dashed #efb653; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background: #fff;margin-bottom: 10px;margin-right: 5px;">
                            <div class="card-header" align="left" valign="middle" style="border-radius:3px;color:#E56717;border-bottom:1px dashed #efb653; font-size: 19px;background:#faf3e7;">
                                <i class="fa fa fa-money" style="color:#E56717;"></i> &nbsp; Top 5 Expenses
                            </div>
                            <div class="card-body">
                                <div style="font-size: 14px;color: black;">
                                    <table width="100%" cellpadding="3" cellspacing="0">
                                        <?php
                                        $qTopExpense = "SELECT * FROM transaction WHERE transaction_upd_sts IN ('New','Updated') and transaction_pre_vch_firm_id IN ($strFrmId) and transaction_trans_id IS NULL ORDER BY CAST(transaction_amt as unsigned) DESC LIMIT 0,5";
                                        $resTopExpense = mysqli_query($conn, $qTopExpense);
                                        $noOfTopExpense = mysqli_num_rows($resTopExpense);
                                        if ($noOfTopExpense > 0) {
                                            ?>
                                            <tr>
                                                <th width="12%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        INV NO
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        DATE
                                                    </span>
                                                </th>
                                                <th width="36%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        TRANSACTION SUBJECT
                                                    </span>
                                                </th>
                                                <th width="16%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: left;">
                                                    <span style="padding-left: 5px;">
                                                        CATEGORY
                                                    </span>
                                                </th>
                                                <th width="18%" style="border-bottom: 2px solid rgba(0,0,0,.125);text-align: right;">
                                                    <span style="padding-right: 5px;">
                                                        AMOUNT
                                                    </span>
                                                </th>
                                            </tr>
                                            <?php
                                            $expenseCounter = 1;
                                            while (($rowTopExpense = mysqli_fetch_array($resTopExpense, MYSQLI_ASSOC)) || $expenseCounter <= 5) {
                                                if ($rowTopExpense['transaction_id'] != '') {
                                                    ?>
                                                    <tr>
                                                        <!--**********************************************************************************-->
                                                        <!--ADDED CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <a style="cursor: pointer;color:blue;font-size:14px;" onclick="navigatationPanelByFileName('mainBigMiddle', 'omtatrnd', 'DailyTransactions', '', '', '', '', '', '<?php echo $rowTopExpense['transaction_user_id'] ?>');">
                                                                    <?php
                                                                    echo $rowTopExpense['transaction_pre_vch_id'] . $rowTopExpense['transaction_post_vch_id'];
                                                                    ?>
                                                                </a>
                                                            </span>
                                                        </td>
                                                        <!--**********************************************************************************-->
                                                        <!--END CODE FOR HOME PAGE TOP DETAILS @AUTHOR SIMRAN-02AUG2022-->
                                                        <!--**********************************************************************************--> 
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;">
                                                                <?php
                                                                if ($nepaliDateIndicator == 'YES' && $rowTopExpense['transaction_other_lang_DOB'] != '') {
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $rowTopExpense['transaction_other_lang_DOB'];
                                                                    } else {
                                                                        $girviOtherLangDOBStr = date_create($rowTopExpense['transaction_other_lang_DOB']);
                                                                        $girviDOBN = date_format($girviOtherLangDOBStr, "d-m-Y");
                                                                        $girviDOBArray = explode('-', $girviDOBN);
                                                                        $girviDOBMonthN = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMonthN . ' ' . $girviDOBArray[2];
                                                                    }
                                                                } else {
//***************************************************************************************************************************************************************************
//****************************************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022**********************************************
//***************************************************************************************************************************************************************************                                                                    
                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                        echo date('d  m  Y', strtotime($rowTopExpense['transaction_DOB']));
                                                                    } else {
                                                                        echo om_strtoupper(date('d  M  Y', strtotime($rowTopExpense['transaction_DOB'])));
                                                                    }
//***************************************************************************************************************************************************************************
//*****************************************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-04-12-2022***********************************************
//***************************************************************************************************************************************************************************
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="36%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                $subject = om_strtoupper($rowTopExpense['transaction_sub']);
                                                                if ($GLOBALS['gbLanguage'] == 'English' || $GLOBALS['gbLanguage'] == '') {
                                                                    echo substr($subject, 0, 25);
                                                                } else {
                                                                    echo substr($subject, 0, 50);
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo om_strtoupper($rowTopExpense['transaction_cat']);
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: #0000FF;">
                                                                <?php
                                                                echo number_format($rowTopExpense['transaction_amt'], 2);
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td width="12%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;color:#0000FF;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="font-weight: normal;padding-left: 5px;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="36%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="16%" align="left" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-left: 5px;font-weight: normal;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td width="18%" align="right" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                            <span style="padding-right: 5px;color: green;">
                                                                <?php
                                                                echo '-';
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $expenseCounter++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td width="100%" align="center" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                                                    <img src="<?php echo $documentRoot; ?>/images/noRecords.png" alt="NO RECORDS FOUND !" style="width:250px;height:150px;"/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
<?php } }?>
    </td>
</tr>
<!-- END CODE TO DISPLAY UDHAAR/ADVANCE/USER/ORDER DETAILS ON HOME PAGE @AUTHOUR:MADHUREE-01JULY20201 -->
