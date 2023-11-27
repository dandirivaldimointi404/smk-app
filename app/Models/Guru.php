<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    // use HasFactory;
    protected $table = 'tb_guru';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $fillable = ['nip', 'nama_guru', 'jenis_kelamin_id', 'user_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jeniskelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    }

    public function rombel()
    {
        return $this->hasOne(Rombel::class);
    }

    public function mapel()
    {
        return $this->hasOne(Mapel::class);
    }
}
