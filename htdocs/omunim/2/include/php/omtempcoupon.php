<?php
/*
 * **************************************************************************************
 * @tutorial: COUPON LIST FILTER @SONALI-03NOV2023
 * **************************************************************************************
 * @FileName: omtempcoupon.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMGOLD
 * @version 1.0.1
 * @Copyright (c) 2023 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
//
//print_r($_REQUEST);
session_start();
?>
<div id="couponDiv">
    <table id="couponTable" width="100%" style="margin-bottom:5px;">
        <tr>
            <td width="30%"></td>
             <td width="25%" colspan="1">
                        <div name="box" id="name_label_box" class="hidden_box" style="visibility:hidden;"> 
                           OFFER NAME
                        </div>
                        <input id="addItemCoupon" name="addItemCoupon" type="hidden" value="<?php echo $cpnoffername ?>">
                        
                        <input type="hidden" id="couponItem" name="couponItem"/>
                        <input class="couponText form-control" type="text" id="c_offer_list" name="c_offer_list" placeholder="Offer Name" 
                             
                               onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                               googleSuggestionDropdownBlank('itemListDivToAddStockItem');
                               return false;
                           } else if (event.keyCode == 8 &amp;&amp; this.value == '') {
                               googleSuggestionDropdownBlank('itemListDivToAddStockItem');
                               return false;
                           }"
                           
                            onblur="if (this.value == '') {
                               this.value = document.getElementById('addItemCoupon').value;
                           }
                           document.getElementById('name_label_box').style.visibility = 'hidden';"
                           
                            onkeyup="if (event.keyCode != 9 &amp;&amp; event.keyCode != 13) {
                               searchCouponList(document.getElementById('c_offer_list').value,'c_offer_list', event.keyCode, '<?php echo $documentRootBSlash; ?>');
                           }"
                           
                           
                           onclick="googleSuggestionDropdownBlank('itemListDivToAddStockItem');
                            this.value = '';"
                            
                         onfocus="document.getElementById('name_label_box').style.visibility = 'visible';"
                         autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus form-control-font13" maxlength="80">
                        <div id="itemListDivToAddStockItem" class="itemListDivToAddStock placeholderClass" style="position:relative"></div>
                   
                    </td>
            <td width="7%">
                <input type="button" id="submitlistbtn" class="btn btnSubmit11" value="submit" onclick="setTemplate('<?php echo 'discountList'; ?>', 'COUPON LIST', document.getElementById('c_offer_list').value);">
            </td>
            <td width="30%"></td>
        </tr>

    </table>
</div>  
<div id="allcouponlistdiv">
<?php
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$selFirmId = $_SESSION['setFirmSession'];
//
///****************************************************************************************************************************/
/******************************************* Start Code To GET Firm Details *************************************************** */
/****************************************************************************************************************************/
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name as firmname,firm_phone_details as firmphoneno,firm_website as firmweb FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name as firmname,firm_phone_details as firmphoneno,firm_website as firmweb, firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
        $firmphoneno = $rowFirm[firmphoneno];
        $firmweb = $rowFirm[firmweb];
    }
} else {
    $strFrmId = $selFirmId;
}
/****************************************************************************************************************************/
/***************************************************** End Code To GET Firm Details ******************************************* */
//
$offerName = $_REQUEST['c_offer_list'];
if ($offerName == '') {
    $offerNameq = "SELECT cpn_firm_name, cpn_offer_name,cpn_quantity, cpn_content,cpn_code, cpn_validity_detail, "
            . "cpn_discount, cpn_start_date, cpn_end_date, cpn_height, cpn_width FROM coupon "
            . "WHERE cpn_owner_id = '$sessionOwnerId'";
    $resofferNameq = mysqli_query($conn, $offerNameq);
} else {
    $offerNameq = "SELECT cpn_firm_name,cpn_offer_name, cpn_quantity, cpn_content,cpn_code, cpn_validity_detail, "
            . "cpn_discount, cpn_start_date, cpn_end_date, cpn_height, cpn_width FROM coupon "
            . "WHERE cpn_owner_id = '$sessionOwnerId' AND  cpn_offer_name= '$offerName'";
    $resofferNameq = mysqli_query($conn, $offerNameq);
}
//THIS VARIABLE USE FOR COUPON CODE PRINT SINGLE 
$cpncodeinc =1;
while ($rowofferCpnListquery = mysqli_fetch_array($resofferNameq, MYSQLI_ASSOC)) {

    $cpn_firm_name = $rowofferCpnListquery['cpn_firm_name'];
    $cpn_quantity = $rowofferCpnListquery['cpn_quantity'];
    $cpn_content = $rowofferCpnListquery['cpn_content'];
    $cpn_code = $rowofferCpnListquery['cpn_code'];
    $offerName = $rowofferCpnListquery['cpn_offer_name'];
    $cpn_validity_detail = $rowofferCpnListquery['cpn_validity_detail'];
    $cpn_discount = $rowofferCpnListquery['cpn_discount'];
    $cpn_height = $rowofferCpnListquery['cpn_height'];
    $cpn_width = $rowofferCpnListquery['cpn_width'];
    ?>

        <div id="couponListDiv<?php echo $j;?>">
            <style>
    .discouponSection  .disccustomTable{
        margin-top: 30px;
        border-top: 1px solid #c1c1c1;
    }
    .discouponSection  .discouponTable{
        width:100%;
        margin-top: 5px;
        padding-top: 5px;
        border-top: 1px solid #c1c1c1;
    }
    .discouponSection  .disccustomTable label{
        text-transform: uppercase;
        color: #5f6f7e;
        font-weight: bold;
        margin-right: 10px;
    }
    .discouponSection  .disccustomTable .couponText{
        width: 100%;
        height: 35px;
        margin-bottom: 45px;
    }
    .disccustomTable .couponText.form-control::placeholder{
        font-size: 16px;
    }

    .discouponSection  .disccustomTable .btnSubmit11,.btnSubmit11{
        border-radius: 5px !important;
        width: 100px;
        padding: 5px 5px;
        height: auto;
        font-weight: bold;
        font-size: 15px;
        text-align: center;
        color: #000080;
        background-color: #D1E4FF;
        border: 1px solid #74adfe;
    }
    .discouponSection  .discouponTable .discMain{
        width: 50%;
    }
    .discouponTable .DisccoupDiv {
        width: 100%;
        border: 1px solid #b9979f;
        border-radius: 5px;
        background: #fff4e5;
        height: 280px;
    }
    .DisccoupPic{
        width: 40%;
        clip-path: polygon(0 0, 75% 0, 100% 50%, 75% 100%, 0 100%, 0% 50%);
    }
    .discFirmDet{
        width: 60%;
    }
    .DisccoupPic img {
        width: 100%;
        height:100%;
    }
    .discouponTable .DisccoupDiv .discFirmDet{
        padding: 10px 10px 10px 10px;
    }
    .DisccoupDiv .discFirmn h5{
        font-size: 28px;
        font-weight: bold;
        color: #5d1f2d;
        text-transform: capitalize;
        text-align:center;
        margin-bottom: 10px;
        line-height: 30px;
    }
    .DisccoupDiv .discFirmn p {
        text-indent: 0;
        font-weight: 600;
        font-size: 17px;
        color: red;
        text-transform: capitalize;
        text-align: center;
        padding: 0;
        margin: 5px 0;
    }
    .DisccoupDiv .discouponc {
        margin-top: 5px;
        text-align: center;
    }
    .DisccoupDiv .discouponc span {
        text-align:center;
    }
    .DisccoupDiv .discouponc h5{
        padding: 5px;
        background: #fff;
        border: 1px dashed #5d1f2d;
        text-align: center;
        border-radius: 5px;
        font-size: 30px;
        width: 95%;
        margin: auto;
        color: #5d1f2d;
    }
    .discFirmDet h6{
        font-size: 16px;
        color: #aa1717;
        font-weight: normal;
        margin-top: 5px;
        margin-bottom: 5px;
        text-align:center;
    }
    .discFirmDet .offerName p{
        font-size: 34px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        color: #c17f02;
        padding: 0;
        margin: 13px 0 17px;
        text-indent: 0;
    }
    .discFirmDet span{
        font-size: 16px;
    }
    .DisccoupDiv .discFirmsubDet {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .DisccoupDiv .discFirmsubDet p{
        text-indent: 0;
        padding: 0;
        font-size: 14px;
        color: #000;
        font-weight: 500;
        margin:0;
    }
</style>
            <table class="discouponTable" align="center">
                <tbody>  
                    <!--// Generate the coupon codes based on the provided quantity-->
                       <?php for ($i = 0; $i < $cpn_quantity; $i++) {?>
                        <tr>
                            <td class="discMain">
                                <div class="DisccoupDiv" 
                                     style="margin-bottom:10px;display: flex;
                                     width: <?php echo $cpn_width; ?>px;
                                     height: <?php
                                        if ($cpn_height != '' || $cpn_height != null || $cpn_height != 0) {
                                            echo $cpn_height . 'px';
                                        } else {
                                            echo '350px';
                                        }
                                        ?>" 
                                     >
                                    <div class="DisccoupPic">
                                        <img src="<?php echo $documentMainRoot; ?>/webroot/theme/saas/common/img/coupon_jewel1.png" alt="Image"/>
                                    </div>
                                    <div class="discFirmDet text-center">
                                        <div class="discFirmn">
                                            <h5><?php echo $cpn_firm_name; ?></h5>
                                            <p><?php echo $cpn_content; ?> </p>
                                        </div>
                                        <div class="discouponc">
                                            <span>Coupon Code</span>

                                            <h5><?php echo strtoupper($cpn_code); ?></h5>
                                        </div>

                                        <h6><?php echo $cpn_validity_detail; ?></h6>
                                        <div class="offerName">
                                            <P><?php echo $offerName; ?></p>
                                        </div>
                                        <div class="discFirmsubDet">
                                            <p style="display: flex;align-items: center;justify-content: center;"><img src="<?php echo $documentMainRoot; ?>/webroot/theme/saas/common/img/telephone.png" alt="Phone" style="width: 20px;height: 20px;margin-right: 5px;"/><span><?php echo $firmphoneno; ?></span></p>
                                            <p style="display: flex;align-items: center;justify-content: center;"><img src="<?php echo $documentMainRoot; ?>/webroot/theme/saas/common/img/internet.png" alt="Website" style="width: 20px;height: 20px;margin-right: 5px;"/><span><?php echo $firmweb; ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="noPrint" colspan="2" valign="bottom" align="center" style="padding: 20px 0;">
                                    <a style="cursor: pointer;" onclick="printBarCodeA4Sheet('couponListDiv<?php echo $j++;?>')" id="print_coupon">
                                        <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt="Print" title="Print" width="24px" height="24px" class="noPrint" > 
                                    </a>     
                                </div>    
                            </td>
                        </tr>
                    </tbody>
                </table>  
           </div> 
        <?php
    }
}
$cpncodeinc++;
?>
    <div class="noPrint" colspan="2" valign="bottom" align="center" style="padding: 20px 0;">
        <a style="cursor: pointer;" onclick="printBarCodeA4Sheet('allcouponlistdiv')" id="print_coupon">
            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt="Print" title="Print" width="24px" height="24px" class="noPrint" > 
        </a>
    </div>
</div>
<div style="display:block;justify-items: center" id="coupunResponceList" >
</div>