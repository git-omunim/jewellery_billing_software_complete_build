<?php /**
 * 
 * Created on Aug 28, 2011 2:17:31 PM
 *
 * @FileName: omuaoooi.php
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
<table border="0" cellpadding="0" cellspacing="2" width="100%">
    <tr align="left">
        <td width="50%" align="left">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left" valign="middle" class="tnr_nr_12_red" width="170px">
                        <font color="red">*</font>Metal Type:
                    </td>
                    <td align="left" class="frm-r1" valign="middle">
                        <h5>
                            <div class="selectStyled widthPX90">
                                <select id="itemType" name="itemType" class="border-no textLabel12CalibriGrey" 
                                        onchange="getItemNames(this);">
                                    <option value="NotSelected">~ Metal Type ~</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Silver">Silver</option>
                                </select>
                            </div>
                        </h5>
                    </td>
                </tr>
            </table>
        </td>
        <td width="50%" align="right">
            <table border="0" cellpadding="0" cellspacing="0" width="60%">
                <tr>
                    <td align="left" valign="middle" class="tnr_nr_12_red" width="90px">
                        <font color="red">*</font>Item Name:
                    </td>
                    <td align="left" class="frm-r1" valign="middle">
                        <div id="itemNameDiv" class="selectStyled widthPX165">
                            <select id="itemName" name="itemName" class="border-no textLabel12CalibriGrey">
                                <option value="NotSelected">~First Select Metal Type ~</option>
                            </select>  
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>