<?php

/*
 * **************************************************************************************
 * @tutorial: Set Indicatorrs  for form in omindicators table
 * **************************************************************************************
 * 
 * Created on APR 26, 2018 5:26:25 PM
 *
 * @FileName: omsetupformstocktrans.php
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
 * In form 1st row we need 21 options pass blank in case of no option
 * In form 2nd row we need 22 options
 * In form 3rd row we need 13 options
 */
?>
<?php

// ***************************************************************************
// Start Code To Include Global Files
// ***************************************************************************

include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//include_once 'ommpfndv.php';
// ***************************************************************************
// End Code To Include Global Files
// ***************************************************************************
// ***************************************************************************
// Start Code To omindicator function Files
// ***************************************************************************

include 'ommpomindicator.php';

// ***************************************************************************
// End Code To omindicator function Files
// ***************************************************************************
// ***************************************************************************
// Start Code To Create Array For Fine Jwellery Form Setup
// ***************************************************************************
include 'omsetupformstocktrans_jewellery.php';
////* * *************************************************************************
// *  End Code To  Create Array For Fine Jwellery Form Setup
// * ***************************************************************************
// *
// * ***************************************************************************
// *  Start Code To  Create Array For Imitation Jwellery Form Setup
// * ***************************************************************************
// */
include 'omsetupformstocktrans_imitation.php';

//
/* * *************************************************************************
 * End Code To  Create Array For Imitation Jwellery Form Setup
 * ***************************************************************************
 *
 * ***************************************************************************
 *  Start Code To  Create Array For Raw Metal  Form Setup
 * ***************************************************************************
 */

include 'omsetupformstocktrans_metal.php';

/* * **************************************************************************
 *  End Code To  Create Array For Raw Metal  Form Setup
 * ***************************************************************************
 *
 * ***************************************************************************
 *  Start Code To  Create Array For Crystal  Form Setup
 * ***************************************************************************
 */

include 'omsetupformstocktrans_crystal.php';

/* * **************************************************************************
 * End Code To  Create Array For Crystal  Form Setup
 * ***************************************************************************
 * 
* ***************************************************************************
 *  Start Code To  Create Array For Crystal  Form Setup
 * ***************************************************************************
 */

include 'omsetupformstocktrans_garments.php';

/* * **************************************************************************
 * End Code To  Create Array For Crystal  Form Setup
 * ***************************************************************************
 *
 * ***************************************************************************
 * Start Code To  Create Array For Panels which are Inserted With Every Colums in omindicators
 * ***************************************************************************
 */

$panelName = array("FINE_JEWELLERY_PURCHASE", "FINE_JEWELLERY_WHOLESALE_PURCHASE","IMITATION_JEWELLERY", "METAL", "CRYSTAL","FINE_JEWELLERY_SELL","READYMADE_GARMENTS",);

/* * **************************************************************************
 * End Code To  Create Array For Panels which are Inserted With Every Colums in omindicators
 * ***************************************************************************
 *
 * ***************************************************************************
 * Start Code To  Create Array For All colums from stock transaction table 
 * ***************************************************************************
 */

$ColumNames = array();
$GetcolumNameQuery = "SHOW COLUMNS FROM stock_transaction";
$resSelColumnNames = mysqli_query($conn, $GetcolumNameQuery);

while ($row = mysqli_fetch_array($resSelColumnNames)) {
    $ColumNames[] = $row['Field'];
}

//print_r($ColumNames);
//print_r($stock);exit;

/* * **************************************************************************
 * End Code To  Create Array For All colums from stock transaction table 
 * ***************************************************************************
 * 
 * **************************************************************************
 * Start Code To Insert indicator to Omindicator  for Fine Jwellery
 * ***************************************************************************
 */

for ($i = 0; $i < count($panelName); $i++) {
    $array[] = array();
    if ($i == 0) {
        $array = $fineJewelleryPurchase;
        $arrayWidth = $fineJewelleryPurchaseSize;
        $arrayMandatory = $fineJewelleryPurchaseMandatory;
        $arrayHorizontal = $fineJewelleryPurchaseHorizontal;
        $arrayValidationMessage=$fineJewelleryPurchaseLable;
        $arrayGoogleSuggTable = $fineGoogleSuggTableArray;
        $arrayGoogleSuggColumn = $fineGoogleSuggColumnArray;
        $arrayGoogleSuggColumnDisp = $fineGoogleSuggColumnDisplayArray;
        $arrayGoogleSuggWhereCond = $fineGoogleSuggWhereCondArray;
    }else if ($i == 1) {
        $array = $fineJewelleryWholesalePurchase;
        $arrayWidth = $fineJewelleryWholesalePurchaseSize;
        $arrayMandatory = $fineJewelleryWholesalePurchaseMandatory;
        $arrayHorizontal = $fineJewelleryPurchaseWholesaleHorizontal;
        $arrayValidationMessage=$fineJewelleryWholesalePurchaseLable;
        $arrayGoogleSuggTable = $fineWholesaleGoogleSuggTableArray;
        $arrayGoogleSuggColumn = $fineWholesaleGoogleSuggColumnArray;
        $arrayGoogleSuggColumnDisp = $fineWholesaleGoogleSuggColumnDisplayArray;
        $arrayGoogleSuggWhereCond = $fineWholesaleGoogleSuggWhereCondArray;
    } else if ($i == 2) {
        $array = $imitationJewellery;
        $arrayWidth = $imitationJewellerySize;
        $arrayMandatory = $imitationJewelleryMandatory;
        $arrayHorizontal = $imitationJewelleryPurchaseHorizontal;
        $arrayValidationMessage=$imitationJewelleryPurchasevalidationMessage;
    } else if ($i == 3) {
        $array = $METAL;
        $arrayWidth = $METALSIZE;
        $arrayMandatory = $METALSIZEMANDATORY;
        $arrayHorizontal = $fineJewelleryPurchaseHorizontal;
        $arrayValidationMessage=$METALvalidationMessage;
    } else if ($i == 4) {
        $array = $Crystal;
        $arrayHorizontal = $CrystalHorizontal;
        $arrayWidth = $CrystalSize;
        $arrayMandatory = $CystalMandatory;
        $arrayValidationMessage=$CystalPurchaseLable;
        $arrayGoogleSuggTable = $CystalGoogleSuggTableArray;
        $arrayGoogleSuggColumn = $CystalGoogleSuggColumnArray;
        $arrayGoogleSuggColumnDisp = $CystalGoogleSuggColumnDisplayArray;
        $arrayGoogleSuggWhereCond = $CystalGoogleSuggWhereCondArray;
       
    }
    else if ($i == 5) {
        $array = $fineJewellerySell;
        $arrayWidth = $fineJewellerySellSize;
        $arrayMandatory = $fineJewellerySellMandatory;
        $arrayHorizontal = $fineJewellerySellHorizontal;
        $arrayValidationMessage=$fineJewellerySellLable;
        $arrayGoogleSuggTable = $fineGoogleSuggTableArray;
        $arrayGoogleSuggColumn = $fineGoogleSuggColumnArray;
        $arrayGoogleSuggColumnDisp = $fineGoogleSuggColumnDisplayArray;
        $arrayGoogleSuggWhereCond = $fineGoogleSuggWhereCondArray;
    } else if ($i == 6) {
        $array = $ReadymadeGarments;
        $arrayWidth = $ReadymadeGarmentsSize;
        $arrayMandatory = $ReadymadeGarmentsMandatory;
        $arrayHorizontal = $ReadymadeGarmentsHorizontal;
        $arrayValidationMessage = $ReadymadeGarmentsLable;
    }

    for ($j = 0,$k=0; $j <= count($array) - 1; $j++) {
        // Start Code to Check  Condition check wheather cloumn is present in Panel or not
        

            CheckMpFormIndicators($array[$j], 'Y', 'CheckIndicator', $panelName[$i], $arrayWidth[$j], 
                                  $arrayMandatory[$j], $arrayHorizontal[$k],$arrayValidationMessage[$j],
                                  $arrayGoogleSuggTable[$j],$arrayGoogleSuggColumn[$j],$arrayGoogleSuggColumnDisp[$j],
                                  $arrayGoogleSuggWhereCond[$j]);
            if (in_array($array[$j], $ColumNames)) {
            $k++;
        }
        // End Code to Check  Condition check wheather cloumn is present in panel or not
    }
}
       
