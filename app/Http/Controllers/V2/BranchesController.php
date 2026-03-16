<?php

namespace App\Http\Controllers\V2;

use App\Models\Branch;
use App\Models\Repository;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function branches(Repository $repository)
    {
        $branches = $repository->branches()->get();

        return response()->json([
            'success' => true,
            'data' => [
                'branches' => $branches,
            ],
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();

        return response()->json([
            'success' => true,
            'data' => $branches,
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
            'name' => 'required',
            'repository_id' => 'required',
        ]);
        $branch = Branch::create($validated);

        return response()->json([
            'success' => true,
            'data' => $branch,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $branch,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
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
            'repository_id' => 'required',
        ]);
        $branch = Branch::findOrFail($id);
        $branch->update($validated);

        return response()->json([
            'success' => true,
            'data' => $branch,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::delete($id);
        
        return response()->json([
            'success' => true,
            'data' => $branch,
        ]);
    }
}
