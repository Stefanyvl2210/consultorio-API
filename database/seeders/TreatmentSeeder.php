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
            'description'=>"Tratamiento antienvejicimiento, neurotoxina biologica que elimina las arrugas o lineas de expresion. Procedimiento minimamente invasivo",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=> asset('assets/Botox.jpg')
        ]);

        Treatment::create([
            'name'=>'Limpieza Facial',
            'description'=>"La limpieza facial es un procedimiento que se realiza para eliminar la suciedad, el aceite y las células muertas de la piel. Esto puede ayudar a mejorar la apariencia de la piel, haciéndola más suave, radiante y libre de imperfecciones",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Limpieza.jpg')
        ]);

        Treatment::create([
            'name'=>'Hidratacion Profunda',
            'description'=>"El procedimiento de hidratación profunda se puede realizar en el consultorio de un esteticista o en casa. En el consultorio, el esteticista limpiará la piel y luego aplicará una máscara hidratante. La máscara se dejará en la piel durante unos 15 minutos, antes de ser enjuagada. El esteticista también puede aplicar otros productos hidratantes, como cremas, sueros y aceites.",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/HidratacionProfunda.jpg')
        ]);

        Treatment::create([
            'name'=>'PRP',
            'description'=>"El plasma rico en plaquetas (PRP) es un tratamiento que utiliza la sangre del propio paciente para promover la curación y la reparación de tejidos. El PRP se obtiene centrifugando una muestra de sangre, lo que separa las plaquetas del resto de la sangre. Las plaquetas son las células de la sangre responsables de la coagulación, pero también contienen factores de crecimiento que pueden ayudar a acelerar el proceso de curación.",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)-No llegar al procedimiento en ayunas",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/PRP.png')
        ]);

        Treatment::create([
            'name'=>'Aplicacion de Encimas',
            'description'=>"Las enzimas son proteínas que aceleran las reacciones químicas. Se pueden usar en una variedad de aplicaciones, incluyendo la producción de alimentos, la limpieza y el cuidado personal. En la industria alimentaria, las enzimas se utilizan para descomponer los alimentos en sus componentes más pequeños, lo que ayuda a mejorar su sabor, textura y digestibilidad. También se utilizan para producir nuevos alimentos, como jugos, bebidas y productos lácteos.",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Encimas.jpg')
        ]);

        Treatment::create([
            'name'=>'Acido Hialuronico',
            'description'=>"El ácido hialurónico es una sustancia natural que se encuentra en la piel y ayuda a mantenerla hidratada y joven. Con el paso del tiempo, la producción de ácido hialurónico disminuye, lo que puede provocar la aparición de arrugas, líneas finas y pérdida de volumen. Los rellenos de ácido hialurónico se utilizan para restaurar el volumen y la hidratación de la piel, lo que puede ayudar a mejorar la apariencia de las arrugas, líneas finas y surcos.",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Acido.jpg')
        ]);

        Treatment::create([
            'name'=>'Colocacion de Hilos Tensores',
            'description'=>"La colocación de hilos tensores es un procedimiento mínimamente invasivo que se utiliza para mejorar la apariencia de la piel envejecida. Los hilos se insertan en la piel a través de pequeñas incisiones y se tensan para levantar y tensar la piel. El procedimiento se realiza generalmente bajo anestesia local y puede completarse en una sola sesión.",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Hilostensores.png')
        ]);

        Treatment::create([
            'name'=>'Radio Frecuencia',
            'description'=>"La radiofrecuencia (RF) es un procedimiento de medicina estética que utiliza ondas electromagnéticas para calentar la piel y el tejido subcutáneo. Esto provoca la contracción del colágeno, lo que da como resultado una piel más firme y tersa. La RF también puede ayudar a reducir la apariencia de las arrugas, las líneas finas y la celulitis.",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Radiofrecuencia.jpg')
        ]);

        Treatment::create([
            'name'=>'Ultrasonido',
            'description'=>"El ultrasonido es un procedimiento médico que utiliza ondas sonoras de alta frecuencia para crear imágenes del interior del cuerpo. Las ondas sonoras se transmiten a través de la piel y se reflejan en los órganos y tejidos internos. El eco de las ondas sonoras se recoge por un transductor y se convierte en una imagen en una pantalla.",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Ultrasonido.jpg')
        ]);

        Treatment::create([
            'name'=>'Aplicacion de Mascara Led',
            'description'=>"El procedimiento de aplicación de una máscara LED es sencillo y rápido. Primero, la piel debe limpiarse y secarse a fondo. Luego, la máscara LED se coloca sobre la piel y se enciende. La luz LED se irradia desde la máscara durante un período de tiempo determinado, generalmente de 10 a 30 minutos.            ",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Mascaraled.jpg')
        ]);

        Treatment::create([
            'name'=>'Plasma Pen y Derma Pen',
            'description'=>"El plasma pen es un dispositivo médico que utiliza una corriente eléctrica de alta frecuencia para crear pequeñas zonas de plasma en la piel. Esto provoca una lesión controlada en la piel, que desencadena un proceso de curación natural que conduce a la producción de colágeno y elastina nuevos. Esto puede ayudar a mejorar la apariencia de la piel, reduciendo las arrugas, las cicatrices del acné y las estrías.
            El derma pen utiliza pequeñas agujas para crear microperforaciones en la piel. Esto también provoca una lesión controlada en la piel, que desencadena un proceso de curación natural que conduce a la producción de colágeno y elastina nuevos. El derma pen se puede utilizar para tratar una variedad de problemas de la piel, incluyendo las arrugas, las cicatrices del acné, las estrías, las manchas de edad y la rosácea.
            ",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)-No llegar al procedimiento en ayunas",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Dermapen.jpeg')
        ]);

        Treatment::create([
            'name'=>'Exeresis',
            'description'=>"La exéresis es un procedimiento quirúrgico en el que se extirpa un tumor o tejido anormal del cuerpo. La exéresis puede ser realizada por un cirujano u otro profesional de la salud. La exéresis puede ser necesaria para tratar una variedad de condiciones, incluyendo cáncer, quistes, y tumores benignos. La exéresis también puede ser necesaria para reparar lesiones o defectos en el cuerpo",
            'protocols'=>"No atender la cita con agresiones Virales (Gripe, Ciclo Menstrual, Sintomas virales, entre otros)",
            'cost'=>$fake->numberBetween($min = 10, $max = 100),
            'duration'=>$fake->numberBetween($min=1, $max=3),
            'image-url'=>asset('assets/Exeresis.jpg')
        ]);
    }
}
