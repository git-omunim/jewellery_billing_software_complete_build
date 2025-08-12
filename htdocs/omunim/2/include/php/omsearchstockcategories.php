<?php
/*
 * **************************************************************************************
 * @tutorial: Get all stock categories available in stock tables. Prathamesh 24Jan2024
 * **************************************************************************************
 *
 * Created on 24 JAN, 2024
 *
 * @FileName:omsearchstockcategories.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
$panelName = trim($_REQUEST['panelName']);
//
if ($panelName == 'getAllStockCatForBlank') {
    $qStCategory = "select distinct sttr_item_category from stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_item_category != '' AND sttr_indicator NOT IN ('stockCrystal');";
    $resStCategory = mysqli_query($conn, $qStCategory);
    $totalCategory = mysqli_num_rows($resStCategory);
    //
    if ($totalCategory > 0) {
        ?>
        <SELECT class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF cityListDivToAddNewCustSelect" 
                id="stockCategory" name="stockCategory" 
                onkeydown="if (event.keyCode == 13) {
                                    event.preventDefault();
                                    return false;
                                }"
                multiple="multiple" >
                    <?php while ($row = mysqli_fetch_array($resStCategory, MYSQLI_ASSOC)) { ?>
                <option value="<?php echo $row['sttr_item_category']; ?>" class="content-mess-maron" onclick="giveValueToInput(this.value);searchStockCategory('getAllStockCatForBlank');"><?php echo $row['sttr_item_category']; ?></option>
            <?php } ?>
        </select>
    <?php } ?>
    <?php
} else if ($panelName == 'getStockCat') {
    //
    $sttr_item_category = $_REQUEST['sttr_item_category'];
    $qStCategory = "select distinct sttr_item_category from stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_item_category LIKE '%$sttr_item_category%'  AND sttr_item_category != '' AND sttr_indicator NOT IN ('stockCrystal');";
    $resStCategory = mysqli_query($conn, $qStCategory);
    $totalCategory = mysqli_num_rows($resStCategory);
    //
    if ($totalCategory > 0) {
        ?>
        <SELECT class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF cityListDivToAddNewCustSelect" 
                id="stockCategory" name="stockCategory" 
                onkeydown="if (event.keyCode == 13) {
                                    event.preventDefault();
                                    return false;
                                }"
                multiple="multiple" >
                    <?php
                    while ($row = mysqli_fetch_array($resStCategory, MYSQLI_ASSOC)) {
                        ?>
                <option value="<?php echo $row['sttr_item_category']; ?>" class="content-mess-maron" onclick="giveValueToInput(this.value);searchStockCategory('getAllStockCatForBlank');"><?php echo $row['sttr_item_category']; ?></option>
                <?php
            }
            ?>
        </select>
    <?php } ?>
    <?php
} else if ($panelName == 'addPreInvByCat') {
    //
    $sttr_pre_inv_no = strtoupper(mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_pre_inv_no']))));
    $sttr_item_category = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_item_category'])));
    //
    if (substr($sttr_pre_inv_no, 0, 1) != 'I') {
        $sttr_pre_inv_no = 'I' . $sttr_pre_inv_no;
    }
    //
    if (substr($sttr_item_category, -1) == '|') {
        $sttr_item_category = rtrim($sttr_item_category, '|');
    }
    //
    $sttr_item_categorys = explode('|', $sttr_item_category);
    $rows = count($sttr_item_categorys);
    //
    for ($i = 0; $i < $rows; $i++) {
        $qInsCat = "INSERT INTO omlayout(omly_own_id,omly_option,omly_value,omly_panel_name) "
                . "VALUES ('$_SESSION[sessionOwnerId]','$sttr_item_categorys[$i]','$sttr_pre_inv_no','addPreInvByCat');";
        //
        if (!mysqli_query($conn, $qInsCat)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
} else if ($panelName == 'deleteCat') {
    $omly_id = $_REQUEST['omly_id'];
    //
    $qDelCat = "DELETE FROM omlayout where omly_own_id = '$_SESSION[sessionOwnerId]' AND omly_id = '$omly_id'";
    //
    if (!mysqli_query($conn, $qDelCat)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//START CODE TO SEND UPDATED RESPONCE
if ($panelName == 'deleteCat' || $panelName == 'addPreInvByCat') {
    //    
    $qInvByCat = "SELECT omly_id,omly_option,omly_value FROM omlayout where omly_panel_name = 'addPreInvByCat' order by omly_id desc;";
    $resInvByCat = mysqli_query($conn, $qInvByCat);
    //
    while ($rowInvByCat = mysqli_fetch_array($resInvByCat)) {
        ?>
        <table class="okkk" width="100%" cellpadding="1" cellspacing="2">
            <tr>
                <td align="center" width="60%">
                    <input type="text" class="form-control" value="<?php echo $rowInvByCat['omly_option']; ?>" readonly="true"/>
                </td>
                <td align="center" width="30%">
                    <input type="text" class="form-control" value="<?php echo $rowInvByCat['omly_value']; ?>" readonly="true"/>
                </td>
                <td align="center" width="10%">
        <!--                 <img src = "images/img/add.png" alt = "Add" height="18px"
                       onclick=""   />-->
                </td>
                <td align="center" width="10%">
                    <img src = "images/img/trash.png" alt = "delete" height="20px"
                         onclick="deleteInvByCat('deleteCat', '<?php echo $rowInvByCat['omly_id']; ?>');"   />
                </td>
            </tr>
        </table>
        <?php
    }
//                                        
}
//END CODE TO SEND UPDATED RESPONCE