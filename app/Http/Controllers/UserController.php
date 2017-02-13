<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $user_id
     * @return \Illuminate\Http\Response
     */
    public function index($user_id){
        return view('user', array('user' => User::find($user_id)));
    }

    public function edit($user_id, Request $request){

        $new_email = $request->input('email');
        if(strlen($new_email) > 0)
            Auth::user()->email = $new_email;


        $old_password = Auth::user()->password;
        if(Hash::check($request->input('old_password'), $old_password)) {
            if($request->input('new_password') == $request->input('confirm_password')) { //TODO: laikynai kol validaciju nera jokiu
                $user = User::find($user_id);
                $user->password = Hash::make($request->input('new_password'));
                $user->save();
            }
        }
        else{
            return redirect('user/' . $user_id);
        }
        return redirect('/');
    }

}
