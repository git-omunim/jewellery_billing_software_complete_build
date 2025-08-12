<?php
/*
 * **************************************************************************************
 * @tutorial: Send bulk sms to unvisit customer
 * **************************************************************************************
 *
 * Created on Feb 06, 2021 10:32:36 AM
 *
 * @FileName: omunvisitcust.php
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
<?php
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';

$months = $_REQUEST['monthBtn'];

$UnvisitCustSmsTemplateQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'unvisitCustSmsTemplate'";
$resUnvisitCustSmsTemplateQuery = mysqli_query($conn, $UnvisitCustSmsTemplateQuery)or die("Error: " . mysqli_error($conn) . " with query " . $UnvisitCustSmsTemplateQuery);
$rowUnvisitCustSmsTemplate = mysqli_fetch_array($resUnvisitCustSmsTemplateQuery);
$setUnvisitCustSmsTemplate = $rowUnvisitCustSmsTemplate['omly_value'];

$unvisitCustSmsQuery = "SELECT smtp_text FROM sms_templates WHERE smtp_sub = '$setUnvisitCustSmsTemplate'";
$resUnvisitCustSmsQuery = mysqli_query($conn, $unvisitCustSmsQuery)or die("Error: " . mysqli_error($conn) . " with query " . $unvisitCustSmsQuery);
$rowUnvisitCustSms = mysqli_fetch_array($resUnvisitCustSmsQuery);
$setUnvisitCustSms = $rowUnvisitCustSms['smtp_text'];

if($months == '3month') {
    $selectCustomer = "SELECT user.user_id, user.user_fname, user.user_lname, user.user_mobile, user.user_city, user_transaction_invoice.utin_date, user.user_mobile, user.user_firm_id FROM user_transaction_invoice JOIN user ON user_transaction_invoice.utin_user_id = user.user_id where UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < UNIX_TIMESTAMP(DATE(NOW()) - INTERVAL 3 MONTH)";
    $res = mysqli_query($conn, $selectCustomer) or die(mysqli_error($conn));
        
    while ($row = mysqli_fetch_array($res)) {
        $userId = $row['user_id'];
        $user_fname = $row['user_fname'];
        $user_lname = $row['user_lname'];
        $mobileNo = $row['user_mobile'];
        $userCity = $row['user_city'];
		$user_firm_id = $row['user_firm_id'];
        $custFName = $row['user_fname'] . " " . $row['user_lname'];

        $smsTextTemp = $setUnvisitCustSms;
        $smsSub = $setUnvisitCustSmsTemplate;	// Added variable for sms template sub @Author: Vishal 12APR21
        $sms_type = 'TSMS';

        if ($custFName == '' || $custFName == NULL)
            $custFName = 'Customer';

        $userType = "customers"; //customer to customerS Changed @Author:PRIYA19AUG13

		$firm = "SELECT firm_long_name FROM firm JOIN user ON firm_id = '$user_firm_id'";
		$res_firm = mysqli_query($conn, $firm) or die(mysqli_error($conn));
		$row_firm = mysqli_fetch_array($res_firm);
		$firm_long_name = $row_firm['firm_long_name'];
	
        $smsText = str_replace("CUST_NAME", "$custFName", $smsTextTemp);
		$smsText = str_replace("FIRM_SHOP_NAME", "$firm_long_name", $smsText);
        //
        include 'omcsmsads.php';
        flush();
        if ($omSMSResult == 'SUCCESS') {
//            echo 'S'; // Msg Count
        } else {
//            echo 'F';
        }
        //end code for send sms
    }
} elseif($months == '6month') {
    $selectCustomer = "SELECT user.user_id, user.user_fname, user.user_lname, user.user_mobile, user.user_city, user_transaction_invoice.utin_date, user.user_mobile, user.user_firm_id FROM user_transaction_invoice JOIN user ON user_transaction_invoice.utin_user_id = user.user_id where UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < UNIX_TIMESTAMP(DATE(NOW()) - INTERVAL 6 MONTH)";
    $res = mysqli_query($conn, $selectCustomer) or die(mysqli_error($conn));
        
    while ($row = mysqli_fetch_array($res)) {
        $userId = $row['user_id'];
        $user_fname = $row['user_fname'];
        $user_lname = $row['user_lname'];
        $mobileNo = $row['user_mobile'];
        $userCity = $row['user_city'];
		$user_firm_id = $row['user_firm_id'];
        $custFName = $row['user_fname'] . " " . $row['user_lname'];

        $smsTextTemp = $setUnvisitCustSms;
        $smsSub = $setUnvisitCustSmsTemplate;	// Added variable for sms template sub @Author: Vishal 12APR21
        $sms_type = 'TSMS';

        if ($custFName == '' || $custFName == NULL)
            $custFName = 'Customer';

        $userType = "customers"; //customer to customerS Changed @Author:PRIYA19AUG13

		$firm = "SELECT firm_long_name FROM firm JOIN user ON firm_id = '$user_firm_id'";
		$res_firm = mysqli_query($conn, $firm) or die(mysqli_error($conn));
		$row_firm = mysqli_fetch_array($res_firm);
		$firm_long_name = $row_firm['firm_long_name'];
	
        $smsText = str_replace("CUST_NAME", "$custFName", $smsTextTemp);
		$smsText = str_replace("FIRM_SHOP_NAME", "$firm_long_name", $smsText);
        //
        include 'omcsmsads.php';
        flush();
        if ($omSMSResult == 'SUCCESS') {
//            echo 'S'; // Msg Count
        } else {
//            echo 'F';
        }
        //end code for send sms
    }
} elseif($months == '9month') {
    $selectCustomer = "SELECT user.user_id, user.user_fname, user.user_lname, user.user_mobile, user.user_city, user_transaction_invoice.utin_date, user.user_mobile, user.user_firm_id FROM user_transaction_invoice JOIN user ON user_transaction_invoice.utin_user_id = user.user_id where UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < UNIX_TIMESTAMP(DATE(NOW()) - INTERVAL 9 MONTH)";
    $res = mysqli_query($conn, $selectCustomer) or die(mysqli_error($conn));
        
    while ($row = mysqli_fetch_array($res)) {
        $userId = $row['user_id'];
        $user_fname = $row['user_fname'];
        $user_lname = $row['user_lname'];
        $mobileNo = $row['user_mobile'];
        $userCity = $row['user_city'];
		$user_firm_id = $row['user_firm_id'];
        $custFName = $row['user_fname'] . " " . $row['user_lname'];

        $smsTextTemp = $setUnvisitCustSms;
        $smsSub = $setUnvisitCustSmsTemplate;	// Added variable for sms template sub @Author: Vishal 12APR21
        $sms_type = 'TSMS';

        if ($custFName == '' || $custFName == NULL)
            $custFName = 'Customer';

        $userType = "customers"; //customer to customerS Changed @Author:PRIYA19AUG13

		$firm = "SELECT firm_long_name FROM firm JOIN user ON firm_id = '$user_firm_id'";
		$res_firm = mysqli_query($conn, $firm) or die(mysqli_error($conn));
		$row_firm = mysqli_fetch_array($res_firm);
		$firm_long_name = $row_firm['firm_long_name'];
	
        $smsText = str_replace("CUST_NAME", "$custFName", $smsTextTemp);
		$smsText = str_replace("FIRM_SHOP_NAME", "$firm_long_name", $smsText);
        //
        include 'omcsmsads.php';
        flush();
        if ($omSMSResult == 'SUCCESS') {
//            echo 'S'; // Msg Count
        } else {
//            echo 'F';
        }
        //end code for send sms
    }
} elseif($months == '12month') {
    $selectCustomer = "SELECT user.user_id, user.user_fname, user.user_lname, user.user_mobile, user.user_city, user_transaction_invoice.utin_date, user.user_mobile, user.user_firm_id FROM user_transaction_invoice JOIN user ON user_transaction_invoice.utin_user_id = user.user_id where UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) < UNIX_TIMESTAMP(DATE(NOW()) - INTERVAL 1 YEAR)";
    $res = mysqli_query($conn, $selectCustomer) or die(mysqli_error($conn));
        
    while ($row = mysqli_fetch_array($res)) {
        $userId = $row['user_id'];
        $user_fname = $row['user_fname'];
        $user_lname = $row['user_lname'];
        $mobileNo = $row['user_mobile'];
        $userCity = $row['user_city'];
		$user_firm_id = $row['user_firm_id'];
        $custFName = $row['user_fname'] . " " . $row['user_lname'];

        $smsTextTemp = $setUnvisitCustSms;
        $smsSub = $setUnvisitCustSmsTemplate;	// Added variable for sms template sub @Author: Vishal 12APR21
        $sms_type = 'TSMS';

        if ($custFName == '' || $custFName == NULL)
            $custFName = 'Customer';

        $userType = "customers"; //customer to customerS Changed @Author:PRIYA19AUG13

		$firm = "SELECT firm_long_name FROM firm JOIN user ON firm_id = '$user_firm_id'";
		$res_firm = mysqli_query($conn, $firm) or die(mysqli_error($conn));
		$row_firm = mysqli_fetch_array($res_firm);
		$firm_long_name = $row_firm['firm_long_name'];
	
        $smsText = str_replace("CUST_NAME", "$custFName", $smsTextTemp);
		$smsText = str_replace("FIRM_SHOP_NAME", "$firm_long_name", $smsText);
        //
        include 'omcsmsads.php';
        flush();
        if ($omSMSResult == 'SUCCESS') {
//            echo 'S'; // Msg Count
        } else {
//            echo 'F';
        }
        //end code for send sms
    }
}
?>

