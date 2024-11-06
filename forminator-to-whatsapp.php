<?php
/**
 * Plugin Name: WhatsApp Webhook Handler
 * Description: Sends automated WhatsApp messages when a Forminator form is submitted, with configurable fields.
 * Version: 2.0
 * Author: DH
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Register REST endpoints
add_action('rest_api_init', function () {
    register_rest_route('whatsapp-webhook/v1', '/receive-phones/', [
        'methods' => 'POST',
        'callback' => 'whatsapp_receive_phones',
    ]);

    register_rest_route('whatsapp-webhook/v1', '/send-message/', [
        'methods' => 'POST',
        'callback' => 'whatsapp_send_message',
    ]);
});

// Include modular functions
include_once plugin_dir_path(__FILE__) . 'includes/receive-phones.php';
include_once plugin_dir_path(__FILE__) . 'includes/send-message.php';
include_once plugin_dir_path(__FILE__) . 'includes/helpers.php';
