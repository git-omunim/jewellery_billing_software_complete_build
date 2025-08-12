<?php
// 
// Start Mysql Connection
//$readWritefile = fopen("omtemp.php", "a");
//fwrite($readWritefile, "\n  DataBase:" . $dbhost . "  dbuser:" . $dbuser . "  dbname:" . $dbname . "  dbPort:" . $dbPort . "  prodType:" . $prodType);
//fclose($readWritefile);
//$conn = mysqli_connect($dbhost, $dbuser, $dbPass) or die('Error connecting to mysql');
//
$conn = mysqli_connect($dbhost, $dbuser, $dbPass, $dbname, $dbPort) or die('Error connecting to mysql!');
mysqli_select_db($conn, $dbname);
// End Mysql Connection
//
// Start Code To Alter Prod Version Table 
$queryResult = mysqli_query($conn, "SHOW COLUMNS FROM prod_version LIKE 'prod_process_date'");
$columnExists = (mysqli_num_rows($queryResult)) ? TRUE : FALSE;
//
if (!$columnExists) {
    mysqli_query($conn, "ALTER TABLE prod_version ADD (prod_process_date DATE)");
}
//
$queryResult = mysqli_query($conn, "SHOW COLUMNS FROM prod_version LIKE 'prod_process_lock'");
$columnExists = (mysqli_num_rows($queryResult)) ? TRUE : FALSE;
//
if (!$columnExists) {
    mysqli_query($conn, "ALTER TABLE prod_version ADD (prod_process_lock VARCHAR(2))");
}
//
$qSel = "SELECT prod_process_date,prod_process_lock FROM prod_version where prod_id='1'";
$res = mysqli_query($conn, $qSel);
$row = mysqli_fetch_array($res);
$prodProcessDate = $row['prod_process_date'];
$prodProcessLock = $row['prod_process_lock'];
// End Code to check Date from Prod Version Table
//
$todayDate = date("Y-m-d");
//
//echo '<br/>$todayDate:' . $todayDate;
//echo '<br/>$prodProcessDate:' . $prodProcessDate;
//
if ($todayDate != $prodProcessDate) {
    $query = "UPDATE prod_version SET prod_process_lock='N',prod_process_date='$todayDate' where prod_id='1'";
    mysqli_query($conn, "$query") or die(mysqli_error($conn));
    $prodProcessLock = 'N';
}
//
//
$selRoundOffFunction = "SELECT omly_value FROM omlayout WHERE omly_option = 'roundOffFunction'";
$resRoundOffFunction = mysqli_query($conn, $selRoundOffFunction) or die("Error: " . mysqli_error($conn) . " with query " . $selRoundOffFunction);
$rowRoundOffFunction = mysqli_fetch_array($resRoundOffFunction);
$globalRoundOff = $rowRoundOffFunction['omly_value'];
//
require_once '../../omsscommonfunc.php';
//
$todayOmprocessDate = date("Y-m-d");
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE GET VALUE FOR SEND DUE INSTALLMENTS SMS TO CUSTOMER BEFORE AFTER & ON DUE DATE @AUTHOR:MADHUREE-31MAY2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$sendSMSToSchemeDueInstallmentsQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendSMSToSchemeDueInstallments'";
$resSendSMSToSchemeDueInstallmentsQuery = mysqli_query($conn, $sendSMSToSchemeDueInstallmentsQuery)
                                          or die("Error: " . mysqli_error($conn) . " with query " . $sendSMSToSchemeDueInstallmentsQuery);
$rowSendSMSToSchemeDueInstallments = mysqli_fetch_array($resSendSMSToSchemeDueInstallmentsQuery);
$sendSMSToSchemeDueInstallments = $rowSendSMSToSchemeDueInstallments['omly_value'];
if ($sendSMSToSchemeDueInstallments == 'YES') {
    //
    //$DueAfterFiveDay = strtoupper(Date('d M yy', strtotime('+5 days')));
    //$DueAfterThreeDay = strtoupper(Date('d M yy', strtotime('+3 days')));
    //$DueToDay = strtoupper(Date('d M yy'));
    //$TodayDate = strtoupper(Date('d M yy'));
    //$DueBeforeFiveDay = strtoupper(Date('d M yy', strtotime('-5 days')));
    //$DueBeforeThreeDay = strtoupper(Date('d M yy', strtotime('-3 days')));
    //
    $DueAfterFiveDay = strtoupper(Date('d M Y', strtotime('+5 days')));
    $DueAfterThreeDay = strtoupper(Date('d M Y', strtotime('+3 days')));
    $DueToDay = strtoupper(Date('d M Y'));
    $TodayDate = strtoupper(Date('d M Y'));
    $DueBeforeFiveDay = strtoupper(Date('d M Y', strtotime('-5 days')));
    $DueBeforeThreeDay = strtoupper(Date('d M Y', strtotime('-3 days')));
    //
    $selNoOfEntriesForProcess = "SELECT * FROM kitty_money_deposit INNER JOIN kitty AS k ON kitty_mondep_kitty_id=k.kitty_id WHERE"
            . " (kitty_mondep_omprocess_date='' OR kitty_mondep_omprocess_date IS NULL OR kitty_mondep_omprocess_date!='$todayOmprocessDate') AND k.kitty_final_sts NOT IN ('PaymentDone') AND kitty_upd_sts NOT IN ('Released')"
            . " AND kitty_mondep_EMI_start_DOB IN ('$DueAfterFiveDay','$DueAfterThreeDay','$DueToDay','$DueBeforeFiveDay','$DueBeforeThreeDay')"
            . " AND (kitty_mondep_msg_sent_status='' OR kitty_mondep_msg_sent_status IS NULL OR kitty_mondep_msg_sent_date!='$TodayDate')"
            . " AND (kitty_mondep_msg_sent_date='' OR kitty_mondep_msg_sent_date IS NULL OR kitty_mondep_msg_sent_date!='$TodayDate')"
            . " AND kitty_mondep_EMI_status IN ('Due')";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //
        include 'omproschemimsgapi.php';
        //
        $selNoOfEntriesAfterProcess = "SELECT * FROM kitty_money_deposit INNER JOIN kitty AS k ON kitty_mondep_kitty_id=k.kitty_id WHERE"
                . " (kitty_mondep_omprocess_date='' OR kitty_mondep_omprocess_date IS NULL OR kitty_mondep_omprocess_date!='$todayOmprocessDate') AND k.kitty_final_sts NOT IN ('PaymentDone') AND kitty_upd_sts NOT IN ('Released')"
                . " AND kitty_mondep_EMI_start_DOB IN ('$DueAfterFiveDay','$DueAfterThreeDay','$DueToDay','$DueBeforeFiveDay','$DueBeforeThreeDay')"
                . " AND (kitty_mondep_msg_sent_status='' OR kitty_mondep_msg_sent_status IS NULL OR kitty_mondep_msg_sent_date!='$TodayDate')"
                . " AND (kitty_mondep_msg_sent_date='' OR kitty_mondep_msg_sent_date IS NULL OR kitty_mondep_msg_sent_date!='$TodayDate')"
                . " AND kitty_mondep_EMI_status IN ('Due')";
        $resNoOfEntriesAfterProcess = mysqli_query($conn, $selNoOfEntriesAfterProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesAfterProcess);
        //
        if ($noOfEntriesAfterProcess <= 0) {
            //
            $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
            mysqli_query($conn, "$query") or die(mysqli_error($conn));
            echo 'Y';
        }
        //
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
        //
    }
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE GET VALUE FOR SEND DUE INSTALLMENTS SMS TO CUSTOMER BEFORE AFTER & ON DUE DATE @AUTHOR:MADHUREE-31MAY2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// **************************************************************************************************************************
// START CODE FOR INCREASE ROI BY MONTH : AUTHOR @DARSHANA 14 OCT 2021
// **************************************************************************************************************************

$selectRoiIncrese = "SELECT omly_value FROM omlayout WHERE omly_option = 'roiIncreseBy'";
$queryRoiIncrease = mysqli_query($conn, $selectRoiIncrese);
$resRoiIncrease = mysqli_fetch_array($queryRoiIncrease, MYSQLI_ASSOC);
$roiIncrease = $resRoiIncrease['omly_value'];

if ($roiIncrease == 'YES') {
    //
    $selNoOfEntriesForProcess = "SELECT * FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_own_id='$ownerId'";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //
        include 'omroiincrbymon.php';
        //
        $selNoOfEntriesAfterProcess = "SELECT * FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_own_id='$ownerId'";
        $resNoOfEntriesAfterProcess = mysqli_query($conn, $selNoOfEntriesAfterProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesAfterProcess);
        //
        if ($noOfEntriesAfterProcess <= 0) {
            //
            $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
            mysqli_query($conn, "$query") or die(mysqli_error($conn));
            echo 'Y';
        }
        //
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
        //
    }
}
// **************************************************************************************************************************
// END CODE FOR INCREASE ROI BY MONTH : AUTHOR @DARSHANA 14 OCT 2021
// **************************************************************************************************************************
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE GET VALUE FOR SEND BIRTHDAY AND ANNIVERSARY SMS TO CUSTOMER @AUTHOR:VISHAL-20FEB2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$sendBirthdayAndAnniverserySMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendBirthdayAndAnniverserySMS'";
$resSendBirthdayAndAnniverserySMSQuery = mysqli_query($conn, $sendBirthdayAndAnniverserySMSQuery)
        or die("Error: " . mysqli_error($conn) . " with query " . $sendBirthdayAndAnniverserySMSQuery);
$rowSendBirthdayAndAnniverserySMS = mysqli_fetch_array($resSendBirthdayAndAnniverserySMSQuery);
$sendBirthdayAndAnniverserySMS = $rowSendBirthdayAndAnniverserySMS['omly_value'];
if ($sendBirthdayAndAnniverserySMS == 'YES') {
    //
    $selNoOfEntriesForProcess = "SELECT * FROM user WHERE (user_omprocess_date='' OR user_omprocess_date IS NULL OR user_omprocess_date!='$todayOmprocessDate') AND MONTH(STR_TO_DATE(user_marriage_any,'%d %b %Y')) = MONTH(NOW()) AND DAY(STR_TO_DATE(user_marriage_any,'%d %b %Y')) = DAY(NOW())";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //
        include 'ombirthaniautosms.php';
        //
        $selNoOfEntriesAfterProcess = "SELECT * FROM user WHERE (user_omprocess_date='' OR user_omprocess_date IS NULL OR user_omprocess_date!='$todayOmprocessDate') AND MONTH(STR_TO_DATE(user_marriage_any,'%d %b %Y')) = MONTH(NOW()) AND DAY(STR_TO_DATE(user_marriage_any,'%d %b %Y')) = DAY(NOW())";
        $resNoOfEntriesAfterProcess = mysqli_query($conn, $selNoOfEntriesAfterProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesAfterProcess);
        //
        if ($noOfEntriesAfterProcess <= 0) {
            //
            $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
            mysqli_query($conn, "$query") or die(mysqli_error($conn));
            echo 'Y';
        }
        //
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
        //
    }
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE GET VALUE FOR SEND BIRTHDAY AND ANNIVERSARY SMS TO CUSTOMER @AUTHOR:VISHAL-20FEB2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE GET VALUE FOR SEND LOAN GRACE PERIOD EXPIRE SMS TO CUSTOMER @AUTHOR:AKSHAY-02JUNE2025 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$sendGracePeriodExpireSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'LOAN_GRACE_S'";
$resGracePeriodExpireSMSQuery = mysqli_query($conn, $sendGracePeriodExpireSMSQuery)
        or die("Error: " . mysqli_error($conn) . " with query " . $sendGracePeriodExpireSMSQuery);

$rowGracePeriodExpireSMSQuery = mysqli_fetch_array($resGracePeriodExpireSMSQuery);
$GracePeriodExpireSMSQuery = $rowGracePeriodExpireSMSQuery['omly_value'];
if ($GracePeriodExpireSMSQuery == 'YES') {
    //
    $selNoOfEntriesForProcess = "SELECT * FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date = '$todayOmprocessDate') AND girv_upd_sts != 'Released' AND girv_own_id='$ownerId'";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //
        include 'omloanGraceExpireautosms.php';
        //
        $selNoOfEntriesAfterProcess = "SELECT * FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_upd_sts != 'Released' AND girv_own_id='$ownerId'";
        $resNoOfEntriesAfterProcess = mysqli_query($conn, $selNoOfEntriesAfterProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesAfterProcess);
        //
        if ($noOfEntriesAfterProcess <= 0) {
            //
            $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
            mysqli_query($conn, "$query") or die(mysqli_error($conn));
            echo 'Y';
        }
        //
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
        //
    }
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE GET VALUE FOR SEND LOAN GRACE PERIOD EXPIRE SMS TO CUSTOMER @AUTHOR:AKSHAY-02JUNE2025 //
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE GET VALUE FOR SEND OFFER AND FESTIVAL SMS TO CUSTOMER @AUTHOR:VISHAL-10MAR2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$sendOfferFestivalSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendOfferFestivalAutoSMS'";
$resSendOfferFestivalSMSQuery = mysqli_query($conn, $sendOfferFestivalSMSQuery)
        or die("Error: " . mysqli_error($conn) . " with query " . $sendOfferFestivalSMSQuery);
$rowSendOfferFestivalSMS = mysqli_fetch_array($resSendOfferFestivalSMSQuery);
$sendOfferFestivalSMS = $rowSendOfferFestivalSMS['omly_value'];
if ($sendOfferFestivalSMS == 'YES') {
    //
    $selNoOfEntriesForProcess = "SELECT * FROM user WHERE (user_omprocess_date='' OR user_omprocess_date IS NULL OR user_omprocess_date!='$todayOmprocessDate')";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //
        include 'omofferfestautosms.php';
        //
        $selNoOfEntriesAfterProcess = "SELECT * FROM user WHERE (user_omprocess_date='' OR user_omprocess_date IS NULL OR user_omprocess_date!='$todayOmprocessDate')";
        $resNoOfEntriesAfterProcess = mysqli_query($conn, $selNoOfEntriesAfterProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesAfterProcess);
        //
        if ($noOfEntriesAfterProcess <= 0) {
            //
            $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
            mysqli_query($conn, "$query") or die(mysqli_error($conn));
            echo 'Y';
        }
        //
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
        //
    }
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE GET VALUE FOR SEND OFFER AND FESTIVAL SMS TO CUSTOMER @AUTHOR:VISHAL-10MAR2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE GET VALUE FOR SEND LOAN AND INTEREST SMS TO CUSTOMER @AUTHOR:VISHAL-01MAR2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$sendLoanAndInterestSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendPendingLaonAndInterestSMS'";
$resSendLoanAndInterestSMSQuery = mysqli_query($conn, $sendLoanAndInterestSMSQuery)
        or die("Error: " . mysqli_error($conn) . " with query " . $sendLoanAndInterestSMSQuery);
$rowSendLoanAndInterestSMS = mysqli_fetch_array($resSendLoanAndInterestSMSQuery);
$sendLoanAndInterestSMS = $rowSendLoanAndInterestSMS['omly_value'];
if ($sendLoanAndInterestSMS == 'YES') {
    //
    $selNoOfEntriesForProcess = "SELECT * FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_upd_sts != 'Released' AND girv_own_id='$ownerId'";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //
        include 'omloaninterestautosms.php';
        //
        $selNoOfEntriesAfterProcess = "SELECT * FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_upd_sts != 'Released' AND girv_own_id='$ownerId'";
        $resNoOfEntriesAfterProcess = mysqli_query($conn, $selNoOfEntriesAfterProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesAfterProcess);
        //
        if ($noOfEntriesAfterProcess <= 0) {
            //
            $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
            mysqli_query($conn, "$query") or die(mysqli_error($conn));
            echo 'Y';
        }
        //
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
        //
    }
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE GET VALUE FOR SEND LOAN AND INTEREST SMS TO CUSTOMER @AUTHOR:VISHAL-01MAR2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE GET VALUE FOR SEND EXPIRED LOAN SMS TO CUSTOMER @AUTHOR:VISHAL-03MAR2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$sendExpiredLoanSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendExpiredLaonSMS'";
$resSendExpiredLoanSMSQuery = mysqli_query($conn, $sendExpiredLoanSMSQuery)
        or die("Error: " . mysqli_error($conn) . " with query " . $sendExpiredLoanSMSQuery);
$rowSendExpiredLoanSMS = mysqli_fetch_array($resSendExpiredLoanSMSQuery);
$sendExpiredLoanSMS = $rowSendExpiredLoanSMS['omly_value'];
if ($sendExpiredLoanSMS == 'YES') {
    //
    $selNoOfEntriesForProcess = "SELECT * FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_upd_sts != 'Released' AND girv_own_id='$ownerId'";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //
        include 'omexpiredloanautosms.php';
        //
        $selNoOfEntriesAfterProcess = "SELECT * FROM girvi WHERE (girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') AND girv_upd_sts != 'Released' AND girv_own_id='$ownerId'";
        $resNoOfEntriesAfterProcess = mysqli_query($conn, $selNoOfEntriesAfterProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesAfterProcess);
        //
        if ($noOfEntriesAfterProcess <= 0) {
            //
            $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
            mysqli_query($conn, "$query") or die(mysqli_error($conn));
            echo 'Y';
        }
        //
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
        //
    }
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE GET VALUE FOR SEND EXPIRED LOAN SMS TO CUSTOMER @AUTHOR:VISHAL-03MAR2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD FILE TO UPDATE PRODUCT VALUATION BY TODAYS METAL RATE FOR OMECOM @AUTHOR:HEMA-23JUN2020//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ($prodType == 'OMUNIM' || $prodType == 'OMGOLD') {
    $selNoOfEntriesForProcess = "SELECT * FROM stock_transaction WHERE (sttr_omprocess_date='' OR sttr_omprocess_date IS NULL OR sttr_omprocess_date!='$todayOmprocessDate') AND sttr_status!='SOLDOUT' and sttr_omecom_status='YES'";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
//$rowNoOfEntriesForProcess = mysqli_fetch_array($resNoOfEntriesForProcess, MYSQLI_ASSOC);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
//
//    $readWritefile = fopen("omtemp.php", "a");
//    fwrite($readWritefile, "\n  Time:" . date("m/d/y G.i:s", time()) . "  No Of Entries:" . $noOfEntriesForProcess . "  End:" . $selNoOfEntriesForProcess);
//    fclose($readWritefile);
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //
        //Start Code to lock process
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //End Code to lock process
        //
        include 'omprocessproduct.php';
        //
        $selNoOfEntriesForProcess = "SELECT * FROM stock_transaction WHERE "
                . "(sttr_omprocess_date='' OR sttr_omprocess_date IS NULL OR sttr_omprocess_date!='$todayOmprocessDate') "
                . "AND sttr_status!='SOLDOUT' and sttr_omecom_status='YES' ORDER BY sttr_id DESC LIMIT 0,500";
        $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesForProcess);
        //
//        $readWritefile = fopen("omtemp.php", "a");
//        fwrite($readWritefile, "\n  Time:" . date("m/d/y G.i:s", time()) . "  No Of Entries:" . $noOfEntriesAfterProcess . "  End:" . $selNoOfEntriesForProcess);
//        fclose($readWritefile);
        //
        if ($noOfEntriesAfterProcess <= 0) {
            //
            $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
            mysqli_query($conn, "$query") or die(mysqli_error($conn));
            echo 'Y';
        }
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
    }
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD FILE TO UPDATE PRODUCT VALUATION BY TODAYS METAL RATE FOR OMECOM @AUTHOR:HEMA-23JUN2020//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//echo $prodProcessLock . '  -  ';
if ($prodType == 'OMUNIM' || $prodType == 'OMREVO') {
    //
    if ($todayDate == $prodProcessDate && $prodNewLoansAdded == 'Y') {
        //$queryStr = " and girv_pl_total_amt IS NULL ";
        $queryStr = " ";
    }
    //
    $selNoOfEntriesForProcess = "SELECT * FROM girvi WHERE "
            . "(girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') "
            . "AND girv_own_id='$ownerId' $queryStr AND girv_upd_sts IN ('New','Updated','ReleaseCart') ORDER BY girv_id DESC LIMIT 1";
    $resNoOfEntriesForProcess = mysqli_query($conn, $selNoOfEntriesForProcess);
    $noOfEntriesForProcess = mysqli_num_rows($resNoOfEntriesForProcess);
    //
    //echo $selNoOfEntriesForProcess . '  -  ';
    //
    if ($noOfEntriesForProcess > 0 && $prodProcessLock != 'Y') {
        //echo 'Z';
        //
        $query = "UPDATE prod_version SET prod_process_lock='Y' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //
        include 'omprolossloans.php';
        //echo 's';
        $selNoOfEntriesAfterProcess = "SELECT * FROM girvi WHERE "
                . "(girv_omprocess_date='' OR girv_omprocess_date IS NULL OR girv_omprocess_date!='$todayOmprocessDate') "
                . "AND girv_own_id='$ownerId' $queryStr "
                . "AND girv_upd_sts IN ('New','Updated','ReleaseCart') ORDER BY girv_id DESC LIMIT 1";
        $resNoOfEntriesAfterProcess = mysqli_query($conn, $selNoOfEntriesAfterProcess);
        $noOfEntriesAfterProcess = mysqli_num_rows($resNoOfEntriesAfterProcess);
        //
        //echo 'n' . $selNoOfEntriesAfterProcess;

        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        //     
        if ($noOfEntriesAfterProcess <= 0) {
            //
            echo 'Y';
        } else {
            echo 'N';
        }
        //
    } else if ($noOfEntriesForProcess <= 0) {
        //
        $query = "UPDATE prod_version SET prod_process_lock='N' where prod_id='1'";
        mysqli_query($conn, "$query") or die(mysqli_error($conn));
        echo 'Y';
        //
    } else {
        echo 'N';
    }
}
?>