<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'user_id'
    ];

    public function masyarakat()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
