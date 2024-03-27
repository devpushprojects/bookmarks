<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

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
        $result = $this->validationCheck($request->all());
    
        if ($result instanceof JsonResponse) {
            return $result;
        }
    
        $params = $request->all();
        return Bookmark::create($params);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Bookmark::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = $this->validationCheck($request->all());

        if ($result instanceof JsonResponse) {
            return $result;
        }
    
        $bookmark = Bookmark::find($id);
        $bookmark->name = $request->name;
        $bookmark->url = $request->url;
        $bookmark->save();
    
        return $bookmark;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookmark = Bookmark::find($id);
        $bookmark?->delete();
        
        return response()->noContent();
    }

    /**
     * Verify that request params are valid values.
     */
    protected function validationCheck(array $params): JsonResponse|true
    {
        $validator = Validator::make($params, [
            'name' => 'required|max:100',
            'url' => 'required|url:http,https|max:200'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        return true;
    }
}
