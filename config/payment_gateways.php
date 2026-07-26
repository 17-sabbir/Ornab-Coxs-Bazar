<?php

return [
    'sslcommerz' => [
        'name' => 'SSLCommerz',
        'enabled' => env('PAYMENT_SSLCOMMERZ_ENABLED', false),
        'store_id' => env('PAYMENT_SSLCOMMERZ_STORE_ID', ''),
        'store_password' => env('PAYMENT_SSLCOMMERZ_STORE_PASSWORD', ''),
        'sandbox' => env('PAYMENT_SSLCOMMERZ_SANDBOX', true),
        'currency' => 'BDT',
    ],
    'shurjopay' => [
        'name' => 'ShurjoPay',
        'enabled' => env('PAYMENT_SHURJOPAY_ENABLED', false),
        'username' => env('PAYMENT_SHURJOPAY_USERNAME', ''),
        'password' => env('PAYMENT_SHURJOPAY_PASSWORD', ''),
        'url' => env('PAYMENT_SHURJOPAY_URL', 'https://engine.shurjopayment.com'),
    ],
    'bkash' => [
        'name' => 'bKash',
        'enabled' => env('PAYMENT_BKASH_ENABLED', false),
        'app_key' => env('PAYMENT_BKASH_APP_KEY', ''),
        'app_secret' => env('PAYMENT_BKASH_APP_SECRET', ''),
        'username' => env('PAYMENT_BKASH_USERNAME', ''),
        'url' => env('PAYMENT_BKASH_URL', 'https://checkout.shurjopayment.com'),
    ],
    'nagad' => [
        'name' => 'Nagad',
        'enabled' => env('PAYMENT_NAGAD_ENABLED', false),
        'merchant_id' => env('PAYMENT_NAGAD_MERCHANT_ID', ''),
        'secret_key' => env('PAYMENT_NAGAD_SECRET_KEY', ''),
        'url' => env('PAYMENT_NAGAD_URL', 'https://sandbox.nagad.com.bd'),
    ],
    'rocket' => [
        'name' => 'Rocket',
        'enabled' => env('PAYMENT_ROCKET_ENABLED', false),
        'merchant_id' => env('PAYMENT_ROCKET_MERCHANT_ID', ''),
        'secret_key' => env('PAYMENT_ROCKET_SECRET_KEY', ''),
    ],
    'stripe' => [
        'name' => 'Stripe',
        'enabled' => env('PAYMENT_STRIPE_ENABLED', false),
        'publishable_key' => env('PAYMENT_STRIPE_PUBLISHABLE_KEY', ''),
        'secret_key' => env('PAYMENT_STRIPE_SECRET_KEY', ''),
        'webhook_secret' => env('PAYMENT_STRIPE_WEBHOOK_SECRET', ''),
    ],
    'paypal' => [
        'name' => 'PayPal',
        'enabled' => env('PAYMENT_PAYPAL_ENABLED', false),
        'client_id' => env('PAYMENT_PAYPAL_CLIENT_ID', ''),
        'client_secret' => env('PAYMENT_PAYPAL_CLIENT_SECRET', ''),
        'url' => env('PAYMENT_PAYPAL_URL', 'https://api-m.sandbox.paypal.com'),
    ],
];