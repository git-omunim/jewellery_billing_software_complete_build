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

$qSelCity = "SELECT distinct(user_tehsil) as user_tehsil FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_tehsil LIKE '$custCity%' and user_tehsil is not null order by user_tehsil asc";
$resCity = mysqli_query($conn,$qSelCity);
$totalCities = mysqli_num_rows($resCity);

if ($totalCities > 0) {
    if ($panelName == 'addNewCustomer') {
        ?>
        <SELECT class="cityListDivToAddNewCustSelect" id="custVillageForAddNewCustSelect" name="custVillageForAddNewCustSelect" 
                onKeyDown="if(event.keyCode == 13) { document.getElementById('village').value=this.value;searchTehsilForPanelBlank('addNewCustomer');
                document.getElementById('tehsil').focus();}"
                onclick="document.getElementById('tehsil').value=this.value; searchTehsilForPanelBlank('addNewCustomer');document.getElementById('tehsil').focus();"
                multiple="multiple" size="8"><!--Focus Added @Author:PRIYA24AUG13-->
                    <?php
                    while ($row = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$row['user_tehsil']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['user_tehsil']}</OPTION>";
                    }
                    ?>
        </select>
    <?php } else if($panelName == 'directAddCust'){ ?>
        <SELECT class="cityListDivToAddGirviSelect" id="custVillageForAddNewCustSelect" name="custVillageForAddNewCustSelect" 
                onKeyDown="if(event.keyCode == 13) { document.getElementById('custVillageForAddGirvi').value=this.value; searchTehsilForPanelBlank('directAddCust');}"
                onclick="document.getElementById('custVillageForAddGirvi').value=this.value; searchTehsilForPanelBlank('directAddCust');"
                multiple="multiple" size="8">
                    <?php
                    while ($row = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$row['user_tehsil']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['user_tehsil']}</OPTION>";
                    }
                    ?>
        </select>
<?php } } ?>