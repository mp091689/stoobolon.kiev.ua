<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /*
     * This method will replace data before insert into database.
     * And method strToUrl() is tell us how the data will be replaced.
     * Example, if $this->attributes['title'] == 'статья',
     * setAliasAttribute with strTourl() will set $value = 'statia'
     */
    public function setAliasAttribute($value)
    {
        if( $value == '' || preg_match('/^ +$/', $value) ){
            $this->attributes['alias'] = $this->strToUrl($this->attributes['title']);
        }else{
            $this->attributes['alias'] = $value;
        }
    }
}
