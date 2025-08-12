<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
?>
<?php
$custId = $_POST['custId'];
$firmId = $_POST['firmId'];
$udhaarId = $_POST['udhaarId'];
$udhaarAmtLeft = $_POST['udhaarAmtLeft'];
$udhaarSerialNum = $_GET['udhaarSerialNum'];
if ($udhaarSerialNum == '') {
    $udhaarSerialNum = $_POST['udhaarSerialNum'];
}
if ($custId == '') {
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
    $udhaarId = $_GET['udhaarId'];
    $udhaarAmtLeft = $_GET['udhaarAmtLeft'];
}
$panelName = $_GET['panelName'];
if ($panelName == 'UpdateUdhaar') {
    $udhaarDepId = $_GET['udhaarDepId'];
    parse_str(getTableValues("SELECT * FROM udhaar_deposit where udhadepo_id = '$udhaarDepId'"));
    $selDOBDay = substr($udhadepo_DOB, 0, 2);
    $selDOBMnth = substr($udhadepo_DOB, 3, -5);
    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
    $selDOBYear = substr($udhadepo_DOB, -4);
} else {
    $selDOBDay = date(j);
    $todayMM = date(n) - 1;
    $selDOBYear = date(Y);
}
?>
<div class="textBoxCurve1px">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td width="100%" colspan="4">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td width="100%" colspan="4">
                <div class="blackMess">
                    &nbsp;&nbsp;UDHAAR DEPOSIT MONEY PANEL
                </div>
                <div id="ajaxCloseUdhaarDepositMonDiv<?php echo $udhaarId; ?>" style="visibility: visible" class="ajaxClose">
                    <a style="cursor: pointer;" onclick="closeUdhaarDepositMoneyDiv(<?php echo $udhaarId; ?>)">
                        <?php include 'omzaajcl.php'; ?>
                    </a>
                </div>
            </td>
        </tr>
    </table>
    <form name="udhaar_deposit_money" id="udhaar_deposit_money"
          action="javascript:udhaarDepositMoney(document.getElementById('udhaar_deposit_money'),'<?php echo $udhaarId; ?>','<?php echo $firmId; ?>','<?php echo $udhaarSerialNum; ?>');"
          method="post">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">

            <tr>
                <td>
                    <img src="<?php echo $documentRoot; ?>/images/spacer.gif" alt="" height="0px" style="visibility:hidden;" onload="
                        document.getElementById('udhaarDepositAmount<?php echo $udhaarId; ?>').focus();
                        initFormName('add_udhaar_details', 'addNewUdhaarDetails');"/>
                </td>
                <td align="right" valign="middle" width="200px">

                    <h4>DEPOSIT AMOUNT:&nbsp;&nbsp;</h4></td>
                <td align="left" width="100px">
                    <input id="udhaarDepositAmount<?php echo $udhaarId; ?>" name="udhaarDepositAmount<?php echo $udhaarId; ?>" 
                                                      type="text" value="<?php echo $udhadepo_amt; ?>"
                                                      placeholder="DEPOSIT AMOUNT" spellcheck="false" class="input_border_red" size="20" maxlength="30" />
                    <input id="custId<?php echo $udhaarId; ?>" name="custId<?php echo $udhaarId; ?>" value="<?php echo $custId; ?>" type="hidden" /> 
                    <input id="udhaarId<?php echo $udhaarId; ?>" name="udhaarId<?php echo $udhaarId; ?>" value="<?php echo $udhaarId; ?>" type="hidden" /> 
                    <input id="udhaarAmtLeft<?php echo $udhaarId; ?>" name="udhaarAmtLeft<?php echo $udhaarId; ?>" value="<?php echo $udhaarAmtLeft; ?>" type="hidden" />
                    <input id="udhaarDepPanel" name="udhaarDepPanel" value="<?php echo $panelName; ?>" type="hidden" />
                    <input id="udhaarDepId" name="udhaarDepId" value="<?php echo $udhaarDepId; ?>" type="hidden" />
                </td>
                
                <td>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="right" valign="middle"  width="150px">
                                <h4>DATE:&nbsp;&nbsp;</h4>
                            </td>
                            <td class="textBoxCurve1px margin2pxAll backFFFFFF" width="190px">
                                <?php include 'omuudate.php'; ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-----Add td for Discount function @AUTHOR: SHE19OCT15--->
                 <td align="right" valign="middle" width="200px">

                    <h4>Discount:&nbsp;&nbsp;</h4></td>
                <td align="left" width="100px">
                    <input id="udhaarDiscountAmount<?php echo $udhaarId; ?>" name="udhaarDiscountAmount<?php echo $udhaarId; ?>" 
                                                      type="text" value="<?php echo $udhadepo_disc_amt; ?>"
                                                      placeholder="DISCOUNT" spellcheck="false" class="input_border_red" size="20" maxlength="30" />
                    <input id="custId<?php echo $udhaarId; ?>" name="custId<?php echo $udhaarId; ?>" value="<?php echo $custId; ?>" type="hidden" /> 
                    <input id="udhaarId<?php echo $udhaarId; ?>" name="udhaarId<?php echo $udhaarId; ?>" value="<?php echo $udhaarId; ?>" type="hidden" /> 
                    <input id="udhaarAmtLeft<?php echo $udhaarId; ?>" name="udhaarAmtLeft<?php echo $udhaarId; ?>" value="<?php echo $udhaarAmtLeft; ?>" type="hidden" />
                    <input id="udhaarDepPanel" name="udhaarDepPanel" value="<?php echo $panelName; ?>" type="hidden" />
                    <input id="udhaarDepId" name="udhaarDepId" value="<?php echo $udhaarDepId; ?>" type="hidden" />
                </td>
                <!-----Add td for Discount function @AUTHOR: SHE19OCT15--->
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle" width="200px"><h4>OTHER INFORMATION:&nbsp;&nbsp;</h4></td>
                <td colspan="2" valign="middle">
                    <textarea id="udhaarOtherInfo" 
                              spellcheck="false" name="udhaarOtherInfo" 
                              onkeydown="javascript:if (event.keyCode == 13) {
                                  document.getElementById('depMoneySubButt').focus();
                                  return false;
                              } else if (event.keyCode == 8 && this.value == '') {
                                  document.getElementById('DOBDay').focus();
                                  return false;
                              }"
                              class="textarea-udhaar-deposit-otherInfo"><?php echo stripslashes($udhadepo_comm); ?></textarea>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="4">
                    <div id="ajaxLoadUdhaarDepositMonSubmit<?php echo "$udhaarId"; ?>" style="visibility: hidden">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                    <div id="udhaarDepMoneySubButDiv<?php echo "$udhaarId"; ?>">
                        <input type="submit" id="depMoneySubButt" value="<?php
                        if ($panelName == 'UpdateUdhaar') {
                            echo 'UPDATE';
                        } else {
                            echo 'SUBMIT';
                        }
                        ?>" class="frm-btn-without-border"
                               maxlength="30" size="15" />
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    &nbsp;   
                </td>
            </tr>
        </table>
    </form>
</div>