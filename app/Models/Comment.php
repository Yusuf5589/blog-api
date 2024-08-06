<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //Comment Model Veritaban ı i ş lemlerimizi kolayla ş t ı r ı yor

    protected $table = "comment";
    protected $fillable = ["comments", "comments_mail", "blog_slug", "status", "created_at", "updated_at"];

}
