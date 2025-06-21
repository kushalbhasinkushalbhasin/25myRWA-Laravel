<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CmnStreet extends Model
{
    use HasFactory;

    protected $table = 'cmn_street'; // Explicit table name

    protected $fillable = ['name']; // Add other fields if needed

    public function members()
    {
        return $this->hasMany(TempMemb::class, 'street_id');
    }
}
