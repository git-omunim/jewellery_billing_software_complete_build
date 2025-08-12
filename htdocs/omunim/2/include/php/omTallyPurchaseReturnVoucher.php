<?php

/*
 * **************************************************************************************
 * @tutorial: TAllY MIGRATION FILE
 * **************************************************************************************
 * 
 * Created on 12 OCT 2022 03:01:pm
 *
 * @FileName: omTallyPurchaseReturnVoucher.php
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
    $purchaseVoucher = '
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
    $readWritefile = fopen("purchaseReturn.xml", "w");
    fwrite($readWritefile, "\n" . $purchaseVoucher);
    fclose($readWritefile);
    $queryAllPurVoucher = "select * from user_transaction_invoice where utin_transaction_type='PurchaseReturn' and utin_firm_id='$firm_id' order by utin_invoice_no";
    //echo '$queryAllPurVoucher'.$queryAllPurVoucher;
    $resAllPurVoucher = mysqli_query($conn, $queryAllPurVoucher) or die(mysqli_error($conn));
    $i = 1;
    while ($rowAllPurVoucher = mysqli_fetch_array($resAllPurVoucher, MYSQLI_ASSOC)) {
        $custId = $rowAllPurVoucher['utin_user_id'];
        $qSelCustomerDetails = "SELECT * FROM user WHERE user_id = '$custId'";
        $resCustomerDetails = mysqli_query($conn, $qSelCustomerDetails) or die(mysqli_error($conn));
        $rowCustomerDetails = mysqli_fetch_array($resCustomerDetails);
        $custFname = $rowCustomerDetails['user_fname'];
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
        $date = $rowAllPurVoucher['utin_date'];
        $tallydate = strtotime($date); //--> which results to 1332866820
        $tallydate = date('Ymd', $tallydate);
        $invoice = $rowAllPurVoucher['utin_pre_invoice_no'] . $rowAllPurVoucher['utin_invoice_no'];
        $sttrPreInvoiceNo = $rowAllPurVoucher['utin_pre_invoice_no'];
        $st_invoice_no = $rowAllPurVoucher['utin_invoice_no'];
        $utin_id = $rowAllPurVoucher['utin_id'];
        $theFirmId = $rowAllPurVoucher['utin_firm_id'];
        $stockName = $rowAllPurVoucher['sttr_item_name'];
        $stockName = preg_replace('/[^A-Za-z0-9\-]/', ' ', $stockName);
        $voucherid = $rowAllPurVoucher['utin_id']-2;
        $purchaseVoucher = '   <TALLYMESSAGE xmlns:UDF="TallyUDF">
     <LEDGER NAME="' . $user . ' P" RESERVEDNAME="' . $rowCustomerDetails['user_id'] . '" ACTION="Alter">
      <MAILINGNAME.LIST TYPE="String">
       <MAILINGNAME>' . $user . ' P</MAILINGNAME>
      </MAILINGNAME.LIST>
      <COUNTRYNAME>India</COUNTRYNAME>
      <PARENT>Sundry Creditors</PARENT>
      <TAXCLASSIFICATIONNAME/>
      <TAXTYPE>Others</TAXTYPE>
      <COUNTRYOFRESIDENCE>India</COUNTRYOFRESIDENCE>
           <LEDSTATENAME>' . $rowCustomerDetails['user_state'] . '</LEDSTATENAME>
      <LANGUAGENAME.LIST>
       <NAME.LIST TYPE="String">
        <NAME>' . $user . ' P</NAME>
       </NAME.LIST>
       <LANGUAGEID> 1033</LANGUAGEID>
      </LANGUAGENAME.LIST>
     </LEDGER>
    </TALLYMESSAGE>  <TALLYMESSAGE xmlns:UDF="TallyUDF">
                <VOUCHER REMOTEID="' . $voucherid . '" SENDERID="4bb32ae9-f20e-4d48-a41c-3b200093110a-0000000e" VCHTYPE="Debit Note" ACTION="Create" OBJVIEW="Invoice Voucher View">
      <ADDRESS.LIST TYPE="String">
       <ADDRESS>' . $custAddress . '</ADDRESS>
      </ADDRESS.LIST>
      <BASICBUYERADDRESS.LIST TYPE="String">
       <BASICBUYERADDRESS>' . $custAddress . '</BASICBUYERADDRESS>
      </BASICBUYERADDRESS.LIST>
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>20220902</DATE>
      <REFERENCEDATE>' . $tallydate . '</REFERENCEDATE>
      <GUID>' . $voucherid . '</GUID>
      <GSTREGISTRATIONTYPE>Regular</GSTREGISTRATIONTYPE>
      <VATDEALERTYPE>Regular</VATDEALERTYPE>
       <STATENAME>' . $custState . '</STATENAME>
      <VOUCHERTYPENAME>Debit Note</VOUCHERTYPENAME>
      <COUNTRYOFRESIDENCE>India</COUNTRYOFRESIDENCE>
      <PARTYGSTIN>' . $custGST . '</PARTYGSTIN>
      <PLACEOFSUPPLY>' . $custState . '</PLACEOFSUPPLY>
      <PARTYNAME>' . $user . ' P</PARTYNAME>
      <PARTYLEDGERNAME>' . $user . ' P</PARTYLEDGERNAME>
      <REFERENCE>'. $voucherid . '</REFERENCE>
      <PARTYMAILINGNAME>' . $user . ' P</PARTYMAILINGNAME>
      <PARTYPINCODE>' . $custPinCode . '</PARTYPINCODE>
      <CONSIGNEEGSTIN>' . $firm_gst . '</CONSIGNEEGSTIN>
      <CONSIGNEEMAILINGNAME>' . $firm_Lname . '</CONSIGNEEMAILINGNAME>
      <CONSIGNEEPINCODE>' . $firmPinCode . '</CONSIGNEEPINCODE>
      <CONSIGNEESTATENAME>Maharashtra</CONSIGNEESTATENAME>
      <VOUCHERNUMBER>' . $i . '</VOUCHERNUMBER>
      <BASICBASEPARTYNAME>' . $user . ' P</BASICBASEPARTYNAME>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <PERSISTEDVIEW>Invoice Voucher View</PERSISTEDVIEW>
      <BASICBUYERNAME>' . $firm_name . '</BASICBUYERNAME>
      <CONSIGNEECOUNTRYNAME>India</CONSIGNEECOUNTRYNAME>
      <VCHGSTCLASS/>
      <VCHENTRYMODE>Item Invoice</VCHENTRYMODE>
      <VOUCHERTYPEORIGNAME>Purchase</VOUCHERTYPEORIGNAME>
      <DIFFACTUALQTY>No</DIFFACTUALQTY>
      <ISMSTFROMSYNC>No</ISMSTFROMSYNC>
      <ISDELETED>No</ISDELETED>
      <ISSECURITYONWHENENTERED>No</ISSECURITYONWHENENTERED>
      <ASORIGINAL>No</ASORIGINAL>
      <AUDITED>No</AUDITED>
      <FORJOBCOSTING>No</FORJOBCOSTING>
      <ISOPTIONAL>No</ISOPTIONAL>
      <EFFECTIVEDATE>' . $tallydate . '</EFFECTIVEDATE>
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
      <HASCASHFLOW>No</HASCASHFLOW>
      <ISPOSTDATED>No</ISPOSTDATED>
      <USETRACKINGNUMBER>No</USETRACKINGNUMBER>
      <ISINVOICE>Yes</ISINVOICE>
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
      <ALTERID> 42</ALTERID>
      <MASTERID> 14</MASTERID>
      <VOUCHERKEY>192436009697288</VOUCHERKEY>
      <EWAYBILLDETAILS.LIST>      </EWAYBILLDETAILS.LIST>
      <EXCLUDEDTAXATIONS.LIST>      </EXCLUDEDTAXATIONS.LIST>
      <OLDAUDITENTRIES.LIST>      </OLDAUDITENTRIES.LIST>
      <ACCOUNTAUDITENTRIES.LIST>      </ACCOUNTAUDITENTRIES.LIST>
      <AUDITENTRIES.LIST>      </AUDITENTRIES.LIST>
      <DUTYHEADDETAILS.LIST>      </DUTYHEADDETAILS.LIST>';
        $readWritefile = fopen("purchaseReturn.xml", "a");
        fwrite($readWritefile, "\n" . $purchaseVoucher);
        fclose($readWritefile);
        $qSelAllPurVoucher1 = "SELECT * FROM stock_transaction  where sttr_transaction_type='PurchaseReturn' and sttr_utin_id='$utin_id' and sttr_pre_invoice_no='$sttrPreInvoiceNo' and sttr_invoice_no='$st_invoice_no'";
        $resAllPurVoucher1 = mysqli_query($conn, $qSelAllPurVoucher1) or die(mysqli_error($conn));
       // echo '$qSelAllPurVoucher1:'.$qSelAllPurVoucher1;
        $finalstockamt = 0;
        while ($rowAllPurVoucher1 = mysqli_fetch_array($resAllPurVoucher1, MYSQLI_ASSOC)) {
            $stockName = $rowAllPurVoucher1['sttr_item_name'];
            if ($rowAllPurVoucher1['sttr_metal_type'] == 'Gold') {
                $rate = $rowAllPurVoucher1['sttr_metal_rate'];
                $rate = $rate / 10;
            } else if ($rowAllPurVoucher1['sttr_metal_type'] == 'Silver') {
                $rate = $rate / 1000;
            }
            $finalstockamt = $finalstockamt + $rowAllPurVoucher1['sttr_final_valuation'];
            $purchaseVoucher = '
       <ALLINVENTORYENTRIES.LIST>
       <STOCKITEMNAME>' . $stockName . '</STOCKITEMNAME>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISAUTONEGATE>No</ISAUTONEGATE>
       <ISCUSTOMSCLEARANCE>No</ISCUSTOMSCLEARANCE>
       <ISTRACKCOMPONENT>No</ISTRACKCOMPONENT>
       <ISTRACKPRODUCTION>No</ISTRACKPRODUCTION>
       <ISPRIMARYITEM>No</ISPRIMARYITEM>
       <ISSCRAP>No</ISSCRAP>
       <RATE>' . $rate . '/' . $rowAllPurVoucher1['sttr_pkt_weight_type'] . '</RATE>
       <AMOUNT>' . $rowAllPurVoucher1['sttr_final_valuation'] . '</AMOUNT>
       <ACTUALQTY>' . $rowAllPurVoucher1['sttr_nt_weight'] . $rowAllPurVoucher1['sttr_pkt_weight_type'] . '</ACTUALQTY>
       <BILLEDQTY>' . $rowAllPurVoucher1['sttr_nt_weight'] . $rowAllPurVoucher1['sttr_pkt_weight_type'] . '</BILLEDQTY>
       <BATCHALLOCATIONS.LIST>
        <GODOWNNAME>Main Location</GODOWNNAME>
        <BATCHNAME>Primary Batch</BATCHNAME>
        <INDENTNO/>
        <ORDERNO/>
        <TRACKINGNUMBER/>
        <DYNAMICCSTISCLEARED>No</DYNAMICCSTISCLEARED>
        <AMOUNT>' . $rowAllPurVoucher1['sttr_final_valuation'] . '</AMOUNT>
        <ACTUALQTY> ' . $rowAllPurVoucher1['sttr_nt_weight'] . $rowAllPurVoucher1['sttr_pkt_weight_type'] . '</ACTUALQTY>
        <BILLEDQTY> ' . $rowAllPurVoucher1['sttr_nt_weight'] . $rowAllPurVoucher1['sttr_pkt_weight_type'] . '</BILLEDQTY>
        <ADDITIONALDETAILS.LIST>        </ADDITIONALDETAILS.LIST>
        <VOUCHERCOMPONENTLIST.LIST>        </VOUCHERCOMPONENTLIST.LIST>
       </BATCHALLOCATIONS.LIST>
       <ACCOUNTINGALLOCATIONS.LIST>
        <OLDAUDITENTRYIDS.LIST TYPE="Number">
         <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
        </OLDAUDITENTRYIDS.LIST>
        <LEDGERNAME>Purchase Accounts</LEDGERNAME>
        <GSTCLASS/>
        <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
        <LEDGERFROMITEM>No</LEDGERFROMITEM>
        <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
        <ISPARTYLEDGER>No</ISPARTYLEDGER>
        <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
        <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
        <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
        <AMOUNT>' . $rowAllPurVoucher1['sttr_final_valuation'] . '</AMOUNT>
        <SERVICETAXDETAILS.LIST>        </SERVICETAXDETAILS.LIST>
        <BANKALLOCATIONS.LIST>        </BANKALLOCATIONS.LIST>
        <BILLALLOCATIONS.LIST>        </BILLALLOCATIONS.LIST>
        <INTERESTCOLLECTION.LIST>        </INTERESTCOLLECTION.LIST>
        <OLDAUDITENTRIES.LIST>        </OLDAUDITENTRIES.LIST>
        <ACCOUNTAUDITENTRIES.LIST>        </ACCOUNTAUDITENTRIES.LIST>
        <AUDITENTRIES.LIST>        </AUDITENTRIES.LIST>
        <INPUTCRALLOCS.LIST>        </INPUTCRALLOCS.LIST>
        <DUTYHEADDETAILS.LIST>        </DUTYHEADDETAILS.LIST>
        <EXCISEDUTYHEADDETAILS.LIST>        </EXCISEDUTYHEADDETAILS.LIST>
        <RATEDETAILS.LIST>        </RATEDETAILS.LIST>
        <SUMMARYALLOCS.LIST>        </SUMMARYALLOCS.LIST>
        <STPYMTDETAILS.LIST>        </STPYMTDETAILS.LIST>
        <EXCISEPAYMENTALLOCATIONS.LIST>        </EXCISEPAYMENTALLOCATIONS.LIST>
        <TAXBILLALLOCATIONS.LIST>        </TAXBILLALLOCATIONS.LIST>
        <TAXOBJECTALLOCATIONS.LIST>        </TAXOBJECTALLOCATIONS.LIST>
        <TDSEXPENSEALLOCATIONS.LIST>        </TDSEXPENSEALLOCATIONS.LIST>
        <VATSTATUTORYDETAILS.LIST>        </VATSTATUTORYDETAILS.LIST>
        <COSTTRACKALLOCATIONS.LIST>        </COSTTRACKALLOCATIONS.LIST>
        <REFVOUCHERDETAILS.LIST>        </REFVOUCHERDETAILS.LIST>
        <INVOICEWISEDETAILS.LIST>        </INVOICEWISEDETAILS.LIST>
        <VATITCDETAILS.LIST>        </VATITCDETAILS.LIST>
        <ADVANCETAXDETAILS.LIST>        </ADVANCETAXDETAILS.LIST>
       </ACCOUNTINGALLOCATIONS.LIST>
       <DUTYHEADDETAILS.LIST>       </DUTYHEADDETAILS.LIST>
       <SUPPLEMENTARYDUTYHEADDETAILS.LIST>       </SUPPLEMENTARYDUTYHEADDETAILS.LIST>
       <TAXOBJECTALLOCATIONS.LIST>       </TAXOBJECTALLOCATIONS.LIST>
       <REFVOUCHERDETAILS.LIST>       </REFVOUCHERDETAILS.LIST>
       <EXCISEALLOCATIONS.LIST>       </EXCISEALLOCATIONS.LIST>
       <EXPENSEALLOCATIONS.LIST>       </EXPENSEALLOCATIONS.LIST>
      </ALLINVENTORYENTRIES.LIST>';
            $readWritefile = fopen("purchaseReturn.xml", "a");
            fwrite($readWritefile, "\n" . $purchaseVoucher);
            fclose($readWritefile);
        }
        $igst = $finalstockamt * .03;
        $cgst = $finalstockamt * .015;
        $finalstockamt = $finalstockamt + $finalstockamt * .03;
        $purchaseVoucher = ' <SUPPLEMENTARYDUTYHEADDETAILS.LIST>      </SUPPLEMENTARYDUTYHEADDETAILS.LIST>
      <EWAYBILLERRORLIST.LIST>      </EWAYBILLERRORLIST.LIST>
      <IRNERRORLIST.LIST>      </IRNERRORLIST.LIST>
      <INVOICEDELNOTES.LIST>      </INVOICEDELNOTES.LIST>
      <INVOICEORDERLIST.LIST>      </INVOICEORDERLIST.LIST>
      <INVOICEINDENTLIST.LIST>      </INVOICEINDENTLIST.LIST>
      <ATTENDANCEENTRIES.LIST>      </ATTENDANCEENTRIES.LIST>
      <ORIGINVOICEDETAILS.LIST>      </ORIGINVOICEDETAILS.LIST>
      <INVOICEEXPORTLIST.LIST>      </INVOICEEXPORTLIST.LIST>
      <LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <LEDGERNAME>' . $user . ' P</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-' . $finalstockamt . ' </AMOUNT>
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
      </LEDGERENTRIES.LIST>';
        $readWritefile = fopen("purchaseReturn.xml", "a");
        fwrite($readWritefile, "\n" . $purchaseVoucher);
        fclose($readWritefile);
        if ($igst != 0) {
            $purchaseVoucher = ' <LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <BASICRATEOFINVOICETAX.LIST TYPE="Number">
        <BASICRATEOFINVOICETAX> 3.0</BASICRATEOFINVOICETAX>
       </BASICRATEOFINVOICETAX.LIST>
       <LEDGERNAME>IGST</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $igst . ' </AMOUNT>
       <VATEXPAMOUNT>' . $igst . ' </VATEXPAMOUNT>
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
      </LEDGERENTRIES.LIST>';
        } else if ($cgst != 0) {
            $purchaseVoucher = '<LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
         <BASICRATEOFINVOICETAX.LIST TYPE="Number">
        <BASICRATEOFINVOICETAX> 1.50</BASICRATEOFINVOICETAX>
       </BASICRATEOFINVOICETAX.LIST>
       <ROUNDTYPE/>
       <LEDGERNAME>SGST</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $cgst . ' </AMOUNT>
       <VATEXPAMOUNT>' . $cgst . ' </VATEXPAMOUNT>
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
      </LEDGERENTRIES.LIST>
      <LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <BASICRATEOFINVOICETAX.LIST TYPE="Number">
        <BASICRATEOFINVOICETAX> 1.50</BASICRATEOFINVOICETAX>
       </BASICRATEOFINVOICETAX.LIST>
       <ROUNDTYPE/>
       <LEDGERNAME>CGST</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $cgst . ' </AMOUNT>
       <VATEXPAMOUNT>' . $cgst . ' </VATEXPAMOUNT>
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
      </LEDGERENTRIES.LIST>';
        }
        $readWritefile = fopen("purchaseReturn.xml", "a");
        fwrite($readWritefile, "\n" . $purchaseVoucher);
        fclose($readWritefile);
        $purchaseVoucher = '<PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
      <GSTEWAYCONSIGNORADDRESS.LIST>      </GSTEWAYCONSIGNORADDRESS.LIST>
      <GSTEWAYCONSIGNEEADDRESS.LIST>      </GSTEWAYCONSIGNEEADDRESS.LIST>
      <TEMPGSTRATEDETAILS.LIST>      </TEMPGSTRATEDETAILS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>';
        $readWritefile = fopen("purchaseReturn.xml", "a");
        fwrite($readWritefile, "\n" . $purchaseVoucher);
        fclose($readWritefile);
        $i++;
    }
    $endvar = '<TALLYMESSAGE xmlns:UDF="TallyUDF">
     <COMPANY>
      <REMOTECMPINFO.LIST MERGE="Yes">
       <NAME>' . $firm_name . '</NAME>
       <REMOTECMPNAME>' . $firm_name . '</REMOTECMPNAME>
       <REMOTECMPSTATE>Maharashtra</REMOTECMPSTATE>
      </REMOTECMPINFO.LIST>
     </COMPANY>
    </TALLYMESSAGE>
    </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>';
    $readWritefile = fopen("purchaseReturn.xml", "a");
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