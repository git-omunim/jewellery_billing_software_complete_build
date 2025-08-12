<?php
/*
 * **************************************************************************************
 * @tutorial: List all the primary accounts of given account name for udhaar intrest option
 * **************************************************************************************
 *
 * Created on 22 oct, 2020 12:36:58 PM
 *
 * @FileName: omuacsalt.php
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
?>
<?php
require_once 'system/omssopin.php';
$accSelectedDone = FALSE;
?>
<?php
if ($accAccess == 'NO') { // give access depending on staff @AUTHOR: SANDY16AUG13   
//
    // ADDING CONDITION FOR MULTIPLE ITEMS IN ONE SAME INVOICE @PRIYANKA-28MAR18 
    ?>
    <SELECT class="<?php echo $selAccountClass; ?>" style="height:30px;"
    <?php if ($selAccountStyle != '' && $selAccountStyle != NULL) { ?>
                style="<?php echo $selAccountStyle; ?>" 
            <?php } ?>
            id="<?php echo $selAccountId; ?>" name="<?php echo $selAccountId; ?>"  
            <?php if ($staffId != '' && $changeAcntTypeAccess == 'false') { //give access depending on staff @AUTHOR: SANDY8AUG13                       ?> disabled="true" <?php } ?>
            onkeydown="javascript: if (event.keyCode == 13) {
                            document.getElementById('<?php echo $nextFieldId; ?>').focus();
                            return false;
                        } else if (event.keyCode == 8) {
                            document.getElementById('<?php echo $prevFieldId; ?>').focus();
                            return false;
                        }"
            size="1" disabled="disabled"> 
                <?php
                if ($selMainAccName != NULL) {
                    if ($selFirmId != NULL) {
                        $qSelAccount = "SELECT acc_id,acc_user_acc FROM accounts 
                where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc IN ($selMainAccName) 
                    and acc_firm_id='$selFirmId' order by acc_user_acc asc";
                    } else {
                        $qSelAccount = "SELECT acc_id,acc_user_acc FROM accounts 
                where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc IN ($selMainAccName) order by acc_user_acc asc";
                    }
                } else {
                    if ($selFirmId != NULL) {
                        $qSelAccount = "SELECT acc_id,acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_pri_grp IN ($selAccountName) and acc_firm_id IN ($selFirmId) order by acc_user_acc asc";
                    } else {
                        $qSelAccount = "SELECT acc_id,acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_pri_grp IN ($selAccountName) order by acc_user_acc asc";
                    }
                }
                $resAccounts = mysqli_query($conn, $qSelAccount);
                while ($rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC)) {
                    if ($rowAccounts['acc_user_acc'] == "$accNameSelected" && $accSelectedDone == FALSE && ($accIdSelected == NULL || $accIdSelected == '')) {
                       $accSelected = "selected";
                        $accSelectedDone = TRUE;
                        $accIdSelectedByName = $rowAccounts['acc_id']; // ADDED FOR HIDDEN FIELD @AUTHOR:SHRI17DEC19
                    }
                    if ($rowAccounts['acc_id'] == $accIdSelected && ($accSelectedDone == FALSE)) {
                        $accSelected = "selected";
                        $accSelectedDone = TRUE;
                    }
                    if ($gbLanguage == 'English')
                        $userAccName = om_strtoupper($rowAccounts['acc_user_acc']);
                    else
                        $userAccName = $rowAccounts['acc_user_acc'];
                   
                    echo "<OPTION  VALUE=" . "\"{$rowAccounts['acc_id']}\"" . " class=" . "\"content-mess-maron\"" . " $accSelected>$userAccName&nbsp;&nbsp;</OPTION>";
                    $accSelected = "";
                }
                ?>
    </SELECT><input  id="<?php echo $selAccountId; ?>" name="<?php echo $selAccountId; ?>" type="hidden" value="<?php echo $accIdSelectedByName; ?>"  />
    <?php
} else {
    ?>
    <SELECT class="<?php echo $selAccountClass; ?>"  style="height:30px;"
    <?php if ($selAccountStyle != '' && $selAccountStyle != NULL) { ?>
                style="<?php echo $selAccountStyle; ?>" 
            <?php } ?>
            id="<?php echo $selAccountId; ?>" name="<?php echo $selAccountId; ?>"  
            <?php if ($staffId != '' && $changeAcntTypeAccess == 'false') { //give access depending on staff @AUTHOR: SANDY8AUG13                      ?> disabled="true" <?php } ?>
            onkeydown="javascript: if (event.keyCode == 13) {
                            document.getElementById('<?php echo $nextFieldId; ?>').focus();
                            return false;
                        } else if (event.keyCode == 8) {
                            document.getElementById('<?php echo $prevFieldId; ?>').focus();
                            return false;
                        }" size="1"> 
                <?php
                if ($selMainAccName != NULL) {
                    if ($selFirmId != NULL) {
                        $qSelAccount = "SELECT acc_id,acc_user_acc FROM accounts 
                where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc IN ($selMainAccName) 
                    and acc_firm_id='$selFirmId' order by acc_user_acc asc";
                    } else {
                        $qSelAccount = "SELECT acc_id,acc_user_acc FROM accounts 
                where acc_own_id='$_SESSION[sessionOwnerId]' and acc_main_acc IN ($selMainAccName) order by acc_user_acc asc";
                    }
                } else {
                    if ($selFirmId != NULL) {
                        $qSelAccount = "SELECT acc_id,acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_pri_grp IN ($selAccountName) and acc_firm_id IN ($selFirmId) order by acc_user_acc asc";
                    } else {
                        $qSelAccount = "SELECT acc_id,acc_user_acc FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_pri_grp IN ($selAccountName) order by acc_user_acc asc";
                    }
                }

                //START CODE TO ADD OPTION OF SELECT ACCOUNT,@AUTHOR:22OCT2020
                if($selAccountId == 'udhaarDepDiscPaidAccId' && ($accIdSelected == null || $accIdSelected == '')){
                        echo "<OPTION  VALUE=" . "\"{}\"" . " class=" . "\"content-mess-maron\"" . " $accSelected>SELECT ACCOUNT&nbsp;&nbsp;</OPTION>";
                    $accSelected = "selected";
                }
                //END CODE TO ADD OPTION OF SELECT ACCOUNT,@AUTHOR:HEMA-22OCT2020
                $resAccounts = mysqli_query($conn, $qSelAccount);
                while ($rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC)) {
                    if ($rowAccounts['acc_user_acc'] == "$accNameSelected" && $accSelectedDone == FALSE && ($accIdSelected == NULL || $accIdSelected == '')) {
                        $accSelected = "selected";
                        $accSelectedDone = TRUE;
                    }
                    if ($rowAccounts['acc_id'] == $accIdSelected && $accSelectedDone == FALSE) {
                        $accSelected = "selected";
                        $accSelectedDone = TRUE;
                    }
                    //
                    if ($gbLanguage == 'English')
                        $userAccName = om_strtoupper($rowAccounts['acc_user_acc']);
                    else
                        $userAccName = $rowAccounts['acc_user_acc'];
                    echo "<OPTION  VALUE=" . "\"{$rowAccounts['acc_id']}\"" . " class=" . "\"content-mess-maron\"" . " $accSelected>$userAccName&nbsp;&nbsp;</OPTION>";
                    $accSelected = "";
                }
                ?>
    </SELECT>
<?php } ?>

