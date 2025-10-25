<?php

namespace App\Http\Controllers;

use App\Models\Jovem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class JovemController extends Controller
{
    public function index(Request $request)
    {
        $jovens = Jovem::query()
            ->when($request->texto, function($query, $texto) {
                $query->where(function($q) use ($texto) {
                    $q->where('nome_completo', 'like', "%{$texto}%")
                    ->orWhere('nome_social', 'like', "%{$texto}%")
                    ->orWhere('email', 'like', "%{$texto}%");
                });
            })
            ->when($request->status, function($query, $status) {
                $query->where('status', $status);
            })
            ->when($request->situacao, function($query, $situacao) {
                $query->where('situacao_atual', $situacao);
            })
            ->paginate(10)
            ->withQueryString();

        return view('jovens.index', compact('jovens'));
    }

    public function create()
    {
        return view('jovens.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_completo'      => 'required|string|max:255',
            'nome_social'        => 'nullable|string|max:255',
            'email'              => 'nullable|string|max:255',
            'telefone'           => 'required|string|max:20',
            'data_nascimento'    => 'required|date',
            'orientacao_sexual'  => 'nullable|string|max:255',
            'genero'             => 'required|string|max:255',
            'raca'               => 'required|string|max:50',
            'situacao_atual'     => 'required|string|max:255',
            'escolaridade'       => 'nullable|string|max:255',
            'oportunidades'      => 'nullable|string|max:255',
            'interesse'          => 'nullable|string|max:255',
            'estado'             => 'required|string|max:255',
            'cidade'             => 'required|string|max:255',
            'portador_deficiencia' => 'required|string|max:3',
            'portfolio'          => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
            'imagem_perfil'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Converte "Sim" e "Não" para true/false
        $validated['portador_deficiencia'] = $request->portador_deficiencia === 'Sim' ? 1 : 0;

        // Upload da imagem de perfil
        if ($request->hasFile('imagem_perfil')) {
            $validated['imagem_perfil'] = $request->file('imagem_perfil')->store('imagens_perfil', 'public');
        }

        // Upload do portfólio
        if ($request->hasFile('portfolio')) {
            $validated['portfolio'] = $request->file('portfolio')->store('portfolios', 'public');
        }

        $jovem = Jovem::create($validated);

        // Salvar redes sociais
        if ($request->has('rede')) {
            foreach ($request->rede as $dadosRede) {
                if (!empty($dadosRede['nome']) && !empty($dadosRede['link'])) {
                    $jovem->redes()->create([
                        'rede' => $dadosRede['nome'],
                        'link' => $dadosRede['link'],
                    ]);
                }
            }
        }

        // Simulação do envio de e-mail (depois você pode integrar com Mailtrap ou outro)
        // Mail::to($jovem->email)->send(new CadastroJovemMail($jovem));

        return redirect()->route('jovens.index')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function details(Jovem $jovem)
    {
        return view('jovens.details', compact('jovem'));
    }

    public function edit(Jovem $jovem)
    {
        return view('jovens.edit', compact('jovem'));
    }

    public function update(Request $request, Jovem $jovem)
    {
        $validated = $request->validate([
            'nome_completo'      => 'required|string|max:255',
            'nome_social'        => 'nullable|string|max:255',
            'email'              => 'nullable|string|max:255',
            'telefone'           => 'required|string|max:20',
            'data_nascimento'    => 'required|date',
            'orientacao_sexual'  => 'nullable|string|max:255',
            'genero'             => 'required|string|max:255',
            'raca'               => 'required|string|max:50',
            'situacao_atual'     => 'required|string|max:255',
            'escolaridade'       => 'nullable|string|max:255',
            'oportunidades'      => 'nullable|string|max:255',
            'interesse'          => 'nullable|string|max:255',
            'estado'             => 'required|string|max:255',
            'cidade'             => 'required|string|max:255',
            'portador_deficiencia' => 'required|string|max:3',
            'portfolio'          => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
            'imagem_perfil'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Se for edição e não tiver portfolio, torna obrigatório
        if (!isset($jovem) || empty($jovem->portfolio)) {
            $rules['portfolio'] = 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048';
        }

        // Converte "Sim" / "Não" para boolean (1/0)
        $validated['portador_deficiencia'] = $request->portador_deficiencia === 'Sim' ? 1 : 0;

        // Upload da imagem de perfil (se enviada)
        if ($request->hasFile('imagem_perfil')) {
            // Apaga a antiga, se existir
            if ($jovem->imagem_perfil && Storage::disk('public')->exists($jovem->imagem_perfil)) {
                Storage::disk('public')->delete($jovem->imagem_perfil);
            }
            $validated['imagem_perfil'] = $request->file('imagem_perfil')->store('imagens_perfil', 'public');
        }

        // Upload do portfólio (se enviado)
        if ($request->hasFile('portfolio')) {
            // Apaga o antigo, se existir
            if ($jovem->portfolio && Storage::disk('public')->exists($jovem->portfolio)) {
                Storage::disk('public')->delete($jovem->portfolio);
            }
            $validated['portfolio'] = $request->file('portfolio')->store('portfolios', 'public');
        }

        // Atualiza os dados
        $jovem->update($validated);

        // Atualiza redes sociais (se houver)
        if ($request->has('rede')) {
            // Remove as antigas
            $jovem->redes()->delete();

            // Adiciona novamente
            foreach ($request->rede as $dadosRede) {
                if (!empty($dadosRede['nome']) && !empty($dadosRede['link'])) {
                    $jovem->redes()->create([
                        'rede' => $dadosRede['nome'],
                        'link' => $dadosRede['link'],
                    ]);
                }
            }
        }

        return redirect()->route('jovens.index')->with('success', 'Cadastro atualizado com sucesso!');
    }

    public function disable(Jovem $jovem)
    {
      $jovem->status = 0;
      $jovem->save();

      return redirect()->route('jovens.index')->with('success', 'Inativado com sucesso!');
    }

    public function enable(Jovem $jovem)
    {
      $jovem->status = 1;
      $jovem->save();

      return redirect()->route('jovens.index')->with('success', 'Ativado com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
