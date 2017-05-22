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
       <form method="GET">
            Verificar formulários existentes no dia : 
            <input type="text" class="datepicker" id="datepicker" name="data" placeholder="Introduza uma data"> 
            <input type="hidden" name="estado" value="historico">
            <input type="hidden" name="histAll" value="true">
            <input type="submit" value="Apresentar formulários">
        </form>
        <br>
        <br>
        <br>
        <table class="table" border = "2px">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome do formulário customizado</th>
                    <th>Propriedade</th>
                    <th>Tipo de Valor</span></th>
                    <th>Estado</span></th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($custom)){
                    //echo "Tem utilizadores ";
                    foreach ($custom as $formulario) {
                        ?>
                        <tr>
                            <td> {{$formulario->id}}</td>
                            <td> {{$formulario->name}}</td>
                            <td> {{$formulario->state}}</td>
                        </tr>
                        <?php
                    }
                }

                ?>

            </tbody>
        </table>
    </body>
</html>
