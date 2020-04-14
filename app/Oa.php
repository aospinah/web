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
		'oa_font',
		'oa_user_id',
		'oa_tax_id',
		'oa_top_id',
		'oa_top_text',
		'oa_tar_id',
        'oa_access',
        'oa_access_per'
    ];

    const CREATED_AT = 'oa_created_at';
    const UPDATED_AT = 'oa_updated_at';

    public function user()
    {
        return $this->belongsTo('App\User', 'oa_user_id');
    }

    public function taxonomy()
    {
        return $this->belongsTo('App\Taxonomy', 'oa_tax_id');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic', 'oa_top_id');
    }

    public function target()
    {
        return $this->belongsTo('App\Target', 'oa_tar_id');
    }
}
