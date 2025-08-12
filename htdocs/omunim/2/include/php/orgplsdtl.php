<?php
/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on Sep 11, 2015 3:31:21 PM
 *
 * @FileName: orgplsdtl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 1.0.0
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<td align="right">
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="middle" align="right"  width="70%" class="itemAddPnLabels14">
                <div class="spaceLeft80 tnr_nr_12_red">
                    TRANSFERRED LOAN AMOUNT : 
                </div>
            </td>
            <td valign="middle" align="right" width="30%">
                <table>
                    <tr>
                        <td class="spaceLeft10">
                            <h5>
                                <div class="spaceRight5 blueFont"><?php echo formatInIndianStyle($totTransPrin); ?></div>
                            </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right"  width="70%" class="itemAddPnLabels14">
                <div class="spaceLeft80 tnr_nr_12_red">
                    RELEASED LOAN AMOUNT: 
                </div>
            </td>
            <td valign="middle" align="right" width="30%">
                <table>
                    <tr>
                        <td class="spaceLeft10">
                            <h5>
                                <div class="spaceRight5 brown_bold12_arial"><?php echo formatInIndianStyle($totTransRelPrin); ?></div>
                            </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right"  width="70%" class="itemAddPnLabels14">
                <div class="spaceLeft80 tnr_nr_12_red">
                    INTEREST AMOUNT : 
                </div>
            </td>
            <td valign="middle" align="right" width="30%">
                <table>
                    <tr>
                        <td class="spaceLeft10">
                            <h5>
                                <div class="spaceRight5 brown_bold12_arial"><?php echo formatInIndianStyle($totGTransRelInt); ?></div>
                            </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right"  width="70%" class="itemAddPnLabels14">
                <div class="spaceLeft80 tnr_nr_12_red">
                    TOTAL BALANCE : 
                </div>
            </td>
            <td valign="middle" align="right" width="30%">
                <table>
                    <tr>
                        <td class="spaceLeft10">
                            <h5>
                                <div class="spaceRight5 <?php echo $class; ?>"><?php echo formatInIndianStyle(abs($totBal)); ?></div>
                                <input type="hidden" id="totFinBal" name="totFinBal" value="<?php echo $totBal; ?>"/>
                            </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right"  width="70%" class="itemAddPnLabels14">
                <div class="spaceLeft80 tnr_nr_12_red">
                    AMOUNT DEPOSIT : 
                </div>
            </td>
            <td valign="middle" align="right" width="30%">
                <table>
                    <tr>
                        <td class="spaceLeft10">
                            <h5>
                                <div class="spaceRight5">
                                    <input type="text" id="stlAmountDep" name="stlAmountDep" value="<?php
                                    if ($ltran_settle_amt != '') {
                                        echo formatInIndianStyle($ltran_settle_amt);
                                    } else {
                                        echo '0.00';
                                    }
                                    ?>" 
                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="20" readonly="true"/>
                                </div>
                            </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right"  width="70%" class="itemAddPnLabels14">
                <div class="spaceLeft80 tnr_nr_12_red">
                    AMOUNT LEFT : 
                </div>
            </td>
            <td valign="middle" align="right" width="30%">
                <table>
                    <tr>
                        <td class="spaceLeft10">
                            <h5>
                                <div class="spaceRight5">
                                    <input type="text" id="stlAmountLeft" name="stlAmountLeft" value="<?php
                                    if ($ltran_amt_left != '') {
                                    echo formatInIndianStyle($ltran_amt_left);
                                    } else {
                                        echo '0.00';
                                    }
                                    ?>"
                                           spellcheck="false" class="bgTransNoBorderArial12Right" size="10" maxlength="20" readonly="true"/>
                                </div>
                            </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</td>