<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = ["title", "description", "image", "user_id"];
    protected $guarded = ["info"];

    protected $table = 'posts';

    function user(){
        return $this->belongsTo(User::class);
    }
    
    function author(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function sluggable(): array
    {
        return [
            'info' => [
                'source' => 'title'
            ]
        ];
    }
}
