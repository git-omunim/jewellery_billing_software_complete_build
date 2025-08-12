<?php
/*
 * **************************************************************************************
 * @tutorial:Girvi Panel Visible Div 
 * **************************************************************************************
 * 
 * Created on Aug 24, 2013 10:37:32 AM
 *
 * @FileName: orgpglpdvd.php
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
?>
<!-----------Start code to add gTransList param  @Author:PRIYA31MAY14----------------->
<td align = "left" class ="widthPX85"><!--Change in class @AUTHOR: SANDY29DEC13--->
    <div class = "border-right-bottom heightPX20">
        <table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
            <tr>
                <td align = "left">
                    <input id="sNo" type="text" name="sNo" placeholder="S.NO."
                           value = "<?php
                           if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num')
                               echo $searchColumnValue;
                           else
                               echo 'S.NO.';
                           ?>"
                           onclick = "javascript:this.value = '';"
                           onblur = "javascript:
                                           if (document.getElementById('sNo').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num@girv_serial_num',
                                               document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   } else {
                                       document.getElementById('sNo').value = '<?php
                           if ($searchColumnValue == 'girv_pre_serial_num@girv_serial_num')
                               echo $searchColumnValue;
                           else
                               echo 'S.NO';
                           ?>';
                                   }"
                           onkeyup = "if (event.keyCode == 13 && document.getElementById('sNo').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num@girv_serial_num',
                                               document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   }"
                           size = "3" maxlength = "30" class = "lgn-txtfield-without-borderAndBackground13-Arial" />
                </td>
                <td align = "right">
                    <a style = "cursor: pointer;" title = "Click To View Girvi By Serial Number"
                       onclick = "sortGirviPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num asc,girv_serial_num', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');">
                           <?php if ($sortKeyword == 'girv_pre_serial_num asc,girv_serial_num') {
                               ?>
                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</td>
<td align="right" class="widthPX165">
    <div class = "border-right-bottom heightPX20">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="right">
                    <input id="prinAmt" type="text" name="prinAmt" placeholder="PRIN. AMT"
                           value="<?php
                           if ($searchColumnName == 'girv_main_prin_amt')
                               echo $searchColumnValue;
                           else
                               echo 'PRIN. AMT.';
                           ?>" 
                           onclick="this.value = '';"
                           onblur="javascript:if (document.getElementById('prinAmt').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt',
                                               document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   } else {
                                       document.getElementById('prinAmt').value = '<?php
                           if ($searchColumnName == 'girv_main_prin_amt')
                               echo $searchColumnValue;
                           else
                               echo 'PRIN. AMT';
                           ?>';
                                   }"
                           onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"       
                           onkeyup="if (event.keyCode == 13 && document.getElementById('prinAmt').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt',
                                               document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   }"
                           size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right" />
                </td>
                <td align="right">
                    <a style="cursor: pointer;" title="Click To View Girvi By Principal Amount"
                       onclick="sortGirviPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');">
                           <?php if ($sortKeyword == 'girv_main_prin_amt') { ?>
                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</td>
<td align="left" class="widthPX165"><!--Change in class @AUTHOR: SANDY26DEC13--->
    <div class = "border-right-bottom heightPX20">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left">
                    <input id="name" type="text" name="name" placeholder="CUSTOMER NAME" 
                           value="<?php
                           if ($searchColumnName == 'girv_cust_fname@girv_cust_lname')
                               echo $searchColumnValue;
                           else
                               echo 'CUSTOMER NAME';
                           ?>"
                           onclick="this.value = '';"
                           onblur="javascript:if (document.getElementById('name').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname',
                                               document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   } else {
                                       document.getElementById('name').value = '<?php
                           if ($searchColumnName == 'girv_cust_fname@girv_cust_lname')
                               echo $searchColumnValue;
                           else
                               echo 'CUSTOMER NAME';
                           ?>';
                                   }"
                           onkeyup="if (event.keyCode == 13 && document.getElementById('name').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname',
                                               document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   }"
                           size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                </td>
                <td align="right">
                    <a style="cursor: pointer;" title="Click To View Girvi By Customer Name"
                       onclick="sortGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>','<?php echo $gTransList; ?>');">
                           <?php if ($sortKeyword == 'girv_cust_fname') { ?>
                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</td>
<td align="left" class="widthPX90">
    <div class = "border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">MOB NO</div>
    </div>
</td>
<td align="left" class="widthPX122"><!--Change in class @AUTHOR: SANDY26DEC13--->
    <div class = "border-right-bottom heightPX20">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left">
                    <input id="city" type="text" name="city" placeholder="CITY"
                           value="<?php
                           if ($searchColumnName == 'girv_cust_city')
                               echo $searchColumnValue;
                           else
                               echo 'CITY';
                           ?>" 
                           onclick="this.value = '';"
                           onblur="javascript:if (document.getElementById('city').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city',
                                               document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   } else {
                                       document.getElementById('city').value = '<?php
                           if ($searchColumnName == 'girv_cust_city')
                               echo $searchColumnValue;
                           else
                               echo 'CITY';
                           ?>';
                                   }"
                           onkeyup="if (event.keyCode == 13 && document.getElementById('city').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   }"
                           size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                </td>
                <td align="right">
                    <a style="cursor: pointer;" title="Click To View Girvi By Customer City"
                       onclick="sortGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>','<?php echo $gTransList; ?>');">
                           <?php if ($sortKeyword == 'girv_cust_city') { ?>
                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</td>
<td align="left"  class="widthPX90">    
    <div class="border-right-bottom heightPX20">
        <?php
        $firmIdSelected = $selFirmId;
        //to assign default firm id @AUTHOR: SANDY10JUL13
        if (!$firmIdSelected) {
            $firmIdSelected = $_SESSION['setFirmSession'];
        }
        $panelName = 'activeGirviList';
        $sortKeyword = addslashes($sortKeyword);
        include 'omffragp.php';
        ?>   
    </div>
</td>
<!----------Start code to add column @Author:PRIYA07MAY14-------------->
<?php // echo $panelName; ?>
<td align="left" class="widthPX90">    
    <div class="border-right-bottom heightPX20">
        <SELECT class="lgn-txtfield-without-borderAndBackground13-Arial" id="gTransList" name="gTransList"
                onchange="getGirviListInGirviPanelByFrmId('<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $panelName; ?>', this.value);">
                    <?php
                    $transFirm = array(allTransFirm, transFirm, nonTransFirm);
                    for ($i = 0; $i <= 2; $i++) {
                        if ($transFirm[$i] == $gTransList)
                            $$optionloanTypeoptionTransFirmSel[$i] = "selected";
                    }
                    ?>
            <OPTION  VALUE="allTransFirm" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionTransFirmSel[0]; ?>>TR.FIRM</OPTION>
            <OPTION  VALUE="transFirm" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionTransFirmSel[1]; ?>>TRANS.</OPTION>
            <OPTION  VALUE="nonTransFirm" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionTransFirmSel[2]; ?>>NON TRANS.</OPTION>
        </SELECT>
    </div>
</td>
<!----------End code to add column @Author:PRIYA07MAY14-------------->

<!--<td align="left" class="widthPX96">
    <div class = "border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">TR.FIRM</div>
    </div>
</td>-->

<!----------Start  code to add column Loan Type @Author:ANUJA21SEPT15-------------->
<td align="left" class="widthPX108">    
    <div class="border-right-bottom heightPX20">
        <SELECT class="lgn-txtfield-without-borderAndBackground13-Arial" id="gLoanType" name="gLoanType"
                onchange="getGirviListInGirviPanelByFrmId('<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $panelName; ?>', this.value);">
                    <?php
                    $loanType = array(AllGirvi,Sec.Loan, UnSec.Loan);
                        for ($i = 0; $i <= 2; $i++) {
                        if ($loanType[$i] == $gLoanType)
                            $optionloanType[$i] = "selected";
                    }
                    ?>
             <OPTION  VALUE="AllGirvi" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionloanType[0]; ?>>ALL LOAN</OPTION>
            <OPTION  VALUE="Sec.Loan" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionloanType[1]; ?>>SECURED LOAN</OPTION>
            <OPTION  VALUE="UnSec.Loan" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionloanType[2]; ?>>UNSECURED LOAN</OPTION>
           
        </SELECT>
    </div>
</td>
<!----------End  code to add column Loan Type @Author:ANUJA21SEPT15-------------->
<td align="right" class="widthPX84">
    <div class = "border-bottom heightPX20">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="right">
                    <input id="sDate" type="text" name="sDate" placeholder="DD.MM.YY" 
                           value="<?php
                           if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')")
                               echo $searchColumnValue;
                           else
                               echo 'S. DATE';
                           ?>" 
                           onclick="this.value = '';"
                           onblur="javascript:if (document.getElementById('sDate').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   } else {
                                       document.getElementById('sDate').value = '<?php
                           if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')")
                               echo $searchColumnValue;
                           else
                               echo 'S. DATE';
                           ?>';
                                   }"
                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"                          
                           onkeyup="if (event.keyCode == 13 && document.getElementById('sDate').value != '') {
                                       searchGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>');
                                   }"
                           size="5" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right spaceLeft5"/>
                </td>
                <td align="right">
                    <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                       onclick="sortGirviPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(girv_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>','<?php echo $gTransList; ?>')">
                           <?php if ($sortKeywordValue == "STR_TO_DATE(girv_DOB,'%d %M %Y')") { ?>
                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</td>
<!-----------End code to add gTransList param  @Author:PRIYA31MAY14----------------->