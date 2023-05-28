<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image1 extends Model
{
    use HasFactory;

    protected $table = "images";

    protected $fillable = [
        "url",
        "landmark_id",
        "place_id",
        "event_id",
    ];

    public $timestamps = false;
    public function event()
    {
    return $this->belongsTo(Event::class);
    }
    public function landmark()
    {
    return $this->belongsTo(Landmark::class);
    }
    public function place()
    {
    return $this->belongsTo(Place::class);
    }

    
}
