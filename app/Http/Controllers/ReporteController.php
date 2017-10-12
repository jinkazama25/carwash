<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use PDF;
//use BD;
use DB;
class ReporteController extends Controller
{
   public function index()
    {
       
        $usuario=\App\Usuario::where('rol','usuario')->get();
     
        return View('reporte.index',compact('usuario'));
    }
   /*public function index()
    {

        return View('reporte.index');
    }*/

    public function reporteMontoHoy()
    {
    
    /*   $hoy=(date("Y-m-d"));

     $lista=\App\Lavado::where('fecha_lavado',$hoy)->get();
     $monto=\App\Lavado::where('fecha_lavado',$hoy)->sum('monto');

    $pdf=PDF::loadView('reporte.vista',compact('lista','monto'));

    return $pdf->download('archivo.pdf');*/
    $hoy=(date("Y-m-d"));
    $lista = DB::table('lavados')
             ->select(DB::raw('sum(lavados.monto) as total,usuarios.nombre_usuario,lavados.fecha_lavado'))
             ->join('usuarios', 'lavados.id_usuario', '=', 'usuarios.id')
             ->groupBy('usuarios.nombre_usuario','lavados.fecha_lavado')
             ->where('fecha_lavado',$hoy)
             ->get();   
    $monto=\App\Lavado::where('fecha_lavado',$hoy)->sum('monto');        
    $pdf=PDF::loadView('reporte.vista',compact('lista','monto'));
    return $pdf->download('archivo.pdf');
    //return view('lavado.lista',compact('lista','monto')); 
    }
    public function rangoFechas(Request $request)
    {
                /* $inicio=$request['fechaInicio'];
                 $fin=$request['fechaFin'];
                //$fecha="2003-10-05"; // El formato que te entrega MySQL es Y-m-d 
                $inicio=date("Y-m-d",strtotime($inicio));
                $listaRango=\App\Lavado::whereBetween('fecha_lavado', [$inicio,$fin,$fin])->get();
                $sumaTotal=\App\Lavado::whereBetween('fecha_lavado', [$inicio,$fin,$fin])->sum('monto');
                return view('reporte.rangofecha',compact('listaRango','sumaTotal'));    
            //$pdf=PDF::loadView('reporte.RangoFechas',compact('listaRango'));*/
         $inicio=$request['fechaInicio'];
         $fin=$request['fechaFin'];
         $inicio=date("Y-m-d",strtotime($inicio));
         $listaRango = DB::table('lavados')
                     ->select(DB::raw('sum(lavados.monto) as suma,lavados.fecha_lavado,usuarios.nombre_usuario,usuarios.apellido_usuario'))
                     ->join('usuarios', 'lavados.id_usuario', '=', 'usuarios.id')
                     ->groupBy('lavados.fecha_lavado','usuarios.nombre_usuario','usuarios.apellido_usuario')
                     ->whereBetween('fecha_lavado', [$inicio,$fin,$fin])
                     ->get();
       
        $sumaTotal=\App\Lavado::whereBetween('fecha_lavado', [$inicio,$fin,$fin])->sum('monto');
       // $monto=\App\Lavado::where('fecha_lavado',$hoy)->sum('monto');            
        
        return view('reporte.rangofecha',compact('listaRango','sumaTotal'));   
    }
    public function PDFrangoFechas(Request $request)
    {
                $inicio=$request['fechaInicio'];
                $fin=$request['fechaFin'];
                //$fecha="2003-10-05"; // El formato que te entrega MySQL es Y-m-d 
                $inicio=date("Y-m-d",strtotime($inicio));
                $listaRango=\App\Lavado::whereBetween('fecha_lavado', [$inicio,$fin,$fin])->get();
                $sumaTotal=\App\Lavado::whereBetween('fecha_lavado', [$inicio,$fin,$fin])->sum('monto');
              //  return view('reporte.rangofecha',compact('listaRango'));    
                $pdf=PDF::loadView('reporte.rangofecha',compact('listaRango','sumaTotal'));
                return $pdf->download('archivo.pdf');
    }
    public function carrosLavo(Request $request)
        {
                    $users = DB::table('lavados')
                     ->select(DB::raw('count(lavados.id_usuario) as cantidad,sum(lavados.monto) as total,usuarios.nombre_usuario'))
                     ->join('usuarios', 'lavados.id_usuario', '=', 'usuarios.id')
                     ->groupBy('usuarios.nombre_usuario')
                     ->orderBy('cantidad','desc')
                     ->limit(1) 
                     ->get();   
                     
                     return view('reporte.trabajador',compact('users'));
                // ->groupBy('lavados.id')
                    // ->having('lavados.id', '<', 100)
           /* 
                $users = DB::table('users')
                ->orderBy('name', 'desc')
                ->get();
           $users = DB::table('lavados')
                     ->select(DB::raw('count(lavados.id_usuario) as cantidad,sum(lavados.monto) as total,usuarios.nombre_usuario'))
                     ->join('usuarios', 'usuarios.id', '=', 'lavados.id_usuario')    
                     ->groupBy('usuarios.nombre_usuario')
                     ->orderBy('lavados.id','desc')
                     ->limit(1)
                     ->get();
                     return view('reporte.trabajador',compact('users'));*/
      /*      
select count(l.id) cantidad, sum(monto) total, u.nombre_usuario
from lavados l inner join usuarios u on l.id_usuario=u.id
group by u.id
order by count(l.id) desc
limit 1*/
    }
}
