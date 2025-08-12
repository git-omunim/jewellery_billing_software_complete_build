
<?php
require_once 'system/omssopin.php';
require_once 'ommpfndv.php';
include 'ommpfunc.php';
//
//
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
$mobilevariable = $_POST["mobilenumber"];
//START CREATE INSTANCE
//create instance
//function createInstance() {
//    // create instance id
//    $commonFieldArray = array(
//        "instance_id" => "101540"
//    );
////
////$mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
//    $post_fields_arr = json_encode($commonFieldArray);
//    //print_r($post_fields_arr);
////
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/create_wa_api_instance');
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
////
//    $result_transaction = curl_exec($ch);
//    //echo 'result' . $result_transaction;
////$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
//    $result_transaction_arr = json_decode($result_transaction, true);
//
//    if (curl_errno($ch)) {
//        $error_msg = curl_error($ch);
//     //   print_r($error_msg);
//    }
//
//    //echo '<pre>';
//   // print_r($result_transaction_arr);
//   // echo '</pre>';
////
//    curl_close($ch);
////
//}
//createInstance();

//START GENERATE QRCODE
//
//function generateQrCode() {
//    // Get QR Code
//    $commonFieldArray = array(
//         "message" => "Instance 101540 Registered Successfully",
//         "secret" => "f07fc094db91a81a8e36e0969a385d5a",
//         "instance_id" => "101540"
//         // "instance_id" => "india"
//    );
//   // print_r($commonFieldArray);
////
////$mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
//    $post_fields_arr = json_encode($commonFieldArray);
////
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/get_wa_api_qr_code');
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
//
//    $result_transaction = curl_exec($ch);
////echo 'result'.$result_transaction.'<br>';
////$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
//    $result_transaction_arr = json_decode($result_transaction, true);
//if (curl_errno($ch)) {
//        $error_msg = curl_error($ch);
//       // print_r($error_msg);
//    }
//       // echo '<pre>';
//       // print_r($result_transaction_arr);
//        //echo '</pre>';
//
//    curl_close($ch);
//    ?>        
<!--<img style='display:block;' id='base64image' src="//////<?php// echo $result_transaction_arr['base64'];  ?> " />-->
<?php
//}
//generateQrCode(); 

//START  TERMINATE INSTANCE

//Terminate instance
//function terminateInstance() {
//
//    $commonFieldArray = array(
//        "instance_id" => "101540"
//    );
//    print_r($commonFieldArray);
////$mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
//    $post_fields_arr = json_encode($commonFieldArray);
////
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/terminate_wa_api_instance');
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
////
//    $result_transaction = curl_exec($ch);
//    echo 'result' . $result_transaction;
////$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
//    $result_transaction_arr = json_decode($result_transaction, true);
////
//    echo '<pre>';
//    print_r($result_transaction_arr);
//    echo '</pre>';
////
//    curl_close($ch);
//}
//terminateInstance();

//END TERMINATE INSTANCE
//
//START SEND MESSAGE
//
$otpCode = mt_rand(1000, 9999);
//echo($otpCode);
$otpCodeMD5 = md5($otpCode);
//echo($otpCodeMD5);

function sendMessege($otpCode) {
    $commonFieldArray = array(
        "instance_id" => "101540",
        "instance-secret" => "f07fc094db91a81a8e36e0969a385d5a",
        "mobile_no" => "918459399433",
        "message" => "Your OTP is ".$otpCode
    );

    //$mergedArray = Model::mc_encrypt($commonFieldArray, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $post_fields_arr = json_encode($commonFieldArray);
   // print_r($post_fields_arr);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://xzyapi.omunim.in/whatsapp/send_wa_api_msg');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields_arr);
    //
    $result_transaction = curl_exec($ch);
  // echo 'result' . $result_transaction;
    //$result_transaction = Model::mc_decrypt($result_transaction, 'jf8739fh92739j802aso9055', GB_SYSTEM_ONOFF);
    $result_transaction_arr = json_decode($result_transaction, true);
    //
   // echo '<pre>';
   // print_r($result_transaction_arr);
   // echo '</pre>' .
    //
    curl_close($ch);
   }

$mobnocheck = "Select user_mobile FROM user WHERE user_type = 'STAFF' AND user_status= 'Active' ";
//echo $mobnocheck;
//echo "<br>";
$resmobnocheck = mysqli_query($conn, $mobnocheck);
$rowmobnocheck = mysqli_fetch_array($resmobnocheck, MYSQLI_ASSOC);
$dpmobnocheck = $rowmobnocheck['user_mobile'];
//echo('$dpmobnocheck'.$dpmobnocheck);
//echo "<br>";
if ($mobilevariable == $dpmobnocheck) {
    sendMessege($otpCode);

    //echo "<br>";
    $staffMobCompared = "SELECT user_id,user_fname,user_lname FROM user WHERE user_type = 'STAFF' AND user_status= 'Active' AND user_mobile = '$mobilevariable' ";

   // echo $staffmobcompared;
    $resStaffMobCompared = mysqli_query($conn, $staffMobCompared);
    $rowStaffMobCompared = mysqli_fetch_assoc($resStaffMobCompared);
    $user_id = $rowStaffMobCompared['user_id'];
    $user_fname = $rowStaffMobCompared['user_fname'];
    $user_lname = $rowStaffMobCompared['user_lname'];
   // echo 'user_id:' . $user_id . 'your first name is :' . $user_fname . 'your last name is :' . $user_lname;
    //echo "<br>";
    //echo "<br>";

    $updateOtp = "UPDATE user SET user_otp='$otpCodeMD5' WHERE user_mobile = '$mobilevariable'";
    //echo $updateOtp;
    //echo "<br>";
    if (!mysqli_query($conn, $updateOtp)) {
        die('Error: ' . mysqli_error($conn));
    }
}
else {
    //$fileName = $documentRoot."/include/php/omstaffverify.php";
    //echo '$fileName='.$fileName;
 header("Location: omstaffverify.php");
 $msg = 'Wrong Mobile number ..!'; 
 echo $msg;
 //exit(); 
      // header("Location: ".$_SERVER["HTTP_REFERER"]."&message=success");
    }
?>

<html>
    <body><center>
        Your Mobile no is: <?php echo $_POST["mobilenumber"]; ?>
      <!--  &OTP IS SENT SUCCESSFULLY-->
        <form method="post" action="newEmptyPHP.php">
         <!--  <input type="submit" name="login" id="loginsend" value="sign login[SEND OTP]" onclick="myFunction()" ><br><br> -->
           <br> <label>VERIFY OTP:</label>
            <input type="text" id="otp" name="otpentered" placeholder="enter received OTP" ><br><br>
           
            <input type="hidden" id="mobileno" name="mobilenumber" value="<?php echo $_POST['mobilenumber']; ?>" >
            <input type="submit" name="ver" id="ver" value="VERIFY OTP " style="background-color: grestyleen" >
        </form></center>
    </body>
</html>

