<?php

/*
 * *********************************************************************************
 * @tutorial: JMK Customer Upd UPDATE utin_cash_CRDR FROM CR TO DR FOR SPECIFIC UDHAAR ENTRIES
 * *********************************************************************************
 *
 * Created on 11-06-2024
 *
 * @FileName: update_udhaar_cr_to_dr.php
 * @Author: kuldeep
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2024 www.softwaregen.com
 * @All rights reserved
 *
 * @ModificationHistory
 * MODIFICATION DATE: 11-06-2024
 * AUTHOR: kuldeep
 * REASON: To correct the transaction type for specific 'udhaar' entries.
 *
 */

// Include necessary files for database connection and system functions
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php'; // This file should handle your database connection ($conn)
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';


// 1. Disable autocommit to start a transaction for safety
if (!mysqli_autocommit($conn, false)) {
    error_log('Error disabling autocommit: ' . mysqli_error($conn));
    die('Error: Could not start a transaction.');
}

$transaction_successful = false; // Flag to track the transaction status

// The SQL query to update the 'utin_cash_CRDR' column in the 'user_transaction_invoice' table.
$updateQuery = "
    UPDATE user_transaction_invoice
    SET utin_cash_CRDR = 'DR'
    WHERE utin_id IN (3271, 2800);
";

// Execute the update query
if (mysqli_query($conn, $updateQuery)) {
    $affectedRows = mysqli_affected_rows($conn);

    // 2. If the query was successful, commit the transaction to make the changes permanent
    if (mysqli_commit($conn)) {
        $transaction_successful = true;
        echo "Transaction successful. <br>";
        echo "<b>" . $affectedRows . "</b> record(s) have been updated in the 'user_transaction_invoice' table. The 'utin_cash_CRDR' column has been changed from 'CR' to 'DR'.";
    } else {
        // If the commit fails, roll back the transaction
        mysqli_rollback($conn);
        error_log('Error committing transaction (rolled back): ' . mysqli_error($conn));
        die('Error: The transaction could not be committed and has been rolled back.');
    }
} else {
    // If the update query fails, roll back the transaction
    mysqli_rollback($conn);
    error_log('Error updating records (rolled back): ' . mysqli_error($conn));
    die('Error executing the update query (rolled back): ' . mysqli_error($conn));
}

// 3. Re-enable autocommit for subsequent database operations
if (!mysqli_autocommit($conn, true)) {
    error_log('Error re-enabling autocommit: ' . mysqli_error($conn));
    // This is a non-critical error for this script's execution, but should be logged.
}

// Close the database connection
mysqli_close($conn);

?>