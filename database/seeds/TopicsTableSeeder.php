<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Español
        Topic::create([
        	'top_name' => 'Tipos de texto',
        	'top_objective' => 'Identificar y comprender los aspectos formales y conceptuales de diversos tipos de texto: narrativo, informativo, enciclopédico.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 1,
        ]);
        Topic::create([
        	'top_name' => 'Sustantivos',
        	'top_objective' => 'Identificar los sustantivos y sus tipos en diferentes textos.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 1,
        ]);
        Topic::create([
        	'top_name' => 'La oración',
        	'top_objective' => 'Comprender aspectos formales y conceptuales (en especial, características de las oraciones y formas de relación entre ellas), al interior de cada texto leído.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 1,
        ]);
        Topic::create([
        	'top_name' => 'Adjetivo',
        	'top_objective' => 'Identificar los adjetivos y sus tipos en diferentes textos.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 1,
        ]);

        // Matematicas
        Topic::create([
        	'top_name' => 'Sistema Decimal',
        	'top_objective' => 'Utilizar el sistema de numeración decimal para representar, comparar y operar números.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 2,
        ]);
        Topic::create([
        	'top_name' => 'Fracciones',
        	'top_objective' => 'Identificar las partes de una fracción y las representa gráfica y matemáticamente.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 2,
        ]);
        Topic::create([
        	'top_name' => 'Resta',
        	'top_objective' => 'Describir y desarrollar estrategias para calcular la resta en diferentes problemas.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 2,
        ]);
        Topic::create([
        	'top_name' => 'Multiplicacion',
        	'top_objective' => 'Aplicar los algoritmos de la multiplicación en la solución de problemas cotidianos.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 2,
        ]);

        // Ciencias Naturales
        Topic::create([
        	'top_name' => 'Seres vivos',
        	'top_objective' => 'Clasificar los seres vivos en diferentes grupos taxonómicos utilizando y creando claves de identificación simples.',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 3,
        ]);
        Topic::create([
        	'top_name' => 'Estados del agua',
        	'top_objective' => 'Identificar y describir los estados del agua y algunas características. ',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 3,
        ]);
        Topic::create([
        	'top_name' => 'Celula',
        	'top_objective' => 'Describir la célula como la unidad básica de los seres vivos y reconocer sus organos',
        	'top_grade' => 'Grado 4°',
        	'top_tax_id' => 3,
        ]);
    }
}
