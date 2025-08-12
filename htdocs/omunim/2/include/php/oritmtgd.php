<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: orggbcdv.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
$typeOfTag = $_GET['tag'];
$itemId = $_GET['itemId'];

if ($typeOfTag == '' || $itemId == '') {
$typeOfTag = $_POST['tag'];
$itemId = $_POST['itemId'];
}
if ($typeOfTag == '')
$typeOfTag = '55X13';
if ($itemId == '')
$itemId = $id;

//echo ' $typeOfTag'. $typeOfTag.' $itemId'. $itemId;

$qSelInItemBarCode = "SELECT * FROM item_barcode WHERE itbc_item_id= $itemId";
$resInItemBarCode = mysqli_query($conn,$qSelInItemBarCode);
$rowInItemBarCode = mysqli_fetch_array($resInItemBarCode, MYSQLI_ASSOC);
$bcFirmId = $rowInItemBarCode['itbc_firm_id'];
$bcItemId = $rowInItemBarCode['itbc_item_id'];
$bcItemPreId = $rowInItemBarCode['itbc_pre_id'];
$bcItemPostId = $rowInItemBarCode['itbc_post_id'];
$bcItemName = $rowInItemBarCode['itbc_name'];
$bcItemName = om_strtoupper(substr($bcItemName, 0, 20));
$bcItemWt = $rowInItemBarCode['itbc_gwt'];
$bcItemWtType = $rowInItemBarCode['itbc_gwt_type'];
$bcItemNtWt = $rowInItemBarCode['itbc_nwt'];
$bcItemNtWtType = $rowInItemBarCode['itbc_nwt_type'];
$bcItemTunch = $rowInItemBarCode['itbc_tunch'];
$bismark = $rowInItemBarCode['itbc_bis_mark'];
$bcItemCustPri = trim($rowInItemBarCode['itbc_cust_price']); //Add new variable @Author:ANUJA27JUN15

$divPrinted = TRUE;

$qSelPerFirm = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$bcFirmId'";
$resPerFirm = mysqli_query($conn,$qSelPerFirm);
$rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
$firmNameLabel = $rowPerFirm['firm_name'];
$firmNameLabel = om_strtoupper(substr($firmNameLabel, 0, 4));

$itemKarat = om_round($bcItemTunch / 4.16);
?>
<?php if ($typeOfTag == '64L') { ?>
<table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%" class="block64L" >
    <tr>
        <td align="left" class="paddingLeft5 paddingTop5 block65LText11">
            <?php echo $bcItemPreId; ?><?php echo $bcItemPostId; ?>  
        </td>
        <?php if ($bismark != 'NULL' && $bismark != '') { ?> 
        <td class="paddingLeft2 block84LText9"  align="center">  
            <img src="<?php echo $documentRoot; ?>/images/BIS_Logo18.jpg" alt="" />
        </td>
        <?php } else { ?>
        <td class="paddingLeft2 block84LText9"  align="center">  
        </td>
        <?php } ?>
        <td align="right" class="paddingRight5 paddingTop5 block65LText11">
            <?php echo $bcItemWt; ?><?php echo ' ' . $bcItemWtType; ?>  
        </td>
    </tr>
    <tr>
        <td align="left" class="paddingLeft5 paddingTop5 block65LText11">
            <?php
            if ($bcItemPreId == 'G')
            echo $itemKarat . ' KT';
            else
            echo $itemKarat;
            ?> 
        </td>
        <td> &nbsp;</td>
        <td align="right" class="paddingRight5 paddingTop5 block65LText11">
            <?php echo $bcItemNtWt; ?><?php echo ' ' . $bcItemNtWtType; ?> 
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="left" colspan="2" class="block65LText11">
            <?php echo $bcItemName; ?>  
        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="left" colspan="2" class="block65LText11">
            <?php
            if ($bcItemCustPri == NULL || $bcItemCustPri == '')
            echo '&nbsp;';
            else
            $bcItemCustPri;
            ?>  
        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td align="center" align="bottom" class="block84LTextBlue" rowspan="2">
<?php echo $firmNameLabel; ?>  
        </td>
        <td> &nbsp;</td>
        <td align="center">
            <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=84L&bar_id=I<?php echo $bcItemId; ?>" alt="Barcode" />  
        </td>
    </tr>


</table>
<?php } else if ($typeOfTag == '84L') { ?>
<table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%" class="block84L" >
    <tr>
        <td align="left" class="paddingLeft5 paddingTop1 block84LText11" width="20%">
        <?php echo $bcItemPreId; ?><?php echo $bcItemPostId; ?> 
        </td>
<?php if ($bismark != 'NULL' && $bismark != '') { ?> 
        <td class="paddingLeft2 block84LText9"  align="center" width="20%"  rowspan="2">  
            <img src="<?php echo $documentRoot; ?>/images/BIS_Logo18.jpg" alt="" height="15px" width="20px"/>
        </td>
        <?php } else { ?>
        <td class="paddingLeft2 block84LText9"  align="center" width="20%"  rowspan="2">  
        </td>
            <?php } ?>
        <td align="right" class="paddingRight5 paddingTop1 block84LText11" width="60%">
<?php echo $bcItemName; ?>  
        </td>
    </tr>
    <tr>
        <td align="center" class="block84LText16Blue" rowspan="2">
            <?php echo $firmNameLabel; ?>  
        </td>
        <td align="right" class="paddingRight5 block84LText11" colspan="2">
<?php echo $bcItemWt; ?><?php echo ' ' . $bcItemWtType . ', '; ?> 
<?php echo $bcItemNtWt; ?><?php echo ' ' . $bcItemNtWtType; ?> 
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="left" colspan="2" class="block65LText11">
            <?php
            if ($bcItemCustPri == NULL || $bcItemCustPri == '')
            echo '&nbsp;';
            else
            $bcItemCustPri;
            ?>  
        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td align="right" class="paddingRight5" colspan="2">
            <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=84L&bar_id=I<?php echo $bcItemId; ?>" alt="Barcode" />
        </td>
    </tr>
</table>
<?PHP } else { ?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" class="block55x13">
    <tr>
        <td align="left" width="50%" class="borderRightDotted">
            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                <tr>
                    <td class="paddingLeft2 block84LText11">
<?php echo $bcItemPreId; ?><?php echo $bcItemPostId; ?> 
                    </td>
                    <?php if ($bismark != 'NULL' && $bismark != '') { ?> 
                    <td class="paddingLeft2 block84LText11" rowspan="2" align="right">
                        <img src="<?php echo $documentRoot; ?>/images/BIS_Logo18.jpg" alt="" />
                    </td>
                        <?php } ?>
                </tr>
                <tr>
                    <td class="paddingLeft2 block84LText11">
<?php echo $firmNameLabel; ?>
                    </td>
                </tr>
                <tr>
                    <td class="paddingLeft2 block84LText11" colspan="2">
                        <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=84L&bar_id=I<?php echo $bcItemId; ?>" alt="Barcode" />
                    </td>
                </tr>
            </table>
        </td>
        <td align="right" width="50%">
            <table border="0" cellspacing="0" cellpadding="0" align="right" width="100%">
                <tr>
                    <td class="paddingRight5 block84LText9" align="right">
                        <?php echo $bcItemName; ?>
                    </td>
                </tr>
                <tr>
                    <td class="paddingRight5 block84LText11" align="right">
                        <?php echo ' ' . $bcItemWt; ?><?php echo ' ' . $bcItemWtType; ?> 
                    </td>
                </tr>
                <tr>
                    <td class="paddingRight5 block84LText11" align="right">
<?php echo '  ' . $bcItemNtWt; ?><?php echo ' ' . $bcItemNtWtType; ?> 
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="left" colspan="2" class="block65LText11">
                        <?php
                        if ($bcItemCustPri == NULL || $bcItemCustPri == '')
                        echo '&nbsp;';
                        else
                        $bcItemCustPri;
                        ?>  
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php
}?>