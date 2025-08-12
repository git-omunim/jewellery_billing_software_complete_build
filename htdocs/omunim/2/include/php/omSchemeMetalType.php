<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 5 Dec, 2019 2:53:35 PM
 *
 * @FileName: omSchemeMetalType.php
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
$kittyMetalType = $_GET['schemeMetalType'];
$staffId = $_SESSION['sessionStaffId'];
?>
<select name="kittyMetalType" id="kittyMetalType" style="width:100%;height:30px;" onkeydown="javascript: if (event.keyCode == 13) {
            document.getElementById('DOBDay').focus();
            return false;
        } else if (event.keyCode == 8) {
            document.getElementById('addSchemePrdTyp').focus();
            return false;
        }" <?php if ($staffId || $panelName == 'UpdateKitty') { ?> disabled="true"<?php } ?>>
            <?php
            $itemGsType = array(CASH, GOLD, SILVER);
            if ($panelName == 'UpdateKitty') {
                for ($i = 0; $i <= 2; $i++) {
                    if ($itemGsType[$i] == $kittyMetalType)
                        $optionGsTypeSel[$i] = 'selected';
                }
            } else {
                if ($kittyMetalType != '') {
                    for ($i = 0; $i <= 2; $i++) {
                        if ($itemGsType[$i] == $kittyMetalType)
                            $optionGsTypeSel[$i] = 'selected';
                    }
                } else {
                    $optionGsTypeSel[0] = 'selected';
                }
            }
            ?>
    <option value="CASH" <?php echo $optionGsTypeSel[0]; ?>>CASH</option>
    <option value="GOLD" <?php echo $optionGsTypeSel[1]; ?>>GOLD</option>
    <option value="SILVER" <?php echo $optionGsTypeSel[2]; ?>>SILVER</option>
</select>
<?php if ($staffId || $panelName == 'UpdateKitty') { ?>
    <input type="hidden" name="kittyMetalType" id="kittyMetalType" value="<?php echo $kittyMetalType; ?>"/>
<?php } ?>