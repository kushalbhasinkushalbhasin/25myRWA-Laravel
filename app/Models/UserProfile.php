<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'first_name',
        'last_name',
        'house_no',
        'street_id',
        'line3',
        'post_code',
        'mobile',
        'terms_accepted',
        'meeting_attendance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
