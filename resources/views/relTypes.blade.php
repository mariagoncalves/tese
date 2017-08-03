@extends('layouts.default')
@section('content')

	<h2>{{trans("messages.relationTypes")}}</h2>

	<div ng-controller="RelationTypesManagmentControllerJs">
		<div growl></div>
		<table class="table table-striped" ng-init="getRelations()" border = "1px">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{trans("messages.relation")}}</th>
                <th>{{trans("messages.entity")}} 1</th>
                <th>{{trans("messages.entity")}} 2</th>
                <th>Transaction Type</th>
                <th>Transaction State</th>
                <th>{{trans("messages.state")}}</th>
                <th>{{trans("messages.updated_on")}}</th>
                <th>{{trans("messages.properties")}}</th>
                <th>{{trans("messages.valueType")}}</th>
                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">{{trans("messages.addRelationsTypes")}}</button></th>
            </tr>
            </thead>
            <tbody>
                <td ng-if="relations.length == 0" colspan="11">Não há relações</td>

                <tr ng-repeat-start="relation in relations" ng-if="false" ng-init="innerIndex = $index"></tr>
                <td rowspan="[[ relation.properties.length + 1 ]] " > [[ relation.id ]] </td>
                <td rowspan="[[ relation.properties.length + 1 ]] " > [[ relation.language[0].pivot.name ]] </td>
                <td rowspan="[[ relation.properties.length + 1 ]] " > [[ relation.ent1.language[0].pivot.name ]] </td>
                <td rowspan="[[ relation.properties.length + 1 ]] " > [[ relation.ent2.language[0].pivot.name ]] </td>
                <td rowspan="[[ relation.properties.length + 1 ]] " > [[ relation.transactions_type.language[0].pivot.t_name ]] </td>
                <td rowspan="[[ relation.properties.length + 1 ]] " > [[ relation.t_states.language[0].pivot.name ]] </td>
                <td rowspan="[[ relation.properties.length + 1 ]] ">[[ relation.state ]]</td>
                <td rowspan="[[ relation.properties.length + 1 ]] ">[[ relation.updated_at ]]</td>
                <td ng-if="relation.properties.length == 0" colspan="2">{{trans("messages.noProperties")}}</td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', relation.id)">{{trans("messages.edit")}}</button>
                    <button class="btn btn-danger btn-xs btn-delete">{{trans("messages.history")}}</button>
                </td>

                <tr ng-repeat="property in relation.properties">
                    <td>[[ property.language[0].pivot.name ]]</td>
                    <td>[[ property.value_type ]]</td>
                    
                    <tr ng-repeat-end ng-if="false"></tr>
                </tr> 
            </tbody>
        </table> 
        <div>
            <pagination></pagination>
        </div>

        <!-- Modal (Pop up when detail button clicked) -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">[[form_title]]</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formRelation" name="formRel" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{trans("messages.relationName")}}:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="relation_name" name="relation_name" ng-value="relation.language[0].pivot.name">
                                    <ul ng-repeat="error in errors.relation_name" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getEntities()">
                                <label class="col-sm-3 control-label">{{trans("messages.entityType")}} 1:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="entity_type1">
                                        <option value=""></option>
                                        <option ng-repeat="entity in entities" ng-value="entity.ent_type_id" ng-selected="entity.ent_type_id == relation.ent_type1_id">[[ entity.name ]]</option>
                                    </select>
                                    <ul ng-repeat="error in errors.entity_type1" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                                <br>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{trans("messages.entityType")}} 2:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="entity_type2">
                                        <option value=""></option>
                                        <option ng-repeat="entity in entities" ng-value="entity.ent_type_id" ng-selected="entity.ent_type_id == relation.ent_type2_id">[[ entity.name ]]</option>
                                    </select>
                                    <ul ng-repeat="error in errors.entity_type2" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                                <br>
                            </div>

                            <div class="form-group" ng-init="getTransactionsTypes()">
                                <label class="col-sm-3 control-label">{{trans("messages.transactionType")}}:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="transactionsType">
                                        <option value=""></option>
                                        <option ng-repeat="transactionType in transactionTypes" ng-value="transactionType.transaction_type_id" ng-selected="transactionType.transaction_type_id == relation.transaction_type_id">[[ transactionType.t_name ]]</option>
                                    </select>
                                    <ul ng-repeat="error in errors.transactionsType" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                                <br>
                            </div>

                            <div class="form-group" ng-init="getTransactionsStates()">
                                <label class="col-sm-3 control-label">{{trans("messages.transactionState")}}:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="transactionsState">
                                        <option value=""></option>
                                        <option ng-repeat="transactionState in transactionStates" ng-value="transactionState.t_state_id" ng-selected="transactionState.t_state_id == relation.t_state_id">[[ transactionState.name ]]</option>
                                    </select>
                                    <ul ng-repeat="error in errors.transactionsState" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                                <br>
                            </div>

                            <div class="form-group" ng-init="getStates()">
                                <label for="Gender" class="col-sm-3 control-label">{{trans("messages.state")}}:</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline state" ng-repeat="state in states">
                                        <input type="radio" name="relation_state" value="[[ state ]]" ng-checked="state == relation.state">[[ state ]]
                                    </label>
                                    <ul ng-repeat="error in errors.relation_state" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="formRelation.$invalid">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

	</div>

@stop
@section('footerContent')
    <script src="<?= asset('app/controllers/relTypes.js') ?>"></script>
@stop
