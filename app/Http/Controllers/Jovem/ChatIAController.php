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

        // Verifica se existe a chave da API configurada
        $apiKey = env('LUMO_API_KEY');

        if (empty($apiKey)) {
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

        // Chamada à API Lumo AI
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.lumoai.com/v1/chat/completions', [
            'model' => 'lumo-1',
            'messages' => [
                ['role' => 'user', 'content' => $request->message]
            ],
        ]);

        $botReply = $response->json()['choices'][0]['message']['content'] ?? 'Desculpe, não consegui entender.';

        // Salva resposta da IA
        $botMessage = ChatIA::create([
            'sender' => 'bot',
            'message' => $botReply,
        ]);

        return response()->json([
            'user' => $userMessage,
            'bot' => $botMessage,
        ]);
    }
}