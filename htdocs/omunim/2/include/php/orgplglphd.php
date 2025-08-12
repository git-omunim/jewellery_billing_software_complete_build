<?php

/*
 * **************************************************************************************
 * @tutorial: Loss Girvi List Header Hidden Div
 * **************************************************************************************
 * 
 * Created on Aug 24, 2013 11:25:32 AM
 *
 * @FileName: orgplglpvd.php
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
<td align="left"  class="h7 border-right-bottom" width="80px"><!--Change in width @AUTHOR: SANDY29DEC13---->
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="sNoHd" type="text" name="sNoHd" placeholder="S.N."
                       value="<?php if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num') echo $searchColumnValue;else echo 'S.N.'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('sNo').value != '') {
                           searchLossGirviPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num@girv_serial_num',document.getElementById('sNo').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
                       }else{
                           document.getElementById('sNo').value = '<?php if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num') echo $searchColumnValue;else echo 'S.N.'; ?>';
                       }"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('sNo').value != ''){ 
                       searchLossGirviPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num@girv_serial_num',document.getElementById('sNo').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="1" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                   onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>','girv_pre_serial_num asc,girv_serial_num','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == 'girv_pre_serial_num asc,girv_serial_num') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="left" class="h7 border-right-bottom" width="120px"><!-- change in width @AUTHOR: SANDY6AUG13 --> 
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="right">
                <input id="prinAmtHd" type="text" name="prinAmtHd" placeholder="PRIN.AMT."
                       value="<?php if ($searchColumnName == 'girv_main_prin_amt') echo $searchColumnValue;else echo 'PRIN. AMT.'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('prinAmt').value != '<?php if ($searchColumnName == 'girv_main_prin_amt') echo $searchColumnValue;else echo 'PRIN. AMT.'; ?>') {
                   searchLossGirviPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt',document.getElementById('prinAmt').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
               }else{
                   document.getElementById('prinAmt').value = '';
               }"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('prinAmt').value != ''){ 
               searchLossGirviPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt',document.getElementById('prinAmt').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Principal Amount"
                   onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>','girv_main_prin_amt','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == 'girv_main_prin_amt') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="left" class="h7 border-right-bottom" width="120px">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="nameHd" type="text" name="nameHd" placeholder="CUST NAME"
                       value="<?php if ($searchColumnName == 'girv_cust_fname@girv_cust_lname') echo $searchColumnValue;else echo 'CUST NAME'; ?>"
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('name').value != '') {
           searchLossGirviPanel('<?php echo $documentRoot; ?>','girv_cust_fname@girv_cust_lname',document.getElementById('name').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
       }else{
           document.getElementById('name').value = '<?php if ($searchColumnName == 'girv_cust_fname@girv_cust_lname') echo $searchColumnValue;else echo 'CUST NAME'; ?>';
       }"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('name').value != ''){ 
       searchLossGirviPanel('<?php echo $documentRoot; ?>','girv_cust_fname@girv_cust_lname',document.getElementById('name').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Customer Name"
                   onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>','girv_cust_fname','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == 'girv_cust_fname') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="left"  class="border-right-bottom" width="95px">
    <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">MOB NO</div>
</td>
<td align="left"  class="h7 border-right-bottom" width="110px">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <input id="cityHd" type="text" name="cityHd" placeholder="CITY"
                       value="<?php if ($searchColumnName == 'girv_cust_city') echo $searchColumnValue;else echo 'CITY'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('city').value != '') {
   searchLossGirviPanel('<?php echo $documentRoot; ?>','girv_cust_city',document.getElementById('city').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
}else{
   document.getElementById('city').value = '<?php if ($searchColumnName == 'girv_cust_city') echo $searchColumnValue;else echo 'CITY'; ?>';
}"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('city').value != ''){ 
searchLossGirviPanel('<?php echo $documentRoot; ?>','girv_cust_city',document.getElementById('city').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>'); }"
                       size="6" maxlength="30"class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Customer City"
                   onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>','girv_cust_city','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == 'girv_cust_city') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<td align="left"  class="h7 border-right-bottom" width="80px">
    <?php
    $firmIdSelected = $selFirmId;
    //to assign default firm id @AUTHOR: SANDY10JUL13
    if (!$firmIdSelected) {
        $firmIdSelected = $_SESSION['setFirmSession'];
    }
    $panelName = 'lossGirviList';
    //$sortKeyword = addslashes($sortKeyword);
    include 'omffragp.php';
    ?>   
</td>
<td align="right"  class="h7 border-right-bottom" width="95px">
    <div class="h7 spaceRight5">TOTAL AMT.</div>
</td>
<td align="right" class="h7 border-right-bottom" width="94px">
    <div class="h7 spaceRight5">GIRVI VAL.</div>
</td>
<td align="right"  class="h7 border-right-bottom" width="89px">
    <div class="h7 spaceRight10">LOSS</div>
</td>
<td align="right"  class="h7 border-right-bottom" width="91px">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="right" title="DD.MM.YY">
                <input id="sDateHd" type="text" name="sDateHd" placeholder="DD.MM.YY"
                       value="<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')") echo $searchColumnValue;else echo 'S. DATE'; ?>" 
                       onclick="this.value = '';"
                       onblur="javascript:if(document.getElementById('sDate').value != '') {
searchLossGirviPanel('<?php echo $documentRoot; ?>','DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')',document.getElementById('sDate').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');
}else{
document.getElementById('sDate').value = '<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')") echo $searchColumnValue;else echo 'S. DATE'; ?>';
}"
                       onkeyup="if(event.keyCode == 13 && document.getElementById('sDate').value != ''){ 
searchLossGirviPanel('<?php echo $documentRoot; ?>','DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')',document.getElementById('sDate').value,'<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>');}"
                       size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
            </td>
            <td align="right">
                <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                   onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>','STR_TO_DATE(girv_DOB,\'%d %M %Y\')','<?php echo $selFirmId; ?>','<?php echo $rowsPerPage; ?>')">
                       <?php if ($sortKeyword == "STR_TO_DATE(girv_DOB,\'%d %M %Y\')") { ?>
                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                    <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                </a>
            </td>
        </tr>
    </table>
</td>
<!-- end code for to add month & year option in Loss Girvi panel @AUTHOR:LINA11JUN13-->
<!-- ************************************************************************ -->
<td align="left"  class="h7 border-bottom" title="Notice">
    <div class="h7">NT</div>
</td>
