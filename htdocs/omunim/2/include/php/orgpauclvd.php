<?php

/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on Mar 12, 2015 6:39:35 PM
 *
 * @FileName: orgpauclvd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMERP
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:ANUJA
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
<td align="left" class="h7 border-right-bottom widthPX85">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="sNo" type="text" name="sNo" placeholder="S.No."
                       value="<?php if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num') echo $searchColumnValue;else echo 'S.NO.'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('sNo').value != '') {
                           searchAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num@girv_serial_num',document.getElementById('sNo').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
                       }else{
                           document.getElementById('sNo').value = '<?php if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num') echo $searchColumnValue;else echo 'S.NO.'; ?>';
                       }"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('sNo').value != ''){ 
                       searchAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num@girv_serial_num',
                       document.getElementById('sNo').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="3" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
            </td>
            <td align="right" >
                <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                   onclick="sortAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num asc,girv_serial_num','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == 'girv_pre_serial_num asc,girv_serial_num') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="right"   class="h7 border-right-bottom widthPX165">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="right">
                <input id="prinAmt" type="text" name="prinAmt" placeholder="PRIN.AMT."
                       value="<?php if ($searchColumnName == 'girv_main_prin_amt') echo $searchColumnValue;else echo 'PRIN. AMT.'; ?>" 
                       onclick="this.value = '';"                                       
                       onblur="javascript:if(document.getElementById('prinAmt').value != '') {
                   searchAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt',
                   document.getElementById('prinAmt').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
               }else{
                   document.getElementById('prinAmt').value = '<?php if ($searchColumnName == 'girv_main_prin_amt') echo $searchColumnValue;else echo 'PRIN. AMT.'; ?>';
               }"
                       onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"               
                       onkeyup="if(event.keyCode == 13 && document.getElementById('prinAmt').value != ''){ 
               searchAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt',
               document.getElementById('prinAmt').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                   onclick="sortAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == 'girv_main_prin_amt') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table> 
</td>
<td align="left"  class="h7 border-right-bottom widthPX186">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="name" type="text" name="name" placeholder="CUSTOMER NAME"
                       value="<?php if ($searchColumnName == 'girv_cust_fname@girv_cust_lname') echo $searchColumnValue;else echo 'CUSTOMER NAME'; ?>"
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('name').value != '') {
           searchAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_cust_fname@girv_cust_lname',
           document.getElementById('name').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
       }else{
           document.getElementById('name').value = '<?php if ($searchColumnName == 'girv_cust_fname@girv_cust_lname') echo $searchColumnValue;else echo 'CUSTOMER NAME'; ?>';
       }"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('name').value != ''){ 
       searchAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_cust_fname@girv_cust_lname',
       document.getElementById('name').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="13" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Customer Name"
                   onclick="sortAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_cust_fname','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == 'girv_cust_fname') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="center" class="border-right-bottom" width="70px">
    <div class="lgn-txtfield-without-borderAndBackground13-Arial">MOB NO</div>
</td>
<td align="left"  class="h7 border-right-bottom" width="181px">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="city" type="text" name="city"  placeholder="CITY"
                       value="<?php if ($searchColumnName == 'girv_cust_city') echo $searchColumnValue;else echo 'CITY'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('city').value != '') {
   searchAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_cust_city',
   document.getElementById('city').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
}else{
   document.getElementById('city').value = '<?php if ($searchColumnName == 'girv_cust_city') echo $searchColumnValue;else echo 'CITY'; ?>';
}"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('city').value != ''){ 
searchAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_cust_city',
document.getElementById('city').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Customer City"
                   onclick="sortAuctionLoanPanel('<?php echo $documentRoot; ?>','girv_cust_city','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == 'girv_cust_city') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="left"  class="h7 border-right-bottom widthPX80">
    <?php
    $firmIdSelected = $selFirmId;
    //to assign default firm id @AUTHOR: SANDY10JUL13
    if (!$firmIdSelected) {
        $firmIdSelected = $_SESSION['setFirmSession'];
    }
    $panelName = 'releaseGirviList';
    $sortKeyword = addslashes($sortKeyword);
    include 'omffragp.php';
    ?>  
</td>
<td align="left" class="h7 border-right-bottom widthPX60">
    <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">TR.FIRM</div>
</td>
<td class="h7 border-right-bottom" width="80px">
    <table border="0" cellspacing="0" cellpadding="0" align="right">
        <tr>
            <td align="right">
                <input id="sDate" type="text" name="sDate" placeholder="DD.MM.YY"
                       value="<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')") echo $searchColumnValue;else echo 'S. DATE'; ?>"   
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('sDate').value != '') {
searchAuctionLoanPanel('<?php echo $documentRoot; ?>','DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')',
document.getElementById('sDate').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
}else{
document.getElementById('sDate').value = '<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')") echo $searchColumnValue;else echo 'S. DATE'; ?>';
}"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                                 
                       onkeyup="if(event.keyCode == 13 && document.getElementById('sDate').value != ''){ 
searchAuctionLoanPanel('<?php echo $documentRoot; ?>','DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')',
document.getElementById('sDate').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="6" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
            </td>
            <td>
                <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                   onclick="sortAuctionLoanPanel('<?php echo $documentRoot; ?>','STR_TO_DATE(girv_DOB,\'%d %M %Y\')','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeywordValue == "STR_TO_DATE(girv_DOB,'%d %M %Y')") { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="right" class="h7 border-bottom" width="80px">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="right">
                <input id="rDate" type="text" name="rDate" placeholder="DD.MM.YY"
                       value="<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOR,\'%d %M %Y\'),\'%y\')") echo $searchColumnValue;else echo 'REL. DATE'; ?>"   
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('rDate').value != '') {
searchAuctionLoanPanel('<?php echo $documentRoot; ?>','DAY(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOR,\'%d %M %Y\'),\'%y\')',document.getElementById('rDate').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
}else{
document.getElementById('rDate').value = '<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOR,\'%d %M %Y\'),\'%y\')") echo $searchColumnValue;else echo 'REL. DATE'; ?>';
}"
                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                                 
                       onkeyup="if(event.keyCode == 13 && document.getElementById('sDate').value != ''){ 
searchAuctionLoanPanel('<?php echo $documentRoot; ?>','DAY(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOR,\'%d %M %Y\'),\'%y\')',
document.getElementById('rDate').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="6" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Loan Released Date"
                   onclick="sortAuctionLoanPanel('<?php echo $documentRoot; ?>','STR_TO_DATE(girv_DOR,\'%d %M %Y\')','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeywordValue == "STR_TO_DATE(girv_DOR,'%d %M %Y')") { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
