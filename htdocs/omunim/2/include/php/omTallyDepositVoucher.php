<?php

/*
 * **************************************************************************************
 * @tutorial: TAllY MIGRATION FILE
 * **************************************************************************************
 * 
 * Created on 27 SEP 2022 11:24:00 pm
 *
 * @FileName: omTallyDepositVoucher.php
 * @Author: RENUKA SHARMA
 * @AuthorEmailId:  renukas@omunim.com
 * @version 1.0.0
 * @Copyright (c) 2022 www.omunim.com
 * @All rights reserved
 */
?>
<?php
//
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$firmid=$_SESSION['setFirmSession'];
$queryfirminfo = "select * from firm where firm_id='$firmid'";
$resAllfirminfo = mysqli_query($conn, $queryfirminfo) or die(mysqli_error($conn));
$i = 1;
while ($rowfirminfo = mysqli_fetch_array($resAllfirminfo, MYSQLI_ASSOC)) {
    $firm_id = $rowfirminfo['firm_id'];
    $firm_name = $rowfirminfo['firm_name'];
    $firm_Lname = $rowfirminfo['firm_long_nmae'];
    $firm_city = $rowfirminfo['firm_city'];
    $firm_address = $rowfirminfo['firm_address'];
    $firm_phone = $rowfirminfo['firm_phone_details'];
    $firm_email = $rowfirminfo['firm_email'];
     $firm_gst = $rowfirminfo['firm_tin_no'];
    
    if ($sellerCity != '' || $sellerCity != null) {
    $qSelCityPinCode = "SELECT city_pincode FROM city WHERE city_name = '$firm_city' ";
    $resSelCityPicCode = mysqli_query($conn, $qSelCityPinCode) or die(mysqli_error($conn));
    $rowSelCityPicCode = mysqli_fetch_array($resSelCityPicCode);
    $firmPinCode = $rowSelCityPicCode['city_pincode'];
} else {
    $qSelCityPinCode = "SELECT city_name,city_pincode FROM city WHERE city_selected = 'selected' ";
    $resSelCityPicCode = mysqli_query($conn, $qSelCityPinCode) or die(mysqli_error($conn));
    $rowSelCityPicCode = mysqli_fetch_array($resSelCityPicCode);
    $firmPinCode = $rowSelCityPicCode['city_pincode'];
    $firmCity = $rowSelCityPicCode['city_name'];
}
    $depositVoucher = '
<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>All Masters</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>'.$firm_name.'</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>';
    //
    $readWritefile = fopen("deposit.xml", "w");
    fwrite($readWritefile, "\n" . $depositVoucher);
    fclose($readWritefile);
    //
    $queryAllDepositVoucher = "select * from girvi_money_deposit where girv_mondep_firm_id='$firm_id'";
    $resAllDepositVoucher = mysqli_query($conn, $queryAllDepositVoucher) or die(mysqli_error($conn));
    $i = 1;
    while ($rowAllDepositVoucher = mysqli_fetch_array($resAllDepositVoucher, MYSQLI_ASSOC)) {
        $custId = $rowAllDepositVoucher['girv_mondep_cust_id'];
        $deposit_amt=$rowAllDepositVoucher['girv_mondep_prin_amt'];
        $qSelCustomerDetails = "SELECT * FROM user WHERE user_id = '$custId'";
        $resCustomerDetails = mysqli_query($conn, $qSelCustomerDetails) or die(mysqli_error($conn));
        $rowCustomerDetails = mysqli_fetch_array($resCustomerDetails);
       // $custFname = $rowCustomerDetails['user_fname'];
        $custLname = $rowCustomerDetails['user_lname'];
        $custAddress = $rowCustomerDetails['user_add'];
        if ($custAddress == '') {
            $custAddress = $rowCustomerDetails['user_state'];
        }
        $custCity = $rowCustomerDetails['user_city'];
        $custPinCode = $rowCustomerDetails['user_pincode'];
        $custState = $rowCustomerDetails['user_state'];
        $custGST = $rowCustomerDetails['user_cst_no'];
        $user = $rowCustomerDetails['user_fname'];
        $user = preg_replace('/[^A-Za-z0-9\-]/', ' ', $user);
        //
        $voucherid = $rowAllDepositVoucher['girv_mondep_id'].$custId;
        $date= $rowAllDepositVoucher['girv_mondep_date'];
        $tallydate = strtotime($date); //--> which results to 1332866820
        $tallydate = date('Ymd', $tallydate);
        
           $loan_type= $rowAllDepositVoucher['girv_type'];
        $depositVoucher = ' <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <LEDGER NAME="' . $user . '" RESERVEDNAME="' . $rowCustomerDetails['user_id'] .'" ACTION="Create">
      <MAILINGNAME.LIST TYPE="String">
       <MAILINGNAME>' . $user . '</MAILINGNAME>
      </MAILINGNAME.LIST>
      <COUNTRYNAME>India</COUNTRYNAME>
         <PARENT>Loans &amp; Advances (Asset)</PARENT>
      <TAXCLASSIFICATIONNAME/>
      <TAXTYPE>Others</TAXTYPE>
      <COUNTRYOFRESIDENCE>India</COUNTRYOFRESIDENCE>
           <LEDSTATENAME>' . $rowCustomerDetails['user_state'] . '</LEDSTATENAME>
      <LANGUAGENAME.LIST>
       <NAME.LIST TYPE="String">
        <NAME>' . $user . '</NAME>
       </NAME.LIST>
       <LANGUAGEID> 1033</LANGUAGEID>
      </LANGUAGENAME.LIST>
     </LEDGER>
    </TALLYMESSAGE><TALLYMESSAGE xmlns:UDF="TallyUDF">
     <VOUCHER REMOTEID="'.$voucherid.'" VCHKEY="05d8befe-9858-4fca-b396-34d40a16e3d3-0000af05:00000020" VCHTYPE="Receipt" ACTION="Create" OBJVIEW="Accounting Voucher View">
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>'.$tallydate.'</DATE>
      <GUID>'.$voucherid.'</GUID>
      <VOUCHERTYPENAME>Receipt</VOUCHERTYPENAME>
      <PARTYLEDGERNAME>'.$user.'</PARTYLEDGERNAME>
      <PARENT>Loans &amp; Advances (Asset)</PARENT>
      <VOUCHERNUMBER>'.$i.'</VOUCHERNUMBER>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <PERSISTEDVIEW>Accounting Voucher View</PERSISTEDVIEW>
      <DIFFACTUALQTY>No</DIFFACTUALQTY>
      <ISMSTFROMSYNC>No</ISMSTFROMSYNC>
      <ISDELETED>No</ISDELETED>
      <ISSECURITYONWHENENTERED>No</ISSECURITYONWHENENTERED>
      <ASORIGINAL>No</ASORIGINAL>
      <AUDITED>No</AUDITED>
      <FORJOBCOSTING>No</FORJOBCOSTING>
      <ISOPTIONAL>No</ISOPTIONAL>
      <EFFECTIVEDATE>'.$tallydate.'</EFFECTIVEDATE>
      <USEFOREXCISE>No</USEFOREXCISE>
      <ISFORJOBWORKIN>No</ISFORJOBWORKIN>
      <ALLOWCONSUMPTION>No</ALLOWCONSUMPTION>
      <USEFORINTEREST>No</USEFORINTEREST>
      <USEFORGAINLOSS>No</USEFORGAINLOSS>
      <USEFORGODOWNTRANSFER>No</USEFORGODOWNTRANSFER>
      <USEFORCOMPOUND>No</USEFORCOMPOUND>
      <USEFORSERVICETAX>No</USEFORSERVICETAX>
      <ISONHOLD>No</ISONHOLD>
      <ISBOENOTAPPLICABLE>No</ISBOENOTAPPLICABLE>
      <ISGSTSECSEVENAPPLICABLE>No</ISGSTSECSEVENAPPLICABLE>
      <ISEXCISEVOUCHER>No</ISEXCISEVOUCHER>
      <EXCISETAXOVERRIDE>No</EXCISETAXOVERRIDE>
      <USEFORTAXUNITTRANSFER>No</USEFORTAXUNITTRANSFER>
      <IGNOREPOSVALIDATION>No</IGNOREPOSVALIDATION>
      <EXCISEOPENING>No</EXCISEOPENING>
      <USEFORFINALPRODUCTION>No</USEFORFINALPRODUCTION>
      <ISTDSOVERRIDDEN>No</ISTDSOVERRIDDEN>
      <ISTCSOVERRIDDEN>No</ISTCSOVERRIDDEN>
      <ISTDSTCSCASHVCH>No</ISTDSTCSCASHVCH>
      <INCLUDEADVPYMTVCH>No</INCLUDEADVPYMTVCH>
      <ISSUBWORKSCONTRACT>No</ISSUBWORKSCONTRACT>
      <ISVATOVERRIDDEN>No</ISVATOVERRIDDEN>
      <IGNOREORIGVCHDATE>No</IGNOREORIGVCHDATE>
      <ISVATPAIDATCUSTOMS>No</ISVATPAIDATCUSTOMS>
      <ISDECLAREDTOCUSTOMS>No</ISDECLAREDTOCUSTOMS>
      <ISSERVICETAXOVERRIDDEN>No</ISSERVICETAXOVERRIDDEN>
      <ISISDVOUCHER>No</ISISDVOUCHER>
      <ISEXCISEOVERRIDDEN>No</ISEXCISEOVERRIDDEN>
      <ISEXCISESUPPLYVCH>No</ISEXCISESUPPLYVCH>
      <ISGSTOVERRIDDEN>No</ISGSTOVERRIDDEN>
      <GSTNOTEXPORTED>No</GSTNOTEXPORTED>
      <IGNOREGSTINVALIDATION>No</IGNOREGSTINVALIDATION>
      <ISGSTREFUND>No</ISGSTREFUND>
      <OVRDNEWAYBILLAPPLICABILITY>No</OVRDNEWAYBILLAPPLICABILITY>
      <ISVATPRINCIPALACCOUNT>No</ISVATPRINCIPALACCOUNT>
      <IGNOREEINVVALIDATION>No</IGNOREEINVVALIDATION>
      <IRNJSONEXPORTED>No</IRNJSONEXPORTED>
      <IRNCANCELLED>No</IRNCANCELLED>
      <ISSHIPPINGWITHINSTATE>No</ISSHIPPINGWITHINSTATE>
      <ISOVERSEASTOURISTTRANS>No</ISOVERSEASTOURISTTRANS>
      <ISDESIGNATEDZONEPARTY>No</ISDESIGNATEDZONEPARTY>
      <ISCANCELLED>No</ISCANCELLED>
      <HASCASHFLOW>Yes</HASCASHFLOW>
      <ISPOSTDATED>No</ISPOSTDATED>
      <USETRACKINGNUMBER>No</USETRACKINGNUMBER>
      <ISINVOICE>No</ISINVOICE>
      <MFGJOURNAL>No</MFGJOURNAL>
      <HASDISCOUNTS>No</HASDISCOUNTS>
      <ASPAYSLIP>No</ASPAYSLIP>
      <ISCOSTCENTRE>No</ISCOSTCENTRE>
      <ISSTXNONREALIZEDVCH>No</ISSTXNONREALIZEDVCH>
      <ISEXCISEMANUFACTURERON>No</ISEXCISEMANUFACTURERON>
      <ISBLANKCHEQUE>No</ISBLANKCHEQUE>
      <ISVOID>No</ISVOID>
      <ORDERLINESTATUS>No</ORDERLINESTATUS>
      <VATISAGNSTCANCSALES>No</VATISAGNSTCANCSALES>
      <VATISPURCEXEMPTED>No</VATISPURCEXEMPTED>
      <ISVATRESTAXINVOICE>No</ISVATRESTAXINVOICE>
      <VATISASSESABLECALCVCH>No</VATISASSESABLECALCVCH>
      <ISVATDUTYPAID>Yes</ISVATDUTYPAID>
      <ISDELIVERYSAMEASCONSIGNEE>No</ISDELIVERYSAMEASCONSIGNEE>
      <ISDISPATCHSAMEASCONSIGNOR>No</ISDISPATCHSAMEASCONSIGNOR>
      <ISDELETEDVCHRETAINED>No</ISDELETEDVCHRETAINED>
      <CHANGEVCHMODE>No</CHANGEVCHMODE>
      <RESETIRNQRCODE>No</RESETIRNQRCODE>
      <VOUCHERKEY>'.$voucherid.'</VOUCHERKEY>
      <EWAYBILLDETAILS.LIST>      </EWAYBILLDETAILS.LIST>
      <EXCLUDEDTAXATIONS.LIST>      </EXCLUDEDTAXATIONS.LIST>
      <OLDAUDITENTRIES.LIST>      </OLDAUDITENTRIES.LIST>
      <ACCOUNTAUDITENTRIES.LIST>      </ACCOUNTAUDITENTRIES.LIST>
      <AUDITENTRIES.LIST>      </AUDITENTRIES.LIST>
      <DUTYHEADDETAILS.LIST>      </DUTYHEADDETAILS.LIST>
      <SUPPLEMENTARYDUTYHEADDETAILS.LIST>      </SUPPLEMENTARYDUTYHEADDETAILS.LIST>
      <EWAYBILLERRORLIST.LIST>      </EWAYBILLERRORLIST.LIST>
      <IRNERRORLIST.LIST>      </IRNERRORLIST.LIST>
      <INVOICEDELNOTES.LIST>      </INVOICEDELNOTES.LIST>
      <INVOICEORDERLIST.LIST>      </INVOICEORDERLIST.LIST>
      <INVOICEINDENTLIST.LIST>      </INVOICEINDENTLIST.LIST>
      <ATTENDANCEENTRIES.LIST>      </ATTENDANCEENTRIES.LIST>
      <ORIGINVOICEDETAILS.LIST>      </ORIGINVOICEDETAILS.LIST>
      <INVOICEEXPORTLIST.LIST>      </INVOICEEXPORTLIST.LIST>
      <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>'.$user.'</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>'.$deposit_amt.'</AMOUNT>
       <SERVICETAXDETAILS.LIST>       </SERVICETAXDETAILS.LIST>
       <BANKALLOCATIONS.LIST>       </BANKALLOCATIONS.LIST>
       <BILLALLOCATIONS.LIST>       </BILLALLOCATIONS.LIST>
       <INTERESTCOLLECTION.LIST>       </INTERESTCOLLECTION.LIST>
       <OLDAUDITENTRIES.LIST>       </OLDAUDITENTRIES.LIST>
       <ACCOUNTAUDITENTRIES.LIST>       </ACCOUNTAUDITENTRIES.LIST>
       <AUDITENTRIES.LIST>       </AUDITENTRIES.LIST>
       <INPUTCRALLOCS.LIST>       </INPUTCRALLOCS.LIST>
       <DUTYHEADDETAILS.LIST>       </DUTYHEADDETAILS.LIST>
       <EXCISEDUTYHEADDETAILS.LIST>       </EXCISEDUTYHEADDETAILS.LIST>
       <RATEDETAILS.LIST>       </RATEDETAILS.LIST>
       <SUMMARYALLOCS.LIST>       </SUMMARYALLOCS.LIST>
       <STPYMTDETAILS.LIST>       </STPYMTDETAILS.LIST>
       <EXCISEPAYMENTALLOCATIONS.LIST>       </EXCISEPAYMENTALLOCATIONS.LIST>
       <TAXBILLALLOCATIONS.LIST>       </TAXBILLALLOCATIONS.LIST>
       <TAXOBJECTALLOCATIONS.LIST>       </TAXOBJECTALLOCATIONS.LIST>
       <TDSEXPENSEALLOCATIONS.LIST>       </TDSEXPENSEALLOCATIONS.LIST>
       <VATSTATUTORYDETAILS.LIST>       </VATSTATUTORYDETAILS.LIST>
       <COSTTRACKALLOCATIONS.LIST>       </COSTTRACKALLOCATIONS.LIST>
       <REFVOUCHERDETAILS.LIST>       </REFVOUCHERDETAILS.LIST>
       <INVOICEWISEDETAILS.LIST>       </INVOICEWISEDETAILS.LIST>
       <VATITCDETAILS.LIST>       </VATITCDETAILS.LIST>
       <ADVANCETAXDETAILS.LIST>       </ADVANCETAXDETAILS.LIST>
      </ALLLEDGERENTRIES.LIST>
      <ALLLEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>Cash</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-'.$deposit_amt.'</AMOUNT>
       <SERVICETAXDETAILS.LIST>       </SERVICETAXDETAILS.LIST>
       <BANKALLOCATIONS.LIST>       </BANKALLOCATIONS.LIST>
       <BILLALLOCATIONS.LIST>       </BILLALLOCATIONS.LIST>
       <INTERESTCOLLECTION.LIST>       </INTERESTCOLLECTION.LIST>
       <OLDAUDITENTRIES.LIST>       </OLDAUDITENTRIES.LIST>
       <ACCOUNTAUDITENTRIES.LIST>       </ACCOUNTAUDITENTRIES.LIST>
       <AUDITENTRIES.LIST>       </AUDITENTRIES.LIST>
       <INPUTCRALLOCS.LIST>       </INPUTCRALLOCS.LIST>
       <DUTYHEADDETAILS.LIST>       </DUTYHEADDETAILS.LIST>
       <EXCISEDUTYHEADDETAILS.LIST>       </EXCISEDUTYHEADDETAILS.LIST>
       <RATEDETAILS.LIST>       </RATEDETAILS.LIST>
       <SUMMARYALLOCS.LIST>       </SUMMARYALLOCS.LIST>
       <STPYMTDETAILS.LIST>       </STPYMTDETAILS.LIST>
       <EXCISEPAYMENTALLOCATIONS.LIST>       </EXCISEPAYMENTALLOCATIONS.LIST>
       <TAXBILLALLOCATIONS.LIST>       </TAXBILLALLOCATIONS.LIST>
       <TAXOBJECTALLOCATIONS.LIST>       </TAXOBJECTALLOCATIONS.LIST>
       <TDSEXPENSEALLOCATIONS.LIST>       </TDSEXPENSEALLOCATIONS.LIST>
       <VATSTATUTORYDETAILS.LIST>       </VATSTATUTORYDETAILS.LIST>
       <COSTTRACKALLOCATIONS.LIST>       </COSTTRACKALLOCATIONS.LIST>
       <REFVOUCHERDETAILS.LIST>       </REFVOUCHERDETAILS.LIST>
       <INVOICEWISEDETAILS.LIST>       </INVOICEWISEDETAILS.LIST>
       <VATITCDETAILS.LIST>       </VATITCDETAILS.LIST>
       <ADVANCETAXDETAILS.LIST>       </ADVANCETAXDETAILS.LIST>
      </ALLLEDGERENTRIES.LIST>
      <PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
      <GSTEWAYCONSIGNORADDRESS.LIST>      </GSTEWAYCONSIGNORADDRESS.LIST>
      <GSTEWAYCONSIGNEEADDRESS.LIST>      </GSTEWAYCONSIGNEEADDRESS.LIST>
      <TEMPGSTRATEDETAILS.LIST>      </TEMPGSTRATEDETAILS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>';
        $readWritefile = fopen("deposit.xml", "a");
        fwrite($readWritefile, "\n" . $depositVoucher);
        fclose($readWritefile);
        $i++;
    }
    $endvar = '<TALLYMESSAGE xmlns:UDF="TallyUDF">
     <COMPANY>
      <REMOTECMPINFO.LIST MERGE="Yes">
       <NAME>'.$firm_name.'</NAME>
       <REMOTECMPNAME>'.$firm_name.'</REMOTECMPNAME>
       <REMOTECMPSTATE>Maharashtra</REMOTECMPSTATE>
      </REMOTECMPINFO.LIST>
     </COMPANY>
    </TALLYMESSAGE>
    </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>';
    $readWritefile = fopen("deposit.xml", "a");
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
//
//Read the size of the file
        readfile($filename);
//
//Terminate from the script
        die();
    } else {
        echo "File does not exist.";
    }
} else
    echo "Filename is not defined.";
?>