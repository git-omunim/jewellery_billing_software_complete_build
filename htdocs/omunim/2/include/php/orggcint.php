<?php
/*
 * Created on Mar 19, 2011 11:53:24 PM
 *
 * @FileName: orggcint.php
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
$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Compound Interest Panel</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/style.css" />
    </head>
    <body>
        <div class="bodyClass">
            <?php
            $ownerId = $_SESSION[sessionOwnerId];

            $girviId = trim($_POST['girviId']);
            $ROI = trim($_POST['ROIValue']);

            if ($girviId == '' or $girviId == NULL) {
                $girviId = trim($_GET['girviId']);
                $ROI = trim($_GET['ROIValue']);
            }

            $qSelAllGirvi = "SELECT * FROM girvi where girv_own_id='$ownerId' and girv_id='$girviId'";
            $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
            $rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC);

            $mainPrincAmount = trim($rowAllGirvi['girv_main_prin_amt']);
            $princAmount = trim($rowAllGirvi['girv_prin_amt']);
            $ROIType = trim($rowAllGirvi['girv_ROI_typ']);
            $girviDOB = trim($rowAllGirvi['girv_DOB']);
            $girviDOR = trim($rowAllGirvi['girv_DOR']);
            $girviType = trim($rowAllGirvi['girv_type']);
            $girviUpdSts = trim($rowAllGirvi['girv_upd_sts']);
            $intCompounded = 1;

            if ($ROI == '' || $ROI == NULL) {
                $ROI = trim($rowAllGirvi['girv_ROI']);
            }


//*****************************************************************
            $arrLeapYear = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
            $arrYear = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

            $years = 0;
            $month = 0;
            $days = 0;

            $girviDOBPrint = date('d-M-Y', strtotime($girviDOB));
            $girviDOB = date('d-m-Y', strtotime($girviDOB));
            $girviDD = date('d', strtotime($girviDOB));
            $girviMM = date('m', strtotime($girviDOB));
            $girviYY = date('Y', strtotime($girviDOB));
            $girviMainYY = date('Y', strtotime($girviDOB));

            $todayDatePrint = date('d-M-Y');
            $todayDate = date('d-m-Y');
            $todayDD = date('d', strtotime("now"));
            $todayMM = date('m', strtotime("now"));
            $todayYY = date('Y', strtotime("now"));

            $totalNoOfDays = (strtotime($todayDate) - strtotime($girviDOB)) / 86400;
            $totalNoOfDays = om_round($totalNoOfDays) + 1;
            $totalLeftDays = $totalNoOfDays;

            $noOfLeapYY = 0;
            $girYY = $girviYY;

            $yearsCheck = ($totalLeftDays / 365);
            $yearsCheck = floor($yearsCheck);

            if ($yearsCheck > 0) {
                $years = $yearsCheck;

                while ($girYY < $todayYY) {
                    if (($girYY % 4) == 0) {
                        $noOfLeapYY = $noOfLeapYY + 1;
                    }
                    $girYY++;
                }
            } else {
                $years = 0;
            }

            if ($girviMM > 2 && ($girviMainYY % 4) == 0) {
                $noOfLeapYY = $noOfLeapYY - 1;
            }

            $totalLeftDays = $totalLeftDays - ($years * 365) - $noOfLeapYY;
            $monthTemp = floor($totalLeftDays / 30.5);
            $month = 0;

            if (($todayYY % 4) == 0) {
                $grvArrMonthDays = $arrLeapYear[$girviMM - 1];
            } else {
                $grvArrMonthDays = $arrYear[$girviMM - 1];
            }

            $grvMonthDays = $grvArrMonthDays - $girviDD + 1;
            $arrCounter = $girviMM - 1;

            if ($monthTemp == 0) {
                $days = $totalLeftDays;
            } else {
                if (($todayYY % 4) == 0) {
                    while ($totalLeftDays >= $arrLeapYear[$arrCounter]) {
                        $totalLeftDays = $totalLeftDays - $arrLeapYear[$arrCounter];
                        if ($arrCounter == 11) {
                            $arrCounter = -1;
                        }
                        $arrCounter++;
                        $month++;
                    }
                } else {
                    while ($totalLeftDays >= $arrYear[$arrCounter]) {
                        $totalLeftDays = $totalLeftDays - $arrYear[$arrCounter];
                        if ($arrCounter == 11) {
                            $arrCounter = -1;
                        }
                        $arrCounter++;
                        $month++;
                    }
                }
            }

            $checkGrvLastMonth = $grvMonthDays + $todayDD; //Check for last month completed

            if (($checkGrvLastMonth == 30 || $checkGrvLastMonth == 31) && ($checkGrvLastMonth >= $totalLeftDays) && (($girviDD - $todayDD) == 1) && ($totalLeftDays > 0)) {
                $month++;
                $totalLeftDays = 0;
            }

            $days = (int) ($totalLeftDays);

            // Start Code for Compound Interest Formula
            $finalAmount = $princAmount * pow(( 1 + ($ROI / 100) / $intCompounded), ($intCompounded * $totalNoOfDays / 365));
            // End Code for Compound Interest Formula

            $finalAmount = om_round($finalAmount, 2);

            $finalAmount = number_format($finalAmount, 2, '.', '');
            ?>
            <table border="0" cellpadding="2" cellspacing="2" width="100%">
                <tr>
                    <td align="center" width="100%" valign="top" colspan="2">
                        <div class="girvi_head_maron16">Compound Interest Panel</div>
                    </td>
                </tr>
                <tr>
                    <td align="center" width="100%" valign="top" colspan="2">
                        <div class="girvi_head_red">Interest compounded Annually</div>
                    </td>
                </tr>
                <tr>
                    <td align="left" width="50%" valign="top">
                        <table border="0" cellpadding="2" cellspacing="2">
                            <tr>
                                <td align="right" valign="middle"><h4>Principal
                                        Amount:</h4></td>
                                <td align="right" valign="middle"><h5><?php echo $princAmount; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" valign="middle"><h4>Compound
                                        Interest:</h4></td>
                                <td align="right" valign="middle"><h5><?php echo $finalAmount - $princAmount; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" valign="middle"><h4>Total:</h4></td>
                                <td align="right" valign="middle"><h5><?php echo $finalAmount; ?></h5>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td align="left" width="50%" valign="top">
                        <table border="0" cellpadding="2" cellspacing="2">
                            <tr>
                                <td align="right" valign="middle"><h4>Girvi Date:</h4></td>
                                <td align="left" valign="middle">
                                    <h5>
                                        <?php
                                        echo $girviDOBPrint;
                                        ?>
                                    </h5></td>
                            </tr>
                            <tr>
                                <td align="right" valign="middle"><h4>Today's Date:</h4></td>
                                <td align="left" valign="middle">
                                    <h5>
                                        <?php
                                        echo $todayDatePrint;
                                        ?>
                                    </h5></td>
                            </tr>
                            <tr>
                                <td align="right" valign="middle"><h4>Time
                                        Period:</h4></td>
                                <td align="left" valign="middle">
                                    <h5>
                                        <?php
                                        if ($years > 1) {
                                            echo $years . " Years ";
                                        } else if ($years == 1) {
                                            echo $years . " Year ";
                                        }
                                        if ($month > 1) {
                                            echo $month . " Months ";
                                        } else if ($month == 1) {
                                            echo $month . " Month ";
                                        }
                                        if ($days > 1) {
                                            echo $days . " Days";
                                        };
                                        if ($days == 1) {
                                            echo $days . " Day";
                                        };
                                        if ($totalNoOfDays <= 0) {
                                            echo $days . " Days";
                                        };
                                        ?>
                                    </h5>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>