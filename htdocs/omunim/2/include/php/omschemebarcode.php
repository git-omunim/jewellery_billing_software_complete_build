<?php
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$kittyCustId = $_REQUEST['kittyCustId'];
$kittyId = $_REQUEST['kittyId'];
$depositeAmt = $_REQUEST['depositeAmt'];
$barcodeNo = $_REQUEST['barcodeNo'];
$paymentMode = $_REQUEST['paymentMode'];
$paiddate = $_REQUEST['paiddate'];
$accountNo = $_REQUEST['accountNo'];
$operation = $_REQUEST['operation'];
$query = "SELECT * FROM kitty WHERE kitty_own_id = '$_SESSION[sessionOwnerId]' "
        . "AND kitty_cust_id = '$kittyCustId' "
        . "AND kitty_id = '$kittyId'";
$CustDetails = mysqli_query($conn, $query);
$rowCustDetails = mysqli_fetch_array($CustDetails, MYSQLI_ASSOC);
$kittyGroup = $rowCustDetails['kitty_group'];
$kittyDOB = $rowCustDetails['kitty_DOB'];
$kittyDOB = om_strtoupper(($kittyDOB));
$kittyPreSerialNum = $rowCustDetails['kitty_pre_serial_num'];
$kittySerialNum = $rowCustDetails['kitty_serial_num'];
$kitty_barcode = $rowCustDetails['kitty_barcode'];
?>
<div class="modal" id="sssssss" style="display: block;">
    <div class="modal-dialog" style="text-align: center;width:80%;height:90% !important;">    
        <div class="modal-content" style="text-align: center;width:55%;height:202px !important;padding:0;/*! border:20px solid #f39c12; */overflow: hidden;background: #d8d8d8;background-color: #d8d8d8 !important;background-color: #d8d8d8;">
            <div class="modal-body" style="padding: 0px;height: 100%;background: white;width: 100%;">
                <?php
                if($operation == 'monthlypay'){
                ?>
                <div style="display: flex;justify-content: end;align-items: center">
                    <button type="button" onclick="document.getElementById('sssssss').style.display = 'none';" data-dismiss="modal" style="background-color: transparent;border: none;margin-top:-10px;margin-left:10px;cursor: pointer;">
                        <strong style="font-size:35px;font-weight: bold;color:#736f6e;">×</strong>
                    </button> 
                </div>
                <div style="height: 83%;width: 100%;display: flex;justify-content: center;align-items: center;flex-direction: column;margin-top: -6px;">
                    <div class="col-lg-12" style="height: 83%;width: 100%;display: flex;justify-content: center;align-items: center;">
                        <div style="width: 36%;height: 10%;background: #d8d8d8;">
                            <div class="labeltail"></div>
                        </div>
                        <div style="width: 50%;height: 50%;background: #d8d8d8;">
                            <div class="labelBody" id="schemelabelBody">
                                <div style="width: 100%;height: 100%;">
                                    <div style="display: flex;justify-content: center;align-items: center;margin-top: -4px;" >
                                        <span style="margin-top: 0px;width: 78px;font-size: 12px;margin-left: -150px;">
                                            <?php
                                            echo $accountNo;
                                            ?>
                                        </span>
                                        <span style="font-size: 12px;margin-left: -17px;margin-right: -140px;">
                                        <?php
                                        echo $barcodeNo ;
                                        ?>
                                            </span>
                                        <span style="margin-left: 5px; font-size: 12px;margin-left: 180px;">
                                        <?php
                                        echo $depositeAmt;
                                        ?>
                                            </span>
                                    </div>
                                    <div style="display: flex;justify-content: space-around;align-items: center">
                                        <span style="font-size: 12px;margin-left: 8px;">
                                        <?php
                                        echo $paiddate;
                                        ?>
                                        </span>
                                        <span style="margin-right: 104px;font-size: 12px;">
                                        <?php
                                        echo $paymentMode;
                                        ?>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex;justify-content: center;align-items: center;margin-bottom: 8px;" class="col-lg-12">
                        <a style="cursor: pointer;" onclick="printBarCodeDiv('schemelabelBody')" id="print_link">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='print tag'  class="noPrint" /></a>
                    </div>
                </div>
                <?php }else{ ?>
                <div style="display: flex;justify-content: end;align-items: center">
                    <button type="button" onclick="document.getElementById('sssssss').style.display = 'none';" data-dismiss="modal" style="background-color: transparent;border: none;margin-top:-10px;margin-left:10px;cursor: pointer;">
                        <strong style="font-size:35px;font-weight: bold;color:#736f6e;">×</strong>
                    </button> 
                </div>
                <div style="height: 83%;width: 100%;display: flex;justify-content: center;align-items: center;flex-direction: column;margin-top: -6px;">
                    <div class="col-lg-12" style="height: 83%;width: 100%;display: flex;justify-content: center;align-items: center;">
                        <div style="width: 36%;height: 10%;background: #d8d8d8;">
                            <div class="labeltail"></div>
                        </div>
                        <div style="width: 50%;height: 50%;background: #d8d8d8;">
                            <div class="labelBody" id="schemelabelBody">
                                <div style="width: 100%;height: 100%;">
                                    <div style="display: flex;justify-content: center;align-items: center">
                                        <span style="margin-top: 5px;">
                                        <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=SchemeBarcode&bar_id=<?php
                                        echo $kitty_barcode;
                                        ?>" alt="Barcode"height="13px"style="margin-left: -132px;width: 100px;"/>
                                        </span>
                                        <span style="margin-left: 24px; font-size: 12px;margin-right: 12px;">
                                        <?php
                                        echo $kittyGroup;
                                        ?>
                                            </span>
                                    </div>
                                    <div style="display: flex;justify-content: space-around;align-items: center">
                                        <span style="font-size: 12px;">
                                        <?php
                                        echo $kitty_barcode;
                                        ?>
                                        </span>
                                        <span style="margin-right: 70px;">
                                        <?php
                                        echo $kittyDOB;
                                        ?>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex;justify-content: center;align-items: center;margin-bottom: 8px;" class="col-lg-12">
                        <a style="cursor: pointer;" onclick="printBarCodeDiv('schemelabelBody')" id="print_link">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='print tag'  class="noPrint" /></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="modal-footer" style="padding:2px;">
            </div>
        </div> 
    </div>
</div>