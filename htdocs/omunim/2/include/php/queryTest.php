<?php

/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on Oct 8, 2015 1:23:41 PM
 *
 * @FileName: queryTest.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
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

include 'omssopin.php';
include_once 'ommpfndv.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$qSelAllSlprInv = "SELECT slprin_id,slprin_cust_id,slprin_fnl_due_bal,slprin_date,slprin_since FROM slpr_stock_inv WHERE slprin_owner_id = '$sessionOwnerId'";

$resQSelAllSlprInv = mysqli_query($conn,$qSelAllSlprInv);
echo "<table border='1'>";
echo "<tr><th>Sr. No.</th><th>Slpr Inv Id</th><th>Rem Balance</th><th>Customer Id</th><th>Udhaar Id</th><th>Date</th><th>Add Date</th></tr>";
$counter = 1;
while ($rowQSelAllSlprInv = mysqli_fetch_array($resQSelAllSlprInv, MYSQLI_ASSOC)) {
    $slprin_id = $rowQSelAllSlprInv['slprin_id'];
    $slprin_fnl_due_bal = $rowQSelAllSlprInv['slprin_fnl_due_bal'];
    $slprin_cust_id = $rowQSelAllSlprInv['slprin_cust_id'];
    $slprin_date = $rowQSelAllSlprInv['slprin_date'];
    $slprin_since = $rowQSelAllSlprInv['slprin_since'];

    $selUdhaarId = "SELECT udhaar_id FROM udhaar WHERE udhaar_slprin_id=$slprin_id AND udhaar_own_id = '$sessionOwnerId'";
    $resSelUdhaarId = mysqli_query($conn,$selUdhaarId);
    $udhaarIdCount = mysqli_num_rows($resSelUdhaarId);
//    echo "<tr>";
//    echo "<td>$slprin_id</td><td>$slprin_fnl_due_bal</td><td>$slprin_cust_id</td><td>$udhaar_id</td>";
//    echo "</tr>";

    if (($udhaarIdCount == 0) && $slprin_fnl_due_bal > 0) {
        echo "<tr>";
        echo "<td>$counter</td><td>$slprin_id</td><td>$slprin_fnl_due_bal</td><td>$slprin_cust_id</td><td>$udhaar_id</td><td>$slprin_date</td><td>$slprin_since</td>";
        echo "</tr>";
        $counter++;
    }
}
echo "</table>";
//if (!mysqli_query($conn,$query)) {
//    die('Error: ' . mysqli_error($conn));
//}
?>