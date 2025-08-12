<?php
/*
 * **************************************************************************************
 * @tutorial: Sell URD Invoice A5 Sheet Format
 * **************************************************************************************
 * 
 * Created on June 11, 2019 9:16:40 PM
 *
 * @FileName: URDlayout.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
/* included  Start Header page */
   include("URDheader.php");
/* end Header Page */

/* included Start Customer Information Page */
   include("ogspinvCustInfo.php");
/* End Customer Page */

/* Included Item Info Page */
   include("omspinvItemInfo.php");
   include("omInvTransInfo.php");
   include("omNewOrInvTransInfo.php");
   include("ogspinvItemInfo.php");
   //
    /*
if ($invName == 'XRF_PAYMENT') {
   include("omspinvItemInfo.php");
} else if ($invName == 'TRANS_PAYMENT') {
   include("omInvTransInfo.php");
} else if ($panelName == 'DeliveredOrderInvoice' || $panelName == 'PendingOrderInvoice') {
   include("omNewOrInvTransInfo.php");
} else {
   include("ogspinvItemInfo.php");
}
/* End Item Page */

/* Included Payment Info Page */
    include("omspinvPayInfo.php");
    include("omInvPayTransInfo.php");
    include("omNewOrInvPayTransInfo.php");
    include("ogspinvPayInfo.php");
     //
     /*
if ($invName == 'XRF_PAYMENT') {
    include("omspinvPayInfo.php");
} else if ($invName == 'TRANS_PAYMENT') {
   include("omInvPayTransInfo.php");
} else if ($panelName == 'DeliveredOrderInvoice' || $panelName == 'PendingOrderInvoice') {
   include("omNewOrInvPayTransInfo.php");
} else {
    if ($labelType != 'APPROVAL' && $panelName != 'Estimate')
        include("ogspinvPayInfo.php");
}
/* End payment Info */

/* Included Footer Page */
   include("URDFooter.php");
/* End Footer Page */
?>

     
                        


