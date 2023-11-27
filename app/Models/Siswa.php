<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // use HasFactory, HasUuids;
    protected $table = 'tb_siswa';
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $fillable = ['nis', 'nama_siswa', 'jenis_kelamin_id', 'user_id', 'kelas_id'];
    public $timestamps = false;

    public function jeniskelamin(){
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rombel(){
        return $this->belongsTo(Rombel::class, 'kelas_id');
    }
    
}
