<?php

use Illuminate\Database\Seeder;
use App\Target;

class TargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Target::create([
        	'tar_name' => 'Objetivo 1',
			'tar_description' => 'Visual',
			'tar_features' => 'Caracteristicas'
        ]);
        Target::create([
        	'tar_name' => 'Objetivo 2',
			'tar_description' => 'Auditivo',
			'tar_features' => 'Caracteristicas'
        ]);
        Target::create([
        	'tar_name' => 'Objetivo 3',
			'tar_description' => 'Visual, Auditivo',
			'tar_features' => 'Caracteristicas'
        ]);
    }
}
