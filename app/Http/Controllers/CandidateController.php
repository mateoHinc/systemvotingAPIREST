<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Voter;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    // POST /candidates
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'party' => 'nullable|string',
        ]);

        // Verificar que el nombre no exista como votante
        if (Voter::where('name', $request->name)->exists()) {
            return response()->json(['error' => 'El nombre pertenece a un votante'], 400);
        }

        $candidate = Candidate::create($request->all());

        return response()->json($candidate, 201);
    }

    // GET /candidates
    public function index()
    {
        return response()->json(Candidate::all(), 200);
    }

    // GET /candidates/filter
    public function FilterAndPagination(Request $request)
    {
        $query = Candidate::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('party')) {
            $query->where('party', 'like', '%' . $request->party . '%');
        }

        // Paginación (default 10 por página)
        $candidates = $query->paginate($request->get('per_page', 10));

        return response()->json($candidates, 200);
    }

    // GET /candidates/{id}
    public function show($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return response()->json(['error' => 'Candidato no encontrado'], 404);
        }

        return response()->json($candidate, 200);
    }

    // DELETE /candidates/{id}
    public function destroy($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return response()->json(['error' => 'Candidato no encontrado'], 404);
        }

        $candidate->delete();

        return response()->json(['message' => 'Candidato eliminado correctamente']);
    }
}
