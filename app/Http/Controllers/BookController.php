<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public $books = [
        ['id' => 1, 'title' => 'Journey to the Unknown', 'authorId' => 'A200', 'isbn' => '978-3-16-148410-1', 'publicationYear' => 2018, 'genre' => 'Adventure', 'availableCopies' => 5],
        ['id' => 2, 'title' => 'The Art of Coding', 'authorId' => 'A201', 'isbn' => '978-1-23-456789-2', 'publicationYear' => 2021, 'genre' => 'Technology', 'availableCopies' => 3],
        ['id' => 3, 'title' => 'History Unfolded', 'authorId' => 'A202', 'isbn' => '978-0-12-345678-8', 'publicationYear' => 2019, 'genre' => 'History', 'availableCopies' => 7],
        ['id' => 4, 'title' => 'Beyond the Stars', 'authorId' => 'A203', 'isbn' => '978-9-87-654321-1', 'publicationYear' => 2020, 'genre' => 'Science Fiction', 'availableCopies' => 4],
        ['id' => 5, 'title' => 'Mindfulness Matters', 'authorId' => 'A204', 'isbn' => '978-4-56-789012-4', 'publicationYear' => 2017, 'genre' => 'Self-Help', 'availableCopies' => 6],
    ];

    // public function index() {
    //     $statusCode = http_response_code();
    //     $this->books = collect([]);
    //     $books = collect([]);
    //     if($statusCode == 404 || $statusCode == 500) {
    //         return response()->json([
    //             "message"=> "Can't list all the books"
    //         ], $statusCode);
    //     }
    //     elseif($books->count() > 0) {
    //         return response()->json([
    //             "message"=> "Here is the list of all books",
    //             "data"=> $this->books,
    //         ], 200);
    //     }
    //     else{
    //         return response()->json([
    //             "message"=> "There is not book right now"
    //         ], 200);
    //     }
    // }

    public function index(){
        return response()->json([
            "message"=> "Here is the list of all books",
            "data"=> $this->books,
        ], 200);
    }

    public function oneBook(int $id){
        foreach ($this->books as $book) {
            if($book['id'] === $id) {
                return response() ->json([
                    'data' => $book,
                ], 200);
            };
        }
        return response() ->json([
            'message' => 'Post not found',
        ], 200);
    }

    public function createBook(Request $request) {
        return response()->json([
            "message"=> "Create book successfully",
            "data"=> [
                "id"=> $request->id,
                "title"=> $request->title,
                "authorId"=> $request->authorId,
                "isbn"=> $request->isbn,
                "publicationYear"=> $request->publicationYear,
                "genre"=> $request->genre,
                "availableCopies"=> $request->availableCopies,
            ],
        ], 200);
    }

    public function editBook(int $id, Request $request) {
        foreach ($this->books as $book) {
            if($book['id'] === $id) {
                return response()->json([
                    "message"=> "Edit book successfully",
                    "data"=> [
                        "id"=> $request->id,
                        "title"=> $request->title,
                        "authorId"=> $request->authorId,
                        "isbn"=> $request->isbn,
                        "publicationYear"=> $request->publicationYear,
                        "genre"=> $request->genre,
                        "availableCopies"=> $request->availableCopies,
            
                    ],
                ]);
            }
        }
        return response()->json([
            "message"=> "Edit book is failed",
        ]);
    }

    public function deleteBook(int $id) {
        foreach ($this->books as $book) {
            if($book['id'] === $id) {
                return response()->json([
                    "message"=> "Delete book successfully",
                ], 200);
            }
        }
        return response()->json([
            "message"=> "The book is not avaiable, can't delete the book"
        ], 200);
    }
}
