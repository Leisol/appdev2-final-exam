<?php

// app/Http/Controllers/CollectionController.php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;

class CollectionController extends Controller
{
    public function index()
    {
        return response()->json(Collection::all(), 200);
    }

    public function store(StoreCollectionRequest $request)
    {
        $collection = Collection::create([
            'user_id' => $request->user()->user_id,
            'name' => $request->name,
        ]);

        return response()->json($collection, 201);
    }

    public function show($id)
    {
        $collection = Collection::findOrFail($id);
        return response()->json($collection, 200);
    }

    public function update(UpdateCollectionRequest $request, $id)
    {
        $collection = Collection::findOrFail($id);

        if ($request->user()->user_id !== $collection->user_id) {
            return response()->json(['error' => 'You can only update your own collections.'], 403);
        }

        $collection->update($request->all());

        return response()->json($collection, 200);
    }

    public function destroy(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);

        if ($request->user()->user_id !== $collection->user_id) {
            return response()->json(['error' => 'You can only delete your own collections.'], 403);
        }

        $collection->delete();

        return response()->json(null, 204);
    }
}

