<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    public function setAliasAttribute($value)
    {
        if( $value == '' || preg_match('/^ +$/', $value) ){
            $this->attributes['alias'] = $this->strToUrl($this->attributes['title']);
        }else{
            $this->attributes['alias'] = $value;
        }
    }

}
