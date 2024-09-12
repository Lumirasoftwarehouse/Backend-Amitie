<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use GuzzleHttp\Client;

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

    public function register(Request $request)
    {
        $validateData= $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'opd' => 'required',
            'kdkota' => 'required',
            'kdkec' => 'required',
            'kddesa' => 'required',
            'pass' => 'required',
            'repass' => 'required'
        ]);
        // Inisialisasi Guzzle Client
        $client = new Client();
    
        // Ambil username dan password dari .env
        $username = env('USERNAME_AUTH', 'default_username');
        $password = env('PASSWORD_AUTH', 'default_password');
    
        // Membuat signature berdasarkan format YYYYusernameMMpasswordDD
        $now = now(); // Mengambil waktu sekarang
        $YYYY = $now->format('Y');
        $MM = $now->format('m');
        $DD = $now->format('d');
        $signature = sha1($YYYY . $username . $MM . $password . $DD);

        // Header yang dikirim
        $headers = [
            'Signature' => $signature,
            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    
        // Data yang akan dikirim
        $fields = [
            'nik' => $validateData['nik'],
            'nama' => $validateData['nama'],
            'nohp' => $validateData['nohp'],
            'email' => $validateData['email'],
            'opd' => $validateData['opd'],
            'kdkota' => $validateData['kdkota'],
            'kdkec' => $validateData['kdkec'],
            'kddesa' => $validateData['kddesa'],
            'pass' => $validateData['pass'],
            'repass' => $validateData['repass']
        ];
    
        try {
            // Mengirimkan request POST dengan multipart
            $response = $client->post('https://siappws.dipendajatim.go.id/pemda/index.php/user/daftar', [
                'headers' => $headers,
                'form_params' => $fields
            ]);
    
            // ambil response body
            $responseBody = $response->getBody()->getContents();
    
            if ($response->getStatusCode() == 200) {
                return response()->json([
                    'status' => 'Sukses',
                    'body' => json_decode($responseBody),
                ]);
            } else {
                return response()->json([
                    'status' => 'Gagal',
                    'message' => $responseBody
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $validateData= $request->validate([
            'user' => 'required',
            'pass' => 'required',
        ]);
        // Inisialisasi Guzzle Client
        $client = new Client();
    
        // Ambil username dan password dari .env
        $username = env('USERNAME_AUTH', 'default_username'); // Sesuaikan dengan default jika diperlukan
        $password = env('PASSWORD_AUTH', 'default_password'); // Sesuaikan dengan default jika diperlukan
    
        // Membuat signature berdasarkan format YYYYusernameMMpasswordDD
        $now = now(); // Mengambil waktu sekarang
        $YYYY = $now->format('Y');
        $MM = $now->format('m');
        $DD = $now->format('d');
        $signature = sha1($YYYY . $username . $MM . $password . $DD);
    
        $headers = [
            'Signature' => $signature,
            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        // Data yang akan dikirim
        $fields = [
            'user' => $validateData['user'],
            'pass' =>  sha1($validateData['pass'])
        ];
    
        try {
            // Mengirimkan request POST dengan multipart
            $response = $client->post('https://siappws.dipendajatim.go.id/pemda/index.php/user/login', [
                'headers' => $headers,
                'form_params' => $fields
            ]);
    
            // Mendapatkan response body
            $responseBody = $response->getBody()->getContents();
    
            if ($response->getStatusCode() == 200) {
                return response()->json([
                    'status' => 'Sukses',
                    'body' => json_decode($responseBody)
                ]);
            } else {
                return response()->json([
                    'status' => 'Gagal',
                    'message' => $responseBody
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function infoUser(Request $request)
    {
        $validateData= $request->validate([
            'iddevice' => 'required',
            'token' => 'required',
        ]);
        // Inisialisasi Guzzle Client
        $client = new Client();
    
        // Ambil username dan password dari .env
        $username = env('USERNAME_AUTH', 'default_username'); // Sesuaikan dengan default jika diperlukan
        $password = env('PASSWORD_AUTH', 'default_password'); // Sesuaikan dengan default jika diperlukan
    
        // Membuat signature berdasarkan format YYYYusernameMMpasswordDD
        $now = now(); // Mengambil waktu sekarang
        $YYYY = $now->format('Y');
        $MM = $now->format('m');
        $DD = $now->format('d');
        $signature = sha1($YYYY . $username . $MM . $password . $DD);
    
        $headers = [
            'Signature' => $signature,
            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        // Data yang akan dikirim
        $fields = [
            'iddevice' => $validateData['iddevice'],
            'token' =>  $validateData['token']
        ];
    
        try {
            // Mengirimkan request POST dengan multipart
            $response = $client->post('https://siappws.dipendajatim.go.id/pemda/index.php/user/getInfo', [
                'headers' => $headers,
                'form_params' => $fields
            ]);
    
            // Mendapatkan response body
            $responseBody = $response->getBody()->getContents();
    
            if ($response->getStatusCode() == 200) {
                return response()->json([
                    'status' => 'Sukses',
                    'body' => json_decode($responseBody)
                ]);
            } else {
                return response()->json([
                    'status' => 'Gagal',
                    'message' => $responseBody
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function listKota(Request $request)
    {
        // Inisialisasi Guzzle Client
        $client = new Client();
    
        // Ambil username dan password dari .env
        $username = env('USERNAME_AUTH', 'default_username'); // Sesuaikan dengan default jika diperlukan
        $password = env('PASSWORD_AUTH', 'default_password'); // Sesuaikan dengan default jika diperlukan
    
        // Membuat signature berdasarkan format YYYYusernameMMpasswordDD
        $now = now(); // Mengambil waktu sekarang
        $YYYY = $now->format('Y');
        $MM = $now->format('m');
        $DD = $now->format('d');
        $signature = sha1($YYYY . $username . $MM . $password . $DD);
    
        $headers = [
            'Signature' => $signature,
            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    
        try {
            // Mengirimkan request GET dengan multipart
            $response = $client->get('https://siappws.dipendajatim.go.id/pemda/index.php/lokasi/listKota', [
                'headers' => $headers,
            ]);
    
            // Mendapatkan response body
            $responseBody = $response->getBody()->getContents();
    
            if ($response->getStatusCode() == 200) {
                return response()->json([
                    'status' => 'Sukses',
                    'body' => json_decode($responseBody)
                ]);
            } else {
                return response()->json([
                    'status' => 'Gagal',
                    'message' => $responseBody
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function listKec(Request $request)
    {
        $validateData = $request->validate([
            'kdkota' => 'required'
        ]);
        // Inisialisasi Guzzle Client
        $client = new Client();    
        // Ambil username dan password dari .env
        $username = env('USERNAME_AUTH', 'default_username'); // Sesuaikan dengan default jika diperlukan
        $password = env('PASSWORD_AUTH', 'default_password'); // Sesuaikan dengan default jika diperlukan
        // Membuat signature berdasarkan format YYYYusernameMMpasswordDD
        $now = now(); // Mengambil waktu sekarang
        $YYYY = $now->format('Y');
        $MM = $now->format('m');
        $DD = $now->format('d');
        $signature = sha1($YYYY . $username . $MM . $password . $DD);
    
        $headers = [
            'Signature' => $signature,
            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        // Data yang akan dikirim
        $fields = [
            'kdkota' =>  $validateData['kdkota']
        ];
    
        try {
            // Mengirimkan request GET dengan multipart
            $response = $client->post('https://siappws.dipendajatim.go.id/pemda/index.php/lokasi/listKec', [
                'headers' => $headers,
                'form_params' => $fields
            ]);
    
            // Mendapatkan response body
            $responseBody = $response->getBody()->getContents();
    
            if ($response->getStatusCode() == 200) {
                return response()->json([
                    'status' => 'Sukses',
                    'body' => json_decode($responseBody)
                ]);
            } else {
                return response()->json([
                    'status' => 'Gagal',
                    'message' => $responseBody
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function listKel(Request $request)
    {
        $validateData = $request->validate([
            'kdkota' => 'required',
            'kdkec' => 'required',
        ]);
        // Inisialisasi Guzzle Client
        $client = new Client();    
        // Ambil username dan password dari .env
        $username = env('USERNAME_AUTH', 'default_username'); // Sesuaikan dengan default jika diperlukan
        $password = env('PASSWORD_AUTH', 'default_password'); // Sesuaikan dengan default jika diperlukan
        // Membuat signature berdasarkan format YYYYusernameMMpasswordDD
        $now = now(); // Mengambil waktu sekarang
        $YYYY = $now->format('Y');
        $MM = $now->format('m');
        $DD = $now->format('d');
        $signature = sha1($YYYY . $username . $MM . $password . $DD);
    
        $headers = [
            'Signature' => $signature,
            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        // Data yang akan dikirim
        $fields = [
            'kdkota' =>  $validateData['kdkota'],
            'kdkec' =>  $validateData['kdkec']
        ];
    
        try {
            // Mengirimkan request GET dengan multipart
            $response = $client->post('https://siappws.dipendajatim.go.id/pemda/index.php/lokasi/listKel', [
                'headers' => $headers,
                'form_params' => $fields
            ]);
    
            // Mendapatkan response body
            $responseBody = $response->getBody()->getContents();
    
            if ($response->getStatusCode() == 200) {
                return response()->json([
                    'status' => 'Sukses',
                    'body' => json_decode($responseBody)
                ]);
            } else {
                return response()->json([
                    'status' => 'Gagal',
                    'message' => $responseBody
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function infoSurat(Request $request)
    {
        $validateData = $request->validate([
            'iddevice' => 'required',
            'token' => 'required',
            'noentri' => 'required',
            'kdsamsat' => 'required',
        ]);
        // Inisialisasi Guzzle Client
        $client = new Client();    
        // Ambil username dan password dari .env
        $username = env('USERNAME_AUTH', 'default_username'); // Sesuaikan dengan default jika diperlukan
        $password = env('PASSWORD_AUTH', 'default_password'); // Sesuaikan dengan default jika diperlukan
        // Membuat signature berdasarkan format YYYYusernameMMpasswordDD
        $now = now(); // Mengambil waktu sekarang
        $YYYY = $now->format('Y');
        $MM = $now->format('m');
        $DD = $now->format('d');
        $signature = sha1($YYYY . $username . $MM . $password . $DD);
    
        $headers = [
            'Signature' => $signature,
            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        // Data yang akan dikirim
        $fields = [
            'iddevice' =>  $validateData['iddevice'],
            'token' =>  $validateData['token'],
            'noentri' =>  $validateData['noentri'],
            'kdsamsat' =>  $validateData['kdsamsat']
        ];
    
        try {
            // Mengirimkan request GET dengan multipart
            $response = $client->post('https://siappws.dipendajatim.go.id/pemda/index.php/surat/getInfoToEntri', [
                'headers' => $headers,
                'form_params' => $fields
            ]);
    
            // Mendapatkan response body
            $responseBody = $response->getBody()->getContents();
    
            if ($response->getStatusCode() == 200) {
                return response()->json([
                    'status' => 'Sukses',
                    'body' => json_decode($responseBody)
                ]);
            } else {
                return response()->json([
                    'status' => 'Gagal',
                    'message' => $responseBody,
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Gagal',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function listSurat(Request $request)
    {
        $validateData = $request->validate([
            'iddevice' => 'required',
            'token' => 'required'
        ]);
        // Inisialisasi Guzzle Client
        $client = new Client();    
        // Ambil username dan password dari .env
        $username = env('USERNAME_AUTH', 'default_username'); // Sesuaikan dengan default jika diperlukan
        $password = env('PASSWORD_AUTH', 'default_password'); // Sesuaikan dengan default jika diperlukan
        // Membuat signature berdasarkan format YYYYusernameMMpasswordDD
        $now = now(); // Mengambil waktu sekarang
        $YYYY = $now->format('Y');
        $MM = $now->format('m');
        $DD = $now->format('d');
        $signature = sha1($YYYY . $username . $MM . $password . $DD);
    
        $headers = [
            'Signature' => $signature,
            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        // Data yang akan dikirim
        $fields = [
            'iddevice' =>  $validateData['iddevice'],
            'token' =>  $validateData['token']
        ];
    
        try {
            // Mengirimkan request GET dengan multipart
            $response = $client->post('https://siappws.dipendajatim.go.id/pemda/index.php/surat/listSurat', [
                'headers' => $headers,
                'form_params' => $fields
            ]);
    
            // Mendapatkan response body
            $responseBody = $response->getBody()->getContents();
    
            if ($response->getStatusCode() == 200) {
                return response()->json([
                    'status' => 'Sukses',
                    'body' => json_decode($responseBody)
                ]);
            } else {
                return response()->json([
                    'status' => 'Gagal',
                    'message' => $responseBody,
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Gagal',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
