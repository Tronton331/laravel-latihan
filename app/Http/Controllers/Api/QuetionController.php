<?php

namespace App\Http\Controllers\Api;

use App\Models\Quetion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Validator;

class QuetionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $question = Quetion::get();
        return response()->json(["message"=>"success", "Quetions"=>$question], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "question"=>"required"
        ]);
        if($validator->fails()) return response()->json(["message"=>"Invalid Field", "error"=>$validator->errors()], 422);
        $input = $request->all();
        $question = Quetion::create($input);
        Log::info($question);
        return response()->json(["message"=>"success", "Quetion"=>$question], 201);
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
    public function destroy(string $id)
    {
        //
    }
}
