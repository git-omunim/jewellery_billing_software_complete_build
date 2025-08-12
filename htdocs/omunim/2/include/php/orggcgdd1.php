<?php
/*
 * Created on Mar 16, 2011 7:12:14 PM
 *
 * @FileName: orggcgdd.php
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

require_once 'system/omssopin.php';

$qSelTransGirvi = "SELECT gtrans_id FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_girvi_id='$girviId'";
$resTransGirvi = mysqli_query($conn,$qSelTransGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelTransGirvi);
$rowTransGirvi = mysqli_fetch_array($resTransGirvi, MYSQLI_ASSOC);

$girviTransferredId = $rowTransGirvi['gtrans_id'];
$girviFinalValuation = 0;

//to show or not customer girvi number @AUTHOR: SANDY12JUL13.
$qselectomlayout = "SELECT omly_value FROM omlayout WHERE omly_option = 'girviNoLay' ";
$qresultomlayout = mysqli_query($conn,$qselectomlayout);
$row = mysqli_fetch_array($qresultomlayout, MYSQLI_ASSOC);
$option = $row['omly_value'];

/* start code to provide monthly interest checkbox value @AUTHOR: SANDY15JUL13 */
$qry = "SELECT omin_value FROM omindicators where omin_option='frstmnthindic'";
$qryr = mysqli_query($conn,$qry);
$rowq = mysqli_fetch_array($qryr, MYSQLI_ASSOC);
$selected = $rowq['omin_value'];
/* end code to provide monthly interest checkbox value @AUTHOR:SANDY15JUL13 */

/* start code to check monthly interest checkbox value from girvi table @AUTHOR: SANDY17JUL13 */
//Start code to change columname to girv_fst_mn_int @Author:PRIYA15DEC13
$qry = "SELECT girv_fst_mn_int FROM girvi where girv_id= '$girviId'";
$qryr = mysqli_query($conn,$qry);
$rowq = mysqli_fetch_array($qryr, MYSQLI_ASSOC);
$selectfromgirvi = $rowq['girv_fst_mn_int'];
//End code to change columname to girv_fst_mn_int @Author:PRIYA15DEC13
/* end code to check monthly interest checkbox value from girvi table @AUTHOR:SANDY17JUL13 */
?>
<div id="girviDetailsGlobalDiv">
    <div id="girviDetailsDiv" class="width950">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center">
                    <hr color="#FD9A00" size="0.1px" />
                </td>
            </tr>
            <tr>
                <td align="left" width="100%" colspan="2">
                    <div class="spaceLeftRight10">
                        <table border="0" cellpadding="1" cellspacing="1" width="100%">
                            <tr align="left">
                                <td width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="left"> 
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>  
                                                        <td align="right" valign="middle" class="girvi_head_maron_left16">Principal Amount:</td>
                                                        <td align="left" valign="middle" class="girvi_head_black_left16">
                                                            <div class="spaceLeft5" onclick="getPrincipalUpadateDiv();"><?php echo $globalCurrency.' '; ?> <?php echo $mainPrincAmount ?></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <?php if ($princAmount != $mainPrincAmount) { ?>
                                                <td align="left"> 
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>  
                                                            <td align="right" valign="middle" class="girvi_head_maron_left16">Updated Principal:</td>
                                                            <td align="left" valign="middle" class="girvi_head_blue_left16">
                                                                <div class="spaceLeft5" onclick="getPrincipalUpadateDiv();"><?php echo $globalCurrency.' '; ?> <?php echo $princAmount ?></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            <?php } ?>
                                            <td align="center" valign="middle">
                                                <div id="ajaxLoadCustGirviDetailsDiv" style="visibility: hidden">
                                                    <?php include 'omzaajld.php'; ?>
                                                </div>
                                            </td> 
                                            <td align="right"> 
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
                                                            ?> 
                                                            <select id="interestType" name="interestType"
                                                                    class="lgn-txtfield"
                                                                    onchange="changeROIOpt('<?php echo $documentRoot; ?>','<?php echo $grvRelPayDetails; ?>',this,'<?php echo $princAmount; ?>',document.getElementById('selROI').value,'<?php echo $girviNewDOB; ?>',document.getElementById('ROIOption'),'<?php echo $girviType; ?>','<?php echo $girviId; ?>','<?php echo $custId; ?>','<?php echo $girviUpdSts; ?>','<?php echo $omPanelDiv; ?>'); return false;">
                                                                <option value="Monthly" <?php echo $optIntType1; ?>>Monthly</option>
                                                                <option value="Annually" <?php echo $optIntType2; ?>>Annually</option>
                                                            </select>
                                                        </td>
                                                        <!--Start code to add div for display arrow if Int change @Author:PRIYA10SEP13-->
                                                        <td>
                                                            <div id="intTypeChangeDiv" style="visibility: hidden" class="girvi_head_blue_right"><img src="<?php echo $documentRoot; ?>/images/right16.png" width="16px" height="16px"></div>
                                                        </td>
                                                        <!--End code to add div for display arrow if Int change @Author:PRIYA10SEP13-->
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
                                        <tr align="left">
                                            <td align="left" width="40%">
                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                    <?php if ($girviDOB != $girviNewDOB) { ?>
                                                        <tr align="left">
                                                            <td align="right" valign="middle">
                                                                <h4>Girvi Old Date:&nbsp;</h4>
                                                            </td>
                                                            <td align="left" class="frm-r1" valign="middle">
                                                                <h5>&nbsp;<?php echo $girviDOB ?></h5>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr align="left">
                                                        <td align="right" valign="middle">
                                                            <h4>Girvi Start Date:&nbsp;</h4>
                                                        </td>
                                                        <td align="left" class="frm-r1" valign="middle">
                                                            <h5>&nbsp;<?php echo $girviNewDOB ?></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="center" width="20%">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td align="left" valign="middle">
                                                            <?php if ($girviUpdSts == 'Released') { ?> 
                                                                <div class="girvi_head_red"><img src="<?php echo $documentRootBSlash; ?>/images/released.png" alt="Released Girvi" title="Released Girvi" /></div>
                                                            <?php } else { ?>
                                                                <div class="girvi_head_green"><img src="<?php echo $documentRootBSlash; ?>/images/active.png" alt="Present Girvi" title="Present Girvi" /></div>
                                                            <?php } ?>
                                                            </div>
                                                        </td>
                                                        <td align="center" valign="middle">
                                                            <div id="transGirviDiv">
                                                                <?php
                                                                include 'olgggtrn.php';//changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
                                                                ?>
                                                            </div>
                                                            <div id="transGirviDelMessDiv" class="transGirviDelMessDiv">&nbsp;</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="right" width="40%" valign="middle">
                                                <?php if ($girviUpdSts == 'Released') { ?>
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left"
                                                           width="100%" valign="middle">
                                                        <tr align="left">
                                                            <td align="right" valign="middle">
                                                                <h4>Girvi End Date:</h4>
                                                            </td>
                                                            <td align="left" class="frm-r1" valign="middle">
                                                                <h5>&nbsp;<?php echo $rowAllGirvi['girv_DOR']; ?></h5>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                <?php } else { ?>
                                                    <div style="visibility: hidden">
                                                        <?php include 'olgrstrd.php'; //changes in  filename @AUTHOR: SANDY20NOV13?>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="display_girvi_transfer_div" class="display-girvi-transfer-div" style="visibility: hidden"></div>
                                </td>
                            </tr>
                            <?php include 'orgggtpa.php'; ?>
                            <tr>
                                <td align="right">
                                    <hr color="#FD9A00" size="0.1px" />
                                </td>
                            </tr>
                            <tr align="left">
                                <td align="left" width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" width="160px">
                                        <tr align="left">
                                            <td align="left" width="100px">
                                                <h4>Rate of Interest:</h4>
                                            </td>
                                            <!--Start code to add roi @Author:PRIYA07SEP13-->
                                            <!--Start code to add Func @Author:PRIYA12SEP13-->
                                            <td class="spaceLeft5" width="5px">
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
                                            <!--End code to add Func @Author:PRIYA12SEP13-->
                                            <!--End code to add roi @Author:PRIYA07SEP13-->
                                            <!--Start code to add div for display arrow if Roi change @Author:PRIYA10SEP13-->
                                            <td align="left">
                                                <div id="selROIChangeDiv" style="visibility: hidden" class="girvi_head_blue_right"><img src="<?php echo $documentRoot; ?>/images/right16.png" width="16px" height="16px"></div>
                                            </td>
                                            <!--End code to add div for display arrow if Roi change @Author:PRIYA10SEP13-->
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
                                                            <td align="left" class="blueMess14Arial" valign="middle">
                                                                &nbsp;<?php if ($option == 'girviNoYes') echo $rowAllGirvi['girv_cust_girvi_num']; ?>
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
                                            <?php if ($selectfromgirvi == 'true') { ?>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr><td>
                                                                <h4>First Mon Int: </h4>
                                                            </td>
                                                            <td align='left' class='frm-r1'>
                                                                <div id ="indicSelFirstMonthGd">
                                                                    <INPUT id="selFirstMonthIntGd" TYPE="checkbox" NAME="selFirstMonthIntGd"  disabled="true"
                                                                           <?php if ($selectfromgirvi == 'true') echo 'checked'; else echo ''; ?>  >
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
                            <tr>
                                <td align="center">
                                    <hr color="#FD9A00" size="0.1px" />
                                </td>
                            </tr>

                            <tr>
                                <td align="left" width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
                                        <?php if ($girviType == 'Sec.Loan') { ?>
                                            <tr align="left">
                                                <td align="left">
                                                    <h4>Metal Type</h4>
                                                </td>
                                                <td align="left">
                                                    <h4>Item Name</h4>
                                                </td>
                                                <td align="center">
                                                    <h4>QTY</h4>
                                                </td>
                                                <td align="right">
                                                    <h4>Gross Weight</h4>
                                                </td>
                                                <td align="right">
                                                    <h4>Net Weight</h4>
                                                </td>
                                                <td align="right">
                                                    <h4>Tunch</h4>
                                                </td>
                                                <td align="right">
                                                    <h4>Valuation</h4>
                                                </td>

                                                <td align="center">

                                                </td>

                                            </tr>
                                            <?php
                                            /* $girviItemId = $_GET['girv_itm_id'];
                                              // echo 'girviItemId:'.$girviItemId;
                                              $qSelectGItemSnap = "SELECT girv_itm_snap, girv_itm_snap_ftype FROM girvi_items WHERE girv_itm_id='$girviItemId'";
                                              $resGItemSnap = mysqli_query($conn,"$qSelectGItemSnap");
                                              $rowGItemSnap = mysqli_fetch_array($resGItemSnap);
                                              $gItemSnapFiletype = $rowGItemSnap['girv_itm_snap_ftype'];
                                              $gItemSnap = $rowGItemSnap['girv_itm_snap'];

                                              header("Content-type: $gItemSnapFiletype");
                                              echo $gItemSnap; */
                                            /*                                             * **26** */

                                            $girviFinalValuation = 0;
                                            //Start Code For Gold Item
                                            //Changes in query @AUTHOR: SANDY23SEP13
                                            $qSelAllGirviItem = "SELECT * FROM girvi_items where girv_itm_girv_id='$girviId' and girv_itm_metal_type='Gold' and girv_itm_upd_sts='New'";
                                            $resAllGirviItem = mysqli_query($conn,$qSelAllGirviItem);
                                            $totalNextGirviItem = mysqli_num_rows($resAllGirviItem);

                                            while ($rowAllGirviItem = mysqli_fetch_array($resAllGirviItem, MYSQLI_ASSOC)) {
                                                include 'olgigoid.php';//changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
                                            }
                                            //End Code For Gold Item
                                            //
                                    //Start Code For Silver Item
                                            //Changes in query @AUTHOR: SANDY23SEP13
                                            $qSelAllGirviItem = "SELECT * FROM girvi_items where girv_itm_girv_id='$girviId' and girv_itm_metal_type='Silver' and girv_itm_upd_sts='New'";
                                            $resAllGirviItem = mysqli_query($conn,$qSelAllGirviItem);
                                            $totalNextGirviItem = mysqli_num_rows($resAllGirviItem);

                                            while ($rowAllGirviItem = mysqli_fetch_array($resAllGirviItem, MYSQLI_ASSOC)) {
                                                include 'olgigoid.php';//changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
                                            }
                                            //End Code For Silver Item
                                            //
                                    //Start Code For Other Item
                                            //Changes in query @AUTHOR: SANDY23SEP13
                                            $qSelAllGirviItem = "SELECT * FROM girvi_items where girv_itm_girv_id='$girviId' and girv_itm_metal_type='Other' and girv_itm_upd_sts='New'";
                                            $resAllGirviItem = mysqli_query($conn,$qSelAllGirviItem);
                                            $totalNextGirviItem = mysqli_num_rows($resAllGirviItem);

                                            while ($rowAllGirviItem = mysqli_fetch_array($resAllGirviItem, MYSQLI_ASSOC)) {
                                                include 'olgigoid.php';//changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
                                            }
                                            //End Code For Other Item
                                            $_SESSION['girviValuation'] = $girviFinalValuation;
                                            ?><?php } else { ?>
                                            <tr align="center">
                                                <td align="center" colspan="7" class="redMess13Arial">~ Packed Girvi ~</td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                            <?php if ($girviOtherInfo != '' || $girviOtherInfo != NULL) { ?>
                                <tr>
                                    <td align="right">
                                        <hr color="#FD9A00" size="0.1px" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" width="100%" valign="top">
                                        <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top">
                                            <tr>
                                                <td align="right" valign="middle">
                                                    <h4>Other Information:&nbsp;</h4>
                                                </td>
                                                <td align="left" class="frm-r1"><h5><?php echo $girviOtherInfo; ?></h5></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td align="right">
                                    <hr color="#FD9A00" size="0.1px" />
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="100%">
                                    <div id="girviTotalResultDiv">
                                        <?php
                                        include 'orggttrd.php';
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <?php include 'olgggcmt.php'; //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13?>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>   
