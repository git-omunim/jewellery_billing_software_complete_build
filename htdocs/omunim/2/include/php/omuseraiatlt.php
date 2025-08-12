<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 16 Feb, 2021 5:57:50 PM
 *
 * @FileName: omuseraiatlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
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
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php'; //added @Author:PRIYA13MAR15
//<!--***********start code to show user reminder list :Author:RUTUJA18FEB21-->
$custId = $_REQUEST['custId'];
// <!--***********start code to individual staff access :Author:SWAPNIL20JAN2020-->
if ($staffId != NULL) {
    $userid = "SELECT user_login_id,user_category FROM user where user_id='$staffId' and user_type='STAFF'";
    $resacitid = mysqli_query($conn, $userid);
    $rowacitid = mysqli_fetch_array($resacitid);
    $acitid = $rowacitid['user_login_id'];
    $user_category = $rowacitid['user_category'];
}

// <!--***********End code to individual staff access :Author:SWAPNIL20JAN2020-->
//if ($custId != NULL) {
//    $userCustid = "SELECT user_fname FROM user where user_id='$custId'";
//    $rescustacitid = mysqli_query($conn, $userCustid);
//    $rowcustacitid = mysqli_fetch_array($rescustacitid);
//    $acituserid = $rowcustacitid['user_fname'];
////    $user_category = $rowcustacitid['user_category'];
//}
?>

<div id="addActionItemDiv">
    <?php
    $selFirmId = NULL;
    $listPanel = $_GET['listPanel'];
////    $todoListAccess = $_GET['todoListAccess'];
//    //
    if ($listPanel == 'doneList') {
        $statusStr = " acit_status IN ('Done') ";
        /* START CODE TO ADD CONDITION FOR COMPLETE LIST @AUTHOR:MADHUREE-07JULY2020 */
    } else if ($listPanel == 'completeList') {
        $statusStr = " acit_status IN ('Complete') ";
        /* END CODE TO ADD CONDITION FOR COMPLETE LIST @AUTHOR:MADHUREE-07JULY2020 */
    } else if ($listPanel == 'deletedList') {
        $statusStr = " acit_status IN ('Deleted') ";
    } else {
        $statusStr = " acit_status IN ('Active','Updated') ";
    }
//    if (isset($_GET['searchKeyword'])) {
//        $searchKeyword = $_GET['searchKeyword'];
//    }
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        $selFirmId = $_SESSION['setFirmSession'];
    }
//    if (isset($_GET['sortKeyword'])) {
//        $sortKeyword = $_GET['sortKeyword'];
//    }
//    if (isset($_GET['searchColumn'])) {
//        $searchColumn = $_GET['searchColumn'];
//    }
//    if (isset($_GET['searchValue'])) {
//        $searchValue = $_GET['searchValue'];
//    }
    if (isset($_GET['sNo'])) {
        $sNo = $_GET['sNo'];
    }
//    //
//    if ($sortKeyword == '')
//        $sortKeyword = 'acit_login_id';
//    
//    //
//    $searchColumnName = $searchColumn;
//    $searchColumnValue = $searchValue;
//
//    $sortKeyword = stripslashes($sortKeyword);
//    $searchColumn = stripslashes($searchColumn);
//
//    $sortKeywordValue = $sortKeyword;
//    $sortKeywordValue = stripslashes($sortKeywordValue);
//
    $updateRows = $_GET['updateRows'];

    if ($updateRows == 'updateRows' || $updateRows == 'AcitUpdateRows') {
        $rowsPerPage = $_GET['rowsPerPage'];
        $ominValue = $rowsPerPage;
        $ominOption = 'indiacitpnrw';
        include 'ommpindc.php';
    }
    $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indiacitpnrw'";
    $resGNoOfRows = mysqli_query($conn, $qSelGNoOfRows);
    $rowGNoOfRows = mysqli_fetch_array($resGNoOfRows, MYSQLI_ASSOC);
    $rowsPerPage = $rowGNoOfRows['omin_value'];
    if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
        $rowsPerPage = 10;
    }
    $checkNextRows = $rowsPerPage * 2;
// by default we show first page
    $pageNum = 1;
    $gCounter = 0;
// if $_GET['page'] defined, use it as page number
    if (isset($_GET['page'])) {
        $pageNum = $_GET['page'];
        $gCounter = ($pageNum - 1) * $rowsPerPage;
    }
// counting the offset
    $perOffset = ($pageNum - 1) * $rowsPerPage;
    $isAtrate = strpos($searchColumn, '@');

    if ($isAtrate == true) {
        $searchColumn = explode("@", $searchColumn);
        $searchColumn1 = $searchColumn[0];
        $searchColumn2 = $searchColumn[1];
        $searchColumn3 = $searchColumn[2];

        if ($searchColumn1 == "DAY(STR_TO_DATE(acit_start_DOB,'%d/%m/%Y'))" || $searchColumn1 == "DAY(STR_TO_DATE(acit_end_DOB,'%d/%m/%Y'))") {
            $isDot = strpos($searchValue, '.');

            if ($isDot == true) {
                $searchValue = explode(".", $searchValue);
                $searchValue1 = $searchValue[0];
                $searchValue2 = $searchValue[1];
                $searchValue3 = $searchValue[2];
                if ($searchValue3 == '') {
                    $searchColumnStr = " and $searchColumn2='$searchValue1' and $searchColumn3 = '$searchValue2' ";
                } else if ($searchValue1 != '' && $searchValue2 != '' && $searchValue3 != '') {
                    $searchColumnStr = " and $searchColumn1='$searchValue1' and $searchColumn2='$searchValue2' and $searchColumn3 = '$searchValue3' ";
                }
            } else {
                $searchColumnStr = " and $searchColumn3 ='$searchValue' ";
            }
            if ($searchColumn1 == "DAY(STR_TO_DATE(acit_start_DOB,'%d/%m/%Y'))")
                $dateStr = " order by STR_TO_DATE(acit_start_DOB,'%d %b %Y') asc ";
            else
                $dateStr = " order by STR_TO_DATE(acit_end_DOB,'%d %b %Y') asc ";
        }
    } else {
        if ($searchColumn != NULL)
            $searchColumnStr = " and $searchColumn LIKE '$searchValue%' ";
    }
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]'";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' order by firm_since desc";
    }
    if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
        $resFirmCount = mysqli_query($conn, $qSelFirmCount) or die(mysqli_error($conn));
        $strFrmId = '0';

        //Set String for Public Firms
        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
            $strFrmId = $strFrmId . ",";
            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        }
    } else {
        $strFrmId = $selFirmId;
    }
//    
//    
 if ($custId != NULL && $custId != '') {
     $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_user_id ='$custId' order by STR_TO_DATE(acit_since,'%d %b %Y') desc";
     $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]'  and acit_user_id='$custId'  and $statusStr and acit_FirmId IN ($strFrmId) order by STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
       
    }
//    //// <!--***********start code to individual staff access :Author:SWAPNIL20JAN2020-->
//    if ($sortKeyword != NULL) {
//        echo'1';
//        if ($staffId != NULL && $staffId != '') {
//              echo'2';
//            $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id='$acitid' and acit_login_id NOT IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
//            $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id='$acitid' and acit_login_id NOT IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
//        } else if ($user_category == 'Administrator') {
//              echo'3';
//            $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_login_id NOT IN ('','NotSelected') and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
//            $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id NOT IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
//        } else {
//            echo'4';
//            if ($listPanel == 'staffActionItemList') {
//                echo'5';
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id NOT IN ('','NotSelected') order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id NOT IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
//            } else if ($listPanel == 'doneList' || $listPanel == 'deletedList' || $listPanel == 'completeList') {
//                echo'6';
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
//            } else {
//                echo'7';
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id IN ('','NotSelected') order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
////                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_user_id IN ('','NotSelected') order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
////                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_user_id='$acituserid'  and acit_user_id IN ('Selected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
////           
////                 $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_user_id IN ('','NotSelected') order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
////                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_user_id='$acituserid'  and acit_user_id IN ('Selected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
////           
//                
//                echo '$totActionItemForPaging=='.$totActionItemForPaging.'</br>';
//                echo '$qSelActionItem###'.$qSelActionItem;
//                }
//        }
//    } else if ($searchColumnStr != NULL) {
//        if ($dateStr != '' || $dateStr != NULL) {
//            $selDateStr = $dateStr;
//        } else {
//            $selDateStr = " order by STR_TO_DATE(acit_since,'%d %b %Y') desc ";
//        }
//        if ($staffId != NULL && $staffId != '') {
//            $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' $searchColumnStr and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id NOT IN ('','NotSelected') $selDateStr";
//            $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id='$acitid' and acit_login_id NOT IN ('','NotSelected') $searchColumnStr and $statusStr and acit_FirmId IN ($strFrmId) $selDateStr LIMIT $perOffset, $rowsPerPage";
//        } else if ($user_category == 'Administrator') {
//            $$totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' $searchColumnStr and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id NOT IN ('','NotSelected') $selDateStr";
//            $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' $searchColumnStr and $statusStr and acit_login_id NOT IN ('','NotSelected') and acit_FirmId IN ($strFrmId) $selDateStr LIMIT $perOffset, $rowsPerPage";
//        } else {
//            if ($listPanel == 'staffActionItemList') {
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id NOT IN ('','NotSelected') order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id NOT IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
//            } else if ($listPanel == 'doneList' || $listPanel == 'deletedList' || $listPanel == 'completeList') {
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' $searchColumnStr and $statusStr and acit_FirmId IN ($strFrmId) $selDateStr";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' $searchColumnStr and $statusStr and acit_FirmId IN ($strFrmId) $selDateStr LIMIT $perOffset, $rowsPerPage";
//            } else {
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' $searchColumnStr and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id IN ('','NotSelected') $selDateStr";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' $searchColumnStr  and acit_login_id IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId) $selDateStr LIMIT $perOffset, $rowsPerPage";
//            }
//        }
//    } else {
//        if ($staffId != NULL && $staffId != '') {
//            $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id='$acitid' and acit_login_id NOT IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId)";
//            $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]'and acit_login_id='$acitid' and $statusStr and acit_FirmId IN ($strFrmId)  and acit_login_id NOT IN ('','NotSelected') order by acit_subject asc LIMIT $perOffset, $rowsPerPage";
//        } else if ($user_category == 'Administrator') {
//            $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id NOT IN ('','NotSelected')";
//            $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId)  and acit_login_id NOT IN ('','NotSelected') order by acit_subject asc LIMIT $perOffset, $rowsPerPage";
//            //echo 'hello1'.hello1;
//        } else {
//            if ($listPanel == 'staffActionItemList') {
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id NOT IN ('','NotSelected') order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id NOT IN ('','NotSelected') and $statusStr and acit_FirmId IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(acit_since,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage";
//            } else if ($listPanel == 'doneList' || $listPanel == 'deletedList' || $listPanel == 'completeList') {
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId)";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) order by acit_subject asc LIMIT $perOffset, $rowsPerPage";
//            } else {
//                $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id IN ('','NotSelected')";
//                $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and $statusStr and acit_FirmId IN ($strFrmId)  and acit_login_id IN ('','NotSelected') order by acit_subject asc LIMIT $perOffset, $rowsPerPage";
//            }
//        }
//        // <!--***********End code to individual staff access :Author:SWAPNIL20JAN2020-->
//    }
//    //echo '$qSelActionItem'.$qSelActionItem;
//    if ($todoListAccess == 'YES' && $staffId != NULL && $staffId != '') {
//        $todoStaffId = $_GET['staffId'];
//        parse_str(getTableValues("SELECT user_login_id FROM user WHERE user_type='STAFF' AND user_id='$todoStaffId'"));
//        $todoStaffLoginId = $user_login_id;
//        echo 'TESTING';
//        $totActionItemForPaging = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' and acit_login_id='$todoStaffLoginId' and $statusStr and acit_login_id NOT IN ('','NotSelected') and acit_FirmId IN ($strFrmId)";
//        $qSelActionItem = "SELECT * FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]'  and acit_login_id='$todoStaffLoginId' and $statusStr and acit_FirmId IN ($strFrmId) and acit_login_id NOT IN ('','NotSelected') order by acit_subject asc LIMIT $perOffset, $rowsPerPage";
////        echo '$totActionItemForPaging : '.$totActionItemForPaging.'<br>';
////        echo '$qSelActionItem : '.$qSelActionItem.'<br>';
//        $resActionItemForPaging = mysqli_query($conn, $totActionItemForPaging) or die(mysqli_error($conn));
//        $totalAcitCheck = mysqli_num_rows($resActionItemForPaging);
//    } else {
//        $totalAcitCheck = 1;
//    }
//    //echo '$totActionItemForPaging : '.$totActionItemForPaging;
//
    if (($totalAcitCheck % $rowsPerPage) == 0) {
        $noOfPagesAsLink = $totalAcitCheck / $rowsPerPage;
    } else {
        $noOfPagesAsLink = ($totalAcitCheck / $rowsPerPage) + 1;
    }
    $resActionItem = mysqli_query($conn, $qSelActionItem) or die(mysqli_error($conn));
    $totalNextGirvi = mysqli_num_rows($resActionItem);
    ?>
    <table border="0" cellspacing="0" cellpadding="1" width="100%">
     <tr>
                <td align="left" colspan="2">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td valign="bottom" align="left" width="33px" >
                                <img src="<?php echo $documentRoot; ?>/images/actions32.png" alt="omgold jewellery home" />
                            </td>
                            <td align="left" width="120px" class="marginTop7"
                                title="इस पॅनल की सहायता से आप अपने ज़रूरी कार्यो की सूची बना सकते है! &#10;This panel will help you to make the list of your important works!">
                                <img src="<?php echo $documentRoot; ?>/images/to-do.png" alt="TO DO LIST" />
                            </td>
                            <td align="left" width="60px" class="marginTop7">
                                <!----------Start code to add code @Author:PRIYA11JUL14-------------->
                                <?php
                                $qSelNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indiacitpnrw'";
                                $resNoOfRows = mysqli_query($conn, $qSelNoOfRows);
                                $rowNoOfRows = mysqli_fetch_array($resNoOfRows, MYSQLI_ASSOC);
                                $rowsPerPage = $rowNoOfRows['omin_value'];
                                if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
                                    $rowsPerPage = 10;
                                }
                                ?>
                                (<input id="acitRowsPerPage" name="acitRowsPerPage" type="text" value="<?php echo $rowsPerPage; ?>" title="Enter number of Items To See In List"
                                        size="1" maxlength="4" class="inputFieldWithotBorder orange"
                                        onkeyup="if (event.keyCode == 13 && document.getElementById('acitRowsPerPage').value != '') {
                                                    showNoOfRows('<?php echo $documentRoot; ?>', document.getElementById('acitRowsPerPage').value, '1', 'AcitUpdateRows', '<?php echo $panel; ?>', '');
                                                    document.getElementById('rowsPerPage').value = '';
                                                }"
                                        onblur="if (document.getElementById('acitRowsPerPage').value != '') {
                                                    showNoOfRows('<?php echo $documentRoot; ?>', document.getElementById('acitRowsPerPage').value, '1', 'AcitUpdateRows', '<?php echo $panel; ?>', '');
                                                    document.getElementById('rowsPerPage').value = '';
                                                }"
                                        onclick="this.placeholder = 'ROWS';
                                                this.value = '';"
                                        onkeypress="javascript:return valKeyPressedForNumber(event);"   />)
                                <!----------End code to add code @Author:PRIYA11JUL14-------------->
                            </td>
                            <!--  START CODE PRIYA24 -->
                            <td valign="middle" align="center" width="5px">
                                &nbsp;
                            </td>
<!--                            <td valign="middle" align="center" width="18px" title="Click here to Add New Action Item!">
                                <a style="cursor: pointer;" onclick="showAddNewActionItemDiv()">
                                    <img src="<?php echo $documentRoot; ?>/images/update16.png" alt="" class="marginTop5" />
                                </a>
                            </td>-->
                            <!--  END CODE PRIYA24 -->

                            <!--START CODE TO ADD DIV @AUTHOR:PRIYA19JAN13-->
                            <!-------------Start code to change div @Author:PRIYA03JUL14------------->
                            <td align="center" valign="bottom">
                                <div class="analysis_div_rows" id="messDisplayDiv">
                                    <?php
                                    $getMessage = $_GET['message'];
                                    if ($getMessage != '') {
                                        echo $getMessage;
                                    }
                                    ?>
                                </div>
                            </td>
                            <!-------------End code to change div @Author:PRIYA03JUL14------------->
                            <!--END CODE TO ADD DIV @AUTHOR:PRIYA19JAN13-->
                            <td valign="middle" align="center" width="5px">
                                <div id="ajaxLoadSrchCustToAddGirviDiv" style="visibility: hidden">
                                    <?php include 'omzaajld.php'; ?>
                                </div>
                            </td>
                            <td valign="middle" align="left" width="100px" title="Click To View List !">
                                <div class="floatLeft cursor selectWithoutArrow_noFont bold">
                                    <select id="acitList" name="acitList"
                                            onchange="javascript: getActionItemList(this.value,'<?php echo $custId; ?>');"
                                            class="cursor selectWithoutArrow_noFont fs_13">
                                        <option value="activeList" <?php echo $optionDailyAcitSel[0]; ?>>ACTIVE LIST</option>
                                        <option value="doneList" <?php echo $optionDailyAcitSel[1]; ?>>DONE LIST</option>
                                        <!-- START CODE TO ADD OPTION STAFF ACTION ITEM LIST FOR OWNER @AUTHOR:MADHUREE-03JULY2020 -->
                                        <!--<option value="completeList" <?php echo $optionDailyAcitSel[4]; ?>>COMPLETE LIST</option>-->
                                        <!-- END CODE TO ADD OPTION STAFF ACTION ITEM LIST FOR OWNER @AUTHOR:MADHUREE-03JULY2020 -->
                                        <option value="deletedList" <?php echo $optionDailyAcitSel[2]; ?>>DELETED LIST</option>
                                        <!-- START CODE TO ADD OPTION STAFF ACTION ITEM LIST FOR OWNER @AUTHOR:MADHUREE-03JULY2020 -->
                                        <?php if ($staffId == '' || $staffId == NULL) { ?>
                                            <!--<option value="staffActionItemList" <?php echo $optionDailyAcitSel[3]; ?>>STAFF TO-DO LIST</option>-->
                                        <?php }
                                        ?>
                                        <!-- END CODE TO ADD OPTION STAFF ACTION ITEM LIST FOR OWNER @AUTHOR:MADHUREE-03JULY2020 -->
                                    </select>
                                </div>
                            </td> 
                            <td valign="middle" align="right" width="15px" style="padding-top: 8px;" title="Click To close details ! ">
                                <div id="ajaxCloseAddNewActionItem" style="visibility: hidden" class="ajaxClose">
                                    <a style="cursor: pointer;" onclick="closeAddMoreActionItemTaskDiv();">
                                        <?php include 'omzaajcl.php'; ?>
                                    </a>
                                </div>
                            </td> 
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><!---Change in line @AUTHOR: SANDY09JAN14----->
                    <div class="hrGold"></div>
                </td>
            </tr>
    </table>
    <div id ="acitListDiv">
    <table border="0" cellspacing="0" cellpadding="1" width="100%">
        <?php
        if ($sNo == '')
            $sNo = 1;
        else {
            $sNo = $perOffset + 1;
        }
        $cat;
        if ($totalNextGirvi <= 0) {
            ?>
            <tr>
                <td valign="middle" align="center" class="ff_tnr fs_12 brown">
                    <?php if ($searchColumn != NULL) { ?>NO RECORED FOUND<?php } ?>
                </td>
            </tr>
            <?php if (($totalAcitCheck != NULL || $totalAcitCheck == 0) && $searchColumn != NULL) { ?>
                <tr>
                    <td valign="middle" align="center" width="58px" height="50px">
                        <a onclick="searchActionItemPanel('<?php echo $documentRoot; ?>', '', '', '', '', '', '');"
                           style="cursor: pointer;">
                            <img src="<?php echo $documentRoot; ?>/images/back32.png" alt="Back" 
                                 title="Click to get back on page!"/>
                        </a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?> 
            <tr>
                <td align="center">
                    <div class="ff_calibri fs_13 fw_b brown">S NO</div>
                </td>
                <td align="left" class="ff_calibri fs_13 fw_b brown">
                    <table border="0" cellspacing="0" cellpadding="0" align="left">
                        <tr>
                            <td align="left">

                                <div class="ff_calibri fs_13 fw_b brown spaceLeft5">
                                    <input id="taskDescTitle" type="text" name="taskDescTitle" placeholder="TASK DESC"
                                           value = "<?php
                                           if ($searchColumnName == 'acit_subject')
                                               echo $searchColumnValue;
                                           else
                                               echo 'TASK DESC';
                                           ?>"
                                           onclick = "javascript:this.value = '';"
                                           onblur = "javascript:if (document.getElementById('taskDescTitle').value != '') {
                                                           searchActionItemPanel('<?php echo $documentRoot; ?>', 'acit_subject', document.getElementById('taskDescTitle').value,
                                                                   '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>', '<?php echo $sNo; ?>');
                                                       } else {
                                                           document.getElementById('taskDescTitle').value = '<?php
                                           if ($searchColumnValue == 'acit_subject')
                                               echo $searchColumnValue;
                                           else
                                               echo 'TASK DESC';
                                           ?>';
                                                       }"
                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('taskDescTitle').value != '') {
                                                           searchActionItemPanel('<?php echo $documentRoot; ?>', 'acit_subject', document.getElementById('taskDescTitle').value,
                                                                   '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>', '<?php echo $sNo; ?>');
                                                       }"
                                           size = "7" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" />
                                </div>
                            </td> 
<!--                            <td align="left">
                                <a style="cursor: pointer;" title="Click To View List By Desc"
                                   onclick="sortActionItemPanel('<?php echo $documentRoot; ?>', 'acit_subject', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>');">
                                       <?php if ($sortKeywordValue == "acit_subject") { ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                </a>
                            </td>-->
                        </tr>
                    </table>
                </td>
                <td align="left" class="ff_calibri fs_13 fw_b brown">
                    <table border="0" cellspacing="0" cellpadding="0" align="left">
                        <tr>
                            <td align="left">
                                <div class="ff_calibri ff_calibri fs_13 fw_b brown">
                                    <input id="taskCatTitle" type="text" name="taskCatTitle" placeholder="CATEGORY"
                                           value = "<?php
                                           if ($searchColumnName == 'acit_category')
                                               echo $searchColumnValue;
                                           else
                                               echo 'CATEGORY';
                                           ?>"
                                           onclick = "javascript:this.value = '';"
                                           onblur = "javascript:if (document.getElementById('taskCatTitle').value != '') {
                                                           searchActionItemPanel('<?php echo $documentRoot; ?>', 'acit_category', document.getElementById('taskCatTitle').value,
                                                                   '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>', '<?php echo $sNo; ?>');
                                                       } else {
                                                           document.getElementById('taskCatTitle').value = '<?php
                                           if ($searchColumnValue == 'acit_category')
                                               echo $searchColumnValue;
                                           else
                                               echo 'CATEGORY';
                                           ?>';
                                                       }"
                                           onkeyup = "if (event.keyCode == 13 && document.getElementById('taskCatTitle').value != '') {
                                                           searchActionItemPanel('<?php echo $documentRoot; ?>', 'acit_category', document.getElementById('taskCatTitle').value,
                                                                   '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>', '<?php echo $sNo; ?>');
                                                       }"
                                           size = "7" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5" />
                                </div>
                            </td>
<!--                            <td align="left">
                                <a style="cursor: pointer;" title="Click To View List By Category"
                                   onclick="sortActionItemPanel('<?php echo $documentRoot; ?>', 'acit_category', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>')">
                                       <?php if ($sortKeywordValue == "acit_category") { ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                </a>
                            </td>-->
                        </tr>
                    </table>
                </td>
                <td align="left" class="ff_calibri fs_13 fw_b brown" width='120px'>
                    <table border="0" cellspacing="0" cellpadding="0" width='100%' align="left">
                        <tr>
                            <td align="left">
                                <input id="sDate" type="text" name="sDate" placeholder="DD.MM.YY" 
                                       value="<?php
                                       if ($searchColumnName == "DAY(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'))@MONTH(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'))@DATE_FORMAT(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'),\'%y\')")
                                           echo $searchColumnValue;
                                       else
                                           echo 'START DATE';
                                       ?>" 
                                       onclick="this.value = '';"
                                       onblur="javascript:if (document.getElementById('sDate').value != '') {
                                                       searchActionItemPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'))@MONTH(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'))@DATE_FORMAT(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'),\'%y\')', document.getElementById('sDate').value,
                                                               '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>', '<?php echo $sNo; ?>');
                                                   } else {
                                                       document.getElementById('sDate').value = '<?php
                                       if ($searchColumnName == "DAY(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'))@MONTH(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'))@DATE_FORMAT(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'),\'%y\')")
                                           echo $searchColumnValue;
                                       else
                                           echo 'START DATE';
                                       ?>';
                                                   }"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                          
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('sDate').value != '') {
                                                       searchActionItemPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'))@MONTH(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'))@DATE_FORMAT(STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\'),\'%y\')', document.getElementById('sDate').value,
                                                               '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>', '<?php echo $sNo; ?>');
                                                   }"
                                       size="8" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                            </td>
<!--                            <td align="left">
                                <a style="cursor: pointer;" title="Click To View List By Start date"
                                   onclick="sortActionItemPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(acit_start_DOB,\'%d/%m/%Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>')">
                                       <?php if ($sortKeywordValue == "STR_TO_DATE(acit_start_DOB,'%d/%m/%Y')") { ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                </a>
                            </td>-->
                        </tr>
                    </table>
                </td>
                <td align="left" class="ff_calibri fs_13 fw_b brown" width='120px'>

                    <table border="0" cellspacing="0" cellpadding="0" width='100%' align="left">
                        <tr>
                            <td align="left">
                                <input id="eDate" type="text" name="eDate" placeholder="DD.MM.YY" 
                                       value="<?php
                                       if ($searchColumnName == "DAY(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'))@MONTH(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'))@DATE_FORMAT(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'),\'%y\')")
                                           echo $searchColumnValue;
                                       else
                                           echo 'END DATE';
                                       ?>" 
                                       onclick="this.value = '';"
                                       onblur="javascript:if (document.getElementById('eDate').value != '') {
                                                       searchActionItemPanel('<?php echo $documentRoot; ?>', 'DAY(acit_end_DOB,\'%d/%m/%Y\'))@MONTH(acit_end_DOB,\'%d/%m/%Y\'))@DATE_FORMAT(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\')', document.getElementById('eDate').value,
                                                               '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>', '<?php echo $sNo; ?>');
                                                   } else {
                                                       document.getElementById('eDate').value = '<?php
                                       if ($searchColumnName == "DAY(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'))@MONTH(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'))@DATE_FORMAT(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'),\'%y\')")
                                           echo $searchColumnValue;
                                       else
                                           echo 'END DATE';
                                       ?>';
                                                   }"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                          
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('eDate').value != '') {
                                                       searchActionItemPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'))@MONTH(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'))@DATE_FORMAT(STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\'),\'%y\')', document.getElementById('eDate').value,
                                                               '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>', '<?php echo $sNo; ?>');
                                                   }"
                                       size="7" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                            </td>
<!--                            <td align="left">
                                <a style="cursor: pointer;" title="Click To View List By End Date"
                                   onclick="sortActionItemPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(acit_end_DOB,\'%d/%m/%Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>')">
                                       <?php if ($sortKeywordValue == "STR_TO_DATE(acit_end_DOB,'%d/%m/%Y')") { ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                </a>
                            </td>-->
                        </tr>
                    </table>
                </td>
                <?php if ($listPanel != 'completeList') { ?>
                    <td align="center">
                        <div class="ff_calibri fs_13 fw_b brown">DONE</div>
                    </td>
                    <!--***********start code to hide delete and Reschedule :Author:SWAPNIL14JAN2020-->
                    <?php if ($staffId == '' || ($staffId && $array['updateActionItemAccess'] == 'true')) { ?>
                        <td align="center">
                            <div class="ff_calibri fs_13 fw_b brown">RESCHEDULE</div>
                        </td>
                    <?php } ?>
                    <?php if ($staffId == '' || ($staffId && $array['updateActionItemAccess'] == 'true')) { ?>
                        <td align="center">
                            <div class="ff_calibri fs_13 fw_b brown">DELETE</div>
                        </td>
                    <?php } ?>
                <?php } else { ?>
                    <td align="left">
                        <div class="ff_calibri fs_13 fw_b brown spaceLeft5">DONE DATE</div>
                    </td>
                    <td align="left">
                        <div class="ff_calibri fs_13 fw_b brown spaceLeft5">COMPLETE DATE</div>
                    </td>
                <?php } ?>
                <td align="left">
                    <div class="ff_calibri fs_13 fw_b brown spaceLeft5">USER NAME</div>
                </td>
                <td align="left">
                    <div class="ff_calibri fs_13 fw_b brown spaceLeft5">OCCURRENCE</div>
                </td>
                
                <td align="left">
                    <div class="ff_calibri fs_13 fw_b brown spaceLeft5">STAFF ID

<!--                        <a style="cursor: pointer;" title="Click To View List By Category"
                           onclick="sortActionItemPanel('<?php echo $documentRoot; ?>', 'acit_login_id', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $listPanel; ?>')">
                               <?php if ($sortKeywordValue == "acit_login_id") { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                            <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>-->
                    </div>
                </td>

                <td align="left">
                    <div class="ff_calibri fs_13 fw_b brown spaceLeft5">FIRM</div>
                </td>
            </tr>
            <?php
            $todayDate = strtoupper(date('yy-m-d'));
            $staffCheck;
            while ($rowActionItem = mysqli_fetch_array($resActionItem, MYSQLI_ASSOC)) {
                parse_str(getTableValues("SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and"
                                . " firm_id='$rowActionItem[acit_FirmId]'"));

                $date = explode(" ", $rowActionItem['acit_start_DOB']);
                $date = $date[0];
                $eDate = explode(" ", $rowActionItem['acit_end_DOB']);
                $eDate = $eDate[0];

                $staff = explode(" ", $rowActionItem['acit_login_id']);
                $staff = $staff[0];
                
                $custId = $rowActionItem['acit_user_id'];
                
                $custAcitId = $rowActionItem['acit_id'];


//                echo '$eDate'.$eDate;
                if (($staffId != NULL && $staffId != '') || ($listPanel == 'staffActionItemList' || $listPanel == 'doneList' || $listPanel == 'deletedList' || $listPanel == 'completeList')) {
                    if ($sortKeyword == 'acit_login_id' && om_strtoupper($staffCheck) != om_strtoupper($staff)) {
                        ?>
                        <tr>
                            <td align="left" class="paddingLeft15 ff_calibri fs_13 fw_b" colspan="12">
                                <div class="ff_calibri fs_13"><?php echo om_strtoupper($staff); ?>&nbsp;TO-LIST</div>
                            </td>
                        </tr>
                        <?php
                    }
                }
                if ($sortKeyword == 'acit_category' && om_strtoupper($rowActionItem['acit_category']) != om_strtoupper($cat)) {
                    ?>
                    <tr>
                        <td align="left" class="paddingLeft15 ff_calibri fs_13 fw_b" colspan="12">
                            <div class="ff_calibri fs_13"><?php echo om_strtoupper($rowActionItem['acit_category']); ?>&nbsp;TO-LIST</div>
                        </td>
                    </tr>
                    <?php
                }
                if ($sortKeyword == "STR_TO_DATE(acit_start_DOB,'%d/%m/%Y')" && $date != $startDate) {
                    ?>
                    <tr>
                        <td align="left" class="paddingLeft15 ff_calibri fs_13 fw_b" colspan="12">
                            <div class="ff_calibri fs_13"><?php echo $date; ?>&nbsp;TO-LIST</div>
                        </td>
                    </tr>
                <?php } else if ($sortKeyword == "STR_TO_DATE(acit_end_DOB,'%d/%m/%Y')" && $eDate != $endDate) {
                    ?>
                    <tr>
                        <td align="left" class="paddingLeft15 ff_calibri fs_13 fw_b" colspan="12">
                            <div class="ff_calibri fs_13"><?php echo $eDate; ?>&nbsp;TO-LIST</div>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td align="center">
                        <div class="ff_calibri fs_13"><?php echo $sNo; ?></div>
                    </td>
                    <?php if ($staffId == '' || ($staffId && $array['updateActionItemAccess'] == 'true') || $user_category == 'Administrator') { ?>
                        <td align="left"><!--***********Start code to add update function for Reminder Panel:Author:SANT07FEB17-->
                            <div class="ff_calibri fs_13 spaceLeft5">
                                <?php if ($paypanelName == 'ReminderPanel') { ?>
                                    <a style="cursor: pointer;" title="CLICK TO UPDATE/MODIFY DETAILS!"

                                       onclick="showUpdateReminderItemDiv('<?php echo $rowActionItem['acit_id']; ?>');"> 
                                        <div class="orangeCalibriLink"><?php echo $rowActionItem['acit_subject']; ?></div>
                                    </a>
                                <?php } else { ?>
                                    <a style="cursor: pointer;" title="CLICK TO UPDATE/MODIFY DETAILS!"
                                    <?php if ($listPanel != 'completeList') { ?>
                                           onclick="showUpdateNewActionItemDiv('<?php echo $rowActionItem['acit_id']; ?>');" <?php } ?>>
                                        <div <?php if ($todayDate == $date) { ?> style="color:#228df2;" <?php } ?><?php if ($eDate == $todayDate || $eDate < $todayDate) { ?> style="color:#d10a0a;" <?php } ?>><?php echo strtoupper($rowActionItem['acit_subject']); ?></div>
                                    </a>
                                </div>

                            </td><!--***********End code to add update function for Reminder Panel:Author:SANT07FEB17-->
                        <?php } ?>
                    <?php } else {
                        ?>
                        <!--//***********Start code to add update function for Reminder Panel:Author:SANT07FEB17-->
                        <td align="left">

                            <div class="ff_calibri fs_13 spaceLeft5">
                                <?php if ($paypanelName == 'ReminderPanel') { ?>
                                    <a style="cursor: pointer;" 

                                       onclick=""> 
                                        <div class="orangeCalibriLink"><?php echo strtoupper($rowActionItem['acit_subject']); ?></div>
                                    </a>
                                <?php } else { ?>
                                    <!--***********Start code to Remove  update function for staff Panel:Author:SWAPNIL22JAN2020-->
                                    <a style="cursor: pointer;" 

                                       onclick="">  
                                        <!--\\ check condition to change color task description author @SWAPNIL10FEB2020-->
                                        <div <?php if ($todayDate == $date || strtoupper(date('jMY')) == $date) { ?> style="color:#228df2;" <?php } ?><?php if ($eDate == $todayDate || $eDate < $todayDate || $eDate == strtoupper(date('jMY')) || $eDate < strtoupper(date('jMY'))) { ?> style="color:#d10a0a;" <?php } ?>><?php echo strtoupper($rowActionItem['acit_subject']); ?></div>
                                    </a>
                                    <!--***********End code to Remove  update function for staff Panel:Author:SWAPNIL22JAN2020-->

                                </div>

                                <!--</td>***********End code to add update function for Reminder Panel:Author:SANT07FEB17-->
                            <?php } ?>
                        <?php }
                        ?>

                    <td align="left">
                        <div class="ff_calibri fs_13 spaceLeft5"><?php echo strtoupper($rowActionItem['acit_category']); ?></div>
                    </td>
                    <td align="left">
                        <?php
                        $acitStartDateArray = explode(' ', $rowActionItem['acit_start_DOB']);
                        $acitStartDate = $acitStartDateArray[0];
                        ?>
                        <div class="ff_calibri fs_13 spaceLeft5"> <?php echo $acitStartDate; ?> </div>
                    </td>
                    <td align="left">
                        <?php
                        $acitEndDateArray = explode(' ', $rowActionItem['acit_end_DOB']);
                        $acitEndDate = $acitEndDateArray[0];
                        ?>
                        <div class="ff_calibri fs_13 spaceLeft5"><?php echo $acitEndDate; ?></div>
                    </td>
                    <?php
                    if ($listPanel != 'completeList') {
                        if ($listPanel == 'doneList' || $listPanel == 'deletedList') {
                            ?>
                            <td align="center">
                                <a style="cursor: pointer;"  id="<?php echo "$actionItemID"; ?>" onclick="addActionItemToDoneList('<?php echo $rowActionItem['acit_id']; ?>', 'doneList');">
                                    <img src="<?php echo $documentRoot; ?>/images/active.png" alt="" class="marginTop5" />
                                </a>
                            </td>
                        <?php } else { ?>
                            <td align="center">
                                <a style="cursor: pointer;"  id="<?php echo "$actionItemID"; ?>" onclick="addActionItemToDoneList('<?php echo $rowActionItem['acit_id']; ?>', 'activeList');">
                                    <img src="<?php echo $documentRoot; ?>/images/right16.png" alt="" class="marginTop5" />
                                </a>
                            </td>
                        <?php } ?>
                        <!------Start code to add conditions to check staffId @Author:PRIYA13MAR15---------->
                        <?php if ($staffId == '' || ($staffId && $array['updateActionItemAccess'] == 'true')) { ?>
                            <td align="center">
                                <?php if ($staffId == '' || ($staffId && $array['updateActionItemAccess'] == 'true')) { ?>
                                    <a style="cursor: pointer;"  id="<?php echo "$actionItemID"; ?>" onclick="showUpdateNewActionItemDiv('<?php echo $rowActionItem['acit_id']; ?>');">
                                        <img src="<?php echo $documentRoot; ?>/images/update16.png" alt="" class="marginTop5"/>
                                    </a>
                                <?php } ?>
                            </td>
                            <td align="center">
                                <?php if ($staffId == '' || ($staffId && $array['deleteActionItemAccess'] == 'true')) { ?>
                                    <a style="cursor: pointer;" onclick="deleteActionItem('<?php echo $rowActionItem['acit_id']; ?>', '<?php echo $listPanel; ?>');">
                                        <img src="<?php echo $documentRoot; ?>/images/delete16.png"/>
                                    </a>
                                <?php } ?>
                            </td>
                            <?php
                        }
                    } else {
                        ?>
                        <td align="left">
                            <?php
                            $acitDoneDateArray = explode(' ', $rowActionItem['acit_done_date']);
                            $acitDoneDate = $acitDoneDateArray[0];
                            ?>
                            <div class="ff_calibri fs_13 spaceLeft5"> <?php echo $acitDoneDate; ?> </div>
                        </td>
                        <td align="left">
                            <?php
                            $acitCompleteDateArray = explode(' ', $rowActionItem['acit_complete_DOB']);
                            $acitCompleteDate = $acitCompleteDateArray[0];
                            ?>
                            <div class="ff_calibri fs_13 spaceLeft5"><?php echo $acitCompleteDate; ?></div>
                        </td>
                    <?php }
                    ?>
                    <!------End code to add conditions to check staffId @Author:PRIYA13MAR15---------->
                    <td align="left">
                        <div class="ff_calibri fs_13 spaceLeft5">
                            <?php
                                    $userCustmid = "SELECT user_fname FROM user where user_id='$custId'";
                                    $rescustmacitid = mysqli_query($conn, $userCustmid);
                                    $rowcustmacitid = mysqli_fetch_array($rescustmacitid);
                                    $acituserid = $rowcustmacitid['user_fname'];
                                    //
                                    echo strtoupper($acituserid);
                            ?>
                        </div>
                    </td>
                    <td align="left">
                        <div class="ff_calibri fs_13 spaceLeft5"><?php echo strtoupper($rowActionItem['acit_TaskRepeat']); ?></div>
                    </td>
                    <td align="left">
                        <div class="ff_calibri fs_13 spaceLeft5"><?php echo strtoupper($rowActionItem['acit_login_id']); ?></div>
                    </td>

                    <td align="left">
                        <div class="ff_calibri fs_13 spaceLeft5"><?php echo $firm_name; ?></div>
                    </td>
                </tr>
                <?php
                $sNo++;
                $cat = $rowActionItem['acit_category'];
                $startDate = $date;
                $endDate = $eDate;
                $staffCheck = explode(" ", $rowActionItem['acit_login_id']);
                $staffCheck = $staffCheck[0];
            }
            ?>
            <?php
            if ($totalAcitCheck > 0) {
                $noOfPagesAsLink = ceil($totalAcitCheck / $rowsPerPage);
                if ($pageNum > $noOfPagesAsLink || $pageNum < 0) {
                    echo "<h1> ~ This Page is not available. ~ </h1>";
                } else {
                    ?>
                    <tr>
                        <td colspan="12" align="right" class="noPrint">
                            <table cellpadding="2" cellspacing="2" border="0" align="right" class="noPrint">
                                <tr>
                                    <td align="right">
                                        <?php if (($pageNum - 1) != '0') { ?>
                                            <input type="submit" id="prvPageButt" name="prvPageButt" value="PREV" class="pageNoButton"
                                                   onclick="javascript:showSelectedPage('<?php echo $pageNum - 1; ?>', 'AcitList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '<?php echo $sNo; ?>', '<?php echo $listPanel; ?>');" />
                                               <?php } ?>
                                    </td>
                                    <?php
                                    if ($pageNum == 1 || $pageNum < 10) {
                                        for ($i = 1; $i <= 10; $i++) {
                                            if (($noOfPagesAsLink >= $i) && ($noOfPagesAsLink != 1)) {
                                                ?>
                                                <td align="right">
                                                    <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" <?php if (($i == 1) && ($pageNum == 1)) { ?>class="currentPageNoButton" <?php } else { ?>class="pageNoButton" <?php } ?>
                                                           value="<?php echo $i ?>"
                                                           onclick="javascript:showSelectedPage(this.value, 'AcitList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '<?php echo $sNo; ?>', '<?php echo $listPanel; ?>');"/>
                                                </td>
                                                <?php
                                            }
                                        }
                                    } else {
                                        for ($i = 1; $i <= 10; $i++) {
                                            ?>
                                            <td align="right">
                                                <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                                       onclick="javascript:showSelectedPage(this.value, 'AcitList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '<?php echo $sNo; ?>', '<?php echo $listPanel; ?>');"/>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <td align="right">
                                        <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                                            <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                                                   onclick="javascript:showSelectedPage('<?php echo $pageNum + 1; ?>', 'AcitList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '<?php echo $sNo; ?>', '<?php echo $listPanel; ?>');"
                                                   />
                                               <?php } ?>
                                    </td>
                                    <?php if ($noOfPagesAsLink > 1) { ?>
                                        <!--Start to add textfield to navigate to any page randomly @AUTHOR: SANDY31OCT13------------->
                                        <!---Change in value of input field @AUTHOR: SANDY9NOV13------------------>
                                        <td align="right" class="paddingLeft15">
                                            <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGE NO" class="pageNoButton" size="7"
                                                   onblur="if (this.value !== '') {
                                                                               javascript:showSelectedPage(this.value, 'AcitList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '<?php echo $sNo; ?>', '<?php echo $listPanel; ?>');
                                                                           }"
                                                   onkeypress="if (event.keyCode == '13') {
                                                                               if (this.value !== '') {
                                                                                   javascript:showSelectedPage(this.value, 'AcitList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', '', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '<?php echo $sNo; ?>', '<?php echo $listPanel; ?>');
                                                                               }
                                                                           }"     
                                                   onclick="this.value = '';"
                                                   />
                                        </td>
                                        <!--End to add textfield to navigate to any page randomly @AUTHOR: SANDY31OCT13------------->
                                    <?php } ?>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
                    <!--***********END code to show user reminder list :Author:RUTUJA18FEB21-->
    </table>
        </div>

</div>
