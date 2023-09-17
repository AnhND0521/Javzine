<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'intro',
        'content',
        'thumbnail',
        'tags',
        'category_id',
        'user_id',
        'published',
        'view'
    ];
    protected $casts = [
        'tags' => 'array',
        'published' => 'boolean'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'favorites')->withPivot('id')->withTimestamps();
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
}
