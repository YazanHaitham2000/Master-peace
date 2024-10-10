<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeUser extends Model
{
    use HasFactory;
        // If you want to customize the table name (optional, usually not needed for pivot tables)
        protected $table = 'home_user';

        // If you don't want to use timestamps
        public $timestamps = false;
    
        // Define relationships if needed (e.g., if you want to define relationships from this model to User and Home models)
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        public function home()
        {
            return $this->belongsTo(Home::class);
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
