<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $table = "treatment";
    protected $fillable = [
        'name',
        'description',
        'protocols',
        'cost',
        'duration',
        'image-url'
    ];
    public function treatments()
    {
        return $this->belongsTo(Users::class);
    }
}
