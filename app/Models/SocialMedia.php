<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_info_address',
        'contact_info_email',
        'contact_info_phone',
        'social_media_facebook_link',
        'social_media_linkedin_link',
        'social_media_instagram_link',
        'copyright',
    ];
}
