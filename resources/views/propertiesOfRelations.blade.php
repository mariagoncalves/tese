@extends('layouts.default')
@section('content')
    <h2>{{trans("messages.properties")}}</h2>
    <div ng-controller="propertiesManagmentControllerJs">
        <div growl></div>
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
                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggleRel('add', 0)">{{trans("messages.addProperties")}}</button></th>
            </tr>
            </thead>
            <tbody>
                <tr ng-repeat-start="relation in relations" ng-if="false" ng-init="innerIndex = $index"></tr>

                <td rowspan="[[ relation.properties.length + 1 ]] " ng-if="relation.properties[$index - 1].ent_type_id != relation.id">[[ relation.rel_type_names[0].name ]] </td>

                <td ng-if="relation.properties.length == 0" colspan="11">{{trans("messages.noProperties")}}</td>
                <td ng-if="relation.properties.length == 0" colspan="1">
                    <!-- <button class="btn btn-default btn-xs btn-detail">Inserir</button> -->
                    <button class="btn btn-danger btn-xs btn-delete">{{trans("messages.history")}}</button>
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
                        <button class="btn btn-default btn-xs btn-detail" ng-click="toggleRel('edit', property.id)">{{trans("messages.edit")}}</button>
                        <button class="btn btn-danger btn-xs btn-delete">{{trans("messages.history")}}</button>
                    </td>
                    <tr ng-repeat-end ng-if="false"></tr>
                </tr>
            </tbody>
        </table>
         <div>
            <posts-pagination>
                <!--<ul class = "pagination">
                    <li ng-show="currentPage !=1" class = "ng-hide"><a href = "javascript:void(0)" ng-click="getEntities(1)">gdfg</a></li>
                    <li ng-show="currentPage !=1" class = "ng-hide"><a href = "javascript:void(0)" ng-click="getEntities(currentPage-1)">Prev</a></li>
                    <li ng-show="currentPage !=totalPages"><a href = "javascript:void(0)" ng-click="getEntities(currentPage+1)">Next</a></li>

                </ul> -->

            </posts-pagination>
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
                        <form id = "formPropRel" name="formProps" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{trans("messages.relationType")}}:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name = "relation_type">
                                        <option value=""></option>
                                        <option ng-repeat="relation in relations" ng-value="relation.id" ng-selected="relation.id == property.rel_type_id" >[[ relation.rel_type_names[0].name ]]</option>
                                    </select>
                                    <ul ng-repeat="error in errors.relation_type" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="property_name_rel" class="col-sm-3 control-label">{{trans("messages.propertyName")}}:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="property_name_rel" name="property_name_rel" value="[[ property.properties_names[0].name ]]" >
                                    <ul ng-repeat="error in errors.property_name_rel" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getStates()">
                                <label for="Gender" class="col-sm-3 control-label">{{trans("messages.state")}}:</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline state" ng-repeat="state in states">
                                        <input type="radio" name="property_state_rel" value="[[ state ]]" ng-model="property.state">[[ state ]]
                                    </label>
                                    <ul ng-repeat="error in errors.property_state_rel" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getValueTypes()">
                                <label for="Gender" class="col-sm-3 control-label">{{trans("messages.valueType")}}:</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline valueType" ng-repeat="valueType in valueTypes">
                                        <input type="radio" name="property_valueType_rel" value="[[ valueType ]]" ng-model="property.value_type" required>[[ valueType ]]
                                    </label>
                                    <ul ng-repeat="error in errors.property_valueType_rel" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getFieldTypes()">
                                <label for="Gender" class="col-sm-3 control-label">{{trans("messages.formFieldType")}}:</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline fieldType" ng-repeat="fieldType in fieldTypes">
                                        <input type="radio" name="property_fieldType_rel" value="[[ fieldType ]]" ng-model="property.form_field_type" required>[[ fieldType ]]
                                    </label>
                                    <ul ng-repeat="error in errors.property_fieldType_rel" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group" ng-init="getUnits()">
                                <label for="units" class="col-sm-3 control-label">{{trans("messages.unitType")}}:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name = "units_name">
                                        <option value="0"></option>
                                        <option ng-repeat="unit in units" value="[[ unit.id ]]" ng-selected="unit.id == property.unit_type_id" >[[ unit.units_names[0].name ]]</option>
                                    </select>
                                    <ul ng-repeat="error in errors.units_name" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- FALTA ALTERAR O NG MODEL-->

                            <div class="form-group">
                                <label for="inputfieldOrder" class="col-sm-3 control-label">{{trans("messages.fieldOrder")}}:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="property_fieldOrder_rel" name="property_fieldOrder_rel" ng-model="property.form_field_order" placeholder="">
                                    <ul ng-repeat="error in errors.property_fieldOrder_rel" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- FALTA ALTERAR O NG MODEL-->

                           <div class="form-group">
                                <label for="inputfieldSize" class="col-sm-3 control-label">{{trans("messages.fieldSize")}}:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="property_fieldSize_rel" name="property_fieldSize_rel" ng-model="property.form_field_size">
                                    <ul ng-repeat="error in errors.property_fieldSize_rel" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">{{trans("messages.mandatory")}}:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline mandatory">
                                        <input type="radio" name="property_mandatory_rel" ng-value="1" ng-model="property.mandatory" required>Yes
                                    </label>
                                    <label for="" class="radio-inline mandatory">
                                        <input type="radio" name="property_mandatory_rel" ng-value="0" ng-model="property.mandatory" required>No
                                    </label>
                                    <ul ng-repeat="error in errors.property_mandatory_rel" style="padding-left: 15px;">
                                        <li>[[ error ]]</li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="saveRel(modalstate, id)">{{trans("messages.saveChanges")}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footerContent')
    <script src="<?= asset('app/controllers/properties.js') ?>"></script>
@stop
