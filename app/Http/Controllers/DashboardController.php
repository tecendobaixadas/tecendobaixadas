<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jovem;
use App\Models\Empresa;
use App\Models\Ong;
use App\Models\Oportunidade;
use App\Models\Documento;

class DashboardController extends Controller
{
    public function index()
    {
        $estudantes = [
            'total'     => Jovem::count(),
            'ativos'    => Jovem::where('status', 1)->count(),
            'inativos'  => Jovem::where('status', 0)->count(),
        ];

        $empresas = [
            'total'     => Empresa::count(),
            'ativos'    => Empresa::where('status', 1)->count(),
            'inativos'  => Empresa::where('status', 0)->count(),
        ];

        $ongs = [
            'total'     => Ong::count(),
            'ativos'    => Ong::where('status', 1)->count(),
            'inativos'  => Ong::where('status', 0)->count(),
        ];

        $oportunidades = [
            'total'     => Oportunidade::count(),
            'ativos'    => Oportunidade::where('status', 1)->count(),
            'inativos'  => Oportunidade::where('status', 0)->count(),
        ];

        $documentos = [
            'total'     => Documento::count(),
            'ativos'    => Documento::where('status', 1)->count(),
            'inativos'  => Documento::where('status', 0)->count(),
        ];

        return view('dashboard')->with(compact('estudantes', 'empresas', 'ongs', 'oportunidades', 'documentos'));
    }
}
