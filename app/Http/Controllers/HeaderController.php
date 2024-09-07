<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class HeaderController extends Controller
{
    public function createHeader(Request $request)
    {
        // Ambil header 'Authorization' dan 'Signature' dari request
        $authorization = $request->header('Authorization');
        $signature = $request->header('Signature');

        // Validasi apakah header ada
        // if (!$authorization || !$signature) {
        //     return response()->json([
        //         'message' => 'Authorization or Signature header is missing'
        //     ], 400);  // Bad Request jika header tidak ditemukan
        // }

        // // Simpan header ke dalam database
        // Note::create([
        //     'authorization' => $authorization, 
        //     'signature' => $signature
        // ]);

        return response()->json([
            'authorization' => $authorization,
            'signature' => $signature
        ], 201);  // Response dengan status 201 Created
    }
}
