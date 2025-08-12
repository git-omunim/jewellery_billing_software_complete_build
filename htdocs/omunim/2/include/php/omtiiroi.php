<?php
/*
 * Created on Apr 6, 2011 12:03:19 AM
 *
 * @FileName: omtiiroi.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: Modified by @Author: KHUSH23JAN13
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//require_once 'system/omssopin.php';
// Monthly ROI
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','1.0','1.0','Monthly')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','1.5','1.5','Monthly')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','2.0','2.0','Monthly')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type,roi_default) values ('$ownerId','2.5','2.5','Monthly','checked')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','3.0','3.0','Monthly')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','3.5','3.5','Monthly')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','4.0','4.0','Monthly')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','4.5','4.5','Monthly')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','5.0','5.0','Monthly')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}

// Annually ROI
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','7.0','7.0','Annually')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','8.0','8.0','Annually')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','9.0','9.0','Annually')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','10.0','10.0','Annually')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','11.0','11.0','Annually')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','12.0','12.0','Annually')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','13.0','13.0','Annually')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type,roi_default) values ('$ownerId','14.0','14.0','Annually','checked')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
$qInsertROI  = "insert into roi(roi_own_id,roi_value,iroi_value,roi_type) values ('$ownerId','15.0','15.0','Annually')";
if (!mysqli_query($conn,$qInsertROI)){die('Error: ' . mysqli_error($conn));}
?>
