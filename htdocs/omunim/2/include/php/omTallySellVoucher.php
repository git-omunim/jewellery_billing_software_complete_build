<?php

/*
 * **************************************************************************************
 * @tutorial: TAllY MIGRATION FILE
 * **************************************************************************************
 * 
 * Created on 13 SEP 2022 06:55:39 pm
 *
 * @FileName: omTallySellVoucher.php
 * @Author: RENUKA SHARMA
 * @AuthorEmailId:  renukas@omunim.com
 * @version 1.0.0
 * @Copyright (c) 2022 www.omunim.com
 * @All rights reserved
 *
 */
?>
<?php

//
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$firmid = $_SESSION['setFirmSession'];
$queryfirminfo = "select * from firm where firm_id='$firmid'";
$resAllfirminfo = mysqli_query($conn, $queryfirminfo) or die(mysqli_error($conn));
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
    $sellVoucher = '
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
    $readWritefile = fopen("sell.xml", "w");
    fwrite($readWritefile, "\n" . $sellVoucher);
    fclose($readWritefile);
    $qSelAllSellVoucher = "select * from user_transaction_invoice where utin_transaction_type='sell' and utin_firm_id='$firm_id' order by utin_invoice_no;";
//echo '$qSelAllSellVoucher'.$qSelAllSellVoucher.'<br>';
    $resAllSellVoucher = mysqli_query($conn, $qSelAllSellVoucher) or die(mysqli_error($conn));
    $i = 1;
    while ($rowAllSellVoucher = mysqli_fetch_array($resAllSellVoucher, MYSQLI_ASSOC)) {
        $custId = $rowAllSellVoucher['utin_user_id'];
        $qSelCustomerDetails = "SELECT * FROM user WHERE user_id = '$custId'";
        $resCustomerDetails = mysqli_query($conn, $qSelCustomerDetails) or die(mysqli_error($conn));
        $rowCustomerDetails = mysqli_fetch_array($resCustomerDetails);
        $custFname = $rowCustomerDetails['user_fname'];
        $custLname = $rowCustomerDetails['user_lname'];
        $custAddress = $rowCustomerDetails['user_add'];
        $custCity = $rowCustomerDetails['user_city'];
        $custPinCode = $rowCustomerDetails['user_pincode'];
        $custState = $rowCustomerDetails['user_state'];
        $custGST = $rowCustomerDetails['user_cst_no'];
        $utin_id = $rowAllSellVoucher['utin_id'];
        $user = $rowCustomerDetails['user_fname'];
        $user = preg_replace('/[^A-Za-z0-9\-]/', ' ', $user);
        //
        $date = $rowAllSellVoucher['utin_date'];
        $tallydate = strtotime($date);
        $tallydate = date('Ymd', $tallydate);
        $invoice = $rowAllSellVoucher['utin_pre_invoice_no'] . $rowAllSellVoucher['utin_invoice_no'];
        $sttrPreInvoiceNo = $rowAllSellVoucher['utin_pre_invoice_no'];
        $st_invoice_no = $rowAllSellVoucher['utin_invoice_no'];
        $theFirmId = $rowAllSellVoucher['utin_firm_id'];
        $stockName = $rowAllSellVoucher['sttr_item_name'];
        $voucherid = $rowAllSellVoucher['utin_id'];
        $stockName = preg_replace('/[^A-Za-z0-9\-]/', ' ', $stockName);
        $sellVoucher = '<TALLYMESSAGE xmlns:UDF="TallyUDF">
     <LEDGER NAME="' . $user . '" RESERVEDNAME="' . $rowCustomerDetails['user_id'] . '" ACTION="Create">
      <MAILINGNAME.LIST TYPE="String">
       <MAILINGNAME>' . $user . '</MAILINGNAME>
      </MAILINGNAME.LIST>
      <COUNTRYNAME>India</COUNTRYNAME>
      <PARENT>Sundry Debtors</PARENT>
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
     <VOUCHER REMOTEID="' . $invoice . '.' . $voucherid . '" VCHKEY="" VCHTYPE="Sales" ACTION="Create" OBJVIEW="Invoice Voucher View">
      <ADDRESS.LIST TYPE="String">
       <ADDRESS>' . $custAddress . '</ADDRESS>
      </ADDRESS.LIST>
      <BASICBUYERADDRESS.LIST TYPE="String">
       <BASICBUYERADDRESS>' . $custAddress . '</BASICBUYERADDRESS>
      </BASICBUYERADDRESS.LIST>
      <OLDAUDITENTRYIDS.LIST TYPE="Number">
       <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
      </OLDAUDITENTRYIDS.LIST>
      <DATE>' . $tallydate . '</DATE>
      <REFERENCEDATE>' . $tallydate . '</REFERENCEDATE>
      <GUID>' . $invoice . '.' . $voucherid . '</GUID>
      <GSTREGISTRATIONTYPE>Regular</GSTREGISTRATIONTYPE>
      <VATDEALERTYPE>Regular</VATDEALERTYPE>
      <STATENAME>' . $custState . '</STATENAME>
      <VOUCHERTYPENAME>Sales</VOUCHERTYPENAME>
      <COUNTRYOFRESIDENCE>India</COUNTRYOFRESIDENCE>
      <PARTYGSTIN>' . $custGST . '</PARTYGSTIN>
       <PLACEOFSUPPLY>' . $custState . '</PLACEOFSUPPLY>
      <PARTYNAME>' . $user . '</PARTYNAME>
      <PARTYLEDGERNAME>' . $user . '</PARTYLEDGERNAME>
      <REFERENCE>' . $invoice . '/' . $voucherid . '</REFERENCE>
      <PARTYMAILINGNAME>' . $user . '</PARTYMAILINGNAME>
            <PARENT>Sundry Debtors</PARENT>
      <PARTYPINCODE>' . $custPinCode . '</PARTYPINCODE>
      <CONSIGNEEGSTIN>' . $firm_gst . '</CONSIGNEEGSTIN>
      <CONSIGNEEMAILINGNAME>' . $firm_name . '</CONSIGNEEMAILINGNAME>
      <CONSIGNEEPINCODE>' . $firmPinCode . '</CONSIGNEEPINCODE>
      <CONSIGNEESTATENAME>Maharashtra</CONSIGNEESTATENAME>
      <VOUCHERNUMBER>' . $i . '</VOUCHERNUMBER>
      <BASICBASEPARTYNAME>' . $user . '</BASICBASEPARTYNAME>
      <CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <PERSISTEDVIEW>Invoice Voucher View</PERSISTEDVIEW>
      <BASICBUYERNAME>' . $firm_name . '</BASICBUYERNAME>
      <CONSIGNEECOUNTRYNAME>India</CONSIGNEECOUNTRYNAME>
      <VCHGSTCLASS/>
      <VCHENTRYMODE>Item Invoice</VCHENTRYMODE>
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
      <ALTERID> 53</ALTERID>
      <MASTERID> 27</MASTERID>
      <VOUCHERKEY>191774584733704</VOUCHERKEY>
      <EWAYBILLDETAILS.LIST>      </EWAYBILLDETAILS.LIST>
      <EXCLUDEDTAXATIONS.LIST>      </EXCLUDEDTAXATIONS.LIST>
      <OLDAUDITENTRIES.LIST>      </OLDAUDITENTRIES.LIST>
      <ACCOUNTAUDITENTRIES.LIST>      </ACCOUNTAUDITENTRIES.LIST>
      <AUDITENTRIES.LIST>      </AUDITENTRIES.LIST>
      <DUTYHEADDETAILS.LIST>      </DUTYHEADDETAILS.LIST>';
        $readWritefile = fopen("sell.xml", "a");
        fwrite($readWritefile, "\n" . $sellVoucher);
        fclose($readWritefile);
        $qSelAllSellVoucher1 = "SELECT * FROM stock_transaction  where sttr_transaction_type='sell' and sttr_utin_id='$utin_id' and sttr_pre_invoice_no='$sttrPreInvoiceNo' and sttr_invoice_no='$st_invoice_no'";
        //  echo'<br>$qSelAllSellVoucher1'.$qSelAllSellVoucher1.'<br>';
        $resAllSellVoucher1 = mysqli_query($conn, $qSelAllSellVoucher1) or die(mysqli_error($conn));
        $finalstockamt = 0;
        while ($rowAllSellVoucher1 = mysqli_fetch_array($resAllSellVoucher1, MYSQLI_ASSOC)) {
            $sutinid = $rowAllSellVoucher1['sttr_u_id'];
            $stockName = $rowAllSellVoucher1['sttr_item_name'];
            if ($rowAllSellVoucher1['sttr_metal_type'] == 'Gold') {
                $rate = $rowAllSellVoucher1['sttr_metal_rate'];
                $rate = $rate / 10;
            } else if ($rowAllSellVoucher1['sttr_metal_type'] == 'Silver') {
                $rate = $rate / 1000;
            }
            $finalstockamt = $finalstockamt + $rowAllSellVoucher1['sttr_final_valuation'];
            //$gst=$finalstockamt*.03;
            // $finalstockamt= $finalstockamt+$gst;
            // echo '<br>$finalstockamt'.'  '.$stockName.$finalstockamt;
            // echo '<br>'.$gst;
            $sellVoucher = '
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
       <RATE>' . $rate . '/' . $rowAllSellVoucher1['sttr_pkt_weight_type'] . '</RATE>
       <AMOUNT>-' . $rowAllSellVoucher1['sttr_final_valuation'] . '</AMOUNT>
       <ACTUALQTY>' . $rowAllSellVoucher1['sttr_nt_weight'] . $rowAllSellVoucher1['sttr_pkt_weight_type'] . '</ACTUALQTY>
       <BILLEDQTY>' . $rowAllSellVoucher1['sttr_nt_weight'] . $rowAllSellVoucher1['sttr_pkt_weight_type'] . '</BILLEDQTY>
       <BATCHALLOCATIONS.LIST>
        <GODOWNNAME>Main Location</GODOWNNAME>
        <BATCHNAME>Primary Batch</BATCHNAME>
        <INDENTNO/>
        <ORDERNO/>
        <TRACKINGNUMBER/>
        <DYNAMICCSTISCLEARED>No</DYNAMICCSTISCLEARED>
        <AMOUNT>-' . $rowAllSellVoucher1['sttr_final_valuation'] . '</AMOUNT>
        <ACTUALQTY> ' . $rowAllSellVoucher1['sttr_nt_weight'] . $rowAllSellVoucher1['sttr_pkt_weight_type'] . '</ACTUALQTY>
        <BILLEDQTY> ' . $rowAllSellVoucher1['sttr_nt_weight'] . $rowAllSellVoucher1['sttr_pkt_weight_type'] . '</BILLEDQTY>
        <ADDITIONALDETAILS.LIST>        </ADDITIONALDETAILS.LIST>
        <VOUCHERCOMPONENTLIST.LIST>        </VOUCHERCOMPONENTLIST.LIST>
       </BATCHALLOCATIONS.LIST>
       <ACCOUNTINGALLOCATIONS.LIST>
        <OLDAUDITENTRYIDS.LIST TYPE="Number">
         <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
        </OLDAUDITENTRYIDS.LIST>
        <LEDGERNAME>Sales Accounts</LEDGERNAME>
        <GSTCLASS/>
        <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
        <LEDGERFROMITEM>No</LEDGERFROMITEM>
        <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
        <ISPARTYLEDGER>No</ISPARTYLEDGER>
        <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
        <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
        <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
        <AMOUNT>-' . $rowAllSellVoucher1['sttr_final_valuation'] . '</AMOUNT>
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
            $readWritefile = fopen("sell.xml", "a");
            fwrite($readWritefile, "\n" . $sellVoucher);
            fclose($readWritefile);
        }
        $igst = $finalstockamt * .03;
        $igst = round($igst);
        $cgst = $finalstockamt * .015;
        $cgst = round($cgst);
        $finalstockamt = $finalstockamt + $finalstockamt * .03;
        $finalstockamt = round($finalstockamt);
        $sellVoucher = '<SUPPLEMENTARYDUTYHEADDETAILS.LIST>      </SUPPLEMENTARYDUTYHEADDETAILS.LIST>
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
       <LEDGERNAME>' . $user . '</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>' . $finalstockamt . ' </AMOUNT>
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
        $readWritefile = fopen("sell.xml", "a");
        fwrite($readWritefile, "\n" . $sellVoucher);
        fclose($readWritefile);
        if ($igst != 0) {
            $sellVoucher = '<LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE="Number">
        <OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>
       </OLDAUDITENTRYIDS.LIST>
       <ROUNDTYPE/>
          <BASICRATEOFINVOICETAX.LIST TYPE="Number">
        <BASICRATEOFINVOICETAX> 3.0</BASICRATEOFINVOICETAX>
       </BASICRATEOFINVOICETAX.LIST>
       <LEDGERNAME>IGST</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>
       <ISCAPVATTAXALTERED>No</ISCAPVATTAXALTERED>
       <ISCAPVATNOTCLAIMED>No</ISCAPVATNOTCLAIMED>
       <AMOUNT>-' . $igst . ' </AMOUNT>
       <VATEXPAMOUNT>-' . $igst . ' </VATEXPAMOUNT>
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
            $sellVoucher = '<LEDGERENTRIES.LIST>
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
       <AMOUNT>-' . $cgst . ' </AMOUNT>
       <VATEXPAMOUNT>-' . $cgst . ' </VATEXPAMOUNT>
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
       <AMOUNT>-' . $cgst . ' </AMOUNT>
       <VATEXPAMOUNT>-' . $cgst . ' </VATEXPAMOUNT>
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
        $readWritefile = fopen("sell.xml", "a");
        fwrite($readWritefile, "\n" . $sellVoucher);
        fclose($readWritefile);
        $sellVoucher = '<PAYROLLMODEOFPAYMENT.LIST>      </PAYROLLMODEOFPAYMENT.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
      <GSTEWAYCONSIGNORADDRESS.LIST>      </GSTEWAYCONSIGNORADDRESS.LIST>
      <GSTEWAYCONSIGNEEADDRESS.LIST>      </GSTEWAYCONSIGNEEADDRESS.LIST>
      <TEMPGSTRATEDETAILS.LIST>      </TEMPGSTRATEDETAILS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>';
        $readWritefile = fopen("sell.xml", "a");
        fwrite($readWritefile, "\n" . $sellVoucher);
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
    $readWritefile = fopen("sell.xml", "a");
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
    echo "Filename is not defined."
//      
?>