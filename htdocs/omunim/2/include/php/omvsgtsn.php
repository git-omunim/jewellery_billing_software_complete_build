<?php /**
 * 
 * Created on Jun 28, 2011 12:47:14 PM
 *
 * @FileName: omvsgtsn.php
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
<?php

$ownerId = $_SESSION[sessionOwnerId];
if ($ownerId != '' || $ownerId != NULL) {
    require_once 'system/omssopin.php';
} else {
    $ownerId = $dgGUId;
    if ($ownerId == '') {
        $ownerId = $_SESSION['sessiondgGUId'];
    }
}
?>
<?php

$qSel = "SELECT state_name, state_selected FROM state where state_own_id='$ownerId' order by state_name asc";
$res = mysqli_query($conn,$qSel);

while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    if ($state == $row['state_name']) {
        echo "<OPTION  VALUE=" . "\"{$row['state_name']}\"" . " class=" . "\"content-mess-maron\"" . " selected>{$row['state_name']}</OPTION>";
    } else if ($state == NULL || $state == '') {
        echo "<OPTION  VALUE=" . "\"{$row['state_name']}\"" . " class=" . "\"content-mess-maron\"" . " {$row['state_selected']}>{$row['state_name']}</OPTION>";
    } else {
        echo "<OPTION  VALUE=" . "\"{$row['state_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['state_name']}</OPTION>";
    }
}
?>


