<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;

class CarroController extends Controller
{
    public function index()
    {
        $carros=DB::table('clientes')->join('carros','carros.id_cliente','=','clientes.id')->select('clientes.*','carros.*')->get();
        //$usua
        return View('carro.index',compact('carros'));
    }

    public function create()
    { 
        $clientes=\App\Cliente::all();
        return View('carro.create',compact('clientes'));
    }
  
    public function edit($id)
    { 
        $carros =\App\Carro::find($id);
        $listaCliente=\App\Cliente::all();
        //$listaCliente=DB::table('clientes')->join('carros','carros.id_cliente','=','clientes.id')->select('clientes.*','carros.*')->get();
        return view('carro.edit',['car'=>$carros,'listaCliente'=>$listaCliente]);
    }
    public function update(Request $request, $id_carro)
    {
        $car=\App\Carro::find($id_carro);
        $car->fill($request->all());
        $car->save();
        Session::flash('massage','carro editado correctamente');
        return redirect::to('/carro');
    }
    public function destroy($id)
    {
        $car=\App\Carro::find($id);
        $car->delete();
        Session::flash('massage','Carro editado correctamente');
        return redirect::to('/carro');
    }
    public function store(Request $request)
    {
         \App\Carro::create([
             'placa'=>$request['placa'],
             'marca'=>$request['marca'],
             'modelo'=>$request['modelo'],
             'id_cliente'=>$request['id_cliente'],
         ]);
        Session::flash('massage','Automovil insertado correctamente');
      return redirect::to('\carro');
    }
    
}