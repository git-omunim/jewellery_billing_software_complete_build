<?php
require_once 'system/omssopin.php';
require_once 'ommpfndv.php';
include 'ommpfunc.php';
?>

<html>
    <body>
  <?php echo $_REQUEST['$msg']; ?>
    <center>
        <form method="post" action="omstaffverify2.php" onsubmit="return validMobileNo(document.getElementById('mobileno'))"
              <label for="phone">Enter a phone number:</label><br><br>
            <input type="text" id="mobileno" name="mobilenumber" placeholder="" ><br><br>
            <div id="message" style="margin-left:400px; margin-top:10px;"></div> 
            <input type="submit" name="submit" id="submit" value="submit" style="background-color: green; font-size: 20px; color:white" >
        </form></center>
</body>
<script>
    function validMobileNo(inputtxt)
    {
        var phoneno = /^\d{10}$/;
        if (inputtxt.value.match(phoneno))
        {


        } else
        {
            alert(" moblie number not valid");
            console.log("not validated");
            return false;
        }
    }
</script>
</html>


