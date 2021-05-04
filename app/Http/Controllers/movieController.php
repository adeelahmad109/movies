<?php

namespace App\Http\Controllers;

use App\Mail\movies as MailMovies;
use App\Models\movies;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movie=movies::all();
        
        return view('home')->with('movies', $movie);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mov            = new movies();
        $mov->name      = $request->input('name');
        $mov->cast      = $request->input('cast');
        $mov->status    = 'no';
              
        $mov->save();
        Mail::to(auth()->user()->email)->send(new MailMovies);
        return redirect('/movies')->with('success', 'New Movie added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies = movies::where('id', $id)->first();
        return view('moviedetails')->with('movie',$movies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $usr    = auth()->user()->id;
        $c      = movies::where('user_id',$usr)->count();
        if($c > 3){
            return redirect('/movies')->with('danger', 'You cannot book more than 4 movies');
           
        }
        else{
            $mov            = movies::find($id);
            $mov->user_id   = auth()->user()->id;
            $mov->status    = 'yes';
            $mov->date      = Carbon::now();
            $mov->rdate      = Carbon::now()->addDays(3); 
            $mov->save();
            return redirect('/movies')->with('success', 'Movies Rented');
        }
    }
    public function medit($id)
    {
        $mov= movies::find($id);
        $mov->user_id='';
        $mov->status = 'no';
        $mov->save();
        return redirect('/user')->with('success', 'Movie Returned');
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
        //
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
    public function search(Request $request){
        $search = $request->input('search');
        $movie = movies::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();
        return view('movies', compact('movie'));
    }
}
