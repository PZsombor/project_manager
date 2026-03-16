<?php

namespace App\Http\Controllers\V1;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
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
        $request->validate([
            'name' => 'required',
            'repository_id' => 'required|exists:repositories,id',
        ]);
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->repository_id = $request->repository_id;
        $branch->save();

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
        $request->validate([
            'name' => 'required',
        ]);
        $branch = Branch::findOrFail($id);
        $branch->name = $request->name;
        $branch->save();

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
