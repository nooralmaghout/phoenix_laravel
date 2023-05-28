<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan_type extends Model
{
    use HasFactory;

    protected $table = "plan_types";

    protected $fillable = [
        "ar_name",
        "en_name",
    ];

    public $timestamps = false;

    public function setArNameAttribute($value)
    {
        $this->attributes['ar_name'] = strtolower($value);
    }
    public function setEnNameAttribute($value)
    {
        $this->attributes['en_name'] = strtolower($value);
    }
}
