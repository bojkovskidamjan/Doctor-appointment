<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Booking extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
}
