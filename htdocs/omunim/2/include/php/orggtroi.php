<?php
/*
 * **************************************************************************************
 * @tutorial: Display TROI options
 * **************************************************************************************
 *
 * Created on Mar 17, 2013 4:26:02 PM
 *
 * @FileName: orggtroi.php
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
?>
<div id="ROIMonthlyAdd" style="visibility: visible;">
    <table border="0" cellpadding="2" cellspacing="1">
        <tr align="left">
            <td align="left" valign="bottom">
                <h5>
                    <?php
//                    $qSelectROI = "SELECT troi_id,troi_value,tiroi_value,troi_default FROM troi where troi_type='Monthly'"; //To display data in this form
//                    $resultROI = mysqli_query($conn,$qSelectROI) or die("Error: " . mysqli_error($conn) . " with query " . $qSelectROI);
//                    while ($rowROI = mysqli_fetch_array($resultROI, MYSQLI_ASSOC)) {
//                        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
//                            
                    ?>
                    <!--                    <INPUT id="selTROI" TYPE="RADIO" NAME="selTROI" class="lgn-field-without-order" 
                                               VALUE="//<?php echo "{$rowROI['troi_id']}"; ?>" <?php echo "{$rowROI['troi_default']}"; ?> /><?php echo "{$rowROI['tiroi_value']}"; ?> %&nbsp;-->
                    <?php
//                               } else {
//                                   
                    ?>
                    <!--                    <INPUT id="selTROI" TYPE="RADIO" NAME="selTROI" class="lgn-field-without-order" 
                                               VALUE="//<?php echo "{$rowROI['troi_id']}"; ?>" <?php echo "{$rowROI['troi_default']}"; ?> /><?php echo "{$rowROI['troi_value']}"; ?> %&nbsp;-->
                    <?php
//                               }
//                           }
//                           
                    $qSelectROI = "SELECT troi_id,troi_value,tiroi_value,troi_default FROM roi where roi_type='Annually' and roi_value = '$ROIVal'"; //To display data in this form
                    $resultROI = mysqli_query($conn,$qSelectROI);
                    $totalROI = mysqli_num_rows($resultROI);
                    if ($totalROI == 0) {
                        $qSelectROI = "SELECT troi_id,troi_value,tiroi_value,troi_default FROM roi where roi_type='Annually' and roi_default = 'checked'"; //To display data in this form
                        $resultROI = mysqli_query($conn,$qSelectROI);
                        $rowROI = mysqli_fetch_array($resultROI);
                        $TROIVal = $rowROI['troi_value'];
                    }
                    ?>
                    <INPUT id="selTROI" type = "text" NAME="selTROI"  value="<?php echo $ROIVal; ?>%"
                           onkeyup = " if(event.keyCode == 8 && this.value == ''){searchRoiForPanelBlank(); return false;}
                               if(event.keyCode != 9 && event.keyCode != 13){searchTROI(document.getElementById('selTROI').value,'<?php echo $roiOption; ?>','<?php echo $girviId; ?>','<?php echo $custId; ?>','<?php echo $panelName; ?>',event.keyCode);}"
                           onclick = "this.value=''; searchTRoiForPanelBlank();"
                           autocomplete = "off"
                           spellcheck = "false" class = "lgn-txtfield12black-without-borderAndBackground" size = "3" maxlength = "80" />
                    <div id = "tRoiListDivToAddROI" class = "itemListDivToAddStock"></div>
                </h5>
            </td>
        </tr>
    </table>
</div>