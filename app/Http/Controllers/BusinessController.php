<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Business::with('user')->get();
        return response()->json([
            'business' => $business,
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
            Business::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $request->image,
                'user_id' => $request->user_id,
            ]);

            return response()->json([
                'messages' => "business successfully created."
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
        $business = Business::find($id);
        if (!$business) {
            return response()->json([
                'message' => 'business not found'
            ], 404);
        }
        return response()->json([
            'business' => $business
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
            $business = Business::find($id);
            if (!$business) {
                return response()->json([
                    'message' => 'business not found.'
                ], 404);
            }
            // echo "request: $request->name";
            $business->title = $request->title;
            $business->description = $request->description;
            $business->image = $request->image;
            $business->user_id = $request->user_id;
            $business->save();
            return response()->json([
                'message' => "business successfully updated."
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
        $business = Business::find($id);
        if (!$business) {
            return response()->json([
                'message' => 'business not found.'
            ], 404);
        }
        $business->delete();
        return response()->json([
            'message' => "business succssfully deleted."
        ], 200);
    }
}
