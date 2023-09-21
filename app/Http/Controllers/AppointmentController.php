<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\AppointmentType;
use App\Models\Survey;
use App\Models\Treatment;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query  = Appointment::query();
        $appointments  = $query->get();
        $response = [];
        foreach ($appointments as $appointment) {
            $data = $this->appmtData($appointment);
            array_push($response, $data);
        }
        return response()->json( [
            'data' => $response,
        ] );
    }

    public function appmtData($appointment){
        $data['id']=$appointment['id'];
        $data['patient']=User::where('id', $appointment['patient_id'])->first()['first_name']. " ";
        $data['patient'].=User::where('id', $appointment['patient_id'])->first()['last_name'];
        $data['doctor']=User::where('id', $appointment['doctor_id'])->first()['first_name'] . " ";
        $data['doctor'].=User::where('id', $appointment['doctor_id'])->first()['last_name'];
        $data['treatment']=Treatment::where('id', $appointment['treatment_id'])->first()['name'];
        $data['date']=$appointment['date'];
        $data['start_time']=$appointment['start_time'];
        $data['end_time']=$appointment['end_time'];
        $data['type']=$appointment['type'];
        $data['status']=$appointment['status'];
        $data['survey']=Survey::where('id', $appointment['survey_id'])->first();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'date'    => 'string',
            'start_time' => 'string',
            'end_time' => 'string',
            'type'    => 'string',
            'treatment' => 'integer',

        ]);
        $survey=Survey::create(["", false]);
        $treatment = Treatment::where('id', $data['treatment'])->first();
        $user = auth()->user();
        $doctor = User::where('role_id',1)->first();
        if($data['type'] == "No Laboral" && $user['role_id'] == 1){ 
            $response=[
                "patient_id"=>$user['id'],
                "doctor_id"=>$user['id'],
                "treatment_id"=>1,
                "date"=>$data['date'],
                "start_time"=>$data['start_time'],
                "end_time"=>$data['end_time'],
                "type"=>$data['type'],
                "status"=>'Aceptada',
                "survey_id"=>$survey['id']
            ];
        }else{
            $response=[
                "patient_id"=>$user['id'],
                "doctor_id"=>$doctor['id'],
                "treatment_id"=>$treatment['id'],
                "date"=>$data['date'],
                "start_time"=>$data['start_time'],
                "end_time"=>$data['end_time'],
                "type"=>$data['type'],
                "status"=>'Pendiente',
                "survey_id"=>$survey['id']
            ];
        }
        try {
            $appointment = Appointment::create( $response );
        } catch ( \Throwable $e ) {
            return response( $e );
        }
        return response()->json($appointment, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $appointment = Appointment::where('patient_id', $id)->get();
            $response = [];
            foreach ($appointment as $app) {
                $data = $this->appmtData($app);
                array_push($response, $data);
            }
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            return response( $e, 500 );
        }
    }

    public function unavailability($date){
        $data = Appointment::where('date', $date)->get();
        $response=[];
        foreach ($data as $appointment) {
            $treatment = Treatment::where('id', $appointment['treatment_id'])->first();
            $duration = $treatment['duration'];
            for ($i=0; $i <= $duration; $i++) {
                array_push($response, date('H:i:s', strtotime($appointment['start_time'] . ' + ' . $i .' hours')));
            }
        }

        return response()->json([
            "unavailable_dates" => array_unique($response)
            ],
            200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $appointment = Appointment::find( $id );
        if ( !$appointment ) {
            return response()->json( ['Error' => "Appointment with id " . $id . " doesn't exist"], 404 );
        }

        try {
            $appointment->update( $data );
        } catch ( \Throwable $e ) {
            return response()->json( $e, 500 );
        }

        $response = [
            'data' => $appointment,
        ];

        return response()->json( $response );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find( $id );
        $survey = Survey::where('appointment_date', $appointment['date'] )->first();
        if ( !$appointment ) {
            return response()->json( ['Error' => "Appointment with id " . $id . " doesn't exist"], 404 );
        }

        try {
            $delete = $appointment->delete();
            $delete = $survey->delete();

        } catch ( \Throwable $e ) {
            return response()->json( $e, 500 );
        }

        return response()->json( [
            'data' => [
                'message' => 'Appointment with id ' . $id . ' has been deleted',
            ],
        ] );

    }
}
