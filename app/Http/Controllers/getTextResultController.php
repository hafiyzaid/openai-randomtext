<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use GuzzleHttp\Client;

class getTextResultController extends Controller
{

    public function generateText(Request $request) {

        $prompt = $request->input('question');
        // $prompt='why';
        // dd($request);
        $apiKey = env('OPENAI_KEY');
        $client = new Client();
    
        $response = $client->post('https://api.openai.com/v1/completions', [
            'headers' => [
                'Authorization' => "Bearer $apiKey",
            ],
            'json' => [
                'model' => 'text-davinci-002',
                'prompt' => $prompt,
                'max_tokens' => 2048,
                'temperature' => 0.5,
            ],
        ]);
        return response()->json(['answer' => $prompt.json_decode((string) $response->getBody(), true)['choices'][0]['text']]);
           
      
    }
}
