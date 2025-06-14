<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public $users = [
        ['id' => 'U100', 'name' => 'Alice Johnson', 'email' => 'alice.johnson@example.com', 'membershipDate' => '2022-05-10'],
        ['id' => 'U101', 'name' => 'Michael Smith', 'email' => 'michael.smith@example.com', 'membershipDate' => '2021-08-21'],
        ['id' => 'U102', 'name' => 'Emily Davis', 'email' => 'emily.davis@example.com', 'membershipDate' => '2023-01-14'],
        ['id' => 'U103', 'name' => 'David Wilson', 'email' => 'david.wilson@example.com', 'membershipDate' => '2020-11-30'],
        ['id' => 'U104', 'name' => 'Sophia Martinez', 'email' => 'sophia.martinez@example.com', 'membershipDate' => '2024-02-07'],
    ];

    public function index(){
        return response()->json([
            "message"=> "Get the list of users successfully",
            "data"=> $this->users,
        ], 200);
    }

    public function oneUser(String $id){
        foreach($this->users as $user){
            if($user['id'] ===  $id){
                return response()->json([
                    "message"=> "Get the user successfully",
                    "data"=> $user,
                ], 200);
            }
        }
        return response()->json([
            "message"=> "Get the user is failed",
        ], 200);
    }

    public function createUser(Request $request){
        return response()->json([
            "message"=> "Create author successfully",
            "data"=> [
                'id' => $request->id,
                'name' => $request->name, 
                'email' => $request->email, 
                'membershipDate' => $request->membershipDate
            ]
        ], 200);
    }

    public function editUser(String $id, Request $request){
        foreach($this->users as $user) {
            if($user['id'] === $id){
                return response()->json([
                    "message"=> "Edit user successfully",
                    "data"=> [
                        'id' => $request->id,
                        'name' => $request->name, 
                        'email' => $request->email, 
                        'membershipDate' => $request->membershipDate
                    ]
                ], 200);
            }
        }
        return response()->json([
            "message"=> "Edit user is failed",
        ], 200);
    }

    public function deleteUser(String $id){
        foreach($this->users as $user){
            if($user['id'] === $id){
                return response()->json([
                    "message"=> "Delete user successfully",
                ], 200);
            }
        }
        return response()->json([
            "message"=> "The user is not avaiable, can't delete user is failed",
        ], 200);
    }
}
