<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bookmark::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all();
        return Bookmark::create($params);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return Bookmark::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $bookmark = Bookmark::find($id);
        $bookmark->name = $request->name;
        $bookmark->url = $request->url;
        $bookmark->save();

        return $bookmark;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $bookmark = Bookmark::find($id);
        $bookmark?->delete();
        
        return response()->noContent();
    }
}
