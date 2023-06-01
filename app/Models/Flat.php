<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "price",
        "picture_link",
        "frame",
        "section",
        "floor",
        "apart_number",
        "squere",
        "rooms",
        "finishing"
    ];

    public static $filters = [
        "frame",
        "section",
        "floor",
        "apart_number",
        "squere",
        "rooms",
        "finishing"
    ];
}
