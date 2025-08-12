<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 7 JULY, 2022 8:06:38 PM
 *
 * @FileName: omXrfPrnPrint.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:SIMRAN07JULY2022
 *  REASON:
 *
 */
?>
<?php

// Mandatory Files
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
?>
<?php
class XRFPrinter {
    public $host;
    public $storeLabel = array();
    private $label;
    private $prnFileTemplate;
    private $prnFile;
    public $darkness;
    public $speed;
    public $configSizeLabel;
    public $referencePoint;

    //echo 
    function __construct($hostPrinter, $speedPrinter, $darknessPrint, $configSizeLabel, $referencePoint, $mysqlDBPath, $barcodePrinterType, $xrfPrnPrint) {

        $this->host = $hostPrinter;
        $this->speed = $speedPrinter;
        $this->darkness = $darknessPrint;
        $this->configSizeLabel = $configSizeLabel;
        $this->referencePoint = $referencePoint;
        //
        //echo '$mysqlDBPath:' . $mysqlDBPath . '<br>';
        $mysqlDBPath .= "barcode\\" . $barcodePrinterType . "\\";
        //echo '$mysqlDBPath:' . $mysqlDBPath . '<br>';
        //
        if ($xrfPrnPrint == 'true') {
            //echo $mysqlDBPath;
            $this->prnFileTemplate = $mysqlDBPath . "xrf.prn";
        }
//        //
        $this->prnFile = $mysqlDBPath . "xrf_print" . ".prn"; // . rand()
        $this->initLabel();
//        //
    }

    public function initLabel() {
        $hl = $this->configSizeLabel;
        $ref = $this->referencePoint;
        $initLabel = "I8,A,001\n\n"; #CHARSET -> CHECK THE MANUAL REFERENCE
        $initLabel .= "Q$hl[0],$hl[1]\n";
        $initLabel .= "q831\n"; #printable width area
        $initLabel .= "rN\n";
        $initLabel .= "S" . $this->speed . "\n"; #SET THE PRINTING SPEED
        $initLabel .= "D" . $this->darkness . "\n"; #SET DARKNESS PRINTING
        $initLabel .= "ZT\n"; #START PRINT ON TOP OR THE BOTTOM OF THE LABEL
        $initLabel .= "JF\n";
        $initLabel .= "O\n"; #HARDWARE OPTION, CHECK THE DOCUMENTATION
        $initLabel .= "R$ref[0],$ref[1]\n"; #Use this command to move the reference point for the X and Y axes	
        $initLabel .= "f100\n"; #CUT POSITION
        $initLabel .= "N\n"; # CLEAR PREVIOUS IMAGE BUFFER FROM PRINTER.		
        array_push($this->storeLabel, $initLabel);
    }

    public function writeLabel($l, $x, $y, $f) {
        $label = sprintf("A%s,%s,2,%s,1,1,N,'%s'\n", $x, $y, $f, $l);
        $label = str_replace("'", '"', $label);
        array_push($this->storeLabel, $label);
    }

    public function setBarcode($code, $x, $y, $content) {
        $barCode = sprintf("B%s,%s,2,%s,2,6,18,N,'%s'\n", $x, $y, $code, $content);
        $barCode = str_replace("'", '"', $barCode);
        array_push($this->storeLabel, $barCode);
    }

    private function generatePrn() {
        $this->generateLabel();
        $prn = fopen($this->prnFile, "w");
        fwrite($prn, $this->label);
        fclose($prn);
    }

    public function readWritePrn($OPTION1, $OPTION2, $OPTION3, $OPTION4, $OPTION5, $OPTION6, $OPTION7, $OPTION8, $OPTION9, $OPTION10, $OPTION11, $OPTION12, $OPTION13, $barcodePrinterType, $xrfPrnPrint) {

        $prn = fopen($this->prnFileTemplate, "r+");
        $prnStr = fread($prn, filesize($this->prnFileTemplate));
        $prnStr = str_replace("OPTION1", $OPTION1, $prnStr);
        $prnStr = str_replace("OPTION2", $OPTION2, $prnStr);
        $prnStr = str_replace("OPTION3", $OPTION3, $prnStr);
        $prnStr = str_replace("OPTION4", $OPTION4, $prnStr);
        $prnStr = str_replace("OPTION5", $OPTION5, $prnStr);
        $prnStr = str_replace("OPTION6", $OPTION6, $prnStr);
        $prnStr = str_replace("OPTION7", $OPTION7, $prnStr);
        $prnStr = str_replace("OPTION8", $OPTION8, $prnStr);
        $prnStr = str_replace("OPTION9", $OPTION9, $prnStr);
        $prnStr = str_replace("OPTIONA", $OPTION10, $prnStr);
        $prnStr = str_replace("OPTIONB", $OPTION11, $prnStr);
        $prnStr = str_replace("OPTIONC", $OPTION12, $prnStr);
        $prnStr = str_replace("OPTIOND", $OPTION13, $prnStr);
        
        if ($barcodePrinterType == 'CITIZEN') {
            // For Citizen
            if ($allQtyPrintOption == 'YES') {
                $bcItemQty = str_pad($bcItemQty, 4, "0", STR_PAD_LEFT);
                $prnStr = str_replace("Q0001", "Q" . $bcItemQty, $prnStr);
            } else {
                $prnStr = str_replace("Q0001", "Q" . "0001", $prnStr);
            }
        } else {
            // For Others
            if ($allQtyPrintOption == 'YES') {
                $prnStr = str_replace("P1", "P" . $bcItemQty, $prnStr); // IF ALL QTY 
            } else {
                $prnStr = str_replace("P1", "P" . "1", $prnStr);
            }
        }
        
        $readWritefile = fopen("ompprdwr.php", "a");
        fwrite($readWritefile, "\n prnStr:" . $prnStr);
        fclose($readWritefile);

        fclose($prn);
        $prn = fopen($this->prnFile, "w+");
        fwrite($prn, $prnStr);
        fclose($prn);
    }

    public function setLabelCopies($numCopies) {
        $label = "P$numCopies\n";
        array_push($this->storeLabel, $label);
    }

    private function generateLabel() {
        $this->label = join("", $this->storeLabel);
    }

    public function directPRNPrint() {
        //
        $host = str_replace("\\", "\\\\", $this->host);
        //
        shell_exec("copy " . $this->prnFile . " /B " . $host . "");
        unlink($this->prnFile);
    }

}

//
$hostPrintQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'hostPrinter'";
$hostPrintResultQuery = mysqli_query($conn, $hostPrintQuery);
$hostPrintRow = mysqli_fetch_array($hostPrintResultQuery);
$hostPrinter = $hostPrintRow['omly_value'];
//
//
//***************************************************************************************** // 
// START CODE TO ADD OPTION FOR PRINTER TYPE FOR BARCODE PRINTER @AUTHOR:MADHUREE-10SEP2020 //
//***************************************************************************************** // 
$selSetBarcodePrinter = "SELECT omly_value FROM omlayout WHERE omly_option = 'setBarcodePrinter'";
$resSetBarcodePrinter = mysqli_query($conn, $selSetBarcodePrinter);
$rowSetBarcodePrinter = mysqli_fetch_array($resSetBarcodePrinter);
$barcodePrinterType = $rowSetBarcodePrinter['omly_value'];
//*************************************************************************************** // 
// END CODE TO ADD OPTION FOR PRINTER TYPE FOR BARCODE PRINTER @AUTHOR:MADHUREE-10SEP2020 //
//*************************************************************************************** // 
//
//*************************************************************************************************************
// START CODE FOR XRF PRN PRINT OPTION @AUTHOR SIMRAN-29JUNE2022
// *************************************************************************************************************
$xrfPrnPrintquery = "SELECT omly_value FROM omlayout WHERE omly_option = 'xrfPrnPrint'";
$xrfPrnPrintResQuery = mysqli_query($conn, $xrfPrnPrintquery);
$xrfPrnPrintrowEntries = mysqli_fetch_array($xrfPrnPrintResQuery);
$xrfPrnPrint = $xrfPrnPrintrowEntries['omly_value'];

//**********************************************************
//
// *************************************************************************************************************
// END CODE FOR XRF PRN PRINT OPTION @AUTHOR SIMRAN-29JUNE2022
// *************************************************************************************************************

$x = new XRFPrinter($hostPrinter, $speedPrinter, $darknessPrint, $labelSize, $referencePoint, $mysqlDBPath, $barcodePrinterType, $xrfPrnPrint);
//
$speedPrinter = 4;
$darknessPrint = 15;
$prnPrintOption = $_REQUEST['printOption'];

$OPTION1 = $_REQUEST['xrf_pre_bill_no'];
$OPTION2 = $_REQUEST['xrf_bill_no'];
$OPTION3 = $_REQUEST['bill_date'];
$OPTION4 = $_REQUEST['userName'];
$OPTION5 = $_REQUEST['xrf_prod_name'];
$OPTION6 = $_REQUEST['xrf_prod_gs_weight'];
$OPTION7 = $_REQUEST['xrf_purity'];
$OPTION8 = $_REQUEST['xrf_karat'];
$OPTION9 = $_REQUEST['firm_long_name'];
$OPTION10 = $_REQUEST['firm_address'];
$OPTION11 = $_REQUEST['user_mobile'];
$OPTION12 = $_REQUEST['bill_time'];
$OPTION13 = $_REQUEST['xrf_avg_purity'];

//
if ($prnPrintOption == 'directXRFPrnPrint') {
    //
    $x->readWritePrn($OPTION1, $OPTION2, $OPTION3, $OPTION4, $OPTION5, $OPTION6, $OPTION7, $OPTION8, $OPTION9, $OPTION10, $OPTION11, $OPTION12 ,$OPTION13, $barcodePrinterType, $xrfPrnPrint);
    $x->directPRNPrint();
    //
}
?>