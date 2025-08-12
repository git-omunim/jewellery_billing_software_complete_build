<?php
/*
 * **************************************************************************************
 * @tutorial: Get City List to add Girvi
 * **************************************************************************************
 *
 * Created on 16 May, 2012 11:16:32 PM
 *
 * @FileName: omvvgtcg.php
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

$custCity = trim($_POST['custCity']);
$panelName = trim($_POST['panelName']);

$qSelCity = "SELECT city_name FROM city where city_own_id='$_SESSION[sessionOwnerId]' and city_name LIKE '$custCity%' order by city_name asc";
$resCity = mysqli_query($conn, $qSelCity);
$totalCities = mysqli_num_rows($resCity);

if ($totalCities > 0) {
    if ($panelName == 'addNewCustomer') {
        ?>
        <SELECT class="cityListDivToAddNewCustSelect" id="custCityForAddNewCustSelect" name="custCityForAddNewCustSelect" 
                onKeyDown="if (event.keyCode == 13) {
                                    document.getElementById('city').value = this.value;
                                    searchCityForPanelBlank('addNewCustomer');
                                    document.getElementById('city').focus();
                                }" style="z-index: 1000;width:100%"
                onclick="document.getElementById('city').value = this.value; searchCityForPanelBlank('addNewCustomer');document.getElementById('city').focus();"
                multiple="multiple" size="8"><!--Focus Added @Author:PRIYA24AUG13-->
                    <?php
                    while ($row = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$row['city_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['city_name']}</OPTION>";
                    }
                    ?>
        </select>
    <?php } else if ($panelName == 'directAddCust') { ?>
        <SELECT class="cityListDivToAddGirviSelect" id="custCityForAddGirviSelect" name="custCityForAddGirviSelect" style="z-index: 1000;width:100%"
                onKeyDown="if (event.keyCode == 13) {
                                    document.getElementById('custCityForAddGirvi').value = this.value; searchCityForPanelBlank('directAddCust');
                                }"
                onclick="document.getElementById('custCityForAddGirvi').value = this.value;
                                searchCityForPanelBlank('directAddCust');"
                multiple="multiple" size="8">
                    <?php
                    while ($row = mysqli_fetch_array($resCity, MYSQLI_ASSOC)) {
                        echo "<OPTION  VALUE=" . "\"{$row['city_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['city_name']}</OPTION>";
                    }
                    ?>
        </select>
    <?php }
} ?>