<?php /**
 * 
 * Created on Jul 4, 2011 12:34:51 PM
 *
 * @FileName: ormlupkn.php
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
 */ ?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';

$mlId = trim($_POST['mlId']);
$loanId = trim($_POST['loanId']);
$custId = trim($_POST['custId']);
$girviId = trim($_POST['girviId']);
$principalAmount = trim($_POST['principalAmount']);
$girviPacketMlNum= trim($_POST['girviPacketMlNum']);
$girviTransferFirmId = trim($_POST['girviFirmId']);
$girviTransId= trim($_POST['gTransId']);
$transType = $_POST['transType'];
$gTransPrinAmt = $_POST['prinAmt'];
$preSerialNo= $_POST['preSerialNo'];
$postSerialNo= $_POST['postSerialNo'];

//$prinPacket = $_POST['prinPacket'];//Add packet no @Author:ANUJA30JUL15
$trDate = $day . ' ' . $month . ' ' . $year;
$ownerId = $_SESSION[sessionOwnerId];
//echo '$girviTransId='.$girviTransId;
?>
<?php
if ($girviTransId == '' or $girviTransId == NULL or $girviPacketMlNum == '' or $girviPacketMlNum == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
    exit(0);
} else {
    $qSelGirviPacketNo = "SELECT gtrans_id FROM girvi_transfer where gtrans_own_id='$ownerId' and gtrans_packet_num ='$girviPacketMlNum'";
    $resGirviPacketNo = mysqli_query($conn,$qSelGirviPacketNo);
    $girviPacketNoCount = mysqli_num_rows($resGirviPacketNo);

    if ($girviPacketNoCount > 0) {
        echo 'PacketNumAlreadyExist';
        exit(0);
    } else {
        if ($transType == 'Linked') {
            $qUpdateGirvi = "UPDATE girvi_transfer SET
		gtrans_packet_num='$girviPacketMlNum'
                WHERE gtrans_id='$girviTransId' and gtrans_pre_serial_num='$preSerialNo' and gtrans_serial_num='$postSerialNo' and gtrans_own_id='$_SESSION[sessionOwnerId]'";
        } else {
            $qUpdateGirvi = "UPDATE girvi_transfer SET
		gtrans_packet_num='$girviPacketMlNum'              
                WHERE gtrans_id='$girviTransId' and gtrans_pre_serial_num='$preSerialNo' and gtrans_serial_num='$postSerialNo' and gtrans_own_id='$_SESSION[sessionOwnerId]'";
        }
//        echo '$qUpdateGirvi='.$qUpdateGirvi;
        if (!mysqli_query($conn,$qUpdateGirvi)) {
            die('Error: ' . mysqli_error($conn));
        }
        /*         * *******Start code to add sys_log api******************** */
        $sslg_trans_sub = 'TRANS PACKET NUMBER UPDATED';
        $sysLogTransType = 'transLoan';
        $sslg_firm_id = $girviTransferFirmId;
        $sysLogTransId = $girviPacketMlNum;
        $custId = $custId;
        $sslg_trans_comment = 'Updated Packet No: ' . $sysLogTransId . ', Loan Date: ' . $trDate . ',Prin. Amt: ' . formatInIndianStyle($gTransPrinAmt);
        include 'omslgapi.php';

//$insertQuery = "UPDATE girvi_transfer SET gtrans_packet_num='$girviPacketMlNum' where gtrans_id='$girviTransId' and gtrans_girvi_id='$girviId' and gtrans_own_id='$ownerId'";
    }
}
header("Location: $documentRoot/include/php/ormlupln.php?mlId=$mlId&loanId=$loanId");
    
?>