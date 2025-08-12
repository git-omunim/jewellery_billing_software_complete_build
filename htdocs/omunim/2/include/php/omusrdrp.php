<?php
/*
 * **************************************************************************************
 * @tutorial: SHOW ALL ADDED SCHEME USER GROUP IN DROPDOWN LIST @PRIYANKA-07SEP2019
 * **************************************************************************************
 * 
 * Created on 07 SEP, 2019 12:35:03 PM
 *
 * @FileName: omusrdrp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName:OMUNIM
 * @version 2.6.104
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:@PRIYANKA-07SEP2019
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
//
$kitty_scheme = $_REQUEST['kitty_scheme'];
$kitty_group = $_REQUEST['kitty_group'];
//
//
$qSelScheme = "SELECT * FROM kitty WHERE kitty_own_id = '$_SESSION[sessionOwnerId]' "
            . "AND kitty_upd_sts = 'Planned Scheme' "
            . "AND kitty_group LIKE '$kitty_group%' GROUP BY kitty_group ";
//
$resScheme = mysqli_query($conn,$qSelScheme);
$totalScheme = mysqli_num_rows($resScheme);
//
if ($totalScheme > 0) {
    ?>
    <SELECT class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF cityListDivToAddNewCustSelect" 
            id="schemeGroupForKitty" name="schemeGroupForKitty" 
            onkeydown="if (event.keyCode == 13) {
                           document.getElementById('kittyGroup').value = this.value;    
                           getAllDetailsOfScheme('<?php echo $kitty_scheme ?>', this.value);
                           document.getElementById('kittyNoOfEmi').focus();
                           searchSchemeForUserBlank('');
                       }"
            onkeyup="if (event.keyCode == 13) {
                           document.getElementById('kittyGroup').value = this.value;    
                           getAllDetailsOfScheme('<?php echo $kitty_scheme ?>', this.value);
                           document.getElementById('kittyNoOfEmi').focus();
                           searchSchemeForUserBlank('');
                    }"           
            onclick="document.getElementById('kittyGroup').value = this.value;
                     getAllDetailsOfScheme('<?php echo $kitty_scheme ?>', this.value);
                     document.getElementById('kittyNoOfEmi').focus();
                     searchSchemeForUserBlank('');"
            onchange="getAllDetailsOfScheme('<?php echo $kitty_scheme ?>', this.value);"
            onblur="getAllDetailsOfScheme('<?php echo $kitty_scheme ?>', this.value);"
            multiple="multiple" size="5">
                <?php
                while ($row = mysqli_fetch_array($resScheme, MYSQLI_ASSOC)) {
                       echo "<OPTION  VALUE=" . "\"{$row['kitty_group']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['kitty_group']}</OPTION>";
                }
                ?>
    </select>
<?php } ?>
