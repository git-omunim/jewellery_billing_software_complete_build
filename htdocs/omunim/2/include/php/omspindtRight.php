<?php
/*
 * **************************************************************************************
 * @tutorial: XRF Invoice Details @PRIYANKA-02AUG18
 * **************************************************************************************
 * 
 * Created on 02 AUG, 2018 11:29:49 AM
 *
 * @FileName: omspindtRight.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.82
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<style>
    .border-color-grey-rb{
        border-bottom: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    .border-color-grey-rbu{
        border-right: 1px solid #000000;
        border-bottom: 1px solid #000000;
        border-top: 1px solid #000000;
    }
    .border-color-grey-left{
        border-left:1px solid #000000;
    }
    .border-color-grey-top{
        border-up:1px solid #000000;
    }
    .border-color-grey-ru{
        border-top: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    .border-color-grey-u{
        border-top: 1px solid #000000;
    }
</style>
<?php if ($counter == 1) { ?>
<tr class="bc_color_darkblue" height="20px">
        <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_black" style="font-size:14px" width="<?php echo $gsWtWidth; ?>">
            <div class="paddingRight5"><?php echo "SR NO."; ?></div>
        </td>

        <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_black" style="font-size:14px" width="<?php echo $gsWtWidth; ?>">
            <div class="paddingRight5"><?php echo "XRF DET"; ?></div>
        </td>
        
        <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_black" style="font-size:14px" width="<?php echo $gsWtWidth; ?>">
            <div class="paddingRight5"><?php echo "GS WT"; ?></div>
        </td>
        
        <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_black" style="font-size:14px" width="<?php echo $gsWtWidth; ?>">
            <div class="paddingRight5"><?php echo "KARAT"; ?></div>
        </td>
        
        <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_black" style="font-size:14px" width="<?php echo $gsWtWidth; ?>">
            <div class="paddingRight5"><?php echo "GOLD"; ?></div>
        </td>
        
        <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_black" style="font-size:14px" width="<?php echo $gsWtWidth; ?>">
            <div class="paddingRight5"><?php echo "SILVER"; ?></div>
        </td>
</tr>
<?php } $counter = 2; ?>
<tr class="marginTop10" >
    <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "SR NO.">
                            <?php
                            if ($SrNo != '') {
                                echo $SrNo; 
                            } else {
                                echo ''; 
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "XRF DET">
                            <?php
                            if ($xrf_prod_name != '') {
                                echo $xrf_prod_name; 
                            } else {
                                echo ''; 
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "GS WT">
                            <?php
                            if ($xrf_prod_gs_weight != '') {
                                echo $xrf_prod_gs_weight; 
                            } else {
                                echo ''; 
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "KARAT">
                            <?php
                            if ($xrf_karat != '') {
                                echo $xrf_karat; 
                            } else {
                                echo ''; 
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "GOLD">
                            <?php
                            if ($xrf_Gold != '') {
                                echo $xrf_Gold; 
                            } else {
                                echo ''; 
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "SILVER">
                            <?php
                            if ($xrf_Silver != '') {
                                echo $xrf_Silver; 
                            } else {
                                echo ''; 
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
</tr>  