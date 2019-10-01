<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

 public $fillable = ['name','id','title','sub_id'];


    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function childs() {
        return $this->hasMany('App\Employee','sub_id','id') ;
    }
}




