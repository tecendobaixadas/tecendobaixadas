<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $empresas = Empresa::query()
            ->when($request->texto, function($query, $texto) {
                $query->where(function($q) use ($texto) {
                    $q->where('razao_social', 'like', "%{$texto}%")
                    ->orWhere('nome_fantasia', 'like', "%{$texto}%")
                    ->orWhere('email_principal', 'like', "%{$texto}%")
                    ->orWhere('cnpj', 'like', "%{$texto}%");
                });
            })
            ->when($request->status, function($query, $status) {
                $query->where('status', $status);
            })
            ->paginate(10)
            ->withQueryString();

        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'razao_social' => 'required|string|max:255',
            'nome_fantasia' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18|unique:empresas',
            'inscricao_estadual' => 'nullable|string|max:50',
            'data_fundacao' => 'required|date',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'cep' => 'required|string|max:20',
            'telefone_fixo' => 'required|string|max:20',
            'email_principal' => 'required|email|max:255',
            'nome_completo' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:empresas',
            'cargo' => 'required|string|max:100',
            'email_contato' => 'required|email|max:255',
            'modelo_atuacao' => 'required|string|max:255',
        ]);

        $empresa = Empresa::create($validated);

        // Salvar redes sociais
        if ($request->has('rede')) {
            foreach ($request->rede as $dadosRede) {
                if (!empty($dadosRede['nome']) && !empty($dadosRede['link'])) {
                    $empresa->redes()->create([
                        'rede' => $dadosRede['nome'],
                        'link' => $dadosRede['link'],
                    ]);
                }
            }
        }

        // Salvar trabalhos
        if ($request->has('trabalhos')) {
            foreach ($request->trabalhos as $trabalho) {
                if (!empty($trabalho)) {
                    $empresa->trabalhos()->create([
                        'nome' => $trabalho,
                    ]);
                }
            }
        }

        return redirect()->route('empresas.index')->with('success', 'Empresa cadastrada com sucesso!');
    }

    public function details(Empresa $empresa)
    {
        return view('empresas.details', compact('empresa'));
    }

    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        $validated = $request->validate([
            'razao_social' => 'required|string|max:255',
            'nome_fantasia' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18|unique:empresas,cnpj,' . $empresa->id,
            'inscricao_estadual' => 'nullable|string|max:50',
            'data_fundacao' => 'required|date',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'cep' => 'required|string|max:20',
            'telefone_fixo' => 'required|string|max:20',
            'email_principal' => 'required|email|max:255',
            'nome_completo' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:empresas,cpf,' . $empresa->id,
            'cargo' => 'required|string|max:100',
            'email_contato' => 'required|email|max:255',
            'modelo_atuacao' => 'required|string|max:255',
        ]);

        $empresa->update($validated);

        // Atualiza redes sociais (se houver)
        if ($request->has('rede')) {
            // Remove as antigas
            $empresa->redes()->delete();

            // Adiciona novamente
            foreach ($request->rede as $dadosRede) {
                if (!empty($dadosRede['nome']) && !empty($dadosRede['link'])) {
                    $empresa->redes()->create([
                        'rede' => $dadosRede['nome'],
                        'link' => $dadosRede['link'],
                    ]);
                }
            }
        }

        // Atualiza trabalhos sociais (se houver)
        if ($request->has('trabalhos')) {
            // Remove as antigas
            $empresa->trabalhos()->delete();

            // Adiciona novamente
            foreach ($request->trabalhos as $trabalho) {
                if (!empty($trabalho)) {
                    $empresa->trabalhos()->create([
                        'nome' => $trabalho,
                    ]);
                }
            }
        }

        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso!');
    }

    public function disable(Empresa $empresa)
    {
      $empresa->status = 0;
      $empresa->save();

      return redirect()->route('empresas.index')->with('success', 'Inativado com sucesso!');
    }

    public function enable(Empresa $empresa)
    {
      $empresa->status = 1;
      $empresa->save();

      return redirect()->route('empresas.index')->with('success', 'Ativado com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
