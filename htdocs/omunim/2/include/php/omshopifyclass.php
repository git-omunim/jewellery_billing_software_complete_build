<?php
/*
 * **************************************************************************************
 * @Description: SHOPIFY INTEGRATION ALL FUNCTION DEFINITION - INSERT,DELETE,UPDATE,RETRIVE DATA
 * **************************************************************************************
 *
 * Created on Mar 19, 2019 11:40:58 AM 
 * **************************************************************************************
 * @FileName: omshopifyclass.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:05JUN17
 *  AUTHOR: SANTOSH
 *  REASON:
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
class Shopify {
      /* Member variables */
     
     // define/declare all variables which is used in all function definition
      /* Member functions */
    /// start function for insert product data in db in shopify
function InsertData($operation,array $request,$product_code)
{
	//echo '*******';
	//print_r($_REQUEST);die;
	//echo $operation;
	
        //id - Auto Generate
       $sttr_id =  $_REQUEST['sttr_id'];
       $sttr_sttr_id = $_REQUEST['sttr_sttr_id'];
       $sttr_transaction_type = $_REQUEST['sttr_transaction_type'];
       $sttr_item_pre_id = $_REQUEST['sttr_item_pre_id'];
       $sttr_item_id = $_REQUEST['sttr_item_id'];
       $sttr_metal_type = $_REQUEST['sttr_metal_type'];
       $sttr_stock_type = $_REQUEST['sttr_stock_type'];
       $sttr_item_category = $_REQUEST['sttr_item_category'];
       $sttr_item_name = $_REQUEST['sttr_item_name'];
       $sttr_barcode_prefix = $_REQUEST['sttr_barcode_prefix'];
       $sttr_barcode = $_REQUEST['sttr_barcode'];
       $sttr_item_code = $_REQUEST['sttr_item_code'];
       $sttr_indicator = $_REQUEST['sttr_indicator'];
       $sttr_brand_id = $_REQUEST['sttr_brand_id'];
       $sttr_add_date = $_REQUEST['sttr_add_date'];
       $sttr_hsn_no = $_REQUEST['sttr_hsn_no'];
       $sttr_size = $_REQUEST['sttr_size'];
       $sttr_shape = $_REQUEST['sttr_shape'];
       $sttr_color = $_REQUEST['sttr_color'];
       $sttr_quantity = $_REQUEST['sttr_quantity'];
       $sttr_metal_rate = $_REQUEST['sttr_metal_rate'];
       $sttr_gs_weight = $_REQUEST['sttr_gs_weight'];
       $sttr_gs_weight_type = $_REQUEST['sttr_gs_weight_type'];
       $sttr_lab_charges = $_REQUEST['sttr_lab_charges'];
       $sttr_lab_charges_type = $_REQUEST['sttr_lab_charges_type'];
       $sttr_making_charges = $_REQUEST['sttr_making_charges'];
       $sttr_total_lab_charges = $_REQUEST['sttr_total_lab_charges'];
       $sttr_total_making_charges = $_REQUEST['sttr_total_making_charges'];
       $sttr_making_charges_type = $_REQUEST['sttr_making_charges_type'];
       $sttr_tax = $_REQUEST['sttr_tax'];
       $sttr_tot_tax = $_REQUEST['sttr_tot_tax'];
       $sttr_valuation = $_REQUEST['sttr_valuation'];
       $sttr_final_valuation = $_REQUEST['sttr_final_valuation'];
       $sttr_status = $_REQUEST['sttr_status'];
       $sttr_mkg_cgst_per = $_REQUEST['sttr_mkg_cgst_per'];
       $sttr_mkg_cgst_chrg = $_REQUEST['sttr_mkg_cgst_chrg'];
       $sttr_mkg_sgst_per = $_REQUEST['sttr_mkg_sgst_per'];
       $sttr_mkg_sgst_chrg = $_REQUEST['sttr_mkg_sgst_chrg'];
       $sttr_mkg_igst_per = $_REQUEST['sttr_mkg_igst_per'];
       $sttr_mkg_igst_chrg = $_REQUEST['sttr_mkg_igst_chrg'];
       $sttr_tot_price_cgst_per = $_REQUEST['sttr_tot_price_cgst_per'];
       $sttr_tot_price_cgst_chrg = $_REQUEST['sttr_tot_price_cgst_chrg'];
       $sttr_tot_price_sgst_per = $_REQUEST['sttr_tot_price_sgst_per'];
       $sttr_tot_price_sgst_chrg = $_REQUEST['sttr_tot_price_sgst_chrg'];
       $sttr_tot_price_igst_per = $_REQUEST['sttr_tot_price_igst_per'];
       $sttr_tot_price_igst_chrg = $_REQUEST['sttr_tot_price_igst_chrg'];
       $sttr_item_other_info = $_REQUEST['sttr_item_other_info'];
       $sttr_pre_invoice_no = $_REQUEST['sttr_pre_invoice_no'];
       $sttr_invoice_no = $_REQUEST['sttr_invoice_no'];
       $sttr_price = $_REQUEST['sttr_price'];
       $sttr_cust_price = $_REQUEST['sttr_cust_price'];
       $sttr_cust_itmcalby = $_REQUEST['sttr_cust_itmcalby'];
       $sttr_cust_itmcode = $_REQUEST['sttr_cust_itmcode'];
       $sttr_cust_itmnum = $_REQUEST['sttr_cust_itmnum'];
       $sttr_item_length = $_REQUEST['sttr_item_length'];
       $sttr_item_width = $_REQUEST['sttr_item_width'];
       $sttr_item_model_no = $_REQUEST['sttr_item_model_no'];
       $sttr_item_sales_pkg = $_REQUEST['sttr_item_sales_pkg'];
       
       if($sttr_gs_weight_type=='GM')
       {
           $sttr_gs_weight_type='g';
       }
       else if($sttr_gs_weight_type=='KG')
       {
           $sttr_gs_weight_type='kg';
       }
    
        $products_array = array(
        //    
                "product"=>array(

                "title"=>$sttr_item_name, //// required
                "body_html"=> $sttr_item_name,
                "vendor"=> $sttr_brand_id,
                "product_type"=> $sttr_item_category . "(" .$sttr_item_name . ")",
                "published"=> false ,
                "created_at"=> "2019-03-06T18:35:45+05:30",
                "handle"=> "burton-custom-freestyle-151",
                "updated_at"=> "2019-03-07T13:54:19+05:30",
                "published_at"=> "2019-03-06T18:35:45+05:30",
                "template_suffix"=> null,
                "tags"=> "\"Jewellery\"",
                "published_scope"=> "web",
                "admin_graphql_api_id"=> "gid://shopify/Product/2082379858023",

                "variants" => array( array(
                                "option1" => "First",
                                "price" => $sttr_cust_price,
                                "sku" => $sttr_item_code,
                                "inventory_quantity" => $sttr_quantity,
                                "old_inventory_quantity" => "",
                                "inventory_management" => "shopify",
                                "taxable" => false,                                 
                                "product_id"=> "",
                                "title"=> "First",            
                                "position"=> 1,            
                                "inventory_policy"=> "deny",
                                "compare_at_price"=> "",
                                "fulfillment_service"=> "manual",            
                                "option1"=> "",
                                "option2"=> null,
                                "option3"=> null,
                                "created_at"=> $sttr_add_date,
                                "updated_at"=> "2019-03-07T13:54:18+05:30",
                                "barcode"=> $sttr_barcode_prefix.$sttr_barcode,
                                "grams"=> 0,
                                "image_id"=> null,
                                "weight"=> $sttr_gs_weight,
                                "weight_unit"=> $sttr_gs_weight_type,
                                "inventory_item_id"=> 20192728645735,         
                                "requires_shipping"=> true,
                                "admin_graphql_api_id"=> "gid://shopify/ProductVariant/19794678055015"
                            )
                        )
                )
            );
    /*$products_array = array(
//    
"product"=>array(
    
        "title"=>"NECKLACE",
        "body_html"=> "<strong>NECKLACE DESIGN!</strong>",
        "vendor"=> "OMUNIM",
        "product_type"=> "SGEN",
        "published"=> false ,
        "created_at"=> "2019-03-06T18:35:45+05:30",
        "handle"=> "burton-custom-freestyle-151",
        "updated_at"=> "2019-03-07T13:54:19+05:30",
        "published_at"=> "2019-03-06T18:35:45+05:30",
        "template_suffix"=> null,
        "tags"=> "\"Jewellery\"",
        "published_scope"=> "web",
        "admin_graphql_api_id"=> "",
        
        "variants" => array( array(
                        "option1" => "First",
                        "price" => "10000.00",
                        "sku" => "123",
                        "inventory_quantity" => 10,
                        "old_inventory_quantity" => 5,
                        "inventory_management" => "shopify",
                        "taxable" => false,                                 
                        "product_id"=> "12",
                        "title"=> "First",            
                        "position"=> 1,            
                        "inventory_policy"=> "deny",
                        "compare_at_price"=> null,
                        "fulfillment_service"=> "manual",            
                        "option1"=> "First",
                        "option2"=> null,
                        "option3"=> null,
                        "created_at"=> "2019-03-07T13:54:18+05:30",
                        "updated_at"=> "2019-03-07T13:54:18+05:30",
                        "barcode"=> null,
                        "grams"=> 0,
                        "image_id"=> null,
                        "weight"=> 5,
                        "weight_unit"=> "g",
                        "inventory_item_id"=> 20192728645735,         
                        "requires_shipping"=> true,
                        "admin_graphql_api_id"=> ""
                    )
                )
        )
    );*/
        $ch = curl_init("https://41a1621a549c91ac6d65716fd18c935b:7f0602c4ba9487282bfa4f00dd9319c1@sgen-shop.myshopify.com/admin/products.json");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($products_array)); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);        
        curl_close($ch); 		
        print_r($result);
}
/// end function for insert product data in db in shopify
 /// start function for Update product data in db in shopify
function UpdateData($operation,array $request,$product_code)
{
       $sttr_id = $_REQUEST['sttr_id'];
       $sttr_shopify_prod_id = $_REQUEST['sttr_shopify_prod_id'];
       $sttr_sttr_id = $_REQUEST['sttr_sttr_id'];
       $sttr_transaction_type = $_REQUEST['sttr_transaction_type'];
       $sttr_item_pre_id = $_REQUEST['sttr_item_pre_id'];
       $sttr_item_id = $_REQUEST['sttr_item_id'];
       $sttr_metal_type = $_REQUEST['sttr_metal_type'];
       $sttr_stock_type = $_REQUEST['sttr_stock_type'];
       $sttr_item_category = $_REQUEST['sttr_item_category'];
       $sttr_item_name = $_REQUEST['sttr_item_name'];
       $sttr_barcode_prefix = $_REQUEST['sttr_barcode_prefix'];
       $sttr_barcode = $_REQUEST['sttr_barcode'];
       $sttr_item_code = $_REQUEST['sttr_item_code'];
       $sttr_indicator = $_REQUEST['sttr_indicator'];
       $sttr_brand_id = $_REQUEST['sttr_brand_id'];
       $sttr_add_date = $_REQUEST['sttr_add_date'];
       $sttr_hsn_no = $_REQUEST['sttr_hsn_no'];
       $sttr_size = $_REQUEST['sttr_size'];
       $sttr_shape = $_REQUEST['sttr_shape'];
       $sttr_color = $_REQUEST['sttr_color'];
       $sttr_quantity = $_REQUEST['sttr_quantity'];
       $sttr_final_quantity = $_REQUEST['sttr_final_quantity'];
       $sttr_metal_rate = $_REQUEST['sttr_metal_rate'];
       $sttr_gs_weight = $_REQUEST['sttr_gs_weight'];
       $sttr_gs_weight_type = $_REQUEST['sttr_gs_weight_type'];
       $sttr_lab_charges = $_REQUEST['sttr_lab_charges'];
       $sttr_lab_charges_type = $_REQUEST['sttr_lab_charges_type'];
       $sttr_making_charges = $_REQUEST['sttr_making_charges'];
       $sttr_total_lab_charges = $_REQUEST['sttr_total_lab_charges'];
       $sttr_total_making_charges = $_REQUEST['sttr_total_making_charges'];
       $sttr_making_charges_type = $_REQUEST['sttr_making_charges_type'];
       $sttr_tax = $_REQUEST['sttr_tax'];
       $sttr_tot_tax = $_REQUEST['sttr_tot_tax'];
       $sttr_valuation = $_REQUEST['sttr_valuation'];
       $sttr_final_valuation = $_REQUEST['sttr_final_valuation'];
       $sttr_status = $_REQUEST['sttr_status'];
       $sttr_mkg_cgst_per = $_REQUEST['sttr_mkg_cgst_per'];
       $sttr_mkg_cgst_chrg = $_REQUEST['sttr_mkg_cgst_chrg'];
       $sttr_mkg_sgst_per = $_REQUEST['sttr_mkg_sgst_per'];
       $sttr_mkg_sgst_chrg = $_REQUEST['sttr_mkg_sgst_chrg'];
       $sttr_mkg_igst_per = $_REQUEST['sttr_mkg_igst_per'];
       $sttr_mkg_igst_chrg = $_REQUEST['sttr_mkg_igst_chrg'];
       $sttr_tot_price_cgst_per = $_REQUEST['sttr_tot_price_cgst_per'];
       $sttr_tot_price_cgst_chrg = $_REQUEST['sttr_tot_price_cgst_chrg'];
       $sttr_tot_price_sgst_per = $_REQUEST['sttr_tot_price_sgst_per'];
       $sttr_tot_price_sgst_chrg = $_REQUEST['sttr_tot_price_sgst_chrg'];
       $sttr_tot_price_igst_per = $_REQUEST['sttr_tot_price_igst_per'];
       $sttr_tot_price_igst_chrg = $_REQUEST['sttr_tot_price_igst_chrg'];
       $sttr_item_other_info = $_REQUEST['sttr_item_other_info'];
       $sttr_pre_invoice_no = $_REQUEST['sttr_pre_invoice_no'];
       $sttr_invoice_no = $_REQUEST['sttr_invoice_no'];
       $sttr_price = $_REQUEST['sttr_price'];
       $sttr_cust_price = $_REQUEST['sttr_cust_price'];
       $sttr_cust_itmcalby = $_REQUEST['sttr_cust_itmcalby'];
       $sttr_cust_itmcode = $_REQUEST['sttr_cust_itmcode'];
       $sttr_cust_itmnum = $_REQUEST['sttr_cust_itmnum'];
       $sttr_item_length = $_REQUEST['sttr_item_length'];
       $sttr_item_width = $_REQUEST['sttr_item_width'];
       $sttr_item_model_no = $_REQUEST['sttr_item_model_no'];
       $sttr_item_sales_pkg = $_REQUEST['sttr_item_sales_pkg'];
	   
        if ($sttr_final_quantity == '' || $sttr_final_quantity == NULL) { 
            $sttr_quantity = $sttr_quantity;
	} else {
            $sttr_quantity = $sttr_final_quantity;
	}
	   
        if($sttr_gs_weight_type=='GM')
        {
           $sttr_gs_weight_type='g';
        }
        else if($sttr_gs_weight_type=='KG')
        {
           $sttr_gs_weight_type='kg';
        }
	   
	if ($sttr_shopify_prod_id != '' && $sttr_shopify_prod_id != NULL) {
            $product_code = $sttr_shopify_prod_id;
	}
           
        if($sttr_status == 'SOLDOUT') {
           $sttr_quantity = 0;
        }
    
        $updateproducts_array = array(
        //    
        "product"=>array(

                "title"=>$sttr_item_name, //// required
                "body_html"=> $sttr_item_name,
                "vendor"=> $sttr_brand_id,
                "product_type"=> $sttr_item_category,
                "published"=> false ,
                "created_at"=> "2019-03-06T18:35:45+05:30",
                "handle"=> "burton-custom-freestyle-151",
                "updated_at"=> "2019-03-07T13:54:19+05:30",
                "published_at"=> "2019-03-06T18:35:45+05:30",
                "template_suffix"=> null,
                "tags"=> "\"Jewellery\"",
                "published_scope"=> "web",
                "admin_graphql_api_id"=> "gid://shopify/Product/$product_code",

                "variants" => array( array(
                                "option1" => "First",
                                "price" => $sttr_price,
                                "sku" => $sttr_item_code,
                                "inventory_quantity" => $sttr_quantity,
                                "old_inventory_quantity" => $sttr_quantity,
                                "inventory_management" => "shopify",//// customer name
                                "taxable" => false,                                 
                                "product_id"=> "",
                                "title"=> "First",            
                                "position"=> 1,            
                                "inventory_policy"=> "deny",
                                "compare_at_price"=> $sttr_cust_price,
                                "fulfillment_service"=> "manual",            
                                "option1"=> "",
                                "option2"=> null,
                                "option3"=> null,
                                "created_at"=> $sttr_add_date,
                                "updated_at"=> "2019-03-07T13:54:18+05:30",
                                "barcode"=> $sttr_barcode_prefix.$sttr_barcode,
                                "grams"=> 0,
                                "image_id"=> null,
                                "weight"=> $sttr_gs_weight,
                                "weight_unit"=> $sttr_gs_weight_type,
                                "inventory_item_id"=> 20192728645735,         
                                "requires_shipping"=> true,
                                "admin_graphql_api_id"=> "gid://shopify/ProductVariant/$product_code"
                            )
                        )
                )
            );

         
        
        //$url = "https://41a1621a549c91ac6d65716fd18c935b:7f0602c4ba9487282bfa4f00dd9319c1@sgen-shop.myshopify.com/admin/products/$product_code.json";
		
        //echo "URL==>".$url;
		
        $ch = curl_init("https://41a1621a549c91ac6d65716fd18c935b:7f0602c4ba9487282bfa4f00dd9319c1@sgen-shop.myshopify.com/admin/products/$product_code.json");
        //curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($updateproducts_array));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($curl, CURLOPT_VERBOSE, 1);
        //curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); /// PUT method for update
        //curl_setopt($curl, CURLOPT_PORT, 8080);
        
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($ch);
        curl_close($ch);  
        print_r($result);
}      
/// end function for Update product data in db in shopify 
//// start function delete product from db in shopify
 function DeleteData($operation,array $request,$product_code)
{
        $url = "https://41a1621a549c91ac6d65716fd18c935b:7f0602c4ba9487282bfa4f00dd9319c1@sgen-shop.myshopify.com/admin/products/$product_code.json";
     
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        //curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); /// DELETE method for update
        curl_setopt($curl, CURLOPT_PORT, 8080);
       // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($updateproducts_array));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($curl);
        if($response)
        {
            echo "Product deleted Sucessfully";
        }
        else
        {
            echo "Error Occured";
        }
    
        curl_close($curl);  
}
      
////// end function delete product from db in shopify      
///start  retrive/get all data from db 
      function getAllData($operation,array $request,$product_code){
		  
		 $sttr_shopify_prod_id =  $_REQUEST['sttr_shopify_prod_id'];
          
        if ($sttr_shopify_prod_id != '' && $sttr_shopify_prod_id != NULL) {
		    $product_code = $sttr_shopify_prod_id;
	    }
		
        //print_r($_REQUEST);
        //$url = "https://41a1621a549c91ac6d65716fd18c935b:7f0602c4ba9487282bfa4f00dd9319c1@sgen-shop.myshopify.com/admin/products/$product_code.json";
		
		//echo 'url == '.$url;die;
     
        $ch = curl_init("https://41a1621a549c91ac6d65716fd18c935b:7f0602c4ba9487282bfa4f00dd9319c1@sgen-shop.myshopify.com/admin/products/$product_code.json");
//        curl_setopt($ch, CURLOPT_URL, $url);      
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_VERBOSE, 1);
//        curl_setopt($ch, CURLOPT_HEADER, 1);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); /// GET method for update
//        curl_setopt($ch, CURLOPT_PORT, 8080);
//        //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($updateproducts_array));
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($ch);
        curl_close($ch);
       
        print_r($result);
         
      }
      
      
      // Start retrive/get all data from db 
      function getAllDataFromShopify($operation){

        $ch = curl_init("https://41a1621a549c91ac6d65716fd18c935b:7f0602c4ba9487282bfa4f00dd9319c1@sgen-shop.myshopify.com/admin/products.json");
     
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); // GET method for update
        $result = curl_exec($ch);
        curl_close($ch);
        print_r($result);
         
      }
      // End retrive/get all data from db 
      
   } 
?>