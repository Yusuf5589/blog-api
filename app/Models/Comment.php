<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    protected $fillable = ["comments", "comments_gmail", "comments_blog_title", "created_at", "updated_at"];

    use HasFactory;
}
