<?php

namespace App\Http\Controllers\V2;

use App\Models\Repository;
use App\Models\Branch;
use App\Http\Controllers\V2\BranchesController;
use Illuminate\Http\Request;

class RepositoriesController extends Controller
{
    public function repositories()
    {
        $repositories = Auth()->user()->repositories()->get();

        return response()->json([
            'success' => true,
            'data' => [
                'repositories' => $repositories,
            ],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repository = Repository::all();

        return response()->json([
            'success' => true,
            'data' => $repository,
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
        //Validating repo data and making a model
        $validated = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);
        $repository = new Repository();
        $repository->name = $validated['name'];
        $repository = $validated['category'];

        //Making a branch with the branches() relationship
        $branch = $repository->branches()->create([
            'name' => 'main',
        ]);
        
        return response()->json([
        'success' => true,
        'data' => [
            'repository' => $repository,
            'branch' => $branch,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $repository = Repository::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $repository->branches()->all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repository $repository)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);
        $repository = Repository::findOrFail($id);
        $repository->update($validated);

        return response()->json([
            'success' => true,
            'data' => $repository,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $repository = Repository::delete($id);

        return response()->json([
            'success' => true,
            'data' => $repository,
        ]);
    }
}
