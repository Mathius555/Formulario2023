<?php
     
     use Illuminate\Http\Request;
     use Illuminate\Support\Facades\Route;
     use App\Http\Controllers\UsuarioController;
     
     Route::GET('usuario', [UsuarioController::class, 'index']);//FUNCIONA  http://localhost:8000/api/usuario/?id_usuario=202
     Route::POST('usuario', [UsuarioController::class, 'store']);//FUNCIONA  http://localhost:8000/api/usuario/
     Route::GET('usuario/{id_usuario}', [UsuarioController::class, 'show']); //FUNCIONA http://localhost:8000/api/usuario/?id_usuario=202
     Route::PUT('usuario/{id_usuario}', [UsuarioController::class, 'update']);//FUNCIONA  http://localhost:8000/api/usuario/202
     Route::DELETE('usuario/{id_usuario}', [UsuarioController::class, 'destroy']);//FUNCIONA http://localhost:8000/api/usuario/202
     