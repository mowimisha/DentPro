<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dms_patients';    

    public function payments() {
    	return $this->hasMany('App\Payment');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    public function waiting() {
        return $this->hasOne('App\Waiting');
    }
}
