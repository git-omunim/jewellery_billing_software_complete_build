<?php
/*
 * **************************************************************************************
 * @tutorial: Staff Home omrevo Access
 * **************************************************************************************
 * 
 * Created on Jun 4, 2013 10:50:45 AM
 *
 * @FileName: orehorac.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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
?>
<?php
require_once 'system/omssopin.php';
$staffId = $_GET['staffId'];
//change in file for layout @AUTHOR: SANDY08JAN14
?>
<!-- Start of Modified Code(Complete file modified) @AUTHOR: SANDY16AUG13 -->
<div id="omrevoAccessDiv">
    <table border="0" cellspacing="2" cellpadding="2" align="center" valign="top" width="100%">
        <tr>
            <td valign="top" width="350px">
                <table border="0" cellspacing="2" cellpadding="2"  align="left" valign="top">
                    <tr>
                        <?php
                        /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                        $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess'";
                        $resEmpAccessDet = mysqli_query($conn,$selEmpAccessDet);
                        while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDet)) {
                            $panelVal = $rowEmpAccessDet['acc_access'];
                            $checkBoxName = $rowEmpAccessDet['acc_name'];
                            $checkBoxId = $rowEmpAccessDet['acc_check_id'];
                            $type = $rowEmpAccessDet['acc_type'];
                            if ($type == 'GirviAccess' && ($checkBoxId == 'addNewGirviAccess' || $checkBoxId == 'updateGirviAccess')) {
                                ?>
                                <td width="150px" valign="top" class="textBoxCurve1px marginLeft20">
                                    <table border="0" cellspacing="2" cellpadding="2" align="center" valign="top">
                                        <tr>
                                            <td align="right" valign="top">
                                                <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                                <?php
                                                if ($panelVal == 'true')
                                                    echo 'checked';
                                                else
                                                    echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                                ?>/>
                                            </td>
                                            <td align="left" valign="middle" colspan="2">
                                                <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                        $selEmpAccessDetNext = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and  acc_check_id LIKE '%" . $checkBoxId . "%' and acc_check_id !='$checkBoxId'";
                                        $resEmpAccessDetNext = mysqli_query($conn,$selEmpAccessDetNext);
                                        //$num = mysqli_num_rows($resEmpAccessDet);
                                        //echo '$num' . $num;
                                        while ($rowEmpAccessDetNext = mysqli_fetch_array($resEmpAccessDetNext)) {
                                            $panelVal = $rowEmpAccessDetNext['acc_access'];
                                            $checkBoxName = $rowEmpAccessDetNext['acc_name'];
                                            $checkBoxId = $rowEmpAccessDetNext['acc_check_id'];
                                            $type = $rowEmpAccessDetNext['acc_type'];
                                            ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="right" valign="top">
                                                    <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                                    <?php
                                                    if ($panelVal == 'true')
                                                        echo 'checked';
                                                    else
                                                        echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                                    ?>/>
                                                </td>
                                                <td align="left" valign="middle">
                                                    <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                                </td>
                                            </tr> 
                                        <?php } ?>
                                    </table>
                                </td>
                                <?php
                            }
                        }
                        ?>   
                    </tr> 
                </table>
            </td>
            <td width="150px" valign="top" class="textBoxCurve1px">
                <table border="0" cellspacing="2" cellpadding="2"  align="left" valign="top">
                    <?php
                    /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                    $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess'";
//                    echo $selEmpAccessDet;
                    $resEmpAccessDett = mysqli_query($conn,$selEmpAccessDet);
                    while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDett)) {
                        $panelVal = $rowEmpAccessDet['acc_access'];
                        $checkBoxName = $rowEmpAccessDet['acc_name'];
                        $checkBoxId = $rowEmpAccessDet['acc_check_id'];
                        
                        $type = $rowEmpAccessDet['acc_type'];
                        if ($type == 'GirviAccess' && ($checkBoxId != 'addNewGirviAccess' && $checkBoxId != 'updateGirviAccess' && $checkBoxId != 'loanPanel')) {
//                            echo '$checkBoxId : ' . $checkBoxId . '<br>';
                            ?>
                            <tr>
                                <td width="150px">
                                    <table border="0" cellspacing="2" cellpadding="2" align="left" valign="top">
                                        <tr>
                                            <td align="right" valign="top">
                                                <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                                <?php
                                                if ($panelVal == 'true')
                                                    echo 'checked';
                                                else
                                                    echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                                ?>/>
                                            </td>
                                            <td align="left" valign="middle" colspan="2">
                                                <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                        $selEmpAccessDetNext = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and  acc_check_id LIKE '%" . $checkBoxId . "%' and acc_check_id !='$checkBoxId'";
                                        $resEmpAccessDetNext = mysqli_query($conn,$selEmpAccessDetNext);
                                        //$num = mysqli_num_rows($resEmpAccessDet);
                                        //echo '$num' . $num;
                                        while ($rowEmpAccessDetNext = mysqli_fetch_array($resEmpAccessDetNext)) {
                                            $panelVal = $rowEmpAccessDetNext['acc_access'];
                                            $checkBoxName = $rowEmpAccessDetNext['acc_name'];
                                            $checkBoxId = $rowEmpAccessDetNext['acc_check_id'];
                                            $type = $rowEmpAccessDetNext['acc_type'];
                                            ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="right" valign="top">
                                                    <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                                    <?php
                                                    if ($panelVal == 'true')
                                                        echo 'checked';
                                                    else
                                                        echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                                    ?>/>
                                                </td>
                                                <td align="left" valign="middle">
                                                    <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                                </td>
                                            </tr> 
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr> 
                            <?php
                        }
                    }
                    ?>   
                </table>
            </td>
            <td valign="top" align="center" width="200px" class="paddingLeft30">
                <table border="0" cellspacing="2" cellpadding="2"  align="center" valign="top">
                    <?php
                    /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                    $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and "
                            . "acc_check_id IN ('loanPanel')";

                    $resEmpAccessDett = mysqli_query($conn,$selEmpAccessDet);
                    while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDett)) {
                        $panelVal = $rowEmpAccessDet['acc_access'];
                        $checkBoxName = $rowEmpAccessDet['acc_name'];
                        $checkBoxId = $rowEmpAccessDet['acc_check_id'];
                        $type = $rowEmpAccessDet['acc_type'];
                        // if ($type == 'GirviAccess' && ($checkBoxId != 'addNewGirviAccess' && $checkBoxId != 'updateGirviAccess' && $checkBoxId != 'loanPanel')) {
                        ?>
                        <tr>
                            <td width="150px" valign="top" class="textBoxCurve1px">
                                <table border="0" cellspacing="2" cellpadding="2" align="left" valign="top">
                                    <tr>
                                        <td align="right" valign="top">
                                            <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                            <?php
                                            if ($panelVal == 'true')
                                                echo 'checked';
                                            else
                                                echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                            ?>/>
                                        </td>
                                        <td align="left" valign="middle" colspan="2">
                                            <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                        </td>
                                    </tr>
                                    <?php
                                    $selEmpAccessDetNext = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and  acc_check_id LIKE '%" . $checkBoxId . "%' and acc_check_id !='$checkBoxId'";
                                    $resEmpAccessDetNext = mysqli_query($conn,$selEmpAccessDetNext);
                                    //$num = mysqli_num_rows($resEmpAccessDet);
                                    //echo '$num' . $num;
                                    while ($rowEmpAccessDetNext = mysqli_fetch_array($resEmpAccessDetNext)) {
                                        $panelVal = $rowEmpAccessDetNext['acc_access'];
                                        $checkBoxName = $rowEmpAccessDetNext['acc_name'];
                                        $checkBoxId = $rowEmpAccessDetNext['acc_check_id'];
                                        $type = $rowEmpAccessDetNext['acc_type'];
                                        ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td align="right" valign="top">
                                                <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                                <?php
                                                if ($panelVal == 'true')
                                                    echo 'checked';
                                                else
                                                    echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                                ?>/>
                                            </td>
                                            <td align="left" valign="middle">
                                                <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                            </td>
                                        </tr> 
                                    <?php } ?>
                                </table>
                            </td>
                        </tr> 
                        <?php
                        //  }
                    }
                    ?>   
                </table>
            </td>
            <!--start code--> 
            <td valign="top" align="center" width="200px" class="paddingLeft30">
                <table border="0" cellspacing="2" cellpadding="2"  align="center" valign="top">
                    <?php
                    /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                    $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and "
                            . "acc_check_id IN ('finance')";
                    $resEmpAccessDett = mysqli_query($conn,$selEmpAccessDet);
                    while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDett)) {
                        $panelVal = $rowEmpAccessDet['acc_access'];
                        $checkBoxName = $rowEmpAccessDet['acc_name'];
                        $checkBoxId = $rowEmpAccessDet['acc_check_id'];
                        $type = $rowEmpAccessDet['acc_type'];
                        // if ($type == 'GirviAccess' && ($checkBoxId != 'addNewGirviAccess' && $checkBoxId != 'updateGirviAccess' && $checkBoxId != 'loanPanel')) {
                        ?>
                        <tr>
                            <td width="150px" valign="top" class="textBoxCurve1px">
                                <table border="0" cellspacing="2" cellpadding="2" align="left" valign="top">
                                    <tr>
                                        <td align="right" valign="top">
                                            <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                            <?php
                                            if ($panelVal == 'true')
                                                echo 'checked';
                                            else
                                                echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                            ?>/>
                                        </td>
                                        <td align="left" valign="middle" colspan="2">
                                            <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                        </td>
                                    </tr>
                                    <?php
                                    $selEmpAccessDetNext = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and  acc_check_id LIKE '%" . $checkBoxId . "%' and acc_check_id !='$checkBoxId'";
                                    $resEmpAccessDetNext = mysqli_query($conn,$selEmpAccessDetNext);
                                    //$num = mysqli_num_rows($resEmpAccessDet);
                                    //echo '$num' . $num;
                                    while ($rowEmpAccessDetNext = mysqli_fetch_array($resEmpAccessDetNext)) {
                                        $panelVal = $rowEmpAccessDetNext['acc_access'];
                                        $checkBoxName = $rowEmpAccessDetNext['acc_name'];
                                        $checkBoxId = $rowEmpAccessDetNext['acc_check_id'];
                                        $type = $rowEmpAccessDetNext['acc_type'];
                                        ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td align="right" valign="top">
                                                <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                                <?php
                                                if ($panelVal == 'true')
                                                    echo 'checked';
                                                else
                                                    echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                                ?>/>
                                            </td>
                                            <td align="left" valign="middle">
                                                <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                            </td>
                                        </tr> 
                                    <?php } ?>
                                </table>
                            </td>
                        </tr> 
                        <?php
                        //  }
                    }
                    ?>   
                </table>
            </td>
            <!--end code-->
            <td valign="top" class="paddingTop4 paddingLeft30">
                <table border="0" cellspacing="2" cellpadding="2" align="left" class="textBoxCurve1px">
                    <?php
                    /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                    $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess'";
                    $resEmpAccessDet = mysqli_query($conn,$selEmpAccessDet);
                    while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDet)) {
                        $panel = $rowEmpAccessDet['acc_panel'];
                        $panelVal = $rowEmpAccessDet['acc_access'];
                        $checkBoxName = $rowEmpAccessDet['acc_name'];
                        $checkBoxId = $rowEmpAccessDet['acc_check_id'];
                        $type = $rowEmpAccessDet['acc_type'];
                        if ($type == 'UdhaarAccess' || $type == 'MoneyLenderAccess') {
                            ?>
                            <tr>
                                <td>
                                    <table border="0" cellspacing="2" cellpadding="2" align="left" valign="top">
                                        <tr>
                                            <td align="right" valign="top">
                                                <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                                <?php
                                                if ($panelVal == 'true')
                                                    echo 'checked';
                                                else
                                                    echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                                ?>/>
                                            </td>
                                            <td align="left" valign="middle" colspan="2">
                                                <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                        $selEmpAccessDetNext = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and  acc_check_id LIKE '%" . $checkBoxId . "%' and acc_check_id !='$checkBoxId'";
                                        $resEmpAccessDetNext = mysqli_query($conn,$selEmpAccessDetNext);
                                        //$num = mysqli_num_rows($resEmpAccessDet);
                                        //echo '$num' . $num;
                                        while ($rowEmpAccessDetNext = mysqli_fetch_array($resEmpAccessDetNext)) {
                                            $panelVal = $rowEmpAccessDetNext['acc_access'];
                                            $checkBoxName = $rowEmpAccessDetNext['acc_name'];
                                            $checkBoxId = $rowEmpAccessDetNext['acc_check_id'];
                                            $type = $rowEmpAccessDetNext['acc_type'];
                                            ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="right" valign="top">
                                                    <input type="checkbox" id="<?php echo $checkBoxId; ?>" name="<?php echo $checkBoxId; ?>" value="<?php echo $checkBoxId; ?>"         
                                                    <?php
                                                    if ($panelVal == 'true')
                                                        echo 'checked';
                                                    else
                                                        echo ''; //to get values of access @AUTHOR: SANDY12AUG13  
                                                    ?>/>
                                                </td>
                                                <td align="left" valign="middle">
                                                    <span class="text_blue_Arial_12"><?php echo $checkBoxName; ?></span>
                                                </td>
                                            </tr> <?php } ?>
                                    </table>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="5">
                <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" class="padBott3">
                    <br/>
                    <tr>
                        <td valign="middle" align="right">
                            <input type="submit" value="Submit"
                                   id="empAccessButton" name="empAccessButton" class="frm-btn" 
                                   onclick="javascript:addEmpAccess('omrevoAccess', '<?php echo $staffId; ?>');" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>  

<!-- End of Modified Code(Complete file modified) @AUTHOR: SANDY16AUG13 -->