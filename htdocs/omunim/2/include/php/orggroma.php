<?php
/*
 * Created on Mar 20, 2011 12:46:15 AM
 *
 * @FileName: orggroma.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: Modified by @Author: KHUSH25JAN13
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

if ($roiPanelName == NULL || $roiPanelName == '')
    $roiPanelName = $_POST['panelName'];
if ($roiPanelName == NULL || $roiPanelName == '')
    $roiPanelName = $_GET['panelName'];
?>
<div id="ROIMonthlyAdd" style="visibility: visible;" >
    <table border="0" cellpadding="2" cellspacing="1">
        <tr align="left">
            <td align="left" valign="bottom">
                <h5>
                    <?php
                    $qSelectROI = "SELECT troi_id,troi_value,tiroi_value,troi_default FROM roi where troi_type='Monthly' and troi_value = '$ROIVal'"; //To display data in this form
                    $resultROI = mysqli_query($conn,$qSelectROI);
                    $totalROI = mysqli_num_rows($resultROI);
                    if ($totalROI == 0) {
                        $qSelectROI = "SELECT troi_id,troi_value,tiroi_value,troi_default FROM roi where troi_type='Monthly' and troi_default = 'checked'"; //To display data in this form
                        $resultROI = mysqli_query($conn,$qSelectROI);
                        $rowROI = mysqli_fetch_array($resultROI);
                        $TROIVal = $rowROI['troi_value'];
                    }
                    ?>
                    <INPUT id="selTROI" type = "text" NAME="selTROI"  value="<?php echo $ROIVal; ?>%"
                           onkeyup = " if(event.keyCode == 8 && this.value == ''){searchRoiForPanelBlank(); return false;}
                               if(event.keyCode != 9 && event.keyCode != 13){searchTROI(document.getElementById('selTROI').value,'<?php echo $roiOption; ?>','<?php echo $girviId; ?>','<?php echo $custId; ?>','<?php echo $omPanelDiv; ?>',event.keyCode);}"
                           onclick = "this.value=''; searchTRoiForPanelBlank();"
                           autocomplete = "off"
                           spellcheck = "false" class = "lgn-txtfield12black-without-borderAndBackground" size = "3" maxlength = "80" />
                    <div id = "tRoiListDivToAddROI" class = "itemListDivToAddStock"></div>
                </h5>
            </td>
        </tr>
    </table>
</div>