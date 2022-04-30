<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    //Get all movies
    public function getMovie()
    {
        return response()->json(Movie::all(), 200);
    }

    //Get all movies for id
    public function getMovieID($id)
    {
        $movie = Movie::find($id);
        if (is_null($movie)) {
            return response()->json(["mensaje" => "This movie dosn't Exist"], 404);
        }
        return response()->json($movie = Movie::find($id), 200);
    }

    //Post new movies
    public function addMovie(Request $request)
    {
        $movie = Movie::create($request->all());
        return response($movie, 200);
    }

    //Update movies

    public function updateMovie(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        if (is_null($movie)) {

            return response()->json(["mensaje" => 'Register not found']);
        }
        $movie->update($request->all());

        $response = response($movie, 200);
        return $response;
    }

    //Delete Movies
    public function deleteMovie(Request $request, $id)
    {
        $response = response()->json(["mensaje" => 'Register not found']);

        $movie = Movie::find($id);

        if (is_null($movie)) {
            return $response;
        }

        $movie->delete();
        
        return response()->json(["mensaje"=>"Movie deleted"]);
    }
}
