<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jovem;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
            'email'              => 'nullable|email|max:255|unique:users,email',
            'telefone'           => 'required|string|max:20',
            'data_nascimento'    => 'required|date',
            'orientacao_sexual'  => 'nullable|string|max:255',
            'genero'             => 'required|string|max:255',
            'raca'               => 'required|string|max:50',
            'situacao_atual'     => 'nullable|string|max:255',
            'escolaridade'       => 'nullable|string|max:255',
            'oportunidades'      => 'nullable|string|max:255',
            'interesse'          => 'nullable|string|max:255',
            'estado'             => 'required|string|max:255',
            'cidade'             => 'required|string|max:255',
            'portador_deficiencia' => 'required|string|max:3',
            'portfolio'          => 'nullable|string|max:255',
            'imagem_perfil'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Converte "Sim" e "Não" para true/false
        $validated['portador_deficiencia'] = $request->portador_deficiencia === 'Sim' ? 1 : 0;

        // Upload da imagem de perfil
        if ($request->hasFile('imagem_perfil')) {
            $validated['imagem_perfil'] = $request->file('imagem_perfil')->store('imagens_perfil', 'public');
        }

        // Upload de portfólio
        if ($request->portfolio) {
            $tempPath = $request->portfolio;
            $absolutePath = storage_path('app/' . $tempPath);

            if (!file_exists($absolutePath)) {
                abort(404, 'Arquivo temporário não encontrado');
            }

            // Pasta final no disco public
            $finalPath = 'portfolios/' . basename($tempPath);
            Storage::disk('public')->putFileAs('portfolios', new File($absolutePath), basename($tempPath));

            $validated['portfolio'] = $finalPath;
        }

        // Cria o usuário vinculado
        if (isset($validated['email']) && !empty($validated['email'])) {
            $user = User::create([
                'name'     => $validated['nome_completo'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['email']), // senha padrão
            ]);

            $user->assignRole('jovem');

            // Cria o jovem e vincula ao usuário
            $validated['user_id'] = $user->id;
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
            'email'              => 'nullable|email|max:255|unique:users,email,' . $jovem->user_id,
            'telefone'           => 'required|string|max:20',
            'data_nascimento'    => 'required|date',
            'orientacao_sexual'  => 'nullable|string|max:255',
            'genero'             => 'required|string|max:255',
            'raca'               => 'required|string|max:50',
            'situacao_atual'     => 'nullable|string|max:255',
            'escolaridade'       => 'nullable|string|max:255',
            'oportunidades'      => 'nullable|string|max:255',
            'interesse'          => 'nullable|string|max:255',
            'estado'             => 'required|string|max:255',
            'cidade'             => 'required|string|max:255',
            'portador_deficiencia' => 'required|string|max:3',
            'portfolio'          => 'nullable|string|max:255',
            'imagem_perfil'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

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

        if ($request->portfolio) {
            $tempPath = $request->portfolio;
            $absolutePath = storage_path('app/' . $tempPath);

            if (!file_exists($absolutePath)) {
                abort(404, 'Arquivo temporário não encontrado');
            }

            // Deleta o portfolio antigo, se existir
            if (!empty($jovem->portfolio) && Storage::disk('public')->exists($jovem->portfolio)) {
                Storage::disk('public')->delete($jovem->portfolio);
            }

            // Pasta final no disco public
            $finalPath = 'portfolios/' . basename($tempPath);
            Storage::disk('public')->putFileAs('portfolios', new File($absolutePath), basename($tempPath));

            $validated['portfolio'] = $finalPath;
        }

        // Atualiza ou cria o usuário vinculado
        if ($jovem->user_id) {
            $user = User::find($jovem->user_id);
            if ($user) {
                $user->update([
                    'name'  => $validated['nome_completo'],
                    'email' => $validated['email'] ?? $user->email,
                ]);
            }
        } else {
            if (isset($validated['email']) && !empty($validated['email'])) {
                $user = User::create([
                    'name'     => $validated['nome_completo'],
                    'email'    => $validated['email'],
                    'password' => Hash::make($validated['email']),
                ]);

                $user->assignRole('jovem');

                $validated['user_id'] = $user->id;
            }
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

    public function uploadPortfolio(Request $request)
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
