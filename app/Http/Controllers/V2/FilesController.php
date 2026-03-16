<?php

namespace App\Http\Controllers\V2;

use App\Models\Commit;
use App\Models\File;
use Auth;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function files(Commit $commit)
    {
        $files = $commit->files()->get();

        return response()->json([
            'success' => true,
            'data' => [
                'files' => $files,
            ],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();

        return response()->json([
            'success' => true,
            'data' => $files,
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
            'path' => 'required',
            'message' => 'nullable'
        ]);
         $commit = Commit::create([
            'user_id' => Auth()->id(),
            'message' => $validated['message'],
        ]);
        $file = $commit->files()->create([
            'name' => $validated['name'],
            'path' => $validated['path'],
            
        ]);

       
        return response()->json([
            'success' => true,
            'data' => [
                'commit' => $commit,
                'file' => $file,
            ],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $file = File::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $file,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
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
            'commit_id' => 'required',
            'path' => 'required',
        ]);
        $file = File::findOrFail($id);
        $file->update($validated);

        return response()->json([
            'success' => true,
            'data' => $file,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $file = File::delete($id);

        return response()->json([
            'success' => true,
            'data' => $file,
        ]);
    }
}
