<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

=======
use App\Models\User;
>>>>>>> Booking-branch
class Booking extends Model
{
    use HasFactory;
    protected $guarded =[];

<<<<<<< HEAD
=======
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
>>>>>>> Booking-branch
}
