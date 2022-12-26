<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [ 'playlist_id', 'item' ];

    public function playlist()
    {
      return $this->belongsTo(Playlist::class);
    }
}
