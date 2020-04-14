<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
	protected $primaryKey = 'tar_id';

    protected $fillable = [
    	'tar_name', 'tar_description', 'tar_features'
    ];
}
