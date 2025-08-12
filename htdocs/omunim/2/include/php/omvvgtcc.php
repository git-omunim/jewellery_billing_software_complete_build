<?php /**
 * 
 * Created on Jun 28, 2011 12:47:14 PM
 *
 * @FileName: omvvgtcc.php
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

$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';

$qSel = "SELECT city_name FROM city WHERE city_name!= '' AND city_own_id='$_SESSION[sessionOwnerId]' order by city_name asc";
$res = mysqli_query($conn,$qSel);

while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    if ($city == $row['city_name']) {
        echo "<OPTION  VALUE=" . "\"{$row['city_name']}\"" . " class=" . "\"content-mess-maron\"" . " selected>{$row['city_name']}</OPTION>";
    } else {
        echo "<OPTION  VALUE=" . "\"{$row['city_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['city_name']}</OPTION>";
    }
}
?>



