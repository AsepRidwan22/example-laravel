<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seminar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['akun', 'mahasiswa'];

    public function akun()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function penguji()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function getTanggalAttribute()
    {
        if ($this->attributes['tanggal'] != null) {
            return Carbon::parse($this->attributes['tanggal'])->translatedFormat('d F Y');
        }
    }
}
