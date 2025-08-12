<?php
/*
 * **************************************************************************************
 * @tutorial: Layout Panel Table
 * **************************************************************************************
 * 
 * Created on Jun 24, 2013 6:05:34 PM
 *
 * @FileName: omtblypn.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$query = "CREATE TABLE IF NOT EXISTS omlayout(
omly_id             INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
omly_own_id         VARCHAR(16),
omly_option	    VARCHAR(50),
omly_value	    TEXT,
omly_indicator	    VARCHAR(10),
omly_panel_name	    VARCHAR(50),
omly_other_info	    VARCHAR(50),
last_column         VARCHAR(1))AUTO_INCREMENT=1";

if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
}
//To check new columns added into table or not 
include 'ommptbauprdwrfl.php';
?>