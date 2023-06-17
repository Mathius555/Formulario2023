<?php
     
     use Illuminate\Http\Request;
     use Illuminate\Support\Facades\Route;
     use App\Http\Controllers\UsuarioController;
     
     Route::GET('usuario', [UsuarioController::class, 'index']);//FUNCIONA 
     Route::POST('usuario', [UsuarioController::class, 'store']);
     Route::GET('usuario/{id_usuario}', [UsuarioController::class, 'show']); //FUNCIONA 
     Route::PUT('usuario/{id_usuario}', [UsuarioController::class, 'update']);
     Route::DELETE('usuario/{id_usuario}', [UsuarioController::class, 'destroy']);//FUNCIONA 
     