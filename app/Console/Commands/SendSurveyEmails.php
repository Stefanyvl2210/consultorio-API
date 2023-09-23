<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Mail\PatientSurveyEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Appointment;
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
        /*DB::table('survey')->insert([
            'results' => null,
            'need_checkup' => false,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);*/
        $surveys = DB::table('survey')->whereDate('created_at', Carbon::now()->subDays(3))->get();
        if(count($surveys) > 0){
            //Si hay muchas citas esto se puede volver pesado
            foreach ($surveys as $survey){
                //Envío de email al doctor
                $appointment = Appointment::where('survey_id',$survey->id)->first();

                $appointment_date = Carbon::parse($appointment->date);
                $appointment_start_time = Carbon::parse($appointment->start_time);
                $appointment_end_time = Carbon::parse($appointment->end_time);

                $doctor = User::find($appointment->doctor_id);
                $patient = User::find($appointment->patient_id);
                $treatment = Treatment::find($appointment->treatment_id);

                $email = new PatientSurveyEmail($doctor, $patient, $treatment, $appointment_date, $appointment_start_time, $appointment_end_time);

                // Mail::to($patient->email)->send($email);
                Mail::to('cristian.rosales@unet.edu.ve')->send($email);
                
            }
        }
    }
}
