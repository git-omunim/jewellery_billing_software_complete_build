<?php
/*
 * **************************************************************************************
 * @tutorial: Girvi update girvi deposit girvi result division
 * **************************************************************************************
 *
 * Created on 18 Aug, 2012 10:50:36 AM
 *
 * @FileName: orgugdrs.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
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
?>
<?php
if ($custId == '') {
    $custId = $_POST['custId'];
    $girviId = $_POST['girviId'];
    $totalPrincipalAmount = $_POST['totalPrincipalAmount'];
    $totalFinalInterest = $_POST['totalFinalInterest'];
    $princAmount = $_POST['principalAmt'];
    $girviNewDOB = $_POST['girviDOB'];
    $girviType = $_POST['girviType'];
    $girviUpdSts = trim($_POST['girviStatus']);
    $girviDepositPrinAmount = $_POST['girviDepositPrinAmount'];
    $girviDepositIntAmount = $_POST['girviDepositIntAmount'];
    $girviIntOpt = trim($_POST['simpleOrCompIntOption']);
    $girviIntCompoundedOpt = trim($_POST['girviCompoundedOption']);
}
if ($custId == '') {
    $custId = $_GET['custId'];
    $girviId = $_GET['girviId'];
    $totalPrincipalAmount = $_GET['totalPrincipalAmount'];
    $totalFinalInterest = $_GET['totalFinalInterest'];
    $princAmount = $_GET['principalAmt'];
    $girviNewDOB = $_GET['girviDOB'];
    $girviType = $_GET['girviType'];
    $girviUpdSts = trim($_GET['girviStatus']);
    $girviDepositPrinAmount = $_GET['girviDepositPrinAmount'];
    $girviDepositIntAmount = $_GET['girviDepositIntAmount'];
    $girviIntOpt = trim($_GET['simpleOrCompIntOption']);
    $girviIntCompoundedOpt = trim($_GET['girviCompoundedOption']);
}
//echo 'girviDepositPrinAmount:' . $girviDepositPrinAmount;
?>
<table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
    <tr>
        <td align="left" width="100%" colspan="2">
            <div id="girviTotalResultDiv">
                <?php include 'orggttam.php'; ?>
            </div>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2" width="100%">
            <hr color="#FD9A00" size="0.1px" />
        </td>
    </tr>
    <tr>
        <td width="100%" colspan="2">
            <div class="blackMess11">
                <a style="cursor: pointer;" onclick="showDepositMoneyDiv(<?php echo $custId; ?>,<?php echo $girviId; ?>,<?php echo $totalPrincipalAmount; ?>,<?php echo $totalFinalInterest; ?>, '<?php echo $princAmount ?>', '<?php echo $girviNewDOB; ?>', '<?php echo $girviType; ?>')">
                    ~ Deposit Money ~
                </a>
            </div>
            <div id="ajaxLoadDepositMoneyDiv" style="visibility: hidden" class="blackMess11">
                <?php include 'omzaajld.php'; ?>
            </div>
            <div id="ajaxCloseDepositMoneyDiv" style="visibility: hidden" class="ajaxClose">
                <a style="cursor: pointer;" onclick="closeDepositMoneyDiv()">
                    <?php include 'omzaajcl.php'; ?>
                </a>
            </div>
        </td>
    </tr>
    <tr align="left">
        <td align="left" valign="middle" colspan="2">
            <div id="depositMoneyDiv">
                <?php
                include 'olgggmdp.php'; //change in filename @AUTHOR: SANDY20NOV13 
                ?>
            </div>
        </td>
    </tr>
</table>