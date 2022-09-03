<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['akun', 'pembimbing'];


    public function akun()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pembimbing()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function penguji()
    {
        return $this->belongsTo(Dosen::class, 'penguji_id');
    }
}
