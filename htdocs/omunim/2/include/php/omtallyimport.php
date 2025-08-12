<?php
/*
 * **************************************************************************************
 * @tutorial: IMPORT OPTIONS : AUTHOR @ RENUKA 19 OCT 2022
 * **************************************************************************************
 * 
 * Created on 19 OCT 2022
 *
 * @FileName:  omtallyimport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:.com
 * @All rights reserved  info@softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
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
//CODE FOR ONE TIME BLOCK WEBSITE SETTINGS @AUTHOR:SHARADA-01MAR2024
require $_SERVER["DOCUMENT_ROOT"] . '/2/include/php/system/omstoresetup.php';
//$personalStore = 'Y';
//END CODE
// *************************************************************************************************************
// START CODE FOR IMPORT DATA @RENUKA OCT_2022
// *************************************************************************************************************
$firmid = $_SESSION['setFirmSession'];
?>
<tr><table style="margin-left:50px;" align="left">
<tr>
    <td colspan="4">
        <div class="hrGrey" style="position: absolute; width: 100%; margin: 10px 0px 0px -40px;"></div>
    </td>
</tr>
<tr>
    <td>
        <div style="margin: 20px 0px 0px 0px">
            <h3 style="font-size: 19px; font-weight: bolder; color: #D76B00; margin-bottom: 5px;">IMPORT OPTIONS</h3>
    </td>
</tr>

<tr>
    <td>
        <div style="">
            <h4 style="font-size: 16px; font-weight: bolder; color: #D76B00; margin-bottom: 5px; margin-left: 20px; width: 100%;">TALLY SOFTWARE IMPORT OPTIONS</h4>
        </div>
    </td>
</tr>
<!--<form enctype="multipart/form-data" method="POST" action="include/php/omtallyexport.php" role="form"> 
    <label for="upload">Any Product Excel File Upload Here</label> 
    <input type="file" name="userUploadedFile" value=""> 
    <p class="help-block"> Only .xls/.xlxs extension File format. </p>
    <input type="submit" name="submit" value="Upload"> 
</form>-->
<tr>
    <!------------- START CODE TO ADD OPTION FOR IMPORT GROUP @RENUKA OCT_2022 ---------------->
    <td colspan="2" align="center" width="25%px" valign="top">
        <div class="product-item" style="width:100%; height:150px;padding: 0px;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px;background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        <?php if ($personalStore == 'Y') { ?>
                            IMPORT ACCOUNT (SOFTWARE) : (STEP 1)
                        <?php } else { ?>
                            IMPORT ACCOUNT (OMUNIM SOFTWARE) : (STEP 1)
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">
                        <form name="fileUpload" id="fileUpload"
                              enctype="multipart/form-data" method="post"
                              action="include/php/omTallyImportAccount.php" >
                            <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                              
                                <tr>                                      
                                    <td align="center" valign="top">
                                        <input type="file" name="userUploadedFile"  value="" required="required" />
                                    </td>
                                    <td align="left" valign="top">
                                        <!---Start to Changes button----->
                                        <div>
                                            <?php
                                            $inputId = "submit";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'Upload';
                                            $inputIdButton = "submit";
                                            $inputNameButton = 'submit';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style;
                                            $inputStyle = "width:120px;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600; ";
                                            $inputLabel = 'Import'; // Display Label below the text box
                                            //
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = '';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';  // This is the main division class for drop down 
                                            $inputselDropDownCls = '';  // This is class for selection in drop down
                                            $inputMainClassButton = ''; // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
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
    <!----END CODE TO ADD OPTION FOR IMPORT GROUP @RENUKA OCT_2022 ---------------->


    <!----START CODE TO CODE TO ADD OPTION FOR IMPORT LEDGER @RENUKA OCT_2022 ---------------->
      <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:100%; height:150px;padding: 0px;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px;background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        <?php if ($personalStore == 'Y') { ?>
                            IMPORT USER (SOFTWARE) : (STEP 2)
                        <?php } else { ?>
                            IMPORT USER (OMUNIM SOFTWARE) : (STEP 2)
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">
                        <form name="fileUpload" id="fileUpload"
                              enctype="multipart/form-data" method="post"
                              action="include/php/omTallyImportUser.php"
                              onsubmit="return selectfirm('<?php echo $firmid; ?>');">
                            <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                              
                                <tr>                                      
                                    <td align="center" valign="top">
                                        <input type="file" name="userUploadedFile"  value="" required="required" />
                                    </td>
                                    <td align="left" valign="top">
                                        <!---Start to Changes button----->
                                        <div>
                                           <?php
                                            $inputId = "submit";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'Upload';
                                            $inputIdButton = "submit";
                                            $inputNameButton = 'submit';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style;
                                            $inputStyle = "width:120px;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600; ";
                                            $inputLabel = 'Import'; // Display Label below the text box
                                            //
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = '';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';  // This is the main division class for drop down 
                                            $inputselDropDownCls = '';  // This is class for selection in drop down
                                            $inputMainClassButton = ''; // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
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
    <!----END CODE TO ADD OPTION FOR IMPORT LEDGER @RENUKA OCT_2022 ---------------->           
</tr>
<tr>
    <!------------- START CODE TO ADD OPTION FOR IMPORT STOCK @RENUKA OCT_2022 ---------------->
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:100%; height:150px;padding: 0px;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px;background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        <?php if ($personalStore == 'Y') { ?>
                            IMPORT STOCK (SOFTWARE) : (STEP 3)
                        <?php } else { ?>
                            IMPORT STOCK (OMUNIM SOFTWARE) : (STEP 3)
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">
                        <form name="fileUpload" id="fileUpload"
                              enctype="multipart/form-data" method="post"
                              action="include/php/omTallyImportStock.php" >
                            <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                              
                                <tr>                                      
                                    <td align="center" valign="top">
                                        <input type="file" name="userUploadedFile"  value="" required="required" />
                                    </td>
                                    <td align="left" valign="top">
                                        <!---Start to Changes button----->
                                        <div>
                                            <?php
                                            $inputId = "submit";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'Upload';
                                            $inputIdButton = "submit";
                                            $inputNameButton = 'submit';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style;
                                            $inputStyle = "width:120px;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600; ";
                                            $inputLabel = 'Import'; // Display Label below the text box
                                            //
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = '';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';  // This is the main division class for drop down 
                                            $inputselDropDownCls = '';  // This is class for selection in drop down
                                            $inputMainClassButton = ''; // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
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
    <td colspan="2" align="center" width="25%" valign="top">
        <div class="product-item" style="width:100%; height:150px;padding: 0px;"   >
            <table  border="0" width="100%" cellspacing="2" cellpadding="0" >
                <tr>
                    <td align="left" colspan="2" class="paddingTop4 textLabel14CalibriBrownBold" 
                        style="padding-left: 8px;background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                        <?php if ($personalStore == 'Y') { ?>
                            IMPORT ALL INVOICES (SOFTWARE) : (STEP 4)
                        <?php } else { ?>
                            IMPORT ALL INVOICES (OMUNIM SOFTWARE) : (STEP 4)
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="paddingTop4 textLabel14CalibriBrownBold">
                        <form name="fileUpload" id="fileUpload"
                              enctype="multipart/form-data" method="post"
                              action="include/php/omTallyImportInvoices.php" >
                            <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
                              
                                <tr>                                      
                                    <td align="center" valign="top">
                                        <input type="file" name="userUploadedFile"  value="" required="required" />
                                    </td>
                                    <td align="left" valign="top">
                                        <!---Start to Changes button----->
                                        <div>
                                            <?php
                                            $inputId = "submit";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'Upload';
                                            $inputIdButton = "submit";
                                            $inputNameButton = 'submit';
                                            $inputTitle = '';
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn ' . $om_btn_style;
                                            $inputStyle = "width:120px;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight: 600; ";
                                            $inputLabel = 'Import'; // Display Label below the text box
                                            //
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = '';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';  // This is the main division class for drop down 
                                            $inputselDropDownCls = '';  // This is class for selection in drop down
                                            $inputMainClassButton = ''; // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
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
</table><!-- comment -->
</tr>