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
            Verificar propriedades existentes no dia : 
            <input type="text" class="datepicker" id="datepicker" name="data" placeholder="Introduza uma data"> 
            <input type="hidden" name="estado" value="historico">
            <input type="hidden" name="histAll" value="true">
            <input type="hidden" name="tipo" value="">
            <input type="submit" value="Apresentar propriedades">
        </form>
        <br>
        <br>
        <br>
        <table class="table" border = "2px">
        <thead>
            <tr>
                <th>Relação</th>
                <th>ID</th>
                <th>Propriedade</th>
                <th>Tipo de valor</th>
                <th>Nome do campo no formulário</th>
                <th>Tipo do campo no formulário</th>
                <th>Tipo de unidade</th>
                <th>Ordem do campo no formulário</th>
                <th>Tamanho do campo no formulário</th>
                <th>Obrigatório</th>
                <th>Estado</th>
                <th>Ação sobre a propriedade</th>
                <th>Ação sobre a relação</th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($relacoes as $relacao)
                <tr>
                    <td rowspan="{{count($relacao->properties)}}"> {{$relacao->name}} </td>
                    @if (count($relacao->properties) == 0)
                        <td colspan="11"> Esta relacao ainda não possui quaisquer propriedades. </td>
                        <td rowspan=""> <a href = ""> [Inserir propriedades] </a> </td>
                    @endif

                    @foreach ($relacao->properties as $prop)
                        <td> {{$prop->id}} </td>
                        <td> {{$prop->name}} </td>
                        <td> {{$prop->value_type}} </td>
                        <td> {{$prop->form_field_name}} </td>
                        <td> {{$prop->form_field_type}} </td>
                         @if (is_null($prop->unit_type_id))
                            <td> - </td>
                        @else
                            
                                <td> {{ $prop->units->name }} </td>
                           
                        @endif
                        <td> {{$prop->form_field_order}} </td>
                        <td> {{$prop->form_field_size}} </td>
                        <td> {{$prop->mandatory == '1' ? 'Sim' : 'Não'}} </td>
                        <td> {{$prop->state == 'active' ? 'Ativo' : 'Inativo'}} </td>
                        <td> 
                            <a href="{{ $prop->state == 'active' ? '/propriedades/desativar/'.$prop->id : '/propriedades/ativar/'.$prop->id}}"> {{ $prop->state == 'active' ? '[Desativar]' : '[Ativar]'}} </a>
                            <a href="">[Histórico]</a>
                        </td>
                        <td rowspan="">
                            <a href="/propriedades/editar/{{$relacao->id}}">[Editar propriedades]</a>
                            <a href="/propriedades/inserir_propriedades/{{$relacao->id}}">[Inserir propriedades]</a>
                        </td>
                    </tr>
                    @endforeach
            @endforeach

        </body>
</html>