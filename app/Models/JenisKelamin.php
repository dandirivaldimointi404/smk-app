<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    // use HasFactory;
    protected $table = 'tb_jenis_kelamin';
    protected $primaryKey = 'id_jenis_kelamin';
    protected $fillable = ['jenis_kelamin'];
    public $timestamps = false;

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
}
