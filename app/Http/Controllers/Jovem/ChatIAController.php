<?php

namespace App\Http\Controllers\Jovem;

use App\Models\ChatIA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
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

        // Salva mensagem do usuário
        $userMessage = ChatIA::create([
            'user_id' => Auth::id(),
            'sender' => 'user',
            'message' => $request->message,
        ]);

        // URL do Ollama (local ou VPS)
        $ollamaUrl = env('OLLAMA_URL');

        if (empty($ollamaUrl)) {
            $botReply = 'Desculpe, estou temporariamente offline. A integração com a IA ainda não está configurada.';

            $botMessage = ChatIA::create([
                'user_id' => Auth::id(),
                'sender' => 'bot',
                'message' => $botReply,
            ]);

            return response()->json([
                'user' => $userMessage,
                'bot' => $botMessage,
            ]);
        }

        $systemPrompt = "Você é um assistente objetivo.  
                        Responda sempre de forma curta, direta e sem enfeites.  
                        Se a pergunta for simples, responda em no máximo 2 ou 3 frases.  
                        Se precisar listar algo, limite a 5 itens.  
                        Não invente informações.  
                        Se não souber, diga que não sabe.";

        // Chamada ao Ollama (modelo phi3)
        $response = Http::timeout(120)->post($ollamaUrl . '/api/generate', [
            'model' => 'phi3',
            'prompt' => $systemPrompt . "\n\n" . $request->message,
            'stream' => false,
            'num_predict' => 200,
            'temperature' => 0.2,
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
            'user' => $userMessage,
            'bot' => $botMessage,
        ]);
    }
}