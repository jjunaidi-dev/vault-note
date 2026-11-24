<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';

    protected $fillable = [
        'admin_id',
        'judul_kegiatan',
        'tanggal',
        'waktu',
        'location',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
