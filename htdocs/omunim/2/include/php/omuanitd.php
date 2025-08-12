<?php /**
 * 
 * Created on Aug 31, 2011 9:51:59 AM
 *
 * @FileName: omuanitd.php
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
<!---Change in file to add classes and change display @AUTHOR: SANDY08FEB14---->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr align="left">
        <td align="left" width="50%">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr align="left">
                    <td align="left" valign="middle" class="tnr_nr_12_red" width="170px">
                        Item Add Option:
                    </td>
                    <td align="left">
                        <h5>
                            <div class="selectStyled widthPX90">
                                <select id="itemAddOption" name="itemAddOption" class="border-no textLabel12CalibriGrey" 
                                        onchange="addUdhaarItemDiv(this);">
                                    <option value="OneByOne" selected>One by One</option>
                                    <option value="MultipleItems">Multiple Items</option>
                                </select>
                            </div>
                        </h5>
                    </td>
                    <td align="center" width="100px">
                        <div id="ajaxLoadGetItemListDiv" style="visibility: hidden" class="blackMess11">
                            <?php include 'omzaajld.php'; ?>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td width="50%" align="right">
            <!--<table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="right" valign="middle">
                        <h4>Customer Type:</h4>
                    </td>
                    <td>
                        <h5><select id="custType" name="custType" class="lgn-txtfield" 
                                    onchange="changeItemAddCustTypeDiv(this);">
                                <option value="Customer" selected>Customer</option>
                                <option value="Sahukar">Sahukar</option>
                            </select>
                        </h5>
                    </td>
                </tr>
            </table>-->
        </td>
    </tr>
    <tr>
        <td align="right" colspan="2">
            <hr color="#FD9A00" size="0.1px" />
        </td>
    </tr>
    <tr align="left">
        <td align="right" valign="top" colspan="2">
            <div id="addUdhaarItemSubDiv">
                <?php include 'omuaoooi.php'; ?>
            </div>
        </td>
    </tr>
</table>