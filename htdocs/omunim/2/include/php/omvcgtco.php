<?php /**
 * 
 * Created on Jun 28, 2011 12:47:14 PM
 *
 * @FileName: omvcgtco.php
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

$qSelPerItem = "SELECT country_name, country_selected FROM country where country_own_id='$ownerId' order by country_name asc";
$resPerItem = mysqli_query($conn,$qSelPerItem);

while ($rowPerItem = mysqli_fetch_array($resPerItem, MYSQLI_ASSOC)) {
    if ($country == $rowPerItem['country_name']) {
        echo "<OPTION  VALUE=" . "\"{$rowPerItem['country_name']}\"" . " class=" . "\"content-mess-maron\"" . " selected>{$rowPerItem['country_name']}</OPTION>";
    } else if ($country == NULL || $country == '') {
        echo "<OPTION  VALUE=" . "\"{$rowPerItem['country_name']}\"" . " class=" . "\"content-mess-maron\"" . " {$rowPerItem['country_selected']}>{$rowPerItem['country_name']}</OPTION>";
    } else {
        echo "<OPTION  VALUE=" . "\"{$rowPerItem['country_name']}\"" . " class=" . "\"content-mess-maron\"" . ">{$rowPerItem['country_name']}</OPTION>";
    }
}
?>
