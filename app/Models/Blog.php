<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    //Blog Model Veritabanı işlemlerimizi kolaylaştırıyor
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
    


    //eğer yeni resim eklendiyse öncekini siliyor veya blog silindiyse strogedaki resmi siliyor
    protected static function booted()
    {
        parent::boot();
        static::updating(function ($user) {
            if ($user->isDirty('img_url')) {
                $oldPhoto = $user->getOriginal('img_url');
                if ($oldPhoto && Storage::disk('public')->exists($oldPhoto)) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }
        });

        static::deleted(function ($user) {
            if ($user->img_url && Storage::disk('public')->exists($user->img_url)) {
                Storage::disk('public')->delete($user->img_url);
            }
        });


        static::retrieved(function ($blog) {
            $blog->increment('view_count');
        });
        
    }


}
