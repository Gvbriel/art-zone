<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::get();
        return view('movies', ['movies' => $movies]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'brief_description' => 'required',
            'body' => 'required',
            'cover' => 'required',
        ]);

        Movie::create([
            'title' => $request->title,
            'brief_description' => $request->brief_description,
            'body' => $request->body,
            'cover' => $request->cover,
        ]);

        return back();
    }

    public function show(Request $request){

        $movie = Movie::where('title', $request->title);
        dd($movie->title);
        return view('movie.info', ['movie' => $movie]);
    }
}
