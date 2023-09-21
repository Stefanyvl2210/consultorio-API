<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query  = Survey::query();
        try {
            $survey  = $query->get();
            return response()->json($survey, 200);
        } catch (\Throwable $th) {
            return response( $e, 500 );
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            $survey = Survey::where('id', $id)->first();
            return response()->json($survey, 200);
        } catch (\Throwable $th) {
            return response( $e, 500 );
        }
    }

    public function getQuestions(){
        return response()->json([
            "Pregunta 1" => 'si',
            "Pregunta 2" => 'no',
            "Pregunta 3" => 'no',
            "Pregunta 4" => 'si',
            "Pregunta 5" => 'no'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $survey = Survey::find( $id );
        if ( !$survey ) {
            return response()->json( ['Error' => "Survey with id " . $id . " doesn't exist"], 404 );
        }

        try {
            $survey->update( $data );
        } catch ( \Throwable $e ) {
            return response()->json( $e, 500 );
        }

        $response = [
            'data' => $survey,
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


    }
}
