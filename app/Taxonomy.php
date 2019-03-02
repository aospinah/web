<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
	protected $primaryKey = 'tax_id';

    protected $fillable = [
    	'tax_name', 'tax_icon'
    ];
}
