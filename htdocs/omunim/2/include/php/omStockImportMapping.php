<?php
/*
 * **********************************************************************************************************************************
 * Stock import Mapping @SANSKRUTI
 * **********************************************************************************************************************************
 * @FileName: omStockImportMapping.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.148
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 * Copyright 2022 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-07MAY2022
 *  REASON:
 *
 */

//
if (!isset($_SESSION)) {
    session_start();
}
//
?>
<?php
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
//
$currentFileName = basename(__FILE__);
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
?>

<?php
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
//
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    $selFirmId = $_SESSION['setFirmSession'];
}
//
//echo '$selFirmId == ' . $selFirmId . '</br>';
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr order by firm_since desc";
}
//
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}

if ($openingStockType == NULL || $openingStockType == '') {
    $openingStockType = $_REQUEST['openingStockType'];
}
//
//
$fileName = $_FILES['CVSFile']['name'];
//
// Input Field Name @AUTHOR:PRIYANKA-07MAY2022
$importFile = $_FILES['CVSFile']['tmp_name'];
//
?>
<input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>"/>
<form id="importStockMapping" action="include/php/omAddStockMappingDetails.php" method="POST" 
      onsubmit = "return mandatoryFieldSmapping()" 
      style="display: flex; flex-wrap: wrap;">
    <!--<input type ="hidden" id="panelName" name="panelName" value ="importStockMapping"/>-->
    <?php
    if (($readImportFile = fopen($documentRoot . '/include/php/stock/sample_files/OM_OPENING_STOCK_WITH_STONE.csv', 'r')) !== FALSE) {
        $j = 0;
        $data = fgetcsv($readImportFile);
        $num_columns = count($data);
        $mandatoryFields = array('FIRM', 'DATE', 'TYPE', 'RATE', 'PRE ID', 'POST ID', 'STOCK TYPE', 'CATEGORY', 'NAME', 'GS WT', 'GS WT TYP', 'NT WT', 'NT WT TYP', 'PURITY');

        //echo '$num_columns'.$num_columns;
        for ($i = 0; $i < $num_columns; $i++) {
            ?>

            <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom:15px; margin-right: 0px;margin-left:10px;" >
                <tr>
                    <td>
                        <?php
                        if (in_array($data[$i], $mandatoryFields)) {
                            ?> 

                            <input type="text" id="<?php echo $data[$i] ?>" name="<?php echo $data[$i] ?>" 
                                   value="<?php echo $data[$i]; ?>" style ="color : #FF0000;border: 1px solid #cacaca;margin-bottom: 2px;height:25px;" readonly/>
                               <?php } else {
                                   ?>
                            <input type="text" id="<?php echo $data[$i] ?>" name="<?php echo $data[$i] ?>" 
                                   value="<?php echo $data[$i]; ?>" style ="border: 1px solid #cacaca;margin-bottom: 2px;height:25px;" readonly/>
                               <?php } ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="UserDefined" id="<?php echo $data[$i] . "_USER"; ?>" name="<?php echo $data[$i] . "_USER"; ?>" style="border: 1px solid #cacaca;margin-bottom: 2px;height:25px"/>
                    </td>
                </tr>
            </table>
        <?php } ?>

        <?php //$j++; ?>
    <?php } ?>
<div id="message1" style="margin-left:400px; margin-top:10px;"></div>
    <?php
 
    $inputType = 'submit';
    $inputIdButton = 'same_product';
    $inputNameButton = 'same_product';
// $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
// $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
// This is the main class for input flied
    $inputFieldClass = 'btn btn-warning';
    $inputStyle = 'height:25px;width:150px;font-weight:bold;font-size:14px;padding-top:0px;position: absolute;top: 650px;left: 600px;text-align:center;color:white;';
    $inputLabel = 'SUBMIT'; // Display Label below the text box
//
// This class is for Pencil Icon                                                           
    $inputIconClass = 'fa fa-inr';
// 
// Place Holder inside input box
    $inputPlaceHolder = 'NEXT';
//
// Place Holder in span outside input box
    $spanPlaceHolderClass = '';
    $spanPlaceHolder = '';

    $inputOnChange = "";
    $inputOnClickFun = '';
    $inputKeyUpFun = '';
    $inputDropDownCls = '';               // This is the main division class for drop down 
    $inputselDropDownCls = '';            // This is class for selection in drop down
    $inputMainClassButton = '';           // This is the main division for Button
// 
//* **************************************************************************************
//* End Input Area 
//* **************************************************************************************
    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
//
    ?>
</form>
<?php
//header("Location: $documentRoot/ogHomePage.php?divPanel=" . 'OwnerHome' . "&divMainMiddlePanel=" . 'Stock' . "&subDivName=" . 'importStockMapping' . "&displayMessageDiv=" . 'DataImportedSuccessfully' . "&barcodePrintPanel=" . 'YES');

if (isset($_GET["message1"]) && $_GET["message1"] == "success") {
  echo "<script>document.getElementById('message1').innerHTML = 'Form submitted successfully!';</script>";
}

