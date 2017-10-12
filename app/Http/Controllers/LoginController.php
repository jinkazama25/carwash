<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
class LoginController extends Controller
{
    public function index()
    {
        return View('login.index');
    }
    public function acceder(Request $request)
    {
        echo $request['nombre_usuario']."<br>";
        echo $request['password'];
        //return View('login.index');
        
    }
 
}