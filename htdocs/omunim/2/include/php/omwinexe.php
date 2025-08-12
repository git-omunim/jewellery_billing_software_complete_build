<?php

/*
 * **************************************************************************************
 * @tutorial: oMunim windows exe application
 * **************************************************************************************
 *
 * Created on 4 Nov, 2012 12:39:23 PM
 *
 * @FileName: omwinexe.php
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

$omWinExe = trim($_GET['omWinExe']);
if ($omWinExe == '' || $omWinExe == NULL)
    $omWinExe = trim($_POST['omWinExe']);

$runCommand = $omWinExe . '.exe';
$WshShell = new COM("WScript.Shell");
$oExec = $WshShell->Run($runCommand, 3, false);
?>