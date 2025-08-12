<?php
/*
 * **************************************************************************************
 * @tutorial: TAllY MIGRATION FILE(Export Data Files)
 * **************************************************************************************
 * 
 * Created on 12 SEP 2022 12:15:00 pm
 *
 * @FileName: omtallyexport.php
 * @Author: RENUKA SHARMA
 * @AuthorEmailId:  renukas@omunim.com
 * @version 1.0.0
 * @Copyright (c) 2022 www.omunim.com
 * @All rights reserved
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
$firmid = $_SESSION['setFirmSession'];
?>
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
<tr>
    <td colspan="4">
        <div class="hrGrey" style="position: absolute; width:100%; margin: 10px 0px 0px -5px;"></div>
    </td>
</tr>
<tr>
    <td>
        <div style="margin: 20px 0px 0px 0px">
            <h3 style="font-size: 19px; font-weight: bolder; color: #D76B00; margin-bottom: 5px;">EXPORT OPTIONS</h3>
    </td>
</tr>

<tr>
    <td>  <div style="">
            <h4 style="font-size: 16px; font-weight: bolder; color: #D76B00; margin-bottom: 5px; margin-left: 0px; width: 100%;">OPTIONS FOR TALLY MIGRATION</h4>
        </div>     
    </td>
</tr>
 </tbody>
</table>
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
    <!-----------------------------------------------START CODE TO EXPORT DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022--------------------------------->
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:99%; height:150px;padding: 0px;margin-top:1%;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px;background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        EXPORT ACCOUNTS FOR GROUP ENTRY : (STEP 1)
                    </td>
                </tr>
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">

                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                            <tr>
<?php
//print_r($_SESSION);
?>
                                <td valign="top" align="right" colspan="2">

                                </td>
                            </tr>
                            <tr>                                      
                                <td align="center" valign="top">
                                    <a href="include/php/omTallyAccountExport.php?path=group.xml" class="<?php echo 'btn ' . $om_btn_style; ?>" style=" margin-top: 20px;width:auto;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600;" onclick="return selectfirm('<?php echo $firmid; ?>');"  > Export Account file for Group</a>
                                </td>
                                <td align="left" valign="top">
                                    <!---Start to Changes button----->
                                    <div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </td>
    <!-----------------------------END CODE TO EXPORT ACCOUNT DATA FOR TALLY MIGRATION @RENUKA_SHARMA2022--------------------------------->
    <!------------------------------START CODE TO EXPORT LEDGERS DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022 omTallyLoanVoucher--------------------------------->
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:99%; height:150px;padding: 0px;margin-top:1%;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px; background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        EXPORT USER FOR LEDGERS:(STEP 2)
                    </td>
                </tr>
                <tr>                    
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">

                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                            <tr> <td valign="top" align="right" colspan="2">
                                </td>
                            </tr>
                            <tr>                                      
                                <td align="center" valign="top">
                                    <a href="include/php/omTallyCustExport.php?path=ledger.xml" class="<?php echo 'btn ' . $om_btn_style; ?>" style=" margin-top: 20px;width: auto;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600;" onclick="return selectfirm('<?php echo $firmid; ?>');"> Export User File For Ledger </a>
                                </td>
                                <td align="left" valign="top">
                                    <!---Start to Changes button----->
                                    <div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </td>
</tr>
<!---------------------END CODE TO EXPORT LEDGERS DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022------------------------------------> 
<!------------------------------START CODE TO EXPORT STOCK DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022--------------------------------->
<tr>
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:99%; height:150px;padding: 0px;margin-top:1%;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px;background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        EXPORT STOCK ITEMS:(STEP 3)
                    </td>
                </tr>
                <tr>                    
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">

                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                            <tr> <td valign="top" align="right" colspan="2">
                                </td>
                            </tr>
                            <tr>                                      
                                <td align="center" valign="top">
                                    <a href="include/php/omTallyStockExport.php?path=stock.xml" class="<?php echo 'btn ' . $om_btn_style; ?>" onclick="return selectfirm('<?php echo $firmid; ?>');" style=" margin-top: 20px;width:auto;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600;" > Export File For Stock </a>
                                </td>
                                <td align="left" valign="top">
                                    <!---Start to Changes button----->
                                    <div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </td>
    <!---------------------END CODE TO EXPORT STOCK DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022------------------------------------>        
    <!------------------------------START CODE TO EXPORT PURCHASE VOUCHER DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022--------------------------------->
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:99%; height:150px;padding: 0px;margin-top:1%;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px;background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        EXPORT PURCHASE VOUCHER:(STEP 4)
                    </td>
                </tr>
                <tr>                    
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">

                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                            <tr> <td valign="top" align="right" colspan="2">
                                </td>
                            </tr>
                            <tr>                                      
                                <td align="center" valign="top">
                                    <a href="include/php/omTallyPurchaseVoucher.php?path=purchase.xml" class="<?php echo 'btn ' . $om_btn_style; ?>" style=" margin-top: 20px;width: auto;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600;" onclick="return selectfirm('<?php echo $firmid; ?>');"> Export File For Purchase Invoice </a>
                                </td>
                                <td align="left" valign="top">
                                    <!---Start to Changes button----->
                                    <div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </td>
    <!---------------------END CODE TO EXPORT PURCHASE VOUCHER DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022------------------------------------>   
</tr>
<tr>     
    <!------------------------------START CODE TO EXPORT SELL VOUCHER DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022--------------------------------->
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:99%; height:150px;padding: 0px;margin-top:1%;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px;background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        EXPORT SELL VOUCHER:(STEP 5)
                    </td>
                </tr>
                <tr>                    
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">

                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                            <tr> <td valign="top" align="right" colspan="2">
                                </td>
                            </tr>
                            <tr>                                      
                                <td align="center" valign="top">
                                    <a href="include/php/omTallySellVoucher.php?path=sell.xml" class="<?php echo 'btn ' . $om_btn_style; ?>" style=" margin-top: 20px;width: auto;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600;" onclick="return selectfirm('<?php echo $firmid; ?>');"> Export File For Sell Invoice </a>
                                </td>
                                <td align="left" valign="top">
                                    <!---Start to Changes button----->
                                    <div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </td>
    <!---------------------END CODE TO EXPORT SELL VOUCHER DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022------------------------------------>   
       <!------------------------------START CODE TO EXPORT SELL VOUCHER DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022--------------------------------->
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:99%; height:150px;padding: 0px;margin-top:1%;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px; background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        EXPORT Loan Entry:(STEP 6)
                    </td>
                </tr>
                <tr>                    
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">

                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                            <tr> <td valign="top" align="right" colspan="2">
                                </td>
                            </tr>
                            <tr>                                      
                               <td align="center" valign="top">
                                    <a href="include/php/omTallyLoanVoucher.php?path=loan.xml" class="<?php echo 'btn ' . $om_btn_style; ?>" style=" margin-top: 20px;width: auto;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600;" onclick="return selectfirm('<?php echo $firmid; ?>');"> Export File For Loan Entry </a>
                                </td>
                                <td align="left" valign="top">
                                    <!---Start to Changes button----->
                                    <div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </td>
    <!---------------------END CODE TO EXPORT Loan Entry FOR  TALLY MIGRATION @RENUKA_SHARMA2022------------------------------------>   
</tr>
<tr>
    <!-----------------------------------------------START CODE TO EXPORT DATA FOR  TALLY MIGRATION @RENUKA_SHARMA2022--------------------------------->
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:99%; height:150px;padding: 0px;margin-top:1%;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px; background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        EXPORT FILE FOR LOAN MONEY DEPOSIT : (STEP 7)
                    </td>
                </tr>
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">

                        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                            <tr>
<?php
//print_r($_SESSION);
?>
                                <td valign="top" align="right" colspan="2">

                                </td>
                            </tr>
                            <tr>                                      
                                <td align="center" valign="top">
                                    <a href="include/php/omTallyDepositVoucher.php?path=deposit.xml" class="<?php echo 'btn ' . $om_btn_style; ?>" style=" margin-top: 20px;width: auto;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600;" onclick="return selectfirm('<?php echo $firmid; ?>');"  > Export file for Loan Deposit</a>
                                </td>
                                <td align="left" valign="top">
                                    <!---Start to Changes button----->
                                    <div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </td>
</tr>
</table>
<!--</div>
</td>
</tr>-->