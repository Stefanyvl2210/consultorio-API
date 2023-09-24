<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Mail\PatientSurveyEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Appointment;
use App\Models\Survey;
use App\Models\User;
use App\Models\Treatment;

class SendSurveyEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:surveys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Survey emails 3 days after the appointment has happened';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $appointments = DB::table('appointment')->whereDate('date', Carbon::now()->subDays(3))->get();
        if(count($appointments) > 0){
            //Si hay muchas citas esto se puede volver pesado
            foreach ($appointments as $appointment){
                //Envío de email al doctor
                $survey = Survey::where('id',$appointment->survey_id)->first();
                if($appointment->status == 'Aceptada'){
                    $appointment_date = Carbon::parse($appointment->date);
                    $appointment_start_time = Carbon::parse($appointment->start_time);
                    $appointment_end_time = Carbon::parse($appointment->end_time);
    
                    $doctor = User::find($appointment->doctor_id);
                    $patient = User::find($appointment->patient_id);
                    $treatment = Treatment::find($appointment->treatment_id);
    
                    $email = new PatientSurveyEmail($doctor, $patient, $treatment, $appointment_date, $appointment_start_time, $appointment_end_time);
    
                    Mail::to($patient->email)->send($email);
                    $survey->status = 'Disponible';
                    $survey->save();
                }
            }
        }
    }
}
