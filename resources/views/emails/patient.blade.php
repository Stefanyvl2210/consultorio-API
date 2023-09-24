<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Importante sobre Tratamiento Estetico</title>
    <style>
        /* Estilos generales */
        body {
            background-color: #faf1f1; /* Fondo */
            font-family: Arial, sans-serif;
            color: #2B3A55; /* Texto principal */
        }
        
        /* Contenedor principal */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff; /* Fondo del correo */
            border: 1px solid #e8c4c4; /* Borde */
        }

        /* Encabezado */
        .header {
            background-color: #CE7777; /* Color de encabezado */
            color: #fff; /* Texto del encabezado */
            padding: 20px;
            text-align: center;
        }

        /* Contenido principal */
        .content {
            padding: 20px;
        }

        /* Pie de página */
        .footer {
            background-color: #e8c4c4; /* Color del pie de página */
            color: #2B3A55; /* Texto del pie de página */
            padding: 10px;
            text-align: center;
        }

        #button {
            background-color: #CE7777;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Información Importante sobre Tratamiento Estetico</h1>
        </div>

        <div id="content">
            <p>Estimado {{ $patient->first_name }} {{ $patient->last_name }},</p>
            <p>Esperamos que te encuentres bien. Queremos asegurarnos de que tu tratamiento estético {{ $treatment->name }} realizado el día {{ ($appointment_date)->format('d/m/Y') }} en el horario de {{ ($appointment_start_time)->format('h:i A') }} a {{ $appointment_end_time->format('h:i A') }} con el especialista Dr(a). {{ $doctor->first_name }} {{ $doctor->last_name }} esté progresando de la mejor manera posible.</p>
            <p>Te invitamos a compartir tu experiencia y cualquier novedad en tu tratamiento completando nuestro breve formulario de seguimiento. Este paso es fundamental para garantizar que estés recibiendo la atención adecuada y que cualquier efecto secundario o situación inesperada se aborde de inmediato.</p>
            <p><a id="button" href="http://consultorio-api.test/appointments">Completa el formulario</a></p>
            <p>Tu participación es esencial para nosotros y nos ayudará a ajustar tu tratamiento según sea necesario. Si tienes alguna pregunta o inquietud, no dudes en ponerte en contacto con nuestro equipo.</p>
            <p>Tu bienestar es nuestra prioridad, y tu actualización nos permitirá continuar brindándote el mejor cuidado posible.</p>
            <p>Gracias por confiar en nosotros.</p>
            <p>Atentamente,<br>
            Dr(a). {{ $doctor->first_name }} {{ $doctor->last_name }}<br>
            {{$doctor->phone}}</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Dr(a). {{ $doctor->first_name }} {{ $doctor->last_name }}</p>
        </div>
    </div>
</body>
</html>
