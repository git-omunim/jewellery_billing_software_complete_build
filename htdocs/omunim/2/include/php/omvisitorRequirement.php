<?php
/*
 * ***************************************************************************************************
 * @tutorial:FOR VISITOR REQUIREMENT DETAILS
 * ***************************************************************************************************
 * Created on 23-JAN-2023 5:30PM
 *
 * @FileName:omvisitorReuirement.php
 * @Author: Renuka Sharma
 * @AuthorEmailId:  renukas@omunim.com
 * 
 * 
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'ommpcmfc.php';
include_once 'ommpcmfcc.php';
?>
<?php
//
$request = $_REQUEST;
$custId=$request['custId'];
//
?>
<style>
    .modal-content{
        padding:10px;
    }
    .closeFinePopUp{
        font-size: 28px;
        width: 26px;
        height: 26px;
        border-radius: 50px;
        line-height: 25px;
        color: #fff;
        background: #0D6FB6;
        margin-top: -5px;
        margin-right: 5px;
        position: absolute;
        right: 0;
    }
</style>
<body>
<?php 
$visitorID =$_REQUEST['visitorID'];
?>
<div class = "modal-content" >
<!--    <span class = "closeFinePopUp" onclick = "closevisitorRequirementPopup();">&times;</span>-->
            <iframe  src = "<?php         
            echo $documentRoot . "/include/php/omvisitorRequirementDiv.php?visitorID=$visitorID";
                ?>" 
                width="900" height="800" frameborder="0" class="grey-back" style="z-index: 1; "> 
        </iframe>

</div>
</body>
</html>