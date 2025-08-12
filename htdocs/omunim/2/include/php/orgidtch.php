<?php

/*
 * **************************************************************************************
 * @tutorial: File To change date of all girvi items
 * **************************************************************************************
 * 
 * Created on Mar 20, 2013 2:28:07 PM
 *
 * @FileName: orggdtch.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
$qSelAllGirvi = "SELECT girv_itm_id,girv_itm_girv_id,girv_itm_DOB,girv_itm_DOR
    FROM girvi_items where girv_itm_own_id='$_SESSION[sessionOwnerId]'";

$resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);

while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

    $girviItemId = $rowAllGirvi['girv_itm_id'];
    $girviId = $rowAllGirvi['girv_itm_girv_id'];
    
    $girviItemDOB = $rowAllGirvi['girv_itm_DOB'];
    $girviItemDOB = om_strtoupper(date("d M Y", strtotime($girviItemDOB)));
    $girviItemDOR = $rowAllGirvi['girv_itm_DOR'];
    if ($girviItemDOR == NULL || $girviItemDOR == '01 JAN 1970') {
        $girviItemDOR = '';
    } else {
        $girviItemDOR = om_strtoupper(date("d M Y", strtotime($girviItemDOR)));
    }
    
    $queryUpdGirvi = "UPDATE girvi_items SET
		girv_itm_DOB='$girviItemDOB',girv_itm_DOR='$girviItemDOR'
                WHERE girv_itm_id='$girviItemId' and girv_itm_own_id='$_SESSION[sessionOwnerId]' and girv_itm_girv_id='$girviId'";

    if (!mysqli_query($conn,$queryUpdGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
    
}
?>