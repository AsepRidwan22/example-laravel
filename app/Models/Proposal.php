<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['akun'];

    public function akun()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
