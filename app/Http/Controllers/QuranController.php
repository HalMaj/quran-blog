<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quran;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\store;

class QuranController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //every request need to be auth
        //$this->middleware('auth');

        //except
       $this->middleware('auth', ['except'=>['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           
        //$qurans = quran::orderBy('created_at', 'desc')-> paginate(3);
        
        $qurans = quran::where('active',1)-> paginate(3);
       
        return view('posts.index', compact('qurans'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail | required | min:3',
            'body' => 'required',
            'photo' => 'required|max:2048',
        ]);

        $filename=time().'.'.$request->photo->getClientOriginalExtension();

        $request->photo->move(public_path('storage'), $filename);

        //current user
        $user = Auth::user();

        //create quran
        $quran = new quran;
        $quran->title = $request->input('title');
        $quran->body = $request->input('body');
        $quran->photo = $filename;
        

        $now = date('Ymdhis');
        $quran->slug = str_replace(' ', '-', strtolower($quran->title).'-'.$now);

        $quran->user_id = $user->id;

        //current user id
        $userId = Auth::id();

        $quran->save();
        return redirect('/quran')->with('success', 'Post Created Successfully >>> Please, Wait THE ADMIN to Accept Your Post');
           
    }
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $quran = quran::where('slug', $slug)->first();
        return view('posts.show', compact('quran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quran = quran::find($id);

        //current user id
        $userId = Auth::id();
        if ($quran->user_id !== $userId){
            return redirect('/quran')->with('error', 'That is not your post yaaaa!!!!');
        }
       
        return view('posts.edit', compact('quran'));

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
        $request->validate([
            'title' => 'bail | required | min:3',
            'body' => 'required',
            'photo' => 'required|max:2048',
        ]);

        //$filename=time().'.'.$request->photo->getClientOriginalExtension();

       // $request->photo->move(public_path('storage'), $filename);

        //update quran
        $quran = quran::find($id);
        $quran->title = $request->input('title');
        $quran->body = $request->input('body');
        //$quran->photo = $filename;
        $quran->photo = $request->input('photo');

        //current user id
        $userId = Auth::id();
        if ($quran->user_id !== $userId){
            return redirect('/quran/'.$quran->id)->with('error', 'That is not your post yaaaa!!!!');
            //return redirect('/quran/{{$quran->slug}}')->with('error', 'That is not your post yaaaa!!!!');
        }
        
        $quran->save();

        return redirect('/quran')->with('success', 'Post Updated Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quran = quran::find($id);

        //current user id
        $userId = Auth::id();
        if ($quran->user_id !== $userId){
            return redirect('/quran/')->with('error', 'That is not your post yaaaa!!!!');
        }

        $quran->delete();

        return redirect('/quran/')->with('success', 'Post Deleted Successfully');
    }

}
