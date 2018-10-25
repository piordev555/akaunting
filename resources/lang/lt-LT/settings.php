<?php

return [

    'company' => [
        'name'              => 'Vardas',
        'email'             => 'El. paštas',
        'phone'             => 'Telefonas',
        'address'           => 'Adresas',
        'logo'              => 'Logotipas',
    ],
    'localisation' => [
        'tab'               => 'Lokalizacija',
        'date' => [
            'format'        => 'Datos formatas',
            'separator'     => 'Datos skirtukas',
            'dash'          => 'Brūkšnelis (-)',
            'dot'           => 'Taškas (.)',
            'comma'         => 'Kablelis (,)',
            'slash'         => 'Pasvirasis brūkšnys (/)',
            'space'         => 'Tarpas ( )',
        ],
        'timezone'          => 'Laiko juosta',
        'percent' => [
            'title'         => 'Procentų (%) Pozicija',
            'before'        => 'Prieš skaičių',
            'after'         => 'Po skaičiaus',
        ],
    ],
    'invoice' => [
        'tab'               => 'Sąskaita faktūra',
        'prefix'            => 'Sąskaitos serija',
        'digit'             => 'Skaitmenų kiekis',
        'next'              => 'Sekantis numeris',
        'logo'              => 'Logotipas',
    ],
    'default' => [
        'tab'               => 'Numatytieji',
        'account'           => 'Numatytoji įmonė',
        'currency'          => 'Numatytoji valiuta',
        'tax'               => 'Numatytasis mokesčių tarifas',
        'payment'           => 'Numatytasis mokėjimo būdas',
        'language'          => 'Numatytoji kalba',
    ],
    'email' => [
        'protocol'          => 'Protokolas',
        'php'               => 'PHP Mail',
        'smtp' => [
            'name'          => 'SMTP',
            'host'          => 'SMTP adresas',
            'port'          => 'SMTP portas',
            'username'      => 'SMTP prisijungimo vardas',
            'password'      => 'SMTP slaptažodis',
            'encryption'    => 'SMTP saugumas',
            'none'          => 'Joks',
        ],
        'sendmail'          => 'Sendmail',
        'sendmail_path'     => 'Sendmail kelias',
        'log'               => 'Prisijungti el. Paštu',
    ],
    'scheduling' => [
        'tab'               => 'Planavimas',
        'send_invoice'      => 'Siųsti SF priminimą',
        'invoice_days'      => 'Siųsti pavėlavus',
        'send_bill'         => 'Siųsti sąskaitos priminimą',
        'bill_days'         => 'Siųsti prieš pavėlavimą',
        'cron_command'      => 'Cron komanda',
        'schedule_time'     => 'Paleisti valandą',
    ],
    'appearance' => [
        'tab'               => 'Išvaizda',
        'theme'             => 'Tema',
        'light'             => 'Šviesi',
        'dark'              => 'Tamsi',
        'list_limit'        => 'Įrašų puslapyje',
        'use_gravatar'      => 'Naudoti Gravatar',
    ],
    'system' => [
        'tab'               => 'Sistema',
        'session' => [
            'lifetime'      => 'Sesijos galiojimo laikas (min)',
            'handler'       => 'Sesijos valdiklis',
            'file'          => 'Failas',
            'database'      => 'Duomenų bazė',
        ],
        'file_size'         => 'Maksimalus failo dydis (MB)',
        'file_types'        => 'Leidžiami failų tipai',
    ],

];
