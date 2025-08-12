<?php
/*
 * **************************************************************************************
 * @tutorial: Loss Girvi List Header Visible Div
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
<?php
include 'olgglpad.php'; // include file Author:GAUR31MAY16
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpSno' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left"  class="h7 border-right-bottom" width="80px"><!--Change in width @AUTHOR: SANDY29DEC13---->
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left">
                        <input id="sNo" type="text" name="sNo" placeholder="S.N."
                               value="<?php
                               if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num')
                                   echo $searchColumnValue;
                               else
                                   echo 'S.N.';
                               ?>" 
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('sNo').value != '') {
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num@girv_serial_num', document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       } else {
                                           document.getElementById('sNo').value = '<?php
                               if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num')
                                   echo $searchColumnValue;
                               else
                                   echo 'S.N.';
                               ?>';
                                       }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('sNo').value != '') {
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num@girv_serial_num', document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       }"
                               size="1" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                           onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num asc,girv_serial_num', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
                            <?php if ($sortKeyword == 'girv_pre_serial_num asc,girv_serial_num') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpPrinAmt' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left" class="h7 border-right-bottom" width="120px"><!-- change in width @AUTHOR: SANDY6AUG13 --> 
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="right">
                        <input id="prinAmt" type="text" name="prinAmt" placeholder="PRIN.AMT."
                               value="<?php
                               if ($searchColumnName == 'girv_main_prin_amt')
                                   echo $searchColumnValue;
                               else
                                   echo 'PRIN. AMT.';
                               ?>" 
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('prinAmt').value != '<?php
                               if ($searchColumnName == 'girv_main_prin_amt')
                                   echo $searchColumnValue;
                               else
                                   echo 'PRIN. AMT.';
                               ?>') {
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt', document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       } else {
                                           document.getElementById('prinAmt').value = '';
                                       }"
                               onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"         
                               onkeyup="if (event.keyCode == 13 && document.getElementById('prinAmt').value != '') {
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt', document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       }"
                               size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Principal Amount"
                           onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
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
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpCustName' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left"  class="h7 border-right-bottom" width="132px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
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
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname', document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       } else {
                                           document.getElementById('name').value = '<?php
                               if ($searchColumnName == 'girv_cust_fname@girv_cust_lname')
                                   echo $searchColumnValue;
                               else
                                   echo 'CUST NAME';
                               ?>';
                                       }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('name').value != '') {
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname', document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       }"
                               size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Customer Name"
                           onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
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
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpFatherName' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td class="h7 border-right-bottom" width="105px">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">F NAME</div>
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpMobno' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="center"  class="border-right-bottom" width="80px">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial">MOB NO</div>
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT * FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpCity' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left"  class="h7 border-right-bottom" width="110px">
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
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       } else {
                                           document.getElementById('city').value = '<?php
                       if ($searchColumnName == 'girv_cust_city')
                           echo $searchColumnValue;
                       else
                           echo 'CITY';
                       ?>';
                                       }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('city').value != '') {
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       }"
                               size="6" maxlength="30"class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Customer City"
                           onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
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
    }
    ?>
    <?php
    $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpExFirm' and omin_contents = 'loss'";
    $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
    while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
        $panelVal = $rowLpLayoutDet['omin_value'];
        if ($panelVal == 'true') {
            ?>
        <td align="left"  class="h7 border-right-bottom" width="80px">
        <?php
        $firmIdSelected = $selFirmId;
        //to assign default firm id @AUTHOR: SANDY10JUL13
        if (!$firmIdSelected) {
            $firmIdSelected = $_SESSION['setFirmSession'];
        }
        $panelName = 'lossGirviList';
        $sortKeyword = addslashes($sortKeyword);
        include 'omffragp.php';
        ?>   
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpTotAmt' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right"  class="h7 border-right-bottom" width="95px">
            <div class="h7 spaceRight5">TOTAL AMT.</div>
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpGirviVal' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right" class="h7 border-right-bottom" width="94px">
            <div class="h7 spaceRight5">GIRVI VAL.</div>
        </td>
    <?php
    }
}
?>
                       <?php
                       $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpL' and omin_contents = 'loss'";
                       $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                       while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                           $panelVal = $rowLpLayoutDet['omin_value'];
                           if ($panelVal == 'true') {
                               ?>
        <!--<td align="right"  class="h7 border-right-bottom" width="89px">
            <div class="h7 spaceRight5">LOSS</div>
        </td>-->

        <!---Start to search loss loan amount @Author: GAUR21DEC2015------------->
        <td align="left"  class="h7 border-right-bottom" width="110px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="right">
                        <input id="loss" type="text" name="loss"  placeholder="LOSS"
                               value="<?php
                               if ($searchColumnName == '' && isset($searchColumnValue))
                                   echo $searchColumnValue;
                               else
                                   echo 'LOSS';
                               ?>" 
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('loss').value != '') {
        <?php $lossValue = $_POST['loss']; ?>
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', '', document.getElementById('loss').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $lossValue; ?>');
                                       } else {
                                           document.getElementById('loss').value = '<?php
        if ($searchColumnName == '' && isset($searchColumnValue))
            echo $searchColumnValue;
        else
            echo 'LOSS';
        ?>';
                                       }" 
                               onkeyup="if (event.keyCode == 13 && document.getElementById('loss').value != '') {
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', '', document.getElementById('loss').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $lossValue; ?>');
                                       }"
                               size="6" maxlength="30"class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>

                </tr>
            </table>
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpOtherIn' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td class="h7 border-right-bottom" width="100px">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">OT INFO</div>
        </td>
                           <?php
                           }
                       }
                       ?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpSdate' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>

        <!---End to search loan loss amount @Author: GAUR21DEC2015------------->


        <td align="right"  class="h7 border-right-bottom" width="91px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="right" title="DD.MM.YY">
                        <input id="sDate" type="text" name="sDate" placeholder="DD.MM.YY"
                               value="<?php
                       if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')")
                           echo $searchColumnValue;
                       else
                           echo 'S. DATE';
        ?>" 
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('sDate').value != '') {
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
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
                                           searchLossGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                       }"
                               size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                           onclick="sortGirviLossPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(girv_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeywordValue == "STR_TO_DATE(girv_DOB,'%d %M %Y')") { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpNt' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <!-- end code for to add month & year option in Loss Girvi panel @AUTHOR:LINA11JUN13-->
        <!-- ************************************************************************ -->
        <td align="center"  class="h7 border-right-bottom" title="Notice" width="16px">
            <div class="h7">NT</div>
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'lossLpSms' and omin_contents = 'loss'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="center"  class="h7 border-bottom" title="SMS" width="16px">
            <div class="h7">SMS</div>
        </td>
        <!-- Start code to add checkbox in the table @Author:@AUTHOR:SHE16MAR15-->
        <td align="center"  class="h7 border-bottom" valign="middle" width="15px">
            <div id="SelectAllSmsDiv">
                <input id="smsallcheck" name="smsallcheck" title="Click Here to Select SMS Template Id!"
                       type="checkbox" spellcheck="false" 
                       onclick="javascript:selectAllSms('lossGirviList');"
                       autocomplete="off" size="8" maxlength="16" />
            </div>
        </td>
    <?php
    }
}
?>

<!-- END code to add checkbox in the table @Author:@AUTHOR:SHE16MAR15-->
