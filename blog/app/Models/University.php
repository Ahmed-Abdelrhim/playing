<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'universities';
    protected $fillable = ['country_id ','name'];
    protected $hidden = [];
    public $timestamps = false;



    ################################# Relation     #################################
    public function country() {
        return $this->belongsTo('App\Models\Country','country_id');
    }
    ################################# Relation     #################################
}
