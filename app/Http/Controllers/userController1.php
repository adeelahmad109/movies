<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\movies;
class userController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {              
        $u      = auth()->user();            
        $count  = movies::where('user_id',$u->id)->count();
        $movies = movies::where('user_id',$u->id)->get();
        return view('user')->with('movies', $movies)->with('user',$u)->with('count',$count);
    }
    public function show($id)
    {
        
    }
}
