<?php @"SourceGuardian"; //v10.1.6
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');

 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='101972' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='101972' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='101972' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='101972' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='101972' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [userId] =>  10001
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => CHAIN
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [om_prod_key] => 101972
    [om_login_id] => ommobile
    [PHPSESSID] => 3dc70f0e47e17df35da8775b17f4a794
    [om_google_sugg_srchstr] => CHAIN
    [dbName] => loveras1_101972
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [gmWtInGm] => 10
    [gmWtInKg] => 100
    [gmWtInMg] => 10000
    [srGmWtInGm] => 1000
    [srGmWtInKg] => 1
    [srGmWtInMg] => 1000000
    [othGmWtInGm] => 1
    [othGmWtInKg] => 1000
    [othGmWtInMg] => 1000
    [sttr_noofprod] => 0
    [prodDOBDay] => 05
    [prodDOBMonth] => JUL
    [prodDOBYear] => 2022
    [sttr_firm_id] => 1
    [sttr_pre_invoice_no] => IO
    [sttr_invoice_no] => 1
    [sttr_delivery_date_day] => 05
    [sttr_delivery_date_month] => JUL
    [sttr_delivery_date_year] => 2022
    [sttr_temp_merge_count] => 0
    [sttr_temp_item_pre_id] => CH
    [sttr_temp_item_post_id] => 1
    [sttr_trans_id0] => ST62C44395BEE9F
    [sttr_panel_name0] => addNewOrder
    [sttr_metal_type0] => GOLD
    [sttr_metal_type] => 
    [sttr_metal_rate0] => 
    [sttr_metal_rate] => 
    [sttr_stone_less_weight0] => 0
    [sttr_item_code] => 
    [sttr_add_date] => 05 JUL 2022
    [sttr_delivery_date] => 05 JUL 2022
    [sttr_item_code0] => O-CH#1
    [sttr_add_date0] => 
    [sttr_delivery_date0] => 
    [sttr_metal_rate_id0] => 
    [mainPanelName0] => addNewOrder
    [panelName0] => addNewOrder
    [documentRootPath0] => http://192.168.1.116:8080/2
    [operation] => insert
    [sttrId0] => 
    [sttr_id0] => 
    [sttr_user_id0] => 10001
    [sttr_owner_id0] => 101972
    [sttr_sttr_id0] => 
    [sttr_sttrin_id0] => 
    [sttr_indicator0] => stock
    [sttr_transaction_type0] => newOrder
    [sttr_stock_type0] => retail
    [sttr_final_val_by0] => 
    [sttr_final_valuation_by0] => 
    [sttr_cust_wastg_by0] => 
    [sttr_value_added_by0] => 
    [sttr_other_charges_by0] => 
    [sttr_mkg_charges_by0] => 
    [sttr_wt_auto_less0] => 
    [sttr_mkg_discount_type0] => per
    [sttr_other_discount_type0] => per
    [sttr_lab_discount_type0] => per
    [sttr_metal_discount_type0] => per
    [sttr_stone_discount_type0] => per
    [sttr_noofprod0] => 0
    [prodMergedCount] => 0
    [transPanelName] => NewOrderPayment
    [payPanelName] => NewOrderPayment
    [hidden_sttr_wastage0] => 
    [hidden_sttr_purity0] => 100
    [hidden_sttr_making_charges0] => 
    [hidden_sttr_making_charges_type0] => 
    [hidden_sttr_lab_charges0] => 
    [hidden_sttr_lab_charges_type0] => 
    [sttr_product_type0] => GOLD
    [sttr_item_category0] => chain
    [sttr_item_name0] => chain
    [sttr_item_pre_id0] => O-CH#
    [sttr_item_id0] => 1
    [sttr_quantity0] => 1
    [sttr_gs_weight0] => 10.000
    [sttr_gs_weight_type0] => GM
    [sttr_pkt_weight0] => 0.000
    [sttr_pkt_weight_type0] => GM
    [sttr_nt_weight0] => 10.000
    [sttr_product_nt_weight0] => 10
    [sttr_nt_weight_type0] => GM
    [sttr_fine_weight0] => 10.000
    [sttr_final_fine_weight0] => 10.000
    [sttr_purity0] => 100
    [sttr_wastage0] => 
    [sttr_final_purity0] => 100
    [sttr_cust_wastage0] => 
    [sttr_cust_wastage_wt0] => 
    [sttr_value_added0] => 0
    [sttr_hsn_no0] => 
    [sttr_product_sell_rate0] => 50000
    [sttr_making_charges0] => 
    [sttr_making_charges_type0] => PP
    [sttr_total_making_charges0] => 0
    [sttr_other_charges0] => 
    [sttr_other_charges_type0] => PP
    [sttr_total_other_charges0] => 0
    [sttr_valuation0] => 50000.00
    [sttr_final_taxable_amt0] => 50000.00
    [sttr_tot_price_cgst_per0] => 0
    [sttr_tot_price_cgst_chrg0] => 0.00
    [sttr_tot_price_sgst_per0] => 0
    [sttr_tot_price_sgst_chrg0] => 0.00
    [sttr_tot_price_igst_per0] => 0
    [sttr_tot_price_igst_chrg0] => 0.00
    [sttr_tot_tax0] => 0.00
    [sttr_size0] => 
    [sttr_item_length0] => 
    [sttr_shape0] => 
    [sttr_color0] => 
    [sttr_image_id0] => 
    [imageLoadOption0] => 
    [compressedImage0] => 
    [compressedImageThumb0] => 
    [compressedImageSize0] => 
    [fileName0] => 
    [webcam_file0] => 
    [sttr_final_valuation0] => 50000.00
    [sttr_total_final_valuation] => 50000.00
    [same_product] => YES
    [om_prod_key] => 101972
    [om_login_id] => ommobile
    [PHPSESSID] => 3dc70f0e47e17df35da8775b17f4a794
    [om_google_sugg_srchstr] => 100
    [dbName] => loveras1_101972
    [dbUser] => root
    [dbPass] => omrolrsr
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [userId] =>  10002
    [transType] => newOrder
    [prodType] => Gold
    [prodCategory] => 
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [om_prod_key] => 101148
    [om_login_id] => omlite
    [om_google_sugg_srchstr] => gold
    [PHPSESSID] => c7d4c75d561d76f70f0b5e4e5474fd09
    [dbName] => loveras1_101148
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [userId] =>  10002
    [transType] => newOrder
    [prodType] => Gold
    [prodCategory] => 
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [om_prod_key] => 101148
    [om_login_id] => omlite
    [om_google_sugg_srchstr] => %
    [PHPSESSID] => c7d4c75d561d76f70f0b5e4e5474fd09
    [dbName] => loveras1_101148
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='101332' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 qSelectItemDetails:SELECT *, i.image_snap_ftype FROM stock_transaction s LEFT JOIN image AS i ON s.sttr_image_id=i.image_id WHERE sttr_owner_id='102424' AND sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG')  AND sttr_indicator IN ('stock','stockCrystal')  AND sttr_stock_type IN ('retail')  AND sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') ORDER BY sttr_id DESC LIMIT 0,30
 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12483
    [transType] => RepairItem
    [prodType] => GOLD
    [prodCategory] => yugyu
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => yugyu
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => RepairItem
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12483
    [transType] => RepairItem
    [prodType] => GOLD
    [prodCategory] => hnhj
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => hnhj
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => RepairItem
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [gmWtInGm] => 10
    [gmWtInKg] => 100
    [gmWtInMg] => 10000
    [srGmWtInGm] => 10000
    [srGmWtInKg] => 10
    [srGmWtInMg] => 10000000
    [othGmWtInGm] => 10
    [othGmWtInKg] => 100
    [othGmWtInMg] => 10000
    [sttr_noofprod] => 0
    [prodDOBDay] => 28
    [prodDOBMonth] => APR
    [prodDOBYear] => 2023
    [sttr_firm_id] => 1
    [sttr_pre_invoice_no] => IN1
    [sttr_invoice_no] => 1
    [sttr_temp_merge_count] => 
    [sttr_temp_item_pre_id] => 
    [sttr_temp_item_post_id] => 
    [sttr_trans_id0] => ST644B5FE883420
    [sttr_panel_name0] => ADD_REPAIR_ITEMS
    [sttr_metal_type0] => GOLD
    [sttr_metal_type] => 
    [sttr_metal_rate0] => 
    [sttr_metal_rate] => 
    [sttr_stone_less_weight0] => 0
    [sttr_final_fine_weight0] => 
    [sttr_fix_pkt_weight0] => 
    [sttr_final_purity0] => 
    [sttr_item_code] => 
    [sttr_add_date] => 28 APR 2023
    [sttr_mfg_date] => 
    [sttr_exp_date] => 
    [sttr_delivery_date] =>   
    [sttr_item_code0] => 
    [sttr_add_date0] => 
    [sttr_mfg_date0] => 
    [sttr_exp_date0] => 
    [sttr_delivery_date0] => 
    [sttr_metal_rate_id0] => 
    [mainPanelName0] => ADD_REPAIR_ITEMS
    [panelName0] => ADD_REPAIR_ITEMS
    [documentRootPath0] => http://127.0.0.1:8080/2
    [operation] => insert
    [sttrId0] => 
    [sttr_id0] => 
    [sttr_user_id0] => 12483
    [sttr_owner_id0] => 102424
    [sttr_sttr_id0] => 
    [sttr_sttrin_id0] => 
    [sttr_indicator0] => stock
    [sttr_transaction_type0] => RepairItem
    [sttr_stock_type0] => wholesale
    [sttr_final_val_by0] => 
    [sttr_final_valuation_by0] => 
    [sttr_cust_wastg_by0] => 
    [sttr_value_added_by0] => 
    [sttr_other_charges_by0] => 
    [sttr_mkg_charges_by0] => 
    [sttr_wt_auto_less0] => 
    [sttr_mkg_discount_type0] => per
    [sttr_other_discount_type0] => per
    [sttr_lab_discount_type0] => per
    [sttr_metal_discount_type0] => per
    [sttr_stone_discount_type0] => per
    [sttr_noofprod0] => 
    [prodMergedCount] => 0
    [transPanelName] => ItemRepairPayment
    [payPanelName] => ItemRepairPayment
    [hidden_sttr_wastage0] => 
    [hidden_sttr_purity0] => 
    [hidden_sttr_making_charges0] => 
    [hidden_sttr_making_charges_type0] => 
    [hidden_sttr_lab_charges0] => 
    [hidden_sttr_lab_charges_type0] => 
    [sttr_final_taxable_amt0] => 13734.00
    [sttr_product_sell_rate_type0] => GM
    [sttr_pkt_weight0] => 0
    [sttr_pkt_weight_type0] => GM
    [sttr_nt_weight0] => 4.000
    [sttr_nt_weight_type0] => GM
    [sttr_purity0] => 
    [sttr_fine_weight0] => 0
    [sttr_total_lab_charges0] => 0
    [sttr_final_valuation0] => 13734.00
    [sttr_product_type0] => GOLD
    [sttr_item_category0] => hnhj
    [sttr_item_name0] => jn jn
    [sttr_quantity0] => 1
    [sttr_gs_weight0] => 4.000
    [sttr_gs_weight_type0] => GM
    [sttr_other_info0] => kmlkm
    [sttr_add_on_weight_product_type0] => GOLD
    [sttr_add_on_weight0] => 4.000
    [sttr_add_on_weight_type0] => GM
    [sttr_product_sell_rate0] => 34335
    [sttr_valuation0] => 13734.00
    [sttr_lab_charges0] => 
    [sttr_lab_charges_type0] => PP
    [sttr_total_final_valuation] => 13734.00
    [same_product] => YES
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => %
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [sttr_item_pre_id0] => #
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [divPanel] => OwnerHome
    [divMainMiddlePanel] => CustHome
    [userId] => 12483
    [panelDivName] => ADD_REPAIR_ITEMS
    [panelName] => ADD_REPAIR_ITEMS
    [mainPanel] => ADD_REPAIR_ITEMS
    [operation] => insert
    [indicator] => stock
    [transactionType] => RepairItem
    [firmId] => 1
    [stockType] => wholesale
    [prodPreInvNo] => IN1
    [prodInvNo] => 1
    [paymentPanelDisp] => YES
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => %
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [mainPanelName] => ADD_REPAIR_ITEMS
    [custId] => 12483
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => RepairItem
    [sttr_product_type] => 
    [sttr_item_category] => Dia :
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12482
    [transType] => RepairItem
    [prodType] => GOLD
    [prodCategory] => ribg
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => ribg
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => RepairItem
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [gmWtInGm] => 10
    [gmWtInKg] => 100
    [gmWtInMg] => 10000
    [srGmWtInGm] => 10000
    [srGmWtInKg] => 10
    [srGmWtInMg] => 10000000
    [othGmWtInGm] => 10
    [othGmWtInKg] => 100
    [othGmWtInMg] => 10000
    [sttr_noofprod] => 0
    [prodDOBDay] => 28
    [prodDOBMonth] => APR
    [prodDOBYear] => 2023
    [sttr_firm_id] => 1
    [sttr_pre_invoice_no] => IN1
    [sttr_invoice_no] => 2
    [sttr_temp_merge_count] => 
    [sttr_temp_item_pre_id] => 
    [sttr_temp_item_post_id] => 
    [sttr_trans_id0] => ST644B68CA609AA
    [sttr_panel_name0] => ADD_REPAIR_ITEMS
    [sttr_metal_type0] => GOLD
    [sttr_metal_type] => 
    [sttr_metal_rate0] => 
    [sttr_metal_rate] => 
    [sttr_stone_less_weight0] => 0
    [sttr_final_fine_weight0] => 
    [sttr_fix_pkt_weight0] => 
    [sttr_final_purity0] => 
    [sttr_item_code] => 
    [sttr_add_date] => 28 APR 2023
    [sttr_mfg_date] => 
    [sttr_exp_date] => 
    [sttr_delivery_date] =>   
    [sttr_item_code0] => 
    [sttr_add_date0] => 
    [sttr_mfg_date0] => 
    [sttr_exp_date0] => 
    [sttr_delivery_date0] => 
    [sttr_metal_rate_id0] => 
    [mainPanelName0] => ADD_REPAIR_ITEMS
    [panelName0] => ADD_REPAIR_ITEMS
    [documentRootPath0] => http://127.0.0.1:8080/2
    [operation] => insert
    [sttrId0] => 
    [sttr_id0] => 
    [sttr_user_id0] => 12482
    [sttr_owner_id0] => 102424
    [sttr_sttr_id0] => 
    [sttr_sttrin_id0] => 
    [sttr_indicator0] => stock
    [sttr_transaction_type0] => RepairItem
    [sttr_stock_type0] => wholesale
    [sttr_final_val_by0] => 
    [sttr_final_valuation_by0] => 
    [sttr_cust_wastg_by0] => 
    [sttr_value_added_by0] => 
    [sttr_other_charges_by0] => 
    [sttr_mkg_charges_by0] => 
    [sttr_wt_auto_less0] => 
    [sttr_mkg_discount_type0] => per
    [sttr_other_discount_type0] => per
    [sttr_lab_discount_type0] => per
    [sttr_metal_discount_type0] => per
    [sttr_stone_discount_type0] => per
    [sttr_noofprod0] => 
    [prodMergedCount] => 0
    [transPanelName] => ItemRepairPayment
    [payPanelName] => ItemRepairPayment
    [hidden_sttr_wastage0] => 
    [hidden_sttr_purity0] => 
    [hidden_sttr_making_charges0] => 
    [hidden_sttr_making_charges_type0] => 
    [hidden_sttr_lab_charges0] => 
    [hidden_sttr_lab_charges_type0] => 
    [sttr_final_taxable_amt0] => 5550.00
    [sttr_product_sell_rate_type0] => GM
    [sttr_pkt_weight0] => 0
    [sttr_pkt_weight_type0] => GM
    [sttr_nt_weight0] => 2.000
    [sttr_nt_weight_type0] => GM
    [sttr_purity0] => 
    [sttr_fine_weight0] => 0
    [sttr_total_lab_charges0] => 0
    [sttr_final_valuation0] => 5550.00
    [sttr_product_type0] => GOLD
    [sttr_item_category0] => ribg
    [sttr_item_name0] => lring
    [sttr_quantity0] => 1
    [sttr_gs_weight0] => 2.000
    [sttr_gs_weight_type0] => GM
    [sttr_other_info0] => repair
    [sttr_add_on_weight_product_type0] => GOLD
    [sttr_add_on_weight0] => 1.000
    [sttr_add_on_weight_type0] => GM
    [sttr_product_sell_rate0] => 55500
    [sttr_valuation0] => 5550.00
    [sttr_lab_charges0] => 
    [sttr_lab_charges_type0] => PP
    [sttr_total_final_valuation] => 5550.00
    [same_product] => YES
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => %
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [sttr_item_pre_id0] => #
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [divPanel] => OwnerHome
    [divMainMiddlePanel] => CustHome
    [userId] => 12482
    [panelDivName] => ADD_REPAIR_ITEMS
    [panelName] => ADD_REPAIR_ITEMS
    [mainPanel] => ADD_REPAIR_ITEMS
    [operation] => insert
    [indicator] => stock
    [transactionType] => RepairItem
    [firmId] => 1
    [stockType] => wholesale
    [prodPreInvNo] => IN1
    [prodInvNo] => 2
    [paymentPanelDisp] => YES
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => %
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [mainPanelName] => ADD_REPAIR_ITEMS
    [custId] => 12482
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => RepairItem
    [sttr_product_type] => 
    [sttr_item_category] => RINGS
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12483
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => r
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => r
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [gmWtInGm] => 10
    [gmWtInKg] => 100
    [gmWtInMg] => 10000
    [srGmWtInGm] => 10000
    [srGmWtInKg] => 10
    [srGmWtInMg] => 10000000
    [othGmWtInGm] => 10
    [othGmWtInKg] => 100
    [othGmWtInMg] => 10000
    [sttr_noofprod] => 0
    [prodDOBDay] => 28
    [prodDOBMonth] => APR
    [prodDOBYear] => 2023
    [sttr_firm_id] => 1
    [sttr_pre_invoice_no] => IO1
    [sttr_invoice_no] => 1
    [sttr_delivery_date_day] => 28
    [sttr_delivery_date_month] => APR
    [sttr_delivery_date_year] => 2023
    [sttr_temp_merge_count] => 0
    [sttr_temp_item_pre_id] => 
    [sttr_temp_item_post_id] => 1
    [sttr_trans_id0] => ST644B8F04A1548
    [sttr_panel_name0] => addNewOrder
    [sttr_metal_type0] => GOLD
    [sttr_metal_type] => 
    [sttr_metal_rate0] => 
    [sttr_metal_rate] => 
    [sttr_stone_less_weight0] => 0
    [sttr_item_code] => 
    [sttr_add_date] => 28 APR 2023
    [sttr_delivery_date] => 28 APR 2023
    [sttr_item_code0] => O-2#1
    [sttr_add_date0] => 
    [sttr_delivery_date0] => 
    [sttr_metal_rate_id0] => 
    [mainPanelName0] => addNewOrder
    [panelName0] => addNewOrder
    [documentRootPath0] => http://127.0.0.1:8080/2
    [operation] => insert
    [sttrId0] => 
    [sttr_id0] => 
    [sttr_user_id0] => 12483
    [sttr_owner_id0] => 102424
    [sttr_sttr_id0] => 
    [sttr_sttrin_id0] => 
    [sttr_indicator0] => stock
    [sttr_transaction_type0] => newOrder
    [sttr_stock_type0] => retail
    [sttr_final_val_by0] => 
    [sttr_final_valuation_by0] => 
    [sttr_cust_wastg_by0] => 
    [sttr_value_added_by0] => 
    [sttr_other_charges_by0] => 
    [sttr_mkg_charges_by0] => 
    [sttr_wt_auto_less0] => 
    [sttr_mkg_discount_type0] => per
    [sttr_other_discount_type0] => per
    [sttr_lab_discount_type0] => per
    [sttr_metal_discount_type0] => per
    [sttr_stone_discount_type0] => per
    [sttr_noofprod0] => 0
    [prodMergedCount] => 0
    [transPanelName] => NewOrderPayment
    [payPanelName] => NewOrderPayment
    [hidden_sttr_wastage0] => 
    [hidden_sttr_purity0] => 
    [hidden_sttr_making_charges0] => 
    [hidden_sttr_making_charges_type0] => 
    [hidden_sttr_lab_charges0] => 
    [hidden_sttr_lab_charges_type0] => 
    [sttr_product_type0] => GOLD
    [sttr_item_category0] => RINGS
    [sttr_item_name0] => BABY RING
    [sttr_item_pre_id0] => O-2#
    [sttr_item_id0] => 1
    [sttr_quantity0] => 1
    [sttr_gs_weight0] => 2.000
    [sttr_gs_weight_type0] => GM
    [sttr_pkt_weight0] => 0.000
    [sttr_pkt_weight_type0] => GM
    [sttr_nt_weight0] => 2.000
    [sttr_product_nt_weight0] => 2
    [sttr_nt_weight_type0] => GM
    [sttr_fine_weight0] => 2.000
    [sttr_final_fine_weight0] => 2.100
    [sttr_purity0] => 100
    [sttr_wastage0] => 5
    [sttr_final_purity0] => 105
    [sttr_cust_wastage0] => 
    [sttr_cust_wastage_wt0] => 
    [sttr_value_added0] => 12000
    [sttr_hsn_no0] => 
    [sttr_product_sell_rate0] => 49800
    [sttr_making_charges0] => 
    [sttr_making_charges_type0] => PP
    [sttr_total_making_charges0] => 0
    [sttr_other_charges0] => 
    [sttr_other_charges_type0] => PP
    [sttr_total_other_charges0] => 0
    [sttr_valuation0] => 22458.00
    [sttr_final_taxable_amt0] => 22458.00
    [sttr_tot_price_cgst_per0] => 0
    [sttr_tot_price_cgst_chrg0] => 0.00
    [sttr_tot_price_sgst_per0] => 0
    [sttr_tot_price_sgst_chrg0] => 0.00
    [sttr_tot_price_igst_per0] => 0
    [sttr_tot_price_igst_chrg0] => 0.00
    [sttr_tot_tax0] => 0.00
    [sttr_size0] => 
    [sttr_item_length0] => 
    [sttr_shape0] => 
    [sttr_color0] => 
    [sttr_image_id0] => 
    [imageLoadOption0] => 
    [compressedImage0] => 
    [compressedImageThumb0] => 
    [compressedImageSize0] => 
    [fileName0] => 
    [webcam_file0] => 
    [sttr_final_valuation0] => 22458.00
    [sttr_total_final_valuation] => 22458.00
    [same_product] => YES
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => 49800
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12482
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => ring
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => ring
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [gmWtInGm] => 10
    [gmWtInKg] => 100
    [gmWtInMg] => 10000
    [srGmWtInGm] => 10000
    [srGmWtInKg] => 10
    [srGmWtInMg] => 10000000
    [othGmWtInGm] => 10
    [othGmWtInKg] => 100
    [othGmWtInMg] => 10000
    [sttr_noofprod] => 0
    [prodDOBDay] => 28
    [prodDOBMonth] => APR
    [prodDOBYear] => 2023
    [sttr_firm_id] => 1
    [sttr_pre_invoice_no] => IO1
    [sttr_invoice_no] => 2
    [sttr_delivery_date_day] => 28
    [sttr_delivery_date_month] => APR
    [sttr_delivery_date_year] => 2023
    [sttr_temp_merge_count] => 0
    [sttr_temp_item_pre_id] => 
    [sttr_temp_item_post_id] => 1
    [sttr_trans_id0] => ST644B9D015BBAA
    [sttr_panel_name0] => addNewOrder
    [sttr_metal_type0] => GOLD
    [sttr_metal_type] => 
    [sttr_metal_rate0] => 
    [sttr_metal_rate] => 
    [sttr_stone_less_weight0] => 0
    [sttr_item_code] => 
    [sttr_add_date] => 28 APR 2023
    [sttr_delivery_date] => 28 APR 2023
    [sttr_item_code0] => O-#1
    [sttr_add_date0] => 
    [sttr_delivery_date0] => 
    [sttr_metal_rate_id0] => 
    [mainPanelName0] => addNewOrder
    [panelName0] => addNewOrder
    [documentRootPath0] => http://127.0.0.1:8080/2
    [operation] => insert
    [sttrId0] => 
    [sttr_id0] => 
    [sttr_user_id0] => 12482
    [sttr_owner_id0] => 102424
    [sttr_sttr_id0] => 
    [sttr_sttrin_id0] => 
    [sttr_indicator0] => stock
    [sttr_transaction_type0] => newOrder
    [sttr_stock_type0] => retail
    [sttr_final_val_by0] => 
    [sttr_final_valuation_by0] => 
    [sttr_cust_wastg_by0] => 
    [sttr_value_added_by0] => 
    [sttr_other_charges_by0] => 
    [sttr_mkg_charges_by0] => 
    [sttr_wt_auto_less0] => 
    [sttr_mkg_discount_type0] => per
    [sttr_other_discount_type0] => per
    [sttr_lab_discount_type0] => per
    [sttr_metal_discount_type0] => per
    [sttr_stone_discount_type0] => per
    [sttr_noofprod0] => 0
    [prodMergedCount] => 0
    [transPanelName] => NewOrderPayment
    [payPanelName] => NewOrderPayment
    [hidden_sttr_wastage0] => 
    [hidden_sttr_purity0] => 
    [hidden_sttr_making_charges0] => 
    [hidden_sttr_making_charges_type0] => 
    [hidden_sttr_lab_charges0] => 
    [hidden_sttr_lab_charges_type0] => 
    [sttr_product_type0] => GOLD
    [sttr_item_category0] => RINGS
    [sttr_item_name0] => aaa
    [sttr_item_pre_id0] => O-11#
    [sttr_item_id0] => 1
    [sttr_quantity0] => 1
    [sttr_gs_weight0] => 2.000
    [sttr_gs_weight_type0] => GM
    [sttr_pkt_weight0] => 0.000
    [sttr_pkt_weight_type0] => GM
    [sttr_nt_weight0] => 2.000
    [sttr_product_nt_weight0] => 2
    [sttr_nt_weight_type0] => GM
    [sttr_fine_weight0] => 1.832
    [sttr_final_fine_weight0] => 1.832
    [sttr_purity0] => 91.6
    [sttr_wastage0] => 
    [sttr_final_purity0] => 91.6
    [sttr_cust_wastage0] => 
    [sttr_cust_wastage_wt0] => 
    [sttr_value_added0] => 0
    [sttr_hsn_no0] => 
    [sttr_product_sell_rate0] => 35335
    [sttr_making_charges0] => 
    [sttr_making_charges_type0] => PP
    [sttr_total_making_charges0] => 0
    [sttr_other_charges0] => 
    [sttr_other_charges_type0] => PP
    [sttr_total_other_charges0] => 0
    [sttr_valuation0] => 6473.37
    [sttr_final_taxable_amt0] => 6473.37
    [sttr_tot_price_cgst_per0] => 0
    [sttr_tot_price_cgst_chrg0] => 0.00
    [sttr_tot_price_sgst_per0] => 0
    [sttr_tot_price_sgst_chrg0] => 0.00
    [sttr_tot_price_igst_per0] => 0
    [sttr_tot_price_igst_chrg0] => 0.00
    [sttr_tot_tax0] => 0.00
    [sttr_size0] => 
    [sttr_item_length0] => 
    [sttr_shape0] => 
    [sttr_color0] => 
    [sttr_image_id0] => 
    [imageLoadOption0] => 
    [compressedImage0] => 
    [compressedImageThumb0] => 
    [compressedImageSize0] => 
    [fileName0] => 
    [webcam_file0] => 
    [sttr_final_valuation0] => 6473.37
    [sttr_total_final_valuation] => 6473.37
    [same_product] => YES
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [om_google_sugg_srchstr] => 11
    [PHPSESSID] => c01f6edde0376d9fb1dacdeff093b415
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12484
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => 
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [PHPSESSID] => cca5b1dda9b0b5245166212f9a846727
    [om_google_sugg_srchstr] => %
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12484
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => 
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [PHPSESSID] => cca5b1dda9b0b5245166212f9a846727
    [om_google_sugg_srchstr] => %
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12484
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => 
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [PHPSESSID] => cca5b1dda9b0b5245166212f9a846727
    [om_google_sugg_srchstr] => %
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12484
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => 
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [PHPSESSID] => cca5b1dda9b0b5245166212f9a846727
    [om_google_sugg_srchstr] => %
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12484
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => 
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [PHPSESSID] => cca5b1dda9b0b5245166212f9a846727
    [om_google_sugg_srchstr] => %
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  
    [transType] => newOrder
    [prodType] => Imitation
    [prodCategory] => 
    [prodMergedCount] => 01
    [prevEntryByIndicator] => 
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [PHPSESSID] => cca5b1dda9b0b5245166212f9a846727
    [om_google_sugg_srchstr] => %
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => 
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  
    [transType] => newOrder
    [prodType] => STONE
    [prodCategory] => 
    [prodMergedCount] => 01
    [prevEntryByIndicator] => 
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [PHPSESSID] => cca5b1dda9b0b5245166212f9a846727
    [om_google_sugg_srchstr] => %
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => 
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12484
    [transType] => newOrder
    [prodType] => Gold
    [prodCategory] => rng
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [om_google_sugg_srchstr] => rng
    [PHPSESSID] => 20fd33d6206e5ae502925d57611f05cf
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [gmWtInGm] => 10
    [gmWtInKg] => 100
    [gmWtInMg] => 10000
    [srGmWtInGm] => 10000
    [srGmWtInKg] => 10
    [srGmWtInMg] => 10000000
    [othGmWtInGm] => 10
    [othGmWtInKg] => 100
    [othGmWtInMg] => 10000
    [sttr_noofprod] => 0
    [prodDOBDay] => 17
    [prodDOBMonth] => MAY
    [prodDOBYear] => 2023
    [sttr_firm_id] => 1
    [sttr_pre_invoice_no] => IO2
    [sttr_invoice_no] => 1
    [sttr_delivery_date_day] => 17
    [sttr_delivery_date_month] => MAY
    [sttr_delivery_date_year] => 2023
    [sttr_temp_merge_count] => 0
    [sttr_temp_item_pre_id] => 
    [sttr_temp_item_post_id] => 
    [sttr_trans_id0] => ST64645C7F8DD0C
    [sttr_panel_name0] => addNewOrder
    [sttr_metal_type0] => Gold
    [sttr_metal_type] => 
    [sttr_metal_rate0] => 
    [sttr_metal_rate] => 
    [sttr_stone_less_weight0] => 0
    [sttr_item_code] => 
    [sttr_add_date] => 17 MAY 2023
    [sttr_delivery_date] => 17 MAY 2023
    [sttr_item_code0] => O-#
    [sttr_add_date0] => 
    [sttr_delivery_date0] => 
    [sttr_metal_rate_id0] => 
    [mainPanelName0] => addNewOrder
    [panelName0] => addNewOrder
    [documentRootPath0] => http://127.0.0.1:8080/2
    [operation] => insert
    [sttrId0] => 
    [sttr_id0] => 
    [sttr_user_id0] => 12484
    [sttr_owner_id0] => 102424
    [sttr_sttr_id0] => 
    [sttr_sttrin_id0] => 
    [sttr_indicator0] => stock
    [sttr_transaction_type0] => newOrder
    [sttr_stock_type0] => retail
    [sttr_final_val_by0] => 
    [sttr_final_valuation_by0] => 
    [sttr_cust_wastg_by0] => 
    [sttr_value_added_by0] => 
    [sttr_other_charges_by0] => 
    [sttr_mkg_charges_by0] => 
    [sttr_wt_auto_less0] => 
    [sttr_mkg_discount_type0] => per
    [sttr_other_discount_type0] => per
    [sttr_lab_discount_type0] => per
    [sttr_metal_discount_type0] => per
    [sttr_stone_discount_type0] => per
    [sttr_noofprod0] => 0
    [prodMergedCount] => 0
    [transPanelName] => NewOrderPayment
    [payPanelName] => NewOrderPayment
    [hidden_sttr_wastage0] => 
    [hidden_sttr_purity0] => 
    [hidden_sttr_making_charges0] => 
    [hidden_sttr_making_charges_type0] => 
    [hidden_sttr_lab_charges0] => 
    [hidden_sttr_lab_charges_type0] => 
    [sttr_product_type0] => Gold
    [sttr_item_category0] => RINGS
    [sttr_item_name0] => Ring
    [sttr_item_pre_id0] => O-12#
    [sttr_item_id0] => 1
    [sttr_quantity0] => 2
    [sttr_gs_weight0] => 10.000
    [sttr_gs_weight_type0] => GM
    [sttr_pkt_weight0] => 0.000
    [sttr_pkt_weight_type0] => GM
    [sttr_nt_weight0] => 10.000
    [sttr_product_nt_weight0] => 10
    [sttr_nt_weight_type0] => GM
    [sttr_fine_weight0] => 9.160
    [sttr_final_fine_weight0] => 9.260
    [sttr_purity0] => 91.6
    [sttr_wastage0] => 1
    [sttr_final_purity0] => 92.6
    [sttr_cust_wastage0] => 
    [sttr_cust_wastage_wt0] => 
    [sttr_value_added0] => 0
    [sttr_hsn_no0] => 12
    [sttr_product_sell_rate0] => 37725
    [sttr_making_charges0] => 
    [sttr_making_charges_type0] => PP
    [sttr_total_making_charges0] => 0
    [sttr_other_charges0] => 
    [sttr_other_charges_type0] => PP
    [sttr_total_other_charges0] => 0
    [sttr_valuation0] => 34933.35
    [sttr_final_taxable_amt0] => 34933.35
    [sttr_tot_price_cgst_per0] => 0
    [sttr_tot_price_cgst_chrg0] => 0.00
    [sttr_tot_price_sgst_per0] => 0
    [sttr_tot_price_sgst_chrg0] => 0.00
    [sttr_tot_price_igst_per0] => 0
    [sttr_tot_price_igst_chrg0] => 0.00
    [sttr_tot_tax0] => 0.00
    [sttr_size0] => 
    [sttr_item_length0] => 
    [sttr_shape0] => 
    [sttr_color0] => 
    [sttr_image_id0] => 
    [imageLoadOption0] => 
    [compressedImage0] => 
    [compressedImageThumb0] => 
    [compressedImageSize0] => 
    [fileName0] => 
    [webcam_file0] => 
    [sttr_final_valuation0] => 34933.35
    [sttr_total_final_valuation] => 34933.35
    [same_product] => YES
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [om_google_sugg_srchstr] => ring
    [PHPSESSID] => 20fd33d6206e5ae502925d57611f05cf
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  12484
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => r
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [om_google_sugg_srchstr] => r
    [PHPSESSID] => 20fd33d6206e5ae502925d57611f05cf
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [gmWtInGm] => 10
    [gmWtInKg] => 100
    [gmWtInMg] => 10000
    [srGmWtInGm] => 10000
    [srGmWtInKg] => 10
    [srGmWtInMg] => 10000000
    [othGmWtInGm] => 10
    [othGmWtInKg] => 100
    [othGmWtInMg] => 10000
    [sttr_noofprod] => 0
    [prodDOBDay] => 17
    [prodDOBMonth] => MAY
    [prodDOBYear] => 2023
    [sttr_firm_id] => 1
    [sttr_pre_invoice_no] => IO2
    [sttr_invoice_no] => 2
    [sttr_delivery_date_day] => 17
    [sttr_delivery_date_month] => MAY
    [sttr_delivery_date_year] => 2023
    [sttr_temp_merge_count] => 0
    [sttr_temp_item_pre_id] => 111
    [sttr_temp_item_post_id] => 1
    [sttr_trans_id0] => ST6464716ECD575
    [sttr_panel_name0] => addNewOrder
    [sttr_metal_type0] => GOLD
    [sttr_metal_type] => 
    [sttr_metal_rate0] => 
    [sttr_metal_rate] => 
    [sttr_stone_less_weight0] => 0
    [sttr_item_code] => 
    [sttr_add_date] => 17 MAY 2023
    [sttr_delivery_date] => 17 MAY 2023
    [sttr_item_code0] => O-111#1
    [sttr_add_date0] => 
    [sttr_delivery_date0] => 
    [sttr_metal_rate_id0] => 
    [mainPanelName0] => addNewOrder
    [panelName0] => addNewOrder
    [documentRootPath0] => http://127.0.0.1:8080/2
    [operation] => insert
    [sttrId0] => 
    [sttr_id0] => 
    [sttr_user_id0] => 12484
    [sttr_owner_id0] => 102424
    [sttr_sttr_id0] => 
    [sttr_sttrin_id0] => 
    [sttr_indicator0] => stock
    [sttr_transaction_type0] => newOrder
    [sttr_stock_type0] => retail
    [sttr_final_val_by0] => 
    [sttr_final_valuation_by0] => 
    [sttr_cust_wastg_by0] => 
    [sttr_value_added_by0] => 
    [sttr_other_charges_by0] => 
    [sttr_mkg_charges_by0] => 
    [sttr_wt_auto_less0] => 
    [sttr_mkg_discount_type0] => per
    [sttr_other_discount_type0] => per
    [sttr_lab_discount_type0] => per
    [sttr_metal_discount_type0] => per
    [sttr_stone_discount_type0] => per
    [sttr_noofprod0] => 0
    [prodMergedCount] => 0
    [transPanelName] => NewOrderPayment
    [payPanelName] => NewOrderPayment
    [hidden_sttr_wastage0] => 
    [hidden_sttr_purity0] => 
    [hidden_sttr_making_charges0] => 
    [hidden_sttr_making_charges_type0] => 
    [hidden_sttr_lab_charges0] => 
    [hidden_sttr_lab_charges_type0] => 
    [sttr_product_type0] => GOLD
    [sttr_item_category0] => RINGS
    [sttr_item_name0] => Ring
    [sttr_item_pre_id0] => O-111#
    [sttr_item_id0] => 1
    [sttr_quantity0] => 1
    [sttr_gs_weight0] => 10.000
    [sttr_gs_weight_type0] => GM
    [sttr_pkt_weight0] => 0.000
    [sttr_pkt_weight_type0] => GM
    [sttr_nt_weight0] => 10.000
    [sttr_product_nt_weight0] => 10
    [sttr_nt_weight_type0] => GM
    [sttr_fine_weight0] => 9.160
    [sttr_final_fine_weight0] => 9.160
    [sttr_purity0] => 91.6
    [sttr_wastage0] => 
    [sttr_final_purity0] => 91.6
    [sttr_cust_wastage0] => 
    [sttr_cust_wastage_wt0] => 
    [sttr_value_added0] => 0
    [sttr_hsn_no0] => 222
    [sttr_product_sell_rate0] => 33535
    [sttr_making_charges0] => 
    [sttr_making_charges_type0] => PP
    [sttr_total_making_charges0] => 1
    [sttr_other_charges0] => 
    [sttr_other_charges_type0] => PP
    [sttr_total_other_charges0] => 0
    [sttr_valuation0] => 30718.06
    [sttr_final_taxable_amt0] => 30719.06
    [sttr_tot_price_cgst_per0] => 0
    [sttr_tot_price_cgst_chrg0] => 0.00
    [sttr_tot_price_sgst_per0] => 0
    [sttr_tot_price_sgst_chrg0] => 0.00
    [sttr_tot_price_igst_per0] => 0
    [sttr_tot_price_igst_chrg0] => 0.00
    [sttr_tot_tax0] => 0.00
    [sttr_size0] => 
    [sttr_item_length0] => 
    [sttr_shape0] => 
    [sttr_color0] => 
    [sttr_image_id0] => 
    [imageLoadOption0] => 
    [compressedImage0] => 
    [compressedImageThumb0] => 
    [compressedImageSize0] => 
    [fileName0] => 
    [webcam_file0] => 
    [sttr_final_valuation0] => 30719.06
    [sttr_total_final_valuation] => 30719.06
    [same_product] => YES
    [prodUpdMess] => NO
    [user_cookie_setting] => ACCEPTED
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [om_google_sugg_srchstr] => %
    [PHPSESSID] => 20fd33d6206e5ae502925d57611f05cf
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  10001
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => r
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [om_prod_key] => 102424
    [om_login_id] => dev10
    [PHPSESSID] => f02aa5c76f1330a2fb0d66904299de00
    [om_google_sugg_srchstr] => r
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [gmWtInGm] => 10
    [gmWtInKg] => 100
    [gmWtInMg] => 10000
    [srGmWtInGm] => 1000
    [srGmWtInKg] => 1
    [srGmWtInMg] => 1000000
    [othGmWtInGm] => 1
    [othGmWtInKg] => 1000
    [othGmWtInMg] => 1000
    [sttr_noofprod] => 0
    [prodDOBDay] => 20
    [prodDOBMonth] => JUN
    [prodDOBYear] => 2023
    [sttr_firm_id] => 1
    [sttr_pre_invoice_no] => IO
    [sttr_invoice_no] => 1
    [sttr_delivery_date_day] => 20
    [sttr_delivery_date_month] => JUN
    [sttr_delivery_date_year] => 2023
    [sttr_temp_merge_count] => 0
    [sttr_temp_item_pre_id] => n
    [sttr_temp_item_post_id] => 1
    [sttr_trans_id0] => ST64918A8722345
    [sttr_panel_name0] => addNewOrder
    [sttr_metal_type0] => GOLD
    [sttr_metal_type] => 
    [sttr_metal_rate0] => 
    [sttr_metal_rate] => 
    [sttr_stone_less_weight0] => 0
    [sttr_item_code] => 
    [sttr_add_date] => 20 JUN 2023
    [sttr_delivery_date] => 20 JUN 2023
    [sttr_item_code0] => O-n#1
    [sttr_add_date0] => 
    [sttr_delivery_date0] => 
    [sttr_metal_rate_id0] => 
    [mainPanelName0] => addNewOrder
    [panelName0] => addNewOrder
    [documentRootPath0] => http://127.0.0.1:8080/2
    [operation] => insert
    [sttrId0] => 
    [sttr_id0] => 
    [sttr_user_id0] => 10001
    [sttr_owner_id0] => 102424
    [sttr_sttr_id0] => 
    [sttr_sttrin_id0] => 
    [sttr_indicator0] => stock
    [sttr_transaction_type0] => newOrder
    [sttr_stock_type0] => retail
    [sttr_final_val_by0] => 
    [sttr_final_valuation_by0] => 
    [sttr_cust_wastg_by0] => 
    [sttr_value_added_by0] => 
    [sttr_other_charges_by0] => 
    [sttr_mkg_charges_by0] => 
    [sttr_wt_auto_less0] => 
    [sttr_mkg_discount_type0] => per
    [sttr_other_discount_type0] => per
    [sttr_lab_discount_type0] => per
    [sttr_metal_discount_type0] => per
    [sttr_stone_discount_type0] => per
    [sttr_noofprod0] => 0
    [prodMergedCount] => 0
    [transPanelName] => NewOrderPayment
    [payPanelName] => NewOrderPayment
    [hidden_sttr_wastage0] => 
    [hidden_sttr_purity0] => 
    [hidden_sttr_making_charges0] => 
    [hidden_sttr_making_charges_type0] => 
    [hidden_sttr_lab_charges0] => 
    [hidden_sttr_lab_charges_type0] => 
    [sttr_product_type0] => GOLD
    [sttr_item_category0] => r
    [sttr_item_name0] => k
    [sttr_item_pre_id0] => O-n#
    [sttr_item_id0] => 1
    [sttr_quantity0] => 1
    [sttr_gs_weight0] => 1.000
    [sttr_gs_weight_type0] => GM
    [sttr_pkt_weight0] => 0.000
    [sttr_pkt_weight_type0] => GM
    [sttr_nt_weight0] => 1.000
    [sttr_product_nt_weight0] => 1
    [sttr_nt_weight_type0] => GM
    [sttr_fine_weight0] => 0.910
    [sttr_final_fine_weight0] => 0.910
    [sttr_purity0] => 91
    [sttr_wastage0] => 
    [sttr_final_purity0] => 91
    [sttr_cust_wastage0] => 
    [sttr_cust_wastage_wt0] => 
    [sttr_value_added0] => 0
    [sttr_hsn_no0] => 1122
    [sttr_product_sell_rate0] => 30000
    [sttr_making_charges0] => 
    [sttr_making_charges_type0] => PP
    [sttr_total_making_charges0] => 0
    [sttr_other_charges0] => 
    [sttr_other_charges_type0] => PP
    [sttr_total_other_charges0] => 0
    [sttr_valuation0] => 2730.00
    [sttr_final_taxable_amt0] => 2730.00
    [sttr_tot_price_cgst_per0] => 0
    [sttr_tot_price_cgst_chrg0] => 0.00
    [sttr_tot_price_sgst_per0] => 0
    [sttr_tot_price_sgst_chrg0] => 0.00
    [sttr_tot_price_igst_per0] => 0
    [sttr_tot_price_igst_chrg0] => 0.00
    [sttr_tot_tax0] => 0.00
    [sttr_size0] => 
    [sttr_item_length0] => 
    [sttr_shape0] => 
    [sttr_color0] => 
    [sttr_image_id0] => 
    [imageLoadOption0] => 
    [compressedImage0] => 
    [compressedImageThumb0] => 
    [compressedImageSize0] => 
    [fileName0] => 
    [webcam_file0] => 
    [sttr_final_valuation0] => 2730.00
    [sttr_total_final_valuation] => 2730.00
    [same_product] => YES
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [om_prod_key] => 102424
    [om_login_id] => dev10
    [PHPSESSID] => f02aa5c76f1330a2fb0d66904299de00
    [om_google_sugg_srchstr] => 30000
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_102424
    [owner_login_id] => dev10
    [owner_user_staff_id] => 
    [userId] =>  10004
    [transType] => newOrder
    [prodType] => GOLD
    [prodCategory] => 
    [prodMergedCount] => 0
    [prevEntryByIndicator] => N
    [prevEntryByCustIndicator] => 
    [twk_uuid_61373e3b649e0a0a5cd500c1] => {\"uuid\":\"1.PUlFYIr9sg8ateCW4Ee1mfK0193EyrLdHVpubI6WCbB485mc7UADjhY54q7ddXbqtEbzLa5VRO1mAd5iZwupiIJir2H3IEH0v2PQTWwkfgxdOHnu6\",\"version\":3,\"domain\":\"127.0.0.1\",\"ts\":1683535769405}
    [om_prod_key] => 102424
    [om_login_id] => dev10
    [om_google_sugg_srchstr] => aa
    [PHPSESSID] => 358d2db729613729b22d6d533d926b27
    [dbName] => loveras1_102424
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => 
    [last_prod] => N
    [sttr_add_date] =>   
)

 New Request123: Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [SYSTEM_ONOFF] => 
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_103896
    [owner_login_id] => Dev11
    [owner_user_staff_id] => 
    [searchProductPreId] => DBL
    [searchProductPostId] => 1
    [userId] => 10200
    [panelName] => addNewOrder
    [transType] => newOrder
    [transactionType] => newOrder
    [sttr_status] => PaymentPending
    [indicator] => stock
    [om_prod_key] => 103896
    [om_login_id] => Dev11
    [om_google_sugg_srchstr] => %
    [PHPSESSID] => 5795461e995899187821f97ad68eda82
    [mainPanelName] => addNewOrder
    [custId] => 10200
    [dbName] => loveras1_103896
    [dbUser] => root
    [dbPass] => omrolrsr
    [stockFunction] => GetStockTransaction
    [sttr_id] => 
    [cust_id] => 
    [sttr_transaction_type] => newOrder
    [sttr_product_type] => 
    [sttr_item_category] => DIAMOND BALI
    [last_prod] => N
    [sttr_add_date] =>   
)
