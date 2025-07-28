<?php @"SourceGuardian"; //v10.1.6
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$msg.="</body></html>";}die($__msg);exit();}}return sg_load('814CDB4A8D682710AAQAAAAWAAAABIgAAACABAAAAAAAAAD/67TEHpMHEyhcuwqFz3nrdFNUYa8jC5HSj6yEJ1DI23Yi39NDNvMyKSBNSVfQq6gGY2zUPy7mPVdrRisiIUZibmOuyBkKQwpBk8cMobP6FdGXtWqrZiwlugGDAkNveYH581+vr9NJ8brdquie1vM836c7v8C6+/W8JTzLub9mZD7KrwM5+ol0PTUAAACgAgAAnXgQJMKYAvx6Qg1mkoSKzGRuG6WZwFYBW6FwUJ+7zgNfX1SVsZc/ObzzIapZAMRDEnPrUdxxiZjfbedWo7hv85UVo3/H5JbueJdQtbDMUDSaSXv2EzMcRta7feIATOjQ0shBgwO4ssRMYolettqUZBeajik4ZfJlJoPskjqvBmNkiv8GERqimolOUS0AecanUADjOVdcY0k1YGx1257I4kbpouFhNxSmSOAKVGquPA8cWjv/R5kCncCbMPFr/6EPJONAvjalSWP2NHxQoOReBvp94VOAxk1k0srHT3RBGCm+EmIj/uqb2I5f0Pfpupg4yI0jPJ7sTQafMXjelHGCYK4jCr2XiTNLlP93UuKw31sQyXkgGPSzm2xESm6NhTWgxQuIof/NoWipoN0IJL6f14NdF9BPoBFvl5sQTsbwm7nKXufEW4Z62exyXiaQGAgYLo4vkWAyLfypn49BuS7DWgC6f+mKM8BX26ESiFJnyGkkFvs12FY5wqomJqmi+9zx86BZ9UzMVaqUQuQNBJXx+eGmU3SAwjYsQmBOxZObfO6Up0zO+9bXqK9A0xLhzYOldss5R4uXrsz6N0D1SuYz53OivstcywoFKtOcbeN2lBTg2XOlAn4TxMSD+wiZhDynxQY2fhNgNDHtNh2lrrsZeu0LWCTFPKhVIl/v83VW0e8Uo/ugyl+N304E+p1Q95wIhrTyKbIBYdQ0qGtYh5tZNgfcVZ0HaG20fD8ADnMYms8C3VJ3vqEuRoBCSsJxvebhOkOuI9ZhsjYOxfe+YQdmDj4NHnIQMNxha/bDGm4HTdU5+kBA9sHS7XjlmzlqrsBgrkQuMUAbY+pAOHQeu8YbxwA+cEqQqPLJNxcS7s/242xth+uqX58gk8MTPGd4C2ByNgAAALACAADMed1GnukDXDKAR8fuq5xiQ41TXqiUXgkUtGQhDXjzk+IXAfKem9VGGF0CMZ9E//3y41Ge784I6mRU5IPzEsv/ASpboX+XTcSCSFaXJdAxVWMobS0JiXpxWNKF4SY9M1zTDvNaYAKYYpTcnzLp+cC3e1wwn3Yrg5F/d/X17Nu6ei9mV4bU/WzmWzCE3gOdfzEWTjnPVLd6E+os/Hweb2PO/ILUDpCbDWDFf20tn2l5Y7m0RPCQ8pqgZPF/hhXd3bSu0l9UQyjtxDTWcTAnktw4iBpoZwlTh0mvws37ewnmfWtdIJbH1Y7YCv27sWRQfvNEvgOb/+KtMfF3Ima8RXNp29RibkxjzcdFN93XjestQs3qtZpi430Ktr9GAbwsA6pUwjN6iP1WJ++tLyHZOVfDG9cEOR+g6HzAoznHTjHyXOQ2214XIN0xOtX2/ysMQwxtZxs861zIhKne9iygkqzfiDoTWakajDZoM2fGgr+4cnmRwpUOIVxuJ1uyCM5bTj6JQ1IlEVVfXNNZ1rc5pJXk7TnDAxXCJ+S1qPZN+TLq0UFrSAC9Y7kLzwX/EO8AqkjA2uBDl9UG9IPBkcwUlk1tJyjS8/YtBuolnArbijDkF18cyyxE9tExNsOxmFe/aI+KL0dzGEh/AIq6F6EteX5/vBRPtSt1zzLq47zxZLQEiZR59INbs8AG4PJuEhnGTHh1dmjjPaxj4XTiGXlkg9YxsohX9+flRgnaoLugEZrvK8Q2S4b7GfUBdJom9Q1EpwGyjTDGW8Nhqa/cLOEt6Ma7+lGqJyANV7VG5Lc1Bl97XXSFh4p5irFGaXwK5c9sSHPtmPukwIqywNZkz9cqnIO8zHnzXsp8PB1WUWEy+gE9oK/3KXG3fslhuwy/zJ2O/zSfTEaPMYjmVrA1/9hWaCgCNwAAALACAAAF4OYI79ZD98YfGD2XHFKLQ7UFGf1BwPrBee1RooGMlxhH7cZnjFspyKl4+NnSmomtkO8n94ZaIWzWFYTZX6ssgGOUrGX3YhP8SBZVzHiolnwPTEyOGuCvSjGdaoxymxghU4ENn9zMnzhvbzz85lLVZBM4OiMJOwIyZqL0jMAhVuZfh17A8UU83RE+YbatCe8EGMO0QcX06gVF1gBqEaqFuVK0qcyZIDFuCNH9RI2g1SbejiTNsVMufw+vVBUesdBzkO8AKPBBU9IRTHOiWveK7E/3RMhdcGbBExrRYnPYsr6gZeXTIGvKQ9g4cNBcp509NxfIIQEZaf4ohquOSLLabXLYVhfUG6OWOL303CvAevp6CJlbt6Cy1pyNZX/dze+gMC+gfqQP+tv97D5riG0tjfEvP44KYbUQ5E4/bqxoU1rY7y2T40+M51nlrJXqronvp1CAokJmyjyJdTclHT32O6/BDvPRN85JL1PPfKcvia5OZ6+HzxbwXUV09iytnbzwvXBYm6cJ+wRzyvi/4EVldBkjMsku5ijUJmESEWEIdQJ6ugF2TKZEyznKJOt4514pntUksHZWcqZAzZZQOg8uF3/bbr3B3unWzJ9mDA3f+P8+qH8IxsViOXtarAZIfF1GrH74GtWW2j8FsEy9q62/Sfkk6o+wT7fgeu9o4mO4YT3gU+0D2aBHlvvru7Lc9qvI59D709SAmGpf9+DzX2hQkmCQQacGFXAIZ8dl4O+MjKRiEeqywprdy3Ac5P4ZKQs5y3zilB1x/uCsJR/XnTRTRfZLRtu7x/MtR996fJr7I5GDqf+Oxx/yikdLkqF4FViEc13wod3XVd5Tfy/oWkjpTNmxsgPh7xLW2rLhUWosIo72G1Ei0PUbfDOtIy8+8VPRQBkyoe719+ZafYAoX5ieOAAAALgCAAB9mJBK015eDXhbi3DqV2BPhgALWZp8kqC5IFZ1dTFBCubXhhjAG0smiWXhm6059V8s2Ni1NAwDv/te5SKMh18c71jGJ6BGqzSEw896o/srDCqjxoFR6Zs+RRoE1tEXEZ3lzqHm8pKEFdw6nqamBCX69MOJqHaAkznQXnbx3Z8XhaMc3X9Yxhb/5qiglMF3dqQSWeZAMvTwrVjDQqdaYKxE4os/JOCE/6HKq32lvqNQlaS/T0ejyGL6Mn61Ikx+yT2WzM96qoRM+gVO/MKqfwICjQAelDFCwJ+ixsjYv1gIwJ1idwe9dQpntb0DXlwqAo9H3aiyv77NThVQJ6P1e0cNYOMZotLO3DERWaG9gUfPAwnmFQY4eWaiUxy1pC7Un9Sf1lzJNk8yp2bvjvxT2it0cOBWeIVeOBJk3oKGl2wX2++j7ZtKzWFBScOcuxRkco6g0tl7tH7QjtBlT1xIkJtqaLetenzfcFWcat6osWd8PG+VNof07syQ8pziVBGRnkaWrUZxRNRv5EYFYELOoOr6QjMNqtkIqusc3fActDyIAKlWysB7WvoXIwCEewfZj7aRK56TIVEFqUkvLO/scvqYWgoFG5XGVVQJz+A/a9Eb7RlKZSC/N9eu5HYBnq4pue19HQIJpANSjR84OJAMnNSJ6zvvAraGXhxezYqA2nIL5ftvxDZozAIKFiHXtuRrgdRlEnrRQ1qMTLgNP9D4wIZuoRCXujnsNQvCN06jN/uLwmrX7yHI8mwqTXlUdU5qCIyhOUgqbdqy/rvxJw5TFaNwbGPe9hi6bNGPbKTtFS9ZSziQZYRut9E4aLk+jyox17NShH65uciuixInUQKTVCqfXrPrYYIdIuIU+l7AViuuqdEcSEbU3rxnTXcmlk+SaFKxXsf6vovmEoEGndd+P9IVd6J1CRmXUmUAAAAA');

 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => BJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => Bansal Jewellers
            [firm_desc] => Jewellery shop
            [firm_address] => 4373/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07
            [firm_city] => 
            [firm_phone_details] => 011-25767057
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 68
            [firm_pan_no] => AAXPB3067H
            [firm_tin_no] => 07AAXPB3067H1ZI
            [firm_since] => 2021-05-21 16:57:28
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  U €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ş0sÜwÆâsÇ@r?_r	1}ò[»çê:úgürzzöÉüÔv¤ùy ™ àñŸ\q\çÜıÿ æôºş¯ÓAƒÓ–î¯¨ÿ 
>¹ïĞ·êGàõÓ€sÉÀã8Áä~@öÇpyã“ë»“éxÆ>™8ôã ÃiınêqÉ+ÉÏ·°çÜ$zŸO¼q“Ï·ëƒœúƒ‚:c|ôÇò÷ÏÉĞ	ÏlØàcÆ3Ï¿2z"GSÁÏL@OltÀ:Œ‚}y'ò<ú÷˜=N~÷qÓqø’;c$ôƒo¿SsÇOC3ÏæüŸOën½?QÜÎ6<~>Ÿ­'9 “êy8ô<}yéÎOŸ˜àöÏa¯éŸ^´dO§‡×¸Î;Œzò×õÿ `òG8å3€õçqÆ~´ƒÜ1Ø±ÇpIÏ{àqé@ ÿ ‘Î}±Ó®=úRõé8$œ‘xê1Éç­o[i¯Dô½ÿ ®ÁÆG^¤ŸÏ9$§éÅß<VŒäuÁ#ºú`Lç¾9êqş»;/îÉÇàãN;Ï×Ş€ÓÏş¯ßÓO=Dôäúg,AëÛ¯n€÷êiİñÈ=~ñı9Ïéõ¤8 õÁÁéÆ0?¦rF==2Ÿ˜g±^=º™í{Ğ–tÓúòîÏ'$ò21ìAÇÔçŒtÈ ç‘×OĞßê:“ëÒ“±ãÔä 8>£’qÓı°asÆz{û‚9ÉãqÁ”öµô}õéÖËúBç“×°îIÆNà÷ú~PtÎIçß<öÈÎ!ë‘F×¨÷Æ=ò:uÉÓ£¹ÀúàqŒ~{`ç8ôÓ¾Ö¶uü7ê€y9íœx^™ü1^ÓğöwøÕûS|NÑş~Ï¾Õ¾(|Sñ¦«¡x'B¹Ò Öu‹mÂ]SV:tZ¾£¦Áw5oq5¤½Ù´¶¹¹‚ÚvÅ°3ÔóîORF;zœõ=zu='ƒücâß‡)ğÿ |âŸø'ÆŞÕ¬õßx»ÂšÆ£áïøw[Óå[‹[D×4«‹MKKÔìækkÛ˜.anÁ Ræqj*m55x©YY´œ[Wİ_mw?TOüWş	œÿ ÃüméÏîü#ĞûxŒuë“š?áÂ¿ğX@Oü`?ÆŞOüóğˆ=8ÿ ™§óÜõ=kô¯şóûmÿ Áb¿à£ß·ÃÙ®?ø(ÇİÁvº'ˆş"|Mñ5ÄúgˆÛBø{àkMÄÓYÍci>¥q­x—Rğ·„á{íR7¾#‚âêyQ^9]à©¿ÿ à >ÿ ‚ŒşÇŸğLoØ?ş
ñşËâÿ ÅO‡úÏş+xãâÇŒü%ÿ ¶„Ú§öö¥¢6¤øcÿ ‡´¿xKáç‹<M¨[-¯ˆ5ËM{Dï‘PÜRŠzëmºo¦›ù¿Àòg‰ÆÓ«ìgSÏÈê?r»Œ!äÜ¥k­"ì¢¤Ş‰n‘ü­Ëÿ ÿ ‚ÀÁÊß°/ÇX”±Ûx^yvól†É4‰'î‚x¯Ïo?³ŸÇÏÙ›ÅÇÀ´/ÁÏ‰?|fÖæò|Lğv»áFúÅd1CLMfÊÑ5]4Í˜†£¦KydÒeà°Û_é“û~ÎŸğ^Ù×ã…u/Ú—ş
)û)~Ôÿ ³­åóÛüGğˆïüI{ãÛ].æF×~ø½~øcW¶ñ.—?“qk£ë%—Âz²İXİÙÙ\Ü[k:½Ávÿ à›×ßğU_ÙgÀŸşø¿àŸ‚ş-xâş‹ã¿xûâ®¥ªZÙi^ñ&âíMÔ¼-áÿ ëq¿ˆ&Ô<?<öa]6é´k{›¹–âÂÄ3åVÑëÙÛ]¶³ÓÅC4œjÆ]Óvæ©J5W*}m5Ìì÷\š¦¬ÏòTôÆq€	 úvïN½ğMë×ëÏäûcĞãÛ¯ëªø3—öò¹¶7vÿ µìeqhÛíx‹ã4°>cy©ğq£Âmç8R¬¡¯ä³_Ó-´]{ZÑíu}?_µÒ5}OL¶×´†´­nŞÂökX5}1® ·ºm?RŠ%¼±iíà¸6ÒÅæÅ›£Yi«_®Û­MC’£>~Tœ¬¤¬ÚÊ{KoÉk“ÈïÏ™ÉèrqÇ¾	q@é×$u8ÀöİØznÇË§$qÔöôësùƒÆE¨<‚zÉ'©<ÿ ˆ%ßúï¶şW[ã¹<ûçğşÙ÷`Òs§™İÓ8ÎHïß<îëF Ïq#·ÔœñÓ©£åõ'×?–yã¡ã°ÁäNÍé®Ûéå¥¿Ë¸ì¸ÏB3ÔtÏÿ «òh?E÷éõ?8ëÇ<sF	ïÏ¶xä{g¨œ¹éÕqØq2=Gä	ÇÔßÜŸ×ü:óş¶Cé€z:tÈÆ9ıÛœtà8éÏ ’AÁ÷À‡ '=9ğ~£dsÉäóÔgŠ\{{Ÿ~01 È?Q@[wK¿çoKédàvàg½9ätıA8Ç)@Ï¦?õÉN¼zŠÖĞ4gÅ:î‰áXMªëş$ÕôÍCÒív}«TÖ5›Øtí3N¶2¼Q‹ëë¨- ñÆe•w:°ş”ÿ à¦¿ğOOğF¯Ùö|ğmß„tO¿·íC‰æñ¿ÆoÙ?ˆ~|ğÿ ƒ,ü7'Šü9ğ_áş¤ƒÃšíî«âİ+DÓ|}ãÄìZ~­xƒF²ğ¦¥©è°èÚ7Ûõ1©Z4åN²©Uµ­4I997¢Šù¶Ö‰Øıvÿ ƒ9¿fEğçÃoÚŸöË×,ÏøCøàFæ4W‹Ã¾µ¶ñ¿ÄK‹9se¬kº÷‚ì§fb>×àùPl1…|ûx#şÿ ‚ÿ ÁKhÿ Š_´´ß~ü7ø§áÿ  |(ñ—†u‹é0×<á‹=&kš<išg‚>é>"ÔåµóL—¾3Ó™B‰¦-û‡¯üEğŸüGşûğŸ„µcNğÇÿ Ùæÿ ÃŞĞZH ñ.½ûOüzÓ5XLéq¨‡~ ñv¥­k—!YxcÁr”Kö&ÿ =oŠ¿²¯Ä¯‚Ÿşü\øµcmàÿ øh+=OÄß<«E3xÛÄ_t†süUÕt×U>ğf½¬Í—à9µFşÒñ¿Ø|C¬éÖ6şÓ4í[\¶ì¢»+µ{Y½µßvytbëÖÄW_e:²T¨ÉÇ™¸¦›åOª„3Ù&Üôsı‰?àÛOø'Oì¯¥j^5Ö¡ñí…ñQ±¹şÀñ_Ä¯\x_ÂZt&BØxgAøoum¦ÙE«Hc·Õ5vçÆWĞÂ…tå´‚KËKÏâwş›ğ×ö’øgûlêøÙû5xöeğäÚüøwğgRŸÅÿ 5‡‡Qº³Äz'å·µÕ|qâ­_U‚X|Y{¬i:½m}†šşĞô¨t[y¿ª¿ø4{áÏÆ?~Ä?<{ã›vÏá_Å_Œğİ|ğÆ­=ÉÓÖÓÂ$š7|qá»	œÁi¤ø¯Ä—6şš{eŒßêŸïç’&U†âãÏní+Ãÿ ğSø8söAı˜t­|Uğ¿öğTÿ hûxâ¼Òì5ûoi_µoßÌ›í®íõûO‚ŞÕmZg6ú—ˆ<G¥Ü[Åu¤jQ†ÒqOgum¼’×w¦½?ËU'GW^ÙSNiI·Éb¤â›’4­»²j÷?Q> ¹ÿ ‚Jÿ Á¼šÇ†á|=ã¿ƒÿ ±bx9¥·A=·íñ»N]QÔ-$M$–ß>&ßk("”Ì¶v¬æeX^dÿ +@Œ.8à 8Àû3€ à}Ÿğw—íoğ3öyıôE³ñKÆW<}e¤Ooà¯‡\è^µ¾Ÿ±øƒÅúî¡¨Ú‡ =×™”eşpN1P	'ñÉç¿#·µ3zÛ·Şö;rÊn4gUİ:ÕOº—_öó“ş¬!àráÈdgøÆ×æ ‘ÀÇQÓ8÷<Ó¸éš]¼¾Iäx<t$ã¸£íô |F8àãs“Ì—õù	õŸA½Àäuã=øÈ<P9ì1ÔtÏõôçÇ £iç8éÇSÈ?€ëÉÅ.1À zrI÷ìxÉ1ë‘Ø?¥¦½uŞöùi»}0İ±ÓœÈûŒbH¥Ï×¯óß¦3ß¨à=‚ƒÓ“Ÿ¡ÈéÉÇ'?ÈqŠnG ŸÓ¯z|À÷"§åÛ·uå¿M{ÛÕI÷è#’H¾Œ@>¸ÎˆÉäã<ö=qNÎHãÏğqÈöèy'œÓ®9éIÉàg<×?Ú÷ç×¦3Ôûú5ë¦¿5·Ës¨ğGŒ5ß‡¾4ğ‡ü1p–&ğ/Š|?ãİË+MÂú½¹£İI0Y’FÆÖV„²«ª2’ªÄ×÷ñcş
#ÿ ÿ ‚äşÌşøcû[|Z»ı‰?iÜ¯ˆü'âO±Y|<ñôú|6šåï„>!jãÁ>+øwâímÖûÃ¾*Ö<âKØ,4Ù=WÓ´İi„¾Çá{Ó?ãÎsÏ"”‘Œdã×¿AßëÔö<´Óµöiïs¾5œ$¥8T‡Á8Úé»][ªºÛGfÕìÚÖÉÿ ‚BøãGíğ“Ç¿´ü×öPı­şh>?ğtş"â?ÇëËÿ ‰¾*øyiâ=.÷Ä~ğÖ™­xûâ†“â}*ŞãK·¶‡Å‹j·wQ\;HÊş£ÁLÿ gø#ÇÇ_Úwáçíaûg~Ü~Ñ>ü9øUàïƒşıŸ~ëz\š>µ‚µßxš+cÀCÅ,mP³ñ3Y¿„ü¡øgT¶µÒÚêÓÄé’Aiş}Ú^§y£jzv¯§Ìöú†•g©XÜ*å¡¼±¸êÚUrb$q—ÕıÉşÌ_ğZ_ø$çíOû1i?³Wí±ğ“áÿ Àå}/L²ñ€u¯†·º¿Á-{_ÓàòWÆ	ñƒôKWğ¶¢óuKÍut_øvæê[{/kš½Ís-­e×­ûuGŸˆ¡^›§5R¥Eâ(F“§nk('¬µ÷¬¼Ş×ã?lïø9Ëá'Ã¿…V³Wü§á]õŠé~´ğƒ¾+x‹ÁñøGÁĞ­­F‘¤AğáT±É­ëz­·”š-ÇŒôÿ Yiw‘Ã,şñ:ÊÑGú_ÿ 2ıŒ/àŸÿ ²¯ÅOÚãö½Ö_Ãÿ ´?íÿ Æ^(ø…{)Ö~ü3ÑâÕ<M§é^4Õõ6’î/İ}»[øƒñ[™Rê=[X°ĞuH$Ô¼)ö‰ş(øgãø63ö(ñM¿Ç…ºçÂWÇºßÚšãŸí®èZ„Ëisá/x²ÿ ÆÚnƒ®A)§k’XØjÚ|»^Ğ)aøÁÿ }ÿ ‚ôxëöøÑo¿gß€ú&¿ğ›öakègñ+k3[Ãñã,¶1]iëâÈt››?Ã~³¼†;Û_Ùßê³jwZêšö¨Æ;]Mµ»»kD–ËN¾oÓô¶Q¡*ÉRÃÒ:rquêÕwœµ]R³Iê£óK•»Zçç'ü'öÙÖà ¿¶§ÅïÚBTÔ­<©êQø?àö‘¨Ç,rè	<òé¾·š%-5-a%ºñˆì¢’hm<Mâ}Ze–·ç–rG'ğ$öÉïœòyÀÀ5í'ã¯‹›á-Á¹4ÏKá­:ÛY´ÓõFÓ/Ç‰mmõïé^.ÔQ/ãÕRÁüİKH‚$3iR”°–xˆiÖÒâ×Åúüö#'ÓztãHçµFç±J<PäQŒ=ØZ\×Š²R~ê³kV®õw¿V€gÔ@ã°<ğ û¼`Ñœàÿ Öä{d€r8#(p üÏ^0qHãéÉÈàğ¤>cÜñ‘zuïÏ_Ì(5í»Õ¥¥ö³Û[ï¶Ş{'¶FNpG\sêzcöÇ ñÜŒgœrqÓ®3³ÖƒÏ¯Ç8é×£ÔrG=…v$r	À?ˆôã‚sœs×¥Ûë·»O1Üä?ï¯¿¿¯\ö£ã¡Ro|ÀûóŠn:àtÇSÆ9ç©éÓ©xíF3Î;÷$ôãæóü»ôätÙ[ÓËæÿ ½˜îO$œğ!zC“‘Å¤ 8ãlöëøÒ`tÆyç'ÿ Æqî{ãô {€;õäŸÏ®ç=ÿ Ş¾øí…íĞwã¯9#Œz9éQĞãß<tÉ˜§- ú~¼r¹È'ÇÓ”0~Ÿı~¤ õÁë@õùß{ö·Ë£üGwéÈïƒÓ=ÏĞãŸlRrqÀàğxú~]CëFLLşùÉÆéƒI‚}°3É$“Ç<z{dspw ˜ôÁÈã0_aIÈäëÓ§ã¸îs1È1ìy<÷çÜœwëœqÍ vÇ?ş¼ô#×•ßŠWş¯÷j/#‚3Øpz¹ÎG^¹#×Òç°ñØ?1Ÿ^Ô˜öÎ3“œzœtëĞds×Š\{wÇ±ûöÏN¼ôÙéı[Ïï^¿%9ôg¨õôë×’qŸCƒG>ƒ:ãéÇŸ_JLdƒ®OBp~}{˜#Héøş8àŒqÔğO8à(»~ğüÃ8ºc§ëì8Á=¹4‡#°çÆ=ıºÓ³ŠLî‘N¾øù€üÓµ.óÎñèp3Øwâ€ş¿.Ÿæ¿à3w^?_\ûqíø’hÜ=22}øı~ÆŠ(6å]¿åşH7²;úúcüş˜£w°ıO|ÿ œc?N(¢rÅtüıCpşèı§·§½İ}óùçÿ ­íE,{~/üÄÈãÆ__QéßŞ”61€8Ï¯SşGáÆh¢€åoÌ]çÓ¿©ÿ Ï×¸¤/œdõÿ úİ8öëE,{~/üÃyôıHüıŸ¿\›½°:c'¦Ÿ¿×9Ï,{~a»Û×¿×üg¯SëIŸoÿ _Ó¦==³(¢€åoëëîØvïoÔÿ œçœõúÑ»Øc?>‡^xæŠ(XöòİôùùÿÙ
            [firm_left_thumb_ftype] => 0
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005
            [firm_bank_acc_no] => 4101115000015982
            [firm_bank_ifsc_code] => KVBL0004101
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => demo
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2021
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 136
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2021-06-02 13:04:03
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"BJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"Bansal Jewellers","firm_desc":"Jewellery shop","firm_address":"4373\/57 Reghar Pura Karol Bagh New Delhi-110005  State Code- 07","firm_city":"","firm_phone_details":"011-25767057","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"68","firm_pan_no":"AAXPB3067H","firm_tin_no":"07AAXPB3067H1ZI","firm_since":"2021-05-21 16:57:28","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"0","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"KARUR VYSYA BANK,Karol Bagh, <br> New Delhi-110005","firm_bank_acc_no":"4101115000015982","firm_bank_ifsc_code":"KVBL0004101","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"2","firm_own_id":"101972","firm_name":"demo","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2021","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"136","firm_pan_no":"","firm_tin_no":"","firm_since":"2021-06-02 13:04:03","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":null,"firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => SJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => SHIVAM JEWELLERS
            [firm_desc] => Every piece of jewellery tells a story
            [firm_address] => B.T.C Road,Howly
            [firm_city] => Howly
            [firm_phone_details] => 9101618753
            [firm_email] => shivamkar54@gmail.com
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => JOY MAA KALI
            [firm_form_footer] => 
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 18BXVPK3167R1ZA
            [firm_since] => 2022-05-03 17:25:53
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  € €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? şş(¢Š (¯1øÇñŸágìùğãÄß>4xç@øuğëÂky®øŸÄWf´…§š;M?M°·f¿Ö¼A­ê3ÛiğÖ‹i¨xƒÄºåí†‡ éš¯ge?ğKÿ Nÿ ƒ‰?jÚƒO‹Bı…ï|Yû6~Éú_¶x‹ã&ƒyŸ>2|>Ò£çQñF¡ZjøŸà'Ã›}VÎÆÃX°ğå§‰~ Éáë\ñ(²Ó´=SÀZ¯/‡ÁF.µHÆS|´àä”ªM©8B+VåQÅÆŠ”¤îÔZŒÜu¥F¥fÔ"ÚZÉÛH«¤äŞÉFé¶ÚKK»µësöÕÿ ‚Æ~Ã¿°ä—¾ñ÷ÄCâwÅ;étËïƒŸôëˆş;ğõô0Å;Åãùm5/	ü/&+‹w³µøâojúûL–Ò¼C©¼vü~Ü?ğv—íC¦xmÇÁ„^	ø§ø¯\“Kğ~¯:jş*YèVÚ6z¯‰®¢ø›à¿	x2ÇÄ=ı¬#\øs«|1¼şÊ’ÿ B´9¼mKP›HşM4Ø¿ƒühßu/„ŞÒ<_?Ã_iÛx»ÂZÄ?x·Ç¾,¿ğç‹£tŞ:î¡¢ÚÛx›ÂÇˆì§Ñ|KãÍRÿ SmkÃğèúçˆôo­üS¦ø_Æ¾øSãƒ_	tû_ÁÒş4Üi¥Íß…tK¯ê7~,Ôô½?Z…tÄøyiy¯İøRk-nÇW»¹Ñµø´E¸ÒãøasãÛÏ
|Ş;;ÄCF)¥„•iBnƒön.
§$+bª.DêU()aXrJj¤ ¥MÏ²²oøŠ*Ks]7¸ÓZé'jœ®ö²m;{­Ïüûş
EûW|RÕ´ï~Ù´ÏŠ´;İ(^xóÀ^	ø«â?‡~×¼!wá1ñDñ_ÃÏ|¾øTƒW¿ğ•®“3x©ï¬¼3'­|¯Ü[ê C¯üßâ¯ş+ñ‡>Yü0ø™ãoüFñg‹—[ø»{uâßjšÏ‚¾E«øsÆ~3Ò|W©xšù ğe¾Ÿâûiš²O¦Íªèúl2êğœ:—‡<!¦f‡–ÇáÆ]oâ™àŒ_>Ç¨kw¿o¼wáKr3áÕÒ¼ãû]+FÒí<}Ïƒ¿h]KÄş¾Ô/íõ-â“á»ËæKoHĞüwÎøƒâ/„×àÜ¼sñîïÅ·ú/Œ| |Uñ†«á?jÇÇßş"ø?_ñ¦…¦øgQº‚Aicm,úÕ§†ï­µÆuÃ$^x5ñ1˜ˆNˆ…8C<4©ãjR¥YÊ¶¥z°T*Ç¯,Zt½¦«u°´j5ìêN‡¥J0¥MÅûr•êF§5ÊPJœãIÎ.Õ¡)rÕ£VQOš*}_†¾=|@ğÄi?ş5x³ÀsÙ.â¯‚6Ğ<kã|4ÕuÏøªŞÇÂ~"ğ¡¤[kéaÿ î‹©x~Ut—ÄzïÒÖß\ŸXÔífú‹Eÿ ‚¶ÁP¿fOøBûáÿ íyûFxkHÖ´ïx«Â¿~+üC¼ø™¢i_Û:&½âAãí'ã…ŸÄñÿ ‡SÃza×tÏè¾‡@Ñ|As‰¬G%ÅçÆŞñ'†¼à|ğßÇ'ğŸ‰Ä9~
ü"ñ6‹àÿ [ŞéŞ&ğ£|'>?Õæ¸Ù¯t»/ø³PñÎ‰{ı©&¥ A­^†ÆÎâ=;N‹Âğ–©ªk¤ø­áÏˆüAğ·^ğ‡„ŸÁ:ßŒuŸ®¯{ğëÇµ¯‹^×m®<k|4/ˆ·V¥¢iü=åøsá~ƒ'‹ô>ÊúÓJÒuX¥Š©‚•\BxÌ=IÑ¡F•<m*8šŞÊ„hN/aJ–bgÏzøº´ëQÅÂ,$§=¥N5ã
¹©78Îs”¨JtáÏ'R3Ÿ<ç_ÙÅÅR\”a(T£)¹5ËéÛöÿ ƒ¾>8jeæ—ûNü	ğ§Æ/Â:¾‰£kŸ¼÷Ÿ
üu¨éZœz‚[ø¼'¥é¾8ğ–«â]rşÅ¬t‡šUŸ„­õ¬ô˜¼i«êÚ¾Ÿnÿ ×/ìQÿ [ı‰?o‹xìşüTû|qsğâ^‘wğóâ|J-ÅÍÏöo‡µİ–¾.]*6X¼C7µOÛø[Pó4OË£k¶×z]¿ùM|>Ó4˜~EâŠŞ¶Ôíş+èŸc‹Q°†îk6óÀúm¾£ªë3ı¥¼k­j>1ê¾;M{W²û&­­xŸFÑlaÑ´mRüå}®xÖÆO|qğïÅí]ô[é“ZÚx^òÿ Ã6¾ñ·Ækz‡ƒ4jZ5Í†wñÁÚ²ÜßxÒãL†ÇV±¸Ğgñ^j:ÚëPhşş:ÅOŠ§ña©U…({wí”êÎ8jJ…U4ê¼dêĞ~Şá	:jüŞïl%FŒµU§7È¹9a9{J”jI5`¡RôÜÜ’“—-¯/÷¢¿ÿ ø%Wü—ñßàåî¯ğÏş
>ºÏÄ¯€wˆlì<=ûFN–÷_>h²Yİ¿ˆ¿á6†Æo~:ü?ğ>µ
éã;MMø•} [ÉâÛ~&B-Cşì¼ãß|Qğo‡>!|9ñN‡ã_ø»K·Ö|5âŸê6ú®‹­i— ùWV7Ö¯$R¨exfŒ•šÚæ)­ncŠâbO¥Áãğ¸è9aêÂr‚‡µ§ÆR¥9S…G	ò·ïATŒgm¥x½U*¾¶IU„¢›|’i¥4¤â¤¯ÒVm_u©×QEÚ`å?~7|.ı›şøóã—ÆŸiø_ğ×Ã×&ñŠu»˜í¬´İ6Ì ¨¦FSs}s$~—§Á¾ëRÔ®­l-#’æâ$oV¯ópÿ ƒ‰ÿ à®:ÏíûOŞ~ÇŸtiõßØëövñå¾‹®ø‹Jñ,z}¿ÇO‹§Bñ§ƒ~$êz%•¬WŸü'àmÄ:öƒá-ÂÒî<GáıOÅ{©[xÂÖprc±K†©ZÑœãéÒu)Óu%¢´]Z”âí{¸©)4­ÉÅ=ğô]z°†ª-®y¨ÊJ+»äŒš½¬šMİè™óWü·ş
óñGş
{ñ8ü.ÑäñOÃ†^#ğÍ–¿ğWà?Å?xu<4¶zn¯­ØkóüA´ÒäñEİï¼Em¢ê·o­\_[ÿ Â-¤éÚEçÃëÍ\v¾#üìğ/Š>3ësø{Çú÷‚>ë~2ø1eâ/xsÃñw…<m?Å?]x^ÃÂÖ¶Zı·†uÛŸø[ÀºÆ“öî¹àëmF×Uñæ…aa¥YÛyú,Cñ>µáı;ÆßüCã;ï†ßtxªö#Pñ¹©jº–³e ivgÅ+w¤GÂı;HÑôåñ;i:¥ybÚõüZE„à¦ğúG…tƒ>,—Àá«/ŠzŠõ_F³×|eâ/iÿ u½_|@ñ6•®‹$·×5ø0Káßè7ú–µ¢ZKàíOÅ~²ºĞ.åÓgüÆ­W§)Ô§ÏŠÄÒ«ˆrÄRö·s•\2ÅRÄá¨Ã°qÀÓÅÆŸÖ>¨ªÔp<UtßÓªj„”c/İSœ)%Nj6²¥Z‹t§N¬İlñ“—³ö®æR£7#­øo©øGà'Ã‰·^(ÒuïíŸ‰–^ñWşêø_âÄ­/Âšñ‘¯xËÅ7#ğş«á]WKÕµ_x?ÇÒø'â/´¹muİ2[ûh´)ü#§ë78.ø«{ğ§Dğ‚<_ñšïÃ¾ğ·ãMãáÃ›ßkzß‹~ø‡Ãşğî•ˆlµMKLÓ|'ã[kYêÚtš“øzËJÓ|B ğ
éš¦Œt[Ï“ügñòóÂw¾øUâ½[[û4·ZL¿u{[x<yá{]Iï4hºÂ¡Õlô]QÜZ¤÷Möèm¿á‹Ãe´°êÿ &;¼ÒHÌîìÎîìYİØ–ffbK3K1$’I'&¾£KR®3Ü^"¯µw¦¥V¤#†ƒTñ4æğÊ•('[ëÙ)óU­N´Ÿ_j4h¤ıœyouËê{IÚTä•NiÙ¾^JIÆÑ„ ì}[©~Ò^Ò¯4÷øoğ_ÂZ¶—áğDxÇWñ7îeÒÅ7>0‚åmäÕ4­=nÓÄ3Ç«ÛfİiwZu®™©Ca§[[_ş¯ã¢êš¦µ‹´Û}_[‹LƒWÔàğ/ÃôÔµ;}ÍtİßQÔá7÷ğèúr&Ÿ¥­íÍÁ±±Uµ·1Â6WÏWĞÇ+ËÒjxZUÛM9b“ÅM§%7yâ]Y{ÓŒg-}éF2zÅ[ƒë•¹jJwJ›öi4¹S´9V‹E¦‰´·w÷ı'ö¡øİ ı«ûÅzföíN}jûû+À¿´ã{¬]ÍÖ­vÖ^î5;Ÿ&>şVk¹|¨·Ì|´Û«¥şĞ–cC‹Ã~ ø_àãciáßxoNÖüğ§Œ´Û/ln;]{S·ñm´VËâ-|Í£Zé6šp}Vqo´*>øMğoÇ?uİOÃ-4íSÄzn‡uâÑ¯5k"ïT²²¹´¶¹‡J—SšÚÊæö#yÆÚ[»v6ë4ÊÌ°¾8ÏøOÄ¾×µx¿BÔü7â*Q¡¤jö“Y^Û;(’6hfU/ñ2Mmqx.`xç·’XdGg<¯.•ÿ Ù(Ór’”ı^R”c(ÅÊt9IÆ3œW3vŒç¤ä›'Ÿµœ¬šJoÚ$›MÙTæJî1nËW÷Jß¡ºGÅÛïx*ãá¿Áï‰ş'Ô¥ñ“ğûáš|-øŸªÇ¢éşÒ4O
Úø>óÇ^¾·Ö‘®5”m/BEğ¯†æñH‚¿ë÷¾–DÒìô¿Fø‘¥xCâwÃß
|4Ò¼7ã7Vğ†½ã]CÁ¿ïtOè>8ø…a§ø?R¶¸ñ¯‚ui:O…´?=_kåŸÃØ,¾"kúN±iw{â›İÃv~FWÓş5i÷W¤|X’úv½Ğdğ®ñoOiÏÄ?YÏx·pÈš´Q]j:•uc{qW>&´ğş¥¨é¶rk:2'„/¾sÃ®ƒ§ŠÀJNXz³ÄÅB”~³í]‡r—³tÖ&*’P—³,z¦§õlOÖªB¤}<>b¦¥K—-XÆ“æœ½—"©í,¹¹ı“ç¼•Ü°üÖö´(¸¿½5íGâÖ—coñÛÀŞ
ÒüaãÏxKO×üñÅš„ïü)¬xjçÄ¾KïjzN“ªéš•saã?|8ÖHÖ­5»M3X‰_VÓõ9ôÿ Øø"×ü‹âGü3âıŸ>8]ê_şøºçRñ·ÄÏ‡ß<?c~ŸÚ{v·>'ğ…¿ö~¯®ø“Rš?^ê¶–ãVºñô:µíåØ™#ğÇŒçü8Ô|3}ñöÓÂŞ*Ò4xş&øşúØü0MWÄšÎ£¢xûÀ‡ì:v£ñÇÖuû1©Ï¦êš¯llü	‚-uÙâoøŠÚãÃúÿ €şÙèÚxğøø™ñ‹Søc©|=ñ¶±©èú7ü}¥øÓ[×ü5‡|Oa¤İéº£á/xzÁ×Å±\ØÛ^EâxwVĞu‰üMá-GRĞõ] YÏÌQ®òëÔ¥
qÄÓ¤ëóaé¸B
\.JxÊ˜šôŞ_Ë†£9ÆŠÅTÂB…zõ«T©zó‚ÅrÆ¤¤èÊjªÉI·(T«Zj„iSŸÖe%J¬Ô\İV•HS§ÆRÿ c¯‡ÿ <ñ[Áø•ğßÅ:'¼ãMñ?„<[áËø5=Ä¯mæªi·ÖìñOmso*:CÆÛ¢•#•¯¯àSş²ÿ ‚±Üü&øù/ü³â†Ÿ¬é_ ¾+kóCû:ëÚ¶·g5ÂoŠgOÓíôÏ‡÷^m2Ï]øOà±ØŞêÒ<UyÔ¾#Ios hV2|EÕ~Íıõ×éØ\q¸Z8…IT§	T¤ç	ÊIEJTçìç5+ß•¾dšæŒex¯”ÄQt*Î›|ÑŒšŒÔeÎ)é(óF-§ŞÖ¾Í«7ø£ÿ òı¾ïÿ `_ø'ÿ ¼Eà›å´øÉñ·Tƒà§Âù¢ÕJ¾ğì~!°½¿ø‘ñŞòŞhõ+>|4Ó¼M¬i¦›ÍÍ—Œæğ„Ko+^$oşP—Ş¸Ò|SâŸøJ|)á)<Œš®ƒk¨Xü:ğ¾£w¨Êfµğ|Ÿ$Ñ¥×«oo¦ø›Oµ½Òõ#¬k—º%¶¬÷Ğhº”š©ş¿àìÛ=¼uÿ ³ø7¤ÙkÚ¾•û|.ğ†i§Ûê6k¢Ãã¯‡NøãÏGc}¡j–w¶š~‘¤|%ğ£q=¾³¥ÛëwúUèÒ5±;ÿ 9>ø²–ğç€uUğWÃë­f}NâFğş»kd<9©Kyyiu¤ø†ÚÓ^Ÿ]ğêÚÙİé~+.u
ÿ hk	ªéƒXĞuVÇVùŒëúÓx|<+Ğ¦şªâê¥R-F¬F&„iU•hT¡MB*­8BiU’“¦éÓ”½œ?±µ«*U%ûå%Á¦İ*4ª9ÓTå“s|“›¸šSS’]‚ôï„ğ¶—â…7°xÃ]Öõoj?üñkSĞ¯t¸¾&Şİi7‘Å=Æ‹¤økTÓµL°ñƒ[R½ñ'†ôm[Äºn“â5·³ÓuïZØüİñâDšv…mğÏF½¶©s%ş¿ñ6÷Z×Oˆu˜<Qây­5oø2XÃ‘iöºµ¼ş!´]¦MbÚ->öí}3ÄZ¿Š>„ø«âeğ—ˆ|sã}|A¡h^¹şÄÑ<5ãÏé“¯Š|c«x^ÓÂÒx§BÕµÃy«Zê–‘húx¢ÂvÖdÕô­#^–ÏÅ·öÚÅİµ¯æÜóÍs4×73Kqqq,“Ï<Ò4³O4®d–i¥rÏ$²;3É#±gv,Ä’MgÃ¸E—ö…yU­Ü×ÖjN¦"‰Òç…
ÍB•	ıV…XMÊåÍ‰¯7í#*n5šVöêÔÔ ÿ yMû(¨Ó•(Í'R	Êsµ©	E)MZ•8¥¤ªJ*(¢¾ØğBŠ( ûá‡ÄÏ|ñ¾‹ñÀ×ñiş#Ğëì’Ü[E{i4ÖsØ_Z^YÎW×Vw3C"²FYg·–˜¡š?¬?iÿ ˆcö’øUğÇö‚›NÒôßø{TÔş|R³Ò’X­c½d›ÅÔìà¸šæî=3UÓÿ á%(×3Î Ô ºÓã¸”[«·;ğ:ßö'“À±·Ç‹ï‰6ş=şÖÔD‘ø].ÛJşÈìÖSœéö‚<ÿ ;÷„ıÜ^Æ-à˜AJ_ãhF*Ì¡5¬È+şÎÁ*Â’20Ürù¡EhjÃN®¦4ƒ3i#P½[\gÏ:p¹“ìF|€|ãmårß» +>€> ø!ãeñ-­—À¯øŸÄZ?ƒõıbÑôıPO¿²Õê[¨¼)>£&ªÉ…¼E¬M¡Öw:ŒaÓõhÆ—§â=JO¯uû/€ÿ ¼/s'ÄíwLø}â½;Y×ŸãO„~jºÆŸ©øÂ~ñÇ‰|/â¨5]CÃZÖ«jsxgÃº…ti>?ƒO»ñÆ­g¦I§hú†·ãÏ/å~¥|ñş…â-Kà×‰¯¼=â}|øX×|5ñGÁ¾ğƒkoâïiú~¥Ä?øòë]ğÔŞñ½ÏŠ´½jãÇúôÚ›á];ÄZå†‹•§ZëÑêÄX`Ö?*ôëV¶p£(â£Bug+ÊJOëP£IÖ„a^	ZXŠV›—·–â=§û=UNkÜ‡ïâêEÒsŒ"¬¥/däÒP“nJ´Õ9û‰y_… Ôl¼wğ“Åÿ ¼5áßø_Kò<«:ëáŸÄ]cÀIàÍVJ5‰RøvÇ]Ğ¼Zt‡Ñ.á“ÄwúD:7ˆõkK[m_DŠÎëMğÏúñÿ Á'¿mX?ooØá7Ç;ë¨fñı’j¿>.ÅÚ–â‡ÃË¡¡x‡Q¡µÓeñeªi~8şÃH¡ŸÃqø<;¨ÛÚjºUı¿ùHkß-'Ñ|sğwÃ—ø£x²ÙKl7×íã·ñüZ¶Ÿa x{GÓ<Kãâ-zûÄRÍ¨kw^>8ñß…â³Ò.uM|GuÃQÿ ğhí¾—ÿ ¾8~Ì^&´Ô|5Æßİ|Rğş¡c>“¯xËá†¿?ï¼1a§é:?‘>©£ü@¼şß¿º³•¯"ğ.úî¿¬ÚêòY™&+ñ7«†T0óqÃ¤êº•çŠ¦'	Š®«Mbç9ÆU(¹U„ª8Óu§9ÆSœu
¡UÔ«ê]C–šqä¥Z”=œ}Œc£4¡%)rF0²‹ş[ÿ mê´Wí•ûZşĞ·~9ò|%ñwö®ø©ãÏx‡Tñ»Ğ´İCÅ>#¶ğí†.o4ïIu¡Éà}CKÑ%™íôoíH¼%eçM.amu?xSÔô;Ïøâ|ß
5É4]Ä·ow`t¯x£Sğî‹¥;GĞüMªxjM½ğ—ˆa»²¹Ñ4okÑÜh÷Všx×,cÑä°°¼ä/.<e¥Ã¯ø;ÀúFŸ«Áã?í‘­xÇQñiš]ä>-Ğa²Këİ.ãÅúÍÆ­i§øzKVÛû]n7ŞAe¯ÛÙj’i6·÷•®<]àí7ÆhÚ‚µKÛo>‹ªüDñ5ò¬·ÇMÇÂZ]ø1“PÕ5u2ÇÃš¥ˆ,tù.TXï¬“L×f½û?Îb«WÌ]WR
½<Dãìªáş®ñ˜iJµákÕ”*S–Í{hº0öx¬léÆPÁ©F¬_¿J•,‚„)Òï!WÛ{
Ê4å*ô©©FkÉû¦ª>zhÉ§‰q•9/ø°¶~ğŸƒ<1§É=´¾!–ûâ'ˆ4»ÁâÏEs©*éÚĞõKW––qÅ¯ÚÜÄnuä™ÌZ–±«IEàUë?dÒÄ. }´m#Âºe­„Ú\w±i÷Q_İêZûŞZG¨…¿H.æÖe¸‰/R;¥I 4”2&¯Ğò˜µ€¡7ÏÍYÔ¯'QJ5_¶«:öŠRœÔ£NP‚Œç9B1ŒåËwò8ö¾µR+–ÔÔ)¥œ³„c.WÆ-9)JñŒc&Ü”cÍ`¢Š+Ò8ÏŞÙö`øû:şÃ~ ÿ ‚’~Õ->6^êš£è ş
k²ˆ¼!ª^ŸÏá;gÅ–sC=®¨u=nÇZº6š½–¥¤işÑn5{}+ZÕµ]2=?Ä­à±ß-üAc0øû!ÇğşÎèøUv4KO'Ì´Û{Ö½¸×-%û’¸µwO%Œğƒhß®±öŸğgş
•ÿ ·Òb/ˆ:GÃ¿Úàö•¦Åm¢ßæ»†ïÁZİÍß…<ug¢yö×~!ğ~¿¢ê@ñeæ™æŞxwXÔu	nm÷õæÓö¤ı¾?~Ç®~|xğ&¡á‹ö’á¼?â(kïø×MÂcÁŞ&Hc±ÖlYßıWÒd³×4Í/PÙÇüYáÆ?<KñÅ~ñeCâ†UÆ™æ&àŞ'Åc(<‡ØxP§Ã¸îËjÖ£‚«ƒ¯†Uñ˜¼ç'¦óõ«,~.´(â0u'ıÅù¦uÁÜ7À˜¯±_Ùü)[…òšù¾q“ĞÂıc0âú²«W:‡â•:˜¹NgG…Ëñõ
kB“<DW«ÁC>0üø÷ñ³Âÿ >x#Ã¿ü'âß„>ºÖüáÍFĞáğ¿m'×4ÿ é7öº†™eu}¡i˜µƒco.·¤¶™«aŠò(cúSöğ¿†¬àßµËèVzÕä
MŞ±k¤Ø[ê—FçÂš´—çP†İ.ç3È«$ŞlÍæº«>æ ×ãí~Ï~ÓGş5µğŞ„cÿ -`ÿ Jş·á¼‡	ÂùUÃ¹}\UlO„§€ÁOˆ©‹ÅıV…ã‡†#UÊ®"­:\”å^«u*òsÍ¹I³ğŒ÷8Äñq˜gxÊxzX¼Ï<^*J0Ãá¾±VÎ´¨áé¥N„*Tæ¨©SJù¹ ”RGãQ^áä…}9û?ŞO«ø_ãGÃÃ ·‰,õï	h':bø¢ÃÂ2Isá/hënêÑM¦éúj6µ¹â4A>¡¥xm´Ëkı2êæßU°ù¾…ı–ªÿ ü-m¢®‘.§y¦xÖoA¼9w~ñÖ™ˆ“I#T“CşÔ¶²›R];ı8[Dïgş’‘WŸšÅ<¿7oÜSX¸ó9ÅsàçT/*r…H{ÔW¿	ÆQø£$ÑÑ…vÄRZÚröNÊ/J©ÒzIJ/I½$š{4~…üMñ?‹üAiğ§Áß
¦øáÿ ˆß´Çí¯ëº5­.ÿ ÅŞ,Ô¼#á…Ş/ñ¯†®¼¢ÚŞjOyãÏj¼ğõ¦µ®^ëÚG…íµI¼=âgÆÿ dÁ!5OşÎßğToØßâG‡ü|<Má{ÚSÂ¿<iâMÅpxÏV×!ø¤±| —E×4M'Áiáßé^ñï‰|ZúSÜüAµøy§x_[:d°%£{ªü5àïˆ¼ğÿ àw‰|áß†všu§Œlü+ñ{Áw~$´Ô4K|u$wÑ~øªößÆ¼v—‰üY¯ëŞ$±ğæ‘¢ÅeâÑ´Í:æM
ÎúóÕ¿gÛïŠÚ7ÄOÙËá¿Œ|3¡Ëá¿„ß~k¿~/øÅ–ÚÎˆ4í
ÿ Iñ¿‡<QgàÙ<} 5¤:Î¥øoÅú¾§mm}©\xo@·ÕSÃ2ËZÅç¸IÔËªCÙS¥‡¡CUÕ«ˆTUjôèâë¬D¡:•]lOÔãKN8:•3<LêÊÜißèª(âbÔå*“©J
¦êrS”èÓtÔã(RöÎU$ëFÆ¢¤¢¥ä|­ZE­ÚjŸo¼W«xWÅ,ºô>µmwc¦iúÕÍœÚaaiŠ¼Ci«ëÛ[ÓÂóÅ$—-<š®©ßÚê·st·úï†á1ğñ›Å^ñjxãV×m4{¿ÊÚ—Ù<GªÇ‡-µy£×µ9µMa4ÉõM%4o¦İM{wc¤‘u¥z§íÉğçÆ²Çí¿ûaüÑ<;eğ»ö™ø± è=”Úw‡tCÁ67×—Ã¾3Õmî´İM,´í[ÃŞşÅ‘è×ºÄZ¤‡EûV«.§,á/Øx~ãÄz‡¾*&½®_Úë©{áÍm~›KmvÊ[RV}ÃşÒ5bÅµ¶›¤Ûø²;no'Ñ­o5{tÒæ1˜<U55<T0²—Õ(`TªM~ûR4’¥ÄRyÆQÅTXhº±§J1œ*R«éPÄaê¨8Ú„±
?X«‹åŒu§U:—©Š£7ˆ¯hÍ:uä©¹T“ŒéÔ§á?.¡Õ5Í]‚Ø_ğŸ©2jtZMÓ˜õ_LàéÖó\ÛÚÁyİ¤vóÍnmg… ‘ád'É«Ş>'Øê×ĞõMOIÕ,®ü5¬ê^¼¿×õ‹_^Õ¡’4½Ó¤¼ûp½¬:Ùï#T'ŠA¨ZÏk©jŸišhü¾÷%©åÔcQ•ZJucÒ«8ÓJ¥&á%ì}œ£k5%8ÂjPÈæP”1u¿ï#N­å	Órs§6á4¤š©ÏºrMÆR¤Ê(¯²ÿ `¯„>øÃûFèV¬XøkğëÂ~>øÓñBI'ñ…¾øKTñ”ş.ƒzÛx›QÓ´İRxš9âÒµé­¤Kˆâ5‡gø>áÜï‰sW«‚È²¼vkˆ£†ŒgŠÄSÁaêWxl-9Îœ*b±.
†œ§Î½Jq”â›’yV]ˆÍó,W…pXŒÃC	JU(N½HÓU*É)8Ò¦¤êU’ŒœiÆM'k4øWÅ?~øÇÃ5ğvµâ‡9ğôºg‰|/â=ëQğïˆ4Ãyiş•«éw°µµÚ[êuÔW×1µÔtÛ°A¸³º"Oë'ö+ÿ ‚µşÏŸ·ç€ ıà¦ğ%×‰üM¶áÿ ˆZİ®“à_ˆz±Cg¦Í{qllÛáWÅ=ò–ÑüE ]é:>£¨Ë,z-Ï…õ)´íRşMş$üAñ'Åox¯â7‹î£ºñŒ5«ÍgQ6ğ­­…¡¸|ZéZMŒxƒLĞôk$¶Ò4-"Ñc²Ò4{+2Æ(m- ‰8šüƒÆ ¸GÇ^Ê—ajpçd´(cxkxWSÄÜECÏ“gt£ƒÅc2ê8åz˜<J£CGN–6/îğÿ ã¸[_û>k”b*N3+ÇÂø,ÓÛ…±Xnj¥^tmjs•&ù«Qç§Söş
Ÿÿ §ñwìâˆüyà;ÍWÇ¿³?‹µf±ğßŠ¯#_xX¹Ïmà¿5¤0ÚÉ4ĞÇ/ü#ş(¶·µ±×£·‹M3T‰mn¶i¯ùF×Àúãğÿ Pıf¿gàšw¿?jOØÅ²ßíax«IñGµ‹?‡zŞ¹ª®µâI>êö:_ü!W:¤’%ÌÉ«x7^¸‡Xğ~©&¡.£§i–ş­ìåÒ 2~1~Ôƒş	¿ğYR¿	¡T.¹ycğv¶Î‘óó²¬nä&~DgûªHğ~œeâ.*\uáO‹•0ùŸøIÉ°5ø·NpÜmÂüC†Çb8[‰jaàùpù/–c)ætc¨Õ§JuRÄÔÄ%ìqŞC“apü?Å<6êSÈx²†:¥fåW*ÌòÊ˜zY®]ÎÒö”hTÅĞt*]óFråıÚƒŒ4QELŸ…}û*é—·ÿ ôË«MNç@‡FğßïõZipksøZÚóÂZÆmâ$Ñ®§µµÕ[KÕµ½2tÓ®®­­¯dÙm=Ä1Jò/Îuöì×áºğgÅ¯EiâmWÄ¾›¢øÀğo‹4ÿ 	x×Çz‹ø§Ã×ˆì|uq¦ëº–¥âÎ¾Õï´}ÃúÍş£áûıJÒ;H’yu-7ÎÍf¡€ÄEÉGÛEa“j·ÖeÚ£Tß$jJoÚ5J1‹•V©ÆMo‡_¿¦õ÷%í4¿ü»÷Ò¼S–­$¹}ë´£­¶>ë®´€?|c«x÷Æ3ø£êŞ"ğ¯…u/ øsÂ
—ÃW^;ÔÎ‘7üáßˆ’høÎçÄÖ/4K¢k—å½ 7‰Vé4í2^“örø}}­|GøñzOøÃâGÇOü\ğW„<Skzö:¾ğëÄ!ñu¥¾©à½sÀËã·‡°î5›ø”øÎâÿ Âk¢êğKm%½¥—=ñ?ÄÚ!ø{áÏƒŸµÄŞø§áwğÿ Ã_YøëÅŞ2ñN¿ñ×Ã~,›^Ğ5‰¼IğËáGŠ|?á¯/Ä»Hôoø“Ä)ğ>«â/‡úWƒbñ'‡4;=5Ï}{ÿ ’Ò>#şÖ_ğSÿ ØgÃº•ı‡‰ô‹ïÚÃ_üCáù<C£êÖ|ğ^÷Høñ­ø£ÁÖv‚õ}¢j¿ll†<W¨øÏÇ~Ó5H!ñ¦Ÿioy5Ö­ğ˜L&'Z.Øxb±RXš8ˆºsTªb12t¨Ó–NX|d'Î¢ƒG>déÑöç^œ ÓJn•5ì§MŞ<Ê4§9*Ó—´£(É©T‹’U[¦•ù¥ö·ü©ûYü.ÿ ‚ˆiÿ #ğÖ§kğïöÆøcá¿ë>-²¸kM/Oø¿ğ2ÂÓá·Œl$H´»«;P¿'ø}âk›«¶º’òëU×§É&ûN ¿Ìõ¼Z†ü1¡j“j^)²Õ<9$¶§‹ot­2÷I†êmJâÖîÓN¸×ãµŠK»ËX­d›íş»Öü; %•¼‘i6÷vºßú¶ÁÀŸğO›¯ø('ü×Æú‚ôÍORøßû?jöß´7Ák-2úï‰µÏiÚŠx³á¶©5»ÜÏñ#À—Ş!ğö‘`ó­¬¾2>¾»xôÕ‰¿ÉLÁ©Ùx‹R×®OŠ¢Ò¼G`ú™§xwFñ^—â˜ôÖH®mìmfÔô´#¨I¦Ø\nHµø¥[gP¶7r?œŞ¾}«<UıµHĞ›úÜiZ¥HÕ«
kZ‚”¹•kBSu\mOØÇ‘ÃŞn[eªq¡gJ­öwSÜ„©Ó”ıµ*®+—Úû:ÑŠ‚•çí$ä¥¢K¯×çğÇŠubü?á¿üA’	àHõëİFóÄÖÚdWa´kkI´]?J²×¥Ğ%¥{'‰uOjĞ¦¥m2ı“äËû½.úóM¾„ÛŞØ\Íiu21ŠâŞFŠTß<nÔ€ñ»ÆãŒÈC­ ñ”èpèšş‡wğ¿E¼¹°Ğü?qjo¯i¶ßÙ°[êÖ’júe¥¦ÿ ü7º^±«éÛêÒê:ş©©	“Vš9|÷Ç¾7pY[}‚ãHñÖgqcsáÛ«©5KıÃº&›g®Gz¶°	/|¸$Ú	’	5;9³ììm,´{mWÆËQ`ñ4«P£8Â?mˆ¥‹“ú­5N8¹âh·±öQ§†ÅT…LRÃºXwZ¦éFZføHâ¡õŠ§V¤oVj•˜uûù©<<hÔJTåÏ)Ö¡Bƒ¯í+*q¯Z5$¼
¾²ıˆ~;è³¯í%àOˆ5±›Uøm}ˆ<ñSJ$–kï†¿tCÁŞ.h`ƒ÷÷7:^›«¶»giG%åî•oj$U™|›E}&’`8—#Î8{5…J™ny–cr¬tiTtk}W‡©†­*£yP¯Ts¡^ı±…X5(&xY^eŠÉó,¿6ÁJÅå¸Ì6;êAT¥í°µ¡ZœjÓvUiJPQ«J^íJnP—»&}¹ûZşÃ??f-vmzÛK½ø‰û?x—n»ğ§ãç„­Ÿ]ğŒ|ªÿ ¥ørúÿ \Ò’}?A×§Óeƒíú6§%¤uÌúKjZAµÔn>yøEğ/ãÇ¿Úø;àßÃo|FñÔÑBlü1£İ_Ád%`«s¬êaJĞ´ôÈiõ=júÃN¶LÉsu`°÷_ÙËş
û\~ÊzsxàÏÆgGğt“M<¾×¬tø,Irí%ÛØè)°Õmt9oec-õÏ‡“u{'Íu<¹ ıI¬ÿ Áo?à š†”ÚN‹ñÀ¾ÕÕ®¼%ğ«Á]0bGŒkz^»i¯’LĞZE*1ß£…aùmLGy^
YF'ğßŠqt¡õ|æœMğôq‚ä¥ÏxOÂ™¯.6QQ2QÄ1Ââ+J¤ğË/¦á†§÷ÔèøIÄÇ1ÅæœmáêIUÅğŞ"Ês™R”Ÿ5L6UÄ8® Ë”°É¹CS1Éş±F
­õÉ©VŸë‡¼/ü/öÅ¿¾.OuûFjSø‰~|<ğş¹i¨i¦ÿ ÄV6vÖ¿ô´¼²’æÿ ÃŞÍâøšÌA¦é—÷vú$·wGÃ³êßÌ¿Æ?ÚÆßlü)áíN/Ã^ğ™m¤x+À^KÈtÎÎÎ>	¤“Q¼Ô5=[Tû¼6òjZíÄ¡DßfKUººY¹OŠÿ ~+|tñeÇ~0ü@ñWÄoÜB–ÇYñ^¯uª\[YÆÎñiútS9µÒ´È^I3L‚ÒÂ’FŠÙG-æ•ëx]ÁGÂ˜<ã3ã~%¡ÅÜoÄøèã3¬ß—PÀ`°X:ÄÔÊøk'ıßö„òXìÂYl3Ej”êcñµ)RÂÇ:'•ÇI’g˜¼…²Z¼?ÃY6êÙvŒ©‹Åâ«Î4aŒÎs§õXæ™’ÃaV-á)Â†	Ô®éF QEú™ğåÍ;O¿Õõ+K³¹Ôu=NòÛOÓ´û(d¹¼¾¿½-­,í-âV–{››‰c‚cV’Y]³ Tş€>Öşh<‡ÁŞ*ğÀK\¾ø™o÷Œü=ñ:çâÔ÷z”ï'ƒu/Üè6²h6©á[İoIø‰2ë>Óôx_Oø«oáo/ÃÚ¡óçÀŸ†~"ğ@ğßÄğæ‹âŸ‰~%Iğãán«­Xè¾&¾ğ¼ö²®­ãMÇX±½Òï5·¶¸µÃ:f«m{+é·Ş)±Ğ5A—cöøÕeáê
øáoö¤‡šş¯£|Uÿ „îçÆ×:ñOŠ¼{àÿ ø.äZIá[=xOğÓMğ©ão†¾$·"Ó$Iîä½ğµî¬¯ƒüzÿ Ÿc¥‹—Õp‘­Zı¤L6.J­HÔÃT©*ó\´iÅÔú®´ªÑçÅÕ”©:±ÂU·­„ÃªqU*¸ÁË•òÎ”ª^)Æ¤c­e9$êN
3å¥¥ÊêÅ>¾{ÿ |Cøqñoâ?ü%~<¶ñWŠ4Ë½Å:GÁ-sÁšÎµ­øbÒ÷Ãú¦µk7„´OŠZŸ.‡ ^]ØKá2x²ëÃPk·zn‡%´ğu·ô­ÿ ”~Ä¾Ñş:üzı£ôÿ 
øx_á/†.<áø«U‡R7ß¼eâ¯ø[Äz~œ–ú›¦Å¬øÀ^¼YºĞ¤´³ŸOøÑ§ZİIã;/xŠÛùµÒüKãÏŠ¿Çì~6Á¥|-‡Ã¾	—á·ÄâŸÄŠÉá¿ŞŞ;xÎûáÿ ÃøG®ô½{Ázœğ=ÍÇü"úÎ±¢ZZ MJ²Ğìt?õ¤ÿ ‚QşÅVÿ °wìSğËàŞ£f¶ß¼B×ß>6¸¼‹RüXøƒ•ö·á‹]J –Ú†ƒğ»DµğçÁïİÚÁio7‚>xm¢²´_ôxôÉ05#]¿iQaâã‰•xÆN_e… ÜZhÂŒ!‰„¹ªBÆVå›ÏUrZÑskÙ©hÛZJ¤–—ƒrn›VŒ­ët¿G«üÎ?àäïø#ÕŸìYûLëÿ ¶×Â_ø¦ãö\ı©<ouâoøsÃá<-ğ£âüZˆ<kâÿ köë+[ÉáŸŠÚŞœšç€ìo-¡ÑíuOÆş´±eàèîÿ Ó¼¯ãÁO†?´oÂüøËá=;Æß>$h^ñW‡u4>]Í¤å&¶½±ºŒ¥Ş“®hÚ„š×‡uí6km_ÃÚöŸ§kz=å§aiuÒã°ß[ÂÖ ¦á*´gÊÔ“R‡¼£)EsÆ-¸««i}Ÿ.¿Õ±«8©Æ¼¢×2qiÆ^ëi7É)$¤í®§øªëW‘[xÛÀ4:­öµ/‰/ïn×M×-tëÛ;8­nôísI_ìèu
=¦­¿ ^i³¼ºšhö^ß[é^'’òÛOá¼=&±âK†’]Äş×u-zêüx„ÛØ.®ºn—`º•÷‡õ«½GMÓ-?áÔmíôı/ÃÚcÁ<Wúµ¶«¨-ä1¾‘/í?üşíñKş	kñ&õl-5cà‰Nğ§ìßñù­¯<W«kzT’_ê—?üK¤iº ²ğ÷Æı&ïÖh@ğ×lï.|[¡êE†—©èü±ğ­½¦›co'Ä]Ä¾ñ=·¥øÏÄsMy}§øvÆÓK¶¼ºñN‰®¤*-­íõ–7êº×`şĞ°¿…eÓoÊëáã–BtjR•U8<:l-z•'*/©ˆ„pQ¼*P­‡…,$êÍbjáJ›“åûú5:P©	ª´'?m(Ó¯J0Š©>4e,S*Œ¡V•yT¯
qtiâh¹¨ûŞ%âÿ o=ıæ š7ƒ¼t–oâ]K@Ikáé´;ëÁpu{Ë»Ë+MPK=­¥ÌÒêRÁu%õÕ^ÏUƒÄÏâ™¨iOe©ÙÏetŠå\FP¼RÑO’{iĞ‰-îai ¸‰–Xd’6V?SxcPÑfğ_‰4_iöÑxGÂÚî¡éÖ>%ÖµÔ_YXõkİkN·ñ'‡¼9{ªêÏ©Yiºƒ£%½¶™oÓİø~K›­oUÙAÖüY¡é·èş+Ò$}gÅÚæ­]øzXh7v:]æ£h÷l`¾u®o ÿ „’=;H‹Mvv-s¦[%µÿ Ñá3êùtªáñ‘‡ÕğõÕÔ©V0¡iáiâ¨ÒÁb«)IS’Œğ¸ºÎ8yÕÃĞ§˜âT¢ß‹‰Ê)c#N¾OÛU£í]8BRªÜkËR¦&-'ó§(â(SN´iÖ«SAÆVøÊŠ÷­SÀ>
šD¹yüKà;_øFáñF¥6«§·ˆ4Ë{â;Úé6Ù˜¯çŠ[ˆ’æÃS}CPÖ{<P5´¬qá&ûF;_ø;]8è¢[kP¾ÑüT:|º®„Ë§ÜÙ5ÍÍŒK-¥¶¡uqbğËo~–×(Ğ¦§`jEÊR«G—âU(Uq¿NöÔ£W'ÏZ”Z…i´êÒ¾•!ÍàÏ-ÅBVQ§;Û•Â­4äœe$Õ9Ê’q„İçN?ÃŸòJŞAE{fğNòúèÛ?|	§ˆï<(ÖßÚ—ĞjWõ„–q]éÚ]–¯¦hñês$—öqÇ,kc;Î«ëm§Má…Ô´ÛKû+ßxßUÕ<?­x‹IĞìôEğå•ŸöÎ³l¶^-¾[r­õ»­{k¥k×r´ÖÖÉ5½åÚwS9ÀS‹’©:–qMS£VÑrI':“Œ)R‹*’æ«RjI·dÔrìTšN…Ókš¤.ìáËÊU&ùªAZ“NJé+µóö“¤jºö¡o¥hšmö¯©İ³­®Ÿ¦ÚÏ{y97–O*Şİ$•ÄQG$²²©Xâår¨ŒÃë¿†ÿ àğ‡‹4íÄ¾Oü^Ôü3â¯‡ÿ „–“ø>êóKì5§‰5´–kÍJÊÏJÖüK6›0‹Ãi:=”kZ“x¦ÙôoSÿ „[´økmâ·„¾éóèŞñ¿€?áñBÉñÅş(k=:ò=WÓÛX‹PÕ¼&Ş5Ö‘¤ëZ¤z®£á/Aá¨ï£m?Sšá4<wãoi­oşè2øÄ¾4Õl>$èŞñ/ˆu?[øƒÅ>Ô&Ñ.®<WâŸx{Uø};İÇwfÚl^¸ğÏŒ<=æ‹ ëŞ0Òâñ®‘£|æ/=¯˜8ağT¥ì«b%‚¨éÎ2tëû5RñXšu¡
^ÒşËê˜yº•kS«‡«ÀG÷Ç¥G.†š¦"k%ˆ4d¹éórÊtiNRQÒ~Ú¬T#	Â¤0ø†œ¿ÄÖ>4øGiª¶• |BñŸ‹ŸVÒµı'ÄúMÔŞ+Ö¼¥xóÍñN»áÏxâê×ÅVŞ0Òd×ô¶¹×-<Ká+w¥ëoâ˜ÖkÍw³ÛxŞãYøßñ‹À÷^&Ö>k>ğ~®›ß
é^ÓüSã¯êœ‡^ñ­ÿ ˆ4&—Ç~óÂ¾³ğ>­¬Y\øâmBi>Ó&³ª=´{¨øğÜ¾ÿ …½ãÏ‡ß>x@_øËL½Ôš=vïQÕ¼B¾#¸ñ/Œ¬´Ë˜¾Áà=]ôİ(|6³¼Ğ$’Â)µ*Ë6Á—öÏş•ÿ _ñwü3Ä¶ş:‹½Kö|øs¬ø›áï‹¾(Igâx“â†5-Qü7Ò"::'|G®ê^&6ş"ñ•‡ŠµßøgM[¯i:©ñ\{ÍkÀ¡F9’p„+(T£ÒÃUSn´°•èâfñ1–éÓ¤ş·†•YJ…Lläİ\d©ÙZOg)*TSŒÜ]X[Üö”çM{&±R”ÿ uUBÕ#F)rÑ•ã÷Gü¡ÿ —ğÏÇßÚ_ü§â„üc¦üøãkQı“¼âëë‰¼%ã?Œz­™'¾(h	Ô`†?éŸ<o¹£Caik*ê_tùõ!ayğÙ´–şö«“ğ|ğÃÁ~øuğÿ ÃÚg„¼àKğ¿„ü3£[‹m/CĞt[8¬4Í6ÊY„6Ö°ÇùI¥`ÓO,³I$ÖWéØ<2Áá¨á£9ÍR‚‹œäç9Ië)JOVå&äÛêİ’VKåëTöµgQ¥g{E$’Ù$–‰$’ItZİİ²Š(®“3Ìş1üøWûAü3ñ‡ÁÏ~ğßÄ¿†>Ñ®ôø3Åz|Z–¬i—‘´rG$O¶[k¨K	ìu)mµ-6ò8o´ë»[È!?ó½ÿ ‚¶Á°¿´ÇìÑ«'Å_Ø&şÓ¿³jø•|Kâ?†Úş§w¯üpø=Úõ%X´Í9ll¾#|=Ğl/­¿
YŸÚ¶•¦I­ø[Q²Ñ¯¼M{ş‘ÔW&+‡ÅÇ÷´àêE?gQÆò„¹g»§(ÅÍÉA¾^{JÊI5Ó‡ÅVÃ?İÎJ§8'hÉ)FOFšŒ¤ ¢ä•ùox¶ŸøLé:ºIÑc³ƒCÒn®mõi¼N–wº¦­I­ë#Zµ×mÑÄ:&©4WŸÙÚ­úE£Äº-BûRÓ,íã¿´ë¼Y«xkNÓ¼!¥F5¿AğújRÃ'övwq¦É¨Ei¬ŞÅ.€gîÕôûûõÕ'µ±WÖ® mgOÑNÿ \_Ûßş{ÿ ìÿ ‚‰jIã??ÿ áøÉm9º³øëğgSo†ßä¹gW–O_iVòè:78à–oøÄZ…½¢y]ş›‘ şAÿ k¯ø3¿ö¼ğ]–·sû+|^ø3ûMx^-fWÃ¾ñ½—ü3·Ä«+EMM—Dk­>?|=ñ<6Ò\Å÷÷~*ğúŒw7·Ÿp,¾Ãó8ì†½L]D}ú4ªÎnHÓ£Z¢¬ëÆ2¯íªJ.­Uy:Êzp¤¤İCİÂæôc†©EûµjB1RÄ9Õ¥MQr/gÏJ¬iÊ”U':¼Ü³œÚJò“áø Íàÿ ‡Ş‚8®/<0ÍâÍbÊ\Ò,¯uG¥è³}Xdğö—Ÿw§GâıK[µ¹:†»¨êú¥Î•pÿ Úw#YĞ³ÔaÕ<2"Ô£ø}ã¿Új–¾"ñE–›gá¯_xŸJğÎ™}¥Yh~™iy§Y¤ºn’mãkı?K–şÊ¾—O›PY¥³Ÿí/‰ğHø*ìåâİu¾%~À¿´Ğ¼:·÷zÇˆ¾ü;Ô¾.è>'¶ŠĞxfDµñÂSÄŞĞ­×HÕµ{Í
ÖËV‚;kl´ˆc¹š–çæO|&ø¨u_[k_üiğËYø{¬YêöÏ®xWÄşKÏé×z›6ŸhÚÖ§ß.¦öP/ˆ'Ó&–Ò8¬î'š-+OFÔ­´¿ŸÄåÓÃâ ©à}9Ò§^¾.š®±?í‰ÒÅÔçxª¸ZÕ*á¡TÚ<4äá[
¨Óõhbã^„œ±^Öpœ©Ó¡*ÒtqF2¡_a
ôá
Óu&›­9VŒT©×ugÎÚø‚+ŞkÅğßÁŸüOwiãŸÍâÍ3ÃxoUÔ“ÁĞx]µ·Ö¯5Ù-âñ5Ö¬êZÌšDRZYZâÆ1¦ÚÃĞÉñÆš.«yğ»Æö¶¯¦j^ñµáİZK?ø{Â«ñLøqâO›û†ğØ“Ã(±Õ<}'‡|csã:&·sj–ú^™>£ms¹ğûáÆcâÏj¾ø?ãŸŒŞ%ø‰=”útz'ƒü]âO²øz}kÃúM—¨-Ÿ†®5›Y/"×&iãí§M/Ã·òé×Ì†ßëÏ†¿ğGø*¿í¬øDü+ı€¿h»/
_Ãá¥Ğ/ş%øgşWü!Úwƒd×4­[·×¾4x“Áº.«pWYÕuHlµyK^Û[éé5«ÛŞDÒ¬>[<UZ”T¥*r–:<µib
ÂVœ£ŠÂ¬¾Të(ªÑKÖ.jTêbg
Ù×ÅFŒ!?­8TŒ”jÑOrtZŠRÄB1•
Ï§M·JMáoArÎc:|(ñ/ƒ-ü5®é·©â_?‚m~É<:eº^õißÃÚ}Õt-Rö/†õk[ƒ¥êzm½“ê„tT–{ñ¦iÈkø·ªj:Ÿ†¬ì4ßx+ÄzXğ.ƒgá]+mÅºÇ†¼/¨è<#“w¿<]â#ZµÑ-4kK	üTPŒY[jú¥®’«aıxşÈ_ğg—í	­Y›¯ÚËã§Â?€š.«¯[êúÿ „>
è§ãŸ5}:KÛ=Wâ¡ü=ğL.ŞãL¸´Óş,ÜipÏ©Z5åÅ¦±>Ÿcıx~ÃğH_Øş	åuyâOÙÓàn•mñGU³[oão¯.~ |^Ô¬„6öçM³ñwˆçÂÛÙÙ[Éá XøKÂÏŠ¶ŠM¤ŸGƒÈñÆb12´)b%	râá
ÕaÉ*ç£N”ãO	[ÚÂ­z©98IAV¤å
r^.#1¤èR¢¯9ÒM^Œ¥N›R•_vr”\ëÓön:š\ÊîœÒ”ÓşLà’Ÿğl—Æ¿‰%×ş5ÁEWÄŸ>êŞ(Ò|GàÏÙÛÃ~/ñ‡>6üKO'öu¹ñ›ZĞµKcà]ÆÚZ.«ã])ñ/Å:ıııö§ÃkË;1wıèxÀøWà¿ü9øgàÿ xÀÑìü?á/ø;EÓü;áhš|B-+DÑ4›{];M±¶ŒmŠÚÖŞ(Ô–m¥™‰ë¨¯¦Ãa(acËJ	IÆœg?µ?eJ¢äİíîSŠÑ½ånfÛñêÖ©YŞrºNN1éiJm/œ÷v²½’
(¢ºLÿÙ
            [firm_left_thumb_ftype] => image/png
            [firm_right_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ   €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? şıI¬z 	8äàÉ9$c§'Œœâ´ÅƒŸ3'gú‘ş¯¹ÎxïÔö‘øùê¬>¿)< z~c'+€sK€G\t=?©ç¯§L”¹„ùkÇOÜMéí?ñGÚ¢Ï`òÂlŸS÷?¦yÀÇZ˜ñ×¨'/l}G9äp~‡çÔç*:ñ×'òH€!QùéÛşXÍÇ±€äç Á İEŸùh}ü‰¸÷ìt?§½MîCã‘ÓØôïÏ4c9äqĞ =‡>ç¾2xõ …Ì ËCô‚aŸõ~¿Lv®GÄŸşø>ïI±ño|-á[İ~àYèv~#×tÍ
ïZ¼$i¤Ûê—V“jWE™GÙì–iPäWÉğP_ÛÛáüçàF«ñoâ=Ôz¯ˆµu£ü0øugsZÿ Ä?ı™¥¶Òìc;ŞÓH±İç‰5éa6Z&œÛßÌ¾ºÓlo?ÍGö£ı¨ş2şØ<Kñ¿ã—Š®¼Kâİvşiôë3,ë x/F¼šo…|¥É,è^Ñá1Áion~Óu"I©j·ÚµÕåõÇí^x/šøNc_, ÃóÑ§˜Ë
ñUqØØèèàğò­‡JTûÖ!ÕP„ÜhÓU*û_cåæ<8ÃÚÖ–®Üªï&”¬ßÙ®Ö­¥kÿ ¬ˆº…€9v6Ã1R ‚†s×½)~Ñı4ÏıpŸ öØ{ã×°úğC¯ø-“«xKö0ı±|e,ÆY­<;ğ+ãgŠoŞi]çu·ÒşüCÖ¯egy–^ñV£12·ğæ±t²G¥İOı‰«+(e`TŒ‚  ƒÎzœğ2 ã¦ÃqÇg|VÉsš;sUÀã©F_TÌ°|ÍC†œ—¤kQ“ö˜z¼Ôª-#)uáqT±t£V›ì§ñBVÖ2_“ÚKTGö˜yGÒıÜüsÇhûT_ôÓØy`uÇü³ê=±Øg56 èsœŒõê3Ü1ÆGy0ä9ÀêI9>ş½}|qÒCö˜A'sş¢lóéò}1ÓŞ´ÅŸùkßŸ&aÛâ.¾ıqëÒ¥ëÛ<ç<dûuÉã¥ÇœóÆNÈèIÇ|Ğ&æ xósÜù=9ÿ ×Üõ5*u Iê6’AÚrƒòKòú_»?œğN0Ä?.?ÚtøØó“ÓÓ ÈÉé@º¥äÿ ˜²cn‡äbzú ë×Ÿ`38 p1œxö<síœôäÆÿ qù9sùt<ú“ôç¯gvêzgüc¿L~]{Ï^Wœ89O_©üûRç8<vìIØ`_qÏ˜ëó7_éÇ~¼cñƒÑ±n¼ãú’AöëÛß4 ìãŒ¨ç7qƒÛO@?:ù¯ö³ı«~şÆ?ü]ñããF»•áÚ´vm»Dúï‹üIr’ÿ bøCÂö2ÉÔµínâ3¬–h’ãQ¿š×M²»ºƒĞ>5|hømû<ü-ñŸÆO‹(²ğÃïhÓë^!ÖïÜŠŠÇºŸ>ÿ UÔîäƒMÒ4»T’óSÔ®­¬­"’yãCşl¿ğTø)'Äø(ÏÇ)ü]©CÃ|=ö™ğgáŒ·[áĞti$òçñ6¿mo|qâhãŠ}fñ‘i¶‚ÓÃöMg§µİÿ ë¾x[ñ8æ®ªá8k-«NY¾aË*¯IÇ-ÁI®Yc1³œí(àèKÛÔRœ°ôkùÙ>*ZZUæ­JiÓÚM]{‰ì·›\«í5ãŸ·_íÅñƒöùøí®|hø¯zÖ–jn4Ÿ‡¾±¸šoü8ğjÜ´¶^Ò@¢âòl%ßˆuÇŠ;­wU2\È¶ö‘iö_“èqÏ<g=ºã¯çúRmêwu?N€ÿ /N¿¬Ÿø#¿ü§Â¾x«ö€ı²tbÛFøÃà»ıàGƒ¡çH×4Y…ÛãmÃ-áÖ')ß¬/#¸°—J’]kR³»‡TÓb‡ûËˆ¸“…<,áŒ5|\!—å8/«åÙn[€¥Wªİ”h`èJpö³§MTÄb*N¢|”êÕ©RU&¹şJ…F?%ÏR|Ó©9¶’Ñk9YÚú$’ê’VLşMÁäÜƒ‘Ç#üc\ã¯ı–ÿ Á?à¶Mâá_ØËöÀñb6^øñ›Ä{¾¸K]7á·õ+©0Úú¯ƒüKq"¶¸…4=YÎ³Ş³üÜÁ@¿`ŒğOÚ¯Â?‰–òj¾ÔçXø]ñ&ÎÎXtˆŞì·Ô­·­½§ÇÅ’W¹Ñµ |·¼Ònô­SPødeX2±B¬*J•pr¬¤©¥H à‚æâ~á_xN*•ibğ8êÆä™ÖFuğUçSÅa¥%µ^Ë„«ÉígB¼iÖ§Rt1Œ¿{8Î/–­)^ÒI«Æ_}ã4¾%£×ı‡à´ƒĞŒàæ=¸ç<w\ç9*qõÇ'¿Qnf¿“ø!ßü½~#Gá_ØÓö»ñYOˆpCk¡|øÅâÅ	ãØ UƒOğ5+†|m*xoÄrñtqÿ fê3¯‰–ÒOÿ X£$d$úr3“ı1ÛgßşrñŸg|b2<î‡%Zw©…ÅÓRxLÇ	)5K„©$¹©ÎÍNÕ(US£Z1©	#íp¸ªXºQ«Iİ=%ñS“pšèÕ×“Vi´Ó¤öë¹9Ÿ_§Ó4‡Œr¹õîr=G#¯^ıxéHGL’—aÆHã§=#ĞÒóıæêOa×½:Ÿs_&tÏ'§OsÈ8ØHÇ¯lÔqœ!ä™Èäçıcv¾Ÿˆ<Òàú¶zã¿~£?ç#Ö˜:œ’ı?ßn:¯¾zz‚ê½çî I8ä#ú>^9=ûñÿ ×§ 0;’ONŸAÆGø‘šl€ùrö[¹éƒïqùc½/aÀ#Cœ·#Û§AŠ.Õã?ÓÛÓ¦}=Nkœñ‡‹ü+ğÿ Âş ñ¿µİ+Âşğ®‘¯xÄZİä:~‘£húe»İ_j…åË$öÖĞDòHîÃ m
Ì@;×7ZA=ÕÔÑ[Û[E$÷Ê"†bC$ÒÍ,Œ±Åq«I$®ÊˆŠY°‘üÁp¿à°—µ×Š5ÙövñÖÿ ³/ƒ5†_x£LX›ã‡Št»ŒEr³FU¤øq¡]Feğı¦^#ÔxŠñeµƒBH?AğãÃÜ×Ä\úWRÃà0ü•óŒÒPr£—ášÓhÔÅâ9eO‡ºuf¥9rĞ£^­><n2
‹©=dî©Ã¬åúEo)tZnÒ:ÿ Áb¿à¬'ÿ ‚‚|P“À¿ïµ_şÊ¿u›øA|; ŸO¹ø‡¬Ú4¶§âW‹ìÛd¾mÔm/ü"zò‡ğî‘?sm»¨ˆ?89Àì ÷ãéÜ:2@éŒËò>Ÿ+ëßØöpğwíAû@xWáïÄßŒ>øğ¦ÚhµÏ‰ü}ã/x>-;Â–W‹í3Â¯â{û+m[ÆØq¦èVpÅy”ó>³©[¾›§\Ç/úA–å™pÌpx
QÉrLêÉS§:øŠ¾Î<õ«Ô(:ØÌv*iÊ\•\Ey¨S†°‚ø©Î¶2¿4ß5Z²KV’WÑ-]£­7²JíîÏÔø!·ü~çöÓø™Çÿ Ş™eÏ…zäE4İBŠßã7´ç[˜¼#j¬®ü ¸ŠïÆ÷hËä’Yxb¸k­oû7ö“öıÿ ‚Ú|JøñëÅ fü>‡EøC©§„¼Qâ_èú–¨º—ˆ4˜¡‡TĞ|?£iz¶ƒk¤hºÙÑšwk‰înm.Ñl­#§ıoøCûTÿ Á4¾|3ğoÂ…µì­á xC²ğ÷†´;ãgÃ…†ÎÂÍ6ïšVñ!šòúîS%æ¡tòİêóÜ^İÍ-Äò9üı°?à?
?mÚÆ¿bÚóö]ñŞ¹ñ6Kïxçá|¿ô}O]Ğu…²ø«ÅzCx8x¦êóÃ×—SE©ê){afÚf¥,iyqİ¬6ÿ åïÒOŠ<Sãê²Îr<£>ÀåØS¥ƒÁSÁb)ÖÀdö“öÎU)û?¬â«F\Æµ9:ŸÂ£	<%£ıçô£ônÀø›˜SúEÏ'E>Å¾—¼Døj\Hñ˜$ãšÇ	uÍ¯ëë-Xåıœ«óÊ¢úóÀ³ôWáÆ£ğGşÉûx·Â<gàïˆ>×n´[@Ss{ğÛâ4z<:‡‡~!ü?¿¿ßxšV¥e{ê:£tñjÛëÕd¾³÷óŸ¶?ìyñ“öøáâ?¿tSg«il÷Şñ-”SxûÂSÏ,ZW‹¼-{"s§ßŒw6®Eö¨Ås¥êPÃylÊºÿ ø&ö¯ûşÁ5‡z‡íÍû1x·â‹¼K7‹>#kÖß~Xi‡[[+]&ÏCÑlî¼GöÈ´ÂÉ I/ñy}¨O¨ßË”wQiÖkÿ µÿ ‚\ÿ ÁD~Şü8ñÇíƒû/xÇŞKí[á/ÅoŒŸ'Ö|	ây EÄƒş4—Rğ®´Ğ[Zø§Ãí<Qj6‘Aqm-¦­§éº…§ê_G~<ãŞÁåyOdùŞ#(ÌaMæÔã–c*ÕÊqµ,s<)QpnT½—ö¦‚q­%*ØxºĞŒ+~ô‚Áø]ñ_ªø9>_¡Ÿâ¿ÕVX…™j…?i?×ÚÇ,»ë¿ZyCÇ¶G-ú¤qV¬ê[üêáš[i¡¸·–[{›y#Şâ	àšYaš	bd’9¡‘H¤‰„‘ÈªèÊÀı¾ÿ Á¿àµ|i´ğ·ìû[ø©!øÉeÂŠúıÊÅÅ{(ËÓüâ½FfH—â=¤
–šN§tcoC6÷Ïââï®ÿ ß<¨ü-ñ÷ŠşjºÏ„¼G{áMfïIøÄúWŒ¼®Ånù¶Ö|7â}âëMÕô}JÙ¢¼³¹ŠT™c˜A{mg}Í¤m­åÕÕ­õÄöWÖsÁygyi<¶·vwvÒ¬Ö×6·02Ooso<qËÄO±L‰$L®ªGö×p.CâOgãùTİ?­dÙ½ÆxŒz´Ô©â(Éòû\5hò,NR<M+kN´(Ö¥ø>[[vj)Êê3Šjñi-$µå•›‹¿G$ÿ Ø`ëëê3ƒ§éàÅ.Õôÿ <g ëGrIú×óÿ @ÿ ‚ÒCûGYx{öIı©üA¿Çİ2Î=7á‡ÄmJT·‡ã6—anLZ·3•?‰šuµ»2Ê¾ZxÊÆ3u+­Úß-ÿ ôïéĞúsßƒÏ'>£8ú×ù·Åü#pNw‰È³Ì?±ÄĞ|ôkBòÃc°³rTq˜:­/kBª‹è§J¤jP­
u©T§·Ãbib©F­'x½zJ2²n2]¿ÏutÓhBƒÓğç§×ÀàwS# ¯Nw?Ğüí×Ùã=>’qÇâpIÎzqÏçƒµc)ï—êHÏï·qÏô¯˜6ê½ç\~íÉäìqĞq…>9Ïò<ÒŒø tààß>ãA÷4ÙîÜî'äaØäà}½:‘œñÍ<t¸üO°9ôÏ\cP3òcş‹ñÆ?à˜ß´¾·àk‹»-WZÑü-à]CP±wêËÂş=ñŸ‡ü%â©c–"$ƒí>Õ¯ôçZ4¼gVBóFïó:Œñß¿Nz†«×ÇØ¾|zµñÏìKñŠşÕ/~3ü,Öe‹ÂšŒŸÙwş-ğ…ÓO¥êºç€u…6Ú¦¹àQ,õB2KgÂwrø{YÔlm¬5]îóø;ı¦?à_ğP‚u|2øG©şĞßä¹ºŸÂ?¼©x^¨é>iû4^#ğö³¯éº¯‡uø x–şÍ ¹ÒåŸÍm'TÔ I/ìŸ£wğŞE’æÙyŒÁäY+0şÚÂâsZÔ²ú¦][	‡ÂÂ8|^*T¨Ô–¶»ö^Ñ9*ò•7G³ùœï^µZuiBU¡ªR4æéÔRrÖ1¼—2’ÖÖV´šº¿âVzóèNpxè	'>qB’¥ˆb8ç{÷ãœuã?…~˜ø#wü ÃüUÿ À¿~ó7~ın(ÿ ‡7ÁP?èÌ~*õÏü}x×?ô7õóƒëŸéŸõ×ƒè®áüH2Ÿşl<?ªb¿è½¿ëÍ[ôéÉæ–û}Çæ÷äïnŸŞp=úşŸ†+ıàß¿ø'£şÊ³XøûñF6ŸiM#I×^Şúßf¥à¯„ï³Rğo…ÊÌ«qg}â’øÙ–)#¸ŸFÒï"5øAÿ Çÿ ‚şÓŞ0ı«ü¬şØß|IğÇà?Ã©Ç"ƒÆ>ˆ:¦ylú€-ìôoT¸ÓVÔ]/u÷š´>Ó5	%[JÕ_ûå(Ò(•#Š4Xã5TDUÂ""à*( Â€£ü»ôŠñ?ŒÁáx+†ó,&;‹TñÙö7.ÄÑÅaåJRÁe‘ÄaêT¥'*´Ö/ÊñTğpm©Õ‚÷²\¾Pœ±U©ÊáFƒŒµKš§,’kOv.İgÙÁü+ÿ ØÙÇã~×ô6¶ø'ñÓ]˜øïLÓmÊXü=øÁ}æİ_ÉåÄ<«MâIõËlGoâu×¬3WzE»6[Û»¶Ç-ß¿ãù¾Õş·?´/À‡_´ßÁŸˆ~+hñk~ø‘á»ïkåP]Ù=ÂoÓõÍ"áÃ›{@Ô¢´Ö´-F5ó¬5kK¨è«üï~0Á¿à£ß¾(xëÁ>ıœ<kñSÂ~ñ¡§xgâ/…®¼$ºŒ´åó4zÊÿ Z^Ú5íŒ=İ…Õ´Sé÷ÂæÉÃıœHÿ _àg‹™niÃ« â¬ß—æÙ:TpØÜÓ‡ÁÃ3ÊÒTğÒöøª´áS‚å¼yJ”VİIË(sf¹d¡_ÛaéJtë6åtå7N¦—ºŠo–m¹'²|ËD•ÿ !F2y$q“œŒ O9çÓ§`üÏcÏ>ù=É€¿LáÍßğTÿ ±—ÅSÎãëÀÿ ü×vãß#¯j_øswüşŒÇâ¯\ÿ Çßøü¼]ş}òk÷?õ×ƒè®áüH2Ÿşl<¯ªâ´ÿ e¯ÿ ‚jõ·÷?½ıkoÏ/xƒÄñ…¼UàËËÍ?ÅŞñ‰¯xZûNyşÓÄZN¥m¨h·6M-Ü:•½´lùŒ@É<¯N‹5íÎ¥\jp­¶¡q¦YO¨[¡ÊÁ{-´Ow$“ˆ§gA×€2z
ş/?à”?ğ@zÆüı·¼+§|;ğWÃ]oNñ_…ş]kZˆüSãißh3ø¥<9¨ë.‡áM*ş}FïMºÔæÖu™í£Ó®ôÛ5îd¹şÈ4Oˆ^ñ'‹|[à­U‹U×|ºD~0ÉLÖŞÔ5ÛWÔ4½P¼SöhõÙôµ‹V›HYúÇJ¾Òõèmmµ)ï?¾‘üaqVm‘à8{‡Í¿Õì.cW3Í0'˜ÖËéÑÂÃKš•háå‡N¥HNt#[N„'íı´Ód˜j¸zUeZ2§í¥NœıÙ{ŠmË•ê®¤ì¬¡{Y#´ äóß„ç¾9àüc@ÇŒesÎn®Ã½O‘Š“ ÿ ‘Ç¯9ëƒø`ÔqıÌäšAĞ®zw÷=zşf=¾«ÑşqCû·+g¡çlö8É<Ò‚vôw8Æ:w=zñÇ^[ >\œÿ g®ÉëÆ>˜äÒòq„ç·¸ÎqÇĞd@ÏÍOø*wìyâÚ×öl»ŸáF§©øWö™ø¨?Å¿ÙÇÇÔ%Ñ|I¥xûA¶ygğå†µm$76¾7Óá“B¼äµME´Bée‹O17ãOüûş@ğü!wŸ?à¢K«xâg‚a]>Š~ğN»ªéş=k)…Õ·ŠüáÍ>÷Sğ§-$RÚ›ÙéÉáÍMãºxm¼=si—Ö=ñŒg¿¡rzŒó§©¿’_ø)Wü¿ñcöıª|kñÛöVñŸÁøGâ‚EâxOâ«ã
};âEÜ×Å–…¼â«9tºÛk·	<ÖsÁ®Şë…íæ€§íf|œå¸Î
ñ&ªÁe”¥,Ï‡søTöÜŸ)ÃûC/£Šö•.cñÃ×£W±ñ=ŸÖkÒ«/OJ¤qXÍQû•è½aV)Zq¼}ê{sFJ\­/…4ÿ Jâ!ø%näºø«öE¾-ç¿ıJùÏÓë…ÿ ˆ†?à•Ãş§Šº?áK|[ÿ æ@~XíÛ·ó·ÿ ºşßôV¿e.:ÿ Åeñ\ôëœüéê(ÿ ˆ]oú+_²—¿á2ø¯ÛõG»qíÍ~‰ş }ÿ èáæøuÁyÕ?äşÿ #ëyßıÓÿ À%ÿ Ëèÿ ÁÂÿ ğJî1ñÓÅ_øe¾-úuñGğyéúõÉÿ Á+èºx«ä‹|[ã®OüŠ‡ç’kùÛÿ ˆ]oú+_²—ò9|WïÏıßÇÿ Ô0Ä.¿·Çı¿ÙO¸ÿ ‘Ïâ¿×şˆ÷aëÚõèßÿ G3ÿ Ã®Ëş©ÿ '÷ùÖó¿ú§ÿ €Kÿ —ÑüD1ÿ ®ïñ×ÅGşè·Å±ÇşÃ#·|Ñÿ Á+³ÿ %×Å8õE¾-çNOüR¾™šşw?â_ÛãşŠ×ì¥éÿ #—Å¯ıŞ¸ï×èÿ ˆ]oú+_²—§ü_¾¿ôGzãŸZ?Ô£ı<Ïÿ ¸//ú§üŸßä[Îÿ èŸş/ş\Dgşÿ ‚Vÿ ÑuñQàğ~|[ëÏıJŸ^†”ÿ ÁÃğJŞß<T:óÿ 
[âÙçœÿ Ì 1ú÷ü¿ø…×öøíñköRçŸù¾+şòGyàwÈã¥ñ¯íñÿ EköRì@ÿ „Ëâ·n˜ğ§zqŸÿ UêÑ¿şgÿ ‡\—ıSşOïò­çôOÿ  —ÿ .?`¿kø8Wàv·ğòÇáÏüÊ}ãWíAñ__Ó¾|<µÕşx·ÃÚ'„µo\C¥Øø†ê×ÅZN’¾$ÔÖòòoèV¾m¤ú›¥Ö¶ñév“[ŞşÓşÅŸ³›şËŸ³ßƒ~ë:ıï>#]­ß~3|DÕ®d¾Ö>"ücñ„¿Û?|_©jé7_o×&šÏJå¬t+MM°ÙF«øÿ  ÿ ‚üQı¿jOÚ#öñwÁÿ  h’|)Ğ~ê~+ÖÅ·õpÚt'×ÅğœVßØ$—É¢Giı òêš¢ß?Ø¤Òmšãúç±ëƒÜu†î@ëß¹é_”x“_‚2˜á8SÃÌMLÇ)„£šgåz±¯‰ÍsÂTğx7^8l,~§•açUÓ§F:RÄãkÊ¢©VŒjø(âª9b1±P©ü:T’´iÁYÊIsIóT•®ÛnĞVÑÙ&Hè02;õçÉÏsM;{`4‡§ûl:ş|ãéiøÇCÛÔ÷õÆ:}Iæ£LíãûÏ½äpGÉÇ'İ3_“‡Uèÿ 8ŠüFø×İ9ëÏ ®:RŒÌHÇ§RâÇ^İF(sû·äòÿ  œòz~>‡ø³€7Êq1ÈÏ^‡‘Ğç9éÎG94^öìx#í×Ó®G4§¦0ß§¿=úô$ğFM `rqœß$‘Ü}:sHaTÉ ‘×·ã©è?  â}›¨Ó<çÿ ¯Œc"ŒöÁ=x!yÇáÛŒcõÆ) ƒŒzí “ÀÎ@Ï\ô'ŒqŒô¥8zó»sø3œë€Ã?ø.í}ñ¯öCø_û(ë¾:Oû;Z|Uı¬|ğ¯â‡Äûo†šÅ›Ïü5Ö¼-âıC]Õm<­ø{ÄrëZCé–º´6:=ˆÕïŞÅlmd"åâ“à¿Ù[ş
iûJxËÄ_ğQxSöËĞ¿lO†ß?`Ÿ|}øñç_ıŸt/ÙÇâ7‚¾8éf²úG†-~êúF…}ã
ÛZZwRñ%×ƒ¯|=g¨A¥éZŠÉ©ïØ?ø)Çì-ñ?ößğ×ìâŸş0xOàÏÄÙÇöŒğ—íáÏxÏÀWŸô+ıcÁº7ˆ,´­6óÃ¶¾#ğÉš¨êÖ×—kç†{{Y­L@Î%ãÈà”?¼QñãŸí-ûe~Øÿ ¼wñGÅ_±§ÅßÙÀ¿şi_~x@ø¹ag¨ø³ÆvÉãMkSñ¥Æy~ZÊÊûYÓ`…&¬âXìM©ı_Ó-8Û]ïÛÍy=-uºô}~	øÍÿ &ı¶ôÏ‚ğM_|Hı ş#şÌ³ÇÇ_ÙCø¡ñËöÒøUû+xö¿¹ı õ	¶§ƒ|Yák_jº/Ã¯
#ì:ñ¾Ò</º”š•Å­’]>í´ïİ¯ø%oÇo‰¿´?ì‹áÏˆ_~;|ı¥|Aÿ 	g‹´7ã?À4¿Ó¼?ãOé7°Pñ„õÃsøâJÚNañwƒãÒ-môÙRÎæûb|/¡ÿ Á8?i¿…>ı’ôïÙöÿ ğW†>&|ı’ü7û>ü@økñ3Áz‡ÅOÙçãƒtI­¯l>(éÿ  ø‰¦]øWÄBëQ´şKëñ¨é§BÓîoVßí+ªıİÿ Òıƒ[öø1ãŸë_#ø©ñâÿ ÆOüwø§âı7ÂzÃÿ 	Mã¯¦•¡§øÀZEÅŞá?
éÖš=œ6lW72ÌÅà·{k Zr­“];úéÿ ·5äÑlı1ÆOocƒÉü0ƒwÏy#óüG#­'íNxëúã·qÎWŸ×ÔŒg=‡å2rA æ‚Cê¿§sß§íĞq‰Á†Ç~œ`öü¹úéYŸˆ4-}6×WÖ´­*çY¼OÑàÔu[)µKù^4ŠËOŠæhöîY%ŞØI;´¨‹.lsê=Ï¿'¯'Œ“@	ÓŒ7SÆzúäz÷É=©‘ò¼÷ß$wù›}>Ç¡ëÄ7·¶ze¤×Úå­…¬f[›ËÉÒÚÚŞ5Îéf¸™’(Ğó4ª2#©‡JÔ´ıcM´Õt‹û=SKÔ [ËGO¹ŠòÆúÒàmî¬ï-¤’ŞâÚxÙdŠhdx¤FWG! ]W£üÑ%üòÂöÑn.,ŞæÒêİ/,Ş»´3Bñ­Í«MÄ+qa$&X'ˆHŠÏª
7àïş8üKø'ÿ »øÏãÈ>"øËÄ^7µı¹>:ü¼k¬ÂEãøcÆ_ğRwölO]jwp¥ŸöÃ¯‡ºâjš!û:?‡´èÆ™•nÖ«ûÍwÖâ$±	¡š3$ysGæÆë¾)Tªr>>WPÀ`f¾PğoìEû<ø7àÄÿ ÙÑ<9âüøÃ«|A×¼}àßˆ~5ñ_ ÕuŠšŞ©âˆ7öº‰u[ıcH›Ä+Öõo\6•h,<E}.­¤>íbxÂ¿ÍWéıv?#?kßxÏş	Ëñcâ„_³¯‹ü{mğ÷âÏì}ã/YxÏÆ¾*ø¥ü'ø³¤şĞşX|}Ó%ñş­â)ôSVğ¯Æ]{Vñ5ƒ\Çáßj´íJïM[êsOèŸ>|XøEûQèß¿d_øúMö™ı•¾(xïâ?ƒ|uñÇúŞ™yã/€Ÿÿ g|Q¦ø×Äz§Š5¿‡~%øÉğûâ_Ä/†^$ñ„m­®¯ï4=¢Şhà~™x?ö&øá‡_>ë:'Š~,xâŸƒ?á[|A¿øéãïüdñW‰şEk©ÙXü>¾ñgõo^‡ÁšDÖ±.— YŞÚØÚjZ¶­®¬M¯jš†§sĞüı•~ü²Ô¢ğ}çÄoëš¦…eáWñ¿Å?‰ş:ø±ãÛéåô_é1ø­kúŞ“á[Ë›»-"ÂêY5_TÔûSw¼`ÛOø:/òùöGå¿ì¡ñËOø]ñ’×Á_<mãNÇÀ¾&ñ?Àÿ †šn—ªx“Ç¾	ğ%×Æ¿ÚÅĞø~ÛâŒn®UµH|5â-;Ã²Ã_êš”ƒÄ¿¼~!šÏA×!Ô§ö_ø)İïŠ´o‹?ğMMSÀ¶zæ±¯êŸ¶…·†o<%¦|CÖ~i^:ĞàÇÅ?…¼Qwc;i†‰ÿ 	„|=¯}^ÒõK6¼Ñ-@y„¿ªüı„¾ükışkr&ñzãÃ:O‡şøPñ7._â­§Â]sVø¤k!ÑÚâëHø£âo†Ş*Õ5ß‰âÿ këñµã=Nò‹èõô¿ÆÙ«áwÇ¯üñoÄñTºçÀ/ÅñGáŒŞñŸˆü+ãˆ´Ëİ=fşÏB¿³¶×öèš¯£ÿ gë±_é§k:œfæéA_×â~Føwâ·Ä?şŞğQß|F½Ñ?gÉş~Á_ > èV¿¾+ëŸ¾ü>ñˆ¼UûBiÚÇÄíWKÓ—¢Ù®­€¼ˆìôMÓYÔì¼-igè¸ÔK?%ñ?öøŸñ«ö|ÿ ‚²|ø¿sÄ/xş	ÿ mñ›áÿ ‰üSğJïà¿ˆ/¡øŸğçã|W0j?õßøít›-cáÆŸâ?j½¦‡âM=/^ÓT³¸»Ó­µYÿ Sş%~À¿³WÅïütñßÄOx£Äš¿í!ğ‹FøñrÊãâŒ ğ÷ˆ~øjëQÔ</£Ùx~ËX·Òü=}áWYÖµÄ¶¯ØjºÎ¥zš‹K?ÉÅXÁ3¿eË1ñV{ÄøÃ¯ë_>
Ãğã/‰|Oñóâö¿âo‰ß`¹ÔŞ×ÅúÆ£âù®5MvÏMÖ5?é~&"=oBğµíÏ‡ô½/MšXd
M.»t·ç­şGÌ?³–•¥ÚÁCşjVºu…¶£©ÁşFşKxo/–Ïã… ³—1Æ&¹°~æÜLòbıÜaWŠÂÿ ‚¥øÿ Æß~>~Ë?´O‚|Kâ½+Aı™tÍ{âÇÇ¿hZö³i øÓàOˆ>*|øIã8¼[áûK±¥kø+Ã>>ñŸÄ]BÆâm2ÿ ÃwÛMç#´Ñ~(şÄŸüe®şĞ¶Zoí‹?e¿|<ÿ ‚cë7º¥Çõ˜´É<WğãQğ7…µ?jZäº^¹áÛíwâ—Ãë˜¾&jÖ’]=åıÅÆ²öVÏ%}éñ/öOø5ñƒÅ¾4ñ‡Ä?k×>
ëß³ÿ ‹|?/Œ¼Gƒu_…Ş&{éõü!úhPê777óÜÿ ÂE”zôrˆjhbŒTí¥’Õy%åêµì~Xü!øÓâëïø)Ïíñ#Åî-şxçö,ø‘ão‚šg‹|UªZü-ğo‡g?Çágˆ¼om§›ƒ¢YZxÕç¶ñ¾»âˆôù¯¤ğÕŞ˜çì°_µım_Ş3øÕâO…š§¼;ñ3Ã~"ı†gı¦¾|Pºøâ/„š,¾1Òü_ÿ |º‡…ü3«øÒOøËáˆÅşŸ®xzïWÿ „oYº¶´™ìõ»ëVÖêËìíGş	Ûû*jšïõ»¿kşWÃ¿Ùç]ı”ü3á¨|{ãKCğÄúE‹âO‡ºŸ„àÖ£Ñ5»vÛKÑîµ-SW³¼×¥Ô´m'RSîÊ)+áÏüSöbøYâ-Æ>ÿ …Åqã/|ñ'À7Å"øõñoÄú÷ü*Gk·¯o5¯Ş&¡¡ø9,â Ú^Á<>¿’ë[Ñãƒ^»¹Õ$OŸ¢üÿ à™ùñ;ã—íãïÙ_ş	}ûlşĞ:_…>-ø§ÆŸµìÛñgá×Â€	ï4ÿ øvgàWÆ=C_ğv…«x‡ÆúõÇ‹uê1éW0ˆáğ†ŒÇ§]¶±ˆÖëöı¸~:k~
ıŒ|'ğïÆZ'Åïˆß¶„¾,ücÓ~#ü)øW¤I¥øáßÃMÂ÷³øGÃşø—ñCáúkŞ,²ñ|9¡kÚ§ŠõıR†ßGñ…ÔßômAaÒ´?¹lÿ `ÙëNøaû<ü²´øƒmàOÙ[Æ^ñçÀí9>)xóíŞñ„ôûı'Âí>¶ÚÛjŞ$Ót'UÔôÍ7Hñ-æ¯§ùà¸·¸_,ÇÄëğLoÙ?Wßqa£üNğ^¯iñ—Å|¯ü=ø×ñOÀúßÂïˆ^;‹UÇÒ|%¼ğÿ Š¬‡Ã|@}w[»ñ¿‚¼+áOêœº†³¤]]Ûi³Yu¥üÿ ¾ç©ñW~>şÕ_¾xßö]ø« ü>ø	ñwÃŸğOÏ|{ı¥ìµoi¬5½CÄš×ÄÏ†Şğ‡„ü?.ü=¥h:ÄµŸø¶ê_x¶óÃÑë¾ğ¦|Ú„wúô_¡¿ğN}«ûşÆUTÙ{à^Ğ€ü+_à 0 ÆG9ã¾?à²÷ÄmOÀš×ˆ¼5ãHµoxÄßæÔôOŠ¿t-Kâ/ÃOj2ë^/ğÆ]SKñDŸÆ
øŸÄ3İx“_Ó¾ İëãU×¯õ]FöY¦Öµq}ôwÁo„
ø	ğŸáÿ Á‡6úµŸ>øcLğg„,µ½{Xñ>©eáı²Òì®uí~ïPÕ¯şÇiVğIyy3Eo6ñ”‚Q vÑ+ßÓÒúúìzl„ùru9Vü01ÏŒy¥Œ¤O?†1^:öÆ À²ºç”€F\ã©ìs‘ÜgŠËœËeÀã>Zãÿ 7¿?Ÿ<P"lûş<úıÑß§^:
7œ˜ïîxèy>ß‰éPˆçÿ £¡ê”ô>÷ñë×­&ÇúáĞõJ>£ï3èGµù?Ãüÿ «?+şLşÙ3Ş[ÿ ÁIà–³i±G>ª¶?·1Ò “îÜjşÎÑÏk©	$‘†R$‘Œ€¿`ÏÙ~×z„5¿‰µòÂúñÂÚágímû=ø>%h_­<}¯ê—P^j?Cüa×?áWßüñV”ßğ§¼M£øáÅœV—¢ø^ítcMÓ¤ıö×gßx§ãŸÿ h/İ{Ç?<1âü.†øÛ®‡à$ñÔV¶~9×t[!†Y|Iâ­.ÂÃB¾Õµ;«ö²ĞíåÓ´htèµMeµ/^¶Ñ¬l®¯/­-4ûKİEã“P¼·Óí`º¾xcò¢{Ùâ-ÓEòãiŞFDT… wÓgøi®Ûë½şÿ Ÿò£àˆµzÀÖâL¶‡€~"Áüwá™õ^X\şÕ:LZ•å·í)w“Kö?íÿ ßYj^>†Dº··ó_ëLºb$ÏãkGÕk¯_³oÿ jİ7öfñÀ_~ÈÏûXø/‰!øÁâ„ğ—5Í[Pø ©ñ‡ÃšoÅ½kâwl> ü9ø¿ÿ €¾'xT‡Q:GˆöË¡ÚXÿ IÂÊ1°·'’é1kÙu!“Í0FÙäó¥/(Ã¿›&X™5æÑìno­5;‹M>}JÁ&KBm>Ö[Ë$¸ \%¥Û†İ&«2Âè%
†Àòİyotï÷i§góş`>8øÿ ÀÖß?à©?iñ‡†-Í—ü¯ö+¼»YõÍ2'µ´°Ôÿ àŸ©}up¯r{7ğŠÒêyÅnşñÌèÚ6¢-½^ÃÅ:§Æ?Û{ãnƒñKö²ğïÀ¿¿ÿ m¯‡Ú§Àÿ †ßÙ>8½ø¹ã¿Ù’ÛÂ~¼ğ§†şx~Ëâ¶‘áOü(øËk{ã˜> ê–	<`öZ´šî§âYÂŞ—Ã¿Ñ#hZl`}?Lc3˜>™hŞcŸ4–”%É7|Ì“4Ùÿ XûtK¨l´ã©ÛZ›;m@éÖŸn‚ÍØ3ZCw·ÏŠÙ™šDÅA(JŠÍ{hôôíúZ_ùëøû2xWö½øWÿ ;¶Ñ¾3üO½øÛmûOşØ?~ø®Ïö†ø§xßô«/ø{[øim èšwÆŸ¤éx£ÂÚ\ĞêØËª\hjŞ±Ô“Ã2Ë£¯ÜğN}wTı£´»ÛÄşñuï…~ıŸt¯ê:—‰-t½7Ä	ÖîÇãª|5¨Ş}…õ+oŒÿ ğ“|2²ñÚ{ßê>øaae¨\iºÀ–çî?‹_µˆşğ§ÄïüÕ×W°ÕÆ¿
ÂÖ%1ZÇyku¦OŠ<;âêuı–£y‘jzëZ\µ¶©¦½¦§cgycğûÀÃøkÀ†K/øWJ·ÒtÈ®ïo$ Z[íJşâG¹Ôu]JåçÔ5mRéïRÔî®ï®K›™]7{|»vKôÿ ‡;làƒ=3ŒgÔqŒõÁã<ƒÖ”’=yúã¦º}Áà{š‹dä¯®t§ûèõOzM“ãıpì ò×Øûİ³ß¹ühÉşçıYù^lŸCÓ±=†@ øï“ØúS#8_l¸î92?N=¹?—9›'?òÙyàşízsÏŞÉâôVU
ÇqÉÉÀ^¬X‚3¤ÎîPS·GøØmQ@Å=şB’Š( ¢Š( ¢Š( ¢Š( ¢Š( ¢Š( ¢Š(ÿÙ
            [firm_right_thumb_ftype] => image/png
            [firm_other_info] => 
            [firm_bank_details] => INDIAN BANK
            [firm_bank_acc_no] => 6055720590
            [firm_bank_ifsc_code] => IDIB000B119
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"SJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"SHIVAM JEWELLERS","firm_desc":"Every piece of jewellery tells a story","firm_address":"B.T.C Road,Howly","firm_city":"Howly","firm_phone_details":"9101618753","firm_email":"shivamkar54@gmail.com","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"JOY MAA KALI","firm_form_footer":"","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"18BXVPK3167R1ZA","firm_since":"2022-05-03 17:25:53","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"image\/png","firm_right_thumb":null,"firm_right_thumb_ftype":"image\/png","firm_other_info":null,"firm_bank_details":"INDIAN BANK","firm_bank_acc_no":"6055720590","firm_bank_ifsc_code":"IDIB000B119","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => SJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => SHIVAM JEWELLERS
            [firm_desc] => Every piece of jewellery tells a story
            [firm_address] => B.T.C Road,Howly
            [firm_city] => Howly
            [firm_phone_details] => 9101618753
            [firm_email] => shivamkar54@gmail.com
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => JOY MAA KALI
            [firm_form_footer] => 
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 18BXVPK3167R1ZA
            [firm_since] => 2022-05-03 17:25:53
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  € €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? şş(¢Š (¯1øÇñŸágìùğãÄß>4xç@øuğëÂky®øŸÄWf´…§š;M?M°·f¿Ö¼A­ê3ÛiğÖ‹i¨xƒÄºåí†‡ éš¯ge?ğKÿ Nÿ ƒ‰?jÚƒO‹Bı…ï|Yû6~Éú_¶x‹ã&ƒyŸ>2|>Ò£çQñF¡ZjøŸà'Ã›}VÎÆÃX°ğå§‰~ Éáë\ñ(²Ó´=SÀZ¯/‡ÁF.µHÆS|´àä”ªM©8B+VåQÅÆŠ”¤îÔZŒÜu¥F¥fÔ"ÚZÉÛH«¤äŞÉFé¶ÚKK»µësöÕÿ ‚Æ~Ã¿°ä—¾ñ÷ÄCâwÅ;étËïƒŸôëˆş;ğõô0Å;Åãùm5/	ü/&+‹w³µøâojúûL–Ò¼C©¼vü~Ü?ğv—íC¦xmÇÁ„^	ø§ø¯\“Kğ~¯:jş*YèVÚ6z¯‰®¢ø›à¿	x2ÇÄ=ı¬#\øs«|1¼şÊ’ÿ B´9¼mKP›HşM4Ø¿ƒühßu/„ŞÒ<_?Ã_iÛx»ÂZÄ?x·Ç¾,¿ğç‹£tŞ:î¡¢ÚÛx›ÂÇˆì§Ñ|KãÍRÿ SmkÃğèúçˆôo­üS¦ø_Æ¾øSãƒ_	tû_ÁÒş4Üi¥Íß…tK¯ê7~,Ôô½?Z…tÄøyiy¯İøRk-nÇW»¹Ñµø´E¸ÒãøasãÛÏ
|Ş;;ÄCF)¥„•iBnƒön.
§$+bª.DêU()aXrJj¤ ¥MÏ²²oøŠ*Ks]7¸ÓZé'jœ®ö²m;{­Ïüûş
EûW|RÕ´ï~Ù´ÏŠ´;İ(^xóÀ^	ø«â?‡~×¼!wá1ñDñ_ÃÏ|¾øTƒW¿ğ•®“3x©ï¬¼3'­|¯Ü[ê C¯üßâ¯ş+ñ‡>Yü0ø™ãoüFñg‹—[ø»{uâßjšÏ‚¾E«øsÆ~3Ò|W©xšù ğe¾Ÿâûiš²O¦Íªèúl2êğœ:—‡<!¦f‡–ÇáÆ]oâ™àŒ_>Ç¨kw¿o¼wáKr3áÕÒ¼ãû]+FÒí<}Ïƒ¿h]KÄş¾Ô/íõ-â“á»ËæKoHĞüwÎøƒâ/„×àÜ¼sñîïÅ·ú/Œ| |Uñ†«á?jÇÇßş"ø?_ñ¦…¦øgQº‚Aicm,úÕ§†ï­µÆuÃ$^x5ñ1˜ˆNˆ…8C<4©ãjR¥YÊ¶¥z°T*Ç¯,Zt½¦«u°´j5ìêN‡¥J0¥MÅûr•êF§5ÊPJœãIÎ.Õ¡)rÕ£VQOš*}_†¾=|@ğÄi?ş5x³ÀsÙ.â¯‚6Ğ<kã|4ÕuÏøªŞÇÂ~"ğ¡¤[kéaÿ î‹©x~Ut—ÄzïÒÖß\ŸXÔífú‹Eÿ ‚¶ÁP¿fOøBûáÿ íyûFxkHÖ´ïx«Â¿~+üC¼ø™¢i_Û:&½âAãí'ã…ŸÄñÿ ‡SÃza×tÏè¾‡@Ñ|As‰¬G%ÅçÆŞñ'†¼à|ğßÇ'ğŸ‰Ä9~
ü"ñ6‹àÿ [ŞéŞ&ğ£|'>?Õæ¸Ù¯t»/ø³PñÎ‰{ı©&¥ A­^†ÆÎâ=;N‹Âğ–©ªk¤ø­áÏˆüAğ·^ğ‡„ŸÁ:ßŒuŸ®¯{ğëÇµ¯‹^×m®<k|4/ˆ·V¥¢iü=åøsá~ƒ'‹ô>ÊúÓJÒuX¥Š©‚•\BxÌ=IÑ¡F•<m*8šŞÊ„hN/aJ–bgÏzøº´ëQÅÂ,$§=¥N5ã
¹©78Îs”¨JtáÏ'R3Ÿ<ç_ÙÅÅR\”a(T£)¹5ËéÛöÿ ƒ¾>8jeæ—ûNü	ğ§Æ/Â:¾‰£kŸ¼÷Ÿ
üu¨éZœz‚[ø¼'¥é¾8ğ–«â]rşÅ¬t‡šUŸ„­õ¬ô˜¼i«êÚ¾Ÿnÿ ×/ìQÿ [ı‰?o‹xìşüTû|qsğâ^‘wğóâ|J-ÅÍÏöo‡µİ–¾.]*6X¼C7µOÛø[Pó4OË£k¶×z]¿ùM|>Ó4˜~EâŠŞ¶Ôíş+èŸc‹Q°†îk6óÀúm¾£ªë3ı¥¼k­j>1ê¾;M{W²û&­­xŸFÑlaÑ´mRüå}®xÖÆO|qğïÅí]ô[é“ZÚx^òÿ Ã6¾ñ·Ækz‡ƒ4jZ5Í†wñÁÚ²ÜßxÒãL†ÇV±¸Ğgñ^j:ÚëPhşş:ÅOŠ§ña©U…({wí”êÎ8jJ…U4ê¼dêĞ~Şá	:jüŞïl%FŒµU§7È¹9a9{J”jI5`¡RôÜÜ’“—-¯/÷¢¿ÿ ø%Wü—ñßàåî¯ğÏş
>ºÏÄ¯€wˆlì<=ûFN–÷_>h²Yİ¿ˆ¿á6†Æo~:ü?ğ>µ
éã;MMø•} [ÉâÛ~&B-Cşì¼ãß|Qğo‡>!|9ñN‡ã_ø»K·Ö|5âŸê6ú®‹­i— ùWV7Ö¯$R¨exfŒ•šÚæ)­ncŠâbO¥Áãğ¸è9aêÂr‚‡µ§ÆR¥9S…G	ò·ïATŒgm¥x½U*¾¶IU„¢›|’i¥4¤â¤¯ÒVm_u©×QEÚ`å?~7|.ı›şøóã—ÆŸiø_ğ×Ã×&ñŠu»˜í¬´İ6Ì ¨¦FSs}s$~—§Á¾ëRÔ®­l-#’æâ$oV¯ópÿ ƒ‰ÿ à®:ÏíûOŞ~ÇŸtiõßØëövñå¾‹®ø‹Jñ,z}¿ÇO‹§Bñ§ƒ~$êz%•¬WŸü'àmÄ:öƒá-ÂÒî<GáıOÅ{©[xÂÖprc±K†©ZÑœãéÒu)Óu%¢´]Z”âí{¸©)4­ÉÅ=ğô]z°†ª-®y¨ÊJ+»äŒš½¬šMİè™óWü·ş
óñGş
{ñ8ü.ÑäñOÃ†^#ğÍ–¿ğWà?Å?xu<4¶zn¯­ØkóüA´ÒäñEİï¼Em¢ê·o­\_[ÿ Â-¤éÚEçÃëÍ\v¾#üìğ/Š>3ësø{Çú÷‚>ë~2ø1eâ/xsÃñw…<m?Å?]x^ÃÂÖ¶Zı·†uÛŸø[ÀºÆ“öî¹àëmF×Uñæ…aa¥YÛyú,Cñ>µáı;ÆßüCã;ï†ßtxªö#Pñ¹©jº–³e ivgÅ+w¤GÂı;HÑôåñ;i:¥ybÚõüZE„à¦ğúG…tƒ>,—Àá«/ŠzŠõ_F³×|eâ/iÿ u½_|@ñ6•®‹$·×5ø0Káßè7ú–µ¢ZKàíOÅ~²ºĞ.åÓgüÆ­W§)Ô§ÏŠÄÒ«ˆrÄRö·s•\2ÅRÄá¨Ã°qÀÓÅÆŸÖ>¨ªÔp<UtßÓªj„”c/İSœ)%Nj6²¥Z‹t§N¬İlñ“—³ö®æR£7#­øo©øGà'Ã‰·^(ÒuïíŸ‰–^ñWşêø_âÄ­/Âšñ‘¯xËÅ7#ğş«á]WKÕµ_x?ÇÒø'â/´¹muİ2[ûh´)ü#§ë78.ø«{ğ§Dğ‚<_ñšïÃ¾ğ·ãMãáÃ›ßkzß‹~ø‡Ãşğî•ˆlµMKLÓ|'ã[kYêÚtš“øzËJÓ|B ğ
éš¦Œt[Ï“ügñòóÂw¾øUâ½[[û4·ZL¿u{[x<yá{]Iï4hºÂ¡Õlô]QÜZ¤÷Möèm¿á‹Ãe´°êÿ &;¼ÒHÌîìÎîìYİØ–ffbK3K1$’I'&¾£KR®3Ü^"¯µw¦¥V¤#†ƒTñ4æğÊ•('[ëÙ)óU­N´Ÿ_j4h¤ıœyouËê{IÚTä•NiÙ¾^JIÆÑ„ ì}[©~Ò^Ò¯4÷øoğ_ÂZ¶—áğDxÇWñ7îeÒÅ7>0‚åmäÕ4­=nÓÄ3Ç«ÛfİiwZu®™©Ca§[[_ş¯ã¢êš¦µ‹´Û}_[‹LƒWÔàğ/ÃôÔµ;}ÍtİßQÔá7÷ğèúr&Ÿ¥­íÍÁ±±Uµ·1Â6WÏWĞÇ+ËÒjxZUÛM9b“ÅM§%7yâ]Y{ÓŒg-}éF2zÅ[ƒë•¹jJwJ›öi4¹S´9V‹E¦‰´·w÷ı'ö¡øİ ı«ûÅzföíN}jûû+À¿´ã{¬]ÍÖ­vÖ^î5;Ÿ&>şVk¹|¨·Ì|´Û«¥şĞ–cC‹Ã~ ø_àãciáßxoNÖüğ§Œ´Û/ln;]{S·ñm´VËâ-|Í£Zé6šp}Vqo´*>øMğoÇ?uİOÃ-4íSÄzn‡uâÑ¯5k"ïT²²¹´¶¹‡J—SšÚÊæö#yÆÚ[»v6ë4ÊÌ°¾8ÏøOÄ¾×µx¿BÔü7â*Q¡¤jö“Y^Û;(’6hfU/ñ2Mmqx.`xç·’XdGg<¯.•ÿ Ù(Ór’”ı^R”c(ÅÊt9IÆ3œW3vŒç¤ä›'Ÿµœ¬šJoÚ$›MÙTæJî1nËW÷Jß¡ºGÅÛïx*ãá¿Áï‰ş'Ô¥ñ“ğûáš|-øŸªÇ¢éşÒ4O
Úø>óÇ^¾·Ö‘®5”m/BEğ¯†æñH‚¿ë÷¾–DÒìô¿Fø‘¥xCâwÃß
|4Ò¼7ã7Vğ†½ã]CÁ¿ïtOè>8ø…a§ø?R¶¸ñ¯‚ui:O…´?=_kåŸÃØ,¾"kúN±iw{â›İÃv~FWÓş5i÷W¤|X’úv½Ğdğ®ñoOiÏÄ?YÏx·pÈš´Q]j:•uc{qW>&´ğş¥¨é¶rk:2'„/¾sÃ®ƒ§ŠÀJNXz³ÄÅB”~³í]‡r—³tÖ&*’P—³,z¦§õlOÖªB¤}<>b¦¥K—-XÆ“æœ½—"©í,¹¹ı“ç¼•Ü°üÖö´(¸¿½5íGâÖ—coñÛÀŞ
ÒüaãÏxKO×üñÅš„ïü)¬xjçÄ¾KïjzN“ªéš•saã?|8ÖHÖ­5»M3X‰_VÓõ9ôÿ Øø"×ü‹âGü3âıŸ>8]ê_şøºçRñ·ÄÏ‡ß<?c~ŸÚ{v·>'ğ…¿ö~¯®ø“Rš?^ê¶–ãVºñô:µíåØ™#ğÇŒçü8Ô|3}ñöÓÂŞ*Ò4xş&øşúØü0MWÄšÎ£¢xûÀ‡ì:v£ñÇÖuû1©Ï¦êš¯llü	‚-uÙâoøŠÚãÃúÿ €şÙèÚxğøø™ñ‹Søc©|=ñ¶±©èú7ü}¥øÓ[×ü5‡|Oa¤İéº£á/xzÁ×Å±\ØÛ^EâxwVĞu‰üMá-GRĞõ] YÏÌQ®òëÔ¥
qÄÓ¤ëóaé¸B
\.JxÊ˜šôŞ_Ë†£9ÆŠÅTÂB…zõ«T©zó‚ÅrÆ¤¤èÊjªÉI·(T«Zj„iSŸÖe%J¬Ô\İV•HS§ÆRÿ c¯‡ÿ <ñ[Áø•ğßÅ:'¼ãMñ?„<[áËø5=Ä¯mæªi·ÖìñOmso*:CÆÛ¢•#•¯¯àSş²ÿ ‚±Üü&øù/ü³â†Ÿ¬é_ ¾+kóCû:ëÚ¶·g5ÂoŠgOÓíôÏ‡÷^m2Ï]øOà±ØŞêÒ<UyÔ¾#Ios hV2|EÕ~Íıõ×éØ\q¸Z8…IT§	T¤ç	ÊIEJTçìç5+ß•¾dšæŒex¯”ÄQt*Î›|ÑŒšŒÔeÎ)é(óF-§ŞÖ¾Í«7ø£ÿ òı¾ïÿ `_ø'ÿ ¼Eà›å´øÉñ·Tƒà§Âù¢ÕJ¾ğì~!°½¿ø‘ñŞòŞhõ+>|4Ó¼M¬i¦›ÍÍ—Œæğ„Ko+^$oşP—Ş¸Ò|SâŸøJ|)á)<Œš®ƒk¨Xü:ğ¾£w¨Êfµğ|Ÿ$Ñ¥×«oo¦ø›Oµ½Òõ#¬k—º%¶¬÷Ğhº”š©ş¿àìÛ=¼uÿ ³ø7¤ÙkÚ¾•û|.ğ†i§Ûê6k¢Ãã¯‡NøãÏGc}¡j–w¶š~‘¤|%ğ£q=¾³¥ÛëwúUèÒ5±;ÿ 9>ø²–ğç€uUğWÃë­f}NâFğş»kd<9©Kyyiu¤ø†ÚÓ^Ÿ]ğêÚÙİé~+.u
ÿ hk	ªéƒXĞuVÇVùŒëúÓx|<+Ğ¦şªâê¥R-F¬F&„iU•hT¡MB*­8BiU’“¦éÓ”½œ?±µ«*U%ûå%Á¦İ*4ª9ÓTå“s|“›¸šSS’]‚ôï„ğ¶—â…7°xÃ]Öõoj?üñkSĞ¯t¸¾&Şİi7‘Å=Æ‹¤økTÓµL°ñƒ[R½ñ'†ôm[Äºn“â5·³ÓuïZØüİñâDšv…mğÏF½¶©s%ş¿ñ6÷Z×Oˆu˜<Qây­5oø2XÃ‘iöºµ¼ş!´]¦MbÚ->öí}3ÄZ¿Š>„ø«âeğ—ˆ|sã}|A¡h^¹şÄÑ<5ãÏé“¯Š|c«x^ÓÂÒx§BÕµÃy«Zê–‘húx¢ÂvÖdÕô­#^–ÏÅ·öÚÅİµ¯æÜóÍs4×73Kqqq,“Ï<Ò4³O4®d–i¥rÏ$²;3É#±gv,Ä’MgÃ¸E—ö…yU­Ü×ÖjN¦"‰Òç…
ÍB•	ıV…XMÊåÍ‰¯7í#*n5šVöêÔÔ ÿ yMû(¨Ó•(Í'R	Êsµ©	E)MZ•8¥¤ªJ*(¢¾ØğBŠ( ûá‡ÄÏ|ñ¾‹ñÀ×ñiş#Ğëì’Ü[E{i4ÖsØ_Z^YÎW×Vw3C"²FYg·–˜¡š?¬?iÿ ˆcö’øUğÇö‚›NÒôßø{TÔş|R³Ò’X­c½d›ÅÔìà¸šæî=3UÓÿ á%(×3Î Ô ºÓã¸”[«·;ğ:ßö'“À±·Ç‹ï‰6ş=şÖÔD‘ø].ÛJşÈìÖSœéö‚<ÿ ;÷„ıÜ^Æ-à˜AJ_ãhF*Ì¡5¬È+şÎÁ*Â’20Ürù¡EhjÃN®¦4ƒ3i#P½[\gÏ:p¹“ìF|€|ãmårß» +>€> ø!ãeñ-­—À¯øŸÄZ?ƒõıbÑôıPO¿²Õê[¨¼)>£&ªÉ…¼E¬M¡Öw:ŒaÓõhÆ—§â=JO¯uû/€ÿ ¼/s'ÄíwLø}â½;Y×ŸãO„~jºÆŸ©øÂ~ñÇ‰|/â¨5]CÃZÖ«jsxgÃº…ti>?ƒO»ñÆ­g¦I§hú†·ãÏ/å~¥|ñş…â-Kà×‰¯¼=â}|øX×|5ñGÁ¾ğƒkoâïiú~¥Ä?øòë]ğÔŞñ½ÏŠ´½jãÇúôÚ›á];ÄZå†‹•§ZëÑêÄX`Ö?*ôëV¶p£(â£Bug+ÊJOëP£IÖ„a^	ZXŠV›—·–â=§û=UNkÜ‡ïâêEÒsŒ"¬¥/däÒP“nJ´Õ9û‰y_… Ôl¼wğ“Åÿ ¼5áßø_Kò<«:ëáŸÄ]cÀIàÍVJ5‰RøvÇ]Ğ¼Zt‡Ñ.á“ÄwúD:7ˆõkK[m_DŠÎëMğÏúñÿ Á'¿mX?ooØá7Ç;ë¨fñı’j¿>.ÅÚ–â‡ÃË¡¡x‡Q¡µÓeñeªi~8şÃH¡ŸÃqø<;¨ÛÚjºUı¿ùHkß-'Ñ|sğwÃ—ø£x²ÙKl7×íã·ñüZ¶Ÿa x{GÓ<Kãâ-zûÄRÍ¨kw^>8ñß…â³Ò.uM|GuÃQÿ ğhí¾—ÿ ¾8~Ì^&´Ô|5Æßİ|Rğş¡c>“¯xËá†¿?ï¼1a§é:?‘>©£ü@¼şß¿º³•¯"ğ.úî¿¬ÚêòY™&+ñ7«†T0óqÃ¤êº•çŠ¦'	Š®«Mbç9ÆU(¹U„ª8Óu§9ÆSœu
¡UÔ«ê]C–šqä¥Z”=œ}Œc£4¡%)rF0²‹ş[ÿ mê´Wí•ûZşĞ·~9ò|%ñwö®ø©ãÏx‡Tñ»Ğ´İCÅ>#¶ğí†.o4ïIu¡Éà}CKÑ%™íôoíH¼%eçM.amu?xSÔô;Ïøâ|ß
5É4]Ä·ow`t¯x£Sğî‹¥;GĞüMªxjM½ğ—ˆa»²¹Ñ4okÑÜh÷Všx×,cÑä°°¼ä/.<e¥Ã¯ø;ÀúFŸ«Áã?í‘­xÇQñiš]ä>-Ğa²Këİ.ãÅúÍÆ­i§øzKVÛû]n7ŞAe¯ÛÙj’i6·÷•®<]àí7ÆhÚ‚µKÛo>‹ªüDñ5ò¬·ÇMÇÂZ]ø1“PÕ5u2ÇÃš¥ˆ,tù.TXï¬“L×f½û?Îb«WÌ]WR
½<Dãìªáş®ñ˜iJµákÕ”*S–Í{hº0öx¬léÆPÁ©F¬_¿J•,‚„)Òï!WÛ{
Ê4å*ô©©FkÉû¦ª>zhÉ§‰q•9/ø°¶~ğŸƒ<1§É=´¾!–ûâ'ˆ4»ÁâÏEs©*éÚĞõKW––qÅ¯ÚÜÄnuä™ÌZ–±«IEàUë?dÒÄ. }´m#Âºe­„Ú\w±i÷Q_İêZûŞZG¨…¿H.æÖe¸‰/R;¥I 4”2&¯Ğò˜µ€¡7ÏÍYÔ¯'QJ5_¶«:öŠRœÔ£NP‚Œç9B1ŒåËwò8ö¾µR+–ÔÔ)¥œ³„c.WÆ-9)JñŒc&Ü”cÍ`¢Š+Ò8ÏŞÙö`øû:şÃ~ ÿ ‚’~Õ->6^êš£è ş
k²ˆ¼!ª^ŸÏá;gÅ–sC=®¨u=nÇZº6š½–¥¤işÑn5{}+ZÕµ]2=?Ä­à±ß-üAc0øû!ÇğşÎèøUv4KO'Ì´Û{Ö½¸×-%û’¸µwO%Œğƒhß®±öŸğgş
•ÿ ·Òb/ˆ:GÃ¿Úàö•¦Åm¢ßæ»†ïÁZİÍß…<ug¢yö×~!ğ~¿¢ê@ñeæ™æŞxwXÔu	nm÷õæÓö¤ı¾?~Ç®~|xğ&¡á‹ö’á¼?â(kïø×MÂcÁŞ&Hc±ÖlYßıWÒd³×4Í/PÙÇüYáÆ?<KñÅ~ñeCâ†UÆ™æ&àŞ'Åc(<‡ØxP§Ã¸îËjÖ£‚«ƒ¯†Uñ˜¼ç'¦óõ«,~.´(â0u'ıÅù¦uÁÜ7À˜¯±_Ùü)[…òšù¾q“ĞÂıc0âú²«W:‡â•:˜¹NgG…Ëñõ
kB“<DW«ÁC>0üø÷ñ³Âÿ >x#Ã¿ü'âß„>ºÖüáÍFĞáğ¿m'×4ÿ é7öº†™eu}¡i˜µƒco.·¤¶™«aŠò(cúSöğ¿†¬àßµËèVzÕä
MŞ±k¤Ø[ê—FçÂš´—çP†İ.ç3È«$ŞlÍæº«>æ ×ãí~Ï~ÓGş5µğŞ„cÿ -`ÿ Jş·á¼‡	ÂùUÃ¹}\UlO„§€ÁOˆ©‹ÅıV…ã‡†#UÊ®"­:\”å^«u*òsÍ¹I³ğŒ÷8Äñq˜gxÊxzX¼Ï<^*J0Ãá¾±VÎ´¨áé¥N„*Tæ¨©SJù¹ ”RGãQ^áä…}9û?ŞO«ø_ãGÃÃ ·‰,õï	h':bø¢ÃÂ2Isá/hënêÑM¦éúj6µ¹â4A>¡¥xm´Ëkı2êæßU°ù¾…ı–ªÿ ü-m¢®‘.§y¦xÖoA¼9w~ñÖ™ˆ“I#T“CşÔ¶²›R];ı8[Dïgş’‘WŸšÅ<¿7oÜSX¸ó9ÅsàçT/*r…H{ÔW¿	ÆQø£$ÑÑ…vÄRZÚröNÊ/J©ÒzIJ/I½$š{4~…üMñ?‹üAiğ§Áß
¦øáÿ ˆß´Çí¯ëº5­.ÿ ÅŞ,Ô¼#á…Ş/ñ¯†®¼¢ÚŞjOyãÏj¼ğõ¦µ®^ëÚG…íµI¼=âgÆÿ dÁ!5OşÎßğToØßâG‡ü|<Má{ÚSÂ¿<iâMÅpxÏV×!ø¤±| —E×4M'Áiáßé^ñï‰|ZúSÜüAµøy§x_[:d°%£{ªü5àïˆ¼ğÿ àw‰|áß†všu§Œlü+ñ{Áw~$´Ô4K|u$wÑ~øªößÆ¼v—‰üY¯ëŞ$±ğæ‘¢ÅeâÑ´Í:æM
ÎúóÕ¿gÛïŠÚ7ÄOÙËá¿Œ|3¡Ëá¿„ß~k¿~/øÅ–ÚÎˆ4í
ÿ Iñ¿‡<QgàÙ<} 5¤:Î¥øoÅú¾§mm}©\xo@·ÕSÃ2ËZÅç¸IÔËªCÙS¥‡¡CUÕ«ˆTUjôèâë¬D¡:•]lOÔãKN8:•3<LêÊÜißèª(âbÔå*“©J
¦êrS”èÓtÔã(RöÎU$ëFÆ¢¤¢¥ä|­ZE­ÚjŸo¼W«xWÅ,ºô>µmwc¦iúÕÍœÚaaiŠ¼Ci«ëÛ[ÓÂóÅ$—-<š®©ßÚê·st·úï†á1ğñ›Å^ñjxãV×m4{¿ÊÚ—Ù<GªÇ‡-µy£×µ9µMa4ÉõM%4o¦İM{wc¤‘u¥z§íÉğçÆ²Çí¿ûaüÑ<;eğ»ö™ø± è=”Úw‡tCÁ67×—Ã¾3Õmî´İM,´í[ÃŞşÅ‘è×ºÄZ¤‡EûV«.§,á/Øx~ãÄz‡¾*&½®_Úë©{áÍm~›KmvÊ[RV}ÃşÒ5bÅµ¶›¤Ûø²;no'Ñ­o5{tÒæ1˜<U55<T0²—Õ(`TªM~ûR4’¥ÄRyÆQÅTXhº±§J1œ*R«éPÄaê¨8Ú„±
?X«‹åŒu§U:—©Š£7ˆ¯hÍ:uä©¹T“ŒéÔ§á?.¡Õ5Í]‚Ø_ğŸ©2jtZMÓ˜õ_LàéÖó\ÛÚÁyİ¤vóÍnmg… ‘ád'É«Ş>'Øê×ĞõMOIÕ,®ü5¬ê^¼¿×õ‹_^Õ¡’4½Ó¤¼ûp½¬:Ùï#T'ŠA¨ZÏk©jŸišhü¾÷%©åÔcQ•ZJucÒ«8ÓJ¥&á%ì}œ£k5%8ÂjPÈæP”1u¿ï#N­å	Órs§6á4¤š©ÏºrMÆR¤Ê(¯²ÿ `¯„>øÃûFèV¬XøkğëÂ~>øÓñBI'ñ…¾øKTñ”ş.ƒzÛx›QÓ´İRxš9âÒµé­¤Kˆâ5‡gø>áÜï‰sW«‚È²¼vkˆ£†ŒgŠÄSÁaêWxl-9Îœ*b±.
†œ§Î½Jq”â›’yV]ˆÍó,W…pXŒÃC	JU(N½HÓU*É)8Ò¦¤êU’ŒœiÆM'k4øWÅ?~øÇÃ5ğvµâ‡9ğôºg‰|/â=ëQğïˆ4Ãyiş•«éw°µµÚ[êuÔW×1µÔtÛ°A¸³º"Oë'ö+ÿ ‚µşÏŸ·ç€ ıà¦ğ%×‰üM¶áÿ ˆZİ®“à_ˆz±Cg¦Í{qllÛáWÅ=ò–ÑüE ]é:>£¨Ë,z-Ï…õ)´íRşMş$üAñ'Åox¯â7‹î£ºñŒ5«ÍgQ6ğ­­…¡¸|ZéZMŒxƒLĞôk$¶Ò4-"Ñc²Ò4{+2Æ(m- ‰8šüƒÆ ¸GÇ^Ê—ajpçd´(cxkxWSÄÜECÏ“gt£ƒÅc2ê8åz˜<J£CGN–6/îğÿ ã¸[_û>k”b*N3+ÇÂø,ÓÛ…±Xnj¥^tmjs•&ù«Qç§Söş
Ÿÿ §ñwìâˆüyà;ÍWÇ¿³?‹µf±ğßŠ¯#_xX¹Ïmà¿5¤0ÚÉ4ĞÇ/ü#ş(¶·µ±×£·‹M3T‰mn¶i¯ùF×Àúãğÿ Pıf¿gàšw¿?jOØÅ²ßíax«IñGµ‹?‡zŞ¹ª®µâI>êö:_ü!W:¤’%ÌÉ«x7^¸‡Xğ~©&¡.£§i–ş­ìåÒ 2~1~Ôƒş	¿ğYR¿	¡T.¹ycğv¶Î‘óó²¬nä&~DgûªHğ~œeâ.*\uáO‹•0ùŸøIÉ°5ø·NpÜmÂüC†Çb8[‰jaàùpù/–c)ætc¨Õ§JuRÄÔÄ%ìqŞC“apü?Å<6êSÈx²†:¥fåW*ÌòÊ˜zY®]ÎÒö”hTÅĞt*]óFråıÚƒŒ4QELŸ…}û*é—·ÿ ôË«MNç@‡FğßïõZipksøZÚóÂZÆmâ$Ñ®§µµÕ[KÕµ½2tÓ®®­­¯dÙm=Ä1Jò/Îuöì×áºğgÅ¯EiâmWÄ¾›¢øÀğo‹4ÿ 	x×Çz‹ø§Ã×ˆì|uq¦ëº–¥âÎ¾Õï´}ÃúÍş£áûıJÒ;H’yu-7ÎÍf¡€ÄEÉGÛEa“j·ÖeÚ£Tß$jJoÚ5J1‹•V©ÆMo‡_¿¦õ÷%í4¿ü»÷Ò¼S–­$¹}ë´£­¶>ë®´€?|c«x÷Æ3ø£êŞ"ğ¯…u/ øsÂ
—ÃW^;ÔÎ‘7üáßˆ’høÎçÄÖ/4K¢k—å½ 7‰Vé4í2^“örø}}­|GøñzOøÃâGÇOü\ğW„<Skzö:¾ğëÄ!ñu¥¾©à½sÀËã·‡°î5›ø”øÎâÿ Âk¢êğKm%½¥—=ñ?ÄÚ!ø{áÏƒŸµÄŞø§áwğÿ Ã_YøëÅŞ2ñN¿ñ×Ã~,›^Ğ5‰¼IğËáGŠ|?á¯/Ä»Hôoø“Ä)ğ>«â/‡úWƒbñ'‡4;=5Ï}{ÿ ’Ò>#şÖ_ğSÿ ØgÃº•ı‡‰ô‹ïÚÃ_üCáù<C£êÖ|ğ^÷Høñ­ø£ÁÖv‚õ}¢j¿ll†<W¨øÏÇ~Ó5H!ñ¦Ÿioy5Ö­ğ˜L&'Z.Øxb±RXš8ˆºsTªb12t¨Ó–NX|d'Î¢ƒG>déÑöç^œ ÓJn•5ì§MŞ<Ê4§9*Ó—´£(É©T‹’U[¦•ù¥ö·ü©ûYü.ÿ ‚ˆiÿ #ğÖ§kğïöÆøcá¿ë>-²¸kM/Oø¿ğ2ÂÓá·Œl$H´»«;P¿'ø}âk›«¶º’òëU×§É&ûN ¿Ìõ¼Z†ü1¡j“j^)²Õ<9$¶§‹ot­2÷I†êmJâÖîÓN¸×ãµŠK»ËX­d›íş»Öü; %•¼‘i6÷vºßú¶ÁÀŸğO›¯ø('ü×Æú‚ôÍORøßû?jöß´7Ák-2úï‰µÏiÚŠx³á¶©5»ÜÏñ#À—Ş!ğö‘`ó­¬¾2>¾»xôÕ‰¿ÉLÁ©Ùx‹R×®OŠ¢Ò¼G`ú™§xwFñ^—â˜ôÖH®mìmfÔô´#¨I¦Ø\nHµø¥[gP¶7r?œŞ¾}«<UıµHĞ›úÜiZ¥HÕ«
kZ‚”¹•kBSu\mOØÇ‘ÃŞn[eªq¡gJ­öwSÜ„©Ó”ıµ*®+—Úû:ÑŠ‚•çí$ä¥¢K¯×çğÇŠubü?á¿üA’	àHõëİFóÄÖÚdWa´kkI´]?J²×¥Ğ%¥{'‰uOjĞ¦¥m2ı“äËû½.úóM¾„ÛŞØ\Íiu21ŠâŞFŠTß<nÔ€ñ»ÆãŒÈC­ ñ”èpèšş‡wğ¿E¼¹°Ğü?qjo¯i¶ßÙ°[êÖ’júe¥¦ÿ ü7º^±«éÛêÒê:ş©©	“Vš9|÷Ç¾7pY[}‚ãHñÖgqcsáÛ«©5KıÃº&›g®Gz¶°	/|¸$Ú	’	5;9³ììm,´{mWÆËQ`ñ4«P£8Â?mˆ¥‹“ú­5N8¹âh·±öQ§†ÅT…LRÃºXwZ¦éFZføHâ¡õŠ§V¤oVj•˜uûù©<<hÔJTåÏ)Ö¡Bƒ¯í+*q¯Z5$¼
¾²ıˆ~;è³¯í%àOˆ5±›Uøm}ˆ<ñSJ$–kï†¿tCÁŞ.h`ƒ÷÷7:^›«¶»giG%åî•oj$U™|›E}&’`8—#Î8{5…J™ny–cr¬tiTtk}W‡©†­*£yP¯Ts¡^ı±…X5(&xY^eŠÉó,¿6ÁJÅå¸Ì6;êAT¥í°µ¡ZœjÓvUiJPQ«J^íJnP—»&}¹ûZşÃ??f-vmzÛK½ø‰û?x—n»ğ§ãç„­Ÿ]ğŒ|ªÿ ¥ørúÿ \Ò’}?A×§Óeƒíú6§%¤uÌúKjZAµÔn>yøEğ/ãÇ¿Úø;àßÃo|FñÔÑBlü1£İ_Ád%`«s¬êaJĞ´ôÈiõ=júÃN¶LÉsu`°÷_ÙËş
û\~ÊzsxàÏÆgGğt“M<¾×¬tø,Irí%ÛØè)°Õmt9oec-õÏ‡“u{'Íu<¹ ıI¬ÿ Áo?à š†”ÚN‹ñÀ¾ÕÕ®¼%ğ«Á]0bGŒkz^»i¯’LĞZE*1ß£…aùmLGy^
YF'ğßŠqt¡õ|æœMğôq‚ä¥ÏxOÂ™¯.6QQ2QÄ1Ââ+J¤ğË/¦á†§÷ÔèøIÄÇ1ÅæœmáêIUÅğŞ"Ês™R”Ÿ5L6UÄ8® Ë”°É¹CS1Éş±F
­õÉ©VŸë‡¼/ü/öÅ¿¾.OuûFjSø‰~|<ğş¹i¨i¦ÿ ÄV6vÖ¿ô´¼²’æÿ ÃŞÍâøšÌA¦é—÷vú$·wGÃ³êßÌ¿Æ?ÚÆßlü)áíN/Ã^ğ™m¤x+À^KÈtÎÎÎ>	¤“Q¼Ô5=[Tû¼6òjZíÄ¡DßfKUººY¹OŠÿ ~+|tñeÇ~0ü@ñWÄoÜB–ÇYñ^¯uª\[YÆÎñiútS9µÒ´È^I3L‚ÒÂ’FŠÙG-æ•ëx]ÁGÂ˜<ã3ã~%¡ÅÜoÄøèã3¬ß—PÀ`°X:ÄÔÊøk'ıßö„òXìÂYl3Ej”êcñµ)RÂÇ:'•ÇI’g˜¼…²Z¼?ÃY6êÙvŒ©‹Åâ«Î4aŒÎs§õXæ™’ÃaV-á)Â†	Ô®éF QEú™ğåÍ;O¿Õõ+K³¹Ôu=NòÛOÓ´û(d¹¼¾¿½-­,í-âV–{››‰c‚cV’Y]³ Tş€>Öşh<‡ÁŞ*ğÀK\¾ø™o÷Œü=ñ:çâÔ÷z”ï'ƒu/Üè6²h6©á[İoIø‰2ë>Óôx_Oø«oáo/ÃÚ¡óçÀŸ†~"ğ@ğßÄğæ‹âŸ‰~%Iğãán«­Xè¾&¾ğ¼ö²®­ãMÇX±½Òï5·¶¸µÃ:f«m{+é·Ş)±Ğ5A—cöøÕeáê
øáoö¤‡šş¯£|Uÿ „îçÆ×:ñOŠ¼{àÿ ø.äZIá[=xOğÓMğ©ão†¾$·"Ó$Iîä½ğµî¬¯ƒüzÿ Ÿc¥‹—Õp‘­Zı¤L6.J­HÔÃT©*ó\´iÅÔú®´ªÑçÅÕ”©:±ÂU·­„ÃªqU*¸ÁË•òÎ”ª^)Æ¤c­e9$êN
3å¥¥ÊêÅ>¾{ÿ |Cøqñoâ?ü%~<¶ñWŠ4Ë½Å:GÁ-sÁšÎµ­øbÒ÷Ãú¦µk7„´OŠZŸ.‡ ^]ØKá2x²ëÃPk·zn‡%´ğu·ô­ÿ ”~Ä¾Ñş:üzı£ôÿ 
øx_á/†.<áø«U‡R7ß¼eâ¯ø[Äz~œ–ú›¦Å¬øÀ^¼YºĞ¤´³ŸOøÑ§ZİIã;/xŠÛùµÒüKãÏŠ¿Çì~6Á¥|-‡Ã¾	—á·ÄâŸÄŠÉá¿ŞŞ;xÎûáÿ ÃøG®ô½{Ázœğ=ÍÇü"úÎ±¢ZZ MJ²Ğìt?õ¤ÿ ‚QşÅVÿ °wìSğËàŞ£f¶ß¼B×ß>6¸¼‹RüXøƒ•ö·á‹]J –Ú†ƒğ»DµğçÁïİÚÁio7‚>xm¢²´_ôxôÉ05#]¿iQaâã‰•xÆN_e… ÜZhÂŒ!‰„¹ªBÆVå›ÏUrZÑskÙ©hÛZJ¤–—ƒrn›VŒ­ët¿G«üÎ?àäïø#ÕŸìYûLëÿ ¶×Â_ø¦ãö\ı©<ouâoøsÃá<-ğ£âüZˆ<kâÿ köë+[ÉáŸŠÚŞœšç€ìo-¡ÑíuOÆş´±eàèîÿ Ó¼¯ãÁO†?´oÂüøËá=;Æß>$h^ñW‡u4>]Í¤å&¶½±ºŒ¥Ş“®hÚ„š×‡uí6km_ÃÚöŸ§kz=å§aiuÒã°ß[ÂÖ ¦á*´gÊÔ“R‡¼£)EsÆ-¸««i}Ÿ.¿Õ±«8©Æ¼¢×2qiÆ^ëi7É)$¤í®§øªëW‘[xÛÀ4:­öµ/‰/ïn×M×-tëÛ;8­nôísI_ìèu
=¦­¿ ^i³¼ºšhö^ß[é^'’òÛOá¼=&±âK†’]Äş×u-zêüx„ÛØ.®ºn—`º•÷‡õ«½GMÓ-?áÔmíôı/ÃÚcÁ<Wúµ¶«¨-ä1¾‘/í?üşíñKş	kñ&õl-5cà‰Nğ§ìßñù­¯<W«kzT’_ê—?üK¤iº ²ğ÷Æı&ïÖh@ğ×lï.|[¡êE†—©èü±ğ­½¦›co'Ä]Ä¾ñ=·¥øÏÄsMy}§øvÆÓK¶¼ºñN‰®¤*-­íõ–7êº×`şĞ°¿…eÓoÊëáã–BtjR•U8<:l-z•'*/©ˆ„pQ¼*P­‡…,$êÍbjáJ›“åûú5:P©	ª´'?m(Ó¯J0Š©>4e,S*Œ¡V•yT¯
qtiâh¹¨ûŞ%âÿ o=ıæ š7ƒ¼t–oâ]K@Ikáé´;ëÁpu{Ë»Ë+MPK=­¥ÌÒêRÁu%õÕ^ÏUƒÄÏâ™¨iOe©ÙÏetŠå\FP¼RÑO’{iĞ‰-îai ¸‰–Xd’6V?SxcPÑfğ_‰4_iöÑxGÂÚî¡éÖ>%ÖµÔ_YXõkİkN·ñ'‡¼9{ªêÏ©Yiºƒ£%½¶™oÓİø~K›­oUÙAÖüY¡é·èş+Ò$}gÅÚæ­]øzXh7v:]æ£h÷l`¾u®o ÿ „’=;H‹Mvv-s¦[%µÿ Ñá3êùtªáñ‘‡ÕğõÕÔ©V0¡iáiâ¨ÒÁb«)IS’Œğ¸ºÎ8yÕÃĞ§˜âT¢ß‹‰Ê)c#N¾OÛU£í]8BRªÜkËR¦&-'ó§(â(SN´iÖ«SAÆVøÊŠ÷­SÀ>
šD¹yüKà;_øFáñF¥6«§·ˆ4Ë{â;Úé6Ù˜¯çŠ[ˆ’æÃS}CPÖ{<P5´¬qá&ûF;_ø;]8è¢[kP¾ÑüT:|º®„Ë§ÜÙ5ÍÍŒK-¥¶¡uqbğËo~–×(Ğ¦§`jEÊR«G—âU(Uq¿NöÔ£W'ÏZ”Z…i´êÒ¾•!ÍàÏ-ÅBVQ§;Û•Â­4äœe$Õ9Ê’q„İçN?ÃŸòJŞAE{fğNòúèÛ?|	§ˆï<(ÖßÚ—ĞjWõ„–q]éÚ]–¯¦hñês$—öqÇ,kc;Î«ëm§Má…Ô´ÛKû+ßxßUÕ<?­x‹IĞìôEğå•ŸöÎ³l¶^-¾[r­õ»­{k¥k×r´ÖÖÉ5½åÚwS9ÀS‹’©:–qMS£VÑrI':“Œ)R‹*’æ«RjI·dÔrìTšN…Ókš¤.ìáËÊU&ùªAZ“NJé+µóö“¤jºö¡o¥hšmö¯©İ³­®Ÿ¦ÚÏ{y97–O*Şİ$•ÄQG$²²©Xâår¨ŒÃë¿†ÿ àğ‡‹4íÄ¾Oü^Ôü3â¯‡ÿ „–“ø>êóKì5§‰5´–kÍJÊÏJÖüK6›0‹Ãi:=”kZ“x¦ÙôoSÿ „[´økmâ·„¾éóèŞñ¿€?áñBÉñÅş(k=:ò=WÓÛX‹PÕ¼&Ş5Ö‘¤ëZ¤z®£á/Aá¨ï£m?Sšá4<wãoi­oşè2øÄ¾4Õl>$èŞñ/ˆu?[øƒÅ>Ô&Ñ.®<WâŸx{Uø};İÇwfÚl^¸ğÏŒ<=æ‹ ëŞ0Òâñ®‘£|æ/=¯˜8ağT¥ì«b%‚¨éÎ2tëû5RñXšu¡
^ÒşËê˜yº•kS«‡«ÀG÷Ç¥G.†š¦"k%ˆ4d¹éórÊtiNRQÒ~Ú¬T#	Â¤0ø†œ¿ÄÖ>4øGiª¶• |BñŸ‹ŸVÒµı'ÄúMÔŞ+Ö¼¥xóÍñN»áÏxâê×ÅVŞ0Òd×ô¶¹×-<Ká+w¥ëoâ˜ÖkÍw³ÛxŞãYøßñ‹À÷^&Ö>k>ğ~®›ß
é^ÓüSã¯êœ‡^ñ­ÿ ˆ4&—Ç~óÂ¾³ğ>­¬Y\øâmBi>Ó&³ª=´{¨øğÜ¾ÿ …½ãÏ‡ß>x@_øËL½Ôš=vïQÕ¼B¾#¸ñ/Œ¬´Ë˜¾Áà=]ôİ(|6³¼Ğ$’Â)µ*Ë6Á—öÏş•ÿ _ñwü3Ä¶ş:‹½Kö|øs¬ø›áï‹¾(Igâx“â†5-Qü7Ò"::'|G®ê^&6ş"ñ•‡ŠµßøgM[¯i:©ñ\{ÍkÀ¡F9’p„+(T£ÒÃUSn´°•èâfñ1–éÓ¤ş·†•YJ…Lläİ\d©ÙZOg)*TSŒÜ]X[Üö”çM{&±R”ÿ uUBÕ#F)rÑ•ã÷Gü¡ÿ —ğÏÇßÚ_ü§â„üc¦üøãkQı“¼âëë‰¼%ã?Œz­™'¾(h	Ô`†?éŸ<o¹£Caik*ê_tùõ!ayğÙ´–şö«“ğ|ğÃÁ~øuğÿ ÃÚg„¼àKğ¿„ü3£[‹m/CĞt[8¬4Í6ÊY„6Ö°ÇùI¥`ÓO,³I$ÖWéØ<2Áá¨á£9ÍR‚‹œäç9Ië)JOVå&äÛêİ’VKåëTöµgQ¥g{E$’Ù$–‰$’ItZİİ²Š(®“3Ìş1üøWûAü3ñ‡ÁÏ~ğßÄ¿†>Ñ®ôø3Åz|Z–¬i—‘´rG$O¶[k¨K	ìu)mµ-6ò8o´ë»[È!?ó½ÿ ‚¶Á°¿´ÇìÑ«'Å_Ø&şÓ¿³jø•|Kâ?†Úş§w¯üpø=Úõ%X´Í9ll¾#|=Ğl/­¿
YŸÚ¶•¦I­ø[Q²Ñ¯¼M{ş‘ÔW&+‡ÅÇ÷´àêE?gQÆò„¹g»§(ÅÍÉA¾^{JÊI5Ó‡ÅVÃ?İÎJ§8'hÉ)FOFšŒ¤ ¢ä•ùox¶ŸøLé:ºIÑc³ƒCÒn®mõi¼N–wº¦­I­ë#Zµ×mÑÄ:&©4WŸÙÚ­úE£Äº-BûRÓ,íã¿´ë¼Y«xkNÓ¼!¥F5¿AğújRÃ'övwq¦É¨Ei¬ŞÅ.€gîÕôûûõÕ'µ±WÖ® mgOÑNÿ \_Ûßş{ÿ ìÿ ‚‰jIã??ÿ áøÉm9º³øëğgSo†ßä¹gW–O_iVòè:78à–oøÄZ…½¢y]ş›‘ şAÿ k¯ø3¿ö¼ğ]–·sû+|^ø3ûMx^-fWÃ¾ñ½—ü3·Ä«+EMM—Dk­>?|=ñ<6Ò\Å÷÷~*ğúŒw7·Ÿp,¾Ãó8ì†½L]D}ú4ªÎnHÓ£Z¢¬ëÆ2¯íªJ.­Uy:Êzp¤¤İCİÂæôc†©EûµjB1RÄ9Õ¥MQr/gÏJ¬iÊ”U':¼Ü³œÚJò“áø Íàÿ ‡Ş‚8®/<0ÍâÍbÊ\Ò,¯uG¥è³}Xdğö—Ÿw§GâıK[µ¹:†»¨êú¥Î•pÿ Úw#YĞ³ÔaÕ<2"Ô£ø}ã¿Új–¾"ñE–›gá¯_xŸJğÎ™}¥Yh~™iy§Y¤ºn’mãkı?K–şÊ¾—O›PY¥³Ÿí/‰ğHø*ìåâİu¾%~À¿´Ğ¼:·÷zÇˆ¾ü;Ô¾.è>'¶ŠĞxfDµñÂSÄŞĞ­×HÕµ{Í
ÖËV‚;kl´ˆc¹š–çæO|&ø¨u_[k_üiğËYø{¬YêöÏ®xWÄşKÏé×z›6ŸhÚÖ§ß.¦öP/ˆ'Ó&–Ò8¬î'š-+OFÔ­´¿ŸÄåÓÃâ ©à}9Ò§^¾.š®±?í‰ÒÅÔçxª¸ZÕ*á¡TÚ<4äá[
¨Óõhbã^„œ±^Öpœ©Ó¡*ÒtqF2¡_a
ôá
Óu&›­9VŒT©×ugÎÚø‚+ŞkÅğßÁŸüOwiãŸÍâÍ3ÃxoUÔ“ÁĞx]µ·Ö¯5Ù-âñ5Ö¬êZÌšDRZYZâÆ1¦ÚÃĞÉñÆš.«yğ»Æö¶¯¦j^ñµáİZK?ø{Â«ñLøqâO›û†ğØ“Ã(±Õ<}'‡|csã:&·sj–ú^™>£ms¹ğûáÆcâÏj¾ø?ãŸŒŞ%ø‰=”útz'ƒü]âO²øz}kÃúM—¨-Ÿ†®5›Y/"×&iãí§M/Ã·òé×Ì†ßëÏ†¿ğGø*¿í¬øDü+ı€¿h»/
_Ãá¥Ğ/ş%øgşWü!Úwƒd×4­[·×¾4x“Áº.«pWYÕuHlµyK^Û[éé5«ÛŞDÒ¬>[<UZ”T¥*r–:<µib
ÂVœ£ŠÂ¬¾Të(ªÑKÖ.jTêbg
Ù×ÅFŒ!?­8TŒ”jÑOrtZŠRÄB1•
Ï§M·JMáoArÎc:|(ñ/ƒ-ü5®é·©â_?‚m~É<:eº^õißÃÚ}Õt-Rö/†õk[ƒ¥êzm½“ê„tT–{ñ¦iÈkø·ªj:Ÿ†¬ì4ßx+ÄzXğ.ƒgá]+mÅºÇ†¼/¨è<#“w¿<]â#ZµÑ-4kK	üTPŒY[jú¥®’«aıxşÈ_ğg—í	­Y›¯ÚËã§Â?€š.«¯[êúÿ „>
è§ãŸ5}:KÛ=Wâ¡ü=ğL.ŞãL¸´Óş,ÜipÏ©Z5åÅ¦±>Ÿcıx~ÃğH_Øş	åuyâOÙÓàn•mñGU³[oão¯.~ |^Ô¬„6öçM³ñwˆçÂÛÙÙ[Éá XøKÂÏŠ¶ŠM¤ŸGƒÈñÆb12´)b%	râá
ÕaÉ*ç£N”ãO	[ÚÂ­z©98IAV¤å
r^.#1¤èR¢¯9ÒM^Œ¥N›R•_vr”\ëÓön:š\ÊîœÒ”ÓşLà’Ÿğl—Æ¿‰%×ş5ÁEWÄŸ>êŞ(Ò|GàÏÙÛÃ~/ñ‡>6üKO'öu¹ñ›ZĞµKcà]ÆÚZ.«ã])ñ/Å:ıııö§ÃkË;1wıèxÀøWà¿ü9øgàÿ xÀÑìü?á/ø;EÓü;áhš|B-+DÑ4›{];M±¶ŒmŠÚÖŞ(Ô–m¥™‰ë¨¯¦Ãa(acËJ	IÆœg?µ?eJ¢äİíîSŠÑ½ånfÛñêÖ©YŞrºNN1éiJm/œ÷v²½’
(¢ºLÿÙ
            [firm_left_thumb_ftype] => image/png
            [firm_right_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ   €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? şıI¬z 	8äàÉ9$c§'Œœâ´ÅƒŸ3'gú‘ş¯¹ÎxïÔö‘øùê¬>¿)< z~c'+€sK€G\t=?©ç¯§L”¹„ùkÇOÜMéí?ñGÚ¢Ï`òÂlŸS÷?¦yÀÇZ˜ñ×¨'/l}G9äp~‡çÔç*:ñ×'òH€!QùéÛşXÍÇ±€äç Á İEŸùh}ü‰¸÷ìt?§½MîCã‘ÓØôïÏ4c9äqĞ =‡>ç¾2xõ …Ì ËCô‚aŸõ~¿Lv®GÄŸşø>ïI±ño|-á[İ~àYèv~#×tÍ
ïZ¼$i¤Ûê—V“jWE™GÙì–iPäWÉğP_ÛÛáüçàF«ñoâ=Ôz¯ˆµu£ü0øugsZÿ Ä?ı™¥¶Òìc;ŞÓH±İç‰5éa6Z&œÛßÌ¾ºÓlo?ÍGö£ı¨ş2şØ<Kñ¿ã—Š®¼Kâİvşiôë3,ë x/F¼šo…|¥É,è^Ñá1Áion~Óu"I©j·ÚµÕåõÇí^x/šøNc_, ÃóÑ§˜Ë
ñUqØØèèàğò­‡JTûÖ!ÕP„ÜhÓU*û_cåæ<8ÃÚÖ–®Üªï&”¬ßÙ®Ö­¥kÿ ¬ˆº…€9v6Ã1R ‚†s×½)~Ñı4ÏıpŸ öØ{ã×°úğC¯ø-“«xKö0ı±|e,ÆY­<;ğ+ãgŠoŞi]çu·ÒşüCÖ¯egy–^ñV£12·ğæ±t²G¥İOı‰«+(e`TŒ‚  ƒÎzœğ2 ã¦ÃqÇg|VÉsš;sUÀã©F_TÌ°|ÍC†œ—¤kQ“ö˜z¼Ôª-#)uáqT±t£V›ì§ñBVÖ2_“ÚKTGö˜yGÒıÜüsÇhûT_ôÓØy`uÇü³ê=±Øg56 èsœŒõê3Ü1ÆGy0ä9ÀêI9>ş½}|qÒCö˜A'sş¢lóéò}1ÓŞ´ÅŸùkßŸ&aÛâ.¾ıqëÒ¥ëÛ<ç<dûuÉã¥ÇœóÆNÈèIÇ|Ğ&æ xósÜù=9ÿ ×Üõ5*u Iê6’AÚrƒòKòú_»?œğN0Ä?.?ÚtøØó“ÓÓ ÈÉé@º¥äÿ ˜²cn‡äbzú ë×Ÿ`38 p1œxö<síœôäÆÿ qù9sùt<ú“ôç¯gvêzgüc¿L~]{Ï^Wœ89O_©üûRç8<vìIØ`_qÏ˜ëó7_éÇ~¼cñƒÑ±n¼ãú’AöëÛß4 ìãŒ¨ç7qƒÛO@?:ù¯ö³ı«~şÆ?ü]ñããF»•áÚ´vm»Dúï‹üIr’ÿ bøCÂö2ÉÔµínâ3¬–h’ãQ¿š×M²»ºƒĞ>5|hømû<ü-ñŸÆO‹(²ğÃïhÓë^!ÖïÜŠŠÇºŸ>ÿ UÔîäƒMÒ4»T’óSÔ®­¬­"’yãCşl¿ğTø)'Äø(ÏÇ)ü]©CÃ|=ö™ğgáŒ·[áĞti$òçñ6¿mo|qâhãŠ}fñ‘i¶‚ÓÃöMg§µİÿ ë¾x[ñ8æ®ªá8k-«NY¾aË*¯IÇ-ÁI®Yc1³œí(àèKÛÔRœ°ôkùÙ>*ZZUæ­JiÓÚM]{‰ì·›\«í5ãŸ·_íÅñƒöùøí®|hø¯zÖ–jn4Ÿ‡¾±¸šoü8ğjÜ´¶^Ò@¢âòl%ßˆuÇŠ;­wU2\È¶ö‘iö_“èqÏ<g=ºã¯çúRmêwu?N€ÿ /N¿¬Ÿø#¿ü§Â¾x«ö€ı²tbÛFøÃà»ıàGƒ¡çH×4Y…ÛãmÃ-áÖ')ß¬/#¸°—J’]kR³»‡TÓb‡ûËˆ¸“…<,áŒ5|\!—å8/«åÙn[€¥Wªİ”h`èJpö³§MTÄb*N¢|”êÕ©RU&¹şJ…F?%ÏR|Ó©9¶’Ñk9YÚú$’ê’VLşMÁäÜƒ‘Ç#üc\ã¯ı–ÿ Á?à¶Mâá_ØËöÀñb6^øñ›Ä{¾¸K]7á·õ+©0Úú¯ƒüKq"¶¸…4=YÎ³Ş³üÜÁ@¿`ŒğOÚ¯Â?‰–òj¾ÔçXø]ñ&ÎÎXtˆŞì·Ô­·­½§ÇÅ’W¹Ñµ |·¼Ònô­SPødeX2±B¬*J•pr¬¤©¥H à‚æâ~á_xN*•ibğ8êÆä™ÖFuğUçSÅa¥%µ^Ë„«ÉígB¼iÖ§Rt1Œ¿{8Î/–­)^ÒI«Æ_}ã4¾%£×ı‡à´ƒĞŒàæ=¸ç<w\ç9*qõÇ'¿Qnf¿“ø!ßü½~#Gá_ØÓö»ñYOˆpCk¡|øÅâÅ	ãØ UƒOğ5+†|m*xoÄrñtqÿ fê3¯‰–ÒOÿ X£$d$úr3“ı1ÛgßşrñŸg|b2<î‡%Zw©…ÅÓRxLÇ	)5K„©$¹©ÎÍNÕ(US£Z1©	#íp¸ªXºQ«Iİ=%ñS“pšèÕ×“Vi´Ó¤öë¹9Ÿ_§Ó4‡Œr¹õîr=G#¯^ıxéHGL’—aÆHã§=#ĞÒóıæêOa×½:Ÿs_&tÏ'§OsÈ8ØHÇ¯lÔqœ!ä™Èäçıcv¾Ÿˆ<Òàú¶zã¿~£?ç#Ö˜:œ’ı?ßn:¯¾zz‚ê½çî I8ä#ú>^9=ûñÿ ×§ 0;’ONŸAÆGø‘šl€ùrö[¹éƒïqùc½/aÀ#Cœ·#Û§AŠ.Õã?ÓÛÓ¦}=Nkœñ‡‹ü+ğÿ Âş ñ¿µİ+Âşğ®‘¯xÄZİä:~‘£húe»İ_j…åË$öÖĞDòHîÃ m
Ì@;×7ZA=ÕÔÑ[Û[E$÷Ê"†bC$ÒÍ,Œ±Åq«I$®ÊˆŠY°‘üÁp¿à°—µ×Š5ÙövñÖÿ ³/ƒ5†_x£LX›ã‡Št»ŒEr³FU¤øq¡]Feğı¦^#ÔxŠñeµƒBH?AğãÃÜ×Ä\úWRÃà0ü•óŒÒPr£—ášÓhÔÅâ9eO‡ºuf¥9rĞ£^­><n2
‹©=dî©Ã¬åúEo)tZnÒ:ÿ Áb¿à¬'ÿ ‚‚|P“À¿ïµ_şÊ¿u›øA|; ŸO¹ø‡¬Ú4¶§âW‹ìÛd¾mÔm/ü"zò‡ğî‘?sm»¨ˆ?89Àì ÷ãéÜ:2@éŒËò>Ÿ+ëßØöpğwíAû@xWáïÄßŒ>øğ¦ÚhµÏ‰ü}ã/x>-;Â–W‹í3Â¯â{û+m[ÆØq¦èVpÅy”ó>³©[¾›§\Ç/úA–å™pÌpx
QÉrLêÉS§:øŠ¾Î<õ«Ô(:ØÌv*iÊ\•\Ey¨S†°‚ø©Î¶2¿4ß5Z²KV’WÑ-]£­7²JíîÏÔø!·ü~çöÓø™Çÿ Ş™eÏ…zäE4İBŠßã7´ç[˜¼#j¬®ü ¸ŠïÆ÷hËä’Yxb¸k­oû7ö“öıÿ ‚Ú|JøñëÅ fü>‡EøC©§„¼Qâ_èú–¨º—ˆ4˜¡‡TĞ|?£iz¶ƒk¤hºÙÑšwk‰înm.Ñl­#§ıoøCûTÿ Á4¾|3ğoÂ…µì­á xC²ğ÷†´;ãgÃ…†ÎÂÍ6ïšVñ!šòúîS%æ¡tòİêóÜ^İÍ-Äò9üı°?à?
?mÚÆ¿bÚóö]ñŞ¹ñ6Kïxçá|¿ô}O]Ğu…²ø«ÅzCx8x¦êóÃ×—SE©ê){afÚf¥,iyqİ¬6ÿ åïÒOŠ<Sãê²Îr<£>ÀåØS¥ƒÁSÁb)ÖÀdö“öÎU)û?¬â«F\Æµ9:ŸÂ£	<%£ıçô£ônÀø›˜SúEÏ'E>Å¾—¼Døj\Hñ˜$ãšÇ	uÍ¯ëë-Xåıœ«óÊ¢úóÀ³ôWáÆ£ğGşÉûx·Â<gàïˆ>×n´[@Ss{ğÛâ4z<:‡‡~!ü?¿¿ßxšV¥e{ê:£tñjÛëÕd¾³÷óŸ¶?ìyñ“öøáâ?¿tSg«il÷Şñ-”SxûÂSÏ,ZW‹¼-{"s§ßŒw6®Eö¨Ås¥êPÃylÊºÿ ø&ö¯ûşÁ5‡z‡íÍû1x·â‹¼K7‹>#kÖß~Xi‡[[+]&ÏCÑlî¼GöÈ´ÂÉ I/ñy}¨O¨ßË”wQiÖkÿ µÿ ‚\ÿ ÁD~Şü8ñÇíƒû/xÇŞKí[á/ÅoŒŸ'Ö|	ây EÄƒş4—Rğ®´Ğ[Zø§Ãí<Qj6‘Aqm-¦­§éº…§ê_G~<ãŞÁåyOdùŞ#(ÌaMæÔã–c*ÕÊqµ,s<)QpnT½—ö¦‚q­%*ØxºĞŒ+~ô‚Áø]ñ_ªø9>_¡Ÿâ¿ÕVX…™j…?i?×ÚÇ,»ë¿ZyCÇ¶G-ú¤qV¬ê[üêáš[i¡¸·–[{›y#Şâ	àšYaš	bd’9¡‘H¤‰„‘ÈªèÊÀı¾ÿ Á¿àµ|i´ğ·ìû[ø©!øÉeÂŠúıÊÅÅ{(ËÓüâ½FfH—â=¤
–šN§tcoC6÷Ïââï®ÿ ß<¨ü-ñ÷ŠşjºÏ„¼G{áMfïIøÄúWŒ¼®Ånù¶Ö|7â}âëMÕô}JÙ¢¼³¹ŠT™c˜A{mg}Í¤m­åÕÕ­õÄöWÖsÁygyi<¶·vwvÒ¬Ö×6·02Ooso<qËÄO±L‰$L®ªGö×p.CâOgãùTİ?­dÙ½ÆxŒz´Ô©â(Éòû\5hò,NR<M+kN´(Ö¥ø>[[vj)Êê3Šjñi-$µå•›‹¿G$ÿ Ø`ëëê3ƒ§éàÅ.Õôÿ <g ëGrIú×óÿ @ÿ ‚ÒCûGYx{öIı©üA¿Çİ2Î=7á‡ÄmJT·‡ã6—anLZ·3•?‰šuµ»2Ê¾ZxÊÆ3u+­Úß-ÿ ôïéĞúsßƒÏ'>£8ú×ù·Åü#pNw‰È³Ì?±ÄĞ|ôkBòÃc°³rTq˜:­/kBª‹è§J¤jP­
u©T§·Ãbib©F­'x½zJ2²n2]¿ÏutÓhBƒÓğç§×ÀàwS# ¯Nw?Ğüí×Ùã=>’qÇâpIÎzqÏçƒµc)ï—êHÏï·qÏô¯˜6ê½ç\~íÉäìqĞq…>9Ïò<ÒŒø tààß>ãA÷4ÙîÜî'äaØäà}½:‘œñÍ<t¸üO°9ôÏ\cP3òcş‹ñÆ?à˜ß´¾·àk‹»-WZÑü-à]CP±wêËÂş=ñŸ‡ü%â©c–"$ƒí>Õ¯ôçZ4¼gVBóFïó:Œñß¿Nz†«×ÇØ¾|zµñÏìKñŠşÕ/~3ü,Öe‹ÂšŒŸÙwş-ğ…ÓO¥êºç€u…6Ú¦¹àQ,õB2KgÂwrø{YÔlm¬5]îóø;ı¦?à_ğP‚u|2øG©şĞßä¹ºŸÂ?¼©x^¨é>iû4^#ğö³¯éº¯‡uø x–şÍ ¹ÒåŸÍm'TÔ I/ìŸ£wğŞE’æÙyŒÁäY+0şÚÂâsZÔ²ú¦][	‡ÂÂ8|^*T¨Ô–¶»ö^Ñ9*ò•7G³ùœï^µZuiBU¡ªR4æéÔRrÖ1¼—2’ÖÖV´šº¿âVzóèNpxè	'>qB’¥ˆb8ç{÷ãœuã?…~˜ø#wü ÃüUÿ À¿~ó7~ın(ÿ ‡7ÁP?èÌ~*õÏü}x×?ô7õóƒëŸéŸõ×ƒè®áüH2Ÿşl<?ªb¿è½¿ëÍ[ôéÉæ–û}Çæ÷äïnŸŞp=úşŸ†+ıàß¿ø'£şÊ³XøûñF6ŸiM#I×^Şúßf¥à¯„ï³Rğo…ÊÌ«qg}â’øÙ–)#¸ŸFÒï"5øAÿ Çÿ ‚şÓŞ0ı«ü¬şØß|IğÇà?Ã©Ç"ƒÆ>ˆ:¦ylú€-ìôoT¸ÓVÔ]/u÷š´>Ó5	%[JÕ_ûå(Ò(•#Š4Xã5TDUÂ""à*( Â€£ü»ôŠñ?ŒÁáx+†ó,&;‹TñÙö7.ÄÑÅaåJRÁe‘ÄaêT¥'*´Ö/ÊñTğpm©Õ‚÷²\¾Pœ±U©ÊáFƒŒµKš§,’kOv.İgÙÁü+ÿ ØÙÇã~×ô6¶ø'ñÓ]˜øïLÓmÊXü=øÁ}æİ_ÉåÄ<«MâIõËlGoâu×¬3WzE»6[Û»¶Ç-ß¿ãù¾Õş·?´/À‡_´ßÁŸˆ~+hñk~ø‘á»ïkåP]Ù=ÂoÓõÍ"áÃ›{@Ô¢´Ö´-F5ó¬5kK¨è«üï~0Á¿à£ß¾(xëÁ>ıœ<kñSÂ~ñ¡§xgâ/…®¼$ºŒ´åó4zÊÿ Z^Ú5íŒ=İ…Õ´Sé÷ÂæÉÃıœHÿ _àg‹™niÃ« â¬ß—æÙ:TpØÜÓ‡ÁÃ3ÊÒTğÒöøª´áS‚å¼yJ”VİIË(sf¹d¡_ÛaéJtë6åtå7N¦—ºŠo–m¹'²|ËD•ÿ !F2y$q“œŒ O9çÓ§`üÏcÏ>ù=É€¿LáÍßğTÿ ±—ÅSÎãëÀÿ ü×vãß#¯j_øswüşŒÇâ¯\ÿ Çßøü¼]ş}òk÷?õ×ƒè®áüH2Ÿşl<¯ªâ´ÿ e¯ÿ ‚jõ·÷?½ıkoÏ/xƒÄñ…¼UàËËÍ?ÅŞñ‰¯xZûNyşÓÄZN¥m¨h·6M-Ü:•½´lùŒ@É<¯N‹5íÎ¥\jp­¶¡q¦YO¨[¡ÊÁ{-´Ow$“ˆ§gA×€2z
ş/?à”?ğ@zÆüı·¼+§|;ğWÃ]oNñ_…ş]kZˆüSãißh3ø¥<9¨ë.‡áM*ş}FïMºÔæÖu™í£Ó®ôÛ5îd¹şÈ4Oˆ^ñ'‹|[à­U‹U×|ºD~0ÉLÖŞÔ5ÛWÔ4½P¼SöhõÙôµ‹V›HYúÇJ¾Òõèmmµ)ï?¾‘üaqVm‘à8{‡Í¿Õì.cW3Í0'˜ÖËéÑÂÃKš•háå‡N¥HNt#[N„'íı´Ód˜j¸zUeZ2§í¥NœıÙ{ŠmË•ê®¤ì¬¡{Y#´ äóß„ç¾9àüc@ÇŒesÎn®Ã½O‘Š“ ÿ ‘Ç¯9ëƒø`ÔqıÌäšAĞ®zw÷=zşf=¾«ÑşqCû·+g¡çlö8É<Ò‚vôw8Æ:w=zñÇ^[ >\œÿ g®ÉëÆ>˜äÒòq„ç·¸ÎqÇĞd@ÏÍOø*wìyâÚ×öl»ŸáF§©øWö™ø¨?Å¿ÙÇÇÔ%Ñ|I¥xûA¶ygğå†µm$76¾7Óá“B¼äµME´Bée‹O17ãOüûş@ğü!wŸ?à¢K«xâg‚a]>Š~ğN»ªéş=k)…Õ·ŠüáÍ>÷Sğ§-$RÚ›ÙéÉáÍMãºxm¼=si—Ö=ñŒg¿¡rzŒó§©¿’_ø)Wü¿ñcöıª|kñÛöVñŸÁøGâ‚EâxOâ«ã
};âEÜ×Å–…¼â«9tºÛk·	<ÖsÁ®Şë…íæ€§íf|œå¸Î
ñ&ªÁe”¥,Ï‡søTöÜŸ)ÃûC/£Šö•.cñÃ×£W±ñ=ŸÖkÒ«/OJ¤qXÍQû•è½aV)Zq¼}ê{sFJ\­/…4ÿ Jâ!ø%näºø«öE¾-ç¿ıJùÏÓë…ÿ ˆ†?à•Ãş§Šº?áK|[ÿ æ@~XíÛ·ó·ÿ ºşßôV¿e.:ÿ Åeñ\ôëœüéê(ÿ ˆ]oú+_²—¿á2ø¯ÛõG»qíÍ~‰ş }ÿ èáæøuÁyÕ?äşÿ #ëyßıÓÿ À%ÿ Ëèÿ ÁÂÿ ğJî1ñÓÅ_øe¾-úuñGğyéúõÉÿ Á+èºx«ä‹|[ã®OüŠ‡ç’kùÛÿ ˆ]oú+_²—ò9|WïÏıßÇÿ Ô0Ä.¿·Çı¿ÙO¸ÿ ‘Ïâ¿×şˆ÷aëÚõèßÿ G3ÿ Ã®Ëş©ÿ '÷ùÖó¿ú§ÿ €Kÿ —ÑüD1ÿ ®ïñ×ÅGşè·Å±ÇşÃ#·|Ñÿ Á+³ÿ %×Å8õE¾-çNOüR¾™šşw?â_ÛãşŠ×ì¥éÿ #—Å¯ıŞ¸ï×èÿ ˆ]oú+_²—§ü_¾¿ôGzãŸZ?Ô£ı<Ïÿ ¸//ú§üŸßä[Îÿ èŸş/ş\Dgşÿ ‚Vÿ ÑuñQàğ~|[ëÏıJŸ^†”ÿ ÁÃğJŞß<T:óÿ 
[âÙçœÿ Ì 1ú÷ü¿ø…×öøíñköRçŸù¾+şòGyàwÈã¥ñ¯íñÿ EköRì@ÿ „Ëâ·n˜ğ§zqŸÿ UêÑ¿şgÿ ‡\—ıSşOïò­çôOÿ  —ÿ .?`¿kø8Wàv·ğòÇáÏüÊ}ãWíAñ__Ó¾|<µÕşx·ÃÚ'„µo\C¥Øø†ê×ÅZN’¾$ÔÖòòoèV¾m¤ú›¥Ö¶ñév“[ŞşÓşÅŸ³›şËŸ³ßƒ~ë:ıï>#]­ß~3|DÕ®d¾Ö>"ücñ„¿Û?|_©jé7_o×&šÏJå¬t+MM°ÙF«øÿ  ÿ ‚üQı¿jOÚ#öñwÁÿ  h’|)Ğ~ê~+ÖÅ·õpÚt'×ÅğœVßØ$—É¢Giı òêš¢ß?Ø¤Òmšãúç±ëƒÜu†î@ëß¹é_”x“_‚2˜á8SÃÌMLÇ)„£šgåz±¯‰ÍsÂTğx7^8l,~§•açUÓ§F:RÄãkÊ¢©VŒjø(âª9b1±P©ü:T’´iÁYÊIsIóT•®ÛnĞVÑÙ&Hè02;õçÉÏsM;{`4‡§ûl:ş|ãéiøÇCÛÔ÷õÆ:}Iæ£LíãûÏ½äpGÉÇ'İ3_“‡Uèÿ 8ŠüFø×İ9ëÏ ®:RŒÌHÇ§RâÇ^İF(sû·äòÿ  œòz~>‡ø³€7Êq1ÈÏ^‡‘Ğç9éÎG94^öìx#í×Ó®G4§¦0ß§¿=úô$ğFM `rqœß$‘Ü}:sHaTÉ ‘×·ã©è?  â}›¨Ó<çÿ ¯Œc"ŒöÁ=x!yÇáÛŒcõÆ) ƒŒzí “ÀÎ@Ï\ô'ŒqŒô¥8zó»sø3œë€Ã?ø.í}ñ¯öCø_û(ë¾:Oû;Z|Uı¬|ğ¯â‡Äûo†šÅ›Ïü5Ö¼-âıC]Õm<­ø{ÄrëZCé–º´6:=ˆÕïŞÅlmd"åâ“à¿Ù[ş
iûJxËÄ_ğQxSöËĞ¿lO†ß?`Ÿ|}øñç_ıŸt/ÙÇâ7‚¾8éf²úG†-~êúF…}ã
ÛZZwRñ%×ƒ¯|=g¨A¥éZŠÉ©ïØ?ø)Çì-ñ?ößğ×ìâŸş0xOàÏÄÙÇöŒğ—íáÏxÏÀWŸô+ıcÁº7ˆ,´­6óÃ¶¾#ğÉš¨êÖ×—kç†{{Y­L@Î%ãÈà”?¼QñãŸí-ûe~Øÿ ¼wñGÅ_±§ÅßÙÀ¿şi_~x@ø¹ag¨ø³ÆvÉãMkSñ¥Æy~ZÊÊûYÓ`…&¬âXìM©ı_Ó-8Û]ïÛÍy=-uºô}~	øÍÿ &ı¶ôÏ‚ğM_|Hı ş#şÌ³ÇÇ_ÙCø¡ñËöÒøUû+xö¿¹ı õ	¶§ƒ|Yák_jº/Ã¯
#ì:ñ¾Ò</º”š•Å­’]>í´ïİ¯ø%oÇo‰¿´?ì‹áÏˆ_~;|ı¥|Aÿ 	g‹´7ã?À4¿Ó¼?ãOé7°Pñ„õÃsøâJÚNañwƒãÒ-môÙRÎæûb|/¡ÿ Á8?i¿…>ı’ôïÙöÿ ğW†>&|ı’ü7û>ü@økñ3Áz‡ÅOÙçãƒtI­¯l>(éÿ  ø‰¦]øWÄBëQ´şKëñ¨é§BÓîoVßí+ªıİÿ Òıƒ[öø1ãŸë_#ø©ñâÿ ÆOüwø§âı7ÂzÃÿ 	Mã¯¦•¡§øÀZEÅŞá?
éÖš=œ6lW72ÌÅà·{k Zr­“];úéÿ ·5äÑlı1ÆOocƒÉü0ƒwÏy#óüG#­'íNxëúã·qÎWŸ×ÔŒg=‡å2rA æ‚Cê¿§sß§íĞq‰Á†Ç~œ`öü¹úéYŸˆ4-}6×WÖ´­*çY¼OÑàÔu[)µKù^4ŠËOŠæhöîY%ŞØI;´¨‹.lsê=Ï¿'¯'Œ“@	ÓŒ7SÆzúäz÷É=©‘ò¼÷ß$wù›}>Ç¡ëÄ7·¶ze¤×Úå­…¬f[›ËÉÒÚÚŞ5Îéf¸™’(Ğó4ª2#©‡JÔ´ıcM´Õt‹û=SKÔ [ËGO¹ŠòÆúÒàmî¬ï-¤’ŞâÚxÙdŠhdx¤FWG! ]W£üÑ%üòÂöÑn.,ŞæÒêİ/,Ş»´3Bñ­Í«MÄ+qa$&X'ˆHŠÏª
7àïş8üKø'ÿ »øÏãÈ>"øËÄ^7µı¹>:ü¼k¬ÂEãøcÆ_ğRwölO]jwp¥ŸöÃ¯‡ºâjš!û:?‡´èÆ™•nÖ«ûÍwÖâ$±	¡š3$ysGæÆë¾)Tªr>>WPÀ`f¾PğoìEû<ø7àÄÿ ÙÑ<9âüøÃ«|A×¼}àßˆ~5ñ_ ÕuŠšŞ©âˆ7öº‰u[ıcH›Ä+Öõo\6•h,<E}.­¤>íbxÂ¿ÍWéıv?#?kßxÏş	Ëñcâ„_³¯‹ü{mğ÷âÏì}ã/YxÏÆ¾*ø¥ü'ø³¤şĞşX|}Ó%ñş­â)ôSVğ¯Æ]{Vñ5ƒ\Çáßj´íJïM[êsOèŸ>|XøEûQèß¿d_øúMö™ı•¾(xïâ?ƒ|uñÇúŞ™yã/€Ÿÿ g|Q¦ø×Äz§Š5¿‡~%øÉğûâ_Ä/†^$ñ„m­®¯ï4=¢Şhà~™x?ö&øá‡_>ë:'Š~,xâŸƒ?á[|A¿øéãïüdñW‰şEk©ÙXü>¾ñgõo^‡ÁšDÖ±.— YŞÚØÚjZ¶­®¬M¯jš†§sĞüı•~ü²Ô¢ğ}çÄoëš¦…eáWñ¿Å?‰ş:ø±ãÛéåô_é1ø­kúŞ“á[Ë›»-"ÂêY5_TÔûSw¼`ÛOø:/òùöGå¿ì¡ñËOø]ñ’×Á_<mãNÇÀ¾&ñ?Àÿ †šn—ªx“Ç¾	ğ%×Æ¿ÚÅĞø~ÛâŒn®UµH|5â-;Ã²Ã_êš”ƒÄ¿¼~!šÏA×!Ô§ö_ø)İïŠ´o‹?ğMMSÀ¶zæ±¯êŸ¶…·†o<%¦|CÖ~i^:ĞàÇÅ?…¼Qwc;i†‰ÿ 	„|=¯}^ÒõK6¼Ñ-@y„¿ªüı„¾ükışkr&ñzãÃ:O‡şøPñ7._â­§Â]sVø¤k!ÑÚâëHø£âo†Ş*Õ5ß‰âÿ këñµã=Nò‹èõô¿ÆÙ«áwÇ¯üñoÄñTºçÀ/ÅñGáŒŞñŸˆü+ãˆ´Ëİ=fşÏB¿³¶×öèš¯£ÿ gë±_é§k:œfæéA_×â~Føwâ·Ä?şŞğQß|F½Ñ?gÉş~Á_ > èV¿¾+ëŸ¾ü>ñˆ¼UûBiÚÇÄíWKÓ—¢Ù®­€¼ˆìôMÓYÔì¼-igè¸ÔK?%ñ?öøŸñ«ö|ÿ ‚²|ø¿sÄ/xş	ÿ mñ›áÿ ‰üSğJïà¿ˆ/¡øŸğçã|W0j?õßøít›-cáÆŸâ?j½¦‡âM=/^ÓT³¸»Ó­µYÿ Sş%~À¿³WÅïütñßÄOx£Äš¿í!ğ‹FøñrÊãâŒ ğ÷ˆ~øjëQÔ</£Ùx~ËX·Òü=}áWYÖµÄ¶¯ØjºÎ¥zš‹K?ÉÅXÁ3¿eË1ñV{ÄøÃ¯ë_>
Ãğã/‰|Oñóâö¿âo‰ß`¹ÔŞ×ÅúÆ£âù®5MvÏMÖ5?é~&"=oBğµíÏ‡ô½/MšXd
M.»t·ç­şGÌ?³–•¥ÚÁCşjVºu…¶£©ÁşFşKxo/–Ïã… ³—1Æ&¹°~æÜLòbıÜaWŠÂÿ ‚¥øÿ Æß~>~Ë?´O‚|Kâ½+Aı™tÍ{âÇÇ¿hZö³i øÓàOˆ>*|øIã8¼[áûK±¥kø+Ã>>ñŸÄ]BÆâm2ÿ ÃwÛMç#´Ñ~(şÄŸüe®şĞ¶Zoí‹?e¿|<ÿ ‚cë7º¥Çõ˜´É<WğãQğ7…µ?jZäº^¹áÛíwâ—Ãë˜¾&jÖ’]=åıÅÆ²öVÏ%}éñ/öOø5ñƒÅ¾4ñ‡Ä?k×>
ëß³ÿ ‹|?/Œ¼Gƒu_…Ş&{éõü!úhPê777óÜÿ ÂE”zôrˆjhbŒTí¥’Õy%åêµì~Xü!øÓâëïø)Ïíñ#Åî-şxçö,ø‘ão‚šg‹|UªZü-ğo‡g?Çágˆ¼om§›ƒ¢YZxÕç¶ñ¾»âˆôù¯¤ğÕŞ˜çì°_µım_Ş3øÕâO…š§¼;ñ3Ã~"ı†gı¦¾|Pºøâ/„š,¾1Òü_ÿ |º‡…ü3«øÒOøËáˆÅşŸ®xzïWÿ „oYº¶´™ìõ»ëVÖêËìíGş	Ûû*jšïõ»¿kşWÃ¿Ùç]ı”ü3á¨|{ãKCğÄúE‹âO‡ºŸ„àÖ£Ñ5»vÛKÑîµ-SW³¼×¥Ô´m'RSîÊ)+áÏüSöbøYâ-Æ>ÿ …Åqã/|ñ'À7Å"øõñoÄú÷ü*Gk·¯o5¯Ş&¡¡ø9,â Ú^Á<>¿’ë[Ñãƒ^»¹Õ$OŸ¢üÿ à™ùñ;ã—íãïÙ_ş	}ûlşĞ:_…>-ø§ÆŸµìÛñgá×Â€	ï4ÿ øvgàWÆ=C_ğv…«x‡ÆúõÇ‹uê1éW0ˆáğ†ŒÇ§]¶±ˆÖëöı¸~:k~
ıŒ|'ğïÆZ'Åïˆß¶„¾,ücÓ~#ü)øW¤I¥øáßÃMÂ÷³øGÃşø—ñCáúkŞ,²ñ|9¡kÚ§ŠõıR†ßGñ…ÔßômAaÒ´?¹lÿ `ÙëNøaû<ü²´øƒmàOÙ[Æ^ñçÀí9>)xóíŞñ„ôûı'Âí>¶ÚÛjŞ$Ót'UÔôÍ7Hñ-æ¯§ùà¸·¸_,ÇÄëğLoÙ?Wßqa£üNğ^¯iñ—Å|¯ü=ø×ñOÀúßÂïˆ^;‹UÇÒ|%¼ğÿ Š¬‡Ã|@}w[»ñ¿‚¼+áOêœº†³¤]]Ûi³Yu¥üÿ ¾ç©ñW~>şÕ_¾xßö]ø« ü>ø	ñwÃŸğOÏ|{ı¥ìµoi¬5½CÄš×ÄÏ†Şğ‡„ü?.ü=¥h:ÄµŸø¶ê_x¶óÃÑë¾ğ¦|Ú„wúô_¡¿ğN}«ûşÆUTÙ{à^Ğ€ü+_à 0 ÆG9ã¾?à²÷ÄmOÀš×ˆ¼5ãHµoxÄßæÔôOŠ¿t-Kâ/ÃOj2ë^/ğÆ]SKñDŸÆ
øŸÄ3İx“_Ó¾ İëãU×¯õ]FöY¦Öµq}ôwÁo„
ø	ğŸáÿ Á‡6úµŸ>øcLğg„,µ½{Xñ>©eáı²Òì®uí~ïPÕ¯şÇiVğIyy3Eo6ñ”‚Q vÑ+ßÓÒúúìzl„ùru9Vü01ÏŒy¥Œ¤O?†1^:öÆ À²ºç”€F\ã©ìs‘ÜgŠËœËeÀã>Zãÿ 7¿?Ÿ<P"lûş<úıÑß§^:
7œ˜ïîxèy>ß‰éPˆçÿ £¡ê”ô>÷ñë×­&ÇúáĞõJ>£ï3èGµù?Ãüÿ «?+şLşÙ3Ş[ÿ ÁIà–³i±G>ª¶?·1Ò “îÜjşÎÑÏk©	$‘†R$‘Œ€¿`ÏÙ~×z„5¿‰µòÂúñÂÚágímû=ø>%h_­<}¯ê—P^j?Cüa×?áWßüñV”ßğ§¼M£øáÅœV—¢ø^ítcMÓ¤ıö×gßx§ãŸÿ h/İ{Ç?<1âü.†øÛ®‡à$ñÔV¶~9×t[!†Y|Iâ­.ÂÃB¾Õµ;«ö²ĞíåÓ´htèµMeµ/^¶Ñ¬l®¯/­-4ûKİEã“P¼·Óí`º¾xcò¢{Ùâ-ÓEòãiŞFDT… wÓgøi®Ûë½şÿ Ÿò£àˆµzÀÖâL¶‡€~"Áüwá™õ^X\şÕ:LZ•å·í)w“Kö?íÿ ßYj^>†Dº··ó_ëLºb$ÏãkGÕk¯_³oÿ jİ7öfñÀ_~ÈÏûXø/‰!øÁâ„ğ—5Í[Pø ©ñ‡ÃšoÅ½kâwl> ü9ø¿ÿ €¾'xT‡Q:GˆöË¡ÚXÿ IÂÊ1°·'’é1kÙu!“Í0FÙäó¥/(Ã¿›&X™5æÑìno­5;‹M>}JÁ&KBm>Ö[Ë$¸ \%¥Û†İ&«2Âè%
†Àòİyotï÷i§góş`>8øÿ ÀÖß?à©?iñ‡†-Í—ü¯ö+¼»YõÍ2'µ´°Ôÿ àŸ©}up¯r{7ğŠÒêyÅnşñÌèÚ6¢-½^ÃÅ:§Æ?Û{ãnƒñKö²ğïÀ¿¿ÿ m¯‡Ú§Àÿ †ßÙ>8½ø¹ã¿Ù’ÛÂ~¼ğ§†şx~Ëâ¶‘áOü(øËk{ã˜> ê–	<`öZ´šî§âYÂŞ—Ã¿Ñ#hZl`}?Lc3˜>™hŞcŸ4–”%É7|Ì“4Ùÿ XûtK¨l´ã©ÛZ›;m@éÖŸn‚ÍØ3ZCw·ÏŠÙ™šDÅA(JŠÍ{hôôíúZ_ùëøû2xWö½øWÿ ;¶Ñ¾3üO½øÛmûOşØ?~ø®Ïö†ø§xßô«/ø{[øim èšwÆŸ¤éx£ÂÚ\ĞêØËª\hjŞ±Ô“Ã2Ë£¯ÜğN}wTı£´»ÛÄşñuï…~ıŸt¯ê:—‰-t½7Ä	ÖîÇãª|5¨Ş}…õ+oŒÿ ğ“|2²ñÚ{ßê>øaae¨\iºÀ–çî?‹_µˆşğ§ÄïüÕ×W°ÕÆ¿
ÂÖ%1ZÇyku¦OŠ<;âêuı–£y‘jzëZ\µ¶©¦½¦§cgycğûÀÃøkÀ†K/øWJ·ÒtÈ®ïo$ Z[íJşâG¹Ôu]JåçÔ5mRéïRÔî®ï®K›™]7{|»vKôÿ ‡;làƒ=3ŒgÔqŒõÁã<ƒÖ”’=yúã¦º}Áà{š‹dä¯®t§ûèõOzM“ãıpì ò×Øûİ³ß¹ühÉşçıYù^lŸCÓ±=†@ øï“ØúS#8_l¸î92?N=¹?—9›'?òÙyàşízsÏŞÉâôVU
ÇqÉÉÀ^¬X‚3¤ÎîPS·GøØmQ@Å=şB’Š( ¢Š( ¢Š( ¢Š( ¢Š( ¢Š( ¢Š(ÿÙ
            [firm_right_thumb_ftype] => image/png
            [firm_other_info] => 
            [firm_bank_details] => INDIAN BANK
            [firm_bank_acc_no] => 6055720590
            [firm_bank_ifsc_code] => IDIB000B119
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"SJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"SHIVAM JEWELLERS","firm_desc":"Every piece of jewellery tells a story","firm_address":"B.T.C Road,Howly","firm_city":"Howly","firm_phone_details":"9101618753","firm_email":"shivamkar54@gmail.com","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"JOY MAA KALI","firm_form_footer":"","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"18BXVPK3167R1ZA","firm_since":"2022-05-03 17:25:53","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"image\/png","firm_right_thumb":null,"firm_right_thumb_ftype":"image\/png","firm_other_info":null,"firm_bank_details":"INDIAN BANK","firm_bank_acc_no":"6055720590","firm_bank_ifsc_code":"IDIB000B119","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => SJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => SHIVAM JEWELLERS
            [firm_desc] => Every piece of jewellery tells a story
            [firm_address] => B.T.C Road,Howly
            [firm_city] => Howly
            [firm_phone_details] => 9101618753
            [firm_email] => shivamkar54@gmail.com
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => JOY MAA KALI
            [firm_form_footer] => 
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 18BXVPK3167R1ZA
            [firm_since] => 2022-05-03 17:25:53
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  € €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? şş(¢Š (¯1øÇñŸágìùğãÄß>4xç@øuğëÂky®øŸÄWf´…§š;M?M°·f¿Ö¼A­ê3ÛiğÖ‹i¨xƒÄºåí†‡ éš¯ge?ğKÿ Nÿ ƒ‰?jÚƒO‹Bı…ï|Yû6~Éú_¶x‹ã&ƒyŸ>2|>Ò£çQñF¡ZjøŸà'Ã›}VÎÆÃX°ğå§‰~ Éáë\ñ(²Ó´=SÀZ¯/‡ÁF.µHÆS|´àä”ªM©8B+VåQÅÆŠ”¤îÔZŒÜu¥F¥fÔ"ÚZÉÛH«¤äŞÉFé¶ÚKK»µësöÕÿ ‚Æ~Ã¿°ä—¾ñ÷ÄCâwÅ;étËïƒŸôëˆş;ğõô0Å;Åãùm5/	ü/&+‹w³µøâojúûL–Ò¼C©¼vü~Ü?ğv—íC¦xmÇÁ„^	ø§ø¯\“Kğ~¯:jş*YèVÚ6z¯‰®¢ø›à¿	x2ÇÄ=ı¬#\øs«|1¼şÊ’ÿ B´9¼mKP›HşM4Ø¿ƒühßu/„ŞÒ<_?Ã_iÛx»ÂZÄ?x·Ç¾,¿ğç‹£tŞ:î¡¢ÚÛx›ÂÇˆì§Ñ|KãÍRÿ SmkÃğèúçˆôo­üS¦ø_Æ¾øSãƒ_	tû_ÁÒş4Üi¥Íß…tK¯ê7~,Ôô½?Z…tÄøyiy¯İøRk-nÇW»¹Ñµø´E¸ÒãøasãÛÏ
|Ş;;ÄCF)¥„•iBnƒön.
§$+bª.DêU()aXrJj¤ ¥MÏ²²oøŠ*Ks]7¸ÓZé'jœ®ö²m;{­Ïüûş
EûW|RÕ´ï~Ù´ÏŠ´;İ(^xóÀ^	ø«â?‡~×¼!wá1ñDñ_ÃÏ|¾øTƒW¿ğ•®“3x©ï¬¼3'­|¯Ü[ê C¯üßâ¯ş+ñ‡>Yü0ø™ãoüFñg‹—[ø»{uâßjšÏ‚¾E«øsÆ~3Ò|W©xšù ğe¾Ÿâûiš²O¦Íªèúl2êğœ:—‡<!¦f‡–ÇáÆ]oâ™àŒ_>Ç¨kw¿o¼wáKr3áÕÒ¼ãû]+FÒí<}Ïƒ¿h]KÄş¾Ô/íõ-â“á»ËæKoHĞüwÎøƒâ/„×àÜ¼sñîïÅ·ú/Œ| |Uñ†«á?jÇÇßş"ø?_ñ¦…¦øgQº‚Aicm,úÕ§†ï­µÆuÃ$^x5ñ1˜ˆNˆ…8C<4©ãjR¥YÊ¶¥z°T*Ç¯,Zt½¦«u°´j5ìêN‡¥J0¥MÅûr•êF§5ÊPJœãIÎ.Õ¡)rÕ£VQOš*}_†¾=|@ğÄi?ş5x³ÀsÙ.â¯‚6Ğ<kã|4ÕuÏøªŞÇÂ~"ğ¡¤[kéaÿ î‹©x~Ut—ÄzïÒÖß\ŸXÔífú‹Eÿ ‚¶ÁP¿fOøBûáÿ íyûFxkHÖ´ïx«Â¿~+üC¼ø™¢i_Û:&½âAãí'ã…ŸÄñÿ ‡SÃza×tÏè¾‡@Ñ|As‰¬G%ÅçÆŞñ'†¼à|ğßÇ'ğŸ‰Ä9~
ü"ñ6‹àÿ [ŞéŞ&ğ£|'>?Õæ¸Ù¯t»/ø³PñÎ‰{ı©&¥ A­^†ÆÎâ=;N‹Âğ–©ªk¤ø­áÏˆüAğ·^ğ‡„ŸÁ:ßŒuŸ®¯{ğëÇµ¯‹^×m®<k|4/ˆ·V¥¢iü=åøsá~ƒ'‹ô>ÊúÓJÒuX¥Š©‚•\BxÌ=IÑ¡F•<m*8šŞÊ„hN/aJ–bgÏzøº´ëQÅÂ,$§=¥N5ã
¹©78Îs”¨JtáÏ'R3Ÿ<ç_ÙÅÅR\”a(T£)¹5ËéÛöÿ ƒ¾>8jeæ—ûNü	ğ§Æ/Â:¾‰£kŸ¼÷Ÿ
üu¨éZœz‚[ø¼'¥é¾8ğ–«â]rşÅ¬t‡šUŸ„­õ¬ô˜¼i«êÚ¾Ÿnÿ ×/ìQÿ [ı‰?o‹xìşüTû|qsğâ^‘wğóâ|J-ÅÍÏöo‡µİ–¾.]*6X¼C7µOÛø[Pó4OË£k¶×z]¿ùM|>Ó4˜~EâŠŞ¶Ôíş+èŸc‹Q°†îk6óÀúm¾£ªë3ı¥¼k­j>1ê¾;M{W²û&­­xŸFÑlaÑ´mRüå}®xÖÆO|qğïÅí]ô[é“ZÚx^òÿ Ã6¾ñ·Ækz‡ƒ4jZ5Í†wñÁÚ²ÜßxÒãL†ÇV±¸Ğgñ^j:ÚëPhşş:ÅOŠ§ña©U…({wí”êÎ8jJ…U4ê¼dêĞ~Şá	:jüŞïl%FŒµU§7È¹9a9{J”jI5`¡RôÜÜ’“—-¯/÷¢¿ÿ ø%Wü—ñßàåî¯ğÏş
>ºÏÄ¯€wˆlì<=ûFN–÷_>h²Yİ¿ˆ¿á6†Æo~:ü?ğ>µ
éã;MMø•} [ÉâÛ~&B-Cşì¼ãß|Qğo‡>!|9ñN‡ã_ø»K·Ö|5âŸê6ú®‹­i— ùWV7Ö¯$R¨exfŒ•šÚæ)­ncŠâbO¥Áãğ¸è9aêÂr‚‡µ§ÆR¥9S…G	ò·ïATŒgm¥x½U*¾¶IU„¢›|’i¥4¤â¤¯ÒVm_u©×QEÚ`å?~7|.ı›şøóã—ÆŸiø_ğ×Ã×&ñŠu»˜í¬´İ6Ì ¨¦FSs}s$~—§Á¾ëRÔ®­l-#’æâ$oV¯ópÿ ƒ‰ÿ à®:ÏíûOŞ~ÇŸtiõßØëövñå¾‹®ø‹Jñ,z}¿ÇO‹§Bñ§ƒ~$êz%•¬WŸü'àmÄ:öƒá-ÂÒî<GáıOÅ{©[xÂÖprc±K†©ZÑœãéÒu)Óu%¢´]Z”âí{¸©)4­ÉÅ=ğô]z°†ª-®y¨ÊJ+»äŒš½¬šMİè™óWü·ş
óñGş
{ñ8ü.ÑäñOÃ†^#ğÍ–¿ğWà?Å?xu<4¶zn¯­ØkóüA´ÒäñEİï¼Em¢ê·o­\_[ÿ Â-¤éÚEçÃëÍ\v¾#üìğ/Š>3ësø{Çú÷‚>ë~2ø1eâ/xsÃñw…<m?Å?]x^ÃÂÖ¶Zı·†uÛŸø[ÀºÆ“öî¹àëmF×Uñæ…aa¥YÛyú,Cñ>µáı;ÆßüCã;ï†ßtxªö#Pñ¹©jº–³e ivgÅ+w¤GÂı;HÑôåñ;i:¥ybÚõüZE„à¦ğúG…tƒ>,—Àá«/ŠzŠõ_F³×|eâ/iÿ u½_|@ñ6•®‹$·×5ø0Káßè7ú–µ¢ZKàíOÅ~²ºĞ.åÓgüÆ­W§)Ô§ÏŠÄÒ«ˆrÄRö·s•\2ÅRÄá¨Ã°qÀÓÅÆŸÖ>¨ªÔp<UtßÓªj„”c/İSœ)%Nj6²¥Z‹t§N¬İlñ“—³ö®æR£7#­øo©øGà'Ã‰·^(ÒuïíŸ‰–^ñWşêø_âÄ­/Âšñ‘¯xËÅ7#ğş«á]WKÕµ_x?ÇÒø'â/´¹muİ2[ûh´)ü#§ë78.ø«{ğ§Dğ‚<_ñšïÃ¾ğ·ãMãáÃ›ßkzß‹~ø‡Ãşğî•ˆlµMKLÓ|'ã[kYêÚtš“øzËJÓ|B ğ
éš¦Œt[Ï“ügñòóÂw¾øUâ½[[û4·ZL¿u{[x<yá{]Iï4hºÂ¡Õlô]QÜZ¤÷Möèm¿á‹Ãe´°êÿ &;¼ÒHÌîìÎîìYİØ–ffbK3K1$’I'&¾£KR®3Ü^"¯µw¦¥V¤#†ƒTñ4æğÊ•('[ëÙ)óU­N´Ÿ_j4h¤ıœyouËê{IÚTä•NiÙ¾^JIÆÑ„ ì}[©~Ò^Ò¯4÷øoğ_ÂZ¶—áğDxÇWñ7îeÒÅ7>0‚åmäÕ4­=nÓÄ3Ç«ÛfİiwZu®™©Ca§[[_ş¯ã¢êš¦µ‹´Û}_[‹LƒWÔàğ/ÃôÔµ;}ÍtİßQÔá7÷ğèúr&Ÿ¥­íÍÁ±±Uµ·1Â6WÏWĞÇ+ËÒjxZUÛM9b“ÅM§%7yâ]Y{ÓŒg-}éF2zÅ[ƒë•¹jJwJ›öi4¹S´9V‹E¦‰´·w÷ı'ö¡øİ ı«ûÅzföíN}jûû+À¿´ã{¬]ÍÖ­vÖ^î5;Ÿ&>şVk¹|¨·Ì|´Û«¥şĞ–cC‹Ã~ ø_àãciáßxoNÖüğ§Œ´Û/ln;]{S·ñm´VËâ-|Í£Zé6šp}Vqo´*>øMğoÇ?uİOÃ-4íSÄzn‡uâÑ¯5k"ïT²²¹´¶¹‡J—SšÚÊæö#yÆÚ[»v6ë4ÊÌ°¾8ÏøOÄ¾×µx¿BÔü7â*Q¡¤jö“Y^Û;(’6hfU/ñ2Mmqx.`xç·’XdGg<¯.•ÿ Ù(Ór’”ı^R”c(ÅÊt9IÆ3œW3vŒç¤ä›'Ÿµœ¬šJoÚ$›MÙTæJî1nËW÷Jß¡ºGÅÛïx*ãá¿Áï‰ş'Ô¥ñ“ğûáš|-øŸªÇ¢éşÒ4O
Úø>óÇ^¾·Ö‘®5”m/BEğ¯†æñH‚¿ë÷¾–DÒìô¿Fø‘¥xCâwÃß
|4Ò¼7ã7Vğ†½ã]CÁ¿ïtOè>8ø…a§ø?R¶¸ñ¯‚ui:O…´?=_kåŸÃØ,¾"kúN±iw{â›İÃv~FWÓş5i÷W¤|X’úv½Ğdğ®ñoOiÏÄ?YÏx·pÈš´Q]j:•uc{qW>&´ğş¥¨é¶rk:2'„/¾sÃ®ƒ§ŠÀJNXz³ÄÅB”~³í]‡r—³tÖ&*’P—³,z¦§õlOÖªB¤}<>b¦¥K—-XÆ“æœ½—"©í,¹¹ı“ç¼•Ü°üÖö´(¸¿½5íGâÖ—coñÛÀŞ
ÒüaãÏxKO×üñÅš„ïü)¬xjçÄ¾KïjzN“ªéš•saã?|8ÖHÖ­5»M3X‰_VÓõ9ôÿ Øø"×ü‹âGü3âıŸ>8]ê_şøºçRñ·ÄÏ‡ß<?c~ŸÚ{v·>'ğ…¿ö~¯®ø“Rš?^ê¶–ãVºñô:µíåØ™#ğÇŒçü8Ô|3}ñöÓÂŞ*Ò4xş&øşúØü0MWÄšÎ£¢xûÀ‡ì:v£ñÇÖuû1©Ï¦êš¯llü	‚-uÙâoøŠÚãÃúÿ €şÙèÚxğøø™ñ‹Søc©|=ñ¶±©èú7ü}¥øÓ[×ü5‡|Oa¤İéº£á/xzÁ×Å±\ØÛ^EâxwVĞu‰üMá-GRĞõ] YÏÌQ®òëÔ¥
qÄÓ¤ëóaé¸B
\.JxÊ˜šôŞ_Ë†£9ÆŠÅTÂB…zõ«T©zó‚ÅrÆ¤¤èÊjªÉI·(T«Zj„iSŸÖe%J¬Ô\İV•HS§ÆRÿ c¯‡ÿ <ñ[Áø•ğßÅ:'¼ãMñ?„<[áËø5=Ä¯mæªi·ÖìñOmso*:CÆÛ¢•#•¯¯àSş²ÿ ‚±Üü&øù/ü³â†Ÿ¬é_ ¾+kóCû:ëÚ¶·g5ÂoŠgOÓíôÏ‡÷^m2Ï]øOà±ØŞêÒ<UyÔ¾#Ios hV2|EÕ~Íıõ×éØ\q¸Z8…IT§	T¤ç	ÊIEJTçìç5+ß•¾dšæŒex¯”ÄQt*Î›|ÑŒšŒÔeÎ)é(óF-§ŞÖ¾Í«7ø£ÿ òı¾ïÿ `_ø'ÿ ¼Eà›å´øÉñ·Tƒà§Âù¢ÕJ¾ğì~!°½¿ø‘ñŞòŞhõ+>|4Ó¼M¬i¦›ÍÍ—Œæğ„Ko+^$oşP—Ş¸Ò|SâŸøJ|)á)<Œš®ƒk¨Xü:ğ¾£w¨Êfµğ|Ÿ$Ñ¥×«oo¦ø›Oµ½Òõ#¬k—º%¶¬÷Ğhº”š©ş¿àìÛ=¼uÿ ³ø7¤ÙkÚ¾•û|.ğ†i§Ûê6k¢Ãã¯‡NøãÏGc}¡j–w¶š~‘¤|%ğ£q=¾³¥ÛëwúUèÒ5±;ÿ 9>ø²–ğç€uUğWÃë­f}NâFğş»kd<9©Kyyiu¤ø†ÚÓ^Ÿ]ğêÚÙİé~+.u
ÿ hk	ªéƒXĞuVÇVùŒëúÓx|<+Ğ¦şªâê¥R-F¬F&„iU•hT¡MB*­8BiU’“¦éÓ”½œ?±µ«*U%ûå%Á¦İ*4ª9ÓTå“s|“›¸šSS’]‚ôï„ğ¶—â…7°xÃ]Öõoj?üñkSĞ¯t¸¾&Şİi7‘Å=Æ‹¤økTÓµL°ñƒ[R½ñ'†ôm[Äºn“â5·³ÓuïZØüİñâDšv…mğÏF½¶©s%ş¿ñ6÷Z×Oˆu˜<Qây­5oø2XÃ‘iöºµ¼ş!´]¦MbÚ->öí}3ÄZ¿Š>„ø«âeğ—ˆ|sã}|A¡h^¹şÄÑ<5ãÏé“¯Š|c«x^ÓÂÒx§BÕµÃy«Zê–‘húx¢ÂvÖdÕô­#^–ÏÅ·öÚÅİµ¯æÜóÍs4×73Kqqq,“Ï<Ò4³O4®d–i¥rÏ$²;3É#±gv,Ä’MgÃ¸E—ö…yU­Ü×ÖjN¦"‰Òç…
ÍB•	ıV…XMÊåÍ‰¯7í#*n5šVöêÔÔ ÿ yMû(¨Ó•(Í'R	Êsµ©	E)MZ•8¥¤ªJ*(¢¾ØğBŠ( ûá‡ÄÏ|ñ¾‹ñÀ×ñiş#Ğëì’Ü[E{i4ÖsØ_Z^YÎW×Vw3C"²FYg·–˜¡š?¬?iÿ ˆcö’øUğÇö‚›NÒôßø{TÔş|R³Ò’X­c½d›ÅÔìà¸šæî=3UÓÿ á%(×3Î Ô ºÓã¸”[«·;ğ:ßö'“À±·Ç‹ï‰6ş=şÖÔD‘ø].ÛJşÈìÖSœéö‚<ÿ ;÷„ıÜ^Æ-à˜AJ_ãhF*Ì¡5¬È+şÎÁ*Â’20Ürù¡EhjÃN®¦4ƒ3i#P½[\gÏ:p¹“ìF|€|ãmårß» +>€> ø!ãeñ-­—À¯øŸÄZ?ƒõıbÑôıPO¿²Õê[¨¼)>£&ªÉ…¼E¬M¡Öw:ŒaÓõhÆ—§â=JO¯uû/€ÿ ¼/s'ÄíwLø}â½;Y×ŸãO„~jºÆŸ©øÂ~ñÇ‰|/â¨5]CÃZÖ«jsxgÃº…ti>?ƒO»ñÆ­g¦I§hú†·ãÏ/å~¥|ñş…â-Kà×‰¯¼=â}|øX×|5ñGÁ¾ğƒkoâïiú~¥Ä?øòë]ğÔŞñ½ÏŠ´½jãÇúôÚ›á];ÄZå†‹•§ZëÑêÄX`Ö?*ôëV¶p£(â£Bug+ÊJOëP£IÖ„a^	ZXŠV›—·–â=§û=UNkÜ‡ïâêEÒsŒ"¬¥/däÒP“nJ´Õ9û‰y_… Ôl¼wğ“Åÿ ¼5áßø_Kò<«:ëáŸÄ]cÀIàÍVJ5‰RøvÇ]Ğ¼Zt‡Ñ.á“ÄwúD:7ˆõkK[m_DŠÎëMğÏúñÿ Á'¿mX?ooØá7Ç;ë¨fñı’j¿>.ÅÚ–â‡ÃË¡¡x‡Q¡µÓeñeªi~8şÃH¡ŸÃqø<;¨ÛÚjºUı¿ùHkß-'Ñ|sğwÃ—ø£x²ÙKl7×íã·ñüZ¶Ÿa x{GÓ<Kãâ-zûÄRÍ¨kw^>8ñß…â³Ò.uM|GuÃQÿ ğhí¾—ÿ ¾8~Ì^&´Ô|5Æßİ|Rğş¡c>“¯xËá†¿?ï¼1a§é:?‘>©£ü@¼şß¿º³•¯"ğ.úî¿¬ÚêòY™&+ñ7«†T0óqÃ¤êº•çŠ¦'	Š®«Mbç9ÆU(¹U„ª8Óu§9ÆSœu
¡UÔ«ê]C–šqä¥Z”=œ}Œc£4¡%)rF0²‹ş[ÿ mê´Wí•ûZşĞ·~9ò|%ñwö®ø©ãÏx‡Tñ»Ğ´İCÅ>#¶ğí†.o4ïIu¡Éà}CKÑ%™íôoíH¼%eçM.amu?xSÔô;Ïøâ|ß
5É4]Ä·ow`t¯x£Sğî‹¥;GĞüMªxjM½ğ—ˆa»²¹Ñ4okÑÜh÷Všx×,cÑä°°¼ä/.<e¥Ã¯ø;ÀúFŸ«Áã?í‘­xÇQñiš]ä>-Ğa²Këİ.ãÅúÍÆ­i§øzKVÛû]n7ŞAe¯ÛÙj’i6·÷•®<]àí7ÆhÚ‚µKÛo>‹ªüDñ5ò¬·ÇMÇÂZ]ø1“PÕ5u2ÇÃš¥ˆ,tù.TXï¬“L×f½û?Îb«WÌ]WR
½<Dãìªáş®ñ˜iJµákÕ”*S–Í{hº0öx¬léÆPÁ©F¬_¿J•,‚„)Òï!WÛ{
Ê4å*ô©©FkÉû¦ª>zhÉ§‰q•9/ø°¶~ğŸƒ<1§É=´¾!–ûâ'ˆ4»ÁâÏEs©*éÚĞõKW––qÅ¯ÚÜÄnuä™ÌZ–±«IEàUë?dÒÄ. }´m#Âºe­„Ú\w±i÷Q_İêZûŞZG¨…¿H.æÖe¸‰/R;¥I 4”2&¯Ğò˜µ€¡7ÏÍYÔ¯'QJ5_¶«:öŠRœÔ£NP‚Œç9B1ŒåËwò8ö¾µR+–ÔÔ)¥œ³„c.WÆ-9)JñŒc&Ü”cÍ`¢Š+Ò8ÏŞÙö`øû:şÃ~ ÿ ‚’~Õ->6^êš£è ş
k²ˆ¼!ª^ŸÏá;gÅ–sC=®¨u=nÇZº6š½–¥¤işÑn5{}+ZÕµ]2=?Ä­à±ß-üAc0øû!ÇğşÎèøUv4KO'Ì´Û{Ö½¸×-%û’¸µwO%Œğƒhß®±öŸğgş
•ÿ ·Òb/ˆ:GÃ¿Úàö•¦Åm¢ßæ»†ïÁZİÍß…<ug¢yö×~!ğ~¿¢ê@ñeæ™æŞxwXÔu	nm÷õæÓö¤ı¾?~Ç®~|xğ&¡á‹ö’á¼?â(kïø×MÂcÁŞ&Hc±ÖlYßıWÒd³×4Í/PÙÇüYáÆ?<KñÅ~ñeCâ†UÆ™æ&àŞ'Åc(<‡ØxP§Ã¸îËjÖ£‚«ƒ¯†Uñ˜¼ç'¦óõ«,~.´(â0u'ıÅù¦uÁÜ7À˜¯±_Ùü)[…òšù¾q“ĞÂıc0âú²«W:‡â•:˜¹NgG…Ëñõ
kB“<DW«ÁC>0üø÷ñ³Âÿ >x#Ã¿ü'âß„>ºÖüáÍFĞáğ¿m'×4ÿ é7öº†™eu}¡i˜µƒco.·¤¶™«aŠò(cúSöğ¿†¬àßµËèVzÕä
MŞ±k¤Ø[ê—FçÂš´—çP†İ.ç3È«$ŞlÍæº«>æ ×ãí~Ï~ÓGş5µğŞ„cÿ -`ÿ Jş·á¼‡	ÂùUÃ¹}\UlO„§€ÁOˆ©‹ÅıV…ã‡†#UÊ®"­:\”å^«u*òsÍ¹I³ğŒ÷8Äñq˜gxÊxzX¼Ï<^*J0Ãá¾±VÎ´¨áé¥N„*Tæ¨©SJù¹ ”RGãQ^áä…}9û?ŞO«ø_ãGÃÃ ·‰,õï	h':bø¢ÃÂ2Isá/hënêÑM¦éúj6µ¹â4A>¡¥xm´Ëkı2êæßU°ù¾…ı–ªÿ ü-m¢®‘.§y¦xÖoA¼9w~ñÖ™ˆ“I#T“CşÔ¶²›R];ı8[Dïgş’‘WŸšÅ<¿7oÜSX¸ó9ÅsàçT/*r…H{ÔW¿	ÆQø£$ÑÑ…vÄRZÚröNÊ/J©ÒzIJ/I½$š{4~…üMñ?‹üAiğ§Áß
¦øáÿ ˆß´Çí¯ëº5­.ÿ ÅŞ,Ô¼#á…Ş/ñ¯†®¼¢ÚŞjOyãÏj¼ğõ¦µ®^ëÚG…íµI¼=âgÆÿ dÁ!5OşÎßğToØßâG‡ü|<Má{ÚSÂ¿<iâMÅpxÏV×!ø¤±| —E×4M'Áiáßé^ñï‰|ZúSÜüAµøy§x_[:d°%£{ªü5àïˆ¼ğÿ àw‰|áß†všu§Œlü+ñ{Áw~$´Ô4K|u$wÑ~øªößÆ¼v—‰üY¯ëŞ$±ğæ‘¢ÅeâÑ´Í:æM
ÎúóÕ¿gÛïŠÚ7ÄOÙËá¿Œ|3¡Ëá¿„ß~k¿~/øÅ–ÚÎˆ4í
ÿ Iñ¿‡<QgàÙ<} 5¤:Î¥øoÅú¾§mm}©\xo@·ÕSÃ2ËZÅç¸IÔËªCÙS¥‡¡CUÕ«ˆTUjôèâë¬D¡:•]lOÔãKN8:•3<LêÊÜißèª(âbÔå*“©J
¦êrS”èÓtÔã(RöÎU$ëFÆ¢¤¢¥ä|­ZE­ÚjŸo¼W«xWÅ,ºô>µmwc¦iúÕÍœÚaaiŠ¼Ci«ëÛ[ÓÂóÅ$—-<š®©ßÚê·st·úï†á1ğñ›Å^ñjxãV×m4{¿ÊÚ—Ù<GªÇ‡-µy£×µ9µMa4ÉõM%4o¦İM{wc¤‘u¥z§íÉğçÆ²Çí¿ûaüÑ<;eğ»ö™ø± è=”Úw‡tCÁ67×—Ã¾3Õmî´İM,´í[ÃŞşÅ‘è×ºÄZ¤‡EûV«.§,á/Øx~ãÄz‡¾*&½®_Úë©{áÍm~›KmvÊ[RV}ÃşÒ5bÅµ¶›¤Ûø²;no'Ñ­o5{tÒæ1˜<U55<T0²—Õ(`TªM~ûR4’¥ÄRyÆQÅTXhº±§J1œ*R«éPÄaê¨8Ú„±
?X«‹åŒu§U:—©Š£7ˆ¯hÍ:uä©¹T“ŒéÔ§á?.¡Õ5Í]‚Ø_ğŸ©2jtZMÓ˜õ_LàéÖó\ÛÚÁyİ¤vóÍnmg… ‘ád'É«Ş>'Øê×ĞõMOIÕ,®ü5¬ê^¼¿×õ‹_^Õ¡’4½Ó¤¼ûp½¬:Ùï#T'ŠA¨ZÏk©jŸišhü¾÷%©åÔcQ•ZJucÒ«8ÓJ¥&á%ì}œ£k5%8ÂjPÈæP”1u¿ï#N­å	Órs§6á4¤š©ÏºrMÆR¤Ê(¯²ÿ `¯„>øÃûFèV¬XøkğëÂ~>øÓñBI'ñ…¾øKTñ”ş.ƒzÛx›QÓ´İRxš9âÒµé­¤Kˆâ5‡gø>áÜï‰sW«‚È²¼vkˆ£†ŒgŠÄSÁaêWxl-9Îœ*b±.
†œ§Î½Jq”â›’yV]ˆÍó,W…pXŒÃC	JU(N½HÓU*É)8Ò¦¤êU’ŒœiÆM'k4øWÅ?~øÇÃ5ğvµâ‡9ğôºg‰|/â=ëQğïˆ4Ãyiş•«éw°µµÚ[êuÔW×1µÔtÛ°A¸³º"Oë'ö+ÿ ‚µşÏŸ·ç€ ıà¦ğ%×‰üM¶áÿ ˆZİ®“à_ˆz±Cg¦Í{qllÛáWÅ=ò–ÑüE ]é:>£¨Ë,z-Ï…õ)´íRşMş$üAñ'Åox¯â7‹î£ºñŒ5«ÍgQ6ğ­­…¡¸|ZéZMŒxƒLĞôk$¶Ò4-"Ñc²Ò4{+2Æ(m- ‰8šüƒÆ ¸GÇ^Ê—ajpçd´(cxkxWSÄÜECÏ“gt£ƒÅc2ê8åz˜<J£CGN–6/îğÿ ã¸[_û>k”b*N3+ÇÂø,ÓÛ…±Xnj¥^tmjs•&ù«Qç§Söş
Ÿÿ §ñwìâˆüyà;ÍWÇ¿³?‹µf±ğßŠ¯#_xX¹Ïmà¿5¤0ÚÉ4ĞÇ/ü#ş(¶·µ±×£·‹M3T‰mn¶i¯ùF×Àúãğÿ Pıf¿gàšw¿?jOØÅ²ßíax«IñGµ‹?‡zŞ¹ª®µâI>êö:_ü!W:¤’%ÌÉ«x7^¸‡Xğ~©&¡.£§i–ş­ìåÒ 2~1~Ôƒş	¿ğYR¿	¡T.¹ycğv¶Î‘óó²¬nä&~DgûªHğ~œeâ.*\uáO‹•0ùŸøIÉ°5ø·NpÜmÂüC†Çb8[‰jaàùpù/–c)ætc¨Õ§JuRÄÔÄ%ìqŞC“apü?Å<6êSÈx²†:¥fåW*ÌòÊ˜zY®]ÎÒö”hTÅĞt*]óFråıÚƒŒ4QELŸ…}û*é—·ÿ ôË«MNç@‡FğßïõZipksøZÚóÂZÆmâ$Ñ®§µµÕ[KÕµ½2tÓ®®­­¯dÙm=Ä1Jò/Îuöì×áºğgÅ¯EiâmWÄ¾›¢øÀğo‹4ÿ 	x×Çz‹ø§Ã×ˆì|uq¦ëº–¥âÎ¾Õï´}ÃúÍş£áûıJÒ;H’yu-7ÎÍf¡€ÄEÉGÛEa“j·ÖeÚ£Tß$jJoÚ5J1‹•V©ÆMo‡_¿¦õ÷%í4¿ü»÷Ò¼S–­$¹}ë´£­¶>ë®´€?|c«x÷Æ3ø£êŞ"ğ¯…u/ øsÂ
—ÃW^;ÔÎ‘7üáßˆ’høÎçÄÖ/4K¢k—å½ 7‰Vé4í2^“örø}}­|GøñzOøÃâGÇOü\ğW„<Skzö:¾ğëÄ!ñu¥¾©à½sÀËã·‡°î5›ø”øÎâÿ Âk¢êğKm%½¥—=ñ?ÄÚ!ø{áÏƒŸµÄŞø§áwğÿ Ã_YøëÅŞ2ñN¿ñ×Ã~,›^Ğ5‰¼IğËáGŠ|?á¯/Ä»Hôoø“Ä)ğ>«â/‡úWƒbñ'‡4;=5Ï}{ÿ ’Ò>#şÖ_ğSÿ ØgÃº•ı‡‰ô‹ïÚÃ_üCáù<C£êÖ|ğ^÷Høñ­ø£ÁÖv‚õ}¢j¿ll†<W¨øÏÇ~Ó5H!ñ¦Ÿioy5Ö­ğ˜L&'Z.Øxb±RXš8ˆºsTªb12t¨Ó–NX|d'Î¢ƒG>déÑöç^œ ÓJn•5ì§MŞ<Ê4§9*Ó—´£(É©T‹’U[¦•ù¥ö·ü©ûYü.ÿ ‚ˆiÿ #ğÖ§kğïöÆøcá¿ë>-²¸kM/Oø¿ğ2ÂÓá·Œl$H´»«;P¿'ø}âk›«¶º’òëU×§É&ûN ¿Ìõ¼Z†ü1¡j“j^)²Õ<9$¶§‹ot­2÷I†êmJâÖîÓN¸×ãµŠK»ËX­d›íş»Öü; %•¼‘i6÷vºßú¶ÁÀŸğO›¯ø('ü×Æú‚ôÍORøßû?jöß´7Ák-2úï‰µÏiÚŠx³á¶©5»ÜÏñ#À—Ş!ğö‘`ó­¬¾2>¾»xôÕ‰¿ÉLÁ©Ùx‹R×®OŠ¢Ò¼G`ú™§xwFñ^—â˜ôÖH®mìmfÔô´#¨I¦Ø\nHµø¥[gP¶7r?œŞ¾}«<UıµHĞ›úÜiZ¥HÕ«
kZ‚”¹•kBSu\mOØÇ‘ÃŞn[eªq¡gJ­öwSÜ„©Ó”ıµ*®+—Úû:ÑŠ‚•çí$ä¥¢K¯×çğÇŠubü?á¿üA’	àHõëİFóÄÖÚdWa´kkI´]?J²×¥Ğ%¥{'‰uOjĞ¦¥m2ı“äËû½.úóM¾„ÛŞØ\Íiu21ŠâŞFŠTß<nÔ€ñ»ÆãŒÈC­ ñ”èpèšş‡wğ¿E¼¹°Ğü?qjo¯i¶ßÙ°[êÖ’júe¥¦ÿ ü7º^±«éÛêÒê:ş©©	“Vš9|÷Ç¾7pY[}‚ãHñÖgqcsáÛ«©5KıÃº&›g®Gz¶°	/|¸$Ú	’	5;9³ììm,´{mWÆËQ`ñ4«P£8Â?mˆ¥‹“ú­5N8¹âh·±öQ§†ÅT…LRÃºXwZ¦éFZføHâ¡õŠ§V¤oVj•˜uûù©<<hÔJTåÏ)Ö¡Bƒ¯í+*q¯Z5$¼
¾²ıˆ~;è³¯í%àOˆ5±›Uøm}ˆ<ñSJ$–kï†¿tCÁŞ.h`ƒ÷÷7:^›«¶»giG%åî•oj$U™|›E}&’`8—#Î8{5…J™ny–cr¬tiTtk}W‡©†­*£yP¯Ts¡^ı±…X5(&xY^eŠÉó,¿6ÁJÅå¸Ì6;êAT¥í°µ¡ZœjÓvUiJPQ«J^íJnP—»&}¹ûZşÃ??f-vmzÛK½ø‰û?x—n»ğ§ãç„­Ÿ]ğŒ|ªÿ ¥ørúÿ \Ò’}?A×§Óeƒíú6§%¤uÌúKjZAµÔn>yøEğ/ãÇ¿Úø;àßÃo|FñÔÑBlü1£İ_Ád%`«s¬êaJĞ´ôÈiõ=júÃN¶LÉsu`°÷_ÙËş
û\~ÊzsxàÏÆgGğt“M<¾×¬tø,Irí%ÛØè)°Õmt9oec-õÏ‡“u{'Íu<¹ ıI¬ÿ Áo?à š†”ÚN‹ñÀ¾ÕÕ®¼%ğ«Á]0bGŒkz^»i¯’LĞZE*1ß£…aùmLGy^
YF'ğßŠqt¡õ|æœMğôq‚ä¥ÏxOÂ™¯.6QQ2QÄ1Ââ+J¤ğË/¦á†§÷ÔèøIÄÇ1ÅæœmáêIUÅğŞ"Ês™R”Ÿ5L6UÄ8® Ë”°É¹CS1Éş±F
­õÉ©VŸë‡¼/ü/öÅ¿¾.OuûFjSø‰~|<ğş¹i¨i¦ÿ ÄV6vÖ¿ô´¼²’æÿ ÃŞÍâøšÌA¦é—÷vú$·wGÃ³êßÌ¿Æ?ÚÆßlü)áíN/Ã^ğ™m¤x+À^KÈtÎÎÎ>	¤“Q¼Ô5=[Tû¼6òjZíÄ¡DßfKUººY¹OŠÿ ~+|tñeÇ~0ü@ñWÄoÜB–ÇYñ^¯uª\[YÆÎñiútS9µÒ´È^I3L‚ÒÂ’FŠÙG-æ•ëx]ÁGÂ˜<ã3ã~%¡ÅÜoÄøèã3¬ß—PÀ`°X:ÄÔÊøk'ıßö„òXìÂYl3Ej”êcñµ)RÂÇ:'•ÇI’g˜¼…²Z¼?ÃY6êÙvŒ©‹Åâ«Î4aŒÎs§õXæ™’ÃaV-á)Â†	Ô®éF QEú™ğåÍ;O¿Õõ+K³¹Ôu=NòÛOÓ´û(d¹¼¾¿½-­,í-âV–{››‰c‚cV’Y]³ Tş€>Öşh<‡ÁŞ*ğÀK\¾ø™o÷Œü=ñ:çâÔ÷z”ï'ƒu/Üè6²h6©á[İoIø‰2ë>Óôx_Oø«oáo/ÃÚ¡óçÀŸ†~"ğ@ğßÄğæ‹âŸ‰~%Iğãán«­Xè¾&¾ğ¼ö²®­ãMÇX±½Òï5·¶¸µÃ:f«m{+é·Ş)±Ğ5A—cöøÕeáê
øáoö¤‡šş¯£|Uÿ „îçÆ×:ñOŠ¼{àÿ ø.äZIá[=xOğÓMğ©ão†¾$·"Ó$Iîä½ğµî¬¯ƒüzÿ Ÿc¥‹—Õp‘­Zı¤L6.J­HÔÃT©*ó\´iÅÔú®´ªÑçÅÕ”©:±ÂU·­„ÃªqU*¸ÁË•òÎ”ª^)Æ¤c­e9$êN
3å¥¥ÊêÅ>¾{ÿ |Cøqñoâ?ü%~<¶ñWŠ4Ë½Å:GÁ-sÁšÎµ­øbÒ÷Ãú¦µk7„´OŠZŸ.‡ ^]ØKá2x²ëÃPk·zn‡%´ğu·ô­ÿ ”~Ä¾Ñş:üzı£ôÿ 
øx_á/†.<áø«U‡R7ß¼eâ¯ø[Äz~œ–ú›¦Å¬øÀ^¼YºĞ¤´³ŸOøÑ§ZİIã;/xŠÛùµÒüKãÏŠ¿Çì~6Á¥|-‡Ã¾	—á·ÄâŸÄŠÉá¿ŞŞ;xÎûáÿ ÃøG®ô½{Ázœğ=ÍÇü"úÎ±¢ZZ MJ²Ğìt?õ¤ÿ ‚QşÅVÿ °wìSğËàŞ£f¶ß¼B×ß>6¸¼‹RüXøƒ•ö·á‹]J –Ú†ƒğ»DµğçÁïİÚÁio7‚>xm¢²´_ôxôÉ05#]¿iQaâã‰•xÆN_e… ÜZhÂŒ!‰„¹ªBÆVå›ÏUrZÑskÙ©hÛZJ¤–—ƒrn›VŒ­ët¿G«üÎ?àäïø#ÕŸìYûLëÿ ¶×Â_ø¦ãö\ı©<ouâoøsÃá<-ğ£âüZˆ<kâÿ köë+[ÉáŸŠÚŞœšç€ìo-¡ÑíuOÆş´±eàèîÿ Ó¼¯ãÁO†?´oÂüøËá=;Æß>$h^ñW‡u4>]Í¤å&¶½±ºŒ¥Ş“®hÚ„š×‡uí6km_ÃÚöŸ§kz=å§aiuÒã°ß[ÂÖ ¦á*´gÊÔ“R‡¼£)EsÆ-¸««i}Ÿ.¿Õ±«8©Æ¼¢×2qiÆ^ëi7É)$¤í®§øªëW‘[xÛÀ4:­öµ/‰/ïn×M×-tëÛ;8­nôísI_ìèu
=¦­¿ ^i³¼ºšhö^ß[é^'’òÛOá¼=&±âK†’]Äş×u-zêüx„ÛØ.®ºn—`º•÷‡õ«½GMÓ-?áÔmíôı/ÃÚcÁ<Wúµ¶«¨-ä1¾‘/í?üşíñKş	kñ&õl-5cà‰Nğ§ìßñù­¯<W«kzT’_ê—?üK¤iº ²ğ÷Æı&ïÖh@ğ×lï.|[¡êE†—©èü±ğ­½¦›co'Ä]Ä¾ñ=·¥øÏÄsMy}§øvÆÓK¶¼ºñN‰®¤*-­íõ–7êº×`şĞ°¿…eÓoÊëáã–BtjR•U8<:l-z•'*/©ˆ„pQ¼*P­‡…,$êÍbjáJ›“åûú5:P©	ª´'?m(Ó¯J0Š©>4e,S*Œ¡V•yT¯
qtiâh¹¨ûŞ%âÿ o=ıæ š7ƒ¼t–oâ]K@Ikáé´;ëÁpu{Ë»Ë+MPK=­¥ÌÒêRÁu%õÕ^ÏUƒÄÏâ™¨iOe©ÙÏetŠå\FP¼RÑO’{iĞ‰-îai ¸‰–Xd’6V?SxcPÑfğ_‰4_iöÑxGÂÚî¡éÖ>%ÖµÔ_YXõkİkN·ñ'‡¼9{ªêÏ©Yiºƒ£%½¶™oÓİø~K›­oUÙAÖüY¡é·èş+Ò$}gÅÚæ­]øzXh7v:]æ£h÷l`¾u®o ÿ „’=;H‹Mvv-s¦[%µÿ Ñá3êùtªáñ‘‡ÕğõÕÔ©V0¡iáiâ¨ÒÁb«)IS’Œğ¸ºÎ8yÕÃĞ§˜âT¢ß‹‰Ê)c#N¾OÛU£í]8BRªÜkËR¦&-'ó§(â(SN´iÖ«SAÆVøÊŠ÷­SÀ>
šD¹yüKà;_øFáñF¥6«§·ˆ4Ë{â;Úé6Ù˜¯çŠ[ˆ’æÃS}CPÖ{<P5´¬qá&ûF;_ø;]8è¢[kP¾ÑüT:|º®„Ë§ÜÙ5ÍÍŒK-¥¶¡uqbğËo~–×(Ğ¦§`jEÊR«G—âU(Uq¿NöÔ£W'ÏZ”Z…i´êÒ¾•!ÍàÏ-ÅBVQ§;Û•Â­4äœe$Õ9Ê’q„İçN?ÃŸòJŞAE{fğNòúèÛ?|	§ˆï<(ÖßÚ—ĞjWõ„–q]éÚ]–¯¦hñês$—öqÇ,kc;Î«ëm§Má…Ô´ÛKû+ßxßUÕ<?­x‹IĞìôEğå•ŸöÎ³l¶^-¾[r­õ»­{k¥k×r´ÖÖÉ5½åÚwS9ÀS‹’©:–qMS£VÑrI':“Œ)R‹*’æ«RjI·dÔrìTšN…Ókš¤.ìáËÊU&ùªAZ“NJé+µóö“¤jºö¡o¥hšmö¯©İ³­®Ÿ¦ÚÏ{y97–O*Şİ$•ÄQG$²²©Xâår¨ŒÃë¿†ÿ àğ‡‹4íÄ¾Oü^Ôü3â¯‡ÿ „–“ø>êóKì5§‰5´–kÍJÊÏJÖüK6›0‹Ãi:=”kZ“x¦ÙôoSÿ „[´økmâ·„¾éóèŞñ¿€?áñBÉñÅş(k=:ò=WÓÛX‹PÕ¼&Ş5Ö‘¤ëZ¤z®£á/Aá¨ï£m?Sšá4<wãoi­oşè2øÄ¾4Õl>$èŞñ/ˆu?[øƒÅ>Ô&Ñ.®<WâŸx{Uø};İÇwfÚl^¸ğÏŒ<=æ‹ ëŞ0Òâñ®‘£|æ/=¯˜8ağT¥ì«b%‚¨éÎ2tëû5RñXšu¡
^ÒşËê˜yº•kS«‡«ÀG÷Ç¥G.†š¦"k%ˆ4d¹éórÊtiNRQÒ~Ú¬T#	Â¤0ø†œ¿ÄÖ>4øGiª¶• |BñŸ‹ŸVÒµı'ÄúMÔŞ+Ö¼¥xóÍñN»áÏxâê×ÅVŞ0Òd×ô¶¹×-<Ká+w¥ëoâ˜ÖkÍw³ÛxŞãYøßñ‹À÷^&Ö>k>ğ~®›ß
é^ÓüSã¯êœ‡^ñ­ÿ ˆ4&—Ç~óÂ¾³ğ>­¬Y\øâmBi>Ó&³ª=´{¨øğÜ¾ÿ …½ãÏ‡ß>x@_øËL½Ôš=vïQÕ¼B¾#¸ñ/Œ¬´Ë˜¾Áà=]ôİ(|6³¼Ğ$’Â)µ*Ë6Á—öÏş•ÿ _ñwü3Ä¶ş:‹½Kö|øs¬ø›áï‹¾(Igâx“â†5-Qü7Ò"::'|G®ê^&6ş"ñ•‡ŠµßøgM[¯i:©ñ\{ÍkÀ¡F9’p„+(T£ÒÃUSn´°•èâfñ1–éÓ¤ş·†•YJ…Lläİ\d©ÙZOg)*TSŒÜ]X[Üö”çM{&±R”ÿ uUBÕ#F)rÑ•ã÷Gü¡ÿ —ğÏÇßÚ_ü§â„üc¦üøãkQı“¼âëë‰¼%ã?Œz­™'¾(h	Ô`†?éŸ<o¹£Caik*ê_tùõ!ayğÙ´–şö«“ğ|ğÃÁ~øuğÿ ÃÚg„¼àKğ¿„ü3£[‹m/CĞt[8¬4Í6ÊY„6Ö°ÇùI¥`ÓO,³I$ÖWéØ<2Áá¨á£9ÍR‚‹œäç9Ië)JOVå&äÛêİ’VKåëTöµgQ¥g{E$’Ù$–‰$’ItZİİ²Š(®“3Ìş1üøWûAü3ñ‡ÁÏ~ğßÄ¿†>Ñ®ôø3Åz|Z–¬i—‘´rG$O¶[k¨K	ìu)mµ-6ò8o´ë»[È!?ó½ÿ ‚¶Á°¿´ÇìÑ«'Å_Ø&şÓ¿³jø•|Kâ?†Úş§w¯üpø=Úõ%X´Í9ll¾#|=Ğl/­¿
YŸÚ¶•¦I­ø[Q²Ñ¯¼M{ş‘ÔW&+‡ÅÇ÷´àêE?gQÆò„¹g»§(ÅÍÉA¾^{JÊI5Ó‡ÅVÃ?İÎJ§8'hÉ)FOFšŒ¤ ¢ä•ùox¶ŸøLé:ºIÑc³ƒCÒn®mõi¼N–wº¦­I­ë#Zµ×mÑÄ:&©4WŸÙÚ­úE£Äº-BûRÓ,íã¿´ë¼Y«xkNÓ¼!¥F5¿AğújRÃ'övwq¦É¨Ei¬ŞÅ.€gîÕôûûõÕ'µ±WÖ® mgOÑNÿ \_Ûßş{ÿ ìÿ ‚‰jIã??ÿ áøÉm9º³øëğgSo†ßä¹gW–O_iVòè:78à–oøÄZ…½¢y]ş›‘ şAÿ k¯ø3¿ö¼ğ]–·sû+|^ø3ûMx^-fWÃ¾ñ½—ü3·Ä«+EMM—Dk­>?|=ñ<6Ò\Å÷÷~*ğúŒw7·Ÿp,¾Ãó8ì†½L]D}ú4ªÎnHÓ£Z¢¬ëÆ2¯íªJ.­Uy:Êzp¤¤İCİÂæôc†©EûµjB1RÄ9Õ¥MQr/gÏJ¬iÊ”U':¼Ü³œÚJò“áø Íàÿ ‡Ş‚8®/<0ÍâÍbÊ\Ò,¯uG¥è³}Xdğö—Ÿw§GâıK[µ¹:†»¨êú¥Î•pÿ Úw#YĞ³ÔaÕ<2"Ô£ø}ã¿Új–¾"ñE–›gá¯_xŸJğÎ™}¥Yh~™iy§Y¤ºn’mãkı?K–şÊ¾—O›PY¥³Ÿí/‰ğHø*ìåâİu¾%~À¿´Ğ¼:·÷zÇˆ¾ü;Ô¾.è>'¶ŠĞxfDµñÂSÄŞĞ­×HÕµ{Í
ÖËV‚;kl´ˆc¹š–çæO|&ø¨u_[k_üiğËYø{¬YêöÏ®xWÄşKÏé×z›6ŸhÚÖ§ß.¦öP/ˆ'Ó&–Ò8¬î'š-+OFÔ­´¿ŸÄåÓÃâ ©à}9Ò§^¾.š®±?í‰ÒÅÔçxª¸ZÕ*á¡TÚ<4äá[
¨Óõhbã^„œ±^Öpœ©Ó¡*ÒtqF2¡_a
ôá
Óu&›­9VŒT©×ugÎÚø‚+ŞkÅğßÁŸüOwiãŸÍâÍ3ÃxoUÔ“ÁĞx]µ·Ö¯5Ù-âñ5Ö¬êZÌšDRZYZâÆ1¦ÚÃĞÉñÆš.«yğ»Æö¶¯¦j^ñµáİZK?ø{Â«ñLøqâO›û†ğØ“Ã(±Õ<}'‡|csã:&·sj–ú^™>£ms¹ğûáÆcâÏj¾ø?ãŸŒŞ%ø‰=”útz'ƒü]âO²øz}kÃúM—¨-Ÿ†®5›Y/"×&iãí§M/Ã·òé×Ì†ßëÏ†¿ğGø*¿í¬øDü+ı€¿h»/
_Ãá¥Ğ/ş%øgşWü!Úwƒd×4­[·×¾4x“Áº.«pWYÕuHlµyK^Û[éé5«ÛŞDÒ¬>[<UZ”T¥*r–:<µib
ÂVœ£ŠÂ¬¾Të(ªÑKÖ.jTêbg
Ù×ÅFŒ!?­8TŒ”jÑOrtZŠRÄB1•
Ï§M·JMáoArÎc:|(ñ/ƒ-ü5®é·©â_?‚m~É<:eº^õißÃÚ}Õt-Rö/†õk[ƒ¥êzm½“ê„tT–{ñ¦iÈkø·ªj:Ÿ†¬ì4ßx+ÄzXğ.ƒgá]+mÅºÇ†¼/¨è<#“w¿<]â#ZµÑ-4kK	üTPŒY[jú¥®’«aıxşÈ_ğg—í	­Y›¯ÚËã§Â?€š.«¯[êúÿ „>
è§ãŸ5}:KÛ=Wâ¡ü=ğL.ŞãL¸´Óş,ÜipÏ©Z5åÅ¦±>Ÿcıx~ÃğH_Øş	åuyâOÙÓàn•mñGU³[oão¯.~ |^Ô¬„6öçM³ñwˆçÂÛÙÙ[Éá XøKÂÏŠ¶ŠM¤ŸGƒÈñÆb12´)b%	râá
ÕaÉ*ç£N”ãO	[ÚÂ­z©98IAV¤å
r^.#1¤èR¢¯9ÒM^Œ¥N›R•_vr”\ëÓön:š\ÊîœÒ”ÓşLà’Ÿğl—Æ¿‰%×ş5ÁEWÄŸ>êŞ(Ò|GàÏÙÛÃ~/ñ‡>6üKO'öu¹ñ›ZĞµKcà]ÆÚZ.«ã])ñ/Å:ıııö§ÃkË;1wıèxÀøWà¿ü9øgàÿ xÀÑìü?á/ø;EÓü;áhš|B-+DÑ4›{];M±¶ŒmŠÚÖŞ(Ô–m¥™‰ë¨¯¦Ãa(acËJ	IÆœg?µ?eJ¢äİíîSŠÑ½ånfÛñêÖ©YŞrºNN1éiJm/œ÷v²½’
(¢ºLÿÙ
            [firm_left_thumb_ftype] => image/png
            [firm_right_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ   €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? şıI¬z 	8äàÉ9$c§'Œœâ´ÅƒŸ3'gú‘ş¯¹ÎxïÔö‘øùê¬>¿)< z~c'+€sK€G\t=?©ç¯§L”¹„ùkÇOÜMéí?ñGÚ¢Ï`òÂlŸS÷?¦yÀÇZ˜ñ×¨'/l}G9äp~‡çÔç*:ñ×'òH€!QùéÛşXÍÇ±€äç Á İEŸùh}ü‰¸÷ìt?§½MîCã‘ÓØôïÏ4c9äqĞ =‡>ç¾2xõ …Ì ËCô‚aŸõ~¿Lv®GÄŸşø>ïI±ño|-á[İ~àYèv~#×tÍ
ïZ¼$i¤Ûê—V“jWE™GÙì–iPäWÉğP_ÛÛáüçàF«ñoâ=Ôz¯ˆµu£ü0øugsZÿ Ä?ı™¥¶Òìc;ŞÓH±İç‰5éa6Z&œÛßÌ¾ºÓlo?ÍGö£ı¨ş2şØ<Kñ¿ã—Š®¼Kâİvşiôë3,ë x/F¼šo…|¥É,è^Ñá1Áion~Óu"I©j·ÚµÕåõÇí^x/šøNc_, ÃóÑ§˜Ë
ñUqØØèèàğò­‡JTûÖ!ÕP„ÜhÓU*û_cåæ<8ÃÚÖ–®Üªï&”¬ßÙ®Ö­¥kÿ ¬ˆº…€9v6Ã1R ‚†s×½)~Ñı4ÏıpŸ öØ{ã×°úğC¯ø-“«xKö0ı±|e,ÆY­<;ğ+ãgŠoŞi]çu·ÒşüCÖ¯egy–^ñV£12·ğæ±t²G¥İOı‰«+(e`TŒ‚  ƒÎzœğ2 ã¦ÃqÇg|VÉsš;sUÀã©F_TÌ°|ÍC†œ—¤kQ“ö˜z¼Ôª-#)uáqT±t£V›ì§ñBVÖ2_“ÚKTGö˜yGÒıÜüsÇhûT_ôÓØy`uÇü³ê=±Øg56 èsœŒõê3Ü1ÆGy0ä9ÀêI9>ş½}|qÒCö˜A'sş¢lóéò}1ÓŞ´ÅŸùkßŸ&aÛâ.¾ıqëÒ¥ëÛ<ç<dûuÉã¥ÇœóÆNÈèIÇ|Ğ&æ xósÜù=9ÿ ×Üõ5*u Iê6’AÚrƒòKòú_»?œğN0Ä?.?ÚtøØó“ÓÓ ÈÉé@º¥äÿ ˜²cn‡äbzú ë×Ÿ`38 p1œxö<síœôäÆÿ qù9sùt<ú“ôç¯gvêzgüc¿L~]{Ï^Wœ89O_©üûRç8<vìIØ`_qÏ˜ëó7_éÇ~¼cñƒÑ±n¼ãú’AöëÛß4 ìãŒ¨ç7qƒÛO@?:ù¯ö³ı«~şÆ?ü]ñããF»•áÚ´vm»Dúï‹üIr’ÿ bøCÂö2ÉÔµínâ3¬–h’ãQ¿š×M²»ºƒĞ>5|hømû<ü-ñŸÆO‹(²ğÃïhÓë^!ÖïÜŠŠÇºŸ>ÿ UÔîäƒMÒ4»T’óSÔ®­¬­"’yãCşl¿ğTø)'Äø(ÏÇ)ü]©CÃ|=ö™ğgáŒ·[áĞti$òçñ6¿mo|qâhãŠ}fñ‘i¶‚ÓÃöMg§µİÿ ë¾x[ñ8æ®ªá8k-«NY¾aË*¯IÇ-ÁI®Yc1³œí(àèKÛÔRœ°ôkùÙ>*ZZUæ­JiÓÚM]{‰ì·›\«í5ãŸ·_íÅñƒöùøí®|hø¯zÖ–jn4Ÿ‡¾±¸šoü8ğjÜ´¶^Ò@¢âòl%ßˆuÇŠ;­wU2\È¶ö‘iö_“èqÏ<g=ºã¯çúRmêwu?N€ÿ /N¿¬Ÿø#¿ü§Â¾x«ö€ı²tbÛFøÃà»ıàGƒ¡çH×4Y…ÛãmÃ-áÖ')ß¬/#¸°—J’]kR³»‡TÓb‡ûËˆ¸“…<,áŒ5|\!—å8/«åÙn[€¥Wªİ”h`èJpö³§MTÄb*N¢|”êÕ©RU&¹şJ…F?%ÏR|Ó©9¶’Ñk9YÚú$’ê’VLşMÁäÜƒ‘Ç#üc\ã¯ı–ÿ Á?à¶Mâá_ØËöÀñb6^øñ›Ä{¾¸K]7á·õ+©0Úú¯ƒüKq"¶¸…4=YÎ³Ş³üÜÁ@¿`ŒğOÚ¯Â?‰–òj¾ÔçXø]ñ&ÎÎXtˆŞì·Ô­·­½§ÇÅ’W¹Ñµ |·¼Ònô­SPødeX2±B¬*J•pr¬¤©¥H à‚æâ~á_xN*•ibğ8êÆä™ÖFuğUçSÅa¥%µ^Ë„«ÉígB¼iÖ§Rt1Œ¿{8Î/–­)^ÒI«Æ_}ã4¾%£×ı‡à´ƒĞŒàæ=¸ç<w\ç9*qõÇ'¿Qnf¿“ø!ßü½~#Gá_ØÓö»ñYOˆpCk¡|øÅâÅ	ãØ UƒOğ5+†|m*xoÄrñtqÿ fê3¯‰–ÒOÿ X£$d$úr3“ı1ÛgßşrñŸg|b2<î‡%Zw©…ÅÓRxLÇ	)5K„©$¹©ÎÍNÕ(US£Z1©	#íp¸ªXºQ«Iİ=%ñS“pšèÕ×“Vi´Ó¤öë¹9Ÿ_§Ó4‡Œr¹õîr=G#¯^ıxéHGL’—aÆHã§=#ĞÒóıæêOa×½:Ÿs_&tÏ'§OsÈ8ØHÇ¯lÔqœ!ä™Èäçıcv¾Ÿˆ<Òàú¶zã¿~£?ç#Ö˜:œ’ı?ßn:¯¾zz‚ê½çî I8ä#ú>^9=ûñÿ ×§ 0;’ONŸAÆGø‘šl€ùrö[¹éƒïqùc½/aÀ#Cœ·#Û§AŠ.Õã?ÓÛÓ¦}=Nkœñ‡‹ü+ğÿ Âş ñ¿µİ+Âşğ®‘¯xÄZİä:~‘£húe»İ_j…åË$öÖĞDòHîÃ m
Ì@;×7ZA=ÕÔÑ[Û[E$÷Ê"†bC$ÒÍ,Œ±Åq«I$®ÊˆŠY°‘üÁp¿à°—µ×Š5ÙövñÖÿ ³/ƒ5†_x£LX›ã‡Št»ŒEr³FU¤øq¡]Feğı¦^#ÔxŠñeµƒBH?AğãÃÜ×Ä\úWRÃà0ü•óŒÒPr£—ášÓhÔÅâ9eO‡ºuf¥9rĞ£^­><n2
‹©=dî©Ã¬åúEo)tZnÒ:ÿ Áb¿à¬'ÿ ‚‚|P“À¿ïµ_şÊ¿u›øA|; ŸO¹ø‡¬Ú4¶§âW‹ìÛd¾mÔm/ü"zò‡ğî‘?sm»¨ˆ?89Àì ÷ãéÜ:2@éŒËò>Ÿ+ëßØöpğwíAû@xWáïÄßŒ>øğ¦ÚhµÏ‰ü}ã/x>-;Â–W‹í3Â¯â{û+m[ÆØq¦èVpÅy”ó>³©[¾›§\Ç/úA–å™pÌpx
QÉrLêÉS§:øŠ¾Î<õ«Ô(:ØÌv*iÊ\•\Ey¨S†°‚ø©Î¶2¿4ß5Z²KV’WÑ-]£­7²JíîÏÔø!·ü~çöÓø™Çÿ Ş™eÏ…zäE4İBŠßã7´ç[˜¼#j¬®ü ¸ŠïÆ÷hËä’Yxb¸k­oû7ö“öıÿ ‚Ú|JøñëÅ fü>‡EøC©§„¼Qâ_èú–¨º—ˆ4˜¡‡TĞ|?£iz¶ƒk¤hºÙÑšwk‰înm.Ñl­#§ıoøCûTÿ Á4¾|3ğoÂ…µì­á xC²ğ÷†´;ãgÃ…†ÎÂÍ6ïšVñ!šòúîS%æ¡tòİêóÜ^İÍ-Äò9üı°?à?
?mÚÆ¿bÚóö]ñŞ¹ñ6Kïxçá|¿ô}O]Ğu…²ø«ÅzCx8x¦êóÃ×—SE©ê){afÚf¥,iyqİ¬6ÿ åïÒOŠ<Sãê²Îr<£>ÀåØS¥ƒÁSÁb)ÖÀdö“öÎU)û?¬â«F\Æµ9:ŸÂ£	<%£ıçô£ônÀø›˜SúEÏ'E>Å¾—¼Døj\Hñ˜$ãšÇ	uÍ¯ëë-Xåıœ«óÊ¢úóÀ³ôWáÆ£ğGşÉûx·Â<gàïˆ>×n´[@Ss{ğÛâ4z<:‡‡~!ü?¿¿ßxšV¥e{ê:£tñjÛëÕd¾³÷óŸ¶?ìyñ“öøáâ?¿tSg«il÷Şñ-”SxûÂSÏ,ZW‹¼-{"s§ßŒw6®Eö¨Ås¥êPÃylÊºÿ ø&ö¯ûşÁ5‡z‡íÍû1x·â‹¼K7‹>#kÖß~Xi‡[[+]&ÏCÑlî¼GöÈ´ÂÉ I/ñy}¨O¨ßË”wQiÖkÿ µÿ ‚\ÿ ÁD~Şü8ñÇíƒû/xÇŞKí[á/ÅoŒŸ'Ö|	ây EÄƒş4—Rğ®´Ğ[Zø§Ãí<Qj6‘Aqm-¦­§éº…§ê_G~<ãŞÁåyOdùŞ#(ÌaMæÔã–c*ÕÊqµ,s<)QpnT½—ö¦‚q­%*ØxºĞŒ+~ô‚Áø]ñ_ªø9>_¡Ÿâ¿ÕVX…™j…?i?×ÚÇ,»ë¿ZyCÇ¶G-ú¤qV¬ê[üêáš[i¡¸·–[{›y#Şâ	àšYaš	bd’9¡‘H¤‰„‘ÈªèÊÀı¾ÿ Á¿àµ|i´ğ·ìû[ø©!øÉeÂŠúıÊÅÅ{(ËÓüâ½FfH—â=¤
–šN§tcoC6÷Ïââï®ÿ ß<¨ü-ñ÷ŠşjºÏ„¼G{áMfïIøÄúWŒ¼®Ånù¶Ö|7â}âëMÕô}JÙ¢¼³¹ŠT™c˜A{mg}Í¤m­åÕÕ­õÄöWÖsÁygyi<¶·vwvÒ¬Ö×6·02Ooso<qËÄO±L‰$L®ªGö×p.CâOgãùTİ?­dÙ½ÆxŒz´Ô©â(Éòû\5hò,NR<M+kN´(Ö¥ø>[[vj)Êê3Šjñi-$µå•›‹¿G$ÿ Ø`ëëê3ƒ§éàÅ.Õôÿ <g ëGrIú×óÿ @ÿ ‚ÒCûGYx{öIı©üA¿Çİ2Î=7á‡ÄmJT·‡ã6—anLZ·3•?‰šuµ»2Ê¾ZxÊÆ3u+­Úß-ÿ ôïéĞúsßƒÏ'>£8ú×ù·Åü#pNw‰È³Ì?±ÄĞ|ôkBòÃc°³rTq˜:­/kBª‹è§J¤jP­
u©T§·Ãbib©F­'x½zJ2²n2]¿ÏutÓhBƒÓğç§×ÀàwS# ¯Nw?Ğüí×Ùã=>’qÇâpIÎzqÏçƒµc)ï—êHÏï·qÏô¯˜6ê½ç\~íÉäìqĞq…>9Ïò<ÒŒø tààß>ãA÷4ÙîÜî'äaØäà}½:‘œñÍ<t¸üO°9ôÏ\cP3òcş‹ñÆ?à˜ß´¾·àk‹»-WZÑü-à]CP±wêËÂş=ñŸ‡ü%â©c–"$ƒí>Õ¯ôçZ4¼gVBóFïó:Œñß¿Nz†«×ÇØ¾|zµñÏìKñŠşÕ/~3ü,Öe‹ÂšŒŸÙwş-ğ…ÓO¥êºç€u…6Ú¦¹àQ,õB2KgÂwrø{YÔlm¬5]îóø;ı¦?à_ğP‚u|2øG©şĞßä¹ºŸÂ?¼©x^¨é>iû4^#ğö³¯éº¯‡uø x–şÍ ¹ÒåŸÍm'TÔ I/ìŸ£wğŞE’æÙyŒÁäY+0şÚÂâsZÔ²ú¦][	‡ÂÂ8|^*T¨Ô–¶»ö^Ñ9*ò•7G³ùœï^µZuiBU¡ªR4æéÔRrÖ1¼—2’ÖÖV´šº¿âVzóèNpxè	'>qB’¥ˆb8ç{÷ãœuã?…~˜ø#wü ÃüUÿ À¿~ó7~ın(ÿ ‡7ÁP?èÌ~*õÏü}x×?ô7õóƒëŸéŸõ×ƒè®áüH2Ÿşl<?ªb¿è½¿ëÍ[ôéÉæ–û}Çæ÷äïnŸŞp=úşŸ†+ıàß¿ø'£şÊ³XøûñF6ŸiM#I×^Şúßf¥à¯„ï³Rğo…ÊÌ«qg}â’øÙ–)#¸ŸFÒï"5øAÿ Çÿ ‚şÓŞ0ı«ü¬şØß|IğÇà?Ã©Ç"ƒÆ>ˆ:¦ylú€-ìôoT¸ÓVÔ]/u÷š´>Ó5	%[JÕ_ûå(Ò(•#Š4Xã5TDUÂ""à*( Â€£ü»ôŠñ?ŒÁáx+†ó,&;‹TñÙö7.ÄÑÅaåJRÁe‘ÄaêT¥'*´Ö/ÊñTğpm©Õ‚÷²\¾Pœ±U©ÊáFƒŒµKš§,’kOv.İgÙÁü+ÿ ØÙÇã~×ô6¶ø'ñÓ]˜øïLÓmÊXü=øÁ}æİ_ÉåÄ<«MâIõËlGoâu×¬3WzE»6[Û»¶Ç-ß¿ãù¾Õş·?´/À‡_´ßÁŸˆ~+hñk~ø‘á»ïkåP]Ù=ÂoÓõÍ"áÃ›{@Ô¢´Ö´-F5ó¬5kK¨è«üï~0Á¿à£ß¾(xëÁ>ıœ<kñSÂ~ñ¡§xgâ/…®¼$ºŒ´åó4zÊÿ Z^Ú5íŒ=İ…Õ´Sé÷ÂæÉÃıœHÿ _àg‹™niÃ« â¬ß—æÙ:TpØÜÓ‡ÁÃ3ÊÒTğÒöøª´áS‚å¼yJ”VİIË(sf¹d¡_ÛaéJtë6åtå7N¦—ºŠo–m¹'²|ËD•ÿ !F2y$q“œŒ O9çÓ§`üÏcÏ>ù=É€¿LáÍßğTÿ ±—ÅSÎãëÀÿ ü×vãß#¯j_øswüşŒÇâ¯\ÿ Çßøü¼]ş}òk÷?õ×ƒè®áüH2Ÿşl<¯ªâ´ÿ e¯ÿ ‚jõ·÷?½ıkoÏ/xƒÄñ…¼UàËËÍ?ÅŞñ‰¯xZûNyşÓÄZN¥m¨h·6M-Ü:•½´lùŒ@É<¯N‹5íÎ¥\jp­¶¡q¦YO¨[¡ÊÁ{-´Ow$“ˆ§gA×€2z
ş/?à”?ğ@zÆüı·¼+§|;ğWÃ]oNñ_…ş]kZˆüSãißh3ø¥<9¨ë.‡áM*ş}FïMºÔæÖu™í£Ó®ôÛ5îd¹şÈ4Oˆ^ñ'‹|[à­U‹U×|ºD~0ÉLÖŞÔ5ÛWÔ4½P¼SöhõÙôµ‹V›HYúÇJ¾Òõèmmµ)ï?¾‘üaqVm‘à8{‡Í¿Õì.cW3Í0'˜ÖËéÑÂÃKš•háå‡N¥HNt#[N„'íı´Ód˜j¸zUeZ2§í¥NœıÙ{ŠmË•ê®¤ì¬¡{Y#´ äóß„ç¾9àüc@ÇŒesÎn®Ã½O‘Š“ ÿ ‘Ç¯9ëƒø`ÔqıÌäšAĞ®zw÷=zşf=¾«ÑşqCû·+g¡çlö8É<Ò‚vôw8Æ:w=zñÇ^[ >\œÿ g®ÉëÆ>˜äÒòq„ç·¸ÎqÇĞd@ÏÍOø*wìyâÚ×öl»ŸáF§©øWö™ø¨?Å¿ÙÇÇÔ%Ñ|I¥xûA¶ygğå†µm$76¾7Óá“B¼äµME´Bée‹O17ãOüûş@ğü!wŸ?à¢K«xâg‚a]>Š~ğN»ªéş=k)…Õ·ŠüáÍ>÷Sğ§-$RÚ›ÙéÉáÍMãºxm¼=si—Ö=ñŒg¿¡rzŒó§©¿’_ø)Wü¿ñcöıª|kñÛöVñŸÁøGâ‚EâxOâ«ã
};âEÜ×Å–…¼â«9tºÛk·	<ÖsÁ®Şë…íæ€§íf|œå¸Î
ñ&ªÁe”¥,Ï‡søTöÜŸ)ÃûC/£Šö•.cñÃ×£W±ñ=ŸÖkÒ«/OJ¤qXÍQû•è½aV)Zq¼}ê{sFJ\­/…4ÿ Jâ!ø%näºø«öE¾-ç¿ıJùÏÓë…ÿ ˆ†?à•Ãş§Šº?áK|[ÿ æ@~XíÛ·ó·ÿ ºşßôV¿e.:ÿ Åeñ\ôëœüéê(ÿ ˆ]oú+_²—¿á2ø¯ÛõG»qíÍ~‰ş }ÿ èáæøuÁyÕ?äşÿ #ëyßıÓÿ À%ÿ Ëèÿ ÁÂÿ ğJî1ñÓÅ_øe¾-úuñGğyéúõÉÿ Á+èºx«ä‹|[ã®OüŠ‡ç’kùÛÿ ˆ]oú+_²—ò9|WïÏıßÇÿ Ô0Ä.¿·Çı¿ÙO¸ÿ ‘Ïâ¿×şˆ÷aëÚõèßÿ G3ÿ Ã®Ëş©ÿ '÷ùÖó¿ú§ÿ €Kÿ —ÑüD1ÿ ®ïñ×ÅGşè·Å±ÇşÃ#·|Ñÿ Á+³ÿ %×Å8õE¾-çNOüR¾™šşw?â_ÛãşŠ×ì¥éÿ #—Å¯ıŞ¸ï×èÿ ˆ]oú+_²—§ü_¾¿ôGzãŸZ?Ô£ı<Ïÿ ¸//ú§üŸßä[Îÿ èŸş/ş\Dgşÿ ‚Vÿ ÑuñQàğ~|[ëÏıJŸ^†”ÿ ÁÃğJŞß<T:óÿ 
[âÙçœÿ Ì 1ú÷ü¿ø…×öøíñköRçŸù¾+şòGyàwÈã¥ñ¯íñÿ EköRì@ÿ „Ëâ·n˜ğ§zqŸÿ UêÑ¿şgÿ ‡\—ıSşOïò­çôOÿ  —ÿ .?`¿kø8Wàv·ğòÇáÏüÊ}ãWíAñ__Ó¾|<µÕşx·ÃÚ'„µo\C¥Øø†ê×ÅZN’¾$ÔÖòòoèV¾m¤ú›¥Ö¶ñév“[ŞşÓşÅŸ³›şËŸ³ßƒ~ë:ıï>#]­ß~3|DÕ®d¾Ö>"ücñ„¿Û?|_©jé7_o×&šÏJå¬t+MM°ÙF«øÿ  ÿ ‚üQı¿jOÚ#öñwÁÿ  h’|)Ğ~ê~+ÖÅ·õpÚt'×ÅğœVßØ$—É¢Giı òêš¢ß?Ø¤Òmšãúç±ëƒÜu†î@ëß¹é_”x“_‚2˜á8SÃÌMLÇ)„£šgåz±¯‰ÍsÂTğx7^8l,~§•açUÓ§F:RÄãkÊ¢©VŒjø(âª9b1±P©ü:T’´iÁYÊIsIóT•®ÛnĞVÑÙ&Hè02;õçÉÏsM;{`4‡§ûl:ş|ãéiøÇCÛÔ÷õÆ:}Iæ£LíãûÏ½äpGÉÇ'İ3_“‡Uèÿ 8ŠüFø×İ9ëÏ ®:RŒÌHÇ§RâÇ^İF(sû·äòÿ  œòz~>‡ø³€7Êq1ÈÏ^‡‘Ğç9éÎG94^öìx#í×Ó®G4§¦0ß§¿=úô$ğFM `rqœß$‘Ü}:sHaTÉ ‘×·ã©è?  â}›¨Ó<çÿ ¯Œc"ŒöÁ=x!yÇáÛŒcõÆ) ƒŒzí “ÀÎ@Ï\ô'ŒqŒô¥8zó»sø3œë€Ã?ø.í}ñ¯öCø_û(ë¾:Oû;Z|Uı¬|ğ¯â‡Äûo†šÅ›Ïü5Ö¼-âıC]Õm<­ø{ÄrëZCé–º´6:=ˆÕïŞÅlmd"åâ“à¿Ù[ş
iûJxËÄ_ğQxSöËĞ¿lO†ß?`Ÿ|}øñç_ıŸt/ÙÇâ7‚¾8éf²úG†-~êúF…}ã
ÛZZwRñ%×ƒ¯|=g¨A¥éZŠÉ©ïØ?ø)Çì-ñ?ößğ×ìâŸş0xOàÏÄÙÇöŒğ—íáÏxÏÀWŸô+ıcÁº7ˆ,´­6óÃ¶¾#ğÉš¨êÖ×—kç†{{Y­L@Î%ãÈà”?¼QñãŸí-ûe~Øÿ ¼wñGÅ_±§ÅßÙÀ¿şi_~x@ø¹ag¨ø³ÆvÉãMkSñ¥Æy~ZÊÊûYÓ`…&¬âXìM©ı_Ó-8Û]ïÛÍy=-uºô}~	øÍÿ &ı¶ôÏ‚ğM_|Hı ş#şÌ³ÇÇ_ÙCø¡ñËöÒøUû+xö¿¹ı õ	¶§ƒ|Yák_jº/Ã¯
#ì:ñ¾Ò</º”š•Å­’]>í´ïİ¯ø%oÇo‰¿´?ì‹áÏˆ_~;|ı¥|Aÿ 	g‹´7ã?À4¿Ó¼?ãOé7°Pñ„õÃsøâJÚNañwƒãÒ-môÙRÎæûb|/¡ÿ Á8?i¿…>ı’ôïÙöÿ ğW†>&|ı’ü7û>ü@økñ3Áz‡ÅOÙçãƒtI­¯l>(éÿ  ø‰¦]øWÄBëQ´şKëñ¨é§BÓîoVßí+ªıİÿ Òıƒ[öø1ãŸë_#ø©ñâÿ ÆOüwø§âı7ÂzÃÿ 	Mã¯¦•¡§øÀZEÅŞá?
éÖš=œ6lW72ÌÅà·{k Zr­“];úéÿ ·5äÑlı1ÆOocƒÉü0ƒwÏy#óüG#­'íNxëúã·qÎWŸ×ÔŒg=‡å2rA æ‚Cê¿§sß§íĞq‰Á†Ç~œ`öü¹úéYŸˆ4-}6×WÖ´­*çY¼OÑàÔu[)µKù^4ŠËOŠæhöîY%ŞØI;´¨‹.lsê=Ï¿'¯'Œ“@	ÓŒ7SÆzúäz÷É=©‘ò¼÷ß$wù›}>Ç¡ëÄ7·¶ze¤×Úå­…¬f[›ËÉÒÚÚŞ5Îéf¸™’(Ğó4ª2#©‡JÔ´ıcM´Õt‹û=SKÔ [ËGO¹ŠòÆúÒàmî¬ï-¤’ŞâÚxÙdŠhdx¤FWG! ]W£üÑ%üòÂöÑn.,ŞæÒêİ/,Ş»´3Bñ­Í«MÄ+qa$&X'ˆHŠÏª
7àïş8üKø'ÿ »øÏãÈ>"øËÄ^7µı¹>:ü¼k¬ÂEãøcÆ_ğRwölO]jwp¥ŸöÃ¯‡ºâjš!û:?‡´èÆ™•nÖ«ûÍwÖâ$±	¡š3$ysGæÆë¾)Tªr>>WPÀ`f¾PğoìEû<ø7àÄÿ ÙÑ<9âüøÃ«|A×¼}àßˆ~5ñ_ ÕuŠšŞ©âˆ7öº‰u[ıcH›Ä+Öõo\6•h,<E}.­¤>íbxÂ¿ÍWéıv?#?kßxÏş	Ëñcâ„_³¯‹ü{mğ÷âÏì}ã/YxÏÆ¾*ø¥ü'ø³¤şĞşX|}Ó%ñş­â)ôSVğ¯Æ]{Vñ5ƒ\Çáßj´íJïM[êsOèŸ>|XøEûQèß¿d_øúMö™ı•¾(xïâ?ƒ|uñÇúŞ™yã/€Ÿÿ g|Q¦ø×Äz§Š5¿‡~%øÉğûâ_Ä/†^$ñ„m­®¯ï4=¢Şhà~™x?ö&øá‡_>ë:'Š~,xâŸƒ?á[|A¿øéãïüdñW‰şEk©ÙXü>¾ñgõo^‡ÁšDÖ±.— YŞÚØÚjZ¶­®¬M¯jš†§sĞüı•~ü²Ô¢ğ}çÄoëš¦…eáWñ¿Å?‰ş:ø±ãÛéåô_é1ø­kúŞ“á[Ë›»-"ÂêY5_TÔûSw¼`ÛOø:/òùöGå¿ì¡ñËOø]ñ’×Á_<mãNÇÀ¾&ñ?Àÿ †šn—ªx“Ç¾	ğ%×Æ¿ÚÅĞø~ÛâŒn®UµH|5â-;Ã²Ã_êš”ƒÄ¿¼~!šÏA×!Ô§ö_ø)İïŠ´o‹?ğMMSÀ¶zæ±¯êŸ¶…·†o<%¦|CÖ~i^:ĞàÇÅ?…¼Qwc;i†‰ÿ 	„|=¯}^ÒõK6¼Ñ-@y„¿ªüı„¾ükışkr&ñzãÃ:O‡şøPñ7._â­§Â]sVø¤k!ÑÚâëHø£âo†Ş*Õ5ß‰âÿ këñµã=Nò‹èõô¿ÆÙ«áwÇ¯üñoÄñTºçÀ/ÅñGáŒŞñŸˆü+ãˆ´Ëİ=fşÏB¿³¶×öèš¯£ÿ gë±_é§k:œfæéA_×â~Føwâ·Ä?şŞğQß|F½Ñ?gÉş~Á_ > èV¿¾+ëŸ¾ü>ñˆ¼UûBiÚÇÄíWKÓ—¢Ù®­€¼ˆìôMÓYÔì¼-igè¸ÔK?%ñ?öøŸñ«ö|ÿ ‚²|ø¿sÄ/xş	ÿ mñ›áÿ ‰üSğJïà¿ˆ/¡øŸğçã|W0j?õßøít›-cáÆŸâ?j½¦‡âM=/^ÓT³¸»Ó­µYÿ Sş%~À¿³WÅïütñßÄOx£Äš¿í!ğ‹FøñrÊãâŒ ğ÷ˆ~øjëQÔ</£Ùx~ËX·Òü=}áWYÖµÄ¶¯ØjºÎ¥zš‹K?ÉÅXÁ3¿eË1ñV{ÄøÃ¯ë_>
Ãğã/‰|Oñóâö¿âo‰ß`¹ÔŞ×ÅúÆ£âù®5MvÏMÖ5?é~&"=oBğµíÏ‡ô½/MšXd
M.»t·ç­şGÌ?³–•¥ÚÁCşjVºu…¶£©ÁşFşKxo/–Ïã… ³—1Æ&¹°~æÜLòbıÜaWŠÂÿ ‚¥øÿ Æß~>~Ë?´O‚|Kâ½+Aı™tÍ{âÇÇ¿hZö³i øÓàOˆ>*|øIã8¼[áûK±¥kø+Ã>>ñŸÄ]BÆâm2ÿ ÃwÛMç#´Ñ~(şÄŸüe®şĞ¶Zoí‹?e¿|<ÿ ‚cë7º¥Çõ˜´É<WğãQğ7…µ?jZäº^¹áÛíwâ—Ãë˜¾&jÖ’]=åıÅÆ²öVÏ%}éñ/öOø5ñƒÅ¾4ñ‡Ä?k×>
ëß³ÿ ‹|?/Œ¼Gƒu_…Ş&{éõü!úhPê777óÜÿ ÂE”zôrˆjhbŒTí¥’Õy%åêµì~Xü!øÓâëïø)Ïíñ#Åî-şxçö,ø‘ão‚šg‹|UªZü-ğo‡g?Çágˆ¼om§›ƒ¢YZxÕç¶ñ¾»âˆôù¯¤ğÕŞ˜çì°_µım_Ş3øÕâO…š§¼;ñ3Ã~"ı†gı¦¾|Pºøâ/„š,¾1Òü_ÿ |º‡…ü3«øÒOøËáˆÅşŸ®xzïWÿ „oYº¶´™ìõ»ëVÖêËìíGş	Ûû*jšïõ»¿kşWÃ¿Ùç]ı”ü3á¨|{ãKCğÄúE‹âO‡ºŸ„àÖ£Ñ5»vÛKÑîµ-SW³¼×¥Ô´m'RSîÊ)+áÏüSöbøYâ-Æ>ÿ …Åqã/|ñ'À7Å"øõñoÄú÷ü*Gk·¯o5¯Ş&¡¡ø9,â Ú^Á<>¿’ë[Ñãƒ^»¹Õ$OŸ¢üÿ à™ùñ;ã—íãïÙ_ş	}ûlşĞ:_…>-ø§ÆŸµìÛñgá×Â€	ï4ÿ øvgàWÆ=C_ğv…«x‡ÆúõÇ‹uê1éW0ˆáğ†ŒÇ§]¶±ˆÖëöı¸~:k~
ıŒ|'ğïÆZ'Åïˆß¶„¾,ücÓ~#ü)øW¤I¥øáßÃMÂ÷³øGÃşø—ñCáúkŞ,²ñ|9¡kÚ§ŠõıR†ßGñ…ÔßômAaÒ´?¹lÿ `ÙëNøaû<ü²´øƒmàOÙ[Æ^ñçÀí9>)xóíŞñ„ôûı'Âí>¶ÚÛjŞ$Ót'UÔôÍ7Hñ-æ¯§ùà¸·¸_,ÇÄëğLoÙ?Wßqa£üNğ^¯iñ—Å|¯ü=ø×ñOÀúßÂïˆ^;‹UÇÒ|%¼ğÿ Š¬‡Ã|@}w[»ñ¿‚¼+áOêœº†³¤]]Ûi³Yu¥üÿ ¾ç©ñW~>şÕ_¾xßö]ø« ü>ø	ñwÃŸğOÏ|{ı¥ìµoi¬5½CÄš×ÄÏ†Şğ‡„ü?.ü=¥h:ÄµŸø¶ê_x¶óÃÑë¾ğ¦|Ú„wúô_¡¿ğN}«ûşÆUTÙ{à^Ğ€ü+_à 0 ÆG9ã¾?à²÷ÄmOÀš×ˆ¼5ãHµoxÄßæÔôOŠ¿t-Kâ/ÃOj2ë^/ğÆ]SKñDŸÆ
øŸÄ3İx“_Ó¾ İëãU×¯õ]FöY¦Öµq}ôwÁo„
ø	ğŸáÿ Á‡6úµŸ>øcLğg„,µ½{Xñ>©eáı²Òì®uí~ïPÕ¯şÇiVğIyy3Eo6ñ”‚Q vÑ+ßÓÒúúìzl„ùru9Vü01ÏŒy¥Œ¤O?†1^:öÆ À²ºç”€F\ã©ìs‘ÜgŠËœËeÀã>Zãÿ 7¿?Ÿ<P"lûş<úıÑß§^:
7œ˜ïîxèy>ß‰éPˆçÿ £¡ê”ô>÷ñë×­&ÇúáĞõJ>£ï3èGµù?Ãüÿ «?+şLşÙ3Ş[ÿ ÁIà–³i±G>ª¶?·1Ò “îÜjşÎÑÏk©	$‘†R$‘Œ€¿`ÏÙ~×z„5¿‰µòÂúñÂÚágímû=ø>%h_­<}¯ê—P^j?Cüa×?áWßüñV”ßğ§¼M£øáÅœV—¢ø^ítcMÓ¤ıö×gßx§ãŸÿ h/İ{Ç?<1âü.†øÛ®‡à$ñÔV¶~9×t[!†Y|Iâ­.ÂÃB¾Õµ;«ö²ĞíåÓ´htèµMeµ/^¶Ñ¬l®¯/­-4ûKİEã“P¼·Óí`º¾xcò¢{Ùâ-ÓEòãiŞFDT… wÓgøi®Ûë½şÿ Ÿò£àˆµzÀÖâL¶‡€~"Áüwá™õ^X\şÕ:LZ•å·í)w“Kö?íÿ ßYj^>†Dº··ó_ëLºb$ÏãkGÕk¯_³oÿ jİ7öfñÀ_~ÈÏûXø/‰!øÁâ„ğ—5Í[Pø ©ñ‡ÃšoÅ½kâwl> ü9ø¿ÿ €¾'xT‡Q:GˆöË¡ÚXÿ IÂÊ1°·'’é1kÙu!“Í0FÙäó¥/(Ã¿›&X™5æÑìno­5;‹M>}JÁ&KBm>Ö[Ë$¸ \%¥Û†İ&«2Âè%
†Àòİyotï÷i§góş`>8øÿ ÀÖß?à©?iñ‡†-Í—ü¯ö+¼»YõÍ2'µ´°Ôÿ àŸ©}up¯r{7ğŠÒêyÅnşñÌèÚ6¢-½^ÃÅ:§Æ?Û{ãnƒñKö²ğïÀ¿¿ÿ m¯‡Ú§Àÿ †ßÙ>8½ø¹ã¿Ù’ÛÂ~¼ğ§†şx~Ëâ¶‘áOü(øËk{ã˜> ê–	<`öZ´šî§âYÂŞ—Ã¿Ñ#hZl`}?Lc3˜>™hŞcŸ4–”%É7|Ì“4Ùÿ XûtK¨l´ã©ÛZ›;m@éÖŸn‚ÍØ3ZCw·ÏŠÙ™šDÅA(JŠÍ{hôôíúZ_ùëøû2xWö½øWÿ ;¶Ñ¾3üO½øÛmûOşØ?~ø®Ïö†ø§xßô«/ø{[øim èšwÆŸ¤éx£ÂÚ\ĞêØËª\hjŞ±Ô“Ã2Ë£¯ÜğN}wTı£´»ÛÄşñuï…~ıŸt¯ê:—‰-t½7Ä	ÖîÇãª|5¨Ş}…õ+oŒÿ ğ“|2²ñÚ{ßê>øaae¨\iºÀ–çî?‹_µˆşğ§ÄïüÕ×W°ÕÆ¿
ÂÖ%1ZÇyku¦OŠ<;âêuı–£y‘jzëZ\µ¶©¦½¦§cgycğûÀÃøkÀ†K/øWJ·ÒtÈ®ïo$ Z[íJşâG¹Ôu]JåçÔ5mRéïRÔî®ï®K›™]7{|»vKôÿ ‡;làƒ=3ŒgÔqŒõÁã<ƒÖ”’=yúã¦º}Áà{š‹dä¯®t§ûèõOzM“ãıpì ò×Øûİ³ß¹ühÉşçıYù^lŸCÓ±=†@ øï“ØúS#8_l¸î92?N=¹?—9›'?òÙyàşízsÏŞÉâôVU
ÇqÉÉÀ^¬X‚3¤ÎîPS·GøØmQ@Å=şB’Š( ¢Š( ¢Š( ¢Š( ¢Š( ¢Š( ¢Š(ÿÙ
            [firm_right_thumb_ftype] => image/png
            [firm_other_info] => 
            [firm_bank_details] => INDIAN BANK
            [firm_bank_acc_no] => 6055720590
            [firm_bank_ifsc_code] => IDIB000B119
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 4
            [firm_own_id] => 101972
            [firm_name] => CLD
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 293
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-06-03 18:03:20
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"SJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"SHIVAM JEWELLERS","firm_desc":"Every piece of jewellery tells a story","firm_address":"B.T.C Road,Howly","firm_city":"Howly","firm_phone_details":"9101618753","firm_email":"shivamkar54@gmail.com","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"JOY MAA KALI","firm_form_footer":"","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"18BXVPK3167R1ZA","firm_since":"2022-05-03 17:25:53","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"image\/png","firm_right_thumb":null,"firm_right_thumb_ftype":"image\/png","firm_other_info":null,"firm_bank_details":"INDIAN BANK","firm_bank_acc_no":"6055720590","firm_bank_ifsc_code":"IDIB000B119","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"4","firm_own_id":"101972","firm_name":"CLD","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"293","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-06-03 18:03:20","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => SJ
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => SHIVAM JEWELLERS
            [firm_desc] => Every piece of jewellery tells a story
            [firm_address] => B.T.C Road,Howly
            [firm_city] => Howly
            [firm_phone_details] => 9101618753
            [firm_email] => shivamkar54@gmail.com
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => JOY MAA KALI
            [firm_form_footer] => 
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 18BXVPK3167R1ZA
            [firm_since] => 2022-05-03 17:25:53
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  € €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? şş(¢Š (¯1øÇñŸágìùğãÄß>4xç@øuğëÂky®øŸÄWf´…§š;M?M°·f¿Ö¼A­ê3ÛiğÖ‹i¨xƒÄºåí†‡ éš¯ge?ğKÿ Nÿ ƒ‰?jÚƒO‹Bı…ï|Yû6~Éú_¶x‹ã&ƒyŸ>2|>Ò£çQñF¡ZjøŸà'Ã›}VÎÆÃX°ğå§‰~ Éáë\ñ(²Ó´=SÀZ¯/‡ÁF.µHÆS|´àä”ªM©8B+VåQÅÆŠ”¤îÔZŒÜu¥F¥fÔ"ÚZÉÛH«¤äŞÉFé¶ÚKK»µësöÕÿ ‚Æ~Ã¿°ä—¾ñ÷ÄCâwÅ;étËïƒŸôëˆş;ğõô0Å;Åãùm5/	ü/&+‹w³µøâojúûL–Ò¼C©¼vü~Ü?ğv—íC¦xmÇÁ„^	ø§ø¯\“Kğ~¯:jş*YèVÚ6z¯‰®¢ø›à¿	x2ÇÄ=ı¬#\øs«|1¼şÊ’ÿ B´9¼mKP›HşM4Ø¿ƒühßu/„ŞÒ<_?Ã_iÛx»ÂZÄ?x·Ç¾,¿ğç‹£tŞ:î¡¢ÚÛx›ÂÇˆì§Ñ|KãÍRÿ SmkÃğèúçˆôo­üS¦ø_Æ¾øSãƒ_	tû_ÁÒş4Üi¥Íß…tK¯ê7~,Ôô½?Z…tÄøyiy¯İøRk-nÇW»¹Ñµø´E¸ÒãøasãÛÏ
|Ş;;ÄCF)¥„•iBnƒön.
§$+bª.DêU()aXrJj¤ ¥MÏ²²oøŠ*Ks]7¸ÓZé'jœ®ö²m;{­Ïüûş
EûW|RÕ´ï~Ù´ÏŠ´;İ(^xóÀ^	ø«â?‡~×¼!wá1ñDñ_ÃÏ|¾øTƒW¿ğ•®“3x©ï¬¼3'­|¯Ü[ê C¯üßâ¯ş+ñ‡>Yü0ø™ãoüFñg‹—[ø»{uâßjšÏ‚¾E«øsÆ~3Ò|W©xšù ğe¾Ÿâûiš²O¦Íªèúl2êğœ:—‡<!¦f‡–ÇáÆ]oâ™àŒ_>Ç¨kw¿o¼wáKr3áÕÒ¼ãû]+FÒí<}Ïƒ¿h]KÄş¾Ô/íõ-â“á»ËæKoHĞüwÎøƒâ/„×àÜ¼sñîïÅ·ú/Œ| |Uñ†«á?jÇÇßş"ø?_ñ¦…¦øgQº‚Aicm,úÕ§†ï­µÆuÃ$^x5ñ1˜ˆNˆ…8C<4©ãjR¥YÊ¶¥z°T*Ç¯,Zt½¦«u°´j5ìêN‡¥J0¥MÅûr•êF§5ÊPJœãIÎ.Õ¡)rÕ£VQOš*}_†¾=|@ğÄi?ş5x³ÀsÙ.â¯‚6Ğ<kã|4ÕuÏøªŞÇÂ~"ğ¡¤[kéaÿ î‹©x~Ut—ÄzïÒÖß\ŸXÔífú‹Eÿ ‚¶ÁP¿fOøBûáÿ íyûFxkHÖ´ïx«Â¿~+üC¼ø™¢i_Û:&½âAãí'ã…ŸÄñÿ ‡SÃza×tÏè¾‡@Ñ|As‰¬G%ÅçÆŞñ'†¼à|ğßÇ'ğŸ‰Ä9~
ü"ñ6‹àÿ [ŞéŞ&ğ£|'>?Õæ¸Ù¯t»/ø³PñÎ‰{ı©&¥ A­^†ÆÎâ=;N‹Âğ–©ªk¤ø­áÏˆüAğ·^ğ‡„ŸÁ:ßŒuŸ®¯{ğëÇµ¯‹^×m®<k|4/ˆ·V¥¢iü=åøsá~ƒ'‹ô>ÊúÓJÒuX¥Š©‚•\BxÌ=IÑ¡F•<m*8šŞÊ„hN/aJ–bgÏzøº´ëQÅÂ,$§=¥N5ã
¹©78Îs”¨JtáÏ'R3Ÿ<ç_ÙÅÅR\”a(T£)¹5ËéÛöÿ ƒ¾>8jeæ—ûNü	ğ§Æ/Â:¾‰£kŸ¼÷Ÿ
üu¨éZœz‚[ø¼'¥é¾8ğ–«â]rşÅ¬t‡šUŸ„­õ¬ô˜¼i«êÚ¾Ÿnÿ ×/ìQÿ [ı‰?o‹xìşüTû|qsğâ^‘wğóâ|J-ÅÍÏöo‡µİ–¾.]*6X¼C7µOÛø[Pó4OË£k¶×z]¿ùM|>Ó4˜~EâŠŞ¶Ôíş+èŸc‹Q°†îk6óÀúm¾£ªë3ı¥¼k­j>1ê¾;M{W²û&­­xŸFÑlaÑ´mRüå}®xÖÆO|qğïÅí]ô[é“ZÚx^òÿ Ã6¾ñ·Ækz‡ƒ4jZ5Í†wñÁÚ²ÜßxÒãL†ÇV±¸Ğgñ^j:ÚëPhşş:ÅOŠ§ña©U…({wí”êÎ8jJ…U4ê¼dêĞ~Şá	:jüŞïl%FŒµU§7È¹9a9{J”jI5`¡RôÜÜ’“—-¯/÷¢¿ÿ ø%Wü—ñßàåî¯ğÏş
>ºÏÄ¯€wˆlì<=ûFN–÷_>h²Yİ¿ˆ¿á6†Æo~:ü?ğ>µ
éã;MMø•} [ÉâÛ~&B-Cşì¼ãß|Qğo‡>!|9ñN‡ã_ø»K·Ö|5âŸê6ú®‹­i— ùWV7Ö¯$R¨exfŒ•šÚæ)­ncŠâbO¥Áãğ¸è9aêÂr‚‡µ§ÆR¥9S…G	ò·ïATŒgm¥x½U*¾¶IU„¢›|’i¥4¤â¤¯ÒVm_u©×QEÚ`å?~7|.ı›şøóã—ÆŸiø_ğ×Ã×&ñŠu»˜í¬´İ6Ì ¨¦FSs}s$~—§Á¾ëRÔ®­l-#’æâ$oV¯ópÿ ƒ‰ÿ à®:ÏíûOŞ~ÇŸtiõßØëövñå¾‹®ø‹Jñ,z}¿ÇO‹§Bñ§ƒ~$êz%•¬WŸü'àmÄ:öƒá-ÂÒî<GáıOÅ{©[xÂÖprc±K†©ZÑœãéÒu)Óu%¢´]Z”âí{¸©)4­ÉÅ=ğô]z°†ª-®y¨ÊJ+»äŒš½¬šMİè™óWü·ş
óñGş
{ñ8ü.ÑäñOÃ†^#ğÍ–¿ğWà?Å?xu<4¶zn¯­ØkóüA´ÒäñEİï¼Em¢ê·o­\_[ÿ Â-¤éÚEçÃëÍ\v¾#üìğ/Š>3ësø{Çú÷‚>ë~2ø1eâ/xsÃñw…<m?Å?]x^ÃÂÖ¶Zı·†uÛŸø[ÀºÆ“öî¹àëmF×Uñæ…aa¥YÛyú,Cñ>µáı;ÆßüCã;ï†ßtxªö#Pñ¹©jº–³e ivgÅ+w¤GÂı;HÑôåñ;i:¥ybÚõüZE„à¦ğúG…tƒ>,—Àá«/ŠzŠõ_F³×|eâ/iÿ u½_|@ñ6•®‹$·×5ø0Káßè7ú–µ¢ZKàíOÅ~²ºĞ.åÓgüÆ­W§)Ô§ÏŠÄÒ«ˆrÄRö·s•\2ÅRÄá¨Ã°qÀÓÅÆŸÖ>¨ªÔp<UtßÓªj„”c/İSœ)%Nj6²¥Z‹t§N¬İlñ“—³ö®æR£7#­øo©øGà'Ã‰·^(ÒuïíŸ‰–^ñWşêø_âÄ­/Âšñ‘¯xËÅ7#ğş«á]WKÕµ_x?ÇÒø'â/´¹muİ2[ûh´)ü#§ë78.ø«{ğ§Dğ‚<_ñšïÃ¾ğ·ãMãáÃ›ßkzß‹~ø‡Ãşğî•ˆlµMKLÓ|'ã[kYêÚtš“øzËJÓ|B ğ
éš¦Œt[Ï“ügñòóÂw¾øUâ½[[û4·ZL¿u{[x<yá{]Iï4hºÂ¡Õlô]QÜZ¤÷Möèm¿á‹Ãe´°êÿ &;¼ÒHÌîìÎîìYİØ–ffbK3K1$’I'&¾£KR®3Ü^"¯µw¦¥V¤#†ƒTñ4æğÊ•('[ëÙ)óU­N´Ÿ_j4h¤ıœyouËê{IÚTä•NiÙ¾^JIÆÑ„ ì}[©~Ò^Ò¯4÷øoğ_ÂZ¶—áğDxÇWñ7îeÒÅ7>0‚åmäÕ4­=nÓÄ3Ç«ÛfİiwZu®™©Ca§[[_ş¯ã¢êš¦µ‹´Û}_[‹LƒWÔàğ/ÃôÔµ;}ÍtİßQÔá7÷ğèúr&Ÿ¥­íÍÁ±±Uµ·1Â6WÏWĞÇ+ËÒjxZUÛM9b“ÅM§%7yâ]Y{ÓŒg-}éF2zÅ[ƒë•¹jJwJ›öi4¹S´9V‹E¦‰´·w÷ı'ö¡øİ ı«ûÅzföíN}jûû+À¿´ã{¬]ÍÖ­vÖ^î5;Ÿ&>şVk¹|¨·Ì|´Û«¥şĞ–cC‹Ã~ ø_àãciáßxoNÖüğ§Œ´Û/ln;]{S·ñm´VËâ-|Í£Zé6šp}Vqo´*>øMğoÇ?uİOÃ-4íSÄzn‡uâÑ¯5k"ïT²²¹´¶¹‡J—SšÚÊæö#yÆÚ[»v6ë4ÊÌ°¾8ÏøOÄ¾×µx¿BÔü7â*Q¡¤jö“Y^Û;(’6hfU/ñ2Mmqx.`xç·’XdGg<¯.•ÿ Ù(Ór’”ı^R”c(ÅÊt9IÆ3œW3vŒç¤ä›'Ÿµœ¬šJoÚ$›MÙTæJî1nËW÷Jß¡ºGÅÛïx*ãá¿Áï‰ş'Ô¥ñ“ğûáš|-øŸªÇ¢éşÒ4O
Úø>óÇ^¾·Ö‘®5”m/BEğ¯†æñH‚¿ë÷¾–DÒìô¿Fø‘¥xCâwÃß
|4Ò¼7ã7Vğ†½ã]CÁ¿ïtOè>8ø…a§ø?R¶¸ñ¯‚ui:O…´?=_kåŸÃØ,¾"kúN±iw{â›İÃv~FWÓş5i÷W¤|X’úv½Ğdğ®ñoOiÏÄ?YÏx·pÈš´Q]j:•uc{qW>&´ğş¥¨é¶rk:2'„/¾sÃ®ƒ§ŠÀJNXz³ÄÅB”~³í]‡r—³tÖ&*’P—³,z¦§õlOÖªB¤}<>b¦¥K—-XÆ“æœ½—"©í,¹¹ı“ç¼•Ü°üÖö´(¸¿½5íGâÖ—coñÛÀŞ
ÒüaãÏxKO×üñÅš„ïü)¬xjçÄ¾KïjzN“ªéš•saã?|8ÖHÖ­5»M3X‰_VÓõ9ôÿ Øø"×ü‹âGü3âıŸ>8]ê_şøºçRñ·ÄÏ‡ß<?c~ŸÚ{v·>'ğ…¿ö~¯®ø“Rš?^ê¶–ãVºñô:µíåØ™#ğÇŒçü8Ô|3}ñöÓÂŞ*Ò4xş&øşúØü0MWÄšÎ£¢xûÀ‡ì:v£ñÇÖuû1©Ï¦êš¯llü	‚-uÙâoøŠÚãÃúÿ €şÙèÚxğøø™ñ‹Søc©|=ñ¶±©èú7ü}¥øÓ[×ü5‡|Oa¤İéº£á/xzÁ×Å±\ØÛ^EâxwVĞu‰üMá-GRĞõ] YÏÌQ®òëÔ¥
qÄÓ¤ëóaé¸B
\.JxÊ˜šôŞ_Ë†£9ÆŠÅTÂB…zõ«T©zó‚ÅrÆ¤¤èÊjªÉI·(T«Zj„iSŸÖe%J¬Ô\İV•HS§ÆRÿ c¯‡ÿ <ñ[Áø•ğßÅ:'¼ãMñ?„<[áËø5=Ä¯mæªi·ÖìñOmso*:CÆÛ¢•#•¯¯àSş²ÿ ‚±Üü&øù/ü³â†Ÿ¬é_ ¾+kóCû:ëÚ¶·g5ÂoŠgOÓíôÏ‡÷^m2Ï]øOà±ØŞêÒ<UyÔ¾#Ios hV2|EÕ~Íıõ×éØ\q¸Z8…IT§	T¤ç	ÊIEJTçìç5+ß•¾dšæŒex¯”ÄQt*Î›|ÑŒšŒÔeÎ)é(óF-§ŞÖ¾Í«7ø£ÿ òı¾ïÿ `_ø'ÿ ¼Eà›å´øÉñ·Tƒà§Âù¢ÕJ¾ğì~!°½¿ø‘ñŞòŞhõ+>|4Ó¼M¬i¦›ÍÍ—Œæğ„Ko+^$oşP—Ş¸Ò|SâŸøJ|)á)<Œš®ƒk¨Xü:ğ¾£w¨Êfµğ|Ÿ$Ñ¥×«oo¦ø›Oµ½Òõ#¬k—º%¶¬÷Ğhº”š©ş¿àìÛ=¼uÿ ³ø7¤ÙkÚ¾•û|.ğ†i§Ûê6k¢Ãã¯‡NøãÏGc}¡j–w¶š~‘¤|%ğ£q=¾³¥ÛëwúUèÒ5±;ÿ 9>ø²–ğç€uUğWÃë­f}NâFğş»kd<9©Kyyiu¤ø†ÚÓ^Ÿ]ğêÚÙİé~+.u
ÿ hk	ªéƒXĞuVÇVùŒëúÓx|<+Ğ¦şªâê¥R-F¬F&„iU•hT¡MB*­8BiU’“¦éÓ”½œ?±µ«*U%ûå%Á¦İ*4ª9ÓTå“s|“›¸šSS’]‚ôï„ğ¶—â…7°xÃ]Öõoj?üñkSĞ¯t¸¾&Şİi7‘Å=Æ‹¤økTÓµL°ñƒ[R½ñ'†ôm[Äºn“â5·³ÓuïZØüİñâDšv…mğÏF½¶©s%ş¿ñ6÷Z×Oˆu˜<Qây­5oø2XÃ‘iöºµ¼ş!´]¦MbÚ->öí}3ÄZ¿Š>„ø«âeğ—ˆ|sã}|A¡h^¹şÄÑ<5ãÏé“¯Š|c«x^ÓÂÒx§BÕµÃy«Zê–‘húx¢ÂvÖdÕô­#^–ÏÅ·öÚÅİµ¯æÜóÍs4×73Kqqq,“Ï<Ò4³O4®d–i¥rÏ$²;3É#±gv,Ä’MgÃ¸E—ö…yU­Ü×ÖjN¦"‰Òç…
ÍB•	ıV…XMÊåÍ‰¯7í#*n5šVöêÔÔ ÿ yMû(¨Ó•(Í'R	Êsµ©	E)MZ•8¥¤ªJ*(¢¾ØğBŠ( ûá‡ÄÏ|ñ¾‹ñÀ×ñiş#Ğëì’Ü[E{i4ÖsØ_Z^YÎW×Vw3C"²FYg·–˜¡š?¬?iÿ ˆcö’øUğÇö‚›NÒôßø{TÔş|R³Ò’X­c½d›ÅÔìà¸šæî=3UÓÿ á%(×3Î Ô ºÓã¸”[«·;ğ:ßö'“À±·Ç‹ï‰6ş=şÖÔD‘ø].ÛJşÈìÖSœéö‚<ÿ ;÷„ıÜ^Æ-à˜AJ_ãhF*Ì¡5¬È+şÎÁ*Â’20Ürù¡EhjÃN®¦4ƒ3i#P½[\gÏ:p¹“ìF|€|ãmårß» +>€> ø!ãeñ-­—À¯øŸÄZ?ƒõıbÑôıPO¿²Õê[¨¼)>£&ªÉ…¼E¬M¡Öw:ŒaÓõhÆ—§â=JO¯uû/€ÿ ¼/s'ÄíwLø}â½;Y×ŸãO„~jºÆŸ©øÂ~ñÇ‰|/â¨5]CÃZÖ«jsxgÃº…ti>?ƒO»ñÆ­g¦I§hú†·ãÏ/å~¥|ñş…â-Kà×‰¯¼=â}|øX×|5ñGÁ¾ğƒkoâïiú~¥Ä?øòë]ğÔŞñ½ÏŠ´½jãÇúôÚ›á];ÄZå†‹•§ZëÑêÄX`Ö?*ôëV¶p£(â£Bug+ÊJOëP£IÖ„a^	ZXŠV›—·–â=§û=UNkÜ‡ïâêEÒsŒ"¬¥/däÒP“nJ´Õ9û‰y_… Ôl¼wğ“Åÿ ¼5áßø_Kò<«:ëáŸÄ]cÀIàÍVJ5‰RøvÇ]Ğ¼Zt‡Ñ.á“ÄwúD:7ˆõkK[m_DŠÎëMğÏúñÿ Á'¿mX?ooØá7Ç;ë¨fñı’j¿>.ÅÚ–â‡ÃË¡¡x‡Q¡µÓeñeªi~8şÃH¡ŸÃqø<;¨ÛÚjºUı¿ùHkß-'Ñ|sğwÃ—ø£x²ÙKl7×íã·ñüZ¶Ÿa x{GÓ<Kãâ-zûÄRÍ¨kw^>8ñß…â³Ò.uM|GuÃQÿ ğhí¾—ÿ ¾8~Ì^&´Ô|5Æßİ|Rğş¡c>“¯xËá†¿?ï¼1a§é:?‘>©£ü@¼şß¿º³•¯"ğ.úî¿¬ÚêòY™&+ñ7«†T0óqÃ¤êº•çŠ¦'	Š®«Mbç9ÆU(¹U„ª8Óu§9ÆSœu
¡UÔ«ê]C–šqä¥Z”=œ}Œc£4¡%)rF0²‹ş[ÿ mê´Wí•ûZşĞ·~9ò|%ñwö®ø©ãÏx‡Tñ»Ğ´İCÅ>#¶ğí†.o4ïIu¡Éà}CKÑ%™íôoíH¼%eçM.amu?xSÔô;Ïøâ|ß
5É4]Ä·ow`t¯x£Sğî‹¥;GĞüMªxjM½ğ—ˆa»²¹Ñ4okÑÜh÷Všx×,cÑä°°¼ä/.<e¥Ã¯ø;ÀúFŸ«Áã?í‘­xÇQñiš]ä>-Ğa²Këİ.ãÅúÍÆ­i§øzKVÛû]n7ŞAe¯ÛÙj’i6·÷•®<]àí7ÆhÚ‚µKÛo>‹ªüDñ5ò¬·ÇMÇÂZ]ø1“PÕ5u2ÇÃš¥ˆ,tù.TXï¬“L×f½û?Îb«WÌ]WR
½<Dãìªáş®ñ˜iJµákÕ”*S–Í{hº0öx¬léÆPÁ©F¬_¿J•,‚„)Òï!WÛ{
Ê4å*ô©©FkÉû¦ª>zhÉ§‰q•9/ø°¶~ğŸƒ<1§É=´¾!–ûâ'ˆ4»ÁâÏEs©*éÚĞõKW––qÅ¯ÚÜÄnuä™ÌZ–±«IEàUë?dÒÄ. }´m#Âºe­„Ú\w±i÷Q_İêZûŞZG¨…¿H.æÖe¸‰/R;¥I 4”2&¯Ğò˜µ€¡7ÏÍYÔ¯'QJ5_¶«:öŠRœÔ£NP‚Œç9B1ŒåËwò8ö¾µR+–ÔÔ)¥œ³„c.WÆ-9)JñŒc&Ü”cÍ`¢Š+Ò8ÏŞÙö`øû:şÃ~ ÿ ‚’~Õ->6^êš£è ş
k²ˆ¼!ª^ŸÏá;gÅ–sC=®¨u=nÇZº6š½–¥¤işÑn5{}+ZÕµ]2=?Ä­à±ß-üAc0øû!ÇğşÎèøUv4KO'Ì´Û{Ö½¸×-%û’¸µwO%Œğƒhß®±öŸğgş
•ÿ ·Òb/ˆ:GÃ¿Úàö•¦Åm¢ßæ»†ïÁZİÍß…<ug¢yö×~!ğ~¿¢ê@ñeæ™æŞxwXÔu	nm÷õæÓö¤ı¾?~Ç®~|xğ&¡á‹ö’á¼?â(kïø×MÂcÁŞ&Hc±ÖlYßıWÒd³×4Í/PÙÇüYáÆ?<KñÅ~ñeCâ†UÆ™æ&àŞ'Åc(<‡ØxP§Ã¸îËjÖ£‚«ƒ¯†Uñ˜¼ç'¦óõ«,~.´(â0u'ıÅù¦uÁÜ7À˜¯±_Ùü)[…òšù¾q“ĞÂıc0âú²«W:‡â•:˜¹NgG…Ëñõ
kB“<DW«ÁC>0üø÷ñ³Âÿ >x#Ã¿ü'âß„>ºÖüáÍFĞáğ¿m'×4ÿ é7öº†™eu}¡i˜µƒco.·¤¶™«aŠò(cúSöğ¿†¬àßµËèVzÕä
MŞ±k¤Ø[ê—FçÂš´—çP†İ.ç3È«$ŞlÍæº«>æ ×ãí~Ï~ÓGş5µğŞ„cÿ -`ÿ Jş·á¼‡	ÂùUÃ¹}\UlO„§€ÁOˆ©‹ÅıV…ã‡†#UÊ®"­:\”å^«u*òsÍ¹I³ğŒ÷8Äñq˜gxÊxzX¼Ï<^*J0Ãá¾±VÎ´¨áé¥N„*Tæ¨©SJù¹ ”RGãQ^áä…}9û?ŞO«ø_ãGÃÃ ·‰,õï	h':bø¢ÃÂ2Isá/hënêÑM¦éúj6µ¹â4A>¡¥xm´Ëkı2êæßU°ù¾…ı–ªÿ ü-m¢®‘.§y¦xÖoA¼9w~ñÖ™ˆ“I#T“CşÔ¶²›R];ı8[Dïgş’‘WŸšÅ<¿7oÜSX¸ó9ÅsàçT/*r…H{ÔW¿	ÆQø£$ÑÑ…vÄRZÚröNÊ/J©ÒzIJ/I½$š{4~…üMñ?‹üAiğ§Áß
¦øáÿ ˆß´Çí¯ëº5­.ÿ ÅŞ,Ô¼#á…Ş/ñ¯†®¼¢ÚŞjOyãÏj¼ğõ¦µ®^ëÚG…íµI¼=âgÆÿ dÁ!5OşÎßğToØßâG‡ü|<Má{ÚSÂ¿<iâMÅpxÏV×!ø¤±| —E×4M'Áiáßé^ñï‰|ZúSÜüAµøy§x_[:d°%£{ªü5àïˆ¼ğÿ àw‰|áß†všu§Œlü+ñ{Áw~$´Ô4K|u$wÑ~øªößÆ¼v—‰üY¯ëŞ$±ğæ‘¢ÅeâÑ´Í:æM
ÎúóÕ¿gÛïŠÚ7ÄOÙËá¿Œ|3¡Ëá¿„ß~k¿~/øÅ–ÚÎˆ4í
ÿ Iñ¿‡<QgàÙ<} 5¤:Î¥øoÅú¾§mm}©\xo@·ÕSÃ2ËZÅç¸IÔËªCÙS¥‡¡CUÕ«ˆTUjôèâë¬D¡:•]lOÔãKN8:•3<LêÊÜißèª(âbÔå*“©J
¦êrS”èÓtÔã(RöÎU$ëFÆ¢¤¢¥ä|­ZE­ÚjŸo¼W«xWÅ,ºô>µmwc¦iúÕÍœÚaaiŠ¼Ci«ëÛ[ÓÂóÅ$—-<š®©ßÚê·st·úï†á1ğñ›Å^ñjxãV×m4{¿ÊÚ—Ù<GªÇ‡-µy£×µ9µMa4ÉõM%4o¦İM{wc¤‘u¥z§íÉğçÆ²Çí¿ûaüÑ<;eğ»ö™ø± è=”Úw‡tCÁ67×—Ã¾3Õmî´İM,´í[ÃŞşÅ‘è×ºÄZ¤‡EûV«.§,á/Øx~ãÄz‡¾*&½®_Úë©{áÍm~›KmvÊ[RV}ÃşÒ5bÅµ¶›¤Ûø²;no'Ñ­o5{tÒæ1˜<U55<T0²—Õ(`TªM~ûR4’¥ÄRyÆQÅTXhº±§J1œ*R«éPÄaê¨8Ú„±
?X«‹åŒu§U:—©Š£7ˆ¯hÍ:uä©¹T“ŒéÔ§á?.¡Õ5Í]‚Ø_ğŸ©2jtZMÓ˜õ_LàéÖó\ÛÚÁyİ¤vóÍnmg… ‘ád'É«Ş>'Øê×ĞõMOIÕ,®ü5¬ê^¼¿×õ‹_^Õ¡’4½Ó¤¼ûp½¬:Ùï#T'ŠA¨ZÏk©jŸišhü¾÷%©åÔcQ•ZJucÒ«8ÓJ¥&á%ì}œ£k5%8ÂjPÈæP”1u¿ï#N­å	Órs§6á4¤š©ÏºrMÆR¤Ê(¯²ÿ `¯„>øÃûFèV¬XøkğëÂ~>øÓñBI'ñ…¾øKTñ”ş.ƒzÛx›QÓ´İRxš9âÒµé­¤Kˆâ5‡gø>áÜï‰sW«‚È²¼vkˆ£†ŒgŠÄSÁaêWxl-9Îœ*b±.
†œ§Î½Jq”â›’yV]ˆÍó,W…pXŒÃC	JU(N½HÓU*É)8Ò¦¤êU’ŒœiÆM'k4øWÅ?~øÇÃ5ğvµâ‡9ğôºg‰|/â=ëQğïˆ4Ãyiş•«éw°µµÚ[êuÔW×1µÔtÛ°A¸³º"Oë'ö+ÿ ‚µşÏŸ·ç€ ıà¦ğ%×‰üM¶áÿ ˆZİ®“à_ˆz±Cg¦Í{qllÛáWÅ=ò–ÑüE ]é:>£¨Ë,z-Ï…õ)´íRşMş$üAñ'Åox¯â7‹î£ºñŒ5«ÍgQ6ğ­­…¡¸|ZéZMŒxƒLĞôk$¶Ò4-"Ñc²Ò4{+2Æ(m- ‰8šüƒÆ ¸GÇ^Ê—ajpçd´(cxkxWSÄÜECÏ“gt£ƒÅc2ê8åz˜<J£CGN–6/îğÿ ã¸[_û>k”b*N3+ÇÂø,ÓÛ…±Xnj¥^tmjs•&ù«Qç§Söş
Ÿÿ §ñwìâˆüyà;ÍWÇ¿³?‹µf±ğßŠ¯#_xX¹Ïmà¿5¤0ÚÉ4ĞÇ/ü#ş(¶·µ±×£·‹M3T‰mn¶i¯ùF×Àúãğÿ Pıf¿gàšw¿?jOØÅ²ßíax«IñGµ‹?‡zŞ¹ª®µâI>êö:_ü!W:¤’%ÌÉ«x7^¸‡Xğ~©&¡.£§i–ş­ìåÒ 2~1~Ôƒş	¿ğYR¿	¡T.¹ycğv¶Î‘óó²¬nä&~DgûªHğ~œeâ.*\uáO‹•0ùŸøIÉ°5ø·NpÜmÂüC†Çb8[‰jaàùpù/–c)ætc¨Õ§JuRÄÔÄ%ìqŞC“apü?Å<6êSÈx²†:¥fåW*ÌòÊ˜zY®]ÎÒö”hTÅĞt*]óFråıÚƒŒ4QELŸ…}û*é—·ÿ ôË«MNç@‡FğßïõZipksøZÚóÂZÆmâ$Ñ®§µµÕ[KÕµ½2tÓ®®­­¯dÙm=Ä1Jò/Îuöì×áºğgÅ¯EiâmWÄ¾›¢øÀğo‹4ÿ 	x×Çz‹ø§Ã×ˆì|uq¦ëº–¥âÎ¾Õï´}ÃúÍş£áûıJÒ;H’yu-7ÎÍf¡€ÄEÉGÛEa“j·ÖeÚ£Tß$jJoÚ5J1‹•V©ÆMo‡_¿¦õ÷%í4¿ü»÷Ò¼S–­$¹}ë´£­¶>ë®´€?|c«x÷Æ3ø£êŞ"ğ¯…u/ øsÂ
—ÃW^;ÔÎ‘7üáßˆ’høÎçÄÖ/4K¢k—å½ 7‰Vé4í2^“örø}}­|GøñzOøÃâGÇOü\ğW„<Skzö:¾ğëÄ!ñu¥¾©à½sÀËã·‡°î5›ø”øÎâÿ Âk¢êğKm%½¥—=ñ?ÄÚ!ø{áÏƒŸµÄŞø§áwğÿ Ã_YøëÅŞ2ñN¿ñ×Ã~,›^Ğ5‰¼IğËáGŠ|?á¯/Ä»Hôoø“Ä)ğ>«â/‡úWƒbñ'‡4;=5Ï}{ÿ ’Ò>#şÖ_ğSÿ ØgÃº•ı‡‰ô‹ïÚÃ_üCáù<C£êÖ|ğ^÷Høñ­ø£ÁÖv‚õ}¢j¿ll†<W¨øÏÇ~Ó5H!ñ¦Ÿioy5Ö­ğ˜L&'Z.Øxb±RXš8ˆºsTªb12t¨Ó–NX|d'Î¢ƒG>déÑöç^œ ÓJn•5ì§MŞ<Ê4§9*Ó—´£(É©T‹’U[¦•ù¥ö·ü©ûYü.ÿ ‚ˆiÿ #ğÖ§kğïöÆøcá¿ë>-²¸kM/Oø¿ğ2ÂÓá·Œl$H´»«;P¿'ø}âk›«¶º’òëU×§É&ûN ¿Ìõ¼Z†ü1¡j“j^)²Õ<9$¶§‹ot­2÷I†êmJâÖîÓN¸×ãµŠK»ËX­d›íş»Öü; %•¼‘i6÷vºßú¶ÁÀŸğO›¯ø('ü×Æú‚ôÍORøßû?jöß´7Ák-2úï‰µÏiÚŠx³á¶©5»ÜÏñ#À—Ş!ğö‘`ó­¬¾2>¾»xôÕ‰¿ÉLÁ©Ùx‹R×®OŠ¢Ò¼G`ú™§xwFñ^—â˜ôÖH®mìmfÔô´#¨I¦Ø\nHµø¥[gP¶7r?œŞ¾}«<UıµHĞ›úÜiZ¥HÕ«
kZ‚”¹•kBSu\mOØÇ‘ÃŞn[eªq¡gJ­öwSÜ„©Ó”ıµ*®+—Úû:ÑŠ‚•çí$ä¥¢K¯×çğÇŠubü?á¿üA’	àHõëİFóÄÖÚdWa´kkI´]?J²×¥Ğ%¥{'‰uOjĞ¦¥m2ı“äËû½.úóM¾„ÛŞØ\Íiu21ŠâŞFŠTß<nÔ€ñ»ÆãŒÈC­ ñ”èpèšş‡wğ¿E¼¹°Ğü?qjo¯i¶ßÙ°[êÖ’júe¥¦ÿ ü7º^±«éÛêÒê:ş©©	“Vš9|÷Ç¾7pY[}‚ãHñÖgqcsáÛ«©5KıÃº&›g®Gz¶°	/|¸$Ú	’	5;9³ììm,´{mWÆËQ`ñ4«P£8Â?mˆ¥‹“ú­5N8¹âh·±öQ§†ÅT…LRÃºXwZ¦éFZføHâ¡õŠ§V¤oVj•˜uûù©<<hÔJTåÏ)Ö¡Bƒ¯í+*q¯Z5$¼
¾²ıˆ~;è³¯í%àOˆ5±›Uøm}ˆ<ñSJ$–kï†¿tCÁŞ.h`ƒ÷÷7:^›«¶»giG%åî•oj$U™|›E}&’`8—#Î8{5…J™ny–cr¬tiTtk}W‡©†­*£yP¯Ts¡^ı±…X5(&xY^eŠÉó,¿6ÁJÅå¸Ì6;êAT¥í°µ¡ZœjÓvUiJPQ«J^íJnP—»&}¹ûZşÃ??f-vmzÛK½ø‰û?x—n»ğ§ãç„­Ÿ]ğŒ|ªÿ ¥ørúÿ \Ò’}?A×§Óeƒíú6§%¤uÌúKjZAµÔn>yøEğ/ãÇ¿Úø;àßÃo|FñÔÑBlü1£İ_Ád%`«s¬êaJĞ´ôÈiõ=júÃN¶LÉsu`°÷_ÙËş
û\~ÊzsxàÏÆgGğt“M<¾×¬tø,Irí%ÛØè)°Õmt9oec-õÏ‡“u{'Íu<¹ ıI¬ÿ Áo?à š†”ÚN‹ñÀ¾ÕÕ®¼%ğ«Á]0bGŒkz^»i¯’LĞZE*1ß£…aùmLGy^
YF'ğßŠqt¡õ|æœMğôq‚ä¥ÏxOÂ™¯.6QQ2QÄ1Ââ+J¤ğË/¦á†§÷ÔèøIÄÇ1ÅæœmáêIUÅğŞ"Ês™R”Ÿ5L6UÄ8® Ë”°É¹CS1Éş±F
­õÉ©VŸë‡¼/ü/öÅ¿¾.OuûFjSø‰~|<ğş¹i¨i¦ÿ ÄV6vÖ¿ô´¼²’æÿ ÃŞÍâøšÌA¦é—÷vú$·wGÃ³êßÌ¿Æ?ÚÆßlü)áíN/Ã^ğ™m¤x+À^KÈtÎÎÎ>	¤“Q¼Ô5=[Tû¼6òjZíÄ¡DßfKUººY¹OŠÿ ~+|tñeÇ~0ü@ñWÄoÜB–ÇYñ^¯uª\[YÆÎñiútS9µÒ´È^I3L‚ÒÂ’FŠÙG-æ•ëx]ÁGÂ˜<ã3ã~%¡ÅÜoÄøèã3¬ß—PÀ`°X:ÄÔÊøk'ıßö„òXìÂYl3Ej”êcñµ)RÂÇ:'•ÇI’g˜¼…²Z¼?ÃY6êÙvŒ©‹Åâ«Î4aŒÎs§õXæ™’ÃaV-á)Â†	Ô®éF QEú™ğåÍ;O¿Õõ+K³¹Ôu=NòÛOÓ´û(d¹¼¾¿½-­,í-âV–{››‰c‚cV’Y]³ Tş€>Öşh<‡ÁŞ*ğÀK\¾ø™o÷Œü=ñ:çâÔ÷z”ï'ƒu/Üè6²h6©á[İoIø‰2ë>Óôx_Oø«oáo/ÃÚ¡óçÀŸ†~"ğ@ğßÄğæ‹âŸ‰~%Iğãán«­Xè¾&¾ğ¼ö²®­ãMÇX±½Òï5·¶¸µÃ:f«m{+é·Ş)±Ğ5A—cöøÕeáê
øáoö¤‡šş¯£|Uÿ „îçÆ×:ñOŠ¼{àÿ ø.äZIá[=xOğÓMğ©ão†¾$·"Ó$Iîä½ğµî¬¯ƒüzÿ Ÿc¥‹—Õp‘­Zı¤L6.J­HÔÃT©*ó\´iÅÔú®´ªÑçÅÕ”©:±ÂU·­„ÃªqU*¸ÁË•òÎ”ª^)Æ¤c­e9$êN
3å¥¥ÊêÅ>¾{ÿ |Cøqñoâ?ü%~<¶ñWŠ4Ë½Å:GÁ-sÁšÎµ­øbÒ÷Ãú¦µk7„´OŠZŸ.‡ ^]ØKá2x²ëÃPk·zn‡%´ğu·ô­ÿ ”~Ä¾Ñş:üzı£ôÿ 
øx_á/†.<áø«U‡R7ß¼eâ¯ø[Äz~œ–ú›¦Å¬øÀ^¼YºĞ¤´³ŸOøÑ§ZİIã;/xŠÛùµÒüKãÏŠ¿Çì~6Á¥|-‡Ã¾	—á·ÄâŸÄŠÉá¿ŞŞ;xÎûáÿ ÃøG®ô½{Ázœğ=ÍÇü"úÎ±¢ZZ MJ²Ğìt?õ¤ÿ ‚QşÅVÿ °wìSğËàŞ£f¶ß¼B×ß>6¸¼‹RüXøƒ•ö·á‹]J –Ú†ƒğ»DµğçÁïİÚÁio7‚>xm¢²´_ôxôÉ05#]¿iQaâã‰•xÆN_e… ÜZhÂŒ!‰„¹ªBÆVå›ÏUrZÑskÙ©hÛZJ¤–—ƒrn›VŒ­ët¿G«üÎ?àäïø#ÕŸìYûLëÿ ¶×Â_ø¦ãö\ı©<ouâoøsÃá<-ğ£âüZˆ<kâÿ köë+[ÉáŸŠÚŞœšç€ìo-¡ÑíuOÆş´±eàèîÿ Ó¼¯ãÁO†?´oÂüøËá=;Æß>$h^ñW‡u4>]Í¤å&¶½±ºŒ¥Ş“®hÚ„š×‡uí6km_ÃÚöŸ§kz=å§aiuÒã°ß[ÂÖ ¦á*´gÊÔ“R‡¼£)EsÆ-¸««i}Ÿ.¿Õ±«8©Æ¼¢×2qiÆ^ëi7É)$¤í®§øªëW‘[xÛÀ4:­öµ/‰/ïn×M×-tëÛ;8­nôísI_ìèu
=¦­¿ ^i³¼ºšhö^ß[é^'’òÛOá¼=&±âK†’]Äş×u-zêüx„ÛØ.®ºn—`º•÷‡õ«½GMÓ-?áÔmíôı/ÃÚcÁ<Wúµ¶«¨-ä1¾‘/í?üşíñKş	kñ&õl-5cà‰Nğ§ìßñù­¯<W«kzT’_ê—?üK¤iº ²ğ÷Æı&ïÖh@ğ×lï.|[¡êE†—©èü±ğ­½¦›co'Ä]Ä¾ñ=·¥øÏÄsMy}§øvÆÓK¶¼ºñN‰®¤*-­íõ–7êº×`şĞ°¿…eÓoÊëáã–BtjR•U8<:l-z•'*/©ˆ„pQ¼*P­‡…,$êÍbjáJ›“åûú5:P©	ª´'?m(Ó¯J0Š©>4e,S*Œ¡V•yT¯
qtiâh¹¨ûŞ%âÿ o=ıæ š7ƒ¼t–oâ]K@Ikáé´;ëÁpu{Ë»Ë+MPK=­¥ÌÒêRÁu%õÕ^ÏUƒÄÏâ™¨iOe©ÙÏetŠå\FP¼RÑO’{iĞ‰-îai ¸‰–Xd’6V?SxcPÑfğ_‰4_iöÑxGÂÚî¡éÖ>%ÖµÔ_YXõkİkN·ñ'‡¼9{ªêÏ©Yiºƒ£%½¶™oÓİø~K›­oUÙAÖüY¡é·èş+Ò$}gÅÚæ­]øzXh7v:]æ£h÷l`¾u®o ÿ „’=;H‹Mvv-s¦[%µÿ Ñá3êùtªáñ‘‡ÕğõÕÔ©V0¡iáiâ¨ÒÁb«)IS’Œğ¸ºÎ8yÕÃĞ§˜âT¢ß‹‰Ê)c#N¾OÛU£í]8BRªÜkËR¦&-'ó§(â(SN´iÖ«SAÆVøÊŠ÷­SÀ>
šD¹yüKà;_øFáñF¥6«§·ˆ4Ë{â;Úé6Ù˜¯çŠ[ˆ’æÃS}CPÖ{<P5´¬qá&ûF;_ø;]8è¢[kP¾ÑüT:|º®„Ë§ÜÙ5ÍÍŒK-¥¶¡uqbğËo~–×(Ğ¦§`jEÊR«G—âU(Uq¿NöÔ£W'ÏZ”Z…i´êÒ¾•!ÍàÏ-ÅBVQ§;Û•Â­4äœe$Õ9Ê’q„İçN?ÃŸòJŞAE{fğNòúèÛ?|	§ˆï<(ÖßÚ—ĞjWõ„–q]éÚ]–¯¦hñês$—öqÇ,kc;Î«ëm§Má…Ô´ÛKû+ßxßUÕ<?­x‹IĞìôEğå•ŸöÎ³l¶^-¾[r­õ»­{k¥k×r´ÖÖÉ5½åÚwS9ÀS‹’©:–qMS£VÑrI':“Œ)R‹*’æ«RjI·dÔrìTšN…Ókš¤.ìáËÊU&ùªAZ“NJé+µóö“¤jºö¡o¥hšmö¯©İ³­®Ÿ¦ÚÏ{y97–O*Şİ$•ÄQG$²²©Xâår¨ŒÃë¿†ÿ àğ‡‹4íÄ¾Oü^Ôü3â¯‡ÿ „–“ø>êóKì5§‰5´–kÍJÊÏJÖüK6›0‹Ãi:=”kZ“x¦ÙôoSÿ „[´økmâ·„¾éóèŞñ¿€?áñBÉñÅş(k=:ò=WÓÛX‹PÕ¼&Ş5Ö‘¤ëZ¤z®£á/Aá¨ï£m?Sšá4<wãoi­oşè2øÄ¾4Õl>$èŞñ/ˆu?[øƒÅ>Ô&Ñ.®<WâŸx{Uø};İÇwfÚl^¸ğÏŒ<=æ‹ ëŞ0Òâñ®‘£|æ/=¯˜8ağT¥ì«b%‚¨éÎ2tëû5RñXšu¡
^ÒşËê˜yº•kS«‡«ÀG÷Ç¥G.†š¦"k%ˆ4d¹éórÊtiNRQÒ~Ú¬T#	Â¤0ø†œ¿ÄÖ>4øGiª¶• |BñŸ‹ŸVÒµı'ÄúMÔŞ+Ö¼¥xóÍñN»áÏxâê×ÅVŞ0Òd×ô¶¹×-<Ká+w¥ëoâ˜ÖkÍw³ÛxŞãYøßñ‹À÷^&Ö>k>ğ~®›ß
é^ÓüSã¯êœ‡^ñ­ÿ ˆ4&—Ç~óÂ¾³ğ>­¬Y\øâmBi>Ó&³ª=´{¨øğÜ¾ÿ …½ãÏ‡ß>x@_øËL½Ôš=vïQÕ¼B¾#¸ñ/Œ¬´Ë˜¾Áà=]ôİ(|6³¼Ğ$’Â)µ*Ë6Á—öÏş•ÿ _ñwü3Ä¶ş:‹½Kö|øs¬ø›áï‹¾(Igâx“â†5-Qü7Ò"::'|G®ê^&6ş"ñ•‡ŠµßøgM[¯i:©ñ\{ÍkÀ¡F9’p„+(T£ÒÃUSn´°•èâfñ1–éÓ¤ş·†•YJ…Lläİ\d©ÙZOg)*TSŒÜ]X[Üö”çM{&±R”ÿ uUBÕ#F)rÑ•ã÷Gü¡ÿ —ğÏÇßÚ_ü§â„üc¦üøãkQı“¼âëë‰¼%ã?Œz­™'¾(h	Ô`†?éŸ<o¹£Caik*ê_tùõ!ayğÙ´–şö«“ğ|ğÃÁ~øuğÿ ÃÚg„¼àKğ¿„ü3£[‹m/CĞt[8¬4Í6ÊY„6Ö°ÇùI¥`ÓO,³I$ÖWéØ<2Áá¨á£9ÍR‚‹œäç9Ië)JOVå&äÛêİ’VKåëTöµgQ¥g{E$’Ù$–‰$’ItZİİ²Š(®“3Ìş1üøWûAü3ñ‡ÁÏ~ğßÄ¿†>Ñ®ôø3Åz|Z–¬i—‘´rG$O¶[k¨K	ìu)mµ-6ò8o´ë»[È!?ó½ÿ ‚¶Á°¿´ÇìÑ«'Å_Ø&şÓ¿³jø•|Kâ?†Úş§w¯üpø=Úõ%X´Í9ll¾#|=Ğl/­¿
YŸÚ¶•¦I­ø[Q²Ñ¯¼M{ş‘ÔW&+‡ÅÇ÷´àêE?gQÆò„¹g»§(ÅÍÉA¾^{JÊI5Ó‡ÅVÃ?İÎJ§8'hÉ)FOFšŒ¤ ¢ä•ùox¶ŸøLé:ºIÑc³ƒCÒn®mõi¼N–wº¦­I­ë#Zµ×mÑÄ:&©4WŸÙÚ­úE£Äº-BûRÓ,íã¿´ë¼Y«xkNÓ¼!¥F5¿AğújRÃ'övwq¦É¨Ei¬ŞÅ.€gîÕôûûõÕ'µ±WÖ® mgOÑNÿ \_Ûßş{ÿ ìÿ ‚‰jIã??ÿ áøÉm9º³øëğgSo†ßä¹gW–O_iVòè:78à–oøÄZ…½¢y]ş›‘ şAÿ k¯ø3¿ö¼ğ]–·sû+|^ø3ûMx^-fWÃ¾ñ½—ü3·Ä«+EMM—Dk­>?|=ñ<6Ò\Å÷÷~*ğúŒw7·Ÿp,¾Ãó8ì†½L]D}ú4ªÎnHÓ£Z¢¬ëÆ2¯íªJ.­Uy:Êzp¤¤İCİÂæôc†©EûµjB1RÄ9Õ¥MQr/gÏJ¬iÊ”U':¼Ü³œÚJò“áø Íàÿ ‡Ş‚8®/<0ÍâÍbÊ\Ò,¯uG¥è³}Xdğö—Ÿw§GâıK[µ¹:†»¨êú¥Î•pÿ Úw#YĞ³ÔaÕ<2"Ô£ø}ã¿Új–¾"ñE–›gá¯_xŸJğÎ™}¥Yh~™iy§Y¤ºn’mãkı?K–şÊ¾—O›PY¥³Ÿí/‰ğHø*ìåâİu¾%~À¿´Ğ¼:·÷zÇˆ¾ü;Ô¾.è>'¶ŠĞxfDµñÂSÄŞĞ­×HÕµ{Í
ÖËV‚;kl´ˆc¹š–çæO|&ø¨u_[k_üiğËYø{¬YêöÏ®xWÄşKÏé×z›6ŸhÚÖ§ß.¦öP/ˆ'Ó&–Ò8¬î'š-+OFÔ­´¿ŸÄåÓÃâ ©à}9Ò§^¾.š®±?í‰ÒÅÔçxª¸ZÕ*á¡TÚ<4äá[
¨Óõhbã^„œ±^Öpœ©Ó¡*ÒtqF2¡_a
ôá
Óu&›­9VŒT©×ugÎÚø‚+ŞkÅğßÁŸüOwiãŸÍâÍ3ÃxoUÔ“ÁĞx]µ·Ö¯5Ù-âñ5Ö¬êZÌšDRZYZâÆ1¦ÚÃĞÉñÆš.«yğ»Æö¶¯¦j^ñµáİZK?ø{Â«ñLøqâO›û†ğØ“Ã(±Õ<}'‡|csã:&·sj–ú^™>£ms¹ğûáÆcâÏj¾ø?ãŸŒŞ%ø‰=”útz'ƒü]âO²øz}kÃúM—¨-Ÿ†®5›Y/"×&iãí§M/Ã·òé×Ì†ßëÏ†¿ğGø*¿í¬øDü+ı€¿h»/
_Ãá¥Ğ/ş%øgşWü!Úwƒd×4­[·×¾4x“Áº.«pWYÕuHlµyK^Û[éé5«ÛŞDÒ¬>[<UZ”T¥*r–:<µib
ÂVœ£ŠÂ¬¾Të(ªÑKÖ.jTêbg
Ù×ÅFŒ!?­8TŒ”jÑOrtZŠRÄB1•
Ï§M·JMáoArÎc:|(ñ/ƒ-ü5®é·©â_?‚m~É<:eº^õißÃÚ}Õt-Rö/†õk[ƒ¥êzm½“ê„tT–{ñ¦iÈkø·ªj:Ÿ†¬ì4ßx+ÄzXğ.ƒgá]+mÅºÇ†¼/¨è<#“w¿<]â#ZµÑ-4kK	üTPŒY[jú¥®’«aıxşÈ_ğg—í	­Y›¯ÚËã§Â?€š.«¯[êúÿ „>
è§ãŸ5}:KÛ=Wâ¡ü=ğL.ŞãL¸´Óş,ÜipÏ©Z5åÅ¦±>Ÿcıx~ÃğH_Øş	åuyâOÙÓàn•mñGU³[oão¯.~ |^Ô¬„6öçM³ñwˆçÂÛÙÙ[Éá XøKÂÏŠ¶ŠM¤ŸGƒÈñÆb12´)b%	râá
ÕaÉ*ç£N”ãO	[ÚÂ­z©98IAV¤å
r^.#1¤èR¢¯9ÒM^Œ¥N›R•_vr”\ëÓön:š\ÊîœÒ”ÓşLà’Ÿğl—Æ¿‰%×ş5ÁEWÄŸ>êŞ(Ò|GàÏÙÛÃ~/ñ‡>6üKO'öu¹ñ›ZĞµKcà]ÆÚZ.«ã])ñ/Å:ıııö§ÃkË;1wıèxÀøWà¿ü9øgàÿ xÀÑìü?á/ø;EÓü;áhš|B-+DÑ4›{];M±¶ŒmŠÚÖŞ(Ô–m¥™‰ë¨¯¦Ãa(acËJ	IÆœg?µ?eJ¢äİíîSŠÑ½ånfÛñêÖ©YŞrºNN1éiJm/œ÷v²½’
(¢ºLÿÙ
            [firm_left_thumb_ftype] => image/png
            [firm_right_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ   €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? şıI¬z 	8äàÉ9$c§'Œœâ´ÅƒŸ3'gú‘ş¯¹ÎxïÔö‘øùê¬>¿)< z~c'+€sK€G\t=?©ç¯§L”¹„ùkÇOÜMéí?ñGÚ¢Ï`òÂlŸS÷?¦yÀÇZ˜ñ×¨'/l}G9äp~‡çÔç*:ñ×'òH€!QùéÛşXÍÇ±€äç Á İEŸùh}ü‰¸÷ìt?§½MîCã‘ÓØôïÏ4c9äqĞ =‡>ç¾2xõ …Ì ËCô‚aŸõ~¿Lv®GÄŸşø>ïI±ño|-á[İ~àYèv~#×tÍ
ïZ¼$i¤Ûê—V“jWE™GÙì–iPäWÉğP_ÛÛáüçàF«ñoâ=Ôz¯ˆµu£ü0øugsZÿ Ä?ı™¥¶Òìc;ŞÓH±İç‰5éa6Z&œÛßÌ¾ºÓlo?ÍGö£ı¨ş2şØ<Kñ¿ã—Š®¼Kâİvşiôë3,ë x/F¼šo…|¥É,è^Ñá1Áion~Óu"I©j·ÚµÕåõÇí^x/šøNc_, ÃóÑ§˜Ë
ñUqØØèèàğò­‡JTûÖ!ÕP„ÜhÓU*û_cåæ<8ÃÚÖ–®Üªï&”¬ßÙ®Ö­¥kÿ ¬ˆº…€9v6Ã1R ‚†s×½)~Ñı4ÏıpŸ öØ{ã×°úğC¯ø-“«xKö0ı±|e,ÆY­<;ğ+ãgŠoŞi]çu·ÒşüCÖ¯egy–^ñV£12·ğæ±t²G¥İOı‰«+(e`TŒ‚  ƒÎzœğ2 ã¦ÃqÇg|VÉsš;sUÀã©F_TÌ°|ÍC†œ—¤kQ“ö˜z¼Ôª-#)uáqT±t£V›ì§ñBVÖ2_“ÚKTGö˜yGÒıÜüsÇhûT_ôÓØy`uÇü³ê=±Øg56 èsœŒõê3Ü1ÆGy0ä9ÀêI9>ş½}|qÒCö˜A'sş¢lóéò}1ÓŞ´ÅŸùkßŸ&aÛâ.¾ıqëÒ¥ëÛ<ç<dûuÉã¥ÇœóÆNÈèIÇ|Ğ&æ xósÜù=9ÿ ×Üõ5*u Iê6’AÚrƒòKòú_»?œğN0Ä?.?ÚtøØó“ÓÓ ÈÉé@º¥äÿ ˜²cn‡äbzú ë×Ÿ`38 p1œxö<síœôäÆÿ qù9sùt<ú“ôç¯gvêzgüc¿L~]{Ï^Wœ89O_©üûRç8<vìIØ`_qÏ˜ëó7_éÇ~¼cñƒÑ±n¼ãú’AöëÛß4 ìãŒ¨ç7qƒÛO@?:ù¯ö³ı«~şÆ?ü]ñããF»•áÚ´vm»Dúï‹üIr’ÿ bøCÂö2ÉÔµínâ3¬–h’ãQ¿š×M²»ºƒĞ>5|hømû<ü-ñŸÆO‹(²ğÃïhÓë^!ÖïÜŠŠÇºŸ>ÿ UÔîäƒMÒ4»T’óSÔ®­¬­"’yãCşl¿ğTø)'Äø(ÏÇ)ü]©CÃ|=ö™ğgáŒ·[áĞti$òçñ6¿mo|qâhãŠ}fñ‘i¶‚ÓÃöMg§µİÿ ë¾x[ñ8æ®ªá8k-«NY¾aË*¯IÇ-ÁI®Yc1³œí(àèKÛÔRœ°ôkùÙ>*ZZUæ­JiÓÚM]{‰ì·›\«í5ãŸ·_íÅñƒöùøí®|hø¯zÖ–jn4Ÿ‡¾±¸šoü8ğjÜ´¶^Ò@¢âòl%ßˆuÇŠ;­wU2\È¶ö‘iö_“èqÏ<g=ºã¯çúRmêwu?N€ÿ /N¿¬Ÿø#¿ü§Â¾x«ö€ı²tbÛFøÃà»ıàGƒ¡çH×4Y…ÛãmÃ-áÖ')ß¬/#¸°—J’]kR³»‡TÓb‡ûËˆ¸“…<,áŒ5|\!—å8/«åÙn[€¥Wªİ”h`èJpö³§MTÄb*N¢|”êÕ©RU&¹şJ…F?%ÏR|Ó©9¶’Ñk9YÚú$’ê’VLşMÁäÜƒ‘Ç#üc\ã¯ı–ÿ Á?à¶Mâá_ØËöÀñb6^øñ›Ä{¾¸K]7á·õ+©0Úú¯ƒüKq"¶¸…4=YÎ³Ş³üÜÁ@¿`ŒğOÚ¯Â?‰–òj¾ÔçXø]ñ&ÎÎXtˆŞì·Ô­·­½§ÇÅ’W¹Ñµ |·¼Ònô­SPødeX2±B¬*J•pr¬¤©¥H à‚æâ~á_xN*•ibğ8êÆä™ÖFuğUçSÅa¥%µ^Ë„«ÉígB¼iÖ§Rt1Œ¿{8Î/–­)^ÒI«Æ_}ã4¾%£×ı‡à´ƒĞŒàæ=¸ç<w\ç9*qõÇ'¿Qnf¿“ø!ßü½~#Gá_ØÓö»ñYOˆpCk¡|øÅâÅ	ãØ UƒOğ5+†|m*xoÄrñtqÿ fê3¯‰–ÒOÿ X£$d$úr3“ı1ÛgßşrñŸg|b2<î‡%Zw©…ÅÓRxLÇ	)5K„©$¹©ÎÍNÕ(US£Z1©	#íp¸ªXºQ«Iİ=%ñS“pšèÕ×“Vi´Ó¤öë¹9Ÿ_§Ó4‡Œr¹õîr=G#¯^ıxéHGL’—aÆHã§=#ĞÒóıæêOa×½:Ÿs_&tÏ'§OsÈ8ØHÇ¯lÔqœ!ä™Èäçıcv¾Ÿˆ<Òàú¶zã¿~£?ç#Ö˜:œ’ı?ßn:¯¾zz‚ê½çî I8ä#ú>^9=ûñÿ ×§ 0;’ONŸAÆGø‘šl€ùrö[¹éƒïqùc½/aÀ#Cœ·#Û§AŠ.Õã?ÓÛÓ¦}=Nkœñ‡‹ü+ğÿ Âş ñ¿µİ+Âşğ®‘¯xÄZİä:~‘£húe»İ_j…åË$öÖĞDòHîÃ m
Ì@;×7ZA=ÕÔÑ[Û[E$÷Ê"†bC$ÒÍ,Œ±Åq«I$®ÊˆŠY°‘üÁp¿à°—µ×Š5ÙövñÖÿ ³/ƒ5†_x£LX›ã‡Št»ŒEr³FU¤øq¡]Feğı¦^#ÔxŠñeµƒBH?AğãÃÜ×Ä\úWRÃà0ü•óŒÒPr£—ášÓhÔÅâ9eO‡ºuf¥9rĞ£^­><n2
‹©=dî©Ã¬åúEo)tZnÒ:ÿ Áb¿à¬'ÿ ‚‚|P“À¿ïµ_şÊ¿u›øA|; ŸO¹ø‡¬Ú4¶§âW‹ìÛd¾mÔm/ü"zò‡ğî‘?sm»¨ˆ?89Àì ÷ãéÜ:2@éŒËò>Ÿ+ëßØöpğwíAû@xWáïÄßŒ>øğ¦ÚhµÏ‰ü}ã/x>-;Â–W‹í3Â¯â{û+m[ÆØq¦èVpÅy”ó>³©[¾›§\Ç/úA–å™pÌpx
QÉrLêÉS§:øŠ¾Î<õ«Ô(:ØÌv*iÊ\•\Ey¨S†°‚ø©Î¶2¿4ß5Z²KV’WÑ-]£­7²JíîÏÔø!·ü~çöÓø™Çÿ Ş™eÏ…zäE4İBŠßã7´ç[˜¼#j¬®ü ¸ŠïÆ÷hËä’Yxb¸k­oû7ö“öıÿ ‚Ú|JøñëÅ fü>‡EøC©§„¼Qâ_èú–¨º—ˆ4˜¡‡TĞ|?£iz¶ƒk¤hºÙÑšwk‰înm.Ñl­#§ıoøCûTÿ Á4¾|3ğoÂ…µì­á xC²ğ÷†´;ãgÃ…†ÎÂÍ6ïšVñ!šòúîS%æ¡tòİêóÜ^İÍ-Äò9üı°?à?
?mÚÆ¿bÚóö]ñŞ¹ñ6Kïxçá|¿ô}O]Ğu…²ø«ÅzCx8x¦êóÃ×—SE©ê){afÚf¥,iyqİ¬6ÿ åïÒOŠ<Sãê²Îr<£>ÀåØS¥ƒÁSÁb)ÖÀdö“öÎU)û?¬â«F\Æµ9:ŸÂ£	<%£ıçô£ônÀø›˜SúEÏ'E>Å¾—¼Døj\Hñ˜$ãšÇ	uÍ¯ëë-Xåıœ«óÊ¢úóÀ³ôWáÆ£ğGşÉûx·Â<gàïˆ>×n´[@Ss{ğÛâ4z<:‡‡~!ü?¿¿ßxšV¥e{ê:£tñjÛëÕd¾³÷óŸ¶?ìyñ“öøáâ?¿tSg«il÷Şñ-”SxûÂSÏ,ZW‹¼-{"s§ßŒw6®Eö¨Ås¥êPÃylÊºÿ ø&ö¯ûşÁ5‡z‡íÍû1x·â‹¼K7‹>#kÖß~Xi‡[[+]&ÏCÑlî¼GöÈ´ÂÉ I/ñy}¨O¨ßË”wQiÖkÿ µÿ ‚\ÿ ÁD~Şü8ñÇíƒû/xÇŞKí[á/ÅoŒŸ'Ö|	ây EÄƒş4—Rğ®´Ğ[Zø§Ãí<Qj6‘Aqm-¦­§éº…§ê_G~<ãŞÁåyOdùŞ#(ÌaMæÔã–c*ÕÊqµ,s<)QpnT½—ö¦‚q­%*ØxºĞŒ+~ô‚Áø]ñ_ªø9>_¡Ÿâ¿ÕVX…™j…?i?×ÚÇ,»ë¿ZyCÇ¶G-ú¤qV¬ê[üêáš[i¡¸·–[{›y#Şâ	àšYaš	bd’9¡‘H¤‰„‘ÈªèÊÀı¾ÿ Á¿àµ|i´ğ·ìû[ø©!øÉeÂŠúıÊÅÅ{(ËÓüâ½FfH—â=¤
–šN§tcoC6÷Ïââï®ÿ ß<¨ü-ñ÷ŠşjºÏ„¼G{áMfïIøÄúWŒ¼®Ånù¶Ö|7â}âëMÕô}JÙ¢¼³¹ŠT™c˜A{mg}Í¤m­åÕÕ­õÄöWÖsÁygyi<¶·vwvÒ¬Ö×6·02Ooso<qËÄO±L‰$L®ªGö×p.CâOgãùTİ?­dÙ½ÆxŒz´Ô©â(Éòû\5hò,NR<M+kN´(Ö¥ø>[[vj)Êê3Šjñi-$µå•›‹¿G$ÿ Ø`ëëê3ƒ§éàÅ.Õôÿ <g ëGrIú×óÿ @ÿ ‚ÒCûGYx{öIı©üA¿Çİ2Î=7á‡ÄmJT·‡ã6—anLZ·3•?‰šuµ»2Ê¾ZxÊÆ3u+­Úß-ÿ ôïéĞúsßƒÏ'>£8ú×ù·Åü#pNw‰È³Ì?±ÄĞ|ôkBòÃc°³rTq˜:­/kBª‹è§J¤jP­
u©T§·Ãbib©F­'x½zJ2²n2]¿ÏutÓhBƒÓğç§×ÀàwS# ¯Nw?Ğüí×Ùã=>’qÇâpIÎzqÏçƒµc)ï—êHÏï·qÏô¯˜6ê½ç\~íÉäìqĞq…>9Ïò<ÒŒø tààß>ãA÷4ÙîÜî'äaØäà}½:‘œñÍ<t¸üO°9ôÏ\cP3òcş‹ñÆ?à˜ß´¾·àk‹»-WZÑü-à]CP±wêËÂş=ñŸ‡ü%â©c–"$ƒí>Õ¯ôçZ4¼gVBóFïó:Œñß¿Nz†«×ÇØ¾|zµñÏìKñŠşÕ/~3ü,Öe‹ÂšŒŸÙwş-ğ…ÓO¥êºç€u…6Ú¦¹àQ,õB2KgÂwrø{YÔlm¬5]îóø;ı¦?à_ğP‚u|2øG©şĞßä¹ºŸÂ?¼©x^¨é>iû4^#ğö³¯éº¯‡uø x–şÍ ¹ÒåŸÍm'TÔ I/ìŸ£wğŞE’æÙyŒÁäY+0şÚÂâsZÔ²ú¦][	‡ÂÂ8|^*T¨Ô–¶»ö^Ñ9*ò•7G³ùœï^µZuiBU¡ªR4æéÔRrÖ1¼—2’ÖÖV´šº¿âVzóèNpxè	'>qB’¥ˆb8ç{÷ãœuã?…~˜ø#wü ÃüUÿ À¿~ó7~ın(ÿ ‡7ÁP?èÌ~*õÏü}x×?ô7õóƒëŸéŸõ×ƒè®áüH2Ÿşl<?ªb¿è½¿ëÍ[ôéÉæ–û}Çæ÷äïnŸŞp=úşŸ†+ıàß¿ø'£şÊ³XøûñF6ŸiM#I×^Şúßf¥à¯„ï³Rğo…ÊÌ«qg}â’øÙ–)#¸ŸFÒï"5øAÿ Çÿ ‚şÓŞ0ı«ü¬şØß|IğÇà?Ã©Ç"ƒÆ>ˆ:¦ylú€-ìôoT¸ÓVÔ]/u÷š´>Ó5	%[JÕ_ûå(Ò(•#Š4Xã5TDUÂ""à*( Â€£ü»ôŠñ?ŒÁáx+†ó,&;‹TñÙö7.ÄÑÅaåJRÁe‘ÄaêT¥'*´Ö/ÊñTğpm©Õ‚÷²\¾Pœ±U©ÊáFƒŒµKš§,’kOv.İgÙÁü+ÿ ØÙÇã~×ô6¶ø'ñÓ]˜øïLÓmÊXü=øÁ}æİ_ÉåÄ<«MâIõËlGoâu×¬3WzE»6[Û»¶Ç-ß¿ãù¾Õş·?´/À‡_´ßÁŸˆ~+hñk~ø‘á»ïkåP]Ù=ÂoÓõÍ"áÃ›{@Ô¢´Ö´-F5ó¬5kK¨è«üï~0Á¿à£ß¾(xëÁ>ıœ<kñSÂ~ñ¡§xgâ/…®¼$ºŒ´åó4zÊÿ Z^Ú5íŒ=İ…Õ´Sé÷ÂæÉÃıœHÿ _àg‹™niÃ« â¬ß—æÙ:TpØÜÓ‡ÁÃ3ÊÒTğÒöøª´áS‚å¼yJ”VİIË(sf¹d¡_ÛaéJtë6åtå7N¦—ºŠo–m¹'²|ËD•ÿ !F2y$q“œŒ O9çÓ§`üÏcÏ>ù=É€¿LáÍßğTÿ ±—ÅSÎãëÀÿ ü×vãß#¯j_øswüşŒÇâ¯\ÿ Çßøü¼]ş}òk÷?õ×ƒè®áüH2Ÿşl<¯ªâ´ÿ e¯ÿ ‚jõ·÷?½ıkoÏ/xƒÄñ…¼UàËËÍ?ÅŞñ‰¯xZûNyşÓÄZN¥m¨h·6M-Ü:•½´lùŒ@É<¯N‹5íÎ¥\jp­¶¡q¦YO¨[¡ÊÁ{-´Ow$“ˆ§gA×€2z
ş/?à”?ğ@zÆüı·¼+§|;ğWÃ]oNñ_…ş]kZˆüSãißh3ø¥<9¨ë.‡áM*ş}FïMºÔæÖu™í£Ó®ôÛ5îd¹şÈ4Oˆ^ñ'‹|[à­U‹U×|ºD~0ÉLÖŞÔ5ÛWÔ4½P¼SöhõÙôµ‹V›HYúÇJ¾Òõèmmµ)ï?¾‘üaqVm‘à8{‡Í¿Õì.cW3Í0'˜ÖËéÑÂÃKš•háå‡N¥HNt#[N„'íı´Ód˜j¸zUeZ2§í¥NœıÙ{ŠmË•ê®¤ì¬¡{Y#´ äóß„ç¾9àüc@ÇŒesÎn®Ã½O‘Š“ ÿ ‘Ç¯9ëƒø`ÔqıÌäšAĞ®zw÷=zşf=¾«ÑşqCû·+g¡çlö8É<Ò‚vôw8Æ:w=zñÇ^[ >\œÿ g®ÉëÆ>˜äÒòq„ç·¸ÎqÇĞd@ÏÍOø*wìyâÚ×öl»ŸáF§©øWö™ø¨?Å¿ÙÇÇÔ%Ñ|I¥xûA¶ygğå†µm$76¾7Óá“B¼äµME´Bée‹O17ãOüûş@ğü!wŸ?à¢K«xâg‚a]>Š~ğN»ªéş=k)…Õ·ŠüáÍ>÷Sğ§-$RÚ›ÙéÉáÍMãºxm¼=si—Ö=ñŒg¿¡rzŒó§©¿’_ø)Wü¿ñcöıª|kñÛöVñŸÁøGâ‚EâxOâ«ã
};âEÜ×Å–…¼â«9tºÛk·	<ÖsÁ®Şë…íæ€§íf|œå¸Î
ñ&ªÁe”¥,Ï‡søTöÜŸ)ÃûC/£Šö•.cñÃ×£W±ñ=ŸÖkÒ«/OJ¤qXÍQû•è½aV)Zq¼}ê{sFJ\­/…4ÿ Jâ!ø%näºø«öE¾-ç¿ıJùÏÓë…ÿ ˆ†?à•Ãş§Šº?áK|[ÿ æ@~XíÛ·ó·ÿ ºşßôV¿e.:ÿ Åeñ\ôëœüéê(ÿ ˆ]oú+_²—¿á2ø¯ÛõG»qíÍ~‰ş }ÿ èáæøuÁyÕ?äşÿ #ëyßıÓÿ À%ÿ Ëèÿ ÁÂÿ ğJî1ñÓÅ_øe¾-úuñGğyéúõÉÿ Á+èºx«ä‹|[ã®OüŠ‡ç’kùÛÿ ˆ]oú+_²—ò9|WïÏıßÇÿ Ô0Ä.¿·Çı¿ÙO¸ÿ ‘Ïâ¿×şˆ÷aëÚõèßÿ G3ÿ Ã®Ëş©ÿ '÷ùÖó¿ú§ÿ €Kÿ —ÑüD1ÿ ®ïñ×ÅGşè·Å±ÇşÃ#·|Ñÿ Á+³ÿ %×Å8õE¾-çNOüR¾™šşw?â_ÛãşŠ×ì¥éÿ #—Å¯ıŞ¸ï×èÿ ˆ]oú+_²—§ü_¾¿ôGzãŸZ?Ô£ı<Ïÿ ¸//ú§üŸßä[Îÿ èŸş/ş\Dgşÿ ‚Vÿ ÑuñQàğ~|[ëÏıJŸ^†”ÿ ÁÃğJŞß<T:óÿ 
[âÙçœÿ Ì 1ú÷ü¿ø…×öøíñköRçŸù¾+şòGyàwÈã¥ñ¯íñÿ EköRì@ÿ „Ëâ·n˜ğ§zqŸÿ UêÑ¿şgÿ ‡\—ıSşOïò­çôOÿ  —ÿ .?`¿kø8Wàv·ğòÇáÏüÊ}ãWíAñ__Ó¾|<µÕşx·ÃÚ'„µo\C¥Øø†ê×ÅZN’¾$ÔÖòòoèV¾m¤ú›¥Ö¶ñév“[ŞşÓşÅŸ³›şËŸ³ßƒ~ë:ıï>#]­ß~3|DÕ®d¾Ö>"ücñ„¿Û?|_©jé7_o×&šÏJå¬t+MM°ÙF«øÿ  ÿ ‚üQı¿jOÚ#öñwÁÿ  h’|)Ğ~ê~+ÖÅ·õpÚt'×ÅğœVßØ$—É¢Giı òêš¢ß?Ø¤Òmšãúç±ëƒÜu†î@ëß¹é_”x“_‚2˜á8SÃÌMLÇ)„£šgåz±¯‰ÍsÂTğx7^8l,~§•açUÓ§F:RÄãkÊ¢©VŒjø(âª9b1±P©ü:T’´iÁYÊIsIóT•®ÛnĞVÑÙ&Hè02;õçÉÏsM;{`4‡§ûl:ş|ãéiøÇCÛÔ÷õÆ:}Iæ£LíãûÏ½äpGÉÇ'İ3_“‡Uèÿ 8ŠüFø×İ9ëÏ ®:RŒÌHÇ§RâÇ^İF(sû·äòÿ  œòz~>‡ø³€7Êq1ÈÏ^‡‘Ğç9éÎG94^öìx#í×Ó®G4§¦0ß§¿=úô$ğFM `rqœß$‘Ü}:sHaTÉ ‘×·ã©è?  â}›¨Ó<çÿ ¯Œc"ŒöÁ=x!yÇáÛŒcõÆ) ƒŒzí “ÀÎ@Ï\ô'ŒqŒô¥8zó»sø3œë€Ã?ø.í}ñ¯öCø_û(ë¾:Oû;Z|Uı¬|ğ¯â‡Äûo†šÅ›Ïü5Ö¼-âıC]Õm<­ø{ÄrëZCé–º´6:=ˆÕïŞÅlmd"åâ“à¿Ù[ş
iûJxËÄ_ğQxSöËĞ¿lO†ß?`Ÿ|}øñç_ıŸt/ÙÇâ7‚¾8éf²úG†-~êúF…}ã
ÛZZwRñ%×ƒ¯|=g¨A¥éZŠÉ©ïØ?ø)Çì-ñ?ößğ×ìâŸş0xOàÏÄÙÇöŒğ—íáÏxÏÀWŸô+ıcÁº7ˆ,´­6óÃ¶¾#ğÉš¨êÖ×—kç†{{Y­L@Î%ãÈà”?¼QñãŸí-ûe~Øÿ ¼wñGÅ_±§ÅßÙÀ¿şi_~x@ø¹ag¨ø³ÆvÉãMkSñ¥Æy~ZÊÊûYÓ`…&¬âXìM©ı_Ó-8Û]ïÛÍy=-uºô}~	øÍÿ &ı¶ôÏ‚ğM_|Hı ş#şÌ³ÇÇ_ÙCø¡ñËöÒøUû+xö¿¹ı õ	¶§ƒ|Yák_jº/Ã¯
#ì:ñ¾Ò</º”š•Å­’]>í´ïİ¯ø%oÇo‰¿´?ì‹áÏˆ_~;|ı¥|Aÿ 	g‹´7ã?À4¿Ó¼?ãOé7°Pñ„õÃsøâJÚNañwƒãÒ-môÙRÎæûb|/¡ÿ Á8?i¿…>ı’ôïÙöÿ ğW†>&|ı’ü7û>ü@økñ3Áz‡ÅOÙçãƒtI­¯l>(éÿ  ø‰¦]øWÄBëQ´şKëñ¨é§BÓîoVßí+ªıİÿ Òıƒ[öø1ãŸë_#ø©ñâÿ ÆOüwø§âı7ÂzÃÿ 	Mã¯¦•¡§øÀZEÅŞá?
éÖš=œ6lW72ÌÅà·{k Zr­“];úéÿ ·5äÑlı1ÆOocƒÉü0ƒwÏy#óüG#­'íNxëúã·qÎWŸ×ÔŒg=‡å2rA æ‚Cê¿§sß§íĞq‰Á†Ç~œ`öü¹úéYŸˆ4-}6×WÖ´­*çY¼OÑàÔu[)µKù^4ŠËOŠæhöîY%ŞØI;´¨‹.lsê=Ï¿'¯'Œ“@	ÓŒ7SÆzúäz÷É=©‘ò¼÷ß$wù›}>Ç¡ëÄ7·¶ze¤×Úå­…¬f[›ËÉÒÚÚŞ5Îéf¸™’(Ğó4ª2#©‡JÔ´ıcM´Õt‹û=SKÔ [ËGO¹ŠòÆúÒàmî¬ï-¤’ŞâÚxÙdŠhdx¤FWG! ]W£üÑ%üòÂöÑn.,ŞæÒêİ/,Ş»´3Bñ­Í«MÄ+qa$&X'ˆHŠÏª
7àïş8üKø'ÿ »øÏãÈ>"øËÄ^7µı¹>:ü¼k¬ÂEãøcÆ_ğRwölO]jwp¥ŸöÃ¯‡ºâjš!û:?‡´èÆ™•nÖ«ûÍwÖâ$±	¡š3$ysGæÆë¾)Tªr>>WPÀ`f¾PğoìEû<ø7àÄÿ ÙÑ<9âüøÃ«|A×¼}àßˆ~5ñ_ ÕuŠšŞ©âˆ7öº‰u[ıcH›Ä+Öõo\6•h,<E}.­¤>íbxÂ¿ÍWéıv?#?kßxÏş	Ëñcâ„_³¯‹ü{mğ÷âÏì}ã/YxÏÆ¾*ø¥ü'ø³¤şĞşX|}Ó%ñş­â)ôSVğ¯Æ]{Vñ5ƒ\Çáßj´íJïM[êsOèŸ>|XøEûQèß¿d_øúMö™ı•¾(xïâ?ƒ|uñÇúŞ™yã/€Ÿÿ g|Q¦ø×Äz§Š5¿‡~%øÉğûâ_Ä/†^$ñ„m­®¯ï4=¢Şhà~™x?ö&øá‡_>ë:'Š~,xâŸƒ?á[|A¿øéãïüdñW‰şEk©ÙXü>¾ñgõo^‡ÁšDÖ±.— YŞÚØÚjZ¶­®¬M¯jš†§sĞüı•~ü²Ô¢ğ}çÄoëš¦…eáWñ¿Å?‰ş:ø±ãÛéåô_é1ø­kúŞ“á[Ë›»-"ÂêY5_TÔûSw¼`ÛOø:/òùöGå¿ì¡ñËOø]ñ’×Á_<mãNÇÀ¾&ñ?Àÿ †šn—ªx“Ç¾	ğ%×Æ¿ÚÅĞø~ÛâŒn®UµH|5â-;Ã²Ã_êš”ƒÄ¿¼~!šÏA×!Ô§ö_ø)İïŠ´o‹?ğMMSÀ¶zæ±¯êŸ¶…·†o<%¦|CÖ~i^:ĞàÇÅ?…¼Qwc;i†‰ÿ 	„|=¯}^ÒõK6¼Ñ-@y„¿ªüı„¾ükışkr&ñzãÃ:O‡şøPñ7._â­§Â]sVø¤k!ÑÚâëHø£âo†Ş*Õ5ß‰âÿ këñµã=Nò‹èõô¿ÆÙ«áwÇ¯üñoÄñTºçÀ/ÅñGáŒŞñŸˆü+ãˆ´Ëİ=fşÏB¿³¶×öèš¯£ÿ gë±_é§k:œfæéA_×â~Føwâ·Ä?şŞğQß|F½Ñ?gÉş~Á_ > èV¿¾+ëŸ¾ü>ñˆ¼UûBiÚÇÄíWKÓ—¢Ù®­€¼ˆìôMÓYÔì¼-igè¸ÔK?%ñ?öøŸñ«ö|ÿ ‚²|ø¿sÄ/xş	ÿ mñ›áÿ ‰üSğJïà¿ˆ/¡øŸğçã|W0j?õßøít›-cáÆŸâ?j½¦‡âM=/^ÓT³¸»Ó­µYÿ Sş%~À¿³WÅïütñßÄOx£Äš¿í!ğ‹FøñrÊãâŒ ğ÷ˆ~øjëQÔ</£Ùx~ËX·Òü=}áWYÖµÄ¶¯ØjºÎ¥zš‹K?ÉÅXÁ3¿eË1ñV{ÄøÃ¯ë_>
Ãğã/‰|Oñóâö¿âo‰ß`¹ÔŞ×ÅúÆ£âù®5MvÏMÖ5?é~&"=oBğµíÏ‡ô½/MšXd
M.»t·ç­şGÌ?³–•¥ÚÁCşjVºu…¶£©ÁşFşKxo/–Ïã… ³—1Æ&¹°~æÜLòbıÜaWŠÂÿ ‚¥øÿ Æß~>~Ë?´O‚|Kâ½+Aı™tÍ{âÇÇ¿hZö³i øÓàOˆ>*|øIã8¼[áûK±¥kø+Ã>>ñŸÄ]BÆâm2ÿ ÃwÛMç#´Ñ~(şÄŸüe®şĞ¶Zoí‹?e¿|<ÿ ‚cë7º¥Çõ˜´É<WğãQğ7…µ?jZäº^¹áÛíwâ—Ãë˜¾&jÖ’]=åıÅÆ²öVÏ%}éñ/öOø5ñƒÅ¾4ñ‡Ä?k×>
ëß³ÿ ‹|?/Œ¼Gƒu_…Ş&{éõü!úhPê777óÜÿ ÂE”zôrˆjhbŒTí¥’Õy%åêµì~Xü!øÓâëïø)Ïíñ#Åî-şxçö,ø‘ão‚šg‹|UªZü-ğo‡g?Çágˆ¼om§›ƒ¢YZxÕç¶ñ¾»âˆôù¯¤ğÕŞ˜çì°_µım_Ş3øÕâO…š§¼;ñ3Ã~"ı†gı¦¾|Pºøâ/„š,¾1Òü_ÿ |º‡…ü3«øÒOøËáˆÅşŸ®xzïWÿ „oYº¶´™ìõ»ëVÖêËìíGş	Ûû*jšïõ»¿kşWÃ¿Ùç]ı”ü3á¨|{ãKCğÄúE‹âO‡ºŸ„àÖ£Ñ5»vÛKÑîµ-SW³¼×¥Ô´m'RSîÊ)+áÏüSöbøYâ-Æ>ÿ …Åqã/|ñ'À7Å"øõñoÄú÷ü*Gk·¯o5¯Ş&¡¡ø9,â Ú^Á<>¿’ë[Ñãƒ^»¹Õ$OŸ¢üÿ à™ùñ;ã—íãïÙ_ş	}ûlşĞ:_…>-ø§ÆŸµìÛñgá×Â€	ï4ÿ øvgàWÆ=C_ğv…«x‡ÆúõÇ‹uê1éW0ˆáğ†ŒÇ§]¶±ˆÖëöı¸~:k~
ıŒ|'ğïÆZ'Åïˆß¶„¾,ücÓ~#ü)øW¤I¥øáßÃMÂ÷³øGÃşø—ñCáúkŞ,²ñ|9¡kÚ§ŠõıR†ßGñ…ÔßômAaÒ´?¹lÿ `ÙëNøaû<ü²´øƒmàOÙ[Æ^ñçÀí9>)xóíŞñ„ôûı'Âí>¶ÚÛjŞ$Ót'UÔôÍ7Hñ-æ¯§ùà¸·¸_,ÇÄëğLoÙ?Wßqa£üNğ^¯iñ—Å|¯ü=ø×ñOÀúßÂïˆ^;‹UÇÒ|%¼ğÿ Š¬‡Ã|@}w[»ñ¿‚¼+áOêœº†³¤]]Ûi³Yu¥üÿ ¾ç©ñW~>şÕ_¾xßö]ø« ü>ø	ñwÃŸğOÏ|{ı¥ìµoi¬5½CÄš×ÄÏ†Şğ‡„ü?.ü=¥h:ÄµŸø¶ê_x¶óÃÑë¾ğ¦|Ú„wúô_¡¿ğN}«ûşÆUTÙ{à^Ğ€ü+_à 0 ÆG9ã¾?à²÷ÄmOÀš×ˆ¼5ãHµoxÄßæÔôOŠ¿t-Kâ/ÃOj2ë^/ğÆ]SKñDŸÆ
øŸÄ3İx“_Ó¾ İëãU×¯õ]FöY¦Öµq}ôwÁo„
ø	ğŸáÿ Á‡6úµŸ>øcLğg„,µ½{Xñ>©eáı²Òì®uí~ïPÕ¯şÇiVğIyy3Eo6ñ”‚Q vÑ+ßÓÒúúìzl„ùru9Vü01ÏŒy¥Œ¤O?†1^:öÆ À²ºç”€F\ã©ìs‘ÜgŠËœËeÀã>Zãÿ 7¿?Ÿ<P"lûş<úıÑß§^:
7œ˜ïîxèy>ß‰éPˆçÿ £¡ê”ô>÷ñë×­&ÇúáĞõJ>£ï3èGµù?Ãüÿ «?+şLşÙ3Ş[ÿ ÁIà–³i±G>ª¶?·1Ò “îÜjşÎÑÏk©	$‘†R$‘Œ€¿`ÏÙ~×z„5¿‰µòÂúñÂÚágímû=ø>%h_­<}¯ê—P^j?Cüa×?áWßüñV”ßğ§¼M£øáÅœV—¢ø^ítcMÓ¤ıö×gßx§ãŸÿ h/İ{Ç?<1âü.†øÛ®‡à$ñÔV¶~9×t[!†Y|Iâ­.ÂÃB¾Õµ;«ö²ĞíåÓ´htèµMeµ/^¶Ñ¬l®¯/­-4ûKİEã“P¼·Óí`º¾xcò¢{Ùâ-ÓEòãiŞFDT… wÓgøi®Ûë½şÿ Ÿò£àˆµzÀÖâL¶‡€~"Áüwá™õ^X\şÕ:LZ•å·í)w“Kö?íÿ ßYj^>†Dº··ó_ëLºb$ÏãkGÕk¯_³oÿ jİ7öfñÀ_~ÈÏûXø/‰!øÁâ„ğ—5Í[Pø ©ñ‡ÃšoÅ½kâwl> ü9ø¿ÿ €¾'xT‡Q:GˆöË¡ÚXÿ IÂÊ1°·'’é1kÙu!“Í0FÙäó¥/(Ã¿›&X™5æÑìno­5;‹M>}JÁ&KBm>Ö[Ë$¸ \%¥Û†İ&«2Âè%
†Àòİyotï÷i§góş`>8øÿ ÀÖß?à©?iñ‡†-Í—ü¯ö+¼»YõÍ2'µ´°Ôÿ àŸ©}up¯r{7ğŠÒêyÅnşñÌèÚ6¢-½^ÃÅ:§Æ?Û{ãnƒñKö²ğïÀ¿¿ÿ m¯‡Ú§Àÿ †ßÙ>8½ø¹ã¿Ù’ÛÂ~¼ğ§†şx~Ëâ¶‘áOü(øËk{ã˜> ê–	<`öZ´šî§âYÂŞ—Ã¿Ñ#hZl`}?Lc3˜>™hŞcŸ4–”%É7|Ì“4Ùÿ XûtK¨l´ã©ÛZ›;m@éÖŸn‚ÍØ3ZCw·ÏŠÙ™šDÅA(JŠÍ{hôôíúZ_ùëøû2xWö½øWÿ ;¶Ñ¾3üO½øÛmûOşØ?~ø®Ïö†ø§xßô«/ø{[øim èšwÆŸ¤éx£ÂÚ\ĞêØËª\hjŞ±Ô“Ã2Ë£¯ÜğN}wTı£´»ÛÄşñuï…~ıŸt¯ê:—‰-t½7Ä	ÖîÇãª|5¨Ş}…õ+oŒÿ ğ“|2²ñÚ{ßê>øaae¨\iºÀ–çî?‹_µˆşğ§ÄïüÕ×W°ÕÆ¿
ÂÖ%1ZÇyku¦OŠ<;âêuı–£y‘jzëZ\µ¶©¦½¦§cgycğûÀÃøkÀ†K/øWJ·ÒtÈ®ïo$ Z[íJşâG¹Ôu]JåçÔ5mRéïRÔî®ï®K›™]7{|»vKôÿ ‡;làƒ=3ŒgÔqŒõÁã<ƒÖ”’=yúã¦º}Áà{š‹dä¯®t§ûèõOzM“ãıpì ò×Øûİ³ß¹ühÉşçıYù^lŸCÓ±=†@ øï“ØúS#8_l¸î92?N=¹?—9›'?òÙyàşízsÏŞÉâôVU
ÇqÉÉÀ^¬X‚3¤ÎîPS·GøØmQ@Å=şB’Š( ¢Š( ¢Š( ¢Š( ¢Š( ¢Š( ¢Š(ÿÙ
            [firm_right_thumb_ftype] => image/png
            [firm_other_info] => 
            [firm_bank_details] => INDIAN BANK
            [firm_bank_acc_no] => 6055720590
            [firm_bank_ifsc_code] => IDIB000B119
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 4
            [firm_own_id] => 101972
            [firm_name] => CLD
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 293
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-06-03 18:03:20
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"SJ","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"SHIVAM JEWELLERS","firm_desc":"Every piece of jewellery tells a story","firm_address":"B.T.C Road,Howly","firm_city":"Howly","firm_phone_details":"9101618753","firm_email":"shivamkar54@gmail.com","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"JOY MAA KALI","firm_form_footer":"","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"18BXVPK3167R1ZA","firm_since":"2022-05-03 17:25:53","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"image\/png","firm_right_thumb":null,"firm_right_thumb_ftype":"image\/png","firm_other_info":null,"firm_bank_details":"INDIAN BANK","firm_bank_acc_no":"6055720590","firm_bank_ifsc_code":"IDIB000B119","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"4","firm_own_id":"101972","firm_name":"CLD","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"293","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-06-03 18:03:20","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101492
            [firm_name] => AAJ
            [firm_reg_no] => 123
            [firm_type] => Personal
            [firm_owner] => Self
            [firm_long_name] => Amber Akshat Jewellers
            [firm_desc] => FINANCE AND SALE
            [firm_address] => nala bazar
            [firm_city] => 
            [firm_phone_details] => 9412591853
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => d41d8cd98f00b204e9800998ecf8427e
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 29901710
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2020
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 61
            [firm_pan_no] => 
            [firm_tin_no] => 12345678
            [firm_since] => 2017-10-09 19:19:52
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  “ €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ÷Úƒã7Åı¦?à³ş>ÿ ÁT?à Ÿ²—ìÏû~Ò³ÇÂÿ øöZ¿Ò|Agieñ»ÁšL6ĞÚxc\ŒyÁâsŒ¶VñG¡u2Jê«_üTıªüEãÏø'gí·ûj~Á¿ğ[ø+'Äÿ ~Æ:ìÕcâoütoøÃºŒŸ´GÆm/á®”b›Fğ³Ò¡ñN¤ÆÖâ×ì÷ö:dsùÖ÷R ö/Û/Æ?²V£ûDÿ Ázÿ c/Û7Åß´Áö§ı«¿eOøâÁ¿Ù·Ç_MÎğ[Áz&¹©y_ØúkhÈ— Óô×7ªæ+‹‰mÄlê?7|goÿ ìı–?à•ßğQÏÙ3ö8øÃûeşÑ¿¿m-Wö?¾Ò4Ï‰ß±ŸÄo…š^Š?gzõ%‡\]2ëMÅÿ †u]?ö„¶äÜéVvl×ÛTúø“ğ‡ö¼ı«àª_ğSÿ x§ş
YûfşÁ²¿ìÕá¯Ø«RøMğçÅZg‚>jóüYø¦ËñZë¾;±_°xÛG‰ïN¨OøšîßR"òæÚ*ùçáÿ íÕûQÁH<Mÿ ”Ö¿a¿Ú+ã€şi³'ìÁáoØÿ âwÆİz÷à—Ã¯ü`ğ¶¸¾ø×âßx×Tk¯ø~ÿ ^ÕtYu½cOÔ.ì·¶Ââ+v½cÿ }ıº|iûBx£ş
oÿ ŞøÁğßÃßàŸ³„¿d›¿ÚÓöÉğ¶½}â¯ß4/?Ãß‹_¯¼ğ2[X-ü{u«|ZÓ4ÿ ‡º¦™¨3hŞ¼ŸÄ×…üÑ?jOÛOö^°ı½g'ÿ ‚}~ÍŸ¿`oüø!®êŸ±·ÇÛCàÆ“¡øÆòß^¿ñ‡ÁëïÃ{â/Š>)ø†îÏÆ?|áİKR¿ğV°&‚âÚÒy ~~×Ÿ¶·üâ/Äø%çüwâÏÅ_‹±_ícñ/ö…ğ÷…~8ücıµÏjÿ ümğSÅşû?µïügñRè>8ø…©]ZIâOxi-åµÒ®îÒ††E¯>ğ—?iÏÙ[ö”Ò?iß‹ğPŸø+ÿ Æ¯ø'çÂßŒ#á%‡†o~êŞ0ø·ñ_ö—øOâ·Ö<}à_|ÒôxşË¾#ğF•u“ñCO¹şFítÛb‚taì¯/ìåûIü6Ö>0üaø£ÿ µı“¾|#ı²>'ü$øÉà§ğõ¿ü—à¯tKyü5ñ'ö`ƒÁ–ï¬ükø…¡[^CğÖÛÀSCwª¯‡í…ıİ¨ºGQÿ hÿ ‚˜~Õş;øàßì‡ñ{Tı–ÿ d¯…¿¾şÜß´—í™àwL·øŸgğÄxƒKøƒğóAøqâÛÓ|añÂ5şã~iñëWÓÆq¥CSõ½—ü+á¿íq©ø¯@øe©øËáGì“ñ_N×?c+OZ&‰¨h¶ÇìõûløÆá4ù¾ ø·áş«uiğÏöløQàZøŸTı ¼U¾áOŠ|ÖÖ$‰Ğöÿ ‚‡~ÔSüMø7û<~É÷ß ¾7|ø+â~Í¿h/Û—âì¿ÿ hÏŒŞ6ğwˆ¬ü-ãÿ Œü;o©A¢|rğŸ<&•âüCğìxÇ>;½×4­;|ò«û]Á0<Wû?xoãwÇ_ø'íÑûFüsøûûQ~Á^>ı·ÿ k+Ïˆÿ 4„^øÿ ßøé¦kş9øÕ¯êş=ºk½Vøâ¿é›Sø3§ıÆWVµş¯moom¦°lO†¿²×ÆÛëöŒÿ ‚séµ†¯}ûè_²/üßá?íAû<üUıŸçÓ¾8x÷Æ_?g[ë_¾%ßxNäÛÿ `ø÷Y}kXÕÁ%î¡e©xK´‚Şåµ€û¼ÿ ‚ŠşÏÿ °‡ÿ nÿ ßş,şÚü¡~İPü>ñïÂ‹ÍB‡>1ñn‘è_ÿ f64Ù¼ağa$³™ô­vÖkƒ.©q-¼bWeQówücÆoOÙÿ áGí?ÿ ´ıº¾"|øÓàÏÍûk¿4?‚—¾:ğV•âñ®~6|<–]Gâ&ƒâ¿xSDÔ!°ÑšÖØ½…èf8§IGâ'íâ?Ú›Gı¢?e†Úßí{ñ#ş
Gû0şĞ_±æ¿ûnÚé?¶¬>ıgø0ñ%Õ¾ñÇÃ>†;SÔ¾.üÒí.<eàoêÓE{¯x…ÛG›N›^óûxSöc›öÂøiûTøûâ%å‡ÅïŸ²í[¯~ÌŸõ}
;_ÁG¾êÿ µÍÆ´í(..íôÿ ‚ü3~ğÇÃËkdYÅğDÒÈ2øÕğÿ ş
ïÿ 7ı³l9¾6|køëÿ ı•?bÿ Š'[Ö®ì?aÏ|Iñÿ ‡¼º'§Òt†f±a¥j:F¯ã­Ñ¼I<úŒÿ bmS]¸Ökt?sÿ `ø:öhøI ürøYñÃÅßµŸíû=üÿ …qÁïÛÅ	uÿ üpø–¿.üY¯øâoÚe´İZ/ø	ü'ã=KMøkğ”Ú½§ü$Ñ-¼Ó>¥làÿ =Ÿ±òÁÄÚ?Ãÿ Ùöhı•¿h/ø'á×Ç?‡ßõßôïøHÓ<á/…³xƒÄ¿4ÿ ˆvú®“5ïÂÛıJs­ê~Ò|o6Ÿ¨x¤Ü—Ñ#¹Xñş	!û7üT¿ø'á¿Ø¿ãœ>øWû%ÿ ÁÀêKàïÚ^hw¾3ømü/Å_ş#ëòCà‹Û«]2â¿ˆqi¾uñv¡¥yšeñÕtO¶Ì© T~ı·àª³‡íûPk¿µ ¯¾-şÔŞø5£şÅß³‡ñ»\ñWì§û?kŸô½øâÚÅrOi¨şÍºGÅjºG‰twÄ’­·<xdÒ4’b‰sù‘á_ø,_í7û\ÿ ÁÀŸ²ü(o´o†¿aŠ_¾ü1Õ~^Çâ/|ñg¼ğ÷R°ø¿£hv²Éw¡ø“L_XÜ]‹mFâ{ëuµÔ.¡¦^ûğ{öøKÿ Iøñ+ÂŸ¶Àÿ †°Dÿ ğY›7àÁ?Ú—á/‰uŠ0øÛ¨~Ã>)»‡Å¶¿´ßË¤èl>iÑ´^ë’é¶¾#‹ÄWie5ÔÖ°ïÇÿ ‚|øû6|.ı‹õOÛâoÄŸø—â‡í{ûB|+ÿ ‚~üñÃ[±á/‚|â'Š~-xW\ÒŒÚF§ñ?ÁéÆ¥yâtŸAhÙ#Ò÷+aı¥¼eáÙ·Ç?¶í©ÿ –ÿ ‚¢üğçŒ?o¿Ú‡ödø}àOÙÚ}ÆÚ•oğ·Ä:–£¢Ä,µµ†ÿ N´@[e"êKx¾ËkoJˆõ?…ÿ ¾!jW?ğL?Ú×öSÿ ‚¹ÿ ÁI?i_‚ß?à°³ßìCñGáÏí9w¢øOFÖ4]HZx×ÆÖW:†q©iÚ’ÚF"İ]µå–©ªÃ%¸’Ş¿?uû¯Ø/ãÏìqãØ‡öÑø¡û\~Ï^9øUÿ 3ı°?hM:ûá7ìñâõ½¢xç_Õ¼;¢Bú¤d::Áqk%İöë[©gF†dòæ^Ëğ^ıŠşh_ğI/Ø?ö)ñÿ íIñãPğ‡üKönı¬ügâßŒ?²×¾[è~Ôí4ÿ ‡šºµæ¡¦¶†öºUõ¶…q½¯Rå¡Ô/n%D¶±i(ú¢ÿ ‚Û~Öÿ ÿ fß„6RxOâÄŸ²oÀkË	î~/~İÃ?¾%|ñ½¦¿¡Eğ»áæ‰û2ŞiÚ¯ˆ~$XüoÖ®‡õ¿i¶ëkğóOÔdñ¢<‹pÃñ'ş	µû[ÿ ÁN¼aÿ •ıµ?lŸø(çíïñ#özøcã¿Ùšëö[ı«|7ğ§ágÇˆ¿4û/^,øqñr;€_ô¼MŸø’|>¹_xvŞkmYŸÆ¶Ÿ¥^^W¸ÿ Á|ÿ eïØ;öDñ²ÿ ÁAş$ÿ Á 4ïÛEñç‹4Msö”ı¤&ı¶¾+|“áŸnüCà¯ü?gøY¡øƒ]»ñy×Rkvğ†xFÛLÓFŒ­ı½îF·ƒÿ jØ{Äÿ ‚âÁEÿ c/ø+´Ÿáøáâ¯ø'®¥ñã}¿ìEñ?ÆÏû Ïá+¦ø9á=5<ñ'Ãñ¿Ç/ø_ˆ|(×z?„4õøpº£ké7Øí5ù1ÿ ]ı¢>şÎßğW/ø,5÷Æ¯øŸÇÿ <wáOØ-Cöox±~~ß±x{ö~ğ_xçã¿„tmKZøoğ+TÕ´ïŠÚ6¡¦Ëlş5Ö-?áœÉSúÖÒ>Á+¿dÛßø&gÁ·ø#¦ü1ñ=ßÄŸˆ¾'ı„ü!¢ÁñÅšwş/xÓÂx»âµÒx†ßPÖ,4Ã¨é¤¥îş%^gfƒHŠ¡ä¯à?í?ûxÁVş|tñ·ÄŸø(GíÙÿ 
øñJÛşÉàıŸ¾ÁJañŞ¡àÏ	èºWÆôO|$ğ¦£â¿]ºğÇŒÙ¾ ÚXÅ~ßÿ °|0n-|!|éøíûÁÆŸğZO>+ø«û#øÇ×ßµgíûH[éŸÿ d_É£~Í¿eøMãUÕ<A«øÒUøA¥ø/ÆMâßiòØ¶ƒñ^ÒtİD.-î¥Ô]bpèƒã×í©¥ø/öÜÑïàğÊ~ÊğYûÿ i¾Õ¿dÏ^ê_¼ûx~ÏZeÅğıœ¾üIı§®´k‚_³ŞƒãXãŞø†²øƒÂq.‘â;§ó ®óöXøUû0ÿ ÁI?à—´^±ñş	iğ—HñçÂßÛ#ö¨ño‡¿cı[ö—ñŒø…û`xwÃÖ–:ÿ ‰_ãuæ©á;]"_ˆzÆ½¨xzãP…¯¼¥Ù¡ÖtØe¶exÿ ’ïØsöüŸãgíÉûJx»şAû}\|,ğg¾øwàíCá¯Ù¼xá?jß‡ ñlú~©û<\ëŸ³o„´İKàô:\O¨ÂÍğ,zÍá·û4µÚÊ®ß§¿¿d?Šÿ ğQ…_~	~Ş_ğUë¿Ù¿àŸìƒá~Û¿fI?c/|Z·ğü§AÓ®|!û<şĞ1|XøW­xOÄŞ!MOá~¹&€Ÿ|UªxƒãŠXhx¿Ã2ë—"â0°ÿ gïşÙz¯ÅïÙ×ş
Sû}x÷ö:øUğ‹à×ÿ hÿ ÿ Á.¼!ğ‡áßíğVÿ ‚Cø*ëFğdß¬?j†ìuEuO	ü·ğŞ‰¬ê?åğç†í¼we¦İ^k6—UñgÅß€?·%ÇüÃö6´ÿ ‚N~Ù+½økñöğ'‹~øÂãÀ>Iû$ÿ Á8ükñöæ×FøáıãïÛ<{ÿ 
—Ã/á=kKÓ|c%ŸÆÈ?³ï­"¸‚ñ«åéà¬|ÿ µŠÇâÇÀønoÙãöLı»¯~ÿ Á4ÿ à£·<+û=Iğ_ãŸÀO€ÒÙşÇş#´ı•¼=ài¼_ãi>øÊÿ ãDgÆ¡¯øWÅÅÀ?5WTÒ!'Ùô/ÚâÛá?ƒ?c~Ò_³xïãíñKötı¯üÿ ï—âÜ¾öÖı¬¾-Mi7‚¿à²2~Ô
Ğ¯¼3ğûÅş6²½øYÿ 7©Cáï‡Ú¸ÿ „ÇSğİ†™{€9/ø-ïü£öòø•ûşÍÿ ¾%~Øş8ı»5¤ı—|]ñŸÅ_|oğËáÁ›ƒ?¼ñV‰³iš.ƒâMÆSøwJşĞñ…¦‰ <S¯\Êt}"Êá¼ªä~~Õÿ ğFo†WŸşüvø×âOø)oÀÿ „_ü}eğöœø…ğã¿À=kö'ñ^‰ky­|6øAàï…¾	Ò§»ø§§|Hñûiúıß‹|W¨ŞÇá‹›íîüİ:Yb?§_à¸ğS¯Šş ÇãoØ’_€ß²/…üU¬Á/iï†ö‡ø)ñ"	~Ö_îßÃ^øş,Ó~ÙüB×eğ‡µÙ$_xçø{âQg²ÿ ÆšUİÀ/“m?`ƒ±§À_ÚÏş	Óeûk6»ğ*çö«ıŸ5Ú—ööÿ †ñ˜ÿ ±Çí?àJÎ÷à/À…ıšßÅ!ñ?Çƒñ¯Q¾´ğ²|â³à‡¦,ø¨\ÂÒ*€zÿ üö”ğU×ü?ş
Wûe|Aÿ ‚ª|[øaûaüpñì­«~×_4ÿ Ù"çÅ¾4øã3Å~-ğÃï
øsÁözBè_m>,xlôs]ğŸ†¬í<a~×úŠ‹›v»®ŸşÇà¿Øãş
5ûÁ5?c?Œ±ßƒ¿jM?ö7¶ı«áı¬üñ?â'~	ŞşÈ#ã×Å‰ß¾Ÿxtİø:ÚüsoéºWˆÇ‚5}sşŒzßˆœú—Ù®>Høéû|hı•ÿ à¨ÿ mÛø,æ©ñ3ö~Õî|7ÿ ı¹?á‡¼-csû*üNøÉğ§Nø}û;ø1¿gÙuíoEøÎh-+V·ğö÷Â/êúÃoøHüa>›8{¸öÿ h¯‡ş'|øƒàø:£ö„—öbøÍâ$ğÈÿ ‚[üx½økáx´¯i¿í•%¯Ã¯Ø>êÏÃZÿ ü$~±øáY×ã¥ÌcO]iu‡ïtß£ wŸğR?ØÛş	5ñwà7ì¹ñGIÿ ‚•ü_ı–àœ#ñOÆİ7ö*ıšü'ûü\ø­¡ü6ñŸ…µ_øö˜¾´Õïµ>.¡ñ¯Ä»	|W;üC·M9î5I`ğsË¢Û#Ÿéãz|1ÿ ‚šÿ Á3üûAÿ Á9®äø§ûK~ÏúF·cû üUñV›ªüñ'…>=x>áÿ ˆ¼E¤øoãğ®ƒåÆ‹¦êV»<y¤j¾h_Í³1†é¿—‰Ÿğu7Ç/Ù—âŸìáğ³áGÇø(7Â/ÙëXñ§ñ¯ö†—À~ı˜ÿ á¸|=ãïÚßø3Á?õßº¶¿û>/ì÷®jxZ/x^÷S¼ø›ÿ ØÖ55¶µÕUW÷×ş
yàŠ—_µ¿üÓöØ¸ı¨&ñŞ½eâıÆß°?üÅ¾èƒâ÷ÇÙ¾ØÂ{àèÿ lT`ğ#xƒDÔe×›Äü>|'¦ÿ gÿ fé6Âæév {WüFÓş
aûşÍ?lÏø.í{ãWKğ'ƒ<_¨xƒàŒşøIã=á‡ƒü!{¥kQüZÓ<iû>Çªj~*Õu"-WK—Á°i6Q~ıV[‡…+óCàüçá?ÆÛ»à½¿ƒ?àáÚ[Æ~øÁûUø&ÛÀ²–±ÿ ØÕü%à¿é:ø¡dşıŸ¥ø·«ø>ÂóHĞ5m7Pµğxîò{kÛM1ÛÄ/±ÈËÒü=øIÿ şÔ?³ÿ ü{áíùğşñüñ¿öJø§á¯Ùá<ş0ıŒäËâŸŠüKü#ş	‹Æ?	ïôMJS¦øBâçG_|BÔ4İ
ém¾Ûy4Œ¨W_à‡ìóûNşÔ±×üKÃøé?íÃâŸø'ïü#ön½ı¥µY¾øö{oÙKÀÿ ³/Ã­7Âß>-¥ªh6¢ıŸµ›äÑ×â'‚fñn«ñ3û\ßhC[¶²3 Ë¿ğTïÙƒöƒøYÿ WñWíÙğ»À¯ü/á‘ÄOüXÿ ‚|AÖtÚßáÏÇ/üVø}¡|<øvšgìÇ¬ëZ¥ğåüU¨^IğzÉ4
µ›«køÛPÅ4ñxœÁ?Ûÿ ö½ÿ ‚Q~Ã_²?ü·ö³ø97ü›Æ3Ñ¾-Càø(ÿ ÄCá‡íGàí/|OÔ¾7ø©¯føcÆÓøƒş+?hí¯â´mTñõ—¬šhô‹o–ÿ àºZ/íeğcã?ü×@ñÇÇÏüø=û[şÕ?²ï~|øà¥ñWŠ¿iİ3á½×€ôûˆŸ|_Õô~ğÇÁÏ\Á¨xÓC¹] ø¡fKt‚à)qú-ûCü#øOû5üqøñÇö÷øïá/Ùkş
·¡Üè#öpÿ ‚Œ|uÒµÏ~Èÿ µJëÒ|#ñ·VøWûég]ğ_„¬şüÖü7ğWÄ–Úõ•¹»ø®ét¡&¥hóDøûûü6·ı¤nş x«ş	‘û2xö˜ı‹ÿ iØ¼7¦ÿ ÁE¿à‘gÅ©tˆŸü7ğ–MzÃöt¸¾ı¸¾5_iŞ4Ôás|TÑü]ñîÁ¾"ó@Ò4¶øeãW½ÒOß÷—üãÃ_¶7üCãGüÓö"øíûø£ş	_§x×ãÅ/|9ø³âÏ‹ÿ ¿hø5©ãøk¢^]ÙCá¯†òø;Vü=§xjËÎŸUñoşÙFŠs-¬ë/çß€?aÛsNı€ükûşØ¾!|$ıª<!iÿ Á~èÚgÃßüqñŸŒ>,]üJı´¬®õ_ kP[üU
øu&‰â;_‹:ÇÙ|¤ßIƒ¶Msql~’ı‰?gø'Gíqÿ ıƒà øïö•ı™õ€ß³6£ûKşÔšuÿ ‡º/ì‡áYİ|BÓüY©Ïq©ëß4ÆÔ¼Aªi^šóáş¡§wyjïpÃLœÄ ÍüÓXı»¿hÙö³ı›~8|kÓ¿`Ú—ş	è>hrøâO†¿tÙ¼¯|l?µ5§ƒ<=ã-.Çãv§¡E{§xOÁ>'°ñ?€ò`#ºR÷ûÄ/ø-×Ãßx›Ç±g†>ËûC|3ø‰«ø‡ş	á?ø$†‹ã$øyñ)l<'¨İü3Òÿ i#ûi_xÛX¹Ğş(hÚ}¿Âİ?áeç‰-µ?j7kã¯Éq—oÔÿ Á$¯¿à“ş¼ñOíÿ ñø“áØâ€^3ñN¹û|x7ãş·âÿ Ú_Ä¾+ı‘üâ—°ğï|%â?iòÅğ²ox‘í5í?Å‚ëÅXÈtÛäuv'éïşÀŞÿ ‚Rü1øóÿ  ø5—ñŸãwí©ñâÿ ‹¤ı·­¬%»ø7ûşÌ®áxø#öŠñÿ ÂÏ«Áã|Ôtİ?^ñ$Ş°°ñW‰´íA,-c‚4ü ÿ ÁT?dïø$Nñöt‡öIı¤toÙ;WÕ|yğ‡àíûëº'íñË]ı‘¾ Üê<‹öøÍâ_‹2ÕåÒş%Z|Ô¡Ğ~jş	øsû]øz_øGS6š­Æ±Ÿ
|-øğjÓş	ÍâÏØ_ö,ñí›â‰à–?d/‡ßğU¿|^Ğ~|?øOğÇÄ²GıñïöCø­wz1‡Â×6Şøÿ &™}j<Iªi:š|<mnŠñ[ò/ş³ı•>j¿ğOØwş
3£¡üHı§~$ê¿³_Á||ğşøuñƒáï‰~||ø×ªxïFøc¶Ñ4‰<ã¶_Øj7x×ì´[ûM{£mmä¯µÁ¿à£¿no‰¿gŸ„Ÿ>#|ı¶eïø$EÇìËàÚ;ÅÆ?³¾ÿ Â¡iúõßÀ;k;Q¾›â7ˆ´ï¥ş§%Î¯ÿ ş?†&½{kTŸÿ ‚‰~Ğ_ğS€³GÇoMÿ ÈøKû@ø;À´ç†?aÿ Ú¯ÂºGüá'Ã›…ş!øe¦xÖ÷T×§Ñ5İfçÂ>šãS—şÈ¯&¿I=#ÄV—Ñ£qı˜ÿ eø'OüáOìuû:ü'øy{ÿ (Òÿ aoÙÛÇŞÔÿ o?üGø¹û7øWáÆ:]Kâ/ÂŸø‡à¹¬x_Tñö¥ñ]³±ŸMÕ®µèºéïo­]ıêKSùƒñ§Kı”l~>|pÕ~;~Àß´?ÆÏÚ;À¿¶÷‡gï·¯„?h»ß~Ìº÷íåâM~Ò?üQÙ¢)_LÓü?wâ9¬¼]Ã¸í.ôæĞm¦Ğ$¿+‚£Ş¿m?ø'Ÿì‘æ|^øsûb|s“ş	óÿ )ø‘ñOÁòø_öµ×üIñJøûjCí~%|"ıš¾êVşø{áéúg­´}U­¦Óµ‰Rµ_*Y üøóû| øãñŸÆÿ à«ŸğX¿‡ß³oü?Ç:Æ•ûN~Ìºïìƒãk~ñ–Ÿ¦iš_…<7¨x³à^¹eğ‚úç[ğ‡ƒõ{kÿ ÚÅ§Ø¦·^í[}AÛ÷¿ş	½ÿ ¢ÿ ‚K~İÿ ÿ l_Ù÷ãçüâoìuñ“ö*€ÉãøÃöüøíñ¦öíş?øcÆ4Ğz‡…<o¢èšgÙ|3á}#V±êzà½‹ÄVğÎtë­6âŞOmı‘¿à–_±?üÏÃ¾8øÓğ?áŸŠÿ à¨ğVoØmôüzğ‡€~"xŸG—SñgÇè5G¿½ğ/Å‹í_Àv‡Gø;â)µô‚WÕI‡Â×¶“ZêrÚìñ_ø&§ìMğ[ş
Õñ§öÏ“ş
¡û6ü~ø]ÿ =øÿ  OíãOüzñ/Âo|Kºø—áoí¥ü,ø?¬iğrøCà?€>é—©÷ë®ŞŞO¯¿Ù¯õE$ ‡ãçíOñ¯öşÿ ‚¡~Ï²|~!Ñ¾)Áÿ à¡ Õ>|:‡GğO‚ü>0\şÏì¼Cñ—BÒ>!Zèı¨<'?‚?ho
*_jºÇ†¤ld°Ñ/uO
Ü¼sıOû~ZşÓ?ğS½áïÆoø$¶™>™¢Á/õ}CÇÿ ²/Çè­ü#ã]öŸøÓm¥Ú|%ñßÀÀ?›ÂW?µ„iš„—Œ¾$éş)ğÏŠÌLÚTŞUëÿ 2´ÿ üş
wÿ ãı¥üoû_üøÿ ğwã‡ÂÚÉ<7àß…ÿ µo…¿g¯éÿ >#İşÏÓ¼%â½á'Ãßi÷“ø\øq«k·~ø‹«iÚF‹7Œ¼C§\ê×wšMÃõkö×ÿ ‚IşÑŸ´Öâ/?µGíì»âo„ÿ |ñ—ã_üJÏCñ„?eßŒŞ ñ®‰¥'…¾ø/öuøaâ2?xÃàôwvö~;ñœZd²xæşä_´fBï@•Ÿdï„«¤şÕ_°ïüCöAñ×€àµ¼ã?Šß²‡¯¿h¿øÙñ§ãN¾Â¯†š7ÂÏ…>#?¼1zú³kúÄz×uûÜDŸªÚXB–¢¿Lt?µƒü%ÿ Aı?à¢šØğgíçğ“ş5ûøËÃ?¥Ğ¼§kz_ìG¡è0|,ø_âC^øIa/Ã½vÖOZx‹ÃÓM«ø›Qø‰¨ÜÛ›ß[Íf-/[ãOø!ïìão†_ğPÚCÇ?´ÇÀ‹_´gÇ¯Ø·öwğ·íƒû!ø/Høuáo|d½·ø‰¦Áğ“Ååîµ§Ï¡|EĞKÿ èş/–{;X¯ã:”sFE~”|qñ¯íiñ›şcûşÍ?ğPÚëà_ÂøCâOì§ÿ ø	ğïWø£hŸdñ¶»ñÎûÃ?¿bŸø.İµ]wâ…¢ê~"ğıßŠµHø+TÖ´Éµ©4ä¸òPåïüSáÏÙ³ãíÓûKøóá—Æ]GáŸíû3ürøkào|øÙñUñÏÇ_|Lÿ …xtßşÌşƒÎÓ|à†šD+{ñ'FºkIu;™"½¶Wéıüsñ‚~ÍÑ|qÒ<yñoözø­ÿ ñıçÃé¿o?Ûsâ¿„ ø‹ûÿ Á=uÿ Ë¥ÉğJñwÁ/Û_k‡í[ğWµøgá+?	#GãO‹–ÚoŠußô{;vO~+è_~)ÿ ÁFàµş/ÿ Á9ÿ m/ÛNñÏíû-xÏâÿ ìgğ³ÁŞ)ñgÀùüà]^·Òuˆ^"†çSğVâëëk[WNÒ h¼Aáı+V†å£1Æãö‘ıhÿ Áoÿ à¯ßµÃOÚkö9øğ_öRñ—ìƒgñÓÃ_·½ÿ ‹®ÿ e¯ˆ×?f=À?åø“à}2ÆëÁ~/“Â~$ŠêëÁoãI­äĞ> ê~Õ<:%Ô‘” }q{û%~ÆğPÚöàÿ ‚‹ÁL¾7|Tı“#øY£~Îwëû+ë<Qğã?ìºÏƒ!ø5&¿ñ‚m ŞøsÃö´ôğ‡şÉáKˆ%Ô<7â?¶ËŞßÌ‹áŞ3øCÿ ­ğˆbğ_ì=ûKêß´ìiûNù^ÿ ‚Ë|bñÇ=cã¥ğ[ölğu¼zÇÀïjŸµ¸?´~Ûj¿üïÚkÊšŸö’Bš2AQ†¯Ë¯ˆ¿kß€_ğrÇ‰,l¯¯í§ñ]¹øpŸ´/ìÓûx+Ä^!øuûHéÖ±¥•ÏÂí#Iø'ñöÖÏÇ‡áî‡ªxwÅ÷Ö¾5·¼·ÑõÏø‹Äš…á³sğŸü‹Søé¦ø3Â~,~Å¿µüóãßíâ/ø7ã¶‡kğºçöfı~0|3ø|4”øCá¯‡ß4ÉmfÕ|]á½¬µo‰ßğ‘>¥¦^x›PmkK‚t€~Ä'‡à–ŸµìÅû"üı,~!|4ı“>~ÚŸõïø(«İüS³½ø¡àÙ&{y¼?/Æ‹ß¼3kouoğ?ÅüV~]]FËNy“)pû‡Ú?ğUø3ş	Ûû%üı¹¾8üAñÇí#ñ’óÄ:Á?ØO‚^>Öü=û,èßüğã\ñßì/íğOÄ“Eá¿vvZˆ-ş,\¼Ä:şÒŞ[²‡Qğÿ Å/Ù/ö2ı?à˜Ÿ³‡ü«öı§şøöÛı¤|_â/iÿ ¾|VÑ~x?áç‚>:øCOñgÃmKöğŸYÒt‰!ı4‹/2ÒN“¬hñxË¸ÑRåÍ_Jü<ı‚¿à¿ğNÿ şø¡ÿ iÿ ‚ÅûXşĞÿ ³’iµÇÀoÙÂ?µÅ‹¾üYøOáßÙk?tüø÷¤Y/‹fñÍ¾‘âipØ6›áïhš…®§jZ=Ş >³øëû%Úÿ Á@|wû9şÖúÿ Åïü@ı¤¾ÿ Á¾şØÿ ³¿ü³ÀÏªØİjŸµÇ¥¼ø‹ğ§ãU×Á(¢—áßˆ~jş7ñ„ÿ Àí3êÆúÏÂ²OŠ›Oÿ Á'ş~ßŸğU¿
|wñ—í1'ìåû3jß±ÿ Çü7ğ§>|ƒö}øÁáoÛKàÆ‡àïøëâÇˆ>C*ø k~,¾Ó>'ü ½¹)âËİ&Õnce°¶zşo¼wûEşØ?ğZoÛö¼ı¤¿g¿‰:ì‡¤şÄŸğOïß<¥|>¼ñ§Á=fOØ‡öjø“sâïü™~jºıßÄ_°üKĞíç³†ÿ Gøy=ç†í<Ÿìè´Í>YJÿ àœ·_ü¯ãƒï?`}×öLı‹¼!ãOØÅ¿´Åïí!ûBüø£ğÛÅ_>ÚøgÃÿ õÚ‡Tø¿áírçWñ—Ähú‰ñD¿µ.ê-KRğö£¯^êÆ[(á`ş
Éû$ÿ ÁKü_©j?µWü¿Çß¾|øûm|(ı™õY>|<ñÀ]ö€ğ§Šü`úî¡ûRh¦ÊtÍf:Íµ¨,üuâ$Ø%¤Ko'—hµûiûZxögÿ ‚ŒÁ?õßø'ìåâ{…¾%øc§hş<ı‡hŸÚ3Äğ³<Sû[|ø'wuñ3â?Äÿ Ş?°‚óÇzÿ †-.l.|7«ëw;ud€^Fğ@ø?`ŸÚwá¿í—û+üı¦hŸ?ğU?†ÿ ´wÁGı¥şéÿ ²_Å¯‰ÿ ¾.»¤xÎß@øgñSâ^ñ>Ñ´üğ¾¹ë_ï4-.şi¼{4zmúOrñ×ôÛûü6ø‡û~ÙŞ?ı”oMá‡Æÿ Ú'öìøoñ›ãOìıªşÉş¸±ø_û;|%øağïQĞş'|øO£|GµÒ¼Kğ¦?ˆ3ŞC6‰á‡:uß…uMUÚã^’)\ùÿ ÿ ‚~üGı–t_€¿ğ]/Ú‡öïğo…?exGâ,ß|ãOüD´ñ&¹«øÃOøû8|>ƒÆ!ÔåŸÃ:Ö³5=-¼=s©Ëy- ¹´¶°’½ª<ÓÁ_ğHCÄşÿ ‚­~Ò®ÿ l/ø$‡‚ôøbùe‹Ÿ¶ÏÆïY[Ø-íõÇ‚ş2·ÆÏxFò{ÏŠ~n­meáÿ ‰ŸşïøOü3a#7
?v?àßµì3û;şÍ^0ılß²çÁÙóÁéáí3örı†¿l?xIı¶¾éÚ%ñŠ|;û_x7Æ³§…/>"ë>8Õ4|*iÇaá-KÃ·³…ÔZ	«æMkş	£ÿ šñìÇğ£ÆŸğPÛ;ş
aûè¿´l^5m7öjÿ ‚ˆ~İZ_Ãï^…~;M*ú?øÆÚ^¡¢jmks„|o§,GPzW‰¼«Éö[«Ë`€ÎÏüÆÃö˜ı>(şÆğU=;ö²ıŒ¿lã‰~)iôÏ‚?¯æı—t[à·ƒü3ğ£Æ·1|!ñ,0øIõ‡ÕØxô«8¦Ô¼m¤_ëÚ«K~cÿ @Öÿ ±÷Æü`ı¨?kÿ Û{ş
ƒû+\~Ó?f_€ÿ ü!ğßJâ…?f¿ÙæÃXÓl¬ü)ãÚ_ö{»ûO„<ağ÷Ä>¿·°‡MKi!¾×ã‹Stù+şİ~%ı ?à—ÿ ±ÿ Á½kş	¥à_ØŸş
ÿ „ğ¥ñ6÷á7Ä¿‰?ŸöÅñOÀıKQñ>ƒ'Åİ_âÇÅ»´/†&—âÿ >(ñ†ü6ƒ¼Íi ZøwZi5]šOÌÍGö/ÿ ‚¶| ıªüQûø¿Äşñ5‡üGáÿ Ã?‚³şÔ?tŒ~$øCw¢İè±übÓ¼ğçÇúåœµ†¥ğÚÚx<?ªév‘â{_ÚÅo¦XÙ8ã¸ èş	5âÿ ÚîÇöı¸ÿ o_Ú¾÷À¿¿k]7ö:Ó<àØ‡à[á÷ÆO|øuã­7Uø/ñkÁ>½øF×À_ì$’ßáíñ¼Š[´¸´ĞE3ã÷í—ûz|ÿ ‚…ÿ Á<tÚãìâşÖÿ µ§ìÃ [şËW_³f˜?lÏÙÿ ötøİñQºĞ&ñ_5¸f};Wø|¶—ß¯üKáëÖ[ˆ¢mKJˆ!iáƒà›¿ğPÿ Øö¦ı„~?|ÿ ‚•~Î´W~5~×~ıŒ¼âÏü_øáñ'áî‘ãŸ‡^~¦Ÿ>8Ót{½cáÇƒnôÕÓµ‡¶··Òiw¼z-¿Ş_Ú/ÙÃá·íeÿ %økûAÁnşüsıš¿mÿ ÙûãÏƒşşÉß´•¥Çû=~Ã´¯ğkãŸ©üøWğÃNøo¬øÏâoÅoˆ~)Õ<wãm;GÒ/´æñoÃ]:4è¬¯4ë¶pÔ?şÏ²ÇìŸÿ —ÒüWáŠ·”µ_üSá×íñv?†¾ø‘áÿ cWRø7ğR_ÜÏãï‡Úv™¡xËQñF•£İÅyğÆq/‹®4Ï³]CM…–ş^?cƒßğY_Ø·À¶Ş5ı |û$x£áüaÄ_´¿ÄŸø,G¿høöv½ıuè¿­m/üBÓô=án«ñWÄ Ñ´€øÚçÇøÏ_áÕ‡¦ğıäqÉı`~×ÿ ¶Nµà¿ÚoÄ? ıƒ<sñáì-câ¯„Ÿ~3X~ËŞ!ñWí§.·ñçÃ6V~Öÿ à!¶ÕáÑ<YğšÚ{‡‹ö‹×¯µèºuˆò-5lÊ˜ÏØ÷ş
W&±íû1ë^0øËûTü ı¹5ÚŸügÇ?ğpn£uâßØÿ YĞføõÿ ~Ôrümñ¾«âØü§Ü[x’Ùtÿ †ßğ©4ïÚß|RĞşé¾1}'S& ¨¼yû~ß^ÿ ‚½|,Óà ^ ıtŸÁfõ+ßÏñïöŠ¾ı¢¿eèÿ aÏÙöÖúßWı—¾+üRğô:ßÀ­_â†|-áO‰Z…‹xôøëÂrø›AšßÃ–sYó/ø*Ïüş#ûgx¿Ä¿´§í™ûtÁ?¾|ø{¥hñéúo‰ş?şÒ~øğ¿FÑtÁPøµôßˆ¿<Eá_xŸÅöºv?<CoªÙCâ?ÜÉpåööè~É¿ğqüöœøùû3ü~ı§àøÉû<|:Õş%OáÚö\ıˆ>?|[ø¿àíŸë¾ñ×ìíãßüI×|£jZÏ‰ômÂ$Óµ[cuáûkH½/}c´_šŸµÇí»ûNÿ ÁG¾übøÛñËöšøóˆÿ lK{¿„²üOöø·ã_øj|×íto·íuû#øÄ^0ñ†|1ã_hÖŞ1ğİ×ƒnµ»ßx¾WX¸°°±·Xã õ/„ßğA‹´ÿ ‚à¿j;ö÷ø…ñ3ãgí›âÿ Ù»öñuì/ñ>•ğÿ öCø}¤µ·Âÿ ŠÖ¼}ğÏ]×<ğûXµŠğ_<]}¨|>¿Ğ.,Æ…¤ZE*µÿ îıµ„ÿ ?g/‡ÿ ±ïÄ‡¿·OÀKÏÚkKı¾|M½ñUÏí=ÿ  OÚ'Fğ?ŒtCöUÔ>#øÃºøà]+OÓ!ğ?Àm"â
øûR¶‹W°¢şŒÁ0ÿ à¾ÿ ğW¿Šÿ ¶?ì¹û|Zı‚<àé÷|ñnıgßÚoÃŸş|"}>iŸ<N¾&ø‹w¤øFÎş=:oâx^]]¼‚Ş"¥"O?ı½ş/øSNÿ ‚ßÙşÊÿ ²ı—ÂûßØßÇ^øoª|yñßÁQayáø'ÏÆ?|]ñƒñÏş
ğ÷ÄÔ[á‡ìÏûb|4°K4Öioi/¬xOÎ‰<_,°Étøã¿ø%'í'ÿ ÔŸöPñWÇ/ÚÏM—öÜ¾øğÏâ×ìIûüTñîÿ ×ÿ fÿ ÚE.uŸøZøâ?ø6MN-`x+TøW{á¿Éâ__|pOx?SÓõ“Ïmû{ÆÚ‡ÅğP„~ÿ ‚p~Ç?¾k?²oü³Ä¿ áDÿ Á`¿gïi>4øíû=ü#ø…4zÍ—…¾ü%½š‰~,ø‡¾ğ^‚²ÚèñOˆ¡ñw¤ÙGö5?xßà5çŒÿ à´~øÃğÏã§íÃûA|(ÿ ‚b|ğ¯íÿ ñ“âÏü{Åïâ¿‹¿¿g_Ø×öŸÄ_5OØ÷ÅV•.…ñ[á<=scâOÙÚşïPğ§„|s¬k>0Ôfñ^‰gsÇôÏáÏ‹?eÏÛwöæøÁûa~ÍŸ?à¼ı¶ô/Ùoã/í½ğáÿ Ç[xà¯ÄO€şñ¬?¼)û8ü7Óü9ı¿ñCÅ¿²¿~#êº7†ôo†^×áñG‡¿µl4¯Ç­Çã€3¿µWüwş
ûZşØ_³ïƒõxkş	íñ÷à¾“¦~Æ^ğìÇáï‹?²7ü+Å>>Hdğg‰ü9eâı[Å²Ó5Íb;m[ÃúU¾™mi¦ÙCn|9=Í²	?­ï‡ß°÷Åø$íuû~Ø_´çí]ñŸöìøãá€¿üñ§ö‡ã·‹?iÚ»ñ
èxbÿ âGì£ğÃâ&à¿/ì×ğÓK»‡Å?|Kâ~
ÙXÜëSÛİEn±7§ØïàüV÷öhı´>xSöğgüƒÆÿ 	´{_ÚÇöLñ’xÂxVñÖ®5ßŸu„Vz7Šh­öÊø/yyjÿ 
¼gñY–ãÁÚå½’ø±.&‰$oÍ¿xö¬ıŸÿ hïÛcá§Ç¿ˆ¿µïíğËà¿Åko~Í¿5=Ç¿¿à±Ş6ğsxf+é<?û&İkÖZnãØãÆŞ"™4OÛ(ü?Óm´{¯´öÓª^aˆ´ÿ Ál¾~Ä>~Ù>0ÿ ‚qü#ø‹ÿ 5ı±nOˆş#x›ã/ì³àß†¶/€dkï€Ş$ğ5·ü"·~8ø=§j>Gñ¯À:f»®‰-çˆ_â4şÕ’[­;IÒn–>#ö/ğ'íAûdüuı®à«ßğZ¿ØWöéø•­~ÊR|¹ı›¿`~Î>;ñÁßÿ Âêğ—ˆ¿gÿ ‹ü(ı•¿i‹?[ø–?Úøká¯Å¿Gà¿hCHñ-­ÏüBu‹EÓ`û;öJñwŒ<Cÿ ³ı®~ |Vı›ü'û k#ñ7ìís©ü$ÿ ƒ~k_à¤¾šßâV¯¦Å¦ü{øG¬Éu¯ø/[¾Š+MGJ°ÔI–óà·ˆ<s¬Gş{<7Cÿ ‚ÄÁ@f/~Ê?²?Ào‰²ÇˆşüqoŒĞ|7ñïüƒâ‡ÅOşß¿#øye/ÄŸø(ÜšÄèÿ î|e¯kÚ¾‘û,ìğıÈñ¿ÁØ~îÜÏ5äÀ±ûşÆŸcOÛáÁOÙ;Äÿ ‚Œÿ Á	ÿ à ö¯á-_Gñş¡âÛÂŸ³²|ğ–»ãŸ\øŠøDı•>GãÚ?ZÕtx¦m'ÄßÛ÷ŞƒLÖ ±ñ–‰-Óş9x×öQÿ ‚‹~Î>3ñ×üsÁ?ğU¿Ø[öğÒ¿àš'ñí¢şÏñ~Ù¿¿içøc¤Şë7~Òô¶øWo¥éÖÙg¨C }†ÛÅ~µS¤eÁª´V	lßÙ§ñö€ı„i†_ôãÿ wıà“ú¥İÅÎƒc­øßZøñööşûÁiâŸ‰Óü8ğœš…¾_İKñ«Ä2êW/cg,ÓxOZWÖÉñ£çËş~ÿ ·×Ç/ÚSö(ÿ ‚†ø×ö…ğÿ Â/Øºãö|ø±'‡ôoü<ı´_ëğK¿ÚÏBğõ„×òxâM‹©è^øÕâ+«è<AñsÂRkz„zgÄ/:öXmä
Xöëã¿Ã?ÛöÃıd/Ÿ>8ÿ Á,|û+ø;ö‡oÚÂÿ ‚6xÃÇ¿?mÿ ‹µŸ	6£ã¿…¿³¦™yi­ø#Æ_¶,úf±+	éÚ”,[Ç.««K,ò~şÏŞ*O‰Ÿd‰?oßø'—ÅÚÃßş
üÒdÚcö“_ø‡áßìÃá=kKºğoŒ´ï€> »Ô<Qá/ø.f™®O/Ãßˆ­. ğä> ¸ñ…tû+{›‰|ÿ ãı²>|Nı›toğIƒÿ ³–«ñ?öWøâŸÛßãŒà¯~ğç‚~şÎz‡NÓ<I¬şÌ>3ø-â	ïüñ¥İ®“àİCÄ:-Î‰ğåg]CÄ×:‚ª·ïa/ø%ÄÏ‰Ÿ°—Ä‰ºÇì;û4şİøÕû<şÚQ\şËšÇìëğãÅß´‡ÆIç“[G³¾ñ‡wñOâïÁŠŸµCTĞŞÆuñ'o4íP¶ñšÔHàÿ -ı¬?g/ÙwâÆÙÃÇŸ·/üOÄÿ ?lÏøkâ?…|ûYx{ã'Œ¿eï|]oü-ğ_…ô[ÏíÏ øWâ—z.üg¡ëz]íÎ³¢Üj×±Mkm9ø3âÿ ‹_ö‘ğïÃİà'üÿ ş‡oû|,¶ñ=¿ì­ğ‡ş
âÿ øPß´oÂ'Å÷¶ßm<WğPÕ–?…—~0ø£ê"±²´·€xŸÂ§Â^)˜HÚ¢=p_nïø'—ì¿ÿ Ïı¨jÏÿ <cğ;âÏì]â_|2Ò¼Ağ7á‹>"è_µ>§ñËàµ†ˆ¾)ı ü[ ’ÛÁ'ğ”—ºo‡üa¦£Ö¬îî‹¤’@E~rèŸ·ş¿ÿ 'ı¬ÖOˆÿ ğ@oØ¯YøóñªkÛÍãí!¯|]ø_ákÙü	ğşií¥ñ—ÄŸÁ¤xcFx[Á–ĞüöçSÔãÑ´;A-ıõºHÏÿ Á"?à§µ'ü÷Ã?³şŸûhëë_±í3©üKÓí~Üø‹ÄŞ"ı¡¿d¨~êş=Õ5­OHıuSÂÉğÁş7|Cø‹áÿ ¬Ş&‚X¼qàõOé;i$ÿ ¦_²·üGö,´ıÿ l/Ú÷ş	ññ×Çşı±<iá˜5o‚¾(ı¹$øsû;üYı¼Uiñ&ö>%i÷z~›‹¾ØüBĞµgJÑ¼_ª?ÙüUáÉ´Á§Êñ^³7°üfÿ ‚*x“öÇø ¿ğV/zìíñKöíø²a‹Nÿ ‚oİüZğoˆc¿Šs|0Ğtÿ €–še‡Æ»MI|U®Ç¤|+ğö™ñWDwhßlG†®DV0–ª¿~øßş
ÿ ıÿ ‚—x7ög>ı |_ûAüğWÂÏşÖ¿<e¤x3öø¹â‡_¶¹ğ›ãOŒïmàO†_›AÔ|ğkÄ·Vx_K²¾/,“n Äß†ÿ ğpçÇ_ÁD?e?|Eø7á_‡Ş$øiñSÁÿ ?iïŠ?±Şã¿|sı¯~|7¶¹ğÔücæøò_‹~›U´“Å:&…CmyªOöût7=ÓáWÃŸø(‹ÿ ğÿ ‚¿şÒ?ÿ a¿ÙƒÂş=êŸ·›|QøóûCéßş~Ü0üñªÿ Âqªø{Hğ¬Ö6Özƒ£i3éúß„t½Jiô»&£ÒÌ¶eyÿ ì¯ÿ îøSeÿ >ñ×íÍàÚ|ÿ ‚ˆÁ:>3~Òÿ ¤øƒğ¶jüC?Ãb	øcÃ$»ººš÷Lğ–‘ªË­Y³ÓTÏ8KÈŠõÏÙã@ÿ ‚Šÿ Á[ö”ıš~ÿ ÁH¿oøûş	¾>$+ãÏ‚l¾øâÇíâÇÒ<+âÏÙóTÕ¼C¢Zé×	oá&+oé·O¨èíqy;€jÿ ‚zÿ Á,¿à£ÿ ?àŸ~.ı¨~|uøAûT~Òÿ µ/ì‰¯ÿ Á84|Røÿ 'Š>üÿ ‚t|^ø7àßè6.»á½ëÄ^ı¡>xÎçLÑ­>kW^ğÇ‡õíB{İ*kÙ óÿ ‚~ÏßğKßø)¿ì}kûZxKã¯…ö+ÿ ‚;x{ş	»ñN]'áuåÌ&øóğ·âõ¼÷‰şK­ê~_üÔ¤ğ¦°<5ñ"ÓìvÚĞ…|6"dØÿ ‚fø#ş
Aû)Á¾7İşÈlŸ¿`oø-wÆˆ_µo€4¿E¥i¾~Ë¿³ƒÏÆï„0ßÙZ]ŞøËJñ—‹|=áÍ=Ãÿ kø‚Ø$úAÆ¨şIÿ 4ÿ ‚šşÅğQŸşÌ¾4ı§ÿ c¯xÅŞı¾øï]ø›?ÀŠ—>"ñWíaá-kÅ^!¶ÿ ‚xÃ'ˆ,lmu?Ù·â^µâ=FM_â¯âfHút.w… öWøÇûgÿ ÁB|]ÿ Fÿ ‚'|wñoÂWâ'‰¼Qñ—âûbøÒßöUño‰lµïÚxãÅ–?
ô_Ùjç?fMOÃPézoŠ<fuK›v5-:ïReYGË_µ_ü“ş
‹áOÚ·â‹>5xLÑ¼M{ûI|7³ø}ûkü&Ôş)øÀ_³ŸÃ]O[Ğ,¼uğƒöPı ï.SÂ¶ß~.BòZøÒÎ-BæÛ_¸–Â\ÆÊ?u|+ÿ sÿ ‚_jŸ²oƒµWö*øßğgöºğ¿ì1ã¯ÙÁÚÃïÙ3ãV¯áŸƒšo<«Z^üğ/Œ®ôÒ'ğ^$¼€-ıÔR3Ä¦åä
¯Éø%/íƒñö¸ø«ûÁ/m_ƒŞğ‡ìqğ;öYøÛ¤Mğoãmæ·àÏ†?´/¼¦j¾6ø]ãˆ0xÒ
ÚÏYğ¿‹ÖÇIŸG¾û5±›Ìe’}±ÑŸø*íaáÙî?ø+ŸğMİkş
âÛöĞø©û,xÌ|kø)ğ‡XÕ?gı/‚±øZË__ƒ~£¬hZ×ÃËÏèş#ºiµUC¨xÎ´Š+¥‡şı—?à?´§ÀÙ'öÉÿ ‚†şÚŸğP?¿·íÖ¿gñG?go|8ı¢ş#iÓşÎ~4¹øc¤/Œô]JŞÿ â>’×Ÿ
ôêÚ ÖÅã_hšn¯u§ù&ÏŞÙ¿â÷íÿ ÌøÛ¤|Bı½üwñ[öı‘¼e¤ø¶Ùöÿ ‚~é7ŸµÏì—„ÂZ¿„ş#®«âØêZ·„Ã_¼S£|AğÅ­Õü§^ñ6£â0¶Òf?,?e?Ø‡Â?³/‡ÿ hMWö)ñ»qûDşÕ'ácÁ"j¯‹ZvğwâçÁø1y®ÚşÛ²|}:ƒ®•û(?Ä/	k>'ğÃQñ&QñŸÃi§?…<Ùµ$rúÓÿ …øÉá;Ú›ö˜Ó<ğ‡áügÇ³‡€¾k^5ıŒÿ o*_ø;àÎ›ñá¿cğ£ÿ ùøoá{¥ñw~ |PÓšOşÒšd»ôqáÍR6pJÕñ7üëö‡ı>xóÁğFŸø+GÀŸØÇâƒô¿İü\ı›|{áõĞ>0|3ğOhû½CÇş(ğ÷<gâ½oOğ‡Ãİ;Â^–ÇÃwi¥.©¦j6ƒCÕäh<ÊıVÿ ‚Š~Õ¿>şÒ¿?kØgöıÿ mOÛ{öğ¿ÂŸşØ?<C©øßÅşÒ>)xÂ¾ø%}ğwÄ>
ŸU·ø­«ßxz÷Ä>ñ^Ÿ£ZÉ/„ôİğo3²ùgÀø%GÀ_ÛËá_í/¤şÖß°_ü£öo|6Ñ¼Mà¯Ú/öZøİ¢ü\ø¡àŸø³\†µ¯ø£JÖõÑ¦ø:êÖÙ’5¸×É¨ß_XÈxB€mı?à¾ıœhOşÎ¿±Âïø&Wíkûüy¿¼›ö¬øã_‰^ñ7íOÁo‰>+‡>[x#á
jß	|Ğév?´[=¤ÒJmõ¥”E^ñ¿öoı ÿ iïø(çì;ªê¾ÿ ‚7ü'ğ§ìaûrü>ñ§ÁÏÚ;Mµ~¯û7~Ïßõ-7Àß.¼¨\Ş¸š×B¿ú…úDB×Ç–6š]€·ThÛóGş	/û*x·ö"ı“iŸÛWà?ÆÍgOÒ¾&|_ı¡bŒş;Ñõ×âÁß€¿|Si«Úü}ı˜¼)f÷‡Æo÷éÖsil º´¿Šy'²YUŸÑïØûKı‘5¯Úöjğû	şÅş&ı¾ øÙğ§ö›ñ7Æ¯øŞmÆÚ·ì…­xËD´Ğÿ k‹ívMU4æı»üGñ"â/x³öiK5Õ´_^ß²HíÌ`ØoØãş
	â_ÛËâWŒ>Á6¾xçöø‡ãİ+ÄŸ´g‡|_û^ø+áşûiø¿@Ò|9ÂŒìõ½^×Å¿üIğ3_·ºŸÂğÌ¶V>$šÆÖ!¸ŠåCzWí­ÿ gøIûOüı½¿à%ı•~~Ó_ômsö|³ıš¾øßâŞ¹àO†¿µ…•—…¼5ûJ|^Ô<yñnÓNÓ|#ğvO‚Z€(ğ½¾¡âÇ?5Í
ÓÃ¶EµÃ§Éùëÿ ªı?àãÏÛKö†ı¥~|:ğ ø±ÿ Ùñ/ÄÏë¿¾^|Iı|e­xkÂ0øKÄ––ïªëzÿ ‡~2iB/éš…ÀmcS†ô°ù¢ŸNhaXø}ÿ íü
ğWÀÚö±ñ‡üÏÁŸhŸŠ—?
/~
Á,nÿ kíoÁºìÑ†|Wsğÿ â6“¦şØú_Åùü;ñ=|á+¨~=Ü^x§F´oİé«ğÛEYnîšå@>^ı“nÙoáíéñƒãÃo:~¡ÿ oÿ ‚zEğÓÄ³×üaÿ 	ÿ Ãï~Á·?´WÃ]kÂÿ µïŸ|E¥§ÅŸ·ß´í¢øîÇPƒÄ£ÁºhƒÅZ|Z^u[şğËöÏø­ÿ ğïü›ö&ø%ğ×ö9ÿ ‚büjñ»x{ö‚øuàÏŞ×­u	|-·ñ‡…®5xâ=ômÄŒŞ&öº^›¶óT•,¦¹Ó!F¯ÔİşÅß´Gì1yáoø9Ò/‰¿¶_üÚÏşÖ±ëÿ mŸàÖ‘û]üOšOw6:‡ì…ı‰ğëâ[xÛáf›ğŠ+‹‡2øÖçÂ«gx²\:ÿ ™ùóñãş	ñáÿ ÙcöíøÓû~ÏŸtŸ?°?üá×ÁOÙßàgÇ};âañÜŸ
|Ağ‡Á¶~$x¦…*ñv»ñ+Åj^ ¸m5´¯x£áÍ„_okÍU¾··x üNı¢?aoÛkş	»ñ—âˆ¿j¯ŠCöQı†ÿ à¢ÿ ¾!üøÁñ_á»ğ×öƒÔ¼Cğ’ÿ Äú¿Äë;Ïx3Vñˆ¦ûƒYêÙÖÒhš‹Ü·ÙÒJ­Kÿ ¿à£_$ı˜?gÏÿ Á işÓº'íáï‡ÿ ğHï‚Ÿ	üMàûöß?hO|=_ìÏÚşÒóÇÖ°Úì¯iáMÆö?­ÓS–WñÉe oã§ö“øañÅ_~Á?bÚ£Vı¸¾ø_ã¡uğ[MÖ>hŸ³U¢~Ò~9[İâFß.mu¨şÉw¦¾›ıµâˆ¼L^im¿ôÿ ôÿ ‚JşĞ_ğE/ø(çì·â¯ˆ¶V¥ğ7á/íE şÏÿ 
eÕì>xâ#şĞ_´<g¡ø·Æ_°=ö“¡xßâ'ˆ>h¢ÏÂ×wğÓÂ³5!Óµinã‚pşÄ–?ğRÏÙMı¬?àŸŸ¶?ÇŸÿ Á:<}c¤|vÿ ‚Ş|bı·ş¿ÃÚÅÿ |1¨Â1ğ§Ç¿¦ğF™ß‚fºñF¯¡ø—âÌ‘xsZoÉ©ø.ÇHÓ<#ı•¬%Ãyüëãïí/ñ¿ö‰ÿ ‚$~ÏŸ
ÿ k?‹~;ı>.üıƒ>>Ù|u»øa¥h—z÷ÆMoâßŒü-áïÚÓÄ>»Ñ¡_xİ<1¨ÙøºóÁº©a i®æÊşÆ$Wœ~„ü,ı†?iïø/?iMOöÌı½õß~Ç¿±¯ücãŸ€4ØÆëö}ø~4_øCörñ%¼:fŒÿ <â†_ô8üAğÃâ¯‰~5Ü¿Û÷úU¬íâwºÕµÏ²5–»û{üiğïÄÛ?şYÿ ãø{üª+/…´Ãïéú×‹ôÙ
ø'ÿ Â}/?fˆe]‹’ßö‹Òg»I<3©Y|[Ôş$Éâ‰Åg5ì¿Ø×š¸ ü±Ğ¿à·ŸğV/Ø/ş
¯ñSökñGÆ?ÁG<àß‰~3øğ÷Á_£ğŸÂüFÔ¯|S§x_ÂXğ_‚us¦Ãkx¥wáøVşi.õJú?ş
Iÿ ñÿ Æ¸¾/üPÿ ‚ˆÿ Á
f‰W?°—tÙïÆŠ?l¯[Â~$ø§sgªiú/‚ô¯iz]Ï´}JğZK¨kş³×´Í2p±]ßÚÈ}söğ¿íığ§ş
!û~Î_?f[Ù“ãÏìãÿ Qı¢>|¸²øİğ£â÷ü-OÃ—¦ßÂ?dŸÃWŞğ=ÅÇšğÇˆõm^Úh//oæÓec^ëâÿ _²>™áOÙ»Oÿ ƒ«¿g‹…ÿ ¶Â?ÿ gÏŠ¯ãßˆ¿ïş8xzÃÄë>2ø‹sá¿ØfÀü9øo6â¸¼=§ÿ Â/â·\_ˆ…îŸºÇíqO~Üß	eoø%¼SãÛ+ã_üSÃÿ ·V‰oãŸØëàïÂ?ÙãÄ_ü9û
xoàwÅKıâ‡ÃÏøšëA¾¾ñ%‡ÆÍkPƒTÕoş)ejZtŞ*½Ãq][éá‡‚ÿ Á:¿f|Pı…<]ÿ šÿ ‚›~İŸ~5|ı­áĞ/?à¡?²Ÿü)kiß—à—ÅşÌŸ³,^-Ô>^Ãñ*!àé~ñîŠ|#ám];ÉÖÅş‹o}~ßtÁN>é¿ğPØ÷Çÿ ¶g?à·¾.ø}ÿ †ø÷â/†:ç‡>Áû[ø¶ËI³Ò~%øSÁ>ÒáÖl.|/ûDê	yñ§ÃÉ¨=åæƒ¦Éd÷­öèÛÃ6ßh—Â|Yû0ükøMñÃş
û8ÿ Á½‹öø·ûIûÃñÃ^ñ'…¾/Úÿ Á@[ö…ğ…§¼$5Ÿş×:Î§áÙ×şÃÚŸÅË»á½gÄ#âœ)šÏW:]şŸáûhÀ>÷øÙğötÿ ‚Hü\ı–¿kØÂş
ıbí#]ñÖ«ÿ :ƒáGˆŸÆ&ñÿ Ã5ğ­‡û<Ù·Ã[ZñÄoI üMñ–±tšÃ(jÚlzæ£â:U®ø?1>~Ù¿ğL_Ùgã?í£û3~Ş?ğL ~ÇøığÃÁW^$Ö¾ø“ã§íUaûFø;ÆšåÏô}'Æ2|<Óµ›OÍ…æŸâ{ë+=RÇTÓµ{ëş;{‹9m×­ÿ ‚!ÿ Áş<şÀ?ÿ eÿ Ú—ö™ı˜ô‹_ş"øËâIñö§{ñŸÁ>oø'Œ>³ñîáßˆğ7Äÿ øoö¡ŸöˆÑ<I§é×Ş°Ñ`?V=À–éæ’/2ı´~?ÿ Áh?d«/Ùkö)ÿ ‚{şÁzOü´ŸÆk…#Â_µwìïûRÃCxÃÄâk·ÉñgNñü,Í%ßŒMÖ¹â3NYµ7Ñ-ŞµØ p	ã¯ØâíAû0|]ÿ ‚W|iñÀı†ÿ à›Ÿ<-ûhşÔ±Ü|qàß
üğG…ÚmâWíàÍSâ$-ñ3â—|Qyu¤xz÷á…àÖu(íÓíšf’Æ9ˆú+à'üöWı¬¿à¯_?j›»«ØSãŸ‚üeğïöşøsû6ø?ÂÚ·Ä_~Ó?£øïcã¯‡´?‰ş.ø£^Òìüñgö€Õ¼B–,ø¥Ç‹ş[è©}/‡ÂË4QüÕwğÏş
û$|ı¼/ğ‹öÒ¿àŒ¿oÚÂß³·ÇÛ‹Á¿´§ÂŸÛ—Xøå¬x®Şox­u#¾ñ„üo¼ckqñ-ÿ á“ÃĞÜÁÿ Å–«o§J7¯ÚÁCÿ jßø+×üö8ÿ ‚~øköd´Ö5ßø%Oü?à÷íûCşÒ·?|¥j¼û)üOo_ş-Kğ§Xğ¯€´İçÆ:ŸŠ—ÇoàŸx—Æº®•5Óx{AÒµ«H[R€Æ¿m„ß°6‰ûAÁÀ¿·í«û j¿¶%÷ìÕû\~Éğ'´ÿ Ú/âÿ ìôÖúwÆ_èÖ˜kÿ 5F²”Ayıª‘«øgXA`l¬îtäºšcùâÁ(ÿ l_ø$×üÇö¥ı–ÿ à›÷ìcñ§ö0Õÿ c	ø®ÿ öÑı hTÖö†ı ¬|¯ºè3½Ğ</eö/h:î”WUĞüFg>#KëÒu&Úæ_è3ö‘ıš¿j_Úsş
ûğ»âüûã÷í×û'şİ´7À?Š~ñÃ/ÚÁ?­ç¶ø'àÍ)tÙ¡Ô?µ¿á+t“Å!$;_Jt¹í®mî­îA?ü^ı‰?hö ı±¿bØsş÷ıªÿ f‹ïÛÿ öx¾ñÇüiûbxã>ŸŸ³ßÅı'âg‡ˆĞüM¯}®5˜ñ6+SÓƒÏ­[^^‹´Ó¡€€z‡üGÿ gıâı³µ_Ø—ö×ÿ ‚Zëµøı’`ğö£à_ˆZí©ñ/ö}Ši¾;ü&øOñÄFO|3ğ2Ï?“ÑkŞ$ñ
+è/¨é©¥RòÒ¿/?à¿ğEØçö›²ı…j_ÚÛö©³ğÿ ¿kŸß>|6ı‡î>üY¹Õ~+KğûÄšv£àÛÚ'áçÄ­ÿ ÂZiöúg‰[]Õ4oy±Û%/5	f›ú}ÿ ‚Îÿ Á²¾ ÿ ‚|pÑ¿i„ô¿Ù×ã‰”ÅñïÄş)Ğücñ+Oø“káßü<ğÃ+}ÃqøÛBÑ<şĞ<}m¨Ë¤Y«x†MR›í×†Y|öÉı”~<~Çø9û,Á2ÿ à“¿~ x‡ö¾Ö~*şÅß¶E‡íá]kÀ>ø×ñ·KÒµ‹ş Õ¾üNÕîïüsf’^xƒÃËáÿ Şê:5…Ü‹}£Co òïü×öı¾?m/…ÿ >$üx»Øwöøñ3Zğ¿~êZÂ¿ÓşÈ?¾øf_Áûbj¿|âO|Wø×¥üIÑ!ÓL´ëm_Å>/ºY¯/<ëƒÚø[À_ğI7ö3øUÿ ı¥?à¦ø×ûLü/ñ}ŸìÃûÁM¢ıš¿hŸ‡:Àÿ ü
ğ5§‰¾ø:oÙÁ×Mà_Š_šï\ëü!§üGŠôh^-×5U·Šú_û{ø?ş
¯sÿ tñ_ìÉã¯†:¿üOö°ı«ü)ã_øçÆ	´_†Ÿ l>h>,Ğl5¼CàÉïSDñ1ğµò\x^ö]P²ºÕ¯ÓŒ±À_Úö3ÑjÙ3áGìqûRÁ4>*|eğ7ì•û|%ı¡|	©øã–Ÿğ’ßâíká…°ü8Ö¿fİ>?	jZn§§øàÙ]êÆãÅzış¡àùxä)4öğÎ <oá‡´ø$7ìğÃã×Äÿ ø,†¼3àÛş
eáïÛŸâ?í7?ìE¨^éßµÃïÚ/á=¼[û;Xü+ÒÛÇÚ¯Áë¿Œz7ÃûïÛ|VĞôŸê‚ğö›á­áÒÒëñø|tı<ÿ ·øÁñ;şËû*^ÿ ÁJ<=ûY~À´í‡ğ·Ã¾ ~Í×#øñ×ã“ÜümñÈñ§í!§Yİxu&ğİï‚´Óá¿†Ö~Ò­Š¡¾ğ«iwºV¤[ßø%7í¡ğÂÛöOøÿ ôøÙÿ ÿ ‚d|N0şÜ~ı™>ü`ğ×Áo~É?µOÄ(ÀšÂ_|yÔ¼Y}ñâUÏÀO:n£ğç^·µ½¶ğŒ5YøÊÓKƒVÓF÷ß³7üïş	µÁÁ?cüø)ñ·àGƒ~:~Ñ|]'ÁßÚÆjË£xÛáî¥ñ'ãn§ªx‚I<1à¿|<Ò/tÿ 
ÜÁà»›ûµ«E¾Ô¯İÀ>løƒğûâ÷ÅŸø*÷ü3à/ÅÏø!ßŒ¾ø[öqı”­ü=ğ_öTŸş
áÿ jz'Ã¯‡ÿ -/´¿Úş4ønşÃRÖ,>]Ë:İü6ñV¯¬ë^:û)ûL·‘ÊŠ<öïı¼ş>ø¯ş#øµàÏŠ?¶¾•û9xön¾øÍğà‹µ/ÙãÁ¿ °ğ/Ä	i/©ü.‡á8õKûÏŒÚ•Ùğu§Ä¯\k¿€¦ÕÓ\·Õ¬à±rüMûjÿ ÁÄŸgß
|ÿ Õøğ?ö¾‹TøeáŸŠÿ ¶Ï‰ïf?x6]îşÃñ3_¶ø2ÖÑZèÚ^¤×QëË¥é7Ûôøtém¬÷Ipw> ÿ ‚?|gø+ÿ {ı–kItˆ~,øÿ âìÛûO]~ÛŸµ´:&Ÿ§ü6×?iŸøu¼?ğËÄÖ5oßXx:	í>Â¶Şğ~”º#ËbóŞ<3Nd ´Ÿ‡ßàšàŸŸµ/üöªÓàŸ
~ü'ı¬4Øûş	Gâ?„^)ı¡µ¯ø•ákÿ üIğÅ×í•ğ¦çÆz—ÅY/|câ}â²ë_ôMBúÆ/ÅàÍ
k-.êêÉßƒŸuO‹?ğC¯Ùö-ı­?kİ?ş	Aû!xÊÇã|ø§âO‚‘~×ñÁGâÑ?j½câ_ˆEÑ>iÖ_ÿ fû(|F³Ğ¼;¨_ÄÖÍñ¼uåƒK¡x~îÅ¿³_€ğMOÚSø±£~ÒŸğR¯Ú/À¶÷ÇßŞñÏ‡e/ø/àİÀmá~‰ñ_ÂÇ…ş.é~"ğg‡5yü1ñëÆ6çÃ'GÔ<O§İOáI´igÒ$·úYGàGÄïø%üÄ¿ğmGìÅû!ü?ğô^ø«ğ×NøÁÇïØ÷ZğÃï|Pø¸Ş-ı·áøğÒüT¾ñ±ø\ş	ğôw_u×Ñ5—ÿ „¿Bº‹BÔ
Ín¶Ôù}ûgiß±_ü3ÃŸà_·Š×şI¢|ŸÄ$ø_û;øsşŸüßPı‹î>2Ûh<EâİWâ—ÃÉ¼s¨~Ğ~Ğ6~1Ğoì´MÅúª|1OIoc˜ÚıÎŸoävÿ ²ŸíYûÁWÿ `oÚëàÇü'Åÿ ³ÇÃ_ˆÿ ¼2?f_ÙPı´üñjÿ â§´_‡Sê"´²øåâÏxŸSğÃøŠËT(Y<i ÙéšLL4›C$ƒd¿?
ÿ fOÚâ“û#~Ï?	?àÿ ÿ `_~Í> ø£­~Î_¶¯Ç?ÚÀ¿´ïƒ?g¿üW†çYø‘âŸ‰µ-J]Sã~“â«KmCÁ¾ğ÷‹/õ[O]x“NÔtX¬áÒ#AãŸ?à˜¿ğV/Ùëö†ğ/Ç¯ø'æ‘¬~Åú?íWã{Ï„¿¼ñ³Ã
ıªõÙïLøl·×ûFÜk¼Qª@|3ñ£Å2ßk¾ğo€¬ô­[Âzn«m¡İÜMgbˆ x§ã÷ÅÏÚÇRÿ ‚p|,ı‘¿b-kş	_áø,7n<!ûNkß´‡?mk/öËÕTÓş'Çÿ 
§ÇšfªßIáÍ^v×ä²¿½¯RÈéz
Gop~¢iß<Gâø-‡À/ÚÏşû6ê|=á|ıb/wßm5{/Úgş
	ğÓãÌ~&øGñ‡Oğ'ìÙªZÜ|:_ŒúñÇ­¾üTĞ.~ø2Îâ]~öét¸+[öKÿ ƒbj€_¾)ø£âíığÿ â_ÁïÚzãXÑ¿k/†z_À=OÂú¿ÄŸ‡ş2ñPñ_4_x¼xòòóà÷‰µëó ³ñ§"Òuİ7òl®c·UqÚ¯ì“ûIiŸ?`¿Ùöfÿ ‚K~Ñÿ  ?e¿Ù[ş#ğ“ö¾ñOíñö™ğïÆİÅ~ğ&¿?€5ïØÙx£Ä;Ñ4=kÂ0é4´Ò¡~ú]••ÅœzTº•ìÒí‡hÅïÓ>İ½ë7XÕ´éZ†¹®ê–:6¤ÚM©êºÌ6:~Ÿel†Iîï.îd{xQKI,®¨ ‘Z¸öéùgıã§¡®WÆŞÓüoám[ÃZœs{ø­å‚K[étÛ»MOM¼¶Õ4]FÒş+{¦³»Ó5{BÖàÚ^GÅ¬M=•Ü!í¤ æâøÇğ–qá³Ä¿ü&SXøe·´ğúÍí¾¦šöv‘µÀsu»,:¶ò*K¹4; Ô¦ŠÕë?Çƒie¨jMñ?Á?`ÒµH´]FğxƒNk{=Râ+ù­­&•n
+İE¥jojù0Ü:ÿ È’Cgp#ğÛÙkR¾
“Vñ¾«y¯êZÕ®¹û@kĞİÚÂ~(Ga®_xêÇÃi¦§‡ã³±Ñì¼iqm§ØÜé#ÃwÖşMCF”^ÏªyÖ:ZoÂŸ‹Úı‡Ä|v¾Ñ5‰ZŸ†|;âsÁŞ1ñª–´Kÿ JşğÆ•uà	>u¬jZT:¹ÕõMBmkÆş)ñlwúbiğÊ€{ñ[á†­«éz—ñÂ:†µ­èöšş‘¦Zkºt÷z}¥zÊşÊ(®®!¼Ğ•µËQé'Ñ‘õX‘¬î$|sø0|?oâ±ñKÀÇÃ7Z—öE¶»ÿ 	›ı•>¢4ñ«Ik÷Ú<‡htœê·.®b¶ÓMBâH¬â’eò_àw‹îüA«èºrx.Óáî©ñ*Çâ”É½Ö ñV›u¦|?Ó|!kàÈ<=¦é6VŸÙy¤ZFş"³ñ–›u‚în¼'k¢C4Pk/ãÚïì¿ñkYğ¿‡£»Ñì4«}gFÑ<Ÿ>)j)áë=_áümRÏâ~µáKÆ7º—âëPøCw¥/ƒïà[‹Mçµ’Êàí+?‰ÿ õj²ñÏ…î|S¤Újz†§áøõ‹#ªØØh³Z[ê÷·VFa<Všd÷öQ_Ü2ˆm^îÙft3G»gMñw„õ‹oŞé>&Ğõ;OiÃXğ…Å¥gu‰´“e¤5=	á™×TÓÿ ³îm¯Må™šÜ[\[ÌdÙ4E¼'Äü]ã1âkgÆ†¥¨ZøKÂ:;CáËcC_†ú
iÚ·Š<;¨h?Úš[ÿ ÂËñ\wmã;m7U[KïéğÔÏy›5ÄŞgàßÙÏâç†5?ƒ—W^-Ñ.o<ğóáŸ€ï<I¢ø›Æ·Ğ4
j·W>Ğt_‡+e¨ø_Æ–?´˜ô-
ëZñN£¦_è×5‡‰,´ÿ ¶èú>Ÿ Ù7ş$ğŞ—ªéz¥âOÖõÈuG¼Ôm-µMVÛGnuk>Âi’êòßL·t›P+8ä®1"nËğÏü	ã9î­¼%ã/ø’âÎîn`Ñ5‹JXí&vİ–·³ØO"<V÷Ñ‡´Hä)ãp¾5ñ?à>­ã=7Ãö¶>%şÕÔt¨¼mî»ãE³ŸT¾±ñ‚<CáëâMBÓë@şÓÕÓûRÁ’Ù›J¸ÔÌ3Kw$hŞ!¡~Ìÿ 5]wQ¿ÖáğÎ·‘e¢[éóÅsñ‡Øîu›gûwÆÚ'|Q{&›ñÛY]'ÇºÕŸ„<%¬j’è^×m<-¤6…o¤L÷‹júRë	áó¨[j]6mf=7qûKép]Ae5ò§9·îæŞİŸ<I*.9ÍP¶ñ_†ïtëöz½µŞ‹â±¥7‡uUš{]U5ÈVçI’ÚH£Üß@Ë,3H-Œ¥İr3ñ…‡ìÇñ"/é>4µÕ<#á/iZùÕí¾h:Æ¯yà´‡Ô<æxMõQáMPşÆŠxâ=…®•¤hº<?5»mOC×t+Éu
^ı˜~%xSJğU”6_t/øC¼?á#Ä~‰â¯^iõ/Êe“_ñ™¼ğ…£éwÚG&‹e¶ñ$Óiºş§k=ÜZn‹¡é¬÷ñP?‹ôÏ·©ïúñY÷š–Ÿas¥ÙİÜˆ.u«Ùtí2#Ìn¯!Ó¯õiaˆé]?L¾¹/;EÕÌ¯oùçwû,|_›Â~Òt»_…¾×lµø“R¾ğç‰f’ÂÏÇZİ×ƒî¬|Wá‘©üïÃzv™g ]x{Iğß…áÖt­2ÓKº¼ñïˆuO[˜ö·?³_ÄÛ¥ñ\x‹C¸µ×<KâırÊÊÛÅ2Ò¥ğï†|EğçãOƒôÏ…ú>§ı•©½·‡ü=®øÿ Eñ=†»ŒRÃ}ªx™-ü7m¥xoÂ$€s•ø¿O|zúñš6ƒü^ı1íßŞ¼Ÿàƒ|Gà‡ºo…üM‡¢¾ÓõvK[_oìëM&ûX½½Óm¤“OğÏƒt‰¯ã¶¹|ú'ƒü/¤‡x¬4x¡ŒM?­ãØuı09^¿=¨  zu#?‰ şŸÌúš\şÏ§>½è¢€Ô{ÿ /ğ˜ ¡şŸıÌúš( Àôÿ ?çúz
0=:ÿ õÿ ¡ÇÓŠ( :õıÆ“'èêÀ~CĞQE .§ùÿ ?Ìúœ˜çóşc9¢Š @?1øÇ€.§ùÿ ?×ÔÑE #ƒÇcü¿Ïä=.§Oş¿òÏ¨¢€ê?Ïùü»t£Óüÿ Ÿä=PÿÙ
            [firm_left_thumb_ftype] => image/png
            [firm_right_thumb] => ÿØÿà JFIF      ÿş <CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 100
ÿÛ C ÿÛ CÿÀ  “ €" ÿÄ           	
ÿÄ µ   } !1AQa"q2‘¡#B±ÁRÑğ$3br‚	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ        	
ÿÄ µ  w !1AQaq"2B‘¡±Á	#3RğbrÑ
$4á%ñ&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ   ? ÷Úƒã7Åı¦?à³ş>ÿ ÁT?à Ÿ²—ìÏû~Ò³ÇÂÿ øöZ¿Ò|Agieñ»ÁšL6ĞÚxc\ŒyÁâsŒ¶VñG¡u2Jê«_üTıªüEãÏø'gí·ûj~Á¿ğ[ø+'Äÿ ~Æ:ìÕcâoütoøÃºŒŸ´GÆm/á®”b›Fğ³Ò¡ñN¤ÆÖâ×ì÷ö:dsùÖ÷R ö/Û/Æ?²V£ûDÿ Ázÿ c/Û7Åß´Áö§ı«¿eOøâÁ¿Ù·Ç_MÎğ[Áz&¹©y_ØúkhÈ— Óô×7ªæ+‹‰mÄlê?7|goÿ ìı–?à•ßğQÏÙ3ö8øÃûeşÑ¿¿m-Wö?¾Ò4Ï‰ß±ŸÄo…š^Š?gzõ%‡\]2ëMÅÿ †u]?ö„¶äÜéVvl×ÛTúø“ğ‡ö¼ı«àª_ğSÿ x§ş
YûfşÁ²¿ìÕá¯Ø«RøMğçÅZg‚>jóüYø¦ËñZë¾;±_°xÛG‰ïN¨OøšîßR"òæÚ*ùçáÿ íÕûQÁH<Mÿ ”Ö¿a¿Ú+ã€şi³'ìÁáoØÿ âwÆİz÷à—Ã¯ü`ğ¶¸¾ø×âßx×Tk¯ø~ÿ ^ÕtYu½cOÔ.ì·¶Ââ+v½cÿ }ıº|iûBx£ş
oÿ ŞøÁğßÃßàŸ³„¿d›¿ÚÓöÉğ¶½}â¯ß4/?Ãß‹_¯¼ğ2[X-ü{u«|ZÓ4ÿ ‡º¦™¨3hŞ¼ŸÄ×…üÑ?jOÛOö^°ı½g'ÿ ‚}~ÍŸ¿`oüø!®êŸ±·ÇÛCàÆ“¡øÆòß^¿ñ‡ÁëïÃ{â/Š>)ø†îÏÆ?|áİKR¿ğV°&‚âÚÒy ~~×Ÿ¶·üâ/Äø%çüwâÏÅ_‹±_ícñ/ö…ğ÷…~8ücıµÏjÿ ümğSÅşû?µïügñRè>8ø…©]ZIâOxi-åµÒ®îÒ††E¯>ğ—?iÏÙ[ö”Ò?iß‹ğPŸø+ÿ Æ¯ø'çÂßŒ#á%‡†o~êŞ0ø·ñ_ö—øOâ·Ö<}à_|ÒôxşË¾#ğF•u“ñCO¹şFítÛb‚taì¯/ìåûIü6Ö>0üaø£ÿ µı“¾|#ı²>'ü$øÉà§ğõ¿ü—à¯tKyü5ñ'ö`ƒÁ–ï¬ükø…¡[^CğÖÛÀSCwª¯‡í…ıİ¨ºGQÿ hÿ ‚˜~Õş;øàßì‡ñ{Tı–ÿ d¯…¿¾şÜß´—í™àwL·øŸgğÄxƒKøƒğóAøqâÛÓ|añÂ5şã~iñëWÓÆq¥CSõ½—ü+á¿íq©ø¯@øe©øËáGì“ñ_N×?c+OZ&‰¨h¶ÇìõûløÆá4ù¾ ø·áş«uiğÏöløQàZøŸTı ¼U¾áOŠ|ÖÖ$‰Ğöÿ ‚‡~ÔSüMø7û<~É÷ß ¾7|ø+â~Í¿h/Û—âì¿ÿ hÏŒŞ6ğwˆ¬ü-ãÿ Œü;o©A¢|rğŸ<&•âüCğìxÇ>;½×4­;|ò«û]Á0<Wû?xoãwÇ_ø'íÑûFüsøûûQ~Á^>ı·ÿ k+Ïˆÿ 4„^øÿ ßøé¦kş9øÕ¯êş=ºk½Vøâ¿é›Sø3§ıÆWVµş¯moom¦°lO†¿²×ÆÛëöŒÿ ‚séµ†¯}ûè_²/üßá?íAû<üUıŸçÓ¾8x÷Æ_?g[ë_¾%ßxNäÛÿ `ø÷Y}kXÕÁ%î¡e©xK´‚Şåµ€û¼ÿ ‚ŠşÏÿ °‡ÿ nÿ ßş,şÚü¡~İPü>ñïÂ‹ÍB‡>1ñn‘è_ÿ f64Ù¼ağa$³™ô­vÖkƒ.©q-¼bWeQówücÆoOÙÿ áGí?ÿ ´ıº¾"|øÓàÏÍûk¿4?‚—¾:ğV•âñ®~6|<–]Gâ&ƒâ¿xSDÔ!°ÑšÖØ½…èf8§IGâ'íâ?Ú›Gı¢?e†Úßí{ñ#ş
Gû0şĞ_±æ¿ûnÚé?¶¬>ıgø0ñ%Õ¾ñÇÃ>†;SÔ¾.üÒí.<eàoêÓE{¯x…ÛG›N›^óûxSöc›öÂøiûTøûâ%å‡ÅïŸ²í[¯~ÌŸõ}
;_ÁG¾êÿ µÍÆ´í(..íôÿ ‚ü3~ğÇÃËkdYÅğDÒÈ2øÕğÿ ş
ïÿ 7ı³l9¾6|køëÿ ı•?bÿ Š'[Ö®ì?aÏ|Iñÿ ‡¼º'§Òt†f±a¥j:F¯ã­Ñ¼I<úŒÿ bmS]¸Ökt?sÿ `ø:öhøI ürøYñÃÅßµŸíû=üÿ …qÁïÛÅ	uÿ üpø–¿.üY¯øâoÚe´İZ/ø	ü'ã=KMøkğ”Ú½§ü$Ñ-¼Ó>¥làÿ =Ÿ±òÁÄÚ?Ãÿ Ùöhı•¿h/ø'á×Ç?‡ßõßôïøHÓ<á/…³xƒÄ¿4ÿ ˆvú®“5ïÂÛıJs­ê~Ò|o6Ÿ¨x¤Ü—Ñ#¹Xñş	!û7üT¿ø'á¿Ø¿ãœ>øWû%ÿ ÁÀêKàïÚ^hw¾3ømü/Å_ş#ëòCà‹Û«]2â¿ˆqi¾uñv¡¥yšeñÕtO¶Ì© T~ı·àª³‡íûPk¿µ ¯¾-şÔŞø5£şÅß³‡ñ»\ñWì§û?kŸô½øâÚÅrOi¨şÍºGÅjºG‰twÄ’­·<xdÒ4’b‰sù‘á_ø,_í7û\ÿ ÁÀŸ²ü(o´o†¿aŠ_¾ü1Õ~^Çâ/|ñg¼ğ÷R°ø¿£hv²Éw¡ø“L_XÜ]‹mFâ{ëuµÔ.¡¦^ûğ{öøKÿ Iøñ+ÂŸ¶Àÿ †°Dÿ ğY›7àÁ?Ú—á/‰uŠ0øÛ¨~Ã>)»‡Å¶¿´ßË¤èl>iÑ´^ë’é¶¾#‹ÄWie5ÔÖ°ïÇÿ ‚|øû6|.ı‹õOÛâoÄŸø—â‡í{ûB|+ÿ ‚~üñÃ[±á/‚|â'Š~-xW\ÒŒÚF§ñ?ÁéÆ¥yâtŸAhÙ#Ò÷+aı¥¼eáÙ·Ç?¶í©ÿ –ÿ ‚¢üğçŒ?o¿Ú‡ödø}àOÙÚ}ÆÚ•oğ·Ä:–£¢Ä,µµ†ÿ N´@[e"êKx¾ËkoJˆõ?…ÿ ¾!jW?ğL?Ú×öSÿ ‚¹ÿ ÁI?i_‚ß?à°³ßìCñGáÏí9w¢øOFÖ4]HZx×ÆÖW:†q©iÚ’ÚF"İ]µå–©ªÃ%¸’Ş¿?uû¯Ø/ãÏìqãØ‡öÑø¡û\~Ï^9øUÿ 3ı°?hM:ûá7ìñâõ½¢xç_Õ¼;¢Bú¤d::Áqk%İöë[©gF†dòæ^Ëğ^ıŠşh_ğI/Ø?ö)ñÿ íIñãPğ‡üKönı¬ügâßŒ?²×¾[è~Ôí4ÿ ‡šºµæ¡¦¶†öºUõ¶…q½¯Rå¡Ô/n%D¶±i(ú¢ÿ ‚Û~Öÿ ÿ fß„6RxOâÄŸ²oÀkË	î~/~İÃ?¾%|ñ½¦¿¡Eğ»áæ‰û2ŞiÚ¯ˆ~$XüoÖ®‡õ¿i¶ëkğóOÔdñ¢<‹pÃñ'ş	µû[ÿ ÁN¼aÿ •ıµ?lŸø(çíïñ#özøcã¿Ùšëö[ı«|7ğ§ágÇˆ¿4û/^,øqñr;€_ô¼MŸø’|>¹_xvŞkmYŸÆ¶Ÿ¥^^W¸ÿ Á|ÿ eïØ;öDñ²ÿ ÁAş$ÿ Á 4ïÛEñç‹4Msö”ı¤&ı¶¾+|“áŸnüCà¯ü?gøY¡øƒ]»ñy×Rkvğ†xFÛLÓFŒ­ı½îF·ƒÿ jØ{Äÿ ‚âÁEÿ c/ø+´Ÿáøáâ¯ø'®¥ñã}¿ìEñ?ÆÏû Ïá+¦ø9á=5<ñ'Ãñ¿Ç/ø_ˆ|(×z?„4õøpº£ké7Øí5ù1ÿ ]ı¢>şÎßğW/ø,5÷Æ¯øŸÇÿ <wáOØ-Cöox±~~ß±x{ö~ğ_xçã¿„tmKZøoğ+TÕ´ïŠÚ6¡¦Ëlş5Ö-?áœÉSúÖÒ>Á+¿dÛßø&gÁ·ø#¦ü1ñ=ßÄŸˆ¾'ı„ü!¢ÁñÅšwş/xÓÂx»âµÒx†ßPÖ,4Ã¨é¤¥îş%^gfƒHŠ¡ä¯à?í?ûxÁVş|tñ·ÄŸø(GíÙÿ 
øñJÛşÉàıŸ¾ÁJañŞ¡àÏ	èºWÆôO|$ğ¦£â¿]ºğÇŒÙ¾ ÚXÅ~ßÿ °|0n-|!|éøíûÁÆŸğZO>+ø«û#øÇ×ßµgíûH[éŸÿ d_É£~Í¿eøMãUÕ<A«øÒUøA¥ø/ÆMâßiòØ¶ƒñ^ÒtİD.-î¥Ô]bpèƒã×í©¥ø/öÜÑïàğÊ~ÊğYûÿ i¾Õ¿dÏ^ê_¼ûx~ÏZeÅğıœ¾üIı§®´k‚_³ŞƒãXãŞø†²øƒÂq.‘â;§ó ®óöXøUû0ÿ ÁI?à—´^±ñş	iğ—HñçÂßÛ#ö¨ño‡¿cı[ö—ñŒø…û`xwÃÖ–:ÿ ‰_ãuæ©á;]"_ˆzÆ½¨xzãP…¯¼¥Ù¡ÖtØe¶exÿ ’ïØsöüŸãgíÉûJx»şAû}\|,ğg¾øwàíCá¯Ù¼xá?jß‡ ñlú~©û<\ëŸ³o„´İKàô:\O¨ÂÍğ,zÍá·û4µÚÊ®ß§¿¿d?Šÿ ğQ…_~	~Ş_ğUë¿Ù¿àŸìƒá~Û¿fI?c/|Z·ğü§AÓ®|!û<şĞ1|XøW­xOÄŞ!MOá~¹&€Ÿ|UªxƒãŠXhx¿Ã2ë—"â0°ÿ gïşÙz¯ÅïÙ×ş
Sû}x÷ö:øUğ‹à×ÿ hÿ ÿ Á.¼!ğ‡áßíğVÿ ‚Cø*ëFğdß¬?j†ìuEuO	ü·ğŞ‰¬ê?åğç†í¼we¦İ^k6—UñgÅß€?·%ÇüÃö6´ÿ ‚N~Ù+½økñöğ'‹~øÂãÀ>Iû$ÿ Á8ükñöæ×FøáıãïÛ<{ÿ 
—Ã/á=kKÓ|c%ŸÆÈ?³ï­"¸‚ñ«åéà¬|ÿ µŠÇâÇÀønoÙãöLı»¯~ÿ Á4ÿ à£·<+û=Iğ_ãŸÀO€ÒÙşÇş#´ı•¼=ài¼_ãi>øÊÿ ãDgÆ¡¯øWÅÅÀ?5WTÒ!'Ùô/ÚâÛá?ƒ?c~Ò_³xïãíñKötı¯üÿ ï—âÜ¾öÖı¬¾-Mi7‚¿à²2~Ô
Ğ¯¼3ğûÅş6²½øYÿ 7©Cáï‡Ú¸ÿ „ÇSğİ†™{€9/ø-ïü£öòø•ûşÍÿ ¾%~Øş8ı»5¤ı—|]ñŸÅ_|oğËáÁ›ƒ?¼ñV‰³iš.ƒâMÆSøwJşĞñ…¦‰ <S¯\Êt}"Êá¼ªä~~Õÿ ğFo†WŸşüvø×âOø)oÀÿ „_ü}eğöœø…ğã¿À=kö'ñ^‰ky­|6øAàï…¾	Ò§»ø§§|Hñûiúıß‹|W¨ŞÇá‹›íîüİ:Yb?§_à¸ğS¯Šş ÇãoØ’_€ß²/…üU¬Á/iï†ö‡ø)ñ"	~Ö_îßÃ^øş,Ó~ÙüB×eğ‡µÙ$_xçø{âQg²ÿ ÆšUİÀ/“m?`ƒ±§À_ÚÏş	Óeûk6»ğ*çö«ıŸ5Ú—ööÿ †ñ˜ÿ ±Çí?àJÎ÷à/À…ıšßÅ!ñ?Çƒñ¯Q¾´ğ²|â³à‡¦,ø¨\ÂÒ*€zÿ üö”ğU×ü?ş
Wûe|Aÿ ‚ª|[øaûaüpñì­«~×_4ÿ Ù"çÅ¾4øã3Å~-ğÃï
øsÁözBè_m>,xlôs]ğŸ†¬í<a~×úŠ‹›v»®ŸşÇà¿Øãş
5ûÁ5?c?Œ±ßƒ¿jM?ö7¶ı«áı¬üñ?â'~	ŞşÈ#ã×Å‰ß¾Ÿxtİø:ÚüsoéºWˆÇ‚5}sşŒzßˆœú—Ù®>Høéû|hı•ÿ à¨ÿ mÛø,æ©ñ3ö~Õî|7ÿ ı¹?á‡¼-csû*üNøÉğ§Nø}û;ø1¿gÙuíoEøÎh-+V·ğö÷Â/êúÃoøHüa>›8{¸öÿ h¯‡ş'|øƒàø:£ö„—öbøÍâ$ğÈÿ ‚[üx½økáx´¯i¿í•%¯Ã¯Ø>êÏÃZÿ ü$~±øáY×ã¥ÌcO]iu‡ïtß£ wŸğR?ØÛş	5ñwà7ì¹ñGIÿ ‚•ü_ı–àœ#ñOÆİ7ö*ıšü'ûü\ø­¡ü6ñŸ…µ_øö˜¾´Õïµ>.¡ñ¯Ä»	|W;üC·M9î5I`ğsË¢Û#Ÿéãz|1ÿ ‚šÿ Á3üûAÿ Á9®äø§ûK~ÏúF·cû üUñV›ªüñ'…>=x>áÿ ˆ¼E¤øoãğ®ƒåÆ‹¦êV»<y¤j¾h_Í³1†é¿—‰Ÿğu7Ç/Ù—âŸìáğ³áGÇø(7Â/ÙëXñ§ñ¯ö†—À~ı˜ÿ á¸|=ãïÚßø3Á?õßº¶¿û>/ì÷®jxZ/x^÷S¼ø›ÿ ØÖ55¶µÕUW÷×ş
yàŠ—_µ¿üÓöØ¸ı¨&ñŞ½eâıÆß°?üÅ¾èƒâ÷ÇÙ¾ØÂ{àèÿ lT`ğ#xƒDÔe×›Äü>|'¦ÿ gÿ fé6Âæév {WüFÓş
aûşÍ?lÏø.í{ãWKğ'ƒ<_¨xƒàŒşøIã=á‡ƒü!{¥kQüZÓ<iû>Çªj~*Õu"-WK—Á°i6Q~ıV[‡…+óCàüçá?ÆÛ»à½¿ƒ?àáÚ[Æ~øÁûUø&ÛÀ²–±ÿ ØÕü%à¿é:ø¡dşıŸ¥ø·«ø>ÂóHĞ5m7Pµğxîò{kÛM1ÛÄ/±ÈËÒü=øIÿ şÔ?³ÿ ü{áíùğşñüñ¿öJø§á¯Ùá<ş0ıŒäËâŸŠüKü#ş	‹Æ?	ïôMJS¦øBâçG_|BÔ4İ
ém¾Ûy4Œ¨W_à‡ìóûNşÔ±×üKÃøé?íÃâŸø'ïü#ön½ı¥µY¾øö{oÙKÀÿ ³/Ã­7Âß>-¥ªh6¢ıŸµ›äÑ×â'‚fñn«ñ3û\ßhC[¶²3 Ë¿ğTïÙƒöƒøYÿ WñWíÙğ»À¯ü/á‘ÄOüXÿ ‚|AÖtÚßáÏÇ/üVø}¡|<øvšgìÇ¬ëZ¥ğåüU¨^IğzÉ4
µ›«køÛPÅ4ñxœÁ?Ûÿ ö½ÿ ‚Q~Ã_²?ü·ö³ø97ü›Æ3Ñ¾-Càø(ÿ ÄCá‡íGàí/|OÔ¾7ø©¯føcÆÓøƒş+?hí¯â´mTñõ—¬šhô‹o–ÿ àºZ/íeğcã?ü×@ñÇÇÏüø=û[şÕ?²ï~|øà¥ñWŠ¿iİ3á½×€ôûˆŸ|_Õô~ğÇÁÏ\Á¨xÓC¹] ø¡fKt‚à)qú-ûCü#øOû5üqøñÇö÷øïá/Ùkş
·¡Üè#öpÿ ‚Œ|uÒµÏ~Èÿ µJëÒ|#ñ·VøWûég]ğ_„¬şüÖü7ğWÄ–Úõ•¹»ø®ét¡&¥hóDøûûü6·ı¤nş x«ş	‘û2xö˜ı‹ÿ iØ¼7¦ÿ ÁE¿à‘gÅ©tˆŸü7ğ–MzÃöt¸¾ı¸¾5_iŞ4Ôás|TÑü]ñîÁ¾"ó@Ò4¶øeãW½ÒOß÷—üãÃ_¶7üCãGüÓö"øíûø£ş	_§x×ãÅ/|9ø³âÏ‹ÿ ¿hø5©ãøk¢^]ÙCá¯†òø;Vü=§xjËÎŸUñoşÙFŠs-¬ë/çß€?aÛsNı€ükûşØ¾!|$ıª<!iÿ Á~èÚgÃßüqñŸŒ>,]üJı´¬®õ_ kP[üU
øu&‰â;_‹:ÇÙ|¤ßIƒ¶Msql~’ı‰?gø'Gíqÿ ıƒà øïö•ı™õ€ß³6£ûKşÔšuÿ ‡º/ì‡áYİ|BÓüY©Ïq©ëß4ÆÔ¼Aªi^šóáş¡§wyjïpÃLœÄ ÍüÓXı»¿hÙö³ı›~8|kÓ¿`Ú—ş	è>hrøâO†¿tÙ¼¯|l?µ5§ƒ<=ã-.Çãv§¡E{§xOÁ>'°ñ?€ò`#ºR÷ûÄ/ø-×Ãßx›Ç±g†>ËûC|3ø‰«ø‡ş	á?ø$†‹ã$øyñ)l<'¨İü3Òÿ i#ûi_xÛX¹Ğş(hÚ}¿Âİ?áeç‰-µ?j7kã¯Éq—oÔÿ Á$¯¿à“ş¼ñOíÿ ñø“áØâ€^3ñN¹û|x7ãş·âÿ Ú_Ä¾+ı‘üâ—°ğï|%â?iòÅğ²ox‘í5í?Å‚ëÅXÈtÛäuv'éïşÀŞÿ ‚Rü1øóÿ  ø5—ñŸãwí©ñâÿ ‹¤ı·­¬%»ø7ûşÌ®áxø#öŠñÿ ÂÏ«Áã|Ôtİ?^ñ$Ş°°ñW‰´íA,-c‚4ü ÿ ÁT?dïø$Nñöt‡öIı¤toÙ;WÕ|yğ‡àíûëº'íñË]ı‘¾ Üê<‹öøÍâ_‹2ÕåÒş%Z|Ô¡Ğ~jş	øsû]øz_øGS6š­Æ±Ÿ
|-øğjÓş	ÍâÏØ_ö,ñí›â‰à–?d/‡ßğU¿|^Ğ~|?øOğÇÄ²GıñïöCø­wz1‡Â×6Şøÿ &™}j<Iªi:š|<mnŠñ[ò/ş³ı•>j¿ğOØwş
3£¡üHı§~$ê¿³_Á||ğşøuñƒáï‰~||ø×ªxïFøc¶Ñ4‰<ã¶_Øj7x×ì´[ûM{£mmä¯µÁ¿à£¿no‰¿gŸ„Ÿ>#|ı¶eïø$EÇìËàÚ;ÅÆ?³¾ÿ Â¡iúõßÀ;k;Q¾›â7ˆ´ï¥ş§%Î¯ÿ ş?†&½{kTŸÿ ‚‰~Ğ_ğS€³GÇoMÿ ÈøKû@ø;À´ç†?aÿ Ú¯ÂºGüá'Ã›…ş!øe¦xÖ÷T×§Ñ5İfçÂ>šãS—şÈ¯&¿I=#ÄV—Ñ£qı˜ÿ eø'OüáOìuû:ü'øy{ÿ (Òÿ aoÙÛÇŞÔÿ o?üGø¹û7øWáÆ:]Kâ/ÂŸø‡à¹¬x_Tñö¥ñ]³±ŸMÕ®µèºéïo­]ıêKSùƒñ§Kı”l~>|pÕ~;~Àß´?ÆÏÚ;À¿¶÷‡gï·¯„?h»ß~Ìº÷íåâM~Ò?üQÙ¢)_LÓü?wâ9¬¼]Ã¸í.ôæĞm¦Ğ$¿+‚£Ş¿m?ø'Ÿì‘æ|^øsûb|s“ş	óÿ )ø‘ñOÁòø_öµ×üIñJøûjCí~%|"ıš¾êVşø{áéúg­´}U­¦Óµ‰Rµ_*Y üøóû| øãñŸÆÿ à«ŸğX¿‡ß³oü?Ç:Æ•ûN~Ìºïìƒãk~ñ–Ÿ¦iš_…<7¨x³à^¹eğ‚úç[ğ‡ƒõ{kÿ ÚÅ§Ø¦·^í[}AÛ÷¿ş	½ÿ ¢ÿ ‚K~İÿ ÿ l_Ù÷ãçüâoìuñ“ö*€ÉãøÃöüøíñ¦öíş?øcÆ4Ğz‡…<o¢èšgÙ|3á}#V±êzà½‹ÄVğÎtë­6âŞOmı‘¿à–_±?üÏÃ¾8øÓğ?áŸŠÿ à¨ğVoØmôüzğ‡€~"xŸG—SñgÇè5G¿½ğ/Å‹í_Àv‡Gø;â)µô‚WÕI‡Â×¶“ZêrÚìñ_ø&§ìMğ[ş
Õñ§öÏ“ş
¡û6ü~ø]ÿ =øÿ  OíãOüzñ/Âo|Kºø—áoí¥ü,ø?¬iğrøCà?€>é—©÷ë®ŞŞO¯¿Ù¯õE$ ‡ãçíOñ¯öşÿ ‚¡~Ï²|~!Ñ¾)Áÿ à¡ Õ>|:‡GğO‚ü>0\şÏì¼Cñ—BÒ>!Zèı¨<'?‚?ho
*_jºÇ†¤ld°Ñ/uO
Ü¼sıOû~ZşÓ?ğS½áïÆoø$¶™>™¢Á/õ}CÇÿ ²/Çè­ü#ã]öŸøÓm¥Ú|%ñßÀÀ?›ÂW?µ„iš„—Œ¾$éş)ğÏŠÌLÚTŞUëÿ 2´ÿ üş
wÿ ãı¥üoû_üøÿ ğwã‡ÂÚÉ<7àß…ÿ µo…¿g¯éÿ >#İşÏÓ¼%â½á'Ãßi÷“ø\øq«k·~ø‹«iÚF‹7Œ¼C§\ê×wšMÃõkö×ÿ ‚IşÑŸ´Öâ/?µGíì»âo„ÿ |ñ—ã_üJÏCñ„?eßŒŞ ñ®‰¥'…¾ø/öuøaâ2?xÃàôwvö~;ñœZd²xæşä_´fBï@•Ÿdï„«¤şÕ_°ïüCöAñ×€àµ¼ã?Šß²‡¯¿h¿øÙñ§ãN¾Â¯†š7ÂÏ…>#?¼1zú³kúÄz×uûÜDŸªÚXB–¢¿Lt?µƒü%ÿ Aı?à¢šØğgíçğ“ş5ûøËÃ?¥Ğ¼§kz_ìG¡è0|,ø_âC^øIa/Ã½vÖOZx‹ÃÓM«ø›Qø‰¨ÜÛ›ß[Íf-/[ãOø!ïìão†_ğPÚCÇ?´ÇÀ‹_´gÇ¯Ø·öwğ·íƒû!ø/Høuáo|d½·ø‰¦Áğ“Ååîµ§Ï¡|EĞKÿ èş/–{;X¯ã:”sFE~”|qñ¯íiñ›şcûşÍ?ğPÚëà_ÂøCâOì§ÿ ø	ğïWø£hŸdñ¶»ñÎûÃ?¿bŸø.İµ]wâ…¢ê~"ğıßŠµHø+TÖ´Éµ©4ä¸òPåïüSáÏÙ³ãíÓûKøóá—Æ]GáŸíû3ürøkào|øÙñUñÏÇ_|Lÿ …xtßşÌşƒÎÓ|à†šD+{ñ'FºkIu;™"½¶Wéıüsñ‚~ÍÑ|qÒ<yñoözø­ÿ ñıçÃé¿o?Ûsâ¿„ ø‹ûÿ Á=uÿ Ë¥ÉğJñwÁ/Û_k‡í[ğWµøgá+?	#GãO‹–ÚoŠußô{;vO~+è_~)ÿ ÁFàµş/ÿ Á9ÿ m/ÛNñÏíû-xÏâÿ ìgğ³ÁŞ)ñgÀùüà]^·Òuˆ^"†çSğVâëëk[WNÒ h¼Aáı+V†å£1Æãö‘ıhÿ Áoÿ à¯ßµÃOÚkö9øğ_öRñ—ìƒgñÓÃ_·½ÿ ‹®ÿ e¯ˆ×?f=À?åø“à}2ÆëÁ~/“Â~$ŠêëÁoãI­äĞ> ê~Õ<:%Ô‘” }q{û%~ÆğPÚöàÿ ‚‹ÁL¾7|Tı“#øY£~Îwëû+ë<Qğã?ìºÏƒ!ø5&¿ñ‚m ŞøsÃö´ôğ‡şÉáKˆ%Ô<7â?¶ËŞßÌ‹áŞ3øCÿ ­ğˆbğ_ì=ûKêß´ìiûNù^ÿ ‚Ë|bñÇ=cã¥ğ[ölğu¼zÇÀïjŸµ¸?´~Ûj¿üïÚkÊšŸö’Bš2AQ†¯Ë¯ˆ¿kß€_ğrÇ‰,l¯¯í§ñ]¹øpŸ´/ìÓûx+Ä^!øuûHéÖ±¥•ÏÂí#Iø'ñöÖÏÇ‡áî‡ªxwÅ÷Ö¾5·¼·ÑõÏø‹Äš…á³sğŸü‹Søé¦ø3Â~,~Å¿µüóãßíâ/ø7ã¶‡kğºçöfı~0|3ø|4”øCá¯‡ß4ÉmfÕ|]á½¬µo‰ßğ‘>¥¦^x›PmkK‚t€~Ä'‡à–ŸµìÅû"üı,~!|4ı“>~ÚŸõïø(«İüS³½ø¡àÙ&{y¼?/Æ‹ß¼3kouoğ?ÅüV~]]FËNy“)pû‡Ú?ğUø3ş	Ûû%üı¹¾8üAñÇí#ñ’óÄ:Á?ØO‚^>Öü=û,èßüğã\ñßì/íğOÄ“Eá¿vvZˆ-ş,\¼Ä:şÒŞ[²‡Qğÿ Å/Ù/ö2ı?à˜Ÿ³‡ü«öı§şøöÛı¤|_â/iÿ ¾|VÑ~x?áç‚>:øCOñgÃmKöğŸYÒt‰!ı4‹/2ÒN“¬hñxË¸ÑRåÍ_Jü<ı‚¿à¿ğNÿ şø¡ÿ iÿ ‚ÅûXşĞÿ ³’iµÇÀoÙÂ?µÅ‹¾üYøOáßÙk?tüø÷¤Y/‹fñÍ¾‘âipØ6›áïhš…®§jZ=Ş >³øëû%Úÿ Á@|wû9şÖúÿ Åïü@ı¤¾ÿ Á¾şØÿ ³¿ü³ÀÏªØİjŸµÇ¥¼ø‹ğ§ãU×Á(¢—áßˆ~jş7ñ„ÿ Àí3êÆúÏÂ²OŠ›Oÿ Á'ş~ßŸğU¿
|wñ—í1'ìåû3jß±ÿ Çü7ğ§>|ƒö}øÁáoÛKàÆ‡àïøëâÇˆ>C*ø k~,¾Ó>'ü ½¹)âËİ&Õnce°¶zşo¼wûEşØ?ğZoÛö¼ı¤¿g¿‰:ì‡¤şÄŸğOïß<¥|>¼ñ§Á=fOØ‡öjø“sâïü™~jºıßÄ_°üKĞíç³†ÿ Gøy=ç†í<Ÿìè´Í>YJÿ àœ·_ü¯ãƒï?`}×öLı‹¼!ãOØÅ¿´Åïí!ûBüø£ğÛÅ_>ÚøgÃÿ õÚ‡Tø¿áírçWñ—Ähú‰ñD¿µ.ê-KRğö£¯^êÆ[(á`ş
Éû$ÿ ÁKü_©j?µWü¿Çß¾|øûm|(ı™õY>|<ñÀ]ö€ğ§Šü`úî¡ûRh¦ÊtÍf:Íµ¨,üuâ$Ø%¤Ko'—hµûiûZxögÿ ‚ŒÁ?õßø'ìåâ{…¾%øc§hş<ı‡hŸÚ3Äğ³<Sû[|ø'wuñ3â?Äÿ Ş?°‚óÇzÿ †-.l.|7«ëw;ud€^Fğ@ø?`ŸÚwá¿í—û+üı¦hŸ?ğU?†ÿ ´wÁGı¥şéÿ ²_Å¯‰ÿ ¾.»¤xÎß@øgñSâ^ñ>Ñ´üğ¾¹ë_ï4-.şi¼{4zmúOrñ×ôÛûü6ø‡û~ÙŞ?ı”oMá‡Æÿ Ú'öìøoñ›ãOìıªşÉş¸±ø_û;|%øağïQĞş'|øO£|GµÒ¼Kğ¦?ˆ3ŞC6‰á‡:uß…uMUÚã^’)\ùÿ ÿ ‚~üGı–t_€¿ğ]/Ú‡öïğo…?exGâ,ß|ãOüD´ñ&¹«øÃOøû8|>ƒÆ!ÔåŸÃ:Ö³5=-¼=s©Ëy- ¹´¶°’½ª<ÓÁ_ğHCÄşÿ ‚­~Ò®ÿ l/ø$‡‚ôøbùe‹Ÿ¶ÏÆïY[Ø-íõÇ‚ş2·ÆÏxFò{ÏŠ~n­meáÿ ‰ŸşïøOü3a#7
?v?àßµì3û;şÍ^0ılß²çÁÙóÁéáí3örı†¿l?xIı¶¾éÚ%ñŠ|;û_x7Æ³§…/>"ë>8Õ4|*iÇaá-KÃ·³…ÔZ	«æMkş	£ÿ šñìÇğ£ÆŸğPÛ;ş
aûè¿´l^5m7öjÿ ‚ˆ~İZ_Ãï^…~;M*ú?øÆÚ^¡¢jmks„|o§,GPzW‰¼«Éö[«Ë`€ÎÏüÆÃö˜ı>(şÆğU=;ö²ıŒ¿lã‰~)iôÏ‚?¯æı—t[à·ƒü3ğ£Æ·1|!ñ,0øIõ‡ÕØxô«8¦Ô¼m¤_ëÚ«K~cÿ @Öÿ ±÷Æü`ı¨?kÿ Û{ş
ƒû+\~Ó?f_€ÿ ü!ğßJâ…?f¿ÙæÃXÓl¬ü)ãÚ_ö{»ûO„<ağ÷Ä>¿·°‡MKi!¾×ã‹Stù+şİ~%ı ?à—ÿ ±ÿ Á½kş	¥à_ØŸş
ÿ „ğ¥ñ6÷á7Ä¿‰?ŸöÅñOÀıKQñ>ƒ'Åİ_âÇÅ»´/†&—âÿ >(ñ†ü6ƒ¼Íi ZøwZi5]šOÌÍGö/ÿ ‚¶| ıªüQûø¿Äşñ5‡üGáÿ Ã?‚³şÔ?tŒ~$øCw¢İè±übÓ¼ğçÇúåœµ†¥ğÚÚx<?ªév‘â{_ÚÅo¦XÙ8ã¸ èş	5âÿ ÚîÇöı¸ÿ o_Ú¾÷À¿¿k]7ö:Ó<àØ‡à[á÷ÆO|øuã­7Uø/ñkÁ>½øF×À_ì$’ßáíñ¼Š[´¸´ĞE3ã÷í—ûz|ÿ ‚…ÿ Á<tÚãìâşÖÿ µ§ìÃ [şËW_³f˜?lÏÙÿ ötøİñQºĞ&ñ_5¸f};Wø|¶—ß¯üKáëÖ[ˆ¢mKJˆ!iáƒà›¿ğPÿ Øö¦ı„~?|ÿ ‚•~Î´W~5~×~ıŒ¼âÏü_øáñ'áî‘ãŸ‡^~¦Ÿ>8Ót{½cáÇƒnôÕÓµ‡¶··Òiw¼z-¿Ş_Ú/ÙÃá·íeÿ %økûAÁnşüsıš¿mÿ ÙûãÏƒşşÉß´•¥Çû=~Ã´¯ğkãŸ©üøWğÃNøo¬øÏâoÅoˆ~)Õ<wãm;GÒ/´æñoÃ]:4è¬¯4ë¶pÔ?şÏ²ÇìŸÿ —ÒüWáŠ·”µ_üSá×íñv?†¾ø‘áÿ cWRø7ğR_ÜÏãï‡Úv™¡xËQñF•£İÅyğÆq/‹®4Ï³]CM…–ş^?cƒßğY_Ø·À¶Ş5ı |û$x£áüaÄ_´¿ÄŸø,G¿høöv½ıuè¿­m/üBÓô=án«ñWÄ Ñ´€øÚçÇøÏ_áÕ‡¦ğıäqÉı`~×ÿ ¶Nµà¿ÚoÄ? ıƒ<sñáì-câ¯„Ÿ~3X~ËŞ!ñWí§.·ñçÃ6V~Öÿ à!¶ÕáÑ<YğšÚ{‡‹ö‹×¯µèºuˆò-5lÊ˜ÏØ÷ş
W&±íû1ë^0øËûTü ı¹5ÚŸügÇ?ğpn£uâßØÿ YĞføõÿ ~Ôrümñ¾«âØü§Ü[x’Ùtÿ †ßğ©4ïÚß|RĞşé¾1}'S& ¨¼yû~ß^ÿ ‚½|,Óà ^ ıtŸÁfõ+ßÏñïöŠ¾ı¢¿eèÿ aÏÙöÖúßWı—¾+üRğô:ßÀ­_â†|-áO‰Z…‹xôøëÂrø›AšßÃ–sYó/ø*Ïüş#ûgx¿Ä¿´§í™ûtÁ?¾|ø{¥hñéúo‰ş?şÒ~øğ¿FÑtÁPøµôßˆ¿<Eá_xŸÅöºv?<CoªÙCâ?ÜÉpåööè~É¿ğqüöœøùû3ü~ı§àøÉû<|:Õş%OáÚö\ıˆ>?|[ø¿àíŸë¾ñ×ìíãßüI×|£jZÏ‰ômÂ$Óµ[cuáûkH½/}c´_šŸµÇí»ûNÿ ÁG¾übøÛñËöšøóˆÿ lK{¿„²üOöø·ã_øj|×íto·íuû#øÄ^0ñ†|1ã_hÖŞ1ğİ×ƒnµ»ßx¾WX¸°°±·Xã õ/„ßğA‹´ÿ ‚à¿j;ö÷ø…ñ3ãgí›âÿ Ù»öñuì/ñ>•ğÿ öCø}¤µ·Âÿ ŠÖ¼}ğÏ]×<ğûXµŠğ_<]}¨|>¿Ğ.,Æ…¤ZE*µÿ îıµ„ÿ ?g/‡ÿ ±ïÄ‡¿·OÀKÏÚkKı¾|M½ñUÏí=ÿ  OÚ'Fğ?ŒtCöUÔ>#øÃºøà]+OÓ!ğ?Àm"â
øûR¶‹W°¢şŒÁ0ÿ à¾ÿ ğW¿Šÿ ¶?ì¹û|Zı‚<àé÷|ñnıgßÚoÃŸş|"}>iŸ<N¾&ø‹w¤øFÎş=:oâx^]]¼‚Ş"¥"O?ı½ş/øSNÿ ‚ßÙşÊÿ ²ı—ÂûßØßÇ^øoª|yñßÁQayáø'ÏÆ?|]ñƒñÏş
ğ÷ÄÔ[á‡ìÏûb|4°K4Öioi/¬xOÎ‰<_,°Étøã¿ø%'í'ÿ ÔŸöPñWÇ/ÚÏM—öÜ¾øğÏâ×ìIûüTñîÿ ×ÿ fÿ ÚE.uŸøZøâ?ø6MN-`x+TøW{á¿Éâ__|pOx?SÓõ“Ïmû{ÆÚ‡ÅğP„~ÿ ‚p~Ç?¾k?²oü³Ä¿ áDÿ Á`¿gïi>4øíû=ü#ø…4zÍ—…¾ü%½š‰~,ø‡¾ğ^‚²ÚèñOˆ¡ñw¤ÙGö5?xßà5çŒÿ à´~øÃğÏã§íÃûA|(ÿ ‚b|ğ¯íÿ ñ“âÏü{Åïâ¿‹¿¿g_Ø×öŸÄ_5OØ÷ÅV•.…ñ[á<=scâOÙÚşïPğ§„|s¬k>0Ôfñ^‰gsÇôÏáÏ‹?eÏÛwöæøÁûa~ÍŸ?à¼ı¶ô/Ùoã/í½ğáÿ Ç[xà¯ÄO€şñ¬?¼)û8ü7Óü9ı¿ñCÅ¿²¿~#êº7†ôo†^×áñG‡¿µl4¯Ç­Çã€3¿µWüwş
ûZşØ_³ïƒõxkş	íñ÷à¾“¦~Æ^ğìÇáï‹?²7ü+Å>>Hdğg‰ü9eâı[Å²Ó5Íb;m[ÃúU¾™mi¦ÙCn|9=Í²	?­ï‡ß°÷Åø$íuû~Ø_´çí]ñŸöìøãá€¿üñ§ö‡ã·‹?iÚ»ñ
èxbÿ âGì£ğÃâ&à¿/ì×ğÓK»‡Å?|Kâ~
ÙXÜëSÛİEn±7§ØïàüV÷öhı´>xSöğgüƒÆÿ 	´{_ÚÇöLñ’xÂxVñÖ®5ßŸu„Vz7Šh­öÊø/yyjÿ 
¼gñY–ãÁÚå½’ø±.&‰$oÍ¿xö¬ıŸÿ hïÛcá§Ç¿ˆ¿µïíğËà¿Åko~Í¿5=Ç¿¿à±Ş6ğsxf+é<?û&İkÖZnãØãÆŞ"™4OÛ(ü?Óm´{¯´öÓª^aˆ´ÿ Ál¾~Ä>~Ù>0ÿ ‚qü#ø‹ÿ 5ı±nOˆş#x›ã/ì³àß†¶/€dkï€Ş$ğ5·ü"·~8ø=§j>Gñ¯À:f»®‰-çˆ_â4şÕ’[­;IÒn–>#ö/ğ'íAûdüuı®à«ßğZ¿ØWöéø•­~ÊR|¹ı›¿`~Î>;ñÁßÿ Âêğ—ˆ¿gÿ ‹ü(ı•¿i‹?[ø–?Úøká¯Å¿Gà¿hCHñ-­ÏüBu‹EÓ`û;öJñwŒ<Cÿ ³ı®~ |Vı›ü'û k#ñ7ìís©ü$ÿ ƒ~k_à¤¾šßâV¯¦Å¦ü{øG¬Éu¯ø/[¾Š+MGJ°ÔI–óà·ˆ<s¬Gş{<7Cÿ ‚ÄÁ@f/~Ê?²?Ào‰²ÇˆşüqoŒĞ|7ñïüƒâ‡ÅOşß¿#øye/ÄŸø(ÜšÄèÿ î|e¯kÚ¾‘û,ìğıÈñ¿ÁØ~îÜÏ5äÀ±ûşÆŸcOÛáÁOÙ;Äÿ ‚Œÿ Á	ÿ à ö¯á-_Gñş¡âÛÂŸ³²|ğ–»ãŸ\øŠøDı•>GãÚ?ZÕtx¦m'ÄßÛ÷ŞƒLÖ ±ñ–‰-Óş9x×öQÿ ‚‹~Î>3ñ×üsÁ?ğU¿Ø[öğÒ¿àš'ñí¢şÏñ~Ù¿¿içøc¤Şë7~Òô¶øWo¥éÖÙg¨C }†ÛÅ~µS¤eÁª´V	lßÙ§ñö€ı„i†_ôãÿ wıà“ú¥İÅÎƒc­øßZøñööşûÁiâŸ‰Óü8ğœš…¾_İKñ«Ä2êW/cg,ÓxOZWÖÉñ£çËş~ÿ ·×Ç/ÚSö(ÿ ‚†ø×ö…ğÿ Â/Øºãö|ø±'‡ôoü<ı´_ëğK¿ÚÏBğõ„×òxâM‹©è^øÕâ+«è<AñsÂRkz„zgÄ/:öXmä
Xöëã¿Ã?ÛöÃıd/Ÿ>8ÿ Á,|û+ø;ö‡oÚÂÿ ‚6xÃÇ¿?mÿ ‹µŸ	6£ã¿…¿³¦™yi­ø#Æ_¶,úf±+	éÚ”,[Ç.««K,ò~şÏŞ*O‰Ÿd‰?oßø'—ÅÚÃßş
üÒdÚcö“_ø‡áßìÃá=kKºğoŒ´ï€> »Ô<Qá/ø.f™®O/Ãßˆ­. ğä> ¸ñ…tû+{›‰|ÿ ãı²>|Nı›toğIƒÿ ³–«ñ?öWøâŸÛßãŒà¯~ğç‚~şÎz‡NÓ<I¬şÌ>3ø-â	ïüñ¥İ®“àİCÄ:-Î‰ğåg]CÄ×:‚ª·ïa/ø%ÄÏ‰Ÿ°—Ä‰ºÇì;û4şİøÕû<şÚQ\şËšÇìëğãÅß´‡ÆIç“[G³¾ñ‡wñOâïÁŠŸµCTĞŞÆuñ'o4íP¶ñšÔHàÿ -ı¬?g/ÙwâÆÙÃÇŸ·/üOÄÿ ?lÏøkâ?…|ûYx{ã'Œ¿eï|]oü-ğ_…ô[ÏíÏ øWâ—z.üg¡ëz]íÎ³¢Üj×±Mkm9ø3âÿ ‹_ö‘ğïÃİà'üÿ ş‡oû|,¶ñ=¿ì­ğ‡ş
âÿ øPß´oÂ'Å÷¶ßm<WğPÕ–?…—~0ø£ê"±²´·€xŸÂ§Â^)˜HÚ¢=p_nïø'—ì¿ÿ Ïı¨jÏÿ <cğ;âÏì]â_|2Ò¼Ağ7á‹>"è_µ>§ñËàµ†ˆ¾)ı ü[ ’ÛÁ'ğ”—ºo‡üa¦£Ö¬îî‹¤’@E~rèŸ·ş¿ÿ 'ı¬ÖOˆÿ ğ@oØ¯YøóñªkÛÍãí!¯|]ø_ákÙü	ğşií¥ñ—ÄŸÁ¤xcFx[Á–ĞüöçSÔãÑ´;A-ıõºHÏÿ Á"?à§µ'ü÷Ã?³şŸûhëë_±í3©üKÓí~Üø‹ÄŞ"ı¡¿d¨~êş=Õ5­OHıuSÂÉğÁş7|Cø‹áÿ ¬Ş&‚X¼qàõOé;i$ÿ ¦_²·üGö,´ıÿ l/Ú÷ş	ññ×Çşı±<iá˜5o‚¾(ı¹$øsû;üYı¼Uiñ&ö>%i÷z~›‹¾ØüBĞµgJÑ¼_ª?ÙüUáÉ´Á§Êñ^³7°üfÿ ‚*x“öÇø ¿ğV/zìíñKöíø²a‹Nÿ ‚oİüZğoˆc¿Šs|0Ğtÿ €–še‡Æ»MI|U®Ç¤|+ğö™ñWDwhßlG†®DV0–ª¿~øßş
ÿ ıÿ ‚—x7ög>ı |_ûAüğWÂÏşÖ¿<e¤x3öø¹â‡_¶¹ğ›ãOŒïmàO†_›AÔ|ğkÄ·Vx_K²¾/,“n Äß†ÿ ğpçÇ_ÁD?e?|Eø7á_‡Ş$øiñSÁÿ ?iïŠ?±Şã¿|sı¯~|7¶¹ğÔücæøò_‹~›U´“Å:&…CmyªOöût7=ÓáWÃŸø(‹ÿ ğÿ ‚¿şÒ?ÿ a¿ÙƒÂş=êŸ·›|QøóûCéßş~Ü0üñªÿ Âqªø{Hğ¬Ö6Özƒ£i3éúß„t½Jiô»&£ÒÌ¶eyÿ ì¯ÿ îøSeÿ >ñ×íÍàÚ|ÿ ‚ˆÁ:>3~Òÿ ¤øƒğ¶jüC?Ãb	øcÃ$»ººš÷Lğ–‘ªË­Y³ÓTÏ8KÈŠõÏÙã@ÿ ‚Šÿ Á[ö”ıš~ÿ ÁH¿oøûş	¾>$+ãÏ‚l¾øâÇíâÇÒ<+âÏÙóTÕ¼C¢Zé×	oá&+oé·O¨èíqy;€jÿ ‚zÿ Á,¿à£ÿ ?àŸ~.ı¨~|uøAûT~Òÿ µ/ì‰¯ÿ Á84|Røÿ 'Š>üÿ ‚t|^ø7àßè6.»á½ëÄ^ı¡>xÎçLÑ­>kW^ğÇ‡õíB{İ*kÙ óÿ ‚~ÏßğKßø)¿ì}kûZxKã¯…ö+ÿ ‚;x{ş	»ñN]'áuåÌ&øóğ·âõ¼÷‰şK­ê~_üÔ¤ğ¦°<5ñ"ÓìvÚĞ…|6"dØÿ ‚fø#ş
Aû)Á¾7İşÈlŸ¿`oø-wÆˆ_µo€4¿E¥i¾~Ë¿³ƒÏÆï„0ßÙZ]ŞøËJñ—‹|=áÍ=Ãÿ kø‚Ø$úAÆ¨şIÿ 4ÿ ‚šşÅğQŸşÌ¾4ı§ÿ c¯xÅŞı¾øï]ø›?ÀŠ—>"ñWíaá-kÅ^!¶ÿ ‚xÃ'ˆ,lmu?Ù·â^µâ=FM_â¯âfHút.w… öWøÇûgÿ ÁB|]ÿ Fÿ ‚'|wñoÂWâ'‰¼Qñ—âûbøÒßöUño‰lµïÚxãÅ–?
ô_Ùjç?fMOÃPézoŠ<fuK›v5-:ïReYGË_µ_ü“ş
‹áOÚ·â‹>5xLÑ¼M{ûI|7³ø}ûkü&Ôş)øÀ_³ŸÃ]O[Ğ,¼uğƒöPı ï.SÂ¶ß~.BòZøÒÎ-BæÛ_¸–Â\ÆÊ?u|+ÿ sÿ ‚_jŸ²oƒµWö*øßğgöºğ¿ì1ã¯ÙÁÚÃïÙ3ãV¯áŸƒšo<«Z^üğ/Œ®ôÒ'ğ^$¼€-ıÔR3Ä¦åä
¯Éø%/íƒñö¸ø«ûÁ/m_ƒŞğ‡ìqğ;öYøÛ¤Mğoãmæ·àÏ†?´/¼¦j¾6ø]ãˆ0xÒ
ÚÏYğ¿‹ÖÇIŸG¾û5±›Ìe’}±ÑŸø*íaáÙî?ø+ŸğMİkş
âÛöĞø©û,xÌ|kø)ğ‡XÕ?gı/‚±øZË__ƒ~£¬hZ×ÃËÏèş#ºiµUC¨xÎ´Š+¥‡şı—?à?´§ÀÙ'öÉÿ ‚†şÚŸğP?¿·íÖ¿gñG?go|8ı¢ş#iÓşÎ~4¹øc¤/Œô]JŞÿ â>’×Ÿ
ôêÚ ÖÅã_hšn¯u§ù&ÏŞÙ¿â÷íÿ ÌøÛ¤|Bı½üwñ[öı‘¼e¤ø¶Ùöÿ ‚~é7ŸµÏì—„ÂZ¿„ş#®«âØêZ·„Ã_¼S£|AğÅ­Õü§^ñ6£â0¶Òf?,?e?Ø‡Â?³/‡ÿ hMWö)ñ»qûDşÕ'ácÁ"j¯‹ZvğwâçÁø1y®ÚşÛ²|}:ƒ®•û(?Ä/	k>'ğÃQñ&QñŸÃi§?…<Ùµ$rúÓÿ …øÉá;Ú›ö˜Ó<ğ‡áügÇ³‡€¾k^5ıŒÿ o*_ø;àÎ›ñá¿cğ£ÿ ùøoá{¥ñw~ |PÓšOşÒšd»ôqáÍR6pJÕñ7üëö‡ı>xóÁğFŸø+GÀŸØÇâƒô¿İü\ı›|{áõĞ>0|3ğOhû½CÇş(ğ÷<gâ½oOğ‡Ãİ;Â^–ÇÃwi¥.©¦j6ƒCÕäh<ÊıVÿ ‚Š~Õ¿>şÒ¿?kØgöıÿ mOÛ{öğ¿ÂŸşØ?<C©øßÅşÒ>)xÂ¾ø%}ğwÄ>
ŸU·ø­«ßxz÷Ä>ñ^Ÿ£ZÉ/„ôİğo3²ùgÀø%GÀ_ÛËá_í/¤şÖß°_ü£öo|6Ñ¼Mà¯Ú/öZøİ¢ü\ø¡àŸø³\†µ¯ø£JÖõÑ¦ø:êÖÙ’5¸×É¨ß_XÈxB€mı?à¾ıœhOşÎ¿±Âïø&Wíkûüy¿¼›ö¬øã_‰^ñ7íOÁo‰>+‡>[x#á
jß	|Ğév?´[=¤ÒJmõ¥”E^ñ¿öoı ÿ iïø(çì;ªê¾ÿ ‚7ü'ğ§ìaûrü>ñ§ÁÏÚ;Mµ~¯û7~Ïßõ-7Àß.¼¨\Ş¸š×B¿ú…úDB×Ç–6š]€·ThÛóGş	/û*x·ö"ı“iŸÛWà?ÆÍgOÒ¾&|_ı¡bŒş;Ñõ×âÁß€¿|Si«Úü}ı˜¼)f÷‡Æo÷éÖsil º´¿Šy'²YUŸÑïØûKı‘5¯Úöjğû	şÅş&ı¾ øÙğ§ö›ñ7Æ¯øŞmÆÚ·ì…­xËD´Ğÿ k‹ívMU4æı»üGñ"â/x³öiK5Õ´_^ß²HíÌ`ØoØãş
	â_ÛËâWŒ>Á6¾xçöø‡ãİ+ÄŸ´g‡|_û^ø+áşûiø¿@Ò|9ÂŒìõ½^×Å¿üIğ3_·ºŸÂğÌ¶V>$šÆÖ!¸ŠåCzWí­ÿ gøIûOüı½¿à%ı•~~Ó_ômsö|³ıš¾øßâŞ¹àO†¿µ…•—…¼5ûJ|^Ô<yñnÓNÓ|#ğvO‚Z€(ğ½¾¡âÇ?5Í
ÓÃ¶EµÃ§Éùëÿ ªı?àãÏÛKö†ı¥~|:ğ ø±ÿ Ùñ/ÄÏë¿¾^|Iı|e­xkÂ0øKÄ––ïªëzÿ ‡~2iB/éš…ÀmcS†ô°ù¢ŸNhaXø}ÿ íü
ğWÀÚö±ñ‡üÏÁŸhŸŠ—?
/~
Á,nÿ kíoÁºìÑ†|Wsğÿ â6“¦şØú_Åùü;ñ=|á+¨~=Ü^x§F´oİé«ğÛEYnîšå@>^ı“nÙoáíéñƒãÃo:~¡ÿ oÿ ‚zEğÓÄ³×üaÿ 	ÿ Ãï~Á·?´WÃ]kÂÿ µïŸ|E¥§ÅŸ·ß´í¢øîÇPƒÄ£ÁºhƒÅZ|Z^u[şğËöÏø­ÿ ğïü›ö&ø%ğ×ö9ÿ ‚büjñ»x{ö‚øuàÏŞ×­u	|-·ñ‡…®5xâ=ômÄŒŞ&öº^›¶óT•,¦¹Ó!F¯ÔİşÅß´Gì1yáoø9Ò/‰¿¶_üÚÏşÖ±ëÿ mŸàÖ‘û]üOšOw6:‡ì…ı‰ğëâ[xÛáf›ğŠ+‹‡2øÖçÂ«gx²\:ÿ ™ùóñãş	ñáÿ ÙcöíøÓû~ÏŸtŸ?°?üá×ÁOÙßàgÇ};âañÜŸ
|Ağ‡Á¶~$x¦…*ñv»ñ+Åj^ ¸m5´¯x£áÍ„_okÍU¾··x üNı¢?aoÛkş	»ñ—âˆ¿j¯ŠCöQı†ÿ à¢ÿ ¾!üøÁñ_á»ğ×öƒÔ¼Cğ’ÿ Äú¿Äë;Ïx3Vñˆ¦ûƒYêÙÖÒhš‹Ü·ÙÒJ­Kÿ ¿à£_$ı˜?gÏÿ Á işÓº'íáï‡ÿ ğHï‚Ÿ	üMàûöß?hO|=_ìÏÚşÒóÇÖ°Úì¯iáMÆö?­ÓS–WñÉe oã§ö“øañÅ_~Á?bÚ£Vı¸¾ø_ã¡uğ[MÖ>hŸ³U¢~Ò~9[İâFß.mu¨şÉw¦¾›ıµâˆ¼L^im¿ôÿ ôÿ ‚JşĞ_ğE/ø(çì·â¯ˆ¶V¥ğ7á/íE şÏÿ 
eÕì>xâ#şĞ_´<g¡ø·Æ_°=ö“¡xßâ'ˆ>h¢ÏÂ×wğÓÂ³5!Óµinã‚pşÄ–?ğRÏÙMı¬?àŸŸ¶?ÇŸÿ Á:<}c¤|vÿ ‚Ş|bı·ş¿ÃÚÅÿ |1¨Â1ğ§Ç¿¦ğF™ß‚fºñF¯¡ø—âÌ‘xsZoÉ©ø.ÇHÓ<#ı•¬%Ãyüëãïí/ñ¿ö‰ÿ ‚$~ÏŸ
ÿ k?‹~;ı>.üıƒ>>Ù|u»øa¥h—z÷ÆMoâßŒü-áïÚÓÄ>»Ñ¡_xİ<1¨ÙøºóÁº©a i®æÊşÆ$Wœ~„ü,ı†?iïø/?iMOöÌı½õß~Ç¿±¯ücãŸ€4ØÆëö}ø~4_øCörñ%¼:fŒÿ <â†_ô8üAğÃâ¯‰~5Ü¿Û÷úU¬íâwºÕµÏ²5–»û{üiğïÄÛ?şYÿ ãø{üª+/…´Ãïéú×‹ôÙ
ø'ÿ Â}/?fˆe]‹’ßö‹Òg»I<3©Y|[Ôş$Éâ‰Åg5ì¿Ø×š¸ ü±Ğ¿à·ŸğV/Ø/ş
¯ñSökñGÆ?ÁG<àß‰~3øğ÷Á_£ğŸÂüFÔ¯|S§x_ÂXğ_‚us¦Ãkx¥wáøVşi.õJú?ş
Iÿ ñÿ Æ¸¾/üPÿ ‚ˆÿ Á
f‰W?°—tÙïÆŠ?l¯[Â~$ø§sgªiú/‚ô¯iz]Ï´}JğZK¨kş³×´Í2p±]ßÚÈ}söğ¿íığ§ş
!û~Î_?f[Ù“ãÏìãÿ Qı¢>|¸²øİğ£â÷ü-OÃ—¦ßÂ?dŸÃWŞğ=ÅÇšğÇˆõm^Úh//oæÓec^ëâÿ _²>™áOÙ»Oÿ ƒ«¿g‹…ÿ ¶Â?ÿ gÏŠ¯ãßˆ¿ïş8xzÃÄë>2ø‹sá¿ØfÀü9øo6â¸¼=§ÿ Â/â·\_ˆ…îŸºÇíqO~Üß	eoø%¼SãÛ+ã_üSÃÿ ·V‰oãŸØëàïÂ?ÙãÄ_ü9û
xoàwÅKıâ‡ÃÏøšëA¾¾ñ%‡ÆÍkPƒTÕoş)ejZtŞ*½Ãq][éá‡‚ÿ Á:¿f|Pı…<]ÿ šÿ ‚›~İŸ~5|ı­áĞ/?à¡?²Ÿü)kiß—à—ÅşÌŸ³,^-Ô>^Ãñ*!àé~ñîŠ|#ám];ÉÖÅş‹o}~ßtÁN>é¿ğPØ÷Çÿ ¶g?à·¾.ø}ÿ †ø÷â/†:ç‡>Áû[ø¶ËI³Ò~%øSÁ>ÒáÖl.|/ûDê	yñ§ÃÉ¨=åæƒ¦Éd÷­öèÛÃ6ßh—Â|Yû0ükøMñÃş
û8ÿ Á½‹öø·ûIûÃñÃ^ñ'…¾/Úÿ Á@[ö…ğ…§¼$5Ÿş×:Î§áÙ×şÃÚŸÅË»á½gÄ#âœ)šÏW:]şŸáûhÀ>÷øÙğötÿ ‚Hü\ı–¿kØÂş
ıbí#]ñÖ«ÿ :ƒáGˆŸÆ&ñÿ Ã5ğ­‡û<Ù·Ã[ZñÄoI üMñ–±tšÃ(jÚlzæ£â:U®ø?1>~Ù¿ğL_Ùgã?í£û3~Ş?ğL ~ÇøığÃÁW^$Ö¾ø“ã§íUaûFø;ÆšåÏô}'Æ2|<Óµ›OÍ…æŸâ{ë+=RÇTÓµ{ëş;{‹9m×­ÿ ‚!ÿ Áş<şÀ?ÿ eÿ Ú—ö™ı˜ô‹_ş"øËâIñö§{ñŸÁ>oø'Œ>³ñîáßˆğ7Äÿ øoö¡ŸöˆÑ<I§é×Ş°Ñ`?V=À–éæ’/2ı´~?ÿ Áh?d«/Ùkö)ÿ ‚{şÁzOü´ŸÆk…#Â_µwìïûRÃCxÃÄâk·ÉñgNñü,Í%ßŒMÖ¹â3NYµ7Ñ-ŞµØ p	ã¯ØâíAû0|]ÿ ‚W|iñÀı†ÿ à›Ÿ<-ûhşÔ±Ü|qàß
üğG…ÚmâWíàÍSâ$-ñ3â—|Qyu¤xz÷á…àÖu(íÓíšf’Æ9ˆú+à'üöWı¬¿à¯_?j›»«ØSãŸ‚üeğïöşøsû6ø?ÂÚ·Ä_~Ó?£øïcã¯‡´?‰ş.ø£^Òìüñgö€Õ¼B–,ø¥Ç‹ş[è©}/‡ÂË4QüÕwğÏş
û$|ı¼/ğ‹öÒ¿àŒ¿oÚÂß³·ÇÛ‹Á¿´§ÂŸÛ—Xøå¬x®Şox­u#¾ñ„üo¼ckqñ-ÿ á“ÃĞÜÁÿ Å–«o§J7¯ÚÁCÿ jßø+×üö8ÿ ‚~øköd´Ö5ßø%Oü?à÷íûCşÒ·?|¥j¼û)üOo_ş-Kğ§Xğ¯€´İçÆ:ŸŠ—ÇoàŸx—Æº®•5Óx{AÒµ«H[R€Æ¿m„ß°6‰ûAÁÀ¿·í«û j¿¶%÷ìÕû\~Éğ'´ÿ Ú/âÿ ìôÖúwÆ_èÖ˜kÿ 5F²”Ayıª‘«øgXA`l¬îtäºšcùâÁ(ÿ l_ø$×üÇö¥ı–ÿ à›÷ìcñ§ö0Õÿ c	ø®ÿ öÑı hTÖö†ı ¬|¯ºè3½Ğ</eö/h:î”WUĞüFg>#KëÒu&Úæ_è3ö‘ıš¿j_Úsş
ûğ»âüûã÷í×û'şİ´7À?Š~ñÃ/ÚÁ?­ç¶ø'àÍ)tÙ¡Ô?µ¿á+t“Å!$;_Jt¹í®mî­îA?ü^ı‰?hö ı±¿bØsş÷ıªÿ f‹ïÛÿ öx¾ñÇüiûbxã>ŸŸ³ßÅı'âg‡ˆĞüM¯}®5˜ñ6+SÓƒÏ­[^^‹´Ó¡€€z‡üGÿ gıâı³µ_Ø—ö×ÿ ‚Zëµøı’`ğö£à_ˆZí©ñ/ö}Ši¾;ü&øOñÄFO|3ğ2Ï?“ÑkŞ$ñ
+è/¨é©¥RòÒ¿/?à¿ğEØçö›²ı…j_ÚÛö©³ğÿ ¿kŸß>|6ı‡î>üY¹Õ~+KğûÄšv£àÛÚ'áçÄ­ÿ ÂZiöúg‰[]Õ4oy±Û%/5	f›ú}ÿ ‚Îÿ Á²¾ ÿ ‚|pÑ¿i„ô¿Ù×ã‰”ÅñïÄş)Ğücñ+Oø“káßü<ğÃ+}ÃqøÛBÑ<şĞ<}m¨Ë¤Y«x†MR›í×†Y|öÉı”~<~Çø9û,Á2ÿ à“¿~ x‡ö¾Ö~*şÅß¶E‡íá]kÀ>ø×ñ·KÒµ‹ş Õ¾üNÕîïüsf’^xƒÃËáÿ Şê:5…Ü‹}£Co òïü×öı¾?m/…ÿ >$üx»Øwöøñ3Zğ¿~êZÂ¿ÓşÈ?¾øf_Áûbj¿|âO|Wø×¥üIÑ!ÓL´ëm_Å>/ºY¯/<ëƒÚø[À_ğI7ö3øUÿ ı¥?à¦ø×ûLü/ñ}ŸìÃûÁM¢ıš¿hŸ‡:Àÿ ü
ğ5§‰¾ø:oÙÁ×Mà_Š_šï\ëü!§üGŠôh^-×5U·Šú_û{ø?ş
¯sÿ tñ_ìÉã¯†:¿üOö°ı«ü)ã_øçÆ	´_†Ÿ l>h>,Ğl5¼CàÉïSDñ1ğµò\x^ö]P²ºÕ¯ÓŒ±À_Úö3ÑjÙ3áGìqûRÁ4>*|eğ7ì•û|%ı¡|	©øã–Ÿğ’ßâíká…°ü8Ö¿fİ>?	jZn§§øàÙ]êÆãÅzış¡àùxä)4öğÎ <oá‡´ø$7ìğÃã×Äÿ ø,†¼3àÛş
eáïÛŸâ?í7?ìE¨^éßµÃïÚ/á=¼[û;Xü+ÒÛÇÚ¯Áë¿Œz7ÃûïÛ|VĞôŸê‚ğö›á­áÒÒëñø|tı<ÿ ·øÁñ;şËû*^ÿ ÁJ<=ûY~À´í‡ğ·Ã¾ ~Í×#øñ×ã“ÜümñÈñ§í!§Yİxu&ğİï‚´Óá¿†Ö~Ò­Š¡¾ğ«iwºV¤[ßø%7í¡ğÂÛöOøÿ ôøÙÿ ÿ ‚d|N0şÜ~ı™>ü`ğ×Áo~É?µOÄ(ÀšÂ_|yÔ¼Y}ñâUÏÀO:n£ğç^·µ½¶ğŒ5YøÊÓKƒVÓF÷ß³7üïş	µÁÁ?cüø)ñ·àGƒ~:~Ñ|]'ÁßÚÆjË£xÛáî¥ñ'ãn§ªx‚I<1à¿|<Ò/tÿ 
ÜÁà»›ûµ«E¾Ô¯İÀ>løƒğûâ÷ÅŸø*÷ü3à/ÅÏø!ßŒ¾ø[öqı”­ü=ğ_öTŸş
áÿ jz'Ã¯‡ÿ -/´¿Úş4ønşÃRÖ,>]Ë:İü6ñV¯¬ë^:û)ûL·‘ÊŠ<öïı¼ş>ø¯ş#øµàÏŠ?¶¾•û9xön¾øÍğà‹µ/ÙãÁ¿ °ğ/Ä	i/©ü.‡á8õKûÏŒÚ•Ùğu§Ä¯\k¿€¦ÕÓ\·Õ¬à±rüMûjÿ ÁÄŸgß
|ÿ Õøğ?ö¾‹TøeáŸŠÿ ¶Ï‰ïf?x6]îşÃñ3_¶ø2ÖÑZèÚ^¤×QëË¥é7Ûôøtém¬÷Ipw> ÿ ‚?|gø+ÿ {ı–kItˆ~,øÿ âìÛûO]~ÛŸµ´:&Ÿ§ü6×?iŸøu¼?ğËÄÖ5oßXx:	í>Â¶Şğ~”º#ËbóŞ<3Nd ´Ÿ‡ßàšàŸŸµ/üöªÓàŸ
~ü'ı¬4Øûş	Gâ?„^)ı¡µ¯ø•ákÿ üIğÅ×í•ğ¦çÆz—ÅY/|câ}â²ë_ôMBúÆ/ÅàÍ
k-.êêÉßƒŸuO‹?ğC¯Ùö-ı­?kİ?ş	Aû!xÊÇã|ø§âO‚‘~×ñÁGâÑ?j½câ_ˆEÑ>iÖ_ÿ fû(|F³Ğ¼;¨_ÄÖÍñ¼uåƒK¡x~îÅ¿³_€ğMOÚSø±£~ÒŸğR¯Ú/À¶÷ÇßŞñÏ‡e/ø/àİÀmá~‰ñ_ÂÇ…ş.é~"ğg‡5yü1ñëÆ6çÃ'GÔ<O§İOáI´igÒ$·úYGàGÄïø%üÄ¿ğmGìÅû!ü?ğô^ø«ğ×NøÁÇïØ÷ZğÃï|Pø¸Ş-ı·áøğÒüT¾ñ±ø\ş	ğôw_u×Ñ5—ÿ „¿Bº‹BÔ
Ín¶Ôù}ûgiß±_ü3ÃŸà_·Š×şI¢|ŸÄ$ø_û;øsşŸüßPı‹î>2Ûh<EâİWâ—ÃÉ¼s¨~Ğ~Ğ6~1Ğoì´MÅúª|1OIoc˜ÚıÎŸoävÿ ²ŸíYûÁWÿ `oÚëàÇü'Åÿ ³ÇÃ_ˆÿ ¼2?f_ÙPı´üñjÿ â§´_‡Sê"´²øåâÏxŸSğÃøŠËT(Y<i ÙéšLL4›C$ƒd¿?
ÿ fOÚâ“û#~Ï?	?àÿ ÿ `_~Í> ø£­~Î_¶¯Ç?ÚÀ¿´ïƒ?g¿üW†çYø‘âŸ‰µ-J]Sã~“â«KmCÁ¾ğ÷‹/õ[O]x“NÔtX¬áÒ#AãŸ?à˜¿ğV/Ùëö†ğ/Ç¯ø'æ‘¬~Åú?íWã{Ï„¿¼ñ³Ã
ıªõÙïLøl·×ûFÜk¼Qª@|3ñ£Å2ßk¾ğo€¬ô­[Âzn«m¡İÜMgbˆ x§ã÷ÅÏÚÇRÿ ‚p|,ı‘¿b-kş	_áø,7n<!ûNkß´‡?mk/öËÕTÓş'Çÿ 
§ÇšfªßIáÍ^v×ä²¿½¯RÈéz
Gop~¢iß<Gâø-‡À/ÚÏşû6ê|=á|ıb/wßm5{/Úgş
	ğÓãÌ~&øGñ‡Oğ'ìÙªZÜ|:_ŒúñÇ­¾üTĞ.~ø2Îâ]~öét¸+[öKÿ ƒbj€_¾)ø£âíığÿ â_ÁïÚzãXÑ¿k/†z_À=OÂú¿ÄŸ‡ş2ñPñ_4_x¼xòòóà÷‰µëó ³ñ§"Òuİ7òl®c·UqÚ¯ì“ûIiŸ?`¿Ùöfÿ ‚K~Ñÿ  ?e¿Ù[ş#ğ“ö¾ñOíñö™ğïÆİÅ~ğ&¿?€5ïØÙx£Ä;Ñ4=kÂ0é4´Ò¡~ú]••ÅœzTº•ìÒí‡hÅïÓ>İ½ë7XÕ´éZ†¹®ê–:6¤ÚM©êºÌ6:~Ÿel†Iîï.îd{xQKI,®¨ ‘Z¸öéùgıã§¡®WÆŞÓüoám[ÃZœs{ø­å‚K[étÛ»MOM¼¶Õ4]FÒş+{¦³»Ó5{BÖàÚ^GÅ¬M=•Ü!í¤ æâøÇğ–qá³Ä¿ü&SXøe·´ğúÍí¾¦šöv‘µÀsu»,:¶ò*K¹4; Ô¦ŠÕë?Çƒie¨jMñ?Á?`ÒµH´]FğxƒNk{=Râ+ù­­&•n
+İE¥jojù0Ü:ÿ È’Cgp#ğÛÙkR¾
“Vñ¾«y¯êZÕ®¹û@kĞİÚÂ~(Ga®_xêÇÃi¦§‡ã³±Ñì¼iqm§ØÜé#ÃwÖşMCF”^ÏªyÖ:ZoÂŸ‹Úı‡Ä|v¾Ñ5‰ZŸ†|;âsÁŞ1ñª–´Kÿ JşğÆ•uà	>u¬jZT:¹ÕõMBmkÆş)ñlwúbiğÊ€{ñ[á†­«éz—ñÂ:†µ­èöšş‘¦Zkºt÷z}¥zÊşÊ(®®!¼Ğ•µËQé'Ñ‘õX‘¬î$|sø0|?oâ±ñKÀÇÃ7Z—öE¶»ÿ 	›ı•>¢4ñ«Ik÷Ú<‡htœê·.®b¶ÓMBâH¬â’eò_àw‹îüA«èºrx.Óáî©ñ*Çâ”É½Ö ñV›u¦|?Ó|!kàÈ<=¦é6VŸÙy¤ZFş"³ñ–›u‚în¼'k¢C4Pk/ãÚïì¿ñkYğ¿‡£»Ñì4«}gFÑ<Ÿ>)j)áë=_áümRÏâ~µáKÆ7º—âëPøCw¥/ƒïà[‹Mçµ’Êàí+?‰ÿ õj²ñÏ…î|S¤Újz†§áøõ‹#ªØØh³Z[ê÷·VFa<Všd÷öQ_Ü2ˆm^îÙft3G»gMñw„õ‹oŞé>&Ğõ;OiÃXğ…Å¥gu‰´“e¤5=	á™×TÓÿ ³îm¯Må™šÜ[\[ÌdÙ4E¼'Äü]ã1âkgÆ†¥¨ZøKÂ:;CáËcC_†ú
iÚ·Š<;¨h?Úš[ÿ ÂËñ\wmã;m7U[KïéğÔÏy›5ÄŞgàßÙÏâç†5?ƒ—W^-Ñ.o<ğóáŸ€ï<I¢ø›Æ·Ğ4
j·W>Ğt_‡+e¨ø_Æ–?´˜ô-
ëZñN£¦_è×5‡‰,´ÿ ¶èú>Ÿ Ù7ş$ğŞ—ªéz¥âOÖõÈuG¼Ôm-µMVÛGnuk>Âi’êòßL·t›P+8ä®1"nËğÏü	ã9î­¼%ã/ø’âÎîn`Ñ5‹JXí&vİ–·³ØO"<V÷Ñ‡´Hä)ãp¾5ñ?à>­ã=7Ãö¶>%şÕÔt¨¼mî»ãE³ŸT¾±ñ‚<CáëâMBÓë@şÓÕÓûRÁ’Ù›J¸ÔÌ3Kw$hŞ!¡~Ìÿ 5]wQ¿ÖáğÎ·‘e¢[éóÅsñ‡Øîu›gûwÆÚ'|Q{&›ñÛY]'ÇºÕŸ„<%¬j’è^×m<-¤6…o¤L÷‹júRë	áó¨[j]6mf=7qûKép]Ae5ò§9·îæŞİŸ<I*.9ÍP¶ñ_†ïtëöz½µŞ‹â±¥7‡uUš{]U5ÈVçI’ÚH£Üß@Ë,3H-Œ¥İr3ñ…‡ìÇñ"/é>4µÕ<#á/iZùÕí¾h:Æ¯yà´‡Ô<æxMõQáMPşÆŠxâ=…®•¤hº<?5»mOC×t+Éu
^ı˜~%xSJğU”6_t/øC¼?á#Ä~‰â¯^iõ/Êe“_ñ™¼ğ…£éwÚG&‹e¶ñ$Óiºş§k=ÜZn‹¡é¬÷ñP?‹ôÏ·©ïúñY÷š–Ÿas¥ÙİÜˆ.u«Ùtí2#Ìn¯!Ó¯õiaˆé]?L¾¹/;EÕÌ¯oùçwû,|_›Â~Òt»_…¾×lµø“R¾ğç‰f’ÂÏÇZİ×ƒî¬|Wá‘©üïÃzv™g ]x{Iğß…áÖt­2ÓKº¼ñïˆuO[˜ö·?³_ÄÛ¥ñ\x‹C¸µ×<KâırÊÊÛÅ2Ò¥ğï†|EğçãOƒôÏ…ú>§ı•©½·‡ü=®øÿ Eñ=†»ŒRÃ}ªx™-ü7m¥xoÂ$€s•ø¿O|zúñš6ƒü^ı1íßŞ¼Ÿàƒ|Gà‡ºo…üM‡¢¾ÓõvK[_oìëM&ûX½½Óm¤“OğÏƒt‰¯ã¶¹|ú'ƒü/¤‡x¬4x¡ŒM?­ãØuı09^¿=¨  zu#?‰ şŸÌúš\şÏ§>½è¢€Ô{ÿ /ğ˜ ¡şŸıÌúš( Àôÿ ?çúz
0=:ÿ õÿ ¡ÇÓŠ( :õıÆ“'èêÀ~CĞQE .§ùÿ ?Ìúœ˜çóşc9¢Š @?1øÇ€.§ùÿ ?×ÔÑE #ƒÇcü¿Ïä=.§Oş¿òÏ¨¢€ê?Ïùü»t£Óüÿ Ÿä=PÿÙ
            [firm_right_thumb_ftype] => image/png
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [1] => Array
        (
            [firm_id] => 3
            [firm_own_id] => 101492
            [firm_name] => SBDSMS
            [firm_reg_no] => 09ADEPA7418B1Z1
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => SRI BISHAMBHAR DAYAL SHRI MOHAN SARRAF
            [firm_desc] => SALE
            [firm_address] => NALA BAZAR
            [firm_city] => 
            [firm_phone_details] => 9927058746
            [firm_email] => amber.jls@gmail.com
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2018
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 183
            [firm_pan_no] => ADEPA7418B
            [firm_tin_no] => 09ADEPA7418B1Z1
            [firm_since] => 2018-05-15 15:30:13
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

    [2] => Array
        (
            [firm_id] => 4
            [firm_own_id] => 101492
            [firm_name] => rekha
            [firm_reg_no] => 0000000
            [firm_type] => Personal
            [firm_owner] => Self
            [firm_long_name] => rekha
            [firm_desc] => home
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2019
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 245
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2019-02-26 18:29:52
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101492","firm_name":"AAJ","firm_reg_no":"123","firm_type":"Personal","firm_owner":"Self","firm_long_name":"Amber Akshat Jewellers","firm_desc":"FINANCE AND SALE","firm_address":"nala bazar","firm_city":"","firm_phone_details":"9412591853","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"d41d8cd98f00b204e9800998ecf8427e","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"29901710","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2020","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"61","firm_pan_no":"","firm_tin_no":"12345678","firm_since":"2017-10-09 19:19:52","firm_principal_amt_limit":"","firm_left_thumb":null,"firm_left_thumb_ftype":"image\/png","firm_right_thumb":null,"firm_right_thumb_ftype":"image\/png","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"3","firm_own_id":"101492","firm_name":"SBDSMS","firm_reg_no":"09ADEPA7418B1Z1","firm_type":"Public","firm_owner":"Self","firm_long_name":"SRI BISHAMBHAR DAYAL SHRI MOHAN SARRAF","firm_desc":"SALE","firm_address":"NALA BAZAR","firm_city":null,"firm_phone_details":"9927058746","firm_email":"amber.jls@gmail.com","firm_comments":"","firm_smtp_email":null,"firm_smtp_pass":null,"firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2018","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"183","firm_pan_no":"ADEPA7418B","firm_tin_no":"09ADEPA7418B1Z1","firm_since":"2018-05-15 15:30:13","firm_principal_amt_limit":null,"firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":null,"firm_bank_acc_no":null,"firm_bank_ifsc_code":null,"firm_bank_declaration":null,"firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null},{"firm_id":"4","firm_own_id":"101492","firm_name":"rekha","firm_reg_no":"0000000","firm_type":"Personal","firm_owner":"Self","firm_long_name":"rekha","firm_desc":"home","firm_address":"","firm_city":null,"firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":null,"firm_smtp_pass":null,"firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2019","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"245","firm_pan_no":"","firm_tin_no":"","firm_since":"2019-02-26 18:29:52","firm_principal_amt_limit":null,"firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":null,"firm_bank_acc_no":null,"firm_bank_ifsc_code":null,"firm_bank_declaration":null,"firm_owner_sign":null,"firm_owner_sign_ftype":null,"firm_smtp_server":null,"firm_smtp_port":null,"firm_smtp_cc_email":null,"firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101972
            [firm_name] => TEST
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 74
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-06-08 11:19:57
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101972","firm_name":"TEST","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"74","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-06-08 11:19:57","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => CLD
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 148
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-06-10 13:08:39
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"2","firm_own_id":"101972","firm_name":"CLD","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"148","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-06-10 13:08:39","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101972
    [owner_login_id] => ommobile
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 2
            [firm_own_id] => 101972
            [firm_name] => CLD
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => 
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => 
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 148
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-06-10 13:08:39
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"2","firm_own_id":"101972","firm_name":"CLD","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"","firm_desc":"","firm_address":"","firm_city":"","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"148","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-06-10 13:08:39","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101148
    [owner_login_id] => omlite
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101148
            [firm_name] => 09
            [firm_reg_no] => 12
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omunim
            [firm_desc] => gold seller
            [firm_address] => pune
            [firm_city] => pune
            [firm_phone_details] => 7888501942
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-07-26 18:38:59
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101148","firm_name":"09","firm_reg_no":"12","firm_type":"Public","firm_owner":"Self","firm_long_name":"omunim","firm_desc":"gold seller","firm_address":"pune","firm_city":"pune","firm_phone_details":"7888501942","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-07-26 18:38:59","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]
 REQUEST_DATA:Array
(
    [api_login_token] => abc12313
    [api_prod_key] => 123123
    [api_request_id] => 123123
    [api_folder] => ommind/omunim
    [system_onoff] => OFFLINE
    [remote_login] => HTTP_REMOTE_LOGIN
    [function_name] => ALL_FIRMS
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 7188
    [DB_USER] => root
    [DB_PASSWORD] => omrolrsr
    [DB_DATABASE] => loveras1_101332
    [owner_login_id] => omsai
    [owner_user_staff_id] => 
    [owner_user_password] => 99255821b1bb07136a5addccfd2513ec
    [firm_id] => 
)

 REQUEST_DATA:Array
(
    [0] => Array
        (
            [firm_id] => 1
            [firm_own_id] => 101332
            [firm_name] => abcd
            [firm_reg_no] => 
            [firm_type] => Public
            [firm_owner] => Self
            [firm_long_name] => omsai jewellers
            [firm_desc] => 
            [firm_address] => 
            [firm_city] => pune
            [firm_phone_details] => 
            [firm_email] => 
            [firm_comments] => 
            [firm_smtp_email] => 
            [firm_smtp_pass] => 
            [firm_formN] => 
            [firm_formR] => 
            [firm_form_header] => SHUBH LABH
            [firm_form_footer] => NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL
            [firm_op_cash_bal] => 
            [firm_op_cash_bal_crdr] => CR
            [firm_op_cash_date] => 01 APR 2022
            [firm_op_gold_bal] => 
            [firm_op_gold_bal_wtype] => 
            [firm_op_gold_bal_crdr] => 
            [firm_op_silv_bal] => 
            [firm_op_silv_bal_wtype] => 
            [firm_op_silv_bal_crdr] => 
            [firm_capital_acc_id] => 73
            [firm_pan_no] => 
            [firm_tin_no] => 
            [firm_since] => 2022-08-16 16:48:04
            [firm_principal_amt_limit] => 
            [firm_left_thumb] => 
            [firm_left_thumb_ftype] => 
            [firm_right_thumb] => 
            [firm_right_thumb_ftype] => 
            [firm_other_info] => 
            [firm_bank_details] => 
            [firm_bank_acc_no] => 
            [firm_bank_ifsc_code] => 
            [firm_bank_declaration] => 
            [firm_owner_sign] => 
            [firm_owner_sign_ftype] => 
            [firm_smtp_server] => 
            [firm_smtp_port] => 
            [firm_smtp_cc_email] => 
            [firm_staff_id] => 
        )

)

 rowDetailsArr:[{"firm_id":"1","firm_own_id":"101332","firm_name":"abcd","firm_reg_no":"","firm_type":"Public","firm_owner":"Self","firm_long_name":"omsai jewellers","firm_desc":"","firm_address":"","firm_city":"pune","firm_phone_details":"","firm_email":"","firm_comments":"","firm_smtp_email":"","firm_smtp_pass":"","firm_formN":"","firm_formR":"","firm_form_header":"SHUBH LABH","firm_form_footer":"NOTE: INTEREST SHOULD BE PAID AFTER 11 MONTHS WITHOUT FAIL","firm_op_cash_bal":"","firm_op_cash_bal_crdr":"CR","firm_op_cash_date":"01 APR 2022","firm_op_gold_bal":"","firm_op_gold_bal_wtype":"","firm_op_gold_bal_crdr":"","firm_op_silv_bal":"","firm_op_silv_bal_wtype":"","firm_op_silv_bal_crdr":"","firm_capital_acc_id":"73","firm_pan_no":"","firm_tin_no":"","firm_since":"2022-08-16 16:48:04","firm_principal_amt_limit":"","firm_left_thumb":"","firm_left_thumb_ftype":"","firm_right_thumb":"","firm_right_thumb_ftype":"","firm_other_info":null,"firm_bank_details":"","firm_bank_acc_no":"","firm_bank_ifsc_code":"","firm_bank_declaration":"","firm_owner_sign":"","firm_owner_sign_ftype":"","firm_smtp_server":"","firm_smtp_port":"","firm_smtp_cc_email":"","firm_staff_id":null}]