<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movies;
use App\Models\user;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u      = auth()->user();
        $count  = movies::where('user_id', $u->id)->count();
        $movies = movies::where('user_id', $u->id)->get();
        return view('user')->with('movies', $movies)->with('user', $u)->with('count', $count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usr            = user::find($request->id);
        $usr->name      = $request->name;
        $usr->email     = $request->email;
        if ($usr->password) {
            $usr->password  = bcrypt($request->password);
        }
        $usr->save();
        return redirect('/user')->with('success', 'Profile Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user    = auth()->user();
        return view('userdetails')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user    = auth()->user();
        return view('userdetails')->with('user', $user);
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
        dd('a');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
