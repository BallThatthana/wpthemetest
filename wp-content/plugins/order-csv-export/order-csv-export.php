<?php
/*
Plugin Name: Holafly Order CSV
Description: Plugin to get order data in CSV format. CSV file should be in the wp-content/uploads/holafly_order/ folder.
Version: 1.0
Author: Mello
*/

// Function to update orders.csv on new order creation
function holafly_order_update_csv($order_id) {
    // Check if WooCommerce is active
    if (!class_exists('WooCommerce')) {
        error_log('WooCommerce is not active.');
        return; // WooCommerce is not active
    }

    // Get the order details
    $order = wc_get_order($order_id);

    if (!$order) {
        error_log('Order not found: ' . $order_id);
        return; // Order does not exist
    }

    // Retrieve order details
    $creation_date = $order->get_date_created() ? $order->get_date_created()->date('Y-m-d H:i:s') : '';
    $total_value = $order->get_total();
    $buyer_email = $order->get_billing_email();

    // Prepare data for CSV
    $csv_data = array(
        $creation_date,
        $total_value,
        $buyer_email,
    );

    // Get the upload directory path
    $upload_dir = wp_upload_dir();
    $folder_path = $upload_dir['basedir'] . '/holafly_order';
    $csv_file = $folder_path . '/orders.csv';

    // Create the folder if it does not exist
    if (!file_exists($folder_path)) {
        if (!wp_mkdir_p($folder_path)) {
            error_log('Failed to create directory: ' . $folder_path);
            return;
        }
    }

    // Check if the CSV file exists, if not create it and add column titles
    if (!file_exists($csv_file)) {
        $csv_handler = fopen($csv_file, 'w');
        if ($csv_handler !== false) {
            $column_titles = array('Creation Date', 'Total Value', 'Buyer Email');
            fputcsv($csv_handler, $column_titles);
            fclose($csv_handler);
            error_log('CSV file created: ' . $csv_file);
        } else {
            error_log('Failed to create CSV file: ' . $csv_file);
            return;
        }
    }

    // Append new data to the CSV file
    $csv_handler = fopen($csv_file, 'a');
    if ($csv_handler !== false) {
        fputcsv($csv_handler, $csv_data);
        fclose($csv_handler);
        error_log('Data written to CSV: ' . implode(',', $csv_data));
    } else {
        error_log('Failed to open file for appending: ' . $csv_file);
    }
}

//can't get woocommerce_checkout_order_created to work
add_action('woocommerce_thankyou', 'holafly_order_update_csv', 10, 1);

?>
