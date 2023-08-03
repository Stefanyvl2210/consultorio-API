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
            $data['patient']=User::where('id', $appointment['patient_id'])->first()['first_name']. " ";
            $data['patient'].=User::where('id', $appointment['patient_id'])->first()['last_name'];
            $data['doctor']=User::where('id', $appointment['doctor_id'])->first()['first_name'] . " ";
            $data['doctor'].=User::where('id', $appointment['doctor_id'])->first()['last_name'];
            $data['treatment']=Treatment::where('id', $appointment['treatment_id'])->first()['name'];
            $data['status']=AppointmentStatus::where('id', $appointment['status'])->first()['name'];
            $data['type']=AppointmentType::where('id', $appointment['type'])->first()['name'];
            $data['date']=$appointment['date'];
            $data['time']=$appointment['time'];
            return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($date, $time, $type, $treatment)
    {
        //$date = date('Y-m-d', strtotime($date));
        //$time = date('h:m:s', strtotime($time));
        $survey=Survey::create(["appointment_date"=>$date, "", false]);
        $status = AppointmentStatus::where('name', 'Pendiente')->first();
        $treatment = Treatment::where('id', $treatment)->first();
        $user = auth()->user();
        $doctor = User::where('role_id',1)->first();
        $data=[
            "patient_id"=>$user['id'],
            "doctor_id"=>$doctor['id'],
            "treatment_id"=>$treatment['id'],
            "survey_id"=>$survey['id'],
            "date"=>$date,
            "time"=>$time,
            "type"=>$type,
            "status"=>$status['id']
        ];
        try {
            $appointment = Appointment::create( $data );

        } catch ( \Throwable $e ) {
            return response( $e, 500 );
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
            $appointment = Appointment::where('id', $id)->first();
            $data = $this->appmtData($appointment);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response( $e, 500 );
        }
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
        if ( !$appointment ) {
            return response()->json( ['Error' => "Appointment with id " . $id . " doesn't exist"], 404 );
        }

        try {
            $delete = $appointment->delete();
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
