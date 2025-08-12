<?php
/*
 * **************************************************************************************
 * @tutorial: Transferred Girvi Header Hidden Div
 * **************************************************************************************
 * 
 * Created on May 22, 2013 2:45:31 PM
 *
 * @FileName: orgptrglhd.php
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
<td align="left" width="50px"> <!-- changes in width @AUTHOR: SANDY29DEC13 -->
    <div class = "border-right-bottom heightPX20">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left">
                    <input id="sNoHd" type="text" name="sNoHd" placeholder="S.NO."
                           value="<?php
                           if ($searchColumnName == 'gtrans_serial_num')
                               echo $searchColumnValue;
                           else
                               echo 'S.NO.';
                           ?>" 
                           onclick="this.value = '';"
                           onblur="javascript:if (document.getElementById('sNo').value != '') {
                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_serial_num', document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>');
                                   } else {
                                       document.getElementById('sNo').value = '<?php
                           if ($searchColumnName == 'gtrans_serial_num')
                               echo $searchColumnValue;
                           else
                               echo 'S.NO.';
                           ?>';
                                   }"
                           onkeyup="if (event.keyCode == 13 && document.getElementById('sNo').value != '') {
                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_serial_num',
                                               document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>');
                                   }"
                           size="3" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
                </td>
                <td align="right">
                    <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                       onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'gtrans_serial_num', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>')">
                        <?php if ($sortKeyword == 'gtrans_serial_num') { ?>
                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
<?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</td>
<td align="right"  width="80px">
    <div class = "border-right-bottom heightPX20">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="right">
                    <input id="prinAmtHd" type="text" name="prinAmtHd" placeholder="PRIN. AMT." 
                           value="<?php
                           if ($searchColumnName == 'gtrans_prin_amt')
                               echo $searchColumnValue;
                           else
                               echo 'PRIN. AMT.';
                           ?>" 
                           onclick="this.value = '';"
                           onblur="javascript:if (document.getElementById('prinAmt').value != '') {
                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt',
                                               document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>');
                                   } else {
                                       document.getElementById('prinAmt').value = '<?php
                           if ($searchColumnName == 'gtrans_prin_amt')
                               echo $searchColumnValue;
                           else
                               echo 'PRIN. AMT.';
                           ?>';
                                   }"
                           onkeyup="if (event.keyCode == 13 && document.getElementById('prinAmt').value != '') {
                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt',
                                               document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>');
                                   }"
                           size="7" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                </td>
                <td align="right">
                    <a style="cursor: pointer;" title="Click To View Girvi By Principal Amount"
                       onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>')">
<?php if ($sortKeyword == 'gtrans_prin_amt') { ?>
                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
<?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                    </a>
                </td>
            </tr>
        </table>  </div>
</td>
<td align="right" width="70px">
    <div class = "border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">INT AMT
        </div>  </div>
</td>
<td align="right" width="70px">
    <div class = "border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">TOT AMT
        </div>  </div>
</td>
<td align="left" width="110px">
    <div class = "border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">CUST NAME
        </div>  </div>
</td>
<td align="left" width="85px">
    <div class = "border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">CITY
        </div>  </div>
</td>
<td align="left" width="60px">
    <div class = "border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial">EX. FIRM                       
        </div>  </div>
</td>
<!---Start to change code @AUTHOR: SANDY29JAN14------------->
<td align="left" width="60px" class="border-right-bottom heightPX20 spaceLeft5">
    <div id="transDet1">
        <?php
//to assign default firm id @AUTHOR: SANDY10JUL13
        $firmIdSelected = $selTFirmId;
        $panelName = 'transGirviList';
        $sortKeyword = addslashes($sortKeyword);
        include 'ommlnmcd.php';
        ?>  
    </div>
</td>
<!---End to change code @AUTHOR: SANDY29JAN14------------->
<td align="right" width="60px">
    <div class = "border-right-bottom heightPX20">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="right">
                    <input id="sDateHd" type="text" name="sDateHd" placeholder="dd.mm.yy"                                                           
                           value="<?php
        if ($searchColumnName == "DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')")
            echo $searchColumnValue;
        else
            echo 'S . DATE';
        ?>"
                           onclick="this.value = '';"
                           onblur="javascript:if (document.getElementById('sDate').value != '') {
                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')',
                                               document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>');
                                   } else {
                                       document.getElementById('sDate').value = '<?php
                           if ($searchColumnName == "DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')")
                               echo $searchColumnValue;
                           else
                               echo 'S . DATE';
        ?>';
                                   }"
                           onkeyup="if (event.keyCode == 13 && document.getElementById('sDate').value != '') {
                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')',
                                               document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>');
                                   }"
                           size="5" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                </td>
                <td align="right">
                    <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                       onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(gtrans_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>')">
<?php if ($sortKeyword == "STR_TO_DATE(gtrans_DOB,'%d %b %Y')") { ?>
                            <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
<?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</td>
<td align="right"width="60px">
    <div class ="border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">REL DATE
        </div></div>  
</td>
<!--------Start code to add column @Author:PRIYA29OCT13 ------------------>
<!-----Start to add column principal type @AUTHOR: SANDY18DEC13------------->
<td align="center"width="20px">
    <div class ="border-right-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial">TYP
        </div></div>  
</td>
<td align="left" width="53px" class = "border-right-bottom  heightPX20">
    <div>
<?php
$gTransStatSelected = $gTransStatus;
// $sortKeyword = addslashes($sortKeyword);
include 'orgptgst.php';
?>
    </div>
</td>
<td align="center" width="5px">
    <div class = "border-bottom heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial">DEL</div>  
    </div>
</td>
<!--------End code to add column @Author:PRIYA29OCT13 ------------------>

