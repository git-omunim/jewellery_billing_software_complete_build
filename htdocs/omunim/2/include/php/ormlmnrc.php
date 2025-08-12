<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormlmnrc.php
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
//changes in file @AUTHOR: SANDY28JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
$girviValuation;
$mlId = $_POST['mlId'];
$loanId = $_POST['loanId'];

if ($mlId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Loan Details</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/body.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/orcss.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/barCodeLabel.css" />
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emNavigation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emAddOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emUpdateOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emOwnerLogin.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/orAddFunction_1_6_1.js"></script>
       
    </head>
    <body class="bgWhite">
        <div class="bgWhite">
            <!-- Code Start inside Box -->
            <table border="0" cellspacing="2" cellpadding="5" width="100%">
                <?php
                $qSelAllGirvi = "SELECT * FROM ml_loan where ml_id='$loanId' and ml_own_id='$_SESSION[sessionOwnerId]'";
                $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
                $rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC);

                $mlNameFF = $rowAllGirvi['ml_lender_fname'] . ' ' . $rowAllGirvi['ml_lender_lname'];
                $mlAddFF = $rowAllGirvi['ml_lender_Address'];
                ?>
                <tr>
                    <td align="center" class="border-bottom">
                        <h2 style="font-size:18px;">Money Lender Name:</h2><h3 style="font-size:18px;color:#0000FF;text-transform:capitalize"> <?php echo $mlNameFF; ?></h3>
                    </td>
                </tr>
            </table>
            <?php
                $mlId = $_POST['mlId'];
                $loanId = $_POST['loanId'];
                $panel = $_POST['panel'];
//
            if ($mlId == '') {
                $mlId = $_GET['mlId'];
                $loanId = $_GET['loanId'];
                $panel = $_GET['panel'];
            }
//            echo '$pane222222==' . $panel;
            include 'ormldtln.php';
            ?>
            <!-- Code End inside Box -->
        </div>
    </body>
</html>
