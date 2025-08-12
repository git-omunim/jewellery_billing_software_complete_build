<?php

/*
 * **************************************************************************************
 * @tutorial: STOCK "SELL" ENTRY CRYSTAL WEIGHT UPDATE IN stock_transaction
 * **************************************************************************************
 * 
 * Created on 19 Nov, 2019 3:09:37 PM
 *
 * @FileName: omspcrwtupd.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:SHRI
 *  REASON:
 *
 */
?>
<?php

require_once 'system/omssopin.php';

$qSelAllSaleItems = "SELECT * FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_indicator ='stock' and sttr_transaction_type = 'sell' and sttr_status NOT IN ('DELETED') and (sttr_stone_wt = '' OR sttr_stone_wt IS NULL)";
$resAllSaleItems = mysqli_query($conn, $qSelAllSaleItems) or die(mysqli_error($conn));

while ($rowAllSaleItems = mysqli_fetch_array($resAllSaleItems, MYSQLI_ASSOC)) {
    $qSelSaleStoneWt = "SELECT sttr_gs_weight,sttr_gs_weight_type FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_indicator ='stockCrystal' and sttr_status NOT IN ('DELETED') and sttr_sttr_id='$rowAllSaleItems[sttr_id]'";
    $resSelSaleStoneWt = mysqli_query($conn, $qSelSaleStoneWt) or die(mysqli_error($conn));
    $noOfStones = mysqli_num_rows($resSelSaleStoneWt);
    if ($noOfStones > 0) {
        $finalItemStoneWeight = 0;
        $finalItemStoneWeightTyp = 'CT';
        if ($noOfStones == 1) {
            $rowSelSaleStoneWt = mysqli_fetch_array($resSelSaleStoneWt, MYSQLI_ASSOC);
            $finalItemStoneWeight = $rowSelSaleStoneWt['sttr_gs_weight'];
            $finalItemStoneWeightTyp = $rowSelSaleStoneWt['sttr_gs_weight_type'];
        } else {
            while ($rowSelSaleStoneWt = mysqli_fetch_array($resSelSaleStoneWt, MYSQLI_ASSOC)) {
                $itemStoneWeight = $rowSelSaleStoneWt['sttr_gs_weight'];
                $itemStoneWeightTyp = $rowSelSaleStoneWt['sttr_gs_weight_type'];


                // CONVERT WEIGHT TO "CT"
                if ($itemStoneWeightTyp == 'GM')
                    $currentWeight = ($itemStoneWeight * 5); // GM TO CT
                else if ($itemStoneWeightTyp == 'KG')
                    $currentWeight = ($itemStoneWeight * 5000); // KG TO CT
                else if ($itemStoneWeightTyp == 'MG')
                    $currentWeight = ($itemStoneWeight * 0.005); // MG TO CT
                else if ($itemStoneWeightTyp == 'CT')
                    $currentWeight = $itemStoneWeight;

                $finalItemStoneWeight += $currentWeight;
            }
        }

        $qUpdSaleItemStoneWt = "UPDATE stock_transaction SET sttr_stone_wt='$finalItemStoneWeight', sttr_stone_wt_type='$finalItemStoneWeightTyp' WHERE sttr_id='$rowAllSaleItems[sttr_id]' and sttr_owner_id='$_SESSION[sessionOwnerId]'";
        if (!mysqli_query($conn, $qUpdSaleItemStoneWt)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
}
?>