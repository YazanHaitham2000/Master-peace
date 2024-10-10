<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['home_id', 'user_id', 'date', 'time'];


    public function home()
    {
        return $this->belongsTo(Home::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
