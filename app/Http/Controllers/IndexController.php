<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Excel;
class IndexController extends Controller
{
    public function actionIndex()
    {
      /*  Excel::Create('laravel',function($excel)
        {
            $excel->Sheet('Sheetname', function($sheet)
            {
                $sheet->mergeCells('A1:C1');
                $sheet->setBorder('A1:F1', 'thin');
                $sheet->cells('A1:F1',function($cells)
                {
                    $cells->setBackground('#000000');
                    $cells->setFontColor('#FFFFFF');
                    $cells->setAlignment('Center');
                    $cells->setValignment('middle');
                });
                $data=[];
                array_push($data,array('Edison','Cortez','Perez','Verzerker'));
                $sheet->FromArray($data,null,'A1',false,false);     
            });
        })->download('xlsx');*/
     //   $hoy=(date("Y-m-d"));
      /*  $lista = DB::table('lavados')
             ->select(DB::raw('sum(lavados.monto) as total,usuarios.nombre_usuario,lavados.fecha_lavado'))
             ->join('usuarios', 'lavados.id_usuario', '=', 'usuarios.id')
             ->groupBy('usuarios.nombre_usuario','lavados.fecha_lavado')
             ->where('fecha_lavado',$hoy)
             ->get();      */
        /*
        $users = \App\Lavado::select('id', 'fecha_lavado', 'monto')->get();
        Excel::create('users', function($excel) use($users) {
        $excel->sheet('Sheet 1', function($sheet) use($users) {
        $sheet->fromArray($users);
        });
        })->export('xlsx');
       */
      /* Excel::create('Export data', function($excel) {
        $excel->sheet('Sheet 1', function($sheet) {
            $hoy=(date("Y-m-d"));
            $products=DB::table('lavados')
            ->join('usuarios','lavados.id_usuario','=','usuarios.id')
            ->select('lavados.*','usuarios.nombre_usuario as nombre','usuarios.apellido_usuario as apellido')
            ->where('fecha_lavado',$hoy)    
            ->get();
            $sheet->setBorder('A1:D1', 'thin');
            $sheet->cells('A1:D1',function($cells)
            {
                $cells->setBackground('#000000');
                $cells->setFontColor('#FFFFFF');
                $cells->setAlignment('Center');
                $cells->setValignment('middle');
            });
                
                foreach($products as $product) {
                    $data[] = array(
                    $product->fecha_lavado,
                    $product->monto,
                    $product->nombre,
                    $product->apellido,
                );
                
            }
        //    array_push($data,array('Fecha','Monto','Nombre','Apellido'));
            $sheet->FromArray($data,null,'A1',false,false); 
            
        });
    })->export('xlsx');*/
    $hoy=(date("Y-m-d"));  
    $fecha=DB::table('usuarios')->join('lavados','usuarios.id','=','lavados.id_usuario')
    ->where('fecha_lavado',$hoy)->get();
        
        if (count($fecha) > 0){
        //display contacts
        Excel::Create('laravel',function($excel) use($hoy)
        {
           
            $excel->Sheet('Sheetname', function($sheet)use($hoy)
            {
                
                $products=DB::table('lavados')
                ->join('usuarios','usuarios.id','=','lavados.id_usuario')
                ->select('lavados.*','usuarios.nombre_usuario as nombre','usuarios.apellido_usuario as apellido')
                ->where('fecha_lavado',$hoy)   
                ->get();
              foreach($products as $product) {
                    $data[] = array(
                    $product->fecha_lavado,
                    $product->monto,
                    $product->nombre,
                    $product->apellido,
                 
                );
                
            }
            $sheet->FromArray($data,null,'A1',false,false);     
            $headings = array('Fecha','Monto','Nombre','Apellido');
            $sheet->prependRow(1, $headings);
            
                });
            })->download('xlsx');
        }
        else{
            return view('excel.lista'); 
        }
    }
}