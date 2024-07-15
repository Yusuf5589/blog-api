<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kvkk extends Model
{
    protected $table = "kvkk";
    protected $fillable = ["title", "description", "created_at", "updated_at"];

    use HasFactory;
}
