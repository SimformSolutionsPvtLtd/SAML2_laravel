<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcsController extends Controller
{
    public function samlResponse(Request $request)
    {
        return response(base64_decode($request->SAMLResponse), 200)->header('Content-Type', 'application/xml');
    }
}
