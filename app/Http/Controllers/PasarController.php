<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;


class PasarController extends Controller
{
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama' => 'required',
        ]);
        return $validator;
    }
    
    public function index(Request $req)
    {
        // dd($req);
        return view('pasar.index', [
            'data' => MainController::getAllData(Pasar::class)
        ]);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $this->validateForm($request);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token']);
        $data = MainController::store(Pasar::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
    }

    public function show(Pasar $pasar)
    {
        //
    }

    
    public function edit($id)
    {
        //
        // dd($id);
        return MainController::findId(Pasar::class, $id);
        
    }

    
    public function update(Request $request, $id)
    {
        //
        // dd($id);
        $validate = $this->validateForm($request);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token', '_method']);
        $data = MainController::update(Pasar::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    
    public function destroy($id)
    {
        $destroy = MainController::destroy(Pasar::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}