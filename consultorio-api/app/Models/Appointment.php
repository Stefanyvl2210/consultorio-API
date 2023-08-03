<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = "appointment";
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'treatment_id',
        'survey_id',
        'date',
        'time',
        'type',
        'status'
    ];
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function appointmentStatus()
    {
        return $this->belongsTo(AppointmentStatus::class);
    }
    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class);
    }
    public function surveys()
    {
        return $this->hasOne(Survey::class);
    }
}
