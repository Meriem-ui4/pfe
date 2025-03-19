<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Reclamation;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the admin home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('admin.home');
    }

    /**
     * Show the admin dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request)
    {
        // Période par défaut (30 jours)
        $days = $request->input('period', 30);
        $startDate = Carbon::now()->subDays($days);
        $previousStartDate = Carbon::now()->subDays($days * 2);

        // Statistiques générales
        $totalReclamations = Reclamation::where('created_at', '>=', $startDate)->count();
        $previousTotalReclamations = Reclamation::whereBetween('created_at', [$previousStartDate, $startDate])->count();
        $growthRate = $previousTotalReclamations > 0 
            ? round((($totalReclamations - $previousTotalReclamations) / $previousTotalReclamations) * 100, 1)
            : 100;

        // Réclamations résolues
        $resolvedCount = Reclamation::where('status', 'resolu')
            ->where('created_at', '>=', $startDate)
            ->count();
        $previousResolvedCount = Reclamation::where('status', 'resolu')
            ->whereBetween('created_at', [$previousStartDate, $startDate])
            ->count();
        $resolvedGrowth = $previousResolvedCount > 0 
            ? round((($resolvedCount - $previousResolvedCount) / $previousResolvedCount) * 100, 1)
            : 100;

        // Réclamations non résolues
        $unresolvedCount = Reclamation::where('status', 'non_consulte')
            ->where('created_at', '>=', $startDate)
            ->count();
        $previousUnresolvedCount = Reclamation::where('status', 'non_consulte')
            ->whereBetween('created_at', [$previousStartDate, $startDate])
            ->count();
        $unresolvedGrowth = $previousUnresolvedCount > 0 
            ? round((($unresolvedCount - $previousUnresolvedCount) / $previousUnresolvedCount) * 100, 1)
            : 100;

        // Réclamations supprimées (simulé car les données supprimées ne sont plus dans la base)
        // Dans une application réelle, vous pourriez avoir une table d'audit ou un soft delete
        $deletedCount = rand(5, 20); // Simulé pour l'exemple
        $previousDeletedCount = rand(3, 15); // Simulé pour l'exemple
        $deletedGrowth = $previousDeletedCount > 0 
            ? round((($deletedCount - $previousDeletedCount) / $previousDeletedCount) * 100, 1)
            : 100;

        // Pourcentages pour les graphiques
        $totalForPercentage = $resolvedCount + $unresolvedCount;
        $resolvedPercentage = $totalForPercentage > 0 ? round(($resolvedCount / $totalForPercentage) * 100) : 0;
        $unresolvedPercentage = $totalForPercentage > 0 ? round(($unresolvedCount / $totalForPercentage) * 100) : 0;

        // Temps moyen de résolution (simulé)
        $avgResolutionTime = rand(24, 72);
        
        // Taux de résolution
        $resolutionRate = $totalForPercentage > 0 ? round(($resolvedCount / $totalForPercentage) * 100) : 0;

        // Données pour le graphique par type
        $types = Reclamation::select('type')
            ->where('created_at', '>=', $startDate)
            ->groupBy('type')
            ->pluck('type')
            ->toArray();

        $typeLabels = $types;
        $typeResolvedData = [];
        $typeUnresolvedData = [];
        $typeDeletedData = [];

        foreach ($types as $type) {
            $typeResolvedData[] = Reclamation::where('type', $type)
                ->where('status', 'resolu')
                ->where('created_at', '>=', $startDate)
                ->count();
                
            $typeUnresolvedData[] = Reclamation::where('type', $type)
                ->where('status', 'non_consulte')
                ->where('created_at', '>=', $startDate)
                ->count();
                
            // Données supprimées simulées
            $typeDeletedData[] = rand(0, 5);
        }

        // Données pour le graphique d'évolution dans le temps
        $timelineLabels = [];
        $timelineTotalData = [];
        $timelineResolvedData = [];
        $timelineUnresolvedData = [];

        // Générer des données pour chaque jour de la période
        for ($i = $days; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('d/m');
            $timelineLabels[] = $date;
            
            $dayStart = Carbon::now()->subDays($i)->startOfDay();
            $dayEnd = Carbon::now()->subDays($i)->endOfDay();
            
            $dayTotal = Reclamation::whereBetween('created_at', [$dayStart, $dayEnd])->count();
            $dayResolved = Reclamation::where('status', 'resolu')
                ->whereBetween('created_at', [$dayStart, $dayEnd])
                ->count();
            $dayUnresolved = Reclamation::where('status', 'non_consulte')
                ->whereBetween('created_at', [$dayStart, $dayEnd])
                ->count();
                
            $timelineTotalData[] = $dayTotal;
            $timelineResolvedData[] = $dayResolved;
            $timelineUnresolvedData[] = $dayUnresolved;
        }

        return view('admin.dashboard', compact(
            'totalReclamations', 'growthRate',
            'resolvedCount', 'resolvedGrowth',
            'unresolvedCount', 'unresolvedGrowth',
            'deletedCount', 'deletedGrowth',
            'resolvedPercentage', 'unresolvedPercentage',
            'avgResolutionTime', 'resolutionRate',
            'typeLabels', 'typeResolvedData', 'typeUnresolvedData', 'typeDeletedData',
            'timelineLabels', 'timelineTotalData', 'timelineResolvedData', 'timelineUnresolvedData'
        ));
    }

    /**
     * Show the change password form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = Auth::user();

        // Check if current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe directement dans la base de données
        $affected = DB::table('users')
            ->where('id', $user->id)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        if ($affected) {
            return back()->with('status', 'Mot de passe mis à jour avec succès!');
        }

        return back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour du mot de passe.']);
    }

    /**
     * Show the forms list.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forms()
    {
        // Rediriger vers la vue existante des réclamations
        return redirect()->route('admin.reclamations');
    }
}

