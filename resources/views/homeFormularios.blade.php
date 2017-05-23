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
                @if (count($custom) == 0)
                        <tr>
                            <td colspan = "6"> Não existem formulários customizados. </td>
                        </tr>
                @else
                <!-- FALTA ALTERAR OS ROWSPANS -->
                    @foreach ($custom as $formulario)
                        @foreach ($formulario->properties as $property)
                            <tr>
                                <td rowspan = ""> {{$formulario->id}}</td>
                                <td rowspan = ""> {{$formulario->name}}</td>
                                <td> {{ $property->name }}</td>
                                <td> {{ $property->value_type }} </td>
                                <td> {{$formulario->state == 'active' ? 'Ativo' : 'Inativo'}}</td>
                                <td> <a href = ""> [Editar] </a> <a href = ""> {{$formulario->state == 'active' ? '[Desativar]' : '[Ativar]'}} </a> <a href = ""> [Histórico] </a></td>
                            </tr>
                        @endforeach
                    @endforeach
                @endif

            </tbody>
        </table>
        <br>
        <br>
        <form method="POST">
        <input type="hidden" name="estado" value="inserir">
        <label>Nome do formulário customizado:</label> <input type="text" name="nome">
        <label id="nome" class="error" for="nome"></label>
        <br><br>
        <table class="table" border = "2px">
            <thead>
                <tr>
                    <th>Entidade</th>
                    <th>Id</th>
                    <th>Propriedade</th>
                    <th>Tipo de valor</th>
                    <th>Nome do campo</th>
                    <th>Tipo do campo</th>
                    <th>Tipo de unidade</th>
                    <th>Ordem</th>
                    <th>Tamanho</th>
                    <th>Obrig</th>
                    <th>Estado</th>
                    <th>Escolher</th>
                    <th>Ordem</th>
                    <th>Obrig</th>
                </tr>
            </thead>
            <tbody> 
                @if (count($entidades) == 0)
                    <tr>
                        <td colspan = "14"> Não pode criar formulários uma vez que ainda não foram inseridas propriedades. </td>
                    </tr>
                @else
                    @foreach ($entidades as $entidade)
                        @foreach ($propriedades as $propriedade)
                        <tr>
                            <td> {{$entidade->name}} </td>
                            <td> {{$propriedade->id}} </td>
                            <td> {{$propriedade->name}} </td>
                            <td> {{$propriedade->value_type}} </td>
                            <td> {{$propriedade->form_field_name}} </td>
                            <td> {{$propriedade->form_field_type}} </td>
                            <td> {{$propriedade->unit_type_id}} </td>
                            <td> {{$propriedade->form_field_order}} </td>
                            <td> {{$propriedade->form_field_size}} </td>
                            <td> {{$propriedade->mandatory}} </td>
                            <td> {{$propriedade->state}} </td>
                            <td> vmmbv </td>
                            <td> fbfgb </td>
                            <td> gfbf </td>
                        </tr>
                        @endforeach
                    @endforeach
                @endif
            </tbody>
        </table>
        <br>
        <br>
        <input type="hidden" name="propSelected" value="" >
        <input type="submit" value="Inserir formulário">
    </form>
        






    </body>
</html>
