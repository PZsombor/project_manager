<?php

namespace App\Http\Controllers\V2;

use App\Models\Collaborator;
use App\Models\Repository;
use Illuminate\Http\Request;

class CollaboratorsController extends Controller
{
    public function collaborators(Repository $repository)
    {
        $collaborators = $repository->collaborators()->get();

        return response()->json([
            'success' => true,
            'data' => [
                'collaborators' => $collaborators,
            ],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaborators = Collaborator::all();

        return response()->json([
            'success' => true,
            'data' => $collaborators,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'repository_id' => 'required',
            'role' => 'required',
        ]);
        $collaborator = Collaborator::create($validated);

        return response()->json([
            'success' => true,
            'data' => $collaborator,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $collaborator = Collaborator::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $collaborator,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collaborator $collaborator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'repository_id' => 'required',
            'role' => 'required',
        ]);
        $collaborator = Collaborator::findOrFail($id);
        $collaborator->update($validated);

        return response()->json([
            'success' => true,
            'data' => $collaborator,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collaborator = Collaborator::delete($id);
        
        return response()->json([
            'success' => true,
            'data' => $collaborator,
        ]);
    }
}
