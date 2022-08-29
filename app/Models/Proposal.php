<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['mahasiswa'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }
}
