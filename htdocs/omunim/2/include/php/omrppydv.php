<?php

/*
 * **************************************************************************************
 * @tutorial: Repair Item Invoice Table
 * **************************************************************************************
 *
 * Created on Jan 6, 2013 10:32:52 AM
 *
 * @FileName: omrppydv.php
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
$query = "CREATE TABLE repair_item_inv (
inv_id                         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
inv_owner_id                   VARCHAR(16),
inv_jrnl_id                    INT,
inv_firm_id                    VARCHAR(16),
inv_supp_id                    VARCHAR(16),
inv_date                       VARCHAR(50),
inv_pre_invoice_no             VARCHAR(10),
inv_invoice_no                 VARCHAR(50),
inv_gd_frmid                   VARCHAR(16),
inv_sl_frmid                   VARCHAR(16),
inv_gd_accid                   VARCHAR(16),
inv_sl_accid                   VARCHAR(16),
inv_gd_gs_wgt                  VARCHAR(15),
inv_gd_gs_wgt_typ              VARCHAR(10),
inv_gd_nt_wgt                  VARCHAR(15),
inv_gd_nt_wgt_typ              VARCHAR(10),
inv_gd_fn_wgt                  VARCHAR(15),
inv_gd_fn_wgt_typ              VARCHAR(10),
inv_sl_gs_wgt                  VARCHAR(15),
inv_sl_gs_wgt_typ              VARCHAR(10),
inv_sl_nt_wgt                  VARCHAR(15),
inv_sl_nt_wgt_typ              VARCHAR(10),
inv_sl_fn_wgt                  VARCHAR(15),
inv_sl_fn_wgt_typ              VARCHAR(10),
inv_gd_rc_nt_wgt               VARCHAR(15),
inv_gd_rc_nt_wgt_typ           VARCHAR(10),
inv_sl_rc_nt_wgt               VARCHAR(15),
inv_sl_rc_nt_wgt_typ           VARCHAR(10),
inv_gd_rc_tunch                VARCHAR(15),
inv_sl_rc_tunch                VARCHAR(15),
inv_gd_rc_fn_wgt               VARCHAR(15),
inv_sl_rc_fn_wgt               VARCHAR(15),
inv_gd_rc_rate                 VARCHAR(15),
inv_sl_rc_rate                 VARCHAR(15),
inv_gd_rc_val                  VARCHAR(20),
inv_sl_rc_val                  VARCHAR(20),
inv_gd_wgt_bal                 VARCHAR(15),
inv_gd_wgt_bal_typ             VARCHAR(10),
inv_sl_wgt_bal                 VARCHAR(15),
inv_sl_wgt_bal_typ             VARCHAR(10),
inv_total_amt                  VARCHAR(20),
inv_tot_amt_rec                VARCHAR(20),
inv_paym_acc_id                VARCHAR(10),
inv_cheque_no                  VARCHAR(50),
inv_paym_oth_info              VARCHAR(200),
inv_cash_amt_rec               VARCHAR(50),
inv_discount_amt               VARCHAR(50),
inv_fnl_due_bal                VARCHAR(50),
inv_since                      DATETIME,UNIQUE KEY (inv_pre_invoice_no,inv_invoice_no))AUTO_INCREMENT=1";

if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
?>