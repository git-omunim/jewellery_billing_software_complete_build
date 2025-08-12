<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: orgnsfad.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
//unlink("temp/Months.png");
//unlink("temp/GirviReceived.png");
?>
<?php
$hfirm = $_GET['firmNmae'];
if ($hfirm == null)
    $hfirm = $_POST['firmNmae'];
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td width="20%" valign="middle">
            <div class="spaceLeft20 main_link_orange">
                LOAN ANALYSIS
            </div>
        </td>
        <td  valign="middle" align="center">
            <table border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td align="right" class="textBoxCurve1px margin1pxAll textLabel16CalibriNormal backFFFFFF">
                        <div class="spaceRight5">
                            <?php include 'omgndate.php'; ?>
                        </div>
                    </td>
                    <td>
                        <!---Start to Changes button @AUTHOR: DIKSHA26SEPT2018----->
                        <div style="text-align: center;margin-left: 5px;">
                            <?php
                            $inputId = "getReport";
                            $inputType = 'submit';
                            $inputFieldValue = 'GO';
                            $inputIdButton = "getReport";
                            $inputNameButton = 'getReport';
                            $inputTitle = '';
                            // This is the main class for input flied
                            $inputFieldClass = 'btn ' . $om_btn_style_nav;
                            $inputStyle = " ";
                            $inputLabel = 'GO'; // Display Label below the text box
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            $inputPlaceHolder = '';
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputOnChange = "";
                            $inputOnClickFun = 'searchReportByDate(document.getElementById("ReportBookFirmName").value, document.getElementById("reportEntryDayDD"), document.getElementById("reportEntryMonth"), document.getElementById("reportEntryYYYY"));';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>
                        </div>
<!--                        <input id="getReport" name="getReport" value="GO" class="frm-btn spaceLeft5" type="submit"
                               onclick="searchReportByDate(document.getElementById('ReportBookFirmName').value, document.getElementById('reportEntryDayDD'), document.getElementById('reportEntryMonth'), document.getElementById('reportEntryYYYY'));"/>-->
                        <!---End to Changes button @AUTHOR: DIKSHA26SEPT2018----->
                    </td>
                </tr>
            </table>
        </td> 
        <td align="right" valign="middle">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
                <tr>
                    <td align="right" class="textBoxCurve1px margin1pxAll textLabel16CalibriNormal backFFFFFF" width="100px">
                        <div id="selectFirmDiv">
                            <?php
                            $firmIdSelected = $_SESSION['setFirmSession']; //to add header selected firm as a default firm @AUTHOR: SANDY8JUL13
                            include 'orgnsfir.php';
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="3"><br />
        </td>
    </tr>
    <tr>
        <td colspan="10" align="left">
            <div id="girviAnalysisDiv">
                <?php include 'orgnsfdv.php'; ?>
            </div>
        </td>
    </tr>
</table>
