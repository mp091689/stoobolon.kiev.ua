<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    public function menu() {
        return $this->hasOne('App\Models\Menu');
    }

}
