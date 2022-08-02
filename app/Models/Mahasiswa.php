<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['pembimbing'];


    public function pembimbing()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
