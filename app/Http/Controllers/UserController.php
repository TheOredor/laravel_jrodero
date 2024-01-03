<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            // validate the request
            $rules = [
                'name' => 'sometimes|required|alpha:ascii',
                'email' => 'sometimes|required|email|unique:users|regex:/.+\@.+\..+/',
                'password' => 'sometimes|required|string|min:8',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'message' => 'Errors in fields validation',
                    'error' => $validator->errors()
                ];
                return response()->json($data, Response::HTTP_BAD_REQUEST);
            }


            // put default values if not set in request body

            $user->username = $request->input('username', $user->username);
            $user->first_name = $request->input('first_name', $user->first_name);
            $user->last_name = $request->input('last_name', $user->last_name);
            $user->email = $request->input('email', $user->email);
            if ($request->input('password')) {
                $user->password_hash = Hash::make($request->input('password'));
            }
            $user->save();


            $data = [
                'message' => 'Users successfully updated',
                'user' => $user
            ];
            return response()->json($data);
        } catch (\Throwable $error) {
            $data = [
                'message' => 'Error while updating user',
                'error' => $error->getMessage()
            ];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            $data = [
                'message' => 'Users successfully deleted',
                'user' => $user
            ];
            return response()->json($data, Response::HTTP_OK);
        } catch (\Throwable $error) {
            $data = [
                'message' => 'Error while updating user',
                'error' => $error->getMessage()
            ];
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
