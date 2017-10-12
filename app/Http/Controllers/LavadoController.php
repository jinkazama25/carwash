<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
class LavadoController extends Controller
{
    public function index()
    {
        /*$users = DB::table('usuarios')
            ->join('carros', 'usuarios.id', '=', 'carros.id_usuario')
            ->join('lavados', 'carros.id', '=', 'lavados.id_carro')
            ->select('usuarios.*', 'carros.modelo', 'lavados.monto','carros.placa','lavados.fecha_lavado')
            ->where('usuarios.id',$id)*/
            
        
        $lavados=DB::table('usuarios')->join('lavados','usuarios.id','=','lavados.id_usuario')->join('carros','carros.id','=','lavados.id_carro')->join('clientes','clientes.id','=','carros.id_cliente')->select('usuarios.nombre_usuario','usuarios.apellido_usuario','lavados.*','clientes.nombre_cliente','clientes.apellido_cliente')->get();
            
        //$lavados=\App\Lavado::all();
        return View('lavado.index',compact('lavados'));
    }

    public function create()
    { 
        $carros=\App\Carro::all();
        $usuarios=\App\Usuario::all();
        return View('lavado.create',compact('carros','usuarios'));
    }
  
    public function edit($id)
    { 
        $lavados =\App\Lavado::find($id);
        return view('lavado.edit',['lav'=>$lavados]);
    }
    public function update(Request $request, $id)
    {
        $lav=\App\Lavado::find($id);
        $lav->fill($request->all());
        $lav->save();
        Session::flash('massage','Lavado editado correctamente');
        return redirect::to('/lavado');
    }
    public function destroy($id)
    {
        $car=\App\Lavado::find($id);
        $car->delete();
        Session::flash('massage','Lavado editado correctamente');
        return redirect::to('/lavado');
    }
    public function store(Request $request)
    {
         \App\Lavado::create([
             'fecha_lavado'=>$request['fecha_lavado'],
             'monto'=>$request['monto'],
             'id_carro'=>$request['id_carro'],
             'id_usuario'=>$request['id_usuario'],
         ]);
        Session::flash('massage','Lavado insertado correctamente');
       return redirect::to('\lavado');
    }

    public function lista()
    {
        
         $hoy=(date("Y-m-d"));
        
         $lista = DB::table('lavados')
                     ->select(DB::raw('sum(lavados.monto) as total,usuarios.nombre_usuario,lavados.fecha_lavado'))
                     ->join('usuarios', 'lavados.id_usuario', '=', 'usuarios.id')
                     ->groupBy('usuarios.nombre_usuario','lavados.fecha_lavado')
                     ->where('fecha_lavado',$hoy)
                     ->get();   
        $monto=\App\Lavado::where('fecha_lavado',$hoy)->sum('monto');            
        
        return view('lavado.lista',compact('lista','monto')); 
        
        /* $usuario=\App\Usuario::where('rol','usuario')->get();
     

        return View('reporte.index',compact('usuario'));*/
        
    }
    public function fecha()
    {
        $hoy=(date("Y-m-d"));  
        $fecha=DB::table('usuarios')->join('lavados','usuarios.id','=','lavados.id_usuario')
        ->where('fecha_lavado',$hoy)->get();
        return view('lavado.fecha',compact('fecha')); 
        /*echo $hoy=(date("Y-m-d"));
        
        $fecha=\App\Lavado::where('fecha_lavado',$hoy)->get();
       // $lista=\App\Lavado::where('fecha_lavado',$hoy)->get();
        return view('lavado.fecha',compact('fecha')); */
        
    }

}