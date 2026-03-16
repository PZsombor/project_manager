<?php

namespace App\Http\Controllers\V1;

use App\Models\Commit;
use Illuminate\Http\Request;

class CommitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commits = Commit::all();
        return response()->json([
            'success' => true,
            'data' => $commits,
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
            'message' => 'required',
        ]);
        $commit = new Commit;
        $commit->message = $request->message;
        $commit->save();

        return response()->json([
            'success' => true,
            'data' => $commit,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commit = Commit::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $commit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commit $commit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'message' => 'required',
        ]);
        $commit = Commit::findOrFail($id);
        $commit->message = $request->message;
        $commit->save();

        return response()->json([
            'success' => true,
            'data' => $commit,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commit = Commit::delete($id);
        return response()->json([
            'success' => true,
            'data' => $commit,
        ]);
    }
}
