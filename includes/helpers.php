<?php

function whatsapp_send_template_message($name, $url, $phone) {
    $api_url = 'https://api.whatsapp.com/v1/messages';
    $token = 'YOUR_API_TOKEN';  // Replace with actual API token

    $template_data = [
        "messaging_product" => "whatsapp",
        "to" => $phone,
        "type" => "template",
        "template" => [
            "name" => "your_template_name",  // Replace with your actual template
            "language" => ["code" => "en_US"],
            "components" => [
                [
                    "type" => "body",
                    "parameters" => [
                        ["type" => "text", "text" => $name],
                        ["type" => "text", "text" => $url],
                    ]
                ]
            ]
        ]
    ];

    $response = wp_remote_post($api_url, [
        'method' => 'POST',
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ],
        'body' => json_encode($template_data),
    ]);

    if (is_wp_error($response)) {
        error_log('Error sending WhatsApp message: ' . $response->get_error_message());
    }
}
