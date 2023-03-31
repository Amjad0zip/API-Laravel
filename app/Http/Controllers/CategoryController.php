<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected function sendResponse($data, $status = Response::HTTP_OK)
    {
        $response = [
            "code"=>$status,
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
    public function testData(Request $request)
    {
        $rules = array(
                'name' => 'required',
                'category' => 'required',
                'sku' => 'required',
                'price' => 'required',
                'quantity' => 'required'
        );

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return $validator->errors();
        }else{
            $Device = new Device;
            $Device->name=$request->name;
            $Device->category=$request->category;
            $Device->sku=$request->sku;
            $Device->price=$request->price;
            $Device->quantity=$request->quantity;
            $ressource=$Device->save();
            if($ressource) {
                return ["Result"=> "Data has been saved"];
            }
            else {
                return ["Result"=> "Operations Failed"];
            }
        }
    }

    public function index()
    {
        //
        $ressource = Device::all();
        if(!$ressource){
            return $this->failedResponse($ressource);
        }
        else{
            return $this->sendResponse($ressource,Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $Device = new Device;
        $Device->name=$request->name;
        $Device->category=$request->category;
        $Device->sku=$request->sku;
        $Device->price=$request->price;
        $Device->quantity=$request->quantity;
        $ressource=$Device->save();
        if($ressource)
        {
        return $this->sendResponse($ressource);
        }
        else
        {
        return $this->failedResponse($ressource);
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
        $ressource = Device::find($id);

        if(!$ressource){
            return $this->failedResponse($ressource);
        }
        else 
        {
            return $this->sendResponse($ressource);
        }
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
    public function update(Request $request)
    {
        //
    $ressource = Device::find($request->id);
    if(!$ressource){
        return $this->failedResponse($ressource);
    }
    else{
        $Device = Device::find($request->id);
        $Device->name=$request->name;
        $Device->category=$request->category;
        $Device->sku=$request->sku;
        $Device->price=$request->price;
        $Device->quantity=$request->quantity;
        $result=$Device->save();
        if($result)
        { 
            return $this->sendResponse($ressource);
        }
        else
        {
        return ["Result"=>"operation failed"];
        }
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ressource = Device::find($id);
        if(!$ressource){
            return $this->failedResponse($ressource);
        }
        else{
        $Device = Device::find($id);
        $result=$Device->delete();
        if($result)
        {
        return $this->sendResponse($ressource);
        }
        else
        {
        return ["Result"=>"operation failed"];
        }
    }
    }
}
