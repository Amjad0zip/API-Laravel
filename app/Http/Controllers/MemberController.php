<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected function sendResponse($data, $status = Response::HTTP_OK)
    {
        $response = [
            "code"=>Response::HTTP_OK,
            "message"=>"success",
            "data"=>$data        ];
        return response()->json($response);
    }
    protected function failedResponse($data, $status = Response::HTTP_NOT_FOUND)
    {
        $response = [
            "code"=>Response::HTTP_NOT_FOUND,
            "message"=>"Failed",
            "data"=>$data        
        ];
        return response()->json($response);
    }
    public function index()
    {
        // 
        $ressource = User::all();
        if(!$ressource){
        return $this->failedResponse($ressource);
    }else{
        return $this->sendResponse($ressource);
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        //
        $user = new user;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $result=$user->save();
        if($result)
        {
        return ["Result"=>"data is saved"];
        }
        else
        {
        return ["Result"=>"operation failed"];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        //
        $user = user::find($email);
        $result=$user->delete();
        if($result)
        {
        return ["Result"=>"data has been deleted".$email];
        }
        else
        {
        return ["Result"=>"operation failed"];
        }
    }
}
