<?php

use Illuminate\Database\Seeder;
use App\Taxonomy;

class TaxonomiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taxonomy::create([
			'tax_name' => 'Español',
			'tax_icon' => 'fa fa-globe',
        ]);

        Taxonomy::create([
			'tax_name' => 'Matematicas',
			'tax_icon' => 'fa fa-calculator',
        ]);

        Taxonomy::create([
			'tax_name' => 'Ciencias Naturales',
			'tax_icon' => 'fa fa-leaf',
        ]);
    }
}
