<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Sep 24, 2014 8:27:01 PM
 *
 * @FileName: orgpllpnvd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
$givDateColumn = addslashes($givDateColumn);
$givDayColumn = addslashes($givDayColumn);
$searchColumnStr = addslashes($searchColumnStr);

//CHANGE THE PRIN AMT AND CITY WIDTH TO 90 TO 70 AND ADD 60 OTHER INFO AUTHOR:GAUR02JUNE16
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpSno' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left"  class="h7 border-right-bottom" width="75px"><!--Change in width @AUTHOR: SANDY29DEC13---->
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
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num@girv_serial_num', document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       } else {
                                           document.getElementById('sNo').value = '<?php
                               if ($searchColumnName == 'girv_pre_serial_num@girv_serial_num')
                                   echo $searchColumnValue;
                               else
                                   echo 'S.N.';
                               ?>';
                                       }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('sNo').value != '') {
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num@girv_serial_num', document.getElementById('sNo').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       }"
                               size="1" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Serial No"
                           onclick="sortLoansListPanel('<?php echo $documentRoot; ?>', 'girv_pre_serial_num asc,girv_serial_num', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
                            <?php if ($sortKeyword == 'girv_pre_serial_num asc,girv_serial_num') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>

            </table>
        </td>
    <?php }
} ?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpPrinAmt' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left" class="h7 border-right-bottom" width="70px"><!-- change in width @AUTHOR: SANDY6AUG13 --> 
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
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt', document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       } else {
                                           document.getElementById('prinAmt').value = '';
                                       }"
                               onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"         
                               onkeyup="if (event.keyCode == 13 && document.getElementById('prinAmt').value != '') {
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt', document.getElementById('prinAmt').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       }"
                               size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Principal Amount"
                           onclick="sortLoansListPanel('<?php echo $documentRoot; ?>', 'girv_main_prin_amt', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeyword == 'girv_main_prin_amt') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>

            </table>
        </td>
    <?php }
} ?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpTotprin' and omin_contents = 'active'";
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpInt' and omin_contents = 'active'";
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
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpOmInt' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right"  class="h7 border-right-bottom" width="80px">
            <div class="h7 spaceRight5">1M INT</div>
        </td> <?php }
} ?>        
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpTotAmt' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="right"  class="h7 border-right-bottom" width="100px">
            <div class="h7 spaceRight5">TOTAL AMT.</div>
        </td> <?php }
} ?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpCustName' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left"  class="h7 border-right-bottom" width="105px">
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
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname', document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       } else {
                                           document.getElementById('name').value = '<?php
                       if ($searchColumnName == 'girv_cust_fname@girv_cust_lname')
                           echo $searchColumnValue;
                       else
                           echo 'CUST NAME';
                       ?>';
                                       }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('name').value != '') {
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname@girv_cust_lname', document.getElementById('name').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       }"
                               size="10" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Customer Name"
                           onclick="sortLoansListPanel('<?php echo $documentRoot; ?>', 'girv_cust_fname', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeyword == 'girv_cust_fname') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr> 
            </table>
        </td>
    <?php }
} ?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpFatherName' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
                <td class="h7 border-right-bottom" width="80px">
                     <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">F NAME</div>
                </td> <?php }
}
        ?>
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpMobno' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="center"  class="border-right-bottom" width="75px">
            <div class="lgn-txtfield-without-borderAndBackground13-Arial">MOB NO</div>
        </td><?php }
} ?>
                       <?php
                       $selLpLayoutDet = "SELECT * FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpCity' and omin_contents = 'active'";
                       $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                       while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                           $panelVal = $rowLpLayoutDet['omin_value'];
                           if ($panelVal == 'true') {
                               ?>
        <td align="left"  class="h7 border-right-bottom" width="70px">
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
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       } else {
                                           document.getElementById('city').value = '<?php
                               if ($searchColumnName == 'girv_cust_city')
                                   echo $searchColumnValue;
                               else
                                   echo 'CITY';
                               ?>';
                                       }"
                               onkeyup="if (event.keyCode == 13 && document.getElementById('city').value != '') {
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', document.getElementById('city').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       }"
                               size="6" maxlength="30"class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Customer City"
                           onclick="sortLoansListPanel('<?php echo $documentRoot; ?>', 'girv_cust_city', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeyword == 'girv_cust_city') { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
            <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>

            </table>
        </td>
        <?php }
    } ?>
    <?php
    $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpFirm' and omin_contents = 'active'";
    $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
    while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
        $panelVal = $rowLpLayoutDet['omin_value'];
        if ($panelVal == 'true') {
            ?>
        <td align="left"  class="h7 border-right-bottom" width="75px">
        <?php
        $firmIdSelected = $selFirmId;
//to assign default firm id @AUTHOR: SANDY10JUL13
        if (!$firmIdSelected) {
            $firmIdSelected = $_SESSION['setFirmSession'];
        }
        $panelName = 'loansList';
        $sortKeyword = addslashes($sortKeyword);
        include 'omffragp.php';
        ?>   
        </td>
                    <?php }
                } ?>
<!----------Start  code to add column Loan Type @Author:ANUJA25SEPT15-------------->
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpAloan' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <td align="left" class="h7 border-right-bottom" width="100px">    

            <SELECT class="lgn-txtfield-without-borderAndBackground13-Arial" id="gLoanType" name="gLoanType"
                    onchange="getGirviListInGirviPanelByFrmId('<?php echo $selFirmId; ?>', '<?php echo $sortKeyword; ?>', '<?php echo $searchColumnName; ?>', '<?php echo $searchColumnValue; ?>', '<?php echo $panelName; ?>', this.value, '<?php echo $searchPreColumn; ?>', '<?php echo $searchPreValue; ?>');">
        <?php
        $loanType = array(AllGirvi, Sec.Loan, UnSec.Loan);
        for ($i = 0; $i <= 2; $i++) {
            if ($loanType[$i] == $gLoanType)
                $optionloanType[$i] = "selected";
        }
        ?>
                <OPTION  VALUE="AllGirvi" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionloanType[0]; ?>>ALL LOAN</OPTION>
                <OPTION  VALUE="Sec.Loan" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionloanType[1]; ?>>SECURED LOAN</OPTION>
                <OPTION  VALUE="UnSec.Loan" class="lgn-txtfield-without-borderAndBackground13-Arial" <?php echo $optionloanType[2]; ?>>UNSECURED LOAN</OPTION>

            </SELECT>

        </td>
                           <?php }
                       } ?>
           
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpOtherIn' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
                <td class="h7 border-right-bottom" width="80px">
                     <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">OT INFO</div>
                </td> <?php }
}
        ?>
                <?php
                $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpDay' and omin_contents = 'active'";
                $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                    $panelVal = $rowLpLayoutDet['omin_value'];
                    if ($panelVal == 'true') {
                        ?>
                         <td align="right"  class="h7 border-right-bottom" width="75px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">

                <tr>
                    <td align="right" title="DD-DD">
                        <input id="day" type="text" name="day" placeholder="DD-DD"
                               value="<?php
                       if ($searchColumnName == "DAY(STR_TO_DATE(girv_new_DOB,\'%d \'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d \'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d \'),\'%y\')")
                           echo $searchColumnValue;
                       else
                           echo 'DAY';
                               ?>" 
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('day').value != '') {
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_new_DOB,\'%d \'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d \'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d \'),\'%y\')', document.getElementById('day').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       } else {
                                           document.getElementById('day').value = '<?php
                       if ($searchColumnName == "DAY(STR_TO_DATE(girv_new_DOB,\'%d \'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d \'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d \'),\'%y\')")
                           echo $searchColumnValue;
                       else
                           echo 'DAY';
                               ?>';
                                       }"
                               onkeypress="javascript:return valKeyPressedForNumNDash(event);"                        
                               onkeyup="if (event.keyCode == 13 && document.getElementById('day').value != '') {
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_new_DOB,\'%d \'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d \'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d \'),\'%y\')', document.getElementById('day').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       }"
                               size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>
                 </tr>
            </table>
        </td>
                        <?php
                    }
                }
                ?>  
        <?php
        $selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpGirviVal' and omin_contents = 'active'";
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
<!----------End  code to add column Loan Type @Author:ANUJA25SEPT15-------------->
                       <?php
                       $selLpLayoutDet = "SELECT * FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpSdate' and omin_contents = 'active'";
                       $resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
                       while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
                           $panelVal = $rowLpLayoutDet['omin_value'];
                           if ($panelVal == 'true') {
                               ?>
        <td align="right"  class="h7 border-right-bottom" width="75px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">

                <tr>
                    <td align="right" title="DD.MM.YY">
                        <input id="sDate" type="text" name="sDate" placeholder="DD.MM.YY"
                               value="<?php
                       if ($searchColumnName == "DAY(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d %M %Y\'),\'%y\')")
                           echo $searchColumnValue;
                       else
                           echo 'S. DATE';
                               ?>" 
                               onclick="this.value = '';"
                               onblur="javascript:if (document.getElementById('sDate').value != '') {
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       } else {
                                           document.getElementById('sDate').value = '<?php
                       if ($searchColumnName == "DAY(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d %M %Y\'),\'%y\')")
                           echo $searchColumnValue;
                       else
                           echo 'S. DATE';
                               ?>';
                                       }"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"                        
                               onkeyup="if (event.keyCode == 13 && document.getElementById('sDate').value != '') {
                                           searchActiveLoansListPanel('<?php echo $documentRoot; ?>', 'DAY(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@MONTH(STR_TO_DATE(girv_new_DOB,\'%d %M %y\'))@DATE_FORMAT(STR_TO_DATE(girv_new_DOB,\'%d %M %Y\'),\'%y\')', document.getElementById('sDate').value, '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $searchColumnStr; ?>', '<?php echo $expMonths; ?>');
                                       }"
                               size="4" maxlength="30" class="lgn-txtfield-without-borderAndBackground13-Arial-right"/>
                    </td>
                    <td align="right">
                        <a style="cursor: pointer;" title="Click To View Girvi By Girvi Date"
                           onclick="sortLoansListPanel('<?php echo $documentRoot; ?>', 'STR_TO_DATE(girv_new_DOB,\'%d %M %Y\')', '<?php echo $selFirmId; ?>', '<?php echo $rowsPerPage; ?>')">
        <?php if ($sortKeywordValue == "STR_TO_DATE(girv_new_DOB,'%d %M %Y')") { ?>
                                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" />
        <?php } else { ?> <img src="<?php echo $documentRoot; ?>/images/arrowInAct10x13.png" alt="" /><?php } ?>
                        </a>
                    </td>
                </tr>

            </table>
        </td>
    <?php }
} ?>
 <?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpSign' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
                <td class="h7 border-right-bottom" width="100px">
                     <div class="lgn-txtfield-without-borderAndBackground13-Arial spaceLeft5">SIGNATURE</div>
                </td> <?php }
}
        ?>       
<?php
$selLpLayoutDet = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'actLpSms' and omin_contents = 'active'";
$resLpLayoutDet = mysqli_query($conn,$selLpLayoutDet);
while ($rowLpLayoutDet = mysqli_fetch_array($resLpLayoutDet)) {
    $panelVal = $rowLpLayoutDet['omin_value'];
    if ($panelVal == 'true') {
        ?>
        <!--Start code to add checkbox in the table @Author:@AUTHOR:SHE16MAR15-->
        <td align="center"  class="h7 border-bottom" title="SMS" width="15px">
            <div class="h7">SMS</div>
        </td>


        <td align="center"  class="h7 border-bottom" valign="middle" width="14px">
            <div id="SelectAllSmsDiv">
                <input id="smsallcheck" name="smsallcheck" title="Click Here to Select SMS Template Id!"
                       type="checkbox" spellcheck="false" 
                       onclick="javascript:selectAllSms('loansList');"
                       autocomplete="off" size="8" maxlength="16" />
            </div>
        </td>
    <?php }
} ?>
<!-- End code to add checkbox in the table @Author:@AUTHOR:SHE16MAR15-->