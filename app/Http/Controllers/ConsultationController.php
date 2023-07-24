<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationStoreRequest;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultation = Consultation::all();
        return response()->json([
            'consultation' => $consultation,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(ConsultationStoreRequest $request)
    {
        try {
            Consultation::create([
                'content' => $request->content,
                'is_viwe' => $request->is_viwe,
            ]);

            return response()->json([
                'messages' => "Consultation successfully created."
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
     */
    public function show($id)
    {
        $consultation = Consultation::find($id);
        if (!$consultation) {
            return response()->json([
                'message' => 'Consultation not found.'
            ], 404);
        }
        return response()->json([
            'consultation' => $consultation
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationStoreRequest $request, $id)
    {
        try {
            $consultation = Consultation::find($id);
            if (!$consultation) {
                return response()->json([
                    'message' => 'Consultation not found.'
                ], 404);
            }
            // echo "request: $request->name";
            $consultation->content = $request->content;
            $consultation->is_viwe = $request->is_viwe;
            $consultation->save();
            return response()->json([
                'message' => "consultation successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consultation = Consultation::find($id);
        if (!$consultation) {
            return response()->json([
                'message' => 'consultation not found.'
            ], 404);
        }
        $consultation->delete();
        return response()->json([
            'message' => "Consultation succssfully deleted."
        ], 200);
    }
}
