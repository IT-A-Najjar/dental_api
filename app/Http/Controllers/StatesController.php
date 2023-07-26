<?php

namespace App\Http\Controllers;

use App\Models\state;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = state::all();
        return response()->json([
            'states' => $states,
        ], 200);
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
        try {
            state::create([
                'state_name' => $request->state_name,
                'description' => $request->description,
                'time' => $request->time,
                'place' => $request->place,
                'pateint_id' => $request->pateint_id,
                'illness_id' => $request->illness_id,
            ]);

            return response()->json([
                'messages' => "states successfully created."
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
        $states = state::find($id);
        if (!$states) {
            return response()->json([
                'message' => 'states not found'
            ], 404);
        }
        return response()->json([
            'states' => $states
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
            $states = state::find($id);
            if (!$states) {
                return response()->json([
                    'message' => 'states not found.'
                ], 404);
            }
            // echo "request: $request->name";
            $states->state_name = $request->state_name;
            $states->description = $request->description;
            $states->time = $request->time;
            $states->place = $request->place;
            $states->pateint_id = $request->pateint_id;
            $states->illness_id = $request->illness_id;
            $states->save();
            return response()->json([
                'message' => "states successfully updated."
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
        $states = state::find($id);
        if (!$states) {
            return response()->json([
                'message' => 'states not found.'
            ], 404);
        }
        $states->delete();
        return response()->json([
            'message' => "states succssfully deleted."
        ], 200);
    }
}
