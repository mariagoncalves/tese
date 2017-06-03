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
        <form id="insertForm" method="post" action = "/unidades/update/{{$unidade->first()->id}}" align="center">
            {{ csrf_field() }}
            <label>Novo nome para a Unidade:</label> 
            <br>
            <input type="text" id ="name" name="name" value = "{{$unidade->first()->unitsNames->first()->name }}"/>
            <br>
            <label class="error" for="name"></label>
            <br>
            <input type="submit" name="submit" value ="Atualizar tipo de unidade"/>
        </form>
        <?php
        if(isset($res)) {
            ?>
            @if ( count($res) > 0 )
              <p>The following errors have occurred:</p>

              <ul>
                @foreach( $res as $key => $errors )
                    <li>{{ $key }}</li>
                    <ul>
                        @foreach($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endforeach
              </ul>
            @endif
            <?php
        }
        ?>
    </body>
</html>