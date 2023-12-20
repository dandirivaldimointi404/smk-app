<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasMasuk extends Model
{
    // use HasFactory;

    // protected $table = 'tb_tugas_siswa';
    // protected $primaryKey = 'id_tugas_siswa';
    // protected $fillable = ['user_id', 'id_tugas','file_tugas_siswa', 'status', 'nilai_tugas_siswa'];
    // public $timestamps = false;

    protected $table = 'tb_tugasmasuk';
    protected $primaryKey = 'id_tugasmasuk';
    protected $fillable = ['user_id', 'tugas_id','file_tugasmasuk', 'status', 'nilai'];
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }
}
