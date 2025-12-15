<?php

return [
    'merchant_private_key' => env('PAYDUNYA_PRIVATE_KEY'),
    'merchant_public_key'  => env('PAYDUNYA_PUBLIC_KEY'),
    'mode' => env('PAYDUNYA_MODE', 'test'), // test ou live
];