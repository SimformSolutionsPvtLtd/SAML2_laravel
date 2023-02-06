<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AcsController extends Controller
{
    public function samlResponse(Request $request):Response
    {
        return response(base64_decode($request->SAMLResponse), 200)->header('Content-Type', 'application/xml');
    }
}
