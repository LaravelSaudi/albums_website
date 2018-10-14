<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'albums';

    protected $fillable = [
        'title', 'details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function photo()
    {
        return $this->hasMany(Photo::class, 'album_id');
    }

}
