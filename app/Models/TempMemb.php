<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TempMemb extends Model
{
    use HasFactory;

    protected $table = 'temp_memb'; // Explicit table name

protected $fillable = [
    'title',
    'first_name', 
    'last_name',
    'house_no',
    'street_name', // New column
    'street_id',   // Keep but nullable
    'line3',
    'post_code',
    'email',
    'mobile',
    'terms_accepted',
    'ip_address',
    'user_agent'
];


    protected $casts = [
        'terms_accepted' => 'boolean',
        'is_verified' => 'boolean',
        'otp_attempts' => 'integer',
        'otp_expires_at' => 'datetime',
    ];

    // Relationship with cmn_street
    public function street()
    {
        return $this->belongsTo(CmnStreet::class, 'street_id');
    }
}
