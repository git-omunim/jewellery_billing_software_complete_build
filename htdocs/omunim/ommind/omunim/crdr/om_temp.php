<?php @"SourceGuardian"; //v10.1.6
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');

 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => GET_ALL_CRDR
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [user_id] => 
    [order_by] => DESC
)

 qSelectCrdrDetails:SELECT u.utin_id,u.utin_CRDR, u.utin_pre_invoice_no,u.utin_invoice_no, u.utin_date, t.user_type, t.user_fname, t.user_lname, t.user_mobile, t.user_city, u.utin_type, u.utin_transaction_type, c.utin_total_amt, c.utin_total_amt_deposit, c.utin_cash_balance, g.utin_gd_due_wt, g.utin_gd_due_wt_typ, s.utin_sl_due_wt, s.utin_sl_due_wt_typ  FROM user_transaction_invoice as u INNER JOIN firm AS f ON u.utin_firm_id=f.firm_id INNER JOIN user AS t ON u.utin_user_id=t.user_id AND t.user_status!='Released' LEFT JOIN user_transaction_invoice AS c ON u.utin_id=c.utin_id and (c.utin_amt_pay_chk!='checked' or c.utin_amt_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS g ON u.utin_id=g.utin_id and (g.utin_gd_pay_chk!='checked' or g.utin_gd_pay_chk IS NULL) LEFT JOIN user_transaction_invoice AS s ON u.utin_id=s.utin_id and (s.utin_sl_pay_chk!='checked' or s.utin_sl_pay_chk IS NULL) WHERE (((c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0) and (u.utin_transaction_type IN ('UDHAAR','OnPurchase','RECEIPT','PAYMENT'))) OR ((u.utin_transaction_type IN ('ADV MONEY','DEPOSIT','ADV RETURN','RECEIPT')) AND (c.utin_cash_balance>0 or g.utin_gd_due_wt>0 or s.utin_sl_due_wt>0))) AND (u.utin_status NOT IN ('deleted','Deleted','DELETED','PAID') AND (u.utin_amt_pay_chk IS NULL OR u.utin_amt_pay_chk NOT IN ('checked'))) ORDER BY u.utin_id DESC