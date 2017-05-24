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
        <form method="POST" action = "/formularios/update">
            <input type="hidden" name="estado" value="updateForm">
            <label>Nome do formulário customizado:</label> <input type="text" name="nome" value="{{$custom->name}}">
            <br>
            <br>
            <table  class="table" border = "2px">
                <thead>
                    <tr>
                        <th>Entidade</th>
                        <th>Id</th>
                        <th>Propriedade</th>
                        <th>Tipo de valor</th>
                        <th>Nome do campo </th>
                        <th>Tipo do campo <!--  no formulário --></th>
                        <th>Tipo de unidade</th>
                        <th>Ordem <!-- do campo no formulário --> </th>
                        <th>Tamanho <!--  do campo no formulário --></th>
                        <th>Obrigatório</th>
                        <th>Estado</th>
                        <th>Escolher</th>
                        <th>Ordem</th>
                        <th>Obg <!-- no forumulário customizado --> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entidades as $entidade)
                        <tr>
                            <td rowspan = "{{ count($entidade->properties) }}" > {{$entidade->name}} </td>
                            @foreach ($entidade->properties as $propriedade)
                                <td> {{$propriedade->id}} </td>
                                <td> {{$propriedade->name}} </td>
                                <td> {{$propriedade->value_type}} </td>
                                <td> {{$propriedade->form_field_name}} </td>
                                <td> {{$propriedade->form_field_type}} </td>
                                @if (is_null($propriedade->unit_type_id))
                                    <td> - </td>
                                @else
                                    <td> nomeUnidade </td>
                                @endif
                                <td> {{$propriedade->form_field_order}} </td>
                                <td> {{$propriedade->form_field_size}} </td>
                                <td> {{$propriedade->mandatory == 1 ? 'Sim' : 'Não'}} </td>
                                <td> {{$propriedade->state == 'active' ? 'Ativo' : 'Inativo'}} </td>
                                <!-- Falta coisas-->
                                <td> <input type="checkbox" name="idProp" value="{{$propriedade->id}}"> </td>
                                <td> <input type="text" name="ordem" value="{{$propriedade->form_field_order}}"> </td>
                                <td>
                                    @if ($propriedade->mandatory == 1) 
                                        <input type="radio" name="obrigatorio" value="true" checked>Sim
                                        <input type="radio" name="obrigatorio" value="false">Não
                                    @else
                                        <input type="radio" name="obrigatorio" value="true">Sim
                                        <input type="radio" name="obrigatorio" value="false" checked>Não
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
            <input type="hidden" name="propSelected" value="" >
            <input type="submit" value="Atualizar formulário">
        </form>
    </body>
</html>