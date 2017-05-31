<h3> Gestão de propriedades - Edição </h3>
<form id="editProp" method="post" action = "/propriedades/relacao/updateRelacao/{{$propriedade->id}}">
    {{ csrf_field() }}
	<h3> Propriedade {{ $propriedade->name}} - Edição </h3>
	<label>Nome da Propriedade:</label><br>
	<input id="nome" type="text" name="nome_{{$propriedade->id}}" value="{{ $propriedade->name}}">
    <br><label class="error" for="nome_{{$propriedade->id}}"></label>
    <br>
    <label>Tipo de valor:</label><br>
     @foreach ($values_type_enum as $value)
    	@if($value == $propriedade->value_type)
    		<input id="tipoValor" type="radio" name="tipoValor_{{ $propriedade->id}}" value="{{ $value }}" checked="checked"> {{$value}}<br>
    	@else
    		<input id="tipoValor" type="radio" name="tipoValor_{{ $propriedade->id}}" value="{{ $value }}">{{$value}}<br>
    	@endif
    @endforeach
    <label class="error" for="tipoValor_{{ $propriedade->id}}"></label>
    <br>
    <label>Tipo do campo do formulário</label><br>
    @foreach ($form_field_types as $value)
    	@if($value == $propriedade->form_field_type)
    		<input id="formType" type="radio" name="tipoCampo_{{ $propriedade->id}}" value="{{ $value }}" checked="checked">{{ $value }}<br>
    	@else
    		<input id="formType" type="radio" name="tipoCampo_{{ $propriedade->id}}" value="{{ $value }}">{{$value}}<br>
    	@endif
    @endforeach
    <label class="error" for="tipoCampo_{{ $propriedade->id}}"></label>
    <br>
    <label>Tipo de unidade</label><br>
    <select id="tipoUnidade" name="tipoUnidade_{{ $propriedade->id}}">
        <option value="NULL"></option>';
        @foreach ($unidades as $unidade)
        	@if ($unidade->id == $propriedade->unit_type_id)
        		<option value="{{$unidade->id}}" selected>{{$unidade->name}}</option>
        	@else
        		<option value="{{$unidade->id}}">{{$unidade->name}}</option>
        	@endif
        @endforeach
    </select>
    <br>
    <label class="error" for="tipoUnidade_{{ $propriedade->id}}"></label><br>
    <label>Ordem do campo no formulário</label><br>
    <input id="ordem" type="text" name="ordem_{{ $propriedade->id}}" min="1" value="{{ $propriedade->form_field_order}}"><br>
    <label class="error" for="ordem_{{ $propriedade->id}}"></label><br>
    <label>Tamanho do campo no formulário</label><br>
    <input type="text" name="tamanho_{{ $propriedade->id}}" value="{{ $propriedade->form_field_size}}"><br>
    <label>Obrigatório</label><br>
    @if ($propriedade->mandatory == 1) 
        <input type="radio" id="obrigatorio" name="obrigatorio_{{$propriedade->id}}" value="1" checked>Sim
        <input type="radio" id="obrigatorio" name="obrigatorio_{{$propriedade->id}}" value="0">Não
        <label class="error" for="obrigatorio_{{$propriedade->id}}"></label><br>
    @else
        <input type="radio" id="obrigatorio" name="obrigatorio_{{$propriedade->id}}" value="1">Sim
        <input type="radio" id="obrigatorio" name="obrigatorio_{{$propriedade->id}}" value="0" checked>Não
        <label class="error" for="obrigatorio_{{$propriedade->id}}"></label><br>
    @endif
    <br>
    <input type="submit" value="Editar propriedades">
</form>
