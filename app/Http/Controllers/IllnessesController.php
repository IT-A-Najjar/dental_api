<?php

namespace App\Http\Controllers;

use App\Models\illnesses as ModelsIllnesses;
use Illuminate\Http\Request;
use App\Models\Illnesse;
use App\Http\Requests\IllnessesStoreRequest;

class IllnessesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $illnesses = Illnesse::all();
        return response()->json([
            'illnesses' => $illnesses,
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
     */
    public function store(IllnessesStoreRequest $request)
    {
        try {
            Illnesse::create([
                'name' => $request->name,
            ]);

            return response()->json([
                'messages' => "Illnesses successfully created."
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
        $illness = Illnesse::find($id);
        if (!$illness) {
            return response()->json([
                'message' => 'illness not found.'
            ], 404);
        }
        return response()->json([
            'illness' => $illness
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
    public function update(IllnessesStoreRequest $request, $id)
    {
        try {
            $illness = Illnesse::find($id);
            if (!$illness) {
                return response()->json([
                    'message' => 'illness not found.'
                ], 404);
            }
            // echo "request: $request->name";
            $illness->name = $request->name;
            $illness->save();
            return response()->json([
                'message' => "illness successfully updated."
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
        $illness = Illnesse::find($id);
        if (!$illness) {
            return response()->json([
                'message' => 'illness not found.'
            ], 404);
        }
        $illness->delete();
        return response()->json([
            'message' => "illness succssfully deleted."
        ], 200);
    }
}
