<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Jenis_kontak;
class Kontak extends Model
{
     use HasFactory;
     protected $fillable = [
        'id_siswa',
        'id_jenis',
        'deskripsi'
     ];
     protected $table = 'kontak';
     public function siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa','id');
    }
    public function jenis(){
        return $this->belongsTo(Jenis_kontak::class, 'id_jenis', 'id');
    }
}
