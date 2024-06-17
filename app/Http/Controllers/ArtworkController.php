<?php

// app/Http/Controllers/ArtworkController.php

// app/Http/Controllers/ArtworkController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ArtworkResource;
use App\Http\Requests\StoreArtworkRequest;
use App\Http\Requests\UpdateArtworkRequest;

class ArtworkController extends Controller
{
    public function index()
    {
        // return ArtworkResource::collection(
        //     Artwork::where('user_id', Auth::user()->id)->get()
        // );
        return response()->json(Artwork::all(), 200);
    }

    public function store(StoreArtworkRequest $request)
    {
        $user = $request->user();

        // if (!$user) {
        //     return response()->json(['error' => 'Unauthenticated'], 401);
        // }

        $artwork = Artwork::create([
            'user_id' => $user->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'upload_date' => $request->upload_date,
            'medium' => $request->medium,
            'dimensions' => $request->dimensions,
            'image_url' => $request->image_url,
            'visibility' => $request->visibility,
        ]);

        return response()->json($artwork, 201);
    }

    public function show($id)
    {

        $artwork = Artwork::findOrFail($id);
        return response()->json($artwork, 200);

{       // Ensure the authenticated user owns the artwork
        if (Auth::id() !== $artwork->user_id) {
            return response()->json(['error' => 'You are not authorized to view this artwork.'], 403);
        }
}

    }

    public function update(UpdateArtworkRequest $request, $id )
    {
        $user = Auth::user();
        $artwork = Artwork::findOrFail($id);

        if ($user->user_id !== $artwork->user_id) {
            return response()->json(['error' => 'You can only update your own artworks.'], 403);
        }

        $artwork->update($request->all());

        return response()->json($artwork, 200);

    }

    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $artwork = Artwork::findOrFail($id);

        if ($user->user_id !== $artwork->user_id) {
            return response()->json(['error' => 'You can only delete your own artworks.'], 403);
        }

        $artwork->delete();

        return response()->json(
            ['message' => 'Artwork deleted successfully.'], 200);
    }
}

