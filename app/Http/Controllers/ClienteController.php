<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes=\App\Cliente::all();
        return View('cliente.index',compact('clientes'));
    }
    public function create()
    { 
        return View('cliente.create');
    }
    public function edit($id_clientes)
    { 
        $cli=\App\Cliente::find($id_clientes);
        return View('cliente.edit',['cli'=>$cli]);
    }
    public function update(Request $request, $id)
    {
        $cli=\App\Cliente::find($id);
        $cli->fill($request->all());
        $cli->save();
        Session::flash('massage','Cliente editado correctamente');
        return redirect::to('/cliente');
    }
    public function destroy($id)
    {
        $cli=\App\Cliente::find($id);
        $cli->delete();
        Session::flash('massage','Cliente editado correctamente');
        return redirect::to('/cliente');
    }
    public function store(Request $request)
    {
         \App\Cliente::create([
             'nombre_cliente'=>$request['nombre_cliente'],
             'apellido_cliente'=>$request['apellido_cliente'],
             'direccion_cliente'=>$request['direccion_cliente'],
             'telefono'=>$request['telefono'],
         ]);
        Session::flash('massage','Cliente insertado correctamente');
       return redirect::to('\cliente');
    }
}