<?php

namespace App\Models;
use App\Traits\uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use uuid;
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'postid',
        'cover_image'
    ];
    public function ownBy(User $user){
        return $this->user_id === $user->name;
    }
    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }


}
