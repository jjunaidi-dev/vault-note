<?php

use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Pengaturan ini menentukan guard autentikasi dan broker reset password yang digunakan aplikasi. Nilai default-nya sudah sesuai untuk sebagian besar aplikasi, tetapi bisa diubah sesuai kebutuhan.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |Selanjutnya, Anda dapat mengatur setiap guard autentikasi yang digunakan aplikasi.
    |Laravel sudah menyediakan konfigurasi default yang menggunakan session untuk menyimpan status login dan Eloquent untuk mengambil data pengguna.
    |
    |Setiap guard memiliki user provider yang bertugas mengambil data pengguna dari database atau media penyimpanan lainnya.
    |
    |Metode autentikasi yang didukung: "session"
    */

    'guards' => [
        // Konfigurasi Fitur untuk Umum
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        // Konfigurasi Fitur untuk Admin
        'admin'=>[
            'driver'=> 'session',
            'provider'=>'admin'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |Setiap guard autentikasi memiliki user provider yang bertugas mengambil data pengguna dari database atau media penyimpanan lainnya. Laravel umumnya menggunakan Eloquent untuk proses tersebut.
    |
    */

    'providers' => [

    // Providers Untuk UMUM
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', User::class),
        ],

    // Providers Untuk Admin
        'admin'=> [
            'driver'=> 'eloquent',
            'model'=> App\Models\Admin::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the number of seconds before a password confirmation
    | window expires and users are asked to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
