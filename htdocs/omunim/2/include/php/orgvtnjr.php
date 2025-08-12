<?php

/*
 * **************************************************************************************
 * @tutorial: girvi transfer journal
 * **************************************************************************************
 * 
 * Created on May 23, 2014 5:32:51 PM
 *
 * @FileName: orgvtnjr.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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

$qSelAllTransGirvi = "SELECT * FROM girvi_transfer where gtrans_own_id='$_SESSION[sessionOwnerId]' "
        . "and gtrans_upd_sts IN ('New','Updated','Released','Transferred') and "
        . "gtrans_trans_type NOT IN ('Linked') OR gtrans_trans_type IS NULL";

$resAllTransGirvi = mysqli_query($conn,$qSelAllTransGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllTransGirvi);
while ($rowAllTransGirvi = mysqli_fetch_array($resAllTransGirvi, MYSQLI_ASSOC)) {
    $girviOwnerId = $_SESSION[sessionOwnerId];
    $girviTransferPayAcnt = $rowAllTransGirvi['gtrans_acc_id'];
    $girviTransCrAccId = $rowAllTransGirvi['gtrans_cr_acc_id'];
    $custId = $rowAllTransGirvi['gtrans_cust_id'];
    $girviTransGriviId = $rowAllTransGirvi['gtrans_id'];
    $girviTransferFirmId = $rowAllTransGirvi['gtrans_firm_id'];
    $principalAmount = $rowAllTransGirvi['gtrans_prin_amt'];
    $girviTransDOB = $rowAllTransGirvi['gtrans_DOB'];
    $girviTransDOB = om_strtoupper(date("d M Y", strtotime($girviTransDOB)));
    $girviUpdSts = $rowAllTransGirvi['gtrans_upd_sts'];

    $gtransId = $girviTransGriviId;
    $firmId = $girviTransferFirmId;
    $girviDOR = $rowAllTransGirvi['gtrans_DOR'];
    $girviDOR = om_strtoupper(date("d M Y", strtotime($girviDOR)));
    $girviLoanAccId = $rowAllTransGirvi['gtrans_loan_acc_id'];
    $girviCashAccId = $rowAllTransGirvi['gtrans_cash_acc_id'];
    $amountPaid = $rowAllTransGirvi['gtrans_paid_amt'];
    $totAmount = $rowAllTransGirvi['gtrans_total_amt'];
    $girviIntAccId = $rowAllTransGirvi['gtrans_int_rec_acc_id'];
    $interestPaid = $rowAllTransGirvi['gtrans_paid_int'];
    $girviDiscAccId = $rowAllTransGirvi['gtrans_disc_acc_id'];
    $discountPaid = $rowAllTransGirvi['gtrans_discount_amt'];
    $loanType = $rowAllTransGirvi['gtrans_prin_typ'];

    if ($loanType == 'LoanAddPrinTrans') {
        $jrnlPanel = 'LoanAddPrinTrans';
    }

    include 'orgtjrnl.php';
}
?>