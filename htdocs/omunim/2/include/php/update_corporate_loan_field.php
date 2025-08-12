<?php
// Use the same includes as orgusrnm.php to ensure database connection is available.


$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
?>
<?php

// Make sure $conn is set (from omsachsc.php)
if (!isset($conn) || !$conn) {
    echo "error: database connection not set";
    exit;
}

// --- BEGIN: Corporate Loan Field Update (AJAX) ---

// Check required parameters
if (
    isset($_POST['girvi_item_update']) &&
    isset($_POST['girv_id']) &&
    isset($_POST['field']) &&
    isset($_POST['value'])
) {
    // Map field keys to actual DB columns
    $field_map = array(
        'tpp_no'                    => 'girv_tpp_no',
        'old_gl_no'                 => 'girv_old_gl_no',
        'crm_code'                  => 'girv_crm_code',
        'selected_scheme'           => 'girv_selected_scheme',
        'purpose'                   => 'girv_purpose',
        'penal_charges'             => 'girv_penal_charges',
        'effective_annualized_rate' => 'girv_effective_annualized_rate',
        'interest_mode'             => 'girv_interest_mode',
        'min_interest_days'         => 'girv_min_interest_days',
        'effective_rate'            => 'girv_effective_rate',
        'rebate'                    => 'girv_rebate',
        'paid_within'               => 'girv_paid_within'
    );

    $girv_id = mysqli_real_escape_string($conn, $_POST['girv_id']);
    $field   = $_POST['field'];
    $value   = $_POST['value'];

    if (!isset($field_map[$field])) {
        echo "error: invalid field";
        exit;
    }
    $column = $field_map[$field];
    $value_safe = mysqli_real_escape_string($conn, $value);

    // Optional: Duplicate check for TPP No
    if ($column == 'girv_tpp_no') {
        $qCheck = "SELECT $column FROM girvi WHERE $column = '$value_safe' AND girv_id != '$girv_id'";
        $resCheck = mysqli_query($conn, $qCheck);
        if ($resCheck && mysqli_num_rows($resCheck) > 0) {
            echo "FieldAlreadyExist";
            exit;
        }
    }

    $qUpdate = "UPDATE girvi SET $column = '$value_safe' WHERE girv_id = '$girv_id'";
    if (!mysqli_query($conn, $qUpdate)) {
        echo "error: update failed: " . mysqli_error($conn);
        exit;
    }
    echo "success";
    exit;
} else {
    echo "error: invalid parameters";
    exit;
}
// --- END: Corporate Loan Field Update (AJAX) ---
?>