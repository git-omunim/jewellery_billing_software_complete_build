<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 23 Dec, 2022 10:40:31 PM
 *
 * @FileName: omvisitordashboard.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
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
include_once 'ommpfndv.php';
    //
$staffId = $_SESSION['sessionStaffId'];
$todayDate = date('d M Y');
$todayDateInTime = strtotime($todayDate);
$prevMonthDate = strtotime(date('d M Y', strtotime('-1 month')));
//echo 'today = '.$todayDateInTime."<br>";
//echo 'prev = '.$prevMonthDate;

if ($staffId != '' && $staffId != NULL && $staffType != 'Administrator') {
$queryLeads = "select count(visitor_id) as newlead from visitor where (visitor_interest = '' OR visitor_interest is NULL) and (visitor_last_comment_date ='' or visitor_last_comment_date is null) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
$reqLeads = mysqli_query($conn, $queryLeads);
$restotalLeadsAviable = mysqli_fetch_array($reqLeads);
$totalLeadsAviable = $restotalLeadsAviable['newlead'];
//
//
$queryVint = "select count(visitor_id) as vint from visitor where visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
$reqVint = mysqli_query($conn, $queryVint);
$restotalLeadsVint = mysqli_fetch_array($reqVint);
$totalLeadsVint = $restotalLeadsVint['vint'];
//
//
$querydemoArr = "select count(visitor_id) as demoarr from visitor where visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
$reqdemoArr = mysqli_query($conn, $querydemoArr);
$restotalLeadsdemoArr = mysqli_fetch_array($reqdemoArr);
$totalLeadsdemoArr = $restotalLeadsdemoArr['demoarr'];
//
//
$querydemoDone = "select count(visitor_id) as demodone from visitor where visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
$reqdemoDone = mysqli_query($conn, $querydemoDone);
$restotalLeadsdemoDone = mysqli_fetch_array($reqdemoDone);
$totalLeadsdemoDone = $restotalLeadsdemoDone['demodone'];
//
//
$querydemoinst = "select count(visitor_id) as demoinst from visitor where visitor_interest ='DEMOINST' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
$reqdemoinst = mysqli_query($conn, $querydemoinst);
$restotalLeadsdemoinst = mysqli_fetch_array($reqdemoinst);
$totalLeadsdemoinst = $restotalLeadsdemoinst['demoinst'];
//
//
$querySale = "select count(visitor_id) as sale from visitor where visitor_interest ='CUSTOMER' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) >= $prevMonthDate and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) <= $todayDateInTime";
$reqSale = mysqli_query($conn, $querySale);
$restotalLeadsSale = mysqli_fetch_array($reqSale);
$totalLeadsSale = $restotalLeadsSale['sale'];
//
//
$queryTodayCall = "select count(visitor_id) as todaycall from visitor where visitor_interest not in ('fake', 'customer','Nint') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) = $todayDateInTime and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
$reqTodayCall = mysqli_query($conn, $queryTodayCall);
$restotalTodayCall = mysqli_fetch_array($reqTodayCall);
$totalTodayCall = $restotalTodayCall['todaycall'];
//
//
$queryMonthlyCall = "select count(visitor_id) as monthlycall from visitor where visitor_interest not in ('fake', 'customer','Nint') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) >= $prevMonthDate and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) <= $todayDateInTime";
$reqMonthlyCall = mysqli_query($conn, $queryMonthlyCall);
$resTotalMonthlyCall = mysqli_fetch_array($reqMonthlyCall);
$totalMonthlyCall = $resTotalMonthlyCall['monthlycall'];
}else if($staffType == 'Administrator'){
   //
$queryLeads = "select count(visitor_id) as newlead from visitor where visitor_lead_team='$staffTeam' and (visitor_interest = '' OR visitor_interest is NULL) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqLeads = mysqli_query($conn, $queryLeads);
$restotalLeadsAviable = mysqli_fetch_array($reqLeads);
$totalLeadsAviable = $restotalLeadsAviable['newlead'];
//
//
$queryVint = "select count(visitor_id) as vint from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqVint = mysqli_query($conn, $queryVint);
$restotalLeadsVint = mysqli_fetch_array($reqVint);
$totalLeadsVint = $restotalLeadsVint['vint'];
//
//
$querydemoArr = "select count(visitor_id) as demoarr from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqdemoArr = mysqli_query($conn, $querydemoArr);
$restotalLeadsdemoArr = mysqli_fetch_array($reqdemoArr);
$totalLeadsdemoArr = $restotalLeadsdemoArr['demoarr'];
//
//
$querydemoDone = "select count(visitor_id) as demodone from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqdemoDone = mysqli_query($conn, $querydemoDone);
$restotalLeadsdemoDone = mysqli_fetch_array($reqdemoDone);
$totalLeadsdemoDone = $restotalLeadsdemoDone['demodone'];
//
//
$querydemoinst = "select count(visitor_id) as demoinst from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='DEMOINST' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqdemoinst = mysqli_query($conn, $querydemoinst);
$restotalLeadsdemoinst = mysqli_fetch_array($reqdemoinst);
$totalLeadsdemoinst = $restotalLeadsdemoinst['demoinst'];
//
//
$querySale = "select count(visitor_id) as sale from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='CUSTOMER' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) >= $prevMonthDate and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) <= $todayDateInTime";
$reqSale = mysqli_query($conn, $querySale);
$restotalLeadsSale = mysqli_fetch_array($reqSale);
$totalLeadsSale = $restotalLeadsSale['sale'];
//
//
$queryTodayCall = "select count(visitor_id) as todaycall from visitor where visitor_interest not in ('fake', 'customer','Nint') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) = $todayDateInTime";
$reqTodayCall = mysqli_query($conn, $queryTodayCall);
$restotalTodayCall = mysqli_fetch_array($reqTodayCall);
$totalTodayCall = $restotalTodayCall['todaycall'];
//
//
$queryMonthlyCall = "select count(visitor_id) as monthlycall from visitor where visitor_interest not in ('fake', 'customer','Nint') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) >= $prevMonthDate and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) <= $todayDateInTime ";
$reqMonthlyCall = mysqli_query($conn, $queryMonthlyCall);
$resTotalMonthlyCall = mysqli_fetch_array($reqMonthlyCall);
$totalMonthlyCall = $resTotalMonthlyCall['monthlycall'];
} else {
//
$queryLeads = "select count(visitor_id) as newlead from visitor where (visitor_status = '' OR visitor_status is NULL) and (visitor_interest = '' OR visitor_interest is NULL) and (visitor_staff_id = '' OR visitor_staff_id is null) and (visitor_sec_staff_id = '' OR visitor_sec_staff_id is null) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqLeads = mysqli_query($conn, $queryLeads);
$restotalLeadsAviable = mysqli_fetch_array($reqLeads);
$totalLeadsAviable = $restotalLeadsAviable['newlead'];
//
//
$queryVint = "select count(visitor_id) as vint from visitor where visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqVint = mysqli_query($conn, $queryVint);
$restotalLeadsVint = mysqli_fetch_array($reqVint);
$totalLeadsVint = $restotalLeadsVint['vint'];
//
//
$querydemoArr = "select count(visitor_id) as demoarr from visitor where visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqdemoArr = mysqli_query($conn, $querydemoArr);
$restotalLeadsdemoArr = mysqli_fetch_array($reqdemoArr);
$totalLeadsdemoArr = $restotalLeadsdemoArr['demoarr'];
//
//
$querydemoDone = "select count(visitor_id) as demodone from visitor where visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqdemoDone = mysqli_query($conn, $querydemoDone);
$restotalLeadsdemoDone = mysqli_fetch_array($reqdemoDone);
$totalLeadsdemoDone = $restotalLeadsdemoDone['demodone'];
//
//
$querydemoinst = "select count(visitor_id) as demoinst from visitor where visitor_interest ='DEMOINST' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
$reqdemoinst = mysqli_query($conn, $querydemoinst);
$restotalLeadsdemoinst = mysqli_fetch_array($reqdemoinst);
$totalLeadsdemoinst = $restotalLeadsdemoinst['demoinst'];
//
//
$querySale = "select count(visitor_id) as sale from visitor where visitor_interest ='CUSTOMER' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) >= $prevMonthDate and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) <= $todayDateInTime";
$reqSale = mysqli_query($conn, $querySale);
$restotalLeadsSale = mysqli_fetch_array($reqSale);
$totalLeadsSale = $restotalLeadsSale['sale'];
//
//
$queryTodayCall = "select count(visitor_id) as todaycall from visitor where visitor_interest not in ('fake', 'customer','Nint') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) = $todayDateInTime";
$reqTodayCall = mysqli_query($conn, $queryTodayCall);
$restotalTodayCall = mysqli_fetch_array($reqTodayCall);
$totalTodayCall = $restotalTodayCall['todaycall'];
//
//
$queryMonthlyCall = "select count(visitor_id) as monthlycall from visitor where visitor_interest not in ('fake', 'customer','Nint') and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) >= $prevMonthDate and UNIX_TIMESTAMP(STR_TO_DATE(visitor_last_comment_date,'%d %b %Y')) <= $todayDateInTime";
$reqMonthlyCall = mysqli_query($conn, $queryMonthlyCall);
$resTotalMonthlyCall = mysqli_fetch_array($reqMonthlyCall);
$totalMonthlyCall = $resTotalMonthlyCall['monthlycall'];
}
?>
<div id="display_girvi_info_popup" style="position: absolute;"></div>
<div class="container-fluid" style="background:#fff;margin-top:5px;padding:10px 5px;border:1px dashed #625f5f;">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div style="background: #E5E7E9;color: #2b2626;border-radius: 3px;">
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;width: 80px;display: inline-block;text-align: center;"><?php echo number_format($totalLeadsAviable); ?></span>
                    <span style="font-size: 18px;font-weight: 600;width: 110px;display: inline-block;">LEADS</span>
                </div>
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsVint); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">VINT</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div style="background: #E5E7E9;color: #2b2626;border-radius: 3px;">
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;width: 80px;display: inline-block;text-align: center;"><?php echo number_format($totalTodayCall); ?></span>
                    <span style="font-size: 18px;font-weight: 600;width: 110px;display: inline-block;">TODAY CALL</span>
                </div>
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalMonthlyCall); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 118px;">MONTHLY CALL</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div style="background: #E5E7E9;color: #2b2626;border-radius: 3px;">
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsdemoArr); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">DEMO ARR</span>
                </div>
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsdemoDone); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">DEMO DONE</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div style="background: #E5E7E9;color: #2b2626;border-radius: 3px;">
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsdemoinst); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">DEMO INST</span>
                </div>
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsSale); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">SALE</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top:8px;background:#ffeaee;padding:5px;border:1px dashed #ff7d7d;">
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3">
             <div style="padding: 0px 5px;width:100%;" id="visitorLeadDiv">
                <?php 
                $currentVisitorShowing = 'leads';
                $bgcolorHeading = "D4AC0D";
                $bgcolor = "F9E79F";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3">
             <div style="padding: 0px 5px;width:100%;" id="visitorTodaysCallDiv">
               <?php 
                $currentVisitorShowing = 'todaysCall';
                $bgcolorHeading = "E67E22";
                $bgcolor = "F0B27A";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3">
              <div style="padding: 0px 5px;width:100%;" id="visitorVintDiv">
               <?php 
                $currentVisitorShowing = 'VINT';
                $bgcolorHeading = "229954";
                $bgcolor = "7DCEA0";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3">
             <div style="padding: 0px 5px;width:100%;" id="visitorintDiv">
                <?php 
                $currentVisitorShowing = 'INT';
                $bgcolorHeading = "28B463";
                $bgcolor = "D5F5E3";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3">
             <div style="padding: 0px 5px;width:100%;" id="visitorDemoArrDiv">
               <?php 
                $currentVisitorShowing = 'DEMOARRN';
                $bgcolorHeading = "5DADE2";
                $bgcolor = "D6EAF8";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3">
             <div style="padding: 0px 5px;width:100%;" id="visitorDemodoneDiv">
                 <?php 
                $currentVisitorShowing = 'DEMODONE';
                $bgcolorHeading = "A569BD";
                $bgcolor = "D2B4DE";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
        </div>
    </div>
</div>
<div>
<!--    <div style="background: #F8F9F9;border: 2px dashed #909497;border-radius: 5px;">
        <div style="display: flex;justify-content: space-around;align-items: center;padding: 8px 1px;">
            <div style="background: #E5E7E9;color: #2b2626;border-radius: 3px;">
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;width: 80px;display: inline-block;text-align: center;"><?php echo number_format($totalLeadsAviable); ?></span>
                    <span style="font-size: 18px;font-weight: 600;width: 110px;display: inline-block;">LEADS</span>
                </div>
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsVint); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">VINT</span>
                </div>
            </div>
            <div style="background: #E5E7E9;color: #2b2626;border-radius: 3px;">
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;width: 80px;display: inline-block;text-align: center;"><?php echo number_format($totalTodayCall); ?></span>
                    <span style="font-size: 18px;font-weight: 600;width: 110px;display: inline-block;">TODAY CALL</span>
                </div>
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalMonthlyCall); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 118px;">MONTHLY CALL</span>
                </div>
            </div>
            <div style="background: #E5E7E9;color: #2b2626;border-radius: 3px;">
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsdemoArr); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">DEMO ARR</span>
                </div>
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsdemoDone); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">DEMO DONE</span>
                </div>
            </div>
            <div style="background: #E5E7E9;color: #2b2626;border-radius: 3px;">
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsdemoinst); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">DEMO INST</span>
                </div>
                <div style="padding: 6px 20px;">
                    <span style="font-size: 18px;font-weight: 600;color: #cc1212;display: inline-block;width: 80px;text-align: center;"><?php echo number_format($totalLeadsSale); ?></span>
                    <span style="font-size: 18px;font-weight: 600;display: inline-block;width: 110px;">SALE</span>
                </div>
            </div>
        </div>
    </div>-->

<!--    <div style="margin-top: 8px;width:1400px;overflow-x: scroll;">
        <div style="display: flex;justify-content: space-around;background: #fff;padding: 6px 0px;width: 1611px;">
            <div style="width: 250px;background: white;padding: 0px 5px; background: #fff;" id="visitorLeadDiv">
                <?php 
                $currentVisitorShowing = 'leads';
                $bgcolorHeading = "D4AC0D";
                $bgcolor = "F9E79F";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
            <div style="width: 250px;background: white;padding: 0px 5px; background: #fff;" id="visitorTodaysCallDiv">
               <?php 
                $currentVisitorShowing = 'todaysCall';
                $bgcolorHeading = "E67E22";
                $bgcolor = "F0B27A";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
            <div style="width: 250px;background: white;padding: 0px 5px; background: #fff;" id="visitorVintDiv">
               <?php 
                $currentVisitorShowing = 'VINT';
                $bgcolorHeading = "229954";
                $bgcolor = "7DCEA0";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
            <div style="width: 250px;background: white;padding: 0px 5px; background: #fff;" id="visitorintDiv">
                <?php 
                $currentVisitorShowing = 'INT';
                $bgcolorHeading = "28B463";
                $bgcolor = "D5F5E3";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
            <div style="width: 250px;background: white;padding: 0px 5px; background: #fff;" id="visitorDemoArrDiv">
               <?php 
                $currentVisitorShowing = 'DEMOARRN';
                $bgcolorHeading = "5DADE2";
                $bgcolor = "D6EAF8";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
            <div style="width: 250px;background: white;padding: 0px 5px; background: #fff;" id="visitorDemodoneDiv">
                 <?php 
                $currentVisitorShowing = 'DEMODONE';
                $bgcolorHeading = "A569BD";
                $bgcolor = "D2B4DE";
                include 'omvisitordashboardquery.php';
                ?>
            </div>
        </div>
    </div>-->
</div>