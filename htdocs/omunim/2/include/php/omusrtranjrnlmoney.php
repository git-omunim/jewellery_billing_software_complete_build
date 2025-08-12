<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 18 Feb, 2018 03:22:35 PM
 *
 * @FileName: omusrtranjrnlmoney.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  ratnakar@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
require_once 'system/omssopin.php';
?>
<?php

//******************************************************************************
// THIS IS MONEY PANEL FILE WHICH INCLUDE THIS THREE FILES
// 1. CASH UDHAAR MONEY & ADVANCE RETURN
// 2. ADVANCE MONEY & CASH UDHAAR DEPOSIT
// 3. ONPURCHASE UDHAAR & UDHAAR DEPOSIT
//
//******************************************************************************
// CASH UDHAAR MONEY & ADVANCE RETURN TRANSACTION JOURNAL ENTRIES
// *****************************************************************************
include 'omusrtranjrnludhaarmoney.php';
//******************************************************************************
//******************************************************************************
//
//
// *****************************************************************************
// CASH UDHAAR DEPOSIT & ADVANCE MONEY TRANSACTION JOURNAL ENTRIES
// *****************************************************************************
include 'omusrtranjrnlmoneydeposit.php';
//******************************************************************************
//******************************************************************************
//
//
// *****************************************************************************
// ONPURCHASE UDHAAR & DEPOSIT TRANSACTION JOURNAL ENTRIES
// *****************************************************************************
include 'omusrtranjrnludhaaronpurchase.php';
//******************************************************************************
//******************************************************************************
//
//
?>