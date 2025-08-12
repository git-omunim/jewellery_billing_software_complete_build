<?php
/*
 * Created on May 26, 2011 10:48:06 AM
 *
 * @FileName: omvsstlt.php
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
                <form id="getState" name="getState" method="post"
                      action="javascript:getState(document.getElementById('getState'));">
                    <table border="0" cellpadding="2" cellspacing="2">
                        <tr align="center">
                            <td align="left" class="frm-lbl" style="font-weight:600;font-size:20px;text-transform:uppercase;border-bottom:1px solid;">State Name</td>
                            <td align="left" class="frm-lbl" style="font-weight:600;font-size:20px;text-transform:uppercase;border-bottom:1px solid;">Date</td>
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

                        $qSelStateCount = "SELECT state_id FROM state where state_own_id='$_SESSION[sessionOwnerId]' LIMIT $perOffset, 10";
                        $resStateCount = mysqli_query($conn, $qSelStateCount);
                        $totalStates = mysqli_num_rows($resStateCount);

                        $qSelStates = "SELECT state_id,state_name,state_ent_dat FROM state where state_own_id='$_SESSION[sessionOwnerId]' order by state_ent_dat desc LIMIT $perOffset, $perRowsPerPage";
                        $resStates = mysqli_query($conn, $qSelStates);
                        $totalNextStates = mysqli_num_rows($resStates);

                        if ($totalStates <= 0) {
                            echo "<tr><td colspan=" . "2" . "><h5>States Not Available.</h5></td></tr>";
                        }

                        while ($rowStates = mysqli_fetch_array($resStates, MYSQLI_ASSOC)) {

                            $stateDate = date_create($rowStates['state_ent_dat']);
                            $dateState = date_format($stateDate, 'd M Y');

                            echo "<tr><td><input type=" . "\"submit\"" . " name=" . "\"cityName\"" . " id=" . "\"{$rowStates['state_id']}\"" . " value=" . "\"{$rowStates['state_name']}\"" . " class=" . "\"frm-btn-lnk\"" . " onclick=" . "\"setStateId(this);\"" . "></td><td>$dateState</td></tr>";
                        }
                        ?>
                    </table>
                </form>
            </div>
        </td>
    </tr>
    <?php
    if ($totalNextStates > 0) {
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
                                    $inputId = "prev_states";
                                    $inputType = 'submit';
                                    $inputFieldValue = 'Previous';
                                    $inputIdButton = "prev_states";
                                    $inputNameButton = 'prev_states';
                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                                    $inputStyle = "width: 100%;height: auto; padding: 5px;font-size: 14px;background-color: #DCEAFF;color: #0F118A;border: 1px solid #7ab0fe;border-radius: 5px !important; ";
                                    $inputLabel = 'Previous'; // Display Label below the text box
//
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $perPageNumVar = $perPageNum - 1;
                                    $inputOnClickFun = 'javascript:navigateStates("' . $perPageNumVar . '");';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
                                <!--				<form name="prev_states" id="prev_states"
                                                                        action="javascript:navigateStates(<?php echo $perPageNum - 1; ?>);"
                                                                        method="get"><input type="submit" value="Previous" class="frm-btn"
                                                                        maxlength="30" size="15" /></form>-->
                                <!---End to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                            </td>
                            <?php
                        }
                        ?>
                        <?php
                        if ($totalStates > 5) {
                            ?>
                            <td align="center">
                                <!---Start to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                <div style="text-align: center;">
                                    <?php
                                    $inputId = "next_states";
                                    $inputType = 'submit';
                                    $inputFieldValue = 'Next';
                                    $inputIdButton = "next_states";
                                    $inputNameButton = 'next_states';
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
                                    $inputOnClickFun = 'javascript:navigateStates("' . $perPageNumVar . '");';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
                                <!--				<form name="next_states" id="next_states"
                                                                        action="javascript:navigateStates(<?php echo $perPageNum + 1; ?>);"
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
