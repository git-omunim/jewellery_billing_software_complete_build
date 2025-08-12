<?php
/*
 * *****************************************************************************
 * @tutorial: CUSTOMER REFEREMCES SEARCH RESULT FILE @AUTHOR:MADHUREE-09NOV2021
 * *****************************************************************************
 * 
 * Created on NOV 09, 2021 4:00:20 PM
 *
 * @FileName: omsearchcustref.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: Omunim
 * @version 2.7.94
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$custId = $_REQUEST['custId'];
$searchStr = $_REQUEST['searchStr'];
//
if ($custId != '') {
    $qGetAllReferenceId = "SELECT user_relation_circle FROM user WHERE user_owner_id='$sessionOwnerId' AND user_id='$custId'";
    $resGetAllReferenceId = mysqli_query($conn, $qGetAllReferenceId);
    $rowGetAllReferenceId = mysqli_fetch_array($resGetAllReferenceId, MYSQLI_ASSOC);
    $user_relation_circle = $rowGetAllReferenceId['user_relation_circle'];
}
//
$referenceIdArray = explode('$', $user_relation_circle);
$custRefIdStr = '0';
for ($refCount = 0; $refCount < sizeof($referenceIdArray); $refCount++) {
    $custRefIdRelArray = explode('#', $referenceIdArray[$refCount]);
    $custRefId = $custRefIdRelArray[1];
    $custRefIdStr .= ",$custRefId";
}
//
$querySelAllReference = "SELECT * FROM user WHERE user_owner_id='$sessionOwnerId' AND user_id IN ($custRefIdStr) AND user_fname LIKE '$searchStr%'";
$resSelAllReference = mysqli_query($conn, $querySelAllReference);
$totalCustReference = mysqli_num_rows($resGetAllReferenceId);
?>
<?php if ($totalCustReference > 0) { ?>
    <SELECT class="cityListDivToAddNewCustSelect" 
            id="referenceIdSelect" name="referenceIdSelect" 
            style="width:100%;left:0"
            onKeyDown="if (event.keyCode == 13) {
                        document.getElementById('custCircleCustName').value = this.options[this.selectedIndex].text;
                        getReferenceBySearchResult('<?php echo $custId; ?>', this.value);
                        document.getElementById('custCircleCustName').focus();
                    }"
            onclick="document.getElementById('custCircleCustName').value = this.options[this.selectedIndex].text;
                    getReferenceBySearchResult('<?php echo $custId; ?>', this.value);
                    document.getElementById('custCircleCustName').focus();"
            multiple="multiple" size="6">
                <?php
                while ($rowSelAllReference = mysqli_fetch_array($resSelAllReference, MYSQLI_ASSOC)) {
                    echo "<OPTION  VALUE=" . "\"{$rowSelAllReference['user_id']}\"" . " class=" . "\"content-mess-maron\"" . " >{$rowSelAllReference['user_fname']} {$rowSelAllReference['user_lname']}</OPTION>";
                }
                ?>
    </SELECT>
<?php } ?>