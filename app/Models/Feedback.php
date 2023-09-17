<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'post_id'
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
