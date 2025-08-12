<?php
/*
 * **************************************************************************************
 * @tutorial: Transfer loan list in Money lenders Add Loan Panel
 * **************************************************************************************
 *
 * Created on 13 NOV, 2013 11:04:23 AM
 *
 * @FileName: ormltrln.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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
//change in file @AUTHOR: SANDY25DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<!--Start code to change code @Author:SHRI16MAY15-->
<table border="0" cellpadding="0" cellspacing="0" width="100%" width="100%">
    <tr>
        <td align="left" width="100%">
            <div class="textLabel12CalibriOrange" style="font-size:14px;color: #FF0000;"><b>SELECT LOAN</b></div>
        </td>
        <td align="right">
            <div id="moreLoanDiv0" style="visibility:hidden">
                <a style="cursor: pointer;" onclick="getMoreLoanTrDiv('0','1')">
                    <img src="<?php echo $documentRoot; ?>/images/img/add.png" alt="Click Here To Add More Loans" height="16px" class="marginTop5" />
                </a>
            </div>
        </td>
    </tr>
<!--    <tr>
        <td align="center" valign="middle" width="100%" class="border-bottom-grey paddingTop2" colspan=2" >
        </td>
    </tr>-->
    <tr>
        <td colspan=2" width="100%" border="0"  cellpadding="0" cellspacing="0">
            <div id="headingDiv">
                <table width="100%">
                    <tr>
                        <td>
                            <table width="100%" border="0"  cellpadding="0" cellspacing="0" class="brdrgry-dashed" style="border-radius:3px;">
                                <tr style="background:#f2f2f2;">
                                    <td align="center" width="100px">
                                        <div class="textLabel12CalibriBrown"><b>SERIAL NO </b></div>
                                    </td>
                                    <td align="center" width="130px">
                                        <div class="textLabel12CalibriBrown"><b>CUSTOMER </b></div>
                                    </td>
                                    <td align="center" width="110px">
                                        <div class="textLabel12CalibriBrown"><b>PRINCIPLE AMT </b></div>
                                    </td>
                                    <td align="center" width="90px">
                                        <div class="textLabel12CalibriBrown"><b>ROI </b></div>
                                    </td>
                                    <td align="center" width="120px">
                                        <div class="textLabel12CalibriBrown"><b>FIRM </b></div>
                                    </td>
                                    <td align="center" width="100px">
                                        <div class="textLabel12CalibriBrown"><b>PACKET NO. </b></div>
                                    </td>
                                    <td align="center" width="130px">
                                        <div class="textLabel12CalibriBrown"><b>OTHER INFO </b></div>
                                    </td>
                                    <td align="center" width="150px">
                                        <div class="textLabel12CalibriBrown"><b>DATE </b></div>
                                    </td>
<!--                                    <td align="center">
                                    </td>-->
                                    <td align="center" width="60px">
                                        <div id="moreLoanDiv0" style="visibility:hidden">
                                            <a style="cursor: pointer;" onclick="getMoreLoanTrDiv('0','1')">
                                                <img src="<?php echo $documentRoot; ?>/images/img/add.png" alt="Click Here To Add More Loans" height="16px" class="marginTop5" />
                                            </a>
                                        </div>
                                    </td>
                                   <td align="center" width="5px"></td>
                                   <!--  <td>      
                                    </td>
                                    <td>
                                        
                                    </td>-->
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="position:relative">
            <input type = "hidden" id ="totalLoanTransferred" name = "totalLoanTransferred"/>
            <?php include 'ormlsbln.php'; ?>
            <div id="addMoreLnToTrList1"></div>
        </td>
    </tr>
    <tr>
        
        <td align="left" width="20%" class="itemAddPnLabels12ArialLink">
            <div style="padding-left:27%">
               <label id="totTransAmtLabel" style="font-weight:600"></label>
            </div>
        </td>
        <td   align="left" class="itemAddPnLabels12ArialLink">
            &nbsp;
        </td>
    </tr>
    <tr>
        <td align="left" width="100%">
            <div class="textLabel12CalibriOrange paddingTop5" style="font-size:14px;color: #FF0000;"><b>SELECT ADDITIONAL LOAN</b></div>
        </td>
        <td align="right">
            <div id="morePrinDiv0"  style="visibility:hidden">
                <a style="cursor: pointer;"  onclick="getMorePrinToTrDiv('0','1')">
                    <img src="<?php echo $documentRoot; ?>/images/img/add.png" alt="Click Here To Add More Loans" height="16px" class="marginTop5" />
                </a>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="paddingTop5" style="position: relative">
            <input type = "hidden" id ="totalPrinTransferred" name = "totalPrinTransferred" />
            <?php include 'ormlsbpr.php'; ?>
            <div id="transferMorePrincipalDiv1"></div>
        </td>
    </tr>
    <tr>
        <td align="center" class="itemAddPnLabels12ArialLink">
            <div class="spaceLeft40"><label id="totAddPrinLabel" style="font-weight:600;"></label></div>
        </td>
        <td align="left" class="itemAddPnLabels12ArialLink">
        </td>
    </tr>
</table>
<!--End code to change code @Author:SHRI16MAY15-->


