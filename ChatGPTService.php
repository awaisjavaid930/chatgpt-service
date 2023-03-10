  public static function askQuestion($question)
    {
        /**
        * CHATGPT_API_KEY Set ENV variable from link (https://platform.openai.com/account/api-)
        *
        */
        $response = Http::withoutVerifying()
        ->withHeaders([
            'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/engines/text-davinci-003/completions', [
            "prompt" => $question ,
            "max_tokens" => 1000,
            "temperature" => 0.5
        ]);
        
        return $response->json()['choices'][0]['text'];
    }
