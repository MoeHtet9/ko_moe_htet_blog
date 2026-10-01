<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
