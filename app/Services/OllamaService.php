<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OllamaService
{
    public static function embed(string $text)
    {
        // URL do Ollama
        $ollamaUrl = env('OLLAMA_URL');
        $model = env('OLLAMA_MODEL', 'phi3');

        $response = Http::timeout(120)->post($ollamaUrl . '/api/embed', [
            'model' => $model,
            'input' => $text
        ]);

        return $response->json()['embeddings'][0] ?? null;
    }
}