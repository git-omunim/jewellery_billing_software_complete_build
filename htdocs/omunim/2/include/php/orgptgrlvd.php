<?php
/*
 * **************************************************************************************
 * @tutorial: Transferred add prin Header Visible Div
 * **************************************************************************************
 * 
 * Created on Dec 12, 2014 4:11:47 PM
 *
 * @FileName: orgptgrlvd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpSno' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left" width="60px"> <!-- changes in width @AUTHOR: SANDY29DEC13 -->
            <div class = "heightPX20">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <!------------Start code to add pre and post serial number @Author:PRIYA09JUN14------------>
                    <tr>
                        <td align="left">
                            <input id="sNo" type="text" name="sNo" placeholder="S.NO."
                                   value="<?php
                                   if ($searchColumnName == 'gtrans_pre_serial_num@gtrans_serial_num')
                                       echo $searchColumnValue;
                                   else
                                       echo 'S.NO.';
                                   ?>" 
                                   onclick="this.value = '';"
                                   onblur="javascript:if (document.getElementById('sNo').value != '') {
                                               searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_pre_serial_num@gtrans_serial_num', document.getElementById('sNo').value, '<?php echo $selFirmId; ?>',
                                                       '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                           } else {
                                               document.getElementById('sNo').value = '<?php
                                   if ($searchColumnName == 'gtrans_pre_serial_num@gtrans_serial_num')
                                       echo $searchColumnValue;
                                   else
                                       echo 'S.NO.';
                                   ?>';
                                           }"
                                   onkeyup="if (event.keyCode == 13 && document.getElementById('sNo').value != '') {
                                               searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_pre_serial_num@gtrans_serial_num',
                                                       document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                       '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                           }"
                                   size="8" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
                        </td>
                        <td align="right">
                            <!-------Start code to change serial number sort option @Author:PRIYA23JUN14-------->
                            <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                               onclick="sortUnRelGirviTransferPanel('<?php echo $documentRoot; ?>', 'global_gt_pre_serial_num asc,global_gt_serial_num', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>')">
                                   <?php if ($sortKeyword == 'global_gt_pre_serial_num asc,global_gt_serial_num') { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                            </a>
                            <!-------End code to change serial number sort option @Author:PRIYA23JUN14-------->
                        </td>
                    </tr>
                    <!------------End code to add pre and post serial number @Author:PRIYA09JUN14------------>
                </table>
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpPktno' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td class="h7 border-right-bottom" width="80px" align="left">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">PKT.NO.</div>
        </td>
        <?php
    }
}
?>        
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpCustName' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left" width="155px">
            <div class = "heightPX20">
                <div class="spaceLeft5">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
                        <tr>
                            <td align="left">
                                <input id="name" type="text" name="name" placeholder="CUST NAME" 
                                       value="<?php
                                       if ($searchColumnName == 'girv_cust_fname@girv_cust_lname')
                                           echo $searchColumnValue;
                                       else
                                           echo 'CUST NAME';
                                       ?>" 
                                       onclick="this.value = '';"
                                       onblur="javascript:if (document.getElementById('name').value != '') {
                                                   searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname',
                                                           document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                           '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                               } else {
                                                   document.getElementById('name').value = '<?php
                                       if ($searchColumnName == 'girv_cust_fname@girv_cust_lname')
                                           echo $searchColumnValue;
                                       else
                                           echo 'CUST NAME';
                                       ?>';
                                               }"
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('name').value != '') {
                                                   searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname',
                                                           document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                           '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                               }"
                                       size="18" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
                            </td>
                            <td align="right">
                                <a style="cursor: pointer;" title="Click To View Girvi By Customer name"
                                   onclick="sortUnRelGirviTransferPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');">
                                    <?php if ($sortKeyword == 'girv_cust_fname') { ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div> 
            </div>
        </td>
        <?php
    }
}
?>
<!--<td align="left" width="100px">
    <div class = "heightPX20">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">MOB NO</div>  </div>
</td>-->
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpFatherName' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td class="h7 border-right-bottom" width="80px" align="left">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">F NAME</div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpCity' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left" width="105px">
            <div class = "heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
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
                                                   searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city',
                                                           document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                           '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                               } else {
                                                   document.getElementById('city').value = '<?php
                                       if ($searchColumnName == 'girv_cust_city')
                                           echo $searchColumnValue;
                                       else
                                           echo 'CITY';
                                       ?>';
                                               }"
                                       onkeyup="if (event.keyCode == 13 && document.getElementById('city').value != '') {
                                                   searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city',
                                                           document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                           '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                               }"
                                       size="18" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
                            </td>
                            <td align="right">
                                <a style="cursor: pointer;" title="Click To View Girvi By Customer city"
                                   onclick="sortUnRelGirviTransferPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');">
        <?php if ($sortKeyword == 'girv_cust_city') { ?>
                                        <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>  
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpEfirm' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left" width="50px">
            <div class = "heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeftRight2">EFIRM                       
                </div>  
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpTfirm' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <!---Start to change code @AUTHOR: SANDY29JAN14------------->
        <td align="left" width="70px" class="heightPX20 spaceLeft5">
            <div id="transDet">
                <?php
                $firmIdSelected = $selTFirmId;
                $mlSelected = $selMlName;
                $panelName = 'TransUnReleaseList';
                $sortKeyword = addslashes($sortKeyword);
                include 'ommlnmcd.php';
                ?>  
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpOtherIn' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpSdate' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <!---End to change code @AUTHOR: SANDY29JAN14------------->
        <td align="right" width="74px">
            <div class = "heightPX20">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="right">
                            <input id="sDate" type="text" name="sDate" placeholder="dd.mm.yy"                                                         
                                   value="<?php
                                   if ($searchColumnName == "DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')")
                                       echo $searchColumnValue;
                                   else
                                       echo 'S . DATE';
                                   ?>"
                                   onclick="this.value = '';"
                                   onblur="javascript:if (document.getElementById('sDate').value != '') {
                                               searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')',
                                                       document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                           } else {
                                               document.getElementById('sDate').value = '<?php
                                   if ($searchColumnName == "DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')")
                                       echo $searchColumnValue;
                                   else
                                       echo 'S . DATE';
                                   ?>';
                                           }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                         
                                   onkeyup="if (event.keyCode == 13 && document.getElementById('sDate').value != '') {
                                               searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')',
                                                       document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                           }"
                                   size="5" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                        </td>
                        <td align="right">
                            <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                               onclick="sortUnRelGirviTransferPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(gtrans_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>')">
        <?php if ($sortKeywordValue == "STR_TO_DATE(gtrans_DOB,'%d %M %Y')") { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpTyp' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="center" width="50px">
            <div class ="heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeftRight5">TYP
                </div></div>  
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpPrinAmt' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right" width="100px">
            <div class = "heightPX20">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="right">
                            <input id="prinAmt" type="text" name="prinAmt" placeholder="PRIN. AMT." 
                                   value="<?php
                                   if ($searchColumnName == 'gtrans_prin_amt')
                                       echo $searchColumnValue;
                                   else
                                       echo 'PRIN. AMT.';
                                   ?>" 
                                   onclick="this.value = '';"
                                   onblur="javascript:if (document.getElementById('prinAmt').value != '') {
                                               searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt',
                                                       document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                       '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                           } else {
                                               document.getElementById('prinAmt').value = '<?php
                                   if ($searchColumnName == 'gtrans_prin_amt')
                                       echo $searchColumnValue;
                                   else
                                       echo 'PRIN. AMT.';
                                   ?>';
                                           }"
                                   onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"           
                                   onkeyup="if (event.keyCode == 13 && document.getElementById('prinAmt').value != '') {
                                               searchUnRelTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt',
                                                       document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                       '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                           }"
                                   size="7" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                        </td>
                        <td align="right">
                            <a style="cursor: pointer;" title="Click To View Girvi By Principal Amount"
                               onclick="sortUnRelGirviTransferPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');">
        <?php if ($sortKeyword == 'gtrans_prin_amt') { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                            </a>
                        </td>
                    </tr>
                </table>  
            </div>
        </td>
        <!--<td align="right" width="70px">
            <div class = "heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">INT AMT
                </div>  </div>
        </td>
        <td align="right" width="100px">
            <div class = "heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">TOT AMT
                </div> 
            </div>
        </td>-->
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpRel' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="center" width="55px"  valign="top" class =" heightPX20">
            <div class = "heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">REL
                </div> 
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'unRelTLpDel' and omin_contents = 'unRelTrans'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="center" width="22px" class="noPrint">
            <div class = " heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial">DEL</div>  
            </div>
        </td>
        <?php
    }
}
?>
<!--------End code to add column @Author:PRIYA29OCT13 ------------------>
