<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PoliticianProfileResource;
use App\Http\Resources\PoliticianResource;
use App\Models\Politician;
use Illuminate\Http\Request;

class PoliticianController extends Controller
{
    public function index() 
    {
        return PoliticianResource::collection(Politician::all());
    }
    
    public function show(Request $request) 
    {
        $id = $request->route('id');
        $politician = Politician::find($id);
        
        return new PoliticianProfileResource($politician);
    }
}
