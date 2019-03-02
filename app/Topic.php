<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $primaryKey = 'top_id';
    protected $fillable = [
    	'top_name', 'top_objective', 'top_grade', 'top_tax_id'
    ];
}
