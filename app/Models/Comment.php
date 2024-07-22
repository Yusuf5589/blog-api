<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //Comment Model Veritabanı işlemlerimizi kolaylaştırıyor

    protected $table = "comment";
    protected $fillable = ["comments", "comments_gmail", "blogId", "status", "created_at", "updated_at"];

}
