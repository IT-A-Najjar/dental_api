<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'users' => $users,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = User::where('name', $username)->first();

        if (!$user) {
            return response()->json(['message' => 'اسم المستخدم غير موجود'], 404);
        }

        if (!Hash::check($password, $user->password)) {
            return response()->json(['message' => 'كلمة المرور غير صحيحة'], 401);
        }

        Auth::login($user);


        return response()->json(['message' => 'تم تسجيل الدخول بنجاح']);
    }
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'تم تسجيل الخروج بنجاح']);
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
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'age' => $request->age,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'university' => $request->university,
                'photo' => $request->photo,
                'privilege' => $request->privilege,
            ]);

            return response()->json([
                'messages' => "user successfully created."
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
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'user not found'
            ], 404);
        }
        return response()->json([
            'user' => $user
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
            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'message' => 'user not found.'
                ], 404);
            }
            // echo "request: $request->name";
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->phone_number = $request->phone_number;
            $user->university = $request->university;
            $user->photo = $request->photo;
            $user->privilege = $request->privilege;
            $user->save();
            return response()->json([
                'message' => "user successfully updated."
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
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'user not found.'
            ], 404);
        }
        $user->delete();
        return response()->json([
            'message' => "user succssfully deleted."
        ], 200);
    }
}
