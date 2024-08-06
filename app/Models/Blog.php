<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];

    //Blog Model Veritaban ı i ş lemlerimizi kolayla ş t ı r ı yor
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
        "slug"
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


    public function getImageUrlAttribute()
    {
        if($this->img_url == ""){
            return asset('storage/img_url/blog-default.png');
        }else{
            return asset('storage/' . $this->img_url);
        }
    }
    


    //e ğ er yeni resim eklendiyse ö ncekini siliyor veya blog silindiyse strogedaki resmi siliyor
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
