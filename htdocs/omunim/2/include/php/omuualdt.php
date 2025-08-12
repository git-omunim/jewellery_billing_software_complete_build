<?php
/*
 * **************************************************************************************
 * @tutorial: All Udhaar Details
 * **************************************************************************************
 *
 * Created on 25 Jul, 2012 2:14:23 PM
 *
 * @FileName: omuualdt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
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
<div id="allUdhaarListDiv">
    <?php
    if ($panel == 'udhaarCustList')
        include 'omuucclt.php';
    else
        include 'omuualud.php';
    ?>
</div>
<?php if ($panel != 'udhaarCustList') { ?>
    <div id="allUdhaarDepListDiv">
        <?php //include 'omuualdp.php'; ?>
    </div>
<?php } ?>