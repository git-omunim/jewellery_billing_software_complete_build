<?php

//require_once 'system/omssopin.php';
//require_once 'ommpfndv.php';
//include 'ommpfunc.php';
?>
<?php
print_r($_SESSION);
define("GB_OWNER_ID", "101540");
define("GB_DB_LOGIN_ID", "light");
define("GB_DB_SERVER", 'localhost');
define("GB_DB_USER_NAME", 'root');
define("GB_DB_PASSWORD", 'omrolrsr');
define("GB_DB_NAME", 'loveras1_101540');
define("GB_DB_PORT", '7188');
//
$conn = new mysqli(GB_DB_SERVER, GB_DB_USER_NAME, GB_DB_PASSWORD, GB_DB_NAME, GB_DB_PORT);
if ($conn->connect_error) {
    die("Error in connecting with mysql : " . $conn->connect_error);
}
echo "<pre>";
print_r($_POST);
echo "</pre>";

$status = $_POST['status'];
if ($status == createInstance) {
    $response = createInstance($conn);
    echo $response;
}
$status2 = $_POST['status2'];
if ($status2 == terminateInstance) {
    $response2 = terminateInstance($conn);
    echo $response2;
}

if ($status3 == generateQrCode) {
    echo "st" . $status3 = $_POST['status3'];
    $response3 = generateQrCode($conn);
    echo $response3;
}

//START CREATE INSTANCE
function createInstance($conn) {
    // create instance id
    $commonFieldArray = array(
        "instance_id" => "525354"
    );
   print_r($commonFieldArray);
//$mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $post_fields_arr = json_encode($commonFieldArray);
    print_r($post_fields_arr);
//
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/create_wa_api_instance');
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//
   $result_transaction = curl_exec($ch);
   echo 'result' . $result_transaction;
//$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
   $result_transaction_arr = json_decode($result_transaction, true);

   if (curl_errno($ch)) {
      $error_msg = curl_error($ch);
      print_r($error_msg);
  }

    echo '<pre>';
    print_r($result_transaction_arr);
    echo '</pre>';

    curl_close($ch);
    //$ownerid = $_SESSION['sessionOwnProdId'];
    $ownerid = "48484";
    $secret_id = $result_transaction_arr['secret'];
    
// $instance_id = $result_transaction_arr['instance_id'];

    $valueexists = "SELECT omly_value FROM omlayout WHERE omly_own_id='$ownerid' and omly_option='whatsapp_secret_id'";
    echo $valueexists;
    $resvalueexists = mysqli_query($conn, $valueexists);
    $rowvalueexists = mysqli_fetch_assoc($resvalueexists);
    $rowcount = mysqli_num_rows($resvalueexists);

    //$o_option = $rowvalueexists['omly_option'];
    $o_val = $rowvalueexists['omly_value'];

    if ($rowcount == 0 || $o_val == "" ) {

        $insertkey_s = "INSERT INTO omlayout(omly_own_id,omly_option,omly_value) VALUES('$ownerid','whatsapp_secret_id','$secret_id')";
        echo $insertkey_s;
        if (!mysqli_query($conn, $insertkey_s)) {
            die('Error: ' . mysqli_error($conn));
        }

//    $insertkey_id = "INSERT INTO omlayout(omly_own_id,omly_option,omly_value) VALUES('$ownerid','whatsapp_instance_id','$instance_id');";
//    if (!mysqli_query($conn, $insertkey_id)) {
//        die('Error: ' . mysqli_error($conn));
//    }
    } else {
        $updatekey_s = "UPDATE omlayout SET omly_value ='$secret_id' WHERE omly_option = 'whatsapp_secret_id' AND omly_own_id = '$ownerid' ";

        //echo $updateOtp;
        echo $updatekey_s;
        //echo "<br>";
        if (!mysqli_query($conn, $updatekey_s)) {
            die('Error: ' . mysqli_error($conn));
        }
//     $updatekey_id = "UPDATE omlayout SET omly_option = 'whatsapp_instance_id' omly_value = '$instance_id' WHERE omly_own_id = '$ownerid' ";
//    //echo $updateOtp;
//    //echo "<br>";
//    if (!mysqli_query($conn, $updatekey_id)) {
//        die('Error: ' . mysqli_error($conn));
//    } 
    }
    //$qr_img = generateQrCode($conn);
    echo $qr_img;
}

//createInstance();
//
//START GENERATE QRCODE

function generateQrCode($conn) {
    // Get QR Code
    $ownerid = $_SESSION['sessionOwnProdId'];
    $secretkey = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$ownerid' and omly_option='whatsapp_secret_id'";
    //echo $secretkey;
    $ressecretkey = mysqli_query($conn, $secretkey);
    $rowsecretkey = mysqli_fetch_assoc($ressecretkey);
    $keysecret = $rowsecretkey['omly_value'];

    $commonFieldArray = array(
        "message" => "Instance ash105 Registered Successfully",
        "secret" => $keysecret,
        "instance_id" => "ash105"
            // "instance_id" => "india"
    );
    //print_r($commonFieldArray);
//
//$mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $post_fields_arr = json_encode($commonFieldArray);
//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/get_wa_api_qr_code');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);

    $result_transaction = curl_exec($ch);
//echo 'result'.$result_transaction.'<br>';
//$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $result_transaction_arr = json_decode($result_transaction, true);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        print_r($error_msg);
    }
    echo '<pre>';
    print_r($result_transaction_arr);
    echo '</pre>';

    curl_close($ch);
    return $result_transaction_arr;
}

//generateQrCode(); 
//TERMINATE INSTANCE 
function terminateInstance() {

    $commonFieldArray = array(
        "instance_id" => "ash1050"
    );
    //print_r($commonFieldArray);
//$ mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $post_fields_arr = json_encode($commonFieldArray);
//
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/terminate_wa_api_instance');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//
    $result_transaction = curl_exec($ch);
    echo 'result' . $result_transaction;
//$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $result_transaction_arr = json_decode($result_transaction, true);
//
    echo '<pre>';
    print_r($result_transaction_arr);
    echo '</pre>';
//
    curl_close($ch);
}

//terminateInstance();
?>        



