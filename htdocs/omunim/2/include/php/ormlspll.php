<?php
/*
 * **************************************************************************************
 * @tutorial: Money Lender List Sub-Division
 * **************************************************************************************
 *
 * Created on 6 Dec, 2012 11:04:23 AM
 *
 * @FileName: ormlspll.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
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
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<?php
$fatherOrSpouseName = $rowSupplier['user_father_name'];
$checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
$labelFatherOrSpouse = "Father Name:";
//if ($checkFatherOrSpouse == 'S') {
//    $labelFatherOrSpouse = "Spouse Name:";
//}

if ($checkFatherOrSpouse == 'F')
    $labelFatherOrSpouse = 'S/o';
else if ($checkFatherOrSpouse == 'D')
    $labelFatherOrSpouse = 'D/o';
else if ($checkFatherOrSpouse == 'S')
    $labelFatherOrSpouse = 'W/o:';
else if ($checkFatherOrSpouse == 'C')
    $labelFatherOrSpouse = 'C/o:';
else if ($checkFatherOrSpouse == 'W')
    $labelFatherOrSpouse = "W/o: ";

//$fatherOrSpouseName = substr($fatherOrSpouseName, 1);
$suppId = $rowSupplier['user_id'];
$suppFName = $rowSupplier['user_fname'];
$suppLName = $rowSupplier['user_lname'];
//$suppGender = $rowSupplier['user_gender'];                  //PRIYA27
$suppGender = $rowSupplier['user_sex'];  //Column Change Author:DIKSHA 12FEB2019
$suppCity = $rowSupplier['user_city'];
$suppMobile = $rowSupplier['user_mobile'];
$suppSince = $rowSupplier['user_since'];
$custImageStatus = $rowSupplier['user_image_status'];
$imageFileType = '';

//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

$selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
$rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
$nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];
?>
<tr> 
     <?php
    if ($custImageStatus != 'NO') {
        $qSelImg = "SELECT * FROM image where image_user_id='$suppId'";
        $resQSelImg = mysqli_query($conn, $qSelImg);
        $rowSmoneyImg = mysqli_fetch_array($resQSelImg, MYSQLI_ASSOC);
        $imageFileType = $rowSmoneyImg['image_snap_ftype'];
        $image_id = $rowSmoneyImg['image_id']; // CODE ADDED TO GET IMAGE ID,@AUTHOR:HEMA-2JUN2020
    }
    ?>
    <td align="center" rowspan="3" valign="middle" style="border-bottom: 1px solid #c1c1c1;">
        <?php if ($custImageStatus != 'NO' && $imageFileType != '') { ?>
            <!---------START CODE TO SHOW IMAGE OF MONEYLENDER,@AUTHOR:HEMA-2JUN2020-------------->
            <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_id"; ?>',
                                'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                        return false" >
                <img src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_id"; ?>" 
                     width="64px" height="64px" border="1" style="border-radius:50px;border:1px solid #bdd3f1;"/>
            </a>
            <!---------END CODE TO SHOW IMAGE OF MONEYLENDER,@AUTHOR:HEMA-2JUN2020-------------->
        <?php } else { ?>
            <img src="<?php echo $documentRoot; ?>/images/img/user-img.png" width="64px" height="64px" border="0" style="border-radius:50px;border:1px solid #bdd3f1;filter: grayscale(100);
                 opacity: 0.5;"/>
        <?php } ?>
    </td> 
    <td align="left">
        <span class="gold">
            <b> 
                <!----Start to Change code to show fields as per user type @AUTHOR: SANDY13NOV13----> 
                <h2>
                    <?php if ($userType == 'MoneyLender') { ?>
                        <input type="submit" name="suppId" 
                               id="<?php echo "$suppId"; ?>" value="<?php echo "$suppFName $suppLName"; ?>" 
                               class="cust-btn-lnk" onclick="setMlId(this);" style="text-transform: uppercase"/>
                           <?php } else { ?>
                        <input type="submit" name="suppId" 
                               id="<?php echo "$suppId"; ?>" value="<?php echo "$suppFName $suppLName"; ?>" 
                               class="cust-btn-lnk" onclick="setSuppId(this);" style="text-transform: uppercase"/>
                           <?php } ?>
                </h2> 
                <!----End to Change code to show fields as per user type @AUTHOR: SANDY13NOV13----> 
            </b>
        </span>
    </td> 
   
</tr> 
<tr> 
    <td colspan="2"> 
        <div class="main_middle_cust_list_content" style="width:100%;"> 
            <table width="100%" border="0" cellspacing="2" cellpadding="1"> 
                <tr> 
                    <td valign="top" align="left" width="20%">
                        <span class="silver"> 
                            <h4><?php echo "$labelFatherOrSpouse"; ?></h4> 
                        </span>
                    </td> 
                    <td align="left" valign="top" colspan="3" width="30%"> 
                        <h5><?php echo substr($fatherOrSpouseName, 1); ?></h5> 
                    </td> 
                </tr> 
                <tr> 
                    <td valign="top" align="left" width="20%">
                        <span class="silver"> 
                            <h4>City Name:</h4> 
                        </span></td> 
                    <td align="left" valign="top" width="30%"> 
                        <h5><?php echo "$suppCity"; ?></h5> 
                    </td> 
                    <td valign="top" align="left" width="10%">
                        <span class="silver"> 
                            <h4>Gender:</h4> 
                        </span></td> 
                    <td align="left" valign="top" width="40%"> 
                        <h5>
                            <?php if ($suppGender == 'M' || $suppGender == '') { ?>
                                Male
                            <?php } else { ?>
                                Female
                            <?php } ?>
                        </h5> 
                    </td>
                </tr> 
                <tr> 
                    <td valign="top" colspan="2" align="left" width="30%">
<!--                        <span class="silver"> 
                            <h4>Mobile No:</h4> 
                        </span>-->
                        <h5 style="font-size:18px;font-weight:600;"><?php echo "$suppMobile"; ?></h5> 
                    </td> 
<!--                    <td align="left"> 
                        <h5><?php // echo "$suppMobile"; ?></h5> 
                    </td> -->
                    <td valign="top" align="left" width="20%">
                        <span class="silver"> 
                            <h4>Since:</h4> 
                        </span>
                    </td> 
                    <td align="left" width="40%"> 
                        <h5><?php 
                             if ($nepaliDateIndicator == 'YES') {
                                $date = substr($suppSince, 0, 10);
                                $date_d = substr($date, 8, 2);
                                $selMnth = substr($date, 5, 2);
                                $date_y = substr($date, 0, 4);
                                if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $selMnth)) {
                                    // Convert the month abbreviation to its numeric representation (zero-padded)
                                    $selMnth = date('m', strtotime($selMnth));
                                }
                                $date_ne = $nepali_date->get_nepali_date($date_y, $selMnth, $date_d);
                                echo $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                            } else {
                                echo "$suppSince";
                            } ?></h5> 
                    </td> 
                </tr> 
            </table> 
        </div> 
    </td> 
</tr> 
<tr> 
    <td colspan="2" align="right"><div class="hrGrey"></div></td> 
</tr>