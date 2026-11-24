<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Istilah extends Model
{
    protected $table = 'istilah';

    protected $fillable = [
        'admin_id',
        'nama_istilah',
        'kategori',
        'arti',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
