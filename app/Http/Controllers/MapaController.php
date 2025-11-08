<?php

namespace App\Http\Controllers;

use App\Models\Oportunidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MapaController extends Controller
{
    public function mapa(Request $request)
    {
        $oportunidades = Oportunidade::where('status', 1)
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get()
            ->map(function ($item) {
                $item->organizacao_responsavel = 
                    $item->organizacao->nome_fantasia
                    ?? $item->organizacao->razao_social
                    ?? $item->organizacao->nome_organizacao
                    ?? 'N/A';

                unset($item->organizacao);

                return $item;
            });

        return view('mapa.index', compact('oportunidades'));
    }
}
