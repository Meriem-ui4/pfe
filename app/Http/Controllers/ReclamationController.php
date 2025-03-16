<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use App\Mail\ReclamationResolved; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;




class ReclamationController extends Controller
{
    public function create()
    {
        return view('reclamations.create');
        return view('reclamation.create', ['showFooter' => false]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required|regex:/^06[0-9]{8}$/',
            'email' => 'required|email',
            'type' => 'required',
            'message' => 'required',
            
        ]);

        Reclamation::create($request->all());

        return redirect()->back()->with('success', 'Réclamation envoyée avec succès!');
    }

    public function index()
    {
        $reclamations = Reclamation::all();
        return view('admin.reclamations.index', compact('reclamations'));
        
    }
   
    public function update(Request $request, $id)
    {
        $reclamation = Reclamation::findOrFail($id);
        $oldStatus = $reclamation->status;
        $newStatus = $request->input('status');
        
        $reclamation->status = $newStatus;
        $reclamation->save();
        
        // Envoyer un email si la réclamation vient d'être résolue
        if ($oldStatus != 'resolu' && $newStatus == 'resolu') {
            try {
                Mail::to($reclamation->email)->send(new ReclamationResolved($reclamation));
            } catch (\Exception $e) {
                // Log l'erreur mais ne pas interrompre le processus
                Log::error('Erreur lors de l\'envoi de l\'email: ' . $e->getMessage());
            }
        }
        
        return redirect()->back()->with('success', 'Statut de la réclamation mis à jour avec succès.');
    }
    
    // Autres méthodes...
}