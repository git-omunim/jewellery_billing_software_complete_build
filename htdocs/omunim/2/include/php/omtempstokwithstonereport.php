<?php
/*
 * **************************************************************************************
 * @tutorial: show reail stock list with stone report
 * **************************************************************************************
 * 
 * Created on 16 DEC, 2024 3:332:19 PM
 *
 * @FileName: omtempstokwithstonereport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:SHREYA 
 *  REASON: FOR ALL SCHEME SHOW 
 *
 */
?>
<?php
    $createView = "CREATE TABLE stock_transaction_copy AS
SELECT * FROM stock_transaction WHERE 1 = 0"; 



$sqlTable = 'DESC stock_transaction_copy';

mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table stock_transaction_copy";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
}
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}

$queryItemDetails = "INSERT INTO stock_transaction_copy
SELECT *
FROM stock_transaction
ORDER BY 
    CASE 
        WHEN sttr_sttr_id IS NULL THEN sttr_id 
        ELSE sttr_sttr_id                    
    END,
    sttr_id";
//echo '$queryItemDetails==>'.$queryItemDetails.'<br>';
$resItemDetails = mysqli_query($conn, $queryItemDetails) or die(mysqli_error($conn));



$queryItemDetails = "ALTER TABLE stock_transaction_copy
ADD COLUMN sttr_count_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
//echo '$queryItemDetails==>'.$queryItemDetails.'<br>';
$resItemDetails = mysqli_query($conn, $queryItemDetails) or die(mysqli_error($conn));