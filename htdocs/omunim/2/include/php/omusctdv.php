<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: omusctdv.php
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
require_once 'system/omssopin.php';
?>
<div id="udhharListDiv">
    <?php
//Girvi Fixed Amount Range
    $udhaarSearchCity = $_POST['searchOption'];

    if ($udhaarSearchCity == '') {
        $udhaarSearchCity = $_GET['searchOption'];
    }

// how many rows to show per page
    $rowsPerPage = 15;
    $checkNextRows = $rowsPerPage * 2;

// by default we show first page
    $pageNum = 1;
    $gCounter = 0;

// if $_GET['page'] defined, use it as page number
    if (isset($_GET['page'])) {
        $pageNum = $_GET['page'];
        $gCounter = ($pageNum - 1) * $rowsPerPage;
    }

// counting the offset
    $perOffset = ($pageNum - 1) * $rowsPerPage;

    $qSelTotalUdhaarCount = "SELECT udhaar_id FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_cust_city='$udhaarSearchCity' and udhaar_upd_sts IN ('New','Updated')";
    $resTotalUdhaarCount = mysqli_query($conn,$qSelTotalUdhaarCount);
    $totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);

    $qSelAllUdhaar = "SELECT * FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_cust_city='$udhaarSearchCity' and udhaar_upd_sts IN ('New','Updated') order by udhaar_ent_dat desc LIMIT $perOffset, $rowsPerPage";
    $resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar);
    $totalNextUdhaar = mysqli_num_rows($resAllUdhaar);
    ?>
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td>
                <table border="0" cellspacing="1" cellpadding="1">
                    <tr>
                        <td>
                            <div class="spaceLeft20">
                                <h1>Udhaar List By City / Village:</h1>
                            </div>
                        </td>
                        <td align="left">
                            <div class="h1BlackColor"><?php echo $udhaarSearchCity; ?></div>
                        </td>
                        <td align="right" valign="bottom" class="frm-lbl">
                            <div class="spaceRight20"></div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><br />
            </td>
        </tr>
        <tr>
            <td align="left">
                <table border="0" cellspacing="1" cellpadding="2" width="100%">
                    <?php
                    if ($totalUdhaar <= 0) {
                        echo "<div class=" . "spaceLeft40" . "><div class=" . "h7" . "> ~ Udhaar List is empty. ~ </div></div>";
                    } else {
                        ?>
                        <tr>
                            <td align="left" width="7px">
                                <div class="h7">SN</div>
                            </td>
                            <td align="right"  width="75px">
                                <div class="h7">UDHAAR AMT</div>
                            </td>
                            <td align="right"  width="10px">
                                <div class="h7">&nbsp;</div>
                            </td>
                            <td align="left" width="100px">
                                <div class="h7">CUSTOMER NAME</div>
                            </td>
                            <td align="left" width="50px">
                                <div class="h7">CITY</div>
                            </td>
                            <td align="left" width="50px">
                                <div class="h7">DATE</div>
                            </td>      
                        </tr>
                        <?php
                    }
                    while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {

                        $udhaarId = $rowAllUdhaar['udhaar_id'];
                        $uCustName = $rowAllUdhaar['udhaar_cust_fname'] . ' ' . $rowAllUdhaar['udhaar_cust_lname'];
                        $uCustCity = $rowAllUdhaar['udhaar_cust_city'];
                        $udhaarAmt = $rowAllUdhaar['udhaar_amt'];
                        $uDOB = $rowAllUdhaar['udhaar_DOB'];
                        $custId = $rowAllUdhaar['udhaar_cust_id']; //custId added @Author:PRIYA19MAR15
                        ?>
                        <tr>
                            <td align="left">
                                <!--------Start code to add onclick function  @Author:PRIYA19MAR15----------------->
                                <input type="submit" name="sNo" id="sNo" value="<?php echo $gCounter + 1; ?>" class="frm-btn-without-border" readonly="true"
                                       onclick="getCustomerDetailsWithCustId('CustUdhaar', '<?php echo $custId; ?>', '<?php echo $firmId; ?>');"/>
                                <!--------End code to add onclick function  @Author:PRIYA19MAR15----------------->
                                <input type="hidden" name="udhaarId<?php echo $gCounter; ?>" id="udhaarId<?php echo $gCounter; ?>" value="<?php echo $udhaarId; ?>"/>
                            </td>
                            <td align="right">
                                <div class="amount"><?php echo $udhaarAmt; ?></div>
                            </td>
                            <td align="right"  width="10px">
                                <div class="h7">&nbsp;</div>
                            </td>
                            <td align="left">
                                <h5><?php echo $uCustName; ?></h5>
                            </td>
                            <td align="left">
                                <h5><?php echo $uCustCity; ?></h5>
                            </td>
                            <td align="left">
                                <h5><?php echo date('d  M  y', strtotime($uDOB)); ?></h5>
                            </td>
                        </tr>
                        <?php
                        $gCounter++;
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <?php
    $noOfPagesAsLink = ceil($totalUdhaar / $rowsPerPage);
    if ($pageNum > $noOfPagesAsLink || $pageNum < 0) {
        echo "<h1> ~ This Page is not available. ~ </h1>";
    } else {
        // if ($stockItemMetal != '' || $searchPanel != '') {
        ?>
        <table cellpadding="2" cellspacing="2" border="0" align="right">
            <tr>
                <td align="right">
                    <?php if (($pageNum - 1) != '0') { ?>
                        <input type="submit" id="prvPageButt" name="prvPageButt" value="PREV" class="pageNoButton"
                               onclick="javascript:pagingInUdhaarPanel('<?php echo $pageNum - 1; ?>', 'UdhaarCityList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');" />
                           <?php } ?>
                </td>
                <?php
                if ($pageNum == 1 || $pageNum < 10) {
                    for ($i = 1; $i <= 10; $i++) {
                        if (($noOfPagesAsLink >= $i) && ($noOfPagesAsLink != 1)) {
                            ?>
                            <td align="right">
                                <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" <?php if (($i == 1) && ($pageNum == 1)) { ?>class="currentPageNoButton" <?php } else { ?>class="pageNoButton" <?php } ?>
                                       value="<?php echo $i ?>"
                                       onclick="javascript:pagingInUdhaarPanel(this.value, 'UdhaarCityList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"/>
                            </td>
                            <?php
                        }
                    }
                } else {
                    for ($i = 1; $i <= 10; $i++) {
                        ?>
                        <td align="right">
                            <input type="submit" id="pageNoTextField<?php echo $i; ?>" name="pageNoTextField<?php echo $i; ?>" class="pageNoButton" 
                                   onclick="javascript:pagingInUdhaarPanel(this.value, 'UdhaarCityList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"/>
                        </td>
                        <?php
                    }
                }
                ?>
                <td align="right">
                    <?php if (($pageNum + 1) <= $noOfPagesAsLink) { ?>
                        <input type="submit" id="nextPageButt" name="nextPageButt" value="NEXT" class="pageNoButton"
                               onclick="javascript:pagingInUdhaarPanel('<?php echo $pageNum + 1; ?>', 'UdhaarCityList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');"
                               />
                           <?php } ?>
                </td>

                <?php if ($noOfPagesAsLink > 1) { ?>
                    <td align="right" class="paddingLeft15">
                        <input type="text" id="enterPageNo" name="enterPageNo" placeholder="PAGENO" class="pageNoButton" size="5"
                               onblur="if (this.value !== '') {
                                                   javascript:pagingInUdhaarPanel(this.value, 'UdhaarCityList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');
                                               }"
                               onkeypress="if (event.keyCode == '13') {
                                                   if (this.value !== '') {
                                                       javascript:pagingInUdhaarPanel(this.value, 'UdhaarCityList', '<?php echo $udhaarSearchCity; ?>', '<?php echo $rowsPerPage; ?>', '<?php echo $noOfPagesAsLink; ?>');
                                                   }
                                               }"
                               onclick="this.value = '';"/>
                    </td>
                <?php } ?>
            </tr>
        </table>
    <?php } ?>
</div>