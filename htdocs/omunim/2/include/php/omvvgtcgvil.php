<?php
/*
 * **************************************************************************************
 * @tutorial: Get City List to add Girvi
 * **************************************************************************************
 *
 * Created on 16 May, 2012 11:16:32 PM
 *
 * @FileName: omvvgtcgvil.php
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

$custCity = trim($_POST['custVillage']);
$panelName = trim($_POST['panelName']);

$qSelCity = "SELECT village_name FROM city where city_own_id='$_SESSION[sessionOwnerId]' and village_name LIKE '$custCity%' order by village_name asc";
$resCity = mysqli_query($conn,$qSelCity);
$totalCities = mysqli_num_rows($resCity);

if ($totalCities > 0) {
    if ($panelName == 'addNewCustomer') {
        ?>
        <SELECT class="cityListDivToAddNewCustSelect" id="custVillageForAddNewCustSelect" name="custVillageForAddNewCustSelect" 
                onKeyDown="if(event.keyCode == 13) { document.getElementById('village').value=this.value;searchVillageForPanelBlank('addNewCustomer');
                document.getElementById('village').focus();}"
                onclick="document.getElementById('village').value=this.value; searchVillageForPanelBlank('addNewCustomer');document.getElementById('village').focus();"
                multiple="multiple" size="8"><!--Focus Added @Author:PRIYA24AUG13-->
                    <?php
                    while ($row = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$row['village_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['village_name']}</OPTION>";
                    }
                    ?>
        </select>
    <?php } else if($panelName == 'directAddCust'){ ?>
        <SELECT class="cityListDivToAddGirviSelect" id="custVillageForAddNewCustSelect" name="custVillageForAddNewCustSelect" 
                onKeyDown="if(event.keyCode == 13) { document.getElementById('custVillageForAddGirvi').value=this.value; searchVillageForPanelBlank('directAddCust');}"
                onclick="document.getElementById('custVillageForAddGirvi').value=this.value; searchVillageForPanelBlank('directAddCust');"
                multiple="multiple" size="8">
                    <?php
                    while ($row = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$row['village_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['village_name']}</OPTION>";
                    }
                    ?>
        </select>
<?php } } ?>