<?php
/*
 * **************************************************************************************
 * @Description: Loan No List @AUTHOR: SANDY14NOV13 
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
//change in file @AUTHOR: SANDY06JAN14
require_once 'system/omssopin.php';
$keyCode = $_GET['keyCode'];
$id = $_GET['id'];
$panel = $_GET['panel'];
$loanId = $_GET['loanNo'];
$trLoansStr = $_GET['trLoansStr']; //string of already transferred loans
$loanPreId = preg_replace("/[^a-zA-Z]+/", "", $loanId);
$loanPostId = preg_replace("/[^0-9]+/", "", $loanId);
?>
<SELECT class="loanNoListDiv" id="mlLoanNoListDiv" name="mlLoanNoListDiv" 
        <?php if ($panel == 'Update') { ?>
            onkeypress="if (event.keyCode == 13) {
                    var str = this.value;
                    if(str!=''){
                        var girvId= str.substr(0, str.indexOf('#'));
                        document.getElementById('addLoanNo1').value = str.substr(0, str.indexOf('#'));
                        clearListDiv('addLoanNoList1','addLoanNo1');
                        getDetailsOfSelectedLoan(str.substr(0, str.indexOf('#')),'1','Update');
                    }
                }"
            onclick="   var str = this.value;
                if(str!=''){
                    var girvId= str.substr(0, str.indexOf('#'));
                    document.getElementById('addLoanNo1').value = str.substr(0, str.indexOf('#'));
                    clearListDiv('addLoanNoList1','addLoanNo1');
                    getDetailsOfSelectedLoan(str.substr(0, str.indexOf('#')),'1','Update');
                }"
        <?php } else { ?> 
            onkeypress="if (event.keyCode == 13) {
                var str = this.value;
                if(str!=''){
                    var girvId= str.substr(0, str.indexOf('#'));
                    document.getElementById('mlLoanNo<?php echo $id; ?>').value = str.substr(0, str.indexOf('#'));
                    clearListDiv('mlLoanNoList<?php echo $id; ?>','mlLoanNo<?php echo $id; ?>');
                    getDetailsOfSelectedLoan(str.substr(0, str.indexOf('#')),'<?php echo $id; ?>','');
                } }"
            onclick="var str = this.value;
            if(str!=''){
                var girvId= str.substr(0, str.indexOf('#'));
                document.getElementById('mlLoanNo<?php echo $id; ?>').value = str.substr(0, str.indexOf('#'));
                clearListDiv('mlLoanNoList<?php echo $id; ?>','mlLoanNo<?php echo $id; ?>');
                getDetailsOfSelectedLoan(str.substr(0, str.indexOf('#')),'<?php echo $id; ?>','');
            }
            "
        <?php } ?>
        multiple="multiple"  size="7" maxlength="15">
    <!----Start of changes in queries @AUTHOR: SANDY22JAN14------->
    <?php
    if ($loanPreId != '') {
        $qSelLoan = "SELECT * FROM girvi WHERE girv_own_id='$_SESSION[sessionOwnerId]' and (girv_transfer_id IS null or girv_transfer_id =0) and girv_pre_serial_num LIKE '$loanPreId%' and girv_upd_sts NOT IN ('Released','Auctioned') order by girv_ent_dat desc";
    } else if ($loanPostId != '') {
        $qSelLoan = "SELECT * FROM girvi WHERE girv_own_id='$_SESSION[sessionOwnerId]' and (girv_transfer_id IS null or girv_transfer_id =0) and girv_serial_num LIKE '$loanPostId%' and girv_upd_sts NOT IN ('Released','Auctioned') order by girv_ent_dat desc";
    } else {
        $qSelLoan = "SELECT * FROM girvi WHERE girv_own_id='$_SESSION[sessionOwnerId]' and (girv_transfer_id IS null or girv_transfer_id =0) and girv_upd_sts NOT IN ('Released','Auctioned') order by girv_ent_dat desc";//Auctioned status added @Author:PRIYA10APR15
    }

    $resLoan = mysqli_query($conn,$qSelLoan);
    while ($rowLoan = mysqli_fetch_array($resLoan, MYSQLI_ASSOC)) {
        if (($rowLoan['girv_pre_serial_num'] == $loanPreId) && ($rowLoan['girv_serial_num'] == $loanPostId)) {
            $loanIdSelected = "selected";
        }
        $girviNo = $rowLoan['girv_pre_serial_num'] . $rowLoan['girv_serial_num'];
        
        if (!strstr($trLoansStr, $girviNo)) { //change in condition @AUTHOR: SANDY13DEC13
            echo "<OPTION  VALUE=" . "\"{$girviNo}#$customer*$principle%$roi@$firmName\"" . " class=" . "\"content-mess-blue\"" . "  $loanIdSelected >{$girviNo}</OPTION>";
        }
        $loanIdSelected = "";
    }
    ?>
    <!----End of changes in queries @AUTHOR: SANDY27NOV13------->
</SELECT>

