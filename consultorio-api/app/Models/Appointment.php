<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
    public function surveys()
    {
        return $this->hasOne(Survey::class);
    }
}
