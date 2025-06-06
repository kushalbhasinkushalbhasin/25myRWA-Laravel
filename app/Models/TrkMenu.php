<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrkMenu extends Model
{
    use HasFactory;
    protected $table = 'trk_menu';
    protected $primaryKey = 'menu_id';
    public $timestamps = false;


    public function submenu()
    {
        return $this->hasMany(TrkSubmenu::class, 'menu_id', 'menu_id')
            ->where('is_active', 1)
            ->orderBy('display_order', 'ASC');
    }
}