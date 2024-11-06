<?php

function whatsapp_send_message($data) {
    $parameters = $data->get_params();
    $name = isset($parameters['name']) ? sanitize_text_field($parameters['name']) : 'User';
    $url = isset($parameters['url']) ? esc_url($parameters['url']) : '';

    $phone_1 = get_transient('whatsapp_phone_1');
    $phone_2 = get_transient('whatsapp_phone_2');
    $status = get_transient('whatsapp_status');

    if (!$phone_1 || !$phone_2) {
        return new WP_REST_Response('Phone numbers not found. Set them first via the receive endpoint.', 400);
    }

    if ($status === 'paid' || $status === 'waiting') {
        whatsapp_send_template_message($name, $url, $phone_1);
        whatsapp_send_template_message($name, $url, $phone_2);
        return new WP_REST_Response('WhatsApp messages sent successfully', 200);
    }

    return new WP_REST_Response('Invalid status. Message not sent.', 400);
}
