<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{


  public function import(){
    if(is_file('Asistencias.xlsx')){
      $Excel = Excel::load('Asistencias.xlsx', function($reader) {
          $reader->each(function($sheet) {
            DB::insert('Insert into Asistencia (fkempleado, asi_fentrada, asi_fsalida) values(?,?,?)', [$sheet->cedula,$sheet->fecha_hora_entrada,$sheet->fecha_hora_salida]);
          });
     });
     if($Excel)
       return redirect('/')->with('success', 'Archivo Excel importado exitosamente');
       else
         return redirect('/')->with('success', 'Archivo Excel no pudo ser importado');
    }
   return redirect('/')->with('success','No hay un archivo de excel para importar');

  }


}
