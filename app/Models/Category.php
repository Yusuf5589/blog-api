<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
//Category Model Veritabanı işlemlerimizi kolaylaştırıyor
    protected $table = 'category'; 
    protected $fillable = [
        'name',
        'slug',
    ];
}
