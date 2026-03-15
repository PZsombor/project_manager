<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorsController extends Controller
{
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
        $request->validate([
            'user_id' => 'required',
            'repository_id' => 'required',
            'role' => 'required',
        ]);
        $collaborator = new Collaborator;
        $collaborator->user_id = $request->user_id;
        $collaborator->repository_id = $request->repository_id;
        $collaborator->role = $request->role;
        $collaborator->save();

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
        $request->validate([
            'user_id' => 'required',
            'repository_id' => 'required',
            'role' => 'required',
        ]);
        $collaborator = Collaborator::findOrFail($id);
        $collaborator->user_id = $request->user_id;
        $collaborator->repository_id = $request->repository_id;
        $collaborator->role = $request->role;
        $collaborator->save();

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
