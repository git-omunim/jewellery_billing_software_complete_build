<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 27 Mar, 2019 9:10:30 PM
 *
 * @FileName: shop_temp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

$jsondata = '{"products":[{"id":1792685277218,"title":"PPG","body_html":"PPG","vendor":"sgen shop","product_type":"PPGD","created_at":"2019-03-27T10:01:08-04:00","handle":"burton-custom-freestyle-151","updated_at":"2019-03-27T10:20:49-04:00","published_at":"2019-03-06T08:05:45-05:00","template_suffix":null,"tags":"\"Jewellery\"","published_scope":"web","admin_graphql_api_id":"gid:\/\/shopify\/Product\/1792685277218","variants":[{"id":16367810936866,"product_id":1792685277218,"title":"Default Title","price":"2500.00","sku":"PPGD2","position":1,"inventory_policy":"deny","compare_at_price":"3000.00","fulfillment_service":"manual","inventory_management":"shopify","option1":"Default Title","option2":null,"option3":null,"created_at":"2019-03-27T10:20:49-04:00","updated_at":"2019-03-27T10:20:49-04:00","taxable":false,"barcode":"025","grams":0,"image_id":null,"weight":0.0,"weight_unit":"g","inventory_item_id":16614569902114,"inventory_quantity":0,"old_inventory_quantity":0,"requires_shipping":true,"admin_graphql_api_id":"gid:\/\/shopify\/ProductVariant\/16367810936866"}],"options":[{"id":2386994135074,"product_id":1792685277218,"name":"Title","position":1,"values":["Default Title"]}],"images":[],"image":null},{"id":1792685375522,"title":"PPG","body_html":"PPG","vendor":"sgen shop","product_type":"PPGD","created_at":"2019-03-27T10:01:11-04:00","handle":"burton-custom-freestyle-152","updated_at":"2019-03-27T10:20:53-04:00","published_at":"2019-03-06T08:05:45-05:00","template_suffix":null,"tags":"\"Jewellery\"","published_scope":"web","admin_graphql_api_id":"gid:\/\/shopify\/Product\/1792685375522","variants":[{"id":16367811133474,"product_id":1792685375522,"title":"Default Title","price":"2500.00","sku":"PPGD3","position":1,"inventory_policy":"deny","compare_at_price":"3000.00","fulfillment_service":"manual","inventory_management":"shopify","option1":"Default Title","option2":null,"option3":null,"created_at":"2019-03-27T10:20:53-04:00","updated_at":"2019-03-27T10:20:53-04:00","taxable":false,"barcode":"026","grams":0,"image_id":null,"weight":0.0,"weight_unit":"g","inventory_item_id":16614570098722,"inventory_quantity":0,"old_inventory_quantity":0,"requires_shipping":true,"admin_graphql_api_id":"gid:\/\/shopify\/ProductVariant\/16367811133474"}],"options":[{"id":2386994233378,"product_id":1792685375522,"name":"Title","position":1,"values":["Default Title"]}],"images":[],"image":null},{"id":1792685539362,"title":"PPG","body_html":"PPG","vendor":"sgen shop","product_type":"PPGD","created_at":"2019-03-27T10:01:13-04:00","handle":"burton-custom-freestyle-153","updated_at":"2019-03-27T10:16:52-04:00","published_at":"2019-03-06T08:05:45-05:00","template_suffix":null,"tags":"\"Jewellery\"","published_scope":"web","admin_graphql_api_id":"gid:\/\/shopify\/Product\/1792685539362","variants":[{"id":16367778562082,"product_id":1792685539362,"title":"Default Title","price":"2500.00","sku":"PPGD4","position":1,"inventory_policy":"deny","compare_at_price":"3000.00","fulfillment_service":"manual","inventory_management":"shopify","option1":"Default Title","option2":null,"option3":null,"created_at":"2019-03-27T10:16:52-04:00","updated_at":"2019-03-27T10:16:52-04:00","taxable":false,"barcode":"027","grams":0,"image_id":null,"weight":0.0,"weight_unit":"g","inventory_item_id":16614537265186,"inventory_quantity":0,"old_inventory_quantity":0,"requires_shipping":true,"admin_graphql_api_id":"gid:\/\/shopify\/ProductVariant\/16367778562082"}],"options":[{"id":2386994495522,"product_id":1792685539362,"name":"Title","position":1,"values":["Default Title"]}],"images":[],"image":null}]}';

$jsondata = preg_replace('/"id"\s*:\s*(\d+)/', '"id": "\1"', $jsondata);
$jsondata = preg_replace('/"product_id"\s*:\s*(\d+)/', '"product_id": "\1"', $jsondata);
$jsondata = preg_replace('/"inventory_item_id"\s*:\s*(\d+)/', '"inventory_item_id": "\1"', $jsondata);

$jarray = json_decode($jsondata, true);

//echo '<PRE>';
//print_r($jarray);

foreach ($jarray as $obj_key => $products) {
    //echo "$obj_key:<br>";
    foreach ($products as $products_count_key => $products_count) {
        //echo "$products_count_key: $products_count<br>";
        foreach ($products_count as $products_details_key => $products_details) {
            //echo "$products_details_key: $products_details<br>";
            //
            if ($products_details_key == 'variants') {
                foreach ($products_details as $products_details_variants_key => $products_details_variants) {
                    //echo "$products_details_variants_key: $products_details_variants<br>";
                    foreach ($products_details_variants as $products_details_variants_details_key => $products_details_variants_details) {
                        echo "$products_details_variants_details_key: $products_details_variants_details<br>";
                        //
                        
                        //
                    }
                    echo '<br/>';
                }
            }
        }
    }
    echo "<br>";
}
?>