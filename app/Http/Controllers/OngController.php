<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OngController extends Controller
{
    public function index(Request $request)
    {
        $ongs = Ong::query()
            ->when($request->texto, function($query, $texto) {
                $query->where(function($q) use ($texto) {
                    $q->where('nome_organizacao', 'like', "%{$texto}%")
                    ->orWhere('natureza_juridica', 'like', "%{$texto}%")
                    ->orWhere('email_principal', 'like', "%{$texto}%")
                    ->orWhere('cnpj', 'like', "%{$texto}%");
                });
            })
            ->when($request->status, function($query, $status) {
                $query->where('status', $status);
            })
            ->paginate(10)
            ->withQueryString();

        return view('ongs.index', compact('ongs'));
    }

    public function create()
    {
        return view('ongs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_organizacao' => 'required|string|max:255',
            'cnpj' => 'nullable|string|max:20',
            'natureza_juridica' => 'required|string|max:255',
            'data_fundacao' => 'nullable|date',
            'area_atuacao' => 'required|string|max:255',
            'modelo_atuacao' => 'required|string|max:255',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'telefone_fixo' => 'required|string|max:20',
            'email_principal' => 'required|email|max:255',
            'site' => 'nullable|string|max:255',
            'nome_completo_responsavel' => 'required|string|max:255',
            'cpf_responsavel' => 'required|string|max:20',
            'cargo_responsavel' => 'required|string|max:255',
            'email_contato' => 'required|email|max:255',
        ]);

        Ong::create($validated);

        return redirect()->route('ongs.index')->with('success', 'ONG criada com sucesso!');
    }

    public function details(Ong $ong)
    {
        return view('ongs.details', compact('ong'));
    }

    public function edit(Ong $ong)
    {
        return view('ongs.edit', compact('ong'));
    }

    public function update(Request $request, Ong $ong)
    {
        $validated = $request->validate([
            'nome_organizacao' => 'required|string|max:255',
            'cnpj' => 'nullable|string|max:20',
            'natureza_juridica' => 'required|string|max:255',
            'data_fundacao' => 'nullable|date',
            'area_atuacao' => 'required|string|max:255',
            'modelo_atuacao' => 'required|string|max:255',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'telefone_fixo' => 'required|string|max:20',
            'email_principal' => 'required|email|max:255',
            'site' => 'nullable|string|max:255',
            'nome_completo_responsavel' => 'required|string|max:255',
            'cpf_responsavel' => 'required|string|max:20',
            'cargo_responsavel' => 'required|string|max:255',
            'email_contato' => 'required|email|max:255',
        ]);

        $ong->update($validated);

        return redirect()->route('ongs.index')->with('success', 'ONG atualizada com sucesso!');
    }

    public function disable(Ong $ongs)
    {
      $ongs->status = 0;
      $ongs->save();

      return redirect()->route('ongs.index')->with('success', 'Inativado com sucesso!');
    }

    public function enable(Ong $ongs)
    {
      $ongs->status = 1;
      $ongs->save();

      return redirect()->route('ongs.index')->with('success', 'Ativado com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
