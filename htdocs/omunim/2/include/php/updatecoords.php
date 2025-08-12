<?php
/*
 * **************************************************************************************
 * @tutorial: oMunim Main Select Division
 * **************************************************************************************
 *
 * Created on 23 DEC, 2017 
 *
 * @FileName: updatecoords.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  suraj@softwaregen.com
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
include_once 'ommpfndv.php';
//decode JSON data received from AJAX POST request
 $top = round(($_POST['coordTop']),2);
 $left= round(($_POST['coordLeft']),2);
 $element=$_POST['element'];
 $panel=$_POST['panel'];
// $angle=$_POST['rotate'];
$sql = "UPDATE omindicators SET omx_pos = '$left', omy_pos = '$top' where omin_option='$element' and omin_panel='$panel'";
mysqli_query($conn, $sql) or die("Error updating Coords :".mysqli_error()); 
 if($panel=='MulBcPanel'){
        echo "MulBcPanel";
    }else {
        echo 'success';
    }
?>