<?php

namespace App\Models;

// C: 25Jun10 Amal
// 25jun12 Renamed the file to HomeSlider.php changed the table linked to cmn_homeslider changed the linked image name in the table to 20_chra_homeslider.webp

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $table = 'cmn_homeslider';
}