<?php
/*
 * **************************************************************************************
 * @tutorial: Raw Metal Payment Firm
 * **************************************************************************************
 * 
 * Created on AUG 23, 2017 3:27:59 PM
 *
 * @FileName: omrwpyfr.php
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
require_once 'system/omssopin.php';

//***********************************************************************************************
//*********************** INPUT PARAMETERS ******************************************************
//***********************************************************************************************
//                            => $selPayFirmId                 => SELL/TRANSACTION FIRM ID
//                            => $nextFieldId                  => FIRM ID OF PREV/FIRST METAL
//                            => $prevFieldId                  => METAL TYPE OF PREV/FIRST METAL
//                            => $metalCount                   => RAW METAL COUNT
//                            => $prefix                       => PREFIX FOR TRANSACTION
//                            => $panelName                    => PANEL NAME
//                            => $_SESSION['sessionIgenType']  => STORE PASSWORD TYPE(PUBLIC/SELF)
//                            => $globalOwnIPass               => INTELIGENT PASSWORD
//                            => $sessionFirmStr               => STRING CONDITION TO FETCH FIRM
//                            => $globalOwnPass                => ORDNIARY PASSWORD
//                            => $qSelPerFirm                  => QUERY TO FETCH FIRM ID
//                            => $resPerFirm                   => RESULT OF FIRM ID QUERY
//                            => $rowPerFirm                   => WHILE LOOP OF FIRM RESULT
//                            => $conn                         => DATABASE CONNECTION VARIABLE
//                            => $firmIdSelected               => CHECK WHETHER FIRM SELECTED OR NOT
//                            => $rowPerFirm['firm_id']        => FIRM ID
//                            => $rowPerFirm['firm_name']      => FIRM NAME
//                            => $rowPerFirm['firm_TYPE']      => FIRM TYPE
//    
//***********************************************************************************************
//***********************END INPUT PARAMETERS ***************************************************
//***********************************************************************************************
//***********************************************************************************************
//*********************** INCLUDE FILES *********************************************************
//***********************************************************************************************
//
// 
// 
//***********************************************************************************************
//***********************END INCLUDE FILES ******************************************************
//***********************************************************************************************
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr align="center">
        <td align="center" class="frm-lbl">
            <SELECT class="input_border_red" id="<?php echo $selPayFirmId; ?>" name="<?php echo $selPayFirmId; ?>" 
                    onkeydown="javascript: if (event.keyCode == 13) {
                                document.getElementById('<?php echo $nextFieldId; ?>').focus();
                                return false;
                            }
                            else if (event.keyCode == 8) {
                                document.getElementById('<?php echo $prevFieldId; ?>').focus();
                                return false;
                            }"
                                                        style="width:100%;height:40px;"
                    onchange="getFirmRawAccNo(this.value, '<?php echo $metalCount; ?>', '<?php echo $prefix; ?>', '<?php echo $panelName; ?>',
                                    document.getElementById('<?php echo $prefix . 'PayMetalType1' . $metalCount; ?>').value, '<?php echo $nextFieldId; ?>');">
                <OPTION  VALUE="NotSelected">Firm</OPTION>
                <?php
                if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                    $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                } else if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                    $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                }
                $resPerFirm = mysqli_query($conn,$qSelPerFirm);
                while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
                    if (($rowPerFirm['firm_id']) == intval($firmIdSelected)) {
                        $firmSelected = "selected";
                    }
                    if ($rowPerFirm['firm_type'] == "Public") {
                        echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                    } else {
                        echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                    }
                    $firmSelected = "";
                }
                ?>
            </SELECT>
        </td>
    </tr>
</table>