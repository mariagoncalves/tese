@extends('layouts.default')
@section('content')
	
	<h2>{{trans("messages.relationTypes")}}</h2>

	<div ng-controller="RelationTypesManagmentControllerJs">
		<div growl></div>
		<table class="table table-striped" ng-init="getRelations()">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{trans("messages.relation")}}</th>
                <th>{{trans("messages.entity")}} 1</th>
                <th>{{trans("messages.entity")}} 2</th>
                <th>{{trans("messages.properties")}}</th>
                <th>{{trans("messages.valueType")}}</th>
                <th>Transaction Type</th>
                <th>Transaction State</th>
                <th>{{trans("messages.state")}}</th>
                <th>{{trans("messages.updated_on")}}</th>
                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">{{trans("messages.addRelationsTypes")}}</button></th>
            </tr>
            </thead>
            <tbody>
                <tr ng-repeat-start="entity in displayedCollection" ng-if="false" ng-init="innerIndex = $index"></tr>

                <td rowspan="[[ entity.properties.length + 1 ]] " >
                    [[ entity.language[0].pivot.name ]]

                    <div ng-if="entity.properties.length > 1">
                        <button class="btn btn-primary btn-xs" ng-click="showDragDropWindowEnt(entity.id)"> {{trans("messages.buttonDragDrop")}}</button>
                    </div>
                </td>

                <td ng-if="entity.properties.length == 0" colspan="10">{{trans("messages.noProperties")}}</td>
                <td ng-if="entity.properties.length == 0" colspan="1">
                    <!--<button class="btn btn-default btn-xs btn-detail">Inserir</button> -->
                    <button class="btn btn-danger btn-xs btn-delete">{{trans("messages.history")}}</button>
                </td>

                <tr ng-repeat="property in entity.properties">
                    <td>[[ property.id ]]</td>
                    <td>[[ property.language[0].pivot.name ]]</td>
                    <td>[[ property.value_type ]]</td>
                    <td>[[ property.language[0].pivot.form_field_name ]]</td>
                    <td>[[ property.form_field_type ]]</td>
                    <td>[[ property.units ? property.units.language[0].pivot.name : '-' ]]</td>
                    <!-- <td>[[ property.form_field_order ]]</td> -->
                    <td>[[ property.form_field_size != null ? property.form_field_size : '-']]</td>
                    <td>[[ (property.mandatory == 1) ? 'Yes' : 'No' ]]</td>
                    <td>[[ property.state ]]</td>
                    <td>[[ property.updated_at ]]</td>
                    <td>
                        <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', property.id)">{{trans("messages.edit")}}</button>
                        <button class="btn btn-danger btn-xs btn-delete">{{trans("messages.history")}}</button>
                    </td>
                    <tr ng-repeat-end ng-if="false"></tr>
                </tr>
            </tbody>
        </table>
        <div>
            <pagination></pagination>
        </div>

	</div>

@stop
@section('footerContent')
    <script src="<?= asset('app/controllers/relTypes.js') ?>"></script>
@stop
