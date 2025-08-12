<?php
/*
 * ******************************************************************************************
 * @tutorial: GET ALL STATE & COUNTRY IN GOOGLE SUGGETION DROPDOWN @AUTOR:MADHUREE-02JULY2021
 * ******************************************************************************************
 *
 * Created on 02 JULY, 2021
 *
 * @FileName: omsearchstatecountry.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 * Copyright 2021 SoftwareGen, Inc
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
$searchString = trim($_REQUEST['searchString']);
$inputId = trim($_REQUEST['inputId']);
$divId = trim($_REQUEST['divId']);
//
if ($inputId == 'custCountryForAddGirvi') {
    $qSelStateCountry = "SELECT DISTINCT country_name FROM country WHERE country_own_id='$_SESSION[sessionOwnerId]' AND country_name LIKE '$searchString%'";
} else if ($inputId == 'custStateForAddGirvi') {
    $qSelStateCountry = "SELECT DISTINCT state_name FROM state WHERE state_own_id='$_SESSION[sessionOwnerId]' AND state_name LIKE '$searchString%'";
}
//
$resSelStateCountry = mysqli_query($conn, $qSelStateCountry);
$totalStateCountry = mysqli_num_rows($resSelStateCountry);
//
if ($totalStateCountry > 0) {
    ?>
    <SELECT class="cityListDivToAddNewCustSelect" id="searchCountryStateSelect" name="searchCountryStateSelect" style="width:129px;margin-top: 0px;"
            onkeydown="if (event.keyCode == 13) {
                            document.getElementById('<?php echo $inputId; ?>').value = this.value;
                            searchStateContryForPanelBlank('<?php echo $divId; ?>');
                            document.getElementById('<?php echo $inputId; ?>').focus();
                        }"
            onclick="document.getElementById('<?php echo $inputId; ?>').value = this.value;
                        searchStateContryForPanelBlank('<?php echo $divId; ?>');
                        document.getElementById('<?php echo $inputId; ?>').focus();"
            multiple="multiple" size="8">
                <?php
                while ($rowSelStateCountry = mysqli_fetch_array($resSelStateCountry, MYSQLI_ASSOC)) {
                    if ($inputId == 'custCountryForAddGirvi') {
                        echo "<OPTION  VALUE=" . "\"{$rowSelStateCountry['country_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$rowSelStateCountry['country_name']}</OPTION>";
                    } else if ($inputId == 'custStateForAddGirvi') {
                        echo "<OPTION  VALUE=" . "\"{$rowSelStateCountry['state_name']}\"" . " class=" . "\"content-mess-maron\"" . " >{$rowSelStateCountry['state_name']}</OPTION>";
                    }
                }
                ?>
    </SELECT>
<?php } ?>