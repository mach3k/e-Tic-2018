<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function ramo()
	{
		return $this->belongsTo('App\Ramo');
	}
}
