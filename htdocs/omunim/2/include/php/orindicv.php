<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php

$indicval = $_GET['indicval'];
?>
<?php

$sessionOwnerId = $_SESSION['sessionOwnerId'];
$selindicatorsval = "SELECT * FROM omindicators WHERE omin_own_id = '$sessionOwnerId' AND omin_option='frstmnthindic'";
$resindicatorsval = mysqli_query($conn,$selindicatorsval);
$rowi = mysqli_num_rows($resindicatorsval);

if ($rowi == 0) {
    $query = "INSERT INTO omindicators(
		omin_own_id,omin_option,omin_value)
                VALUES(
		'$sessionOwnerId','frstmnthindic','$indicval')";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    $query = "UPDATE omindicators SET
     omin_value = '$indicval'
    WHERE omin_own_id = '$sessionOwnerId' and omin_option = 'frstmnthindic'";
    if (!mysqli_query($conn,$query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
?>