<?php
/*
 * **************************************************************************************
 * @tutorial: ORDER INVOICE @PRIYANKA-15JUNE2021
 * **************************************************************************************
 * 
 * Created on 15 JUNE, 2021 03:45:40 PM
 *
 * @FileName: omspina51Right.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-15JUNE2021
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//
//
/* Start Header page @PRIYANKA-15JUNE2021 */
include("ogspinvheader.php");
/* End Header Page @PRIYANKA-15JUNE2021 */
//
//
/* Start Customer Information Page @PRIYANKA-15JUNE2021 */
include("ogspinvCustInfo.php");
/* End Customer Information Page @PRIYANKA-15JUNE2021 */
//
if ($utin_transaction_type == 'sell') {
//
//
/* Start Order Info Page @PRIYANKA-17JUNE2021 */
include("omOrderDetailsInvTransInfo.php");
/* End Order Info Page @PRIYANKA-17JUNE2021 */
//
//
}
//
/* Start Item Info Page @PRIYANKA-15JUNE2021 */
include("omOrderInvTransInfo.php");
/* End Item Info Page @PRIYANKA-15JUNE2021 */
//
//
/* Start Payment Info Page @PRIYANKA-15JUNE2021 */
include("omOrderInvPayTransInfo.php");
/* End Payment Info Page @PRIYANKA-15JUNE2021 */
//
//
/* Start Footer Page @PRIYANKA-15JUNE2021 */
include("omspinvFooter.php");
/* End Footer Page @PRIYANKA-15JUNE2021 */
//
//
?>