<?php

function whatsapp_receive_phones($data) {
    $parameters = $data->get_params();
    $required_fields = ['phone_1', 'phone_2', 'form_id'];

    foreach ($required_fields as $field) {
        if (empty($parameters[$field])) {
            return new WP_REST_Response("Missing required field: $field", 400);
        }
    }

    foreach ($parameters as $key => $value) {
        set_transient("whatsapp_{$key}", sanitize_text_field($value), 12 * HOUR_IN_SECONDS);
    }

    if (isset($parameters['status']) && $parameters['status'] === 'waiting') {
        wp_schedule_single_event(time() + 600, 'whatsapp_check_payment_status', [$parameters['form_id']]);
    }

    return new WP_REST_Response('Phone numbers and form data received and stored', 200);
}
