<?php /**
 * 
 * Created on Jul 26, 2011 11:57:06 AM
 *
 * @FileName: omrwmcat.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
?>
<?php
$sessionOwnerId = $_SESSION[sessionOwnerId];
$metalType = trim($_GET['metalType']);
$metalName=
$qSelItemName = "SELECT DISTINCT raw_metal_cat FROM raw_metals where raw_metal_own_id='$sessionOwnerId' and raw_metal_type='$metalType'";
$resItemName = mysqli_query($conn,$qSelItemName);
$totalRows =  mysqli_num_rows($resItemName);
if ($totalRows >0) {
    ?>
    <SELECT class="dropDownToSelectMetRate" id="metalCatListDivToAddCatSelect" name="metalCatListDivToAddCatSelect" 
            onkeypress="if (event.keyCode == 13) {
                        document.getElementById('addRawStockItemCategory').value = this.value;
                        document.getElementById('addRawStockItemDescription').focus();
                        clearDivision('itemCatgryList');
                    }"
            onclick="document.getElementById('addRawStockItemCategory').value = this.value;
                    document.getElementById('addRawStockItemDescription').focus();
                    clearDivision('itemCatgryList');"
            multiple="multiple" size="8">
                <?php
                while ($row = mysqli_fetch_array($resItemName, MYSQLI_ASSOC)) {
                    echo "<OPTION  VALUE=" . "\"{$row['raw_metal_cat']}\"" . " class=" . "\"content-mess-maron-arial\"" . " >{$row['raw_metal_cat']}</OPTION>";
                }
                ?>
    </select>
<?php } ?>
