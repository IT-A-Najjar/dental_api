<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comments::all();
        return response()->json([
            'Comments' => $comments,
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
            Comments::create([
                'content' => $request->content,
                 'consultation_id' => $request->consultation_id,
            ]);

            return response()->json([
                'messages' => "Comment successfully created."
            ], 200);
            // return $request;
        } catch (\Exception $e) {
            return response()->json([
                'message' => "something went really wrong!"
                // 'message' => $request
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
        $comment = Comments::find($id);
        if(!$comment){
            return response()->json([
                'message' => 'comment not found'
            ], 404);
        }
        return response()->json([
            'comment' => $comment
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        try {
            $comment = Comments::find($id);
            if (!$comment) {
                return response()->json([
                    'message' => 'comment not found.'
                ], 404);
            }
            // echo "request: $request->name";
            $comment->content = $request->content;
            $comment->consultation_id = $request->consultation_id;
            $comment->save();
            return response()->json([
                'message' => "comment successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comments::find($id);
        if (!$comment) {
            return response()->json([
                'message' => 'comment not found.'
            ], 404);
        }
        $comment->delete();
        return response()->json([
            'message' => "comment succssfully deleted."
        ], 200);
    }
}
