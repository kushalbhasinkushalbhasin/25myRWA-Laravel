<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrkSubmenu extends Model
{
    use HasFactory;
    protected $table = 'trk_submenu';
    protected $primaryKey = 'submenu_id';
    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(TrkMenu::class, 'menu_id', 'menu_id');
    }

    public function children()
    {
        return $this->hasMany(TrkSubmenu::class, 'parent_id', 'submenu_id')
            ->where('is_active', 1)
            ->orderBy('display_order', 'ASC');
    }
}