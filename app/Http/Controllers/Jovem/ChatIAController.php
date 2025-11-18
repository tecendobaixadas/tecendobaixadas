<?php

namespace App\Http\Controllers\Jovem;

use App\Models\ChatIA;
use App\Models\DocumentEmbedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Services\OllamaService;
use App\Http\Controllers\Controller;

class ChatIAController extends Controller
{
    public function index()
    {
        $messages = ChatIA::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->take(50)
            ->get();

        return view('jovem.chat_ia.index', compact('messages'));
    }

    public function send(Request $request)
    {
        $request->validate(['message' => 'required|string|max:1000']);

        $question = $request->message;

        if (empty(env('OLLAMA_URL')) || empty(env('OLLAMA_MODEL'))) {
            $botReply = 'Desculpe, estou temporariamente offline. A integração com a IA ainda não está configurada.';

            $botMessage = [
                'user_id' => Auth::id(),
                'sender' => 'bot',
                'message' => $botReply,
            ];

            return response()->json([
                'bot' => $botMessage,
            ]);
        }

        // Salva mensagem do usuário
        $userMessage = ChatIA::create([
            'user_id' => Auth::id(),
            'sender' => 'user',
            'message' => $question,
        ]);

        // 1. Embedding da pergunta
        $questionEmbedding = OllamaService::embed($question);
        if (!$questionEmbedding) {
            return response()->json(['error' => 'Erro ao gerar embedding'], 500);
        }

        // 2. Buscar todos os embeddings salvos
        $embeddings = DocumentEmbedding::all();

        // 3. Calcular similaridade (cosine similarity)
        $results = [];
        foreach ($embeddings as $item) {
            $vector = json_decode($item->embedding, true);

            $similarity = $this->cosineSimilarity($questionEmbedding, $vector);

            $results[] = [
                'similarity' => $similarity,
                'chunk' => $item->chunk,
            ];
        }

        // 4. Ordenar pelos mais parecidos
        usort($results, fn ($a, $b) => $b['similarity'] <=> $a['similarity']);

        // Selecionar os 3 melhores trechos
        $topChunks = array_slice($results, 0, 3);

        $context = implode("\n\n", array_column($topChunks, 'chunk'));

        // 5. Enviar ao Ollama com contexto
        $prompt = "
            Você é um assistente que responde de forma objetiva.

            INSTRUÇÕES:
            - Se o contexto abaixo contiver informação relevante, use ele como fonte principal.
            - Se o contexto não contiver nada útil ou estiver vazio, responda normalmente com seu conhecimento geral.
            - Não invente informações que não estejam nem no contexto nem no seu conhecimento comum.
            - Seja claro e direto.

            CONTEXTOS:
            $context

            PERGUNTA:
            $question
        ";

        $response = Http::timeout(120)->post(env('OLLAMA_URL') . '/api/generate', [
            'model' => env('OLLAMA_MODEL', 'phi3'),
            'prompt' => $prompt,
            'stream' => false
        ]);

        // Resposta da IA
        $botReply = $response->json()['response'] ?? 'Desculpe, não consegui entender.';

        // Salva resposta da IA
        $botMessage = ChatIA::create([
            'user_id' => Auth::id(),
            'sender' => 'bot',
            'message' => $botReply,
        ]);

        return response()->json([
            'context_used' => $topChunks,
            'user' => $userMessage,
            'bot' => $botMessage
        ]);
    }

    // --- Função de similaridade ---
    private function cosineSimilarity(array $a, array $b): float
    {
        $dot = 0;
        $normA = 0;
        $normB = 0;

        foreach ($a as $i => $val) {
            $dot += $val * $b[$i];
            $normA += $val * $val;
            $normB += $b[$i] * $b[$i];
        }

        return $dot / (sqrt($normA) * sqrt($normB));
    }
}