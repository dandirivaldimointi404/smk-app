<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    // use HasFactory;
    protected $table = 'tb_kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['nama_kelas', 'nip_id'];
    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip_id');
    }

    public function mapel()
    {
        return $this->hasOne(Mapel::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function materi()
    {
        return $this->hasOne(Materi::class);
    }
}
