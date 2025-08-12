<?php
/*
 * Created on 06-Feb-2011 6:23:13 PM
 *
 * @FileName: omrlcsdt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
//*******************<!-----Start to add delete and reactivate button for customer @AUTHOR: SANDY27SEP13 ----->
$fatherOrSpouseName = $rowCustomer['user_father_name'];
$checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
$labelFatherOrSpouse = "Father Name:";
if ($checkFatherOrSpouse == 'S') {
    $labelFatherOrSpouse = "Spouse Name:";
}
$fatherOrSpouseName = om_ucfirst(substr($fatherOrSpouseName, 1));

$custId = $rowCustomer['user_id'];
$custFName = om_ucfirst($rowCustomer['user_fname']);
$custLName = om_ucfirst($rowCustomer['user_lname']);
$custGender = $rowCustomer['user_sex'];
$custCity = om_ucfirst($rowCustomer['user_city']);
$custMobile = $rowCustomer['user_mobile'];
$custSince = $rowCustomer['user_since'];
?>

<tr>
    <td>&nbsp;</td>
    <td align="right" valign="bottom" >
        <!----CHANGE IN INPUT VALUE FIELD @AUTHOR: SANDY4NOV13------>
        <div style="">
            <?php
            $inputId = "subButton";
            $inputType = 'submit';
            $inputFieldValue = 'REACTIVATE';
            $inputIdButton = "subButton";
            $inputNameButton = '';
            $inputTitle = 'Click here to Activate customer!';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
            // This is the main class for input flied
            $inputFieldClass = 'btn ' . $om_btn_style;
            $inputStyle = "background: #DCEAFF;color: #0F118A;border: 1px solid #7ab0fe;border-radius: 5px !important;font-size: 15px;font-weight:600;width:max-content;padding:0 10px; ";
            $inputLabel = 'REACTIVATE'; // Display Label below the text box
//
            // This class is for Pencil Icon                                                           
            $inputIconClass = '';
            $inputPlaceHolder = '';
            $spanPlaceHolderClass = '';
            $spanPlaceHolder = '';
            $inputOnChange = "";
            $inputOnClickFun = 'changeCustomerStatus("' . $custId . '", "Activate")';
            $inputKeyUpFun = '';
            $inputDropDownCls = '';               // This is the main division class for drop down 
            $inputselDropDownCls = '';            // This is class for selection in drop down
            $inputMainClassButton = '';           // This is the main division for Button
            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
            ?>
            <!--</div>-->
    <!--        <input type="submit" value="REACTIVATE" class="frm-btn" id="subButton" 
    onclick="changeCustomerStatus('<?php echo $custId; ?>', 'Activate')"
    maxlength="30" size="15" title="Click here to Activate customer!"/>-->
            <!--<div style="text-align:center;">-->
            <?php
            $inputId = "subButton";
            $inputType = 'submit';
            $inputFieldValue = 'PERMANENT DELETE';
            $inputIdButton = "subButton";
            $inputNameButton = '';
            $inputTitle = 'Click here to Delete customer!';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
            // This is the main class for input flied
            $inputFieldClass = 'btn ' . $om_btn_style_del;
            $inputStyle = "background:#fdd;color:#df0707;border: 1px solid #ffadad;border-radius: 5px !important;font-size: 15px;font-weight:600;width:max-content;padding:0 10px;";
            $inputLabel = 'PERMANENT DELETE'; // Display Label below the text box
//
            // This class is for Pencil Icon                                                           
            $inputIconClass = '';
            $inputPlaceHolder = '';
            $spanPlaceHolderClass = '';
            $spanPlaceHolder = '';
            $inputOnChange = "";
            $inputOnClickFun = 'changeCustomerStatus("' . $custId . '", "Delete");';
            $inputKeyUpFun = '';
            $inputDropDownCls = '';               // This is the main division class for drop down 
            $inputselDropDownCls = '';            // This is class for selection in drop down
            $inputMainClassButton = '';           // This is the main division for Button
            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
            ?>
        </div>
<!--        <input type="submit" value="PERMANENT DELETE" class="frm-btn" id="subButton" 
onclick="changeCustomerStatus('<?php echo $custId;
            ?>', 'Delete')"
            maxlength="30" size="15" title="Click here to Delete customer!"/>-->
    </td>
</tr>
<!-----End to add delete and reactivate button for customer @AUTHOR: SANDY27SEP13 ----->
<tr>
    <td align="left" width="50%">
        <table width="100%" align="center" style="border:1px dotted #CACACA;border-right: 4px solid #73b0ff;">
            <tr>      

                <!-- ***************************Start code to change code by image insrtion @Author:SANT19JAN16********************** */ -->
                <?php
                $image_snap_ftype = '';
                if ($custId != NULL && $custId != '') {
                    $qSelImg = "SELECT * FROM image where image_user_id='$custId'";
                    $resQSelImg = mysqli_query($conn, $qSelImg) or die(mysqli_error($conn));
                    $rowcircleImg = mysqli_fetch_array($resQSelImg, MYSQLI_ASSOC);
                    $image_snap_ftype = $rowcircleImg['image_snap_ftype'];
                }
                ?>
                <td align="center" rowspan="3" valign="middle" width="20%" style="border-right: 2px dotted #c1c1c1;border-bottom: 2px dotted #c1c1c1;">
                    <?php if ($image_snap_ftype == '') { ?>
                        <img src="<?php echo $documentRoot; ?>/images/img/user-img.png" width="64px" height="64px" border="1" style="border-radius: 50px;border: 1px solid #bdd3f1;filter: grayscale(100);opacity: 0.5;"/>
                    <?php } else { ?>
                        <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omccusim.php?user_id=<?php echo "$custId"; ?>',
                                            'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                    return false" >
                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omccguim.php?user_id=<?php echo "$custId"; ?>" 
                                 width="64px" height="64px" border="1"/>
                        </a>
                    <?php } ?>
                </td>
                <!-- ***************************End code to change code by image insrtion @Author:SANT19JAN16********************** */ -->

                <td align="left" width="80%">              
                    <div class="main_middle_cust_list_content" style="width:100%;"> 
                        <table width="100%" border="0" cellspacing="2" cellpadding="1"> 
                            <tr>
                                <td valign="top" align="right">
                                    <span class="gold">
                                        <b> 
                                            <h2>
                                                <input type="submit" name="custId" id="<?php echo "$custId"; ?>" value="<?php echo "$custFName $custLName"; ?>" class="cust-btn-lnk"/>
                                            </h2> 
                                        </b>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <table width="100%" align="left">
                                        <tr>
                                            <td width="50" align="left" valign="top">
                                                <tr> 
                                                    <td valign="top" align="left" width="120px">
                                                        <span class="silver"> 
                                                            <h4><?php echo "$labelFatherOrSpouse"; ?></h4> 
                                                        </span>
                                                    </td> 
                                                    <td align="left" valign="top" colspan="3"> 
                                                        <h5><?php echo "$fatherOrSpouseName"; ?></h5> 
                                                    </td> 
                                                </tr> 
                                                <tr> 
                                                    <td valign="top" align="left">
                                                        <span class="silver"> 
                                                            <h4>City Name:</h4> 
                                                        </span>
                                                    </td> 
                                                    <td align="left" valign="top"> 
                                                        <h5><?php echo "$custCity"; ?></h5> 
                                                    </td> 
                                                    <td valign="top" align="right">
                                                        <span class="silver"> 
                                                            <h4>Gender:</h4> 
                                                        </span></td> 
                                                    <td align="left" valign="top"> 
                                                        <h5>
                                                            <?php if ($custGender == 'M') { ?>
                                                                Male
                                                            <?php } else { ?>
                                                                Female
                                                            <?php } ?>
                                                        </h5> 
                                                    </td>
                                                </tr> 
                                           </td>
                                           <td width="50" align="left" valign="top">
                                                <tr> 
                                                    <td valign="top" align="left" width="">
                                                        <span class="silver"> 
                                                            <h4>Mobile No:</h4> 
                                                        </span>
                                                    </td> 
                                                    <td align="left" valign="top"> 
                                                        <h5><?php echo "$custMobile"; ?></h5> 
                                                    </td> 
                                                    <td valign="top" align="right">
                                                        <span class="silver"> 
                                                            <h4>Since:</h4> 
                                                        </span>
                                                    </td> 
                                                    <td align="left"> 
                                                        <h5><?php echo "$custSince"; ?></h5> 
                                                    </td> 
                                                </tr> 
                                           </td>
                                        </tr>
                                   </table>
                               </td>
                            
                          </tr>


           
        </table> 
    </div> 
</td> 
</tr>
</table>
</td>
</tr> 
<!--<tr> 
    <td colspan="4" align="right"><hr color="#B8860B" /></td> 
</tr>-->
