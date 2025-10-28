<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
            'arquivo' => 'nullable|string|max:255',
        ]);

        // Upload do arquivo
        if ($request->arquivo) {
            $tempPath = $request->arquivo;
            $absolutePath = storage_path('app/' . $tempPath);

            if (!file_exists($absolutePath)) {
                abort(404, 'Arquivo temporário não encontrado');
            }

            // Pasta final no disco public
            $finalPath = 'documentos/' . basename($tempPath);
            Storage::disk('public')->putFileAs('documentos', new File($absolutePath), basename($tempPath));

            $validated['arquivo'] = $finalPath;
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
            'arquivo' => 'nullable|string|max:255',
        ]);

        // Upload do arquivo (substitui o anterior se enviado)
        if ($request->arquivo) {
            $tempPath = $request->arquivo;
            $absolutePath = storage_path('app/' . $tempPath);

            if (!file_exists($absolutePath)) {
                abort(404, 'Arquivo temporário não encontrado');
            }

            // Deleta o portfolio antigo, se existir
            if (!empty($documento->arquivo) && Storage::disk('public')->exists($documento->arquivo)) {
                Storage::disk('public')->delete($documento->arquivo);
            }

            // Pasta final no disco public
            $finalPath = 'documentos/' . basename($tempPath);
            Storage::disk('public')->putFileAs('documentos', new File($absolutePath), basename($tempPath));

            $validated['arquivo'] = $finalPath;
        }

        $documento->update($validated);

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }

    public function uploadArquivo(Request $request)
    {
        $files = $request->allFiles();

        if (empty($files)) {
            abort(422, 'Nenhum arquivo foi carregado.');
        }

        if (count($files) > 1) {
            abort(422, 'Apenas 1 arquivo pode ser carregado por vez.');
        }

        $requestKey = array_key_first($files);

        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        return $file->store(
            path: 'tmp/'.now()->timestamp.'-'.Str::random(20)
        );
    }

    public function disable(Documento $documento)
    {
      $documento->status = 0;
      $documento->save();

      return redirect()->route('documentos.index')->with('success', 'Inativado com sucesso!');
    }

    public function enable(Documento $documento)
    {
      $documento->status = 1;
      $documento->save();

      return redirect()->route('documentos.index')->with('success', 'Ativado com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
