<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
//<!--START CODE FOR SEARCH PRDUCT : AUTHOR @DARSHANA 23 FEB 2021--> 
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommpsbac.php';

//Search Product From Stock
$keyup = $_GET['str'];
$user_id = $_GET['user_id'];
$user_name = $_GET['user_fname'];
$user_mobile = $_GET['user_mobile'];
$user_lname = $_GET['user_lname'];
$panelName = $_GET['panelName'];
//echo '$keyup' . $keyup;

if ($_SESSION['sessionProdName'] == 'OMRETL') {
    $select = "SELECT * FROM stock_transaction WHERE sttr_transaction_type = 'EXISTING' AND sttr_item_name LIKE '%$keyup%' ORDER BY sttr_item_name ASC";
    $rowquery = mysqli_query($conn, $select);
    if (mysqli_num_rows($rowquery) > 0) {
        ?>
        <SELECT class="searchProduct" id="searchProduct" name="searchProduct" 
                onKeydown="javascript: if (event.keyCode == 13) {
                                    var str = this.value;
                                    var strArray;
                                    strArray = str.split('*');
                                    var sttr_id = strArray[0];
                                    var sttr_item_name = strArray[1];
                                    var sttr_item_category = strArray[2];
                                    var sttr_barcode = strArray[3];
                                    var sttr_hsn_no = strArray[4];
                                    var sttr_final_valuation = strArray[5];
                                    var user_id = '<?php echo $user_id; ?>';
                                    var user_name = '<?php echo $user_name; ?>';
                                    var user_mobile = '<?php echo $user_mobile; ?>';
                                    var user_lname = '<?php echo $user_lname ?>';
                                    var panelName = '<?php echo $panelName ?>';

                                    getSearchProductValue(sttr_id, sttr_item_name, sttr_item_category, sttr_barcode, sttr_hsn_no, sttr_final_valuation, user_id, user_name, user_lname, user_mobile, panelName);
                                    document.getElementById('search').value = sttr_item_name;
                                    document.getElementById('search').focus();
                                    productBlank('livesearch');
                                    //                        document.getElementById('livesearch').style.visibility = 'hidden';
                                    //                        refreshData();
                                }"
                size="8" style="width: 319px; float: left;"><!--Focus Added @Author:PRIYA24AUG13-->
                    <?php
                    while ($row = mysqli_fetch_array($rowquery)) {
                        $sttr_id = $row['sttr_id'];
                        $sttr_item_name = $row['sttr_item_name'];
                        $sttr_item_category = $row['sttr_item_category'];
                        $sttr_barcode = $row['sttr_barcode'];
                        $sttr_hsn_no = $row['sttr_hsn_no'];
                        $sttr_final_valuation = $row['sttr_final_valuation'];
                        $selectOption = $sttr_id . '*' . $sttr_item_name . '*' . $sttr_item_category . '*' . $sttr_barcode . '*' . $sttr_hsn_no . '*' . $sttr_final_valuation;
                        ?>
                <OPTION  VALUE="<?php echo $selectOption; ?>"  class=" content-mess-maron" 
                         onclick="getSearchProductValue('<?php echo $sttr_id; ?>', '<?php echo $sttr_item_name; ?>', '<?php echo $sttr_item_category; ?>', '<?php echo $sttr_barcode; ?>', '<?php echo $sttr_hsn_no; ?>', '<?php echo $sttr_final_valuation; ?>', '<?php echo $user_id; ?>', '<?php echo $user_name; ?>', '<?php echo $user_lname ?>', '<?php echo $user_mobile; ?>', '<?php echo $panelName; ?>');"><?php echo $sttr_item_name; ?></OPTION>";
                         <?php
                     }
                     ?>
        </select>

    <?php
    
    } else {
        
         $selectmsteritem = "SELECT * FROM master_item WHERE ms_itm_category LIKE '%$keyup%' ORDER BY ms_itm_category ASC";
        $rowqueryselectmsteritem = mysqli_query($conn, $selectmsteritem);
    if (mysqli_num_rows($rowqueryselectmsteritem) > 0) { 
?>
        <SELECT class = "searchProduct" id = "searchProduct" name = "searchProduct"
        onKeydown = "javascript: if (event.keyCode == 13) {
                                var str = this.value;
                                var strArray;
                                strArray = str.split('*');
                                var sttr_id = strArray[0];
                                var sttr_item_name = strArray[1];
                                var sttr_item_category = strArray[2];
                                var sttr_barcode = strArray[3];
                                var sttr_hsn_no = strArray[4];
                                var sttr_final_valuation = strArray[5];
                                var user_id = '<?php echo $user_id; ?>';
                                var user_name = '<?php echo $user_name; ?>';
                                var user_mobile = '<?php echo $user_mobile; ?>';
                                var user_lname = '<?php echo $user_lname ?>';
                                var panelName = '<?php echo $panelName ?>';

                                getSearchProductValue(sttr_id, sttr_item_name, sttr_item_category, sttr_barcode, sttr_hsn_no, sttr_final_valuation, user_id, user_name, user_lname, user_mobile, panelName);
                                document.getElementById('search').value = sttr_item_name;
                                document.getElementById('search').focus();
                                productBlank('livesearch');
        //                        document.getElementById('livesearch').style.visibility = 'hidden';
        //                        refreshData();
                            }"
        size = "8" style = "width: 319px; float: left;"><!--Focus Added @Author:PRIYA24AUG13-->
        <?php
        while ($row = mysqli_fetch_array($rowqueryselectmsteritem)) {
            $ms_itm_category = $row['ms_itm_category'];
            $ms_itm_name = $row['ms_itm_name'];
            $selectOption = $sttr_id . '*' . $sttr_item_name . '*' . $sttr_item_category . '*' . $sttr_barcode . '*' . $sttr_hsn_no . '*' . $sttr_final_valuation;
            ?>
            <OPTION  VALUE="<?php echo $selectOption; ?>"  class=" content-mess-maron" 
                     onclick="getSearchProductValue('<?php echo $sttr_id; ?>', '<?php echo $sttr_item_name; ?>', '<?php echo $sttr_item_category; ?>', '<?php echo $sttr_barcode; ?>', '<?php echo $sttr_hsn_no; ?>', '<?php echo $sttr_final_valuation; ?>', '<?php echo $user_id; ?>', '<?php echo $user_name; ?>', '<?php echo $user_lname ?>', '<?php echo $user_mobile; ?>', '<?php echo $panelName; ?>');"><?php echo $ms_itm_category; ?></OPTION>";
                     <?php
                 }
                 ?>
        </select>

        <?php
    }else{
        echo " <center><h5 style='color:red;'> Product Not In Stock.  </h5></center>";
    }
    }
    //  ELSE START JEWELLERY CODE YUVRAJ
    
} else {


    $select = "SELECT * FROM stock_transaction WHERE sttr_transaction_type = 'EXISTING' AND sttr_item_name LIKE '%$keyup%' ORDER BY sttr_item_name ASC";
    $rowquery = mysqli_query($conn, $select);
    if (mysqli_num_rows($rowquery) > 0) {
        ?>

        <SELECT class="searchProduct" id="searchProduct" name="searchProduct" 
                onKeydown="javascript: if (event.keyCode == 13) {
                                    //                alert('hii');
                                    var str = this.value;
                                    var strArray;
                                    strArray = str.split('*');
                                    var sttr_id = strArray[0];
                                    var sttr_item_name = strArray[1];
                                    var sttr_item_category = strArray[2];
                                    var sttr_barcode = strArray[3];
                                    var sttr_hsn_no = strArray[4];
                                    var sttr_final_valuation = strArray[5];
                                    var user_id = '<?php echo $user_id; ?>';
                                    var user_name = '<?php echo $user_name; ?>';
                                    var user_mobile = '<?php echo $user_mobile; ?>';
                                    var user_lname = '<?php echo $user_lname ?>';
                                    var panelName = '<?php echo $panelName ?>';

                                    getSearchProductValue(sttr_id, sttr_item_name, sttr_item_category, sttr_barcode, sttr_hsn_no, sttr_final_valuation, user_id, user_name, user_lname, user_mobile, panelName);
                                    document.getElementById('search').value = sttr_item_name;
                                    document.getElementById('search').focus();
                                    productBlank('livesearch');
                                    //                        document.getElementById('livesearch').style.visibility = 'hidden';
                                    //                        refreshData();
                                }"
                size="8" style="width: 319px; float: left;"><!--Focus Added @Author:PRIYA24AUG13-->
                    <?php
                    while ($row = mysqli_fetch_array($rowquery)) {
                        $sttr_id = $row['sttr_id'];
                        $sttr_item_name = $row['sttr_item_name'];
                        $sttr_item_category = $row['sttr_item_category'];
                        $sttr_barcode = $row['sttr_barcode'];
                        $sttr_hsn_no = $row['sttr_hsn_no'];
                        $sttr_final_valuation = $row['sttr_final_valuation'];

                        $selectOption = $sttr_id . '*' . $sttr_item_name . '*' . $sttr_item_category . '*' . $sttr_barcode . '*' . $sttr_hsn_no . '*' . $sttr_final_valuation;
                        ?>
                <OPTION  VALUE="<?php echo $selectOption; ?>"  class=" content-mess-maron" 
                         onclick="getSearchProductValue('<?php echo $sttr_id; ?>', '<?php echo $sttr_item_name; ?>', '<?php echo $sttr_item_category; ?>', '<?php echo $sttr_barcode; ?>', '<?php echo $sttr_hsn_no; ?>', '<?php echo $sttr_final_valuation; ?>', '<?php echo $user_id; ?>', '<?php echo $user_name; ?>', '<?php echo $user_lname ?>', '<?php echo $user_mobile; ?>', '<?php echo $panelName; ?>');"><?php echo $sttr_item_name; ?></OPTION>";
                         <?php
                     }
                     ?>
        </select>

        <!--        <ul class='list-unstyled'>
                    <span class=''><a style="color:black;" class="" onclick="getSearchProductValue('<?php echo $sttr_id; ?>', '<?php echo $sttr_item_name; ?>', '<?php echo $sttr_item_category; ?>', '<?php echo $sttr_barcode; ?>', '<?php echo $sttr_hsn_no; ?>', '<?php echo $sttr_final_valuation; ?>','<?php echo $user_id; ?>','<?php echo $user_name; ?>','<?php echo $user_lname ?>','<?php echo $user_mobile; ?>','<?php echo $panelName; ?>');"><?php echo $sttr_item_name; ?></a></span>
                    <div class="hrGrey"></div>
                    <hr>
                </ul> -->
        <?php
    }
}
?>
<!--START CODE FOR SEARCH PRDUCT : AUTHOR @DARSHANA 23 FEB 2021--> 

