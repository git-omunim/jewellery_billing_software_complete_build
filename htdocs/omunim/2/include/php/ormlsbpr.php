<?php
/*
 * **************************************************************************************
 * @tutorial: Transfer Principal list in Money lenders Add Loan Panel @AUTHOR: SANDY12DEC13
 * **************************************************************************************
 *
 * Created on 13 NOV, 2013 11:04:23 AM
 *
 * @FileName: ormlsbpr.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
//change in file @AUTHOR: SANDY03JAN14
require_once 'system/omssopin.php';
$prinCount = $_GET['count'];
if ($prinCount == '') {
    $prinCount = 1;
}
?>
<input type = "hidden" id = "prinStatus<?php echo $prinCount; ?>" name = "prinStatus<?php echo$prinCount; ?>" value = "Active" />
<input type = "hidden" id ="totalPrinTransferred" name = "totalPrinTransferred" value="<?php echo $prinCount; ?>" />
<div id ="transferPrincipalDetailsDiv<?php echo $prinCount; ?>">
    <input id="principalId<?php echo $prinCount; ?>" name="principalId<?php echo $prinCount; ?>" type="text"                     
           onkeydown = "javascript: if (event.keyCode == 13) {
               clearListDiv('principalIdList'+<?php echo $prinCount; ?>,this.id);
               searchPrincipalIdAndDet(this.value,'<?php echo $prinCount; ?>', event.keyCode);
               return false;
           }
           else if (event.keyCode == 8 && this.value == '') {
               clearListDiv('principalIdList'+<?php echo $prinCount; ?>,'loanType');//Change in line @AUTHOR: SANDY08FEB14
               return false;
           }"
           onclick="clearListDiv('principalIdList'+<?php echo $prinCount; ?>,this.id);"
           onkeyup = "if (event.keyCode != 9 && event.keyCode != 13) {
           searchPrincipalIdAndDet(this.value,'<?php echo $prinCount; ?>', event.keyCode);
       }else if(event.keyCode == 13){
           if(this.value!=''){
               getDetailsOfSelectedPrincipal(this.value,'<?php echo $prinCount; ?>','');
               return false;   
           }
       }" 
           spellcheck="false"  class="inputBox14CalibriGrey textBoxCurve1px6rad" 
           size="20" maxlength="20"  placeholder="ADDITIONAL LOAN NO" autocomplete="off" style="height:30px;"/>
    <div id ="principalIdList<?php echo $prinCount; ?>" class="loanNoListDiv"></div>
</div>
<div id="transferMorePrincipalDiv<?php echo $prinCount + 1; ?>"></div>



