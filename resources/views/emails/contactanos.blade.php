<!DOCTYPE html>
<html>
{{-- Vista del Correo --}}
<head>
    <title>Email</title>
    <style>
        /* Estilos para el contenido del correo */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        /* Estilos para el footer del correo */
        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #777;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <h1>Contacto Recibido de {{ $data['nombre'] }}</h1>
    <p>{{ $data['descripcion'] }}</p>

    <div class="footer">
        <p>Este correo electrónico fue generado automáticamente. Por favor no responda a este mensaje.</p>
    </div>
</body>

</html>
