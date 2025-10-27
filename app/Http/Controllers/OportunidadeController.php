<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use App\Models\Empresa;
use App\Models\Oportunidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OportunidadeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $oportunidades = Oportunidade::when($search, function ($query, $search) {
            return $query->where('titulo', 'like', "%{$search}%");
        })->paginate(10);

        return view('oportunidades.index', compact('oportunidades', 'search'));
    }

    public function create()
    {
        $empresas = Empresa::where('status', 1)->get();
        $ongs = Ong::where('status', 1)->get();

        return view('oportunidades.create', compact('empresas', 'ongs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'area_atuacao' => 'required|string|max:255',
            'organizacao_responsavel' => 'required|string|max:255',
            'descricao' => 'required|string',
            'estado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'formato' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_termino' => 'nullable|date|after_or_equal:data_inicio',
            'status' => 'required|string|max:255',
        ]);

        // Organiza para salvar id e tipo
        $organizacao = explode('|', $validated['organizacao_responsavel']); // ex: "empresa|1"
        $validated['organizacao_type'] = $organizacao[0] == 'empresa' ? Empresa::class : Ong::class;
        $validated['organizacao_id'] = $organizacao[1];

        unset($validated['organizacao_responsavel']);

        Oportunidade::create($validated);

        return redirect()->route('oportunidades.index')->with('success', 'Oportunidade criada com sucesso!');
    }

    public function details(Oportunidade $oportunidade)
    {
        $empresas = Empresa::where('status', 1)->get();
        $ongs = Ong::where('status', 1)->get();

        return view('oportunidades.details', compact('oportunidade', 'empresas', 'ongs'));
    }

    public function edit(Oportunidade $oportunidade)
    {
        $empresas = Empresa::where('status', 1)->get();
        $ongs = Ong::where('status', 1)->get();

        return view('oportunidades.edit', compact('oportunidade', 'empresas', 'ongs'));
    }

    public function update(Request $request, Oportunidade $oportunidade)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'area_atuacao' => 'required|string|max:255',
            'organizacao_responsavel' => 'required|string|max:255',
            'descricao' => 'required|string',
            'estado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'formato' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_termino' => 'nullable|date|after_or_equal:data_inicio',
            'status' => 'required|string|max:255',
        ]);

        // Organiza para salvar id e tipo
        $organizacao = explode('|', $validated['organizacao_responsavel']); // ex: "empresa|1"
        $validated['organizacao_type'] = $organizacao[0] == 'empresa' ? Empresa::class : Ong::class;
        $validated['organizacao_id'] = $organizacao[1];

        unset($validated['organizacao_responsavel']);

        $oportunidade->update($validated);

        return redirect()->route('oportunidades.index')->with('success', 'Oportunidade atualizada com sucesso!');
    }

    public function disable(Oportunidade $oportunidade)
    {
      $oportunidade->status = 0;
      $oportunidade->save();

      return redirect()->route('oportunidades.index')->with('success', 'Inativado com sucesso!');
    }

    public function enable(Oportunidade $oportunidade)
    {
      $oportunidade->status = 1;
      $oportunidade->save();

      return redirect()->route('oportunidades.index')->with('success', 'Ativado com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
