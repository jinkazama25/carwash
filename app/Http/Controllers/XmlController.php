<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use XmlParser; 
class XmlController extends Controller
{
$config['mysql_host'] = "localhost:90";
$config['mysql_user'] = "root";
$config['mysql_pass'] = "";
$config['db_name']    = "dbcarwash";
$config['table_name'] = "usuarios";
 
//connect to host
mysql_connect($config['mysql_host'],$config['mysql_user'],$config['mysql_pass']);
//select database
@mysql_select_db($config['db_name']) or die( "Unable to select database");

}