<?php
/*
 * Created on May 25, 2011 11:46:59 PM
 *
 * @FileName: omvcupcd.php
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
//Changes in file to hide labels and add new class for input fields @AUTHOR: SANDY16DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';

$qSelectCountry = "SELECT * FROM country where country_id='$_GET[countryId]'"; //To display data in this form
$resultCountry = mysqli_query($conn, $qSelectCountry);
$rowCountry = mysqli_fetch_array($resultCountry);
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td width="40%">
            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                <tr>
                    <td>
                        <div class="spaceLeft10 paddingTop2">
                            <img src="<?php echo $documentRoot; ?>/images/orange16.png" alt="New State" />
                        </div>
                    </td>
                    <td align="left">
                        <div class="spaceLeft4">
                            <div class="textLabel16CalibriNormalBrown">UPDATE COUNTRY</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td width="60%" align="right" valign="bottom">
            <div class="analysis_div_rows"><?php
                $showCountryAddedDiv = $_GET['divMainMiddlePanel'];
                if ($showCountryAddedDiv == "CountryAdded") {
                    include 'omzaaamg.php';
                } else if ($showCountryAddedDiv == "CountryUpdated") {
                    include 'omzaaumg.php';
                } else if ($showCountryAddedDiv == "CountryAlreadyExist") {
                    ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;" class="updateMess"><div class="spaceRight20">~ Country Already Present, Please enter different Country Name ~</div></div>
                    <?php
                }
                ?></div>

        </td>
    </tr>
    <tr>
        <td colspan="2" align="left">
            <div id="addUpdateCountryDiv" class="spaceLeftRight20Border">
                <form name="update_country" id="update_country"
                      action="javascript:updateDeleteCountry(document.getElementById('update_country'));"
                      method="post">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td align="center">
                                <table border="0" cellpadding="2" cellspacing="0">
                                        <!---<tr align="left" valign="middle">
                                                <td align="left" class="frm-lbl">Country Name:</td>
                                        </tr>--->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1">
                                            <input id="countryName" name="countryName" value="<?php echo $rowCountry['country_name']; ?>"
                                                                               spellcheck="false" type="text" class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9"
                                                                               size="35" maxlength="50" /><input id="countryId" name="countryId"
                                                                               value="<?php echo $_GET[countryId]; ?>" type="hidden" />
                                            <div class="testfieldMess">(Country Name should be unique)</div>
                                            <input id="countryCurrency" name="countryCurrency" value="<?php echo $rowCountry['country_currency']; ?>"
                                                                               spellcheck="false" type="text" class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9"
                                                                               size="35" maxlength="50" />
                                            <div class="testfieldMess">(Country Currency Like INR, Rs, &#x20B9;)</div>
                                        </td>
                                    </tr>
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-lbl">Comments:</td>
                                    </tr>
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1"><textarea id="countryComments" placeholder="Comments"
                                                                                  name="countryComments" class="textBoxCurve1px margin2pxAll textLabel12Calibri_non backF9F9F9" rows="2" cols="40"/><?php echo $rowCountry['country_comm']; ?></textarea></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="2" cellspacing="0" align="center"
                           width="100%">
                        <tr>
                            <td width="100%" align="center">
                                <table border="0" cellpadding="1" cellspacing="1" align="center">
                                    <tr>
                                        <td><input type="submit" value="Update" class="frm-btn" id="Update" name="Update"
                                                   onclick="setButtId(this);" maxlength="30" size="15" /></td>
                                        <td><input type="submit" value="Delete" class="frm-btn" id="Delete" name="Delete"
                                                   onclick="setButtId(this);" maxlength="30" size="15" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </td>
    </tr>
</table>