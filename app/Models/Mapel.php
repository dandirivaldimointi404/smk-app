<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    // use HasFactory;
    protected $table = 'tb_mapel';
    protected $primaryKey = 'id_mapel';
    protected $fillable = ['nama_mapel', 'nip_id', 'kelas_id'];
    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip_id');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'kelas_id');
    }

    public function materi()
    {
        return $this->hasOne(Materi::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id_mapel');
    }
}
