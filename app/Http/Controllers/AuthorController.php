<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public $authors = [
        ['id' => 'A200', 'name' => 'John Emerson', 'bio' => 'A bestselling author specializing in adventure novels.', 'nationality' => 'American'],
        ['id' => 'A201', 'name' => 'Sophia Lee', 'bio' => 'An expert in software development and technology writing.', 'nationality' => 'Canadian'],
        ['id' => 'A202', 'name' => 'Carlos Rodriguez', 'bio' => 'A historian passionate about uncovering ancient civilizations.', 'nationality' => 'Spanish'],
        ['id' => 'A203', 'name' => 'Emily Tan', 'bio' => 'A sci-fi writer known for her futuristic and cosmic adventures.', 'nationality' => 'Australian'],
        ['id' => 'A204', 'name' => 'Liam Patel', 'bio' => 'A psychologist and self-help author focusing on mindfulness.', 'nationality' => 'British'],
    ];

    public function index() {
        return response()->json([
            "message"=> "Get list of all authors successfully",
            "data"=> $this->authors,
        ]);
    }

    public function oneAuthor(String $id){
        foreach($this->authors as $author) {
            if($author['id'] === $id){
                return response()->json([
                    "message"=> "Get the author successfully",
                    "data"=> $author,
                ], 200);
            }
        }
        return response()->json([
            "message"=> "Get the author is failed"
        ], 200);
    }

    public function createAuthor(Request $request){
        return response()->json([
            "message"=> "Create author successfully",
            "data"=> [
                'id' => $request->id,
                'name' => $request->name, 
                'bio' => $request->bio, 
                'nationality' => $request->nationality
            ]
        ], 200);
    }

    public function editAuthor(String $id, Request $request){
        foreach($this->authors as $author) {
            if($author['id'] === $id){
                return response()->json([
                    "message"=> "Edit author successfully",
                    "data"=> [
                        'id' => $request->id,
                        'name' => $request->name, 
                        'bio' => $request->bio, 
                        'nationality' => $request->nationality
                    ]
                ], 200);
            }
        }
        return response()->json([
            "message"=> "Edit author is failed",
        ], 200);
    }

    public function deleteAuthor(String $id){
        foreach($this->authors as $author){
            if($author['id'] === $id){
                return response()->json([
                    "message"=> "Delete author successfully",
                ], 200);
            }
        }
        return response()->json([
            "message"=> "Delete author is failed",
        ], 200);
    }
}
