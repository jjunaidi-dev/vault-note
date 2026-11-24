<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akuns';

    //column apa saja yang boleh diisi
    protected $fillable = [
        'admin_id',
        'nama_platform',
        'username',
        'email',
        'password',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
