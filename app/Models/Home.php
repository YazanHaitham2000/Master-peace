<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory , Notifiable;
      // Specify which attributes are mass assignable.
 
      protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'price',
        'area',
        'rooms',
        'bathrooms',
        'bedrooms',    // Add this
        'location',    // Add this
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the many-to-many relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Define the relationship with the FavoriteHome model
    public function favoriteHomes()
    {
        return $this->hasMany(FavoriteHome::class);
    }

    // Define the relationship with the Image model
    public function images()
    {
        return $this->hasMany(Image::class);
    }


    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function owner()
{
    return $this->belongsTo(User::class, 'user_id'); // user_id refers to the owner
}





}
