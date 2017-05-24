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
        <h3 align="center">Gestão de unidades - Edição</h3>
        <form id="insertForm" method="post" action = "/unidades/update/{{$unidade->id}}" align="center">
            {{ csrf_field() }}
            <label>Novo nome para a Unidade:</label> 
            <br>
            <input type="text" id ="nome" name="nome" value = "{{$unidade->name}}"/>
            <br>
            <label class="error" for="nome"></label>
            <br>
            <input type="submit" name="submit" value ="Atualizar tipo de unidade"/>
        </form>
    </body>
</html>