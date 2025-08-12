<?php

/*
 * **************************************************************************************
 * @tutorial: Expired Girvi List Header Visible Div
 * **************************************************************************************
 * 
 * Created on Aug 24, 2013 11:00:58 AM
 *
 * @FileName: orgpexglvd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
?>
<?php
include 'olgglpad.php';
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'oldExpLpSno' and omin_contents = 'oldExp'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
<td align="left" width="89px" class="h7 border-right-bottom"><!--Change in width @AUTHOR: SANDY29DEC13---->
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="sNo" type="text" name="sNo" placeholder="S.NO." 
                       value="<?php if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num') echo $searchColumnValue;else echo 'S.NO.'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('sNo').value != '') {
                           searchExpiredGirviPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num@girv_serial_num',
                           document.getElementById('sNo').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');
                       }else{
                           document.getElementById('sNo').value = '<?php if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num') echo $searchColumnValue;else echo 'S.NO.'; ?>';
                       }"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('sNo').value != ''){ 
                       searchExpiredGirviPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num@girv_serial_num',
                       document.getElementById('sNo').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');}"
                       size="3" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                   onclick="sortGirviExpiredPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num asc,girv_serial_num','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>')">
                       <?php if ($sortKeyword == 'girv_pre_serial_num asc,girv_serial_num') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
            <td></td>
        </tr>
    </table>
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
<td align="right" width="150px" class="h7 border-right-bottom">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="right">
                <input id="prinAmt" type="text" name="prinAmt" placeholder="PRIN.AMT."
                       value="<?php if ($searchColumnName == 'girv_main_prin_amt') echo $searchColumnValue;else echo 'PRIN. AMT.'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('prinAmt').value != '') {
                   searchExpiredGirviPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt',
                   document.getElementById('prinAmt').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');
               }else{
                   document.getElementById('prinAmt').value = '<?php if ($searchColumnName == 'girv_main_prin_amt') echo $searchColumnValue;else echo 'PRIN. AMT.'; ?>';
               }"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('prinAmt').value != ''){ 
               searchExpiredGirviPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt',
               document.getElementById('prinAmt').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');}" 
                       size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Principal Amount"
                   onclick="sortGirviExpiredPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>')">
                       <?php if ($sortKeyword == 'girv_main_prin_amt') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
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
<td align="left" width="198px" class="h7 border-right-bottom spaceLeft20">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="name" type="text" name="name" placeholder="CUSTOMER NAME"
                       value="<?php if ($searchColumnName == 'girv_cust_fname@girv_cust_lname') echo $searchColumnValue;else echo 'CUSTOMER NAME'; ?>"
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('name').value != '') {
           searchExpiredGirviPanel('<?php echo $documentRoot; ?>','girv_cust_fname@girv_cust_lname',
           document.getElementById('name').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');
       }else{
           document.getElementById('name').value = '<?php if ($searchColumnName == 'girv_cust_fname@girv_cust_lname') echo $searchColumnValue;else echo 'CUSTOMER NAME'; ?>';
       }"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('name').value != ''){ 
       searchExpiredGirviPanel('<?php echo $documentRoot; ?>','girv_cust_fname@girv_cust_lname',
       document.getElementById('name').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');}"
                       size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Customer Name"
                   onclick="sortGirviExpiredPanel('<?php echo $documentRoot; ?>','girv_cust_fname','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>')">
                       <?php if ($sortKeyword == 'girv_cust_fname') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
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
        <td class="h7 border-right-bottom" width="80px" align="left">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">F NAME</div>
        </td>
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
<td align="left" width="100px" class="border-right-bottom" >
    <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">MOB NO</div>
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
<td align="left" width="220px" class="h7 border-right-bottom">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="city" type="text" name="city" placeholder="CITY"
                       value="<?php if ($searchColumnName == 'girv_cust_city') echo $searchColumnValue;else echo 'CITY'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('city').value != '') {
   searchExpiredGirviPanel('<?php echo $documentRoot; ?>','girv_cust_city',
   document.getElementById('city').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');
}else{
   document.getElementById('city').value = '<?php if ($searchColumnName == 'girv_cust_city') echo $searchColumnValue;else echo 'CITY'; ?>';
}"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('city').value != ''){ 
searchExpiredGirviPanel('<?php echo $documentRoot; ?>','girv_cust_city',
document.getElementById('city').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');}"
                       size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
            </td>
            <td align="right" width="130px">
                <a style="cursor: pointer;" title="Click To View Girvi By Customer Name"
                   onclick="sortGirviExpiredPanel('<?php echo $documentRoot; ?>','girv_cust_city','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>')">
                       <?php if ($sortKeyword == 'girv_cust_city') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
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
<td align="left"  width="90px" class="h7 border-right-bottom">
    <?php
    $firmIdSelected = $selFirmId;
    //to assign default firm id @AUTHOR: SANDY10JUL13
    if (!$firmIdSelected) {
        $firmIdSelected = $_SESSION['setFirmSession'];
    }
    $panelName = 'expGirviList';
    $sortKeyword = addslashes($sortKeyword);
    include 'omffragp.php';
    ?>  
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
        <td class="h7 border-right-bottom" width="80px">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">OT INFO</div>
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
<!-- start code for month & year option in expired Girvi Panel @AUTHOR:LINA11JUN13-->
<td align="right" width="140px" class="h7 border-right-bottom">
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="right">
                <input id="sDate" type="text" name="sDate" placeholder="DD.MM.YY"
                       value="<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d %M %Y\'),\'%y\')") echo $searchColumnValue;else echo 'GIRVI DATE'; ?>" 

                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('sDate').value != '') {
searchExpiredGirviPanel('<?php echo $documentRoot; ?>','DAY(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d %M %Y\'),\'%y\')',document.getElementById('sDate').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');
}else{
document.getElementById('sDate').value = '<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d %M %Y\'),\'%y\')") echo $searchColumnValue;else echo 'GIRVI DATE'; ?>';
}"
 onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                                
onkeyup="if(event.keyCode == 13 && document.getElementById('sDate').value != ''){ 
searchExpiredGirviPanel('<?php echo $documentRoot; ?>','DAY(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d %M %Y\'),\'%y\')',
document.getElementById('sDate').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>','ExpiredLoanList');}"
                       size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                   onclick="sortGirviExpiredPanel('<?php echo $documentRoot; ?>','STR_TO_DATE(girv_new_DOB,\'%d %M %Y\')','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>','<?php echo $noOfMonths; ?>')">
                       <?php if ($sortKeywordValue == "STR_TO_DATE(girv_new_DOB,'%d %M %Y')") { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="right" width="140px" class="h7 border-right-bottom"></td>
<?php
    }
}?>
<!-- end code for month & year option in expired Girvi Panel @AUTHOR:LINA11JUN13-->