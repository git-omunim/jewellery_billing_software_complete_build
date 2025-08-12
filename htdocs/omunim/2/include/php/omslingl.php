<?php
/*
 * Created on Aug 12, 2016
 *
 * @FileName: omslingl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
<table border="0" cellpadding="2" cellspacing="2">
    <tr align="center">
        <td align="center">
            <div class="firmList">
                <form id="getSchemeName" name="getSchemeName" method="post"
                      action="javascript:getSchemeName(document.getElementById('getSchemeName'));">
                    <table border="0" cellpadding="2" cellspacing="2">
                        <tr align="center">
                            <td align="left" class="frm-lbl">Scheme List</td>
                        </tr>
                        <?php
                        // how many rows to show per page
                        $perRowsPerPage = 5;

                        // by default we show first page
                        $perPageNum = 1;

                        // if $_GET['page'] defined, use it as page number
                        if (isset($_GET['page'])) {
                            $perPageNum = $_GET['page'];
                        }

                        // counting the offset
                        $perOffset = ($perPageNum - 1) * $perRowsPerPage;

                        $qSelItemNameCount = "SELECT acit_id FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' LIMIT $perOffset, 10";
                        $resItemNameCount = mysqli_query($conn, $qSelItemNameCount);
                        $totalItemNames = mysqli_num_rows($resItemNameCount);

                        $qSelItemNames = "SELECT acit_id,acit_desc,acit_scheme_amt,acit_scheme_prd_typ,acit_scheme_prd FROM actionitem where acit_owner_id='$_SESSION[sessionOwnerId]' LIMIT $perOffset, $perRowsPerPage";
                        $resItemNames = mysqli_query($conn, $qSelItemNames);
                        $totalNextItemNames = mysqli_num_rows($resItemNames);

                        if ($totalItemNames <= 0) {
                            echo "<tr><td colspan=" . "2" . "><h5>Scheme Not Available.</h5></td></tr>";
                        }

                        while ($rowItemNames = mysqli_fetch_array($resItemNames, MYSQLI_ASSOC)) {

//				$itemNameDate = date_create($rowItemNames['itm_nm_ent_dat']);
//				$dateItemName = date_format($itemNameDate,'d-m-Y');
                            //add item name in marathi Author:GAUR21JUL16
                            echo "<tr><td><input type=" . "\"submit\"" . " name=" . "\"schemeName\"" . " id=" . "\"{$rowItemNames['acit_id']}\"" . " value=" . "\"{$rowItemNames['acit_desc']}\"" . " class=" . "\"frm-btn-lnk\"" . " onclick=" . "\"setSchemeNameId(this);\"" . "></td></tr>";
                        }
                        //add item name in marathi Author:GAUR21JUL16                       
                        ?>
                    </table>
                </form>
            </div>
        </td>
    </tr>
    <!--Start Code To Pass PanelName blank @Author:PRIYA16AUG13-->
    <?php
    if ($totalNextItemNames > 0) {
        ?>
        <tr align="center">
            <td align="center">
                <table border="0" cellpadding="2" cellspacing="0" align="center">
                    <tr>
                        <?php
                        if ($perPageNum > 1) {
                            ?>
                            <td align="center">
                                <!---Start to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                <div style="text-align: center;">
                                    <?php
                                    $inputId = "prev_itemNames";
                                    $inputType = 'submit';
                                    $inputFieldValue = 'Previous';
                                    $inputIdButton = "prev_itemNames";
                                    $inputNameButton = 'prev_itemNames';
                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                    $inputStyle = " ";
                                    $inputLabel = 'Previous'; // Display Label below the text box
//
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $perPageNumVar = $perPageNum - 1;
                                    $inputOnClickFun = 'javascript:navigateGoldItemNames("' . $perPageNumVar . '","scheme");';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
                                <!--                                <form name="prev_itemNames" id="prev_itemNames"
                                                                      action="javascript:navigateGoldItemNames(<?php echo $perPageNum - 1; ?>,'scheme');"
                                                                      method="get"><input type="submit" value="Previous" class="frm-btn"
                                                                                    maxlength="30" size="15" /></form>-->
                                <!---End to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                            </td>
                            <?php
                        }
                        ?>
                        <?php
                        if ($totalItemNames > 5) {
                            ?>
                            <td align="center">
                                <!---Start to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                <!--                                <form name="next_itemNames" id="next_itemNames"
                                                                      action="javascript:navigateGoldItemNames(<?php echo $perPageNum + 1; ?>,'scheme');"
                                                                      method="get">-->
                                <div style="text-align: center;">
                                    <?php
                                    $inputId = "next_itemNames";
                                    $inputType = 'submit';
                                    $inputFieldValue = 'Next';
                                    $inputIdButton = "next_itemNames";
                                    $inputNameButton = 'next_itemNames';
                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                    $inputStyle = " ";
                                    $inputLabel = 'Next'; // Display Label below the text box
//
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $perPageNumVar = $perPageNum + 1;
                                    $inputOnClickFun = 'javascript:navigateGoldItemNames("' . $perPageNumVar . '","scheme");';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
        <!--                                <input type="submit" value="Next" class="frm-btn"
                                            maxlength="30" size="15" />
                        </form>-->
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
    <!--End Code To Pass PanelName blank @Author:PRIYA16AUG13-->
</table>
