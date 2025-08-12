<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 23 Dec, 2022 10:40:31 PM
 *
 * @FileName: oomvisitordashboardquery.php
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
//echo '$staffId'.$staffId;
if ($staffId != '') {
    parse_str(getTableValues("SELECT user_category,user_team FROM user WHERE user_id='$staffId'"));
}
$staffExtendedAccess = $acc_access;
$staffType = $user_category;
$staffTeam = $user_team;
$bgcolorHeadingreq = $_REQUEST['backgroundHead'];
$backgroundreq = $_REQUEST['background'];
if ($bgcolorHeadingreq != '' && $backgroundreq != '') {
    $bgcolorHeading = $bgcolorHeadingreq;
    $bgcolor = $backgroundreq;
}
?>
<div style="text-align: center;font-size: 16px;font-weight: 600;color: #F7F9F9;padding: 8px 0px;border-radius: 3px; background: <?php echo '#'.$bgcolorHeading; ?>">
    <?php
    if (isset($_REQUEST['currentVisitorShowing'])) {
        $currentVisitorShowing = $_REQUEST['currentVisitorShowing'];
    }
    //
    //
    if ($staffId != '' && $staffId != NULL && $staffType != 'Administrator') {
        if ($currentVisitorShowing == 'leads') {
            $qvisitorStatic = "select * from visitor where (visitor_interest = '' OR visitor_interest is NULL) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
            $divId = 'visitorLeadDiv';
            echo "New Lead's";
        } else if ($currentVisitorShowing == 'todaysCall') {
            $todayDate = date('d M Y');
            $todayDateInTime = strtotime($todayDate);
            $qvisitorStatic = "select * from visitor where visitor_indicator IN ('OMCT','OMDT','download_log','OMCR') and (visitor_interest IN ('INT', 'VINT', 'CNR', 'WRNGNUM', 'INVDNUM', 'FAKE', 'NINT', 'NNINT', 'DEMODONE', 'DEMOARRN', 'DEMOINST', 'POSTPOND', 'PUROTHRP')) and UNIX_TIMESTAMP(STR_TO_DATE(visitor_next_date,'%d %b %Y')) <= $todayDateInTime and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
            $divId = 'visitorTodaysCallDiv';
            echo "Today's Call";
        } else if ($currentVisitorShowing == 'VINT') {
            $qvisitorStatic = "select * from visitor where visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
            $divId = 'visitorVintDiv';
            echo "Very Interested";
        } else if ($currentVisitorShowing == 'INT') {
            $qvisitorStatic = "select * from visitor where visitor_interest ='INT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
            $divId = 'visitorintDiv';
            echo 'Interested';
        } else if ($currentVisitorShowing == 'DEMOARRN') {
            $qvisitorStatic = "select * from visitor where visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
            $divId = 'visitorDemoArrDiv';
            echo 'Demo Arranged';
        } else if ($currentVisitorShowing == 'DEMODONE') {
            $qvisitorStatic = "select * from visitor where visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId')";
            $divId = 'visitorDemodoneDiv';
            echo 'Demo Completed';
        }
    } elseif ($staffType == 'Administrator') {
        if ($currentVisitorShowing == 'leads') {
            $qvisitorStatic = "select * from visitor where visitor_lead_team='$staffTeam' and (visitor_interest = '' OR visitor_interest is NULL) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorLeadDiv';
            echo "New Lead's";
        } else if ($currentVisitorShowing == 'todaysCall') {
            $todayDate = date('d M Y');
            $todayDateInTime = strtotime($todayDate);
            $qvisitorStatic = "select * from visitor where visitor_lead_team='$staffTeam' and visitor_indicator IN ('OMCT','OMDT','download_log','OMCR') and (visitor_interest IN ('INT', 'VINT', 'CNR', 'WRNGNUM', 'INVDNUM', 'FAKE', 'NINT', 'NNINT', 'DEMODONE', 'DEMOARRN', 'DEMOINST', 'POSTPOND', 'PUROTHRP')) and UNIX_TIMESTAMP(STR_TO_DATE(visitor_next_date,'%d %b %Y')) <= $todayDateInTime and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorTodaysCallDiv';
            echo "Today's Call";
        } else if ($currentVisitorShowing == 'VINT') {
            $qvisitorStatic = "select * from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorVintDiv';
            echo "Very Interested";
        } else if ($currentVisitorShowing == 'INT') {
            $qvisitorStatic = "select * from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='INT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorintDiv';
            echo 'Interested';
        } else if ($currentVisitorShowing == 'DEMOARRN') {
            $qvisitorStatic = "select * from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorDemoArrDiv';
            echo 'Demo Arranged';
        } else if ($currentVisitorShowing == 'DEMODONE') {
            $qvisitorStatic = "select * from visitor where visitor_lead_team='$staffTeam' and visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorDemodoneDiv';
            echo 'Demo Completed';
        }
    } else {
        if ($currentVisitorShowing == 'leads') {
            $qvisitorStatic = "select * from visitor where (visitor_status = '' OR visitor_status is NULL) and (visitor_interest = '' OR visitor_interest is NULL) and (visitor_staff_id = '' OR visitor_staff_id is null) and (visitor_sec_staff_id = '' OR visitor_sec_staff_id is null) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorLeadDiv';
            echo "New Lead's";
        } else if ($currentVisitorShowing == 'todaysCall') {
            $todayDate = date('d M Y');
            $todayDateInTime = strtotime($todayDate);
            $qvisitorStatic = "select * from visitor where visitor_indicator IN ('OMCT','OMDT','download_log','OMCR') and (visitor_interest IN ('INT', 'VINT', 'CNR', 'WRNGNUM', 'INVDNUM', 'FAKE', 'NINT', 'NNINT', 'DEMODONE', 'DEMOARRN', 'DEMOINST', 'POSTPOND', 'PUROTHRP')) and UNIX_TIMESTAMP(STR_TO_DATE(visitor_next_date,'%d %b %Y')) <= $todayDateInTime and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorTodaysCallDiv';
            echo "Today's Call";
        } else if ($currentVisitorShowing == 'VINT') {
            $qvisitorStatic = "select * from visitor where visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorVintDiv';
            echo "Very Interested";
        } else if ($currentVisitorShowing == 'INT') {
            $qvisitorStatic = "select * from visitor where visitor_interest ='INT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorintDiv';
            echo 'Interested';
        } else if ($currentVisitorShowing == 'DEMOARRN') {
            $qvisitorStatic = "select * from visitor where visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorDemoArrDiv';
            echo 'Demo Arranged';
        } else if ($currentVisitorShowing == 'DEMODONE') {
            $qvisitorStatic = "select * from visitor where visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete')";
            $divId = 'visitorDemodoneDiv';
            echo 'Demo Completed';
        }
    }
    $resvisitorStatic = mysqli_query($conn, $qvisitorStatic);
    $totalvisitorStatic = mysqli_num_rows($resvisitorStatic);
    ?>
</div>
<?php
// how many rows to show per page
$perRowsPerPage = 4;
$doubleLimit = $perRowsPerPage * 2;

// by default we show first page
$perPageNum = 1;

// if $_GET['page'] defined, use it as page number
if (isset($_REQUEST['page'])) {
    $perPageNum = $_REQUEST['page'];
}

// counting the offset
$perOffset = ($perPageNum - 1) * $perRowsPerPage;
$count = 1;
if ($staffId != '' && $staffId != NULL && $staffType != 'Administrator') {
    if ($currentVisitorShowing == 'leads') {
        $queryLeads = "select * from visitor where (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and (visitor_last_comment_date ='' or visitor_last_comment_date is null) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'todaysCall') {
        $queryLeads = "select * from visitor where visitor_indicator IN ('OMCT','OMDT','download_log','OMCR') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and (visitor_interest IN ('INT', 'VINT', 'CNR', 'WRNGNUM', 'INVDNUM', 'FAKE', 'NINT', 'NNINT', 'DEMODONE', 'DEMOARRN', 'DEMOINST', 'POSTPOND', 'PUROTHRP')) and UNIX_TIMESTAMP(STR_TO_DATE(visitor_next_date,'%d %b %Y')) <= $todayDateInTime and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'VINT') {
        $queryLeads = "select * from visitor where visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'INT') {
        $queryLeads = "select * from visitor where visitor_interest ='INT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'DEMOARRN') {
        $queryLeads = "select * from visitor where visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'DEMODONE') {
        $queryLeads = "select * from visitor where visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') and (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    }
} elseif ($staffType == 'Administrator') {
    if ($currentVisitorShowing == 'leads') {
        $queryLeads = "select * from visitor where (visitor_status = '' OR visitor_status is NULL) and (visitor_interest = '' OR visitor_interest is NULL) and (visitor_staff_id = '' OR visitor_staff_id is null) and (visitor_sec_staff_id = '' OR visitor_sec_staff_id is null) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'todaysCall') {
        $queryLeads = "select * from visitor where (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and visitor_indicator IN ('OMCT','OMDT','download_log','OMCR') and (visitor_interest IN ('INT', 'VINT', 'CNR', 'WRNGNUM', 'INVDNUM', 'FAKE', 'NINT', 'NNINT', 'DEMODONE', 'DEMOARRN', 'DEMOINST', 'POSTPOND', 'PUROTHRP')) and UNIX_TIMESTAMP(STR_TO_DATE(visitor_next_date,'%d %b %Y')) <= $todayDateInTime and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'VINT') {
        $queryLeads = "select * from visitor where (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'INT') {
        $queryLeads = "select * from visitor where (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and visitor_interest ='INT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'DEMOARRN') {
        $queryLeads = "select * from visitor where (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'DEMODONE') {
        $queryLeads = "select * from visitor where (visitor_staff_id= '$staffId' or visitor_sec_staff_id='$staffId') and visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    }
} else {
    if ($currentVisitorShowing == 'leads') {
        $queryLeads = "select * from visitor where (visitor_status = '' OR visitor_status is NULL) and (visitor_interest = '' OR visitor_interest is NULL) and (visitor_staff_id = '' OR visitor_staff_id is null) and (visitor_sec_staff_id = '' OR visitor_sec_staff_id is null) and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'todaysCall') {
        $queryLeads = "select * from visitor where visitor_indicator IN ('OMCT','OMDT','download_log','OMCR') and (visitor_interest IN ('INT', 'VINT', 'CNR', 'WRNGNUM', 'INVDNUM', 'FAKE', 'NINT', 'NNINT', 'DEMODONE', 'DEMOARRN', 'DEMOINST', 'POSTPOND', 'PUROTHRP')) and UNIX_TIMESTAMP(STR_TO_DATE(visitor_next_date,'%d %b %Y')) <= $todayDateInTime and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'VINT') {
        $queryLeads = "select * from visitor where visitor_interest ='VINT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'INT') {
        $queryLeads = "select * from visitor where visitor_interest ='INT' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'DEMOARRN') {
        $queryLeads = "select * from visitor where visitor_interest ='DEMOARRN' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    } elseif ($currentVisitorShowing == 'DEMODONE') {
        $queryLeads = "select * from visitor where visitor_interest ='DEMODONE' and (visitor_block_status IS NULL OR visitor_block_status != 'Delete') order by visitor_id desc LIMIT $perOffset, $doubleLimit";
    }
}
$resLeads = mysqli_query($conn, $queryLeads);
$resnoLeads = mysqli_num_rows($resLeads);
if ($resnoLeads > 0) {
    while ($totalLeadsAviable = mysqli_fetch_array($resLeads)) {
        ?>
        <div style="border: 1px solid #0000004f;border-radius: 3px;padding: 4px 4px;margin: 4px 0px;cursor: pointer;background: <?php echo '#'.$bgcolor; ?>;" onclick="leadPanelPopup('<?php echo $totalLeadsAviable['visitor_fname']; ?>', '<?php echo $totalLeadsAviable['visitor_id']; ?>', 'lead_contact_popup', 'lead_popup', '', '<?php echo $totalLeadsAviable['visitor_staff_name']; ?>', '');">
            <div style="display: flex; justify-content: space-between; align-items: center;font-size: 14px;font-weight: 500;color: black;">
                <span><?php echo $totalLeadsAviable['visitor_id']; ?></span> <span><?php echo $totalLeadsAviable['visitor_mobile']; ?></span> 
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;font-size: 14px;font-weight: 500;color: black;">
                <span><?php echo $totalLeadsAviable['visitor_fname']; ?></span> <span><?php echo $totalLeadsAviable['visitor_city']; ?></span> 
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div style="border: 1px solid #0000004f;border-radius: 3px;padding:7px 4px;margin: 4px 0px;cursor: pointer;color: black;text-align:center;background:#fff;font-weight: 600;font-size: 14px;">
        NOTHING TO SHOW
    </div>
    <?php } ?>
<div style="text-align: right;display: flex;justify-content: end;margin: 6px 0px;">
    <?php
    if ($perPageNum > 1) {
        ?>
        <form name="prev_Staff" id="prev_Staff"
              action="javascript:dashboardNextPage('<?php echo $perPageNum - 1; ?>','<?php echo $divId; ?>','<?php echo $currentVisitorShowing; ?>','<?php echo $bgcolorHeading; ?>','<?php echo $bgcolor; ?>');"
              method="get"><input type="submit" value="Previous" class="frm-btn"
                            maxlength="30" size="15" style="margin-right: 5px;" /></form>
        <?php } ?>
        <?php
        if ($totalvisitorStatic > $perOffset) {
            ?>
        <form name="next_Staff" id="next_Staff"
              action="javascript:dashboardNextPage('<?php echo $perPageNum + 1; ?>','<?php echo $divId; ?>','<?php echo $currentVisitorShowing; ?>','<?php echo $bgcolorHeading; ?>','<?php echo $bgcolor; ?>','<?php echo $bgcolorHeading; ?>','<?php echo $bgcolor; ?>');"
              method="get"><input type="submit" value="Next" class="frm-btn"
                            maxlength="30" size="15" /></form>
            <?php
        }
        ?>
</div>
