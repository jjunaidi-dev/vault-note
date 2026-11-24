<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // Menentukan nama tabel database yang digunakan oleh model ini
    protected $table = "admins";

    // Menentukan Column apa saja yang dapat diisi
    protected $fillable = [
        'email', 'password'
    ];

    // Menentukan data apa saja yang tidak boleh di Tambilkan
    protected $hidden = [
        'password'
    ];

    // Fitur enkripsi Password pada database
    protected function casts(): array{
        return [
            'password' => 'hashed'
        ];
    }
}
