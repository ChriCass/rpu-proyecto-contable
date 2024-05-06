<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function seleccionarEmpresa()
    {    
        $empresas = Empresa::all();

        return view('seleccionar_empresa', compact('empresas' ));
    }
}
