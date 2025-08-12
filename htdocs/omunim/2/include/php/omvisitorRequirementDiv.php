<?php
/*
 * **************************************************************************************
 * @tutorial:TO DISPLAY VISITOR REQUIREMENT DETAILS
 * **************************************************************************************
 * Created on  26 NOV 2022
 *
 * @FileName: omvisitorReuirement.php
 * @Author: RENUKA SHARMA
 * @AuthorEmailId:  renukas@omunim.com
 * @Copyright (c) www.omunim.com
 * @All rights reserved
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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
    <head>
        <title>Online Munim &mdash; Girvi Software, Jewellery Software, Jewellery &amp; Money Lending Accounting Software...</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/omglobal/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/omglobal/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/omglobal/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/omglobal/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <!-- Global styles END -->
        <!-- Theme styles BEGIN -->
        <link href="<?php echo $documentMainRoot; ?>/2/assets/omglobal/css/poppins.css" rel="stylesheet" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/omglobal/css/components.css" rel="stylesheet" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/frontend/onepage/css/style.css" rel="stylesheet" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/frontend/onepage/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/frontend/onepage/css/themes/red.css" rel="stylesheet" id="style-color" />
        <link href="<?php echo $documentMainRoot; ?>/2/assets/frontend/onepage/css/custom.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/body.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/orcss.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/mainLayout.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/barCodeLabel.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/custom.css"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $documentRootBSlash; ?>/images/favicon.ico" />
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omHeadNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogNavFunctions.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emNavigation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emUpdateOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omCalculation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogAddFunctions_1_6_1.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/orAddFunction_1_6_1.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omLangDisplayMess.js"></script><!--file added @Author:PRIYA30JAN14-->
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogAddFunctions_2_4_7.js"></script><!-- new file added @Author:PRIYA06OCT14 -->
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/advanceMetal.js"></script><!--file added @Author:SHRI14JAN15-->
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogCrFunctions.js"></script><!-- new file added @Author:SHE18FEB15-->
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogijAddFunction_1_6_1.js"></script><!-----new file added @Author:ANUJA12Jan15------>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/jquery-1.11.2.min.js"></script><!-----new file added for jquery @@Author:SHRI07APR15------>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/accBalance.js"></script><!-----new file added for Account Balance Panel functions @Author: GAUR14JAN16------>
        <style>
            input[type=text], select  {
                width: 110px;
                padding: 5px 5px;
                text-align: center;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;

            }

            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            .formdiv {
                border-radius: 5px;
                /*                background-color: #f2f2f2;*/
                margin-top:4%;
                /*margin-left:28%;*/
                /*position: absolute;*/
            }
            h1 {
                border-radius: 5px;
                background-color: #4b8df8;
                padding: 5px;
                color:white;
            }
            /*---- Rani Css new layout 24 nov 2022--->*/
            .paymentDbnk{
                display: flex;
                align-items: center;
                justify-content: center;
                padding-top:10%;
            }
            .paymentDbnk .leftSide{
                width:60%;
                position:relative;
            }
            .paymentDbnk .rightSide{
                width:40%;
            }
            .paymentDbnk .leftSide .formdiv{
                width:100%;
            }
            .paymentDbnk .leftSide .formdiv h1{
                background:#285CC0;
                color:#fff;
                border-radius:5px 5px 0 0;
                font-size:18px;
            }
            .paymentDbnk .leftSide .formdiv .labelHead{
                font-size:16px;
                font-weight:600;
                color: #545353;
            }
            .nav-link-inline-block-blue{
                width:100%;
                padding: 25px 15px;
                box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
            }
            .paymentDbnk .leftSide .formdiv .nav-link-inline-block-blue input,
            .paymentDbnk .leftSide .formdiv .nav-link-inline-block-blue select{
                width: 100%;
                text-align: left;
                background: #fff;
                border: 1px solid #d7d7d7;
                height: 36px;
                text-transform: uppercase;
                margin: 2px;
            }
            .paymentDbnk .leftSide .formdiv .nav-link-inline-block-blue input[type="text"]{
                padding:1px -5px;
            }
            .paymentDbnk .leftSide .formdiv .nav-link-inline-block-blue input::placeholder{
                color:#545353;
                padding-left:3px;
                text-transform: uppercase;
            }
            .btnsub{
                margin-top:20px;
                padding: 5px 70px;
                font-size: 18px;
                color: #fff;
                border-radius: 5px !important;
            }
            .rightSide .bankImg{
                width: 230px;
                height: 230px;
                border:5px solid #b9c6de;
                border-radius: 50%;
                line-height: 20px;
                margin: auto;
                text-align: center;
                padding: 20px;
                box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
            }
            .rightSide .bankImg img{
                width:100%;
                height:100%;
                object-fit: contain;
            }
        </style>

        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/webcam.min.js"></script>
    </head>

    <body>
        <?php
        //vr_property_details
        $visitorID = $_REQUEST['visitorID'];
        $quevisitor = "SELECT * FROM visitor_requirement WHERE vr_visitor_id = '$visitorID' order by vr_id DESC ";
        $resvisitordetail = mysqli_query($conn, $quevisitor);
        $rowvisitorDetail = mysqli_fetch_array($resvisitordetail);
        ?>
        <h1 align="center"> VISITOR REQUIREMENT</h1>
        <table style="font-size:15px;">
            <th style="color:#800000;">CITY DETAILS:-</th>
            <tr>
                <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:380px;" >
                    <b> City:</b>     <?php echo $rowvisitorDetail['vr_city']; ?>
                </td>
                <td class="textBoxCurve1px" style="color:#00000; font-weight: 200;width:380px;">
                    <b> Moving From:</b>     <?php echo $rowvisitorDetail['vr_moving_from']; ?>   
                </td>
                <td class="textBoxCurve1px" style="color:#00000; font-weight: 200;width:380px;">
                    <b> Moving To:</b>   <?php echo $rowvisitorDetail['vr_moving_to']; ?>
                </td>                
            </tr>
                    </table><!-- <table> -->
        <table style="font-size:15px;">
            <th style="color:#800000;">Inspection:-</th>
            <tr>  <td class="textBoxCurve1px" style="color:#00000; font-weight: 200;width:380px;">
                    <?php
                    if ($rowvisitorDetail['vr_inspection'] == '') {
                        echo 'NO';
                    } else {
                        echo 'YES';
                    }
                    ?>
                </td>
            </tr></table>
        <table>
            <th style="color:#800000;">BUILDING DETAILS:-</th>
            <tr>
                <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                    <b> Source Floor No:</b>     <?php echo $rowvisitorDetail['vr_moving_from_floor_no']; ?>
                </td>
                <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                    <b> LIFT Service:</b>     <?php
                    if ($rowvisitorDetail['vr_moving_from_lift'] != 'checked') {
                        echo 'NO';
                    } else {
                        echo 'YES';
                    }
                    ?>
                </td>
                <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                    <b> Destination Floor No:</b>     <?php echo $rowvisitorDetail['vr_moving_to_floor_no']; ?>
                </td>
                <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                    <b> LIFT Service:</b>     <?php
                    if ($rowvisitorDetail['vr_moving_to_lift'] != 'checked') {
                        echo 'NO';
                    } else {
                        echo 'YES';
                    }
                    ?>   
                </td>
            </tr>
            <th style="color:#800000;">PROPERTY DETAILS:-</th>
            <?php if ($rowvisitorDetail['vr_property_details'] == '1 RK') { ?>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> SIZE:</b>     <?php echo $rowvisitorDetail['vr_property_details']; ?>
                    </td>              
                </tr><!-- comment -->
                <th style="color:#800000;">STUFF DETAILS:-</th>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> 1 TV & TV Stand:</b>     <?php echo $rowvisitorDetail['vr_tv']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b>2 Chairs:</b>     <?php echo $rowvisitorDetail['vr_chair']; ?>

                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> 1 Washing Machine:</b>     <?php echo $rowvisitorDetail['vr_washing_machine']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b> 1 Single Cot:</b>     <?php echo $rowvisitorDetail['vr_bed']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> 1 Fridge:</b>     <?php echo $rowvisitorDetail['vr_fridge']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> 10 Carton Box:</b>     <?php echo $rowvisitorDetail['vr_carton_box']; ?>
                    </td>
                </tr>
            <?php } else if ($rowvisitorDetail['vr_property_details'] == '1 BHK LITE') { ?>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> SIZE:</b>     <?php echo $rowvisitorDetail['vr_property_details']; ?>
                    </td>              
                </tr><!-- comment -->
                <th style="color:#800000;">STUFF DETAILS:-</th>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> 1 TV & TV Stand:</b>     <?php echo $rowvisitorDetail['vr_tv']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b>2 Chairs:</b>     <?php echo $rowvisitorDetail['vr_chair']; ?>                    
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> 1 Washing Machine:</b>     <?php echo $rowvisitorDetail['vr_washing_machine']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b> 1 Single Cot:</b>     <?php echo $rowvisitorDetail['vr_bed']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> 1 Fridge:</b>     <?php echo $rowvisitorDetail['vr_fridge']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:300px;">
                        <b> 10 + Carton Box:</b>     <?php echo $rowvisitorDetail['vr_carton_box']; ?>
                    </td>
                </tr>
            <?php } else if ($rowvisitorDetail['vr_property_details'] == '1 BHK HEAVY') { ?>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> SIZE:</b>     <?php echo $rowvisitorDetail['vr_property_details']; ?>
                    </td>              
                </tr><!-- comment -->
                <th style="color:#800000;">STUFF DETAILS:-</th>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 TV & TV Stand:</b>     <?php echo $rowvisitorDetail['vr_tv']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b>2 Chairs:</b>     <?php echo $rowvisitorDetail['vr_chair']; ?>                    
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Washing Machine:</b>     <?php echo $rowvisitorDetail['vr_washing_machine']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b> 1 Single Cot:</b>     <?php echo $rowvisitorDetail['vr_bed']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Fridge:</b>     <?php echo $rowvisitorDetail['vr_fridge']; ?>
                    </td>
                </tr>
                <tr> 
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 10 + Carton Box:</b>     <?php echo $rowvisitorDetail['vr_carton_box']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Cooler:</b>     <?php echo $rowvisitorDetail['vr_cooler']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Bed:</b>     <?php echo $rowvisitorDetail['vr_single_cot']; ?>
                    </td><!-- comment -->
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>Kitchen item:</b>     <?php echo $rowvisitorDetail['vr_kitchen']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Wardrobe:</b>     <?php echo $rowvisitorDetail['vr_wardrobe']; ?>
                    </td>
                </tr>
                <tr> 
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Tea Table:</b>     <?php echo $rowvisitorDetail['vr_table']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 dinning Table:</b>     <?php echo $rowvisitorDetail['vr_dinning_table']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 AC:</b>     <?php echo $rowvisitorDetail['vr_ac']; ?>
                    </td><!-- comment -->
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Extra Almirah:</b>     <?php echo $rowvisitorDetail['vr_almirah']; ?>
                    </td>
                </tr>
            <?php } else if ($rowvisitorDetail['vr_property_details'] == '2 BHK LITE') { ?>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> SIZE:</b>     <?php echo $rowvisitorDetail['vr_property_details']; ?>
                    </td>              
                </tr><!-- comment -->
                <th style="color:#800000;">STUFF DETAILS:-</th>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 sofa(3+2):</b>     <?php echo $rowvisitorDetail['vr_sofa']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b>1 center table:</b>     <?php echo $rowvisitorDetail['vr_dinning_table']; ?>                    
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Washing Machine:</b>     <?php echo $rowvisitorDetail['vr_washing_machine']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b> 1 Single Cot:</b>     <?php echo $rowvisitorDetail['vr_single_cot']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Fridge:</b>     <?php echo $rowvisitorDetail['vr_fridge']; ?>
                    </td>
                </tr>
                <tr>                 
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Cooler:</b>     <?php echo $rowvisitorDetail['vr_cooler']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Bed:</b>     <?php echo $rowvisitorDetail['vr_bed']; ?>
                    </td><!-- comment -->
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>Kitchen item:</b>     <?php echo $rowvisitorDetail['vr_kitchen']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>2 door wardrobe:</b>     <?php echo $rowvisitorDetail['vr_wardrobe']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Table:</b>     <?php echo $rowvisitorDetail['vr_table']; ?>
                    </td>
                </tr>
                <tr> 
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>2 Chairs:</b>     <?php echo $rowvisitorDetail['vr_chair']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 AC:</b>     <?php echo $rowvisitorDetail['vr_ac']; ?>
                    </td><!-- comment -->
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 iron Almirah:</b>     <?php echo $rowvisitorDetail['vr_almirah']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 TV:</b>     <?php echo $rowvisitorDetail['vr_tv']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 TV stand:</b>     <?php echo $rowvisitorDetail['vr_tv_stand']; ?>
                    </td>
                </tr>
            <?php } else if ($rowvisitorDetail['vr_property_details'] == '2 BHK HEAVY') { ?>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> SIZE:</b>     <?php echo $rowvisitorDetail['vr_property_details']; ?>
                    </td>              
                </tr><!-- comment -->
                <th style="color:#800000;">STUFF DETAILS:-</th>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 sofa(3+2):</b>     <?php echo $rowvisitorDetail['vr_sofa']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b>1 center table:</b>     <?php echo $rowvisitorDetail['vr_dinning_table']; ?>                    
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Washing Machine:</b>     <?php echo $rowvisitorDetail['vr_washing_machine']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b> 1 Single Cot:</b>     <?php echo $rowvisitorDetail['vr_single_cot']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Fridge:</b>     <?php echo $rowvisitorDetail['vr_fridge']; ?>
                    </td>
                </tr>
                <tr>                 
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Cooler:</b>     <?php echo $rowvisitorDetail['vr_cooler']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Bed:</b>     <?php echo $rowvisitorDetail['vr_bed']; ?>
                    </td><!-- comment -->
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>Kitchen item:</b>     <?php echo $rowvisitorDetail['vr_kitchen']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>2 door wardrobe:</b>     <?php echo $rowvisitorDetail['vr_wardrobe']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Table:</b>     <?php echo $rowvisitorDetail['vr_table']; ?>
                    </td>
                </tr>
                <tr> 
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>8 Chairs:</b>     <?php echo $rowvisitorDetail['vr_chair']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 AC:</b>     <?php echo $rowvisitorDetail['vr_ac']; ?>
                    </td><!-- comment -->
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 iron Almirah:</b>     <?php echo $rowvisitorDetail['vr_almirah']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 TV:</b>     <?php echo $rowvisitorDetail['vr_tv']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 TV stand:</b>     <?php echo $rowvisitorDetail['vr_tv_stand']; ?>
                    </td>
                </tr>
            <?php } else if ($rowvisitorDetail['vr_property_details'] == '3 BHK') { ?>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> SIZE:</b>     <?php echo $rowvisitorDetail['vr_property_details']; ?>
                    </td>              
                </tr><!-- comment -->
                <th style="color:#800000;">STUFF DETAILS:-</th>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 sofa(3+2):</b>     <?php echo $rowvisitorDetail['vr_sofa']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b>1 center table:</b>     <?php echo $rowvisitorDetail['vr_dinning_table']; ?>                    
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Washing Machine:</b>     <?php echo $rowvisitorDetail['vr_washing_machine']; ?>
                    </td>
                    <td class="textBoxCurve1px" width="200px" style="color:#00000; font-weight: 200;">
                        <b> 1 Single Cot:</b>     <?php echo $rowvisitorDetail['vr_single_cot']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Fridge:</b>     <?php echo $rowvisitorDetail['vr_fridge']; ?>
                    </td>
                </tr>
                <tr>                 
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Cooler:</b>     <?php echo $rowvisitorDetail['vr_cooler']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 Double Bed:</b>     <?php echo $rowvisitorDetail['vr_bed']; ?>
                    </td><!-- comment -->
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>Kitchen item:</b>     <?php echo $rowvisitorDetail['vr_kitchen']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>2 door wardrobe:</b>     <?php echo $rowvisitorDetail['vr_wardrobe']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b> 1 Table:</b>     <?php echo $rowvisitorDetail['vr_table']; ?>
                    </td>
                </tr>
                <tr> 
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>8 Chairs:</b>     <?php echo $rowvisitorDetail['vr_chair']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>2 AC:</b>     <?php echo $rowvisitorDetail['vr_ac']; ?>
                    </td><!-- comment -->
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 iron Almirah:</b>     <?php echo $rowvisitorDetail['vr_almirah']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 TV:</b>     <?php echo $rowvisitorDetail['vr_tv']; ?>
                    </td>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 TV stand:</b>     <?php echo $rowvisitorDetail['vr_tv_stand']; ?>
                    </td>                    
                </tr>
                <tr>
                    <td class="textBoxCurve1px" style="color:#00000; font-weight: 200; height: 30px;width:200px;">
                        <b>1 FAN:</b>     <?php echo $rowvisitorDetail['vr_fan']; ?>
                    </td>
                </tr>
            <?php } ?>
        </table> <br>
            <div style="width:900px;text-align: center; margin-top:20px;">
                <button name="back" id="back" style="color:white;background-color:green;font-size:20px;width:100px;">BACK </button>
            </div>
    </body>
</html>