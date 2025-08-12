<?php
/*
 * **************************************************************************************
 * @tutorial: Released Girvi List Header Visible Div
 * **************************************************************************************
 * 
 * Created on Aug 24, 2013 11:14:00 AM
 *
 * @FileName: orgpreglvd.php
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpSno' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left" class="h7 border-right-bottom widthPX85">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left">
                        <input id="sNo" type="text" name="sNo" placeholder="S.No."
                               value="<?php if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num')
            echo $searchColumnValue;
        else
            echo 'S.NO.';
        ?>" 
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('sNo').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num@girv_serial_num', document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               } else {
                                                   document.getElementById('sNo').value = '<?php if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num')
                           echo $searchColumnValue;
                       else
                           echo 'S.NO.';
        ?>';
                                               }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('sNo').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num@girv_serial_num',
                                                           document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               }"
                               size="3" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
                    </td>
                    <td align="right" >
                        <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                           onclick="sortGirviReleasePanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num asc,girv_serial_num', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeyword == 'girv_pre_serial_num asc,girv_serial_num') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    <?php }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpPrinAmt' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right"   class="h7 border-right-bottom widthPX165">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="right">
                        <input id="prinAmt" type="text" name="prinAmt" placeholder="PRIN.AMT."
                               value="<?php if ($searchColumnName == 'girv_main_prin_amt')
                           echo $searchColumnValue;
                       else
                           echo 'PRIN. AMT.';
                       ?>" 
                               onclick="this.value = '';"                                       
                               onblur="javascript:if (document.getElementById('prinAmt').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt',
                                                           document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               } else {
                                                   document.getElementById('prinAmt').value = '<?php if ($searchColumnName == 'girv_main_prin_amt')
                           echo $searchColumnValue;
                       else
                           echo 'PRIN. AMT.';
        ?>';
                                               }"
                               onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"               
                               onkeyup="if (event.keyCode == 13 && document.getElementById('prinAmt').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt',
                                                           document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               }"
                               size="15" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                           onclick="sortGirviReleasePanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeyword == 'girv_main_prin_amt') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>
            </table> 
        </td>
    <?php }
}
//*****Start code for show prin amt and interest and tot prin amt in release loan list:Author:SANT31JAN17
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpTotPrinAmt' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right" class="h7 border-right-bottom" width="80px">
            <div class="h7 spaceRight5">TOTAL PRIN.</div> 
        </td>
    <?php }
} ?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpPrinAmtInt' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right"  class="h7 border-right-bottom" width="80px">
            <div class="h7 spaceRight5">INTEREST</div>
        </td> <?php }
} ?>        
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpToatalPrinAmt' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right"  class="h7 border-right-bottom" width="100px">
            <div class="h7 spaceRight5">TOTAL AMT.</div>
        </td> <?php }
} 
//*****End code for show prin amt and interest and tot prin amt in release loan list:Author:SANT31JAN17
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpCustName' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left"  class="h7 border-right-bottom widthPX186">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left">
                        <input id="name" type="text" name="name" placeholder="CUSTOMER NAME"
                               value="<?php if ($searchColumnName == 'girv_cust_fname@girv_cust_lname')
                           echo $searchColumnValue;
                       else
                           echo 'CUSTOMER NAME';
                       ?>"
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('name').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname',
                                                           document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               } else {
                                                   document.getElementById('name').value = '<?php if ($searchColumnName == 'girv_cust_fname@girv_cust_lname')
                        echo $searchColumnValue;
                    else
                        echo 'CUSTOMER NAME';
        ?>';
                                               }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('name').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname',
                                                           document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               }"
                               size="13" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Customer Name"
                           onclick="sortGirviReleasePanel('<?php echo $documentRoot; ?>', 'girv_cust_fname', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeyword == 'girv_cust_fname') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    <?php }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpFatherName' and omin_contents = 'released'";
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpMobno' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="center" class="border-right-bottom" width="70px">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial">MOB NO</div>
        </td>
                           <?php }
                       }
                       ?>
                       <?php
                       $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpCity' and omin_contents = 'released'";
                       $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                       while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                           $panelVal = $rowLpLayoutDet['omin_value'];
                           if ($panelVal == 'true') {
                               ?>
        <td align="left"  class="h7 border-right-bottom" width="181px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left">
                        <input id="city" type="text" name="city"  placeholder="CITY"
                               value="<?php if ($searchColumnName == 'girv_cust_city')
                                   echo $searchColumnValue;
                               else
                                   echo 'CITY';
                               ?>" 
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('city').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city',
                                                           document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               } else {
                                                   document.getElementById('city').value = '<?php if ($searchColumnName == 'girv_cust_city')
            echo $searchColumnValue;
        else
            echo 'CITY';
        ?>';
                                               }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('city').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'girv_cust_city',
                                                           document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               }"
                               size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Customer City"
                           onclick="sortGirviReleasePanel('<?php echo $documentRoot; ?>', 'girv_cust_city', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeyword == 'girv_cust_city') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    <?php }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpExFirm' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
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
                           <?php }
                       }
                       ?>
                       <?php
                       $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpTrFirm' and omin_contents = 'released'";
                       $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                       while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                           $panelVal = $rowLpLayoutDet['omin_value'];
                           if ($panelVal == 'true') {
                               ?>
        <td align="left" class="h7 border-right-bottom widthPX60">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">TR.FIRM</div>
        </td>
    <?php }
}
?>
                       <?php
                       $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpSdate' and omin_contents = 'released'";
                       $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                       while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                           $panelVal = $rowLpLayoutDet['omin_value'];
                           if ($panelVal == 'true') {
                               ?>
        <td class="h7 border-right-bottom" width="80px">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
                <tr>
                    <td align="right">
                        <input id="sDate" type="text" name="sDate" placeholder="DD.MM.YY"
                               value="<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')")
                                   echo $searchColumnValue;
                               else
                                   echo 'S. DATE';
                               ?>"   
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('sDate').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')',
                                                           document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               } else {
                                                   document.getElementById('sDate').value = '<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')")
            echo $searchColumnValue;
        else
            echo 'S. DATE';
        ?>';
                                               }"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                                 
                               onkeyup="if (event.keyCode == 13 && document.getElementById('sDate').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOB,\'%d %M %Y\'),\'%y\')',
                                                           document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               }"
                               size="6" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>
                    <td>
                        <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                           onclick="sortGirviReleasePanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(girv_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeywordValue == "STR_TO_DATE(girv_DOB,'%d %M %Y')") { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
                               <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    <?php }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpReldate' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right" class="h7 border-right-bottom" width="80px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="right">
                        <input id="rDate" type="text" name="rDate" placeholder="DD.MM.YY"
                               value="<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOR,\'%d %M %Y\'),\'%y\')")
            echo $searchColumnValue;
        else
            echo 'REL. DATE';
        ?>"   
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('rDate').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOR,\'%d %M %Y\'),\'%y\')', document.getElementById('rDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               } else {
                                                   document.getElementById('rDate').value = '<?php if ($searchColumnName == "DAY(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOR,\'%d %M %Y\'),\'%y\')")
            echo $searchColumnValue;
        else
            echo 'REL. DATE';
        ?>';
                                               }"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"                                                 
                               onkeyup="if (event.keyCode == 13 && document.getElementById('sDate').value != '') {
                                                   searchReleasedGirviPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_DOR,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_DOR,\'%d %M %Y\'),\'%y\')',
                                                           document.getElementById('rDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>');
                                               }"
                               size="6" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Loan Released Date"
                           onclick="sortGirviReleasePanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(girv_DOR,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeywordValue == "STR_TO_DATE(girv_DOR,'%d %M %Y')") { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    <?php }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpGirviVal' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td class="h7 border-right-bottom" width="80px">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">GIRVI VAL</div>
        </td> <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpSign' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td class="h7 border-right-bottom" width="100px">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">SIGNATURE</div>
        </td>
    <?php
    }
}
?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'relLpSms' and omin_contents = 'released'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <!--Start code to add checkbox in the table @Author:@AUTHOR:SHE16MAR15-->
        <td align="center"  class="h7 border-right-bottom" title="SMS" colspan="2">
            <div class="h7">SMS</div>

            <div id="SelectAllSmsDiv">
                <input id="smsallcheck" name="smsallcheck" title="Click Here to Select SMS Template Id!"
                       type="checkbox" spellcheck="false" 
                       onclick="javascript:selectAllSms('releaseGirviList');"
                       autocomplete="off" size="8" maxlength="16" />
            </div>
        </td>
    <?php }
}
?>
<!-- End code to add checkbox in the table @Author:@AUTHOR:SHE16MAR15-->
<!-- Start code to add checkbox in the table @Author:@AUTHOR:SANT23DEC16-->
<td align="center"  class="h7 border-bottom" title="Delete" colspan="2">
    <div class="h7">DEL</div>
    <div id="SelectAllDeleteDiv">
        <input id="deleteallcheck" name="deleteallcheck" title="Click Here to Select Delete Id!"
               type="checkbox" spellcheck="false" 
               onclick="javascript:selectAllDelete('releaseGirviList');"
               autocomplete="off" size="8" maxlength="16" />
    </div>
</td>
<!-- End code to add checkbox in the table @Author:@AUTHOR:SANT23DEC16-->
