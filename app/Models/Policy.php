<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    protected $table = "policy";
    protected $fillable = ["title", "description", "slug", "created_at", "updated_at"];

}
