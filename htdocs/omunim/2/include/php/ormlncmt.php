<?php
/*
 * Created on Mar 19, 2011 11:53:24 PM
 *
 * @FileName: ormlncmt.php
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
//changes in file @AUTHOR: SANDY25NOV13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
?>

<?php
$commExist = 0;
$qSelComm = "SELECT ml_comm_comm FROM ml_comments where ml_comm_ml_id='$loanId' and ml_comm_cust_id='$mlId' and ml_comm_own_id='$_SESSION[sessionOwnerId]' and ml_comm_upd_sts!='Deleted'";
$resComm = mysqli_query($conn,$qSelComm);
$commExist = mysqli_num_rows($resComm);
if ($commExist != 0) {
    ?>
<tr>
    <td>&nbsp;</td>
</tr>
    <tr>
        <td align="left" class="bgWhite brdrgry pdntp3">
            <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
                <tr>
                    <td width="100%">
                        <div class="textLabel12CalibriBrown pad0mar0 ">
                            <b>&nbsp; &nbsp; OTHER COMMENTS:</b>
                        </div>
                        <div id="ajaxLoadDepositMoneyDiv" style="visibility: hidden" class="blackMess11">
                            <?php include 'omzaajld.php'; ?>
                        </div>
                        <div id="ajaxCloseDepositMoneyDiv" style="visibility: hidden" class="ajaxClose">
                            <a style="cursor: pointer;" onclick="closeDepositMoneyDiv()">
                                <?php include 'omzaajcl.php'; ?>
                            </a>
                        </div>
                    </td>
                </tr>       
                <tr align="left">
                    <td align="left" valign="middle">
                        <div id="girviCommDiv" class="blackMess13Normal">
                            <?php
                            while ($rowComm = mysqli_fetch_array($resComm, MYSQLI_ASSOC)) {
                                echo $rowComm['ml_comm_comm'];
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <?php
}
?>
