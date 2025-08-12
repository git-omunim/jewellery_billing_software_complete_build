<?php
/*
 * **************************************************************************************
 * @tutorial: Transfer Girvi Status List
 * **************************************************************************************
 * 
 * Created on Jul 20, 2013 1:11:21 PM
 *
 * @FileName: orgptgst.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
?>
<?php
require_once 'system/omssopin.php';
?>
<!--------Start code to change class @Author:PRIYA29OCT13 ------------------>
<table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
    <tr align="left">
        <td align="left"><!-- changes in CLASS OF select field @AUTHOR: SANDY29DEC13 -->
            <SELECT class="lgn-txtfield-without-borderAndBackground13-Arial" id="gTransStatusList" name="gTransStatusList"
                    onchange="getGTransStatus(this,'<?php echo $sortKeyword; ?>','<?php echo $searchColumnName; ?>','<?php echo $searchColumnValue; ?>','<?php echo $selTFirmId; ?>','<?php echo $selMlName; ?>');">
                <OPTION  VALUE="">ST</OPTION>
                <?php
                $qSelGTransStatus = "SELECT DISTINCT gtrans_upd_sts FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' order by gtrans_ent_dat desc";
                $resGTransStatus = mysqli_query($conn,$qSelGTransStatus);
                while ($rowGTransStatus = mysqli_fetch_array($resGTransStatus, MYSQLI_ASSOC)) {
                    if ($rowGTransStatus['gtrans_upd_sts'] == 'Transferred') {
                        $status = 'ACT';
                        $statusDisplay = 'AC';
                    } else if ($rowGTransStatus['gtrans_upd_sts'] == 'Released') {
                        $status = 'REL';
                        $statusDisplay = 'RE';
                    }
                    if ($status == $gTransStatSelected) {
                        $statusSelected = "selected";
                    }
                    echo "<OPTION  VALUE=" . "\"{$status}\"" . " class=" . "\"frm-lbl\"" . " $statusSelected>{$statusDisplay}</OPTION>";
                    $statusSelected = "";
                }
                ?>
            </SELECT>
        </td>
        <td>
            <?php if ($gTransStatSelected != NULL && $gTransStatSelected != 'NotSelected') { ?> 
                <img src="<?php echo $documentRoot; ?>/images/arrow10x13.png" alt="" align="right"/>
            <?php } ?>
        </td>
    </tr>
</table>
<!--------End code to change class @Author:PRIYA29OCT13 ------------------>