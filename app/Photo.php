<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $table = 'photos';

    protected $fillable = [
        'path', 'name', 'type',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class,
            'album_id');
    }

}
