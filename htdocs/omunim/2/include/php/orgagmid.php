<?php
/*
 * Created on Mar 19, 2011 5:53:04 PM
 *
 * @FileName: orgagmid.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
//to show or not customer girvi number @AUTHOR: SANDY12JUL13.
$qselectomlayout = "SELECT omly_value FROM omlayout WHERE omly_option = 'girviNoLay' ";
$qresultomlayout = mysqli_query($conn,$qselectomlayout);
$row = mysqli_fetch_array($qresultomlayout, MYSQLI_ASSOC);
$option = $row['omly_value'];

/* start code to provide monthly interest checkbox value @AUTHOR: SANDY17JUL13 */
$qry = "SELECT omin_value FROM omindicators where omin_option='frstmnthindic'";
$qryr = mysqli_query($conn,$qry);
$rowq = mysqli_fetch_array($qryr, MYSQLI_ASSOC);
$selected = $rowq['omin_value'];
/* end code to provide monthly interest checkbox value @AUTHOR:SANDY17JUL13 */

/* start code to check monthly interest checkbox value from girvi table @AUTHOR: SANDY17JUL13 */
//Start code to change columname to girv_fst_mn_int @Author:PRIYA15DEC13
$qry = "SELECT girv_fst_mn_int FROM girvi where girv_id= '$girviId'";
$qryr = mysqli_query($conn,$qry);
$rowq = mysqli_fetch_array($qryr, MYSQLI_ASSOC);
$selectfromgirvi = $rowq['girv_fst_mn_int'];
//End code to change columname to girv_fst_mn_int @Author:PRIYA15DEC13
/* end code to check monthly interest checkbox value from girvi table @AUTHOR:SANDY17JUL13 */
?>
<div id="addMoreItemDiv" class="gbx-bg">
    <form name="add_girvi_item" id="add_girvi_item"
          action="javascript:addGirviItem(document.getElementById('add_girvi_item'));"
          method="post">
        <table border="0" cellspacing="2" cellpadding="2" width="100%">
            <tr>
                <td align="left" width="100%" colspan="2">
                    <div class="spaceLeft20">
                        <table border="0" cellpadding="2" cellspacing="3" width="100%">
                            <tr align="left">
                                <td width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td width="50%" align="left"> 
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>  
                                                        <td align="right" valign="middle" class="girvi_head_maron_left16">Principal
                                                            Amount:</td>
                                                        <td align="left" valign="middle" class="girvi_head_black_left16">
                                                            <div class="spaceLeft5"><?php echo $globalCurrency.' '; ?> <?php echo $mainPrincAmount ?></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="50%" align="right"> 
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>  
                                                        <td align="right" valign="middle" class="girvi_head_maron">Interest
                                                            Option:</td>
                                                        <td align="left" valign="middle" class="girvi_head_black_left"><!-- START Select right value PHP code -->
                                                            <?php
                                                            $selInerestType = $ROIType;

                                                            switch ($selInerestType) {
                                                                case "Monthly":
                                                                    $optIntType1 = "selected";
                                                                    break;
                                                                case "Annually":
                                                                    $optIntType2 = "selected";
                                                                    break;
                                                            }
                                                            ?> <select id="interestType" name="interestType"
                                                                    class="lgn-txtfield"
                                                                    onchange="changeROIOpt('<?php echo $documentRoot; ?>','<?php echo $grvRelPayDetails; ?>',this,'<?php echo $princAmount; ?>','<?php echo $ROIId; ?>','<?php echo $girviDOB; ?>',document.getElementById('ROIOption'),'<?php echo $girviType; ?>','<?php echo $girviId; ?>','<?php echo $custId; ?>','<?php echo $girviUpdSts; ?>','<?php echo $omPanelDiv; ?>'); return false;">
                                                                <option value="Monthly" <?php echo $optIntType1; ?>>Monthly</option>
                                                                <option value="Annually" <?php echo $optIntType2; ?>>Annually</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                            </tr>
                            <tr>
                                <td align="left" width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
                                        <tr align="left">
                                            <td align="left" width="50%">
                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                    <tr align="left">
                                                        <td align="right" valign="middle">
                                                            <h4>Girvi Start Date:&nbsp;</h4>
                                                        </td>
                                                        <td align="left" class="frm-r1" valign="middle">
                                                            <h5>&nbsp;<?php echo $girviDOB ?></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="left" width="50%">
                                                <?php if ($girviUpdSts == 'Released') { ?>
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left"
                                                           width="100%">
                                                        <tr align="left">
                                                            <td align="right" valign="middle">
                                                                <h4>Girvi End Date:</h4>
                                                            </td>
                                                            <td align="left" class="frm-r1" valign="middle">
                                                                <h5>&nbsp;<?php echo $rowAllGirvi['girv_DOR']; ?></h5>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <hr color="#FD9A00" size="0.1px" />
                                </td>
                            </tr>
                            <tr align="left">
                                <td align="left" width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr align="left">
                                            <td align="left">
                                                <h4>Rate of Interest:</h4>
                                            </td>
                                            <td>
                                                <div id="ROIOption">
                                                    <?php
                                                    if ($selInerestType == 'Annually') {
                                                        include 'olggroia.php';//change in filename @AUTHOR: SANDY20NOV13
                                                    } else if ($selInerestType == 'Monthly') {
                                                        include 'olggroim.php';//change in filename @AUTHOR: SANDY20NOV13
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php
                            $girviFirmId = $rowAllGirvi['girv_firm_id'];
                            $qSelFirm = "SELECT firm_name FROM firm where firm_id='$girviFirmId' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                            $resFirm = mysqli_query($conn,$qSelFirm);
                            $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
                            ?>
                            <tr>
                                <td align="left" width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
                                        <tr align="left">
                                            <td align="left">
                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                    <tr align="left">
                                                        <td align="right" valign="middle">
                                                            <h4>Firm Name:&nbsp;</h4>
                                                        </td>
                                                        <td align="left" class="frm-r1" valign="middle">
                                                            <h5>&nbsp;<?php echo $rowFirm['firm_name']; ?></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="left">
                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                    <tr align="left">
                                                        <td align="left" valign="middle">
                                                            <h4>Firm Girvi No.:</h4>
                                                        </td>
                                                        <td align="left" class="frm-r1" valign="middle">
                                                            <h5>&nbsp;<?php echo $rowAllGirvi['girv_firm_girvi_no']; ?></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            
                                            <?php if ($option == 'girviNoYes') { ?> <!--Start code to add condition to show or not cust girvi no. @AUTHOR: SANDY17JUL13 -->
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr align="left">
                                                            <td align="left" valign="middle">
                                                                <h4>Cust Girvi No.:</h4>
                                                            </td>
                                                            <td align="left" class="frm-r1" valign="middle">
                                                                <h5>&nbsp;<?php if ($option == 'girviNoYes') echo $rowAllGirvi['girv_cust_girvi_num']; ?></h5>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            <?php } ?><!-- End code to add condition to show or not cust girvi no. @AUTHOR: SANDY17JUL13 -->
                                            <td align="left">
                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                    <tr align="left">
                                                        <td align="left" valign="middle">
                                                            <h4>Packet No.:</h4>
                                                        </td>
                                                        <td align="left" class="frm-r1" valign="middle">
                                                            <h5>&nbsp;<?php echo $rowAllGirvi['girv_packet_num']; ?></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!--start code to provide monthly interest checkbox @AUTHOR: SANDY18JUL13 -->
                                            <?php if ($selectfromgirvi=='true') { ?>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr><td>
                                                                <h4>First Mon Int: </h4>
                                                            </td>
                                                            <td align='left' class='frm-r1'>
                                                                <div id ="indicSelFirstMonthGd">
                                                                    <INPUT id="selFirstMonthIntGd" TYPE="checkbox" NAME="selFirstMonthIntGd" disabled="true"
                                                                           <?php if ($selectfromgirvi == 'true') echo 'checked'; else echo ''; ?> >
                                                                </div>
                                                            </td></tr>
                                                    </table>
                                                </td>
                                            <?php } ?>
                                            <!-- end code to provide monthly interest checkbox  @AUTHOR: SANDY18JUL13 -->

                                            <td align="left">
                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                    <tr align="left">
                                                        <td align="left" valign="middle">
                                                            <h4>Serial No.:</h4>
                                                        </td>
                                                        <td align="left" class="frm-r1" valign="middle">
                                                            <h5>&nbsp;<?php echo $rowAllGirvi['girv_pre_serial_num'] . $rowAllGirvi['girv_serial_num']; ?></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php
                            $girviId = $rowAllGirvi['girv_id'];

                            $qSelAllGirviItem = "SELECT * FROM girvi_items where girv_itm_girv_id='$girviId'";
                            $resAllGirviItem = mysqli_query($conn,$qSelAllGirviItem);
                            $totalNextGirviItem = mysqli_num_rows($resAllGirviItem);

                            while ($rowAllGirviItem = mysqli_fetch_array($resAllGirviItem, MYSQLI_ASSOC)) {
                                include 'orgigidv.php';
                            }
                            ?>
                            <?php
                            $submitButtDisplay = 'YES';
                            // To take the inputs from user to add new Item
                            include 'orgamisd.php';
                            ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="2">
                    <hr color="#B8860B" />
                </td>
            </tr>
            <tr>

        </table>
    </form>
</div>
