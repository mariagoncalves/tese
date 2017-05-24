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
            <input type="hidden" name="estado" value="historico">
            <input type="hidden" name="histAll" value="true">
            <table>
                <tbody>
                    <tr>
                        <td colspan="2"> Verificar propriedades existentes no dia : </td>
                    </tr>
                    <tr>
                        <td><input type="text"  class="datepicker" id="datepicker" name="data" placeholder="Introduza uma data"></td>
                        <td><input type="submit" value="Apresentar propriedades"></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <br>
        <br>
        <br>
        <table id="sortedTable" class="table" border = "2px">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Unidade</th>
                    <th>Estado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($unidades as $unidade)
                    <tr>
                        <td> {{$unidade->id}} </td>
                        <td> {{$unidade->name}} </td>
                        <td> {{$unidade->state == 'active' ? 'Ativo' : 'Inativo'}} </td>
                        <td> <a href = "/unidades/editar/{{$unidade->id}}"> [Editar] </a> <a href = "{{$unidade->state == 'active' ? '/unidades/desativar/'.$unidade->id : '/unidades/ativar/'.$unidade->id}}">{{$unidade->state == 'active' ? '[Desativar]' : '[Ativar]'}} </a> <a href = ""> [Histórico] </a> </td>
                    </tr>
                @endforeach
            <tbody>
        </table>

        <h3 align="center">Gestão de Unidades - Introdução</h3>
        <form id="insertForm" method="post" action = "/unidades/inserir" align="center">
            {{ csrf_field() }}
            <table>
                <tbody>
                    <tr>
                        <td colspan="1">Inserir nova unidade:</td>
                        <td><input type="text" id ="name" name="name"/></td>
                        <td><label class="error" for="nome"></label></td>
                        <td><input type="submit" name="submit" value ="Inserir tipo de unidade"/></td>
                    <tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
