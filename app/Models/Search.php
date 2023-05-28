<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    protected $table = "searches";

    protected $fillable = [
        "tourist_id",
        "search"];

    public $timestamps = false;

    public function setSearchAttribute($value)
    {
        $this->attributes['search'] = strtolower($value);
    }
}
