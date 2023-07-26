<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Events = Event::all();
        return response()->json([
            'Events' => $Events,
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
            Event::create([
                'event' => $request->event,
                'user_id' => $request->user_id,
            ]);

            return response()->json([
                'messages' => "Events successfully created."
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
        $Events = Event::find($id);
        if (!$Events) {
            return response()->json([
                'message' => 'Events not found'
            ], 404);
        }
        return response()->json([
            'Events' => $Events
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
            $Events = Event::find($id);
            if (!$Events) {
                return response()->json([
                    'message' => 'Events not found.'
                ], 404);
            }
            // echo "request: $request->name";
            $Events->event = $request->event;
            $Events->user_id = $request->user_id;
            $Events->save();
            return response()->json([
                'message' => "Events successfully updated."
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
        $Events = Event::find($id);
        if (!$Events) {
            return response()->json([
                'message' => 'Events not found.'
            ], 404);
        }
        $Events->delete();
        return response()->json([
            'message' => "Events succssfully deleted."
        ], 200);
    }
}
