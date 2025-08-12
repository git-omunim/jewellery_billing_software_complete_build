<?php
/*
 * Created on May 25, 2011 11:02:13 AM
 *
 * @FileName: omvccolt.php
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

<table border="0" cellpadding="2" cellspacing="2" width="50%" align="left" style="border:1px dashed #969696;background:#f2f2f2;border-radius:5px;">
    <tr align="center">
        <td align="center">
            <div class="firmList">
                <form id="getCountry" name="getCountry" method="post"
                      action="javascript:getCountry(document.getElementById('getCountry'));">
                    <table border="0" cellpadding="2" cellspacing="2">
                        <tr align="center">
                            <td align="left" class="frm-lbl" style="font-weight:600;font-size:20px;text-transform:uppercase;border-bottom:1px solid;">Country Name</td>
                            <td align="left" class="frm-lbl" style="font-weight:600;font-size:20px;text-transform:uppercase;border-bottom:1px solid;">Date</td>
                        </tr>
                        <?php
                        // how many rows to show per page
                        $perRowsPerPage = 50;

                        // by default we show first page
                        $perPageNum = 1;

                        // if $_GET['page'] defined, use it as page number
                        if (isset($_GET['page'])) {
                            $perPageNum = $_GET['page'];
                        }

                        // counting the offset
                        $perOffset = ($perPageNum - 1) * $perRowsPerPage;

                        $qSelCountryCount = "SELECT country_id FROM country where country_own_id='$_SESSION[sessionOwnerId]' LIMIT $perOffset, 10";
                        $resCountryCount = mysqli_query($conn, $qSelCountryCount);
                        $totalCountries = mysqli_num_rows($resCountryCount);

                        $qSelCountries = "SELECT country_id,country_name,country_ent_dat FROM country order by country_ent_dat desc LIMIT $perOffset, $perRowsPerPage";
                        $resCountries = mysqli_query($conn, $qSelCountries);
                        $totalNextCountries = mysqli_num_rows($resCountries);

                        if ($totalCountries <= 0) {
                            echo "<tr><td colspan=" . "2" . "><h5>Countries Not Available.</h5></td></tr>";
                        }

                        while ($rowCountries = mysqli_fetch_array($resCountries, MYSQLI_ASSOC)) {

                            $countryDate = date_create($rowCountries['country_ent_dat']);
                            $dateCountry = date_format($countryDate, 'd M Y');

                            echo "<tr><td><input type=" . "\"submit\"" . " name=" . "\"cityName\"" . " id=" . "\"{$rowCountries['country_id']}\"" . " value=" . "\"{$rowCountries['country_name']}\"" . " class=" . "\"frm-btn-lnk\"" . " onclick=" . "\"setCountryId(this);\"" . "></td><td>$dateCountry</td></tr>";
                        }
                        ?>
                    </table>
                </form>
            </div>
        </td>
    </tr>
    <?php
    if ($totalNextCountries > 0) {
        ?>
        <tr align="center">
            <td align="center">
                <table border="0" cellpadding="2" cellspacing="0" align="center" width="50%">
                    <tr>
                        <?php
                        if ($perPageNum > 1) {
                            ?>
                            <td align="center">
                                <!---Start to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                <div style="text-align: center;">
                                    <?php
                                    $inputId = "prev_countries";
                                    $inputType = 'submit';
                                    $inputFieldValue = 'Previous';
                                    $inputIdButton = "prev_countries";
                                    $inputNameButton = 'prev_countries';
                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                                    $inputStyle = "width: 100%;height: auto; padding: 5px;font-size: 14px;background-color: #DCEAFF;color: #0F118A;border: 1px solid #7ab0fe;border-radius: 5px !important;";
                                    $inputLabel = 'Previous'; // Display Label below the text box
//
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $perPageNumVar = $perPageNum - 1;
                                    $inputOnClickFun = 'javascript:navigateCountries("' . $perPageNumVar . '");';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
                                <!--				<form name="prev_countries" id="prev_countries"
                                                                        action="javascript:navigateCountries(<?php echo $perPageNum - 1; ?>);"
                                                                        method="get"><input type="submit" value="Previous" class="frm-btn"
                                                                        maxlength="30" size="15" /></form>-->
                                <!---End to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                            </td>
                            <?php
                        }
                        ?>
                        <?php
                        if ($totalCountries > 5) {
                            ?>
                            <td align="center">
                                <!---Start to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                <div style="text-align: center;">
                                    <?php
                                    $inputId = "next_countries";
                                    $inputType = 'submit';
                                    $inputFieldValue = 'Next';
                                    $inputIdButton = "next_countries";
                                    $inputNameButton = 'next_countries';
                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                                    $inputStyle = "width: 100%;height: auto; padding: 5px;font-size: 14px;background-color: #DCEAFF;color: #0F118A;border: 1px solid #7ab0fe;border-radius: 5px !important; ";
                                    $inputLabel = 'Next'; // Display Label below the text box
//
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $perPageNumVar = $perPageNum + 1;
                                    $inputOnClickFun = 'javascript:navigateCountries("' . $perPageNumVar . '");';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
                                <!--				<form name="next_countries" id="next_countries"
                                                                        action="javascript:navigateCountries(<?php echo $perPageNum + 1; ?>);"
                                                                        method="get"><input type="submit" value="Next" class="frm-btn"
                                                                        maxlength="30" size="15" /></form>-->
                                <!---End to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                            </td>
                            <?php
                        }
                        ?>
                    </tr>
                </table>
            </td>
        </tr>

        <?php
    }
    ?>
</table>
