<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Panier;
use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Items extends Model
{
    use HasFactory;
    protected $fillable=['label','price'];
    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function likedby(User $user)
    {
        return $this->likes->contains('user_id',$user->id);
    }
     public function comments()
    {
        return $this->hasMany(Comment::class);
    }
     public function paniers()
    {
        return $this->hasMany(Panier::class);
    }
   
}