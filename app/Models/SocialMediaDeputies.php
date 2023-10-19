<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SocialMediaDeputies extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "social_media_deputies";
    protected $fillable = [
        'id',
        'deputy_id',
        'social_media',
    ];

}
