<?php

namespace App\Http\Controllers;

use App\Models\Jovem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JovemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $jovens = Jovem::when($search, function ($query, $search) {
            return $query->where('nome_completo', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);

        return view('jovens.index', compact('jovens', 'search'));
    }

    public function create()
    {
        return view('jovens.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'email' => 'required|email|unique:jovems,email',
            'telefone' => 'required|string',
            'data_nascimento' => 'required|date',
            'estado' => 'required|string',
            'cidade' => 'required|string',
            'raca' => 'required',
            'situacao_atual' => 'required',
        ]);

        $jovem = Jovem::create($validated);

        // Simulação do envio de e-mail (depois você pode integrar com Mailtrap ou outro)
        // Mail::to($jovem->email)->send(new CadastroJovemMail($jovem));

        return redirect()->route('jovens.index')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jovem $jovem)
    {
        return view('jovens.edit', compact('jovem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
