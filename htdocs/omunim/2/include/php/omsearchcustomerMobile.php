<?php
/*
 * **************************************************************************************
 * @Description: QUICK SELL SEARCH MOBILE NUMBER FOR CUSTOMER  @AUTHOR:YUVRAJ KAMBLE -06102022
 * **************************************************************************************
 *
 * Created on YUVRAJ KAMBLE -15JUL2021 04:26:01 PM 
 * **************************************************************************************
 * @FileName: C:\Project\Retail\htdocs\omretail\2\include\php\omsearchcustomerMobile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.92
 * @version 2.7.92
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * **************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:25OCT2021
 *  AUTHOR: YUVRAJ KAMBLE
 *  REASON:
 * 
 */
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommpsbac.php';
//
$keyup_customer = $_GET['str_user_name'];
$keyup_customer_mob = $_GET['str_user_mobile'];
//die();
//product_id,product_name,product_category,product_barcode,product_hsn_no,product_price
$product_id = $_GET['product_id'];
$product_name = $_GET['product_name'];
$product_category = $_GET['product_category'];
$product_barcode = $_GET['product_barcode'];
$product_hsn_no = $_GET['product_hsn_no'];
$product_price = $_GET['product_price'];
$panelName = $_GET['panel_name'];
//echo '$keyup_customer_mob'.$keyup_customer_mob;
$select_user = "SELECT * FROM user WHERE user_mobile LIKE '%$keyup_customer_mob%' ORDER BY user_mobile ASC";
$query_user = mysqli_query($conn, $select_user);

if (mysqli_num_rows($query_user) > 0) {
      $checkDeviceType = $_SERVER["HTTP_USER_AGENT"];
    $deviceTypeAndroid = strstr("$checkDeviceType", "Android");
    $deviceTypeIphone = strstr("$checkDeviceType", "iPhone"); // sarvesh added code for iphone date:8DEC2021 19:27:01

    if ($deviceTypeAndroid != NULL || $deviceTypeAndroid != '' || $deviceTypeIphone != NULL || $deviceTypeIphone != '') {
        echo "<ul class='list-unstyled list-group' style='width: 94%;height: 150px;scrollbar-width: none;overflow: auto;background-color: white;'>";
  
                    while ($rowUser = mysqli_fetch_array($query_user)) {
                        $user_id = $rowUser['user_id'];
                        $user_fname = $rowUser['user_fname'];
                        $user_lname = $rowUser['user_lname'];
                        $user_mobile = $rowUser['user_mobile'];
                        $selectOptionValue = $user_id . '*' . $user_fname . '*' . $user_lname . '*' . $user_mobile;
                        ?>
 <li class='list-group-item' style=" margin-left:0px;margin-right:0px"><a style="background-color: white;color:black; float: left;" class="" onclick="getUserDetails(<?php echo $user_id; ?>, '<?php echo $user_fname; ?>', '<?php echo $user_lname; ?>', '<?php echo $user_mobile; ?>', '<?php echo $product_id; ?>', '<?php echo $product_name; ?>', '<?php echo $product_category; ?>', '<?php echo $product_barcode; ?>', '<?php echo $product_hsn_no; ?>', '<?php echo $product_price; ?>', '<?php echo $panelName; ?>');" ><?php echo $user_mobile; ?></a></li>
                <?php
                     }
            ?>
           
            <input type="hidden" id="user_fname" value="<?php echo $user_fname; ?>">
            <?php // echo $user_fname; ?>
            <input type="hidden" id="user_lname" value="<?php echo $user_lname; ?>">
            <input type="hidden" id="user_mobile" value="<?php echo $user_mobile; ?>">
            <input type="hidden" id="sttr_id" value="<?php echo $product_id; ?>">
            <input type="hidden" id="sttr_item_name" value="<?php echo $product_name; ?>">
            <input type="hidden" id="sttr_item_category" value="<?php echo $product_category; ?>">
            <input type="hidden" id="sttr_final_valuation" value="<?php echo $product_price; ?>">
            <input type="hidden" id="panel_name" value="<?php echo $panelName; ?>">
            <input type="hidden" id="sttr_image_id">
            <input type="hidden" id="user_id" value="<?php echo $user_id; ?>">

            <?php
        
        echo "</ul>";
    } else {
        ?>
     <select class="MobileForAddNew" id="MobileForAddNew" name="MobileForAddNew" 
            onkeydown="javascript :if (event.keyCode == 13) {
                            var str = this.value;
                            var strArray;
                            strArray = str.split('*');
                            var user_id = strArray[0];
                            var user_fname = strArray[1];
                            var user_lname = strArray[2];
                            var user_mobile = strArray[3];
                            var product_id = '<?php echo $product_id; ?>';
                            var product_name = '<?php echo $product_name; ?>';
                            var product_category = '<?php echo $product_category; ?>';
                            var product_barcode = '<?php echo $product_barcode; ?>';
                            var product_hsn_no = '<?php echo $product_hsn_no; ?>';
                            var product_price = '<?php echo $product_price; ?>';
                            var panelname = '<?php echo $panelName; ?>';

//                            alert('bye');
                            getUserDetails(user_id, user_fname, user_lname, user_mobile, product_id, product_name, product_category, product_barcode, product_hsn_no, product_price, panelname);
                            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
                            document.getElementById('mobileNoToAddGirvi').focus();
                            productBlank('livesearch_customer_mobile');
//                            document.getElementById('livesearch_customer').style.visibility = 'hidden';
                            
                         
                        }"                       
                        size="8" style="width: 165px; float: left;position: absolute;background: #fff;z-index: 1;">
            <?php
            while ($rowUser = mysqli_fetch_array($query_user)) {
                $user_id = $rowUser['user_id'];
                $user_fname = $rowUser['user_fname'];
                $user_lname = $rowUser['user_lname'];
                $user_mobile = $rowUser['user_mobile'];
                $selectOptionValue = $user_id . '*' . $user_fname . '*' . $user_lname . '*' . $user_mobile;
                ?>

            <OPTION  VALUE="<?php echo $selectOptionValue; ?>"  class=" content-mess-maron" 
                     onclick="getUserDetails(<?php echo $user_id;?>, '<?php echo $user_fname; ?>', '<?php echo $user_lname; ?>', '<?php echo $user_mobile; ?>', '<?php echo $product_id; ?>', '<?php echo $product_name; ?>', '<?php echo $product_category; ?>', '<?php echo $product_barcode; ?>', '<?php echo $product_hsn_no; ?>', '<?php echo $product_price; ?>', '<?php echo $panelName; ?>');"><?php echo $user_mobile; ?></OPTION>
                     <?php
            }
                 }
                 ?>
    </select>

    <input type="hidden" id="user_fname" value="<?php echo $user_fname; ?>">
    <?php // echo $user_fname; ?>
    <input type="hidden" id="user_lname" value="<?php echo $user_lname; ?>">
    <input type="hidden" id="user_mobile" value="<?php echo $user_mobile; ?>">
    <input type="hidden" id="sttr_id" value="<?php echo $product_id; ?>">
    <input type="hidden" id="sttr_item_name" value="<?php echo $product_name; ?>">
    <input type="hidden" id="sttr_item_category" value="<?php echo $product_category; ?>">
    <input type="hidden" id="sttr_final_valuation" value="<?php echo $product_price; ?>">
    <input type="hidden" id="panel_name" value="<?php echo $panelName; ?>">
    <input type="hidden" id="sttr_image_id">
    <input type="hidden" id="user_id" value="<?php echo $user_id;?>">
    <?php
}
//END CODE FOR SEARCH CUSTOMER : AUTHOR @DARSHANA 22 FEB 2021
?>
<!--START CODE FOR UPDATE CUSTOMER-->

