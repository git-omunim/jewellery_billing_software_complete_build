<?php
/*
 * * ***************************************************************************************
 * @tutorial: This segment used to display Expired Girvi List in Girvi Panel.
 * **************************************************************************************
 *  Created on 09 MAY,2019 5:15:33 PM
 *
 * @FileName: orgpexglint.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 2.6.100
 * @Copyright (c) 2019 www.softwaregen.com
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
//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';

?>
<?php
$selFirmId = NULL;
$sortKeyword = NULL;
$searchColumn = NULL;
$searchValue = NULL;
$searchKeyword = NULL;
$columName = NULL;
$searchColumnStr = NULL;

$noOfMonths = $_POST['expMonths'];
if ($noOfMonths == '') {
    $noOfMonths = $_GET['expMonths'];
}
if ($noOfMonths == '') {
    $noOfMonths = 11;
}
// if $_GET['selFirmId'] selected Firm Name
if (isset($_GET['searchKeyword'])) {
    $searchKeyword = $_GET['searchKeyword'];
}
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if (isset($_GET['sortKeyword'])) {
    $sortKeyword = $_GET['sortKeyword'];
}
if (isset($_GET['searchColumn'])) {
    $searchColumn = $_GET['searchColumn'];
}
if (isset($_GET['searchValue'])) {
    $searchValue = $_GET['searchValue'];
}
//Start Code To Get Search Column Name @Author:PRIYA14JUL13
$searchColumnName = $searchColumn;
$searchColumnValue = $searchValue;

$sortKeyword = stripslashes($sortKeyword);
$searchColumn = stripslashes($searchColumn);
//End Code To Get Search Column Name @Author:PRIYA14JUL13
/* * *****Start Code To Add $sortKeywordValue @Author:PRIYA24AUG13********* */
$sortKeywordValue = $sortKeyword;
$sortKeywordValue = stripslashes($sortKeywordValue);
/* * *****End Code To Add $sortKeywordValue @Author:PRIYA24AUG13********* */
/* * *********End Code To Select Date String @Author:PRIYA19JUL13********** */
// Main Code for Girvi Panel
/* * *************Start Code To Update No Of Rows @Author:PRIYA16JUL13******************* */
$updateRows = $_GET['updateRows'];
if ($updateRows == 'updateRows') {
    $rowsPerPage = $_GET['rowsPerPage'];
    $ominValue = $rowsPerPage;
    $ominOption = 'indigvpnrw';
    include 'ommpindc.php';
}

$girviNoticeLay = '';//callOmLayoutTable('girviNoticeLay', '', '');
        if ($girviNoticeLay == 'girviNoticeLay4Inch' || $girviNoticeLay == 'girviNoticeLayA6') {
            $girviNoticeWidth = 420;
            $girviNoticeHeight = 660;
        } else {
            $girviNoticeWidth = 550;
            $girviNoticeHeight = 630;
        }
        // echo '$girviNoticeLay = '.$girviNoticeLay;
        /*         * *********End code to add code @Author:PRIYA23APR14************ */
        /*         * *******Start Code To add condition @Author:PRIYA19MAY14**** */
        /*         * *********Start code to change width @Author:PRIYA26JUL14****************** */
        $selFormsLayoutDet = "SELECT cuno_default_size FROM customized_notice WHERE cuno_own_id='$_SESSION[sessionOwnerId]' order by cuno_id asc";
        $resFormsLayoutDet = mysqli_query($conn, $selFormsLayoutDet);
        $rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
        $cuno_default_size = $rowFormsLayoutDet['cuno_default_size'];
        if ($cuno_default_size == 'custmNoticeLay4Inch' || $cuno_default_size == 'custmNoticeLayA6') {
            $customNoticeWidth = 420;
            $customNoticeHeight = 660;
        } else if ($cuno_default_size == 'custmNotA5size2') {
            $customNoticeWidth = 1100;
            $customNoticeHeight = 1430;
        } else {
            $customNoticeWidth = 550;
            $customNoticeHeight = 680;
        }


$qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indigvpnrw'";
$resGNoOfRows = mysqli_query($conn,$qSelGNoOfRows);
$rowGNoOfRows = mysqli_fetch_array($resGNoOfRows, MYSQLI_ASSOC);
$rowsPerPage = $rowGNoOfRows['omin_value'];
if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
    $rowsPerPage = 15;
}
/* * *************End Code To Update No Of Rows @Author:PRIYA16JUL13******************* */
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
    //Start Code to Get Pre and Post Girvi Serial Number
    if ($searchColumn1 == 'girv_pre_serial_num') {
        $grvSerialNoStr = $searchValue;
        $grvSerialNoStrLen = strlen($searchValue);
        for ($count = 0; $count <= $grvSerialNoStrLen; $count++) {
            if (is_numeric($grvSerialNoStr)) {
                break;
            }
            $grvSerialNoStr = substr($grvSerialNoStr, 1);
        }

        $grvPreSerialNo = substr($searchValue, 0, $count);
        $grvSerialNo = $grvSerialNoStr;
        $searchColumnStr = " and $searchColumn1 = '$grvPreSerialNo' and $searchColumn2 = '$grvSerialNo' ";
    }
    if ($searchColumn1 == 'girv_cust_fname') {
        $isSpace = strpos($searchValue, ' ');
        if ($isSpace == true) {
            $searchValue = explode(" ", $searchValue);
            $searchValue1 = $searchValue[0];
            $searchValue2 = $searchValue[1];
            $searchColumnStr = " and $searchColumn1 LIKE '$searchValue1%' and $searchColumn2 LIKE '$searchValue2%' ";
        } else {
            $searchColumnStr = " and ($searchColumn1 LIKE '$searchValue%' or $searchColumn2 LIKE '$searchValue%') ";
        }
    }
    if ($searchColumn1 == "DAY(STR_TO_DATE(girv_new_DOB,'%d %M %y'))") { //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
        $isDot = strpos($searchValue, '.');
        if ($isDot == true) {
            $searchValue = explode(".", $searchValue);
            $searchValue1 = $searchValue[0];
            $searchValue2 = $searchValue[1];
            $searchValue3 = $searchValue[2];
            /*             * ************Start code to change condition for date @Author:PRIYA31OCT13**************** */
            if ($searchValue3 == '') {
                $searchColumnStr = " and $searchColumn2='$searchValue1' and $searchColumn3 = '$searchValue2' ";
            } else if ($searchValue1 != '' && $searchValue2 != '' && $searchValue3 != '') {
                $searchColumnStr = " and $searchColumn1='$searchValue1' and $searchColumn2='$searchValue2' and $searchColumn3 = '$searchValue3' ";
            }
            /*             * ************End code to change condition for date @Author:PRIYA31OCT13**************** */
        } else {
            $searchColumnStr = " and $searchColumn3='$searchValue' ";
        }
        $dateStr = " order by STR_TO_DATE(girv_new_DOB,'%d %b %y') asc "; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
    }
//End Code to Get Pre and Post Girvi Serial Number
} else {
    if ($searchColumn != NULL)
        $searchColumnStr = " and $searchColumn LIKE '$searchValue%' ";
}
if ($searchColumn == 'girv_main_prin_amt') {
    /*     * *****Start code To Select Prin Amnt Range @Author:PRIYA17JUL13********* */
    $prinStartRange = stristr($searchValue, '-', TRUE);
    $endRange = stristr($searchValue, '-');
    $prinEndRange = substr($endRange, 1);
    /*     * *****End code To Select Prin Amnt Range @Author:PRIYA17JUL13********* */
    if ($prinStartRange != '' && $prinEndRange != '') {
        $searchColumnStr = " and $searchColumn >= '$prinStartRange' and $searchColumn <= '$prinEndRange'";
    } else {
        $searchColumnStr = " and $searchColumn = '$searchValue' ";
    }
}
$sortKeyword = stripslashes($sortKeyword);
$noOfMonthsTimeStamp = ((365 * $noOfMonths) / 12) * 24 * 60 * 60;

$todayDate = date(d) . ' ' . date(M) . ' ' . date(Y);
$todayDateNum = strtotime($todayDate);
$todayDateNum = $todayDateNum + 60 * 60 * 24;

/** * *************************************************************************************************** */
/*                                      End Code for TIME ZONE for Remote Server                         */
/** * *************************************************************************************************** */
$expiredDate = $todayDateNum - $noOfMonthsTimeStamp;

/* * ***********Start echo '$expiredDate' . date('d M Y',$expiredDate);Code To Check Login Pass @Author:PRIYA19JUL13********* */
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn,$qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}

if ($sortKeyword != NULL) {
    $qSelTotalGirviCount = "SELECT girv_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) LIMIT $perOffset, $checkNextRows"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
    $qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(girv_new_DOB,'%d %b %Y') desc LIMIT $perOffset, $rowsPerPage"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
    //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
    $totGirviForPaging = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) order by $sortKeyword asc,STR_TO_DATE(girv_new_DOB,'%d %b %Y') desc"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
} else if ($searchColumnStr != NULL) {
    /*     * *********Start Code To Select Date String @Author:PRIYA19JUL13********** */
    if ($dateStr != '' || $dateStr != NULL) {
        $selDateStr = $dateStr;
    } else {
        $selDateStr = " order by STR_TO_DATE(girv_new_DOB,'%d %b %Y') desc ";
    }
    $qSelTotalGirviCount = "SELECT girv_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) LIMIT $perOffset, $checkNextRows"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
    $qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) $selDateStr LIMIT $perOffset, $rowsPerPage"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
    //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
    $totGirviForPaging = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' $searchColumnStr and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) $selDateStr"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
} else {
    $qSelTotalGirviCount = "SELECT girv_id FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) LIMIT $perOffset, $checkNextRows"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
   $qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) order by STR_TO_DATE(girv_new_DOB,'%d %b %Y') desc,girv_serial_num desc LIMIT $perOffset, $rowsPerPage"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
    //QUERY FOR PAGING @AUTHOR: SANDY28OCT13
    $totGirviForPaging = "SELECT * FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]' and UNIX_TIMESTAMP(STR_TO_DATE(girv_new_DOB,'%d %b %Y'))<$expiredDate and girv_upd_sts IN ('New','Updated','ReleaseCart') and girv_firm_id IN ($strFrmId) order by STR_TO_DATE(girv_new_DOB,'%d %b %Y') desc,girv_serial_num desc"; //change in column name girv_DOB to girv_new_DOB @AUTHOR: SANDY19JAN14
}
/* * ***********End Code To Check Login Pass @Author:PRIYA19JUL13********* */
$resTotalGirviCount = mysqli_query($conn,$qSelTotalGirviCount);
$totalGirvi = mysqli_num_rows($resTotalGirviCount);
$resAllGirvi = mysqli_query($conn,$qSelAllGirvi);
$totalNextGirvi = mysqli_num_rows($resAllGirvi);

/* * ***Start to add code to implement paging @AUTHOR: SANDY28OCT13************ */
$resTotGirviForPaging = mysqli_query($conn,$totGirviForPaging) or die(mysqli_error($conn));
$totalGirviCheck = mysqli_num_rows($resTotGirviForPaging);
/* * ****End to add code to implement paging @AUTHOR: SANDY28OCT13************ */
?>
<form name="srch_exp_girvi" id="srch_exp_girvi" 
      action="javascript:searchExpGirviByFixedMonths(document.getElementById('srch_exp_girvi'),'<?php echo $rowsPerPage ?>');" method="post">
    <table border="0" cellspacing="0" cellpadding="5" align="center" width="100%"><!------noPrint removed @Author:PRIYA29MAY14----------->
        <tr>
            <td valign="middle" align="left" width="17px">
                <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/expired.png" alt="" onLoad="setScrollIdFun('girviPanelTrId')"/></div>
            </td>
            <td valign="middle" align="left">
                <div class="main_link_red">EXPIRED LOAN LIST <span class="main_link_blue noPrint"><?php echo $noOfMonths; ?> Months Old Girvi List</span></div><!--Change @AUTHOR: SANDY29DEC13---->
            </td>
            <td align="right" valign="bottom" class="frm-lbl">
                <div class="spaceRight20">
                    <div id="ajaxLoadGirviDetailsDiv" style="visibility: hidden">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                </div>
            </td>
            <td valign="middle" align="right"  class="noPrint">
                <div>
                    <h4>Enter No. of Months: </h4>
                </div>
            </td>
            <!-- ************************************************************************ -->
            <!-- code modified by @AUTHOR: LINA27JUN2013  -->
            <!-- ************************************************************************ -->
            <td valign="middle" align="left" width="30px"  class="noPrint">
                <table>
                    <tr>
                        <td  class="textBoxCurve1px backFFFFFF">
                            <input id="expGrvMonths" type="text" 
                                   class="border-no textLabel14CalibriGreyMiddle background_transparent" maxlength="5"
                                   size="8" spellcheck="false" value="<?php echo $noOfMonths; ?>"
                                   onkeyup="if (event.keyCode == 13 && document.getElementById('expGrvMonths').value != '') {
                                               searchExpGirviByFixedMonths(document.getElementById('srch_exp_girvi'), '<?php echo $rowsPerPage ?>');
                                               document.getElementById('expGrvMonths').value = '';
                                           }"/>
                        </td>
                    </tr>
                </table>
            </td>
            <!-- ************************************************************************ -->
            <!-- code modified by @AUTHOR: LINA27JUN2013  -->
            <!-- ************************************************************************ -->
            <td valign="middle" align="left"  class="noPrint">
                <div id="expGirviSrchButt"><input type="submit" value="GO" class="frm-btn" /></div>
            </td>
            <td align="right" valign="top" width="30px" class="noPrint">
                <table>
                    <tr>  
                        <td  class="textBoxCurve1px backFFFFFF">
                            <input id="rowsPerPage" name="rowsPerPage" type="text" value="<?php echo $rowsPerPage; ?>" placeholder="No Of Rows" title="Enter number of girvi in List"
                                   class="border-no textLabel14CalibriGreyMiddle background_transparent" size="10" maxlength="6" value="<?php echo $rowsPerPage; ?>"
                                   onkeyup="if (event.keyCode == 13 && document.getElementById('rowsPerPage').value != '') {
                                               numberOfRowsExiperedPanel('<?php echo $documentRoot; ?>', document.getElementById('rowsPerPage').value, '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '1', '<?php echo $noOfMonths; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'updateRows', 'ExpiredLoanList');
                                               document.getElementById('rowsPerPage').value = '';
                                           }"
                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                   onclick="this.value = ''"/>
                        </td>
                    </tr>
                </table>
            </td>
            <!-- End code To Add onkeyPress event for No of rows Author:PRIYA08AUG13-->
            <td align="right" valign="middle" width="17px"  class="noPrint">
                <div id="CustomerListButton">
                    <a   style="cursor: pointer;" onclick="javascript:numberOfRowsExiperedPanel('<?php echo $documentRoot; ?>', document.getElementById('rowsPerPage').value, '<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '1', '<?php echo $noOfMonths; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', 'updateRows', 'ExpiredLoanList');">
                        <img src="<?php echo $documentRootBSlash; ?>/images/submit16.png"  title="Click Here to Display Number of Customers in this List" />
                    </a>
                </div>
            </td>
        </tr>
    </table>
</form>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <?php
                if ($totalGirvi <= 0) {
                    echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ Girvi List is empty. ~ </div></div>";
                } else {
                    ?>
                    <tr>
                        <td></td><td></td>
                        <td colspan="5">
                            <div id="display_girvi_info_popup" class="display-girvi-info-popup"></div>
                        </td>
                    </tr>
                    <tr id="girviPanelTrId"  class="om_header">
                        <?php include'orgpexglvd.php'; ?><!--FileName Changed @Author:PRIYA24AUG13-->
                    </tr>
                    <?php
                }
                while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {
                    $gId = $rowAllGirvi['girv_id'];
                    $custId = $rowAllGirvi['girv_cust_id'];
//*****************************************Start to add code for customer father name @AUTHOR: SANT12JAN16 *******************************
                    $selFatherName = "SELECT user_father_name,user_fname,user_lname FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
                    $resFatherName = mysqli_query($conn,$selFatherName);
                    $rowFatherName = mysqli_fetch_array($resFatherName, MYSQLI_ASSOC);
                    $gCustName = $rowFatherName['user_fname'] . ' ' . $rowFatherName['user_lname']; //to access cust name from cust table to avoid mismatch after update @AUTHOR: SANDY28JAN14
                    $fatherName = $rowFatherName['user_father_name'];
                    if ($fatherName[0] == 'S' || $fatherName[0] == 's') {
                        $fatherName = 'W/o  ' . substr($fatherName, 1);
                    } else {
                        $fatherName = 'S/o  ' . substr($fatherName, 1);
                    }
                    //End to add code for cust father name @AUTHOR: SANDY28JAN14 
                    $gFirmId = $rowAllGirvi['girv_firm_id'];
                    //$gCustName = $rowAllGirvi['girv_cust_fname'] . ' ' . $rowAllGirvi['girv_cust_lname'];comment by @AUTHOR: SANDY28JAN14
                    $gCustCity = $rowAllGirvi['girv_cust_city'];
                    $gMainPrinAmt = $rowAllGirvi['girv_main_prin_amt'];
                    $girviDOB = $rowAllGirvi['girv_DOB'];
                    $girviNewDOB = $rowAllGirvi['girv_new_DOB'];
                     $totalplamt = $rowAllGirvi['girv_pl_total_amt'];
                     $totalfinalintrest = $rowAllGirvi['girv_pl_total_final_intrest'];
                     $totalprinamt = $rowAllGirvi['girv_pl_total_prin_amt'];
                    $totExpPrin += $gMainPrinAmt;
                    $gOtherInfo = $rowAllGirvi['girv_comm'];   //ADD VARIABLE AUTHOR:GAUR02JUNE16
                    //Start code to add new Girvi DOB
                    if ($girviNewDOB == '' || $girviNewDOB == NULL) {
                        $qUpdateGirvi = "UPDATE girvi SET girv_new_DOB='$girviDOB'
                                         WHERE girv_id='$girviId' and girv_cust_id='$custId' and girv_own_id='$_SESSION[sessionOwnerId]'";

                        if (!mysqli_query($conn,$qUpdateGirvi)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                        $girviNewDOB = $girviDOB;
                    }
                    //End code to add new Girvi DOB
                    $gPreSerialNo = $rowAllGirvi['girv_pre_serial_num'];
                    $gSerialNo = $rowAllGirvi['girv_serial_num'];

                    $qSelFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$gFirmId'";
                    $resFirm = mysqli_query($conn,$qSelFirm);
                    $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                    $gFirmName = $rowFirm['firm_name'];

                    $qSelCustDetails = "SELECT user_mobile FROM user where user_owner_id = '$_SESSION[sessionOwnerId]' and user_id='$custId'";
                    $resCustDetails = mysqli_query($conn,$qSelCustDetails);
                    $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);
                    $custMobNo = $rowCustDetails['user_mobile'];
 //*****************************************End to add code for customer father name @AUTHOR: SANT12JAN16 *******************************
                    ?>
                    <tr>
                        <?php
                            $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpSno' and omin_contents = 'oldExp'";
                            $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                            while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                $panelVal = $rowLpLayoutDet['omin_value'];
                                if ($panelVal == 'true') {
                                    ?>
                        <td align="left" class="border-color-grey-rb" width="89px">
                            <!--START Code To Add Function To Click On Girvi Id @AUTHOIR:PRIYA26FEB13-->
                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi / Double Click To Select Girvi"
                                   ondblclick="searchGirviByGirviId(<?php echo $gId; ?>)"
                                   onclick="getGirviInfoPopUp(<?php echo $custId; ?>,<?php echo $gId; ?>, '<?php echo $documentRootBSlash; ?>')"
                                   value="<?php echo $gPreSerialNo . $gSerialNo; ?>"  class="frm-btn-lnk-arial-Normal" readonly="true"/><!--Class Changed @Author:PRIYA26AUG13-->
                            <input type="hidden" name="girviId<?php echo $gCounter; ?>" id="girviId<?php echo $gCounter; ?>" value="<?php echo $gId; ?>"/>
                        </td>
                        <div id="display_girvi_info_popup" class="girvi_info_popup_exp_list"></div>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpPrinAmt' and omin_contents = 'oldExp'";
                            $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                            while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                                $panelVal = $rowLpLayoutDet['omin_value'];
                                if ($panelVal == 'true') {
                                    ?>
                    <!--END Code To Add Function To Click On Girvi Id @AUTHOIR:PRIYA26FEB13-->
                    <td align="right" class="border-color-grey-rb" width="150px">
                        <div class="h5 spaceRight15"><?php echo $gMainPrinAmt; ?></div>
                    </td>
<?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpCustName' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
                    <td align="left" width="198px" class="border-color-grey-rb" title="<?php echo $fatherName; ?>" > <!-- changes in width @AUTHOR: SANDY6AUG13 //cust father name DISPLAY @AUTHOR: SANDY19JAN14 -->
                        <div class="h5 spaceLeft5"><?php echo substr($gCustName, 0, 26); ?> </div>
                    </td>
                    <?php
                            }
                        }
                        ?>
                        <?php
                        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpFatherName' and omin_contents = 'oldExp'";
                        $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                        while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                            $panelVal = $rowLpLayoutDet['omin_value'];
                            if ($panelVal == 'true') {
                                ?>
                                <td align="left" class="border-color-grey-rb" title="<?php echo substr($fatherName,3); ?>" width="80px">
                                    <div class="h5 spaceLeft5"><?php echo substr($fatherName,3); ?></div>
                                </td>
                                <?php
                            }
                        }
                        ?>
                                <?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpMobno' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>  
                    <td align="left" class="border-color-grey-rb" width="100px">
                        <div class="h5 spaceLeft5"><?php
                            if ($custMobNo != '' || $custMobNo != NULL)
                                echo substr($custMobNo, 0, 10);
                            else
                                echo '-';
                            ?></div>
                    </td>
                    <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpCity' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
                    <td align="left" width="220px" class="border-color-grey-rb">
                        <div class="h5 spaceLeft5"><?php echo substr($gCustCity, 0, 29); ?> </div>
                    </td>
                    <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpExFirm' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
                    <td align="left" width="90px" class="border-color-grey-rb">
                        <div class="h5 spaceLeft5"><?php echo $gFirmName; ?> </div>
                    </td>
                    <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpOtherIn' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
            <td align="left" class="border-color-grey-rb" width="80px">
                <div class="h5 spaceLeftRight2">
                                <?php
                                echo $gOtherInfo;
                                ?></div>
            </td>
<?php
    }
}
?>
        <?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpSdate' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
                    <td align="right" width="140px"class="border-color-grey-b" >
                        <div class="h5"><?php echo om_strtoupper(date('d  M  y', strtotime($girviNewDOB))); ?></div>
                    </td>
    <!--                        <td align="right"  >
                        <div class="h7">&nbsp;</div>
                    </td>-->
                    <?php
    }
}
?>
 
<td align="center" class="border-color-grey-b">
    <table>
        <tr>
            
                      <?php if ($girviNoticeLay == 'girviNoticeLayPawn') { ?>
                                    <?php //if ($girviNoticeLay == 'girviNoticeLay4Inch') {      ?>
            
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/olggnotepawn.php?custId=<?php echo $custId; ?>&girviId=<?php echo $gId; ?>&totalPrincipalAmount=<?php echo $gMainPrinAmt; ?>,
                                                        'popup');
                                                return false" >
                                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='LOAN/ GIRVI NOTICE' title='LOAN / GIRVI NOTICE'
                                                 width="20px" height="20px" /> 
                                        </a> 
                                    </td>
                                <?php } else { ?>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="getLoanNoticeLang('<?php echo $custId; ?>', '<?php echo $gId; ?>', '<?php echo "$totalprinamt"; ?>','<?php echo "$totalfinalintrest";?>',
                                                        '<?php echo "$totalplamt";?>',  '<?php echo "$girviNoticeWidth"; ?>', '<?php echo "$girviNoticeHeight"; ?>');">
                                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='LOAN / GIRVI NOTICE' title='LOAN / GIRVI NOTICE'
                                                 width="20px" height="20px" /> 
                                        </a>
                                    </td>
                                    
             </div>                    
             <div id="display_loan_notice_lang"></div>                 
        </tr>
    </table>
                                <?php } ?>
 </td>
        </tr>
        <?php
        $gCounter++;
    }if ($totExpPrin != 0) {
        ?>
        <tr align="right"  class="om_header">
            <?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpSno' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
            <td class="h5 border-color-grey-rb heightPX15">
                <div class="h5 spaceRight15 paddingTop2">TOTAL</div>
            </td>
            <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpPrinAmt' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
            <td title="Total Principal Amount of This Page!" class="h5 border-color-grey-rb heightPX15">
                <div class="h5 spaceRight15 paddingTop2"><?php echo number_format($totExpPrin, 2); ?></div>
            </td>
            <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpCustName' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
            <!--<td class="h5 border-color-grey-b heightPX15" colspan="5">&nbsp;</td>-->
                <td class="h5 border-color-grey-b heightPX15"></td>
                <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpFatherName' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
                <td class="h5 border-color-grey-b heightPX15"></td>
                <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpMobno' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>    
                <td class="h5 border-color-grey-b heightPX15"></td>
                <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpCity' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>   
                <td class="h5 border-color-grey-b heightPX15"></td>
                <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpExFirm' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
                <td class="h5 border-color-grey-b heightPX15"></td>
                <?php
    }
}?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpOtherIn' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
                <td class="h5 border-color-grey-b heightPX15"></td>
                <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpSdate' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
                <td class="h5 border-color-grey-b heightPX15"></td>
                <?php
    }
}?>
                <td class="h5 border-color-grey-b heightPX15"></td>
                
        </tr>
    <?php } ?>
    <!-----Start Code to make changes @AUTHOR: SANDY30OCT13  ----------------->
    <!-----Start Code to implement paging @AUTHOR: SANDY29OCT13  ----------------->
    <!----Start of Changes in code to add new field @AUTHOR: SANDY6NOV13--------------->
    <?php
    if ($totalGirviCheck > 0) {
        $noOfPagesAsLink = ceil($totalGirviCheck / $rowsPerPage);
        if ($pageNum > $noOfPagesAsLink || $pageNum < 0) {
            echo "<h1> ~ This Page is not available. ~ </h1>";
        } else {
            ?>
            <tr>
                <td colspan="8" align="right" class="noPrint">
                    <table cellpadding="2" cellspacing="2" border="0">
                        <tr>
                            <td align="right">
                                <?php if (($pageNum - 1) != '0') { ?>
                                    <input type="submit" id="prvPageButt" name="prvPageButt" value="PREV" class="pageNoButton"
                                           onclick="javascript:showSelectedPage('<?php echo $pageNum - 1; ?>', 'ExpiredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('firmNameForGirviPanel').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '', '<?php echo $noOfMonths; ?>');" />
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
                                                   onclick="javascript:showSelectedPage(this.value, 'ExpiredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('firmNameForGirviPanel').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '', '<?php echo $noOfMonths; ?>');"/>
                                        </td>
                                        <?php
                                    }
                                }
                            } else {
                                for ($i = 1; $i <= 10; $i++) {
                                    ?>
                                    <td align="right">
                                        <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                               onclick="javascript:showSelectedPage(this.value, 'ExpiredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('firmNameForGirviPanel').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '', '<?php echo $noOfMonths; ?>');"/>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                            <td align="right">
                                <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                                    <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                                           onclick="javascript:showSelectedPage('<?php echo $pageNum + 1; ?>', 'ExpiredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('firmNameForGirviPanel').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '', '<?php echo $noOfMonths; ?>');"
                                           />
                                       <?php } ?>
                            </td>
                            <?php if ($noOfPagesAsLink > 1) { ?>
                                <!--Start to add textfield to navigate to any page randomly @AUTHOR: SANDY31OCT13------------->
                                <!---Change in value of input field @AUTHOR: SANDY9NOV13------------------>
                                <td align="right" class="paddingLeft15">
                                    <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGE NO" class="pageNoButton" size="7"
                                           onblur="if (this.value !== '') {
                                                       javascript:showSelectedPage(this.value, 'ExpiredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('firmNameForGirviPanel').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '', '<?php echo $noOfMonths; ?>');
                                                   }"
                                           onkeypress="if (event.keyCode == '13') {
                                                       if (this.value !== '') {
                                                           javascript:showSelectedPage(this.value, 'ExpiredGirviList', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>', document.getElementById('firmNameForGirviPanel').value, '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '', '', '<?php echo $noOfMonths; ?>');
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
    ?>
    <!----End of Changes in code to add new field @AUTHOR: SANDY6NOV13--------------->
    <!-----End Code to implement paging @AUTHOR: SANDY29OCT13  ----------------->
    <!-----End Code to make changes @AUTHOR: SANDY30OCT13  ----------------->
</table>
<div id="ajaxLoadNextGirviPanelList" style="visibility: hidden" align="right">
    <?php include 'omzaajld.php'; ?>
</div>
</td>
</tr>
</table>
