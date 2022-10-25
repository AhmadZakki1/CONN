<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kontak;

class Siswa extends Model
{
    use HasFactory;
protected $fillable = [
    'nisn',
    'nama',
    'alamat',
    'jk',
    'email',
    'about',
    'foto'  
    
];
    protected $table = 'siswa';

    public function kontak(){
        return $this->hasMany(Kontak::class, 'id_siswa');
    }
    public function project(){
        return $this->hasMany('App\Models\project', 'id_siswa');
    }
}
