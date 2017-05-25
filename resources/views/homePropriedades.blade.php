<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <p>Por favor escolha que tipo de propriedades quer gerir.</p>
        <ul>
            <li><a href="/propriedades/entidade">Entidade</a></li>
            <li><a href="/propriedades/relacao">Relação</a></li>
        </ul>
    </body>
</html>
