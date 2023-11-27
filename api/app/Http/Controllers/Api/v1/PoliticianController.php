<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PoliticianResource;
use App\Models\Politician;
use Illuminate\Http\Request;

class PoliticianController extends Controller
{
    public function index() 
    {
        return PoliticianResource::collection(Politician::all());
    }
}
