<?php
/*
 * ***************************************************************************************************************
 * @tutorial: SHOPIFY INTEGRATION FILE @PRIYANKA-19MAR19
 * ***************************************************************************************************************
 * 
 * Created on MAR 19, 2019 15:58:00 PM
 *
 * @FileName: omShopifyProcess.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 * Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 * MODIFICATION DATE:
 * AUTHOR: @PRIYANKA-19MAR19
 * REASON:
 *
 */
?>
<?php
//
//print_r($_REQUEST);
//
// ***************************************************************************************************************
// START CODE TO ADD FUNCTION TO CALL SHOPIFY API @PRIYANKA-19MAR19
// ****************************************************************************************************************
function omCallShopifyAPI($apiUrl, $apiPostFields) {
    //
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $apiPostFields);
    return curl_exec($ch);
    curl_close($ch);
    //
}
// ***************************************************************************************************************
// END CODE TO ADD FUNCTION TO CALL SHOPIFY API @PRIYANKA-19MAR19
// ***************************************************************************************************************
//
// ***************************************************************************************************************
// START CODE FOR GET DB CONNECTION VARIABLES AND API KEY, PASSWORD AND HOST NAME @PRIYANKA-19MAR19
// ***************************************************************************************************************
   $globalProcess = 'YES';
   $ownerId = $_REQUEST['ownerId']; // OWNER ID
   $dbname = $_REQUEST['dbName']; // DATABASE NAME
   $dbuser = $_REQUEST['dbUser']; // USER
   $dbPass = $_REQUEST['dbPass']; // DATABASE PASSWORD
   $dbPort = $_REQUEST['dbPort']; // DATABASE PORT
   $prodType = $_REQUEST['prodType']; // PRODUCT TYPE
   $loginType = $_REQUEST['loginType']; // LOGIN TYPE
   $apiKey = $_REQUEST['apiKey']; // API KEY 
   $apiPassword = $_REQUEST['apiPassword']; // API PASSWORD
   $hostName = $_REQUEST['hostName']; // HOST NAME
// ***************************************************************************************************************
// END CODE FOR GET DB CONNECTION VARIABLES AND API KEY, PASSWORD AND HOST NAME @PRIYANKA-19MAR19
// ***************************************************************************************************************
//
// echo '$dbname == '.$dbname.'<br />';
//
// ***************************************************************************************************************
// Start Mysql Connection @PRIYANKA-19MAR19
// ***************************************************************************************************************
   $conn = mysqli_connect($dbhost, $dbuser, $dbPass, $dbname, $dbPort) or die('Error connecting to mysql');
   mysqli_select_db($conn, $dbname);
// ***************************************************************************************************************
// End Mysql Connection @PRIYANKA-19MAR19
// ***************************************************************************************************************
//
//
// ***************************************************************************************************************
// START CODE FOR GET/SET API KEY, API PASSWORD AND HOST NAME @PRIYANKA-20MAR19
// ***************************************************************************************************************
// 
// $url = "https://apikey:password@hostname/admin/products.json";
//
// API KEY @PRIYANKA-25MAR19
if ($apiKey == '' || $apiKey == NULL) {
    $apiKey = '41a1621a549c91ac6d65716fd18c935b';
}
//
// API PASSWORD @PRIYANKA-25MAR19
if ($apiPassword == '' || $apiPassword == NULL) {
    $apiPassword = '7f0602c4ba9487282bfa4f00dd9319c1';
}
//
// HOST NAME @PRIYANKA-25MAR19
if ($hostName == '' || $hostName == NULL) {
    $hostName = 'sgen-shop.myshopify.com';
}
// ***************************************************************************************************************
// END CODE FOR GET/SET API KEY, API PASSWORD AND HOST NAME @PRIYANKA-20MAR19
// ***************************************************************************************************************  

// PERFORM GET DATA OPERATION TO GET DATA FROM SHOPIFY 
// FOR PERFORMING NEXT OPERATION @PRIYANKA-26MAR19
   $operation = 'getAllData'; // GET ALL DATA OPERATION @PRIYANKA-26MAR19
   $apiFieldsOperation = array('operation' => $operation);

// API KEY @PRIYANKA-25MAR19
   $apiKeyMerge = array('apiKey' => $apiKey);
   $apiFieldsKey = array_merge($apiFieldsOperation, $apiKeyMerge);

// API PASSWORD @PRIYANKA-25MAR19
   $apiPasswordMerge = array('apiPassword' => $apiPassword);
   $apiFieldsPassword = array_merge($apiFieldsKey, $apiPasswordMerge);

// HOST NAME @PRIYANKA-25MAR19
   $hostNameMerge = array('hostName' => $hostName);
   $apiFieldsArray = array_merge($apiFieldsPassword, $hostNameMerge);

//echo '<pre>';
//print_r($apiFieldsArray);
//die;

$apiUrl = "http://13.233.70.59/shopify/om_shopify.php"; // SHOPIFY API URL @PRIYANKA-26MAR19
$apiPostFields = $apiFieldsArray; // POST FIELDS

// START CODE TO CALL SHOPIFY API @PRIYANKA-26MAR19
   $omAPIResultJSON = omCallShopifyAPI($apiUrl, $apiPostFields); // GET RESULT FROM SHOPIFY @PRIYANKA-26MAR19
// END CODE TO CALL SHOPIFY API @PRIYANKA-26MAR19

//echo '<hr>';
//echo '<pre>';
//print_r($omAPIResultJSON);
//echo '<hr>';   

// CONVERT ID'S INTO STRING FORMAT @PRIYANKA-28MAR19
   $omAPIResultJSON = preg_replace('/"id"\s*:\s*(\d+)/', '"id": "\1"', $omAPIResultJSON); // ID
   $omAPIResultJSON = preg_replace('/"product_id"\s*:\s*(\d+)/', '"product_id": "\1"', $omAPIResultJSON); // PRODUCT ID
   $omAPIResultJSON = preg_replace('/"inventory_item_id"\s*:\s*(\d+)/', '"inventory_item_id": "\1"', $omAPIResultJSON); // INVENTORY PRODUCT ID

// JSON DECODE @PRIYANKA-28MAR19
   $omShopifyAPIResult = json_decode($omAPIResultJSON, true);

//echo '<pre>';
//print_r($omShopifyAPIResult);

foreach ($omShopifyAPIResult as $obj_key => $products) { // FOR PRODUCTS @PRIYANKA-28MAR19
        //
        //echo "$obj_key : <br>";
    foreach ($products as $products_count_key => $products_count) { // FOR PRODUCT COUNT @PRIYANKA-28MAR19
            //
            //echo "$products_count_key : $products_count <br>";
        foreach ($products_count as $products_details_key => $products_details) { // FOR PRODUCT DETAILS @PRIYANKA-28MAR19
                //
                //echo "$products_details_key : $products_details <br>";
            if ($products_details_key == 'variants') { // FOR VARIANTS @PRIYANKA-28MAR19
                //
                //echo "$products_details_key <br>";
                foreach ($products_details as $products_details_variants_key => $products_details_variants) { // FOR VARIANTS DETAILS @PRIYANKA-28MAR19
                        //
                        //echo "$products_details_variants_key: $products_details_variants<br>";
                
                        $shopify_product_id = $products_details_variants['product_id']; // PROD ID
                        $shopify_product_inventory_quantity = $products_details_variants['inventory_quantity']; // SHOPIFY PRODUCT QTY
                        $shopify_product_weight = $products_details_variants['weight']; // SHOPIFY PRODUCT WEIGHT
                        $shopify_product_sku = $products_details_variants['sku']; // SHOPIFY PRODUCT SKU
                        
                        //echo '$shopify_product_id == ' . $shopify_product_id . '<br />';
                        //echo '$shopify_product_inventory_quantity == ' . $shopify_product_inventory_quantity . '<br />';
                        //echo '$shopify_product_sku == ' . $shopify_product_sku . '<br />';
                            
                        // UPDATE SHOPIFY UNIQUE PRODUCT ID INTO STOCK TRANSACTION TABLE @PRIYANKA-27MAR19
                        $updateQuery = "UPDATE stock_transaction SET sttr_shopify_prod_id = '$shopify_product_id'
                                        WHERE sttr_item_code = '$shopify_product_sku' AND sttr_stock_type = 'retail' 
                                        AND sttr_indicator = 'imitation' AND sttr_transaction_type != 'sell'";
                    
                        if (!mysqli_query($conn, $updateQuery)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                            
                        // IT WILL FETCH ENTRY FROM STOCK_TRANSACTION TABLE @PRIYANKA-28MAR19
                        $selectEntryDetails = "SELECT * FROM stock_transaction WHERE sttr_item_code = '$shopify_product_sku' 
                                               AND sttr_stock_type = 'retail' AND sttr_indicator = 'imitation' 
                                               AND sttr_transaction_type != 'sell'";
                        
                        $selectEntryDetailsResult = mysqli_query($conn, $selectEntryDetails); // QUERY RESULT
                        $selectEntryDetailsRow = mysqli_fetch_assoc($selectEntryDetailsResult);  
                           
                        $sttr_id = $selectEntryDetailsRow['sttr_id']; // OMUNIM SOFTWARE PROD ID
                        $sttr_quantity = $selectEntryDetailsRow['sttr_quantity']; // OMUNIM SOFTWARE PROD QTY
                        $sttr_gs_weight = $selectEntryDetailsRow['sttr_gs_weight']; // OMUNIM SOFTWARE PROD GS WT
                        $sttr_gs_weight_type = $selectEntryDetailsRow['sttr_gs_weight_type']; // OMUNIM SOFTWARE PROD GS WT TYPE
                        $sttr_final_quantity = $selectEntryDetailsRow['sttr_final_quantity']; // OMUNIM SOFTWARE PROD FINAL QTY
                        $sttr_final_gs_weight = $selectEntryDetailsRow['sttr_final_gs_weight']; // OMUNIM SOFTWARE PROD FINAL GS WT
                        $sttr_status = $selectEntryDetailsRow['sttr_status']; // OMUNIM SOFTWARE PROD STATUS
                                                
                        //echo '$sttr_id == ' . $sttr_id . '<br />';
                        //echo '$sttr_quantity == ' . $sttr_quantity . '<br />';
                        //echo '$sttr_gs_weight == ' . $sttr_gs_weight . '<br />';
                        //echo '$sttr_final_quantity == ' . $sttr_final_quantity . '<br />';
                        //echo '$sttr_final_gs_weight == ' . $sttr_final_gs_weight . '<br />';                        
                        //echo '<hr />';

                        // ***************************************************************************************************************
                        // SHOPIFY PRODUCT QUANTITY IS ZERO THEN UPDATE STATUS AS SOLDOUT 
                        // OF PRODUCT INTO STOCK TRANSACTION TABLE (OMUNIM SOFTWARE) @PRIYANKA-26MAR19
                        // ***************************************************************************************************************
                        if ($shopify_product_inventory_quantity == 0) {

                            // UPDATE STATUS AS SOLDOUT OF PRODUCT INTO STOCK TRANSACTION TABLE (OMUNIM SOFTWARE) @PRIYANKA-26MAR19
                            $updateQuery = "UPDATE stock_transaction SET sttr_status = 'SOLDOUT'
                                            WHERE sttr_id = '$sttr_id'";
                            
                            if (!mysqli_query($conn, $updateQuery)) {
                                die('Error: ' . mysqli_error($conn));
                            }
                        }
                        // ***************************************************************************************************************
                        // OMUNIM SOFTWARE PRODUCT QUANTITY IS GREATER THAN SHOPIFY PRODUCT QUANTITY 
                        // UPDATE PRODUCT QUANTITY INTO STOCK TRANSACTION TABLE (OMUNIM SOFTWARE) @PRIYANKA-26MAR19
                        // ***************************************************************************************************************
                        else if (($sttr_quantity > $shopify_product_inventory_quantity) &&
                                 ($sttr_final_quantity == '' || $sttr_final_quantity == NULL)) {

                            // UPDATE STATUS AS SOLDOUT OF PRODUCT INTO STOCK TRANSACTION TABLE (OMUNIM SOFTWARE) @PRIYANKA-26MAR19
                            $updateQuery = "UPDATE stock_transaction SET sttr_final_quantity = '$shopify_product_inventory_quantity'
                                            WHERE sttr_id = '$sttr_id'";
                            
                            if (!mysqli_query($conn, $updateQuery)) {
                                die('Error: ' . mysqli_error($conn));
                            }
                        }
                        // ***************************************************************************************************************
                        // SHOPIFY PRODUCT QUANTITY IS GREATER THAN OMUNIM SOFTWARE PRODUCT QUANTITY 
                        // UPDATE PRODUCT QUANTITY INTO SHOPIFY @PRIYANKA-26MAR19
                        // ***************************************************************************************************************
                        else if (($shopify_product_inventory_quantity > $sttr_quantity) &&
                                 ($sttr_final_quantity == '' || $sttr_final_quantity == NULL)) {

                            $operation = 'update'; // UPDATE OPERATION @PRIYANKA-26MAR19
                            // UPDATE SHOPIFY PRODUCT QUANTITY
                            $operationMerge = array('operation' => $operation, 'sttr_quantity' => $sttr_quantity,
                                                    'sttr_gs_weight' => $sttr_gs_weight, 
                                                    'sttr_gs_weight_type' => $sttr_gs_weight_type);

                            $apiFieldsArray = array_merge($selectEntryDetailsRow, $operationMerge);

                            //echo '<pre>';
                            //print_r($apiFieldsArray);die;

                            $apiUrl = "http://13.233.70.59/shopify/om_shopify.php"; // SHOPIFY API URL @PRIYANKA-26MAR19
                            $apiPostFields = $apiFieldsArray;

                            // START CODE TO CALL SHOPIFY API @PRIYANKA-26MAR19
                               $omAPIResult = omCallShopifyAPI($apiUrl, $apiPostFields); // GET RESULT FROM SHOPIFY @PRIYANKA-26MAR19
                            // END CODE TO CALL SHOPIFY API @PRIYANKA-26MAR19
                               
                            //echo '<pre>';
                            //print_r($omAPIResult);
                        }
                        // ***************************************************************************************************************
                        // OMUNIM SOFTWARE PRODUCT QUANTITY IS GREATER THAN SHOPIFY PRODUCT QUANTITY 
                        // UPDATE PRODUCT QUANTITY INTO STOCK TRANSACTION TABLE (OMUNIM SOFTWARE) @PRIYANKA-26MAR19
                        // ***************************************************************************************************************
                        else if (($sttr_final_quantity > $shopify_product_inventory_quantity) &&
                                 ($sttr_final_quantity != '' && $sttr_final_quantity != NULL)) {

                            // UPDATE STATUS AS SOLDOUT OF PRODUCT INTO STOCK TRANSACTION TABLE (OMUNIM SOFTWARE) @PRIYANKA-26MAR19
                            $updateQuery = "UPDATE stock_transaction SET sttr_final_quantity = '$shopify_product_inventory_quantity'
                                            WHERE sttr_id = '$sttr_id'";
                            
                            if (!mysqli_query($conn, $updateQuery)) {
                                die('Error: ' . mysqli_error($conn));
                            }
                        }
                        // ***************************************************************************************************************
                        // SHOPIFY PRODUCT QUANTITY IS GREATER THAN OMUNIM SOFTWARE PRODUCT QUANTITY 
                        // UPDATE PRODUCT QUANTITY INTO SHOPIFY @PRIYANKA-26MAR19
                        // ***************************************************************************************************************
                        else if (($shopify_product_inventory_quantity > $sttr_final_quantity) &&
                                 ($sttr_final_quantity != '' && $sttr_final_quantity != NULL)) {

                            $operation = 'update'; // UPDATE OPERATION @PRIYANKA-26MAR19
                            // UPDATE SHOPIFY PRODUCT QUANTITY
                            $operationMerge = array('operation' => $operation);

                            $apiFieldsArray = array_merge($selectEntryDetailsRow, $operationMerge);

                            //echo '<pre>';
                            //print_r($apiFieldsArray);

                            $apiUrl = "http://13.233.70.59/shopify/om_shopify.php"; // SHOPIFY API URL @PRIYANKA-26MAR19
                            $apiPostFields = $apiFieldsArray;

                            // START CODE TO CALL SHOPIFY API @PRIYANKA-26MAR19
                               $omAPIResult = omCallShopifyAPI($apiUrl, $apiPostFields); // GET RESULT FROM SHOPIFY @PRIYANKA-26MAR19
                            // END CODE TO CALL SHOPIFY API @PRIYANKA-26MAR19
                            
                            //echo '<pre>';
                            //print_r($omAPIResult);
                        }
                        // ***************************************************************************************************************
                        // OMUNIM SOFTWARE PRODUCT STATUS IS SOLDOUT THEN
                        // UPDATE SHOPIFY PRODUCT QUANTITY @PRIYANKA-26MAR19
                        // ***************************************************************************************************************
                        else if ($sttr_status == 'SOLDOUT') {

                            $operation = 'update'; // UPDATE OPERATION @PRIYANKA-26MAR19
                            // UPDATE SHOPIFY PRODUCT QUANTITY
                            $operationMerge = array('operation' => $operation, 'sttr_quantity' => 0,
                                                    'sttr_gs_weight' => 0, 'sttr_gs_weight_type' => null);

                            $apiFieldsArray = array_merge($selectEntryDetailsRow, $operationMerge);

                            //echo '<pre>';
                            //print_r($apiFieldsArray);die;

                            $apiUrl = "http://13.233.70.59/shopify/om_shopify.php"; // SHOPIFY API URL @PRIYANKA-26MAR19
                            $apiPostFields = $apiFieldsArray;

                            // START CODE TO CALL SHOPIFY API @PRIYANKA-26MAR19
                               $omAPIResult = omCallShopifyAPI($apiUrl, $apiPostFields); // GET RESULT FROM SHOPIFY @PRIYANKA-26MAR19
                            // END CODE TO CALL SHOPIFY API @PRIYANKA-26MAR19
                               
                            //echo '<pre>';
                            //print_r($omAPIResult);
                        }
                }
            }
        }
    }
}
//
// *******************************************************************************************************************************************
// END CODE TO GET ALL ENTRIES FROM STOCK_TRANSACTION TABLE @PRIYANKA-19MAR19
// *******************************************************************************************************************************************
//
?>