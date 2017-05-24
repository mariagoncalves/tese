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
                    @foreach ($custom as $formulario)
                        <tr>
                            <td rowspan = "{{ count($formulario->properties) }}"> {{$formulario->id}}</td>
                            <td rowspan = "{{ count($formulario->properties) }}"> {{$formulario->name}}</td>
                            @if (count($formulario->properties) != 0)
                                @foreach ($formulario->properties as $property)
                                        <td> {{ $property->name }}</td>
                                        <td> {{ $property->value_type }} </td>
                                        <td> {{$formulario->state == 'active' ? 'Ativo' : 'Inativo'}}</td>
                                        <!-- FALTA ALTERAR OS ROWSPANS -->
                                        <td rowspan = ""> <a href = "/editar/{{$formulario->id}}"> [Editar] </a> <a href = "{{$formulario->state == 'active' ? '/desativar/'.$formulario->id : '/ativar/'.$formulario->id}}"> {{$formulario->state == 'active' ? '[Desativar]' : '[Ativar]'}} </a> <a href = "/historico"> [Histórico] </a></td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="4">Não existe propriedades..</td>
                            @endif
                        </tr>
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
                            <td colspan = "14"> Não pode criar formulários uma vez que ainda não foram inseridas entidades/propriedades??. </td>
                        </tr>
                    @else
                        @foreach ($entidades as $entidade)
                            <tr>
                                <td rowspan = "{{ count($entidade->properties)}}" > {{$entidade->name}} </td>
                                    @foreach ($entidade->properties as $propriedade)
                                        <td> {{$propriedade->id}} </td>
                                        <td> {{$propriedade->name}} </td>
                                        <td> {{$propriedade->value_type}} </td>
                                        <td> {{$propriedade->form_field_name}} </td>
                                        <td> {{$propriedade->form_field_type}} </td>
                                        @if (is_null($propriedade->unit_type_id))
                                            <td> - </td>
                                        @else
                                            <td> suposto nome da unidade </td>
                                        @endif
                                        <td> {{$propriedade->form_field_order}} </td>
                                        <td> {{$propriedade->form_field_size}} </td>
                                        <td> {{$propriedade->mandatory}} </td>
                                        <!-- Falta alterar coisas, name e value -->
                                        <td> {{$propriedade->state = 'active' ? 'Ativo' : 'Inativo'}} </td>
                                        <td> <input type="checkbox" name="idProp" value="{{$propriedade->id}}"> </td>
                                        <td> <input type="text" name="ordem"> </td>
                                        <td>
                                            <input type="radio" name="obrigatorio" value="true">Sim
                                            <input type="radio" name="obrigatorio" value="false">Não
                                        </td>
                                    </tr>
                                    @endforeach
                            <!-- </tr> -->
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
