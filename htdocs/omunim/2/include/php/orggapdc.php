<?php

/*
 * **************************************************************************************
 * @tutorial: File To change date of all girvi aditional principal
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
$qSelAllGirvi = "SELECT girv_prin_id,girv_prin_girv_id,girv_prin_prin_DOB
    FROM girvi_principal where girv_prin_own_id='$_SESSION[sessionOwnerId]'";

$resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);

while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

    $girviAddPrinId = $rowAllGirvi['girv_prin_id'];
    $girviId = $rowAllGirvi['girv_prin_girv_id'];
    
    $girviAddPrincDOB = $rowAllGirvi['girv_prin_prin_DOB'];
    $girviAddPrincDOB = om_strtoupper(date("d M Y", strtotime($girviAddPrincDOB)));
    
    $queryUpdGirvi = "UPDATE girvi_principal SET
		girv_prin_prin_DOB='$girviAddPrincDOB'
                WHERE girv_prin_id='$girviAddPrinId' and girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_girv_id='$girviId'";

    if (!mysqli_query($conn,$queryUpdGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
    
}
?>