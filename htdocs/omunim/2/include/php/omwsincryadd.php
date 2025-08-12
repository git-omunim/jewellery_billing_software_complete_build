<?php

/*
 * **************************************************************************************
 * @Description: STONE ADD IN MAIN SUPPLIER ENTRY FILE @PRIYANKA-21-12-17
 * **************************************************************************************
 *
 * Created on DEC 21, 2017 12:22:00 PM
 * 
 * @FileName: omwsincryadd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 1.0.0
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php

/* * **************************************************************************************************** */
/* * ************** START code to add Crystal in Supplier Fine Case @PRIYANKA-21-12-17 ****************** */
/* * **************************************************************************************************** */

if ($crystalEntered != '') {

    $cryCount = 0;
    $cryTotWt = 0;

    for ($j = 1; $j <= $crystalEntered; $j++) {

        $cryAvail = trim($_POST['del' . $j]);

        if ($cryAvail != 'Deleted') {

            include 'ogadcyid.php';

            $qSelCryDet = "SELECT cry_id from crystal where cry_own_id = '$ownerId' and cry_crystal_id = '$addItemCryId'"; // crystal table
            $resCryDet = mysqli_query($conn, $qSelCryDet);
            $cryAvailCount = mysqli_num_rows($resCryDet);
            if ($panelName == 'PurCADJewellery') {
                //             
                $sttr_wt = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_wt'.$j])));
                $_REQUEST['sttr_dia_wt'.$j] = $sttr_wt;
                $_REQUEST['sttr_other_charges_desc'.$j] = '';
                $_REQUEST['sttr_other_charges_amt'.$j] = '';
                $_REQUEST['sttr_panel_name'.$j] = 'RETAIL_CAD_STOCK';
                //
            }
            if ($cryAvailCount <= 0) {

                $query = "INSERT INTO crystal (
                    cry_own_id,cry_crystal_id,cry_name,cry_dob,cry_rate,cry_rate_type,cry_clarity,cry_color,
                    cry_other_info,cry_upd_sts,cry_since,cry_comm) 
                    VALUES ('$ownerId','$addItemCryId','$addItemCryName','$itemDOBDay','$addItemCryRate',"
                        . "'$addItemCryRateTyp','$addItemCryClarity',
                            '$addItemCryColor', '$addItemCryOtherInfo','User',$currentDateTime,'Created By User')";

                if (!mysqli_query($conn, $query)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }

            // Start Code To Add Stone Values Into stock_transaction (Supplier Fine Case) Table @PRIYANKA-21-12-17

            $type = array('sttr_transaction_type' => 'PURCHASE', 'sttr_indicator' => 'PURCHASE', 'sttr_sttr_id' => $sttr_id);
            $_REQUEST = array_merge($_REQUEST, $type);

            stock_transaction('insert', $_REQUEST, $sttr_id, $j);
            
            $query = "SELECT sttr_id FROM stock_transaction WHERE sttr_sttr_id = '$sttr_id' AND sttr_transaction_type = 'PURBYSUPP' AND sttr_indicator = 'stockCrystal' order by sttr_id desc limit 0,1";
            $resQuery = mysqli_query($conn, $query);
            while($rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)){
                $sttrId = $rowQuery['sttr_id'];
                $_REQUEST['sttr_stock_type'.$j]='wholesale';
                $_REQUEST['sttr_stock_add_from']='puchasefromuser';

                stock('insert', $_REQUEST, $sttrId,'', $j);
                }
            // End Code To Add Stone Values Into stock_transaction (Supplier Fine Case) Table @PRIYANKA-21-12-17
        }
    }

    if ($sttrId == '') {
        $sttrId = $sttr_id;
    }

    $query = "UPDATE stock_transaction SET sttr_crystal_yn = 'yes' WHERE  sttr_owner_id = '$ownerId' AND sttr_id = '$sttrId' AND sttr_indicator = 'AddInvoice'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    //
    $cryQuery = "UPDATE item_barcode SET itbc_owner_id = '$sttr_owner_id',
                itbc_firm_id = '$sttr_firm_id',itbc_pre_id = '$sttr_item_pre_id',itbc_post_id = '$sttr_item_id'
                WHERE itbc_ref_id = '$purchaseId'";
    //
    if (!mysqli_query($conn, $cryQuery)) {
        die('Error: ' . mysqli_error($conn));
    }
}

/* * **************************************************************************************************** */
/* * ************** END code to add Crystal in Supplier Fine Case @PRIYANKA-21-12-17 ******************** */
/* * **************************************************************************************************** */
?>
