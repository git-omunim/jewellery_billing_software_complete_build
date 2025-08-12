<?php

/*
 * **************************************************************************************
 * @tutorial: TAllY MIGRATION FILE
 * **************************************************************************************
 * 
 * Created on 10 SEP 2022 04:24:39 pm
 *
 * @FileName: omTallyStockExport.php
 * @Author: RENUKA SHARMA
 * @AuthorEmailId:  renukas@omunim.com
 * @version 1.0.0
 * @Copyright (c) 2022 www.omunim.com
 * @All rights reserved
 *
 */
?>
<?php

include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$firmid = $_SESSION['setFirmSession'];
$queryfirminfo = "select * from firm where firm_id='$firmid'";
$resAllfirminfo = mysqli_query($conn, $queryfirminfo) or die(mysqli_error($conn));
while ($rowfirminfo = mysqli_fetch_array($resAllfirminfo, MYSQLI_ASSOC)) {
    $firm_id = $rowfirminfo['firm_id'];
    $firm_name = $rowfirminfo['firm_name'];
    $qSelAllStocks = "SELECT * FROM stock_transaction where sttr_firm_id='$firmid' ";
    $resAllStocks = mysqli_query($conn, $qSelAllStocks) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllStocks);
    $strTallyXMLStock = '
<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>All Masters</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>' . $firm_name . '</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>';
    $readWritefile = fopen("stock.xml", "w");
    fwrite($readWritefile, "\n" . $strTallyXMLStock);
    fclose($readWritefile);
    $strTallyXMLStock = '<TALLYMESSAGE xmlns:UDF="TallyUDF">
     <UNIT NAME="KG" RESERVEDNAME="KG">
      <NAME>KG</NAME>
      <ORIGINALNAME>KILOGRAM</ORIGINALNAME>
      <ISUPDATINGTARGETID>No</ISUPDATINGTARGETID>
      <ASORIGINAL>Yes</ASORIGINAL>
      <ISSIMPLEUNIT>Yes</ISSIMPLEUNIT>
      <ALTERID> </ALTERID>
     </UNIT>
    </TALLYMESSAGE>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <UNIT NAME="GM" RESERVEDNAME="GM">
      <NAME>GM</NAME>
      <ORIGINALNAME>GRAM</ORIGINALNAME>
      <ISUPDATINGTARGETID>No</ISUPDATINGTARGETID>
      <ASORIGINAL>Yes</ASORIGINAL>
      <ISSIMPLEUNIT>Yes</ISSIMPLEUNIT>
      <ALTERID> </ALTERID>
     </UNIT>
    </TALLYMESSAGE>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <UNIT NAME="MG" RESERVEDNAME="MG">
      <NAME>MG</NAME>
      <ORIGINALNAME>MILLIGRAM</ORIGINALNAME>
      <ISUPDATINGTARGETID>No</ISUPDATINGTARGETID>
      <ASORIGINAL>Yes</ASORIGINAL>
      <ISSIMPLEUNIT>Yes</ISSIMPLEUNIT>
      <ALTERID> </ALTERID>
     </UNIT>
    </TALLYMESSAGE>';
    $readWritefile = fopen("stock.xml", "a");
    fwrite($readWritefile, "\n" . $strTallyXMLStock);
    fclose($readWritefile);
    while ($rowAllStocks = mysqli_fetch_array($resAllStocks, MYSQLI_ASSOC)) {
        $stockName = $rowAllStocks['sttr_item_name'];
        $Stocknm = strlen($stockName);
        if (!$Stocknm) {
            $stockName = 'stock';
        } else {
            $stockName = $rowAllStocks['sttr_item_name'];
        } $stockName = preg_replace('/[^A-Za-z0-9\-]/', ' ', $stockName);
        $strTallyXMLStock = '<TALLYMESSAGE xmlns:UDF="TallyUDF">
     <STOCKITEM NAME="' . $stockName . '" RESERVEDNAME="' . $stockName . '">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <EXCISEAPPLICABILITY> Applicable</EXCISEAPPLICABILITY>
      <VATAPPLICABLE> Applicable</VATAPPLICABLE>
      <COSTINGMETHOD>Avg. Cost</COSTINGMETHOD>
      <VALUATIONMETHOD>Avg. Price</VALUATIONMETHOD>
      <BASEUNITS>' . $rowAllStocks['sttr_gs_weight_type'] . '</BASEUNITS>
      <EXCISEITEMCLASSIFICATION/>
      <ISCOSTCENTRESON>No</ISCOSTCENTRESON>
      <ISBATCHWISEON>No</ISBATCHWISEON>
      <ISPERISHABLEON>No</ISPERISHABLEON>
      <ISENTRYTAXAPPLICABLE>No</ISENTRYTAXAPPLICABLE>
      <ISCOSTTRACKINGON>Yes</ISCOSTTRACKINGON>
      <ISUPDATINGTARGETID>No</ISUPDATINGTARGETID>
      <ASORIGINAL>Yes</ASORIGINAL>
      <ISRATEINCLUSIVEVAT>No</ISRATEINCLUSIVEVAT>
      <IGNOREPHYSICALDIFFERENCE>No</IGNOREPHYSICALDIFFERENCE>
      <IGNORENEGATIVESTOCK>No</IGNORENEGATIVESTOCK>
      <TREATSALESASMANUFACTURED>No</TREATSALESASMANUFACTURED>
      <TREATPURCHASESASCONSUMED>No</TREATPURCHASESASCONSUMED>
      <TREATREJECTSASSCRAP>No</TREATREJECTSASSCRAP>
      <HASMFGDATE>No</HASMFGDATE>
      <ALLOWUSEOFEXPIREDITEMS>No</ALLOWUSEOFEXPIREDITEMS>
      <IGNOREBATCHES>No</IGNOREBATCHES>
      <IGNOREGODOWNS>No</IGNOREGODOWNS>
      <CALCONMRP>No</CALCONMRP>
      <EXCLUDEJRNLFORVALUATION>No</EXCLUDEJRNLFORVALUATION>
      <ISMRPINCLOFTAX>No</ISMRPINCLOFTAX>
      <ISADDLTAXEXEMPT>No</ISADDLTAXEXEMPT>
      <ISSUPPLEMENTRYDUTYON>No</ISSUPPLEMENTRYDUTYON>
      <REORDERASHIGHER>No</REORDERASHIGHER>
      <MINORDERASHIGHER>No</MINORDERASHIGHER>
      <ISEXCISECALCULATEONMRP>No</ISEXCISECALCULATEONMRP>
      <INCLUSIVETAX>No</INCLUSIVETAX>
      <ALTERID> 162</ALTERID>
      <DENOMINATOR> 1</DENOMINATOR>
      <RATEOFVAT>0</RATEOFVAT>
      <OPENINGBALANCE> ' . $rowAllStocks['sttr_gs_weight'] . ' ' . $rowAllStocks['sttr_gs_weight_type'] . '</OPENINGBALANCE>
        <OPENINGVALUE>' . $rowAllStocks['sttr_final_valuation'] . '</OPENINGVALUE>
      <OPENINGRATE>' . $rowAllStocks['sttr_metal_rate'] . '</OPENINGRATE>
      <SERVICETAXDETAILS.LIST>      </SERVICETAXDETAILS.LIST>
      <VATDETAILS.LIST>      </VATDETAILS.LIST>
      <LANGUAGENAME.LIST>
       <NAME.LIST TYPE="String">
        <NAME>' . $stockName . '</NAME>
       </NAME.LIST>
       <LANGUAGEID> 1033</LANGUAGEID>
      </LANGUAGENAME.LIST>
      <SCHVIDETAILS.LIST>      </SCHVIDETAILS.LIST>
      <EXCISETARIFFDETAILS.LIST>      </EXCISETARIFFDETAILS.LIST>
      <TCSCATEGORYDETAILS.LIST>      </TCSCATEGORYDETAILS.LIST>
      <TDSCATEGORYDETAILS.LIST>      </TDSCATEGORYDETAILS.LIST>
      <EXCLUDEDTAXATIONS.LIST>      </EXCLUDEDTAXATIONS.LIST>
      <OLDAUDITENTRIES.LIST>      </OLDAUDITENTRIES.LIST>
      <ACCOUNTAUDITENTRIES.LIST>      </ACCOUNTAUDITENTRIES.LIST>
      <AUDITENTRIES.LIST>      </AUDITENTRIES.LIST>
      <MRPDETAILS.LIST>      </MRPDETAILS.LIST>
      <VATCLASSIFICATIONDETAILS.LIST>      </VATCLASSIFICATIONDETAILS.LIST>
      <COMPONENTLIST.LIST>      </COMPONENTLIST.LIST>
      <ADDITIONALLEDGERS.LIST>      </ADDITIONALLEDGERS.LIST>
      <SALESLIST.LIST>      </SALESLIST.LIST>
      <PURCHASELIST.LIST>      </PURCHASELIST.LIST>
      <FULLPRICELIST.LIST>      </FULLPRICELIST.LIST>
      <BATCHALLOCATIONS.LIST>
       <GODOWNNAME>Main Location</GODOWNNAME>
       <BATCHNAME>Primary Batch</BATCHNAME>
         <OPENINGBALANCE> ' . $rowAllStocks['sttr_gs_weight'] . ' ' . $rowAllStocks['sttr_gs_weight_type'] . '</OPENINGBALANCE>
        <OPENINGVALUE>' . $rowAllStocks['sttr_final_valuation'] . '</OPENINGVALUE>
      <OPENINGRATE>' . $rowAllStocks['sttr_metal_rate'] . '</OPENINGRATE>
      </BATCHALLOCATIONS.LIST>
      <TRADEREXCISEDUTIES.LIST>      </TRADEREXCISEDUTIES.LIST>
      <STANDARDCOSTLIST.LIST>      </STANDARDCOSTLIST.LIST>
      <STANDARDPRICELIST.LIST>      </STANDARDPRICELIST.LIST>
      <EXCISEITEMGODOWN.LIST>      </EXCISEITEMGODOWN.LIST>
      <MULTICOMPONENTLIST.LIST>      </MULTICOMPONENTLIST.LIST>
      <LBTDETAILS.LIST>      </LBTDETAILS.LIST>
      <PRICELEVELLIST.LIST>      </PRICELEVELLIST.LIST>
      <EXTARIFFDUTYHEADDETAILS.LIST>      </EXTARIFFDUTYHEADDETAILS.LIST>
     </STOCKITEM>
    </TALLYMESSAGE>';
        $readWritefile = fopen("stock.xml", "a");
        fwrite($readWritefile, "\n" . $strTallyXMLStock);
        fclose($readWritefile);
    }
    $endvar = '</REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>';
    $readWritefile = fopen("stock.xml", "a");
    fwrite($readWritefile, "\n" . $endvar);
    fclose($readWritefile);
}
?>
<?php

if (isset($_GET['path'])) {
//Read the filename
    $filename = $_GET['path'];
//Check the file exists or not
    if (file_exists($filename)) {

//Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Content-Length: ' . filesize($filename));
        header('Pragma: public');

//Clear system output buffer
        flush();

//Read the size of the file
        readfile($filename);

//Terminate from the script
        die();
    } else {
        echo "File does not exist.";
    }
} else
    echo "Filename is not defined.";
?>