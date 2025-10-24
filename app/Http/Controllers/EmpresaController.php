<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $empresas = Empresa::when($search, function ($query, $search) {
            return $query->where('nome_completo', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);

        return view('empresas.index', compact('empresas', 'search'));
    }

    /**
     * Exibe o formulário de criação.
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Salva uma nova empresa.
     */
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

        Empresa::create($validated);

        return redirect()->route('empresas.index')->with('success', 'Empresa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.form', compact('empresa'));
    }

    /**
     * Atualiza os dados da empresa.
     */
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

        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
