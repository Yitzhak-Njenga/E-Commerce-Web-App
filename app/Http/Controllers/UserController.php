<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){



        $users = User::where(['email'=>$request->email])->first();
        $password = User::where(['password'=>$request->password])->first();


        if (!$users|| !Hash::check($request->password,$users->password)){
            return  "Usere does not exists";
        }else {

            $request->session()->put('user',$request);
            return redirect('/product');
        }
    }
}
