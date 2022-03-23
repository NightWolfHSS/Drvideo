<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * table comments
     * @var string
     */
    protected $table = 'comments';
    
    /** guarded */
    protected $guarded = []; 

    /**
     * just get comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id');
    }

}
