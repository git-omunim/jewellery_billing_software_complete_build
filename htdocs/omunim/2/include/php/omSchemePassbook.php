<?php
/*
 * **************************************************************************************
 * @tutorial: SCHEME PASSBOOK @PRIYANKA-27AUG2019
 * **************************************************************************************
 * 
 * Created on AUG 27, 2019
 *
 * @FileName: omSchemePassbook.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.6.104
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
include_once 'ommpfndv.php';
include_once 'ommpcmfc.php';
include_once 'ommpcmfcc.php';
?>
<?php
//custId=" + custId + "&firmId=" + firmId + "&kittyId=" + kittyId
//
if ($ownerId == '' || $ownerId == NULL) {
    $ownerId = $_SESSION['sessionOwnerId'];
}
//
if ($kittyCustId == '' || $kittyCustId == NULL) {
    $kittyCustId = $_REQUEST['custId'];
}
//
if ($kittyFirmId == '' || $kittyFirmId == NULL) {
    $kittyFirmId = $_REQUEST['firmId'];
}
//
if ($kittyId == '' || $kittyId == NULL) {
    $kittyId = $_REQUEST['kittyId'];
}
//
$qSelKittyId = "SELECT * FROM kitty WHERE kitty_own_id = '$_SESSION[sessionOwnerId]' "
        . "AND kitty_cust_id = '$kittyCustId' "
        . "AND kitty_id = '$kittyId' and kitty_upd_sts IN ('New','Updated','Released')";
//
$resQuery = mysqli_query($conn, $qSelKittyId);
//
while ($rowKittyId = mysqli_fetch_array($resQuery)) {
    //
    $kittyId = $rowKittyId['kitty_id'];
    $kittyScheme = $rowKittyId['kitty_scheme'];
    $kittyGroup = $rowKittyId['kitty_group'];
    $kittyGiftItem = $rowKittyId['kitty_gift_item'];
    $kitty_gift_item_del_sts = $rowKittyId['kitty_gift_item_del_sts'];
    $kittyDOB = $rowKittyId['kitty_DOB'];
    $kittyDOB = om_strtoupper(($kittyDOB));
    $kittyEndDOB = $rowKittyId['kitty_end_DOB'];
    $kittyEndDOB = om_strtoupper(($kittyEndDOB));
    $kittyFirmId = $rowKittyId['kitty_firm_id'];
    $kittyNoOfDays = $rowKittyId['kitty_EMI_days'];
    $kittyNoOfEmi = $rowKittyId['kitty_EMI_occurrences'];
    $kittyScNoDayPrd = $rowKittyId['kitty_scheme_prd_typ'];
    $kittyMainAmount = $rowKittyId['kitty_main_prin_amt'];
    $kittyOtherInfo = $rowKittyId['kitty_comm'];
    $kittyPayOtherInfo = $rowKittyId['kitty_pay_other_info'];
    $kittyDrAccId = $rowKittyId['kitty_dr_acc_id'];
    $kittyPreSerialNum = $rowKittyId['kitty_pre_serial_num'];
    $kittySerialNum = $rowKittyId['kitty_serial_num'];
    $kittyTokenNum = $rowKittyId['kitty_token_num'];
    $kittyEMIDays = $rowKittyId['kitty_EMI_days'];
    $kittyCustId = $rowKittyId['kitty_cust_id'];
    $firmId = $rowKittyId['kitty_firm_id'];
    $kittyJrnlId = $rowKittyId['kitty_jrnlid'];
    $kittyBonusAmt = $rowKittyId['kitty_bonus_amt'];
    $kittyEMIStatus = $rowKittyId['kitty_EMI_status'];
    $kittyEmiAmt = $rowKittyId['kitty_EMI_amt'];
    $kittyBonusAmt = $rowKittyId['kitty_bonus_amt'];
    $kitty_barcode = $rowKittyId['kitty_barcode'];
    $kittyMetalType = $rowKittyId['kitty_metal_type'];
    $kittyStaffId = $rowKittyId['kitty_staff_id'];
    $kitty_upd_sts = $rowKittyId['kitty_upd_sts'];

    //echo '$kittyId == ' . $kittyId . '<br />';
    //echo '$kittyScheme == ' . $kittyScheme . '<br />';
    //echo '$kittyGroup == ' . $kittyGroup . '<br />';

    parse_str(getTableValues("SELECT * FROM user WHERE user_id = '$kittyCustId'"));
    $label_field_content = '';
    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = 'FirstPageTopMargin' and label_type = 'SchemeBook'"));
    $pageTopMargin = $label_field_content;
    if ($pageTopMargin == '') {
        $pageTopMargin = 0;
    }
    //
    $label_field_content = '';
    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = 'FirstPageLeftMargin' and label_type = 'SchemeBook'"));
    $pageLeftMargin = $label_field_content;
    if ($pageLeftMargin == '') {
        $pageLeftMargin = 0;
    }
    ?>

    <div id="schemePassbookDetails" class="main_middle" style="border-style: solid;border-width: medium;background:#fff;border-radius:5px!important;">
        <div id="girviPanelTrId" style="visibility:hidden"></div>
        <div class="main_middle_cust_list">
            <div id="schemeModel" class="closeFinePopUp noPrint">
                <a class="links" style="cursor: pointer;z-index:1;position: absolute;top: 40px;right: 10px;" onclick="closePassbook('schemePassbook');"><img src="<?php echo $documentRootBSlash; ?>/images/img/cancel.png" style="height:16px;"/></a>
            </div>
            <?php
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = 'passBookWidth' and label_type = 'SchemeBook'"));
            if ($label_field_content == '' || $label_field_content == 0) {
                $passBookWidth = 170;
            } else {
                $passBookWidth = $label_field_content;
            }
            ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:<?php echo $passBookWidth . 'mm'; ?>;table-layout:fixed;margin:auto;">
                <!--margin-top: <?php // echo $pageTopMargin . 'mm'; ?>;margin-left: <?php // echo $pageLeftMargin . 'mm'; ?>;-->
                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <div class="textLabelHeading" style="margin-bottom: 20px;margin-top: 2%;font-weight: bold;">
                            <br />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size:14px;">
                                        <b> SCHEME </b> 
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="25%">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php echo ' ' . $kittyScheme; ?>
                                    </div>
                                </td>
                                <td valign="middle" align="right" width="25%">
                                    <div style=" font-size: 14px;">
                                        <!--                                        ENCIRCLE ID  -->
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="25%">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        <?php // echo ' ' . $kittyTokenNum; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>ACCOUNT NO  </b>
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="25%">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php // echo ' ' . $user_bank_details;                    ?>
                                        <?php echo '' . $kitty_barcode; ?>
                                    </div>
                                </td>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>ENROLLMENT DATE </b> 
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="25%">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php echo ' ' . $kittyDOB; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>NAME  </b>
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="25%">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php echo strtoupper(' ' . $user_fname . ' ' . $user_lname); ?>
                                    </div>
                                </td>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>MATURITY DATE </b> 
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="25%">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php echo ' ' . strtoupper("$kittyEndDOB"); ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>ADDRESS </b> 
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="75%">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php echo ' ' . strtoupper($user_add); ?>
                                    </div>
                                    <div style="font-size: 14px;margin-left: 16px">
                                        <?php echo strtoupper($user_city . ' ' . $user_state); ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>TOKEN NO </b> 
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="75%" >
                                    <div style="font-size: 14px; margin-left: 10px" >
                                        : <?php echo ' ' . $kittyTokenNum; ?> 
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>CONTACT NO  </b>
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="75%" >
                                    <div style="font-size: 14px; margin-left: 10px" >
                                        : <?php echo ' ' . $user_mobile; ?> 
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>E-MAIL ID </b>
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="40%">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php echo ' ' . $user_email; ?>
                                    </div>
                                </td>
                                <td valign="middle" align="center" width="35%" colspan="2">
                                    <div class="block84LText9 element" id="tailbcBarcode" style="font-size: 14px;
                                         border:0px solid; cursor:pointer;width:auto;" >
                                        <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=SchemeBarcode&bar_id=<?php
                                        echo $kitty_barcode;
                                        ?>" alt="Barcode" height="12px" /><br>
                                             <?php echo $kitty_barcode; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
    <!--                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 12px;">
                                        NOMINEE FOR EXISTING CUSTOMER
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="75%" colspan="3">
                                    <div style="font-size: 12px;margin-left: 10px">
                                        : <?php
                $arrNomineeList = array();
                $arrNomineeList = explode('#', $user_nominee_cust_id);
                $nomineeName1 = $arrNomineeList[1];
                parse_str(getTableValues("SELECT user_fname as nomineeFname, user_lname as nomineeLname FROM user "
                                . "WHERE user_id = '$nomineeName1'"));
                echo ' ' . $nomineeFname . " " . $nomineeLname;
                ?>
                                        <br />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td> 
                
                </tr> -->
                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b> NOMINEE</b>
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="75%" colspan="3">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php echo $user_nominee_name; ?>
                                        <br />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>NOMINEE RELATION</b>
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="75%" colspan="3">
                                    <div style="font-size: 14px;margin-left: 10px">
                                        : <?php echo $user_rel_with_nominee; ?>
                                        <br />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
		<tr>
                    <td valign="middle" align="center" colspan="4">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="top" align="right" width="25%">
                                    <div style="font-size: 14px;">
                                        <b>TERMS AND CONDITION</b>
                                        <br />
                                    </div>
                                </td>
                                <td valign="middle" align="left" width="75%" colspan="3">                                    
                                    <?php
                                    $fieldName = 'tncPassbook';
                                    $labelType = 'SchemeBook';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    $tncPassbook = $label_field_content;
                                    $tnc_sizePassbook = $label_field_font_size;
                                    $noOfRows = substr_count($tnc, "\n") + 1;
                                    $height = $noOfRows * ($tnc_size * 2);
                                    if($tnc_sizePassbook=='' || $tnc_sizePassbook ==null){
                                        $tnc_sizePassbook = 12; 
                                     }
                                     if($label_field_check == 'true'){
                                    ?>
					<div style="font-size: 12px;margin-left: 10px;" onClick="this.contentEditable = 'true';">
						: <?php echo preg_replace('/\\\\/i', ' ', $tncPassbook); ?>
					</div>   
                                     <?php } ?>                                
				</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="4" >
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 10px;margin-bottom: 30px;">
                            <tr>
                                <td valign="middle" align="center" colspan="2" width="50%">
                                    <div  style="font-size: 14px;">
                                        <b>ACCOUNT HOLDER SIGNATURE :</b> <?php echo '_____________'; ?>
                                        <br />
                                    </div>
                                </td>

                                <td valign="middle" align="center" colspan="2" width="50%">
                                    <div style="font-size: 14px;">
                                        <b>MANAGER SIGNATURE :</b> <?php echo '_____________'; ?>
                                        <br />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" colspan="4">
                        <?php
                        /* START CODE TO ADD STYLE PARAMETER TO PRINT DIV FOR SCHEME PASSBOOK PRINT @AUTHOR:MADHUREE-19AUG2020 */
                        $divStyle = 'width:' . $passBookWidth . 'mm;table-layout:fixed;margin-top: ' . $pageTopMargin . 'mm;margin-left: ' . $pageLeftMarginmm;
                        /* START CODE TO ADD STYLE PARAMETER TO PRINT DIV FOR SCHEME PASSBOOK PRINT @AUTHOR:MADHUREE-19AUG2020 */
                        ?>
                        <input type="hidden" id="divStyle" name="divStyle" value="<?php echo $divStyle; ?>" />
                        <input id="printSchemePassbook" type="button" value="PRINT" 
                               onclick="printOmgoldPageDiv('schemePassbookDetails', '')"
                               class="frm-btn-without-border spaceleft20 noPrint" 
                               style="margin-top: 5px!important;margin-bottom: 22px;"
                               />
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
?>