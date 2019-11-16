<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oa extends Model
{
	protected $primaryKey = 'oa_id';
    protected $fillable = [
    	'oa_title',
		'oa_path',
		'oa_description',
		'oa_back',
		'oa_user_id',
		'oa_tax_id',
		'oa_top_id',
		'oa_top_text',
		'oa_tar_id'
    ];

    const CREATED_AT = 'oa_created_at';
    const UPDATED_AT = 'oa_updated_at';
}