<?php
/*
 * **************************************************************************************
 * @Description: Principal Sr No List  @AUTHOR: SANDY12DEC13
 * **************************************************************************************
 *
 * Created on 29 Dec, 2012 11:41:07 AM
 *
 * @FileName: orlnlist.php
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
//change in file @AUTHOR: SANDY06JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
$keyCode = $_GET['keyCode'];
$id = $_GET['id'];
$panel = $_GET['panel'];
$prinNo = $_GET['prinNo'];
$trPrinStr = $_GET['trPrinStr']; //string of already tranferred principal
$prinPreId = om_strtoupper(preg_replace("/[^a-zA-Z]+/", "", $prinNo));
$prinPostId = preg_replace("/[^0-9]+/", "", $prinNo);
?>
<SELECT class="loanNoListDiv" id="principalIdListDiv" name="principalIdListDiv" 
        <?php if ($panel == 'Update') { ?>
            onkeypress="if (event.keyCode == 13) {
                    var str = this.value;
                    if(str!=''){
                        var girvId= str.substr(0, str.indexOf('#'));
                        clearListDiv('addPrinNoList1','addPrinNo1');
                        getDetailsOfSelectedPrincipal(str.substr(0, str.indexOf('#')),'<?php echo $id; ?>','Update');
                        return false;
                    }
                }"
            onclick="var str = this.value;
                if(str!=''){
                    var girvId= str.substr(0, str.indexOf('#'));
                    clearListDiv('addPrinNoList1','addPrinNo1');
                    getDetailsOfSelectedPrincipal(str.substr(0, str.indexOf('#')),'<?php echo $id; ?>','Update');
                    return false;
                }"
        <?php } else { ?>
            onkeypress="if (event.keyCode == 13) {
                var str = this.value;
                if(str!=''){
                    var girvId= str.substr(0, str.indexOf('#'));
                    clearListDiv('principalIdList<?php echo $id; ?>','principalId<?php echo $id; ?>');
                    getDetailsOfSelectedPrincipal(str.substr(0, str.indexOf('#')),'<?php echo $id; ?>','');
                    return false;
                } 
            }"
            onclick="var str = this.value;
            if(str!=''){
                var girvId= str.substr(0, str.indexOf('#'));
                clearListDiv('principalIdList<?php echo $id; ?>','principalId<?php echo $id; ?>');
                getDetailsOfSelectedPrincipal(str.substr(0, str.indexOf('#')),'<?php echo $id; ?>','');
                return false;
            }
            "
        <?php } ?>
        multiple="multiple"  size="7" maxlength="15">
            <?php
            //change in query @AUTHOR: SANDY08FEB14
            if ($prinPreId != '') {
                $qSelLoan = "SELECT * FROM girvi_principal WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]'and girv_prin_pre_id LIKE '$prinPreId%' and  (girv_prin_transfer_id IS NULL or  girv_prin_transfer_id ='') and girv_prin_upd_sts!='Deleted' and girv_prin_upd_sts!='Released' order by girv_prin_ent_dat desc";
            } else if ($prinPostId != '') {
                $qSelLoan = "SELECT * FROM girvi_principal WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]' and girv_prin_post_id LIKE '$prinPostId%' and   (girv_prin_transfer_id IS NULL or  girv_prin_transfer_id ='') and girv_prin_upd_sts!='Deleted' and girv_prin_upd_sts!='Released' order by girv_prin_ent_dat desc";
            } else {
                $qSelLoan = "SELECT * FROM girvi_principal WHERE girv_prin_own_id='$_SESSION[sessionOwnerId]' and   (girv_prin_transfer_id IS NULL or  girv_prin_transfer_id ='') and girv_prin_upd_sts!='Deleted' and girv_prin_upd_sts!='Released' order by girv_prin_ent_dat desc";
            }
            $resLoan = mysqli_query($conn,$qSelLoan);
            while ($rowLoan = mysqli_fetch_array($resLoan, MYSQLI_ASSOC)) {
                if (($rowLoan['girv_prin_pre_id'] == $prinPreId) && ($rowLoan['girv_prin_post_id'] == $prinPostId)) {
                    $loanIdSelected = "selected";
                }
                $prinNo = $rowLoan['girv_prin_pre_id'] . $rowLoan['girv_prin_post_id'];

                if (!strchr($trPrinStr, $prinNo)) {
                    echo "<OPTION  VALUE=" . "\"{$prinNo}#$custName*$principle%$roi@$firmName\"" . " class=" . "\"content-mess-blue\"" . "  $loanIdSelected >{$prinNo}</OPTION>";
                }
                $loanIdSelected = "";
            }
            ?>
</SELECT>


