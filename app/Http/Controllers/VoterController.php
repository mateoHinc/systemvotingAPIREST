<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Candidate;
use App\Models\Voter;

class VoterController extends Controller
{
    // POST /voters
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:voters,email',
        ]);

        // Verificar que el nombre no exista como candidato
        if (Candidate::where('name', $request->name)->exists()) {
            return response()->json(['error' => 'El nombre pertenece a un candidato'], 400);
        }

        $voter = Voter::create($request->all());

        return response()->json($voter, 201);
    }

    // GET /voters
    public function index()
    {
        return response()->json(Voter::all(), 200);
    }

    public function FilterAndPagination(Request $request)
    {
        $query = Voter::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('has_voted')) {
            $query->where('has_voted', $request->has_voted);
        }

        // Paginación (default 10 por página)
        $voters = $query->paginate($request->get('per_page', 10));

        return response()->json($voters, 200);
    }

    // GET /voters/{id}
    public function show($id)
    {
        $voter = Voter::find($id);

        if (!$voter) {
            return response()->json(['error' => 'Votante no encontrado'], 404);
        }

        return response()->json($voter, 200);
    }

    // DELETE /voters/{id}
    public function destroy($id)
    {
        $voter = Voter::find($id);

        if (!$voter) {
            return response()->json(['error' => 'Votante no encontrado'], 404);
        }

        if ($voter->has_voted) {
            return response()->json(['error' => 'No se puede eliminar: el votante ya emitió un voto'], 400);
        }

        $voter->delete();

        return response()->json(['message' => 'Votante eliminado correctamente'], 200);
    }
}
