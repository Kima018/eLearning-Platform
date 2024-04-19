<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    protected $table = 'lectures';
    protected $fillable = [
        'name',
        'description',
        'lecture_link',
        'user_id',
        'thumbnail_image',
    ];
}
