<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = "favorites";

    protected $fillable = ["place_id","tourist_id"];

    public $timestamps = false;
    public function place()
    {
    return $this->belongsTo(Place::class);
    }
    
    public function tourist()
    {
    return $this->belongsTo(Tourist::class);
    }
    
}
