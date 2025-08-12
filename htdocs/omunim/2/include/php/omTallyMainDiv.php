<?php /**
 * 
 *Created on April 11, 2020 
 *
 * 
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 ** ======================================================================================
 *  THIS CODE IS BUILD FOR ALLOCATING PARENTS TO USERS FROM ACCOUNT DB 
 *  ======================================================================================
 */
?>
<?php

include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
//
$strTallyXMLMaster = '<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>All Masters</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>SoftwareGen Services</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>';
//
$qSelAllMaster = "SELECT * FROM accounts";
$resAllMaster = mysqli_query($conn, $qSelAllMaster) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllMaster);

while ($rowAllMaster = mysqli_fetch_array($resAllMaster, MYSQLI_ASSOC)) {
    $strTallyXMLMaster .= "\n".'<TALLYMESSAGE xmlns:UDF="TallyUDF">
     <GROUP NAME="' . $rowAllMaster['acc_user_acc'] . '" RESERVEDNAME="' . $rowAllMaster['acc_main_acc'] . '">
      <GUID/>
      <PARENT>"' . $rowAllMaster['acc_pri_grp'] . '"</PARENT>
      <GRPDEBITPARENT/>
      <GRPCREDITPARENT/>
      <ISBILLWISEON>No</ISBILLWISEON>
      <ISCOSTCENTRESON>No</ISCOSTCENTRESON>
      <ISADDABLE>No</ISADDABLE>
      <ISUPDATINGTARGETID>No</ISUPDATINGTARGETID>
      <ASORIGINAL>Yes</ASORIGINAL>
      <ISSUBLEDGER>No</ISSUBLEDGER>
      <ISREVENUE>No</ISREVENUE>
      <AFFECTSGROSSPROFIT>No</AFFECTSGROSSPROFIT>
      <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
      <TRACKNEGATIVEBALANCES>No</TRACKNEGATIVEBALANCES>
      <ISCONDENSED>No</ISCONDENSED>
      <AFFECTSSTOCK>No</AFFECTSSTOCK>
      <ISGROUPFORLOANRCPT>No</ISGROUPFORLOANRCPT>
      <ISGROUPFORLOANPYMNT>No</ISGROUPFORLOANPYMNT>
      <ISRATEINCLUSIVEVAT>No</ISRATEINCLUSIVEVAT>
      <ISINVDETAILSENABLE>No</ISINVDETAILSENABLE>
      <SORTPOSITION> 70</SORTPOSITION>
      <ALTERID> 8</ALTERID>
      <SERVICETAXDETAILS.LIST>      </SERVICETAXDETAILS.LIST>
      <VATDETAILS.LIST>      </VATDETAILS.LIST>
      <SALESTAXCESSDETAILS.LIST>      </SALESTAXCESSDETAILS.LIST>
      <GSTDETAILS.LIST>      </GSTDETAILS.LIST>
      <LANGUAGENAME.LIST>
       <NAME.LIST TYPE="String">
        <NAME>' . $rowAllMaster['acc_user_acc'] . '</NAME>
       </NAME.LIST>
       <LANGUAGEID> 1033</LANGUAGEID>
      </LANGUAGENAME.LIST>
      <XBRLDETAIL.LIST>      </XBRLDETAIL.LIST>
      <AUDITDETAILS.LIST>      </AUDITDETAILS.LIST>
      <SCHVIDETAILS.LIST>      </SCHVIDETAILS.LIST>
      <EXCISETARIFFDETAILS.LIST>      </EXCISETARIFFDETAILS.LIST>
      <TCSCATEGORYDETAILS.LIST>      </TCSCATEGORYDETAILS.LIST>
      <TDSCATEGORYDETAILS.LIST>      </TDSCATEGORYDETAILS.LIST>
      <GSTCLASSFNIGSTRATES.LIST>      </GSTCLASSFNIGSTRATES.LIST>
      <EXTARIFFDUTYHEADDETAILS.LIST>      </EXTARIFFDUTYHEADDETAILS.LIST>
     </GROUP>
    </TALLYMESSAGE>';
}
//
//
$strTallyXMLMaster .='</REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>';
//
//
$readWritefile = fopen("Master.xml", "w");
fwrite($readWritefile, "\n" . $strTallyXMLMaster);
fclose($readWritefile);
//
?>