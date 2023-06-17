<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $id_usuario = $request->query('id_usuario');
    
        $usuario = Usuario::where('id_usuario', $id_usuario)->first();
    
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        return response()->json($usuario, 200);
    }
    






    public function store(Request $request)
{
    $usuario = new Usuario;
    $usuario->fill($request->all());
    $usuario->save();

    return response()->json($usuario, 201);
}





    public function show(Request $request)
    {
        $id_usuario = $request->query('id_usuario');
    
        $usuario = Usuario::where('id_usuario', $id_usuario)->first();
    
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        return response()->json($usuario, 200);
    }
    







    
    public function update(Request $request, $id_usuario)
    {
        $usuario = Usuario::findOrFail($id_usuario);
        $usuario->fill($request->all());
        $usuario->save();
    
        return response()->json($usuario);
    }
    






    public function destroy($id_usuario)
    {
        $usuario = Usuario::findOrFail($id_usuario);
        $usuario->delete();
    
        return response()->json(['message' => 'Usuario eliminado']);
    }
    
}