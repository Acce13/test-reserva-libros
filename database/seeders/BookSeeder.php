<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            array(
                'gender_id' => 1,
                'title' => 'El faro del fin del mundo',
                'author' => 'Julio Verne',
                'description' => 'En la isla de los Estados, una isla deshabitada de la Patagonia argentina, donde se confunden los océanos Atlántico y Pacífico, habita una banda de piratas dirigida por el terrible Kongre. Estos piratas se dedican a atacar embarcaciones que encallan en la zona. Su modo de vida se ve seriamente amenazado cuando el gobierno argentino construye y pone en funcionamiento un faro, el llamado actualmente Faro del Fin del Mundo, que dejan al cuidado de tres fareros.',
                'imageUrl' => 'books/elfarodelfindelmundo.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:m:s')
            ),
            array(
                'gender_id' => 2,
                'title' => 'Dune',
                'author' => 'Frank Herbet',
                'description' => 'La mayor epopeya de todos los tiempos, en nueva edición con la traducción corregida en 2019. En el desértico planeta Arrakis, el agua es el bien más preciado y llorar a los muertos, el símbolo de máxima prodigalidad. Pero algo hace de Arrakis una pieza estratégica para los intereses del Emperador, las Grandes Casas y la Cofradía, los tres grandes poderes de la galaxia.',
                'imageUrl' => 'books/dune.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:m:s')
            ),
            array(
                'gender_id' => 3,
                'title' => 'Los crimenes de la calle morgue',
                'author' => 'Edgar Allan Poe',
                'description' => "Las crímenes de la calle Morgue, también conocido como Los asesinatos de la calle Morgue o Los asesinatos de la rue Morgue, es un cuento del género policíaco y de terror del escritor estadounidense Edgar Allan Poe, publicado por primera vez en la revista Graham's Magazine, de Filadelfia, en el mes de abril de 1841.",
                'imageUrl' => 'books/loscrimenesdelacalle.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:m:s')
            ),
            array(
                'gender_id' => 4,
                'title' => 'Dracula',
                'author' => 'Bram Stoker',
                'description' => "Drácula, es una novela de fantasía gótica escrita por Bram Stoker, publicada en 1897. Publicada en castellano por Ediciones Hymsa bajo la colección 'La novela aventura' en 1935, con portada de Juan Pablo Bocquet e ilustraciones de 'Femenía'.",
                'imageUrl' => 'books/dracula.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:m:s')
            ),
        ])->map(function ($item, $key) {
            DB::table('books')->insert($item);
        });
    }
}
