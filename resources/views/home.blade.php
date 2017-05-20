@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    <div class="links">
                        <a href="">Gestão de Propriedades</a>
                        <a href="">Gestão de Unidades</a>
                        <a href="http://localhost:8000/formularios">Gestão de Formulários</a>
                        <a href="">Gestão de valores permitidos </a>
                        <a href="">GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
