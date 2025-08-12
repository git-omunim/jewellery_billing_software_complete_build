<?php
/*
 * **************************************************************************************
 * @tutorial: Transfer loan list in Money lenders Add Loan Panel @AUTHOR: SANDY12DEC13
 * **************************************************************************************
 *
 * Created on 13 NOV, 2013 11:04:23 AM
 *
 * @FileName: ormlsbln.php
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
//change in file @AUTHOR: SANDY03JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
$count = $_GET['count'];
if ($count == '') {
    $count = 1;
}
?>
<!--Start code to change code @Author:SHRI16MAY15-->
<input type ="hidden" id ="status<?php echo $count; ?>" name ="status<?php echo $count; ?>" value ="Active"/>
<input type ="hidden" id ="totalLoanTransferred" name = "totalLoanTransferred" value="<?php echo $count; ?> "/>
<div id ="transferLoanDetailsDiv<?php echo $count; ?>">
    <input id="mlLoanNo<?php echo $count; ?>" name="mlLoanNo<?php echo $count; ?>" type="text"                     
           onkeydown = "javascript: if (event.keyCode == 13) {
               clearListDiv('mlLoanNoList'+<?php echo $count; ?>,this.id);
               searchLoanNoAndDet(this.value,'<?php echo $count; ?>', event.keyCode);
               return false;
           }
           else if (event.keyCode == 8 && this.value == '') {
               clearListDiv('mlLoanNoList'+<?php echo $count; ?>,'loanType');//Change in line @AUTHOR: SANDY08FEB14
               return false;
           }"
           onclick="clearListDiv('mlLoanNoList'+<?php echo $count; ?>,this.id);"
           onkeyup = "if (event.keyCode != 9 && event.keyCode != 13) {
           searchLoanNoAndDet(this.value,'<?php echo $count; ?>', event.keyCode);
       }else if(event.keyCode == 13){
           if(this.value!=''){
               getDetailsOfSelectedLoan(this.value,'<?php echo $count; ?>','');return false;
           }}"
           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" size="5" maxlength="5"  placeholder="LOAN NO" autocomplete="off"
           style="width:10%;height:30px;"/>
    <div id ="mlLoanNoList<?php echo $count; ?>" class="loanNoListDiv"></div>
</div>
<div id="addMoreLnToTrList<?php echo $count + 1; ?>"></div>

<!--End code to change code @Author:SHRI16MAY15-->
