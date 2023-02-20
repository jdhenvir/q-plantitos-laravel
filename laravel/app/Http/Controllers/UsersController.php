<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\User;

class UsersController extends Controller
{
    //
    function getUsers(){
        return User::all();
    }

    function getUserbyid($id){
        return User::find($id);
    }

    function createUser(Request $request){
        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->mobilenumber = $request->mobilenumber;
        $user->email = $request->email;
        $user->password = $request->password;
        // $user->address = $request->address;

        if($user->save()){
            return 1;
        }else{
            return response()->json(['message'=>'Authentacation Failed'],400);
        }
    }

    function getUserPassword($id){
        $user = User::find($id);
        return $user->password;
    }

    function checkUserEmail($email){
        // $user = DB::table('users')->where('email', '=', $email)->get();
        $email = User::where('email', '=' , $email)->get();
        if($user->count() > 0){
            return 1;
        }else{
            return 2;
        }
    }

    function authenthecate(Request $request){
        $user = DB::table('users')->where('email', '=', $request->email)->where('password', '=', $request->password)->get();
        if($user->count() > 0){
           return json_encode($user);
        }
        return response()->json(['message'=>'Authentacation Failed'],400);
    }
}
