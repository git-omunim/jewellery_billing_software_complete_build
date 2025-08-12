<?php
/* * *************************************************************************************
 * @tutorial: MAIN SCHEME PANEL FILE FOR SEARCH SCHEME CUSTOMER @SWAPNIL-24DEC2019
 * **************************************************************************************
 *  
 * 
 * Created on 24 DEC, 2019 02:24:17 PM
 *
 * @FileName: omSchemeUserfind.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
// MANDATORY FILES
if (!isset($_SESSION)) {
    session_start();
}
//
$currentFileName = basename(__FILE__);
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
?>
<?php
// Staff access array file @Author:SHRI30SEP19
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
//
$panelNameNav = $_REQUEST['panelNameNav'];
// PREVIOUS SCHEME PANEL BUTTON CODE REMOVED BY ASHWINI PATIL
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <div id="custListForScheme"></div>
        </td>
    </tr>
</table>