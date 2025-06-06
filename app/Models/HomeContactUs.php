<?php

// app/Models/HomeContactUs.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContactUs extends Model
{
    protected $table = 'home_contact_us';
    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'name',
        'email',
        'message',
        'newsletter',
    ];
}
