<?php

namespace App\Http\Controllers\Jovem;

use App\Models\Ong;
use App\Models\Empresa;
use App\Models\Oportunidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class OportunidadeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $oportunidades = Oportunidade::when($search, function ($query, $search) {
            return $query->where('titulo', 'like', "%{$search}%");
        })->paginate(10);

        return view('jovem.oportunidades.index', compact('oportunidades', 'search'));
    }

    public function candidatar(Oportunidade $oportunidade)
    {
        $user = auth()->user();

        // Evita duplicadas
        if (!$oportunidade->candidatos->contains($user->id)) {
            $oportunidade->candidatos()->attach($user->id);
        }

        return back()->with('success', "Você se candidatou com sucesso à vaga {$oportunidade['titulo']}!");
    }
}
