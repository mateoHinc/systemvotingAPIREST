<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Candidate;
use App\Models\Voter;
use App\Models\Vote;

class VoteController extends Controller
{
    // POST /votes
    public function store(Request $request)
    {
        // POST /votes
        $request->validate([
            'voter_id' => 'required|exists:voters,id',
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $voter = Voter::find($request->voter_id);

        if ($voter->has_voted) {
            return response()->json(['error' => 'El votante ya ha votado'], 400);
        }

        DB::transaction(function () use ($request, $voter) {
            //Crear el voto
            Vote::create([
                'voter_id' => $request->voter_id,
                'candidate_id' => $request->candidate_id,
            ]);

            // Marcar votante como que ya votó
            $voter->update(['has_voted' => true]);

            // Incrementar votos del candidato
            $candidate = Candidate::find($request->candidate_id);
            $candidate->increment('votes');
        });

        return response()->json(['message' => 'Voto registrado correctamente.'], 201);
    }

    // GET /votes
    public function index()
    {
        $votes = Vote::with(['voter:id,name,email', 'candidate:id,name,party'])->get();

        return response()->json($votes, 200);
    }

    // GET /votes/statistics
    public function statistics()
    {
        $totalVotes = Vote::count();

        $candidates = Candidate::select('id', 'name', 'party', 'votes')->get();

        $results = $candidates->map(function ($candidate) use ($totalVotes) {
            return [
                'candidate_id' => $candidate->id,
                'name' => $candidate->name,
                'party' => $candidate->party,
                'votes' => $candidate->votes,
                'percentage' => $totalVotes > 0 ? round(($candidate->votes / $totalVotes) * 100, 2) : 0,
            ];
        });

        $voters_voted = Voter::where('has_voted', true)->count();

        return response()->json([
            'total_votes' => $totalVotes,
            'voters_voted' => $voters_voted,
            'results' => $results,
        ], 200);
    }
}
