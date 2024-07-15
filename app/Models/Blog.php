<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog'; 
    protected $fillable = [
        'title',
        'description',
        'beginning_date',
        'finish_date',
        'category_id',
        'tags',
        'view_count',
        'img_url',
        'status',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
    

    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = json_encode($value);
    }
    
    public function getTagsAttribute($value)
    {
        return json_decode($value, true);
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->img_url);
    }
    
}
