<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    // use HasFactory;
    protected $table = 'tb_materi';
    protected $primaryKey = 'id_materi';
    protected $fillable = ['id_mapel', 'user_id', 'kelas_id','judul_materi','file_materi','deskripsi','pertemuan'];
    public $timestamps = false;

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'kelas_id');
    }
}
