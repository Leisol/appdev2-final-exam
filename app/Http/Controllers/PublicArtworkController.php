<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;

class PublicArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::where('visibility', 'public')->get();
        return response()->json($artworks, 200);
    }

    public function show($id)
    {
        $artwork = Artwork::where('visibility', 'public')->findOrFail($id);
        return response()->json($artwork, 200);
    }
}
