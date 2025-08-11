<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUser(Request $request) {
        $user = User::find($request->id);
        return response()->json([
            'user' => $user
        ], 200);
    }

    function getAllUsers(Request $request){
        $users = User::all();
        return response()->json([
            'users' => $users
        ], 200);
    }

    function updateUser(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ], 200);
    }

    function deleteUser(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully'
        ], 200);
    }
}
