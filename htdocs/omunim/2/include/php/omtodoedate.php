<?php
/*
 * **************************************************************************************
 * @tutorial: kitty edate file
 * **************************************************************************************
 * 
 * Created on Aug 31, 2016
 *
 * @FileName: omktedat.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
?>
<div id="todoeDateDiv">
    
    <?php
//$todayDate = date("Y-m-dd");

    
//    echo '$todayMM'.$todayMM;
//echo '$todayDate'.$todayDate;
//    echo '$todayDate'.$todayDate;
    if ($class == '') {
        $class = "lgn-txtfield14-req";
    }
//    print_r($_REQUEST);
    if ($DOBEDay == '') {
        $DOBEDay = $_GET['DOBDay'];
    }
//    echo '$DOBEDay='.$DOBEDay;
    $DOBEMonth = $_POST['DOBMonth'];
    if ($DOBEMonth == '') {
        $DOBEMonth = $_GET['DOBMonth'];
    }
//echo '$DOBEMonth'.$DOBEMonth;
    $DOBEYear = $_POST['DOBYear'];
    if ($DOBEYear == '') {
        $DOBEYear = $_GET['DOBYear'];
    }
    $TodoDOB = $DOBEDay . $DOBEMonth . $DOBEYear;
//    echo '$TodoDOB'.$TodoDOB;
    $class = $_POST['class'];
    if ($class == '') {
        $class = $_GET['class'];
    }
    $NoofDays = 3;
    
   
//echo '$DOBEDay='.$DOBEDay;
    for ($i = 1; $i <= $NoofDays; $i++) {
        
      
                $ToDoStartDate = $TodoDOB;
                $endDate = strtotime("+" . $NoofDays . " days", strtotime($ToDoStartDate));
                $dueDate = strtoupper(date("d M Y", $endDate));
//                echo '$dueDate='.$dueDate;
    }
    ?>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left" class="<?php echo $class; ?>">
                <input type="text" id="acitEndDate" name="acitEndDate"
                       value="<?php
    if ($TodoDOB == '' && $TodoDOB == NULL) {
        echo   strtoupper(date('j   M  Y')); ;
    } else if($TodoDOB != '' && $TodoDOB != NULL){
        echo $dueDate;
    }
    ?>" class="border-no inputBox14CalibriReqCenter" palceholder="END DATE" readonly></td> 
        </tr>
    </table>
</div>
