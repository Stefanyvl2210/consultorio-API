<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Authenticatable
{
    use HasFactory;
    protected $table = "treatment";
    protected $fillable = [
        'duration',
        'name',
        'protocols',
        'description'
    ];
    public function treatments()
    {
        return $this->belongsTo(Users::class);
    }
}
