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

$qSelAllGirvi = "SELECT gtrans_id,gtrans_girvi_id,gtrans_DOB,gtrans_DOR 
    FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]'";

$resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);

while ($rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC)) {

    $girviTransId = $rowAllGirvi['gtrans_id'];
    $girviTransGirviId = $rowAllGirvi['gtrans_girvi_id'];

    $girviTransDOB = $rowAllGirvi['gtrans_DOB'];
    $girviTransDOB = om_strtoupper(date("d M Y", strtotime($girviTransDOB)));
    $girviTransDOR = $rowAllGirvi['gtrans_DOR'];
    if ($girviTransDOR == NULL || $girviTransDOR == '01 JAN 1970') {
        $girviTransDOR = '';
    } else {
        $girviTransDOR = om_strtoupper(date("d M Y", strtotime($girviTransDOR)));
    }

    $queryUpdGirvi = "UPDATE girvi_transfer SET
		gtrans_DOB='$girviTransDOB',gtrans_DOR='$girviTransDOR'
                WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_id='$girviTransId'  and gtrans_girvi_id='$girviTransGirviId'";

    if (!mysqli_query($conn,$queryUpdGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>