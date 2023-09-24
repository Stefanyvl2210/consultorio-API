<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta Completada</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Encuesta Completada</h1>
        </div>
        <div class="content">
            <p>Estimado(a) {{ $doctor->first_name }} {{ $doctor->last_name }},</p>
            <p>Se le informa que su paciente {{ $patient->first_name }} {{ $patient->last_name }} ha completado la encuesta para el tratamiento {{ $treatment->name }} realizado el dia {{ ($appointment_date)->format('d/m/Y') }} en el horario de {{ ($appointment_start_time)->format('h:i A') }} a {{ $appointment_end_time->format('h:i A') }}.</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Dr(a). {{ $doctor->first_name }} {{ $doctor->last_name }}</p>
        </div>
    </div>
</body>
</html>
