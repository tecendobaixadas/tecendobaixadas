<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class DocumentoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $documentos = Documento::when($search, function ($query, $search) {
            return $query->where('nome', 'like', "%{$search}%");
        })->paginate(10);

        return view('documentos.index', compact('documentos', 'search'));
    }

    public function create()
    {
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'data_emissao' => 'required|date',
            'arquivo' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120', // 5MB
        ]);

        // Upload do arquivo
        if ($request->hasFile('arquivo')) {
            $validated['arquivo'] = $request->file('arquivo')->store('documentos', 'public');
        }

        Documento::create($validated);

        return redirect()->route('documentos.index')->with('success', 'Documento criado com sucesso!');
    }

    public function details(Documento $documento)
    {
        return view('documentos.details', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        return view('documentos.edit', compact('documento'));
    }

    public function update(Request $request, Documento $documento)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'data_emissao' => 'required|date',
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120', // 5MB
        ]);

        // Se for edição e não tiver arquivo, torna obrigatório
        if (!isset($documento) || empty($documento->arquivo)) {
            $rules['arquivo'] = 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120';
        }

        // Upload do arquivo (substitui o anterior se enviado)
        if ($request->hasFile('arquivo')) {
            // Remove o arquivo antigo
            if ($documento->arquivo && Storage::disk('public')->exists($documento->arquivo)) {
                Storage::disk('public')->delete($documento->arquivo);
            }

            $validated['arquivo'] = $request->file('arquivo')->store('documentos', 'public');
        }

        $documento->update($validated);

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }

    public function disable(Documento $documentos)
    {
      $documentos->status = 0;
      $documentos->save();

      return redirect()->route('documentos.index')->with('success', 'Inativado com sucesso!');
    }

    public function enable(Documento $documentos)
    {
      $documentos->status = 1;
      $documentos->save();

      return redirect()->route('documentos.index')->with('success', 'Ativado com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
