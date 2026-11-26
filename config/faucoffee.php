<?php

return [
    // Password halaman admin. Ubah lewat file .env (ADMIN_PASSWORD=...)
    'admin_password' => env('ADMIN_PASSWORD', 'admin123'),

    // Nomor WhatsApp format internasional tanpa tanda + (contoh: 6281234567890)
    'whatsapp' => env('WA_NUMBER', '6281234567890'),

    'address' => 'Bandar Lampung, Lampung',
    'hours' => 'Setiap hari, 08.00 – 22.00 WIB',
    'instagram' => '@faucoffee',
];
