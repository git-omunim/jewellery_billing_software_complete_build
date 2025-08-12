<?php
/*
 * **************************************************************************************
 * @tutorial: Staff Home omrevo Access
 * **************************************************************************************
 * 
 * Created on Sept 11,2018 5:50:45 PM
 *
 * @FileName: orehorac_2_6_88.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.86
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
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
<style>
    .heading
    {
        position: relative;
        /*border-radius: 40%;*/
        width: 70%;
        margin-top: -19px;
        text-align: center;
        background: #0174DF none repeat scroll 0% 0%;
        color: rgb(255, 255, 255);
        font-size: 17px;
        font-weight: 600;
    }
</style>
<!-- Start of Modified Code(Complete file modified) @AUTHOR: SANDY16AUG13 -->
<div id="omrevoAccessDiv">
    <table border="0" cellspacing="10" cellpadding="10" align="center" width="100%">
        <td valign="top" width="320px" class="textBoxCurve1px">
            <div style="">
                <div style="margin-top:-16px;border-radius: 5px;width:100%;" class="heading"><span>Add/Update Loan</span></div>
            <table border="0" cellspacing="2" cellpadding="2"  align="center" valign="top" width="100%">
                <?php
                /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess'";
                $resEmpAccessDet = mysqli_query($conn, $selEmpAccessDet);
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
                                $resEmpAccessDetNext = mysqli_query($conn, $selEmpAccessDetNext);
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
                                        <td>
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
            </table>
            </div>
        </td>
        <td width="165px" valign="top" class="textBoxCurve1px">
            <div style="">
                <div style="margin-top:-16px;border-radius: 5px;width:100%;" class="heading"><span>Delete Loan</span></div>
                <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
                    <?php
                    /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                    $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess'";
//                    echo $selEmpAccessDet;
                    $resEmpAccessDett = mysqli_query($conn, $selEmpAccessDet);
                    while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDett)) {
                        $panelVal = $rowEmpAccessDet['acc_access'];
                        $checkBoxName = $rowEmpAccessDet['acc_name'];
                        $checkBoxId = $rowEmpAccessDet['acc_check_id'];

                        $type = $rowEmpAccessDet['acc_type'];
                        if ($type == 'GirviAccess' && ($checkBoxId != 'addNewGirviAccess' && $checkBoxId != 'updateGirviAccess' && $checkBoxId != 'loanPanel')) {
//                            echo '$checkBoxId : ' . $checkBoxId . '<br>';
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
                                        $resEmpAccessDetNext = mysqli_query($conn, $selEmpAccessDetNext);
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
            </div>
        </td>
        <td width="165px" valign="top" class="textBoxCurve1px">
            <div style="">
                <div style="margin-top:-16px;border-radius: 5px;width:100%;" class="heading"><span>Loan Panel</span></div>
                <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
                    <?php
                    /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                    $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and "
                            . "acc_check_id IN ('loanPanel')";

                    $resEmpAccessDett = mysqli_query($conn, $selEmpAccessDet);
                    while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDett)) {
                        $panelVal = $rowEmpAccessDet['acc_access'];
                        $checkBoxName = $rowEmpAccessDet['acc_name'];
                        $checkBoxId = $rowEmpAccessDet['acc_check_id'];
                        $type = $rowEmpAccessDet['acc_type'];
                        // if ($type == 'GirviAccess' && ($checkBoxId != 'addNewGirviAccess' && $checkBoxId != 'updateGirviAccess' && $checkBoxId != 'loanPanel')) {
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
                                    $resEmpAccessDetNext = mysqli_query($conn, $selEmpAccessDetNext);
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
            </div>
        </td>
        <!--start code--> 
        <td width="165px" valign="top" class="textBoxCurve1px">
            <div style="">
                <div style="margin-top:-16px;border-radius: 5px;width:100%;" class="heading"><span>Finance</span></div>
                <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
                    <?php
                    /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                    $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess' and "
                            . "acc_check_id IN ('finance')";
                    $resEmpAccessDett = mysqli_query($conn, $selEmpAccessDet);
                    while ($rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDett)) {
                        $panelVal = $rowEmpAccessDet['acc_access'];
                        $checkBoxName = $rowEmpAccessDet['acc_name'];
                        $checkBoxId = $rowEmpAccessDet['acc_check_id'];
                        $type = $rowEmpAccessDet['acc_type'];
                        // if ($type == 'GirviAccess' && ($checkBoxId != 'addNewGirviAccess' && $checkBoxId != 'updateGirviAccess' && $checkBoxId != 'loanPanel')) {
                        ?>
                        <tr>
                            <td>
                                <table border="0" cellspacing="2" cellpadding="2"  align="left" valign="top">
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
                                    $resEmpAccessDetNext = mysqli_query($conn, $selEmpAccessDetNext);
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
            </div>
        </td>
        <!--end code-->
        <td width="165px" valign="top" class="textBoxCurve1px">
            <div style="">
                <div style="margin-top:-16px;border-radius: 5px;width:100%;" class="heading"><span>MoneyLender</span></div>
                <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
                    <?php
                    /* Start to get values of access @AUTHOR: SANDY13AUG13 */
                    $selEmpAccessDet = "SELECT * FROM access where acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id = '$staffId' and acc_aplcatn ='omrevoAccess'";
                    $resEmpAccessDet = mysqli_query($conn, $selEmpAccessDet);
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
                                        $resEmpAccessDetNext = mysqli_query($conn, $selEmpAccessDetNext);
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
            </div>
        </td>
    </table>
    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" colspan="5">
                <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" class="padBott3">
                    <tr>
                        <td valign="middle" align="right">
                            <input type="submit" value="Submit"
                                   id="empAccessButton" name="empAccessButton" style="height: 30px;width: 120px;font-weight: bold;font-size: 14px;border-radius: 5px !important;border:0;text-align: center;color: #000080;background-color: #BED8FD;" 
                                   onclick="javascript:addEmpAccess('omrevoAccess', '<?php echo $staffId; ?>');" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>  

<!-- End of Modified Code(Complete file modified) @AUTHOR: DIKSHA11SEPT2018 -->