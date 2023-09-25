<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Todo List Estilo Apple</title>
    <!-- Incluir Bootstrap para diseño responsivo y estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <!-- Incluir moment.js para manipulación de fechas y horas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- Incluir jQuery para facilitar manipulación del DOM y envío de AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir Animate.css para animaciones suaves y atractivas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 100px;
            max-width: 600px;
        }
        #lista-tareas {
            list-style-type: none;
            padding: 0;
        }
        #lista-tareas li {
            background-color: #fff;
            border-radius: 20px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>
<body>
<header>
    <h1>Todo List</h1>
</header>
