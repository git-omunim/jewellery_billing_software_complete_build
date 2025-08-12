<?php
/*
 * **************************************************************************************
 * @tutorial: Transferred Girvi Header Visible Div
 * **************************************************************************************
 * 
 * Created on Aug 24, 2013 11:06:59 AM
 *
 * @FileName: orgptrglvd.php
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
include 'orgptrcl.php';
?>
<?php
include 'olgglpad.php'; // include file Author:GAUR31MAY16
$givDateColumn = addslashes($givDateColumn);
$givRDateColumn = addslashes($givRDateColumn);
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSno' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <td align="left" width="60px"> <!-- changes in width @AUTHOR: SANDY29DEC13 -->
            <div class ="heightPX20">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <!------------Start code to add pre and post serial number @Author:PRIYA09JUN14------------>
                    <tr>
                        <td align="center">
                            <input id="sNo" type="text" name="sNo" placeholder="S.NO."
                                   value="<?php
                                   if ($searchColumnName == 'gtrans_pre_serial_num@gtrans_serial_num')
                                       echo $searchColumnValue;
                                   else
                                       echo 'S.NO.';
                                   ?>" 
                                   onclick="this.value = '';"
                                   onblur="javascript:if (document.getElementById('sNo').value != '') {
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_pre_serial_num@gtrans_serial_num', document.getElementById('sNo').value, '<?php echo $selFirmId; ?>',
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
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_pre_serial_num@gtrans_serial_num',
                                                               document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                               '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                   }"
                                   size="3" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
                        </td>
                        <td align="right">
                            <!-------Start code to change serial number sort option @Author:PRIYA23JUN14-------->
                            <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                               onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'global_gt_pre_serial_num asc,global_gt_serial_num', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>')">
                                   <?php if ($sortKeyword == 'global_gt_pre_serial_num asc,global_gt_serial_num') { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt=""/><?php } ?>
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
<!---Start to add token no @OMMODTAG SHRI_30NOV15------------->
<!--<td align="left" width="100px">
    <div class = "border-right-bottom heightPX20" title="PACKET NO">
        <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeftRight2">PKT.NO.                   
        </div>  
    </div>
</td>-->
<!---End to add token no @OMMODTAG SHRI_30NOV15------------->

<!---Start to sort the pkt no @Author: GAUR19DEC2015------------->
<!---Start to enter character in packet no @Author: SANT24MAY17------------->
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpPktno' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <td align="right" width="100px">
            <div class = " heightPX20">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="right">
                            <input id="pktNo" type="text" name="pktNo" placeholder="PKT.NO." 
                                   value="<?php
                                   if ($searchColumnName == 'gtrans_packet_num')
                                       echo $searchColumnValue;
                                   else
                                       echo 'PKT.NO.';
                                   ?>" 
                                   onclick="this.value = '';"
                                   onblur="javascript:if (document.getElementById('pktNo').value != '') {
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_packet_num',
                                                               document.getElementById('pktNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                               '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                   } else {
                                                       document.getElementById('pktNo').value = '<?php
                                   if ($searchColumnName == 'gtrans_packet_num')
                                       echo $searchColumnValue;
                                   else
                                       echo 'PKT.NO.';
                                   ?>';
                                                   }"          
                                   onkeyup="if (event.keyCode == 13 && document.getElementById('pktNo').value != '') {
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_packet_num',
                                                               document.getElementById('pktNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                               '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                   }"

                                   size="7" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>

                        </td>
                        <td align="right">
                            <a style="cursor: pointer;" title="Click To View Girvi By Packet No"
                               onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'gtrans_packet_num', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');">
                                   <?php if ($sortKeyword == 'gtrans_packet_num') { ?>
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
<!---End to enter character in packet no @Author: SANT24MAY17------------->
<!---End to sort the pkt no @Author: GAUR19DEC2015------------->
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpPrinAmt' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <td align="right" width="100px">
            <div class = " heightPX20">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
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
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt',
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
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt',
                                                               document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                               '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                   }"
                                   size="7" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                        </td>
                        <td align="right">
                            <a style="cursor: pointer;" title="Click To View Girvi By Principal Amount"
                               onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'gtrans_prin_amt', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');">
                                   <?php if ($sortKeyword == 'gtrans_prin_amt') { ?>
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpIntAmt' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <td align="right" width="100px">
            <div class = " heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">INT AMT
                </div>  </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTotAmt' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <td align="right" width="100px" class="pdngright20">
            <div class = " heightPX20" >
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">TOT AMT
                </div>  </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpCustName' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <td align="left" width="100px" class="pdngleft20">
            <div class = " heightPX20" >
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
                                                           searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname',
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
                                                           searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname',
                                                                   document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                                   '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                       }"
                                       size="18"  maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial mediaPrintCustName"/>  <!--Code to add class mediaPrintCustName @Author:SHRI03MAR15-->
                            </td>
                            <td align="center" width="30%">
                                <a style="cursor: pointer;" title="Click To View Girvi By Customer name"
                                   onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');">
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
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpFatherName' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <td align="left" width="155px">
            <div class = "heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeftRight2">F NAME                     
                </div>  
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpCity' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <!--<td align="left" width="100px">
            <div class = "border-right-bottom heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">MOB NO</div>  </div>
        </td>-->
        <td align="left" width="40px">
            <div class = " heightPX20">
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
                                                           searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city',
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
                                                           searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city',
                                                                   document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>',
                                                                   '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                       }"
                                       size="18"   maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial mediaPrintCity"/> <!--Code to add class mediaPrintCity @Author:SHRI03MAR15-->
                            </td>
                            <td align="right">
                                <a style="cursor: pointer;" title="Click To View Girvi By Customer city"
                                   onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');">
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpEfirm' and omin_contents = 'transferred'";
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTfirm' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <!---Start to change code @AUTHOR: SANDY29JAN14------------->
        <td align="left" width="70px" class="heightPX20 spaceLeft5">
            <div id="transDet">
                <?php
//to assign default firm id @AUTHOR: SANDY10JUL13
                $firmIdSelected = $selTFirmId;
                $mlSelected = $selMlName;
                $panelName = 'transGirviList';
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpOtherIn' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <td align="left" width="100px">
            <div class = "heightPX20" >
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeftRight2">OT IN                   
                </div>  
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSdate' and omin_contents = 'transferred'";
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
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')',
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
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOB,\'%d %M %Y\'),\'%y\')',
                                                               document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                   }"
                                   size="5" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                        </td>
                        <td align="right">
                            <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                               onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(gtrans_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>')">
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpRdate' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <!-----------Start code to add serch option @Author:PRIYA25JUN14--------------------->
        <td align="right" class="widthPX96">
            <div class = "heightPX20">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="right">
                            <input id="rDate" type="text" name="rDate" placeholder="dd.mm.yy"                                                         
                                   value="<?php
                                   if ($searchColumnName == "DAY(STR_TO_DATE(gtrans_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOR,\'%d %M %Y\'),\'%y\')")
                                       echo $searchColumnValue;
                                   else
                                       echo 'R . DATE';
                                   ?>"
                                   onclick="this.value = '';"
                                   onblur="javascript:if (document.getElementById('rDate').value != '') {
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(gtrans_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOR,\'%d %M %Y\'),\'%y\')',
                                                               document.getElementById('rDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                   } else {
                                                       document.getElementById('rDate').value = '<?php
                                   if ($searchColumnName == "DAY(STR_TO_DATE(gtrans_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOR,\'%d %M %Y\'),\'%y\')")
                                       echo $searchColumnValue;
                                   else
                                       echo 'R . DATE';
                                   ?>';
                                                   }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                         
                                   onkeyup="if (event.keyCode == 13 && document.getElementById('rDate').value != '') {
                                                       searchTransferGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(gtrans_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(gtrans_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(gtrans_DOR,\'%d %M %Y\'),\'%y\')',
                                                               document.getElementById('rDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>');
                                                   }"
                                   size="5" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                        </td>
                        <td align="right">
                            <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                               onclick="sortGirviTransferPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(gtrans_DOR,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage ?>', '<?php echo $selTFirmId; ?>', '<?php echo $gTransStatus; ?>', '<?php echo $selMlName; ?>')">
                                   <?php if ($sortKeywordValue == "STR_TO_DATE(gtrans_DOR,'%d %M %Y')") { ?>
                                    <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                                <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <!--    <div class ="border-right-bottom heightPX20">
                    <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceRight5">R DATE
                    </div></div>  -->
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpTyp' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <!-----------End code to add serch option @Author:PRIYA25JUN14--------------------->
        <!--------Start code to add column @Author:PRIYA29OCT13 ------------------>
        <!-----Start to add column principal type @AUTHOR: SANDY18DEC13------------->
        <td align="center" width="30px">
            <div class ="heightPX20">
                <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeftRight5">TYP
                </div></div>  
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpSt' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <!-----End to add column principal type @AUTHOR: SANDY18DEC13------------->
        <td align="left" width="55px"  valign="top" class ="heightPX20">
            <div><!--ClassName Changed @Author:PRIYA24AUG13-->
                <?php
                $gTransStatSelected = $gTransStatus;
                $sortKeyword = addslashes($sortKeyword);
                include 'orgptgst.php';
                ?>
            </div>
        </td>
        <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'transLpDel' and omin_contents = 'transferred'";
$resLpLayoutDet = mysqli_query($conn, $selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?> 
        <!---------Start code to add staff access condition @Author:PRIYA28FEB15----------->
        <?php if ($staffId && $array['delTransLoan'] == 'false') { ?>
        <?php } else { ?>
            <td align="center" width="22px" class="noPrint">
                <div class = " heightPX20">
                    <div class="lgn-txtfield-without-borderAndBackground13-Arial">DEL</div>  
                </div>
            </td>
        <?php } ?>
        <?php
    }
}
?>
<!---------End code to add staff access condition @Author:PRIYA28FEB15----------->
<!--------End code to add column @Author:PRIYA29OCT13 ------------------>
