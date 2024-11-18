<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\HeaderController;

Route::group([
    'prefix' => 'auth'
  ], function () {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::group([
      'middleware' => 'auth:api'
    ], function(){
      Route::post('logout', [AuthController::class,'logout']);
      Route::post('refresh', [AuthController::class, 'refresh']);
      Route::get('me', [AuthController::class,'me']);
      
      Route::group([
        'middleware' => 'auth:api'
      ], function () {

      });
      
    });
  });

  Route::group([
    'prefix' => 'nota'
  ], function () {
    Route::get('export/{id}', [NoteController::class,'exportPdf']);
    Route::get('list', [NoteController::class,'listNote']);
    Route::get('detail/{id}', [NoteController::class,'detailNota']);
    Route::post('create', [NoteController::class,'createNote']);
    Route::post('update', [NoteController::class,'updateNote']);
    Route::delete('delete/{id}', [NoteController::class,'deleteNote']);
    Route::delete('delete-pelanggan/{id}', [NoteController::class,'deletePelanggan']);
    
  });

  Route::post('create-new', [NoteController::class,'createNewNote']);
  

  Route::middleware('auth.basic')->group(function () {
    Route::post('header', [HeaderController::class,'createHeader']);
  });
  
  Route::post('register', [HeaderController::class,'register']);
  Route::post('login', [HeaderController::class,'login']);
  Route::post('info-user', [HeaderController::class,'infoUser']);
  Route::post('list-kota', [HeaderController::class,'listKota']);
  Route::post('list-kec', [HeaderController::class,'listKec']);
  Route::post('list-kel', [HeaderController::class,'listKel']);

  Route::post('info-surat', [HeaderController::class,'infoSurat']);
  Route::post('entri-surat', [HeaderController::class,'entriSurat']);
  Route::post('list-surat', [HeaderController::class,'listSurat']);
  Route::post('status-surat', [HeaderController::class,'statusSurat']);
  Route::post('laporan-petugas', [HeaderController::class,'LaporanPetugas']);
