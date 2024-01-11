<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $guarded = [];
    protected $dates =['created_at'];
    protected $fillable = ['nama', 'jeniskelamin', 'jurusan', 'foto', 'created_at'];
}
