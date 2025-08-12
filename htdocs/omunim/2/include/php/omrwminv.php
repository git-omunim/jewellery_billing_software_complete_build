<?php

/*
 * **************************************************************************************
 * @tutorial: OMGOLD Raw Metal Invoice Table
 * **************************************************************************************
 *
 * Created on 17 Dec, 2012 11:31:41 PM
 *
 * @FileName: ogtbitmRep.php
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

// Start  code to add columns in raw for payment  @Author:SHE20APR16
// Start  code to add columns in raw for payment @Author:SHE25APR16
$query = "CREATE TABLE raw_metal_invoice(
rmin_id                         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
rmin_owner_id                   VARCHAR(16),
rmin_jrnl_id                    INT,
rmin_firm_id                    VARCHAR(16),
rmin_supp_id                    VARCHAR(16),
rmin_date                       VARCHAR(50),
rmin_pre_invoice_no             VARCHAR(10),
rmin_invoice_no                 VARCHAR(50),
rmin_gd_frmid                   VARCHAR(16),
rmin_sl_frmid                   VARCHAR(16),
rmin_gd_accid                   VARCHAR(16),
rmin_sl_accid                   VARCHAR(16),
rmin_gd_gs_wgt                  VARCHAR(15),
rmin_gd_gs_wgt_typ              VARCHAR(10),
rmin_gd_nt_wgt                  VARCHAR(15),
rmin_gd_nt_wgt_typ              VARCHAR(10),
rmin_gd_fn_wgt                  VARCHAR(15),
rmin_gd_fn_wgt_typ              VARCHAR(10),
rmin_sl_gs_wgt                  VARCHAR(15),
rmin_sl_gs_wgt_typ              VARCHAR(10),
rmin_sl_nt_wgt                  VARCHAR(15),
rmin_sl_nt_wgt_typ              VARCHAR(10),
rmin_sl_fn_wgt                  VARCHAR(15),
rmin_sl_fn_wgt_typ              VARCHAR(10),
rmin_gd_rc_nt_wgt               VARCHAR(15),
rmin_gd_rc_nt_wgt_typ           VARCHAR(10),
rmin_sl_rc_nt_wgt               VARCHAR(15),
rmin_sl_rc_nt_wgt_typ           VARCHAR(10),
rmin_gd_rc_tunch                VARCHAR(15),
rmin_sl_rc_tunch                VARCHAR(15),
rmin_gd_rc_fn_wgt               VARCHAR(15),
rmin_sl_rc_fn_wgt               VARCHAR(15),
rmin_gd_rc_rate                 VARCHAR(15),
rmin_sl_rc_rate                 VARCHAR(15),
rmin_gd_rc_val                  VARCHAR(20),
rmin_sl_rc_val                  VARCHAR(20),
rmin_gd_wgt_bal                 VARCHAR(15),
rmin_gd_wgt_bal_typ             VARCHAR(10),
rmin_sl_wgt_bal                 VARCHAR(15),
rmin_sl_wgt_bal_typ             VARCHAR(10),
rmin_total_amt                  VARCHAR(20),
rmin_tot_amt_rec                VARCHAR(20),
rmin_paym_acc_id                VARCHAR(10),
rmin_card_type                  VARCHAR(50),
rmin_card_no                    VARCHAR(50),
rmin_paym_oth_info              VARCHAR(200),
rmin_cash_amt_rec               VARCHAR(50),
rmin_discount_amt               VARCHAR(50),
rmin_fnl_due_bal                VARCHAR(50),
rmin_since                      DATETIME,
rmin_gd_rc_pre_id               VARCHAR(20),
rmin_gd_rc_post_id              VARCHAR(40),
rmin_sl_rc_pre_id               VARCHAR(20),
rmin_sl_rc_post_id              VARCHAR(40),
rmin_staff_id	                VARCHAR(16),
rmin_card_amt                   VARCHAR(50),
rmin_cheque_amt                 VARCHAR(50),
rmin_cheque_no                 VARCHAR(20),
rmin_disc_narratn                VARCHAR(50), 
rmin_cash_narratn                VARCHAR(50),
rmin_vat_amt                    VARCHAR(50),
rmin_tax_amt                    VARCHAR(50),
rmin_gd_othr_chgs_wt           VARCHAR(20),
rmin_gd_othr_chgs_wt_typ       VARCHAR(20),
rmin_sl_othr_chgs_wt          VARCHAR(20),
rmin_sl_othr_chgs_wt_typ     VARCHAR(20),
rmin_cheque_acc_id              VARCHAR(20),
rmin_card_acc_id                VARCHAR(20),
rmin_disc_acc_id                VARCHAR(20),
rmin_othr_chgs_by                  VARCHAR(10),
rmin_tot_amt_charges                 VARCHAR(20),
rmin_vat_acc_id                 VARCHAR(20),UNIQUE KEY (rmin_pre_invoice_no,rmin_invoice_no))AUTO_INCREMENT=1";

if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
// End  code to add columns in raw for payment @Author:SHE20APR16
// End  code to add columns in raw for payment @Author:SHE25APR16
?>
  