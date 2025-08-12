<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 5 Dec, 2019 2:43:30 PM
 *
 * @FileName: omSchemePrdTyp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
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
$panelName = $_GET['panelName'];
$kitty_scheme_prd_typ = $_GET['schemePrdTyp'];
$staffId = $_SESSION['sessionStaffId'];
//echo '$panelName:'.$panelName.'<br/>';
//echo '$staffId:'.$staffId.'<br/>';
//echo '$kitty_scheme_prd_typ:'.$kitty_scheme_prd_typ;
?>
<?php
$selSchemeType = $kitty_scheme_prd_typ;

switch ($selSchemeType) {
    case "MONTH":
        $selSchemeType1 = "selected";
        break;
    case "DAY":
        $selSchemeType2 = "selected";
        break;
}
?> 
<SELECT class="border-no inputBox14CalibriReqCenter" id="addSchemePrdTyp" name="addSchemePrdTyp" placeholder="SCHEME TYPE"
        onchange="edateChange();
                return false;"
        onkeydown="javascript: if (event.keyCode == 13) {
                    document.getElementById('kittyMetalType').focus();
                    return false;
                } else if (event.keyCode == 8) {
                    document.getElementById('kittyNoOfDays').focus();
                    return false;
                }" <?php if ($staffId || $panelName == 'UpdateKitty') { ?>disabled="disabled"<?php } ?>>
            <?php if ($selSchemeType1 != '' && $selSchemeType1 != NULL) { ?>
        <OPTION value="MONTH" <?php echo $selSchemeType1; ?>>MONTH</OPTION>
    <?php } else { ?>
        <OPTION value="MONTH" >MONTH</OPTION>
    <?php } if ($selSchemeType2 != '' && $selSchemeType2 != NULL) { ?>
        <OPTION value="DAY" <?php echo $selSchemeType2; ?>>DAY</OPTION>
    <?php } else { ?>
        <OPTION value="DAY" >DAY</OPTION>
    <?php } ?>
</SELECT>
<?php if ($staffId || $panelName == 'UpdateKitty') { ?>
    <input type="hidden" id="addSchemePrdTyp" name="addSchemePrdTyp" value="<?php echo $selSchemeType; ?>"/>
<?php } ?>