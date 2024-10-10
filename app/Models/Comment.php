<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'rating', 'user_id', 'home_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Home model
    public function home()
    {
        return $this->belongsTo(Home::class);
    }


}
