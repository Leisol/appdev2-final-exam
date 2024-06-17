<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionArtwork extends Model
{
    use HasFactory;

    protected $table = 'collection_artworks';

    protected $fillable = [
        'collection_id',
        'artwork_id',
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    public function artwork()
    {
        return $this->belongsTo(Artwork::class, 'artwork_id');
    }
}
