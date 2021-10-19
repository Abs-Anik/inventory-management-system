<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = !empty(Auth::user()->is_admin);
        if($user == 1 ){
            return redirect()->route('admin.home');
        }else{
            return view('auth.login');
        }
    }

}
