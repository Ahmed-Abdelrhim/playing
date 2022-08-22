<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['name','shortcut'];
    protected $hidden = [];
    public $timestamps = false;




    ################################# Relation     #################################
    public function university() {
        return $this->hasMany('App\Models\University','country_id');
    }
    ################################# Relation     #################################
}
