<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $primaryKey = 'artwork_id';

    protected $fillable = [
        'user_id',
        'artist_id',
        'title',
        'description',
        'upload_date',
        'medium',
        'dimensions',
        'image_url',
        'visibility',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_artworks', 'artwork_id', 'collection_id');
    }
}
