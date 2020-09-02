<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;
use Session;
use DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        Validator::make($request->all(),
            [
                'email' => 'required',
                'password' => 'required'
            ]
        )->validate();

        $email = $request->input('email');
        $password = $request->input('password');

        $result = Users::select('*')
                    ->where('email', $email)
                    ->where('password', $password)
                    ->get();
        
        if(count($result) > 0){

            session()->put('id', $result[0]->id);
            session()->save();

            $response['stat']='success';
            $response['msg']='Login Successfully.';
            echo json_encode($response);
        }else{
            $response['stat']='error';
            $response['msg']='Invalid email or password.';
            echo json_encode($response);
        }
    }

    
    public function logout()
    {
        Session::forget('id');
        return view('login');
    }
}