<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Categories;
use Session;
use DB;

class PagesController extends Controller
{
    public function index()
    {
        return view ('pages.index');
        // $data['categories'] =  DB::table('category')->where('id', null)->get();
    }
    public function login(){
        if(Session::has('id')){
            return view('index');
        }else{
            return view('pages/login');
        }
    }

    public function success(){
        if(Session::has('id')){
            return view('success');
        }else{
            return view('pages/login');
        }
    } 
    public function signup()
    {
        return view ('pages.signup');
    }

    public function trackorder()
    {
        return view ('pages.trackorder');
    }

    public function categories()
    {
        $data['categories'] = Categories::where('id', null)->get();
        return $data;
    }
}
