<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Treatment;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker::create();
        Treatment::create([
            'name'=>'Botox',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=> asset('assets/Botox.jpg')
        ]);

        Treatment::create([
            'name'=>'Limpieza Facial',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Limpieza.jpg')
        ]);

        Treatment::create([
            'name'=>'Hidratacion Profunda',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/HidratacionProfunda.jpg')
        ]);

        Treatment::create([
            'name'=>'PRP',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/PRP.png')
        ]);

        Treatment::create([
            'name'=>'Aplicacion de Encimas',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Encimas.jpg')
        ]);

        Treatment::create([
            'name'=>'Acido Hialuronico',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Acido.jpg')
        ]);

        Treatment::create([
            'name'=>'Colocacion de Hilos Tensores',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Hilostensores.png')
        ]);

        Treatment::create([
            'name'=>'Radio Frecuencia',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Radiofrecuencia.jpg')
        ]);

        Treatment::create([
            'name'=>'Ultrasonido',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Ultrasonido.jpg')
        ]);

        Treatment::create([
            'name'=>'Aplicacion de Mascara Led',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Mascaraled.jpg')
        ]);

        Treatment::create([
            'name'=>'Plasma Pen y Derma Pen',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Dermapen.jpeg')
        ]);

        Treatment::create([
            'name'=>'Exeresis',
            'description'=>$fake->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>"1-2-3.4-4,5",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Exeresis.jpg')
        ]);
    }
}
