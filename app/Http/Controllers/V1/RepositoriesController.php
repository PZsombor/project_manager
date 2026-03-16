<?php

namespace App\Http\Controllers\V1;


use App\Models\Repository;
use Illuminate\Http\Request;

class RepositoriesController extends Controller
{
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
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $repository = new Repository;
        $repository->name = $request->name;
        $repository->category = $request->category;
        $repository->description = $request->description;
        $repository->status = $request->status;
        $repository->save();

        return response()->json([
            'success' => true,
            'data' => $repository,
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
            'data' => $repository,
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
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $repository = Repository::findOrFail($id);
        $repository->name = $request->name;
        $repository->category = $request->category;
        $repository->description = $request->description;
        $repository->status = $request->status;
        $repository->save();

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
