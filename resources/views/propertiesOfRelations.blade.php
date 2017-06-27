@extends('layouts.default')
@section('content')
    <h2>{{trans("messages.properties")}}</h2>
    <div ng-controller="propertiesManagmentControllerJs">
        <!-- Table-to-load-the-data Part -->
        <table class="table" ng-init="getRelations()" border = "1px solid">
            <thead>
            <tr>
                <th>{{trans("messages.relation")}}</th>
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
                <tr ng-repeat-start="relation in relations" ng-if="false" ng-init="innerIndex = $index"></tr>

                <td rowspan="[[ relation.properties.length + 1 ]] " ng-if="relation.properties[$index - 1].ent_type_id != relation.id">[[ relation.rel_type_names[0].name ]] </td>

                <td ng-if="relation.properties.length == 0" colspan="11">Não tem propriedades.</td>
                <td ng-if="relation.properties.length == 0" colspan="1">
                    <!-- <button class="btn btn-default btn-xs btn-detail">Inserir</button> -->
                    <button class="btn btn-danger btn-xs btn-delete">Histórico</button>
                </td>

                <tr ng-repeat="property in relation.properties">
                    <td>[[ property.id ]]</td>
                    <td>[[ property.properties_names[0].name ]]</td>
                    <td>[[ property.value_type ]]</td>
                    <td>[[ property.properties_names[0].form_field_name ]]</td>
                    <td>[[ property.form_field_type ]]</td>
                    <td>[[ property.units ? property.units.language[0].pivot.name : '-' ]]</td>
                    <td>[[ property.form_field_order ]]</td>
                    <td>[[ property.form_field_size ]]</td>
                    <td>[[ (property.mandatory == 1) ? 'Yes' : 'No' ]]</td>
                    <td>[[ property.state ]]</td>
                    <td>[[ property.updated_at ]]</td>
                    <td>
                        <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', relation.id, property.id)">Editar</button>
                        <button class="btn btn-danger btn-xs btn-delete">Histórico</button>
                    </td>
                    <tr ng-repeat-end ng-if="false"></tr>
                </tr>
            </tbody>
        </table>
         <div>
            <posts-pagination></posts-pagination>
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
                        <form name="formProps" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label for="entityType" class="col-sm-3 control-label">Relation Type:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name = "relation">
                                        <option value=""></option>
                                        <option ng-repeat="relation in relations" value="relation.id">[[ relation.rel_type_names[0].name ]]</option>
                                    </select>
                                </div>
                            </div>

                            <!-- FALTA ALTERAR O NG MODEL-->
                            <div class="form-group">
                                <label for="inputNameProp" class="col-sm-3 control-label">Property name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="property_name" name="property_name" placeholder="" value="@]]name]]"
                                           ng-model="relType.language[0].pivot.name" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="formProps.contact_number.$invalid && formProps.property_name.$touched">Property field is required</span>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getStates()">
                                <label for="Gender" class="col-sm-3 control-label">State:</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline state" ng-repeat="state in states">
                                        <input type="radio" name="property_state" value="[[ state ]]" required>[[ state ]]
                                    </label>
                                    <span class="help-inline"
                                          ng-show="formProps.position.$invalid && formProps.position.$touched">State field is required</span>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getValueTypes()">
                                <label for="Gender" class="col-sm-3 control-label">Value Type:</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline valueType" ng-repeat="valueType in valueTypes">
                                        <input type="radio" name="property_valueType" value="active" required>[[ valueType ]]
                                    </label>
                                    <span class="help-inline"
                                          ng-show="formProps.position.$invalid && formProps.position.$touched">Value Type field is required</span>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getFieldTypes()">
                                <label for="Gender" class="col-sm-3 control-label">Field Type:</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline fieldType" ng-repeat="fieldType in fieldTypes">
                                        <input type="radio" name="property_fieldType" value="active" required>[[ fieldType ]]
                                    </label>
                                    <span class="help-inline"
                                          ng-show="formProps.position.$invalid && formProps.position.$touched">Field Type field is required</span>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getUnits()">
                                <label for="unitType" class="col-sm-3 control-label">Unit Type:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name = "units">
                                        <option value=""></option>
                                        <option ng-repeat="unit in units" value="unit.id">[[ unit.units_names[0].name ]]</option>
                                    </select>
                                </div>
                            </div>

                            <!-- FALTA ALTERAR O NG MODEL-->

                            <div class="form-group">
                                <label for="inputfieldOrder" class="col-sm-3 control-label">Field Order:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="property_fieldOrder" name="property_fieldOrder" placeholder="" value="@]]name]]"
                                           ng-model="propUnitType.language[0].pivot.name" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="formProps.contact_number.$invalid && formProps.property_fieldOrder.$touched">Field Order is required</span>
                                </div>
                            </div>

                            <!-- FALTA ALTERAR O NG MODEL-->
                           
                           <div class="form-group">
                                <label for="inputfieldSize" class="col-sm-3 control-label">Field Size:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="property_fieldSize" name="property_fieldSize" placeholder="" value="@]]name]]"
                                           ng-model="propUnitType.language[0].pivot.name" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="formProps.contact_number.$invalid && formProps.property_fieldSize.$touched">Field Order is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Mandatory:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline mandatory">
                                        <input type="radio" name="property_mandatory" value="1" ng-model="propUnitType.mandatory" required>Yes
                                    </label>
                                    <label for="" class="radio-inline mandatory">
                                        <input type="radio" name="property_mandatory" value="0" ng-model="propUnitType.mandatory" required>No
                                    </label>
                                    <span class="help-inline"
                                          ng-show="formProps.position.$invalid && formProps.position.$touched">Mandatory field is required</span>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="formProps.$invalid">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footerContent')
    <script src="<?= asset('app/controllers/properties.js') ?>"></script>
@stop