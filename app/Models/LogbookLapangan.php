<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LogbookLapangan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['mahasiswa', 'akun'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function akun()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDateAttribute()
    {
        if ($this->attributes['date'] != null) {
            return Carbon::parse($this->attributes['date'])->translatedFormat('l, d F Y');
        }
    }
}
