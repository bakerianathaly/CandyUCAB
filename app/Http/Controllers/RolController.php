<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Validator;

class RolController extends Controller
{
    public function listarRoles(){
      @session_start();
      if ($_SESSION['Middleware'] == true){
            if ($_SESSION['tipo']=='Empleado'){
                $roles = DB::select('select * from Rol');
                return view('listar-roles',compact('roles'));
            }
            else{
                return view('candy-inicio');
            }
        }
        else{
            return view('candy-login');
        }
    }
    public function privilegiosRol($id){
       @session_start();
       $rol = DB::select('select * from rol where rol_id = ?', [$id]);
       $privilegios = DB::select('select distinct p.pri_id , p.pri_nombre ,0 as fkrol 
       from privilegio p 
       where not exists(select * from rol_priv rp where p.pri_id = rp.fkprivilegio  and rp.fkrol=?)
       union 
       select distinct p.pri_id , p.pri_nombre , rp.fkrol 
       from privilegio p, rol_priv rp
       where p.pri_id = rp.fkprivilegio  and rp.fkrol=?;', [$id,$id]);
       return view('rol',compact('rol','privilegios'));
    }
    public function edit(Request $request,$id){
        $privilegios= $request->input('pri_id');
        DB::delete('delete from rol_priv where fkrol = ?', [$id]);
        for($i = 0; $i < count($privilegios); $i++){                                    
            DB::insert('insert into rol_priv (fkrol,fkprivilegio) values (?, ?)', [$id,$privilegios[$i]]);
        }
        return redirect()->action('RolController@listarRoles');
    }
     public function eliminarRol($id){
       @session_start();
       DB::delete('delete from rol_priv where fkrol = ?', [$id]);
       DB::delete('delete from rol where rol_id = ?', [$id]);
       return redirect()->action('RolController@listarRoles');
    }

    public function agregarRol(){
     return view('agregar-rol');
    }
    public function add(Request $request){
     $nombre= $request->input('nombre');
     DB::insert('insert into rol (rol_tipo) values (?)', [$nombre]);
     $id = DB::select('select rol_id from rol order by rol_id Desc limit 1');
     return redirect()->action('RolController@privilegiosRol',$id[0]->rol_id);
    }
}
