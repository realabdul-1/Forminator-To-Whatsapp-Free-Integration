# WhatsApp Webhook Handler
This plugin sends automated WhatsApp messages based on Forminator form submissions.

## Features
- Stores incoming form data and phone numbers.
- Triggers WhatsApp messages based on specific conditions (e.g., payment status).
- Modular functions for easy customization.

## Setup
1. Replace `YOUR_API_TOKEN` in `helpers.php` with your WhatsApp API token.
2. Customize `your_template_name` in `helpers.php` to match your WhatsApp message template.

## Endpoints
- **/whatsapp-webhook/v1/receive-phones/**: Stores form data and phone numbers.
- **/whatsapp-webhook/v1/send-message/**: Sends WhatsApp messages to stored phone numbers.

### Usage
- Submit form data and phone numbers to `/receive-phones/`.
- When conditions are met, the plugin triggers messages using the template.

### License
Open for use with appropriate credit.
