<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Libro;
use App\Models\OpIgv;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function seleccionarEmpresa()
    {    
        $empresas = Empresa::all();

        return view('seleccionar_empresa', compact('empresas' ));
    }

    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('home', compact('empresa'));
    }

    public function compraVenta($id)
    {
        $empresa = Empresa::findOrFail($id);
        $libro = Libro::all();
        $opigv = OpIgv::all();
        return view('empresa.compra_venta', compact('empresa', 'libro', 'opigv'));
    }
}
