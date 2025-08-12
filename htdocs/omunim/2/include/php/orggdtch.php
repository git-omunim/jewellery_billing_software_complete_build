<?php

/*
 * **************************************************************************************
 * @tutorial: File To change date of all girvi's
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

$qSelAllGirvi = "SELECT girv_id,girv_cust_id,girv_DOB,girv_DOR,girv_new_DOB 
    FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]'";

$resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);

while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

    $girviId = $rowAllGirvi['girv_id'];
    $custId = $rowAllGirvi['girv_cust_id'];

    $girviDOB = $rowAllGirvi['girv_DOB'];
    $girviDOB = om_strtoupper(date("d M Y", strtotime($girviDOB)));
    $girviNewDOB = $rowAllGirvi['girv_new_DOB'];
    $girviNewDOB = om_strtoupper(date("d M Y", strtotime($girviNewDOB)));
    $girviDOR = $rowAllGirvi['girv_DOR'];
    if ($girviDOR == NULL || $girviDOR == '01 JAN 1970') {
        $girviDOR = '';
    } else {
        $girviDOR = om_strtoupper(date("d M Y", strtotime($girviDOR)));
    }
    $queryUpdGirvi = "UPDATE girvi SET
		girv_DOB='$girviDOB',girv_new_DOB='$girviNewDOB',girv_DOR='$girviDOR'
                WHERE girv_id='$girviId' and girv_own_id='$_SESSION[sessionOwnerId]' and girv_cust_id='$custId'";

    if (!mysqli_query($conn,$queryUpdGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
    
}
?>