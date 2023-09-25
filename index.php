<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Todo List Estilo Apple</title>
    <!-- Incluir Bootstrap para diseño responsivo y estilos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css">
    <!-- Incluir moment.js para manipulación de fechas y horas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- Incluir jQuery para facilitar manipulación del DOM y envío de AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir Animate.css para animaciones suaves y atractivas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        #lista-tareas {
            list-style-type: none;
            padding: 0;
        }
        #lista-tareas li {
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 10px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mb-4">Todo List</h2>
    <ul id="lista-tareas" class="animate__animated animate__fadeIn"></ul>
    <button id="nuevaTarea" class="btn btn-primary mt-3">Nueva Tarea</button>
</div>
<script src="script.js"></script>
</body>
</html>
