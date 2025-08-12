<?php
/*
 * **************************************************************************************
 * @tutorial: LED RATES  SONALI 05 AUG 2023
 * **************************************************************************************
 *
 *
 * @FileName: omledratesdisp.php
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'ommpcmfc.php';
include_once 'ommpcmfcc.php';
//
 $owner_id = $_SESSION['sessionOwnerId'];
?>
<?php
$user = $_GET['user'];
if ($user == '')
    $class = 'main_middle';
else
    $class = '';
//
$goldMCXrate = $_REQUEST['goldMCXrate'];
$silverMCXrate = $_REQUEST['silverMCXrate'];
// *****************************************Start code to change user pid Author@:SANT30JAN16***********************************
$sessionOwnerId = $_SESSION[sessionOwnerId];
$img_sign_src = $documentRootBSlash . "/images/plus_sign.png";
//
//
$queryLedRates = "SELECT omin_value FROM omindicators WHERE omin_option = 'LEDRATESINDICATOR'";
$resLedRates = mysqli_query($conn, $queryLedRates);
$rowLedRates = mysqli_fetch_array($resLedRates);
$allLedRates = $rowLedRates['omin_value'];
//
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LED RATES SETTING</title>        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />       
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/invoice.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $documentRootBSlash; ?>/images/favicon.ico" />
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/advanceMetal.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/orAddFunction_1_6_1.js"></script>
    
    </head>
    <body>
         <table border="0" cellpadding="2" cellspacing="2" width="100%">
    <tr>
         <td align="left" width="80%">
            <div class="Helpvideo" style="margin-bottom:0;height:490px">
                <div style="display:flex;align-items:center;justify-content:center">
                <div class="embed-responsive embed-responsive-16by9" style="width:100%">
                    <iframe class="embed-responsive-item" style="width:100%;height:490px" src="https://www.youtube.com/embed/eJzEmz_Vf0M" allowfullscreen></iframe>
                <!--</div>
                      <div class="embed-responsive embed-responsive-16by9" style="width:50%">
                    <iframe class="embed-responsive-item" style="width:100%;height:490px" src="https://www.youtube.com/embed/LhIKbziqyIg" allowfullscreen></iframe>
                </div>-->
                </div>
            </div>
        </td>
       
    </tr>
</table>
    </body>
</html>			


