<?php
/*
 * ******************************************************************************************************
 * @tutorial: ACTION ITEM TASK DESCRIPTION & CATEGORY SUGGETION DROPDOWN FILE @AUTHOR:MADHUREE-01JULY2020
 * ******************************************************************************************************
 *
 * Created on 01 JULY, 2020 
 *
 * @FileName: omselactitemdet.php
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
//
$suggetionId = trim($_REQUEST['suggetionId']);
$suggetionIdvalue = trim($_REQUEST['suggetionIdvalue']);
//
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
if ($suggetionId == 'taskDescrpn') {
    $qSelActionItemDesc = "SELECT DISTINCT acit_subject FROM actionitem WHERE acit_owner_id='$_SESSION[sessionOwnerId]' "
            . "and acit_subject LIKE '$suggetionIdvalue%' and acit_FirmId IN ($strFrmId)order by acit_id DESC";
    $resActionItemDesc = mysqli_query($conn, $qSelActionItemDesc);
    $totalActionItemDesc = mysqli_num_rows($resActionItemDesc);

    if ($totalActionItemDesc > 0) {
        ?>
        <SELECT class="cityListDivToAddNewCustSelect" id="actionItemSelect" name="actionItemSelect"
                onKeyDown="if (event.keyCode == 13) {
                                    document.getElementById('taskDescrpn').value = this.value;
                                    searchActionItemForPanelBlank('descDropdownDiv');
                                    document.getElementById('taskDescrpn').focus();
                                }"
                onclick="document.getElementById('taskDescrpn').value = this.value;
                                searchActionItemForPanelBlank('descDropdownDiv');
                                document.getElementById('taskDescrpn').focus();"
                            multiple="multiple" style="width: 836px;" size="5">
                    <?php
                    while ($rowActionItemDesc = mysqli_fetch_array($resActionItemDesc, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$rowActionItemDesc['acit_subject']}\"" . " class=" . "\"content-mess-maron\"" . " >{$rowActionItemDesc['acit_subject']}</OPTION>";
                    }
                    ?>
        </select>
        <?php
    }
} else {
    $qSelActionItemCategory = "SELECT DISTINCT acit_category FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' "
            . "and acit_category LIKE '$suggetionIdvalue%' and acit_FirmId IN ($strFrmId)order by acit_id DESC";
    $resActionItemCategory = mysqli_query($conn, $qSelActionItemCategory);
    $totalActionItemCategory = mysqli_num_rows($resActionItemCategory);

    if ($totalActionItemCategory > 0) {
        ?>
        <SELECT class="cityListDivToAddNewCustSelect" id="actionItemSelect" name="actionItemSelect"
                onKeyDown="if (event.keyCode == 13) {
                                    document.getElementById('taskCategory').value = this.value;
                                    searchActionItemForPanelBlank('categoryDropdownDiv');
                                    document.getElementById('taskCategory').focus();
                                }"
                onclick="document.getElementById('taskCategory').value = this.value;
                                searchActionItemForPanelBlank('categoryDropdownDiv');
                                document.getElementById('taskCategory').focus();"
                            multiple="multiple" style="width: 129px;" size="5">
                    <?php
                    while ($rowActionItemCategory = mysqli_fetch_array($resActionItemCategory, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$rowActionItemCategory['acit_category']}\"" . " class=" . "\"content-mess-maron\"" . " >{$rowActionItemCategory['acit_category']}</OPTION>";
                    }
                    ?>
        </select>
        <?php
    }
}
?>