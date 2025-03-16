<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function message(Request $request)
    {
        // Récupérer le message de l'utilisateur
        $message = $request->input('message');
        
        // Réponse simple du chatbot (à personnaliser selon vos besoins)
        $response = $this->getResponse($message);
        
        return response()->json([
            'message' => $response
        ]);
    }
    
    private function getResponse($message)
    {
        // Vous pouvez personnaliser cette logique pour répondre à différentes questions
        $message = strtolower($message);
        
        if (strpos($message, 'bonjour') !== false || strpos($message, 'salut') !== false) {
            return 'Bonjour ! Comment puis-je vous aider aujourd\'hui ?';
        }
        
        if (strpos($message, 'forfait') !== false || strpos($message, 'offre') !== false) {
            return 'Nous proposons plusieurs forfaits adaptés à vos besoins. Consultez notre site web ou contactez le service client au 666.';
        }
        
        if (strpos($message, 'problème') !== false || strpos($message, 'panne') !== false) {
            return 'Je suis désolé pour ce désagrément. Veuillez préciser votre problème et nous ferons de notre mieux pour vous aider.';
        }
        
        if (strpos($message, 'contact') !== false) {
            return 'Vous pouvez nous contacter au 666 ou par email à contact@mobilis.dz';
        }
        
        // Réponse par défaut
        return 'Merci pour votre message. Un conseiller va vous répondre dans les plus brefs délais.';
    }
}
