<?php

namespace App\Http\Controllers\V1;


use App\Models\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
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
        $request->validate([
            'name' => 'required',
            'path' => 'required', //lehet ez nem kell
        ]);
        $file = new File;
        $file->name = $request->name;
        $file->path = $request->path;
        $file->save();

        return response()->json([
            'success' => true,
            'data' => $file,
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
        $request->validate([
            'name' => 'required',
            'path' => 'required', //lehet ez nem kell
        ]);
        $file = new File;
        $file->name = $request->name;
        $file->path = $request->path;
        $file->save();

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
