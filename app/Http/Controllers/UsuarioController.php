<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios=\App\Usuario::all();
        return View('usuario.index',compact('usuarios'));
    }
    public function create()
    { 
        return View('usuario.create');
    }
    public function edit($id_usuario)
    { 
        $user=\App\Usuario::find($id_usuario);
        return View('usuario.edit',['user'=>$user]);
       
    }
    public function update(Request $request, $id)
    {
        $user=\App\Usuario::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('massage','Usuario editado correctamente');
        return redirect::to('/usuario');
    }
    public function destroy($id)
    {
        $user=\App\Usuario::find($id);
        $user->delete();
        Session::flash('massage','Usuario editado correctamente');
        return redirect::to('/usuario');
    }
    public function store(Request $request)
    {
         \App\Usuario::create([
             'nombre_usuario'=>$request['nombre_usuario'],
             'apellido_usuario'=>$request['apellido_usuario'],
             'direccion_usuario'=>$request['direccion_usuario'],
             'dni'=>$request['dni'],
             'rol'=>$request['rol'],
             'email'=>$request['email'],
             'password'=>$request['password'],
         ]);
        Session::flash('massage','Usuario insertado correctamente');
       return redirect::to('\usuario');
    }
}