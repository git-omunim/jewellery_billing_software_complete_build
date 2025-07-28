<?php @"SourceGuardian"; //v10.1.6
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$msg.="</body></html>";}die($__msg);exit();}}return sg_load('814CDB4A8D682710AAQAAAAWAAAABIgAAACABAAAAAAAAAD/67TEHpMHEyhcuwqFz3nrdFNUYa8jC5HSj6yEJ1DI23Yi39NDNvMyKSBNSVfQq6gGY2zUPy7mPVdrRisiIUZibmOuyBkKQwpBk8cMobP6FdGXtWqrZiwlugGDAkNveYH581+vr9NJ8brdquie1vM836c7v8C6+/W8JTzLub9mZD7KrwM5+ol0PTUAAADYAQAAoe6UaMKu0fbYnLOVYPye9w5SphOPhjw948vcYxf3zTALRu0eH12ygFs3QFNQv9P9H18TJj4I7uWPAChk6LRAbOt0me7E+O/EzJbu2/pMQ67wLPv2I2nl4X7+iShthdzqs8QGnlp1yt5y2Rlf6z6VuWc4CGNmoGtOHewdmEVEWcHYAPITyv4Ux2ct2CZqmF7sJBogCT4sVcuBwGhH1GgkCYLZ9FBDhMUGcwZvrc0ZPfEfGAF7nf+mg/xUZwZ57br5txZfSQq1r2g5OFEVtPwtQdjVl1D2kg3MPuZpSG5N03+0rfj0ZVf98Dtx+avSpafj9IYBZ0sptREWWqjjMk0ZWIfuSQEnDy2N6bFsKrLqw+zQm8DNbnl9ENNTsObgX81cMO5vEeJp/3C69yMGCc485LjOO2fTvJSAJLI5Y+tBDnbdRquDNHqRA/4ZShJZgPBuJQRP0sJ8789jOWE56fwD1r9WX7cNruykacW5loQZaMeaeyC9bGkkFPh3TqZpFis+n+qqe1LiEHvmVaP/NAES7aJsloZ37VjuAL0bs4ioDGH/h6RH4NMS7qj3d2tNajpWkbfYp/YIdIpze3VRPwwVLEwyn7oPM66olDM/JQU8bVyUhodTR+7UuTYAAADoAQAAbcaFqZ2SkeHVtL26iZX4Lg+Kh23aEyxZEV1dIQaHPulCiFW3quhv0lApflOZnOiGKCVKTDwoWN25ctH3PDdsgFFvEd2/Hca+rE8mN4hFKXc3eFOeYbOpFazcFi04K98qMvMqvMxeNaiyHLkB/nvrf4QXb7I0Fn3OuRqSxXL9fVCJ7RU+AYpcHHmXsXgfFYGzX+yhKN0jIbBFjcbf1ObVdyyjLDCjYhyTYZVOVUQBBCSL2/RUf+WhXbPH3AMINJVl+T1x7X4TEImsw/DbJvu0oQ4uGuBLgDtIG7asaryc0+FiFOtiaXe8JQIOZH+HYSgjeH3PXFP/7uLr4nAF9UFkHUCy1wYed7e7dU/GxLQ1qEJgoONPCCbFyboSqLWa/+I8DyB/AtXMumvRMyhhXZj2tWVy4wsyd/MavDtqqWBvjHJ6V5S0ayHyCPWOfSH1nN6Rql4rpPRkDeZiDxrb7SRYF0vZgHDP1lTEtuDZl7ZnIGUXH/V7s87GllCD2GsOZRIvqb1U7luWAksS9OCGocDcVD/P3vHrbeN8y5TuI4TxcnKYR976CjjkZG8XiO5CE80pN3GossX0I+ioacg+UMkDHge1jZ2UKHEb//TR+XKi0pqKw8dxroRRpstqyMGZuVKrmia4HgO3ogQ3AAAA6AEAAORnG/oG+vunTbsRJsgIczWxc4kkK8fB74hr4eC3W8xyGMd+xcvJD+ozZroO5jo9WTmzRo9ocQKlH5z7P88JYUEzNWD03B5dZXcSqyrgRU+SI2wtUt20CBcYo1VrghGAE+02u6EnTAwEE8euYcDyHpZg5IIW5XQDM8psvLNweDdsrpMWL9qVkJ6PdMBD8uuoTp9fhYGXE1ULQSPKIjFllrq5gQLly366TtzNI+z5zevYExN+tT2Kgb1B64/a3vkPepnYJVuKnxoaUDbB5RelHziFzd0KeOzIa7ynrEjfasUDD2isTRyxH+mgZm931RmrS+0FB0emZkXDlTRyfjYnubdlcgDOtFrWNVSlZDU/IX2CelSNmO7gkoOzVM+8T3ICTXRxjZqYSxcVn+VsG4yv+B7zV5WU3B+hHoflhdsug18m0aaZxuWbbLEEEVPljQXUSkBpj3RkQAeC84W4Nfih5WkWAMDKKKR8y0rIo5zJmre9Orvtdx7x6oYVvGPDprDlSjcXD1nrvFDTRjUHFLz8lDW4JiUPKPti17Ehkel6kCemm7cACyLktktKGwndnTaTLChKgeqtBwlRKX8gBsg7wOxcVKleMa+Gq+0zaG6syZxrM+598TPeouzsvUpZvc/Lh5T6d1GZLo7aOAAAAPABAADwSJINFlr9HdXuKHJxhY3eNOm8HaI2kCwpLcP79j3GNszjfvSCSZ9XKLNeMzRea7+ko/Ze4MfSu4MCWn3be2e3L8e4oKfrY5qIm9BoPkkkxVuPc1kr6uG+1QPeIM8xA10f5hpTaJoiM0qUc4yv2AQwYlPb+weZRMqJwH4SZKLhMQv6r8k3z6DdWkFABvy3DbCPPJLIzk/Gm1D6GzjNld9Ar6aOUIScoWvh1tq6RzjnHGu4shBwI703Tq4ugW4H2Aoo9AoyQ61Dxr1qCkxazyuyvtsciV3f5qMWOBe9L4zkRi67JuL5aFBQiPw/jZGnsGJMjxSt22qzxD6ptxDUL/yXz14FVS1vlNh6nqOafQFb2q85jfKbgdki5tyEzEgaFnvanpzNDfVgNATqACwBoOgwNahZ8fbzrIcsSyA65bjaZMynLjTMnoHxVrbfNTFC+UW1Au6jL977gfkt31mY6pTtaiN5uNn0KZG3SuF+kXt59gYmuCVk/1kAKM/8kOjUG3xQXjj91LRBbcQigi/MAJc3yV8RX/cBWJEsC1vDSwzr2cbvk5wdGNtZeKg3qix32wWWpIRJ1OpVwYV8kd5TGAxim4NIWk8/zI3aetzpXHuuWz/Xb+fnSDHj2oZ4CLOFTc7nAAZX48py/NRFMx2sVr4ZAAAAAA==');

 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='ommobile'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omlite'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='omsai'
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='omsai'
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='omsai'
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='omsai'
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='omsai'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='dev10'
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='dev10'
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='dev10'
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='dev10'
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='pranali10'
 loginDetailsFound:  SELECT * FROM owner WHERE own_userid='pranali10'
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='pranali10'
 own_staff_id0:
 loginDetailsFound:1  SELECT * FROM owner WHERE own_userid='dev10'
 own_staff_id0: