<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 08-Jul-2021 8:54:33 pm
 *
 * @FileName: omwamesstempdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim_aws
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$setUnvisitCustSmsTemplate = $_REQUEST['smsTemplateId'];
//
if ($setUnvisitCustSmsTemplate == '')
    $setUnvisitCustSmsTemplate = 'WA_WELCOME_CUST';
$needListOnly = 'YES';
$waMessageContent = '';
include 'omunvisitcustSMStemplate.php';
?>
<input  id="waMessageContent" name="waMessageContent" type="hidden" value="<?php echo $waMessageContent; ?>" />