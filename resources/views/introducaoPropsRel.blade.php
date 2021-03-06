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
        <h3> Gestão de propriedades - Relacao {{ $relacao->relTypeNames->first()->name }} - introdução </h3>
        <form id="insertProp" method="post" action = "/propriedades/relacao/inserirPropsRel/{{$relacao->id}}">
            {{ csrf_field() }}
            <label>Nome da Propriedade:</label><br>
            <input id="nome" type="text" name="nome">
            <br><br>
            <label style="color:red" class="error" for="nome">
                @if(isset($resultado['nome']))
                    {{ $resultado['nome'][0] }}
                @endif
            </label>
            <br>
            <br>
            <label>Tipo de valor:</label><br>
            @foreach ($values_type_enum as $value_type)
                <input id="tipoValor" type="radio" name="tipoValor" value="{{$value_type}}">{{$value_type}}<br>
            @endforeach
            <br>
            <label style="color:red" class="error" for="tipoValor">
                @if(isset($resultado['tipoValor']))
                    {{ $resultado['tipoValor'][0] }}
                @endif
            </label>
            <br><br>
            <label>Tipo do campo do formulário</label><br>
            @foreach ($form_field_types as $value)
                <input id="tipoCampo" type="radio" name="tipoCampo" value="{{$value}}">{{$value}}<br>
            @endforeach
            <br><label style="color:red" class="error" for="tipoCampo">
                @if(isset($resultado['tipoCampo']))
                    {{ $resultado['tipoCampo'][0] }}
                @endif
            </label>
            <br><br>
            <label>Tipo de unidade</label><br>
            <select id="tipoUnidade" name="tipoUnidade">
                <option value="NULL"></option>'
                @foreach ($unidades as $unidade)
                    <option value="{{$unidade->id}}">{{$unidade->unitsNames->first()->name}}</option>
                @endforeach
            </select>
            <br><br>
            <label class="error" for="tipoUnidade"></label>
            <label>Ordem do campo no formulário</label><br>
            <input id="ordem" type="text" name="ordem" min="1"><br><br>
            <label style="color:red" class="error" for="ordem">
                @if(isset($resultado['ordem']))
                    {{ $resultado['ordem'][0] }}
                @endif
            </label><br><br>
            <label>Tamanho do campo no formulário</label><br>
            <input id="size" type="text" name="tamanho"><br><br>
            <label style="color:red" id="errTam">
                @if(isset($resultado['tamanho']))
                    {{ $resultado['tamanho'][0] }}
                @endif
            </label><br><br>
            <label>Obrigatório</label><br>
            <input id="obrigatorio" type="radio" name="obrigatorio" value="1">Sim
            <br>
            <input id="obrigatorio" type="radio" name="obrigatorio" value="0">Não
            <br><br>
            <label style="color:red" class="error" for="obrigatorio">
                @if(isset($resultado['obrigatorio']))
                    {{ $resultado['obrigatorio'][0] }}
                @endif
            </label><br>
            <br>
            <input type="submit" value="Inserir Relação">
        </form>
    </body>
</html>