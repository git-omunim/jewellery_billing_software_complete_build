<?php

/*
 * **************************************************************************************
 * @tutorial: TAllY MIGRATION FILE
 * **************************************************************************************
 * 
 * Created on 10 SEP 2022 03:15:52 pm
 *
 * @FileName: omTallyAccountExport.php
 * @Author: RENUKA SHARMA
 * @AuthorEmailId:  renukas@omunim.com
 * @version 1.0.0
 * @Copyright (c) 2022 www.omunim.com
 * @All rights reserved
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
    $firm_Lname = $rowfirminfo['firm_long_nmae'];
    $qSelAllAccount = "SELECT * FROM accounts";
    $resAllAccount = mysqli_query($conn, $qSelAllAccount) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllAccount);
    $tallyGroup = '
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
    $readWritefile = fopen("group.xml", "w");
    fwrite($readWritefile, "\n" . $tallyGroup);
    fclose($readWritefile);
    while ($rowAllAccounts = mysqli_fetch_array($resAllAccount, MYSQLI_ASSOC)) {
        $grpname = $rowAllAccounts['acc_user_acc'];
        $grpname = str_replace("&", "and", $grpname);
        $group = array("Branch/Divisions", "Capital Accounts", "Loans", "Suspense Account", "Current Liabilities", "Current Assets", "Fixed Assets", "Investments", "Sales Accounts", "Indirect Expenses", "
Indirect Income", "Miscellaneous Expenses", "Purchase Accounts", "Direct Incomes", "Direct Expenses", "Sundry Creditors", "Stock in Hand", "Duties & Taxes", "Unsecured Loans", "
Reserves & Surplus", "Secured Loans", "Deposits", "Banks OD Accounts", "Provisions", "Sundry Debtors", "Bank Accounts", "Cash in Hand", "Loan & Advances (Assets)", "Indirect Incomes", "Deposits (Asset)", "Capital Account");
        if (in_array($grpname, $group)) {
            
        } else {
            $tallyGroup = '<TALLYMESSAGE xmlns:UDF="TallyUDF">
<GROUP NAME="' . $grpname . '" ACTION="Create">
<NAME.LIST>
<NAME>' . $grpname . '</NAME>
</NAME.LIST>
    <PARENT>Sundry Debtors</PARENT>
<ISSUBLEDGER>No</ISSUBLEDGER>
<ISBILLWISEON>No</ISBILLWISEON>
<ISCOSTCENTRESON>No</ISCOSTCENTRESON>
</GROUP>
    </TALLYMESSAGE>';
        }
        $readWritefile = fopen("group.xml", "a");
        fwrite($readWritefile, "\n" . $tallyGroup);
        fclose($readWritefile);
    }
    $endvar = '</REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>';
    $readWritefile = fopen("group.xml", "a");
    fwrite($readWritefile, "\n" . $endvar);
    fclose($readWritefile);
}
//
//
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