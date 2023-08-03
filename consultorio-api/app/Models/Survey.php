<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = "survey";
    protected $fillable = [
        'appointment_date',
        'results',
        'need_checkup'

    ];
    public function appointments()
    {
        return $this->belongsTo(Appointment::class);
    }
}
