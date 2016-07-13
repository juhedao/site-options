<?php

namespace Juhedao\SiteOptions\Models;

use Illuminate\Database\Eloquent\Model;


class Options extends Model  {

    protected $table = 'options';

    protected $fillable = ['option_name','option_group','option_value','autoload'];

    public function scopeSingle($query,$optionName) {
        return $query->where('option_name',$optionName)->pluk('option_value');
    }

    public function scopeGroup($query,$opetionGroup) {
        return $query->where('option_group',$opetionGroup);
    }

    public function scopeAutoload($query){
        return $query->where('autoload',true);
    }

    public function scopeToList($query) {
        return $query->lists('option_name','option_value');
    }

}