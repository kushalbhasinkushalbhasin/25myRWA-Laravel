<?php

namespace App\Models;
// C: Amal : Model to display pop up (on Home Page or Any Page)
// U 25Jun11 AT : Added HomePagePopUp linked to to cmn_homepagepopup


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePagePopUp extends Model
{
    use HasFactory;
    protected $table = 'cmn_homepagepopup';
}