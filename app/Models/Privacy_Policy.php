<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privacy_Policy extends Model
{
    use HasFactory;

    //Privacy_Policy Model Veritabanı işlemlerimizi kolaylaştırıyor
    protected $table = "privacy_policy";
    protected $fillable = ["title", "description", "created_at", "updated_at"];

}
