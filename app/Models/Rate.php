<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = "rates";

    protected $fillable = [
        "place_id",
        "tourist_id",
        "rate",
        "review"];

    public $timestamps = false;
    public function place()
    {
    return $this->belongsTo(Place::class);
    }
}
