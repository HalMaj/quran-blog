<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\quran;
use Illuminate\Support\Facades\store;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $userId = auth::id();
        $user = User::find($userId);
       
        $qurans = quran::orderBy('created_at', 'desc') -> paginate(5);
       
        if($userId == 3)
            return view('home', compact('qurans'));
    
        else 
            return view('posts.index', compact('qurans')); 
        
    }

    public function postAccept($id)
    {
        quran::find($id)->update(['active'=>1]);
        $qurans = quran::all();

        return view('home',compact('qurans'));
    }
}
