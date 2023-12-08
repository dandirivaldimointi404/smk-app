<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    // use HasFactory;
    protected $table = 'tb_tugas';
    protected $primaryKey = 'id_tugas';
    protected $fillable = ['id_mapel', 'user_id', 'kelas_id', 'judul_tugas', 'file_tugas', 'deskripsi', 'batas_waktu'];
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

    public function tugasmasuk()
    {
        return $this->hasMany(TugasMasuk::class, 'id_tugas');
    }
}
