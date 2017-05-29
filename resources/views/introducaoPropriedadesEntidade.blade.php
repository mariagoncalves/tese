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
        <h3> Gestão de propriedades - Entidade {{$entidade->name}} - introdução </h3>
        <form id="insertProp" method="post" action = "/propriedades/entidade/inserirPropsEnt/{{$entidade->id}}">
            {{ csrf_field() }}
            <label>Nome da Propriedade:</label><br>
            <input id="nome" type="text" name="nome">
            <br><label class="error" for="nome"></label>
            <br>
            <label>Tipo de valor:</label><br>
            @foreach ($values_type_enum as $value_type)
                <input id="tipoValor" type="radio" name="tipoValor" value="{{$value_type}}">{{$value_type}}<br>
            @endforeach
            <label class="error" for="tipoValor"></label>
            <br>
            <label>Tipo do campo do formulário</label><br>
            @foreach ($form_field_types as $value)
                <input id="tipoCampo" type="radio" name="tipoCampo" value="{{$value}}">{{$value}}<br>
            @endforeach
            <label class="error" for="tipoCampo"></label>
            <br>
            <label>Tipo de unidade</label><br>
            <select id="tipoUnidade" name="tipoUnidade">
                <option value="NULL"></option>'
                @foreach ($unidades as $unidade)
                    <option value="{{$unidade->id}}">{{$unidade->name}}</option>
                @endforeach
            </select>
            <br><br>
            <label class="error" for="tipoUnidade"></label>
            <label>Ordem do campo no formulário</label><br>
            <input id="ordem" type="text" name="ordem" min="1"><br>
            <label class="error" for="ordem"></label><br>
            <label>Tamanho do campo no formulário</label><br>
            <input id="size" type="text" name="tamanho"><br>
            <label id="errTam"></label><br>
            <label>Obrigatório</label><br>
            <input id="obrigatorio" type="radio" name="obrigatorio" value="1">Sim
            <br>
            <input id="obrigatorio" type="radio" name="obrigatorio" value="0">Não
            <br>
            <label class="error" for="obrigatorio"></label><br>
            <label>Entidade referenciada por esta propriedade</label><br>
            <select id="entidadeReferenciada" name="entidadeReferenciada">
                <option value="NULL"></option>
                @foreach ($entidades as $ent)
                    <option value="{{$ent->id}}">{{$ent->name}}</option>
                @endforeach
            </select>
            <br><br>
            <label class="error" for="entidadeReferenciada"></label>
            <input type="submit" value="Inserir propriedade">
        </form>
    </body>
</html>