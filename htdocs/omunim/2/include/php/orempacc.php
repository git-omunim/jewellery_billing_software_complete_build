<?php
/*
 * **************************************************************************************
 * @tutorial: API TO SHOW ACCESS FIELD AT First Time 
 * **************************************************************************************
 * 
 * Created on Jun 4, 2013 10:50:45 AM
 *
 * @FileName: orempacc.php
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
?>
<?php
require_once 'system/omssopin.php';
$staffId = $_GET['staffId'];
/* Start to get values of access @AUTHOR: SANDY13AUG13 */
$selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId'";
$resEmpAccessDet = mysqli_query($conn,$selEmpAccessDet);
$array = array();
while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDet)) {
    $panel = $rowEmpAccessDet['acc_panel'];
    $panelVal = $rowEmpAccessDet['acc_access'];
    $tempArray = array($panel => $panelVal);
    $array = array_merge($array, $tempArray);
}
/* End to get values of access @AUTHOR: SANDY13AUG13 */
?>
<!--<div id="omrevoAccessDiv">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" class="marginTop7">
        <td align="left" width="200px">
            <table width="100%" height="100%"border="0" cellspacing="2" cellpadding="0">
                <tr>
                    <td align="left" class="itemAddPnLabels12">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top" class="padBott3">
                            <tr>
                                <td align="center" valign="top">
                                    Girvi Access
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addNewGirviAccess" name="addNewGirviAccess" value="AddNewGirviAccess"         
                                           <?php if ($array['addNewGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13 ?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Add New Girvi</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- Start to add access to sub fields in Add Girvi Panel @AUTHOR: SANDY7AUG13 
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to give access to change in interest Type By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addNewGirviAccessIntType" name="addNewGirviAccessIntType" value="addNewGirviAccessIntType"         
                                           <?php if ($changeIntTypeGirviAccess == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13 ?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Interest Type</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to give access to change in Serial No By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addNewGirviAccessSerialNo" name="addNewGirviAccessSerialNo" value="addNewGirviAccessSerialNo"         
                                           <?php if ($changeSerialNoAccess == 'true') echo 'checked'; else echo ''; ?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Serial No</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to give access to change in Packet no  Type By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addNewGirviAccessPktNo" name="addNewGirviAccessPktNo" value="addNewGirviAccessPktNo"         
                                           <?php if ($changePktNoAccess == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Packet No</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to give access to change in Firm By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addNewGirviAccessFirm" name="addNewGirviAccessFirm" value="addNewGirviAccessFirm"         
                                           <?php if ($changeFirmAccess == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13 ?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Firm</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to give access to change in GirviType By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addNewGirviAccessGirviType" name="addNewGirviAccessGirviType" value="addNewGirviAccessGirviType"         
                                           <?php if ($changeGirviTypeAccess == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Girvi Type</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to give access to change in First Month Int By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addNewGirviAccessFrstMnthInt" name="addNewGirviAccessFrstMnthInt" value="addNewGirviAccessFrstMnthInt"         
                                           <?php if ($changeFrstMnthIntAccess == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">First Month Int</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to give access to change in Account Type By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addNewGirviAccessAcntType" name="addNewGirviAccessAcntType" value="addNewGirviAccessAcntType"         
                                           <?php if ($changeAcntTypeAccess == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Account Type</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- End to add access to sub fields in Add Girvi Panel @AUTHOR: SANDY7AUG13 
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccess" name="updateGirviAccess" value="UpdateGirviAccess"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Update Girvi</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- Start to add sub fields in update girvi panel @AUTHOR: SANDY13AUG13 
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessPrin" name="updateGirviAccessPrin" value="updateGirviAccessPrin"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Principal</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessDt" name="updateGirviAccessDt" value="updateGirviAccessDt"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Date</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessIntOpt" name="updateGirviAccessIntOpt" value="updateGirviAccessIntOpt"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Interest Option</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessAddPrin" name="updateGirviAccessAddPrin" value="updateGirviAccessAddPrin"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Add More Principal</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessFirm" name="updateGirviAccessFirm" value="updateGirviAccessFirm"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Firm</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessAddItem" name="updateGirviAccessAddItem" value="updateGirviAccessAddItem"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Add More Item</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessOtherInfo" name="updateGirviAccessOtherInfo" value="updateGirviAccessOtherInfo"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Other Info</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessMnthInt" name="updateGirviAccessMnthInt" value="updateGirviAccessMnthInt"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Monthly Int</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessIntTyp" name="updateGirviAccessIntTyp" value="updateGirviAccessIntTyp"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Interest Type</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessDelGrvDep" name="updateGirviAccessDelGrvDep" value="updateGirviAccessDelGrvDep"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Delete Girvi Deposit</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateGirviAccessDepMny" name="updateGirviAccessDepMny" value="updateGirviAccessDepMny"
                                           <?php if ($array['updateGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>

                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Deposit Money</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!--End to add sub fields in update girvi panel @AUTHOR: SANDY13AUG13 
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="deleteGirviAccess" name="deleteGirviAccess" value="DeleteGirviAccess"
                                           <?php if ($array ['deleteGirviAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Delete Girvi</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="analysisPanelAccess" name="analysisPanelAccess" value="AnalysisPanelAccess"           
                                           <?php if ($array ['analysisPanelAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Analysis Panel</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        <td align="center">
            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="0">
                <tr>
                    <td align="left" class="itemAddPnLabels12">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top" class="padBott3">
                            <tr>
                                <td align="center" valign="top">
                                    Udhaar Access
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="addUdhaarAccess" name="addUdhaarAccess" value="AddUdhaarAccess"
                                           <?php if ($array ['addUdhaarAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13 ?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Add Udhaar</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="updateUdhaarAccess" name="updateUdhaarAccess" value="UpdateUdhaarAccess"        
                                           <?php if ($array ['updateUdhaarAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13 ?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Update Udhaar</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" class="itemAddPnLabels12" title="Click here to Access this Panel By Staff!">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td align="right" valign="top">
                                    <input type="checkbox" id="deleteUdhaarAccess" name="deleteUdhaarAccess" value="DeleteUdhaarAccess"           
                                           <?php if ($array['deleteUdhaarAccess'] == 'true') echo 'checked'; else echo ''; //to get values of access @AUTHOR: SANDY12AUG13?>/>
                                </td>
                                <td align="left" valign="middle">
                                    <span class="text_blue_Arial_12">Delete Udhaar</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </table>
    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="marginTop7">
        <tr>
            <td align="left" class="itemAddPnLabels12">
                <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" class="padBott3">
                    <tr>
                        <td valign="middle" align="right">
                            <input type="submit" value="Submit"
                                   id="empAccessButton" name="empAccessButton" class="frm-btn" 
                                   onclick="javascript:addEmpAccess('omrevoAccess','<?php echo $staffId; ?>');" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div> -->

