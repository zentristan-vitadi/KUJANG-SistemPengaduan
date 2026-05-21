<?php

namespace App\Http\Controllers;
use App\Models\response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    //
    public function index()
    {
        $response = response::all();
        return view('response.index', compact('response'));
    }
}
