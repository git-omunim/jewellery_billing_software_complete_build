<?php /**
 * 
 * Created on Aug 31, 2011 9:59:33 PM
 *
 * @FileName: ormldpmn.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
 */ ?>
<?php
//changes in classes of input field @AUTHOR: SANDY18DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

if ($mlId == '') {
    $mlId = $_POST['mlId'];
    $loanId = $_POST['loanId'];
    $totalPrincipalAmount = $_POST['totalPrincipalAmount'];
    $totalFinalInterest = $_POST['totalFinalInterest'];
    $princAmount = $_POST['principalAmt'];
    $girviNewDOB = $_POST['girviDOB'];
    $girviType = $_POST['girviType'];
    $girviUpdSts = trim($_POST['girviStatus']);
}

if ($mlId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
    $totalPrincipalAmount = $_GET['totalPrincipalAmount'];
    $totalFinalInterest = $_GET['totalFinalInterest'];
    $princAmount = $_GET['principalAmt'];
    $girviNewDOB = $_GET['girviDOB'];
    $girviType = $_GET['girviType'];
    $girviUpdSts = $_GET['girviStatus'];
}
$girviNewDOBStr = date("d M Y", strtotime($girviNewDOB));
?>
<div class="spaceLeft10 textBoxCurve1px margin2pxAll">
    <form name="update_loan_deposit_money" id="update_loan_deposit_money"
          action="javascript:updateLoanDepositMoney(document.getElementById('update_loan_deposit_money'));"
          method="post">
        <table border="0" cellpadding="2" cellspacing="2" align="center">
            <tr>
                <td align="center" valign="middle" class="textLabel12CalibriBrown">DATE</td>
                <td align="right" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="center" valign="middle" class="textLabel12CalibriBrown">PRINCIPAL AMT. REC.</td>
                <td align="right" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="center" valign="middle" class="textLabel12CalibriBrown">INTEREST AMT. REC.</td>
                <td align="right" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <?php include 'orlndtup.php';  //change in filename @AUTHOR: SANDY2DEC13 ?>
                <td align="right" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="right">
                    <input
                        id="loanDepositPrinAmount" name="loanDepositPrinAmount" type="text" value="<?php echo $loanDepositPrinAmount; ?>"
                        spellcheck="false" class="textBoxCurve1px margin2pxAll textLabel14CalibriNormal backFFFFFF" size="20" maxlength="30" />
                    <!-- START Customer ID --> 
                    <input id="mLenderId" name="mLenderId"
                           value="<?php echo $mlId; ?>" type="hidden" /> 
                    <!-- END Customer ID  -->
                    <!-- START GIRVI ID --> 
                    <input id="loanId" name="loanId"
                           value="<?php echo $loanId; ?>" type="hidden" /> 
                    <!-- END GIRVI ID  -->
                    <!-- START FIRM ID --> 
                    <input id="firmId" name="firmId"
                           value="<?php echo $loanId; ?>" type="hidden" /> 
                    <!-- END FIRM ID  -->
                    <!-- START Total Principal --> 
                    <!----Start code to change id @Author:PRIYA26FEB14-------------->
                    <input id="mlTotalPrincipalAmount" name="mlTotalPrincipalAmount"
                           value="<?php echo $totalPrincipalAmount; ?>" type="hidden" /> 
                    <!-- END Total Principal  -->
                    <!-- START Total Interest --> 
                    <input id="mlTotalInterestAmount" name="mlTotalInterestAmount"
                           value="<?php echo $totalFinalInterest; ?>" type="hidden" /> 
                    <!----End code to change id @Author:PRIYA26FEB14-------------->
                    <!-- END Total Interest  -->
                    <!-- START GIRVI DATE --> 
                    <input id="loanNewDateForUpdate" name="loanNewDateForUpdate"
                           value="<?php echo $girviNewDOB; ?>" type="hidden" /> 
                    <!-- END GIRVI DATE  -->
                </td>
                <td align="right" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="right">
                    <input id="loanDepositIntAmount" name="loanDepositIntAmount" type="text" value="<?php echo $loanDepositIntAmount; ?>"
                           spellcheck="false" class="textBoxCurve1px margin2pxAll textLabel14CalibriNormal backFFFFFF" size="20" maxlength="30" />
                </td>
                <td align="right" valign="middle" title="कुल ब्याज में फेर बदल करने के लिए यहाँ क्लिक करे! &#10;अगर सॉफ्टवेर कुछ अवधि का ब्याज १०० रुपए बताता है, &#10;और आप को लगता है १२० रुपए होना चाहिए तो आप इस चेक बॉक्स पर क्लिक कीजिए! &#10;To adjust interest amount click here!">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="loanIntAdjustment" name="loanIntAdjustment" value="Yes" />
                </td>
            </tr>
            <tr>
                <td align="center" colspan="6">
                    <br />
                </td>
            </tr>
        </table>
        <table border="0" cellpadding="2" cellspacing="2" width="100%">
            <tr>
                <td align="center">
                    <div id="loanUpdateDepMoneyButDiv">
                        <input type="submit" value="SIMPLY DEP" class="frm-btn-without-border"
                               maxlength="30" size="15" onclick="setLoanDepositMoneyOption('SimplyDeposit');" />
                        &nbsp;
                        <input type="submit" value="NEW GIRVI DATE CHANGE" class="frm-btn-without-border"
                               maxlength="30" size="15" onclick="setLoanDepositMoneyOption('CalculateNow');" />
                        &nbsp;
                        <input type="submit" value="DEP FULL INT" class="frm-btn-without-border"
                               maxlength="30" size="15" onclick="setLoanDepositMoneyOption('DepositFullInt');" />
                        &nbsp;
                        <input type="submit" value="DEP INT WITH DIS" class="frm-btn-without-border"
                               maxlength="30" size="15" onclick="setLoanDepositMoneyOption('DepositIntWithDis');" />
                        &nbsp;
                        <input type="hidden" value="DEP INT AMT LEFT" class="frm-btn-without-border"
                               maxlength="30" size="15" onclick="setLoanDepositMoneyOption('DepositIntAmtLeft');" />
                        &nbsp;
                        <input type="submit" value="DEP INT ADJ IN PRIN" class="frm-btn-without-border"
                               maxlength="30" size="15" onclick="setLoanDepositMoneyOption('DepositIntAdjInPrin');" />
                        &nbsp;
                        <input type="submit" value="HELP" class="frm-btn-without-border"
                               maxlength="30" size="15" onclick="setLoanDepositMoneyOption('Help');" />
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <table border="0" cellpadding="2" cellspacing="2" width="100%">
        <tr>
            <td align="left" width="100%" colspan="2">
                <div id="loanMoneyDepHelpDiv"></div>
            </td>
        </tr>
    </table>
</div>
