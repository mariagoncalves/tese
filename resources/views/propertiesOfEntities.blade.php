@extends('layouts.default')
@section('content')
	<h2>{{trans("messages.properties")}}</h2>
    <div ng-controller="entityTypesController">
        <div growl></div>

        <!-- Table-to-load-the-data Part -->
        <table class="table" ng-init="getEntityTypes()">
            <thead>
            <tr>
                <th>{{trans("messages.entity")}}</th>
                <th>ID</th>
                <th>{{trans("messages.property")}}</th>
                <th>{{trans("messages.valueType")}}</th>
                <th>{{trans("messages.formFieldName")}}</th>
                <th>{{trans("messages.formFieldType")}}</th>
                <th>{{trans("messages.unitType")}}</th>
                <th>{{trans("messages.formFieldOrder")}}</th>
                <th>{{trans("messages.formFieldSize")}}</th>
                <th>{{trans("messages.mandatory")}}</th>
                <th>{{trans("messages.state")}}</th>
                <th>{{trans("messages.updated_on")}}</th>
                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">{{trans("messages.addProperties")}}</button></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>cfhfghf</td>
                <td>hchfghjf</td> <!--processtype.pivot.name quando é feito da linguagem para o processtype-->
                <td>ngfv</td>
                <td>ghf</td>
                <td>ghfghgf</td>
                <td>gff</td>
                <td>ghfhfg</td>
                <td>hchfghjf</td>
                <td>ghfhh</td>
                <td>ghf</td>
                <td>ghfghgf</td>
                <td>gff</td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', entitytype.id)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete">Histórico</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

        