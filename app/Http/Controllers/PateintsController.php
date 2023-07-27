<?php

namespace App\Http\Controllers;

use App\Models\Pateints;
use Illuminate\Http\Request;

class PateintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $patients = Pateints::with('user','illnesse')->get();
    return response()->json([
        'patients' => $patients,
    ], 200);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            Pateints::create([
                'full_name' => $request->full_name,
                'age' => $request->age,
                'phone_number' => $request->phone_number,
                'user_id' => auth()->user()->id,
                'illnesse_id' => $request->illnesse_id,
            ]);

            return response()->json([
                'messages' => "pateints successfully created."
            ], 200);
            // return $request;
        } catch (\Exception $e) {
            return response()->json([
                'message' => "something went really wrong!"
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Pateints::create([
                'full_name' => $request->full_name,
                'age' => $request->age,
                'phone_number' => $request->phone_number,
                'user_id' => null,
                'illnesse_id' => null,
            ]);

            return response()->json([
                'messages' => "pateints successfully created."
            ], 200);
            // return $request;
        } catch (\Exception $e) {
            return response()->json([
                'message' => "something went really wrong!"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pateints = Pateints::find($id);
        if (!$pateints) {
            return response()->json([
                'message' => 'pateints not found'
            ], 404);
        }
        return response()->json([
            'pateints' => $pateints
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
        try {
            $pateints = Pateints::find($id);
            if (!$pateints) {
                return response()->json([
                    'message' => 'pateints not found.'
                ], 404);
            }
            // echo "request: $request->name";
            $pateints->full_name = $request->full_name;
            $pateints->age = $request->age;
            $pateints->phone_number = $request->phone_number;
            $pateints->user_id = $request->user_id;
            $pateints->illnesse_id = $request->illnesse_id;
            $pateints->save();
            return response()->json([
                'message' => "pateints successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pateints = Pateints::find($id);
        if (!$pateints) {
            return response()->json([
                'message' => 'pateints not found.'
            ], 404);
        }
        $pateints->delete();
        return response()->json([
            'message' => "pateints succssfully deleted."
        ], 200);
    }
}
