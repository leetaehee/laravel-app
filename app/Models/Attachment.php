<?php

namespace App\Models;

use App\Castables\Link;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $casts = [
        'link' => Link::class
    ];

    protected $fillable = [
        'original_name',
        'name'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
