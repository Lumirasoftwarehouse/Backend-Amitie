<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class HeaderController extends Controller
{
    public function createHeader(Request $request)
    {
        $authorization = $request->header('Authorization');
        $signature = $request->header('Signature');

        return response()->json([
            'authorization' => $authorization,
            'signature' => $signature
        ], 200);
    }
}
