<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'page_slug',
        'page_feature_image',
        'page_content',
        'is_active',
        'page_meta_keywords',
        'page_meta_desc',
    ];
}
